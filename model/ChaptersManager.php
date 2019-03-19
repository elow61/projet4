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

        return $req;
    }

    // Récupération d'un post précis selon son ID
    public function getChapter($chapterId) {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, chapter, DATE_FORMAT(date_chapter, "%d/%m/%Y")
        AS date_sent FROM chapters WHERE id= ?');
        $req->execute(array($chapterId));
        $chapter = $req->fetch();
        
        return $chapter;
    }
}