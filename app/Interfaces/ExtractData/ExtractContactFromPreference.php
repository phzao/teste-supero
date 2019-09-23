<?php

namespace App\Interfaces\ExtractData;

use App\Interfaces\ConvertData\JoinArrayColumnToString;

/**
 * Class ExtractContactFromPreference
 * @package App\Interfaces\ExtractData
 */
class ExtractContactFromPreference implements ExtractDataFromArray
{
    /**
     * @var JoinArrayColumnToString
     */
    private $joinData;

    /**
     * ExtractContactFromPreference constructor.
     */
    public function __construct()
    {
        $this->joinData = new JoinArrayColumnToString();
    }

    /**
     * @param $array
     * @param $type
     * @param $contentType
     * @param $column
     *
     * @return mixed|string
     */
    public function extract($array, $type, $contentType, $column)
    {
        $list = [];

        foreach($array as $item)
        {
            if (!empty($type) &&
                !empty($item[$column]) &&
                $item[$type]===$contentType) {
                $list[] = $item[$column];
            }

            if (empty($type) && !empty($item[$column]) ){
                $list[] = $item[$column];
            }
        }

        return $this->joinData->joinData($list);
    }
}
