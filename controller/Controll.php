<?php

namespace Elodie\Projet4\Controller;

// Chargement des classes
require_once(MODEL.'ChaptersManager.php');
require_once(MODEL.'CommentManager.php');
require_once(MODEL.'AdminManager.php');
require_once(CLASSES.'Session.php');

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

    // Récupération des commentaires pour les ajouter en base
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
        $session = new \Elodie\Projet4\Classes\Session();

        require(VIEW.'frontend/connexion.php');
    }
}
