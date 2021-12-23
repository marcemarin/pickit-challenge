<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function returnError($dataKey = "data", $data = null, $message = 'Error', $code = 500)
    {
        return response()->json(
            [
                $dataKey => $dataKey,
                'data' => $data,
                'success' => false,
                'message' => $message
            ],
            $code
        );
    }

    public function returnSuccess($data = null, $message = 'Success', $code = 200)
    {
        return response()->json(
            [
                'data' => $data,
                'success' => true,
                'message' => $message
            ],
            $code
        );
    }
}
