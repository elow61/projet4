<?php

namespace Elodie\Projet4\Model;

require_once('model/Manager.php');

class ChaptersManager extends Manager {
    // Récupération des épisodes postés (au max 3)
    public function getChapters() {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, chapter, DATE_FORMAT(date_chapter, "%d/%m/%Y") 
        AS date_sent FROM chapters ORDER BY date_sent DESC LIMIT 0, 3');

        return $req->fetchAll();
        
    }

    // Récupération de tous les chapitres postés
    public function totalChapters() {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, chapter, DATE_FORMAT(date_chapter, "%d/%m/%Y")
        AS date_sent FROM chapters ORDER BY date_sent');

        return $req->fetchAll();
    }

    // Récupération d'un chapitre précis selon son ID
    public function getChapter($chapterId) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, chapter, DATE_FORMAT(date_chapter, "%d/%m/%Y")
        AS date_sent FROM chapters WHERE id= ?');
        $req->execute(array($chapterId));
        $chapter = $req->fetch();
        
        return $chapter;
    }

    // Récupération du nombre de chapitres en base
    public function numberChapter() {
        $db = $this->dbConnect();

        $number = $db->query('SELECT COUNT(*) AS nb FROM chapters') or die(var_dump($db->errorInfo()));

        return $number->fetch();
    }

    // Ajout des chapitres en base
    public function addChapter($title, $chapter) {
        $db = $this->dbConnect();
        $chapters = $db->prepare('INSERT INTO chapters(title, chapter, date_chapter) 
        VALUES(?, ?, NOW())') or die (var_dump($db->errorInfo()));
        $addChapter = $chapters->execute(array($title, $chapter));

        return $addChapter;
    }

    // Modification d'un chapitre déjà en base
    public function updateChapter($editTitle, $editChapter, $chapterId) {
        $db = $this->dbConnect();
        $chapter = $db->prepare('UPDATE chapters SET title = ?, chapter = ?, 
        date_chapter = NOW() WHERE id = ?') or die (var_dump($db->errorInfo()));
        $updateChapters = $chapter->execute(array($editTitle, $editChapter, $chapterId));

        return $updateChapters;
    }

    // Suppression d'un chapitre
    public function deleteChapter($chapterId) {
        $db = $this->dbConnect();
        $chapter = $db->prepare('DELETE FROM chapters WHERE id = ?') or die(var_dump($db->errorInfo()));
        $deleteChapter = $chapter->execute(array($chapterId));

        return $deleteChapter;
    }
}