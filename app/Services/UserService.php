<?php

namespace App\Services;

use App\Models\User;
use App\Helpers\UserAgentHelper;
use Illuminate\Auth\Events\Registered;

class UserService
{
    public function register($request)
    {
        $user = User::create($request->validated());
        // event(new Registered($user));
        $token = $user->createToken(UserAgentHelper::substr($request->userAgent()))->plainTextToken;

        return $token;
    }

    public function validateLogin($request)
    {
        $credentials = $request->only('email', 'password');

        return auth()->attempt($credentials);
    }

    public function login($request)
    {
        $user = User::where('email', $request->email)->first();
        $expiresAt = $request->remember ? null : now()->addMinutes(config('session.lifetime'));
        $token = $user->createToken(UserAgentHelper::substr($request->userAgent()), expiresAt: $expiresAt)->plainTextToken;

        return $token;
    }
}
