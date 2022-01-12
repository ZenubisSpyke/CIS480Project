<?php
session_start();
require_once('util/security.php');

Security::checkHTTPS();
?>
<html>
    <head>
        <link rel="stylesheet" href="view/styles.css">
        <link rel="stylesheet" href="divStyles.css">
    </head>
    <header class="header-container">
        <div class=logoCon>
            <img class="left-logo" src="view/images/BlockLogo.png" alt="The Achievement Hall">
        </div>
        <div class=userCon>
        </div>
        <div class=headerUpCon>
            <h3 class="header-link"><a class="header-link" href="view/login.php">Login</a></h3>
        </div>
        <div class=headerLowCon>
            <h3 class="header-link"><a class="header-link" href="view/create_account.php">Create Account</a></h3>
        </div>
    </header>
    <body>
    <img class="big-logo" src="view/images/Logo.png" alt="The Achievement Hall">
    <img style="display:block; margin-left:auto; margin-right:auto; width:20%;" src="view/images/TrophyThree.png" alt="Trophy">
    <p style="font-family:Elephant;" font-size=14 text-align="center">The Achievement Hall is a place to record all of the achievements you have 
        accomplished, view them in one place, and compare them to your friends!</p>
    </body> <br>
    <h3><a href="view/userHome.php">User Home</a></h3>
    <div class="footer" id="footer"><a class="background-credit" href="https://www.vecteezy.com/free-vector/header">Backgrounds: Header Vectors by Vecteezy</a></div>
</html>