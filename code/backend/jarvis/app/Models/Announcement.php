<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  Announcement extends Model
{
    use HasDateTimeFormatter;
    use HasFactory;

    protected $table = 'announcements';
}
