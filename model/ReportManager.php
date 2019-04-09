<?php

namespace Elodie\Projet4\Model;

require_once(MODEL.'CommentManager.php');

class ReportManager extends CommentManager {
    // Récupération des commentaires signalés associé à l'id du commentaire
    public function getIdReport() {
        $db = $this->dbConnect();

        $reportId = $db->query('SELECT * FROM blog_comment AS c INNER JOIN report_comment AS r ON c.id = r.id_comment');
        

        return $reportId->fetchAll();
    }

    // Insertion des commentaires signalés en base
    public function insert_report($commentId) {
        $db = $this->dbConnect();

        $report = $db->prepare('INSERT INTO report_comment(id_comment,
        date_reporting) VALUES(?, NOW())') or die(var_dump($db->errorInfo()));

        $report->execute(array($commentId));

        return $report;
    }

    // Récupération de la table report
    public function reporting() {
        $db = $this->dbConnect();

        $reporting = $db->query('SELECT id_comment FROM report_comment') or die(var_dump($db->errorInfo()));
        return $reporting->fetchAll();
    }
 
}