CREATE TABLE Users (
    UserId INT NOT NULL AUTO_INCREMENT,
    ProfileName VARCHAR(50),
    FirstName VARCHAR(50),
    LastName VARCHAR(50),
    PasswordHash VARCHAR(33),
    Email VARCHAR(255),
    PRIMARY KEY (UserId)
);

CREATE TABLE Friends (
    FriendshipId INT NOT NULL AUTO_INCREMENT,
    FriendLeft INT,
    FriendRight INT,
    FriendshipDate DATETIME,
    PRIMARY KEY (FriendshipId),
    CONSTRAINT `fk_FriendLeft`
      FOREIGN KEY (FriendLeft) REFERENCES Users(UserId),
    CONSTRAINT `fk_FriendRight`
      FOREIGN KEY (FriendRight) REFERENCES Users(UserId)
);

CREATE TABLE Consoles (
    ConsoleId INT NOT NULL AUTO_INCREMENT,
    ConsoleName VARCHAR(255),
    PRIMARY KEY (ConsoleId)
);

CREATE TABLE Games (
    GameId INT NOT NULL AUTO_INCREMENT,
    GameTitle VARCHAR(255),
    Console INT,
    PRIMARY KEY (GameId),
    CONSTRAINT `fk_Console`
      FOREIGN KEY (Console) REFERENCES Consoles(ConsoleId)
);

CREATE TABLE Achievements (
    AchievementId INT NOT NULL AUTO_INCREMENT,
    AchievementName VARCHAR(255),
    DateAchieved DATETIME,
    Game INT,
    PRIMARY KEY (AchievementId),
    CONSTRAINT `fk_Game`
      FOREIGN KEY (Game) REFERENCES Games(GameId)
);

