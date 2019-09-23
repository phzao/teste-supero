<?php

namespace App\Repositories\Superclass;

use App\Interfaces\ConvertData\TranslateTypeEnum;
use App\Repositories\Interfaces\SearchRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class FindRepository
 *
 * @package App\Repositories\Superclass
 */
class FindRepository extends EntityRepository implements SearchRepositoryInterface

{
    use BeforeSearch;
    /**
     * @var array
     */
    protected $parameters = [];

    /**
     * @var array
     */
    protected $limitOrder = [];

    /**
     * @var string
     */
    protected $execute;

    /**
     * @var
     */
    protected $filterSelect = "*";

    /**
     * @var bool
     */
    protected $scope = false;

    /**
     * @var array
     */
    protected $method_details = [
        "details" => [
            "method"=>"find",
            "fields"=>[
                "id" => "required|integer"
            ]
        ],
        "list"    => [
            "method"=>"findTranslateEnum",
            "fields"=>[]
        ],
        "myForm" => [
            "method" => "myForm",
            "fields"=>[],
        ],
        "myFormUpdate" => [
            "method"=>"myFormUpdate",
            "fields"=>[
                "id" => "required|integer",
            ],
        ],
        "listWithRelation" => [
            "method"=>"listWithRelation",
            "fields"=>[
                "id"=>"integer",
            ],
        ],
    ];
    
    /**
     * @var array
     */
    protected $method_class;

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function find($data = [])
    {
        if (!$data) {
            $data = $this->parameters;
        }

        $this->findOrFail($data);

        $this->entity = TranslateTypeEnum::convert($this->entity);

        return $this->entity;
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function findAll($data = [])
    {
        if (!$data) {
            $data = $this->parameters;
        }

        $entities = $this->entity::where($data)->select($this->filterSelect)->get();
        if (empty($entities)) {
            throw new NotFoundHttpException("Register not Found");
        }

        return $entities;
    }

    public function findBetween($collumn = 'created_at', $data = [])
    {
        if (!$data) {
            $data = $this->parameters;
        }
        
        $entities = $this->entity->whereBetween($collumn, $data)->orderBy('due_date', 'dasc')->get();
        if (empty($entities)) {
            throw new NotFoundHttpException("Register not Found");
        }

        return $entities;
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function findAllWithLimit($data = [])
    {
        $this->fixParametersLimit();
        if (!$data) {
            $data = $this->parameters;
        }

        $entities = $this->entity::where($data)
            ->orderBy($this->limitOrder["orderBy"], $this->limitOrder["order"])
            ->take((int) $this->limitOrder["take"])
            ->get();

        return $entities;
    }

    /**
     * @return mixed
     */
    public function findTranslateEnum()
    {
        $entities = $this->findAll();
       
        $maps = $entities->map(function ($value) {
            return TranslateTypeEnum::convert($value);
        });

        return $maps;
    }

    /**
     * @return mixed
     */
    public function getLastInsertion()
    {
        return $this->entity->latest()->first();
    }

    /**
     * @return array
     */
    public function listWithRelation()
    {
        $collection = $this->findTranslateEnum();

        $array = [];

        foreach ($collection as $key => $value)
        {
            $array[$key] = $value;

            foreach ($this->entity->getRelations() as $model)
            {
                $value->$model = TranslateTypeEnum::convert($value->$model);

                $array[$key][$model] = $value->$model;
            }
        }

        return $array;
    }

    /**
     * @return array
     */
    public function listWithFields()
    {
        $collection = $this->entity::select($this->filterSelect)->get();
        $array = [];

        foreach ($collection as $key => $value)
        {

            $value = TranslateTypeEnum::convert($value);

            $array[$key] = $value->toArray();

            foreach ($this->parameters as $model => $field)
            {
                if (!$value->$model instanceof Collection)
                {
                    $array[$key][$model . "_" . $field] = $value->$model->$field;
                    continue;
                }

                foreach ($value->$model as $c)
                {
                    $array[$key][$model . "_" . $field][$c->id] = $c->$field;
                }
            }
        }

        return $array;
    }

    /**
     * @param Collection $collection
     * @param            $value
     * @param string     $key
     *
     * @return Collection|\Illuminate\Database\Eloquent\Model
     */
    public function mapWithKeys(Collection $collection, $value, $key = 'id')
    {
        if ($key != 'id' &&
            !in_array($key, $this->entity->getFillable()) ||
            !in_array($value, $this->entity->getFillable())) {

            return $this->entity;
        }

        $keyed = $collection->mapWithKeys(function ($item) use ($key, $value) {
            return [$item[$key] => $item[$value]];
        });
        return $keyed;
    }
    
    /**
     * @param Collection $collection
     * @param string     $key
     *
     * @return Collection|\Illuminate\Database\Eloquent\Model
     */
    public function mapCompanyName(Collection$collection, $key = 'id')
    {
        if ($key != 'id' &&
            !in_array($key, $this->entity->getFillable()) ||
            !in_array('company_id', $this->entity->getFillable())) {

            return $this->entity;
        }

        $keyed = $collection->mapWithKeys(function ($item) use ($key) {
            return [$item[$key] => $item->company->name];
        });
        return $keyed;
    }
    
    /**
     * @return mixed
     */
    public function myForm()
    {
        return $this->entity->form();
    }
    
    /**
     * @return mixed
     */
    public function myFormUpdate()
    {
        $this->findOrFail($this->parameters['id']);

        $form = $this->entity->form();

        foreach ($form as $key => $value) {
            if ($form[$key]['tag'] === 'select' ||
                $form[$key]['type'] === 'checkbox' ||
                $form[$key]['type'] === 'radio') {
                $form[$key]['selected'] = $this->entity->$key;
                continue;
            }

            $form[$key]['value'] = $this->entity->$key;
        }

        return $form;
    }

    /**
     * @param int   $paginate
     * @param array $filter
     *
     * @return mixed
     */
    public function findWithPaginate($paginate=5, $filter = [])
    {
        return $this->entity->paginate($paginate);
    }

    /**
     * @param string $cmd
     *
     * @return bool
     */
    public function isValidSearchMethod(string $cmd): bool
    {
        if (isset($this->method_details[$cmd]) &&
            method_exists($this, $this->method_details[$cmd]['method'])) {
            
            return true;
        }
        return false;
    }
    
    /**
     * @param $cmd
     */
    public function setMethodName($cmd)
    {
        $this->method_class = $this->method_details[$cmd];
    }
    
    public function enableScope()
    {
        $this->scope = true;
    }
    
    /**
     * @return bool
     */
    public function isEnableScope()
    {
        return $this->scope;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function search($id)
    {
        return $this->entity::findOrFail($id);
    }

    /**
     * @param $id
     *
     * @return mixed|void
     */
    public function findOrFail($id)
    {
        if ($id) {
            $this->parameters = ['id' => $id];
        }
        $entity = $this->entity->where($this->parameters)->select($this->filterSelect)->first();



        if (!$entity) {
            throw new NotFoundHttpException("Register not Found");
        }
        $this->setEntity($entity);
    }

    /**
     * @return array
     */
    public function getMethodDetails(): array
    {
        return $this->method_details;
    }

    /**
     * @return string
     */
    public function getMethodToExecute(): string
    {
        return $this->method_class["method"];
    }

    public function getEnum()
    {
        if (!empty($this->method_class["enum"])) {
            return $this->method_class["enum"];
        }

        return false;
    }

    /**
     * Receive from specific repository the new methods
     * @param $repositoryMethods
     */
    public function replaceMethods(array $repositoryMethods)
    {
        $this->method_details = $repositoryMethods;
    }

    /**
     * @param $repositoryMethods
     */
    public function mergeMethods($repositoryMethods)
    {
        $this->method_details = array_merge($this->method_details,
                                            $repositoryMethods);
    }

    /**
     * @param array $data
     *
     * @return mixed|void
     */
    public function addToQuery($data = [])
    {
        array_push($this->parameters, $data);
    }

    /**
     * @return array
     */
    public function getRulesToMethod(): array
    {
        return $this->method_class["fields"];
    }

    /**
     * @return array
     */
    public function getCondition()
    {
        if(!isset($this->method_class["condition"])){
            return false;
        }

        return $this->method_class["condition"];
    }

    /**
     * Novos metodos genericos p/ revisar o restante
     */

    /**
     * @param $data
     *
     * @return mixed
     */
    public function findOneWithFilter($data = [])
    {
        if (!$data) {
            $data = $this->parameters;
        }

        $warehouse = $this->entity
                         ->where($data)
                         ->first();
        if (empty($warehouse)) {
            throw new NotFoundHttpException("Registry do not exist!");
        }
        return $warehouse;
    }

    /**
     * @param array  $data
     * @param string $column
     * @param string $order
     *
     * @return mixed
     */
    public function findAllWithFilter($data = [],
                                      $column = "id",
                                      $order = 'asc')
    {
        if (!$data) {
            $data = $this->parameters;
        }

        return $this->entity
                    ->where($data)
                    ->orderBy($column, $order)
                    ->get();
    }

    /**
     * @param array  $data
     * @param string $column
     * @param string $order
     *
     * @return mixed
     */
    public function findAllWithOrFilter($data = [],
                                        $column = "id",
                                        $order = 'asc')
    {
        if (!$data) {
            $data = $this->parameters;
        }

        $query = $this->entity->toSQL();
        foreach ($data as $d)
        {
            if (count($d) > 2) {
                $query->orWhere($d[0], $d[1], $d[2]);
                continue;
            }
            $query->orWhere($d[0], $d[1]);
        }
        return $query->orderBy($column, $order)->get();
    }

    /**
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model|mixed
     */
    public function findOneWithFilterAndTranslate($data = [])
    {
        if (!$data) {
            $data = $this->parameters;
        }

        $entity =  $this->entity
                        ->where($data)
                        ->first();

        return TranslateTypeEnum::convert($entity);
    }

    /**
     * @return false|mixed|string
     */
    public function getParametersToHistory()
    {
        if (!$this->parameters) {
            return "";
        }

        return json_encode($this->parameters,true);
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function findAllWithFilterAndTranslate($data = [])
    {
        if (!$data) {
            $data = $this->parameters;
        }

        $data = $this->entity
                    ->where($data)
                    ->get();

        $list = [];
        foreach($data as $row)
        {
            $list[] = TranslateTypeEnum::convert($row);
        }

        return $list;
    }
}
