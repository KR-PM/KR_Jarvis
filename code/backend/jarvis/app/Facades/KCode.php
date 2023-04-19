<?php

namespace App\Facades;

use App\Source\StatusCode\StatusCodeKit;
use Illuminate\Support\Facades\Facade;

class KCode extends Facade
{
    protected static function getFacadeAccessor()
    {
        return StatusCodeKit::class;
    }
}
