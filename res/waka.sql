-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 02, 2014 at 10:20 PM
-- Server version: 5.5.38
-- PHP Version: 5.4.4-14+deb7u14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `waka`
--

-- --------------------------------------------------------

--
-- Table structure for table `daily_langs`
--

CREATE TABLE IF NOT EXISTS `daily_langs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `logdate` date NOT NULL,
  `language` varchar(10) NOT NULL,
  `percent` float(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `logdate` (`logdate`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `daily_totals`
--

CREATE TABLE IF NOT EXISTS `daily_totals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logdate` date NOT NULL,
  `total_mins` int(11) NOT NULL,
  `total_hours` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `logdate` (`logdate`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `logdate` date NOT NULL,
  `name` varchar(30) NOT NULL,
  `total_time_mins` int(11) NOT NULL,
  `total_time_hours` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `logdate` (`logdate`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(40) NOT NULL,
  `wakaid` varchar(50) NOT NULL,
  `plan` varchar(20) NOT NULL,
  `public_name` varchar(50) NOT NULL,
  `timezone` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
