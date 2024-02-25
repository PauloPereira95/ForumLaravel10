<?php

use App\Enums\SupportStatus;
if(!function_exists('getStatusSupport')) {
    function getStatusSupport($status) {
       return SupportStatus::fromValue($status);
    }
}
