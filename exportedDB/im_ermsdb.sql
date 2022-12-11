-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2022 at 01:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `im_ermsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(100) NOT NULL,
  `dept_description` varchar(200) NOT NULL,
  `supervisor` varchar(100) NOT NULL,
  `emp_count` int(20) NOT NULL,
  `location` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `dept_description`, `supervisor`, `emp_count`, `location`, `created_at`) VALUES
(1, 'Engineering', 'A department that focuses on the design, construction, and operation of various systems, structures, and machines.', 'Bob Marley', 1, 'Polangui, Albay', '2022-12-09 08:52:29');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `emp_code` varchar(20) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `job_position` varchar(100) DEFAULT NULL,
  `supervisor` varchar(100) DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `salary` int(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `firstname`, `lastname`, `emp_code`, `date_of_birth`, `gender`, `email`, `password`, `phone`, `department`, `job_position`, `supervisor`, `hire_date`, `salary`, `created_at`) VALUES
(1, 'Mark Vincent', 'Cleofe', '', '2003-02-06', 'Male', 'vincentmariscotecleofe@gmail.com', 'syntaxerror', '09637137897', 'Engineering', 'Software Engineer', 'Bob Marley', '2022-09-07', 1000000, '2022-12-09 08:44:50'),
(5, 'Terror', 'Blade', 'C21102324', NULL, NULL, 'terrorblade@gmail.com', 'test12345', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-10 16:52:19'),
(6, 'Elon', 'Musk', 'C21102325', NULL, NULL, 'elonmusk@gmail.com', 'elonmusk', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-10 18:47:27'),
(7, 'Mark', 'Vincent', 'C211023256', NULL, NULL, 'mark@gmail.com', 'mark12345', NULL, NULL, NULL, NULL, NULL, NULL, '2022-12-11 00:18:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `emp_code` (`emp_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
