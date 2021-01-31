<?php

namespace application\models;

use application\core\Model;

class Main extends Model {

    public function getTypes() {
        $result = $this->db->row('SELECT `id`, `type` FROM activity_types');
		return $result;
	}

}