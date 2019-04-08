<?php

namespace Elodie\Projet4\Model;

require_once(MODEL.'Manager.php');

class ReportCommentManager extends Manager {


    // Insertion des commentaires signalés en base
    public function insert_report_comment($first_name, $reporting_comment) {
        $db = $this->dbConnect();

        $report = $db->prepare('INSERT INTO report_comment(first_name, reporting_comment
        date_reporting) VALUES(?, ?, ?, NOW())') or die(var_dump($db->errorInfo()));

        $report->execute(array($first_name, $reporting_comment));

        return $report;
    }

}