<?php

namespace App\Http\Controllers\Api\V1\Indonesia;

use App\Models\District;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Indonesia\DistrictResource;
// use App\Http\Requests\Api\V1\Indonesia\District\StoreDistrictRequest;
// use App\Http\Requests\Api\V1\Indonesia\District\UpdateDistrictRequest;

class DistrictController extends Controller
{
    public function index()
    {
        // return ResponseFormatter::success(DistrictResource::collection(District::all()), 'Districts retrieved');
        return District::paginate($perPage = 9, $columns = [
            'id', 'code', 'name'
        ]);
    }

    // public function store(StoreDistrictRequest $request)
    // {
    //     $district = District::create($request->validated());

    //     return ResponseFormatter::success(new DistrictResource($district), 'District created');
    // }

    public function show(District $district)
    {
        return ResponseFormatter::success(new DistrictResource($district), 'District retrieved');
    }

    // public function update(UpdateDistrictRequest $request, District $district)
    // {
    //     $district->update($request->validated());

    //     return ResponseFormatter::success(new DistrictResource($district), 'District updated');
    // }

    // public function destroy(District $district)
    // {
    //     $district->delete();

    //     return ResponseFormatter::success(null, 'District deleted');
    // }
}
