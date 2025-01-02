<?php
namespace App\ApiResponse;

class Response
{
    public static function SendResponse($code=200, $message='', $data = null)
    {
        $respnse = [
            'code' => $code,
            'message' => $message,
            'data' => $data
        ];
        return response()->json($respnse, $code);
     
    }
}