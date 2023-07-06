<?php

namespace App\Modules\Auth\Services;

interface ILoginService
{
  public function login(array $credentials);
}
