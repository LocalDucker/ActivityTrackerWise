<?php

namespace application\config;


use PDO;
use PDOException;

class Db {
    private $dbConnection;

    public function __construct(){
         /* Підключення до бази даних, використовуючи драйвер */
         $dsn = 'mysql:dbname=activerecord;host=127.0.0.1';
         $user = 'mysql';
         $password = 'mysql';
         try {
             $this->dbConnection = new PDO($dsn, $user, $password);
             echo 'Connected';
         } catch (PDOException $e) {
             echo 'Failed connect to DB: ' . $e->getMessage();
         }
     }
     public function getDbConnection(){
         return $this->dbConnection;
     }
}