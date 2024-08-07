<?php

namespace App\Enums;

enum Platform: string
{
    case iOS = 'iOS';
    case Android = 'Android';
    case Windows = 'Windows';
    case macOS = 'macOS';
    case Linux = 'Linux';


    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
