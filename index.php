<?php 
require_once('config.php');


// $request = $_SERVER['REQUEST_URI'];
// require(MODEL.'Routeur.php');

// $routeur = new \Elodie\Projet4\Model\Routeur($request);
// $routeur->renderController();


require(CONTROLLER.'controller.php');
require(CONTROLLER.'controllerAdmin.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'resumeChapter') {
            resumeChapter();
        } elseif ($_GET['action'] == 'allChapters') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                allChapters();
            }
        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis');
                }
            } else {
                throw new Exception('Aucun identifiant de chapitre envoyé.');
            }
        } elseif ($_GET['action'] == 'connected') {
            connected();
        // } elseif ($_GET['action'] == 'contact') {
        //     contact();
        } elseif ($_GET['action'] == 'admin') {
            admin();
        } elseif ($_GET['action'] == 'comment') {
            comment();
        } elseif ($_GET['action'] == 'pageChapter') {
            pageChapter();
        }
    } else {
        resumeChapter();
    }

    
    
} catch (Exception $e) {
    echo 'Erreur :' .$e->getMessage();
}