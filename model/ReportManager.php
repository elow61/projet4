<?php

namespace Elodie\Projet4\Model;

require_once(MODEL.'Manager.php');

class ReportManager extends Manager {


    // Insertion des commentaires signalés en base
    public function insert_report_comment($comment) {
        $db = $this->dbConnect();

        $report = $db->prepare('INSERT INTO report_comment(id_comment,
        date_reporting) VALUES(?, NOW())') or die(var_dump($db->errorInfo()));

        $report->execute(array($comment));

        return $report;
    }

    // Récupération du commentaire signalé en récupérant l'id dans la table comment
    public function getReport() {
        $db = $this->dbConnect();

        $report = $db->prepare('SELECT r.date_reporting date_report, c.comment comment FROM blog_comment c
        INNER JOIN report r ON r.id_comment = c.id') or die(var_dump($db->errorInfo()));

        return $report->fetchAll();
    }
}