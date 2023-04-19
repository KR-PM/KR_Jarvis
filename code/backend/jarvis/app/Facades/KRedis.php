<?php

namespace App\Facades;

use App\Source\Redis\RedisKit;
use Illuminate\Support\Facades\Facade;

class KRedis extends Facade
{
    protected static function getFacadeAccessor()
    {
        return RedisKit::class;
    }
}
