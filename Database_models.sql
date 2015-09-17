-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Sep 17, 2015 at 09:14 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `zomato`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned`
--

CREATE TABLE `assigned` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `interviewer_id` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `done` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assigned`
--

INSERT INTO `assigned` (`id`, `user_id`, `interviewer_id`, `status`, `date`, `done`) VALUES
(1, 2, 1, 'Rejected', '2015-09-16 00:59:00', 1),
(4, 2, 2, '0', NULL, 0),
(5, 5, 1, 'Rejected', NULL, 0),
(6, 4, 1, 'Rejected', NULL, 0),
(7, 1, 1, 'completed', NULL, 1),
(8, 7, 2, 'completed', '2015-09-09 13:00:00', 1),
(9, 8, 2, 'Rejected', '2015-09-16 01:00:00', 1),
(10, 9, 2, 'completed', '2015-09-16 00:00:00', 1),
(11, 10, 2, 'pending', '2015-09-17 13:00:00', 1),
(12, 10, 1, 'Rejected', NULL, 0),
(13, 11, 2, 'pending', '2015-09-17 01:59:00', 1),
(14, 12, 1, NULL, NULL, 0),
(15, 12, 2, 'pending', '2015-09-19 13:00:00', 1),
(16, 13, 2, 'pending', '2015-09-18 01:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `interviewer`
--

CREATE TABLE `interviewer` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `resume` blob
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interviewer`
--

INSERT INTO `interviewer` (`id`, `username`, `email`, `password`, `resume`) VALUES
(1, 'Lalith', 'lalithr95@gmail.com', 'admin', NULL),
(2, 'test', 'test@gmail.com', 'test', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `interview_pad`
--

CREATE TABLE `interview_pad` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` text,
  `start_time` text NOT NULL,
  `end_time` text NOT NULL,
  `invite_to` varchar(255) NOT NULL,
  `interviewer_id` varchar(255) NOT NULL,
  `rate` float DEFAULT NULL,
  `expired` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interview_pad`
--

INSERT INTO `interview_pad` (`id`, `name`, `url`, `start_time`, `end_time`, `invite_to`, `interviewer_id`, `rate`, `expired`) VALUES
(3, 'Lalith interview', 'http://localhost/test/index.php/interviewpad/view/TGFsaXRoIGludGVydmlldw==', '1442397600', '1441663200', '2', 'lalithr95@gmail.com', NULL, 0),
(4, 'TGFsaXRoIGludGVydmlldw', 'http://localhost/test/index.php/interviewpad/view/VEdGc2FYUm9JR2x1ZEdWeWRtbGxkdw==', '1442397600', '1441663200', '2', 'lalithr95@gmail.com', NULL, 0),
(5, 'VGVjaG5pY2FsIEludGVydmlldw', 'http://localhost/test/index.php/interviewpad/view/VGVjaG5pY2FsIEludGVydmlldw', '1442357940', '1442444400', '2', 'lalithr95@gmail.com', NULL, 0),
(7, 'Technical Interview', 'http://localhost/test/index.php/interviewpad/view/VGVjaG5pY2FsIEludGVydmlldw', '1442357940', '1442444400', 'lalithr95@gmail.com', 'lalithr95@gmail.com', 1, 1),
(10, 'Interview1', 'http://localhost/test/index.php/interviewpad/view/SW50ZXJ2aWV3MQ', '1441796400', '1442444400', 'suryatejasharma@gmail.com', 'test@gmail.com', 1, 1),
(11, 'Interview2', 'http://localhost/test/index.php/interviewpad/view/SW50ZXJ2aWV3Mg', '1442358000', '1442361600', 'test123@gmail.com', 'test@gmail.com', 2, 1),
(12, 'Interview3', 'http://localhost/test/index.php/interviewpad/view/SW50ZXJ2aWV3Mw', '1442354400', '1442361540', 'test12345@gmail.com', 'test@gmail.com', 2, 1),
(13, 'Interview5', 'http://localhost/test/index.php/interviewpad/view/SW50ZXJ2aWV3NQ', '1442440800', '1442530740', 'test124@gmail.com', 'test@gmail.com', 2, 1),
(14, 'Interview10', 'http://localhost/test/index.php/interviewpad/view/SW50ZXJ2aWV3MT', '1442447940', '1442447940', 'test124@gmail.com', 'test@gmail.com', NULL, 0),
(15, 'Interview11', 'http://localhost/test/index.php/interviewpad/view/SW50ZXJ2aWV3MT', '1442487600', '1442444340', 'lalithr1995@gmail.com', 'test@gmail.com', NULL, 0),
(16, 'Interview20', 'http://localhost/test/index.php/interviewpad/view/SW50ZXJ2aWV3Mj', '1442660400', '1443567600', 'shreya@gmail.com', 'test@gmail.com', NULL, 0),
(17, 'TechRound7', 'http://localhost/test/index.php/interviewpad/view/VGVjaFJvdW5kNw', '1442530800', '1442620740', 'swathi.p146@gmail.com', 'test@gmail.com', 4.25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `interview_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `answer` text,
  `rate` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `interview_id`, `name`, `answer`, `rate`) VALUES
(1, 0, 'Program for Loop in a Linkedlist', NULL, NULL),
(2, 0, 'Detect Loop in a Linkedlist', NULL, NULL),
(3, 0, 'cdcdcd', NULL, NULL),
(4, 7, 'Reverse a Linkedlist', NULL, NULL),
(5, 7, 'Detect Loop in a Linkedlist', NULL, NULL),
(6, 8, 'What is Linkedlist?', NULL, NULL),
(7, 8, 'Code for deletion of binary tree ?\r\n', NULL, NULL),
(8, 11, 'ABC', NULL, NULL),
(9, 11, 'XYZ', NULL, NULL),
(10, 12, 'Google', NULL, NULL),
(11, 12, 'cjhbfjdvdfv', NULL, NULL),
(12, 13, 'vnfjdvdb', NULL, NULL),
(13, 13, 'fgbfgbfgb', NULL, NULL),
(14, 15, 'What is hash table', NULL, NULL),
(15, 15, 'Advantages of Linkedlist', NULL, NULL),
(16, 15, 'Advatnages of trees', NULL, NULL),
(17, 16, 'Trees ?', NULL, NULL),
(18, 16, 'Linkedlist ?', NULL, NULL),
(19, 16, 'Arrays ?', NULL, NULL),
(20, 16, 'Hash ?', NULL, NULL),
(21, 17, 'Tree ?', 'Hel', 2),
(22, 17, 'Trie ?', 'hello', 3),
(23, 17, 'Linkedlist ?', 'hellp', 5),
(24, 17, 'Tree ?', 'ehll', 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `resume` blob NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `resume`, `status`) VALUES
(1, 'Lalith', 'lalithr95@gmail.com', 0x2f4170706c69636174696f6e732f4d414d502f6874646f63732f746573742f6170706c69636174696f6e2f75706c6f6164732f432d3032332d31352d44395f4e6547494c2d4352412d4e50535f466f726d5f315f313174685f70726f6f6631322e706466, 'Assigned'),
(2, 'Lalith', 'lalithr95@gmail.com', 0x2f4170706c69636174696f6e732f4d414d502f6874646f63732f746573742f6170706c69636174696f6e2f75706c6f6164732f432d3032332d31352d44395f4e6547494c2d4352412d4e50535f466f726d5f315f313174685f70726f6f6631332e706466, 'Assigned'),
(3, 'Lalith', 'lalithr95@gmail.com', 0x2f4170706c69636174696f6e732f4d414d502f6874646f63732f746573742f6170706c69636174696f6e2f75706c6f6164732f432d3032332d31352d44395f4e6547494c2d4352412d4e50535f466f726d5f315f313174685f70726f6f6631342e706466, 'Assigned'),
(4, 'Anirudh', 'k.anirudh8@gmail.com', 0x2f4170706c69636174696f6e732f4d414d502f6874646f63732f746573742f6170706c69636174696f6e2f75706c6f6164732f432d3032332d31352d44395f4e6547494c2d4352412d4e50535f466f726d5f315f313174685f70726f6f6631352e706466, 'Assigned'),
(5, 'ramya', 'ramya.bandaru5@gmail.com', 0x2f4170706c69636174696f6e732f4d414d502f6874646f63732f746573742f6170706c69636174696f6e2f75706c6f6164732f432d3032332d31352d44395f4e6547494c2d4352412d4e50535f466f726d5f315f313174685f70726f6f6631362e706466, 'Assigned'),
(6, 'Sup', 'hello@zomato.com', 0x2f4170706c69636174696f6e732f4d414d502f6874646f63732f746573742f6170706c69636174696f6e2f75706c6f6164732f432d3032332d31352d44395f4e6547494c2d4352412d4e50535f466f726d5f315f313174685f70726f6f6631372e706466, 'Assigned'),
(7, 'Surya Teja sharma', 'suryatejasharma@gmail.com', 0x2f4170706c69636174696f6e732f4d414d502f6874646f63732f746573742f6170706c69636174696f6e2f75706c6f6164732f432d3032332d31352d44395f4e6547494c2d4352412d4e50535f466f726d5f315f313174685f70726f6f6631382e706466, 'Assigned'),
(8, 'test1234', 'test123@gmail.com', 0x2f4170706c69636174696f6e732f4d414d502f6874646f63732f746573742f6170706c69636174696f6e2f75706c6f6164732f432d3032332d31352d44395f4e6547494c2d4352412d4e50535f466f726d5f315f313174685f70726f6f6631392e706466, 'Assigned'),
(9, 'test12345', 'test12345@gmail.com', 0x2f4170706c69636174696f6e732f4d414d502f6874646f63732f746573742f6170706c69636174696f6e2f75706c6f6164732f416e69727564682d526573756d652e706466, 'Assigned'),
(10, 'Lalith Rallabhandi', 'lalithr1995@gmail.com', 0x2f4170706c69636174696f6e732f4d414d502f6874646f63732f746573742f6170706c69636174696f6e2f75706c6f6164732f416e69727564682d526573756d65312e706466, 'Assigned'),
(11, 'Test1', 'test124@gmail.com', 0x2f4170706c69636174696f6e732f4d414d502f6874646f63732f746573742f6170706c69636174696f6e2f75706c6f6164732f416e69727564682d526573756d65322e706466, 'Assigned'),
(12, 'Shreya', 'shreya@gmail.com', 0x2f4170706c69636174696f6e732f4d414d502f6874646f63732f746573742f6170706c69636174696f6e2f75706c6f6164732f416e69727564682d526573756d65332e706466, 'Assigned'),
(13, 'swathi', 'swathi.p146@gmail.com', 0x2f4170706c69636174696f6e732f4d414d502f6874646f63732f746573742f6170706c69636174696f6e2f75706c6f6164732f432d3032332d31352d44395f4e6547494c2d4352412d4e50535f466f726d5f315f313174685f70726f6f6632302e706466, 'Assigned');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigned`
--
ALTER TABLE `assigned`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `interviewer`
--
ALTER TABLE `interviewer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interview_pad`
--
ALTER TABLE `interview_pad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigned`
--
ALTER TABLE `assigned`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `interviewer`
--
ALTER TABLE `interviewer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `interview_pad`
--
ALTER TABLE `interview_pad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
