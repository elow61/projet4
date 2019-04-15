<?php

namespace Elodie\Projet4\Controller;

use \Elodie\Projet4\Classes\Helper;
use \Elodie\Projet4\Model\AdminManager;
use \Elodie\Projet4\Model\ChaptersManager;
use \Elodie\Projet4\Model\CommentManager;
use \Elodie\Projet4\Model\ReportManager;

class ControllerAdmin {
    private $helper;

    public function __construct() {
        $this->helper = new Helper();

    }

    public function auth($pseudo) {
        $adminManager = new AdminManager();
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

        $chaptersManager = new ChaptersManager();
        $commentManager = new CommentManager();        

        $chapters = $chaptersManager->getChapters();
        $comments = $commentManager->lastComments();

        $numberComment = $commentManager->numberComment();
        $numberChapter = $chaptersManager->numberChapter();

        require(VIEW.'admin/profil.php');
    }

    public function sessionFinish() {

        $_SESSION = array();
        setcookie(session_name(), '', time());
        session_destroy();
        header('Location: index.php?action=connected');
    }
    
    // Accès à la page 'gestion' des Chapitres
    public function pageChapter() {
        $chaptersManager = new ChaptersManager();
        $chapters = $chaptersManager->totalChapters();

        require(VIEW.'admin/chapterAdmin.php');
    }

    // Ajout de nouveaux chapitres
    public function addChapter($title, $chapter) {
        $chaptersManager = new ChaptersManager();
        $newChapter = $chaptersManager->addChapter($title, $chapter);

        if ($newChapter === false) {
            throw new Exception('Impossible d\'ajouter le chapitre.');
        } else {
            header('Location: index.php?action=pageChapter');
        }
    }

    // accès à la page des modifications d'un chapitre
    function viewChangeChapter($chapterId) {
        $chaptersManager = new ChaptersManager();
        $chapter_single = $chaptersManager->getChapter($_GET['id']);

        require(VIEW.'admin/updateChapter.php');
    }

    // Modification du chapitre 
    public function changeChapter($editTitle, $editChapter, $chapterId) {
        $chaptersManager = new ChaptersManager();
        $updateChapter = $chaptersManager->updateChapter($editTitle, $editChapter, $chapterId);

        if ($updateChapter === false) {
            throw new Exception('Impossible de modifier le chapitre.');
        } else {
            header('Location: index.php?action=pageChapter');
        }

    }

    // Suppression du chapitre
    public function deleteChapter($chapterId) {
        $chaptersManager = new ChaptersManager();
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
        $commentManager = new CommentManager();
        $reportManager = new ReportManager();
        $comments = $commentManager->allComments();
        $report = $reportManager->getIdReport();

        require(VIEW.'admin/commentAdmin.php');
    }

    
}
