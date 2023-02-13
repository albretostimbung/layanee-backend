<?php

namespace App\Http\Requests\Api\V1\Merchant\Service;

use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use App\Helpers\ResponseFormatter;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateServiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:100', Rule::unique('services')->ignore($this->service),
            'service_category_id' => 'required|exists:service_categories,id',
            'user_id' => 'required|exists:users,id',
            'description' => 'required|string',
            'province_code' => 'required|exists:provinces,code',
            'city_code' => 'required|exists:cities,code',
            'district_code' => 'required|exists:districts,code',
            'village_code' => 'required|exists:villages,code',
            'address' => 'required|string',
            'phone_number' => 'required|string|regex:/^628{9,12}$/',
            'is_active' => 'nullable|boolean',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama harus diisi',
            'name.string' => 'Nama harus berupa teks',
            'name.max' => 'Nama maksimal 100 karakter',
            'service_category_id.required' => 'Kategori layanan harus diisi',
            'service_category_id.exists' => 'Kategori layanan tidak valid',
            'user_id.required' => 'Pemilik layanan harus diisi',
            'user_id.exists' => 'Pemilik layanan tidak valid',
            'description.required' => 'Deskripsi harus diisi',
            'description.string' => 'Deskripsi harus berupa teks',
            'province_code.required' => 'Provinsi harus diisi',
            'province_code.exists' => 'Provinsi tidak valid',
            'city_code.required' => 'Kota harus diisi',
            'city_code.exists' => 'Kota tidak valid',
            'district_code.required' => 'Kecamatan harus diisi',
            'district_code.exists' => 'Kecamatan tidak valid',
            'village_code.required' => 'Kelurahan harus diisi',
            'village_code.exists' => 'Kelurahan tidak valid',
            'address.required' => 'Alamat harus diisi',
            'address.string' => 'Alamat harus berupa teks',
            'phone_number.required' => 'Nomor telepon harus diisi',
            'phone_number.string' => 'Nomor telepon harus berupa teks',
            'phone_number.regex' => 'Nomor telepon tidak valid',
            'is_active.boolean' => 'Status aktif tidak valid',
        ];
    }

    protected function failedValidation($validator)
    {
        throw new HttpResponseException(ResponseFormatter::error(null, $validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
