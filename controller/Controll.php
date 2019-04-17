<?php

namespace Elodie\Projet4\Controller;

use \Elodie\Projet4\Classes\Helper;
use \Elodie\Projet4\Model\AdminManager;
use \Elodie\Projet4\Model\ChaptersManager;
use \Elodie\Projet4\Model\CommentManager;
use \Elodie\Projet4\Model\ReportManager;

// Chargement des classes
require_once(MODEL.'ChaptersManager.php');
require_once(MODEL.'CommentManager.php');
require_once(MODEL.'ReportManager.php');
require_once(MODEL.'AdminManager.php');
require_once(CLASSES.'Helper.php');

class Controll {
    private $helper;

    public function __construct() {
        $this->helper = new Helper();
    }
    
    // chapitres contenus sur la page d'accueil
    public function resumeChapter() {
        $chapterManager = new ChaptersManager();
        $chapters = $chapterManager->getChapters();

        require(VIEW.'frontend/home.php');
    }

    // Chapitres contenus sur la page Chapitre
    public function allChapters() {
        $chapterManager = new ChaptersManager();
        $commentManager = new CommentManager();
        $reportingManager = new ReportManager();
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
        $commentManager = new CommentManager();

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
    public function addReport($chapterId, $commentId) {
        $reportManager = new ReportManager();
        $commentManager = new CommentManager();

        $reports = $commentManager->reportComment($commentId);
        $report = $reportManager->insert_report($commentId);
        


        if ($reports === false || $report === false) {
            throw new Exception('Impossible de signaler ce commentaire.');
        } else {
            header('Location: index.php?action=allChapters&id='. $chapterId . '&report=success');
        }
    }
}
