<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class ArrayAtLeastOneRequired implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        foreach ($value as $v)
                if ($v !== null)
                    return true;
        
        return $fail("At least 1 ingredient is required...");
    }
}