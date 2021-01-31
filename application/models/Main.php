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
        join `activity_types` at on at.id = gi.activity_type_id');
		return $result;
    }
    
    public function insertDates(array $arr) {
        $this->db->insert("generalinfo",$arr);
    }

}