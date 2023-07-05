<?php

namespace App\Common\Helper\DataTransform;

class RegionTransform
{
  public function toEntityOfProvince(array $data)
  {
    $collection = collect($data)->map(function($result) {
      return [
        'id' => $result->province_id,
        'provinceName' => $result->province,
      ];
    })->all();

    return $collection;

  }

  public function toEntityOfCity (array $data)
  {
    $collection = collect($data)->map(function($result) {
      return [
        'id' => $result->city_id,
        'cityName' => $result->city_name,
        'province_id' => $result->province_id,
      ];
    })->all();

    return $collection;
  }

}