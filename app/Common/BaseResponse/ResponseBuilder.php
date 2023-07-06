<?php

namespace App\Common\BaseResponse;

class ResponseBuilder {
  protected $code, $data, $message, $success;
  
  public static function build($code = null, $success = null, $message = null, $data = null)
  {
    return [
      "code" => $code ?? 500,
      "success" => $success ?? false ,
      "message" => $message ?? "Something wrong",
      "data" => $data ?? null,
    ];
  }
}