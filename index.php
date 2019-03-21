<?php 
include_once('config.php');
require(CONTROLLER.'controller.php');

$request = $_GET['r'];

if ($request == 'home') {
    require_once(CONTROLLER.'home.php');
} else {
    echo '404';
}

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
        } elseif ($_GET['action'] == 'accessAdmin') {
            accessAdmin();
        }
    } else {
        resumeChapter();
    }
    
} catch (Exception $e) {
    echo 'Erreur :' .$e->getMessage();
}