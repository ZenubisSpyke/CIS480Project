<?php

class Security {
    public static function checkHTTPS() {
        if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on') {
            echo "<h1>HTTPS is Required</h1>";
            exit();
        }
    }

    public static function logout() {
        unset($_SESSION);
        unset($_POST);
        $_SESSION = array();
        session_destroy();
        header('Location: ../home.php');
        exit();
    }

    public static function checkAuthority($auth) {
        if (!isset($_SESSION[$auth]) || !$_SESSION[$auth]) {
            $_SESSION['logout_msg'] = 'Current login unauthorized for 
                attempted page.';
                header('Location: login.php');
                exit();
        }
    }
}
?>