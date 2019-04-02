<?php

namespace Elodie\Projet4\Controller;

require_once(CORPS.'Helper.php');


class ControllerAdmin {
    private $helper;


    public function __construct() {
        $this->helper = new \Elodie\Projet4\Body\Helper();
    }
    
    // Accès à la page profil (qui est le tableau de bord)
    public function admin() {
        $chaptersManager = new \Elodie\Projet4\Model\ChaptersManager();
        $commentManager = new \Elodie\Projet4\Model\CommentManager();
    
        $chapters = $chaptersManager->getChapters();
        $comments = $commentManager->allComments();

        $numberComment = $commentManager->numberComment();
        $numberChapter = $chaptersManager->numberChapter();
        require(VIEW.'admin/profil.php');
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
        }
    }
    
    // Accès à la page des commentaires
    public function comment() {
        require(VIEW.'admin/commentAdmin.php');
    }
}
