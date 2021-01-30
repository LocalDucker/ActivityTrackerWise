<?php

namespace application\models;

use application\core\Model;

class Main extends Model {

    public function getInfo() {
		$result = $this->db->row('SELECT `id`, `type` FROM typeofactivity');
		return $result;
	}

}