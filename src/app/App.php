<?php

namespace App\App;

use Exception;
use App\lib\Context;

class App
{
    private static App $instance;

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
            $body = $method == 'POST' ? $this->parseBody() : null;

            $ctx = new Context($path, $method, $_REQUEST, $_GET, $body);

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

    private function parseBody()
    {
        $body = file_get_contents('php://input');
        $body = json_decode($body, true);
        return $body;
    }

    public static function getInstance()
    {
        if ( !isset( self::$instance ) )
        {
            self::$instance = new App();
        }
        return self::$instance;
    }
}
