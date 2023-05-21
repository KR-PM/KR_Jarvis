<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class LotteryName extends Model
{
    use HasDateTimeFormatter;
    protected $table = 'lottery_names';

}
