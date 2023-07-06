<?php

namespace App\Modules\Region\Repositories;

use App\Common\HttpClient\FetchRegion;

class RegionRepositoryAPICall implements IRegionRepository
{
  
  public function getDataProvinces()
  {
    $fetch = new FetchRegion;

    $data = $fetch->getProvince(); 

    return collect($data->rajaongkir->results);
  }

  public function searchDataProvinceById(int $idProvince)
  {
    $fetch = new FetchRegion;

    $data = $fetch->searchProvinceById($idProvince); 

    return $data->rajaongkir->results;
  }

  public function getDataCities()
  {
    $fetch = new FetchRegion;
    
    $data = $fetch->getCity();

    return collect($data->rajaongkir->results);
  }
  
  public function searchDataCityById(int $idCity)
  {
    $fetch = new FetchRegion;

    $data = $fetch->searchCityById($idCity); 

    return $data->rajaongkir->results;
  }
}