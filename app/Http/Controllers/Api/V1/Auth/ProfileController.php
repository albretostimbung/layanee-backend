<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Helpers\ResponseFormatter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Auth\UpdateUserRequest;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        $data = $request->user()->only('name', 'email', 'roles');

        return ResponseFormatter::success($data, 'User retrieved');
    }

    public function update(UpdateUserRequest $request)
    {
        auth()->user()->update($request->validated());

        return ResponseFormatter::success($request->validated(), 'User updated');
    }
}
