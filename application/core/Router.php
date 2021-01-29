<?php

namespace application\core;

class Router {

    protected $routes = [];
    protected $params = [];

    function __construct(){
        $routes = require 'application/routes/routes.php';
        $this->add($routes);
    }

    function add() {
        foreach ($routes as $route => $params) {
            $route = '#^\\' . $route . '$#';
            $this->routes[$route] = $params;
        }
    }

    function match(){
        $url = trim($_SERVER['REQUEST_URI']);
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url)) {
                $this->params = $params;
                return true;
            }
        }
        return false;    
    }

    function run(){
        if ($this->match()) {
            $path = 'app\controllers\\' . $this->params['controller'];
            if (class_exists($path)) {
                $action = $this->params['action'];
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    View::error(404);
                }

            } else {
                View::error(404);
            }

        } else {
            View::error(404);
        }
    }

}
