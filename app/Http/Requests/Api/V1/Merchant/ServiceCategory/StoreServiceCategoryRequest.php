<?php

namespace App\Http\Requests\Api\V1\Merchant\ServiceCategory;

use App\Helpers\ResponseFormatter;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class StoreServiceCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'image' => 'nullable|image',
            'is_active' => 'nullable|boolean',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama harus diisi',
            'name.string' => 'Nama harus berupa teks',
            'name.max' => 'Nama maksimal 100 karakter',
            'image.image' => 'Gambar tidak valid',
            'is_active.boolean' => 'Status aktif tidak valid',
        ];
    }

    protected function failedValidation($validator)
    {
        throw new HttpResponseException(ResponseFormatter::error(null, $validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
