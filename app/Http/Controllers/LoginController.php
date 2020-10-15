<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function userLogin(LoginRequest $request)
    {
        if (!Auth::attempt($request->only(['login', 'password']), $request->has('remember'))) {
            return redirect()->back()->withErrors([
                'massage' => 'Неверный логин или пароль'
            ]);
        }
        return redirect('home');
    }

    public function userLogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
