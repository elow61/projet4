<?php

namespace Elodie\Projet4\Model;

require_once(MODEL.'CommentManager.php');

class ReportManager extends CommentManager {
    
    public function __construct() {
        $this->db = $this->dbConnect();
    }
    
    // Récupération des commentaires signalés associé à l'id du commentaire
    public function getIdReport() {

        $reportId = $this->db->query('SELECT c.id comment_id, c.chapter_id chapter_id, c.author author, c.comment comment, 
        DATE_FORMAT(c.comment_date, "%d/%m/%Y %Hh%imin%ss") date_create, 
        r.id_comment id_comm, DATE_FORMAT(r.date_reporting, "%d/%m/%Y %Hh%imin%ss") date_report
        FROM blog_comment AS c 
        INNER JOIN report_comment AS r 
        ON c.id = r.id_comment')
        or die(var_dump($this->db->errorInfo()));
        
        return $reportId->fetchAll();
    }

    // Insertion des commentaires signalés en base
    public function insert_report($commentId) {

        $report = $this->db->prepare('INSERT INTO report_comment(id_comment,
        date_reporting) VALUES(?, NOW())') or die(var_dump($this->db->errorInfo()));

        $report->execute(array($commentId));

        return $report;
    } 

    // Nombre de commentaires signalés
    public function numberReports() {
        $number = $this->db->query('SELECT COUNT(*) AS nb FROM report_comment')
        or die(var_dump($this->db->errorInfo()));

        return $number->fetch();
    }
}