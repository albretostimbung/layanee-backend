<?php

namespace App\Http\Requests\Api\V1\Auth;

use App\Helpers\ResponseFormatter;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password' => 'required', Password::defaults(),
            'email' => 'required|email|max:50',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Password harus diisi',
            'password.confirmed' => 'Password tidak sama',
            'password.min' => 'Password minimal 8 karakter',
            'password.max' => 'Password maksimal 100 karakter',
            'password.alpha_num' => 'Password harus berupa huruf dan angka',
            'password.regex' => 'Password harus mengandung huruf besar, huruf kecil, dan angka',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'email.max' => 'Email maksimal 50 karakter',
        ];
    }

    protected function failedValidation($validator)
    {
        throw new HttpResponseException(ResponseFormatter::error(null, $validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
