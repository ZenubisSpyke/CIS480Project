<?php
session_start();
require_once('../util/security.php');
require_once('../controller/achievement.php');
require_once('../controller/game_controller.php');
require_once('../controller/user_controller.php');

Security::checkHTTPS();
Security::checkAuthority($_SESSION['user']);

$userName = $_SESSION['user'];
$message = '';
$console = '-';
$chosenGame = '-';
$chosenAchievement = '-';

if (isset($_POST['logout'])) {
    Security::logout();
}
if (isset($_POST['userHome'])) {
    header('Location: userHome.php');
}
if(isset($_POST['console'])) {
    $console = $_POST['console'];
    $message = '';
}
if(isset($_POST['game'])) {
    $chosenGame = $_POST['game'];
    $gameAchievements = GameController::getAchievementsByGame($chosenGame, $console);
}
if(isset($_POST['achievement'])) {
    $chosenAchievement = $_POST['achievement'];
}
if(isset($_POST['addAchievementButton'])) {
    $achievementObject = new Achievement($chosenGame, $chosenAchievement, $console, date('Y-m-d'));
    UserController::addAchievement($_SESSION['user'], $achievementObject);
    $console = '-';
    $chosenGame = '-';
    $chosenAchievement = '-';
    $message = 'Added';
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
        <h1 style=text-align:center>Add Achievement</h1>
    <div class="screenCenter">
        <form method='POST'>
            <h3>Platform: <select name="console" onchange="this.form.submit()">
                <option hidden disabled selected value> -- select an option -- </option>
                <option value="Steam" <?php if($console==="Steam")
                    {echo "selected";}?>>Steam</option>
                <option value="Playstation" <?php if($console==="Playstation")
                    {echo "selected";}?>>Playstation</option>
                <option value="XBox" <?php if($console==="XBox")
                    {echo "selected";}?>>Xbox</option>
                </select>
            </h3>
            <h3>Game: <select name="game" onchange="this.form.submit()"
                    <?php if ($console==="-") {echo "disabled";}?>>
                <?php if ($console==="-") { echo "<option disabled selected value>-- select platform --</option>";}
                    else {echo "<option hidden disabled selected value> -- select a game -- </option>";
                        foreach(GameController::getGamesByConsole($console) as $game) : ?>
                        <option value="<?php echo $game; ?>" <?php if($chosenGame === $game)
                            {echo "selected";}?>><?php echo $game; ?></option>
                        <?php endforeach;}?> 
                </select>
            </h3>
            <h3>Achievement: <select name="achievement" onchange="this.form.submit()"
                    <?php if ($chosenGame==="-") {echo "disabled";}?>>
                <?php if ($chosenGame==="-") { echo "<option disabled selected value>-- select game --</option>";}
                    else {echo "<option hidden disabled selected value> -- select an achievement -- </option>";
                        foreach($gameAchievements as $achievement) : ?>
                        <option value="<?php echo $achievement->getAchievement(); ?>" <?php if($chosenAchievement === $achievement->getAchievement())
                            {echo "selected";}?>>
                            <?php echo $achievement->getAchievement(); ?></option>
                        <?php endforeach;}?> 
                </select>
            </h3>
            <input type=submit value="Add Achievement" name=addAchievementButton <?php if ($chosenAchievement==="-") {echo "disabled";}?>>
        </form> 
    </div>
    <h2 style="text-align:center;"><?php echo $message; ?></h2>
    </body>
    <div class="footer" id="footer"><a class="background-credit" href="https://www.vecteezy.com/free-vector/header">Backgrounds: Header Vectors by Vecteezy</a></div>
</html>