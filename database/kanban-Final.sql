-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2016 at 10:30 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kanban`
--

-- --------------------------------------------------------

--
-- Table structure for table `boards`
--

CREATE TABLE IF NOT EXISTS `boards` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `estimate_start` date DEFAULT NULL,
  `estimate_end` date DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status_complete` int(1) DEFAULT NULL,
  `board_hide` int(11) DEFAULT NULL,
  `manager_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `boards`
--

INSERT INTO `boards` (`id`, `name`, `detail`, `estimate_start`, `estimate_end`, `start_date`, `end_date`, `status_complete`, `board_hide`, `manager_id`, `created_at`, `updated_at`) VALUES
(9, 'Test Card Color', '', '2016-06-23', '2016-06-23', '2016-06-23', NULL, NULL, NULL, 9, '2016-06-23 10:05:19', '2016-06-30 05:58:54'),
(10, 'Kanban Project', 'Final Project', '2016-02-01', '2016-06-15', '2016-06-29', NULL, NULL, 0, 9, '2016-06-29 14:37:24', '2016-07-03 09:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE IF NOT EXISTS `cards` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `detail` varchar(225) DEFAULT NULL,
  `color` varchar(45) NOT NULL DEFAULT 'whitesmoke',
  `estimate_start` date DEFAULT NULL,
  `estimate_end` date DEFAULT NULL,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `status_complete` tinyint(1) DEFAULT NULL,
  `child_id` int(11) DEFAULT NULL,
  `priority_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `Board_id` int(11) NOT NULL,
  `MemberManagement_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `name`, `detail`, `color`, `estimate_start`, `estimate_end`, `date_start`, `date_end`, `status_complete`, `child_id`, `priority_id`, `status_id`, `type_id`, `Board_id`, `MemberManagement_id`, `created_at`, `updated_at`) VALUES
(50, ' Test Card Color', '', '#64ffb6', '2016-06-23', '2016-06-23', '2016-06-23', NULL, 0, NULL, 1, 1, 2, 9, 28, '2016-06-23 10:46:46', '2016-06-27 12:25:32'),
(51, 'Test', '', '#000000', '2016-06-27', '2016-06-27', '2016-06-27', '2016-06-27', 1, NULL, 1, 4, 1, 9, 27, '2016-06-27 12:25:24', '2016-06-27 12:25:28'),
(52, 'Plan', 'วางแผน', '#c0c0c0', '2016-06-29', '2016-06-29', '2016-06-29', '2016-06-29', 0, NULL, 1, 3, 2, 10, 29, '2016-06-29 14:39:54', '2016-07-07 08:27:32'),
(53, 'Requirement Gathering', 'เก็บความต้องการ', '#008000', '2016-06-29', '2016-06-29', '2016-06-29', '2016-07-03', 0, NULL, 1, 3, 2, 10, 29, '2016-06-29 15:35:42', '2016-07-07 08:27:28'),
(54, 'Requirement  Analysis', '', '#000000', '2016-06-29', '2016-06-29', '2016-06-29', '2016-07-07', 1, NULL, 1, 4, 1, 10, 29, '2016-06-29 15:36:17', '2016-07-07 08:28:04'),
(55, 'Design', '', '#000000', '2016-06-30', '2016-06-30', '2016-06-29', '2016-07-07', 0, NULL, 1, 3, 2, 10, 29, '2016-06-29 15:36:44', '2016-07-07 08:29:05'),
(56, 'Development', '', '#ff0080', '2016-07-09', '2016-07-09', '2016-06-30', '2016-07-07', 1, NULL, 1, 4, 2, 10, 29, '2016-06-29 15:37:10', '2016-07-07 08:27:52'),
(57, 'Testing', '', '#ffff00', '2016-07-10', '2016-07-10', '2016-06-30', NULL, 0, 56, 1, 3, 2, 10, 29, '2016-06-29 15:37:45', '2016-07-07 08:28:50'),
(59, 'Deployment', 'ส่งมอบงาน', '#54fafa', '2016-06-01', '2016-06-15', NULL, NULL, NULL, 57, 1, 1, 1, 10, 30, '2016-07-03 09:58:15', '2016-07-03 10:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `checklists`
--

CREATE TABLE IF NOT EXISTS `checklists` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `Card_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `checklists`
--

INSERT INTO `checklists` (`id`, `name`, `status`, `Card_id`, `created_at`, `updated_at`) VALUES
(2, 'ascasccdsxxsaasx', 0, 50, '2016-06-27 12:30:27', '2016-06-27 12:30:45'),
(3, 'fgb', 0, 51, '2016-06-27 12:32:29', '2016-06-27 12:32:29'),
(4, 'ฟหกฟก', 0, 50, '2016-06-29 11:21:49', '2016-06-29 11:21:49'),
(9, 'user manual', 0, 59, '2016-07-03 10:04:33', '2016-07-03 10:04:43');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id` int(11) NOT NULL,
  `detail` varchar(225) DEFAULT NULL,
  `edit_status` int(1) NOT NULL DEFAULT '0',
  `Card_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `detail`, `edit_status`, `Card_id`, `User_id`, `created_at`, `updated_at`) VALUES
(113, '441', 0, 50, 9, '2016-06-23 15:32:39', '2016-06-23 15:32:39'),
(114, '(แก้ไข)(Ready  To  Backlog) อยากย้าย', 1, 50, 9, '2016-06-27 12:20:51', '2016-06-27 12:20:51'),
(115, '(แก้ไข)(Ready  To  Backlog) 12', 1, 50, 9, '2016-06-27 12:25:04', '2016-06-27 12:25:04'),
(116, '(แก้ไข)(Doing  To  Backlog) da', 1, 50, 9, '2016-06-27 12:25:35', '2016-06-27 12:25:35'),
(117, 'asd', 0, 51, 9, '2016-06-27 12:33:03', '2016-06-27 12:33:03'),
(118, 'asdasd', 0, 50, 10, '2016-06-29 07:43:49', '2016-06-29 07:43:49'),
(120, '(แก้ไข)(Done  To  Doing) fa', 1, 53, 9, '2016-06-30 06:05:04', '2016-06-30 06:05:04'),
(121, '(แก้ไข)(Doing  To  Ready) ยังไม่ได้ทำ', 1, 57, 9, '2016-07-03 09:46:39', '2016-07-03 09:46:39'),
(122, 'งานล้าช้า', 0, 59, 9, '2016-07-03 10:27:28', '2016-07-03 10:27:28'),
(123, 'ครับผม', 0, 59, 10, '2016-07-03 10:34:37', '2016-07-03 10:34:37'),
(124, '(แก้ไข โดย Testing)', 1, 57, 9, '2016-07-03 11:10:35', '2016-07-03 11:10:35'),
(125, '(แก้ไข)(Done  To  Doing) ยังทำไม่เสร็จ', 1, 56, 9, '2016-07-03 11:19:29', '2016-07-03 11:19:29'),
(126, '(แก้ไข)(Done  To  Doing) a', 1, 56, 9, '2016-07-07 08:27:24', '2016-07-07 08:27:24'),
(127, '(แก้ไข)(Done  To  Doing) as', 1, 53, 9, '2016-07-07 08:27:28', '2016-07-07 08:27:28'),
(128, '(แก้ไข)(Done  To  Doing) as', 1, 52, 9, '2016-07-07 08:27:32', '2016-07-07 08:27:32'),
(129, '(แก้ไข)(Done  To  Doing) 5', 1, 55, 9, '2016-07-07 08:29:05', '2016-07-07 08:29:05');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Project manager', NULL, NULL),
(2, 'Member', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `membermanagement`
--

CREATE TABLE IF NOT EXISTS `membermanagement` (
`id` int(11) NOT NULL,
  `Board_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membermanagement`
--

INSERT INTO `membermanagement` (`id`, `Board_id`, `User_id`, `active`, `created_at`, `updated_at`) VALUES
(27, 9, 9, 0, '2016-06-23 10:05:19', '2016-06-23 10:05:19'),
(28, 9, 10, 0, '2016-06-23 03:48:20', '2016-06-23 03:48:20'),
(29, 10, 9, 0, '2016-06-29 14:37:24', '2016-06-29 14:37:24'),
(30, 10, 10, 0, '2016-06-29 08:46:19', '2016-07-03 02:44:04'),
(31, 10, 11, 0, '2016-07-03 02:41:21', '2016-07-03 02:41:21');

-- --------------------------------------------------------

--
-- Table structure for table `priority`
--

CREATE TABLE IF NOT EXISTS `priority` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `priority`
--

INSERT INTO `priority` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Normal', NULL, NULL),
(2, 'High', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Backlog', NULL, NULL),
(2, 'Ready', NULL, NULL),
(3, 'Doing', NULL, NULL),
(4, 'Done', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
`id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Normal', NULL, NULL),
(2, 'Edit', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `remember_token` varchar(100) NOT NULL,
  `Level_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `Level_id`, `created_at`, `updated_at`) VALUES
(9, 'admin', 'admin@gmail.com', '$2y$10$IUHG64i/S3AA4kLaL2M9F.f90W2tDETIKZyH96f2LkC4URFKuePoW', 'HJTqbqk0ASdcdaSqN9jj4oZORrbR9vcRUoWokPeBYccayLojnZEoITnNqvS4', 1, '2016-06-23 03:04:58', '2016-07-03 04:49:34'),
(10, 'Natthawut Jantapoon', 'davilbm_9@hotmail.com', '$2y$10$3fFgnxUo1vUOwNP3mkeOT.jjl7UcQ8ZEDQIxq203/fc2l6f21Mas.', '75NkorTyY4y0o8yzlyWdPDRbHYBY8KRrN0zejdzo4RTr3Hb2OKhs22yiculh', 2, '2016-06-23 03:48:11', '2016-07-03 01:22:32'),
(11, 'suphisit', 'suphisit@hotmail.com', '$2y$10$Ixk9R1/ojkoC6ncgJvRLt.s1dWVaXDdOGmp7Qq14my7mh56zvEZ0q', '', 2, '2016-07-03 02:38:46', '2016-07-03 02:38:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boards`
--
ALTER TABLE `boards`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`), ADD KEY `fk_Boards_Members1_idx` (`manager_id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_Cards_statuses1_idx` (`status_id`), ADD KEY `fk_Cards_priorities1_idx` (`priority_id`), ADD KEY `fk_Cards_types1_idx` (`type_id`), ADD KEY `fk_Cards_Boards1_idx` (`Board_id`), ADD KEY `fk_Cards_MemberManagements1_idx` (`MemberManagement_id`), ADD KEY `fk_Cards_Cards1_idx` (`child_id`);

--
-- Indexes for table `checklists`
--
ALTER TABLE `checklists`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_checklists_Cards1_idx` (`Card_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_Comments_Cards1_idx` (`Card_id`), ADD KEY `fk_Comments_Members1_idx` (`User_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membermanagement`
--
ALTER TABLE `membermanagement`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_MemberManagements_Boards_idx` (`Board_id`), ADD KEY `fk_MemberManagements_Members1_idx` (`User_id`);

--
-- Indexes for table `priority`
--
ALTER TABLE `priority`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_UNIQUE` (`id`), ADD KEY `fk_Members_Level1_idx` (`Level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `boards`
--
ALTER TABLE `boards`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `checklists`
--
ALTER TABLE `checklists`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `membermanagement`
--
ALTER TABLE `membermanagement`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `priority`
--
ALTER TABLE `priority`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `boards`
--
ALTER TABLE `boards`
ADD CONSTRAINT `fk_Boards_Members1` FOREIGN KEY (`manager_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cards`
--
ALTER TABLE `cards`
ADD CONSTRAINT `fk_Cards_Boards1` FOREIGN KEY (`Board_id`) REFERENCES `boards` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Cards_Cards1` FOREIGN KEY (`child_id`) REFERENCES `cards` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Cards_MemberManagements1` FOREIGN KEY (`MemberManagement_id`) REFERENCES `membermanagement` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Cards_priorities1` FOREIGN KEY (`priority_id`) REFERENCES `priority` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Cards_statuses1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Cards_types1` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `checklists`
--
ALTER TABLE `checklists`
ADD CONSTRAINT `fk_checklists_Cards1` FOREIGN KEY (`Card_id`) REFERENCES `cards` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `fk_Comments_Cards1` FOREIGN KEY (`Card_id`) REFERENCES `cards` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_Comments_Members1` FOREIGN KEY (`User_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `membermanagement`
--
ALTER TABLE `membermanagement`
ADD CONSTRAINT `fk_MemberManagements_Boards` FOREIGN KEY (`Board_id`) REFERENCES `boards` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_MemberManagements_Members1` FOREIGN KEY (`User_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
ADD CONSTRAINT `fk_Members_Level1` FOREIGN KEY (`Level_id`) REFERENCES `level` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
