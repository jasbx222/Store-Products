<?php

namespace App\Models\Trait;

use Illuminate\Support\Facades\Hash;

trait PasswordTrait
{
    /**
     * Automatically hash the password when setting it.
     *
     * @param string $value  the value password from the user
     * @return void
     * this function build to hash the password for users
     */
    public function setPasswordAttribute($value)
    {
        // Ensure the password is hashed only if it's not already hashed
        if (Hash::needsRehash($value)) {
            $this->attributes ['password'] = Hash::make($value);
        } else {
            $this->attributes['password'] = $value;
        }
    }
}
