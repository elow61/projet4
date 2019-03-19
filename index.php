<?php 

require('controller/controller.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'resumeChapter') {
            resumeChapter();
        } elseif ($_GET['action'] == 'connected') {
            connected();
        } elseif ($_GET['action'] == 'contact') {
            contact();
        } elseif ($_GET['action'] == 'accessAdmin') {
            accessAdmin();
        }
    } else {
        resumeChapter();
    }
    
} catch (Exception $e) {
    echo 'Erreur :' .$e->getMessage();
}