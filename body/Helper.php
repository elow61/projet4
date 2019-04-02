<?php

namespace Elodie\Projet4\Body;

class Helper {

    // Méthode qui extrait une partie d'un texte
    public function extract($text) {

        if (preg_match('/^.{1,100}\b/s', $text, $output)) {
            $text = $output[0].'...';
        }
        
        return $text;
    }

    
}

