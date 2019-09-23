<?php

namespace App\Interfaces\ConvertData;

/**
 * Class DatiWayArray
 * @package App\Interfaces\ConvertData
 */
class DateBRToDatetime implements ConvertDataInterface
{
    /**
     * @param $data
     * @param null $options
     * @return mixed|string
     */
    public function convert($data, $options = null)
    {
        if (strpos($data, 'null') !== false) {
            return false;
        }
        if (strpos($data,"/") === false) {
            return $data;
        }
        $replaced = preg_replace('/[\\\"]/', "", $data);
        $replaced = str_replace("[", "", $replaced);
        $replaced = str_replace("]", "", $replaced);
        $replaced = str_replace("\n", "", $replaced);


        $date = explode(" ", $replaced)[0];
        $dateFormat = explode("/", $date);


        return $dateFormat[2] . "-" . $dateFormat[1] . "-" . $dateFormat[0];
    }
}
