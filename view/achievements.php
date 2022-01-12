<?php
session_start();
require_once('../util/security.php');
require_once('../util/achievementLogo.php');

Security::checkHTTPS();

$userName = 'TestName';
$friendName = 'TestFriend';

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
    <form method='POST'>
        <div class="achievement-grid-container">
            <div class="achUpLeft">
                <p style="text-align:left;">Search for a specific game or achievement:</p>
                <input type=text name=achievementSearchInput style="float:left;">
                <input type=button value=Search name=searchButton style="float:left;">
                <br> <br>
                <h3 style="text-align:left;"><?php echo $userName; ?>'s Achievements</h3>
            </div>
            <div class="achCons"><img style="width:95%; max-width:10em" src="<?php echo LogoUtil::logoPick() ?>" alt="Console Logo"></div> 
            <div class="achUpRight">
                <p style="text-align:right;">Compare your achievements to a friend:</p>
                <input type=text name=achievementSearchInput style="float:right;">
                <input type=button value=Compare name=compareButton style="float:right;">
                <br> <br>
                <h3 style="text-align:right;"><?php if ($friendName === '') {
                                                        echo 'Select a friend';}
                                                    else {echo "$friendName's Achievements";}?>
                </h3>
            </div>  
            <div class="achLowLeft">User Table Here</div>
            <div class="achLowRight">Friend Table Here</div>
        </div>
    </form>
    <div class="footer" id="footer"><a class="background-credit" href="https://www.vecteezy.com/free-vector/header">Backgrounds: Header Vectors by Vecteezy</a></div>
    <body>
