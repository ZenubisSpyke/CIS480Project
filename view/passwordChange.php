<?php
session_start();
require_once('../util/security.php');
require_once('../controller/user.php');
require_once('../controller/user_controller.php');

Security::checkHTTPS();
Security::checkAuthority($_SESSION['user']);

$userName = $_SESSION['user'];
$passwordErr = '';

if (isset($_POST['logout'])) {
    Security::logout();
}
if (isset($_POST['userHome'])) {
    header('Location: userHome.php');
}
//Sets new pass word after checking for correct perameters 
if (isset($_POST['submit']) & isset($_POST['currentPassword']) & isset($_POST['newPassword']) & isset($_POST['reEnterPassword'])) {
    if ($_POST['newPassword'] === $_POST['reEnterPassword']) {
        $uppercase = preg_match('@[A-Z]@', $_POST['newPassword']);
        $lowercase = preg_match('@[a-z]@', $_POST['newPassword']);
        $number    = preg_match('@[0-9]@', $_POST['newPassword']);
        $specialChars = preg_match('@[^\w]@', $_POST['newPassword']);
        if ($uppercase & $lowercase & $number & $specialChars) {
            $userPass = UserController::validUser($_SESSION['user'], $_POST['currentPassword']);    
            if ($userPass === 'pass') {            
                UserController::updatePassword($_SESSION['user'], $_POST['newPassword']);
                header("Location: userHome.php");
            } else {
                $passwordErr = 'Incorrect current password';
            }
        } else {
            $passwordErr = 'Password complexity requirements not met for new password';
        }
    } else {
        $passwordErr = 'New password and new password re-entry do not match';
    }
} else {
    $passwordErr = 'All fields must be filled';
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
        <h2 style=text-align:center>Change Password</h2>
        <div class="screenCenter">
            <form method='POST'>
                <h3 style=text-align:right>Enter current password: <input type="password" name="currentPassword"></h3>
                <h3><span style="font-size:70%; text-align:center;">New password must contain an upper and lowercase letter,
                    <br>a number, a special character, and be at least 8 characters long.</span></h3>
                <h3 style=text-align:right>Enter new password: <input type="password" name="newPassword"></h3>
                <h3 style=text-align:right>Re-Enter new password: <input type="password" name="reEnterPassword"></h3>
                <input type="submit" value="Change Password" name="submit"> 
            </form>
        </div>
    <h2 style="text-align:center; color:red;"><?php echo $passwordErr; ?></h2>
    </body>
    <div class="footer" id="footer"><a class="background-credit" href="https://www.vecteezy.com/free-vector/header">Backgrounds: Header Vectors by Vecteezy</a></div>
</html>