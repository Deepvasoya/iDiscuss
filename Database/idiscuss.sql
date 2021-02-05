-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2021 at 05:34 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idiscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(30) NOT NULL,
  `category_desc` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_title`, `category_desc`, `date`) VALUES
(1, 'PHP', 'PHP is a general-purpose scripting language especially suited to web development.', '2021-02-02 19:04:33'),
(2, 'Python', 'Python is an interpreted, high-level and general-purpose programming language.', '2021-02-02 19:05:14'),
(3, 'C++', 'C++ is a general-purpose programming language created by Bjarne Stroustrup as an extension of the C programming language, or \"C with Classes\".', '2021-02-02 19:05:47'),
(4, 'Java', 'Java is a class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible.', '2021-02-02 19:06:35'),
(5, '.NET', '.NET Framework is a software framework developed by Microsoft that runs primarily on Microsoft Windows.', '2021-02-02 19:06:35'),
(6, 'C programming', 'C is a general-purpose, procedural computer programming language supporting structured programming, lexical variable scope, and recursion, with a static type system.\r\n\r\n', '2021-02-02 19:07:35');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_desc` text NOT NULL,
  `thread_id` int(11) NOT NULL,
  `comment_by` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_desc`, `thread_id`, `comment_by`, `date`) VALUES
(1, 'HIII it is good', 1, 3, '2021-02-03 17:33:51'),
(2, 'd ggfh f', 1, 5, '2021-02-03 17:35:44'),
(3, 'fhs sr', 1, 9, '2021-02-03 17:51:12'),
(4, 'yes it is good', 8, 17, '2021-02-04 10:56:14'),
(5, 'yes it is good', 8, 17, '2021-02-04 11:12:02'),
(6, 'yes it is good', 8, 17, '2021-02-04 11:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `sno` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`sno`, `name`, `email`, `message`, `date`) VALUES
(1, 'Deep', 'deep@gmail.com', 'How are you', '2021-02-02 19:36:24'),
(6, 'deee', 'deepvasoya103279@gmail.com', 'd', '2021-02-02 19:53:51'),
(7, '', '', '', '2021-02-02 20:47:43'),
(8, '', '', '', '2021-02-02 21:21:33');

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE `thread` (
  `thread_id` int(11) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_catid` int(11) NOT NULL,
  `thread_user` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`thread_id`, `thread_title`, `thread_desc`, `thread_catid`, `thread_user`, `date`) VALUES
(1, 'How to install PHP', 'What is the process of install PHP latest version', 1, 1, '2021-02-03 13:49:54'),
(2, 'PHP is a server-side language', 'PHP runs in server side', 1, 5, '2021-02-03 14:53:02'),
(3, 'PHP', 'PHP', 1, 15, '2021-02-03 17:18:53'),
(4, ' f', 'f', 1, 16, '2021-02-03 17:22:28'),
(5, ' f', '4', 3, 8, '2021-02-03 17:23:17'),
(6, ' ', '', 6, 3, '2021-02-03 18:14:33'),
(7, ' Python', 'what is python', 2, 10, '2021-02-04 09:45:07'),
(8, ' python is good', 'it is a good', 2, 17, '2021-02-04 10:56:01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `sno` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`sno`, `username`, `password`, `date`) VALUES
(1, 'deep', 'deep', '2021-02-02 20:39:41'),
(2, 'Deeppatel', '$2y$10$OtrLQARc.dpW9yDQmvGxkeH.uM4zZW/28QEr09PFddJTA4txtQqN.', '2021-02-02 20:47:43'),
(3, 'Vidhi', '$2y$10$CdRG80w50XTr/k90Q4R4sOz5eRhnZqTLGGREuisiK/HWTlSR.cBwO', '2021-02-02 21:29:35'),
(4, 'Vasoya', '$2y$10$pB.AkiBYTU1W7OSbEeBRR.9PusRqqvH29.s287D4/nUwIFwZxp3pu', '2021-02-02 21:31:34'),
(5, 'Ramesh', '$2y$10$S5nINCzuEZ02DR.Tlbr3oOxe1S6tCwvWHO15kkgM5sWaFbGJOnURu', '2021-02-03 09:59:39'),
(6, 'Varun', '$2y$10$VioFlJ5KV0wBSdnLj6PLmuQN6c2FQLp5rP1vZnchI.wZjCySpXvhW', '2021-02-03 10:02:17'),
(7, 'Bapu', '$2y$10$sBsbqDSsIw5tFQM0Q2JrdejruBysxT4h2LhnyguocoJlUgFadYUcC', '2021-02-03 10:02:49'),
(8, 'Vivan', '$2y$10$aoMBUKNY5/Xh4Q6wWhhlfOE83ASStLm19Gt1eY9zqxoEob7BZT4mS', '2021-02-03 10:08:24'),
(9, 'Vivek', '$2y$10$j8yv1b56KfaEbFZRIhQ/bul464Bt1YYY1p1h0wDdoGkz6Shcv/RRO', '2021-02-03 10:12:10'),
(10, 'Vasu', '$2y$10$xsKpqyPeX2ULMLdBVeicsuQzWGfczCmGfhbJKyQ.iiCHb/LOx5cgW', '2021-02-03 10:14:32'),
(11, 'Vansh', '$2y$10$ZnGXlm4TKf8gHXhroXQ7V.gK/ENSFWF5W/tkQscNHiLvpoWL8Lozq', '2021-02-03 16:54:07'),
(12, 'Priyank', '$2y$10$e3HvBebQuyNlXaKx.8rnH.9cMYdSeqz5mOOawUiah6QXTCuMo9Yz.', '2021-02-03 18:34:53'),
(13, 'Hardik', '$2y$10$Ob7cwFaY6Q/b0f/OfL.tJul3mO/KyejU7SEScWZHso8gfjTF9vFbS', '2021-02-03 18:49:21'),
(14, 'Nimish', '$2y$10$2TbaANmcMT2rZsYm7GUk2uiHx7U5p.l1Ro5SOjX0pJGhIgVYhiYQu', '2021-02-03 18:56:47'),
(15, 'Kirtan', '$2y$10$W4scuwabVw2jWypeqg64T.CYw0h4jEVl2yJ.v5sNGNNclqO3gWOPG', '2021-02-03 22:43:32'),
(16, 'Dhara', '$2y$10$399VFKVF77J74tQ7wEOJMu.2ZI.j1P3IS6Un2JXRDwHLycgEEpKj.', '2021-02-04 09:23:26'),
(17, '55', '$2y$10$t7em1Qn9Lu8t7XgyR5006uBynIwtHA/KiRv7W9HpJHzCW8MUSuha2', '2021-02-04 10:55:19'),
(18, 'dd', '$2y$10$zBjmGi3IvBzmWewvXDwZ..F5IN0R5Db8wta89BfdtUhmBmx0hH3wG', '2021-02-04 14:44:30'),
(19, 'ww', '$2y$10$GIuo7cKRSV4f7MA.CUJZguxEXyRSVFb8coLjLvESOsYpbWw6sgg4G', '2021-02-04 15:27:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `thread` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
  MODIFY `thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
