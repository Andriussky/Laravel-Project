<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PersonalCode implements Rule
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
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (!preg_match('/^\d{11}$/', $value)) {
            return false;
        }

        return preg_match('/^[3-6]\d{10}$/', $value) === 1;
    }


    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be 11 numbers and a valid personal code.';
    }
}
