<?php

namespace App\Modules\Region\Repositories;

use App\Models\CityRegion;
use App\Models\ProvinceRegion;

class RegionRepositoryImpl implements IRegionRepository
{
  
  public function getDataProvinces()
  {
    return ProvinceRegion::all();
  }

  public function searchDataProvinceById(int $idProvince)
  {
    return ProvinceRegion::findOrFail($idProvince);
  }

  public function getDataCities()
  {
    return CityRegion::all();
  }
  
  public function searchDataCityById(int $idCity)
  {
    return CityRegion::findOrFail($idCity);    
  }
}