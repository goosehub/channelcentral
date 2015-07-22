-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2015 at 03:31 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `channelcentral`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_bin NOT NULL,
  `message` text COLLATE utf8_bin NOT NULL,
  `host` varchar(12) COLLATE utf8_bin NOT NULL COMMENT 'Determines host status',
  `timestamp` varchar(32) COLLATE utf8_bin NOT NULL,
  `slug` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `name`, `message`, `host`, `timestamp`, `slug`) VALUES
(1, 'GEORGE', 'This is the first message', '', '1435627493', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `passwords`
--

CREATE TABLE IF NOT EXISTS `passwords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_bin NOT NULL,
  `password` varchar(64) COLLATE utf8_bin NOT NULL,
  `start` varchar(12) COLLATE utf8_bin NOT NULL,
  `end` varchar(12) COLLATE utf8_bin NOT NULL,
  `readStart` varchar(64) COLLATE utf8_bin NOT NULL,
  `readEnd` varchar(64) COLLATE utf8_bin NOT NULL,
  `slug` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) COLLATE utf8_bin NOT NULL,
  `daily_viewers` int(12) NOT NULL,
  `showName` varchar(512) COLLATE utf8_bin NOT NULL,
  `showDescription` varchar(4096) COLLATE utf8_bin NOT NULL,
  `headline` varchar(36) COLLATE utf8_bin NOT NULL,
  `length` varchar(16) COLLATE utf8_bin NOT NULL,
  `queue` varchar(16) COLLATE utf8_bin NOT NULL,
  `background` varchar(64) COLLATE utf8_bin NOT NULL,
  `twitch` varchar(64) COLLATE utf8_bin NOT NULL,
  `twitch_on` int(1) NOT NULL,
  `reload` varchar(12) COLLATE utf8_bin NOT NULL COMMENT 'Clients reload when time is less than reload',
  `purple` text COLLATE utf8_bin NOT NULL,
  `orange` text COLLATE utf8_bin NOT NULL,
  `green` text COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL,
  `started` int(12) NOT NULL,
  `last_login` int(12) NOT NULL,
  `shuffle` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `slug`, `daily_viewers`, `showName`, `showDescription`, `headline`, `length`, `queue`, `background`, `twitch`, `twitch_on`, `reload`, `purple`, `orange`, `green`, `password`, `started`, `last_login`, `shuffle`) VALUES
(1, 'new', 0, 'Welcome', '<center>\r\n<h1>new</h1>\r\n\r\n<img height="50%" width="50%" src="resources/images/black.png">\r\n</center>', 'new', '36000', '36000', '7a5b04a388a6ef83f9c3cbcbe85979ca.jpg', '', 0, '1435627496', '', '', '', '925cc8d2953eba624b2bfedf91a91613', 1435627315, 1435627315, 0),
(2, 'twitch', 0, 'Welcome', '<center>\r\n<h1>twitch</h1>\r\n\r\n<img height="50%" width="50%" src="resources/images/black.png">\r\n</center>', 'twitch', '900', '1800', 'default.jpg', 'fredsauce', 1, '1437528095', '', '', '', '925cc8d2953eba624b2bfedf91a91613', 1437522548, 1437522548, 0);

-- --------------------------------------------------------

--
-- Table structure for table `upcoming`
--

CREATE TABLE IF NOT EXISTS `upcoming` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_bin NOT NULL,
  `timeframe` varchar(128) COLLATE utf8_bin NOT NULL,
  `start` varchar(12) COLLATE utf8_bin NOT NULL,
  `name` varchar(64) COLLATE utf8_bin NOT NULL,
  `slug` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) COLLATE utf8_bin NOT NULL,
  `viewers` int(12) NOT NULL,
  `name` varchar(32) COLLATE utf8_bin NOT NULL,
  `scheduled` varchar(64) COLLATE utf8_bin NOT NULL COMMENT 'Record of changes',
  `duration` varchar(16) COLLATE utf8_bin NOT NULL COMMENT 'In seconds',
  `youtube` varchar(16) COLLATE utf8_bin NOT NULL,
  `time` varchar(12) COLLATE utf8_bin NOT NULL COMMENT 'UNIX time created',
  `start` varchar(12) COLLATE utf8_bin NOT NULL,
  `end` varchar(12) COLLATE utf8_bin NOT NULL,
  `type` varchar(32) COLLATE utf8_bin NOT NULL,
  `title` varchar(1000) COLLATE utf8_bin NOT NULL,
  `audio` varchar(64) COLLATE utf8_bin NOT NULL,
  `image` varchar(64) COLLATE utf8_bin NOT NULL,
  `vocaroo` varchar(100) COLLATE utf8_bin NOT NULL,
  `special` varchar(64) COLLATE utf8_bin NOT NULL COMMENT 'For priority, events, and circumstance',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `slug`, `viewers`, `name`, `scheduled`, `duration`, `youtube`, `time`, `start`, `end`, `type`, `title`, `audio`, `image`, `vocaroo`, `special`) VALUES
(2, 'new', 31, 'anonymous', 'Jun 29, 2015, 9:29:13 pm', '8542', 'JuGl-kr9djo', '1435627753', '1435627753', '1435636295', '', '', '', '', '', ''),
(3, 'twitch', 4, 'anonymous', 'Jul 21, 2015, 9:03:10 pm -  secs -  secs -  secs -  secs -  secs', '296', 'uAOR6ib95kQ', '1437526990', '1437526990', '1437527286', '', '', '', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
