<?php

namespace application\core;

class Router {

    protected $routes = [];
    protected $params = [];

    function __construct(){
        $routes = require 'application/routes/routes.php';
        $this->add($routes);
    }

    public function add($routes) {
        foreach ($routes as $route => $params) {
            $route = '#^\\' . $route . '$#';
            $this->routes[$route] = $params;
        }
    }

    public function match(){
        $url = trim($_SERVER['REQUEST_URI']);
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url)) {
                $this->params = $params;
                return true;
            }
        }
        return false;    
    }

    public function run(){
        if ($this->match()) {
            $path = 'application\controllers\\' . $this->params['controller'];

            if (class_exists($path)) {
                $action = $this->params['action'];
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    echo 'no found action ' . $action;
                    View::errorCode(404);
                }

            } else {
                echo 'no found controller ' . $path;
                View::errorCode(404);
            }

        } else {
              View::errorCode(404);
        }
    }

}
