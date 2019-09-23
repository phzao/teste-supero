<?php

namespace App\Models\Enums;

/**
 * Class CustomerPreferencesEnum
 * @package App\Models\Enums
 */
abstract class ShipperPreferencesEnum
{
    const SEND_INVOICE = "send_invoice";

    const ORIGIN = "origin";

    /**
     * @var array
     */
    protected static $namesDescription = [
        self::SEND_INVOICE => "Envio da Invoice",
    ];

    protected static $defaultOptions = [
        self::SEND_INVOICE => "customer",
    ];

    protected static $allOptions = [
        self::SEND_INVOICE => ["customer", "DATI", "base"],
    ];

    /**
     * @return array
     */
    public static function getDescriptions()
    {
        return self::$namesDescription;
    }

    public static function getOptions($description)
    {
        return self::$allOptions[$description];
    }

    /**
     * @return array
     */
    public static function getDefaultValues()
    {
        return self::$defaultOptions;
    }
}
