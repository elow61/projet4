<?php

namespace Elodie\Projet4\Model;

require_once(MODEL.'Manager.php');

class CommentManager extends Manager {
    
    
    public function __construct() {
        $this->db = $this->dbConnect();
    }

    // Récupération des 3 derniers commentaires postés
    public function lastComments() {

        $comments = $this->db->query('SELECT chapter_id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y %Hh%imin%ss")
        AS date_create FROM blog_comment ORDER BY date_create DESC LIMIT 0, 3') or die(var_dump($this->db->errorInfo()));

        return $comments->fetchAll();
    }

    // Réupération de tous les commentaires
    public function allComments() {

        $comments = $this->db->query('SELECT chapter_id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y %Hh%imin%ss")
        AS date_create FROM blog_comment ORDER BY comment_date DESC')
        or die(var_dump($this->db->errorInfo()));

        return $comments->fetchAll();
    }

    // Récupération des commentaires associé à un ID de chapitre
    public function getComments($chapterId) {

        $comments = $this->db->prepare('SELECT id, chapter_id, author, comment, report, DATE_FORMAT(comment_date, "%d/%m/%Y %Hh%imin%ss")
        AS date_create FROM blog_comment WHERE chapter_id = ? ORDER BY comment_date DESC')
        or die(var_dump($this->db->errorInfo()));
        $comments->execute(array($chapterId));

        return $comments->fetchAll();
    }

    // Ajout des commentaires en base
    public function addToComment($chapterId, $author, $comment) {

        $comments = $this->db->prepare('INSERT INTO blog_comment(chapter_id, author, comment, comment_date)
        VALUES(?, ?, ?, NOW())') or die (var_dump($this->db->errorInfo()));

        $affectedLines = $comments->execute(array($chapterId, $author, $comment));

        return $affectedLines;
    }

    // Récupération du nombre de commentaires en base
    public function numberComment() {

        $number = $this->db->query('SELECT COUNT(*) AS nb FROM blog_comment') or die(var_dump($this->db->errorInfo()));

        return $number->fetch();
    }

    // Signaler un commentaire
    public function reportComment($commentId) {

        $report = $this->db->prepare('UPDATE blog_comment SET report = 1 WHERE id = ?')
        or die(var_dump($this->db->errorInfo()));
        $report->execute(array($commentId));

        return $report;
    }
}