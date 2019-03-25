<?php
function admin() {
    $chapterManager = new \Elodie\Projet4\Model\ChaptersManager();
    $commentManager = new \Elodie\Projet4\Model\CommentManager();

    $chapters = $chapterManager->getChapters();
    $comments = $commentManager->allComments();

    require(VIEW.'admin/profil.php');
}

function pageChapter() {
    require(VIEW.'admin/admin-chapter.php');
}

function comment() {
    require(VIEW.'admin/admin-comment.php');
}