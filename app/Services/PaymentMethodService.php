<?php

namespace App\Services;

use App\Models\PaymentMethod;

class PaymentMethodService
{
    public function create($request)
    {
        $exist = PaymentMethod::query()
            ->where('service_id', $request->service_id)
            ->where('name', $request->name)
            ->first();

        if (!$exist) return PaymentMethod::create($request->validated());

        return 'Payment method already exist';
    }

    public function update($request, $paymentMethod)
    {
        $exist = PaymentMethod::query()
            ->where('service_id', $request->service_id)
            ->where('name', $request->name)
            ->where('description', $request->description)
            ->first();

        if (!$exist) return $paymentMethod->update($request->validated());

        return 'Payment method already exist';
    }
}
