<?php

namespace Elodie\Projet4\Controller;

// Chargement des classes
require_once(MODEL.'ChaptersManager.php');
require_once(MODEL.'CommentManager.php');
require_once(MODEL.'ReportCommentManager.php');
require_once(MODEL.'AdminManager.php');

class Controll {
    private $helper;

    public function __construct() {
        $this->helper = new \Elodie\Projet4\Classes\Helper();
    }
    
    // chapitres contenus sur la page d'accueil
    public function resumeChapter() {
        $chapterManager = new \Elodie\Projet4\Model\ChaptersManager();
        $chapters = $chapterManager->getChapters();

        require(VIEW.'frontend/home.php');
    }

    // Chapitres contenus sur la page Chapitre
    public function allChapters() {
        $chapterManager = new \Elodie\Projet4\Model\ChaptersManager();
        $commentManager = new \Elodie\Projet4\Model\CommentManager();

        $chapter_single = $chapterManager->getChapter($_GET['id']);

        $chapters = $chapterManager->totalChapters();
        $comments = $commentManager->getComments($_GET['id']);

        // vérifie que l'ID du chapitre existe bien
        if (!empty($chapter_single)) {
            require(VIEW.'frontend/chapters.php');
        } else {
            header('Location: index.php');
        }
    }

    // Ajout de commentaires
    public function addComment($chapterId, $author, $comment) {
        $commentManager = new \Elodie\Projet4\Model\CommentManager();

        $affectedLines = $commentManager->addToComment($chapterId, $author, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire');
        } else {
            header('Location: index.php?action=allChapters&id=' . $chapterId);
        }
    }

    // Gestion de la page Connexion
    public function connected() {
        require(VIEW.'frontend/connexion.php');
    }

    // Signalement de commentaires
    public function addReportComment($first_name, $reporting_comment) {
        $reportManager = new \Elodie\Projet4\Model\ReportCommentManager();

        $report = $reportManager->insert_report_comment($first_name, $reporting_comment);

        if ($report === false) {
            throw new Exception('Impossible de signaler ce commentaire.');
        } else {
            header('Location: index.php?action=allChapters&id='. $chapterId);
        }
    }
}
