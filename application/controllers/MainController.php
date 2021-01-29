<?php

namespace application\controllers;

use application\core\Controller;
use application\config\Db;

class MainController extends Controller{
    
    public function indexAction(){

        $db = new Db;
        $db->getDbConnection();

        $this->view->render('content');
    }
}
