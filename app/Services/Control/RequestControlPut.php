<?php

namespace App\Services\Control;


use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class RequestControl
 *
 * @package App\Services\Control
 */
class RequestControlPut extends RequestControl
{
    /**
     * RequestControlPut constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        if ($method = $request->method() !== "PUT") {
            
            throw new BadRequestHttpException($method." not allowed!");
        }
        
        if(!$request->all()) {
            throw new NotFoundHttpException("It's Required data!");
        }
        
        parent::__construct($request);
    
        //replace for only put data
        $this->data = $request->input();
    }
}
