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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `username`, `email`, `password`, `roles`, `date_created`, `date_modified`) VALUES
('Jake', 'jake', 'larex@yahoo.com', 'Password123*', 2, NULL, NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
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
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `date_created` datetime NOT NULL,
  `date_modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`posts_id`),
  KEY `postcode` (`post_code`),
     CONSTRAINT `postcode` FOREIGN KEY (`post_code`) REFERENCES `headline` (`post_code`) ON DELETE CASCADE,   
  KEY `userid` (`user_id`),
      CONSTRAINT `userid` FOREIGN KEY (`user_id`) REFERENCES `admin` (`id`) ON DELETE CASCADE
    
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `viewer`
--

CREATE TABLE IF NOT EXISTS `viewer` (
  `viewer_id` int(255) NOT NULL AUTO_INCREMENT,
  `viewer_email` varchar(255) NOT NULL,
  `date_created` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`viewer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--

 

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
