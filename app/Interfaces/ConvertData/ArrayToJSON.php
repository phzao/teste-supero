<?php

namespace App\Interfaces\ConvertData;

/**
 * Class ArrayToJSON
 * @package App\Interfaces\ConvertData
 */
class ArrayToJSON implements ConvertDataInterface
{
    /**
     * @param      $data
     * @param null $options
     *
     * @return false|mixed|string
     */
    public function convert($data, $options=null)
    {
        return json_encode($data);
    }
}
