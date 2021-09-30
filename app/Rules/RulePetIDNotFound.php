<?php

namespace App\Rules;

use App\Models\Pet;
use Illuminate\Contracts\Validation\Rule;

class RulePetIDNotFound implements Rule
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
        $petIDFound = Pet::where('petID', $value)->exists();

        return $petIDFound;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Pet ID not found';
    }
}
