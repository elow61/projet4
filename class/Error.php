<?php

namespace Elodie\Projet4\Classes;

class Error {

    public function arrayError(): array {
        
        $error = array(
            "fields"    => 'Tous les champs ne sont pas remplis.',
            "connexion" => 'Vous n\'êtes pas connectés.',
            "noAdmin"   => 'Vous n\'êtes pas autorisé à accéder à cet endroit.',
        );
    }
}