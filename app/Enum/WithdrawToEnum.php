<?php

namespace App\Enum;

enum WithdrawToEnum: string
{
    case BANK = 'bank';
    case USDT = 'usdt';

    public function getLabel(): string
    {
        return match ($this) {
            self::BANK => 'Bank',
            self::USDT => 'USDT (TRC20)',
        };
    }
}
