<?php

namespace App\Modules\Region\Responses;

use Illuminate\Http\Resources\Json\JsonResource;

class CitiesResponse extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray($request)
  {
    if ($this->resource instanceof \Illuminate\Support\Collection) {
      return $this->resource->map(function($item){
        return [
          'city_id' => $item->id ?? $item->city_id,
          'city_name' => $item->cityName ?? $item->city_name,
        ];
      });
    }

    return [
      'city_id' => $this->id ?? $this->city_id,
      'city_name' => $this->cityName ?? $this->city_name,
    ];
  }
}