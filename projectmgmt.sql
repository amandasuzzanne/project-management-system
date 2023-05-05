-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2023 at 09:10 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectmgmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `institution` varchar(30) NOT NULL,
  `implementation_date` date NOT NULL,
  `status` enum('current','completed','suspended') NOT NULL DEFAULT 'current',
  `comments` mediumtext NOT NULL,
  `suggestions` mediumtext NOT NULL,
  `rating` enum('low','medium','high','excellent') NOT NULL DEFAULT 'low'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `institution`, `implementation_date`, `status`, `comments`, `suggestions`, `rating`) VALUES
(2, 'Walk', 'Karura', '2022-08-30', 'completed', 'It was a success', 'Improve on funding ', 'excellent'),
(3, 'Tree Planting', 'Matumbato', '2022-07-31', 'suspended', 'none', 'none', 'low'),
(4, 'Prize Giving', 'Pangani Girls High School', '2022-08-13', 'completed', 'The project was a success', 'Send guest invitations earlier', 'medium'),
(6, 'Prayer Day', 'Moi Kabarak High School', '2022-08-13', 'completed', 'Successful', 'Work on time management', 'high'),
(9, 'School project', 'TUK', '2022-11-18', 'current', 'none', 'none', 'low'),
(12, 'Sports day', 'TUK', '2022-10-13', 'current', 'noneww', 'noneww', 'medium'),
(13, 'Girls talk', 'TUK', '2022-10-13', 'suspended', 'none', 'none', 'low'),
(14, 'Talk', 'Kenya High ', '2022-10-28', 'current', 'none', 'none', 'low');

-- --------------------------------------------------------

--
-- Table structure for table `project_task`
--

CREATE TABLE `project_task` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `assigned` int(11) DEFAULT NULL,
  `status` enum('ongoing','completed') NOT NULL DEFAULT 'ongoing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project_task`
--

INSERT INTO `project_task` (`id`, `project_id`, `name`, `start_date`, `end_date`, `assigned`, `status`) VALUES
(3, 2, 'Register Participants ', '2022-07-01', '2022-07-10', 5, 'completed'),
(4, 2, 'Confirm participants', '2022-07-11', '2022-07-31', 0, 'completed'),
(13, 2, 'Check location', '2022-06-30', '2022-07-01', 2, 'completed'),
(15, 9, 'Research', '2022-08-24', '2022-09-22', 5, 'completed'),
(16, 9, 'Front End', '2022-09-20', '2022-10-11', 0, 'ongoing'),
(17, 9, 'Back end', '2022-10-10', '2022-10-29', 0, 'ongoing'),
(18, 9, 'Testing', '2022-09-29', '2022-11-08', 0, 'ongoing'),
(19, 9, 'Presentation A', '2022-09-29', '2022-09-30', 0, 'ongoing'),
(20, 9, 'Presentation B', '2022-11-30', '2022-12-01', 0, 'ongoing'),
(35, 3, 'Register participants', '2022-07-12', '2022-08-28', 0, 'ongoing'),
(36, 12, 'Preliminary visit to school', '2022-09-28', '2022-09-29', 0, 'completed'),
(37, 12, 'Create plan of activities', '2022-09-30', '2022-10-05', 0, 'completed'),
(38, 12, 'Buy props and prizes', '2022-10-05', '2022-10-12', 0, 'ongoing'),
(39, 4, 'Confirm guests', '2022-08-01', '2022-08-11', 0, 'completed'),
(40, 4, 'Purchase prizes', '2022-08-07', '2022-08-11', 0, 'ongoing'),
(41, 6, 'Confirm guests', '2022-08-01', '2022-08-11', 0, 'completed'),
(42, 13, 'Preliminary visit to school', '2022-09-01', '2022-09-02', 0, 'ongoing'),
(43, 13, 'Create plan of activities', '2022-09-02', '2022-09-30', 0, 'ongoing'),
(44, 13, 'Invite speakers', '2022-09-05', '2022-09-30', 0, 'ongoing'),
(45, 13, 'Confirm speakers', '2022-10-01', '2022-10-09', 0, 'ongoing'),
(46, 13, 'Buy gifts', '2022-10-01', '2022-10-11', 0, 'ongoing'),
(47, 14, 'Visit', '2022-10-07', '2022-10-08', 7, 'ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `emp_rank` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `emp_rank`, `password`) VALUES
(1, 'Brian', 'Alloice', 'brian@gmail.com', 'admin', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'Amanda', 'Suzzanne', 'amanda@gmail.com', 'project manager', '81dc9bdb52d04dc20036dbd8313ed055'),
(7, 'Amy', 'Williams', 'amy@gmail.com', 'user', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_task`
--
ALTER TABLE `project_task`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `project_task`
--
ALTER TABLE `project_task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project_task`
--
ALTER TABLE `project_task`
  ADD CONSTRAINT `project_task_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
