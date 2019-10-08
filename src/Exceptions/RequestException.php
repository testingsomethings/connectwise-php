<?php

namespace App\Services\Connectwise\Exceptions;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;

class RequestException extends Exception
{
    protected $code = 401;

    /**
     * Report the exception.
     *
     * @return void
     */
     public function report()
     {
        //
     }

    /**
     * Render the exception as an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function render($request)
    {
        return response(['error' => $this->getMessage()], $this->code);
//        return JsonResponse::create(['error' => $exception->getResponse()]);
    }
}
