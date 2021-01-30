<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller{
    
    public function indexAction(){
        $result = $this->model->getInfo();
        $vars = [
            'info' => $result,
        ];
        $this->view->render('content', $vars);
    }
}
