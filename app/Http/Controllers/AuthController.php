<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

use Auth;

class AuthController extends Controller
{
    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect('/');
    }
}
