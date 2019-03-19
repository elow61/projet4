<?php

// Chargement des classes
require_once('model/ChaptersManager.php');
require_once('model/CommentManager.php');

// Chapitres contenus sur la page d'accueil
function resumeChapter() {
    $chapterManager = new \Elodie\Projet4\Model\ChaptersManager();
    $chapters = $chapterManager->getChapters();

    require('view/frontend/viewHome.php');
}

// Chapitres contenus sur la page Chapitre
function allChapters() {
    $chapterManager = new \Elodie\Projet4\Model\ChaptersManager();
    $commentManager = new \Elodie\Projet4\Model\CommentManager();

    $chapters = $chapterManager->totalChapters();
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/viewChapters.php');
}

// Récupération de l'ID des chapitres
function getIdChapter() {
    $chapterManager = new \Elodie\Projet4\Model\ChaptersManager();
    $commentManager = new \Elodie\Projet4\Model\CommentManager();

    $chapter = $chapterManager->getChapter($_GET['id']);
    $comment = $commentManager->getComments($_GET['id']);

    require('view/frontend/viewChapters.php');
}

// Récupération des commentaires
function addComment($chapterId, $author, $comment) {
    $commentManager = new \Elodie\Projet4\Model\CommentManager();

    $affectedLines = $commentManager->addToComment($chapterId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire');
    } else {
        header('Location: index.php?action=allChapters&id=' . $chapterId);
    }
}

// Gestion des pages
function connected() {
    require('view/frontend/viewConnexion.php');
}

function contact() {
    require('view/frontend/viewContact.php');
}

function accessAdmin() {
    require('view/admin/viewHomeAdmin.php');
}

