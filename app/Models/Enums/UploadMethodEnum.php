<?php

namespace App\Models\Enums;

/**
 * Class UploadMethodEnum
 * @package App\Models\Enums
 */
abstract class UploadMethodEnum extends BasicMethodsEnums
{
    const path = "getPath";
    const size = "getSize";
    const extension      = "getClientOriginalExtension";
    const name_by_user   = "getClientOriginalName";
    const name_by_system = "hashName";
    
    /**
     * @param $method
     *
     * @return bool
     * @throws \ReflectionException
     */
    public static function getMethodFile($method)
    {
        if (!defined("static::".$method)) {
            return false;
        }
        
        return self::getAttribute($method, __CLASS__);
    }
}
