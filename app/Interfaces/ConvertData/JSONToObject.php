<?php

namespace App\Interfaces\ConvertData;

/**
 * Class JSONToArray
 * @package App\Interfaces\ConvertData
 */
class JSONToObject implements ConvertDataInterface
{
    /**
     * @param      $data
     * @param null $options
     *
     * @return mixed
     */
    public function convert($data, $options=null)
    {
        return json_decode($data);
    }
}
