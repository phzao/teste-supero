<?php

namespace App\Services\Persist;

use App\Services\Control\RequestControlDelete;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Interfaces\CustomValidation\IntegerValidation;
use App\Repositories\Superclass\SaveRepository;
use App\Services\Control\ObjectControl;

/**
 * Class DeleteEntityService
 *
 * @package App\Services\Persist
 */
class DeleteEntityService
{
    /**
     * @var mixed FindRepository
     */
    private $repository;
    
    /**
     * DeleteEntityService constructor.
     *
     * @param RequestControlDelete $control
     * @param ObjectControl        $object
     * @param SaveRepository       $persist
     *
     * @throws \Exception
     */
    public function __construct(RequestControlDelete $control,
                                ObjectControl $object,
                                SaveRepository $persist)
    {
        
        $this->repository = $object->loadRepository($control->getClassName(),
                                              "App\Repositories\\");
        if (!$id = $control->getIdModel(new IntegerValidation())) {
            throw new NotFoundHttpException("ID invalid");
        }

        if (!$entity = $this->repository->search($id)) {
            throw new NotFoundHttpException("Registry not found!");
        }

        $persist->setEntity($entity);

        if (!$persist->destroy()) {
            $msg = "Error to delete ".$control->getClassName();
            throw new BadRequestHttpException($msg);
        }
    }
}
