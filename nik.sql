-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 06, 2017 at 05:23 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nik`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stu_id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `stu_ic` varchar(14) NOT NULL,
  `address` varchar(250) NOT NULL,
  `contact` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_id`, `name`, `stu_ic`, `address`, `contact`) VALUES
(24, 'Elly', '971107105406', 'Kota Bharu', '0123456789'),
(25, 'Harriz', '951123105601', 'Kuala Lumpur', '0131234567'),
(26, 'Daniel', '920103105307', 'Shah Alam', '0132456789'),
(27, 'Lydia', '911234015806', 'Kelana Jaya', '0147118080'),
(48, 'Tisya', '041010105416', 'Subang', '0123456789'),
(49, 'Fairy', '9512345678', 'Kelana Jaya', '0123456789'),
(73, 'Ronda Rousey', '980102035124', 'Kangsar', '01345267891'),
(74, 'ismail hassan', '980612015571', 'kuantan', '0134526788');

-- --------------------------------------------------------

--
-- Table structure for table `stu_sub`
--

CREATE TABLE `stu_sub` (
  `stu_sub_id` bigint(255) NOT NULL,
  `stu_id` int(10) NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu_sub`
--

INSERT INTO `stu_sub` (`stu_sub_id`, `stu_id`, `id`) VALUES
(4, 25, 50),
(5, 25, 51),
(6, 25, 52),
(7, 26, 50),
(9, 26, 52),
(57, 24, 50),
(58, 24, 52),
(111, 73, 51),
(112, 73, 52),
(113, 73, 53),
(114, 73, 55),
(115, 73, 62),
(126, 74, 50),
(127, 74, 51),
(128, 74, 52),
(129, 74, 54);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(8) NOT NULL,
  `sub_name` text NOT NULL,
  `sub_price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `sub_name`, `sub_price`) VALUES
(50, 'Bahasa Melayu', 'RM30'),
(51, 'Bahasa Inggeris', 'RM30'),
(52, 'Mathematics', 'RM30'),
(53, 'Science', 'RM30'),
(54, 'Sejarah', 'RM45'),
(55, 'Geografi', 'RM45'),
(56, 'Additional Mathematic', 'RM50'),
(57, 'Chemistry', 'RM50'),
(58, 'Physics', 'RM50'),
(59, 'Biology', 'RM50'),
(60, 'Principle of Accounting', 'RM50'),
(61, 'Ekonomi Asas', 'RM50'),
(62, 'Perdagangan', 'RM50'),
(67, 'French', 'RM50'),
(68, 'Italy', 'RM25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `trn_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `trn_date`) VALUES
(4, 'admin1', 'admin1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2016-06-23 10:58:27'),
(5, 'niknurlydia', 'lydianmh@gmail.com', '9db8475147292ce7e90e763971b7d945', '2016-12-19 18:32:50'),
(6, 'niknurnasreen', 'nasreennmh@gmail.com', 'f7c70d13272eb7c9eed5780c28d5ae88', '2016-12-19 18:34:31'),
(7, 'systema', 'angel_cheer22@yahoo.com', '80ad341157b2f94a0a1fc7c80f801e7d', '2016-12-28 03:11:29'),
(8, 'group', 'angel_cheer22@yahoo.com', 'a8698009bce6d1b8c2128eddefc25aad', '2016-12-28 03:14:27'),
(9, 'putera', 'putera123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2016-12-28 06:12:42'),
(10, 'daniel', 'daniel77@gmail.com', '912e79cd13c64069d91da65d62fbb78c', '2016-12-29 10:04:15'),
(11, 'nik nur lydia', 'lydianmh@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', '2016-12-29 19:23:40'),
(12, 'anm', 'yyy@ttt.com', '81dc9bdb52d04dc20036dbd8313ed055', '2016-12-30 09:09:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stu_id`),
  ADD UNIQUE KEY `stu_ic` (`stu_ic`),
  ADD UNIQUE KEY `stu_ic_2` (`stu_ic`);

--
-- Indexes for table `stu_sub`
--
ALTER TABLE `stu_sub`
  ADD PRIMARY KEY (`stu_sub_id`),
  ADD KEY `stu_id` (`stu_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
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
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stu_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `stu_sub`
--
ALTER TABLE `stu_sub`
  MODIFY `stu_sub_id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `stu_sub`
--
ALTER TABLE `stu_sub`
  ADD CONSTRAINT `stu_sub_ibfk_1` FOREIGN KEY (`stu_id`) REFERENCES `student` (`stu_id`),
  ADD CONSTRAINT `stu_sub_ibfk_2` FOREIGN KEY (`id`) REFERENCES `subject` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
