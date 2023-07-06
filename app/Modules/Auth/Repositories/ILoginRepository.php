<?php

namespace App\Modules\Auth\Repositories;

use App\Models\User;

interface ILoginRepository
{
  public function checkCredential(array $credential);
  public function findUserByEmail($email);
  public function getAccessToken(User $user);
}