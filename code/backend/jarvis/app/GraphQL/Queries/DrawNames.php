<?php

namespace App\GraphQL\Queries;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DrawNames
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        return [
            [
                "id" => 1,
                "name" => "oswald"
            ],
            [
                "id" => 2,
                "name" => "roy"
            ],
        ];
    }
}
