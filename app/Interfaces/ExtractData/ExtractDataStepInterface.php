<?php

namespace App\Interfaces\ExtractData;

/**
 * Interface ExtractDataStepInterface
 *
 * @package App\Interfaces\ExtractData
 */
interface ExtractDataStepInterface
{
    /**
     * @param $data
     * @param $subactions
     * @param $options
     * @param $actions
     *
     * @return mixed
     */
    public function extract($data, $subactions, $options, $actions);
}
