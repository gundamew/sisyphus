<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Response;

class UnsupportedMediaType extends Exception
{
    /** @return void */
    public function report()
    {
        // do not log
    }

    /** @return \Illuminate\Http\Response */
    public function render()
    {
        return response()
            ->json([
                'message' => $this->message,
            ], Response::HTTP_UNSUPPORTED_MEDIA_TYPE);
    }
}
