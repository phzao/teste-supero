<?php

namespace App\Interfaces\Crypt;

use Illuminate\Support\Facades\Hash;

/**
 * Class Hash
 *
 * @package App\Models\Crypt
 */
class Hashing implements CryptStringInterface
{
    public function crypt(string $string): string
    {
        return Hash::make($string);
    }
}
