<?php

namespace App\Traits;

trait HttpResponses
{

    protected function success($data, $message = null, $code = 200)
    {
        return response()->json([

            'status-code' => $code,
            'status' => 'تمت العملية بنجاح',
            'message' => $message,
            'data' => $data,

        ], $code);
    }

    protected function error($data, $message = null, $code)
    {
        return response()->json([

            'status-code' => $code,
            'status' => ' 😅 تم اكتشاف خطأ ',
            'message' => $message,
            'data' => $data,

        ], $code);
    }
}
