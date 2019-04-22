<?php 
namespace Elodie\Projet4\Model;

class Manager {
    
    private $db;

    protected function dbConnect() {

        $this->db = new \PDO("mysql:host=localhost;dbname=projet4;charset=utf8", 'root', 'root', array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        return $this->db;
    }
}