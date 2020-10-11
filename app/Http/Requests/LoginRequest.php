<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'login' => 'required|max:25',
            'password' => 'required|max:255',
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function messages()
    {
        return [
            'login.required' => 'Поле логин должно быть обязательным',
            'login.max' => 'Поле логин может содержать макс. 25 символов',
            'password.max' => 'Поле пароль может содержать макс. 255 символов',
            'password.required' => 'Поле пароль должно быть обязательным',
        ];
    }
}
