<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $redirectTo = '/admin'; // Change this to the desired redirect URL after successful login

    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle the login process
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed, handled by the middleware
            return redirect()->intended($this->redirectTo);
        }

        // Authentication failed, redirect back to the login form with an error message
        return redirect()->route('login')->with('error', 'Invalid credentials. Please try again.');
    }

    // Logout user
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}