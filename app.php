<?php
class Context
{
    public $path;
    public $method;
    public $params;
    public $query;

    public function __construct($path, $method, $params, $query)
    {
        $this->path = $path;
        $this->method = $method;
        $this->params = $params;
        $this->query = $query;
    }
}

class App
{
    public $routes = array(
        "GET" => array(),
        "POST" => array(),
        "PUT" => array(),
        "DELETE" => array()
    );

    public function __construct()
    {
    }

    public function listen()
    {
        try {

            $path = $_SERVER['REQUEST_URI'];
            $path = explode("?", $path)[0];

            $method = $_SERVER['REQUEST_METHOD'];
            $function = $this->routes[$method][$path];

            $ctx = new Context($path, $method, $_REQUEST, $_GET);
            $function($ctx);
        } catch (Exception $e) {
            echo json_encode(array(
                "code" => 500,
                "message" => "bad request",
                "reason" => $e->getMessage()
            ));
        }
    }

    public function get($path, $function)
    {
        $this->routes["GET"][$path] = $function;
    }

    public function post($path, $function)
    {
        $this->routes["POST"][$path] = $function;
    }

    public function put($path, $function)
    {
        $this->routes["PUT"][$path] = $function;
    }

    public function delete($path, $function)
    {
        $this->routes["DELETE"][$path] = $function;
    }
}
