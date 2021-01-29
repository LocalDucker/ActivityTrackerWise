<?php

namespace application\core;

class View{
    
    public $path;
    public $route; 

    public function __construct(/*$route*/){
        // $this->route = $route;
        // $this->path = $route['controller'] . '/' . $route['action'];
        
    }

    /*
        
    */
    public function render($page, $vars =[]){
        ob_start();
        require_once 'application/views/'. $page .'.php';
        $content = ob_get_clean();
        require_once 'application/views/layout.php';
    }

}