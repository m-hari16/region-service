<?php

namespace App\Modules\Region\Responses;

use Illuminate\Http\Resources\Json\JsonResource;

class ProvincesResponse extends JsonResource
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
          'province_id' => $item->id ?? (int)$item->province_id,
          'province_name' => $item->provinceName ?? $item->province,
        ];
      });
    }

    return [
      'province_id' => $this->id ?? (int)$this->province_id,
      'province_name' => $this->provinceName ?? $this->province,
    ];
  }
}