-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2020 at 02:59 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogcms2.0`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` int(10) NOT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `email`, `password`, `roles`, `date_created`, `date_modified`) VALUES
(11, 'Jake', 'jake', 'larex@yahoo.com', 'Password123*', 2, NULL, NULL),
(13, 'Jake', 'Superadmin', 'jake@yahoo.com', 'Password123*', 2, NULL, NULL),
(14, 'Jake', 'Superadmin', 'jaketuriacada@gmail.com', 'Password123*', 2, NULL, NULL),
(15, 'Jake', 'Superadmin', 'gblend@gmail.com', 'Password123**', 1, NULL, '2020-09-14 10:40:01'),
(16, 'Jake', 'wizkid', 'larex090@yahoo.com', 'Password123**/', 1, NULL, NULL),
(17, 'love', 'wizkid', 'shinnigami@gmail.com', 'Password123*', 2, '2020-09-14 10:35:36', '2020-09-14 10:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `headline`
--

CREATE TABLE IF NOT EXISTS `headline` (
  `headline_id` int(11) NOT NULL AUTO_INCREMENT,
  `headline_name` varchar(255) NOT NULL,
  `post_code` varchar(255) NOT NULL,
  `headline_status` int(11) NOT NULL,
  PRIMARY KEY (`headline_id`),
  KEY `post_code` (`post_code`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_title` varchar(255) NOT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  `date_modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `posts_id` int(100) NOT NULL AUTO_INCREMENT,
  `menu_id` int(100) NOT NULL,
  `user_id` int(255) NOT NULL,
  `posts_title` varchar(255) NOT NULL,
  `post_code` varchar(255) NOT NULL,
  `posts_body` varchar(255) NOT NULL,
  `posts_tags` varchar(255) NOT NULL,
  `posts_img` text NOT NULL,
  `posts_author` varchar(255) NOT NULL,
  `editor_pick` int(11) DEFAULT NULL,
  `posts_status` int(255) DEFAULT NULL,
  `date_created` datetime DEFAULT current_timestamp(),
  `date_modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`posts_id`),
  KEY `postcode` (`post_code`),
  KEY `userid` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `viewer`
--

CREATE TABLE IF NOT EXISTS `viewer` (
  `viewer_id` int(255) NOT NULL AUTO_INCREMENT,
  `viewer_email` varchar(255) NOT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`viewer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `postcode` FOREIGN KEY (`post_code`) REFERENCES `headline` (`post_code`) ON DELETE CASCADE,
  ADD CONSTRAINT `userid` FOREIGN KEY (`user_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
