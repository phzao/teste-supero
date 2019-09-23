<?php

namespace App\Interfaces\ExtractData;

/**
 * Class ExtractArrayTosubaction_column
 *
 * @package App\Interfaces\ExtractData
 */
class ExtractArrayToStep implements ExtractDataStepInterface
{
    /**
     * @param $data
     * @param $subAction
     * @param $options
     * @param $actions
     *
     * @return bool|mixed|string
     */
    public function extract($data, $subAction, $options, $actions)
    {
        $access_by = $subAction["email_sub_action_access_by"];

        if (!$data[$access_by]) {
            return false;
        }

        return $data[$access_by];
    }
}
