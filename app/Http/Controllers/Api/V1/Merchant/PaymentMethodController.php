<?php

namespace App\Http\Controllers\Api\V1\Merchant;

use App\Models\PaymentMethod;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Services\PaymentMethodService;
use App\Http\Resources\Api\V1\Merchant\PaymentMethodResource;
use App\Http\Requests\Api\V1\Merchant\PaymentMethod\StorePaymentMethodRequest;
use App\Http\Requests\Api\V1\Merchant\PaymentMethod\UpdatePaymentMethodRequest;

class PaymentMethodController extends Controller
{
    public function index()
    {
        return ResponseFormatter::success(PaymentMethodResource::collection(PaymentMethod::all()), 'Payment Method retrieved');
    }

    public function store(StorePaymentMethodRequest $request, PaymentMethodService $paymentMethodService)
    {
        $paymentMethod = $paymentMethodService->create($request);

        if ($paymentMethod === 'Payment method already exist') {
            return ResponseFormatter::error(null, 'Payment Method already exist');
        }

        return ResponseFormatter::success(new PaymentMethodResource($paymentMethod), 'Payment Method created');
    }

    public function show(PaymentMethod $paymentMethod)
    {
        return ResponseFormatter::success(new PaymentMethodResource($paymentMethod), 'Payment Method retrieved');
    }

    public function update(UpdatePaymentMethodRequest $request, PaymentMethod $paymentMethod, PaymentMethodService $paymentMethodService)
    {
        $result = $paymentMethodService->update($request, $paymentMethod);

        if ($result === 'Payment method already exist') {
            return ResponseFormatter::error(null, 'Payment Method already exist');
        }

        return ResponseFormatter::success(new PaymentMethodResource($paymentMethod), 'Payment Method updated');
    }

    public function destroy(PaymentMethod $paymentMethod)
    {
        $paymentMethod->delete();

        return ResponseFormatter::success(null, 'Payment Method deleted');
    }
}
