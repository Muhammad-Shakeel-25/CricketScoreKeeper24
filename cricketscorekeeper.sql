-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 09:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cricketscorekeeper`
--

-- --------------------------------------------------------

--
-- Table structure for table `cricket_match`
--

CREATE TABLE `cricket_match` (
  `id` int(11) NOT NULL,
  `team_1` varchar(255) NOT NULL,
  `team_2` varchar(255) NOT NULL,
  `total_over` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `current_batting_team` varchar(255) NOT NULL,
  `current_bowling_team` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL,
  `chased` varchar(255) NOT NULL,
  `won_details` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cricket_match`
--

INSERT INTO `cricket_match` (`id`, `team_1`, `team_2`, `total_over`, `status`, `current_batting_team`, `current_bowling_team`, `target`, `chased`, `won_details`, `email`) VALUES
(4, 'Team1', 'Team3', '5', '', 'Team1', 'Team3', '', '', '', 'abc@f.f'),
(5, 'Team1', 'Team3', '2', '', 'Team3', 'Team1', '', '', '', 'abc@f.f'),
(6, 'Team4', 'Team5', '2', '', 'Team4', 'Team5', '', '', '', 'muhammadshakeel9995@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `inning`
--

CREATE TABLE `inning` (
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `ball_no` varchar(255) NOT NULL,
  `run` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `bowler` varchar(255) NOT NULL,
  `batsman` varchar(255) NOT NULL,
  `match_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inning`
--

INSERT INTO `inning` (`timestamp`, `ball_no`, `run`, `type`, `bowler`, `batsman`, `match_id`) VALUES
('2024-05-30 19:28:20', '1', '4', 'Boundary', 'P1', 'Person 1', '6'),
('2024-05-30 19:28:34', '2', '6', 'Boundary', 'P1', 'Person 1', '6'),
('2024-05-30 19:28:40', '3', '0', 'Run', 'P1', 'Person 1', '6'),
('2024-05-30 19:28:45', '4', '1', 'Run', 'P1', 'Person 1', '6'),
('2024-05-30 19:28:49', '5', '3', 'Run', 'P1', 'Person 1', '6'),
('2024-05-30 19:28:53', '6', '5', 'Run', 'P1', 'Person 1', '6'),
('2024-05-30 19:28:57', '7', '6', 'Run', 'P1', 'Person 1', '6'),
('2024-05-30 19:29:04', '7', '1', 'No Ball Extra', 'P1', 'Person 1', '6'),
('2024-05-30 19:29:11', '7', '1', 'Wide Ball Extra', 'P2', 'Person 1', '6'),
('2024-05-30 19:29:18', '8', '5', 'Run', 'P1', 'Person 1', '6'),
('2024-05-30 19:29:21', '9', '3', 'Run', 'P1', 'Person 1', '6'),
('2024-05-30 19:29:25', '10', '1', 'Run', 'P1', 'Person 1', '6'),
('2024-05-30 19:29:29', '11', '3', 'Run', 'P1', 'Person 1', '6'),
('2024-05-30 19:29:39', '12', '1', 'Run', 'P1', 'Person 1', '6');

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `id` int(11) NOT NULL,
  `teamname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`id`, `teamname`, `name`, `type`) VALUES
(1, 'Team1', 'Chris', 'batsman'),
(2, 'Team1', 'Chris1', 'bowler'),
(3, 'Team1', 'Chris2', 'all rounder'),
(4, 'Team2', 'Mark', 'batsman'),
(5, 'Team2', 'Mark1', 'bowler'),
(6, 'Team2', 'Mark2', 'all rounder'),
(9, 'Team3', 'Marking', 'batsman'),
(10, 'Team3', 'Marking2', 'bowler'),
(11, 'Team3', 'Marking2', 'bowler'),
(12, 'Team1', 'John', 'batsman'),
(13, 'Team3', 'John2', 'batsman'),
(14, 'Team1', 'Marking4', 'batsman'),
(15, 'Team1', 'Adam', 'batsman'),
(16, '', 'a', 'batsman'),
(17, '', 'b', 'batsman'),
(18, 'Team4', 'Person 1', 'batsman'),
(19, 'Team4', 'Person 2', 'bowler'),
(20, 'Team4', 'Person 3', 'all rounder'),
(21, 'Team5', 'P1', 'batsman'),
(22, 'Team5', 'P2', 'batsman'),
(23, 'Team5', 'P3', 'bowler');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `country`, `city`, `color`, `email`) VALUES
(4, 'Team1', 'England', 'London', 'White', 'abc@f.f'),
(5, 'Team2', 'England', 'London', 'Green', 'abc@f.'),
(8, 'Team3', 'England', 'London', 'Green', 'abc@f.f'),
(10, 'Team4', 'England', 'London', 'White', 'muhammadshakeel9995@gmail.com'),
(11, 'Team5', 'England', 'London', 'White', 'muhammadshakeel9995@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`) VALUES
(11, 'abc@f.f', '$2y$10$0Gur4tvRWMBQ3vrklpZNveofImRR7EIVhLjMIDUiVSakEkfXq0RKq', 'end_user'),
(14, 'muhammadshakeel9995@gmail.com', '$2y$10$Pp56F7hkx/8qHBb70bYIsekYVkLRGZGQfZNlGla7w4yvjDEhn1VXi', 'end_user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cricket_match`
--
ALTER TABLE `cricket_match`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cricket_match`
--
ALTER TABLE `cricket_match`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
