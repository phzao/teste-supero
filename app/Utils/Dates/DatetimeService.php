<?php

declare(strict_types=1);

namespace App\Utils\Dates;

/**
 * Class DatetimeService
 * @package App\Utils\Dates
 */
class DatetimeService implements DatetimeControlInterface
{
    /**
     * @var \DateTime
     */
    private $datetime;

    public function __construct()
    {
        $this->datetime = new \DateTime();
    }

    /**
     * @throws \Exception
     */
    public function isSetDatetime()
    {
        if (!$this->datetime instanceof \DateTime) {
            throw new \Exception('Datetime is not set!');
        }
    }

    /**
     * @param string $format
     *
     * @return string
     */
    public function getNow(string $format = 'Y-m-d H:i:s'): string
    {
        return $this->datetime->format('Y-m-d H:i:s');
    }
}
