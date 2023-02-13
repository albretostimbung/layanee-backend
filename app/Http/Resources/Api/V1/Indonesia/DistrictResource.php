<?php

namespace App\Http\Resources\Api\V1\Indonesia;

use Illuminate\Http\Resources\Json\JsonResource;

class DistrictResource extends JsonResource
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
                'code' => $this->city->province->code,
                'name' => $this->city->province->name,
            ],
            'city' => [
                'code' => $this->city->code,
                'name' => $this->city->name,
            ],
            'code' => $this->code,
            'name' => $this->name,
        ];
    }
}
