<?php

namespace App\Http\Controllers\Api\V1\Merchant;

use App\Models\Service;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\V1\Merchant\ServiceResource;
use App\Http\Requests\Api\V1\Merchant\Service\StoreServiceRequest;
use App\Http\Requests\Api\V1\Merchant\Service\UpdateServiceRequest;

class ServiceController extends Controller
{
    public function index()
    {
        return ResponseFormatter::success(ServiceResource::collection(Service::all()), 'Service retrieved');
    }

    public function store(StoreServiceRequest $request)
    {
        $service = Service::create($request->validated());

        return ResponseFormatter::success(new ServiceResource($service), 'Service created');
    }

    public function show(Service $service)
    {
        return ResponseFormatter::success(new ServiceResource($service), 'Service retrieved');
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        $service->update($request->validated());

        return ResponseFormatter::success(new ServiceResource($service), 'Service updated');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return ResponseFormatter::success(null, 'Service deleted');
    }
}
