<?php

namespace App\Services\Automated;

use App\Services\Control\ObjectControl;
use App\Services\Control\RequestControlPost;
use App\Services\Control\ResultPersistControl;

/**
 * Class CreateService
 * @package App\Services\Automated
 */
class SaveDataService extends ResultPersistControl
{
    /**
     * SaveDataService constructor.
     *
     * @param RequestControlPost $control
     * @param ObjectControl      $object
     */
    public function __construct(RequestControlPost $control,
                                ObjectControl $object)
    {
        $current_entity = $control->getClassName();
        $entity     = $object->loadClass($current_entity);
        $repository = $object->loadRepository("Save");

        $repository->setEntity($entity);
        $control->validation($entity->rules());

        $this->result = $repository->create($control->getData());
        $this->entity = $entity;


        $this->repository_entity = $object->loadRepository($current_entity,
                                                           "App\Repositories\\");
        $this->createdCode();
    }
}
