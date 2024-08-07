<?php

declare(strict_types=1);

namespace App\Rules;

use App\Enums\Platform;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidPlatformType implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Check if the value is in the enum's values
        if (!in_array($value, Platform::values())) {
            $fail(sprintf("The selected %s is invalid.", $attribute));
        }
    }
}
