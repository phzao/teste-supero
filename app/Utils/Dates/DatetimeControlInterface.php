<?php
declare(strict_types=1);

namespace App\Utils\Dates;

/**
 * Interface DatetimeControlInterface
 * @package App\Utils\Dates
 */
interface DatetimeControlInterface
{
    /**
     * @param string $format
     *
     * @return \DateTime
     */
    public function getNow(string $format = 'Y-m-d H:i:s'): string;
}
