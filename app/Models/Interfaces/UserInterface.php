<?php

namespace App\Models\Interfaces;

use App\Interfaces\Crypt\CryptStringInterface;

/**
 * Interface UserInterface
 * @package App\Models\Interfaces
 */
interface UserInterface
{
    /**
     * @param CryptStringInterface $crypt
     * @param string|null          $pass
     *
     * @return mixed
     */
    public function setPassword(CryptStringInterface $crypt,
                                string $pass = null);
    
    /**
     * @return array
     */
    public function getArrayPermissions(): array;
}
