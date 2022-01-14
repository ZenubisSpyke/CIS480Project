<?php
session_start();
require_once('../util/security.php');

Security::checkHTTPS();

$userName = 'TestName';
$error_msg = 'Test Input';

if (isset($_POST['logout'])) {
    Security::logout();
}
if (isset($_POST['userHome'])) {
    header('Location: userHome.php');
}
?>
<html>    
    <head>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="divStyles.css">
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
            <form method='POST'>
                <input class="logout-button" type=submit value="Home" name="userHome">
            </form>
        </div>
    </header>
    <body>
    <div class=half-split-row>
        <div class=half-split-column>
            <h1 style=text-align:center>Friends</h1>
        </div>
        <div class=half-split-column>
            <h1 style=text-align:center>Add Friend</h1>
            <h3 style=text-align:center><input type=text name=friendInput><input type=submit value=Add name=addFriendButton>
            <h2 style="text-align:center; color:red;"><?php echo $error_msg; ?></h2>
        </div>
    </body>    
    <div class="footer" id="footer"><a class="background-credit" href="https://www.vecteezy.com/free-vector/header">Backgrounds: Header Vectors by Vecteezy</a></div>
</html>