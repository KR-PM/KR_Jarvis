<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Foundation\Auth\User as AuthUser;
use Laravel\Sanctum\HasApiTokens;

class User extends AuthUser
{
    use HasDateTimeFormatter;
    use HasApiTokens;
}
