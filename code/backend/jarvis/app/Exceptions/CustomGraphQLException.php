<?php

namespace App\Exceptions;

use App\Source\StatusCode\StatusCode;
use Exception;
use GraphQL\Error\ClientAware;
use GraphQL\Error\ProvidesExtensions;

final class CustomGraphQLException extends Exception implements ClientAware, ProvidesExtensions
{
    protected $code;

    public function __construct(StatusCode $statusCode)
    {
        parent::__construct($statusCode->message);

        $this->code = $statusCode->code;
    }

    public function isClientSafe(): bool
    {
        return true;
    }

    public function getExtensions(): ?array
    {
        return [
            'code' => $this->code,
        ];
    }
}
