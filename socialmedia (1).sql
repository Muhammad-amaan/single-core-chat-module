-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2016 at 11:20 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialmedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chatid` int(11) NOT NULL,
  `sender_id` int(20) NOT NULL,
  `receiver_id` int(20) NOT NULL,
  `message` varchar(10000) NOT NULL,
  `msgclass` varchar(40) NOT NULL,
  `sender_class` varchar(40) NOT NULL,
  `receiver_class` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chatid`, `sender_id`, `receiver_id`, `message`, `msgclass`, `sender_class`, `receiver_class`) VALUES
(116, 1, 3, 'Hye darling......', '', '', ''),
(117, 3, 1, 'Hye janu....', '', '', ''),
(118, 3, 1, 'janu kiss me.....', '', '', ''),
(119, 1, 3, 'Paas aao.... Ummmmmmaaaaahhhh......', '', '', ''),
(120, 24, 1, 'Hye', '', '', ''),
(121, 1, 24, 'hye', '', '', ''),
(122, 1, 24, 'hello', '', '', ''),
(123, 1, 24, 'salam', '', '', ''),
(124, 24, 1, 'w/assalam', '', '', ''),
(125, 1, 24, 'how r u ?', '', '', ''),
(126, 1, 24, 'how r u ?', '', '', ''),
(127, 24, 1, 'i m fine', '', '', ''),
(128, 3, 1, 'Ummmmmmaaahhh......', '', '', ''),
(129, 1, 24, 'good', '', '', ''),
(130, 24, 1, 'r....', '', '', ''),
(131, 1, 24, 'kia r....', '', '', ''),
(132, 1, 24, 'gOODMORNING', '', '', ''),
(133, 1, 24, 'hye', '', '', ''),
(134, 25, 26, 'hye', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `comments` varchar(1200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cid`, `postid`, `uid`, `comments`) VALUES
(1, 1, 1, 'hello1'),
(2, 1, 0, 'hello2'),
(3, 2, 0, 'good morning have a nice day'),
(4, 2, 0, 'good night');

-- --------------------------------------------------------

--
-- Table structure for table `onlineusers`
--

CREATE TABLE `onlineusers` (
  `id` int(11) NOT NULL,
  `uid` int(20) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `onlineusers`
--

INSERT INTO `onlineusers` (`id`, `uid`, `session`, `time`, `timestamp`, `status`) VALUES
(140, 1, 'joo6ijiut7h0n7bl65p9iu2fn0', '1471817701', '2016-08-21 22:15:01', '');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `content` varchar(1200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postid`, `uid`, `content`) VALUES
(1, 26, 'Hello'),
(2, 26, 'Good morning');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `set_id` int(11) NOT NULL,
  `200` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(20) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `profilepic` varchar(255) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `firstname`, `lastname`, `username`, `email`, `password`, `dob`, `gender`, `profilepic`, `datetime`, `status`, `active`) VALUES
(1, 'Aman', 'rajput', 'aman rajput', 'm.aman@outlook.com', 'af001d8e5cc9abcf5c1afa9b037cbd6a', '', '', 'http://localhost/admin-socialmedia/lib/img/13062969_1572996472999315_7302702542550100561_o.jpg', '2016-07-11 18:01:39', '', ''),
(24, 'nida', 'kanval', 'Nida kanval', 'nida.kanval@gmail.com', 'af001d8e5cc9abcf5c1afa9b037cbd6a', '', 'Male', 'live/avatar146925890524.jpg', '2016-07-24 16:02:24', '', ''),
(25, 'tehreem', 'fatima', 'Tehreem fatima', 'tehreem.fatima@gmail.com', 'af001d8e5cc9abcf5c1afa9b037cbd6a', '', 'Male', 'live/avatar147047067225.jpg', '2016-08-06 23:13:55', '', ''),
(26, 'john', 'doe', 'john doe', 'johndoe@gmail.com', 'af001d8e5cc9abcf5c1afa9b037cbd6a', '', 'Male', 'live/avatar147047104626.jpg', '2016-08-06 23:14:04', '', ''),
(174, '', '', 'amaan', 'm.amaan@mvc.com', '', '', '', '', '2016-08-29 03:32:28', '', ''),
(175, '', '', 'amaan', 'm.amaan@mvc.com', '', '', '', '', '2016-08-29 03:32:28', '', ''),
(176, '', '', 'amaan', 'm.amaan@mvc.com', '', '', '', '', '2016-08-29 03:32:42', '', ''),
(221, '', '', '', '', '', '', '', '', '2016-09-04 09:04:44', '', ''),
(222, '', '', '', '', '', '', '', '', '2016-09-04 09:06:56', '', ''),
(223, '', '', 'amaan', 'm.amaan@mvc.com', '123', '', '', '', '2016-09-04 09:08:09', '', ''),
(224, '', '', 'amaan', 'm.amaan@mvc.com', '123', '', '', '', '2016-09-04 09:20:57', '', ''),
(225, '', '', 'amaan', 'm.amaan@mvc.com', '123', '', '', '', '2016-09-04 09:29:41', '', ''),
(226, '', '', 'amaan', 'm.amaan@mvc.com', '123', '', '', '', '2016-09-04 09:31:16', '', ''),
(227, '', '', 'amaan', 'm.amaan@mvc.com', '123', '', '', '', '2016-09-04 09:31:18', '', ''),
(228, '', '', 'amaan', 'm.amaan@mvc.com', '123', '', '', '', '2016-09-04 09:31:57', '', ''),
(229, '', '', 'amaan', 'm.amaan@mvc.com', '123', '', '', '', '2016-09-04 09:33:21', '', ''),
(230, '', '', 'amaan', 'm.amaan@mvc.com', '123', '', '', '', '2016-09-04 09:33:31', '', ''),
(231, '', '', 'amaan', 'm.amaan@mvc.com', '123', '', '', '', '2016-09-04 09:34:58', '', ''),
(232, '', '', 'amaan', 'm.amaan@mvc.com', '123', '', '', '', '2016-09-04 09:35:15', '', ''),
(233, '', '', 'amaan', 'm.amaan@mvc.com', '123', '', '', '', '2016-09-04 09:35:31', '', ''),
(234, '', '', 'amaan', 'm.amaan@mvc.com', '123', '', '', '', '2016-09-04 09:35:41', '', ''),
(235, '', '', 'amaan', 'm.amaan@mvc.com', '123', '', '', '', '2016-09-04 09:35:53', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chatid`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `onlineusers`
--
ALTER TABLE `onlineusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `onlineusers`
--
ALTER TABLE `onlineusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `set_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
