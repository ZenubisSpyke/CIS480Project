<?php
session_start();
require_once('../util/security.php');
require_once('../controller/user.php');
require_once('../controller/user_controller.php');

Security::checkHTTPS();

$login_msg = isset($_SESSION['logout_msg']) ? 
    $_SESSION['logout_msg'] : '';

if (isset($_POST['userNameEntry']) & isset($_POST['passwordEntry'])) {
    $userPass = UserController::validUser($_POST['userNameEntry'], $_POST['passwordEntry']);
    
    if ($userPass === 'pass') {
        $_SESSION['user'] = $_POST['userNameEntry'];
        $_SESSION[$_SESSION['user']] = true;
        header("Location: userHome.php");
    } else {
        $login_msg = 'Failed Login. Username or Password Incorrect.';
        $_SESSION['user'] = 'Failure to verify';
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
        <h1 style="text-align:center;">Log-In</h1>
    <div class="screenCenter">
    <form method='POST'>
        <h3>UserName: <input type="text" name="userNameEntry"></h3>
        <h3>Password: <input type="password" name="passwordEntry"></h3>
        <input type="submit" value="Log In" name="login">
        <h4><a href="create_account.php">Create Account</a></h4>
    </form>
    </div>
    <h2 style="text-align:center; color:red;"><?php echo $login_msg; ?></h2>
    </body>
    <div class="footer" id="footer"><a class="background-credit" href="https://www.vecteezy.com/free-vector/header">Backgrounds: Header Vectors by Vecteezy</a></div>
</html>