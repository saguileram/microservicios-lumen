<?php

namespace App\Traits;

use Illuminate\Http\Response;



trait ApiResponse
{

public function successResponse($data, $code = Response::HTTP_OK)
{
   return response($data, $code)->header('Content-type', 'application/json');
}

public function errrorMessage($message, $code)
{
    return response($message, $code)->header('Content-type', 'application/json');
}

}