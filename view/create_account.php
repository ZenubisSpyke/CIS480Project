<?php
session_start();
require_once('../util/security.php');
require_once('../controller/user.php');
require_once('../controller/user_controller.php');

Security::checkHTTPS();
$error_msg = '';
if (isset($_POST['passwordEntry']) & isset($_POST['passwordReEntry'])) {
    if (isset($_POST['passwordEntry']) != isset($_POST['passwordReEntry'])) {
        $error_msg = 'Password entires do not match';
    }
}
//Info validation, then account creation
if (isset($_POST['submit'])) {
    $unused = UserController::checkUserName($_POST['userNameEntry']);
    if ($unused) {
        $uppercase = preg_match('@[A-Z]@', $_POST['passwordEntry']);
        $lowercase = preg_match('@[a-z]@', $_POST['passwordEntry']);
        $number    = preg_match('@[0-9]@', $_POST['passwordEntry']);
        $specialChars = preg_match('@[^\w]@', $_POST['passwordEntry']);
        if ($uppercase & $lowercase & $number & $specialChars) {
            if ($_POST['passwordEntry'] === $_POST['passwordReEntry']) {
                if (filter_var($_POST['emailEntry'], FILTER_VALIDATE_EMAIL)) {
                    $newUser = new User($_POST['userNameEntry'], $_POST['passwordEntry'], $_POST['emailEntry']);
                    UserController::createUser($newUser);
                    $_SESSION['user'] = $_POST['userNameEntry'];
                    $_SESSION[$_SESSION['user']] = true;
                    header("Location: userHome.php");
                } else{
                    $error_msg = "Invalid email";
                }
            } else {            
                $error_msg = 'Password entries do not match';
            }
        } else {
            $error_msg = 'Password does not meet complexity requirements';
        }
    } else {
        $error_msg = 'Username taken';
    }
}
?>
<html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" href="divStyles.css">
    </head>
    <header class="header-container">
        <img class="left-logo" src="images/BlockLogo.png" alt="The Achievement Hall">
        <h3 class="header-link"><a href="../home.php">Home</a></h3>
    </header>
    <body>
        <h1 style="text-align:center;">Create Account</h1>
    <div class="screenCenter">
    <form method='POST'>
        <h3>Email: <input type="text" class="alignRight" name="emailEntry"><h3>           
        <h3>UserName: <input type="text" name="userNameEntry"></h3>           
        <h3>Password: <input type="password" class="alignRight" name="passwordEntry"></h3>           
        <h3><span style="font-size:70%; text-align:center;">Must contain an upper and lowercase letter,
            <br>a number, a special character, and be at least 8 characters long.</span></h3>
        <h3>Re-Enter Password: <input type="password" name="passwordReEntry"></h3>           
        <input type="submit" class="submit" value="Create Account" name="submit">
    </form>
    </div>
    <h2 style="text-align:center; color:red;"><?php echo $error_msg; ?></h2>
    </body>
    <div class="footer" id="footer"><a class="background-credit" href="https://www.vecteezy.com/free-vector/header">Backgrounds: Header Vectors by Vecteezy</a></div>
</html>