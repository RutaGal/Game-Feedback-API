<?php

namespace App\Enums;

enum Category: string
{
    case Bug = 'bug';
    case Suggestion = 'suggestion';
    case Praise = 'praise';
    case Inquiry = 'inquiry';


    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}

