<?php

namespace App\Interfaces\ConvertData;

/**
 * Interface ConvertDataInterface
 * @package App\Interfaces\ConvertData
 */
interface ConvertDataTemplateInterface
{
    /**
     * @param        $data
     * @param array  $columns
     * @param string $columnWildCard
     * @param null   $options
     *
     * @return mixed
     */
    public function convert($data,
                            $columns = [],
                            $columnWildCard = "",
                            $options = null);
}
