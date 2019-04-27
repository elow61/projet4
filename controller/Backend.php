<?php

namespace Elodie\Projet4\Controller;

use \Elodie\Projet4\Classes\Helper;
use \Elodie\Projet4\Model\AdminManager;
use \Elodie\Projet4\Model\ChaptersManager;
use \Elodie\Projet4\Model\CommentsManager;
use \Elodie\Projet4\Model\ReportManager;

class Backend {
    private $helper;

    public function __construct() {
        $this->helper = new Helper();

    }
    // Authentification de l'admin
    public function auth($pseudo) {
        $adminManager = new AdminManager();
        $admin = $adminManager->getPseudo($pseudo);
        
        // Vérification du mot de passe saisi en le comparant à la base de donnée
        $pass_true = password_verify($_POST['mdp'], $admin['pass']);

        if (!$admin) {
            header('Location: index.php?action=connected&co=no-admin');
            $message = '<p>Mauvais identifiant ou mot de passe</p>';
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
    // Déconnexion de l'admin 
    public function sessionFinish() {

        $_SESSION = array();
        setcookie(session_name(), '', time());
        session_destroy();
        header('Location: index.php?action=connected&co=deco');
    }

    // Accès à la page profil si l'utilisateur est connecté
    public function admin() {

        $chaptersManager = new ChaptersManager();
        $commentManager = new CommentsManager();        
        $reportManager = new ReportManager();

        $chapters = $chaptersManager->getChapters();
        $comments = $commentManager->lastComments();

        $numberReport = $reportManager->numberReports();
        $numberComment = $commentManager->numberComment();
        $numberChapter = $chaptersManager->numberChapter();
        
        require(VIEW.'backend/profil.php');
    }
    // ---------------------------------------------------------------------

    // Accès à la page 'gestion' des Chapitres
    public function pageChapter() {
        $chaptersManager = new ChaptersManager();
        $chapters = $chaptersManager->totalChapters();

        require(VIEW.'backend/chapterAdmin.php');
    }

    // Ajout de nouveaux chapitres
    public function addChapter($title, $chapter) {
        $chaptersManager = new ChaptersManager();
        $newChapter = $chaptersManager->addChapter($title, $chapter);

        if ($newChapter === false) {
            throw new Exception('Impossible d\'ajouter le chapitre.');
        } else {
            header('Location: index.php?action=pageChapter&chap=add');
        }
    }

    // accès à la page des modifications d'un chapitre
    function viewChangeChapter($chapterId) {
        $chaptersManager = new ChaptersManager();
        $chapter_single = $chaptersManager->getChapter($_GET['id']);

        require(VIEW.'backend/updateChapter.php');
    }

    // Modification du chapitre 
    public function changeChapter($editTitle, $editChapter, $chapterId) {
        $chaptersManager = new ChaptersManager();
        $updateChapter = $chaptersManager->updateChapter($editTitle, $editChapter, $chapterId);

        if ($updateChapter === false) {
            throw new Exception('Impossible de modifier le chapitre.');
        } else {
            header('Location: index.php?action=pageChapter&chap=modified');
        }

    }

    // Suppression du chapitre
    public function deleteChapter($chapterId) {
        $chaptersManager = new ChaptersManager();
        $commentManager = new CommentsManager();
        $reportManager = new ReportManager();
        $deleteChapter = $chaptersManager->deleteChapter($chapterId);
        $deleteComment = $commentManager->delete_comment($chapterId);
        $deleteReport = $reportManager->deleteReportComment();

        if ($deleteChapter === false || $deleteComment === false || $deleteReport === false) {
            throw new Exception('Impossible de supprimer ce chapitre.');
        } else {
            header('Location: index.php?action=pageChapter&chap=delete');
        }
    }
    
    // ---------------------------------------------------------------------

    // Accès à la page des commentaires
    public function comment() {
        $commentManager = new CommentsManager();
        $reportManager = new ReportManager();
        $comments = $commentManager->allComments();
        $report = $reportManager->getIdReport();

        require(VIEW.'backend/commentAdmin.php');
    }

    // Accès à la page traitant d'un commentaire signalé
    public function viewComment($commentId) {
        $commentManager = new CommentsManager();

        $comment = $commentManager->getComment($_GET['id']);
        require(VIEW.'backend/viewComment.php');
    }

    // Valide le commentaire signalé
    public function validComment($commentId) {
        $reportManager = new ReportManager();
        $commentManager = new CommentsManager();

        // Supprime le commentaire de la table des reports
        $reportValid = $reportManager->deleteReport($_GET['id']);

        // Initialise le commentaire en tant que "non signalé"
        $commentValid = $commentManager->validateComment($_GET['id']);

        if ($reportValid === false || $commentValid === false) {
            throw new Exception('Impossible de valider le commentaire.');
        } else {
            header('Location: index.php?action=comment&comm=validate');
        }
    }

    // Suppression d'un commentaire
    public function deleteComment($commentId) {
        $reportManager = new ReportManager();
        $commentManager = new CommentsManager();

        // Supprime le commentaire dans l'ensemble de la base
        $reportDelete = $reportManager->deleteReport($_GET['id']);
        $commentDelete = $commentManager->deleteComment($_GET['id']);

        if ($reportDelete === false || $commentDelete === false) {
            throw new Exception('Impossible de supprimer le commentaire.');
        } else {
            header('Location: index.php?action=comment&comm=delete');
        }
    }

    
}
