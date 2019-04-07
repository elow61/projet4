<?php

namespace Elodie\Projet4\Controller;

require_once(CLASSES.'Helper.php');

class ControllerAdmin {
    private $helper;

    public function __construct() {
        $this->helper = new \Elodie\Projet4\Classes\Helper();

    }

    public function auth($pseudo) {
        $adminManager = new \Elodie\Projet4\Model\AdminManager();
        $admin = $adminManager->getPseudo($pseudo);
        
        // Vérification du mot de passe saisi en le comparant à la base de donnée
        $pass_true = password_verify($_POST['mdp'], $admin['pass']);

        if (!$admin) {
            header('Location: index.php?action=connected');
        } else {
            if ($pass_true) {
                $_SESSION['id'] = $admin['id'];
                $_SESSION['pseudo'] = $pseudo;
                header('Location: index.php?action=admin');
            } else {
                header('Location: index.php?action=connected');

                $message = 'Mauvais identifiant ou mot de passe!';
            }
        }
    }

    // Accès à la page profil si l'utilisateur est connecté (qui est le tableau de bord)
    public function admin() {
   
        echo '<pre>';
        print_r($_SESSION);
        echo '</pre>';

        $chaptersManager = new \Elodie\Projet4\Model\ChaptersManager();
        $commentManager = new \Elodie\Projet4\Model\CommentManager();        

        $chapters = $chaptersManager->getChapters();
        $comments = $commentManager->allComments();

        $numberComment = $commentManager->numberComment();
        $numberChapter = $chaptersManager->numberChapter();

        require(VIEW.'admin/profil.php');
    }

    public function sessionFinish() {
        // $sessionManager = new \Elodie\Projet4\Classes\Session();
        // $session_finish = $sessionManager->destroy();

        // if ($session_finish === false) {
        //     echo 'Impossible de se déconnecter.';
        // } else {
        //     header('Location: index.php?action=connected');
        // }
        $_SESSION = array();
        setcookie(session_name(), '', time() - 42000);
        session_destroy();
        header('Location: index.php?action=connected');
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
