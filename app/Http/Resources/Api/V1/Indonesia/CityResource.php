<?php

namespace App\Http\Resources\Api\V1\Indonesia;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'province' => [
                'code' => $this->province->code,
                'name' => $this->province->name,
            ],
            'code' => $this->code,
            'name' => $this->name,
        ];
    }
}
