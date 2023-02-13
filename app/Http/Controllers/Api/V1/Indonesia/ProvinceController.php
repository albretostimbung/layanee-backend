<?php

namespace App\Http\Controllers\Api\V1\Indonesia;

use App\Models\Province;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Indonesia\ProvinceResource;
// use App\Http\Requests\Api\V1\Indonesia\Province\StoreProvinceRequest;
// use App\Http\Requests\Api\V1\Indonesia\Province\UpdateProvinceRequest;

class ProvinceController extends Controller
{
    public function index()
    {
        // return ResponseFormatter::success(ProvinceResource::collection(Province::all()), 'Provinces retrieved');
        return Province::paginate($perPage = 9, $columns = ['id', 'code', 'name']);
    }

    // public function store(StoreProvinceRequest $request)
    // {
    //     $province = Province::create($request->validated());

    //     return ResponseFormatter::success(new ProvinceResource($province), 'Province created');
    // }

    public function show(Province $province)
    {
        return ResponseFormatter::success(new ProvinceResource($province), 'Province retrieved');
    }

    // public function update(UpdateProvinceRequest $request, Province $province)
    // {
    //     $province->update($request->validated());

    //     return ResponseFormatter::success(new ProvinceResource($province), 'Province updated');
    // }

    // public function destroy(Province $province)
    // {
    //     $province->delete();

    //     return ResponseFormatter::success(null, 'Province deleted');
    // }
}
