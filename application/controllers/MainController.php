<?php

namespace application\controllers;

use application\core\Controller;
use application\core\View;

class MainController extends Controller{
    
    public function indexAction(){
        $result = $this->model->getTypes();
        $vars = [
            'types' => $result,
        ];
        $this->view->render('content', $result);
    }

    public function saveRecord(){
        if($_POST){
            debug($_POST);
        }else{
            View::errorCode('404');
        }
    }
}
