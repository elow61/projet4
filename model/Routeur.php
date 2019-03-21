<?php

namespace Elodie\Projet4\Model;

/** Créer les routes et trouver le controller **/
class Routeur {

    private $request;

    private $routes = [ "index.php" => "controller", 
                        "chapters.php" => "controller", 
                        "connexion.php" => "controller"
                        ];

    public function __construct($request) {
        $this->request = $request;

    }
    public function renderController() {

        $request = $this->request;

        if(key_exists($request, $this->routes)) {
            $controller = $this->routes[$request];
            require(CONTROLLER.$controller.'.php');
        } else {
            echo '404';
        }
    }
}
