<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function generateResponse($data = [], $message = '', $statusCode = '')
    {
      $response = [
        'status_code' => $statusCode,
        'message'     => $message,
        'result'      => $data
      ];
  
      return response()->json($response, $statusCode);
    }
}
