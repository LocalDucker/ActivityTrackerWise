<?php

namespace application\core;

use application\core\View;

abstract class Controller{
    
    public $route;
    public $view;

    public function __construct($route){
        $this->route = $route;
        $this->view = new View($route);
        $this->model = $this->loadModel();
    }
// Поламано. По-ідеї, по роуту має бути прив'язка моделі, но щось пішло не так :)
// Через це при створенні нових моделей потрібно вручну вказувати шлях
    public function loadModel() {
        $path = 'application\models\Main';
		if (class_exists($path)) {
			return new $path;
        }
	}
}
