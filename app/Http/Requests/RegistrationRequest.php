<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    /**
     * {@inheritDoc}
     */
    public function authorize()
    {
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function rules()
    {
        return [
            'login' => 'required|unique:users|max:25',
            'email' => 'required|unique:users|email|max:80',
            'password' => 'required|confirmed|max:255',
            'password_confirmation' => 'required|max:255'
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function messages()
    {
        return [
            'login.unique' => 'Данный логин уже существует',
            'email.unique' => 'Данный email уже существует',
            'login.max' => 'Поле логин может содержать макс. 25 символов',
            'email.max' => 'Поле email может содержать макс. 80 символов',
            'password.max' => 'Поле пароль может содержать макс. 255 символов',
            'password_confirmation.max' => 'Поле проверки пароля может содержать макс. 255 символов',
            'login.required' => 'Поле логин должно быть обязательным',
            'email.required' => 'Поле email должно быть обязательным',
            'email.email' => 'Поле email должно быть формате адреса эл. почты',
            'password.required' => 'Поле пароль должно быть обязательным',
            'password.confirmed' => 'Поле проверки пароля должно совпадать с полем пароль',
            'password_confirmation.required' => 'Поле проверки пароля должно быть обязательным'
        ];
    }
}
