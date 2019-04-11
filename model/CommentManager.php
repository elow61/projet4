<?php

namespace Elodie\Projet4\Model;

require_once(MODEL.'Manager.php');

class CommentManager extends Manager {

    // Réupération de tous les commentaires
    public function allComments() {
        $db = $this->dbConnect();

        $comments = $db->query('SELECT chapter_id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y %Hh%imin%ss")
        AS date_create FROM blog_comment ORDER BY comment_date DESC')
        or die(var_dump($db->errorInfo()));

        return $comments->fetchAll();
    }

    // Récupération des commentaires associé à un ID de chapitre
    public function getComments($chapterId) {
        $db = $this->dbConnect();

        $comments = $db->prepare('SELECT id, chapter_id, author, comment, report, DATE_FORMAT(comment_date, "%d/%m/%Y %Hh%imin%ss")
        AS date_create FROM blog_comment WHERE chapter_id = ? ORDER BY comment_date DESC')
        or die(var_dump($db->errorInfo()));
        $comments->execute(array($chapterId));

        return $comments->fetchAll();
    }

    // Ajout des commentaires en base
    public function addToComment($chapterId, $author, $comment) {
        $db = $this->dbConnect();

        $comments = $db->prepare('INSERT INTO blog_comment(chapter_id, author, comment, comment_date)
        VALUES(?, ?, ?, NOW())') or die (var_dump($db->errorInfo()));

        $affectedLines = $comments->execute(array($chapterId, $author, $comment));

        return $affectedLines;
    }

    // Récupération du nombre de commentaires en base
    public function numberComment() {
        $db = $this->dbConnect();

        $number = $db->query('SELECT COUNT(*) AS nb FROM blog_comment') or die(var_dump($db->errorInfo()));

        return $number->fetch();
    }
}