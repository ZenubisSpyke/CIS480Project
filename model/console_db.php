<?php
require_once('database.php');

class ConsoleDB {
    public static function getConsoleById($consoleId) {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if($dbConn) {
            $stmt = $dbConn->prepare(  'SELECT ConsoleName FROM consoles
                                        WHERE ConsoleId = ?');
            $stmt->bind_param('i', $consoleId);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
    
    public static function getConsoleByName($consoleName) {
        $db = new Database();
        $dbConn = $db->getDbConn();

        if($dbConn) {
            $stmt = $dbConn->prepare(  'SELECT ConsoleId FROM consoles
                                        WHERE ConsoleName = ?');
            $stmt->bind_param('s', $consoleName);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }
}