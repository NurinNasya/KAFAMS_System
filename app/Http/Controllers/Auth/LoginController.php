<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected function authenticated(Request $request, $user)
    {
        if ($user->type == 'admin') {
            return redirect()->route('home.admin');
        } elseif ($user->type == 'student') {
            return redirect()->route('home.student');
        } elseif ($user->type == 'parent') {
            return redirect()->route('home.parent');
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
