-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220609.11e34a6fec
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2022 at 01:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `id` bigint(20) NOT NULL,
  `candidate_id` bigint(20) NOT NULL,
  `first` text NOT NULL,
  `last` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `job` bigint(200) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `pincode` int(30) NOT NULL,
  `state` text NOT NULL,
  `city` text NOT NULL,
  `country` text NOT NULL,
  `resume` varchar(500) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`id`, `candidate_id`, `first`, `last`, `email`, `job`, `gender`, `address`, `pincode`, `state`, `city`, `country`, `resume`, `timestamp`) VALUES
(46, 2875, 'Hrishikesh', 'Gogoi', 'csb19030@tezu.ac.in', 274, 'Male', 'Na ali Jorhat', 785001, 'assam', 'jorhat', 'india', 'Resume.pdf', '2022-08-20 13:25:47'),
(48, 2195, 'musta', 'Shahin', 'company@test.com', 1158, 'Male', 'nnaaa', 785001, 'assam', 'jorhat', 'india', 'Resume (2) (1).pdf', '2022-08-20 14:37:47');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) NOT NULL,
  `job_id` bigint(200) NOT NULL,
  `job_cat` varchar(200) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `job_name` varchar(100) NOT NULL,
  `job_desc` longtext NOT NULL,
  `location` varchar(200) NOT NULL,
  `salary` varchar(200) NOT NULL,
  `experience` varchar(20) NOT NULL DEFAULT '0 year',
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `logo` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `job_id`, `job_cat`, `company_name`, `job_name`, `job_desc`, `location`, `salary`, `experience`, `timestamp`, `logo`) VALUES
(14, 44, 'Web Development', 'Google', 'Software Developer', 'Will be notified', 'Banglore', '24ctc', '0-2 Years', '2022-08-19 18:53:19', ''),
(15, 45, 'Graphics design', 'JobDukaan', 'SE', 'Will be notified', 'Tezpur', '12ctc', '0-2 Years', '2022-08-19 18:53:33', ''),
(16, 1158, 'Graphics design', 'JobDukaan', 'SE', 'Will be notified', 'Tezpur', '12ctc', '0-2 Years', '2022-08-19 18:26:24', ''),
(17, 274, 'Web Development', 'Yahoo', 'Software Developer', 'NA', 'Banglore', '30CTC', '0-2 Years', '2022-08-19 18:33:01', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(200) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `phnno` int(11) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `password`, `date`, `phnno`, `email`) VALUES
(13, 139, 'Hrishikesh', 'pass', '2022-08-20 12:42:36', 2147483647, 'gogoihrishikesh6@gmail.com'),
(14, 110, 'admin', 'pass', '2022-08-20 12:46:06', 1234567890, 'admin@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
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
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



