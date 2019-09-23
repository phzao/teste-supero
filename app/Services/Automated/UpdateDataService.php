<?php

namespace App\Services\Automated;

use App\Interfaces\CustomValidation\IntegerValidation;
use App\Repositories\Superclass\FindRepository;
use App\Services\Control\ObjectControl;
use App\Services\Control\RequestControlPut;
use App\Services\Control\ResultPersistControl;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;

/**
 * Class UpdateService
 * @package App\Services\Automated
 */
class UpdateDataService extends ResultPersistControl
{
    /**
     * UpdateDataService constructor.
     *
     * @param RequestControlPut $control
     * @param ObjectControl     $object
     * @param FindRepository    $findRepository
     */
    public function __construct(RequestControlPut $control,
                                ObjectControl $object,
                                FindRepository $findRepository)
    {
        $current_entity = $control->getClassName();
        $entity         = $object->loadClass($current_entity);
        $repository     = $object->loadRepository("Save");

        $repository->setEntity($entity);
        $control->validateMyEntity($entity);

        if (!$id = $control->getIdModel(new IntegerValidation())) {
            throw new NotAcceptableHttpException("Invalid ID");
        }

        $findRepository->setEntity($entity);
        $model = $findRepository->search($id);

        $repository->setEntity($model);

        $repository->fill($control->getData());
        $repository->update();
        $this->result = $repository->getEntity();
    }

}
