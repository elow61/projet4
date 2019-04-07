<?php 
namespace Elodie\Projet4\Model;

class Manager {
    protected function dbConnect() {
        try {
            $db = new \PDO('mysql:host=localhost;dbname=projet4', 'root', 'root', 
            array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        } catch (Exception $e) {
            echo 'Ligne : ' .$e->getLine() . '<br />';  
            die('Erreur : ' .$e->getMessage()) . '<br />';
            echo 'La base de donnée n\'est pas disponible pour le moment.';
        }
        return $db;
    }
}