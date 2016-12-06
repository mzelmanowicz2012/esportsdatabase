-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2016 at 11:54 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_sports`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `comp_id` int(11) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `c_name` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`comp_id`, `u_id`, `c_name`) VALUES
(1, NULL, 'Microsoft'),
(2, NULL, 'Apple'),
(3, NULL, 'UPS'),
(4, NULL, 'FedEx'),
(5, NULL, 'Amazon'),
(6, 3, 'Monster Energy'),
(7, NULL, '100TB');

-- --------------------------------------------------------

--
-- Table structure for table `competes_in`
--

CREATE TABLE `competes_in` (
  `p_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `competes_in`
--

INSERT INTO `competes_in` (`p_id`, `t_id`) VALUES
(8, 6);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `g_id` int(11) NOT NULL,
  `release_date` date DEFAULT NULL,
  `developer` varchar(256) DEFAULT NULL,
  `title` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`g_id`, `release_date`, `developer`, `title`) VALUES
(1, '2001-11-15', 'Bungie', 'Halo'),
(2, '2016-05-23', 'Blizzard', 'Overwatch'),
(3, '2011-10-25', 'Dice', 'Battlefield 3'),
(4, '2001-11-21', 'Nintendo', 'Super Smash Bros. Melee'),
(5, '2015-10-27', '343 Industries', 'Halo 5'),
(6, '2013-07-09', 'Valve Corporation', 'Dota 2'),
(7, '2015-05-28', 'Nintendo', 'Splatoon'),
(8, '2016-03-18', 'Nintendo', 'Pokken Tournament');

-- --------------------------------------------------------

--
-- Table structure for table `gameuse`
--

CREATE TABLE `gameuse` (
  `g_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gameuse`
--

INSERT INTO `gameuse` (`g_id`, `t_id`) VALUES
(2, 1),
(4, 8),
(6, 6),
(6, 7),
(8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `p_id` int(11) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `p_Fname` varchar(256) DEFAULT NULL,
  `P_Lname` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`p_id`, `u_id`, `age`, `p_Fname`, `P_Lname`) VALUES
(1, NULL, 22, 'Matt', 'Fowl'),
(2, NULL, 23, 'Matt', 'Zel'),
(3, NULL, 27, 'Jamari', 'Daniel'),
(4, NULL, 26, 'Devin', 'Clark'),
(6, NULL, 22, 'Ashis', 'Mohanty'),
(7, NULL, 25, 'Peter', 'Dager'),
(8, 2, 20, 'Artour', 'Babaev');

-- --------------------------------------------------------

--
-- Table structure for table `p_sponsorship`
--

CREATE TABLE `p_sponsorship` (
  `sponsor_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `p_sponsorship`
--

INSERT INTO `p_sponsorship` (`sponsor_id`, `p_id`, `comp_id`) VALUES
(1, 7, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tournament`
--

CREATE TABLE `tournament` (
  `T_id` int(11) NOT NULL,
  `location` varchar(256) NOT NULL,
  `t_name` varchar(256) DEFAULT NULL,
  `organizer` varchar(256) DEFAULT NULL,
  `start_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tournament`
--

INSERT INTO `tournament` (`T_id`, `location`, `t_name`, `organizer`, `start_date`) VALUES
(1, 'Cube', 'Overwatch Deathmatch', 'Gaming League', '2016-11-23'),
(2, 'Cube', 'Team Smash', 'Gaming League', '2016-11-23'),
(3, 'Austin, TX', 'Headhunter', 'AHWU', '2016-11-23'),
(4, 'Cube', 'Conquest', 'Gaming League', '2016-11-23'),
(5, 'Austin, TX', 'RvB', 'RT', '2016-11-23'),
(6, 'Los Angeles, CA', 'The Summit 6', 'Beyond the Summit', '2016-11-16'),
(7, 'Boston, MA', 'The Boston Major 2016', 'PGL', '2016-12-03'),
(8, 'Las Vegas, NV', 'EVO 2016', 'Shoryuken', '2016-07-15');

-- --------------------------------------------------------

--
-- Table structure for table `t_sponsorship`
--

CREATE TABLE `t_sponsorship` (
  `sponsor_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_sponsorship`
--

INSERT INTO `t_sponsorship` (`sponsor_id`, `t_id`, `comp_id`) VALUES
(1, 6, 6),
(2, 6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `u_name` varchar(256) NOT NULL,
  `u_psswrd` varchar(256) NOT NULL,
  `u_type` int(11) DEFAULT '0' COMMENT '0 = spectator, 1 = player, 2 = company'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `email`, `u_name`, `u_psswrd`, `u_type`) VALUES
(1, 'test1@fau.edu', 'test1', 'test', 0),
(2, 'arteezy@evilgeniuses.gg', 'Arteezy', '2ez4rtz', 1),
(3, 'monster@monsterbevcorp.com', 'MonsterEnergy', 'Unleash', 2),
(4, 'myemail', 'myname', '2d90985d02f66ae63193fd77695728b3', 0),
(5, 'alice@example.com', 'alice', '826a87a35b03a2fc9b725e84868d9c7d', 0),
(6, 'company@company.com', 'company', 'cf0cb2b1f0d508f07ccd3c38da440e27', 2);

-- --------------------------------------------------------

--
-- Table structure for table `u_follow_g`
--

CREATE TABLE `u_follow_g` (
  `u_id` int(11) NOT NULL,
  `g_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `u_follow_g`
--

INSERT INTO `u_follow_g` (`u_id`, `g_id`) VALUES
(1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `u_follow_p`
--

CREATE TABLE `u_follow_p` (
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `u_follow_p`
--

INSERT INTO `u_follow_p` (`u_id`, `p_id`) VALUES
(1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `u_follow_t`
--

CREATE TABLE `u_follow_t` (
  `u_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `u_follow_t`
--

INSERT INTO `u_follow_t` (`u_id`, `t_id`) VALUES
(1, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`comp_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `competes_in`
--
ALTER TABLE `competes_in`
  ADD PRIMARY KEY (`p_id`,`t_id`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`g_id`);

--
-- Indexes for table `gameuse`
--
ALTER TABLE `gameuse`
  ADD PRIMARY KEY (`g_id`,`t_id`),
  ADD KEY `gameuse_ibfk_2` (`t_id`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `p_sponsorship`
--
ALTER TABLE `p_sponsorship`
  ADD PRIMARY KEY (`sponsor_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `comp_id` (`comp_id`);

--
-- Indexes for table `tournament`
--
ALTER TABLE `tournament`
  ADD PRIMARY KEY (`T_id`);

--
-- Indexes for table `t_sponsorship`
--
ALTER TABLE `t_sponsorship`
  ADD PRIMARY KEY (`sponsor_id`),
  ADD KEY `comp_id` (`comp_id`),
  ADD KEY `t_sponsorship_ibfk_1` (`t_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `u_follow_g`
--
ALTER TABLE `u_follow_g`
  ADD PRIMARY KEY (`u_id`,`g_id`),
  ADD KEY `g_id` (`g_id`);

--
-- Indexes for table `u_follow_p`
--
ALTER TABLE `u_follow_p`
  ADD PRIMARY KEY (`u_id`,`p_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `u_follow_t`
--
ALTER TABLE `u_follow_t`
  ADD PRIMARY KEY (`u_id`,`t_id`),
  ADD KEY `t_id` (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `comp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `p_sponsorship`
--
ALTER TABLE `p_sponsorship`
  MODIFY `sponsor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tournament`
--
ALTER TABLE `tournament`
  MODIFY `T_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `t_sponsorship`
--
ALTER TABLE `t_sponsorship`
  MODIFY `sponsor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`);

--
-- Constraints for table `competes_in`
--
ALTER TABLE `competes_in`
  ADD CONSTRAINT `competes_in_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `player` (`p_id`),
  ADD CONSTRAINT `competes_in_ibfk_2` FOREIGN KEY (`t_id`) REFERENCES `tournament` (`T_id`);

--
-- Constraints for table `gameuse`
--
ALTER TABLE `gameuse`
  ADD CONSTRAINT `gameuse_ibfk_1` FOREIGN KEY (`g_id`) REFERENCES `game` (`g_id`),
  ADD CONSTRAINT `gameuse_ibfk_2` FOREIGN KEY (`t_id`) REFERENCES `tournament` (`T_id`);

--
-- Constraints for table `player`
--
ALTER TABLE `player`
  ADD CONSTRAINT `player_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`);

--
-- Constraints for table `p_sponsorship`
--
ALTER TABLE `p_sponsorship`
  ADD CONSTRAINT `p_sponsorship_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `player` (`p_id`),
  ADD CONSTRAINT `p_sponsorship_ibfk_2` FOREIGN KEY (`comp_id`) REFERENCES `company` (`comp_id`);

--
-- Constraints for table `t_sponsorship`
--
ALTER TABLE `t_sponsorship`
  ADD CONSTRAINT `t_sponsorship_ibfk_1` FOREIGN KEY (`t_id`) REFERENCES `tournament` (`T_id`),
  ADD CONSTRAINT `t_sponsorship_ibfk_2` FOREIGN KEY (`comp_id`) REFERENCES `company` (`comp_id`);

--
-- Constraints for table `u_follow_g`
--
ALTER TABLE `u_follow_g`
  ADD CONSTRAINT `u_follow_g_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`),
  ADD CONSTRAINT `u_follow_g_ibfk_2` FOREIGN KEY (`g_id`) REFERENCES `game` (`g_id`);

--
-- Constraints for table `u_follow_p`
--
ALTER TABLE `u_follow_p`
  ADD CONSTRAINT `u_follow_p_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`),
  ADD CONSTRAINT `u_follow_p_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `player` (`p_id`);

--
-- Constraints for table `u_follow_t`
--
ALTER TABLE `u_follow_t`
  ADD CONSTRAINT `u_follow_t_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`),
  ADD CONSTRAINT `u_follow_t_ibfk_2` FOREIGN KEY (`t_id`) REFERENCES `tournament` (`T_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
