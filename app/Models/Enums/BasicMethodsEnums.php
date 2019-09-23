<?php

namespace App\Models\Enums;

/**
 * Class BasicMethodsEnums
 * @package App\Models\Enums
 */
abstract class BasicMethodsEnums
{
    /**
     * @return array
     * @throws \ReflectionException
     */
    public static function getAttributes($myClass)
    {
        $attributes = new \ReflectionClass($myClass);
        return $attributes->getConstants();
    }
    
    /**
     * @param $attribute
     * @param $class
     *
     * @return bool
     * @throws \ReflectionException
     */
    public static function getAttribute($attribute, $class)
    {
        $attributes = new \ReflectionClass($class);
        $list = $attributes->getConstants();
        if (!self::isValid($attribute)) {
            return false;
        }
        
        return $list[$attribute];
    }
    
    /**
     * @param $attribute
     *
     * @return bool
     */
    public static function isValid($attribute)
    {
        if (!defined("static::".$attribute)) {
            return false;
        }
        
        return true;
    }
}
