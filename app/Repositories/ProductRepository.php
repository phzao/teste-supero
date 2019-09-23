<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Superclass\FindRepository;

/**
 * Class ProductRepository
 * @package App\Repositories
 */
class ProductRepository extends FindRepository
{
    /**
     * @var array
     */
    private $myMethods = [

        "listWithFields" => [
            "method" => "listWithFields",
            "fields" => [
                "office" => "in:cnpj,ie,type,created_at",
            ]
        ],
    ];

    /**
     * AddressRepository constructor.
     */
    public function __construct()
    {
        $this->entity = new Product();
        $this->mergeMethods($this->myMethods);
        $this->enableScope();
    }
}
