<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Auth\RegisterRequest;
use App\Services\UserService;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request, UserService $userService)
    {
        $token = $userService->register($request);

        return ResponseFormatter::success([
            'access_token' => $token,
        ], 'User registered');
    }
}
