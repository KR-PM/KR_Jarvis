<?php

namespace App\Source\StatusCode;

use Illuminate\Contracts\Translation\Translator;

/**
 * Class StatusCode
 * @package App\Source\StatusCode
 *
 * code/backend/pc2c/resources/lang/LOCATE/status-code.php
 */
class StatusCode
{
    // 0 ~ 1000 系統底層專用
    public const OK = 0;
    public const ACCOUNT_OR_PASSWORD_ERROR = 1;
    public const UNAUTHENTICATED = 2;

    public int $code;
    public Translator|string|array|null $message;
}
