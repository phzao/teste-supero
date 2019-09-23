<?php

namespace App\Interfaces\ExtractData;

/**
 * Class ExtractElementFromArray
 * @package App\Interfaces\ExtractData
 */
class ExtractElementFromArray implements ExtractElementsInterface
{
    /**
     * @param $list
     * @param $array
     *
     * @return mixed
     */
    public function extractFromArray(&$list, $array)
    {
        foreach($list as $key=>$field)
        {
            if (!empty($array[$field])) {
                $list[$key] = $array[$field];
            }
        }

        return $list;
    }
}
