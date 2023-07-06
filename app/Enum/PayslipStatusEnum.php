<?php

namespace App\Enum;

enum PayslipStatusEnum: string
{
    case PENDING = '0';
    case ACCEPTED = '1';
    case REJECTED = '2';
}
