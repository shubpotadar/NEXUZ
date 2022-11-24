-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2022 at 04:02 PM
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
-- Database: `loginnexuz`
--

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `code` varchar(5) NOT NULL,
  `expire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `codes`
--

INSERT INTO `codes` (`id`, `email`, `code`, `expire`) VALUES
(1, 'shubham@mail.net', '14023', 1663141480),
(2, 'bmsce@mail.net', '87151', 1663142465),
(3, 'shubham@mail.net', '44047', 1663142557),
(4, 'shubham@mail.net', '18774', 1663245630),
(5, 'bmsce@mail.net', '86728', 1663325863),
(6, 'bmsce@mail.net', '89062', 1663325949),
(7, 'bmsce@mail.net', '65462', 1663326003),
(8, 'shubham@mail.net', '86356', 1663326474),
(9, 'shubham@mail.net', '33593', 1663326522),
(10, 'shubham@mail.net', '87721', 1663326637),
(11, 'shubham@mail.net', '76765', 1663326815),
(12, 'bmsce@mail.net', '93990', 1663326922),
(13, 'pragathi@mail.net', '82598', 1663763937);

-- --------------------------------------------------------

--
-- Table structure for table `course_details`
--

CREATE TABLE `course_details` (
  `courseid` int(11) NOT NULL,
  `coursename` varchar(80) NOT NULL,
  `descrip` varchar(500) NOT NULL,
  `enrolled` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_details`
--

INSERT INTO `course_details` (`courseid`, `coursename`, `descrip`, `enrolled`, `cost`, `image`) VALUES
(1, 'Algorithms', 'Master algorithms get hired as a software developer', 0, 500, 'algorithm'),
(8, 'Nodejs and Expressjs', 'Apply logical skill with interesting node modules for a full fledged backend.', 0, 990, ''),
(9, 'Python for Beginners', 'Deploying applications to the cloud using Python', 0, 500, ''),
(10, 'Full-stack web development', 'Build fascinating websites using cutting-edge technologies', 0, 670, ''),
(11, 'Java and Spring-boot', 'Learn spring-boot ,AWT and servlets and build system softwares and applications.', 0, 870, ''),
(12, 'Blockchain', 'Get hired into leading companies like Morgan Stanley by using Ethereum.', 0, 800, '');

-- --------------------------------------------------------

--
-- Table structure for table `course_pay`
--

CREATE TABLE `course_pay` (
  `courseid` int(11) NOT NULL,
  `paymentid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_pay`
--

INSERT INTO `course_pay` (`courseid`, `paymentid`) VALUES
(9, 10),
(9, 12),
(9, 14),
(9, 15),
(9, 16);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `userid` int(100) NOT NULL,
  `item_number` int(50) NOT NULL,
  `txn_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_gross` float(10,2) NOT NULL,
  `currency_code` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `paymentid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`userid`, `item_number`, `txn_id`, `payment_gross`, `currency_code`, `payment_status`, `paymentid`) VALUES
(5, 10, 'CU9EBZTFKVA3Y', 670.00, 'USD', 'Completed', 7),
(5, 9, 'CU9EBZTFKVA3Y', 500.00, 'USD', 'Completed', 8),
(6, 8, 'CU9EBZTFKVA3G', 990.00, 'USD', 'Completed', 9),
(9, 10, 'CU9EBZTFKVA3G', 670.00, 'USD', 'Completed', 10),
(9, 9, 'CU9EBZTFKVA3G', 500.00, 'USD', 'Completed', 11),
(9, 9, 'CU9EBZTFKVA3G', 500.00, 'USD', 'Completed', 12),
(9, 9, 'CU9EBZTFKVA3G', 500.00, 'USD', 'Completed', 13),
(9, 9, 'CU9EBZTFKVA3G', 500.00, 'USD', 'Completed', 14),
(9, 9, 'CU9EBZTFKVA3G', 500.00, 'USD', 'Completed', 15),
(9, 9, 'CU9EBZTFKVA3G', 500.00, 'USD', 'Completed', 16);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `project_name` varchar(50) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `userpid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_name`, `description`, `userpid`) VALUES
(14, 'Blog', '\r\nCreate your blog using html, css and vanilla js and invite individuals to create blogs!\r\n', 8),
(16, 'Speaker module', '\r\nImplement a simple speaker module and put your electronic skills to test with arduino and C.\r\n', 7),
(17, 'Python calculator', 'Using Python libraries create a calculator with better interface and efficiency\r\n', 7),
(18, 'HTML and CSS', 'Create interactive web page with HTML and CSS for Notes making and sharing.', 6),
(19, 'Netflix clone', 'Using Reactjs create a Netflix clone with front-end components and responsiveness', 5),
(20, 'asd', 'asd', 9);

-- --------------------------------------------------------

--
-- Table structure for table `project_taken`
--

CREATE TABLE `project_taken` (
  `project_id` int(10) NOT NULL,
  `userid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_taken`
--

INSERT INTO `project_taken` (`project_id`, `userid`) VALUES
(14, 9),
(17, 5),
(17, 9),
(18, 5),
(18, 9),
(19, 9);

-- --------------------------------------------------------

--
-- Table structure for table `sessionhis`
--

CREATE TABLE `sessionhis` (
  `sessionid` int(11) NOT NULL,
  `usersid` int(25) NOT NULL,
  `startdate` date NOT NULL,
  `starttime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sessionhis`
--

INSERT INTO `sessionhis` (`sessionid`, `usersid`, `startdate`, `starttime`) VALUES
(1, 8, '2022-09-16', '15:13:28'),
(2, 8, '2022-09-16', '15:13:28'),
(3, 8, '2022-09-16', '15:13:28'),
(4, 8, '2022-09-16', '15:13:28'),
(5, 8, '2022-09-16', '15:13:28'),
(6, 8, '2022-09-16', '15:13:28'),
(7, 8, '2022-09-16', '15:13:28'),
(8, 6, '2022-09-17', '15:24:29'),
(9, 7, '2022-09-16', '16:48:13'),
(10, 7, '2022-09-16', '16:48:13'),
(11, 5, '2022-09-21', '18:01:19'),
(12, 6, '2022-09-17', '15:24:29'),
(13, 5, '2022-09-21', '18:01:19'),
(14, 6, '2022-09-17', '15:24:29'),
(15, 5, '2022-09-21', '18:01:19'),
(16, 6, '2022-09-17', '15:24:29'),
(17, 5, '2022-09-21', '18:01:19'),
(18, 9, '2022-09-21', '19:31:47'),
(19, 9, '2022-09-21', '19:31:47'),
(20, 9, '2022-09-21', '19:31:47'),
(21, 9, '2022-09-21', '19:31:47'),
(24, 9, '2022-09-21', '19:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT 'temp.png',
  `instructor` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `name`, `email`, `password`, `photo`, `instructor`) VALUES
(5, 'shreyas', 'shreyas@mail.net', '123', 'temp.png', NULL),
(6, 'shubham', 'shubham@mail.net', '456', 'temp.png', NULL),
(7, 'bmsce', 'bmsce@mail.net', 'abc', '10722802781043385.png', NULL),
(8, 'swayam ', 'sway@mail.com', '123', '281937236pexels-roberto-nickson-2559941.jpg', NULL),
(9, 'PRAGATHI', 'pragathi@mail.net', '456', '1345837426117575.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_comments`
--

CREATE TABLE `user_comments` (
  `at_place` varchar(50) DEFAULT NULL,
  `comment` varchar(250) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `usercid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_comments`
--

INSERT INTO `user_comments` (`at_place`, `comment`, `name`, `role`, `usercid`) VALUES
('BMSCE', 'Good courses and nicely curated', 'shubham', 'JR developer ', 6),
('PES', 'got better undertstanding through your courses', 'swayam ', 'College student', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_details`
--
ALTER TABLE `course_details`
  ADD PRIMARY KEY (`courseid`);

--
-- Indexes for table `course_pay`
--
ALTER TABLE `course_pay`
  ADD PRIMARY KEY (`courseid`,`paymentid`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`paymentid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `fk_userid` (`userpid`);

--
-- Indexes for table `project_taken`
--
ALTER TABLE `project_taken`
  ADD PRIMARY KEY (`project_id`,`userid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `sessionhis`
--
ALTER TABLE `sessionhis`
  ADD PRIMARY KEY (`sessionid`),
  ADD KEY `sessions` (`usersid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `user_comments`
--
ALTER TABLE `user_comments`
  ADD KEY `FK_1` (`usercid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `course_details`
--
ALTER TABLE `course_details`
  MODIFY `courseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `paymentid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sessionhis`
--
ALTER TABLE `sessionhis`
  MODIFY `sessionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `fk_userid` FOREIGN KEY (`userpid`) REFERENCES `users` (`userid`);

--
-- Constraints for table `project_taken`
--
ALTER TABLE `project_taken`
  ADD CONSTRAINT `project_taken_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`),
  ADD CONSTRAINT `project_taken_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`);

--
-- Constraints for table `sessionhis`
--
ALTER TABLE `sessionhis`
  ADD CONSTRAINT `sessionhis_ibfk_1` FOREIGN KEY (`usersid`) REFERENCES `users` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
