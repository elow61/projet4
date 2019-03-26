<?php

namespace Elodie\Projet4\Controller;

class ControllerAdmin {
    
    public function admin() {
        $chapterManager = new \Elodie\Projet4\Model\ChaptersManager();
        $commentManager = new \Elodie\Projet4\Model\CommentManager();
    
        $chapters = $chapterManager->getChapters();
        $comments = $commentManager->allComments();

        $numberComment = $commentManager->numberComment();
        $numberChapter = $chapterManager->numberChapter();
        require(VIEW.'admin/profil.php');
    }
    
    public function pageChapter() {
        require(VIEW.'admin/admin-chapter.php');
    }
    
    public function comment() {
        require(VIEW.'admin/admin-comment.php');
    }
}
