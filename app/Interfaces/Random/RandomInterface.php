<?php

namespace App\Interfaces\Random;

/**
 * Interface RandomInterface
 * @package App\Interfaces\Random
 */
interface RandomInterface
{
    /**
     * @param array $data
     *
     * @return mixed
     */
    public function random($data = []);
}
