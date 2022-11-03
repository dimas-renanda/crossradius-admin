-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2016 at 08:29 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatting`
--

-- --------------------------------------------------------

--
-- Table structure for table `chatters`
--

CREATE TABLE IF NOT EXISTS `chatters` (
  `name` text NOT NULL,
  `seen` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatters`
--

INSERT INTO `chatters` (`name`, `seen`) VALUES
('soni', '2016-01-25 14:28:32'),
('Bachors', '2016-01-25 14:28:55'),
('usep', '2016-01-25 14:28:34');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `name` text NOT NULL,
  `msg` text NOT NULL,
  `posted` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`name`, `msg`, `posted`) VALUES
('Bachors', 'hiiii', '2016-01-25 14:17:57'),
('Bachors', 'pa kabar', '2016-01-25 14:18:02'),
('soni', 'baik kawan', '2016-01-25 14:18:08'),
('Bachors', 'manathap http://ibacor.com', '2016-01-25 14:20:54'),
('soni', 'gurih gurih', '2016-01-25 14:21:30'),
('soni', 'enyoi...', '2016-01-25 14:21:34'),
('usep', 'nyimak nitip kadal :v', '2016-01-25 14:24:58');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
