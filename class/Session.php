<?php

namespace Elodie\Projet4\Classes;

class Session {

    public function __set($name, $value) {
        $_SESSION[$name] = $value;
    }

    public function __get($name) {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }
    }

    public function isConnected($name, $nameTwo = null): bool {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return !empty($_SESSION[$name][$nameTwo]);
    }

    public function noConnected() {
        if (!$this->isConnected($name, $nameTwo)) {
            $redirecting = header('Location: index.php?action=connected');
            exit();
            return $redirecting;
        } 
    }

    public function destroy() {
        if ($this->isConnected($name, $nameTwo)) {
            session_start();
            unset($_SESSION[$name][$nameTwo]);
            session_destroy();
            header('Location: index.php?action=connected');
        }
    }

    public function display() {
        echo '<pre>';
        print_r($_SESSION);
        var_dump($this->isConnected($name, $nameTwo));
        var_dump($this->noConnected());
        echo '</pre>';
    }

}