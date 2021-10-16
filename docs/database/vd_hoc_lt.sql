-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 14, 2021 at 02:27 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vd_hoc_lt`
--  

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_post` int(11) DEFAULT NULL,
  `id_question` int(11) DEFAULT NULL,
  `comment_content` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `comment_date_comment` datetime NOT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `id_user` (`id_user`),
  KEY `id_post` (`id_post`),
  KEY `id_question` (`id_question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id_like` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_post` int(11) DEFAULT NULL,
  `id_question` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_like`),
  KEY `id_user` (`id_user`),
  KEY `id_post` (`id_post`),
  KEY `id_question` (`id_question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `source_code` text COLLATE utf8_unicode_ci,
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `id_topic` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `post_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `post_content` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `post_date_created` datetime NOT NULL,
  `post_views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_post`),
  KEY `id_topic` (`id_topic`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id_question` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `question_conntent` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `question_date_created` datetime NOT NULL,
  `question_views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_question`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE IF NOT EXISTS `report` (
  `id_report` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_post` int(11) DEFAULT NULL,
  `id_question` int(11) DEFAULT NULL,
  `report_content` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_report`),
  KEY `id_user` (`id_user`),
  KEY `id_post` (`id_post`),
  KEY `id_question` (`id_question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

DROP TABLE IF EXISTS `topic`;
CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int(11) NOT NULL AUTO_INCREMENT,
  `topic_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_topic`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userr`
--

DROP TABLE IF EXISTS `userr`;
CREATE TABLE IF NOT EXISTS `userr` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_display_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_position` int(1) NOT NULL DEFAULT '0',
  `user_status` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_date_create` datetime DEFAULT NULL,
  `user_image` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userr`
--

INSERT INTO `userr` (`id_user`, `user_name`, `user_password`, `user_display_name`, `user_email`, `user_position`, `user_status`, `user_date_create`, `user_image`) VALUES
(1, 'admin', '1', 'admin', '', 2, 'Đang hoat dong', '2021-10-14 09:18:21', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `userr` (`id_user`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`),
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`id_question`) REFERENCES `question` (`id_question`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `userr` (`id_user`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`),
  ADD CONSTRAINT `likes_ibfk_3` FOREIGN KEY (`id_question`) REFERENCES `question` (`id_question`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_topic`) REFERENCES `topic` (`id_topic`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `userr` (`id_user`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `userr` (`id_user`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `userr` (`id_user`),
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`),
  ADD CONSTRAINT `report_ibfk_3` FOREIGN KEY (`id_question`) REFERENCES `question` (`id_question`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
