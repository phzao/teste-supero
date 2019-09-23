<?php

namespace App\Services\Control;


use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Class RequestControl
 *
 * @package App\Services\Control
 */
class RequestControlDelete extends RequestControl
{
    /**
     * RequestControlGet constructor.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        if ($method = $request->method() !== "DELETE") {
            throw new BadRequestHttpException($method." not allowed!");
        }
        parent::__construct($request);
    }
}
