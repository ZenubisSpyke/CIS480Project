<?php

class LogoUtil {
    public static function logoPick() {
        $logo = "";
        if($_SESSION['Steam'] & $_SESSION['Playstation'] & $_SESSION['XBox']) {
            $logo = "images/TripleLogo.png";
            $_SESSION['console'] = "ALL";
        }
        elseif($_SESSION['Steam'] & !$_SESSION['Playstation'] & !$_SESSION['XBox']){
            $logo = "images/SteamLogo.png";
            $_SESSION['console'] = "Steam";
        }
        elseif(!$_SESSION['Steam'] & $_SESSION['Playstation'] & !$_SESSION['XBox']){
            $logo = "images/PSLogo.png";
            $_SESSION['console'] = "Playstation";
        }
        elseif(!$_SESSION['Steam'] & !$_SESSION['Playstation'] & $_SESSION['XBox']){
            $logo = "images/XboxLogo.png";
            $_SESSION['console'] = "XBox";
        }
        else {
            header('Location: userHome.php');
        }
        return $logo;
    }
}