<?php

namespace App\Interfaces\ConvertData;

/**
 * Class JoinDataInterface
 * @package App\Interfaces\ConvertData
 */
interface JoinDataInterface
{
    /**
     * @param      $data
     * @param null $options
     *
     * @return mixed
     */
    public function joinData($data, $options = null);
}
