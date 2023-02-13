<?php

namespace App\Http\Controllers\Api\V1\Merchant;

use App\Models\ServiceCategory;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Merchant\ServiceCategoryResource;
use App\Http\Requests\Api\V1\Merchant\ServiceCategory\StoreServiceCategoryRequest;
use App\Http\Requests\Api\V1\Merchant\ServiceCategory\UpdateServiceCategoryRequest;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        return ResponseFormatter::success(ServiceCategoryResource::collection(ServiceCategory::all()), 'Service categories retrieved');
    }

    public function store(StoreServiceCategoryRequest $request)
    {
        $serviceCategory = ServiceCategory::create($request->validated());

        return ResponseFormatter::success(new ServiceCategoryResource($serviceCategory), 'Service category created');
    }

    public function show(ServiceCategory $serviceCategory)
    {
        return ResponseFormatter::success(new ServiceCategoryResource($serviceCategory), 'Service category retrieved');
    }

    public function update(UpdateServiceCategoryRequest $request, ServiceCategory $serviceCategory)
    {
        $serviceCategory->update($request->validated());

        return ResponseFormatter::success(new ServiceCategoryResource($serviceCategory), 'Service category updated');
    }

    public function destroy(ServiceCategory $serviceCategory)
    {
        $serviceCategory->delete();

        return ResponseFormatter::success(null, 'Service category deleted');
    }
}
