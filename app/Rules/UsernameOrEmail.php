<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UsernameOrEmail implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        if (!filter_var($value, FILTER_VALIDATE_EMAIL) && !preg_match('/^[A-Za-z0-9_]+$/', $value)) {
            $fail('The :attribute must be a valid email or username.');
        }
    }
}
