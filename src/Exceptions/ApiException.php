<?php

namespace MuharremYildirim\KolayGelsin\Exceptions;

use Exception;

class ApiException extends Exception
{
    /**
     * __construct
     *
     * @param  string $message
     * @param  int $code
     * @param  Exception $previous
     * @return void
     */
    public function __construct($message, $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
