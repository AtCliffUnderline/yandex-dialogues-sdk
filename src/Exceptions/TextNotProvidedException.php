<?php

class TextNotProvidedException extends Exception
{
    public function __construct($message = "Text for response is not provided", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}