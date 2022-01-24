<?php
session_start();
require_once('../util/security.php');
require_once('../util/achievementLogo.php');
require_once('../controller/achievement.php');
require_once('../controller/game_controller.php');
require_once('../controller/user_controller.php');

Security::checkHTTPS();
Security::checkAuthority($_SESSION['user']);

$userName = $_SESSION['user'];
$userAchievements = UserController::getAchievements($_SESSION['user']);
$searchFilter = false;
$filteredGames = array();

if (isset($_POST['logout'])) {
    Security::logout();
}
if (isset($_POST['userHome'])) {
    header('Location: userHome.php');
}
if (isset($_POST['compareButton'])) {
    $isFriend = UserController::checkFriend($_SESSION['user'], $_POST['friendSearchInput']);
    if ($isFriend) {
        $_SESSION['friend'] = $_POST['friendSearchInput'];
    }
}
if (isset($_POST['searchButton'])) {
    $filteredGames = GameController::searchGame($_POST['achievementSearchInput']);
    if (!empty($filteredGames)) {
        $searchFilter = true;
    }
}
if(!empty($_SESSION['friend'])) {
    $friendAchievements = UserController::getAchievements($_SESSION['friend']);
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
    <form method='POST'>
        <div class="achievement-grid-container">
            <div class="achUpLeft">
                <p style="text-align:left;">Search for achievements by game:</p>
                <form method='POST'>                
                <input type=text name=achievementSearchInput style="float:left;">
                <input type=submit value=Search name=searchButton style="float:left;">
                <br> <br>
            </div>
            <div class="achCons"><img style="width:95%; max-width:10em" src="<?php echo LogoUtil::logoPick() ?>" alt="Console Logo"></div> 
            <div class="achUpRight">
                <p style="text-align:right;">Compare your achievements to a friend:</p>
                <form method='POST'>
                    <select name=friendSearchInput style="float:right;">
                        <?php echo "<option hidden disabled selected value> -- select a friend -- </option>";
                            foreach(UserController::getFriends($_SESSION['user']) as $friend) : ?>
                            <option value="<?php echo $friend; ?>" <?php if($_SESSION['friend'] === $friend)
                            {echo "selected";}?>><?php echo $friend; ?></option>
                        <?php endforeach;?> 
                    </select>
                    <input type=submit value=Compare name=compareButton style="float:right;">
                </form>
                <br> <br>
            </div>  
            <div class="achLowLeft">
                <h3 style="text-align:left;"><?php echo $userName; ?>'s Achievements</h3>
                <table style="margin-left:0; margin-right:auto;">
                    <tr>
                        <th>Game</th>
                        <th>Achievement</th>
                        <th>Date Achieved</th>
                    </tr>
                    <?php foreach ($userAchievements as $userAchievement) : ?>
                        <?php if(($userAchievement->getConsole() === $_SESSION['console']) || ($_SESSION['console'] === "ALL")) {
                            if ((!$searchFilter) || (in_array($userAchievement->getGame(), $filteredGames))) { ?>
                            <tr>
                                <td><?php echo $userAchievement->getGame(); ?></td>
                                <td><?php echo $userAchievement->getAchievement(); ?></td>
                                <td><?php echo $userAchievement->getDateAchieved(); ?></td>
                            </tr>
                        <?php }
                        }
                    endforeach; ?>
                </table>
            </div>
            <div class="achLowRight">
                <h3 style="text-align:right;"><?php if ($_SESSION['friend'] === '') {
                                                        echo 'Select a friend';}
                                                    else {echo $_SESSION['friend']."'s Achievements";}?>
                </h3>
                <table style="margin-left:auto; margin-right:0;">
                    <tr>
                        <th>Game</th>
                        <th>Achievement</th>
                        <th>Date Achieved</th>
                    </tr>
                    <?php if (empty($friendAchievements)) {}
                    else {foreach ($friendAchievements as $friendAchievement) : ?>
                        <?php if(($friendAchievement->getConsole() === $_SESSION['console']) || ($_SESSION['console'] === "ALL")) { 
                            if ((!$searchFilter) || (in_array($friendAchievement->getGame(), $filteredGames))) { ?>
                                <tr>
                                    <td><?php echo $friendAchievement->getGame(); ?></td>
                                    <td><?php echo $friendAchievement->getAchievement(); ?></td>
                                    <td><?php echo $friendAchievement->getDateAchieved(); ?></td>
                                </tr>
                            <?php }
                        }
                    endforeach;} ?>
                </table>
            </div>
        </div>
    </form>
    <div class="footer" id="footer"><a class="background-credit" href="https://www.vecteezy.com/free-vector/header">Backgrounds: Header Vectors by Vecteezy</a></div>
    <body>