<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Helpers\ResponseFormatter;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VerificationController extends Controller
{
    public function verify($userId, Request $request)
    {
        if (!$request->hasValidSignature()) {
            return ResponseFormatter::error(null, 'Invalid/Expired url provided.', 401);
        }

        $user = User::findOrFail($userId);

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }

        // should be redirect to success message page
        return ResponseFormatter::success(null, 'Email has been verified.');
    }

    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return ResponseFormatter::error(null, 'Email already verified', 422);
        }

        $request->user()->sendEmailVerificationNotification();

        return ResponseFormatter::success(null, 'Email verification link sent on your email');
    }
}
