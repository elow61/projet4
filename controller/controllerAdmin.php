<?php

namespace Elodie\Projet4\Controller;

require_once(CLASSES.'Helper.php');
require_once(CLASSES.'Session.php');

class ControllerAdmin {
    private $helper;

    public function __construct() {
        $this->helper = new \Elodie\Projet4\Classes\Helper();

    }
    // Accès à la page profil si l'utilisateur est connecté (qui est le tableau de bord)
    public function admin($pseudo) {
        $chaptersManager = new \Elodie\Projet4\Model\ChaptersManager();
        $commentManager = new \Elodie\Projet4\Model\CommentManager();        

        $chapters = $chaptersManager->getChapters();
        $comments = $commentManager->allComments();

        $numberComment = $commentManager->numberComment();
        $numberChapter = $chaptersManager->numberChapter();

        // SESSION
        $adminManager = new \Elodie\Projet4\Model\AdminManager();
        $admin = $adminManager->getPseudo($_POST['pseudo']);
        
        $session = new \Elodie\Projet4\Classes\Session();
        // Vérification du mot de passe saisi en le comparant à la base de donnée
        $pass_true = password_verify($_POST['mdp'], $admin['pass']);
        // if ($session->isConnected('id', 'pseudo')) {
        //     require(VIEW.'admin/profil.php');
        // } 
        if (!$admin) {
            $message = 'Mauvais mot de passe ou identifiant.';
            $session->noConnected();
        } else {
            if ($pass_true) {
                $session->isConnected('id', 'pseudo');
                $_SESSION['id'] = $admin['id'];
                $_SESSION['pseudo'] = $pseudo;
                
                $session->display();
                require(VIEW.'admin/profil.php');
            } else {
                $session->noConnected();
                $message = 'Mauvais identifiant ou mot de passe!';
            }
        }

        
    }

    public function sessionFinish() {
        $sessionManager = new \Elodie\Projet4\Classes\Session();
        $session_finish = $sessionManager->destroy('id', 'pseudo');

        if ($session_finish === false) {
            echo 'Impossible de se déconnecter.';
        } else {
            header('Location: index.php?action=connected');
        }
    }
    
    // Accès à la page des Chapitres
    public function pageChapter() {
        $chaptersManager = new \Elodie\Projet4\Model\ChaptersManager();
        $chapters = $chaptersManager->totalChapters();

        require(VIEW.'admin/chapterAdmin.php');
    }

    // Ajout de nouveaux chapitres
    public function addChapter($title, $chapter) {
        $chaptersManager = new \Elodie\Projet4\Model\ChaptersManager();
        $newChapter = $chaptersManager->addChapter($title, $chapter);

        if ($newChapter === false) {
            throw new Exception('Impossible d\'ajouter le chapitre.');
        } else {
            header('Location: index.php?action=pageChapter');
        }
    }

    // accès à la page des modifications d'un chapitre
    function viewChangeChapter($chapterId) {
        $chaptersManager = new \Elodie\Projet4\Model\ChaptersManager();
        $chapter_single = $chaptersManager->getChapter($_GET['id']);

        require(VIEW.'admin/updateChapter.php');
    }

    // Modification du chapitre 
    public function changeChapter($editTitle, $editChapter, $chapterId) {
        $chaptersManager = new \Elodie\Projet4\Model\ChaptersManager();
        $updateChapter = $chaptersManager->updateChapter($editTitle, $editChapter, $chapterId);

        if ($updateChapter === false) {
            throw new Exception('Impossible de modifier le chapitre.');
        } else {
            header('Location: index.php?action=pageChapter');
        }

    }

    // Suppression du chapitre
    public function deleteChapter($chapterId) {
        $chaptersManager = new \Elodie\Projet4\Model\ChaptersManager();
        $deleteChapter = $chaptersManager->deleteChapter($chapterId);

        if ($deleteChapter === false) {
            throw new Exception('Impossible de supprimer ce chapitre.');
        } else {
            echo '<script>alertButton()</script>';
            header('Location: index.php?action=pageChapter');
        }
    }
    
    // Accès à la page des commentaires
    public function comment() {
        require(VIEW.'admin/commentAdmin.php');
    }
}
