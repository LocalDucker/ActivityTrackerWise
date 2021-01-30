<?php

namespace application\core;

class View{
    
    public $path;
    public $route; 

    public function __construct($route){
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
        
    }

    public function render($page, $vars = []){
        extract($vars);
        $path = 'application/views/'. $page .'.php';
        if (file_exists($path)) {
			ob_start();
			require $path;
			$content = ob_get_clean();
			require 'application/views/layout.php';
		}
    }
    	public function redirect($url) {
		header('location: '.$url);
		exit;
	}

    public static function errorCode($code) {
		http_response_code($code);
		$path = 'application/views/'.$code.'.php';
		if (file_exists($path)) {
			require $path;
		}
		exit;
    }
    
}