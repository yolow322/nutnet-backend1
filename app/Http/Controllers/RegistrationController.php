<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegistrationController extends Controller
{
    /**
     * Registers new user
     *
     * @param RegistrationRequest $request
     * @return \Illuminate\Http\RedirectResponse|string
     */
    public function userRegistration(RegistrationRequest $request)
   {
       $user = new User();
       $user->login = $request->login;
       $user->email = $request->email;
       $user->password = Hash::make($request->password);
       $user->save();
       Auth::login($user);
       return redirect('home');
   }
}
