<?php

namespace Elodie\Projet4\Classes;

class Session {


    // public function __set($name, $value) {
    //     $_SESSION[$name] = $value;
    // }

    // public function __get($name) {
    //     if (isset($_SESSION[$name])) {
    //         return $_SESSION[$name];
    //     }
    // }

    public function isConnected($name): bool {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return !empty($_SESSION[$name]);
    }

    public function noConnected($name): bool {
        
        if (!$this->isConnected($name)) {
            header('Location: index.php?action=connected');
            exit();
        } else {
            return true;

        }
    }

    public function destroy() {
        if ($this->isConnected($name)) {
            session_start();
            $_SESSION = array();
            session_destroy();

            unset($_SESSION[$name]);
        }
    }

    public function display() {
        echo '<pre>';
        print_r($_SESSION);
        var_dump($this->isConnected('id', 'pseudo'));
        var_dump($this->noConnected('id', 'pseudo'));
        echo '</pre>';
    }

}