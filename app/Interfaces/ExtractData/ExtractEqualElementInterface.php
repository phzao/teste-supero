<?php

namespace App\Interfaces\ExtractData;

/**
 * Interface ExtractEqualElementInterface
 * @package App\Interfaces\ExtractData
 */
interface ExtractEqualElementInterface
{
    /**
     * @param        $first
     * @param        $second
     * @param string $col_first
     * @param string $col_second
     *
     * @return mixed
     */
    public function extractEqual($first,
                                 $second,
                                 $col_first = "id",
                                 $col_second = "template_email_id");
}
