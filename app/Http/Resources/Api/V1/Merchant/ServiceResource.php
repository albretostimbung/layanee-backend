<?php

namespace App\Http\Resources\Api\V1\Merchant;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'service_category' => [
                'name' => $this->serviceCategory->name,
                'image' => $this->serviceCategory->image,
            ],
            'user' => [
                'name' => $this->user->name,
                'email' => $this->user->email,
                'roles' => $this->user->roles,
            ],
            'description' => $this->description,
            'province' => [
                'code' => $this->province->code,
                'name' => $this->province->name,
            ],
            'city' => [
                'code' => $this->city->code,
                'name' => $this->city->name,
            ],
            'district' => [
                'code' => $this->district->code,
                'name' => $this->district->name,
            ],
            'village' => [
                'code' => $this->village->code,
                'name' => $this->village->name,
            ],
            'address' => $this->address,
        ];
    }
}
