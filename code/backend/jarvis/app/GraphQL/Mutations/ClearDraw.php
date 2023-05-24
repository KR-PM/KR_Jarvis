<?php

namespace App\GraphQL\Mutations;

use App\Models\LotteryName;

class ClearDraw
{
    public function __invoke($_, array $args)
    {
        LotteryName::query()->update(['exclude' => 0]);
        return 'success';
    }
}
