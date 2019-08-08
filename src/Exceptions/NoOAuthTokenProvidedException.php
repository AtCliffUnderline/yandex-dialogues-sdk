<?php


class NoOAuthTokenProvidedException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct('You have not provided OAuth token.', $code, $previous);
    }
}