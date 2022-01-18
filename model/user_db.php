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

    public static function getUsersByUserLevelNo($userLevelNo) {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if($dbConn) {
            $query = "SELECT * FROM users
                    INNER JOIN user_levels
                        ON users.UserLevelNo = user_levels.UserLevelNo
                    WHERE users.UserLevelNo = '$userLevelNo'";
            return $dbConn->query($query);
        } else {
            return false;
        }
    }

    public static function getUser($userNo) {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if($dbConn) {
            $query = "SELECT * FROM users
                    INNER JOIN user_levels
                        ON users.UserLevelNo = user_levels.UserLevelNo
                    WHERE UserNo = '$userNo'";
            $result = $dbConn->query($query);
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    public static function deleteUser($userNo) {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if($dbConn) {
            $query = "DELETE FROM users
                    WHERE UserNo = '$userNo'";

            return $dbConn->query($query) === TRUE;
        } else {
            return false;
        }
    }

    public static function addUser($pNo, $userID, $passw, $fName, $lName,
                                   $start, $email, $exten, $userLevelNo) {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if($dbConn) {
            $query = 
                "INSERT INTO users (UserID, Password, FirstName, LastName,
                    HireDate, EMail, Extension, UserLevelNo)
                 VALUES ('$userID', '$passw', '$fName', '$lName', 
                         '$start', '$email', '$exten',  '$userLevelNo')";
            return $dbConn->query($query) === TRUE;
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
}