<?php

namespace App\Http\Requests\Api\V1\Merchant\OpeningHour;

use Illuminate\Http\Response;
use App\Helpers\ResponseFormatter;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreOpeningHourRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'service_id' => 'required|exists:services,id',
            'day' => 'required|in:Sunday,Monday,Tuesday,Wednesday,Thursday,Friday,Saturday',
            'open' => 'required|date_format:H:i',
            'close' => 'required|date_format:H:i',
            'is_close' => 'nullable|boolean',
        ];
    }

    public function messages()
    {
        return [
            'service_id.required' => 'Layanan harus diisi',
            'service_id.exists' => 'Layanan tidak ditemukan',
            'day.required' => 'Hari harus diisi',
            'day.in' => 'Hari tidak valid',
            'open.required' => 'Jam buka harus diisi',
            'open.date_format' => 'Jam buka tidak valid',
            'close.required' => 'Jam tutup harus diisi',
            'close.date_format' => 'Jam tutup tidak valid',
            'is_close.boolean' => 'Status tutup tidak valid',
        ];
    }

    protected function failedValidation($validator)
    {
        throw new HttpResponseException(ResponseFormatter::error(null, $validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }
}
