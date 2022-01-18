<?php
session_start();
require_once('../util/security.php');

Security::checkHTTPS();

$error_msg = 'Test Input';
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
        <input type="submit" class="submit" value="Create Account" name="logIn">
    </form>
    </div>
    <h2 style="text-align:center; color:red;"><?php echo $error_msg; ?></h2>
    </body>
    <div class="footer" id="footer"><a class="background-credit" href="https://www.vecteezy.com/free-vector/header">Backgrounds: Header Vectors by Vecteezy</a></div>
</html>