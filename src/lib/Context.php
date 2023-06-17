<?php

namespace App\lib;

class Context
{
    public $path;
    public $method;
    public $params;
    public $query;
    public $body;

    public function __construct($path, $method, $params, $query, $body = null)
    {
        $this->path = $path;
        $this->method = $method;
        $this->params = $params;
        $this->query = $query;
        $this->body = $body;
    }
}