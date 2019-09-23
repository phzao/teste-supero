<?php

namespace App\Services\Control;

/**
 * Class ResultControl
 * @package App\Services\Control
 */
class ResultPersistControl
{
    /**
     * @var string
     */
    protected $result = "";

    /**
     * @var
     */
    protected $entity;

    /**
     * @var
     */
    protected $repository_entity;

    /**
     * @var int
     */
    protected $http_code;
    
    /**
     * @return string
     */
    public function getResult()
    {
        return $this->result;
    }

    public function createdCode()
    {
        $this->http_code = 201;
    }

    /**
     * @return int
     */
    public function getCode()
    {
        return $this->http_code;
    }

    /**
     * @param null $id
     */
    public function updatedCode($id = null)
    {
        $this->http_code = 204;

        if ($id) {
            $this->http_code = 200;
        }
    }

    /**
     * @return mixed
     */
    public function getSavedID()
    {
        return $this->result->id;
    }

    /**
     * @return mixed
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @return mixed
     */
    public function getRepository()
    {
        return $this->repository_entity;
    }
}
