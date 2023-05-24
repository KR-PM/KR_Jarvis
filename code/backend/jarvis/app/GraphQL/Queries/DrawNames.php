<?php

namespace App\GraphQL\Queries;

use App\Models\LotteryName;

class DrawNames
{
    /**
     * @param  null  $_
     * @param  array<string, mixed>  $args
     */
    public function __invoke($_, array $args)
    {
        $a = LotteryName::select(["id","name"])
            ->where('exclude', 0)
            ->get()->toArray();
        return $a;

    }
}
