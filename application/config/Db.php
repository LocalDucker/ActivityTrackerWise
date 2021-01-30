<?php

namespace application\config;


use PDO;
use PDOException;

class Db {
    protected $db;

    public function __construct(){
         /* Підключення до бази даних, використовуючи драйвер */
         $dsn = 'mysql:dbname=activerecord;host=127.0.0.1';
         $user = 'mysql';
         $password = 'mysql';
         try {
             $this->db = new PDO($dsn, $user, $password);
         } catch (PDOException $e) {
             echo 'Failed connect to DB: ' . $e->getMessage();
         }
     }

     public function query($sql, $params = []) {
		$stmt = $this->db->prepare($sql);
		if (!empty($params)) {
			foreach ($params as $key => $val) {
				$stmt->bindValue(':'.$key, $val);
			}
		}
		$stmt->execute();
		return $stmt;
	}

	public function row($sql, $params = []) {
		$result = $this->query($sql, $params);
		return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function column($sql, $params = []) {
		$result = $this->query($sql, $params);
		return $result->fetchColumn();
    }
    
}