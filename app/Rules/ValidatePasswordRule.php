<?php

namespace App\Rules;

use App\Models\teacher;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class ValidatePasswordRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    /**
     * @var string
     */
    private $user_email;
    public function __construct($user_email)
    {
        //
        $this->email = $user_email;
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
        $password = teacher::where('email', $this->email)->first();
        if($password) {
            if (Hash::check($value, $password->password)) {
                return true;
            }
        }
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Password does not match.';
    }
}
