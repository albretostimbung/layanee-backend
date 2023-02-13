<?php

namespace App\Http\Controllers\Api\V1\Indonesia;

use App\Models\City;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Indonesia\CityResource;
// use App\Http\Requests\Api\V1\Indonesia\City\StoreCityRequest;
// use App\Http\Requests\Api\V1\Indonesia\City\UpdateCityRequest;

class CityController extends Controller
{
    public function index()
    {
        // return ResponseFormatter::success(CityResource::collection(City::all()), 'Citys retrieved');
        return City::paginate($perPage = 9, $columns = [
            'id', 'code', 'name'
        ]);
    }

    // public function store(StoreCityRequest $request)
    // {
    //     $city = City::create($request->validated());

    //     return ResponseFormatter::success(new CityResource($city), 'City created');
    // }

    public function show(City $city)
    {
        return ResponseFormatter::success(new CityResource($city), 'City retrieved');
    }

    // public function update(UpdateCityRequest $request, City $city)
    // {
    //     $city->update($request->validated());

    //     return ResponseFormatter::success(new CityResource($city), 'City updated');
    // }

    // public function destroy(City $city)
    // {
    //     $city->delete();

    //     return ResponseFormatter::success(null, 'City deleted');
    // }
}
