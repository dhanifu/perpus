<?php

namespace App\Services;

use Auth;

class AuthService {

    public function login(array $credentials, bool $remember = false): Bool
    {
        return Auth::attempt($credentials, $remember);
    }

}