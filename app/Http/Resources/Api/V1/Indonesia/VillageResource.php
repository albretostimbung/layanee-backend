<?php

namespace App\Http\Resources\Api\V1\Indonesia;

use Illuminate\Http\Resources\Json\JsonResource;

class VillageResource extends JsonResource
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
                'code' => $this->district->city->province->code,
                'name' => $this->district->city->province->name,
            ],
            'city' => [
                'code' => $this->district->city->code,
                'name' => $this->district->city->name,
            ],
            'district' => [
                'code' => $this->district->code,
                'name' => $this->district->name,
            ],
            'code' => $this->code,
            'name' => $this->name,
        ];
    }
}
