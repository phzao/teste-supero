<?php

namespace App\Interfaces\ConvertData;

/**
 * Class JoinArrayColumnToString
 * @package App\Interfaces\ConvertData
 */
class JoinArrayColumnToString implements JoinDataInterface
{
    /**
     * @param       $data
     * @param array $columns
     * @param null  $options
     *
     * @return mixed|string
     */
    public function joinData($data, $options = null)
    {
        $string = "";

        foreach($data as $key=>$item)
        {
            if (!empty($string)) {
                $string .=", ";
            }
            if ($options) {
                $string .= "".$data[$key][$options];
                continue;
            }
            $string .= "".$item;
        }

        return $string;
    }
}
