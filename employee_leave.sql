-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2023 at 11:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_leave`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'MTIzNDU=');

-- --------------------------------------------------------

--
-- Table structure for table `create_leave`
--

CREATE TABLE `create_leave` (
  `lid` int(11) NOT NULL,
  `leave_type` varchar(100) NOT NULL,
  `description` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `create_leave`
--

INSERT INTO `create_leave` (`lid`, `leave_type`, `description`, `created_at`) VALUES
(1, 'Casual Leave', 'Provided for urgent or unforeseen matters to the employees', '2023-09-06 22:03:01'),
(2, 'Medical Leave', 'Related to Health problems of employee', '2023-09-02 20:23:52'),
(3, 'Restricted Holiday', 'Holiday that is optional', '2023-09-02 20:25:21'),
(4, 'Voting Leave', 'For official election day', '2023-09-02 20:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `did` int(11) NOT NULL,
  `department_name` varchar(60) NOT NULL,
  `short_form` varchar(20) NOT NULL,
  `code` varchar(10) NOT NULL,
  `reading_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`did`, `department_name`, `short_form`, `code`, `reading_time`) VALUES
(2, 'Human Resource', 'HR', 'HR160', '2023-08-30 21:33:12'),
(3, 'Information Technology', 'IT', 'IT807', '2023-08-30 21:35:09'),
(4, 'Operations', 'OP', 'OP640', '2023-08-30 21:35:09'),
(5, 'Volunteer', 'VL', 'VL9696', '2023-08-30 21:35:09'),
(6, 'Marketing', 'MK', 'MK369', '2023-08-30 21:35:09'),
(7, 'Finance', 'FI', 'FI123', '2023-08-30 21:36:14'),
(8, 'Sales mango', 'SS', 'SS469', '2023-08-31 21:14:13'),
(9, 'Research', 'RS', 'RS666', '2023-08-30 21:36:40');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `eid` int(11) NOT NULL,
  `employee_id` varchar(40) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `department` varchar(60) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `country` varchar(20) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `reading_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `employee_id`, `firstname`, `lastname`, `email`, `department`, `gender`, `dob`, `contact`, `country`, `address`, `city`, `password`, `reading_time`) VALUES
(1, '19we001', 'ganesh', 'kumars', 'ganesh@gmail.com', 'Finance', 'male', '2023-08-01', '9778878122', 'india', ' 53/2, south usman road			 ', 'chennai', '12345', '2023-09-08 21:50:55'),
(2, '19we002', 'nishitha', 's', 'nishitha@gmail.com', 'Informtion technology', 'female', '2023-08-12', '9797989898', 'india', 'pallava kottai,  madurai', 'chennai', '12345', '2023-08-29 19:43:56'),
(4, '34324', 'nayanthara', 'vsivan', 'nayantahar@gmail.com', 'Research', 'female', '2023-08-10', '5345345', '5345345', '535', '345', '345435', '2023-08-31 21:21:33');

-- --------------------------------------------------------

--
-- Table structure for table `emp_leave`
--

CREATE TABLE `emp_leave` (
  `elid` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL,
  `leave_type` varchar(70) NOT NULL,
  `description` text NOT NULL,
  `status` varchar(40) NOT NULL DEFAULT 'Pending',
  `Apply_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp_leave`
--

INSERT INTO `emp_leave` (`elid`, `emp_id`, `start_date`, `end_date`, `leave_type`, `description`, `status`, `Apply_time`) VALUES
(1, 2, '2023-09-05', '2023-09-05', 'Voting Leave', 'Today is a voting day', 'Declined', '2023-09-10 05:56:14'),
(2, 1, '2023-09-06', '2023-09-08', 'Medical Leave', 'testing', 'Approved', '2023-09-13 20:57:01'),
(3, 1, '2023-09-08', '2023-09-09', 'Medical Leave', 'fever', 'Pending', '2023-09-07 06:20:13'),
(4, 1, '2023-09-09', '2023-09-22', 'Restricted Holiday', 'Marriage function', 'Pending', '2023-09-08 21:51:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `create_leave`
--
ALTER TABLE `create_leave`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `emp_leave`
--
ALTER TABLE `emp_leave`
  ADD PRIMARY KEY (`elid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `create_leave`
--
ALTER TABLE `create_leave`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `emp_leave`
--
ALTER TABLE `emp_leave`
  MODIFY `elid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
