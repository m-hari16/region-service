<?php

namespace App\Modules\Region\Controllers;

use App\Common\BaseResponse\ResponseBuilder;
use App\Http\Controllers\Controller;
use App\Modules\Region\Responses\CitiesResponse;
use App\Modules\Region\Responses\ProvincesResponse;
use App\Modules\Region\Services\IRegionService;
use Illuminate\Http\Request;

class RegionController extends Controller
{

  protected $regionService;

  public function __construct(IRegionService $regionService)
  {
    $this->regionService = $regionService;    
  }

  public function getProvinces(Request $req)
  {
    $data = $this->regionService->getProvinces($req);

    return response()->json(ResponseBuilder::build(200, true, 'Ok', new ProvincesResponse($data)), 200);
  }

  public function getCities(Request $req)
  {
    $data = $this->regionService->getCities($req);
    
    return response()->json(ResponseBuilder::build(200, true, 'Ok', new CitiesResponse($data)), 200);    
  }

}