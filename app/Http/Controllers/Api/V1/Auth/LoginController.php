<?php

namespace App\Http\Controllers\Api\V1\Auth;

use Illuminate\Http\Response;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Auth\LoginRequest;
use App\Services\UserService;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request, UserService $userService)
    {
        if (!$userService->validateLogin($request)) {
            return ResponseFormatter::error(null, 'Unauthorized', Response::HTTP_UNAUTHORIZED);
        }

        $token = $userService->login($request);

        return ResponseFormatter::success([
            'access_token' => $token,
        ], 'User logged in');
    }
}
