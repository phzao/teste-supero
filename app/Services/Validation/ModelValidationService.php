<?php

declare(strict_types=1);

namespace App\Services\Validation;

use App\Models\ModelInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 *
 * Class ModelValidationService
 * @package App\Services\Validation
 *
 */

class ModelValidationService
{
    /**
     * @var Request
     */
    private $request;

    /**
     * ModelValidationService constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param array $data
     */
    public function addDataToRequest(array $data)
    {
        $this->request->add($data);
    }

    /**
     * @param ModelInterface $model
     * @param null           $id
     *
     * @throws \Exception
     */
    public function validateModel(ModelInterface $model, $id = null)
    {
        $rules = $model->rules($id);
        $data  = Validator::make($this->request->all(), $rules);

        if ($data->fails()) {

            $errormsg["message"] = "The given data was invalid.";
            $errormsg["errors"]  = $data->errors()->toArray();

            throw new \Exception(json_encode($errormsg));
        }
    }

    /**
     * @param $id
     *
     * @throws \Exception
     */
    public function validateID($id)
    {
        $errormsg["message"] = 'ID must be a integer!';
        $errormsg["errors"]  = [];

        if (!filter_var($id, FILTER_VALIDATE_INT)) {
            throw new \Exception(json_encode($errormsg));
        }

        if (empty($id)) {
            $errormsg["message"] =  'ID is required!';

            throw new \Exception(json_encode($errormsg));
        }
    }

    /**
     * @return array
     */
    public function getRequestData()
    {
        return $this->request->all();
    }
}
