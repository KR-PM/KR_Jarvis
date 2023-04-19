<?php

use App\Source\StatusCode\StatusCode;

/**
 * code/backend/pc2c/app/Source/StatusCode/StatusCode.php
 */
return [
    // 0 ~ 1000 系统底层专用
    StatusCode::OK => 'ok',
    StatusCode::ACCOUNT_OR_PASSWORD_ERROR => 'account or password error',
    StatusCode::UNAUTHENTICATED => 'unauthenticated',
];
