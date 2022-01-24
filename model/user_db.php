<?php
require_once('database.php');

class UserDB {
    public static function getUserByProfileName($profileName){
        $db = new Database();
        $dbConn = $db->getDbConn();

        if($dbConn) {
            $stmt = $dbConn->prepare(  'SELECT * FROM users
                                        WHERE ProfileName = ?');
            $stmt->bind_param('s', $profileName);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    public static function getUserById($userId){
        $db = new Database();
        $dbConn = $db->getDbConn();

        if($dbConn) {
            $stmt = $dbConn->prepare(  'SELECT * FROM users
                                        WHERE UserId = ?');
            $stmt->bind_param('i', $userId);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    public static function getUsers() {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if($dbConn) {
            $stmt = $dbConn->prepare(  'SELECT * FROM users');
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        } else {
            return false;
        }
    }

    public static function addUser($profileName, $password, $email) {
        $db = new Database();
        $dbConn = $db->getDbConn();
        
        if($dbConn) {
            $stmt = $dbConn->prepare(  'INSERT INTO users (ProfileName, PasswordHash, Email)
                                            VALUES (?, ?, ?)');
            $stmt->bind_param('sss', $profileName, $password, $email);
            $stmt->execute();
            return self::getUserByProfileName($profileName);
        } else {
            return false;
        }
    }
    //UserId is used to create user tables, as the user getis no input on it
    public static function addUserTables($userId) {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if($dbConn) { 
            $friendTable = "user_friends_" . $userId;
            $achievementTable = "user_achievements_" . $userId;
            $queryOne =
               "CREATE TABLE `".$friendTable."` (
                    `FriendNo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                    `FriendUserId` int(11))";
            $queryTwo =
                "CREATE TABLE `".$achievementTable."` (
                    `AchievementNo` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                    `Game` varchar(255) NOT NULL,
                    `Achievement` varchar(255) NOT NULL,
                    `Console` int(11) NOT NULL,
                    `DateAchieved` date NOT NULL,
                    FOREIGN KEY (Console) REFERENCES consoles(ConsoleId))";
            $result = $dbConn->query($queryOne) === TRUE;
            $result = $dbConn->query($queryTwo) === TRUE;
            return true;
        } else {
            return false;
        }
    }

    public static function updateEmail($user, $newEmail) {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if($dbConn) {
            $stmt = $dbConn->prepare(  'UPDATE users
                                        SET Email = ?
                                        WHERE ProfileName = ?');
            $stmt->bind_param('ss', $newEmail, $user);
            $stmt->execute();
            return true;
        } else {
            return false;
        }
    }

    public static function updatePassword($user, $newPassword) {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if($dbConn) {
            $stmt = $dbConn->prepare(  'UPDATE users
                                        SET PasswordHash = ?
                                        WHERE ProfileName = ?');
            $stmt->bind_param('ss', $newPassword, $user);
            $stmt->execute();
            return true;
        } else {
            return false;
        }
    }

    public static function getFriends($userId) {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if($dbConn) {
            $friendTable = "user_friends_" . $userId;
            $query =
                "SELECT * FROM $friendTable";
        return $dbConn->query($query);
        } else {
            return false;
        }
    }

    public static function searchFriendByUserId($userId, $friendId) {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if($dbConn) {
            $friendTable = "user_friends_" . $userId;
            $query =
                "SELECT * FROM $friendTable
                 WHERE FriendUserId = $friendId";
            $result = $dbConn->query($query);
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    public static function addFriend($userId, $friendId) {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if($dbConn) {
            $friendTable = "user_friends_" . $userId;
            $query =
                "INSERT INTO $friendTable (`FriendUserId`)
                     VALUE ($friendId)";
            $result = $dbConn->query($query) === TRUE;
            return true;
        } else {
            return false;
        }
    }

    public static function getAchievementsById($userId) {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if($dbConn) {
            $achievementTable = "user_achievements_" . $userId;
            $query =
                "SELECT * FROM $achievementTable";
            return $dbConn->query($query);
        } else {
            return false;
        }
    }
    
    public static function addAchievement($userId, $game, $achievement, $console, $date) {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if($dbConn) {
            $achievementTable = "user_achievements_" . $userId;
            if      ($console === "Steam")          { $consoleId = 1; }
            elseif  ($console === "Playstation")    { $consoleId = 2; }
            elseif  ($console === "XBox")           { $consoleId = 3; }
            $query =
                "INSERT INTO $achievementTable (`Game`, `Achievement`, `Console`, `DateAchieved`)
                     VALUES ('$game',
                             '$achievement',
                             $consoleId,
                             '$date')";
            $result = $dbConn->query($query) === TRUE;
            return $query;
        } else {
            return false;
        }
    }
}