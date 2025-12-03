-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2025 at 05:50 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `edu`
--

CREATE TABLE `edu` (
  `standard` varchar(20) NOT NULL,
  `seat_no` int(11) NOT NULL,
  `passing_year` int(11) NOT NULL,
  `percentage` float NOT NULL,
  `board` varchar(50) NOT NULL,
  `Enr_no` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `edu`
--

INSERT INTO `edu` (`standard`, `seat_no`, `passing_year`, `percentage`, `board`, `Enr_no`) VALUES
('10th', 2914, 2022, 59.01, 'GSEB', 206270307008),
('12th', 578925, 2022, 59, 'GSEB', 206270307018),
('12th', 22112211, 2021, 69, 'gseb', 3203212866),
('10th', 351245, 2021, 45.69, 'GSEB', 206270307045),
('10th', 15236, 2022, 59.01, 'GSEB', 206270307018);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `Event_id` int(20) NOT NULL,
  `Event date` date NOT NULL,
  `Event_details` varchar(20) NOT NULL,
  `image` blob NOT NULL,
  `status` enum('Pending','Approved','Rejected') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`Event_id`, `Event date`, `Event_details`, `image`, `status`) VALUES
(2, '2023-05-17', 'Defence day celebrat', 0x576861747341707020496d61676520323032332d30342d323420617420352e35342e313920504d2e6a706567, 'Approved'),
(9, '2023-05-24', 'navratri', 0x576861747341707020496d61676520323032322d30332d323020617420362e31302e343720504d2e6a706567, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `icard`
--

CREATE TABLE `icard` (
  `Enr_no` bigint(20) NOT NULL,
  `Department_id` int(20) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Date_of_birth` date NOT NULL,
  `Phone_no` bigint(12) NOT NULL,
  `Blood_group` varchar(5) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Status` enum('Pending','Approved','Rejected') NOT NULL DEFAULT 'Pending',
  `photo` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `icard`
--

INSERT INTO `icard` (`Enr_no`, `Department_id`, `Name`, `Date_of_birth`, `Phone_no`, `Blood_group`, `Address`, `Status`, `photo`) VALUES
(206270307018, 7, 'palak', '2023-06-16', 1234567891, 'O-', 'mvr', 'Approved', 0x576861747341707020496d61676520323032322d30332d323020617420362e31302e343720504d2e6a706567),
(206270307008, 4, 'Arjun', '2023-06-14', 1234567890, 'O-', 'mvr', 'Approved', 0x576861747341707020496d61676520323032322d30332d323020617420362e31302e343720504d2e6a706567);

-- --------------------------------------------------------

--
-- Table structure for table `namo-e-tab`
--

CREATE TABLE `namo-e-tab` (
  `Semester_id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `Enr_no` bigint(20) NOT NULL,
  `Application no` int(20) NOT NULL,
  `Mobile_no` bigint(10) NOT NULL,
  `status` enum('Pending','Approved','Rejected') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `namo-e-tab`
--

INSERT INTO `namo-e-tab` (`Semester_id`, `name`, `Enr_no`, `Application no`, `Mobile_no`, `status`) VALUES
(1, 'palak', 206270307018, 1529, 9712559901, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE `reg` (
  `Enr_no` bigint(12) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `role` enum('Admin','Faculty','Student') NOT NULL DEFAULT 'Student',
  `status` enum('Pending','Approve','Reject') NOT NULL DEFAULT 'Pending',
  `profile_picture` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`Enr_no`, `Name`, `Gender`, `Password`, `Email`, `role`, `status`, `profile_picture`) VALUES
(29141506001, 'Admin', 'Male', '2914', 'admin@gmail.com', 'Admin', 'Approve', 0x61726a756e2e6a7067),
(206270307018, 'palak', 'Female', '1234', 'nakumpalak1506@gmail.com', 'Student', 'Approve', 0x576861747341707020496d61676520323032322d30332d323020617420362e31302e343720504d2e6a706567),
(206270307040, 'imaran pathan', 'Male', '4578', 'abc@gamil.com', 'Faculty', 'Approve', 0x576861747341707020496d61676520323032322d30332d323020617420362e31302e343720504d2e6a706567);

-- --------------------------------------------------------

--
-- Table structure for table `scholarship`
--

CREATE TABLE `scholarship` (
  `Application_id` int(11) NOT NULL,
  `Accedmic_year` int(11) NOT NULL,
  `Enr_no` bigint(12) NOT NULL,
  `Sch_code` int(11) NOT NULL,
  `status` enum('Pending','Approved','Rejected') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scholarship`
--

INSERT INTO `scholarship` (`Application_id`, `Accedmic_year`, `Enr_no`, `Sch_code`, `status`) VALUES
(8, 2023, 206270307018, 1234, 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `Term` varchar(20) NOT NULL,
  `Department_id` int(20) NOT NULL,
  `division` varchar(20) NOT NULL,
  `image` blob NOT NULL,
  `status` enum('Pending','Approved','Rejected') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`Event_id`);

--
-- Indexes for table `icard`
--
ALTER TABLE `icard`
  ADD PRIMARY KEY (`Enr_no`),
  ADD UNIQUE KEY `Phone_no` (`Phone_no`);

--
-- Indexes for table `namo-e-tab`
--
ALTER TABLE `namo-e-tab`
  ADD PRIMARY KEY (`Application no`);

--
-- Indexes for table `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`Enr_no`),
  ADD UNIQUE KEY `Passwiord` (`Password`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `scholarship`
--
ALTER TABLE `scholarship`
  ADD PRIMARY KEY (`Application_id`),
  ADD UNIQUE KEY `Sch_code` (`Sch_code`),
  ADD UNIQUE KEY `Enr_no` (`Enr_no`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
