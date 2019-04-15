<?php

namespace Elodie\Projet4\Model;


class AdminManager extends Manager {
    // Récupération du pseudo 
    public function getPseudo($pseudo) {

        $req = $db->prepare('SELECT id, pass FROM administrator WHERE pseudo = ?')
        or die(var_dump($this->db->errorInfo()));
        $req->execute(array($pseudo));
        $result = $req->fetch();

        return $result;
    }
}