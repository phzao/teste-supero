<?php

namespace App\Models\Enums;

/**
 * Class Permission
 *
 * @package App\Models
 */
abstract class FormTag
{
    const INPUT = [
        'tag'       => 'input',
        'type'      => 'text',
        'required'  => 'required',
    ];

    const SELECT = [
        'tag' => 'select',
    ];

    const CHECKBOX = [
        'tag'       => 'input',
        'type'      => 'checkbox',
        'required'  => 'required',
    ];

    const RADIO = [
        'tag'       => 'input',
        'type'      => 'radio',
        'required'  => 'required',
    ];

    const TEXTAREA = [
        'tag' => 'textarea',
        'rows' => '3',
    ];

    public static function input($params = [])
    {
        if (!self::valid($params, 'name')) {
            throw new \InvalidArgumentException("Param INPUT is wrong!");
        }
        $array = self::INPUT;
        return self::getArray($array, $params);
    }

    public static function radio($params = [])
    {
        if (!self::valid($params, 'name') || !self::validValue($params, true)) {
            throw new \InvalidArgumentException("Param SELECT is wrong!");
        }
        $array = self::RADIO;
        return self::getArray($array, $params);
    }

    public static function checkbox($params = [])
    {
        if (!self::valid($params, 'name') || !self::validValue($params)) {
            throw new \InvalidArgumentException("Param CHECKBOX is wrong!");
        }
        $array = self::CHECKBOX;
        return self::getArray($array, $params);
    }

    public static function select($params = [])
    {
        if (!self::valid($params, 'name') || !self::validValue($params, true)) {
            throw new \InvalidArgumentException("Param SELECT is wrong!");
        }
        $array = self::SELECT;
        return self::getArray($array, $params);
    }

    public static function textarea($params = [])
    {
        if (!self::valid($params, 'name')) {
            throw new \InvalidArgumentException("Param TEXTAREA is wrong!");
        }
        $array = self::TEXTAREA;
        return self::getArray($array, $params);
    }

    //Validations and Populing
    private static function getArray($array, $params)
    {
        foreach ($params as $key => $value) {
            $array[$key] = $value;
        }
        return $array;
    }

    private static function valid($params, $index)
    {
        if (!isset($params[$index])) {
            return false;
        }
        return true;
    }

    private static function validValue($params, $array = false)
    {
        self::valid($params, 'value');
        if (!is_array($params['value']) && $array) {
            return false;
        }
        return true;
    }
}
