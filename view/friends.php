<?php
session_start();
require_once('../util/security.php');
require_once('../controller/user.php');
require_once('../controller/user_controller.php');

Security::checkHTTPS();
Security::checkAuthority($_SESSION['user']);

$userName = $_SESSION['user'];
$error_msg = '';

if (isset($_POST['logout'])) {
    Security::logout();
}
if (isset($_POST['userHome'])) {
    header('Location: userHome.php');
}
if (isset($_POST['addFriendButton'])) {
    if ($_POST['friendInput'] != '') {
        $real = UserController::checkUserName($_POST['friendInput']);
        if ($real) {
            $current = UserController::checkFriend($_SESSION['user'], $_POST['friendInput']);
            if (!$current) {
                UserController::addFriend($_SESSION['user'], $_POST['friendInput']);
            } else {
                $error_msg = 'You are already friends with this user';
            }
        } else {
            $error_msg = 'No profile found for '. $_POST['friendInput'];
        }
    } else {
        $error_msg = 'Enter username of profile to add as friend';
    }
}
if (isset($_POST['compare'])) {
    $_SESSION['friend'] = $_POST['userNameCompare'];
    $_SESSION['Steam'] = true;
    $_SESSION['Playstation'] = true;
    $_SESSION['XBox'] = true;
    header('Location: achievements.php');
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
            <table style="margin-left:auto; margin-right:auto;">
                <tr>
                    <th>Friend User Name</th>
                    <th>&nbsp;</th>
                </tr>
                <?php foreach (UserController::getFriends($_SESSION['user']) as $friend) : ?>
                    <tr>
                        <td><?php echo $friend; ?></td>
                        <td><form method="POST">
                            <input type="hidden" name="userNameCompare" value="<?php echo $friend; ?>"/>
                            <input type="submit" value="Compare" name="compare" />
                        </form></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class=half-split-column>
            <form method='POST'>
                <h1 style=text-align:center>Add Friend</h1>
                <h3 style=text-align:center><input type=text name="friendInput"><input type=submit value=Add name="addFriendButton">
                <h2 style="text-align:center; color:red;"><?php echo $error_msg; ?></h2>
            </form>
        </div>
    </body>    
    <div class="footer" id="footer"><a class="background-credit" href="https://www.vecteezy.com/free-vector/header">Backgrounds: Header Vectors by Vecteezy</a></div>
</html>