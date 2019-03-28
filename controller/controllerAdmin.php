<?php

namespace Elodie\Projet4\Controller;

require_once(CORPS.'Helper.php');


class ControllerAdmin {
    private $helper;


    public function __construct() {
        $this->helper = new \Elodie\Projet4\Body\Helper();
    }
    
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
