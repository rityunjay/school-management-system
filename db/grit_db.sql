-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 31, 2019 at 08:47 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-1+ubuntu18.04.1+deb.sury.org+1

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
-- Table structure for table `gt_clsSubject`
--

CREATE TABLE `gt_clsSubject` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `subjectName` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gt_clsSubject`
--

INSERT INTO `gt_clsSubject` (`id`, `user_id`, `tid`, `subjectName`, `created_date`, `modified`) VALUES
(19, 1, 19, 'Math', '2019-10-24 12:16:50', '2019-10-24 12:16:50'),
(20, 1, 18, 'hindi', '2019-10-25 11:38:54', '2019-10-25 11:38:54');

-- --------------------------------------------------------

--
-- Table structure for table `gt_gallery`
--

CREATE TABLE `gt_gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=Active | 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gt_gallery`
--

INSERT INTO `gt_gallery` (`id`, `title`, `created`, `modified`, `status`) VALUES
(9, 'adobe', '2019-10-23 17:36:51', '2019-10-23 17:40:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gt_gallery_images`
--

CREATE TABLE `gt_gallery_images` (
  `id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gt_gallery_images`
--

INSERT INTO `gt_gallery_images` (`id`, `gallery_id`, `file_name`, `uploaded_on`) VALUES
(7, 9, 'itagree-banner.jpg', '2019-10-23 17:36:51'),
(8, 9, 'itagree-logo.png', '2019-10-23 17:36:51'),
(9, 9, 'itagree-th.jpg', '2019-10-23 17:36:51');

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
-- Table structure for table `gt_parents`
--

CREATE TABLE `gt_parents` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `fatherName` varchar(255) NOT NULL,
  `motherName` varchar(255) NOT NULL,
  `fatherOccupation` varchar(255) NOT NULL,
  `motherOccupation` varchar(255) NOT NULL,
  `fatherEmail` varchar(255) NOT NULL,
  `fatherMobile` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_date` date NOT NULL,
  `modified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gt_principal`
--

CREATE TABLE `gt_principal` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profilePic` varchar(255) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `mStatus` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fatherName` varchar(255) NOT NULL,
  `motherName` varchar(255) NOT NULL,
  `fatherOccupation` varchar(255) NOT NULL,
  `fatherEmail` varchar(255) NOT NULL,
  `fatherMobile` varchar(255) NOT NULL,
  `motherOccupation` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gt_principal`
--

INSERT INTO `gt_principal` (`id`, `first_name`, `last_name`, `email`, `profilePic`, `mobile`, `gender`, `mStatus`, `password`, `fatherName`, `motherName`, `fatherOccupation`, `fatherEmail`, `fatherMobile`, `motherOccupation`, `address`, `status`, `role`, `created`, `modified`) VALUES
(1, 'test', 'test', 'test@tester.com', 'Italo-Adami.jpg', '1236547890', 'male', 'married', '202cb962ac59075b964b07152d234b70', 'test', 'test', 'service', 'test@tester.com', '1236547890', 'house wife', '12-t durgapur', 1, 1, '2019-10-12 10:30:11', '2019-10-31 20:23:34');

-- --------------------------------------------------------

--
-- Table structure for table `gt_staff`
--

CREATE TABLE `gt_staff` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `modifydate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gt_stdClass`
--

CREATE TABLE `gt_stdClass` (
  `id` int(11) NOT NULL,
  `className` varchar(11) NOT NULL,
  `numericName` varchar(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gt_stdClass`
--

INSERT INTO `gt_stdClass` (`id`, `className`, `numericName`, `tid`, `created_date`, `modified`) VALUES
(9, 'First', '1', 19, '2019-10-29 12:57:24', '2019-10-29 12:57:24'),
(10, 'Second', '2', 19, '2019-10-29 14:45:27', '2019-10-29 14:45:27');

-- --------------------------------------------------------

--
-- Table structure for table `gt_stdSection`
--

CREATE TABLE `gt_stdSection` (
  `id` int(11) NOT NULL,
  `sectionName` varchar(11) NOT NULL,
  `nickName` varchar(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gt_stdSection`
--

INSERT INTO `gt_stdSection` (`id`, `sectionName`, `nickName`, `cid`, `tid`, `sid`, `created_date`, `modified`) VALUES
(14, 'Section B', 'Sec B', 9, 18, 18, '2019-10-29 14:45:12', '2019-10-29 14:45:12');

-- --------------------------------------------------------

--
-- Table structure for table `gt_students`
--

CREATE TABLE `gt_students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `mobile` int(11) NOT NULL,
  `profilePic` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `terms` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gt_teachers`
--

CREATE TABLE `gt_teachers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subjectName` varchar(255) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `mStatus` varchar(11) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `profilePic` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fatherName` varchar(255) NOT NULL,
  `motherName` varchar(255) NOT NULL,
  `fatherOccupation` varchar(255) NOT NULL,
  `fatherEmail` varchar(255) NOT NULL,
  `fatherMobile` varchar(255) NOT NULL,
  `motherOccupation` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gt_teachers`
--

INSERT INTO `gt_teachers` (`id`, `first_name`, `last_name`, `email`, `subjectName`, `gender`, `mStatus`, `mobile`, `profilePic`, `password`, `fatherName`, `motherName`, `fatherOccupation`, `fatherEmail`, `fatherMobile`, `motherOccupation`, `address`, `status`, `role`, `created_date`, `modified`) VALUES
(18, 'rohan1', 'teacher', 'test@tester.com', 'math', 'male', 'unmarried', '9638527410', 'face6.jpg', '202cb962ac59075b964b07152d234b70', 'test', 'test', 'test', 'test@tester.com', '3698521470', 'test', 'test', 1, 0, '2019-10-21 18:32:06', '2019-10-31 17:31:37'),
(19, 'vishal', 'bhardwaj', 'vishal@gmail.com', 'math', '', '', '', '', '202cb962ac59075b964b07152d234b70', '', '', '', '', '', '', '', 0, 2, '2019-10-22 11:27:38', '2019-10-31 20:22:49');

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
-- Indexes for table `gt_clsSubject`
--
ALTER TABLE `gt_clsSubject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gt_gallery`
--
ALTER TABLE `gt_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gt_gallery_images`
--
ALTER TABLE `gt_gallery_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gt_members`
--
ALTER TABLE `gt_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gt_parents`
--
ALTER TABLE `gt_parents`
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
-- Indexes for table `gt_stdSection`
--
ALTER TABLE `gt_stdSection`
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
-- AUTO_INCREMENT for table `gt_clsSubject`
--
ALTER TABLE `gt_clsSubject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `gt_gallery`
--
ALTER TABLE `gt_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `gt_gallery_images`
--
ALTER TABLE `gt_gallery_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `gt_members`
--
ALTER TABLE `gt_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `gt_parents`
--
ALTER TABLE `gt_parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `gt_principal`
--
ALTER TABLE `gt_principal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gt_stdClass`
--
ALTER TABLE `gt_stdClass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `gt_stdSection`
--
ALTER TABLE `gt_stdSection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `gt_students`
--
ALTER TABLE `gt_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gt_teachers`
--
ALTER TABLE `gt_teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `gt_users`
--
ALTER TABLE `gt_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
