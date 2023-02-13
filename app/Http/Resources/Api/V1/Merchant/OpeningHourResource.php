<?php

namespace App\Http\Resources\Api\V1\Merchant;

use Illuminate\Http\Resources\Json\JsonResource;

class OpeningHourResource extends JsonResource
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
            'day' => $this->day,
            'open' => $this->open->format('H:i'),
            'close' => $this->close->format('H:i'),
            'is_close' => $this->is_close,
        ];
    }
}
