<?php

namespace App\Http\Controllers;
use App\Services\Automated\FindControlService;
use App\Services\Automated\SaveDataService;
use App\Services\Automated\UpdateDataService;
use App\Services\Persist\DeleteEntityService;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;


/**
 * Class Controller
 * @package App\Http\Controllers
 */
class Controller extends BaseController
{

    public function store(SaveDataService $validation)
    {
        return $validation->getResult();
    }

    /**
     * @param UpdateDataService        $persist
     *
     * @return string
     */
    public function update(UpdateDataService $persist)
    {
        return $persist->getResult();
    }

    /**
     * @param FindControlService $repository
     *
     * @return string
     */
    public function index(FindControlService $repository)
    {
        return $repository->getResult();
    }

    /**
     * @return mixed
     */
    public function show()
    {
         throw new BadRequestHttpException("Invalid Path!");
    }

    /**
     * @param DeleteEntityService      $delete_entity
     *
     * @return array
     */
    public function destroy(DeleteEntityService $delete_entity)
    {
        return [];
    }
}

