<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Utils\Dates\DatetimeControlInterface;

/**
 * Interface UserRepositoryInterface
 * @package App\Repository
 */
interface TaskRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * @param $id
     *
     * @return mixed
     */
    public function setOpen($id);

    /**
     * @param DatetimeControlInterface $datetimeControl
     * @param                          $id
     *
     * @return mixed
     */
    public function setDone(DatetimeControlInterface $datetimeControl, $id);
}
