<?php

namespace Pp\Kistochki\Classes\Api\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use ValidatesRequests;

    public function jsonResponse($data, $code = 200)
    {
        return response()->json(
            $data,
            $code,
            [
                'Content-Type' => 'application/json; charset=utf-8',
            ],
            JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR
        );
    }
}
