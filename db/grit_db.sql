-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 17, 2019 at 11:40 AM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.21-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grit_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `gt_attendance`
--

CREATE TABLE `gt_attendance` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gt_designation`
--

CREATE TABLE `gt_designation` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `desigName` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gt_designation`
--

INSERT INTO `gt_designation` (`id`, `user_id`, `desigName`, `created_date`, `modified`) VALUES
(9, 1, 'physics', '2019-10-13 19:12:27', '2019-10-13 19:12:27'),
(10, 1, 'chemistry', '2019-10-13 19:12:47', '2019-10-13 19:12:47');

-- --------------------------------------------------------

--
-- Table structure for table `gt_members`
--

CREATE TABLE `gt_members` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `memberPic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive',
  `terms` tinyint(1) NOT NULL,
  `role` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gt_members`
--

INSERT INTO `gt_members` (`id`, `first_name`, `last_name`, `email`, `memberPic`, `password`, `country`, `class`, `section`, `created`, `modified`, `status`, `terms`, `role`) VALUES
(2, 'rityunjay', 'kumar', 'rityunjay@gmail.com', 'noimage.jpg', '202cb962ac59075b964b07152d234b70', 'India', '', '', '2019-10-08 17:14:19', '2019-10-10 18:21:05', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `gt_principal`
--

CREATE TABLE `gt_principal` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gt_principal`
--

INSERT INTO `gt_principal` (`id`, `first_name`, `last_name`, `email`, `password`, `status`, `role`, `created`, `modified`) VALUES
(1, 'test', 'test', 'test@tester.com', '202cb962ac59075b964b07152d234b70', 1, 1, '2019-10-12 10:30:11', '2019-10-12 10:30:11');

-- --------------------------------------------------------

--
-- Table structure for table `gt_stdClass`
--

CREATE TABLE `gt_stdClass` (
  `id` int(11) NOT NULL,
  `class` varchar(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `session` year(4) NOT NULL,
  `stdID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gt_stdClass`
--

INSERT INTO `gt_stdClass` (`id`, `class`, `roll`, `session`, `stdID`) VALUES
(1, '1', 123321123, 2012, 1),
(2, '2', 123654258, 2012, 2);

-- --------------------------------------------------------

--
-- Table structure for table `gt_students`
--

CREATE TABLE `gt_students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profilePic` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gt_students`
--

INSERT INTO `gt_students` (`id`, `first_name`, `last_name`, `email`, `profilePic`, `password`, `status`, `role`, `created`, `modified`) VALUES
(1, 'test', 'test', 'test@tester.com', '', '202cb962ac59075b964b07152d234b70', 1, 3, '2019-10-13 12:59:25', '2019-10-13 12:59:25'),
(2, 'sohan', 'kumar', 'sohan@example.com', '', '123', 1, 3, '2019-10-16 06:00:00', '2019-10-16 06:00:00'),
(3, 'mohan', 'kumar', 'test@tester.com', '', '123', 1, 3, '2019-10-16 06:00:00', '2019-10-16 06:00:00'),
(4, 'test', 'test', 'test@tester.com', '', '123', 1, 3, '2019-10-16 06:00:00', '2019-10-16 06:00:00'),
(5, 'test', 'test', 'test@tester.com', '', '123', 1, 3, '2019-10-16 06:00:00', '2019-10-16 06:00:00'),
(6, 'rohan', 'roy', 'rohanroy@sms.com', '', '123', 1, 3, '2019-10-16 07:20:27', '2019-10-16 07:20:27'),
(7, 'raj', 'mehta', 'rajmehta@sms.com', '', '123', 1, 3, '2019-10-16 07:20:27', '2019-10-16 07:20:27');

-- --------------------------------------------------------

--
-- Table structure for table `gt_teachers`
--

CREATE TABLE `gt_teachers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `desigID` int(11) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gt_teachers`
--

INSERT INTO `gt_teachers` (`id`, `first_name`, `last_name`, `email`, `desigID`, `gender`, `password`, `status`, `role`, `created_date`, `modified`) VALUES
(10, 'mohan', 'kumar', 'mohan@gmail.com', 13, 'male', '202cb962ac59075b964b07152d234b70', 1, 2, '2019-10-13 21:28:43', '2019-10-13 21:28:43'),
(11, 'test', 'test', 'test@tester.com', 10, 'male', '202cb962ac59075b964b07152d234b70', 1, 2, '2019-10-14 11:51:46', '2019-10-14 11:51:46'),
(12, 'test', 'test', 'test2@tester.com', 9, 'female', '202cb962ac59075b964b07152d234b70', 1, 2, '2019-10-14 11:53:00', '2019-10-14 11:53:00'),
(13, 'test', 'test', 'test3@tester.com', 10, 'female', '202cb962ac59075b964b07152d234b70', 1, 2, '2019-10-14 11:53:28', '2019-10-14 11:53:28'),
(14, 'test', 'test', 'test4@tester.com', 10, 'male', '202cb962ac59075b964b07152d234b70', 1, 2, '2019-10-14 11:53:50', '2019-10-14 11:53:50'),
(15, 'test', 'test', 'test6@tester.com', 10, 'female', '202cb962ac59075b964b07152d234b70', 1, 2, '2019-10-14 11:54:10', '2019-10-14 11:54:10');

-- --------------------------------------------------------

--
-- Table structure for table `gt_users`
--

CREATE TABLE `gt_users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gt_users`
--

INSERT INTO `gt_users` (`id`, `first_name`, `last_name`, `email`, `password`, `gender`, `phone`, `created`, `modified`, `status`) VALUES
(1, 'rityunjay', 'kumar', 'test@tester.com', '202cb962ac59075b964b07152d234b70', 'Male', '1234567890', '2019-10-06 15:07:23', '2019-10-06 15:07:23', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gt_attendance`
--
ALTER TABLE `gt_attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gt_designation`
--
ALTER TABLE `gt_designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gt_members`
--
ALTER TABLE `gt_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gt_principal`
--
ALTER TABLE `gt_principal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gt_stdClass`
--
ALTER TABLE `gt_stdClass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gt_students`
--
ALTER TABLE `gt_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gt_teachers`
--
ALTER TABLE `gt_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gt_users`
--
ALTER TABLE `gt_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gt_attendance`
--
ALTER TABLE `gt_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gt_designation`
--
ALTER TABLE `gt_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `gt_members`
--
ALTER TABLE `gt_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gt_principal`
--
ALTER TABLE `gt_principal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gt_stdClass`
--
ALTER TABLE `gt_stdClass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gt_students`
--
ALTER TABLE `gt_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `gt_teachers`
--
ALTER TABLE `gt_teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `gt_users`
--
ALTER TABLE `gt_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
