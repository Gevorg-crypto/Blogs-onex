<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginIndex()
    {
        return view('auth.login');
    }

    public function login(AuthRequest $request)
    {
        $data = $request->validated();
        // User check and login
        if (Auth::attempt(['email'=> $request->email,'password' => $request->password],$request->remember))
        {
            return redirect()->intended(url('/'));
        }
    }

    public function registerIndex()
    {
        return view('auth.register');
    }
    public function register(AuthRequest $request)
    {
        $data = $request->validated();
        dd($data);
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
