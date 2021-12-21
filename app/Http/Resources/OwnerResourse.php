<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OwnerResourse extends JsonResource
{
    public static $wrap = 'user';
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
            'firstName' => $this->first_name ?? "",
            'lastName' => $this->last_name ?? "",
            'cars' => CarResourse::collection($this->cars)
        ];
    }
}
