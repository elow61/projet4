<?php

// namespace Elodie\Projet4\Routeur;

// require(CONTROLLER.'Controll.php');

// /** Créer les routes et trouver le controller **/
// class Routeur {

//     private $request;

//     private $routes = [ "index.php" => ["controller" => 'Controll', "mehod" => 'resumeChapter'], 
//                         "chapters.php" => ["controller" => 'Controll', "method" => 'allChapters'], 
//                         "connexion.php" => ["controller" => 'Controll', "method" => 'connected']
//                         ];

//     public function __construct($request) {
//         $this->request = $request;

//     }
//     public function renderController() {

//         $request = $this->request;

//         if(key_exists($request, $this->routes)) {
//             $controller = $this->routes[$request]['controller'];
//             $method = $this->routes[$request]['method'];

//             $currentController = new $controller();
//             $currentController->method();
//         } else {
//             echo '404';
//         }
//     }
// }
