-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2022 at 08:52 PM
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
(1, 'Death to Dictators');

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
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `FriendshipId` int(11) NOT NULL,
  `FriendLeft` int(11) DEFAULT NULL,
  `FriendRight` int(11) DEFAULT NULL,
  `FriendshipDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`FriendshipId`, `FriendLeft`, `FriendRight`, `FriendshipDate`) VALUES
(1, 1, 2, '2022-01-06 21:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `GameId` int(11) NOT NULL,
  `GameTitle` varchar(255) DEFAULT NULL,
  `Xbox` tinyint(1) NOT NULL,
  `PS` tinyint(1) NOT NULL,
  `Steam` tinyint(1) NOT NULL,
  `AchievementTable` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`GameId`, `GameTitle`, `Xbox`, `PS`, `Steam`, `AchievementTable`) VALUES
(1, 'Call of Duty: Black Ops', 1, 1, 1, 'codbo');

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
(1, 'comedyTribute', 'bdc87b9c894da5168059e00ebffb9077', 'bob_saget@gmail.com'),
(2, 'TallerThanBread', 'bdc87b9c894da5168059e00ebffb9077', 'kevin_hart@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievements_codbo`
--
ALTER TABLE `achievements_codbo`
  ADD PRIMARY KEY (`AchievementId`);

--
-- Indexes for table `consoles`
--
ALTER TABLE `consoles`
  ADD PRIMARY KEY (`ConsoleId`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`FriendshipId`),
  ADD KEY `fk_FriendLeft` (`FriendLeft`),
  ADD KEY `fk_FriendRight` (`FriendRight`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievements_codbo`
--
ALTER TABLE `achievements_codbo`
  MODIFY `AchievementId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `consoles`
--
ALTER TABLE `consoles`
  MODIFY `ConsoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `FriendshipId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `GameId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `fk_FriendLeft` FOREIGN KEY (`FriendLeft`) REFERENCES `users` (`UserId`),
  ADD CONSTRAINT `fk_FriendRight` FOREIGN KEY (`FriendRight`) REFERENCES `users` (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
