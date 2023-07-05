<?php

namespace App\Common\HttpClient;

use Illuminate\Support\Facades\Http;

class FetchRegion
{
  protected $http;

  public function __construct()
  {
    $this->http = Http::withHeaders([
      'Content-Type' => 'application/json', 
      'accept' => 'application/json',
      'key' => config('app.region_key')
    ])->baseUrl(config('app.region_provider_url'));        
  }

  public function getProvince()
  {
    $data = $this->http->get('province');
    return $data->object();
  }

  public function getCity()
  {
    $data = $this->http->get('city');
    return $data->object();
  }

}