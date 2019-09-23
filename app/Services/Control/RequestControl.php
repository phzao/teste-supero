<?php

namespace App\Services\Control;

use Illuminate\Http\Request;
use App\Models\Enums\UploadMethodEnum;
use App\Models\Interfaces\EntityInterface;
use App\Interfaces\CustomValidation\CustomValidationInterface;

/**
 * Class RequestControl
 *
 * @package App\Services\Control
 */
class RequestControl implements RequestControlInterface
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var
     */
    protected $class;

    /**
     * @var string
     */
    protected $id_class;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var string
     */
    protected $method;
    

    /**
     * RequestControl constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->data    = $request->all();
        $this->request = $request;
        $this->method  = $request->getMethod();
        $this->setClassName();

    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return false|string
     */
    public function getDataJSON()
    {
        return json_encode($this->data, true);
    }

    /**
     * Set class name for load a Model
     */
    private function setClassName()
    {
        $class = explode(".", $this->request->route()->getName());
        $class = ucfirst(current($class));
        $class = str_singular($class);
        $this->class = $class;
        $this->id_class = lcfirst($this->class);
    }

    /**
     * @return mixed
     */
    public function getClassName()
    {
        return $this->class;
    }

    /**
     * @return string
     */
    public function getPermissionName()
    {
        return strtoupper($this->class."_".$this->method);
    }

    /**
     * @param CustomValidationInterface $custom
     *
     * @return string
     */
    public function getIdModel(CustomValidationInterface $custom)
    {
        $model = $this->id_class;
        if (!$custom->isValid($this->request->$model)) {
            return false;
        }
        return $this->request->$model;
    }

    /**
     * @param array $array
     */
    public function validation(array $array = [])
    {
        $this->request->validate($array);
    }

    /**
     * @param EntityInterface $entity
     */
    public function validateMyEntity(EntityInterface $entity)
    {
        $model   = $this->id_class;
        $idModel = str_replace(",", "", $this->request->$model);

        $array = $entity->rules($idModel);
        $this->request->validate($array);
    }
    
    /**
     * @param string $cmd
     *
     * @return bool|mixed
     */
    public function existParameter(string $cmd)
    {
        if (empty($this->data[$cmd])) {
            return false;
        }
    
        return $this->data[$cmd];
    }
    
    /**
     * @param $nameRequest
     *
     * @return array|\Illuminate\Http\UploadedFile|null
     */
    public function getFile($nameRequest)
    {
        return $this->request->file($nameRequest);
    }
    
    /**
     * @param array $moreData
     */
    public function addToData(array $moreData)
    {
        $this->data = array_merge($this->data, $moreData);
    }
    
    /**
     * @param       $nameRequest
     * @param array $options
     *
     * @return array
     * @throws \ReflectionException
     */
    public function getInfoFromFile($nameRequest,
                                    $options = ["extension",
                                                "name_by_system",
                                                "size"]): array
    {
        $data = [];
        
        if (!$this->request->file($nameRequest)) {
            return $data;
        }
        $file = $this->request->file($nameRequest);
        
        foreach ($options as $option)
        {
            $method = UploadMethodEnum::getMethodFile($option);
            $data[$option] = $file->$method();
        }
        
        return $data;
    }

    public function getField($field)
    {
        if (!empty($this->data[$field])) {
            return $this->data[$field];
        }
        return false;
    }


    /*
    public function setDataAttachment()
    {
        //$today = Carbon::now();
        //$path = '/'.$today->year.'/'.$today->month.'/';
        $this->request->request->add(['extension' => $this->request->attachment->extension()]);
        $this->request->request->add(['path' => $path]);
        $this->request->request->add(['size' => $this->request->attachment->getSize()]);
        $this->request->request->add(['name_by_system' => $this->request->attachment->hashName()]);
        $this->request->request->add(['file' => $this->request->attachment]);
        $this->data = $this->request->request->all();
    }*/
}
