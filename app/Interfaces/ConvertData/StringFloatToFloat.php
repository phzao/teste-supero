<?php

namespace App\Interfaces\ConvertData;

/**
 * Class StringDecimalToDecimal
 * @package App\Interfaces\ConvertData
 */
class StringFloatToFloat implements ConvertDataInterface
{
    /**
     * @param      $data
     * @param null $options
     *
     * @return float|mixed
     */
    public function convert($data, $options=null)
    {

        $dot = strpos($data, ".");
        $comma = strpos($data, ",");

        if ($dot < $comma) {
            $data = str_replace(".","", $data);
            $data = str_replace(",",".", $data);
        }
        if ($dot > $comma) {
            $data = str_replace(",", "",$data);
        }

        return  floatval($data);
    }
}
