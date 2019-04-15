<?php

namespace Elodie\Projet4\Model;

require_once(MODEL.'Manager.php');

class ChaptersManager extends Manager {

    public function __construct() {
        $this->db = $this->dbConnect();
    }

    // Récupération des épisodes postés (au max 3)
    public function getChapters() {

        $req = $this->db->query('SELECT id, title, chapter, DATE_FORMAT(date_chapter, "%d/%m/%Y") 
        AS date_sent FROM chapters ORDER BY date_sent DESC LIMIT 0, 3') or die(var_dump($this->db->errorInfo()));

        return $req->fetchAll();
        
    }

    // Récupération de tous les chapitres postés
    public function totalChapters() {
        
        $req = $this->db->query('SELECT id, title, chapter, DATE_FORMAT(date_chapter, "%d/%m/%Y")
        AS date_sent FROM chapters ORDER BY id') or die(var_dump($this->db->errorInfo()));

        return $req->fetchAll();
    }

    // Récupération d'un chapitre précis selon son ID
    public function getChapter($chapterId) {
        
        $req = $this->db->prepare('SELECT id, title, chapter, DATE_FORMAT(date_chapter, "%d/%m/%Y")
        AS date_sent FROM chapters WHERE id= ?') or die(var_dump($this->db->errorInfo()));
        $req->execute(array($chapterId));
        $chapter = $req->fetch();
        
        return $chapter;
    }

    // Récupération du nombre de chapitres en base
    public function numberChapter() {

        $number = $this->db->query('SELECT COUNT(*) AS nb FROM chapters') or die(var_dump($this->db->errorInfo()));

        return $number->fetch();
    }

    // Ajout des chapitres en base
    public function addChapter($title, $chapter) {
        
        $chapters = $this->db->prepare('INSERT INTO chapters(title, chapter, date_chapter) 
        VALUES(?, ?, NOW())') or die (var_dump($this->db->errorInfo()));
        $addChapter = $chapters->execute(array($title, $chapter));

        return $addChapter;
    }

    // Modification d'un chapitre déjà en base
    public function updateChapter($editTitle, $editChapter, $chapterId) {
        
        $chapter = $this->db->prepare('UPDATE chapters SET title = ?, chapter = ?, 
        date_chapter = NOW() WHERE id = ?') or die (var_dump($this->db->errorInfo()));
        $updateChapters = $chapter->execute(array($editTitle, $editChapter, $chapterId));

        return $updateChapters;
    }

    // Suppression d'un chapitre
    public function deleteChapter($chapterId) {
        
        $chapter = $this->db->prepare('DELETE FROM chapters WHERE id = ?') or die(var_dump($this->db->errorInfo()));
        $deleteChapter = $chapter->execute(array($chapterId));

        return $deleteChapter;
    }
}