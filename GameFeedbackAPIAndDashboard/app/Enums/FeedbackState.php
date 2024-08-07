<?php

namespace App\Enums;

enum FeedbackState: string
{
    case New = 'new';
    case In_Progress = 'inProgress';
    case Completed = 'completed';


    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}

