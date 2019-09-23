<?php

namespace App\Services\Automated;

use App\Services\Control\ExtractFromDateControl;
use App\Services\Control\ObjectControl;
use App\Services\Control\RequestControlGet;
use App\Services\Control\ResultControl;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;

/**
 * Class ControlRepositoryService
 *
 * @package App\Services
 */
class FindControlService extends ResultControl
{
    /**
     * FindControlService constructor.
     *
     * @param RequestControlGet      $control
     * @param ObjectControl          $object
     * @param ExtractFromDateControl $dateControl
     * @param bool                   $automatic
     * @param string                 $path
     */
    public function __construct(RequestControlGet $control,
                                ObjectControl $object,
                                ExtractFromDateControl $dateControl,
                                $automatic = true,
                                $path = "App\Repositories\\")
    {

        $repository = $object->loadRepository($control->getClassName(), $path);

        if (!$automatic) {
            return false;
        }

        if (!$method_param = $control->existParameter("cmd")) {
            throw new NotAcceptableHttpException("cmd must be set!");
        }
        
        if (!$repository->isValidSearchMethod($method_param)) {
            throw new NotAcceptableHttpException("cmd or method invalid!");
        }
        
        $repository->setMethodName($method_param);

        $rules = $repository->getRulesToMethod();
        if ($rules){
            $control->validation($rules);
        }

        $method = $repository->prepareToFind($control->getData());

        $this->result = $repository->$method();

    }
}
