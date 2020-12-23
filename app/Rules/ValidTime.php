<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidTime implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        if (preg_match('/^(Sunday|Monday|Tuesday|Wednesday|Thursday|Friday|Saturday) ?- ?(Sunday|Monday|Tuesday|Wednesday|Thursday|Friday|Saturday) (([1][0-2])|([0][1-9])):[0-5][0-9] ?(AM|PM) ?- ?(([1][0-2])|([0][1-9])):[0-5][0-9] ?(AM|PM)$/', $value)) {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please use the 12Hr format Example: 01:00 - 12:00';
    }
}
