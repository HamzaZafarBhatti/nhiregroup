<?php

namespace App\Enum;

enum WithdrawStatusEnum: string
{
    case PENDING = '0';
    case ACCEPTED = '1';
    case REJECTED = '2';

    public function getLabel(): string
    {
        return match ($this) {
            self::PENDING => 'Pending',
            self::ACCEPTED => 'Accepted',
            self::REJECTED => 'Rejected',
        };
    }
}
