<?php
include_once('game.php');
include_once('achievement.php');
if (file_exists('model/game_db.php')) {
    include_once('model/game_db.php');
} else {
    include_once('../model/game_db.php');
}
if (file_exists('model/console_db.php')) {
    include_once('model/console_db.php');
} else {
    include_once('../model/console_db.php');
}

class GameController {
    private static function rowToGame($row) {
        $game = new Game($row['GameTitle'],
                         $row['XBox'],
                         $row['Playstation'],
                         $row['Steam'],
                         $row['AchievementTable']);
        $game->setGameID($row['GameId']);
        return $game;
    }

    private static function assembleAchievement($game, $achievementName, $console, $date) {
        $achievement = new Achievement( $game,
                                        $achievementName['Achievement'],
                                        $console,
                                        $date);
        return $achievement;
    }

    public static function searchGame($gameTitle) {
        $queryRes = GameDB::getGameByLikeTitle($gameTitle);

        if ($queryRes) {
            $games = array();
            foreach ($queryRes as $row) {
                $games[] = self::rowToGame($row);
            }
            $titles = array();
            foreach ($games as $game) {
                $titles[] = $game->getGameTitle();
            }
            return $titles;
        } else {
            return false;
        }
    }

    public static function getAllGames() {
        $queryRes = GameDB::getGames();

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
        if ($console === "Steam"){
            $queryRes = GameDB::getGamesByConsole("Steam");
        }
        elseif ($console === "Playstation"){
            $queryRes = GameDB::getGamesByConsole("Playstation");
        }
        elseif ($console === "XBox"){
            $queryRes = GameDB::getGamesByConsole("XBox");
        }
        
        if ($queryRes) {
            $games = array();
            foreach ($queryRes as $row) {
                $games[] = self::rowToGame($row);
            }
            $gameTitles = array();
            foreach ($games as $game) {
                $gameTitles[] = $game->getGameTitle();
            }
            return $gameTitles;
        } else {
           return false;
        }
    }

    public static function getAchievementsByGame($game, $console) {
        $achievementTable = GameDB::getAchievementTable($game);

        if ($achievementTable) {
            $result = GameDB::getAchievements($achievementTable['AchievementTable']);
            date_default_timezone_set('America/New_York');
            $date = date('YYYY-MM-DD');
            $achievements = array();
            foreach ($result as $table) {
                $achievements[] = self::assembleAchievement($game, $table, $console, $date);
            }
            return $achievements;
        } else {
            return false;
        }
    }
}