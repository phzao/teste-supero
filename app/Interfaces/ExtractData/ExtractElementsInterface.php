<?php

namespace App\Interfaces\ExtractData;

/**
 * Interface ExtractElementsInterface
 * @package App\Interfaces\ExtractData
 */
interface ExtractElementsInterface
{
    /**
     * @param $list
     * @param $array
     *
     * @return mixed
     */
    public function extractFromArray(&$list, $array);
}
