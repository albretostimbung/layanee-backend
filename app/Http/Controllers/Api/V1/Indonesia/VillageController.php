<?php

namespace App\Http\Controllers\Api\V1\Indonesia;

use App\Models\Village;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Indonesia\VillageResource;
// use App\Http\Requests\Api\V1\Indonesia\Village\StoreVillageRequest;
// use App\Http\Requests\Api\V1\Indonesia\Village\UpdateVillageRequest;

class VillageController extends Controller
{
    public function index()
    {
        // return ResponseFormatter::success(VillageResource::collection(Village::all()), 'Villages retrieved');
        return Village::paginate($perPage = 9, $columns = [
            'id', 'code', 'name'
        ]);
    }

    // public function store(StoreVillageRequest $request)
    // {
    //     $village = Village::create($request->validated());

    //     return ResponseFormatter::success(new VillageResource($village), 'Village created');
    // }

    public function show(Village $village)
    {
        return ResponseFormatter::success(new VillageResource($village), 'Village retrieved');
    }

    // public function update(UpdateVillageRequest $request, Village $village)
    // {
    //     $village->update($request->validated());

    //     return ResponseFormatter::success(new VillageResource($village), 'Village updated');
    // }

    // public function destroy(Village $village)
    // {
    //     $village->delete();

    //     return ResponseFormatter::success(null, 'Village deleted');
    // }
}
