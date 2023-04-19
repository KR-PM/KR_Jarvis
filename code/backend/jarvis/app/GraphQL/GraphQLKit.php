<?php

namespace App\GraphQL;

use App\Exceptions\CustomGraphQLException;
use App\Source\StatusCode\StatusCode;

class GraphQLKit
{
    public static function throwError(StatusCode $statusCode): void
    {
        throw new CustomGraphQLException($statusCode);
    }
}
