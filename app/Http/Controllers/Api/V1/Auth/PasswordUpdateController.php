<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Auth\UpdatePasswordRequest;

class PasswordUpdateController extends Controller
{
    public function __invoke(UpdatePasswordRequest $request)
    {
        auth()->user()->update($request->only('password'));

        return ResponseFormatter::success(null, 'Your password has been updated');
    }
}
