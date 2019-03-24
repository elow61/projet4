<?php

namespace Elodie\Projet4\Model;

require_once('model/Manager.php');

class CommentManager extends Manager {

    // Récupération des commentaires associé à un ID de chapitre
    public function getComments($chapterId) {
        $db = $this->dbConnect();

        $comments = $db->prepare('SELECT chapter_id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y %Hh%imin%ss")
        AS date_create FROM blog_comment WHERE chapter_id = ? ORDER BY comment_date DESC')
        or die(print_r($db->errorInfo()));
        $comments->execute(array($chapterId));

        return $comments;
    }

    // Ajout des commentaires en base
    public function addToComment($chapterId, $author, $comment) {
        $db = $this->dbConnect();

        $comments = $db->prepare('INSERT INTO blog_comment(chapter_id, author, comment, comment_date)
        VALUES(?, ?, ?, NOW())') or die (print_r($db->errorInfo()));

        $affectedLines = $comments->execute(array($chapterId, $author, $comment));

        return $affectedLines;

    }
}