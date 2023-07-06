<?php

namespace App\Modules\Auth\Controllers;

use App\Common\BaseResponse\ResponseBuilder;
use App\Http\Controllers\Controller;
use App\Modules\Auth\Requests\LoginByEmailRequest;
use App\Modules\Auth\Responses\UserDataResponse;
use App\Modules\Auth\Services\ILoginService;

class LoginController extends Controller
{
  protected $loginService;

  public function __construct(ILoginService $loginService)
  {
    $this->loginService = $loginService;
  }

  public function loginWithEmail(LoginByEmailRequest $req)
  {
    $requestData = [
      'email' => $req->input('email'),
      'password' => $req->input('password'),
    ];

    $attempt = $this->loginService->login($requestData);

    $response = [
      "user" => new UserDataResponse($attempt[0]),
      "accessToken" => $attempt[1],
    ];

    return response()->json(ResponseBuilder::build(201, true, 'Login successfully', $response));

  }
}