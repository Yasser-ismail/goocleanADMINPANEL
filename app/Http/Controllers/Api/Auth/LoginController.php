<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginApiRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Support\FirebaseToken;

class LoginController extends Controller
{

    /**
     * @param LoginApiRequest $request
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     *
     */

    public function index(LoginApiRequest $request)
    {
        $mobile = (new FirebaseToken())->getMobile($request->token);

        $user = User::firstOrCreate(['phone_number' => $mobile], ['type' => User::USER_TYPE]);

        return (new UserResource($user->load('city')))->additional(['token' => $user->createToken('TutsForWeb')->accessToken]);
    }

}
