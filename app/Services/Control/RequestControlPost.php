<?php

namespace App\Services\Control;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Class RequestControl
 *
 * @package App\Services\Control
 */
class RequestControlPost extends RequestControl
{
    /**
     * RequestControlPost constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        if ($method = $request->method() !== "POST") {
            
            throw new BadRequestHttpException($method." not allowed!");
        }
        parent::__construct($request);

        //dump($this->data);
        //replace for only post data
        $this->data = $request->request->all();
        //dd($this->data);
    }
}
