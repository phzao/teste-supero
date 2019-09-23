<?php

namespace App\Interfaces\ExtractData;

/**
 * Class ExtractElement
 * @package App\Interfaces\ExtractData
 */
class ExtractElementTemplate implements ExtractEqualElementInterface
{
    /**
     * @param        $first
     * @param        $second
     * @param string $col_first
     * @param string $col_second
     *
     * @return array|mixed
     */
    public function extractEqual($first,
                                 $second,
                                 $col_first = "id",
                                 $col_second = "template_email_id")
    {
        $ids_templates = array_values(
                            array_column($first,
                                         $col_first));

        $ids_used_templates = array_values(
                                array_column($second,
                                             $col_second));

        return array_values(array_diff($ids_templates, $ids_used_templates));
    }
}
