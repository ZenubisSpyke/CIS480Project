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
