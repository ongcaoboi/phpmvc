-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 08, 2021 at 07:29 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test_1_vd_hoc_lt`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `getListPostByPage`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getListPostByPage` (IN `vtbd` INT, IN `sodong` INT)  BEGIN
  select * from (select `id_post`, `post_title`, `post_content`, `post_date_created`, `post_views`, `id_user`, `user_name`, `user_display_name`, topic.`id_topic`, `topic_name`, `slComment`, `slLikes` from (select `id_post`, `id_topic`, `post_title`, `post_content`, `post_date_created`, `post_views`, `id_user`, `user_name`, `user_display_name`, `slComment`, COUNT(`id`) as `slLikes` from (select C.`id_post`, `id_topic`, `post_title`, `post_content`, `post_date_created`, `post_views`, C.`id_user`, `user_name`, `user_display_name`, `slComment`, likes.`id_post` as `id` from (select `id_post`, `id_topic`, `post_title`, `post_content`, `post_date_created`, `post_views`, `id_user`, `user_name`, `user_display_name`, COUNT(`id`) as `slComment` from (select  A.`id_post`, `id_topic`, `post_title`, `post_content`, `post_date_created`, `post_views`, A.`id_user`, `user_name`, `user_display_name`, comments.`id_post` as `id` from (select `id_post`, `id_topic`, `post_title`, `post_content`, `post_date_created`, `post_views`, post.`id_user`, `user_name`, `user_display_name`FROM post, userr WHERE post.`id_user` = userr.`id_user`) as A LEFT JOIN comments on A.`id_post` = comments.`id_post`) as B GROUP BY `id_post`) as C LEFT JOIN likes on C.`id_post` = likes.`id_post`) as D GROUP BY `id_post`) as E, topic WHERE E.`id_topic` = topic.`id_topic` ORDER By `id_post` DESC)as F LIMIT vtbd,sodong;
  END$$

DROP PROCEDURE IF EXISTS `getListQuestion`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getListQuestion` ()  BEGIN
SELECT  `id_question` as `id`,`question_title` as `title`, `question_date_created` as `date`, `question_views` as `views`, `user_name` as `nameTK`, `user_display_name` as `displayName`, COUNT(`id`) as `slTraLoi`  from (SELECT  A.`id_question`, `question_title`, `question_date_created`, `question_views`, `user_name`, `user_display_name`, comments.`id_question` as `id`  from (SELECT question.`id_question`, `question_title`, `question_date_created`, `question_views`, userr.`user_name`, `user_display_name` FROM question, userr WHERE question.`id_user` = userr.`id_user`) as A LEFT JOIN comments on A.`id_question` = comments.`id_question`) as B GROUP BY `id_question` ORDER BY `id_question` DESC;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id_comment` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `id_post` int DEFAULT NULL,
  `id_question` int DEFAULT NULL,
  `comment_content` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `comment_date_comment` datetime NOT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `id_user` (`id_user`),
  KEY `id_post` (`id_post`),
  KEY `id_question` (`id_question`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id_comment`, `id_user`, `id_post`, `id_question`, `comment_content`, `comment_date_comment`) VALUES
(1, 13, NULL, 1, 'Mọi người giúp em với', '2021-10-30 16:57:26'),
(2, 1, NULL, 1, 'mình không biét nhá :v', '2021-10-30 16:57:26'),
(3, 1, NULL, 2, 'Ai vào giúp bạn này nào :v', '2021-10-30 16:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id_like` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `id_post` int DEFAULT NULL,
  `id_question` int DEFAULT NULL,
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
  `source_code` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `id_post` int NOT NULL AUTO_INCREMENT,
  `id_topic` int DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `post_title` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `post_content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `post_date_created` datetime NOT NULL,
  `post_views` int NOT NULL DEFAULT '0',
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
  `id_question` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `question_title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `question_conntent` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `question_date_created` datetime NOT NULL,
  `question_views` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_question`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id_question`, `id_user`, `question_title`, `question_conntent`, `question_date_created`, `question_views`) VALUES
(1, 13, 'Ai giúp em bài này bằng Python được không ạ', 'Viết chương trình nhập vào 4 số nguyên a, b, x, y. Tính trung bình cộng các số chẵn trong đoạn [a, b], hoặc [b, a], tính trung bình cộng các số lẻ trong đoạn [x, y], hoặc [y, x].\r\n\r\nInput: \r\n\r\n- a, b trên cùng một dòng, cách nhau dấu cách.\r\n\r\n- x, y trên cùng một dòng, cách nhau dấu cách.\r\n\r\nVí dụ: \r\n\r\n5 12 \r\n\r\n30 -8\r\n\r\nOutput: \r\n\r\nDòng 1: Trung bình cộng các số chẵn tìm được hoặc \"NO\" nếu không tính được. \r\n\r\nDòng 1: Trung bình cộng các số lẻ tìm được hoặc \"NO\" nếu không tính được. \r\n\r\nVí dụ: \r\n\r\n30.00\r\n\r\nNO\r\n\r\nConstrains:\r\n\r\n+ các biến a, b, x, y kiểu nguyên.\r\n\r\n+ trung bình cộng có độ chính xác 2 chữ số thập phân.', '2021-10-30 07:35:20', 0),
(2, 13, 'Phương thức đệ quy', 'Em k hiểu cái phần code tính giai thừa này lắm :\'( các bác giúp e với \r\n \r\n<pre>\r\nusing System;\r\n\r\nnamespace Method {\r\n    class Program {\r\n        public static int Factorial(int n) {\r\n            if(n == 1) {\r\n                return 1;\r\n            }\r\n            return n * Factorial(n - 1);\r\n        }\r\n\r\n        static void Main(string[] args) {\r\n            int n = int.Parse(Console.ReadLine());\r\n            Console.WriteLine(Factorial(n));\r\n        }\r\n    }\r\n}\r\n</pre>', '2021-10-30 07:35:21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE IF NOT EXISTS `report` (
  `id_report` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `id_post` int DEFAULT NULL,
  `id_question` int DEFAULT NULL,
  `report_content` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_report`),
  KEY `id_user` (`id_user`),
  KEY `id_post` (`id_post`),
  KEY `id_question` (`id_question`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tkhoan_cho`
--

DROP TABLE IF EXISTS `tkhoan_cho`;
CREATE TABLE IF NOT EXISTS `tkhoan_cho` (
  `name` varchar(100) NOT NULL,
  `ma` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(50) NOT NULL,
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tkhoan_cho`
--

INSERT INTO `tkhoan_cho` (`name`, `ma`, `email`, `pass`) VALUES
('ongcaoboi232', '7HJTBNJoKQ', 'tuananha7iy@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b'),
('ongcaoboi', 'TkfMOvjKa8', 'tuananha7iy@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

DROP TABLE IF EXISTS `topic`;
CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int NOT NULL AUTO_INCREMENT,
  `topic_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_topic`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userr`
--

DROP TABLE IF EXISTS `userr`;
CREATE TABLE IF NOT EXISTS `userr` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_display_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_position` int DEFAULT NULL,
  `user_status` int DEFAULT NULL,
  `user_date_create` datetime DEFAULT NULL,
  `user_image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userr`
--

INSERT INTO `userr` (`id_user`, `user_name`, `user_password`, `user_display_name`, `user_email`, `user_position`, `user_status`, `user_date_create`, `user_image`) VALUES
(1, 'admin', 'c4ca4238a0b923820dcc509a6f75849b', 'Quản trị viên', '', 2, 1, '2021-10-14 09:18:21', 'public/img/e61df3c3768380ddd992.jpg'),
(13, 'ongcaoboi', 'c4ca4238a0b923820dcc509a6f75849b', NULL, 'tuananha7iy@gmail.com', 0, 1, '2021-10-28 15:43:12', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `userr` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`id_question`) REFERENCES `question` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `userr` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_ibfk_3` FOREIGN KEY (`id_question`) REFERENCES `question` (`id_question`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_topic`) REFERENCES `topic` (`id_topic`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `userr` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `userr` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `userr` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `report_ibfk_3` FOREIGN KEY (`id_question`) REFERENCES `question` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
