<?php
session_start();
require_once('../model/database.php');
require_once('../util/security.php');

error_reporting(E_ERROR);

$db = new Database();

if(isset($_POST['logout'])) {
    Security::logout();
}
?>

<html>
    <head>
        <title>Sean Kennedy Final Practical</title>
    </head>
<body>
    <h1>Sean Kennedy Final Practical</h1>
    <h1>Database Connection Status</h1>
    <?php if (strlen($db->getDbError())) : ?>
        <h2><?php echo $db->getDbError(); ?></h2>
        <ul>
            <li><?php echo "Database Name: " . $db->getDbName(); ?></li>
            <li><?php echo "Database Host: " . $db->getDbHost(); ?></li>
            <li><?php echo "Database User: " . $db->getDbUser(); ?></li>
        </ul>
    <?php else : ?>
        <ul>
            <li><?php echo "Database Name: " . $db->getDbName(); ?></li>
            <li><?php echo "Database Host: " . $db->getDbHost(); ?></li>
            <li><?php echo "Database User: " . $db->getDbUser(); ?></li>
        </ul>
        <h2><?php echo "Successfully connected to " . $db->getDbName(); ?></h2>
    <?php endif; ?>
    <h3><a href="tech.php">Home</a></h3>
    <form method='POST'>
        <input type="submit" value="Logout" name="logout">
    </body>
    </html>