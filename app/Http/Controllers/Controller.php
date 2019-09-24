<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

/**
 * Class Controller
 * @package App\Http\Controllers
 */
class Controller extends BaseController
{
    /**
     * @var integer HTTP status code - 200 (OK) by default
     */
    protected $statusCode = 200;

    /**
     * Gets the value of statusCode.
     *
     * @return integer
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Sets the value of statusCode.
     *
     * @param integer $statusCode the status code
     *
     * @return self
     */
    protected function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @param       $data
     * @param array $headers
     *
     * @return array
     */
    public function respond($data, $headers = [])
    {
        $response = [
            'status' => 'success',
            'data'   => empty($data) ? [] : $data
        ];

        return response()->json($response,
                                $this->getStatusCode(),
                                $headers);
    }

    /**
     * Sets an error message and returns a JSON response
     *
     * @param       $errors
     * @param array $headers
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondWithErrors($errors, $headers = [])
    {
        $data   = ['status' => 'fail'];
        $errors = json_decode($errors, true);

        $data = array_merge($data, $errors);

        return response()->json($data, $this->getStatusCode(), $headers);
    }
}

