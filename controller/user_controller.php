<?php
include_once('user.php');
include_once('achievement.php');
if (file_exists('model/user_db.php')) {
    include_once('model/user_db.php');
} else {
    include_once('../model/user_db.php');
}
if (file_exists('model/console_db.php')) {
    include_once('model/console_db.php');
} else {
    include_once('../model/console_db.php');
}
if (file_exists('model/game_db.php')) {
    include_once('model/game_db.php');
} else {
    include_once('../model/game_db.php');
}

class UserController {
    private static function rowToUser($row) {
        $user = new User($row['ProfileName'],
                         $row['PasswordHash'],
                         $row['Email']);
        $user->setUserId($row['UserId']);
        return $user;
    }

    private static function rowToAchievement($row) {
        $achievement = new Achievement( $row['Game'],
                                        $row['Achievement'],
              (ConsoleDB::getConsoleById($row['Console']))['ConsoleName'],
                                        $row['DateAchieved']);
        $achievement->setAchievementNo($row['AchievementNo']);
        return $achievement;
    }

    public static function validUser ($profileName, $password) {
        $queryRes = UserDB::getUserByProfileName($profileName);

        if ($queryRes) {
            $user = self::rowToUser($queryRes);
            if ($user->getPasswordHash() === strval(md5($password))) {
                return 'pass';
            } else{
                return false;
            }
        } else {
            return false;
        }
    }

    public static function getAllUsers() {
        $queryRes = UserDB::getUsers();

        if ($queryRes) {
            $users = array();
            foreach ($queryRes as $row) {
                $users[] = self::rowToUser($row);
            }

            return $users;
        } else {
            return false;
        }
    }

    public static function checkUserName($userName) {
        $queryRes = UserDB::getUserByProfileName($userName);

        if ($queryRes != '') {
            return true;
        } else {
            return false;
        }
    }

    public static function createUser($user) {
        $user->setPasswordHash(strval(md5($user->getPasswordHash())));
        UserDB::addUser(    $user->getProfileName(),
                            $user->getPasswordHash(),
                            $user->getEmail());

        $queryRes = UserDB::getUserByProfileName($user->getProfileName());
        if ($queryRes) {
            $user = self::rowToUser($queryRes);
            UserDB::addUserTables($user->getUserId());
            return true;
        } else {
            return false;
        }
    }

    public static function getUserEmail($user) {
        $queryRes = UserDB::getUserByProfileName($user);

        if ($queryRes) {
            $user = self::rowToUser($queryRes);
            return ($user->getEmail());
        } else {
            return false;
        }

    }

    public static function updateEmail($user, $newEmail) {
        return UserDB::updateEmail($user, $newEmail);
    }

    public static function updatePassword($user, $newPassword) {
        return UserDB::updatePassword($user, strval(md5($newPassword)));
    }

    public static function getFriends($user) {
        $queryRes = UserDB::getUserByProfileName($user);

        if ($queryRes) {
            $user = self::rowToUser($queryRes);
            $friendQuery = UserDB::getFriends($user->getUserId());
            $friends = array();
            foreach ($friendQuery as $row) {
                $friendProfile = UserDB::getUserById($row['FriendUserId']);
                $friends[] = $friendProfile['ProfileName'];
            }
            return $friends;
        } else {
        return false;
        }
    }

    public static function checkFriend($userIn, $friendIn) {
        $queryRes = UserDB::getUserByProfileName($userIn);
        $friendQuery = UserDB::getUserByProfileName($friendIn);

        if ($queryRes) {
            if ($friendQuery) {
                $user = self::rowToUser($queryRes);
                $friend = self::rowToUser($friendQuery);
                $friendName = UserDB::searchFriendByUserId($user->getUserId(), $friend->getUserId());
                if ($friendName != '') {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function addFriend($userIn, $friendIn){        
        $queryRes = UserDB::getUserByProfileName($userIn);
        $friendQuery = UserDB::getUserByProfileName($friendIn);

        if ($queryRes) {
            if ($friendQuery) {
                $user = self::rowToUser($queryRes);
                $friend = self::rowToUser($friendQuery);
                UserDB::addFriend($user->getUserId(), $friend->getUserId());
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function getAchievements($userName) {
        $queryRes = UserDB::getUserByProfileName($userName);

        if ($queryRes) {
            $user = self::rowToUser($queryRes);
            $queryResTwo = UserDB::getAchievementsById($user->getUserId());
            $achievements = array();
            foreach ($queryResTwo as $row) {
                $achievements[] = self::rowToAchievement($row);
            }
            return $achievements;
        } else {
            return false;
        }
    }

    public static function addAchievement($userName, $achievement) {
        $queryRes = UserDB::getUserByProfileName($userName);

        if ($queryRes) {
            $user = self::rowToUser($queryRes);
            $real = self::authenticateAchievement($achievement);
            if ($real) {
                UserDB::addAchievement( $user->getUserId(), 
                                        $achievement->getGame(),
                                        $achievement->getAchievement(),
                                        $achievement->getConsole(),
                                        $achievement->getDateAchieved());
                return true;
            }
        } else {
            return false;
        }
    }
    //Verifies that the console it real, the game is real, the game is supported on that console, and the game has that achievement
    public static function authenticateAchievement($achievement){
        $realConsole = ConsoleDB::getConsoleByName($achievement->getConsole());
        if (!empty($realConsole)) {
            $game = GameDB::getGameByTitle($achievement->getGame());
            if (!empty($game) && ($game[$achievement->getConsole()] === 1)) {
                $result = GameDB::getAchievements($game['AchievementTable']);
                $achievementList = array();
                foreach ($result as $realRow) {
                    $achievementList[] = $realRow['Achievement'];
                }
                if (in_array($achievement->getAchievement(), $achievementList)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}