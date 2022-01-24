<?php
require_once('database.php');

class GameDB {

    public static function getGameByTitle($gameTitle) {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if($dbConn) {
            $stmt = $dbConn->prepare(  'SELECT * FROM games
                                        WHERE GameTitle = ?');
            $stmt->bind_param('s', $gameTitle);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    public static function getGameByLikeTitle($gameTitle){
        $db = new Database();
        $dbConn = $db->getDbConn();

        if($dbConn) {
            $param = "%$gameTitle%";
            $stmt = $dbConn->prepare(  'SELECT * FROM games
                                        WHERE GameTitle LIKE ?');
            $stmt->bind_param('s', $param);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        } else {
            return false;
        }
    }

    public static function getGames() {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if($dbConn) {
            $stmt = $dbConn->prepare(  'SELECT * FROM games');
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        } else {
            return false;
        }
    }

    public static function getGamesByConsole($console) {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if($dbConn) {
            if ($console === "Steam"){
                $stmt = $dbConn->prepare(  'SELECT * FROM games
                                            WHERE Steam = 1');
            }
            elseif ($console === "Playstation"){
                $stmt = $dbConn->prepare(  'SELECT * FROM games
                                            WHERE Playstation = 1');
            }
            elseif ($console === "XBox"){
                $stmt = $dbConn->prepare(  'SELECT * FROM games
                                            WHERE XBox = 1');
            }
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        } else {
            return false;
        }
    }

    public static function getAchievementTable($game) {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if($dbConn) {
            $stmt = $dbConn->prepare('SELECT AchievementTable FROM games
                                        WHERE GameTitle = ?');
            $stmt->bind_param('s', $game);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    public static function getAchievements($table) {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if($dbConn) {
            $achievementTable = "achievements_" . $table;
            $query =
                "SELECT * FROM $achievementTable";
            return $dbConn->query($query);
        } else {
            return false;
        }
    }
}