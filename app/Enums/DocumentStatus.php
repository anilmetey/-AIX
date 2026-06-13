<?php

namespace App\Enums;

enum DocumentStatus: string
{
    case PENDING = 'pending';
    case PROCESSING = 'processing';
    case COMPLETED = 'completed';
    case FAILED = 'failed';

    public function label(): string
    {
        return match($this) {
            self::PENDING => 'Bekliyor',
            self::PROCESSING => 'İşleniyor',
            self::COMPLETED => 'Hazır',
            self::FAILED => 'Hata',
        };
    }
}
