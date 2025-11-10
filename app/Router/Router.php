<?php

namespace App\Router;

class Router
{
    private $routes = [];

    public function __construct()
    {
        $this->routes = require __DIR__ . '/../config/routes.php';
    }

    public function route($uri)
    {
        if (isset($this->routes[$uri])) {
            $controller = $this->routes[$uri][0];
            $method = $this->routes[$uri][1];
            call_user_func([$controller, $method]);
        } else {
            echo "404 Not Found";
            exit;
        }
    }
}
