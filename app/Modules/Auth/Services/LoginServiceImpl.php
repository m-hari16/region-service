<?php

namespace App\Modules\Auth\Services;

use App\Modules\Auth\Repositories\ILoginRepository;
use Illuminate\Auth\AuthenticationException;

class LoginServiceImpl implements ILoginService
{
  protected $loginRepository;

  public function __construct(ILoginRepository $loginRepository)
  {
    $this->loginRepository = $loginRepository;
  }

  public function login(array $credentials)
  {
    $attempt = $this->loginRepository->checkCredential($credentials);
    
    if(!$attempt){
      throw new AuthenticationException();
    }

    $user = $this->loginRepository->findUserByEmail($credentials["email"]);

    $token = $this->loginRepository->getAccessToken($user);

    return [
      $user, 
      $token,
    ];
  }
}