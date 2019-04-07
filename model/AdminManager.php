<?php

namespace Elodie\Projet4\Model;

require_once(MODEL.'Manager.php');

class AdminManager extends Manager {
    // Récupération du pseudo 
    public function getPseudo($pseudo) {
        $db = $this->dbConnect();

        $req = $db->prepare('SELECT id, pass FROM administrator WHERE pseudo = ?')
        or die(var_dump($db->errorInfo()));
        $req->execute(array($pseudo));
        $result = $req->fetch();

        return $result;
    }
}