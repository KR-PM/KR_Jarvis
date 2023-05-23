<?php

namespace App\GraphQL\Queries;

use App\Models\LotteryName;
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
        $a = LotteryName::select(["id","name"])
            ->get()->toArray();
        return $a;

    }
}