<?php

namespace GauravD\LaravelJsonResponder\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class JsonResponder extends Controller
{

    private $statusCode = 200;

    private $headers = [];

    private $data;

    private $wrapper = 'data';
    
    private $withSuccess = true;

    private $error = false;

    private $errorMessage;

    private $validator;

    /**
     * @param mixed $headers
     *
     * @return self
     */
    public function setHeaders(array $headers = [])
    {
        $this->headers = $headers;

        return $this;
    }

    /**
     * @param mixed $errorMessage
     *
     * @return self
     */
    public function setErrorMessage($errorMessage = null)
    {
        $this->errorMessage = $errorMessage;
        $this->error = true;

        return $this;
    }


    public function respond($data = null)
    {

        $this->data = $data;

        $response = [];

        if (true == $this->withSuccess) {
            $response['success'] = $this->error ? false : true;
        }

        if (!empty($this->data) && !$this->error) {
            $response['data'] = $this->data;
        }

        if ($this->error) {
            $response['data'] = $this->errorMessage ?? 'Error!';
        }

        return response($response, $this->statusCode)
            ->withHeaders($this->headers);
    }



    

    /**
     * @param mixed $validator
     *
     * @return self
     */
    public function setValidator(Validator $validator)
    {
        $this->validator = $validator;
        $this->error = true;
        $this->errorMessage = ['validation' => $validator->errors()];

        return $this;
    }

    /**
     *
     * @return self
     */
    public function withoutSuccess()
    {
        $this->withSuccess = false;

        return $this;
    }

    /**
     * @param mixed $wrapper
     *
     * @return self
     */
    public function setWrapper($wrapper = null)
    {
        $this->wrapper = $wrapper;

        return $this;
    }
}