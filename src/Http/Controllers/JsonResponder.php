<?php

namespace GauravD\LaravelJsonResponder\Http\Controllers;

use App\Http\Controllers\Controller;
use GauravD\LaravelJsonResponder\Http\Controllers\Core\JsonResponderCore;

class JsonResponder extends Controller
{

    private $responder;

    public function __construct()
    {
        $this->responder = new JsonResponderCore();
    }

    public function respond($data = null)
    {
        return $this->responder->respond($data);
    }

}