<?php

namespace Elodie\Projet4\Body;

class Helper {

    public function extract($text) {

        if (preg_match('/^.{1,100}\b/s', $text, $output)) {
            $text = $output[0].'...';
        }
        
        return $text;
    }

    
}

