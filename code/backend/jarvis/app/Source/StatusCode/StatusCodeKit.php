<?php

namespace App\Source\StatusCode;

class StatusCodeKit
{
    private const LANGUAGE_FILENAME = 'status-code';

    /**
     * StatusCode constructor.
     */
    public function __construct()
    {
    }

    public function get(int $code, array $args = null): StatusCode
    {
        $key = self::LANGUAGE_FILENAME.'.'.$code;

        $statusCode = new StatusCode();
        $statusCode->code = $code;
        if ($args === null) {
            $statusCode->message = trans($key);
        } else {
            $statusCode->message = trans($key, $args);
        }

        return $statusCode;
    }

    public function getMessage(int $code, array $args = null): string
    {
        return (string) $this->get($code, $args)->message;
    }
}
