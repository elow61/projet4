<?php

namespace Elodie\Projet4\Model;


class AdminManager extends Manager {
    
    public function __construct() {
        $this->db = $this->dbConnect();
    }
    
    // Récupération du pseudo 
    public function getPseudo($pseudo) {

        $req = $this->db->prepare('SELECT id, pass FROM administrator WHERE pseudo = ?')
        or die(var_dump($this->db->errorInfo()));
        $req->execute(array($pseudo));
        $result = $req->fetch();

        return $result;
    }
}