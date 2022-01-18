--Already Populated

INSERT INTO `users`(`UserId`, `ProfileName`, `FirstName`, `LastName`, `PasswordHash`, `Email`) VALUES ('1', 'comedyTribute', 'Bob','Saget','bdc87b9c894da5168059e00ebffb9077','bob_saget@gmail.com');
INSERT INTO `users`(`UserId`, `ProfileName`, `FirstName`, `LastName`, `PasswordHash`, `Email`) VALUES ('2', 'TallerThanBread', 'Kevin','Hart','bdc87b9c894da5168059e00ebffb9077','kevin_hart@gmail.com');

INSERT INTO `consoles`(`ConsoleId`, `ConsoleName`) VALUES ('1','Steam');
INSERT INTO `consoles`(`ConsoleId`, `ConsoleName`) VALUES ('2','Playstation');
INSERT INTO `consoles`(`ConsoleId`, `ConsoleName`) VALUES ('3','XBox');

INSERT INTO `games`(`GameId`, `GameTitle`, `Console`) VALUES ('1','Call of Duty','1'); 

INSERT INTO `achievements`(`AchievementId`, `AchievementName`, `DateAchieved`, `Game`) VALUES ('1','Last Stand','01-06-2022 14:00:00.000000','1');
INSERT INTO `achievements`(`AchievementId`, `AchievementName`, `DateAchieved`, `Game`) VALUES ('2','Black Hawk Down','01-06-2022 15:00:00.000000','1');
INSERT INTO `achievements`(`AchievementId`, `AchievementName`, `DateAchieved`, `Game`) VALUES ('3','Stealth Kill','01-06-2022 16:00:00.000000','1');

INSERT INTO `friends`(`FriendshipId`, `FriendLeft`, `FriendRight`, `FriendshipDate`) VALUES ('1','1','2','01-06-2022 16:00:00.000000');
INSERT INTO `friends`(`FriendshipId`, `FriendLeft`, `FriendRight`, `FriendshipDate`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]');

--Copy/Paste to populate the database

START TRANSACTION;
CREATE TABLE subnautica (
  AchievementId int(11) NOT NULL,
  Achievement varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

START TRANSACTION;
CREATE TABLE darksouls (
  AchievementId int(11) NOT NULL,
  Achievement varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

START TRANSACTION;
CREATE TABLE skyrim (
  AchievementId int(11) NOT NULL,
  Achievement varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

START TRANSACTION;
CREATE TABLE theforest (
  AchievementId int(11) NOT NULL,
  Achievement varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users`(`UserId`, `ProfileName`, `FirstName`, `LastName`, `PasswordHash`, `Email`) VALUES ('3', 'Marshmallow', 'Kayla','Thompson','bdc87b9c894da5168059e00ebffb9077','marshmallow98@gmail.com');
INSERT INTO `users`(`UserId`, `ProfileName`, `FirstName`, `LastName`, `PasswordHash`, `Email`) VALUES ('4', 'Big_Gamer_99', 'Robert','Bigler','bdc87b9c894da5168059e00ebffb9077','forevergaming@aol.com');
INSERT INTO `users`(`UserId`, `ProfileName`, `FirstName`, `LastName`, `PasswordHash`, `Email`) VALUES ('5', 'CarlsJr123', 'CJ','Smith','bdc87b9c894da5168059e00ebffb9077','CJSmith@yahoo.com');
INSERT INTO `users`(`UserId`, `ProfileName`, `FirstName`, `LastName`, `PasswordHash`, `Email`) VALUES ('6', 'SummerTime_TTV', 'Summer','Carlton','bdc87b9c894da5168059e00ebffb9077','SSTwitch@gmail.com');
INSERT INTO `users`(`UserId`, `ProfileName`, `FirstName`, `LastName`, `PasswordHash`, `Email`) VALUES ('7', 'XxPlayStationDudexX', 'Kyle','Dryerton','bdc87b9c894da5168059e00ebffb9077','PSD@yahoo.com');

INSERT INTO `games`(`GameId`, `GameTitle`, `Console`) VALUES ('2','Subnautica','1'); 
INSERT INTO `games`(`GameId`, `GameTitle`, `Console`) VALUES ('3','Dark Souls 3','2'); 
INSERT INTO `games`(`GameId`, `GameTitle`, `Console`) VALUES ('4','Skyrim','1'); 
INSERT INTO `games`(`GameId`, `GameTitle`, `Console`) VALUES ('5','The Forest','3'); 

INSERT INTO `achievements`(`AchievementId`, `AchievementName`, `DateAchieved`, `Game`) VALUES ('2','Optimal Health','01-06-2022 14:00:00.000000','2');
INSERT INTO `achievements`(`AchievementId`, `AchievementName`, `DateAchieved`, `Game`) VALUES ('3','Thermal Activity','01-06-2022 14:00:00.000000','2');
INSERT INTO `achievements`(`AchievementId`, `AchievementName`, `DateAchieved`, `Game`) VALUES ('4','Ancient Technologies','01-06-2022 14:00:00.000000','2');
INSERT INTO `achievements`(`AchievementId`, `AchievementName`, `DateAchieved`, `Game`) VALUES ('5','Extinction Event Avoided','01-06-2022 14:00:00.000000','2');

INSERT INTO `achievements`(`AchievementId`, `AchievementName`, `DateAchieved`, `Game`) VALUES ('6','The Dark Soul','01-06-2022 14:00:00.000000','3');
INSERT INTO `achievements`(`AchievementId`, `AchievementName`, `DateAchieved`, `Game`) VALUES ('7','Enkindle','01-06-2022 14:00:00.000000','3');
INSERT INTO `achievements`(`AchievementId`, `AchievementName`, `DateAchieved`, `Game`) VALUES ('8','Embrace the Flame','01-06-2022 14:00:00.000000','3');
INSERT INTO `achievements`(`AchievementId`, `AchievementName`, `DateAchieved`, `Game`) VALUES ('9','Ultimate Bonfire','01-06-2022 14:00:00.000000','3');

INSERT INTO `achievements`(`AchievementId`, `AchievementName`, `DateAchieved`, `Game`) VALUES ('10','Take Up Arms','01-06-2022 14:00:00.000000','4');
INSERT INTO `achievements`(`AchievementId`, `AchievementName`, `DateAchieved`, `Game`) VALUES ('11','Unbound','01-06-2022 14:00:00.000000','4');
INSERT INTO `achievements`(`AchievementId`, `AchievementName`, `DateAchieved`, `Game`) VALUES ('12','Gatekeeper','01-06-2022 14:00:00.000000','4');
INSERT INTO `achievements`(`AchievementId`, `AchievementName`, `DateAchieved`, `Game`) VALUES ('13','Taking Sides','01-06-2022 14:00:00.000000','4');
INSERT INTO `achievements`(`AchievementId`, `AchievementName`, `DateAchieved`, `Game`) VALUES ('14','Sideways','01-06-2022 14:00:00.000000','4');

INSERT INTO `achievements`(`AchievementId`, `AchievementName`, `DateAchieved`, `Game`) VALUES ('15','Be Nice','01-06-2022 14:00:00.000000','5');
INSERT INTO `achievements`(`AchievementId`, `AchievementName`, `DateAchieved`, `Game`) VALUES ('16','Unseen','01-06-2022 14:00:00.000000','5');
INSERT INTO `achievements`(`AchievementId`, `AchievementName`, `DateAchieved`, `Game`) VALUES ('17','Monster','01-06-2022 14:00:00.000000','5');
INSERT INTO `achievements`(`AchievementId`, `AchievementName`, `DateAchieved`, `Game`) VALUES ('18','Survivalist','01-06-2022 14:00:00.000000','5');
INSERT INTO `achievements`(`AchievementId`, `AchievementName`, `DateAchieved`, `Game`) VALUES ('19','Birdseye','01-06-2022 14:00:00.000000','5');