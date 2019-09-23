<?php

namespace App\Models\Enums;

/**
 * Class SubstatusEnum
 *
 * @package App\Models\Enums
 */
abstract class SubstatusEnum
{
    const ATIVO_EMBARCANDO  = "1A";
    const ATIVO_S_EMBARQUE  = "1S";
    const ATIVO_RADAR       = "1R";
    const ATIVO_CONSULTORIA = "1C";

    /** @var array user friendly named type */
    protected static $typeName = [
        self::ATIVO_EMBARCANDO  => 'Ativo Embarcando',
        self::ATIVO_S_EMBARQUE  => 'Ativo S/ Embarque',
        self::ATIVO_RADAR       => 'Ativo Radar',
        self::ATIVO_CONSULTORIA => 'Ativo Consultoria',
    ];

    /**
     * @param  string $typeShortName
     * @return string
     */
    public static function getTypeName($typeShortName)
    {
        if (!isset(static::$typeName[$typeShortName]))
        {
            return "Unknown type ($typeShortName)";
        }

        return static::$typeName[$typeShortName];
    }

    /**
     * @return array<string>
     */
    public static function getAvailableTypes()
    {
        return [
            self::ATIVO_EMBARCANDO,
            self::ATIVO_S_EMBARQUE,
            self::ATIVO_RADAR,
            self::ATIVO_CONSULTORIA
        ];
    }
}
