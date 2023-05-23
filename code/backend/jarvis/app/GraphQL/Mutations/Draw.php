<?php

namespace App\GraphQL\Mutations;

use App\Models\LotteryName;

class Draw
{
    public function __invoke($_, array $args)
    {

        $draw_list = LotteryName::where('exclude', 0)->get()->toArray();
        if (empty($draw_list)) {
            return [
                "id" => 0,
                "name" => "nobody",
            ];
        }
        $rng = array_rand($draw_list);

        LotteryName::where('id',$draw_list[$rng]['id'])->update(['exclude' => 1]);

        return $draw_list[$rng];
    }
}
