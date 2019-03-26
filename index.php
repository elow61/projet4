<?php 
require_once('config.php');

// $request = $_SERVER['REQUEST_URI'];
// require(MODEL.'Routeur.php');
// $routeur = new \Elodie\Projet4\Routeur\Routeur($request);
// $routeur->renderController();

require(CONTROLLER.'Controll.php');
require(CONTROLLER.'ControllerAdmin.php');

$controller = new Elodie\Projet4\Controller\Controll();
$controllerAdmin = new Elodie\Projet4\Controller\ControllerAdmin();


try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'resumeChapter') {
            $controller->resumeChapter();
        } elseif ($_GET['action'] == 'allChapters') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $controller->allChapters();
            }
        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $controller->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis');
                }
            } else {
                throw new Exception('Aucun identifiant de chapitre envoyé.');
            }
        } elseif ($_GET['action'] == 'connected') {
            $controller->connected();
        // } elseif ($_GET['action'] == 'contact') {
        //     contact();
        } elseif ($_GET['action'] == 'admin') {
            $controllerAdmin->admin();
        } elseif ($_GET['action'] == 'comment') {
            $controllerAdmin->comment();
        } elseif ($_GET['action'] == 'pageChapter') {
            $controllerAdmin->pageChapter();
        }
    } else {
        $controller->resumeChapter();
    }

} catch (Exception $e) {
    echo 'Erreur :' .$e->getMessage();
}