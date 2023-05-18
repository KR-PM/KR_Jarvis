<?php

namespace App\GraphQL\Mutations;

use App\Models\User;
use Auth;

class Draw
{
    public function __invoke($_, array $args)
    {
        return [
            'id' => 1,
            'name' => "oswald",
        ];
    }
}
