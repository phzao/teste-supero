<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseRepository
 * @package App\Repository
 */
class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @param array $content
     *
     * @return mixed
     */
    public function create(array $content)
    {
        return $this->model::create($content);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|Model[]|mixed
     */
    public function all()
    {
        return $this->model::all();
    }

    /**
     * @param array $content
     *
     * @return \Illuminate\Database\Eloquent\Collection|Model[]|mixed
     */
    public function allBy(array $content)
    {
        return $this->model::all();
    }

    /**
     * @param $id
     *
     * @return int|mixed
     * @throws \Exception
     */
    public function delete($id)
    {
        $status = $this->model::destroy($id);

        if (!$status) {
            throw new \Exception("Record does not exist!");
        }

        return $status;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getById($id)
    {
        return $this->model::find($id);
    }

    /**
     * @return mixed
     */
    public function allWithTrashed()
    {
        return $this->model::withTrashed()->get();
    }

    /**
     * @param       $id
     * @param array $content
     *
     * @return mixed
     */
    public function update($id, array $content)
    {
        return $this->model::find($id)->update($content);
    }
}
