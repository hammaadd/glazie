<?php

namespace App\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\Rule;

class OldMatchnew implements Rule
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
    public function passes($attribute, $value,$parameter)
    {
        return Hash::check($value, user()->password);

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Old password does not matched.';
    }
}
