<?php

use App\Http\Controllers\Api\V1\Auth;
use App\Http\Controllers\Api\V1\Merchant;
use App\Http\Controllers\Api\V1\Indonesia;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('register', Auth\RegisterController::class);
    Route::post('login', Auth\LoginController::class);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', Auth\LogoutController::class);
    });
});

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('email')->group(function () {
        Route::get('verify/{id}', [Auth\VerificationController::class, 'verify'])->name('verification.verify');
        Route::get('resend', [Auth\VerificationController::class, 'resend'])->name('verification.resend');
    });

    Route::get('profile', [Auth\ProfileController::class, 'show']);
    Route::put('profile', [Auth\ProfileController::class, 'update']);
    Route::put('password', Auth\PasswordUpdateController::class);

    Route::apiResource('service-categories', Merchant\ServiceCategoryController::class);
    Route::apiResource('services', Merchant\ServiceController::class);
    Route::apiResource('opening-hours', Merchant\OpeningHourController::class);
    Route::apiResource('payment-methods', Merchant\PaymentMethodController::class);

    Route::apiResource('provinces', Indonesia\ProvinceController::class);
    Route::apiResource('cities', Indonesia\CityController::class);
    Route::apiResource('districts', Indonesia\DistrictController::class);
    Route::apiResource('villages', Indonesia\VillageController::class);
});
