<?php

namespace App\Services\Control;

/**
 * Class ResultControl
 * @package App\Services\Control
 */
class ResultControl
{
    /**
     * @var string
     */
    protected $result = "";
    
    /**
     * @return string
     */
    public function getResult()
    {
        return $this->result;
    }
}
