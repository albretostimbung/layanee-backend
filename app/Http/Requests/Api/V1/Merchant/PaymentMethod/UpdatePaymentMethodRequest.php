<?php

namespace App\Http\Requests\Api\V1\Merchant\PaymentMethod;

use Illuminate\Http\Response;
use App\Helpers\ResponseFormatter;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatePaymentMethodRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'service_id' => 'required|exists:services,id',
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
            'image' => 'nullable|image',
            'is_active' => 'nullable|boolean',
        ];
    }

    public function messages()
    {
        return [
            'service_id.required' => 'Layanan harus diisi',
            'service_id.exists' => 'Layanan tidak ditemukan',
            'name.required' => 'Nama harus diisi',
            'name.string' => 'Nama harus berupa teks',
            'name.max' => 'Nama maksimal 100 karakter',
            'description.string' => 'Deskripsi harus berupa teks',
            'description.max' => 'Deskripsi maksimal 255 karakter',
            'image.image' => 'Gambar tidak valid',
            'is_active.boolean' => 'Status aktif tidak valid',
        ];
    }

    protected function failedValidation($validator)
    {
        throw new HttpResponseException(ResponseFormatter::error(null, $validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
