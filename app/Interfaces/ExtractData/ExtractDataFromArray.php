<?php

namespace App\Interfaces\ExtractData;

/**
 * Interface ExtractDataFromArray
 * @package App\Interfaces\ExtractData
 */
interface ExtractDataFromArray
{
    /**
     * @param $array
     * @param $type
     * @param $contentType
     * @param $column
     *
     * @return mixed
     */
    public function extract($array, $type, $contentType, $column);
}
