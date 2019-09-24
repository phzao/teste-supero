<?php
declare(strict_types=1);

namespace App\Models;

use App\Utils\Dates\DatetimeControlInterface;

/**
 * Interface TaskInterface
 * @package App\Models
 */
interface TaskInterface extends ModelInterface
{
    /**
     * @return mixed
     */
    public function setOpen();

    /**
     * @param DatetimeControlInterface $datetimeControl
     *
     * @return mixed
     */
    public function setDone(DatetimeControlInterface $datetimeControl);
}
