<?php 
session_start();

require_once('config.php');
// $request = $_SERVER['REQUEST_URI'];
// require(MODEL.'Routeur.php');
// $routeur = new \Elodie\Projet4\Routeur\Routeur($request);
// $routeur->renderController();

require(CONTROLLER.'Controll.php');
require(CONTROLLER.'ControllerAdmin.php');

$controller = new \Elodie\Projet4\Controller\Controll();
$controllerAdmin = new \Elodie\Projet4\Controller\ControllerAdmin();


try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'resumeChapter') {
            $controller->resumeChapter();
        } 
        elseif ($_GET['action'] == 'allChapters') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $controller->allChapters();
            }
        } 
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    $controller->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis');
                }
            } else {
                throw new Exception('Aucun identifiant de chapitre envoyé.');
            }
        } 
        elseif ($_GET['action'] === 'report') {
            
                    $controller->addReport($_GET['id'], $_GET['commentId']);
                
        }
        elseif ($_GET['action'] == 'connected') {
            $controller->connected();
        } 
        elseif ($_GET['action'] == 'auth') {
            $controllerAdmin->auth($_POST['pseudo']);
        } 
        elseif ($_GET['action'] == 'admin') {
            if (isset($_SESSION['id']) && $_SESSION['id'] > 0) {
                $controllerAdmin->admin();
            } else {
                throw new Exception('Vous n\'êtes pas connectés.');
                header('Location: index.php?action=connected');
            }
        } 
        elseif ($_GET['action'] == 'sessionFinish') {
            $controllerAdmin->sessionFinish();
        } 
        elseif ($_GET['action'] == 'pageChapter') {
            if (isset($_SESSION) && $_SESSION['id'] > 0) {
                $controllerAdmin->pageChapter();
            } else {
                throw new Exception('Vous n\'êtes pas autorisé à accéder à cet endroit.');
            }
        } 
        elseif ($_GET['action'] == 'addChapter') {
            if (isset($_SESSION) && $_SESSION['id'] > 0) {
                if (!empty($_POST['newTitle']) && !empty($_POST['newChapter'])) {
                    $controllerAdmin->addChapter($_POST['newTitle'], $_POST['newChapter']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis');
                }
            } else {
                throw new Exception('Vous n\'êtes pas autorisé à ajouter un chapitre.');
            }
        } 
        elseif ($_GET['action'] == 'comment') {
            if (isset($_SESSION) && $_SESSION['id'] > 0) {
                $controllerAdmin->comment();
            } else {
                throw new Exception('Vous n\'êtes pas autorisé à accéder à cet endroit.');
            }
        } 
        elseif ($_GET['action'] == 'viewChangeChapter') {
            if (isset($_SESSION) && $_SESSION['id'] > 0) {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $controllerAdmin->viewChangeChapter($_GET['id']);
                } else {
                    throw new Exception('Aucun chapitre trouvé !');
                }
            } else {
                throw new Exception('Vous n\'êtes pas autorisé à accéder à cet endroit.');
            }
            
        } 
        elseif ($_GET['action'] == 'changeChapter') {
            if (isset($_SESSION) && $_SESSION['id'] > 0) {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_POST['editTitle']) && !empty($_POST['editChapter'])) {
                        $controllerAdmin->changeChapter($_POST['editTitle'], $_POST['editChapter'], $_GET['id']);
                    } else {
                        throw new Exception('Tous les champs ne sont pas remplis.');
                    }
                }
            } else {
                throw new Exception('Vous n\'êtes pas autorisé à accéder à cet endroit.');
            }
        } 
        elseif ($_GET['action'] == 'deleteChapter') {
            if (isset($_SESSION) && $_SESSION['id'] > 0) {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $controllerAdmin->deleteChapter($_GET['id']);
                } else {
                    throw new Exception('Impossible de supprimer ce chapitre.');
                }
            } else {
                throw new Exception('Vous n\'êtes pas autorisé à accéder à cet endroit.');
            }
        }
        elseif ($_GET['action'] == 'viewComment') {
            if (isset($_SESSION)) {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $controllerAdmin->viewComment($_GET['id']);
                } else {
                    throw new Exception('Impossible de visualiser le commentaire.');
                }
            } else {
                throw new Exception('Vous n\'êtes pas autorisé à accéder à cet endroit.');
            }
        }
        elseif ($_GET['action'] == 'validComment') {
            if (isset($_SESSION)) {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $controllerAdmin->validComment($_GET['id']);
                } else {
                    throw new Exception('Impossible de valider le commentaire.');
                }
            } else {
                throw new Exception('Vous n\'êtes pas autorisé à accéder à cet endroit.');
            }
        }
    } else {
        $controller->resumeChapter();
    }

} catch (Exception $e) {
    echo 'Erreur :' .$e->getMessage();
}