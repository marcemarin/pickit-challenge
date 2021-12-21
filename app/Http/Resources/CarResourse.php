<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResourse extends JsonResource
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
            'plate_number' => $this->plate_number ?? "",
            'year' => $this->year ? $this->year->toDateString() : "",
            'brand' => $this->brand ?? "",
            'model' => $this->model ?? "",
            'color' => $this->color ?? "",
            'owner' => new OwnerResourseMin($this->owner)
        ];
    }
}
