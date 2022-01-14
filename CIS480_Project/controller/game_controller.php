<?php
include_once('game.php');
if (file_exists('model/user_db.php')) {
    include_once('model/user_db.php');
} else {
    include_once('../model/user_db.php');
}

class UserController {
    private static function rowToGame($row) {
        $game = new Game($row['GameTitle'],
                         $row['Xbox'],
                         $row['PS'],
                         $row['Steam'],
                         $row['AchievementTable']);
        $game->setGameID($row['GameId']);
        return $game;
    }

    public static function searchGame ($userID, $password) {
//Command needs to be changed
        $queryRes = UserDB::getUserByID($userID);

        if ($queryRes) {
            $games = array();
            foreach ($queryRes as $row) {
                $games[] = self::rowToGame($row);
            }

            return $games;
        } else {
            return false;
        }
    }

    public static function getAllGames() {
        $queryRes = UserDB::getGames();

        if ($queryRes) {
            $games = array();
            foreach ($queryRes as $row) {
                $games[] = self::rowToGame($row);
            }

            return $games;
        } else {
            return false;
        }
    }

    public static function getGamesByConsole($console) {
        if ($console === 1){
            $queryRes = UserDB::getGamesByConsole("Steam");
        }
        elseif ($console === 2){
            $queryRes = UserDB::getGamesByConsole("PS");
        }
        elseif ($console === 3){
            $queryRes = UserDB::getGamesByConsole("Xbox");
        }

        if ($queryRes) {
            $games = array();
            foreach ($queryRes as $row) {
                $games[] = self::rowToGame($row);
            }

            return $games;
        } else {
            return false;
        }
    }

    public static function addGame($user) {
        //$pNo, $userID, $passw, $fName, $lName,
        //$start, $email, $exten, $userLevelNo
        return UserDB::addUser(
            $user->getUserNo(),
            $user->getUserID(),
            $user->getPassword(),
            $user->getFirstName(),
            $user->getLastName(),
            $user->getHireDate(),
            $user->getEmail(),
            $user->getExtension(),
            $user->getUserLevel()->getUserLevelNo());
    }
}