<?php

namespace App\Modules\Region\Services;

use Illuminate\Http\Request;

interface IRegionService
{
  public function getProvinces(Request $req);
  public function getCities(Request $req);
}