<?php

namespace GauravD\LaravelJsonResponder\Http\Controllers;

use App\Http\Controllers\Controller;

class JsonResponder extends Controller
{

    private $statusCode = 200;

    private $headers = [];

    private $data = [];
    
    private $withSuccess = true;

    private $error = false;

    private $errorMessage = '';


    /**
     * @param mixed $data
     *
     * @return self
     */
    public function setData(array $data = [])
    {
        $this->data = $data;

        return $this;
    }

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


    public function respond()
    {

        $data = [];

        if (true == $this->withSuccess) {
            $data['success'] = $this->error ? false : true;
        }

        if (count($this->data)) {
            $data['data'] = $this->data;
        }

        return response($data, $this->statusCode)
            ->withHeaders($this->headers);
    }


}