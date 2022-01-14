<?php

namespace application\core;

use application\config\Db;

class Model{
    public $db;
    public function __construct()
    {
        $this->db = new Db();
    }

}
