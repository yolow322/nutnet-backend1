<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Uses for login user with checking password hash form db and request password
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function userLogin(LoginRequest $request)
    {
        if (!Auth::attempt($request->only(['login', 'password']), $request->has('remember'))) {
            return redirect()->back()->withErrors([
                'massage' => 'Неверный логин или пароль'
            ]);
        }
        return redirect('home');
    }

    /**
     * Uses for logout user
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function userLogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
