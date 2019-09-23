<?php

namespace App\Repositories\Interfaces;

/**
 * Interface MassSearchRepositoryInterface
 *
 * @package App\Repositories\Interfaces
 */
interface SearchRepositoryInterface
{
    /**
     * @param string $cmd
     *
     * @return bool
     */
    public function isValidSearchMethod(string $cmd):bool;

    /**
     * @return array
     */
    public function getMethodDetails():array;

    /**
     * @return array
     */
    public function getRulesToMethod():array;

    /**
     * @return string
     */
    public function getMethodToExecute():string;

    /**
     * @return mixed
     */
    public function getParameters();

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function addToQuery($data = []);

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function find($data = []);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function findOrFail($id);

    /**
     * @param array $option
     *
     * @return mixed
     */
    public function findAll($option = []);

    /**
     * @param int   $paginate
     * @param array $option
     *
     * @return mixed
     */
    public function findWithPaginate($paginate=15,
                                     $option = []);
    
    /**
     * Receive from specific repository the new methods
     * @param array $repositoryMethods
     *
     * @return mixed
     */
    public function replaceMethods(array $repositoryMethods);
}
