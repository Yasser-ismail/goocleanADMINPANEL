<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserApiRequest;
use App\Http\Resources\UserResource;
use App\Http\Filters\UserFilter;
use App\Http\Resources\UserAjaxResource;
use App\Models\User;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param UserFilter $filter
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */

    public function index(UserFilter $filter)
    {
        $users = User::exceptAdmin()->filter($filter)->limit(50)->get();

        return UserAjaxResource::collection($users);
    }

    /**
     * @param UpdateUserApiRequest $request
     *
     * @return \Illuminate\Http\Resources\Json\JsonResource
     *
     */
    public function update(UpdateUserApiRequest $request)
    {

        auth()->user()->update($request->validated());

        if ($request->file('image')) {
            auth()->user()->addMediaFromRequest('image')->toMediaCollection('avatars');
        }

        auth()->user()->getMedia('avatars');

        return new UserResource(auth()->user()->load('city'));
    }


}
