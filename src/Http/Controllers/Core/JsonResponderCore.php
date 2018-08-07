<?php

namespace GauravD\LaravelJsonResponder\Http\Controllers\Core;

use Symfony\Component\HttpFoundation\Response;

class JsonResponderCore
{

    private $statusCode,
            $statusText,
            $success,
            $headers,
            $data,
            $errors,
            $wrapper;

    public function __construct()
    {
        $this->setStatusCode();
        $this->setSuccess();
        $this->setHeaders();
        $this->setWrapper();
    }

    public function setStatusCode(int $statusCode = 200)
    {
        $this->statusCode = $statusCode;
        $this->statusText = $this->getStatusTextByCode($this->statusCode);
        return $this;
    }

    public function setSuccess(bool $success = true)
    {
        $this->success = $success;
        return $this;
    }

    public function setHeaders(array $headers = [])
    {
        $this->headers = $headers;
        return $this;
    }

    public function setData($data = null)
    {
        $this->data = $data;
        return $this;
    }

    public function setErrors($errors = null)
    {
        $this->errors = $errors;
        $this->setSuccess(false);
        return $this;
    }

    public function setWrapper($wrapper = 'data')
    {
        $this->wrapper = $wrapper;
        return $this;
    }

    public function respond($data = null)
    {

        $this->data = $data;

        $responseData = null;

        if ( ! empty($this->data) && empty($this->errors) ) {
            $responseData = $this->data;
        }

        if ( ! empty($this->errors ) ) {
            $responseData = $this->errors;
        }

        $response['success'] = $this->success;
        $response['status_text'] = $this->statusText;
        $response['data'] = $responseData;

        return response($response, $this->statusCode)
            ->withHeaders($this->headers);
    }


    public function getStatusTextByCode(int $statusCode)
    {
        $texts = Response::$statusTexts;

        if ( ! array_key_exists($statusCode, $texts)) {
            return null;
        }
        
        return $texts[$statusCode];
    }

}