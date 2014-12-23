-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2014 at 09:48 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `radio`
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `host`
--

CREATE TABLE IF NOT EXISTS `host` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `showName` varchar(512) COLLATE utf8_bin NOT NULL,
  `showDescription` varchar(4096) COLLATE utf8_bin NOT NULL,
  `headline` varchar(36) COLLATE utf8_bin NOT NULL,
  `background` varchar(64) COLLATE utf8_bin NOT NULL,
  `length` varchar(16) COLLATE utf8_bin NOT NULL,
  `queue` varchar(16) COLLATE utf8_bin NOT NULL,
  `purple` text COLLATE utf8_bin NOT NULL,
  `orange` text COLLATE utf8_bin NOT NULL,
  `green` text COLLATE utf8_bin NOT NULL,
  `reload` varchar(12) COLLATE utf8_bin NOT NULL COMMENT 'Clients reload when time is less than reload',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `host`
--

INSERT INTO `host` (`id`, `showName`, `showDescription`, `headline`, `background`, `length`, `queue`, `purple`, `orange`, `green`, `reload`) VALUES
(1, 'Show Name', 'Show description', 'Headline', '', '600', '1200', '<button class="btn btn-default disabled">Customize the nav buttons</button>       <a target="_blank" href="http://esfores.com/radio/view/host.php"><button class="btn btn-primary">Hosting Page</button></a>', '<button class="btn btn-default disabled">Customize the nav buttons</button>       <a target="_blank" href="http://esfores.com/radio/view/host.php"><button class="btn btn-primary">Hosting Page</button></a>', '<button class="btn btn-default disabled">Customize the nav buttons</button>       <a target="_blank" href="http://esfores.com/radio/view/host.php"><button class="btn btn-primary">Hosting Page</button></a>', '');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `passwords`
--

INSERT INTO `passwords` (`id`, `name`, `password`, `start`, `end`, `readStart`, `readEnd`) VALUES
(1, 'ADMIN', '1234', '', '', '', '');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) COLLATE utf8_bin NOT NULL,
  `type` varchar(32) COLLATE utf8_bin NOT NULL,
  `title` varchar(1000) COLLATE utf8_bin NOT NULL,
  `time` varchar(12) COLLATE utf8_bin NOT NULL COMMENT 'UNIX time created',
  `duration` varchar(16) COLLATE utf8_bin NOT NULL COMMENT 'In seconds',
  `scheduled` varchar(64) COLLATE utf8_bin NOT NULL COMMENT 'Record of changes',
  `start` varchar(12) COLLATE utf8_bin NOT NULL,
  `end` varchar(12) COLLATE utf8_bin NOT NULL,
  `youtube` varchar(16) COLLATE utf8_bin NOT NULL,
  `audio` varchar(64) COLLATE utf8_bin NOT NULL,
  `image` varchar(64) COLLATE utf8_bin NOT NULL,
  `special` varchar(64) COLLATE utf8_bin NOT NULL COMMENT 'For priority, events, and circumstance',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
