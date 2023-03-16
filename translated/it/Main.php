<?php

namespace application\models;

use application\core\Model;

class Main extends Model {

    public function getTypes() {
        $result = $this->db->row('SELECT `id`, `type` FROM activity_types');
		return $result;
    }
    public function getAllGeneralInfo()
    {
        $result = $this->db->row('SELECT * FROM generalinfo gi
        join `activity_types` at on at.id = gi.activity_type_id ORDER BY gi.id DESC');
		return $result;
    }
    public function getStats(){
        $queryForLongestStats = 'SELECT *
        FROM generalinfo
         WHERE distance = (select max(distance) from generalinfo gi join `activity_types` at on at.id = gi.activity_type_id  WHERE at.type = "%s")';

        $queryForTotalStats = 'SELECT SUM(distance) as total_distance
        FROM generalinfo gi join `activity_types` at on at.id = gi.activity_type_id
         WHERE ';
        
        $maxRide = $this->db->row(sprintf($queryForLongestStats,'ride'));
        $maxRun = $this->db->row(sprintf($queryForLongestStats,'run'));
        $totalRide = $this->db->row($queryForTotalStats.'at.type = "ride"');
        $totalRun = $this->db->row($queryForTotalStats.'at.type = "run"');
        $result = [
            'longestRide' => array_shift($maxRide),
            'longestRun' => array_shift($maxRun),
            'totalRide' => array_shift($totalRide),
            'totalRun' => array_shift($totalRun),
        ];
		return $result;
    }
    
    public function insertDates(array $arr) {
        $this->db->insert("generalinfo",$arr);
    }

}