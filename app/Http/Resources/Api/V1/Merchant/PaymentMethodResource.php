<?php

namespace App\Http\Resources\Api\V1\Merchant;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentMethodResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'service' => [
                'name' => $this->service->name,
                'description' => $this->service->description,
                'address' => $this->service->address,
            ],
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->image,
            'is_active' => $this->is_active,
        ];
    }
}
