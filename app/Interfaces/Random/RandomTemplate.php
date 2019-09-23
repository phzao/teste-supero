<?php

namespace App\Interfaces\Random;

/**
 * Class RandomTemplate
 * @package App\Interfaces\Random
 */
class RandomTemplate implements RandomInterface
{
    public function random($data = [])
    {
        $chosen = array_rand($data);

        return $data[$chosen];
    }
}
