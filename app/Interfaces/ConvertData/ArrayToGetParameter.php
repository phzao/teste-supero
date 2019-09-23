<?php

namespace App\Interfaces\ConvertData;

/**
 * Class ArrayToGetParameter
 *
 * @package App\Interfaces\ConvertData
 */
class ArrayToGetParameter implements ConvertDataInterface
{
    /**
     * @param      $data
     * @param null $options
     *
     * @return mixed|string
     */
    public function convert($data, $options = null)
    {
        $stringFy = "";

        foreach ($data as $key=>$item)
        {
            if ($stringFy) {
                $stringFy .= "&";
            }

            if (strpos($item, ' ')!== false) {
                $item = urlencode($item);
            }

            $stringFy .= "$key=$item";
        }

        return $stringFy;
    }
}
