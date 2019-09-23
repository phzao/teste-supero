<?php

namespace App\Interfaces\Crypt;

/**
 * Interface cryptString
 *
 * @package App\Models\Crypt
 */
interface CryptStringInterface
{
    /**
     * @param string $string
     *
     * @return string
     */
    public function crypt(string $string):string;
}
