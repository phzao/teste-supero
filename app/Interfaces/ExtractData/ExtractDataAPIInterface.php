<?php

namespace App\Interfaces\ExtractData;

/**
 * Interface ExtractDataAPI
 * @package App\Interfaces\ExtractData
 */
interface ExtractDataAPIInterface
{
    /**
     * @param array $data
     * @param array $extractThis
     * @param array $returnedValue
     *
     * @return array
     */
    public function extract(array $data,
                            array $extractThis,
                            array $returnedValue = []): array;
}
