-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2021 at 07:27 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `complaint-management`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `uid` varchar(12) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `department` varchar(8) NOT NULL,
  `designation` varchar(20) DEFAULT 'administrator',
  `gender` varchar(2) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`uid`, `firstname`, `lastname`, `department`, `designation`, `gender`, `mobile`, `email`) VALUES
('admin101', 'PRIYANK', 'KUMAR SINGH', 'CSE', 'administrator', 'M', '1234567890', 'admin.priyank@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `userId` varchar(12) NOT NULL,
  `userType` varchar(10) NOT NULL,
  `category` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `details` varchar(500) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `remarks` varchar(500) NOT NULL DEFAULT 'None',
  `added` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `userId`, `userType`, `category`, `type`, `details`, `status`, `remarks`, `added`, `updated`) VALUES
(26, 'jtembhurne', 'faculty', 'C1', 'General', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Enim nunc faucibus a pellentesque.', 0, 'None', '2021-11-12 00:31:31', '2021-11-12 01:20:02'),
(27, 'jtembhurne', 'faculty', 'C1', 'General', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Enim nunc faucibus a pellentesque.', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Enim nunc faucibus a pellentesque.', '2021-11-12 00:32:25', '2021-11-12 00:32:25'),
(28, 'jtembhurne', 'faculty', 'C2', 'General', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Enim nunc faucibus a pellentesque.', 0, 'None', '2021-11-12 00:32:33', '2021-11-12 00:32:33'),
(29, 'BT19CSE125', 'student', 'C2', 'General', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Enim nunc faucibus a pellentesque.', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Enim nunc faucibus a pellentesque.', '2021-11-12 01:38:42', '2021-11-12 02:17:03'),
(30, 'BT19CSE090', 'student', 'C3', 'General', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Enim nunc faucibus a pellentesque.', 0, 'None', '2021-11-12 02:41:48', '2021-11-12 02:41:48'),
(31, 'BT19CSE090', 'student', 'C1', 'General', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Enim nunc faucibus a pellentesque.', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Enim nunc faucibus a pellentesque.', '2021-11-12 02:41:55', '2021-11-12 02:41:55'),
(32, 'BT19CSE090', 'student', 'C2', 'General', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Enim nunc faucibus a pellentesque.', 0, 'None', '2021-11-12 02:42:02', '2021-11-12 02:42:02'),
(33, 'BT19CSE125', 'student', 'C3', 'General', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Enim nunc faucibus a pellentesque.', 0, 'None', '2021-11-12 02:42:46', '2021-11-12 02:42:46');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `uid` varchar(12) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `department` varchar(8) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`uid`, `firstname`, `lastname`, `department`, `designation`, `gender`, `mobile`, `email`) VALUES
('jtembhurne', 'JITENDRA', 'TEMBHURNE', 'CSE', 'Head of Department', 'M', '1234567890', 'jtembhurne@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `uid` varchar(12) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `department` varchar(8) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`uid`, `firstname`, `lastname`, `department`, `designation`, `gender`, `mobile`, `email`) VALUES
('BT19CSE044', 'RAGHAV', 'AGRAWAL', 'CSE', 'student', 'M', '1234567890', 'raghav@mail.com'),
('BT19CSE090', 'PRIYANK', 'KUMAR SINGH', 'CSE', 'student', 'M', '1234567890', 'priyank@mail.com'),
('BT19CSE125', 'AMAN', 'VERMA', 'CSE', 'student', 'M', '1234567890', 'aman@mail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(14) NOT NULL,
  `registered` datetime NOT NULL DEFAULT current_timestamp(),
  `last_access` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `type`, `registered`, `last_access`) VALUES
('admin.priyank@mail.com', '2c9341ca4cf3d87b9e4eb905d6a3ec45', 'administrator', '2021-11-12 10:20:24', '2021-11-12 10:20:24'),
('aman@mail.com', '2c9341ca4cf3d87b9e4eb905d6a3ec45', 'student', '2021-11-12 10:19:19', '2021-11-12 11:45:36'),
('jtembhurne@mail.com', '2c9341ca4cf3d87b9e4eb905d6a3ec45', 'faculty', '2021-11-12 10:19:59', '2021-11-12 11:46:17'),
('priyank@mail.com', '2c9341ca4cf3d87b9e4eb905d6a3ec45', 'student', '2021-11-12 10:12:40', '2021-11-12 11:46:32'),
('raghav@mail.com', '2c9341ca4cf3d87b9e4eb905d6a3ec45', 'student', '2021-11-12 10:19:19', '2021-11-12 10:19:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
