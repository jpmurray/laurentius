<?php

namespace App\Rules;

use App\Species;
use Illuminate\Contracts\Validation\Rule;

class HardinessCa implements Rule
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
        return in_array($value, Species::HARDINESS_CA) || $value == "null" ;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Selected canadian hardiness zone is invalid.';
    }
}
