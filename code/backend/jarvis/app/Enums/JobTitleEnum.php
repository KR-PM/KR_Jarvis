<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 *
 */
final class JobTitleEnum extends Enum
{
    public const FRONTEND_ENGINEER = 0;
    public const BACKEND_ENGINEER = 1;
    public const ASSISTANT = 2;
    public const PRODUCT_MANAGER = 3;
}
