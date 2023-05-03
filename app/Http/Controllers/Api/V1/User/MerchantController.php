<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return ResponseFormatter::success(UserResource::collection(User::merchant()->get()), 'User retrieved');
    }
}
