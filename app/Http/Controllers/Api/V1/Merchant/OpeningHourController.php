<?php

namespace App\Http\Controllers\Api\V1\Merchant;

use App\Models\OpeningHour;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Services\OpeningHourService;
use App\Http\Resources\Api\V1\Merchant\OpeningHourResource;
use App\Http\Requests\Api\V1\Merchant\OpeningHour\StoreOpeningHourRequest;
use App\Http\Requests\Api\V1\Merchant\OpeningHour\UpdateOpeningHourRequest;

class OpeningHourController extends Controller
{
    public function index()
    {
        return ResponseFormatter::success(OpeningHourResource::collection(OpeningHour::all()), 'Opening Hour retrieved');
    }

    public function store(StoreOpeningHourRequest $request, OpeningHourService $openingHourService)
    {
        $openingHour = $openingHourService->create($request);

        if ($openingHour === 'Opening hour already exist') {
            return ResponseFormatter::error(null, 'Opening Hour already exist');
        }

        return ResponseFormatter::success(new OpeningHourResource($openingHour), 'Opening Hour created');
    }

    public function show(OpeningHour $openingHour)
    {
        return ResponseFormatter::success(new OpeningHourResource($openingHour), 'Opening Hour retrieved');
    }

    public function update(UpdateOpeningHourRequest $request, OpeningHour $openingHour, OpeningHourService $openingHourService)
    {
        $result = $openingHourService->update($request, $openingHour);

        if ($result === 'Opening hour already exist') {
            return ResponseFormatter::error(null, 'Opening Hour already exist');
        }

        return ResponseFormatter::success(new OpeningHourResource($openingHour), 'Opening Hour updated');
    }

    public function destroy(OpeningHour $openingHour)
    {
        $openingHour->delete();

        return ResponseFormatter::success(null, 'Opening Hour deleted');
    }
}
