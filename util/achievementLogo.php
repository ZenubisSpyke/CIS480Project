<?php

class LogoUtil {
    public static function logoPick() {
        $logo = "";
        if($_SESSION['steam'] & $_SESSION['ps'] & $_SESSION['xbox']) {
            $logo = "images/TripleLogo.png";
        }
        elseif($_SESSION['steam'] & !$_SESSION['ps'] & !$_SESSION['xbox']){
            $logo = "images/SteamLogo.png";
        }
        elseif(!$_SESSION['steam'] & $_SESSION['ps'] & !$_SESSION['xbox']){
            $logo = "images/PSLogo.png";
        }
        elseif(!$_SESSION['steam'] & !$_SESSION['ps'] & $_SESSION['xbox']){
            $logo = "images/XboxLogo.png";
        }
        else {
            header('Location: userHome.php');
        }
        return $logo;
    }
}