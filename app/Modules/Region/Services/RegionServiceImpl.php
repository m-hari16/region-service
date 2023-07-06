<?php

namespace App\Modules\Region\Services;

use App\Modules\Region\Repositories\IRegionRepository;
use Illuminate\Http\Request;

class RegionServiceImpl implements IRegionService
{
  protected $regionRepository;

  public function __construct(IRegionRepository $regionRepository)
  {
    $this->regionRepository = $regionRepository;    
  }

  public function getProvinces(Request $req)
  {
    if($req->province_id){
      return $this->regionRepository->searchDataProvinceById($req->province_id);
    } else {
      return $this->regionRepository->getDataProvinces();
    }
  }

  public function getCities(Request $req)
  {
    if($req->city_id){
      return $this->regionRepository->searchDataCityById($req->city_id);
    } else {
      return $this->regionRepository->getDataCities();
    }    
  }
}