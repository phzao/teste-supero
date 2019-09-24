<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\Task;
use App\Utils\Dates\DatetimeControlInterface;

/**
 * Class UserRepository
 * @package App\Repository
 */
class TaskRepository extends BaseRepository implements TaskRepositoryInterface
{
    /**
     * UserRepository constructor.
     */
    public function __construct()
    {
        $this->model = new Task();
    }

    /**
     * @param $id
     *
     * @return null|array
     */
    public function setOpen($id)
    {
        $task = $this->model::find($id);

        if (!$task) {
            return [];
        }

        $task->setOpen();
        $task->update();
    }

    /**
     * @param DatetimeControlInterface $datetimeControl
     * @param                          $id
     *
     * @return null|array
     */
    public function setDone(DatetimeControlInterface $datetimeControl, $id)
    {
        $task = $this->model::find($id);

        if (!$task) {
            return [];
        }

        $task->setDone($datetimeControl);
        $task->update();
    }
}
