<?php

namespace App\Modules\Region\Repositories;

interface IRegionRepository
{
  public function getDataProvinces();
  public function searchDataProvinceById(int $idProvince);
  public function getDataCities();
  public function searchDataCityById(int $idCity);
}