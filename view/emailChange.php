<?php
session_start();
require_once('../util/security.php');
require_once('../controller/user.php');
require_once('../controller/user_controller.php');

Security::checkHTTPS();
Security::checkAuthority($_SESSION['user']);

$userName = $_SESSION['user'];
$userEmail = UserController::getUserEmail($_SESSION['user']);
$emailErr = '';

if (isset($_POST['logout'])) {
    Security::logout();
}
if (isset($_POST['userHome'])) {
    header('Location: userHome.php');
}
if (isset($_POST['submit']) & isset($_POST['emailChange'])) {
    $newEmail = $_POST['emailChange'];
    if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    } else {
        UserController::updateEmail($_SESSION['user'], $_POST['emailChange']);
        header("Location: accountSettings.php");
    }
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
        <h2 style=text-align:center>Change Email</h2>
        <div class="screenCenter">
            <form method='POST'>              
                <h3 style=text-align:center>Enter new email: </h3>
                <input type="text" value="<?php echo $userEmail;?>" name="emailChange">  
                <input type="submit" value="Change Email" name="submit"> 
            </form>
        </div>
    <h2 style="text-align:center; color:red;"><?php echo $emailErr; ?></h2>
    </body>
    <div class="footer" id="footer"><a class="background-credit" href="https://www.vecteezy.com/free-vector/header">Backgrounds: Header Vectors by Vecteezy</a></div>
</html>