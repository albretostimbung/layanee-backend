<?php

namespace App\Http\Requests\Api\V1\Auth;

use Illuminate\Http\Response;
use App\Helpers\ResponseFormatter;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatePasswordRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'current_password' => 'required|current_password',
            'password' => 'required|confirmed', Password::defaults()
        ];
    }

    public function messages()
    {
        return [
            'current_password.required' => 'Password lama harus diisi',
            'current_password.current_password' => 'Password lama tidak sesuai',
            'password.required' => 'Password baru harus diisi',
            'password.confirmed' => 'Password baru tidak sama',
            'password.min' => 'Password baru minimal 8 karakter',
            'password.max' => 'Password baru maksimal 100 karakter',
            'password.alpha_num' => 'Password baru harus berupa huruf dan angka',
            'password.regex' => 'Password baru harus mengandung huruf besar, huruf kecil, dan angka',
        ];
    }

    protected function failedValidation($validator)
    {
        throw new HttpResponseException(ResponseFormatter::error(null, $validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
