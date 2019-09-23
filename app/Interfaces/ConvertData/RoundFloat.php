<?php

namespace App\Interfaces\ConvertData;

/**
 * Class RoundFloat
 * @package App\Interfaces\ConvertData
 */
class RoundFloat implements ConvertDataInterface
{
    /**
     * @param      $data
     * @param null $options
     *
     * @return float|mixed
     */
    public function convert($data, $options = null)
    {
        $string = (string) $data;
        $split = explode(".", $string);

        if (count($split)>1 && strlen($split[1])>2) {
            $split[1] = substr($split[1], 0, 2);
        }
        $number = implode(".", $split);

        return round($number, 2);
    }
}
