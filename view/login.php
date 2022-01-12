<?php
session_start();
require_once('../util/security.php');

Security::checkHTTPS();

$login_msg = 'Test Input';
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
        <input type="submit" value="Log In" name="logIn">
        <h4><a href="create_account.php">Create Account</a></h4>
    </form>
    </div>
    <h2 style="text-align:center; color:red;"><?php echo $login_msg; ?></h2>
    </body>
    <div class="footer" id="footer"><a class="background-credit" href="https://www.vecteezy.com/free-vector/header">Backgrounds: Header Vectors by Vecteezy</a></div>
</html>