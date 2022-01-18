<?php
require_once('database.php');

class GameDB {
    public static function getGameByTitle($gameTitle){
        $db = new Database();
        $dbConn = $db->getDbConn();

        if($dbConn) {
            //SQL Statement is untested in this format and may not function
            $stmt = $dbConn->prepare(  'SELECT * FROM games
                                        WHERE GameTitle LIKE %?%');
            $stmt->bind_param('s', $gameTitle);
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
            $stmt = $dbConn->prepare(  'SELECT * FROM games
                                        WHERE ? = 1');
            $stmt->bind_param('s', $console);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        } else {
            return false;
        }
    }
}