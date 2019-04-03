<?php

namespace Elodie\Projet4\Classes;

class Session {

    const SESSION_STARTED = true;
    const SESSION_NOT_STARTED = false;

    public function __construct() {

    }


    public function setSession($key, $value) {
        $_SESSION[$key] = $value;
    }

    public function getSession($key) {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    public function destroySession() {
        if (isset($_SESSION[$key])) {
            $_SESSION[$key] = session_destroy();
        }
    }
}