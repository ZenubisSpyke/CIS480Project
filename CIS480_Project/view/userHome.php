<?php
session_start();
require_once('../util/security.php');

Security::checkHTTPS();

$login_msg = 'Test Input';
$userName = 'TestName';

if (isset($_POST['logout'])) {
    Security::logout();
}
//Code for button links to user pages
if (isset($_POST['steamAchievements'])) {
    $_SESSION['steam'] = true;
    $_SESSION['ps'] = false;
    $_SESSION['xbox'] = false;
    header("Location: achievements.php");
}
if (isset($_POST['psAchievements'])) {
    $_SESSION['steam'] = false;
    $_SESSION['ps'] = true;
    $_SESSION['xbox'] = false;
    header("Location: achievements.php");
}
if (isset($_POST['xboxAchievements'])) {
    $_SESSION['steam'] = false;
    $_SESSION['ps'] = false;
    $_SESSION['xbox'] = true;
    header("Location: achievements.php");
}
if (isset($_POST['friends'])) {
    $_SESSION['steam'] = false;
    $_SESSION['ps'] = false;
    $_SESSION['xbox'] = false;
    header("Location: friends.php");
}
if (isset($_POST['addAchievement'])) {
    $_SESSION['steam'] = false;
    $_SESSION['ps'] = false;
    $_SESSION['xbox'] = false;
    header("Location: addAchievement.php");
}
if (isset($_POST['accountSettings'])) {
    $_SESSION['steam'] = false;
    $_SESSION['ps'] = false;
    $_SESSION['xbox'] = false;
    header("Location: accountSettings.php");
}
?>
<html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="divStyles.css">
        <style>            
            .rightButton {               
                height:40px; 
                width: 11em; 
                float:left;
            }
        </style>    
    </head>
    <header class="header-container">
        <div class=logoCon>
            <img class="left-logo" src="images/BlockLogo.png" alt="The Achievement Hall">
        </div>
        <div class=userCon>
            <h1 class=userNameDisplay><?php echo $userName; ?></h1>
        </div>
        <div class=headerUpCon>
            <form method='POST'>
                <input class="logout-button" type=submit value="Logout" name="logout">
            </form>
        </div>
        <div class=headerLowCon>
        </div>
    </header>
    <body>
    <form method='POST'>
        <div class="half-split-row">
            <div class="half-split-column">
                <h3 style="padding-right: 15%;"><input type=submit style="height:40px; float:right; width: 11em;" value="Steam Achievements" name="steamAchievements">
                    <img style="height:40px; float:right;" src="images/SteamLogo.png" alt="PS Logo">
                </h3>
            </div>
            <div class="half-split-column">
                <p> </p>
                <input type="submit" class="rightButton" value="Friends" name="friends">
            </div>
        </div>
        <div class="half-split-row">
            <div class="half-split-column">
                <h3 style="padding-right: 15%;"><input type=submit style="height:40px; float:right; width: 11em;" value="PS Achievements" name="psAchievements">
                    <img style="width:40px; float:right;" src="images/PSLogo.png" alt="PS Logo">
                </h3>
            </div>
            <div class="half-split-column">
                <p> </p>
                <input type="submit" class="rightButton" value="Add Achievement" name="addAchievement">
            </div>
        </div>
        <div class="half-split-row">
            <div class="half-split-column">
                <h3 style="padding-right: 15%;"><input type=submit style="height:40px; float:right; width: 11em;" value="XBox Achievements" name="xboxAchievements">
                    <img style="height:40px; float:right;" src="images/XboxLogo.png" alt="PS Logo">
                </h3>
            </div>
            <div class="half-split-column">
                <p> </p>
                <input type="submit" class="rightButton" value="Account Settings" name="accountSettings">
            </div>
        </div>
        </form>
        <div class="footer" id="footer"><a class="background-credit" href="https://www.vecteezy.com/free-vector/header">Backgrounds: Header Vectors by Vecteezy</a></div>
    </body>
<html>