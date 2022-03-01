-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 01, 2022 at 02:35 AM
-- Server version: 5.7.36
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_content` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users` (`user_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `user_id`, `blog_title`, `blog_content`) VALUES
(6, 4, 'Russia-Ukraine War', 'Russia invaded Ukraine for joining NATO and now Russia is getting sanctioned by western allies and USA.'),
(2, 4, 'shivang', 'shivang'),
(3, 3, 'becky', 'becky'),
(8, 1, 'Real Time Data Services (RTDS)', 'Real Time Data Services (RTDS) is a group of companies thriving in the domain of global information technology; we serve clients in the field of cloud computing and communication. The company empowers businesses across the globe with technology that takes care of their various operational needs.'),
(7, 1, 'North Atlantic Treaty Organisation(NATO)', 'They have decided to collaborate and sanction Russia for invading Ukraine that happened to show inclination to join NATO.');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user` (`user_id`),
  KEY `fk_blog` (`blog_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `blog_id`, `comment_content`, `comment_date`) VALUES
(6, 1, 3, ' I like this doggy', '2022-02-28'),
(4, 1, 2, 'hi', '2022-02-25'),
(7, 4, 6, 'great. I would love to know more about it.', '2022-02-28'),
(8, 1, 6, 'Who is the president of Ukraine? Is it that Zelensky guy?', '2022-02-28'),
(9, 1, 6, 'where are they now?', '2022-02-28'),
(10, 1, 2, 'What kind of a blog is this with only name?', '2022-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `status`) VALUES
(1, 'Anushka Srivastava', 'anushka1@gmail.com', '6388647011', '$2y$10$Ay0rNNG9YwLtnA.wuqNUmOsKdU5da6jPJnOUz1PNJxHJaqS9Megz2', 1),
(2, 'ananya', 'ananya@gmail.com', '7887031192', '$2y$10$sTDS05iXxZ1DU204ue1H9uTHl9Y6jS.QVyQSWRzjbNJclUMKqI4v.', 0),
(4, 'shivang', 'shivanggoria1@gmail.com', '7887031191', '$2y$10$8l2eIRAFTp.9jWQzSK0mleHsMgTwfB3Gn4LD4IgHf1MVfPTS7LXyK', 0),
(5, 'sushma', 'sushma@gmail.com', '9415781071', '$2y$10$aurZTxCSscDkvlQtPWf3iOKKfnHYZEvZkeLkXukEOhVQ6nBXp0W4m', 0),
(6, 'Anushka Srivastava', '9918102005@mail.jiit.ac.in', '8388647012', '$2y$10$RZT1roHvSIFkJme5qYLjhuTXFFHSTyAk/3sPzoJJyySWq9IW89mqq', 0),
(7, 'Mansi Chauhan', 'mansi@gmail.com', '8123675410', '$2y$10$16P.T1fxW8UvopldpVbxounqDBHl3Z028scvR7wxSgOKsMebIXgb6', 0),
(8, 'Pragati', 'pragatisingh1@gmail.com', '7870311234', '$2y$10$Nv6CZUzgVxIw0wU8S0emleKWHR9l2NGQszHCH8HgzUOAGROwdpoCK', 0),
(9, 'Rati Mandhyan', 'rati@gmail.com', '1234561234', '$2y$10$eaZ1iB1H3gH0kxHfp1eNM.o61.z1mNNQedM9DHBP8pdhVP1aGx40i', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

DROP TABLE IF EXISTS `users_online`;
CREATE TABLE IF NOT EXISTS `users_online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(28, 'ovgsr8ae2f1bu1pip0qkdhnpu2', 1646101536),
(27, 'hggormo4kqjs15l8vsotv3ufb6', 1646046316),
(26, 'hggormo4kqjs15l8vsotv3ufb6', 1646046113);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
