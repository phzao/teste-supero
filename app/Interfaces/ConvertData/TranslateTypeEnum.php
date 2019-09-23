<?php

namespace App\Interfaces\ConvertData;

use App\Models\Enums\TypeEnum;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class StringDecimalToDecimal
 *
 * @package App\Interfaces\convertData
 */
abstract class TranslateTypeEnum
{
    /**
     * @param $entity
     *
     * @return mixed
     */
    public static function convertEntity($entity)
    {
        if (!method_exists($entity, 'getEnums'))
        {
            return $entity;
        }

        $myEnums = $entity->getEnums();

        foreach ($entity->getAttributes() as $column => $value)
        {
            /**
             * Verifica se o atributo da entidade está no array myEnums
             * se tiver, busca no TypeEnum o valor dele traduzido
             */
            if (in_array($column, $myEnums) && $value)
            {
                $entity->$column = TypeEnum::getTypeName($value);
            }
        }

        return $entity;
    }

    /**
     * @param $entity
     * @param null $options
     * @return mixed
     */
    public static function convertInArray($entity)
    {
        $entity = self::convert($entity);
        return $entity->toArray();
    }

    public static function convert($entity)
    {
        if ($entity instanceof Collection) {
            foreach ($entity as $value)
            {
                self::convertEntity($value);
            }
            return $entity;
        }

        $entity = self::convertEntity($entity);
        return $entity;


    }
}
