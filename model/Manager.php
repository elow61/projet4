<?php 
namespace Elodie\Projet4\Model;

class Manager {
    protected function dbConnect() {
        $db = new \PDO('mysql:host=localhost;dbname=projet4', 'root', 'root', 
        array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));

        return $db;
    }
}