<?php

namespace App\Support;

use Firebase\Auth\Token\Verifier;
use Illuminate\Auth\AuthenticationException;

class FirebaseToken
{
    /**
     * @param $idToken
     * @throws AuthenticationException
     * @return mixed
     */
    public function getMobile($idToken)
    {
        $auth = app('firebase.auth');

        try {
            $verifiedIdToken = $auth->verifyIdToken($idToken);

            return $verifiedIdToken->getClaim('phone_number');
        } catch (\Throwable $e) {
            throw new AuthenticationException($e->getMessage());
        }
    }
}
