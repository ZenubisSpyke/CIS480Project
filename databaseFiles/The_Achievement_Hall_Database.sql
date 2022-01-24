-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2022 at 05:03 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cis480project`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements_aoeiv`
--

CREATE TABLE `achievements_aoeiv` (
  `AchievementId` int(11) NOT NULL,
  `Achievement` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `achievements_aoeiv`
--

INSERT INTO `achievements_aoeiv` (`AchievementId`, `Achievement`) VALUES
(1, 'Empires Will Rise'),
(3, 'Kingdoms Will Fall'),
(4, 'A New Age Is Upon Us');

-- --------------------------------------------------------

--
-- Table structure for table `achievements_ascent`
--

CREATE TABLE `achievements_ascent` (
  `AchievementId` int(11) NOT NULL,
  `Achievement` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `achievements_ascent`
--

INSERT INTO `achievements_ascent` (`AchievementId`, `Achievement`) VALUES
(1, 'We\'re just getting started'),
(2, 'Suicidal'),
(3, 'Do Over'),
(4, 'Sashimi'),
(5, 'Helping hand'),
(6, 'What just happened?');

-- --------------------------------------------------------

--
-- Table structure for table `achievements_codbo`
--

CREATE TABLE `achievements_codbo` (
  `AchievementId` int(11) NOT NULL,
  `Achievement` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `achievements_codbo`
--

INSERT INTO `achievements_codbo` (`AchievementId`, `Achievement`) VALUES
(1, 'Death to Dictators'),
(2, 'Sacrifice'),
(3, 'Vehicular Slaughter'),
(4, 'Slingshot Kid');

-- --------------------------------------------------------

--
-- Table structure for table `achievements_infss`
--

CREATE TABLE `achievements_infss` (
  `AchievementId` int(11) NOT NULL,
  `Achievement` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `achievements_infss`
--

INSERT INTO `achievements_infss` (`AchievementId`, `Achievement`) VALUES
(1, 'Enjoy Your Powers'),
(2, 'Unstoppable'),
(3, 'Sacrifice'),
(4, 'Ruthless'),
(5, 'Temperance');

-- --------------------------------------------------------

--
-- Table structure for table `consoles`
--

CREATE TABLE `consoles` (
  `ConsoleId` int(11) NOT NULL,
  `ConsoleName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consoles`
--

INSERT INTO `consoles` (`ConsoleId`, `ConsoleName`) VALUES
(1, 'Steam'),
(2, 'Playstation'),
(3, 'XBox');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `GameId` int(11) NOT NULL,
  `GameTitle` varchar(255) DEFAULT NULL,
  `XBox` tinyint(1) NOT NULL,
  `Playstation` tinyint(1) NOT NULL,
  `Steam` tinyint(1) NOT NULL,
  `AchievementTable` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`GameId`, `GameTitle`, `XBox`, `Playstation`, `Steam`, `AchievementTable`) VALUES
(1, 'Call of Duty: Black Ops', 1, 1, 1, 'codbo'),
(2, 'inFamous: Second Son', 0, 1, 0, 'infss'),
(3, 'The Ascent', 1, 0, 0, 'ascent'),
(4, 'Age of Empires IV', 0, 0, 1, 'aoeiv');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `ProfileName` varchar(50) DEFAULT NULL,
  `PasswordHash` varchar(33) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `ProfileName`, `PasswordHash`, `Email`) VALUES
(1, 'comedyTribute', '5f4dcc3b5aa765d61d8327deb882cf99', 'bob_saget@gmail.com'),
(2, 'TallerThanBread', '8df9ca990764fa2398174f8165dd669c', 'kevin_hart@gmail.com'),
(8, 'ZenubisSpyke', '550f33f757368ed5fb52d0b954a6ef24', 'gtbager2@hotmail.com'),
(24, 'TheRooster', 'e0cea4bb45e36c115356e46910c354af', 'roostermannn@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user_achievements_1`
--

CREATE TABLE `user_achievements_1` (
  `AchievementNo` int(11) NOT NULL,
  `Game` varchar(255) NOT NULL,
  `Achievement` varchar(255) NOT NULL,
  `Console` int(11) NOT NULL,
  `DateAchieved` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_achievements_1`
--

INSERT INTO `user_achievements_1` (`AchievementNo`, `Game`, `Achievement`, `Console`, `DateAchieved`) VALUES
(2, 'The Ascent', 'Do Over', 3, '2022-01-23'),
(3, 'Age of Empires IV', 'Empires Will Rise', 1, '2022-01-23'),
(4, 'Call of Duty: Black Ops', 'Slingshot Kid', 2, '2022-01-23'),
(5, 'inFamous: Second Son', 'Unstoppable', 2, '2022-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `user_achievements_2`
--

CREATE TABLE `user_achievements_2` (
  `AchievementNo` int(11) NOT NULL,
  `Game` varchar(255) NOT NULL,
  `Achievement` varchar(255) NOT NULL,
  `Console` int(11) NOT NULL,
  `DateAchieved` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_achievements_8`
--

CREATE TABLE `user_achievements_8` (
  `AchievementNo` int(11) NOT NULL,
  `Game` varchar(255) NOT NULL,
  `Achievement` varchar(255) NOT NULL,
  `Console` int(11) NOT NULL,
  `DateAchieved` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_achievements_8`
--

INSERT INTO `user_achievements_8` (`AchievementNo`, `Game`, `Achievement`, `Console`, `DateAchieved`) VALUES
(2, 'Age of Empires IV', 'A New Age Is Upon Us', 1, '2022-01-23'),
(3, 'Call of Duty: Black Ops', 'Vehicular Slaughter', 2, '2022-01-23'),
(4, 'inFamous: Second Son', 'Temperance', 2, '2022-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `user_achievements_24`
--

CREATE TABLE `user_achievements_24` (
  `AchievementNo` int(11) NOT NULL,
  `Game` varchar(255) NOT NULL,
  `Achievement` varchar(255) NOT NULL,
  `Console` int(11) NOT NULL,
  `DateAchieved` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_friends_1`
--

CREATE TABLE `user_friends_1` (
  `FriendNo` int(11) NOT NULL,
  `FriendUserId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_friends_1`
--

INSERT INTO `user_friends_1` (`FriendNo`, `FriendUserId`) VALUES
(1, 2),
(2, 8),
(9, 24);

-- --------------------------------------------------------

--
-- Table structure for table `user_friends_2`
--

CREATE TABLE `user_friends_2` (
  `FriendNo` int(11) NOT NULL,
  `FriendUserId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_friends_2`
--

INSERT INTO `user_friends_2` (`FriendNo`, `FriendUserId`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_friends_8`
--

CREATE TABLE `user_friends_8` (
  `FriendNo` int(11) NOT NULL,
  `FriendUserId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_friends_8`
--

INSERT INTO `user_friends_8` (`FriendNo`, `FriendUserId`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_friends_24`
--

CREATE TABLE `user_friends_24` (
  `FriendNo` int(11) NOT NULL,
  `FriendUserId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievements_aoeiv`
--
ALTER TABLE `achievements_aoeiv`
  ADD PRIMARY KEY (`AchievementId`);

--
-- Indexes for table `achievements_ascent`
--
ALTER TABLE `achievements_ascent`
  ADD PRIMARY KEY (`AchievementId`);

--
-- Indexes for table `achievements_codbo`
--
ALTER TABLE `achievements_codbo`
  ADD PRIMARY KEY (`AchievementId`);

--
-- Indexes for table `achievements_infss`
--
ALTER TABLE `achievements_infss`
  ADD PRIMARY KEY (`AchievementId`);

--
-- Indexes for table `consoles`
--
ALTER TABLE `consoles`
  ADD PRIMARY KEY (`ConsoleId`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`GameId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `user_achievements_1`
--
ALTER TABLE `user_achievements_1`
  ADD PRIMARY KEY (`AchievementNo`),
  ADD KEY `Console` (`Console`);

--
-- Indexes for table `user_achievements_2`
--
ALTER TABLE `user_achievements_2`
  ADD PRIMARY KEY (`AchievementNo`),
  ADD KEY `Console` (`Console`);

--
-- Indexes for table `user_achievements_8`
--
ALTER TABLE `user_achievements_8`
  ADD PRIMARY KEY (`AchievementNo`),
  ADD KEY `Console` (`Console`);

--
-- Indexes for table `user_achievements_24`
--
ALTER TABLE `user_achievements_24`
  ADD PRIMARY KEY (`AchievementNo`),
  ADD KEY `Console` (`Console`);

--
-- Indexes for table `user_friends_1`
--
ALTER TABLE `user_friends_1`
  ADD PRIMARY KEY (`FriendNo`);

--
-- Indexes for table `user_friends_2`
--
ALTER TABLE `user_friends_2`
  ADD PRIMARY KEY (`FriendNo`);

--
-- Indexes for table `user_friends_8`
--
ALTER TABLE `user_friends_8`
  ADD PRIMARY KEY (`FriendNo`);

--
-- Indexes for table `user_friends_24`
--
ALTER TABLE `user_friends_24`
  ADD PRIMARY KEY (`FriendNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievements_aoeiv`
--
ALTER TABLE `achievements_aoeiv`
  MODIFY `AchievementId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `achievements_ascent`
--
ALTER TABLE `achievements_ascent`
  MODIFY `AchievementId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `achievements_codbo`
--
ALTER TABLE `achievements_codbo`
  MODIFY `AchievementId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `achievements_infss`
--
ALTER TABLE `achievements_infss`
  MODIFY `AchievementId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `consoles`
--
ALTER TABLE `consoles`
  MODIFY `ConsoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `GameId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_achievements_1`
--
ALTER TABLE `user_achievements_1`
  MODIFY `AchievementNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_achievements_2`
--
ALTER TABLE `user_achievements_2`
  MODIFY `AchievementNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_achievements_8`
--
ALTER TABLE `user_achievements_8`
  MODIFY `AchievementNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_achievements_24`
--
ALTER TABLE `user_achievements_24`
  MODIFY `AchievementNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_friends_1`
--
ALTER TABLE `user_friends_1`
  MODIFY `FriendNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_friends_2`
--
ALTER TABLE `user_friends_2`
  MODIFY `FriendNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_friends_8`
--
ALTER TABLE `user_friends_8`
  MODIFY `FriendNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_friends_24`
--
ALTER TABLE `user_friends_24`
  MODIFY `FriendNo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_achievements_1`
--
ALTER TABLE `user_achievements_1`
  ADD CONSTRAINT `user_achievements_1_ibfk_1` FOREIGN KEY (`Console`) REFERENCES `consoles` (`ConsoleId`);

--
-- Constraints for table `user_achievements_2`
--
ALTER TABLE `user_achievements_2`
  ADD CONSTRAINT `user_achievements_2_ibfk_1` FOREIGN KEY (`Console`) REFERENCES `consoles` (`ConsoleId`);

--
-- Constraints for table `user_achievements_8`
--
ALTER TABLE `user_achievements_8`
  ADD CONSTRAINT `user_achievements_8_ibfk_1` FOREIGN KEY (`Console`) REFERENCES `consoles` (`ConsoleId`);

--
-- Constraints for table `user_achievements_24`
--
ALTER TABLE `user_achievements_24`
  ADD CONSTRAINT `user_achievements_24_ibfk_1` FOREIGN KEY (`Console`) REFERENCES `consoles` (`ConsoleId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
