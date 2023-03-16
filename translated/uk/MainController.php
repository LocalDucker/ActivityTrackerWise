<?php

namespace application\controllers;

use application\core\Controller;
use application\core\View;

class MainController extends Controller{
    
    public function indexAction(){
        $types = $this->model->getTypes();
        $generalInfo = $this->model->getAllGeneralInfo();
        $stats = $this->model->getStats();
        // debug($stats);
        $vars = [
            'types' => $types,
            'generalInfo' => $generalInfo,
            'stats' => $stats
        ];
        $this->view->render('content', $vars);
    }

    public function saveRecord(){
        if($_POST){
            $isActiveType = false;
            $types = $this->model->getTypes();
            foreach($types as $type){
                if($_POST['activity_type_id'] == $type['id']){
                    $isActiveType = true;
                    break;
                }
            }

            if($isActiveType){
                $arrInfo = [];
                $dateDiff =  date_diff(date_create($_POST['start_time']),date_create($_POST['finish_time']));
                $intervalInSeconds = (new \DateTime())->setTimeStamp(0)->add($dateDiff)->getTimeStamp();
        
                if($intervalInSeconds <= 0){
                    View::errorCode('404');
                }
                $arrInfo['activity_type_id'] = $_POST['activity_type_id'];
                $arrInfo['distance'] = $_POST['distance'];
                $arrInfo['timeactivity'] = $dateDiff->d . ' Days ' . $dateDiff->h . ' Hours '. $dateDiff->i . ' Seconds';
                $arrInfo['averagespeed'] = round(($_POST['distance']/1000)/($intervalInSeconds / 60 / 60),2);
                $this->model->insertDates($arrInfo);
                View::redirect('/');
            }else{
                View::errorCode('404');
            }
        }else{
            View::errorCode('404');
        }
    }
}
