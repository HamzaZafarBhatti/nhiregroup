<?php

namespace App\Enum;

enum WithdrawWalletTypeEnum: string
{
    case NHIRE = 'nhire';
    case EARNING = 'earning';

    public function getLabel(): string
    {
        return match ($this) {
            self::NHIRE => 'NHIRE Wallet',
            self::EARNING => 'Earning Wallet',
        };
    }
}
