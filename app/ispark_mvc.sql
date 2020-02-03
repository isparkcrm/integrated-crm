-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2019 at 12:26 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ispark_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `agent_master`
--

CREATE TABLE `agent_master` (
  `agent_id` int(10) NOT NULL,
  `campaign_id` varchar(250) DEFAULT NULL,
  `username` varchar(250) NOT NULL,
  `role` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agent_master`
--

INSERT INTO `agent_master` (`agent_id`, `campaign_id`, `username`, `role`) VALUES
(1, '2', 'sakthivel@futurecalls.com', 'L1 support'),
(2, '2', 'shahinsha@futurecalls.com', 'L1 support'),
(3, '1', 'pradeep@futurecalls.com', 'L1 support'),
(4, '1', 'devakumar@futurecalls.com', 'L1 support'),
(5, '1', 'suresh.j@futurecalls.com', 'L1 support'),
(6, '1', 'dillibabu@futurecalls.com', 'L1 support'),
(7, '1', 'kannan@futurecalls.com', 'L1 support'),
(8, '3', 'tamilarasan@futurecalls.com', 'L1 support'),
(9, '3', 'karthik@futurecalls.com', 'L1 support'),
(10, '3', 'vengadeshwaran@futurecalls.com', 'L1 support'),
(11, '3', 'subrat@futurecalls.com', 'L1 support');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_client`
--

CREATE TABLE `campaign_client` (
  `id` int(10) NOT NULL,
  `campaign_id` varchar(250) DEFAULT NULL,
  `clientID` varchar(250) DEFAULT NULL,
  `process` varchar(250) DEFAULT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaign_client`
--

INSERT INTO `campaign_client` (`id`, `campaign_id`, `clientID`, `process`, `created_date`) VALUES
(1, '2', 'Uni4211', '4', '2019-07-19 05:28:01'),
(2, '1', 'Rub5002', '5', '2019-07-21 22:10:26'),
(3, '1', 'Gem0403', '1', '2019-07-21 22:10:41'),
(4, '1', 'CGP1103', '2', '2019-07-21 22:11:04'),
(5, '1', 'VMC1203', '1', '2019-07-21 22:11:21'),
(6, '1', 'Cit1111', '2', '2019-07-21 22:11:36'),
(7, '1', 'Sta1303', '1', '2019-07-21 22:12:21'),
(8, '1', 'God1403', '1', '2019-07-21 22:12:32'),
(9, '1', 'ABA1503', '1', '2019-07-21 22:13:11'),
(10, '1', 'GRT1503', '1', '2019-07-21 22:13:30'),
(11, '1', 'IRC1603', '1', '2019-07-21 22:13:42'),
(12, '3', 'Pan2103', '3', '2019-07-21 22:39:48'),
(13, '3', 'SUN1903', '3', '2019-07-21 22:40:14'),
(14, '3', 'Kum1803', '3', '2019-07-21 22:40:58'),
(15, '3', 'VSH1703', '3', '2019-07-21 22:43:12'),
(16, '3', 'Gem0403', '3', '2019-07-21 22:44:00'),
(17, '1', 'Ste0911', '2', '2019-07-21 22:47:39'),
(18, '1', 'VSH1703', '5', '2019-07-21 22:53:57'),
(19, '2', 'Tir4111', '4', '2019-07-21 22:57:48'),
(20, '2', 'ISO4111', '4', '2019-07-21 22:58:00'),
(21, '2', 'IGe4311', '4', '2019-07-21 22:58:41'),
(22, '2', 'Alt4411', '4', '2019-07-21 22:58:53'),
(23, '2', 'Raj4711', '4', '2019-07-21 22:59:09'),
(24, '2', 'SSS4811', '4', '2019-07-21 22:59:37'),
(25, '2', 'Int4911', '4', '2019-07-21 22:59:54'),
(26, '2', 'Hun4911', '4', '2019-07-21 23:00:10'),
(27, '2', 'Sun5011', '4', '2019-07-21 23:00:27'),
(28, '2', 'Pra5111', '4', '2019-07-21 23:00:42'),
(29, '2', 'Uni5211', '4', '2019-07-21 23:01:12'),
(30, '2', 'The5311', '4', '2019-07-21 23:01:40'),
(31, '2', 'Sun5311', '4', '2019-07-21 23:01:56');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_master`
--

CREATE TABLE `campaign_master` (
  `id` int(11) NOT NULL,
  `campaigntype` varchar(255) NOT NULL,
  `campaignID` varchar(255) NOT NULL,
  `callscript` text,
  `campaignname` varchar(255) NOT NULL,
  `campaigndescrip` varchar(500) NOT NULL,
  `modeofcomm` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaign_master`
--

INSERT INTO `campaign_master` (`id`, `campaigntype`, `campaignID`, `callscript`, `campaignname`, `campaigndescrip`, `modeofcomm`, `created_at`) VALUES
(1, 'Inbound', 'Con4905', NULL, 'Contact Center', 'contact center department', 'email,oncall', '2019-07-19 12:23:07'),
(2, 'Inbound', 'Inf5005', NULL, 'Information Security', 'information security', 'email,oncall', '2019-07-19 12:23:07'),
(3, 'Inbound', 'Net5105', NULL, 'Network and Data', 'networking', 'email,oncall', '2019-07-19 12:23:07'),
(4, 'Inbound', 'FTO5105', NULL, 'FTOSS', 'fms support', 'email,oncall', '2019-07-19 12:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_service`
--

CREATE TABLE `campaign_service` (
  `id` int(10) NOT NULL,
  `campaign_id` varchar(250) NOT NULL,
  `service` varchar(250) DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaign_service`
--

INSERT INTO `campaign_service` (`id`, `campaign_id`, `service`, `created`) VALUES
(10, 'Tes2612', '1', '2019-06-25 12:38:18'),
(11, 'Tes2612', '2', '2019-06-25 12:38:18'),
(15, 'Tes2612', '5', '2019-06-25 12:48:13'),
(16, 'Tes2612', '6', '2019-06-25 12:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `client_location`
--

CREATE TABLE `client_location` (
  `id` int(10) NOT NULL,
  `client_ID` varchar(250) DEFAULT NULL,
  `location` varchar(250) DEFAULT NULL,
  `support_time` varchar(250) DEFAULT NULL,
  `support_days` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_location`
--

INSERT INTO `client_location` (`id`, `client_ID`, `location`, `support_time`, `support_days`, `created_at`) VALUES
(30, 'TVS5604', 'Madurai', '24/7', 'Sunday,Monday,Tuesday,Monday,Tuesday,Wednssday,Thursday,Friday', '2019-06-25 16:56:51'),
(31, 'TVS5604', 'Chennai', '24/7 ', 'Sunday,Monday,Tuesday,Monday,Tuesday,Wednssday,Thursday,Friday', '2019-06-25 16:56:51');

-- --------------------------------------------------------

--
-- Table structure for table `client_master`
--

CREATE TABLE `client_master` (
  `id` int(10) NOT NULL,
  `clientname` varchar(250) NOT NULL,
  `client_ID` varchar(250) NOT NULL,
  `contact_person` varchar(250) NOT NULL,
  `number` varchar(250) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `support_time` varchar(1000) NOT NULL,
  `support_type` varchar(250) NOT NULL,
  `documents` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_master`
--

INSERT INTO `client_master` (`id`, `clientname`, `client_ID`, `contact_person`, `number`, `start_date`, `end_date`, `support_time`, `support_type`, `documents`, `created_at`) VALUES
(1, 'Tirumala Milk Pvt Ltd', 'Tir4111', 'Karthick', '8939811522', '2019-01-01', '2021-01-01', '8/5', 'remote', '', '2019-07-18 06:11:01'),
(2, 'ISOFT Pvt Ltd', 'ISO4111', 'Sathish', '9164301284', '2019-01-01', '2020-01-01', '8/5', 'remote', '', '2019-07-18 06:11:59'),
(3, 'Universal Engineers Pvt Ltd', 'Uni4211', 'Vignesh', '8098521750', '2019-01-01', '2022-01-01', '8/5', 'remote', '', '2019-07-18 06:12:49'),
(4, 'IGene Entertainment Services Private Limited', 'IGe4311', 'Ragav', '9500070099', '2019-01-01', '2020-01-01', '8/5', 'remote', '', '2019-07-18 06:13:27'),
(5, 'Altacit Global', 'Alt4411', 'Prakash', '8608899958', '2019-01-01', '2022-01-01', '8/5', 'remote', '', '2019-07-18 06:14:16'),
(6, 'Rajesh Hom', 'Raj4711', 'Rajesh', '8939644441', '2019-01-01', '2020-01-01', '8/5', 'remote', '', '2019-07-18 06:17:41'),
(7, 'SSSindia (Auditor)', 'SSS4811', 'Arun', '9940067660', '2019-01-01', '2020-01-01', '8/5', 'remote', '', '2019-07-18 06:18:28'),
(8, 'Integratech', 'Int4911', 'Shankar', '9994993082', '2019-01-01', '2020-01-01', '8/5', 'remote', '', '2019-07-18 06:19:01'),
(9, 'Hunt and Badge', 'Hun4911', 'Venkat', '8015102909', '2019-01-01', '2022-01-01', '8/5', 'remote', '', '2019-07-18 06:19:41'),
(10, 'Sun Data Tech', 'Sun5011', 'Suresh', '7826024290', '2019-01-01', '2022-01-01', '8/5', 'remote', '', '2019-07-18 06:20:12'),
(11, 'Prabhat Dairy', 'Pra5111', 'Prabhat', '99999999999', '2019-01-01', '2022-01-01', '8/5', 'remote', '', '2019-07-18 06:21:51'),
(12, 'United Health Care', 'Uni5211', 'United Health Care', '9999999991', '2019-01-01', '2022-01-01', '8/5', 'remote', '', '2019-07-18 06:22:37'),
(13, 'Thermal Syatems and Engineering', 'The5311', 'Ranganathan', '9566955954', '2019-01-01', '2022-01-01', '8/5', 'remote', '', '2019-07-18 06:23:16'),
(14, 'Sun Motors', 'Sun5311', 'Sailesh', '9710543125', '2019-01-01', '2022-01-01', '8/5', 'remote', '', '2019-07-18 06:23:53'),
(15, 'Sterling Holidays Resorts Limited', 'Ste0911', 'Sterling', '9999999999', '2019-07-19', '2020-03-18', '8/5', 'remote', '', '2019-07-19 05:39:50'),
(16, 'Funds India', 'Fun1011', 'Funds India', '9999999999', '2019-07-19', '2020-02-29', '8/5', 'remote', '', '2019-07-19 05:40:28'),
(17, 'City Union Bank', 'Cit1111', 'CUB', '9999999999', '2019-07-01', '2020-05-30', '8/5', 'remote', '', '2019-07-19 05:41:02'),
(18, 'L&T Infotech', 'LN1211', 'L&T Infotech', '9999999999', '2019-07-18', '2020-02-18', '8/5', 'remote', '', '2019-07-19 05:42:40'),
(19, 'Infosys CPC', 'Inf1311', 'Infosys CPC', '9999999999', '2019-07-19', '2020-03-28', '8/5', 'remote', '', '2019-07-19 05:43:11'),
(20, 'Infosys TDS', 'Inf1311', 'Infosys TDS', '9999999999', '2019-07-17', '2020-03-18', '8/5', 'remote', '', '2019-07-19 05:43:35'),
(21, 'Infosys MCA', 'Inf1411', 'Infosys MCA', '9999999999', '2019-07-25', '2020-02-28', '8/5', 'remote', '', '2019-07-19 05:44:06'),
(22, 'Sodexo SVC India Pvt Ltd', 'Sod1411', 'Sodexo', '9999999999', '2019-07-18', '2020-05-22', '8/5', 'remote', '', '2019-07-19 05:44:43'),
(23, 'Ruby', 'Rub5002', 'Ruby', '9999999999', '2019-07-18', '2020-01-31', '8/5', 'remote', '', '2019-07-19 09:20:20'),
(24, 'Gem Hospital', 'Gem0403', 'Gem Hospital', '9999999999', '2019-07-24', '2020-04-24', '8/5', 'remote', '', '2019-07-19 09:34:43'),
(25, 'SRM', 'SRM1003', 'SRM', '9999999999', '2019-07-19', '2020-03-19', '8/5', 'remote', '', '2019-07-19 09:40:17'),
(26, 'CG Police', 'CGP1103', 'CG Police', '9999999999', '2019-07-19', '2020-03-11', '24/7', 'remote', '', '2019-07-19 09:41:09'),
(27, 'VMCH', 'VMC1203', 'VMCH', '9999999999', '2019-07-19', '2020-01-18', '8/5', 'remote', '', '2019-07-19 09:42:58'),
(28, 'Standex', 'Sta1303', 'Standex', '9999999999', '2019-07-19', '2020-01-24', '8/5', 'remote', '', '2019-07-19 09:43:30'),
(29, 'God Tv', 'God1403', 'God Tv', '9999999999', '2019-07-19', '2020-02-20', '8/5', 'remote', '', '2019-07-19 09:44:21'),
(30, 'ABAN', 'ABA1503', 'aban', '9999999999', '2019-07-19', '2020-04-23', '8/5', 'remote', '', '2019-07-19 09:45:05'),
(31, 'GRT', 'GRT1503', 'grt', '9999999999', '2019-07-19', '2020-03-20', '8/5', 'remote', '', '2019-07-19 09:45:42'),
(32, 'IRCS', 'IRC1603', 'ircs', '9999999999', '2019-07-19', '2020-03-31', '8/5', 'remote', '', '2019-07-19 09:46:14'),
(33, 'VS HOSPITAL', 'VSH1703', 'VS HOSPITAL', '9999999999', '2019-07-19', '2020-05-21', '8/5', 'remote', '', '2019-07-19 09:47:06'),
(34, 'Kumaran hospital', 'Kum1803', 'Kumaran hospital', '9999999999', '2019-07-19', '2019-12-31', '8/5', 'remote', '', '2019-07-19 09:48:57'),
(35, 'SUNNYSOFT', 'SUN1903', 'Sunnysoft', '9999999999', '2019-07-19', '2020-05-28', '8/5', 'remote', '', '2019-07-19 09:49:47'),
(36, 'Panimalar Engineering College', 'Pan2103', 'Panimalar', '9999999999', '2019-07-19', '2020-07-31', '8/5', 'remote', '', '2019-07-19 09:51:10'),
(37, 'Redgrape', 'Red3712', 'Redgrape', '9999999999', '2019-07-18', '2019-09-20', '24/7', 'remote', '', '2019-07-22 07:07:17'),
(38, 'Ganges Internationale Pvt Ltd', 'Gan5312', 'Ganges Internationale Pvt Ltd', '9999999999', '2019-07-18', '2020-03-06', '24/7', 'remote', '', '2019-07-22 07:23:09');

-- --------------------------------------------------------

--
-- Table structure for table `client_service`
--

CREATE TABLE `client_service` (
  `id` int(10) NOT NULL,
  `client_ID` varchar(250) DEFAULT NULL,
  `service` varchar(250) DEFAULT NULL,
  `service_id` int(10) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_service`
--

INSERT INTO `client_service` (`id`, `client_ID`, `service`, `service_id`, `created_at`) VALUES
(8, 'CUB5404', 'Avaya Support', 1, '2019-06-25 16:54:36'),
(9, 'CUB5404', 'Altitude Support', 2, '2019-06-25 16:54:36'),
(10, 'AGS5504', 'Avaya Support', 1, '2019-06-25 16:55:16'),
(11, 'AGS5504', 'Martrix Support', 5, '2019-06-25 16:55:16'),
(12, 'TVS5604', 'Avaya Support', 1, '2019-06-25 16:56:51'),
(13, 'TVS5604', 'Firewall Support', 4, '2019-06-25 16:56:51'),
(14, 'TVS5604', 'Security Support', 7, '2019-06-25 16:56:51'),
(15, 'IRC1603', 'Avaya Support', 1, '2019-06-25 16:58:01'),
(16, 'IRC1603', 'Network Support', 3, '2019-06-25 16:58:01'),
(17, 'IRC1603', 'Firewall Support', 4, '2019-06-25 16:58:01'),
(18, 'VMC5403', 'Avaya Support', 1, '2019-07-02 15:54:42'),
(19, 'Fun0504', 'Altitude Support', 2, '2019-07-02 16:05:37'),
(20, 'UHC5510', 'Altitude Support', 2, '2019-07-12 10:55:27'),
(21, 'UHC5510', 'Firewall Support', 4, '2019-07-12 10:55:27'),
(22, 'tes2710', 'Altitude Support', 2, '2019-07-17 10:27:36'),
(23, 'tes2710', 'Network Support', 3, '2019-07-17 10:27:36'),
(24, 'Tir4111', 'Firewall Support', 4, '2019-07-17 23:11:01'),
(25, 'ISO4111', 'Firewall Support', 4, '2019-07-17 23:11:59'),
(26, 'Uni4211', 'Firewall Support', 4, '2019-07-17 23:12:49'),
(27, 'IGe4311', 'Firewall Support', 4, '2019-07-17 23:13:27'),
(28, 'Alt4411', 'Firewall Support', 4, '2019-07-17 23:14:16'),
(29, 'Raj4711', 'Firewall Support', 4, '2019-07-17 23:17:41'),
(30, 'SSS4811', 'Firewall Support', 4, '2019-07-17 23:18:28'),
(31, 'Int4911', 'Firewall Support', 4, '2019-07-17 23:19:01'),
(32, 'Hun4911', 'Firewall Support', 4, '2019-07-17 23:19:41'),
(33, 'Sun5011', 'Firewall Support', 4, '2019-07-17 23:20:12'),
(34, 'Pra5111', 'Firewall Support', 4, '2019-07-17 23:21:51'),
(35, 'Uni5211', 'Firewall Support', 4, '2019-07-17 23:22:37'),
(36, 'The5311', 'Firewall Support', 4, '2019-07-17 23:23:16'),
(37, 'Sun5311', 'Firewall Support', 4, '2019-07-17 23:23:53'),
(38, 'Ste0911', 'Altitude Support', 2, '2019-07-18 22:39:51'),
(39, 'Fun1011', 'Altitude Support', 2, '2019-07-18 22:40:28'),
(40, 'Cit1111', 'Altitude Support', 2, '2019-07-18 22:41:02'),
(41, 'LN1211', 'Altitude Support', 2, '2019-07-18 22:42:40'),
(42, 'Inf1311', 'Altitude Support', 2, '2019-07-18 22:43:11'),
(44, 'Inf1411', 'Altitude Support', 2, '2019-07-18 22:44:06'),
(45, 'Sod1411', 'Altitude Support', 2, '2019-07-18 22:44:43'),
(46, 'Rub5002', 'Network Support', 3, '2019-07-19 02:20:20'),
(47, 'Rub5002', 'Martrix Support', 5, '2019-07-19 02:20:20'),
(48, 'Gem0403', 'Avaya Support', 1, '2019-07-19 02:34:43'),
(49, 'Gem0403', 'Network Support', 3, '2019-07-19 02:34:43'),
(50, 'SRM1003', 'Network Support', 3, '2019-07-19 02:40:17'),
(51, 'CGP1103', 'Altitude Support', 2, '2019-07-19 02:41:09'),
(52, 'VMC1203', 'Avaya Support', 1, '2019-07-19 02:42:58'),
(53, 'Sta1303', 'Avaya Support', 1, '2019-07-19 02:43:30'),
(54, 'God1403', 'Avaya Support', 1, '2019-07-19 02:44:21'),
(55, 'ABA1503', 'Avaya Support', 1, '2019-07-19 02:45:05'),
(56, 'GRT1503', 'Avaya Support', 1, '2019-07-19 02:45:42'),
(58, 'VSH1703', 'Network Support', 3, '2019-07-19 02:47:06'),
(59, 'VSH1703', 'Martrix Support', 5, '2019-07-19 02:47:06'),
(60, 'Kum1803', 'Network Support', 3, '2019-07-19 02:48:58'),
(61, 'SUN1903', 'Network Support', 3, '2019-07-19 02:49:47'),
(62, 'Pan2103', 'Network Support', 3, '2019-07-19 02:51:10'),
(63, 'Red3712', 'Avaya Support', 1, '2019-07-22 00:07:17'),
(64, 'Gan5312', 'Avaya Support', 1, '2019-07-22 00:23:09');

-- --------------------------------------------------------

--
-- Table structure for table `closedtickets`
--

CREATE TABLE `closedtickets` (
  `id` int(10) NOT NULL,
  `clientID` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `severity` varchar(250) NOT NULL,
  `ticketID` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `campaign_ID` varchar(250) DEFAULT NULL,
  `process` varchar(250) NOT NULL,
  `assigned_to` varchar(250) DEFAULT NULL,
  `action` text NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `closed_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `closedtickets`
--

INSERT INTO `closedtickets` (`id`, `clientID`, `subject`, `description`, `severity`, `ticketID`, `status`, `campaign_ID`, `process`, `assigned_to`, `action`, `created_date`, `closed_at`) VALUES
(0, 'TVS5604', 'campaign test', 'test ticket', 'P2', '291132', 'Close', 'Cam1705', '7', 'sakthivel@futurecalls.com', 'Issue Resolved', '2019-06-26 11:29:32', '2019-06-28 12:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `closed_tickets`
--

CREATE TABLE `closed_tickets` (
  `id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `department` varchar(250) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `body` varchar(250) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL,
  `severity` varchar(250) DEFAULT NULL,
  `ticket_id` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `assigned_to` varchar(250) DEFAULT NULL,
  `action_taken` varchar(1000) DEFAULT NULL,
  `info` text,
  `keyword` varchar(250) DEFAULT NULL,
  `file` varchar(250) DEFAULT NULL,
  `closed_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `closed_tickets`
--

INSERT INTO `closed_tickets` (`id`, `customer_name`, `department`, `title`, `body`, `status`, `severity`, `ticket_id`, `created_at`, `assigned_to`, `action_taken`, `info`, `keyword`, `file`, `closed_at`) VALUES
(1, 'Guruprasath', '2', 'GYM MANAGEMENT SOFTWARE', 'eqeqrawerwer5a', 'Close', '1', 'V130330', '2019-01-24 15:13:30', 'pradeep@futurecalls.com', 'software working now. Xamp server installed', 'knowledge based information ', 'voice', 'Pan card.pdf', '2019-01-24 16:28:47'),
(2, 'Pradeep V.Nair', '2', 'GRT  t nager', 'Line noice', 'Close', '1', 'V270150', '2018-12-27 13:27:50', 'pradeep@futurecalls.com', 'test', 'knowledge base search test', 'grt', 'Training_ Academy.pdf', '2019-01-24 16:55:41'),
(3, 'Pradeep V.Nair', '2', 'Gem hospital', 'Avaya installation', 'Close', '1', 'V280109', '2018-12-27 13:28:09', 'pradeep@futurecalls.com', 'test', 'test', 'vote', '', '2019-01-24 16:56:39'),
(4, 'Tamilarasan', '5', 'CRM testing', 'Page redirection is not working properly', 'Close', '2', 'F521131', '2019-01-30 11:52:31', 'guruprasath@futurecalls.com', 'Page redirection is working now. ', 'page redirection changed based on department and position ', 'redirect', 'Rims brochure.pdf', '2019-01-30 11:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `encryption_test`
--

CREATE TABLE `encryption_test` (
  `id` int(10) NOT NULL,
  `number` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `encryption_test`
--

INSERT INTO `encryption_test` (`id`, `number`) VALUES
(1, 'Ym83UWI0THpvVjdXYXl6Smp0T3JWUT09Ojqx/jN2PYqEE+b5/MHhPC6x');

-- --------------------------------------------------------

--
-- Table structure for table `knowledge_base`
--

CREATE TABLE `knowledge_base` (
  `id` int(10) NOT NULL,
  `subject` varchar(250) DEFAULT NULL,
  `description` text,
  `keyword` varchar(250) DEFAULT NULL,
  `file` varchar(250) DEFAULT NULL,
  `version` float DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `knowledge_base`
--

INSERT INTO `knowledge_base` (`id`, `subject`, `description`, `keyword`, `file`, `version`, `created_at`) VALUES
(2, 'Email Test', 'wsfqwrfqwr', 'version', '', 1, '2019-07-02 17:46:49'),
(3, 'Email Test', 'Version auto increment test', 'version', '', 1.1, '2019-07-11 17:09:26'),
(4, 'Knowledge Base Test', 'Knowledge Base Test  for version control', 'voice', 'PHP Web Services.pdf', 1.1, '2019-07-11 17:12:07'),
(5, 'Email Test', 'Version auto increment test', 'demo', '', 1.2, '2019-07-11 17:36:27');

-- --------------------------------------------------------

--
-- Table structure for table `loginhistory`
--

CREATE TABLE `loginhistory` (
  `id` int(10) NOT NULL,
  `username` varchar(250) DEFAULT NULL,
  `ipaddress` varchar(250) DEFAULT NULL,
  `Last_login` datetime DEFAULT NULL,
  `browser` varchar(250) NOT NULL,
  `platform` varchar(250) NOT NULL,
  `version` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loginhistory`
--

INSERT INTO `loginhistory` (`id`, `username`, `ipaddress`, `Last_login`, `browser`, `platform`, `version`) VALUES
(5, 'santhiya@futurecalls.com', '10.10.10.47', '2019-04-02 13:57:07', 'Google Chrome', 'windows', '73.0.3683.86'),
(6, 'manikandan@futurecalls.com', '10.10.10.47', '2019-04-02 17:28:31', 'Google Chrome', 'windows', '73.0.3683.86'),
(8, 'santhiya@futurecalls.com', '10.10.10.47', '2019-04-02 17:45:43', 'Mozilla Firefox', 'windows', '63.0'),
(9, 'santhiya@futurecalls.com', '10.10.10.47', '2019-04-03 11:49:48', 'Google Chrome', 'windows', '73.0.3683.86'),
(10, 'santhiya@futurecalls.com', '10.10.10.47', '2019-04-03 16:21:40', 'Google Chrome', 'windows', '73.0.3683.86'),
(11, 'santhiya@futurecalls.com', '10.10.10.47', '2019-04-03 16:32:21', 'Google Chrome', 'windows', '73.0.3683.86'),
(12, 'santhiya@futurecalls.com', '10.10.10.47', '2019-04-03 16:40:10', 'Google Chrome', 'windows', '73.0.3683.86'),
(13, 'santhiya@futurecalls.com', '10.10.10.47', '2019-04-03 17:39:33', 'Google Chrome', 'windows', '73.0.3683.86'),
(14, 'santhiya@futurecalls.com', '10.10.10.47', '2019-04-08 11:36:57', 'Google Chrome', 'windows', '73.0.3683.86'),
(15, 'santhiya@futurecalls.com', '10.10.10.47', '2019-04-08 12:31:25', 'Google Chrome', 'windows', '73.0.3683.86'),
(16, 'santhiya@futurecalls.com', '10.10.10.47', '2019-04-08 12:40:23', 'Google Chrome', 'windows', '73.0.3683.86'),
(17, 'santhiya@futurecalls.com', '10.10.10.47', '2019-04-09 11:34:38', 'Google Chrome', 'windows', '73.0.3683.103'),
(18, 'santhiya@futurecalls.com', '10.10.10.47', '2019-04-09 11:44:02', 'Google Chrome', 'windows', '73.0.3683.103'),
(19, 'santhiya@futurecalls.com', '10.10.10.47', '2019-04-09 15:34:12', 'Google Chrome', 'windows', '73.0.3683.103'),
(20, 'santhiya@futurecalls.com', '10.10.10.47', '2019-04-10 11:34:58', 'Google Chrome', 'windows', '73.0.3683.103'),
(21, 'santhiya@futurecalls.com', '10.10.10.47', '2019-04-10 13:07:51', 'Google Chrome', 'windows', '73.0.3683.103'),
(22, 'santhiya@futurecalls.com', '10.10.10.47', '2019-04-10 16:09:44', 'Google Chrome', 'windows', '73.0.3683.103'),
(23, 'santhiya@futurecalls.com', '10.10.10.47', '2019-04-11 10:23:44', 'Google Chrome', 'windows', '73.0.3683.103'),
(24, 'santhiya@futurecalls.com', '10.10.10.47', '2019-04-11 10:45:47', 'Google Chrome', 'windows', '73.0.3683.103'),
(25, 'santhiya@futurecalls.com', '10.10.10.47', '2019-04-11 11:14:20', 'Google Chrome', 'windows', '73.0.3683.103'),
(26, 'santhiya@futurecalls.com', '10.10.10.47', '2019-04-15 11:31:28', 'Google Chrome', 'windows', '73.0.3683.103'),
(27, 'santhiya@futurecalls.com', '10.10.10.47', '2019-04-22 15:20:50', 'Google Chrome', 'windows', '73.0.3683.103'),
(28, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-10 10:05:00', 'Google Chrome', 'windows', '74.0.3729.131'),
(29, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-10 14:42:07', 'Google Chrome', 'windows', '74.0.3729.131'),
(30, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-13 10:05:42', 'Google Chrome', 'windows', '74.0.3729.131'),
(31, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-13 10:35:55', 'Google Chrome', 'windows', '74.0.3729.131'),
(32, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-13 10:40:39', 'Google Chrome', 'windows', '74.0.3729.131'),
(33, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-13 16:06:44', 'Google Chrome', 'windows', '74.0.3729.131'),
(34, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-13 17:46:58', 'Google Chrome', 'windows', '74.0.3729.131'),
(35, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-14 14:29:51', 'Google Chrome', 'windows', '74.0.3729.131'),
(36, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-15 12:22:23', 'Google Chrome', 'windows', '74.0.3729.131'),
(37, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-15 15:59:48', 'Google Chrome', 'windows', '74.0.3729.131'),
(38, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-16 12:31:25', 'Google Chrome', 'windows', '74.0.3729.131'),
(39, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-17 11:30:23', 'Google Chrome', 'windows', '74.0.3729.157'),
(40, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-20 11:10:53', 'Google Chrome', 'windows', '74.0.3729.157'),
(41, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-20 11:37:07', 'Google Chrome', 'windows', '74.0.3729.157'),
(42, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-20 15:26:23', 'Google Chrome', 'windows', '74.0.3729.157'),
(43, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-20 15:27:26', 'Google Chrome', 'windows', '74.0.3729.157'),
(44, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-20 15:49:16', 'Google Chrome', 'windows', '74.0.3729.157'),
(45, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-23 11:00:26', 'Google Chrome', 'windows', '74.0.3729.157'),
(46, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-23 12:14:44', 'Google Chrome', 'windows', '74.0.3729.169'),
(47, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-24 10:23:16', 'Google Chrome', 'windows', '74.0.3729.169'),
(48, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-24 11:44:23', 'Google Chrome', 'windows', '74.0.3729.169'),
(49, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-27 10:43:05', 'Google Chrome', 'windows', '74.0.3729.169'),
(50, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-29 11:21:36', 'Google Chrome', 'windows', '74.0.3729.169'),
(51, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-29 17:07:34', 'Google Chrome', 'windows', '74.0.3729.169'),
(52, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-30 13:53:49', 'Google Chrome', 'windows', '74.0.3729.169'),
(53, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-30 14:03:12', 'Google Chrome', 'windows', '74.0.3729.169'),
(54, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-30 15:44:17', 'Google Chrome', 'windows', '74.0.3729.169'),
(55, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-30 15:45:30', 'Google Chrome', 'windows', '74.0.3729.169'),
(56, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-30 15:45:56', 'Google Chrome', 'windows', '74.0.3729.169'),
(57, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-30 15:52:01', 'Google Chrome', 'windows', '74.0.3729.169'),
(58, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-30 15:53:35', 'Google Chrome', 'windows', '74.0.3729.169'),
(59, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-30 15:55:37', 'Google Chrome', 'windows', '74.0.3729.169'),
(60, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-31 11:20:00', 'Google Chrome', 'windows', '74.0.3729.169'),
(61, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-31 11:34:16', 'Google Chrome', 'windows', '74.0.3729.169'),
(62, 'santhiya@futurecalls.com', '10.10.10.47', '2019-05-31 12:32:45', 'Google Chrome', 'windows', '74.0.3729.169'),
(63, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-01 10:05:10', 'Google Chrome', 'windows', '74.0.3729.169'),
(64, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-03 16:26:43', 'Google Chrome', 'windows', '74.0.3729.169'),
(65, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 11:40:57', 'Google Chrome', 'windows', '74.0.3729.169'),
(66, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 11:41:59', 'Google Chrome', 'windows', '74.0.3729.169'),
(67, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 11:45:44', 'Google Chrome', 'windows', '74.0.3729.169'),
(68, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 11:54:19', 'Google Chrome', 'windows', '74.0.3729.169'),
(69, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 12:22:39', 'Google Chrome', 'windows', '74.0.3729.169'),
(70, 'sakthivel@futurecalls.com', '10.10.10.47', '2019-06-04 12:23:21', 'Google Chrome', 'windows', '74.0.3729.169'),
(71, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 12:24:26', 'Google Chrome', 'windows', '74.0.3729.169'),
(72, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 12:24:54', 'Google Chrome', 'windows', '74.0.3729.169'),
(73, 'sakthivel@futurecalls.com', '10.10.10.47', '2019-06-04 12:25:12', 'Google Chrome', 'windows', '74.0.3729.169'),
(74, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 12:26:09', 'Google Chrome', 'windows', '74.0.3729.169'),
(75, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 12:32:52', 'Google Chrome', 'windows', '74.0.3729.169'),
(76, 'sakthivel@futurecalls.com', '10.10.10.47', '2019-06-04 12:33:12', 'Google Chrome', 'windows', '74.0.3729.169'),
(77, 'veera@futurecalls.com', '10.10.10.47', '2019-06-04 12:35:38', 'Google Chrome', 'windows', '74.0.3729.169'),
(78, 'sakthivel@futurecalls.com', '10.10.10.47', '2019-06-04 12:37:04', 'Google Chrome', 'windows', '74.0.3729.169'),
(79, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 12:43:03', 'Google Chrome', 'windows', '74.0.3729.169'),
(80, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 12:44:48', 'Google Chrome', 'windows', '74.0.3729.169'),
(81, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 12:45:43', 'Google Chrome', 'windows', '74.0.3729.169'),
(82, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 12:47:01', 'Google Chrome', 'windows', '74.0.3729.169'),
(83, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 12:48:21', 'Google Chrome', 'windows', '74.0.3729.169'),
(84, 'sakthivel@futurecalls.com', '10.10.10.47', '2019-06-04 12:48:53', 'Google Chrome', 'windows', '74.0.3729.169'),
(85, 'veera@futurecalls.com', '10.10.10.47', '2019-06-04 12:49:13', 'Google Chrome', 'windows', '74.0.3729.169'),
(86, 'shahinsha@futurecalls.com', '10.10.10.47', '2019-06-04 12:52:48', 'Google Chrome', 'windows', '74.0.3729.169'),
(87, 'shahinsha@futurecalls.com', '10.10.10.47', '2019-06-04 12:53:23', 'Google Chrome', 'windows', '74.0.3729.169'),
(88, 'shahinsha@futurecalls.com', '10.10.10.47', '2019-06-04 12:53:32', 'Google Chrome', 'windows', '74.0.3729.169'),
(89, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 12:55:44', 'Google Chrome', 'windows', '74.0.3729.169'),
(90, 'sakthivel@futurecalls.com', '10.10.10.47', '2019-06-04 12:56:29', 'Google Chrome', 'windows', '74.0.3729.169'),
(91, 'veera@futurecalls.com', '10.10.10.47', '2019-06-04 12:57:00', 'Google Chrome', 'windows', '74.0.3729.169'),
(92, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 13:53:42', 'Google Chrome', 'windows', '74.0.3729.169'),
(93, 'sakthivel@futurecalls.com', '10.10.10.47', '2019-06-04 13:54:15', 'Google Chrome', 'windows', '74.0.3729.169'),
(94, 'veera@futurecalls.com', '10.10.10.47', '2019-06-04 13:56:19', 'Google Chrome', 'windows', '74.0.3729.169'),
(95, 'veera@futurecalls.com', '10.10.10.47', '2019-06-04 14:01:06', 'Google Chrome', 'windows', '74.0.3729.169'),
(96, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 14:05:24', 'Google Chrome', 'windows', '74.0.3729.169'),
(97, 'veera@futurecalls.com', '10.10.10.47', '2019-06-04 14:05:53', 'Google Chrome', 'windows', '74.0.3729.169'),
(98, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 14:06:37', 'Google Chrome', 'windows', '74.0.3729.169'),
(99, 'veera@futurecalls.com', '10.10.10.47', '2019-06-04 14:07:01', 'Google Chrome', 'windows', '74.0.3729.169'),
(100, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 14:09:24', 'Google Chrome', 'windows', '74.0.3729.169'),
(101, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 14:24:58', 'Google Chrome', 'windows', '74.0.3729.169'),
(102, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 14:32:03', 'Google Chrome', 'windows', '74.0.3729.169'),
(103, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 15:21:51', 'Google Chrome', 'windows', '74.0.3729.169'),
(104, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 16:32:32', 'Google Chrome', 'windows', '74.0.3729.169'),
(105, 'veera@futurecalls.com', '10.10.10.47', '2019-06-04 16:35:58', 'Google Chrome', 'windows', '74.0.3729.169'),
(106, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 17:36:54', 'Google Chrome', 'windows', '74.0.3729.169'),
(107, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 17:44:28', 'Google Chrome', 'windows', '74.0.3729.169'),
(108, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 17:46:30', 'Google Chrome', 'windows', '74.0.3729.169'),
(109, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 17:46:52', 'Google Chrome', 'windows', '74.0.3729.169'),
(110, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 17:47:20', 'Google Chrome', 'windows', '74.0.3729.169'),
(111, 'veera@futurecalls.com', '10.10.10.47', '2019-06-04 17:47:42', 'Google Chrome', 'windows', '74.0.3729.169'),
(112, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 17:50:42', 'Google Chrome', 'windows', '74.0.3729.169'),
(113, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 18:09:23', 'Google Chrome', 'windows', '74.0.3729.169'),
(114, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 18:11:33', 'Google Chrome', 'windows', '74.0.3729.169'),
(115, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-04 18:12:01', 'Google Chrome', 'windows', '74.0.3729.169'),
(116, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-06 11:30:39', 'Google Chrome', 'windows', '74.0.3729.169'),
(117, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-07 10:55:49', 'Google Chrome', 'windows', '75.0.3770.80'),
(118, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-07 15:46:16', 'Google Chrome', 'windows', '75.0.3770.80'),
(119, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-07 15:48:14', 'Google Chrome', 'windows', '75.0.3770.80'),
(120, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-07 16:04:04', 'Google Chrome', 'windows', '75.0.3770.80'),
(121, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-10 12:08:16', 'Google Chrome', 'windows', '75.0.3770.80'),
(122, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-10 15:54:14', 'Google Chrome', 'windows', '75.0.3770.80'),
(123, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-10 15:54:56', 'Google Chrome', 'windows', '75.0.3770.80'),
(124, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-10 15:57:26', 'Google Chrome', 'windows', '75.0.3770.80'),
(125, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-10 15:58:55', 'Google Chrome', 'windows', '75.0.3770.80'),
(126, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-10 16:07:53', 'Google Chrome', 'windows', '75.0.3770.80'),
(127, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-11 10:12:32', 'Google Chrome', 'windows', '75.0.3770.80'),
(128, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-11 13:02:58', 'Google Chrome', 'windows', '75.0.3770.80'),
(129, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-11 15:28:44', 'Google Chrome', 'windows', '75.0.3770.80'),
(130, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-12 14:56:34', 'Google Chrome', 'windows', '75.0.3770.80'),
(131, 'veera@futurecalls.com', '10.10.10.47', '2019-06-12 15:28:10', 'Google Chrome', 'windows', '75.0.3770.80'),
(132, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-12 15:29:28', 'Google Chrome', 'windows', '75.0.3770.80'),
(133, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-12 15:30:49', 'Google Chrome', 'windows', '75.0.3770.80'),
(134, 'veera@futurecalls.com', '10.10.10.47', '2019-06-12 15:32:21', 'Google Chrome', 'windows', '75.0.3770.80'),
(135, 'sakthivel@futurecalls.com', '10.10.10.47', '2019-06-12 15:32:41', 'Google Chrome', 'windows', '75.0.3770.80'),
(136, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-12 15:40:34', 'Google Chrome', 'windows', '75.0.3770.80'),
(137, 'veera@futurecalls.com', '10.10.10.47', '2019-06-12 15:40:53', 'Google Chrome', 'windows', '75.0.3770.80'),
(138, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-12 15:45:36', 'Google Chrome', 'windows', '75.0.3770.80'),
(139, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-12 15:45:58', 'Google Chrome', 'windows', '75.0.3770.80'),
(140, 'veera@futurecalls.com', '10.10.10.47', '2019-06-12 15:46:12', 'Google Chrome', 'windows', '75.0.3770.80'),
(141, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-12 16:21:49', 'Google Chrome', 'windows', '75.0.3770.80'),
(142, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-14 10:41:54', 'Google Chrome', 'windows', '75.0.3770.80'),
(143, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-14 15:08:37', 'Google Chrome', 'windows', '75.0.3770.80'),
(144, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-14 15:29:03', 'Google Chrome', 'windows', '75.0.3770.80'),
(145, 'demo@futurecalls.com', '10.10.10.47', '2019-06-14 16:45:04', 'Google Chrome', 'windows', '75.0.3770.80'),
(146, 'demo@futurecalls.com', '10.10.10.47', '2019-06-14 16:45:36', 'Google Chrome', 'windows', '75.0.3770.80'),
(147, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-15 10:43:34', 'Google Chrome', 'windows', '75.0.3770.90'),
(148, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-17 10:05:15', 'Google Chrome', 'windows', '75.0.3770.90'),
(149, 'ags@gmail.com', '10.10.10.47', '2019-06-17 15:36:54', 'Google Chrome', 'windows', '75.0.3770.90'),
(150, 'ags@gmail.com', '10.10.10.47', '2019-06-17 15:37:22', 'Google Chrome', 'windows', '75.0.3770.90'),
(151, 'ags@gmail.com', '10.10.10.47', '2019-06-17 17:44:10', 'Google Chrome', 'windows', '75.0.3770.90'),
(152, 'ags@gmail.com', '10.10.10.47', '2019-06-17 17:46:08', 'Google Chrome', 'windows', '75.0.3770.90'),
(153, 'ags@gmail.com', '10.10.10.47', '2019-06-17 17:51:08', 'Google Chrome', 'windows', '75.0.3770.90'),
(154, 'ags@gmail.com', '10.10.10.47', '2019-06-17 17:53:10', 'Google Chrome', 'windows', '75.0.3770.90'),
(155, 'ags@gmail.com', '10.10.10.47', '2019-06-17 17:53:46', 'Google Chrome', 'windows', '75.0.3770.90'),
(156, 'ags@gmail.com', '10.10.10.47', '2019-06-17 17:55:53', 'Google Chrome', 'windows', '75.0.3770.90'),
(157, 'ags@gmail.com', '10.10.10.47', '2019-06-17 17:57:08', 'Google Chrome', 'windows', '75.0.3770.90'),
(158, 'ags@gmail.com', '10.10.10.47', '2019-06-17 17:58:13', 'Google Chrome', 'windows', '75.0.3770.90'),
(159, 'ags@gmail.com', '10.10.10.47', '2019-06-17 18:01:27', 'Google Chrome', 'windows', '75.0.3770.90'),
(160, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-17 18:01:53', 'Google Chrome', 'windows', '75.0.3770.90'),
(161, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-17 18:02:48', 'Google Chrome', 'windows', '75.0.3770.90'),
(162, 'ags@gmail.com', '10.10.10.47', '2019-06-17 18:03:01', 'Google Chrome', 'windows', '75.0.3770.90'),
(163, 'veera@futurecalls.com', '10.10.10.47', '2019-06-17 18:04:37', 'Google Chrome', 'windows', '75.0.3770.90'),
(164, 'veera@futurecalls.com', '10.10.10.47', '2019-06-17 18:05:36', 'Google Chrome', 'windows', '75.0.3770.90'),
(165, 'ags@gmail.com', '10.10.10.47', '2019-06-17 18:06:25', 'Google Chrome', 'windows', '75.0.3770.90'),
(166, 'demo@futurecalls.com', '10.10.10.47', '2019-06-17 18:06:44', 'Google Chrome', 'windows', '75.0.3770.90'),
(167, 'ags@gmail.com', '10.10.10.47', '2019-06-17 18:07:20', 'Google Chrome', 'windows', '75.0.3770.90'),
(168, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-18 09:52:25', 'Google Chrome', 'windows', '75.0.3770.90'),
(169, 'ags@gmail.com', '10.10.10.47', '2019-06-18 10:25:59', 'Google Chrome', 'windows', '75.0.3770.90'),
(170, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-18 11:01:12', 'Google Chrome', 'windows', '75.0.3770.90'),
(171, 'demo@futurecalls.com', '10.10.10.47', '2019-06-18 11:08:04', 'Google Chrome', 'windows', '75.0.3770.90'),
(172, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-18 11:41:51', 'Google Chrome', 'windows', '75.0.3770.90'),
(173, 'ags@gmail.com', '10.10.10.47', '2019-06-18 12:03:54', 'Google Chrome', 'windows', '75.0.3770.90'),
(174, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-18 15:07:54', 'Google Chrome', 'windows', '75.0.3770.90'),
(175, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-19 10:45:59', 'Google Chrome', 'windows', '75.0.3770.100'),
(176, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-19 11:05:46', 'Google Chrome', 'windows', '75.0.3770.100'),
(177, 'ags@gmail.com', '10.10.10.47', '2019-06-19 11:36:58', 'Google Chrome', 'windows', '75.0.3770.100'),
(178, 'support@futurecalls.com', '10.10.10.47', '2019-06-19 12:18:05', 'Google Chrome', 'windows', '75.0.3770.100'),
(179, 'support@futurecalls.com', '10.10.10.47', '2019-06-19 12:19:06', 'Google Chrome', 'windows', '75.0.3770.100'),
(180, 'support@futurecalls.com', '10.10.10.47', '2019-06-19 12:20:29', 'Google Chrome', 'windows', '75.0.3770.100'),
(181, 'support@futurecalls.com', '10.10.10.47', '2019-06-19 12:21:10', 'Google Chrome', 'windows', '75.0.3770.100'),
(182, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-19 14:45:24', 'Google Chrome', 'windows', '75.0.3770.100'),
(183, 'support@futurecalls.com', '10.10.10.47', '2019-06-19 17:02:11', 'Google Chrome', 'windows', '75.0.3770.100'),
(184, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-20 11:30:36', 'Google Chrome', 'windows', '75.0.3770.100'),
(185, 'pradeep@futurecalls.com', '10.10.10.47', '2019-06-20 14:19:29', 'Google Chrome', 'windows', '75.0.3770.100'),
(186, 'pradeep@futurecalls.com', '10.10.10.47', '2019-06-20 14:19:58', 'Google Chrome', 'windows', '75.0.3770.100'),
(187, 'ags@gmail.com', '10.10.10.47', '2019-06-20 14:26:25', 'Google Chrome', 'windows', '75.0.3770.100'),
(188, 'pradeep@futurecalls.com', '10.10.10.47', '2019-06-20 14:27:43', 'Google Chrome', 'windows', '75.0.3770.100'),
(189, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-20 14:53:09', 'Google Chrome', 'windows', '75.0.3770.100'),
(190, 'pradeep@futurecalls.com', '10.10.10.47', '2019-06-20 15:10:36', 'Google Chrome', 'windows', '75.0.3770.100'),
(191, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-20 15:12:15', 'Google Chrome', 'windows', '75.0.3770.100'),
(192, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-20 15:52:10', 'Google Chrome', 'windows', '75.0.3770.100'),
(193, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-20 16:13:01', 'Google Chrome', 'windows', '75.0.3770.100'),
(194, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-20 16:16:10', 'Google Chrome', 'windows', '75.0.3770.100'),
(195, 'pradeep@futurecalls.com', '10.10.10.47', '2019-06-20 16:42:16', 'Google Chrome', 'windows', '75.0.3770.100'),
(196, 'pradeep@futurecalls.com', '10.10.10.47', '2019-06-21 10:14:12', 'Google Chrome', 'windows', '75.0.3770.100'),
(197, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-21 10:14:56', 'Google Chrome', 'windows', '75.0.3770.100'),
(198, 'ags@gmail.com', '10.10.10.47', '2019-06-21 12:06:22', 'Google Chrome', 'windows', '75.0.3770.100'),
(199, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-21 12:13:09', 'Google Chrome', 'windows', '75.0.3770.100'),
(200, 'manikandan@futurecalls.com', '10.10.10.47', '2019-06-21 12:44:54', 'Google Chrome', 'windows', '75.0.3770.100'),
(201, 'manikandan@futurecalls.com', '10.10.10.47', '2019-06-21 12:46:04', 'Google Chrome', 'windows', '75.0.3770.100'),
(202, 'manikandan@futurecalls.com', '10.10.10.47', '2019-06-21 12:48:15', 'Google Chrome', 'windows', '75.0.3770.100'),
(203, 'pradeep@futurecalls.com', '10.10.10.47', '2019-06-21 12:49:24', 'Google Chrome', 'windows', '75.0.3770.100'),
(204, 'ags@gmail.com', '10.10.10.47', '2019-06-21 12:49:41', 'Google Chrome', 'windows', '75.0.3770.100'),
(205, 'test@futurecalls.com', '10.10.10.47', '2019-06-21 12:49:58', 'Google Chrome', 'windows', '75.0.3770.100'),
(206, 'support@futurecalls.com', '10.10.10.47', '2019-06-21 12:50:21', 'Google Chrome', 'windows', '75.0.3770.100'),
(207, 'manikandan@futurecalls.com', '10.10.10.47', '2019-06-21 12:52:04', 'Google Chrome', 'windows', '75.0.3770.100'),
(208, 'manikandan@futurecalls.com', '10.10.10.47', '2019-06-21 12:55:58', 'Google Chrome', 'windows', '75.0.3770.100'),
(209, 'manikandan@futurecalls.com', '10.10.10.47', '2019-06-21 12:57:50', 'Google Chrome', 'windows', '75.0.3770.100'),
(210, 'manikandan@futurecalls.com', '10.10.10.47', '2019-06-21 12:59:15', 'Google Chrome', 'windows', '75.0.3770.100'),
(211, 'support@futurecalls.com', '10.10.10.47', '2019-06-21 13:12:07', 'Google Chrome', 'windows', '75.0.3770.100'),
(212, 'support@futurecalls.com', '10.10.10.47', '2019-06-21 14:47:31', 'Google Chrome', 'windows', '75.0.3770.100'),
(213, 'manikandan@futurecalls.com', '10.10.10.47', '2019-06-21 16:45:46', 'Google Chrome', 'windows', '75.0.3770.100'),
(214, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-21 16:47:40', 'Google Chrome', 'windows', '75.0.3770.100'),
(215, 'pradeep@futurecalls.com', '10.10.10.47', '2019-06-21 16:48:27', 'Google Chrome', 'windows', '75.0.3770.100'),
(216, 'support@futurecalls.com', '10.10.10.47', '2019-06-21 16:49:33', 'Google Chrome', 'windows', '75.0.3770.100'),
(217, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-21 17:49:19', 'Google Chrome', 'windows', '75.0.3770.100'),
(218, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-24 10:21:34', 'Google Chrome', 'windows', '75.0.3770.100'),
(219, 'pradeep@futurecalls.com', '10.10.10.47', '2019-06-24 10:31:17', 'Google Chrome', 'windows', '75.0.3770.100'),
(220, 'support@futurecalls.com', '10.10.10.47', '2019-06-24 10:31:32', 'Google Chrome', 'windows', '75.0.3770.100'),
(221, 'pradeep@futurecalls.com', '10.10.10.47', '2019-06-24 10:33:32', 'Google Chrome', 'windows', '75.0.3770.100'),
(222, 'pradeep@futurecalls.com', '10.10.10.47', '2019-06-24 10:34:28', 'Google Chrome', 'windows', '75.0.3770.100'),
(223, 'support@futurecalls.com', '10.10.10.47', '2019-06-24 13:02:03', 'Google Chrome', 'windows', '75.0.3770.100'),
(224, 'support@futurecalls.com', '10.10.10.47', '2019-06-24 14:34:33', 'Google Chrome', 'windows', '75.0.3770.100'),
(225, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-24 17:02:36', 'Google Chrome', 'windows', '75.0.3770.100'),
(226, 'support@futurecalls.com', '10.10.10.47', '2019-06-24 17:40:38', 'Google Chrome', 'windows', '75.0.3770.100'),
(227, 'ags@gmail.com', '10.10.10.47', '2019-06-24 17:41:02', 'Google Chrome', 'windows', '75.0.3770.100'),
(228, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-25 12:26:06', 'Google Chrome', 'windows', '75.0.3770.100'),
(229, 'support@futurecalls.com', '10.10.10.47', '2019-06-25 14:25:28', 'Google Chrome', 'windows', '75.0.3770.100'),
(230, 'ags@gmail.com', '10.10.10.47', '2019-06-25 14:28:55', 'Google Chrome', 'windows', '75.0.3770.100'),
(231, 'test@futurecalls.com', '10.10.10.47', '2019-06-25 14:38:13', 'Google Chrome', 'windows', '75.0.3770.100'),
(232, 'test@futurecalls.com', '10.10.10.47', '2019-06-25 14:38:41', 'Google Chrome', 'windows', '75.0.3770.100'),
(233, 'test@futurecalls.com', '10.10.10.47', '2019-06-25 14:40:20', 'Google Chrome', 'windows', '75.0.3770.100'),
(234, 'support@futurecalls.com', '10.10.10.47', '2019-06-25 14:50:23', 'Google Chrome', 'windows', '75.0.3770.100'),
(235, 'test@futurecalls.com', '10.10.10.47', '2019-06-25 15:40:08', 'Google Chrome', 'windows', '75.0.3770.100'),
(236, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-25 16:53:35', 'Google Chrome', 'windows', '75.0.3770.100'),
(237, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-26 10:38:22', 'Google Chrome', 'windows', '75.0.3770.100'),
(238, 'support@futurecalls.com', '10.10.10.47', '2019-06-26 11:25:49', 'Google Chrome', 'windows', '75.0.3770.100'),
(239, 'support@futurecalls.com', '10.10.10.47', '2019-06-26 11:26:18', 'Google Chrome', 'windows', '75.0.3770.100'),
(240, 'tvslogistics@gmail.com', '10.10.10.47', '2019-06-26 11:27:38', 'Google Chrome', 'windows', '75.0.3770.100'),
(241, 'tvslogistics@gmail.com', '10.10.10.47', '2019-06-26 11:28:06', 'Google Chrome', 'windows', '75.0.3770.100'),
(242, 'test@futurecalls.com', '10.10.10.47', '2019-06-26 11:30:36', 'Google Chrome', 'windows', '75.0.3770.100'),
(243, 'test@futurecalls.com', '10.10.10.47', '2019-06-26 11:31:03', 'Google Chrome', 'windows', '75.0.3770.100'),
(244, 'pradeep@futurecalls.com', '10.10.10.47', '2019-06-26 11:36:27', 'Google Chrome', 'windows', '75.0.3770.100'),
(245, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-26 11:37:09', 'Google Chrome', 'windows', '75.0.3770.100'),
(246, 'pradeep@futurecalls.com', '10.10.10.47', '2019-06-26 11:39:22', 'Google Chrome', 'windows', '75.0.3770.100'),
(247, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-26 14:55:57', 'Google Chrome', 'windows', '75.0.3770.100'),
(248, 'pradeep@futurecalls.com', '10.10.10.47', '2019-06-26 14:56:25', 'Google Chrome', 'windows', '75.0.3770.100'),
(249, 'support@futurecalls.com', '10.10.10.47', '2019-06-26 15:11:35', 'Google Chrome', 'windows', '75.0.3770.100'),
(250, 'test@futurecalls.com', '10.10.10.47', '2019-06-26 15:24:50', 'Google Chrome', 'windows', '75.0.3770.100'),
(251, 'pradeep@futurecalls.com', '10.10.10.47', '2019-06-26 15:45:27', 'Google Chrome', 'windows', '75.0.3770.100'),
(252, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-26 16:37:46', 'Google Chrome', 'windows', '75.0.3770.100'),
(253, 'pradeep@futurecalls.com', '10.10.10.47', '2019-06-26 16:39:39', 'Google Chrome', 'windows', '75.0.3770.100'),
(254, 'support@futurecalls.com', '10.10.10.47', '2019-06-26 16:40:55', 'Google Chrome', 'windows', '75.0.3770.100'),
(255, 'pradeep@futurecalls.com', '10.10.10.47', '2019-06-27 12:46:22', 'Google Chrome', 'windows', '75.0.3770.100'),
(256, 'sakthivel@futurecalls.com', '10.10.10.47', '2019-06-27 15:50:37', 'Google Chrome', 'windows', '75.0.3770.100'),
(257, 'sakthivel@futurecalls.com', '10.10.10.47', '2019-06-27 15:51:06', 'Google Chrome', 'windows', '75.0.3770.100'),
(258, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-28 10:31:50', 'Google Chrome', 'windows', '75.0.3770.100'),
(259, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-28 10:47:48', 'Google Chrome', 'windows', '75.0.3770.100'),
(260, 'sakthivel@futurecalls.com', '10.10.10.47', '2019-06-28 11:02:05', 'Google Chrome', 'windows', '75.0.3770.100'),
(261, 'sakthivel@futurecalls.com', '10.10.10.47', '2019-06-28 11:06:46', 'Google Chrome', 'windows', '75.0.3770.100'),
(262, 'santhiya@futurecalls.com', '10.10.10.47', '2019-06-28 11:15:52', 'Google Chrome', 'windows', '75.0.3770.100'),
(263, 'sakthivel@futurecalls.com', '10.10.10.47', '2019-06-28 11:27:26', 'Google Chrome', 'windows', '75.0.3770.100'),
(264, 'pradeep@futurecalls.com', '10.10.10.47', '2019-06-28 12:52:09', 'Google Chrome', 'windows', '75.0.3770.100'),
(265, 'sakthivel@futurecalls.com', '10.10.10.47', '2019-06-29 10:27:50', 'Google Chrome', 'windows', '75.0.3770.100'),
(266, 'pradeep@futurecalls.com', '10.10.10.47', '2019-06-29 10:58:17', 'Google Chrome', 'windows', '75.0.3770.100'),
(267, 'sakthivel@futurecalls.com', '10.10.10.47', '2019-06-29 11:08:49', 'Google Chrome', 'windows', '75.0.3770.100'),
(268, 'tvslogistics@gmail.com', '10.10.10.47', '2019-06-29 11:39:24', 'Google Chrome', 'windows', '75.0.3770.100'),
(269, 'pradeep@futurecalls.com', '10.10.10.47', '2019-06-29 12:13:46', 'Google Chrome', 'windows', '75.0.3770.100'),
(270, 'sakthivel@futurecalls.com', '10.10.10.47', '2019-06-29 12:24:00', 'Google Chrome', 'windows', '75.0.3770.100'),
(271, 'sakthivel@futurecalls.com', '10.10.10.47', '2019-06-29 12:44:01', 'Google Chrome', 'windows', '75.0.3770.100'),
(272, 'sakthivel@futurecalls.com', '10.10.10.47', '2019-06-29 12:45:22', 'Google Chrome', 'windows', '75.0.3770.100'),
(273, 'sakthivel@futurecalls.com', '10.10.10.47', '2019-06-29 13:22:50', 'Google Chrome', 'windows', '75.0.3770.100'),
(274, 'tvslogistics@gmail.com', '10.10.10.47', '2019-06-29 13:31:13', 'Google Chrome', 'windows', '75.0.3770.100'),
(275, 'santhiya@futurecalls.com', '10.10.10.47', '2019-07-01 09:55:28', 'Google Chrome', 'windows', '75.0.3770.100'),
(276, 'sakthivel@futurecalls.com', '10.10.10.47', '2019-07-01 10:50:36', 'Google Chrome', 'windows', '75.0.3770.100'),
(277, 'helpdesk@futurecalls.com', '10.10.10.47', '2019-07-02 10:14:05', 'Google Chrome', 'windows', '75.0.3770.100'),
(278, 'sakthivel@futurecalls.com', '10.10.10.47', '2019-07-02 10:35:40', 'Google Chrome', 'windows', '75.0.3770.100'),
(279, 'santhiya@futurecalls.com', '10.10.10.47', '2019-07-02 11:41:16', 'Google Chrome', 'windows', '75.0.3770.100'),
(280, 'santhiya@futurecalls.com', '10.10.10.47', '2019-07-03 10:04:31', 'Google Chrome', 'windows', '75.0.3770.100'),
(281, 'sakthivel@futurecalls.com', '10.10.10.47', '2019-07-03 12:18:46', 'Google Chrome', 'windows', '75.0.3770.100'),
(282, 'sakthivel@futurecalls.com', '10.10.10.47', '2019-07-04 14:28:35', 'Google Chrome', 'windows', '75.0.3770.100'),
(283, 'santhiya@futurecalls.com', '10.10.10.47', '2019-07-05 12:29:28', 'Google Chrome', 'windows', '75.0.3770.100'),
(284, 'pradeep@futurecalls.com', '10.10.10.47', '2019-07-05 13:52:08', 'Google Chrome', 'windows', '75.0.3770.100'),
(285, 'santhiya@futurecalls.com', '10.10.10.47', '2019-07-08 10:22:41', 'Google Chrome', 'windows', '75.0.3770.100'),
(286, 'santhiya@futurecalls.com', '10.10.10.47', '2019-07-08 10:25:24', 'Google Chrome', 'windows', '75.0.3770.100'),
(287, 'santhiya@futurecalls.com', '10.10.10.47', '2019-07-08 10:31:02', 'Google Chrome', 'windows', '75.0.3770.100'),
(288, 'pradeep@futurecalls.com', '10.10.10.47', '2019-07-08 10:37:27', 'Google Chrome', 'windows', '75.0.3770.100'),
(289, 'santhiya@futurecalls.com', '10.10.10.47', '2019-07-08 10:41:29', 'Google Chrome', 'windows', '75.0.3770.100'),
(290, 'pradeep@futurecalls.com', '10.10.10.47', '2019-07-08 11:06:52', 'Google Chrome', 'windows', '75.0.3770.100'),
(291, 'santhiya@futurecalls.com', '10.10.10.47', '2019-07-08 11:13:30', 'Google Chrome', 'windows', '75.0.3770.100'),
(292, 'pradeep@futurecalls.com', '10.10.10.47', '2019-07-08 12:07:47', 'Google Chrome', 'windows', '75.0.3770.100'),
(293, 'santhiya@futurecalls.com', '10.10.10.47', '2019-07-09 10:12:23', 'Google Chrome', 'windows', '75.0.3770.100'),
(294, 'santhiya@futurecalls.com', '10.10.10.47', '2019-07-09 12:24:55', 'Google Chrome', 'windows', '75.0.3770.100'),
(295, 'santhiya@futurecalls.com', '10.10.10.47', '2019-07-10 09:57:02', 'Google Chrome', 'windows', '75.0.3770.100'),
(296, 'santhiya@futurecalls.com', '10.10.10.47', '2019-07-10 14:51:00', 'Google Chrome', 'windows', '75.0.3770.100'),
(297, 'santhiya@futurecalls.com', '169.254.8.59', '2019-07-11 10:36:03', 'Google Chrome', 'windows', '75.0.3770.100'),
(298, 'santhiya@futurecalls.com', '10.10.10.47', '2019-07-12 10:47:06', 'Google Chrome', 'windows', '75.0.3770.100'),
(299, 'santhiya@futurecalls.com', '10.10.10.47', '2019-07-12 10:47:49', 'Google Chrome', 'windows', '75.0.3770.100'),
(300, 'pradeep@futurecalls.com', '10.10.10.47', '2019-07-12 16:58:54', 'Google Chrome', 'windows', '75.0.3770.100'),
(301, 'pradeep@futurecalls.com', '10.10.10.47', '2019-07-12 17:00:36', 'Google Chrome', 'windows', '75.0.3770.100'),
(302, 'santhiya@futurecalls.com', '10.10.10.47', '2019-07-12 17:04:31', 'Google Chrome', 'windows', '75.0.3770.100'),
(303, 'pradeep@futurecalls.com', '10.10.10.47', '2019-07-12 17:05:46', 'Google Chrome', 'windows', '75.0.3770.100'),
(304, 'santhiya@futurecalls.com', '10.10.10.47', '2019-07-15 11:24:41', 'Google Chrome', 'windows', '75.0.3770.100'),
(305, 'santhiya@futurecalls.com', '10.10.10.47', '2019-07-16 09:56:08', 'Google Chrome', 'windows', '75.0.3770.100'),
(306, 'santhiya@futurecalls.com', '10.10.10.47', '2019-07-16 11:09:47', 'Google Chrome', 'windows', '75.0.3770.100'),
(307, 'santhiya@futurecalls.com', '10.10.10.47', '2019-07-16 11:37:41', 'Google Chrome', 'windows', '75.0.3770.100'),
(308, 'santhiya@futurecalls.com', '10.10.10.47', '2019-07-16 14:55:54', 'Google Chrome', 'windows', '75.0.3770.100'),
(309, 'santhiya@futurecalls.com', '10.10.10.47', '2019-07-16 15:42:53', 'Google Chrome', 'windows', '75.0.3770.100'),
(310, 'veera@futurecalls.com', '10.10.10.105', '2019-07-17 10:27:01', 'Google Chrome', 'windows', '75.0.3770.100'),
(311, 'veera@futurecalls.com', '10.10.10.107', '2019-07-17 10:48:03', 'Google Chrome', 'windows', '75.0.3770.142'),
(312, 'veera@futurecalls.com', '10.10.10.107', '2019-07-17 10:54:01', 'Google Chrome', 'windows', '75.0.3770.142'),
(313, 'veera@futurecalls.com', '10.10.10.107', '2019-07-17 11:03:41', 'Google Chrome', 'windows', '75.0.3770.142'),
(314, 'veera@futurecalls.com', '10.10.10.107', '2019-07-17 11:07:44', 'Google Chrome', 'windows', '75.0.3770.142'),
(315, 'manikandan@futurecalls.com', '10.10.10.107', '2019-07-17 11:09:27', 'Google Chrome', 'windows', '75.0.3770.142'),
(316, 'veera@futurecalls.com', '10.10.10.107', '2019-07-18 10:15:34', 'Google Chrome', 'windows', '75.0.3770.142'),
(317, 'veera@futurecalls.com', '10.10.10.107', '2019-07-18 10:40:00', 'Google Chrome', 'windows', '75.0.3770.142'),
(318, 'manikandan@futurecalls.com', '10.10.10.107', '2019-07-18 10:47:12', 'Google Chrome', 'windows', '75.0.3770.142'),
(319, 'veera@futurecalls.com', '10.10.10.107', '2019-07-18 10:50:34', 'Google Chrome', 'windows', '75.0.3770.142'),
(320, 'manikandan@futurecalls.com', '10.10.10.107', '2019-07-18 10:57:29', 'Google Chrome', 'windows', '75.0.3770.142'),
(321, 'santhiya@futurecalls.com', '10.10.10.107', '2019-07-18 11:00:20', 'Google Chrome', 'windows', '75.0.3770.142'),
(322, 'veera@futurecalls.com', '10.10.10.107', '2019-07-18 12:09:59', 'Google Chrome', 'windows', '75.0.3770.142'),
(323, 'veera@futurecalls.com', '10.10.10.107', '2019-07-18 14:57:34', 'Google Chrome', 'windows', '75.0.3770.142'),
(324, 'veera@futurecalls.com', '10.10.10.107', '2019-07-18 15:13:42', 'Google Chrome', 'windows', '75.0.3770.142'),
(325, 'pradeep@futurecalls.com', '10.10.10.107', '2019-07-18 16:23:20', 'Google Chrome', 'windows', '75.0.3770.142'),
(326, 'pradeep@futurecalls.com', '10.10.10.107', '2019-07-18 20:00:52', 'Google Chrome', 'windows', '75.0.3770.142'),
(327, 'pradeep@futurecalls.com', '10.10.10.107', '2019-07-19 09:45:25', 'Google Chrome', 'windows', '75.0.3770.142'),
(328, 'ags@gmail.com', '10.10.10.107', '2019-07-19 10:44:45', 'Google Chrome', 'windows', '75.0.3770.142'),
(329, 'ags@gmail.com', '10.10.10.107', '2019-07-19 10:45:34', 'Google Chrome', 'windows', '75.0.3770.142'),
(330, 'sakthivel@futurecalls.com', '10.10.10.107', '2019-07-19 10:46:41', 'Google Chrome', 'windows', '75.0.3770.142'),
(331, 'sakthivel@futurecalls.com', '10.10.10.107', '2019-07-19 10:50:11', 'Google Chrome', 'windows', '75.0.3770.142'),
(332, 'santhiya@futurecalls.com', '10.10.10.107', '2019-07-19 11:05:37', 'Google Chrome', 'windows', '75.0.3770.142'),
(333, 'veera@futurecalls.com', '10.10.10.107', '2019-07-19 11:05:38', 'Google Chrome', 'windows', '75.0.3770.142'),
(334, 'manikandan@futurecalls.com', '10.10.10.107', '2019-07-19 12:32:28', 'Google Chrome', 'windows', '75.0.3770.142'),
(335, 'veera@futurecalls.com', '10.10.10.107', '2019-07-19 12:32:45', 'Google Chrome', 'windows', '75.0.3770.142'),
(336, 'veera@futurecalls.com', '10.10.10.107', '2019-07-19 13:28:13', 'Google Chrome', 'windows', '75.0.3770.142'),
(337, 'pradeep@futurecalls.com', '10.10.10.107', '2019-07-19 13:28:19', 'Google Chrome', 'windows', '75.0.3770.142'),
(338, 'veera@futurecalls.com', '10.10.10.107', '2019-07-19 13:30:19', 'Google Chrome', 'windows', '75.0.3770.142'),
(339, 'veera@futurecalls.com', '10.10.10.107', '2019-07-19 13:42:16', 'Google Chrome', 'windows', '75.0.3770.142'),
(340, 'veera@futurecalls.com', '10.10.10.107', '2019-07-19 14:49:05', 'Google Chrome', 'windows', '75.0.3770.142'),
(341, 'santhiya@futurecalls.com', '10.10.10.107', '2019-07-19 14:50:47', 'Google Chrome', 'windows', '75.0.3770.142'),
(342, 'sakthivel@futurecalls.com', '10.10.10.107', '2019-07-19 15:57:03', 'Google Chrome', 'windows', '75.0.3770.142'),
(343, 'veera@futurecalls.com', '10.10.10.107', '2019-07-19 16:00:03', 'Google Chrome', 'windows', '75.0.3770.142'),
(344, 'veera@futurecalls.com', '10.10.10.107', '2019-07-19 16:38:25', 'Google Chrome', 'windows', '75.0.3770.142'),
(345, 'santhiya@futurecalls.com', '10.10.10.107', '2019-07-19 16:53:22', 'Google Chrome', 'windows', '75.0.3770.142'),
(346, 'veera@futurecalls.com', '10.10.10.107', '2019-07-20 09:45:37', 'Google Chrome', 'windows', '75.0.3770.142'),
(347, 'veera@futurecalls.com', '10.10.10.107', '2019-07-20 13:27:24', 'Google Chrome', 'windows', '75.0.3770.142'),
(348, 'santhiya@futurecalls.com', '10.10.10.107', '2019-07-22 10:37:49', 'Google Chrome', 'windows', '75.0.3770.142'),
(349, 'veera@futurecalls.com', '10.10.10.107', '2019-07-22 10:48:44', 'Google Chrome', 'windows', '75.0.3770.142'),
(350, 'veera@futurecalls.com', '10.10.10.107', '2019-07-22 11:45:42', 'Google Chrome', 'windows', '75.0.3770.142'),
(351, 'veera@futurecalls.com', '10.10.10.107', '2019-07-22 12:30:50', 'Google Chrome', 'windows', '75.0.3770.142'),
(352, 'pradeep@futurecalls.com', '10.10.10.107', '2019-07-22 13:40:21', 'Google Chrome', 'windows', '75.0.3770.142'),
(353, 'venkatesan@futurecalls.com', '10.10.10.107', '2019-07-22 13:40:41', 'Google Chrome', 'windows', '75.0.3770.142'),
(354, 'venkatesan@futurecalls.com', '10.10.10.107', '2019-07-22 13:41:06', 'Google Chrome', 'windows', '75.0.3770.142'),
(355, 'venkatesan@futurecalls.com', '10.10.10.107', '2019-07-22 13:42:34', 'Google Chrome', 'windows', '75.0.3770.142'),
(356, 'pradeep@futurecalls.com', '10.10.10.107', '2019-07-22 13:45:08', 'Google Chrome', 'windows', '75.0.3770.142'),
(357, 'pradeep@futurecalls.com', '10.10.10.107', '2019-07-22 14:17:57', 'Google Chrome', 'windows', '75.0.3770.142'),
(358, 'tamilarasan@futurecalls.com', '10.10.10.107', '2019-07-22 14:22:49', 'Google Chrome', 'windows', '75.0.3770.142'),
(359, 'pradeep@futurecalls.com', '10.10.10.107', '2019-07-22 14:24:14', 'Google Chrome', 'windows', '75.0.3770.142'),
(360, 'pradeep@futurecalls.com', '10.10.10.107', '2019-07-22 14:37:07', 'Google Chrome', 'windows', '75.0.3770.142'),
(361, 'venkatesan@futurecalls.com', '10.10.10.107', '2019-07-22 14:43:01', 'Google Chrome', 'windows', '75.0.3770.142'),
(362, 'pradeep@futurecalls.com', '10.10.10.107', '2019-07-22 14:45:29', 'Google Chrome', 'windows', '75.0.3770.142'),
(363, 'pradeep@futurecalls.com', '10.10.10.107', '2019-07-22 15:01:08', 'Google Chrome', 'windows', '75.0.3770.142'),
(364, 'pradeep@futurecalls.com', '10.10.10.107', '2019-07-22 15:04:12', 'Google Chrome', 'windows', '75.0.3770.142'),
(365, 'pradeep@futurecalls.com', '10.10.10.107', '2019-07-22 15:52:40', 'Google Chrome', 'windows', '75.0.3770.142'),
(366, 'veera@futurecalls.com', '10.10.10.107', '2019-07-22 15:52:48', 'Google Chrome', 'windows', '75.0.3770.142'),
(367, 'pradeep@futurecalls.com', '10.10.10.107', '2019-07-22 15:52:59', 'Google Chrome', 'windows', '75.0.3770.142'),
(368, 'veera@futurecalls.com', '10.10.10.107', '2019-07-22 16:10:55', 'Google Chrome', 'windows', '75.0.3770.142'),
(369, 'pradeep@futurecalls.com', '10.10.10.107', '2019-07-22 16:13:32', 'Google Chrome', 'windows', '75.0.3770.142'),
(370, 'pradeep@futurecalls.com', '10.10.10.107', '2019-07-22 16:26:11', 'Google Chrome', 'windows', '75.0.3770.142'),
(371, 'pradeep@futurecalls.com', '10.10.10.107', '2019-07-22 17:26:08', 'Google Chrome', 'windows', '75.0.3770.142'),
(372, 'santhiya@futurecalls.com', '10.10.10.107', '2019-07-22 17:34:23', 'Google Chrome', 'windows', '75.0.3770.142'),
(373, 'pradeep@futurecalls.com', '10.10.10.107', '2019-07-23 09:27:40', 'Google Chrome', 'windows', '75.0.3770.142'),
(374, 'veera@futurecalls.com', '10.10.10.107', '2019-07-23 09:28:11', 'Google Chrome', 'windows', '75.0.3770.142'),
(375, 'veera@futurecalls.com', '10.10.10.107', '2019-07-23 09:55:20', 'Google Chrome', 'windows', '75.0.3770.142'),
(376, 'pradeep@futurecalls.com', '10.10.10.107', '2019-07-23 09:58:29', 'Google Chrome', 'windows', '75.0.3770.142'),
(377, 'tamilarasan@futurecalls.com', '10.10.10.107', '2019-07-23 10:01:06', 'Google Chrome', 'windows', '75.0.3770.142'),
(378, 'tamilarasan@futurecalls.com', '10.10.10.107', '2019-07-23 10:02:36', 'Google Chrome', 'windows', '75.0.3770.142'),
(379, 'veera@futurecalls.com', '10.10.10.107', '2019-07-23 10:09:27', 'Google Chrome', 'windows', '75.0.3770.142'),
(380, 'tamilarasan@futurecalls.com', '10.10.10.107', '2019-07-23 10:10:47', 'Google Chrome', 'windows', '75.0.3770.142'),
(381, 'tamilarasan@futurecalls.com', '10.10.10.107', '2019-07-23 10:12:11', 'Google Chrome', 'windows', '75.0.3770.142'),
(382, 'tamilarasan@futurecalls.com', '10.10.10.107', '2019-07-23 10:12:33', 'Google Chrome', 'windows', '75.0.3770.142'),
(383, 'pradeep@futurecalls.com', '10.10.10.107', '2019-07-23 10:15:01', 'Google Chrome', 'windows', '75.0.3770.142'),
(384, 'sagar@futurecalls.com', '10.10.10.107', '2019-07-23 10:43:26', 'Google Chrome', 'windows', '75.0.3770.142'),
(385, 'sagar@futurecalls.com', '10.10.10.107', '2019-07-23 10:43:57', 'Google Chrome', 'windows', '75.0.3770.142'),
(386, 'veera@futurecalls.com', '10.10.10.107', '2019-07-23 11:17:05', 'Google Chrome', 'windows', '75.0.3770.142'),
(387, 'veera@futurecalls.com', '10.10.10.107', '2019-07-23 11:19:33', 'Google Chrome', 'windows', '75.0.3770.142'),
(388, 'pradeep@futurecalls.com', '10.10.10.107', '2019-07-23 11:19:41', 'Google Chrome', 'windows', '75.0.3770.142'),
(389, 'manikandan@futurecalls.com', '10.10.10.107', '2019-07-23 11:24:54', 'Google Chrome', 'windows', '75.0.3770.142'),
(390, 'veera@futurecalls.com', '10.10.10.107', '2019-07-23 11:26:27', 'Google Chrome', 'windows', '75.0.3770.142'),
(391, 'santhiya@futurecalls.com', '10.10.10.107', '2019-07-23 12:02:14', 'Google Chrome', 'windows', '75.0.3770.142'),
(392, 'pradeep@futurecalls.com', '10.10.10.107', '2019-07-23 12:16:44', 'Google Chrome', 'windows', '75.0.3770.142'),
(393, 'venkatesan@futurecalls.com', '10.10.10.107', '2019-07-23 12:35:56', 'Google Chrome', 'windows', '75.0.3770.142'),
(394, 'santhiya@futurecalls.com', '10.10.10.107', '2019-07-23 12:46:44', 'Google Chrome', 'windows', '75.0.3770.142'),
(395, 'veera@futurecalls.com', '10.10.10.107', '2019-07-23 13:16:04', 'Google Chrome', 'windows', '75.0.3770.142'),
(396, 'venkatesan@futurecalls.com', '10.10.10.107', '2019-07-23 13:46:23', 'Google Chrome', 'windows', '75.0.3770.142'),
(397, 'pradeep@futurecalls.com', '10.10.10.107', '2019-07-23 14:29:31', 'Google Chrome', 'windows', '75.0.3770.142'),
(398, 'sakthivel@futurecalls.com', '10.10.10.107', '2019-07-23 15:12:27', 'Google Chrome', 'windows', '75.0.3770.142'),
(399, 'pradeep@futurecalls.com', '10.10.10.107', '2019-07-23 15:22:20', 'Google Chrome', 'windows', '75.0.3770.142'),
(400, 'sagar@futurecalls.com', '10.10.10.107', '2019-07-23 15:37:54', 'Google Chrome', 'windows', '75.0.3770.142');

-- --------------------------------------------------------

--
-- Table structure for table `notification_master`
--

CREATE TABLE `notification_master` (
  `id` int(10) NOT NULL,
  `activity` varchar(250) DEFAULT NULL,
  `helpdesk_notification` varchar(250) DEFAULT NULL,
  `customer_notification` varchar(250) DEFAULT NULL,
  `email_message` text,
  `sms_message` text,
  `email_message1` text NOT NULL,
  `sms_message1` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_master`
--

INSERT INTO `notification_master` (`id`, `activity`, `helpdesk_notification`, `customer_notification`, `email_message`, `sms_message`, `email_message1`, `sms_message1`, `created_at`) VALUES
(1, 'Create', 'email', 'email', 'Dear Customer, your request has been received. Our support executive will contact you soon. your Ticket number is', 'Dear Customer,  your request has been received. Your Ticket Number is ', 'Dear Team, New Ticket received  from ', 'New ticket received from ', '2018-12-29 01:18:52'),
(2, 'Update', 'email', 'email', 'Your Ticket status Updated', 'Dear customer,  Your Ticket status updated please verify.   Ticket  Number', 'Ticket has been updated. ', 'Ticket has been updated. ', '2018-12-31 04:05:35'),
(3, 'Close', 'email', 'email', 'Thanks for using our portal. Your issue has been resolved Ticket Id:', 'Your issue has been resolved Ticket Id:', 'Ticket  has been Closed Ticket Id: ', 'Dear Team,  this ticket has been closed. Ticket Id: ', '2018-12-31 04:25:37'),
(4, 'Re-Assign', 'email', 'email', 'Your Ticket will be reassigned to ', 'Dear Customer,  Your Ticket Will be re assigned ', 'Dear Team, New Ticket assigned from', 'Deat Team, New ticket Assigned to you', '2018-12-31 04:30:16'),
(5, 'SLA Violations', 'email', 'email', 'Dear Customer, Please allow us some time shall soon update you on this. Ticket Id: ', 'Dear Customer, This ticket has been extended SLA limit. Please allow us some time shall soon update you on this. Ticket Id: ', 'This ticket will be due on today', 'Dear Team, This ticket will be due on today. Because the SLA limit is ended today. ', '2018-12-31 04:35:39');

-- --------------------------------------------------------

--
-- Table structure for table `outbound_campaign`
--

CREATE TABLE `outbound_campaign` (
  `id` int(11) NOT NULL,
  `campaign_id` int(10) NOT NULL,
  `callscript` varchar(1000) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `age` int(10) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `remarks` varchar(500) NOT NULL,
  `assigning` varchar(255) NOT NULL,
  `call_status` varchar(255) NOT NULL,
  `call_date` varchar(255) DEFAULT NULL,
  `call_time` varchar(255) DEFAULT NULL,
  `attempt` varchar(250) DEFAULT NULL,
  `log` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outbound_campaign`
--

INSERT INTO `outbound_campaign` (`id`, `campaign_id`, `callscript`, `name`, `email`, `mobile`, `age`, `gender`, `city`, `remarks`, `assigning`, `call_status`, `call_date`, `call_time`, `attempt`, `log`) VALUES
(1, 41, 'hello good morning welcome to futurecalls technology', 'kumar', 'test@gmail.com', '9632587412', 25, 'male', 'chennai', 'test', '', '', NULL, NULL, NULL, '2019-06-28 05:19:33'),
(2, 41, 'hello good morning welcome to futurecalls technology', 'saran', 'green@gmail.com', '9632587413', 26, 'male', 'mumbai', 'test', '', '', NULL, NULL, NULL, '2019-06-28 05:19:33'),
(3, 41, 'hello good morning welcome to futurecalls technology', 'raga', 'loss@gmail.com', '9632587414', 27, 'male', 'trichy', 'test', '', '', NULL, NULL, NULL, '2019-06-28 05:19:33'),
(4, 41, 'hello good morning welcome to futurecalls technology', 'rohin', 'high@gmail.com', '9632587415', 28, 'male', 'kumbakkonam', 'test', '', '', NULL, NULL, NULL, '2019-06-28 05:19:33'),
(5, 41, 'hello good morning welcome to futurecalls technology', 'vijay', 'kilo@gmail.com', '9632587416', 29, 'male', 'madurai', 'test', '', '', NULL, NULL, NULL, '2019-06-28 05:19:33'),
(6, 41, 'hello good morning welcome to futurecalls technology', 'kishore', 'feature@gmail.com', '9632587417', 30, 'male', 'himalaya', 'test', '', '', NULL, NULL, NULL, '2019-06-28 05:19:33'),
(7, 41, 'hello good morning welcome to futurecalls technology', 'ram', 'ram@gmail.com', '9632587418', 31, 'male', 'salem', 'test', '', '', NULL, NULL, NULL, '2019-06-28 05:19:33'),
(8, 41, 'hello good morning welcome to futurecalls technology', 'venkat', 'venkat@gmail.com', '9632587419', 32, 'male', 'kerala', 'test', '', '', NULL, NULL, NULL, '2019-06-28 05:19:34'),
(9, 41, 'hello good morning welcome to futurecalls technology', 'manoj', 'manoj@gmail.com', '9632587420', 33, 'male', 'andra', 'test', '', '', NULL, NULL, NULL, '2019-06-28 05:19:34'),
(10, 41, 'hello good morning welcome to futurecalls technology', 'joseph', 'joseph@gmail.com', '9632587421', 34, 'male', 'kashmir', 'test', '', '', NULL, NULL, NULL, '2019-06-28 05:19:34'),
(11, 41, 'hello good morning welcome to futurecalls technology', 'suresh', 'suresh@gmail.com', '9632587422', 35, 'male', 'manipal', 'test', '', '', NULL, NULL, NULL, '2019-06-28 05:19:34'),
(12, 41, 'hello good morning welcome to futurecalls technology', 'loki', 'loki@gmail.com', '9632587423', 36, 'male', 'idikii', 'test', '', '', NULL, NULL, NULL, '2019-06-28 05:19:34'),
(13, 41, 'hello good morning welcome to futurecalls technology', 'nesan', 'nesan@gmail.com', '9632587424', 37, 'male', 'munnar', 'test', '', '', NULL, NULL, NULL, '2019-06-28 05:19:34'),
(14, 41, 'hello good morning welcome to futurecalls technology', 'siva', 'siva@gmail.com', '9632587425', 38, 'male', 'chengalpattu', 'test', '', '', NULL, NULL, NULL, '2019-06-28 05:19:34'),
(15, 41, 'hello good morning welcome to futurecalls technology', 'feros', 'feros@gmail.com', '9632587426', 39, 'male', 'aathur', 'test', '', '', NULL, NULL, NULL, '2019-06-28 05:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `outbound_history`
--

CREATE TABLE `outbound_history` (
  `id` int(11) NOT NULL,
  `campaign_id` int(10) NOT NULL,
  `outboundrow_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `call_status` varchar(255) NOT NULL,
  `call_date` varchar(255) NOT NULL,
  `call_time` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `attempt` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outbound_history`
--

INSERT INTO `outbound_history` (`id`, `campaign_id`, `outboundrow_id`, `email`, `call_status`, `call_date`, `call_time`, `remarks`, `attempt`) VALUES
(21, 0, 0, '', 'Call Later', '', '', 'test call', 1),
(22, 0, 0, '', 'Not Responding', '', '', 'test call', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_temp`
--

CREATE TABLE `password_reset_temp` (
  `id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(250) NOT NULL,
  `expDate` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_reset_temp`
--

INSERT INTO `password_reset_temp` (`id`, `email`, `token`, `expDate`) VALUES
(1, 'santhiya@futurecalls.com', '768e78024aa8fdb9b8fe87be86f64745e13c25e829', '2019-05-14 10:36:45'),
(2, 'santhiya@futurecalls.com', '768e78024aa8fdb9b8fe87be86f6474533fd74f081', '2019-07-17 11:11:27'),
(3, 'manikandan@futurecalls.com', '768e78024aa8fdb9b8fe87be86f647452699aeaa2a', '2019-07-17 12:01:31');

-- --------------------------------------------------------

--
-- Table structure for table `rolebased_user`
--

CREATE TABLE `rolebased_user` (
  `id` int(10) NOT NULL,
  `client_name` varchar(250) DEFAULT NULL,
  `role` varchar(250) DEFAULT NULL,
  `total_user` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rolebased_user`
--

INSERT INTO `rolebased_user` (`id`, `client_name`, `role`, `total_user`, `created_at`) VALUES
(3, 'futurecalls', 'Administrator', '3', '2019-05-31 11:59:07'),
(4, 'futurecalls', 'Service Head', '7', '2019-05-31 11:59:07'),
(5, 'futurecalls', 'Account Manager', '4', '2019-05-31 11:59:08'),
(6, 'futurecalls', 'Client Administrator', '2', '2019-05-31 11:59:08'),
(7, 'test', 'Administrator', '10', '2019-06-03 16:27:16'),
(8, 'demo', 'Administrator', '5', '2019-06-03 16:53:34'),
(9, 'futurecalls', 'Administrator', '2', '2019-06-03 16:59:36'),
(10, 'futurecalls', 'Administrator', '2', '2019-06-03 17:01:32'),
(11, 'Futurecalls', 'Administrator', '2', '2019-06-03 17:07:31'),
(12, 'Futurecalls', 'Administrator', '2', '2019-06-03 17:08:49'),
(13, 'Futurecalls', 'Administrator', '2', '2019-06-03 17:12:54'),
(14, 'Futurecalls', 'Administrator', '2', '2019-06-06 11:31:06'),
(15, 'Futurecalls', 'Administrator', '3', '2019-06-21 16:46:28'),
(16, 'Futurecalls', 'Administrator', '5', '2019-07-17 22:29:57'),
(17, 'Futurecalls', 'Administrator', '4', '2019-07-22 22:56:12');

-- --------------------------------------------------------

--
-- Table structure for table `role_master`
--

CREATE TABLE `role_master` (
  `id` int(10) NOT NULL,
  `role` varchar(250) DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_master`
--

INSERT INTO `role_master` (`id`, `role`, `created`) VALUES
(1, 'Administrator', '2019-05-16 12:49:54'),
(2, 'Client Administrator', '2019-05-16 12:50:52'),
(3, 'Account Manager', '2019-05-16 12:50:59'),
(4, 'Service Head', '2019-05-16 12:51:08'),
(5, 'Manager', '2019-05-16 12:53:39'),
(6, 'Team leader', '2019-05-16 12:55:17'),
(7, 'L1 support', '2019-05-16 12:55:51'),
(8, 'L2 support', '2019-05-16 12:56:02'),
(9, 'L3 support', '2019-05-16 12:56:13'),
(10, 'Specialist', '2019-05-16 12:56:25'),
(11, 'Project Manager', '2019-05-16 12:56:40'),
(12, 'Customer', '2019-05-16 12:56:51'),
(13, 'Service desk', '2019-05-16 12:57:07'),
(15, 'Super Admin', '2019-06-11 16:32:45');

-- --------------------------------------------------------

--
-- Table structure for table `service_master`
--

CREATE TABLE `service_master` (
  `id` int(11) NOT NULL,
  `servicename` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `log` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_master`
--

INSERT INTO `service_master` (`id`, `servicename`, `description`, `log`) VALUES
(1, 'Avaya Support', 'contact center support', '0000-00-00 00:00:00'),
(2, 'Altitude Support', 'Contact center support', '0000-00-00 00:00:00'),
(3, 'Network Support', 'switches,cabling and network support', '0000-00-00 00:00:00'),
(4, 'Firewall Support', 'dwsfduqwrfy', '0000-00-00 00:00:00'),
(5, 'Martrix Support', 'contact center software', '0000-00-00 00:00:00'),
(6, 'Contaque Support', 'contact center software', '0000-00-00 00:00:00'),
(7, 'Security Support', 'Information security', '0000-00-00 00:00:00'),
(8, 'FMS Support', 'Onsite support', '0000-00-00 00:00:00'),
(9, 'Telecom Support', 'tata ILL support', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sla_config`
--

CREATE TABLE `sla_config` (
  `id` int(10) NOT NULL,
  `client_ID` varchar(250) DEFAULT NULL,
  `process` varchar(250) NOT NULL,
  `severity` varchar(250) DEFAULT NULL,
  `l1` varchar(250) DEFAULT NULL,
  `l2` varchar(250) DEFAULT NULL,
  `l3` varchar(250) DEFAULT NULL,
  `l4` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sla_config`
--

INSERT INTO `sla_config` (`id`, `client_ID`, `process`, `severity`, `l1`, `l2`, `l3`, `l4`, `created_at`) VALUES
(1, 'Tir4111', '4', 'P1', '4', '8', '12', '16', '2019-07-17 23:58:16'),
(2, 'Tir4111', '4', 'P2', '4', '8', '12', '16', '2019-07-17 23:58:16'),
(3, 'Tir4111', '4', 'P3', '4', '8', '12', '16', '2019-07-17 23:58:16'),
(4, 'Tir4111', '4', 'P4', '4', '8', '12', '16', '2019-07-17 23:58:16'),
(5, 'ISO4111', '4', 'P1', '4', '8', '12', '16', '2019-07-17 23:58:40'),
(6, 'ISO4111', '4', 'P2', '4', '8', '12', '16', '2019-07-17 23:58:40'),
(7, 'ISO4111', '4', 'P3', '4', '8', '12', '16', '2019-07-17 23:58:40'),
(8, 'ISO4111', '4', 'P4', '4', '8', '12', '16', '2019-07-17 23:58:40'),
(9, 'Uni4211', '4', 'P1', '4', '8', '12', '16', '2019-07-17 23:59:05'),
(10, 'Uni4211', '4', 'P2', '4', '8', '12', '16', '2019-07-17 23:59:05'),
(11, 'Uni4211', '4', 'P3', '4', '8', '12', '16', '2019-07-17 23:59:05'),
(12, 'Uni4211', '4', 'P4', '4', '8', '12', '16', '2019-07-17 23:59:05'),
(13, 'IGe4311', '4', 'P1', '4', '8', '12', '16', '2019-07-17 23:59:31'),
(14, 'IGe4311', '4', 'P2', '4', '8', '12', '16', '2019-07-17 23:59:31'),
(15, 'IGe4311', '4', 'P3', '4', '8', '12', '16', '2019-07-17 23:59:31'),
(16, 'IGe4311', '4', 'P4', '4', '8', '12', '16', '2019-07-17 23:59:31'),
(17, 'Alt4411', '4', 'P1', '4', '8', '12', '16', '2019-07-17 23:59:54'),
(18, 'Alt4411', '4', 'P2', '4', '8', '12', '16', '2019-07-17 23:59:54'),
(19, 'Alt4411', '4', 'P3', '4', '8', '12', '16', '2019-07-17 23:59:54'),
(20, 'Alt4411', '4', 'P4', '4', '8', '12', '16', '2019-07-17 23:59:54'),
(21, 'Raj4711', '4', 'P1', '4', '8', '12', '16', '2019-07-18 00:00:15'),
(22, 'Raj4711', '4', 'P2', '4', '8', '12', '16', '2019-07-18 00:00:15'),
(23, 'Raj4711', '4', 'P3', '4', '8', '12', '16', '2019-07-18 00:00:15'),
(24, 'Raj4711', '4', 'P4', '4', '8', '12', '16', '2019-07-18 00:00:15'),
(25, 'SSS4811', '4', 'P1', '4', '8', '12', '16', '2019-07-18 00:00:33'),
(26, 'SSS4811', '4', 'P2', '4', '8', '12', '16', '2019-07-18 00:00:33'),
(27, 'SSS4811', '4', 'P3', '4', '8', '12', '16', '2019-07-18 00:00:33'),
(28, 'SSS4811', '4', 'P4', '4', '8', '12', '16', '2019-07-18 00:00:33'),
(29, 'Int4911', '4', 'P1', '4', '8', '12', '16', '2019-07-18 00:00:55'),
(30, 'Int4911', '4', 'P2', '4', '8', '12', '16', '2019-07-18 00:00:55'),
(31, 'Int4911', '4', 'P3', '4', '8', '12', '16', '2019-07-18 00:00:55'),
(32, 'Int4911', '4', 'P4', '4', '8', '12', '16', '2019-07-18 00:00:55'),
(33, 'Hun4911', '4', 'P1', '4', '8', '12', '16', '2019-07-18 00:01:14'),
(34, 'Hun4911', '4', 'P2', '4', '8', '12', '16', '2019-07-18 00:01:14'),
(35, 'Hun4911', '4', 'P3', '4', '8', '12', '16', '2019-07-18 00:01:14'),
(36, 'Hun4911', '4', 'P4', '4', '8', '12', '16', '2019-07-18 00:01:14'),
(37, 'Sun5011', '4', 'P1', '4', '8', '12', '16', '2019-07-18 00:01:35'),
(38, 'Sun5011', '4', 'P2', '4', '8', '12', '16', '2019-07-18 00:01:35'),
(39, 'Sun5011', '4', 'P3', '4', '8', '12', '16', '2019-07-18 00:01:35'),
(40, 'Sun5011', '4', 'P4', '4', '8', '12', '16', '2019-07-18 00:01:35'),
(41, 'Pra5111', '4', 'P1', '4', '8', '12', '16', '2019-07-18 00:01:55'),
(42, 'Pra5111', '4', 'P2', '4', '8', '12', '16', '2019-07-18 00:01:55'),
(43, 'Pra5111', '4', 'P3', '4', '8', '12', '16', '2019-07-18 00:01:55'),
(44, 'Pra5111', '4', 'P4', '4', '8', '12', '16', '2019-07-18 00:01:55'),
(45, 'Uni5211', '4', 'P1', '4', '8', '12', '16', '2019-07-18 00:02:17'),
(46, 'Uni5211', '4', 'P2', '4', '8', '12', '16', '2019-07-18 00:02:17'),
(47, 'Uni5211', '4', 'P3', '4', '8', '12', '16', '2019-07-18 00:02:17'),
(48, 'Uni5211', '4', 'P4', '4', '8', '12', '16', '2019-07-18 00:02:17'),
(49, 'The5311', '4', 'P1', '4', '8', '12', '16', '2019-07-18 00:02:38'),
(50, 'The5311', '4', 'P2', '4', '8', '12', '16', '2019-07-18 00:02:38'),
(51, 'The5311', '4', 'P3', '4', '8', '12', '16', '2019-07-18 00:02:38'),
(52, 'The5311', '4', 'P4', '4', '8', '12', '16', '2019-07-18 00:02:38'),
(53, 'Sun5311', '4', 'P1', '4', '8', '12', '16', '2019-07-18 00:02:59'),
(54, 'Sun5311', '4', 'P2', '4', '8', '12', '16', '2019-07-18 00:02:59'),
(55, 'Sun5311', '4', 'P3', '4', '8', '12', '16', '2019-07-18 00:02:59'),
(56, 'Sun5311', '4', 'P4', '4', '8', '12', '16', '2019-07-18 00:02:59'),
(57, 'Ste0911', '2', 'P1', '4', '8', '12', '16', '2019-07-18 23:01:03'),
(58, 'Ste0911', '2', 'P2', '4', '8', '12', '16', '2019-07-18 23:01:03'),
(59, 'Ste0911', '2', 'P3', '4', '8', '12', '16', '2019-07-18 23:01:03'),
(60, 'Ste0911', '2', 'P4', '4', '8', '12', '16', '2019-07-18 23:01:03'),
(61, 'Fun1011', '2', 'P1', '4', '8', '12', '16', '2019-07-18 23:01:41'),
(62, 'Fun1011', '2', 'P2', '4', '8', '12', '16', '2019-07-18 23:01:41'),
(63, 'Fun1011', '2', 'P3', '4', '8', '12', '16', '2019-07-18 23:01:41'),
(64, 'Fun1011', '2', 'P4', '4', '8', '12', '16', '2019-07-18 23:01:41'),
(65, 'Cit1111', '2', 'P1', '4', '8', '12', '16', '2019-07-18 23:02:15'),
(66, 'Cit1111', '2', 'P2', '4', '8', '12', '16', '2019-07-18 23:02:15'),
(67, 'Cit1111', '2', 'P3', '4', '8', '12', '16', '2019-07-18 23:02:15'),
(68, 'Cit1111', '2', 'P4', '4', '8', '12', '16', '2019-07-18 23:02:15'),
(69, 'Inf1311', '2', 'P1', '4', '8', '12', '16', '2019-07-18 23:05:37'),
(70, 'Inf1311', '2', 'P2', '4', '8', '12', '16', '2019-07-18 23:05:37'),
(71, 'Inf1311', '2', 'P3', '4', '8', '12', '16', '2019-07-18 23:05:37'),
(72, 'Inf1311', '2', 'P4', '4', '8', '12', '16', '2019-07-18 23:05:37'),
(73, 'Inf1411', '2', 'P1', '4', '8', '12', '16', '2019-07-18 23:10:24'),
(74, 'Inf1411', '2', 'P2', '4', '8', '12', '16', '2019-07-18 23:10:24'),
(75, 'Inf1411', '2', 'P3', '4', '8', '12', '16', '2019-07-18 23:10:24'),
(76, 'Inf1411', '2', 'P4', '4', '8', '12', '16', '2019-07-18 23:10:24'),
(77, 'Sod1411', '2', 'P1', '4', '8', '12', '16', '2019-07-18 23:10:58'),
(78, 'Sod1411', '2', 'P2', '4', '8', '12', '16', '2019-07-18 23:10:58'),
(79, 'Sod1411', '2', 'P3', '4', '8', '12', '16', '2019-07-18 23:10:58'),
(80, 'Sod1411', '2', 'P4', '4', '8', '12', '16', '2019-07-18 23:10:58'),
(81, 'VSH1703', '3', 'P1', '8', '8', '8', '8', '2019-07-21 22:54:45'),
(82, 'VSH1703', '3', 'P2', '8', '8', '8', '8', '2019-07-21 22:54:45'),
(83, 'VSH1703', '3', 'P3', '8', '8', '8', '8', '2019-07-21 22:54:45'),
(84, 'VSH1703', '3', 'P4', '8', '8', '8', '8', '2019-07-21 22:54:45'),
(85, 'VSH1703', '5', 'P1', '8', '8', '8', '8', '2019-07-21 22:55:21'),
(86, 'VSH1703', '5', 'P2', '4', '4', '4', '4', '2019-07-21 22:55:21'),
(87, 'VSH1703', '5', 'P3', '12', '12', '12', '12', '2019-07-21 22:55:21'),
(88, 'VSH1703', '5', 'P4', '24', '24', '24', '24', '2019-07-21 22:55:21'),
(89, 'CGP1103', '2', 'P1', '8', '8', '8', '8', '2019-07-23 00:43:24'),
(90, 'CGP1103', '2', 'P2', '8', '8', '8', '8', '2019-07-23 00:43:24'),
(91, 'CGP1103', '2', 'P3', '8', '8', '8', '8', '2019-07-23 00:43:24'),
(92, 'CGP1103', '2', 'P4', '8', '8', '8', '8', '2019-07-23 00:43:24'),
(93, 'ABA1503', '1', 'P1', '8', '8', '8', '8', '2019-07-23 00:44:01'),
(94, 'ABA1503', '1', 'P2', '8', '8', '8', '8', '2019-07-23 00:44:01'),
(95, 'ABA1503', '1', 'P3', '8', '8', '8', '8', '2019-07-23 00:44:01'),
(96, 'ABA1503', '1', 'P4', '8', '8', '8', '8', '2019-07-23 00:44:01'),
(97, 'Gan5312', '1', 'P1', '8', '8', '8', '8', '2019-07-23 00:44:50'),
(98, 'Gan5312', '1', 'P2', '8', '8', '8', '8', '2019-07-23 00:44:50'),
(99, 'Gan5312', '1', 'P3', '8', '8', '8', '8', '2019-07-23 00:44:50'),
(100, 'Gan5312', '1', 'P4', '8', '8', '8', '8', '2019-07-23 00:44:50'),
(101, 'Gem0403', '1', 'P1', '8', '8', '8', '8', '2019-07-23 00:45:33'),
(102, 'Gem0403', '1', 'P2', '8', '8', '8', '8', '2019-07-23 00:45:33'),
(103, 'Gem0403', '1', 'P3', '8', '8', '8', '8', '2019-07-23 00:45:33'),
(104, 'Gem0403', '1', 'P4', '8', '8', '8', '8', '2019-07-23 00:45:33'),
(105, 'Gem0403', '3', 'P1', '8', '8', '8', '8', '2019-07-23 00:46:16'),
(106, 'Gem0403', '3', 'P2', '8', '8', '8', '8', '2019-07-23 00:46:16'),
(107, 'Gem0403', '3', 'P3', '8', '8', '8', '8', '2019-07-23 00:46:16'),
(108, 'Gem0403', '3', 'P4', '8', '8', '8', '8', '2019-07-23 00:46:16'),
(109, 'God1403', '1', 'P1', '8', '8', '8', '8', '2019-07-23 00:47:09'),
(110, 'God1403', '1', 'P2', '8', '8', '8', '8', '2019-07-23 00:47:09'),
(111, 'God1403', '1', 'P3', '8', '8', '8', '8', '2019-07-23 00:47:09'),
(112, 'God1403', '1', 'P4', '8', '8', '8', '8', '2019-07-23 00:47:09'),
(113, 'GRT1503', '1', 'P1', '8', '8', '8', '8', '2019-07-23 00:47:35'),
(114, 'GRT1503', '1', 'P2', '8', '8', '8', '8', '2019-07-23 00:47:35'),
(115, 'GRT1503', '1', 'P3', '8', '8', '8', '8', '2019-07-23 00:47:35'),
(116, 'GRT1503', '1', 'P4', '8', '8', '8', '8', '2019-07-23 00:47:35'),
(117, 'IRC1603', '1', 'P1', '8', '8', '8', '8', '2019-07-23 00:48:15'),
(118, 'IRC1603', '1', 'P2', '8', '8', '8', '8', '2019-07-23 00:48:15'),
(119, 'IRC1603', '1', 'P3', '8', '8', '8', '8', '2019-07-23 00:48:15'),
(120, 'IRC1603', '1', 'P4', '8', '8', '8', '8', '2019-07-23 00:48:15'),
(121, 'Kum1803', '3', 'P1', '8', '8', '8', '8', '2019-07-23 00:48:44'),
(122, 'Kum1803', '3', 'P2', '8', '8', '8', '8', '2019-07-23 00:48:44'),
(123, 'Kum1803', '3', 'P3', '8', '8', '8', '8', '2019-07-23 00:48:44'),
(124, 'Kum1803', '3', 'P4', '8', '8', '8', '8', '2019-07-23 00:48:44'),
(125, 'Pan2103', '3', 'P1', '8', '8', '8', '8', '2019-07-23 00:49:15'),
(126, 'Pan2103', '3', 'P2', '8', '8', '8', '8', '2019-07-23 00:49:15'),
(127, 'Pan2103', '3', 'P3', '8', '8', '8', '8', '2019-07-23 00:49:15'),
(128, 'Pan2103', '3', 'P4', '8', '8', '8', '8', '2019-07-23 00:49:15'),
(129, 'SRM1003', '3', 'P1', '8', '8', '8', '8', '2019-07-23 00:49:43'),
(130, 'SRM1003', '3', 'P2', '8', '8', '8', '8', '2019-07-23 00:49:43'),
(131, 'SRM1003', '3', 'P3', '8', '8', '8', '8', '2019-07-23 00:49:43'),
(132, 'SRM1003', '3', 'P4', '8', '8', '8', '8', '2019-07-23 00:49:43'),
(133, 'Red3712', '1', 'P1', '8', '8', '8', '8', '2019-07-23 00:50:24'),
(134, 'Red3712', '1', 'P2', '8', '8', '8', '8', '2019-07-23 00:50:24'),
(135, 'Red3712', '1', 'P3', '8', '8', '8', '8', '2019-07-23 00:50:24'),
(136, 'Red3712', '1', 'P4', '8', '8', '8', '8', '2019-07-23 00:50:24'),
(137, 'Sta1303', '1', 'P1', '8', '8', '8', '8', '2019-07-23 00:51:20'),
(138, 'Sta1303', '1', 'P2', '8', '8', '8', '8', '2019-07-23 00:51:20'),
(139, 'Sta1303', '1', 'P3', '8', '8', '8', '8', '2019-07-23 00:51:20'),
(140, 'Sta1303', '1', 'P4', '8', '8', '8', '8', '2019-07-23 00:51:20'),
(141, 'VMC1203', '1', 'P1', '8', '8', '8', '8', '2019-07-23 00:51:46'),
(142, 'VMC1203', '1', 'P2', '8', '8', '8', '8', '2019-07-23 00:51:46'),
(143, 'VMC1203', '1', 'P3', '8', '8', '8', '8', '2019-07-23 00:51:46'),
(144, 'VMC1203', '1', 'P4', '8', '8', '8', '8', '2019-07-23 00:51:46'),
(145, 'SUN1903', '3', 'P1', '8', '8', '8', '8', '2019-07-23 00:52:35'),
(146, 'SUN1903', '3', 'P2', '8', '8', '8', '8', '2019-07-23 00:52:35'),
(147, 'SUN1903', '3', 'P3', '8', '8', '8', '8', '2019-07-23 00:52:35'),
(148, 'SUN1903', '3', 'P4', '8', '8', '8', '8', '2019-07-23 00:52:35');

-- --------------------------------------------------------

--
-- Table structure for table `sla_master`
--

CREATE TABLE `sla_master` (
  `id` int(10) NOT NULL,
  `severity` varchar(250) DEFAULT NULL,
  `severity_name` varchar(250) NOT NULL,
  `duration` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sla_master`
--

INSERT INTO `sla_master` (`id`, `severity`, `severity_name`, `duration`, `created_at`) VALUES
(1, 'Critical', 'P1', '8 hous', '2018-12-16 23:47:33'),
(2, 'High', 'P2', '24 hours', '2018-12-16 23:47:44'),
(3, 'Medium', 'P3', '48 hours', '2018-12-16 23:47:58'),
(4, 'Low', 'P4', '48', '2019-06-14 09:35:54');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(10) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `customer_name` varchar(200) NOT NULL,
  `Contact_number` varchar(50) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(250) NOT NULL,
  `make` varchar(250) NOT NULL,
  `product` varchar(250) NOT NULL,
  `order_value` varchar(50) NOT NULL,
  `assignee` varchar(250) NOT NULL,
  `closure_date` date DEFAULT NULL,
  `lead_status` varchar(250) NOT NULL,
  `status` varchar(250) DEFAULT NULL,
  `lead_id` varchar(250) NOT NULL,
  `action` text NOT NULL,
  `next_action` text,
  `next_action_by` varchar(200) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `username`, `customer_name`, `Contact_number`, `email`, `address`, `make`, `product`, `order_value`, `assignee`, `closure_date`, `lead_status`, `status`, `lead_id`, `action`, `next_action`, `next_action_by`, `updated_at`) VALUES
(13, 'santhiya', 'Test2', '9845123658', 'info@gmail.com', 'chennai', 'Cisco', 'switch', '150000', 'Shahinsha', '2018-11-30', 'Commit', 'Open', 'tes451254', 'test', 'test', '2018-11-29', '2018-11-28 09:29:37'),
(14, 'Rajakumar.R', 'Sitel ', '9884246046', 'info@gmail.com', 'chennai', 'Altitude', 'Altitude AMC', ' 2000000 ', 'Rajakumar.R', '2018-12-07', 'Commit', 'Open', 'Sit170532', 'Requirements Noted..', 'revisec proposal sent', '2015-11-28', '2018-11-29 05:06:09'),
(15, 'Rajakumar.R', 'Sitel ', '9884246046', 'info@gmail.com', 'chennai', 'Altitude', 'Altitude AMC', ' 2000000 ', 'Rajakumar.R', '2018-12-07', 'Commit', 'Open', 'Sit170532', 'Negotiations', 'Revised proposal shared', '2018-11-30', '2018-11-29 05:06:40'),
(16, 'Admin', 'AGS HEALTH', '7871717122', 'MOHINDEEN@AGSHEALTH.COM', 'TIDEL PARK CHENNAI', 'Antivirus', 'KASPERSKY', '58000', 'ArulJothi', '2018-11-29', 'Commit', 'Open', 'AGS491037', 'Po Collected', 'TO PREPARE OC   IMMEDIATELY', '2018-11-30', '2018-11-29 05:22:02'),
(17, 'Admin', 'medassit', '7645334525', 'admin@mediassit.com', 'bengaluru', 'Others', 'ameyo', '1900000', 'Suresh.J', '2018-12-15', 'Lead', 'Open', 'med111151', 'Proposal Sent', 'revised proposal to be send', '2018-12-07', '2018-11-29 05:46:45'),
(18, 'Suresh.J', 'Ramachandran', '9941135325', 'ramachandran.h@cityunionbank.in', 'City union Bank Mount road chennai', 'Others', '4 Port PRI Gateway ', '195200', 'Suresh.J', '2018-12-31', 'Upside', 'Open', 'Ram461152', 'Solutions Proposed', 'waiting for confirmation', '2018-12-02', '2018-11-29 17:01:13'),
(19, 'Shahinsha', 'TVS Logistics', '9884481812', 'vijay.shankar@tvslsl.com', ' Cathedral Rd, Beside Indian Overseas Bank, Gopalapuram, Chennai, Tamil Nadu 600086', 'infosec Assessment tools', 'Nesses and Accunetix', '1400000', 'Shahinsha', '2018-11-30', 'Commit', 'Open', 'TVS271003', 'Po Collected', 'OC raised', '2018-11-30', '2018-12-01 05:40:46'),
(21, 'Admin', 'abdul-star health', '8654362345', 'info@starhealth.com', 'mount road, chennai', 'Contaque', 'contaque software', '215000', 'ArulJothi', '2018-12-03', 'Commit', 'Open', 'abd021153', 'Requirements Noted..', 'Proposal to sent', '2018-12-03', '2018-12-01 06:34:25'),
(22, 'Ranganath ', 'Siddhartha Logistics', ' 9884246046', 'info@gmail.com', 'chennai', 'Others', 'ILL', '70000', 'Ranganath ', '2018-12-07', 'Commit', 'Open', 'Sid090554', 'Proposal Sent', 'Need to meet the decision maker along with Mr.Manoj and get the PO.', '2018-12-04', '2018-12-03 04:31:40'),
(23, 'Suresh.J', 'CUB', '9884246046', 'info@gmail.com', 'Chennai', 'Altitude', 'Supervisor License', '200000', 'Suresh.J', '2018-12-07', 'Commit', 'Open', 'CUB020540', 'Requirements Noted..', 'Once Go live for Phase 2 this will required.', '2018-12-31', '2018-12-03 04:35:35'),
(24, 'Ranganath ', 'Siddhartha Logistics', ' 9884246046', 'info@gmail.com', 'chennai', 'Others', 'ILL', '70000', 'Ranganath ', '2018-12-07', 'Commit', 'Open', 'Sid090554', 'Proposal Sent', 'This week they will confirm the order, their client is visiting the site and confirm the order.', '2018-12-04', '2018-12-03 04:39:32'),
(25, 'Ranganath ', 'Proconnect', ' 9845124578', 'info@gmail.com', 'chennai', 'Others', 'Switches', '70000', 'Ranganath ', '2018-12-07', 'Commit', 'Open', 'Pro070526', 'Proposal Sent', 'Need to get the details of switch from Tamil and discuss with customer for PO', '2018-12-03', '2018-12-03 05:05:48'),
(26, 'Rajakumar.R', 'Sitel ', '9884246046', 'info@gmail.com', 'chennai', 'Altitude', 'Altitude AMC', ' 2000000 ', 'Rajakumar.R', '2018-12-15', 'Upside', 'Postponed', 'Sit170532', 'Proposal Sent', 'negotiations awaiting', '2018-12-08', '2018-12-03 06:20:44'),
(27, 'Suresh.J', 'AT Broadband', '9884246046', 'info@gmail.com', 'chennai', 'Altitude', 'Contaque IVR', '22000', 'Suresh.J', '2018-12-07', 'Commit', 'Open', 'AT 030541', 'Po Collected', 'Received Po along with payment', '2018-12-04', '2018-12-04 16:33:34'),
(28, 'Suresh.J', 'AT Broadband', '9884246046', 'info@gmail.com', 'chennai', 'Altitude', 'Contaque IVR', '22000', 'Suresh.J', '2018-12-07', 'Commit', 'Open', 'AT 030541', 'Po Collected', 'Po and payment collected need to start he PS development', '2018-12-08', '2018-12-06 06:24:53'),
(29, 'subhash V', 'Terraform Global', '+91 22 49192800', 'rlenka@terraformglobal.com', 'Kurla(west), Mumbai', 'Cisco', 'CISCO 2960 - 8 port switches ', '73262', 'subhash V', '2018-08-12', 'Commit', 'Open', 'Ter061157', 'Requirements Noted..', 'PO to be collected from customer', '2018-12-10', '2018-12-09 17:40:15'),
(30, 'Ranganath ', 'Siddhartha Logistics', ' 9884246046', 'info@gmail.com', 'chennai', 'Others', 'ILL', '70000', 'Ranganath ', '2018-12-07', 'Commit', 'Open', 'Sid090554', 'Negotiations', 'Need to call to customer on Jan19 second week', '2019-01-15', '2018-12-10 04:21:03'),
(31, 'Ranganath ', 'Siddhartha Logistics', ' 9884246046', 'info@gmail.com', 'chennai', 'Others', 'ILL', '70000', 'Ranganath ', '2018-12-07', 'Commit', 'Open', 'Sid090554', 'Negotiations', 'Need to meet customer on Jan2018, second week', '2019-01-09', '2018-12-10 04:22:02'),
(32, '', 'OPG ', 'Chennai', '''gubendran@opgpower.com''', 'Chennai', 'AVAYA', 'Avaya  or Polycom  Conference Phone  ', '61360', 'Vijay Balaji', '2018-12-14', 'Commit', 'Open', 'OPG110233', 'Requirements Noted..', 'Mail Confirmation Received ', '2018-12-17', '2018-12-16 16:08:07'),
(33, 'Vijay Balaji', 'Redgrape', '9600051255', 'Hari.Prasad@redgrapebs.com', 'Chennai', 'Cisco', 'Others ', '204140', 'Vijay Balaji', '2018-12-14', 'Commit', 'Open', 'Red300110', 'Requirements Noted..', 'Waiting For Customer Confirmation ', '2018-12-17', '2018-12-16 16:53:22'),
(34, 'subhash V', 'Terraform Global', '+91 22 49192800', 'rlenka@terraformglobal.com', 'Kurla(west), Mumbai', 'Cisco', 'CISCO 2960 - 8 port switches ', '73262', 'subhash V', '2018-08-12', 'Commit', 'Open', 'Ter061157', 'Po Collected', 'Hardware delivery, Installation and payment', '2018-12-21', '2018-12-16 19:29:52'),
(35, 'Admin', 'Ramakrishna SBI ', '9444018033', 'ramakrishna@sbi.com', 'haddows road, Nungambakkam, chennai-32', 'Contaque', 'contaque software', '154000', 'ArulJothi', '2018-11-30', 'Upside', 'Postponed', 'Ram041125', 'Po Collected', 'Delivery pending', '2018-12-20', '2018-12-17 04:56:44'),
(36, 'Vijay Balaji', 'OPG ', 'Chennai', '''gubendran@opgpower.com''', 'Chennai', 'AVAYA', 'Avaya  or Polycom  Conference Phone  ', '61360', 'Vijay Balaji', '2018-12-14', 'Commit', 'Open', 'OPG110233', 'Po Collected', 'Mail Confirmation  has  been received .', '2018-12-18', '2018-12-18 07:18:00'),
(37, 'Vijay Balaji', 'Redgrape', '9600051255', 'Hari.Prasad@redgrapebs.com', 'Chennai', 'Cisco', 'Others ', '204140', 'Vijay Balaji', '2018-12-14', 'Commit', 'Open', 'Red300110', 'Po Collected', 'Received ', '2018-12-19', '2018-12-18 07:20:30'),
(38, 'Ranganath ', 'KLA Tencore', '9940083716', 'Krishnakumar.Madhavan@kla-tencor.com', 'Chennai', 'Others', 'ILL-100 mbps & Access point,firewall & switch for rent', '60000', 'Ranganath ', '2018-12-19', 'Commit', 'Open', 'KLA540535', 'Po Collected', 'Need to followup and do the installation', '2019-01-02', '2018-12-24 04:06:18'),
(39, 'Ranganath ', 'Venus Geo', '1', 'madhu@vinusgeo.com', 'Tirupathi', 'Others', 'ILL- 50 mbps', '400000', 'Ranganath', '2018-12-14', 'Commit', 'Open', 'Vin051027', 'Negotiations', 'Price negotiation is happening. ', '2018-12-26', '2018-12-24 04:07:02'),
(40, 'Pradeep V.Nair', 'Lavazza', '9845123658', 'info@gmail.com', 'Chennai', 'AVAYA', 'AMC', '48000', 'Vijay Balaji', '2018-12-07', 'Commit', 'Open', 'Lav390425', 'Proposal Sent', 'Waiting for Customer Confirmation.', '2018-12-31', '2018-12-29 05:51:02'),
(41, 'Suresh.J', 'Infosys TDS', '9810515134', 'raman_batra@msp.tdscpc.gov.in', 'Infosys TDS Vishali New delhi', 'Altitude', 'Outbound IVR 25 License & Ps along TTS', '3053252', 'Suresh.J', '2018-12-15', 'Upside', 'Postponed', 'Inf330412', 'Solutions Proposed', 'Mid January 2019', '2019-01-20', '2018-12-31 04:33:57'),
(42, 'Suresh.J', 'CUB', 'Ramachandran', 'ramachandran@cityunionbank.in', 'Mount road', 'Altitude', '10 supervisor license ', '214472', 'Suresh.J', '2018-12-29', 'Commit', 'Open', 'CUB061019', 'Po Collected', 'Need to release back to Back PO with altitude', '2018-12-31', '2018-12-31 04:36:52'),
(43, 'Ranganath ', 'Baton Systems', '98409 43331 ', 'suresh@batonsystems.com', 'Chennai', 'Others', 'ILL 20 mbps', '300000', 'Ranganath ', '2018-12-26', 'Commit', 'Open', 'Bat390919', 'Negotiations', 'need to meet customer and discuss', '2019-01-04', '2018-12-31 04:42:06'),
(44, 'ArulJothi', 'shiram life Insurance', 'senthil', 'aruljothi@futurecalls.com', 'Hyderabad', 'Contaque', 'AMC', '38000', 'ArulJothi', '2018-12-25', 'Commit', 'Open', 'shi331035', 'Po Collected', 'delivery pending', '2019-01-01', '2018-12-31 05:12:00'),
(45, 'ArulJothi', 'relationship science', '9841522499', 'aruljothi@futurecalls.com', 'chennai', 'Antivirus', 'Fesecure', '60000', 'ArulJothi', '2018-12-21', 'Commit', 'Open', 'rel171048', 'Requirements Noted..', 'next week', '2019-01-04', '2018-12-31 05:12:30'),
(46, 'ArulJothi', 'CUMI', '9884246046', 'info@gmail.com', 'chennai', 'Contaque', 'Contact Center S/w', '250000', 'ArulJothi', '2018-12-07', 'Commit', 'Open', 'CUM500459', 'Requirements Noted..', 'next month', '2019-01-05', '2018-12-31 05:12:52'),
(47, 'ArulJothi', 'Tele Apps', '9843644039', 'info@gmail.com', 'chennai', 'Others', 'N/W Support', '70000', 'ArulJothi', '2018-12-07', 'Commit', 'Open', 'Tel480401', 'Negotiations', 'pending from customer side', '2019-01-21', '2018-12-31 05:13:42'),
(48, 'Pradeep V.Nair', 'Lavazza', '9845123658', 'info@gmail.com', 'Chennai', 'AVAYA', 'AMC', '48000', 'Vijay Balaji', '2018-12-07', 'Commit', 'Open', 'Lav390425', 'Requirements Noted..', 'Customer is waiting for budget approval', '2019-01-10', '2018-12-31 05:14:06'),
(49, 'ArulJothi', 'Royal Sundaram', 'Balaji', 'balaji@royalsundaram.com', 'Chennai', 'Altitude', 'Altitude', '2500000', 'ArulJothi', '2018-12-21', 'Commit', 'Open', 'Roy351007', 'Proposal Sent', 'next level discussion', '2019-01-15', '2018-12-31 05:14:35'),
(50, 'ArulJothi', 'relationship science', '9841522499', 'aruljothi@futurecalls.com', 'chennai', 'Antivirus', 'Fesecure', '60000', 'ArulJothi', '2018-12-21', 'Commit', 'Open', 'rel171048', 'Requirements Noted..', 'requirement discussion', '2019-01-10', '2019-01-07 04:41:15'),
(51, 'ArulJothi', 'Royal Sundaram', 'Balaji', 'balaji@royalsundaram.com', 'Chennai', 'Altitude', 'Altitude', '2500000', 'ArulJothi', '2018-12-21', 'Commit', 'Open', 'Roy351007', 'Proposal Sent', 'requirement discussion', '2019-01-11', '2019-01-07 04:41:57'),
(52, '', 'Terraform Global India Pvt Ltd', '91 22 49192800', 'rlenka@terraformglobal.com', 'Kurla (West), Mumbai', 'Others', 'Lenovo TAB 4 8 Plus', '800000', 'subhash V', '2018-12-24', 'Commit', 'Open', 'Ter440351', 'Po Collected', 'Hardware delivered', '2019-01-08', '2019-01-07 05:22:04'),
(53, 'subhash V', 'Terraform Global', '+91 22 49192800', 'rlenka@terraformglobal.com', 'Kurla(west), Mumbai', 'Others', 'Lenovo workstation ', '90000', 'subhash V', '2018-12-14', 'Commit', 'Open', 'Ter131114', 'Po Collected', 'closed', '2019-01-01', '2019-01-07 05:23:02'),
(54, 'subhash V', 'Terraform Global', '+91 22 49192800', 'rlenka@terraformglobal.com', 'Kurla(west), Mumbai', 'Others', 'Lenovo workstation ', '90000', 'subhash V', '2018-12-14', 'Commit', 'Open', 'Ter131114', 'Requirements Noted..', 'Proposal shared with customer awaited confirmation', '2019-01-08', '2019-01-07 05:24:55'),
(55, 'Suresh.J', 'Infosys TDS', '98105 15134 ', 'raman_batra@msp.tdscpc.gov.in', 'Income Tax Office, Sector 3, Vaishali - Ghaziabad', 'Altitude', 'Outbound IVR 25 License & Ps along TTS', '3831612', 'Suresh.J', '2018-12-31', 'Commit', 'Open', 'Inf021017', 'Solutions Proposed', 'Budget evaluation ', '2019-01-17', '2019-01-07 05:37:00'),
(56, 'Suresh.J', 'Infosys TDS', '9873896191', 'jitender_singh@msp.tdscpc.gov.in', 'Infosys TDS vashali new delhi', 'Altitude', 'AMC', '1654576', 'Suresh.J', '2018-12-31', 'Commit', 'Open', 'Inf311102', 'Solutions Proposed', 'Committed for 07 Jan 2019', '2019-01-07', '2019-01-07 05:37:57'),
(57, 'ArulJothi', 'MEDDUBUDDY', 'MEDDUBUDDY', 'aruljothi@futurecalls.com', 'BANGLORE', 'Contaque', 'Contaque', '1', 'ArulJothi', '2018-12-08', 'Commit', 'Open', 'MED481053', 'Proposal Sent', 'Proposal given\r\n', '2019-01-11', '2019-01-07 05:42:59'),
(58, 'subhash V', 'L&T, SSC', 'Surajit Saha', 'Surajit.Saha@larsentoubro.com', 'Sakinaka, Mumbai', 'Altitude', 'Altitude contact center ', '700000', 'subhash V', '2019-01-31', 'Lead', 'Open', 'L&T341022', 'Po Collected', 'Hardware delivered and closed ', '2019-01-07', '2019-01-07 05:44:30'),
(59, 'Suresh.J', 'Infosys TDS', '98105 15134 ', 'raman_batra@msp.tdscpc.gov.in', 'Income Tax Office, Sector 3, Vaishali - Ghaziabad', 'Altitude', 'Outbound IVR 25 License & Ps along TTS', '3831612', 'Suresh.J', '2018-12-31', 'Commit', 'Open', 'Inf021017', 'Solutions Proposed', 'Waiting for management approval  ', '2019-01-20', '2019-01-10 17:37:15'),
(60, 'Suresh.J', 'Infosys TDS', '9873896191', 'jitender_singh@msp.tdscpc.gov.in', 'Infosys TDS vashali new delhi', 'Altitude', 'AMC', '1654576', 'Suresh.J', '2018-12-31', 'Commit', 'Open', 'Inf311102', 'Proposal Sent', 'updated proposal sent ', '2019-01-20', '2019-01-10 17:38:19'),
(61, 'Suresh.J', 'Sterling Holidays', '9894452129', 'devanandvp@sterlingholidays.com', 'OMR', 'Altitude', '10 Agent license for DR site', '752484', 'Suresh.J', '2019-01-31', 'Upside', 'Open', 'Ste200434', 'Po Collected', 'Po collected', '2018-12-29', '2019-01-10 17:39:30'),
(62, 'Vijay Balaji', 'Orange Retail finance ', '9841522439', 'balaji@orangeretailfinance.com', 'Chennai', 'Others', 'AWS ', '22000', 'Vijay Balaji', '2019-01-02', 'Commit', 'Open', 'Ora181127', 'Proposal Sent', 'Waiting for customer confirmation. ', '2019-01-21', '2019-01-16 14:10:59'),
(63, 'Admin', 'Infosys Bandhan Bank', 'Uma Maheshwara Rao Gujjari', 'suresh.j@futurecalls.com', 'Hyderabad', 'Altitude', 'Altitude Software', '10000000', 'Suresh.J', '2019-02-15', 'Commit', 'Open', 'Inf541139', 'Demo Scheduled', 'demo', '2019-01-30', '2019-01-28 09:14:24');

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `id` int(10) NOT NULL,
  `client_name` varchar(250) DEFAULT NULL,
  `total_users` varchar(250) DEFAULT NULL,
  `concurrent_users` varchar(250) DEFAULT NULL,
  `inbound` varchar(250) NOT NULL,
  `outbound` varchar(250) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`id`, `client_name`, `total_users`, `concurrent_users`, `inbound`, `outbound`, `created_at`) VALUES
(14, 'Futurecalls', 'YO6nTOvw8V69Ywxy1QblJqLMoW1T7bqhRBjpavjJuhI=', 'K5gBiYPU2wz0xkcHr4WU2cJA+USX8U6bqVPUaCmcvKM=', 'a8f3UVP/bEPldVuLYvXbgZKNWWWSoJWWZrShAzWQEUk=', 'a8f3UVP/bEPldVuLYvXbgZKNWWWSoJWWZrShAzWQEUk=', '2019-07-22 22:56:12');

-- --------------------------------------------------------

--
-- Table structure for table `target_master`
--

CREATE TABLE `target_master` (
  `id` int(10) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `q1` varchar(250) DEFAULT NULL,
  `q2` varchar(250) DEFAULT NULL,
  `q3` int(250) DEFAULT NULL,
  `q4` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `target_master`
--

INSERT INTO `target_master` (`id`, `name`, `q1`, `q2`, `q3`, `q4`, `created_at`) VALUES
(1, 'Admin', '10000000', '10000000', 10000000, '10000000', '2019-01-04 23:26:31'),
(2, 'ArulJothi', '1000000', '1000000', 1000000, '1000000', '2019-01-04 23:51:58'),
(3, 'Rajakirubanithi', '1000000', '1000000', 1000000, '1000000', '2019-01-04 23:52:25'),
(4, 'Ranganath', '1000000', '1000000', 1000000, '1000000', '2019-01-04 23:52:47'),
(5, 'Vijay Rajagopal', '1000000', '1000000', 1000000, '1000000', '2019-01-04 23:53:08'),
(6, 'Vijay Balaji', '1000000', '1000000', 1000000, '1000000', '2019-01-04 23:53:21'),
(7, 'Vinodha', '1000000', '1000000', 1000000, '1000000', '2019-01-04 23:53:34');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) NOT NULL,
  `clientID` varchar(255) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `number` varchar(250) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `severity` varchar(250) NOT NULL,
  `ticketID` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `time` varchar(250) DEFAULT NULL,
  `campaign_ID` varchar(250) DEFAULT NULL,
  `process` varchar(250) NOT NULL,
  `assigned_to` varchar(250) DEFAULT NULL,
  `role` varchar(250) DEFAULT NULL,
  `attachment` varchar(250) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `clientID`, `email`, `number`, `subject`, `description`, `severity`, `ticketID`, `status`, `time`, `campaign_ID`, `process`, `assigned_to`, `role`, `attachment`, `created_at`) VALUES
(1, 'SRM1003', 'srm@futurecalls.com', '9999999999', 'SRM unibox GLobal Access regards ', '', 'P2', 'N201033', 'Open', '13419', '3', '3', 'tamilarasan@futurecalls.com', 'Team leader', '', '2018-01-10 10:20:00'),
(2, 'CGP1103', 'cgpolice@futurecalls.com', '9999999999', 'CGPolice SSL Certificate Configuration', 'Need to configure SSL certificate for Chat URL', 'P3', 'V201108', 'Open', '5068', '1', '2', 'sagar@futurecalls.com', 'L3 support', '', '2018-12-24 11:20:00'),
(3, 'CGP1103', 'cgpolice@futurecalls.com', '9999999999', 'CG Police Campaign Name Change', 'New Request Check with Altitude and configure the same', 'P3', 'V581011', 'Open', '5068', '1', '2', 'sagar@futurecalls.com', 'L3 support', '', '2018-12-24 11:20:00'),
(4, 'CGP1103', 'cgpolice@futurecalls.com', '9999999999', 'CG Police SSL certificate', 'SSL certificate applied but chat typing window not working. Informed customer to configure the reverse proxy', 'P3', 'V541056', 'Open', '5068', '1', '2', 'sagar@futurecalls.com', 'L3 support', '', '2018-12-24 11:20:00'),
(5, 'VMC1203', 'vmch@futurecalls.com', '9999999999', 'VMCH', 'VCE network error', 'P2', 'V290153', 'Open', '4994', '1', '1', 'dillibabu@futurecalls.com', 'L3 support', '', '2018-12-27 13:29:00'),
(6, 'Ste0911', 'sterling@futurecalls.com', '9999999999', 'Before landing call to Agent Please wait while we transfer is played twice', 'Before landing call to Agent Please wait while we transfer is played twice', 'P2', 'A261153', 'Open', '4444', '1', '2', 'devakumar@futurecalls.com', 'L3 support', '', '2019-01-19 11:26:00'),
(7, 'Ste0911', 'sterling@futurecalls.com', '9999999999', 'Outbound Dialing - Should disable prefixing 0 before numbers', 'Outbound Dialing - Should disable prefixing 0 before numbers', 'P2', 'A271136', 'Open', '4444', '1', '2', 'devakumar@futurecalls.com', 'L3 support', '', '2019-01-19 11:27:00'),
(8, 'Ste0911', 'sterling@futurecalls.com', '9999999999', 'Outbound - No Recording. No Reports.', 'Outbound - No Recording. No Reports.', 'P2', 'V291106', 'Open', '4444', '1', '2', 'devakumar@futurecalls.com', 'L3 support', '', '2019-01-19 11:29:00'),
(9, 'Cit1111', 'cub@futurecalls.com', '9999999999', 'CUB - Ticketing Server Migration', 'City Union Bank - Ticketing Server Migration from DR to Chennai DC', 'P4', 'V370427', 'Open', '2663', '1', '2', 'devakumar@futurecalls.com', 'Service Head', '', '2019-04-03 16:37:00'),
(10, 'Red3712', 'redgrape@futurecalls.com', '9999999999', 'Phone installation', 'Redgrape', 'P3', 'V131007', 'Open', '2285', '1', '1', 'dillibabu@futurecalls.com', 'L3 support', '', '2019-04-19 10:13:00'),
(11, 'Gan5312', 'ganges@gmail.com', '9999999999', '2 VC Xt4300 installation', 'Ganges int', 'P2', 'V141019', 'Open', '2279', '1', '1', 'dillibabu@futurecalls.com', 'L3 support', '', '2019-04-19 16:37:00'),
(12, 'VMC1203', 'vmch@gmail.com', '9999999999', 'System upgrade', 'VMCH', 'P2', 'V231059', 'Open', '1565', '1', '1', 'pradeep@futurecalls.com', 'Team leader', '', '2019-05-19 10:23:00'),
(13, 'GRT1503', 'grt@futurecalls.com', '9999999999', ' gust name not displayed ', 'GRT madurai', 'P2', 'V131000', 'Open', '1565', '1', '1', 'dillibabu@futurecalls.com', 'L3 support', '', '2019-05-19 10:13:00'),
(14, 'Sta1303', 'standex@futurecalls.com', '9999999999', 'Satndex', 'Standex electronics  need some changes in IP adress', 'P2', 'V191008', 'Open', '821', '1', '1', 'pradeep@futurecalls.com', 'Team leader', '', '2019-06-19 10:19:00'),
(15, 'God1403', 'godtv@futurecalls.com', '9999999999', 'GOD  TV', 'preventive maintenance', 'P2', 'V211053', 'Open', '821', '1', '1', 'pradeep@futurecalls.com', 'Team leader', '', '2019-06-19 10:21:00'),
(16, 'ABA1503', 'aban@gmail.com', '9999999999', 'Aban', 'preventive maintenance ', 'P2', 'V221024', 'Open', '101', '1', '1', 'pradeep@futurecalls.com', 'Team leader', '', '2019-07-19 10:22:00'),
(17, 'GRT1503', 'grt@futurecalls.com', '9999999999', 'GRT kanchipuram', 'kanchipuram grt  call billing s/w issues', 'P2', 'V540426', 'Open', '815', '1', '1', 'dillibabu@futurecalls.com', 'L3 support', '', '2019-06-19 16:54:00'),
(18, 'IRC1603', 'ircs@futurecalls.com', '9999999999', 'IRCS', 'FHS  JSSK s/w issues', 'P2', 'V550456', 'Open', '815', '1', '1', 'santhiya@futurecalls.com', '', '', '2019-06-19 16:55:00'),
(19, 'Kum1803', 'kumaranhs@futurecalls.com', '9999999999', 'Kumaran hospital, Coimbatore', 'Kumaran hospital implementation.', 'P2', 'N011158', 'Open', '99', '3', '3', 'vengadeshwaran@futurecalls.com', 'L1 support', '', '2019-07-19 11:01:00'),
(20, 'SUN1903', 'ssoft@futurecalls.com', '9999999999', 'Sunnysoft, Coimbatore', 'Sunnysoft implemetation.', 'P2', 'N081105', 'Open', '99', '3', '3', 'vengadeshwaran@futurecalls.com', 'L1 support', '', '2019-07-19 11:08:00'),
(21, 'Pan2103', 'panimalar@futurecalls.com', '9999999999', 'Panimalar college,Chennai', 'Panimalar college site supervision and implemetation.', 'P2', 'N171155', 'Open', '98', '3', '3', 'senthil@futurecalls.com', 'L3 support', '', '2019-07-19 11:17:00'),
(22, 'Pan2103', 'panimalar@futurecalls.com', '9999999999', 'Panimalar college,Chennai', 'Panimalar college site supervision and implemetation.', 'P2', 'N181139', 'Open', '98', '3', '3', 'subrat@futurecalls.com', 'L1 support', '', '2019-07-19 11:18:00'),
(23, 'Pan2103', 'panimalar@futurecalls.com', '9999999999', 'Panimalar college,Chennai', 'Panimalar Project.', 'P3', 'N431034', 'Open', '99', '3', '3', 'tamilarasan@futurecalls.com', 'Team leader', '', '2019-07-19 10:43:00'),
(24, 'Gem0403', 'gemhs@futurecalls.com', '9999999999', 'Gem Hospitals, Chennai', 'Gem Project.', 'P4', 'N431056', 'Open', '99', '3', '3', 'tamilarasan@futurecalls.com', 'Team leader', '', '2019-07-19 10:43:00'),
(25, 'SRM1003', 'srm@futurecalls.com', '9999999999', 'SRM,sonipet', 'SRM project', 'P3', '481054', 'Open', '99', '3', '3', '', '', '', '2019-07-19 10:48:00'),
(26, 'SRM1003', 'srm@futurecalls.com', '9999999999', 'SRM,sonipet', 'SRM project', 'P3', 'N501050', 'Open', '99', '3', '3', 'tamilarasan@futurecalls.com', 'Team leader', '', '2019-07-19 10:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `department` varchar(250) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `body` varchar(250) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL,
  `severity` varchar(250) DEFAULT NULL,
  `ticket_id` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `action_taken` varchar(1000) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`id`, `customer_name`, `department`, `title`, `body`, `status`, `severity`, `ticket_id`, `created_at`, `action_taken`, `updated_at`) VALUES
(1, 'pradeep@futurecalls.com', 'Voice and Contact Center', 'GRT  t nager', 'Avaya button programming ', 'Open', 'High', 'V180523', '2018-09-20 17:18:23', 'first update', '2018-09-21 15:49:51'),
(2, 'pradeep@futurecalls.com', 'Voice and Contact Center', 'GRT  t nager', 'Avaya button programming ', 'Open', 'High', 'V180523', '2018-09-20 17:18:23', 'Second Update', '2018-09-21 16:15:39'),
(3, 'Hexaware Technologies', 'Voice and Contact Center', 'Require Security access on instance level', 'Hi Team,\r\n\r\nwe have one instance and we need to add one more process on this instance for process security level we require your support.', 'Open', 'High', 'V510307', '2018-08-14 15:51:07', 'Test Update', '2018-09-21 17:14:06'),
(4, 'Futurecalls', 'Voice and Contact Center', 'IQOR patch Update', 'IQOR customer wants to go with the latest patch of 8.4.1070 ', 'Open', 'High', 'V280425', '2018-08-06 16:28:25', 'tested working fine', '2018-09-21 17:19:03'),
(5, 'Futurecalls', 'Voice and Contact Center', 'IQOR patch Update', 'IQOR customer wants to go with the latest patch of 8.4.1070 ', 'Open', 'High', 'V280425', '2018-08-06 16:28:25', 'second update', '2018-09-21 17:19:25'),
(6, 'pradeep@futurecalls.com', 'Voice and Contact Center', 'GRT  t nager', 'Avaya button programming ', 'Open', 'High', 'V180523', '2018-09-20 17:18:23', 'Third update', '2018-09-24 11:37:44'),
(7, 'devakumar@futurecalls.com', 'Voice and Contact Center', 'IQOR- Temp DB Deletion', 'We have one strange concern with Temp DB, it consists of 90+GB. So we need to overcome this issues ASAP.', 'Closed', 'Low', 'V521138', '2018-09-19 11:52:38', 'We scheduled the activity at post-production and we restarted the SQL Services. Then the size was decreased as we expected.', '2018-09-28 10:17:38'),
(8, 'pradeep@futurecalls.com', 'Voice and Contact Center', 'VS hospital', 'Cabling issues    ', 'Closed', 'High', 'V431009', '2018-09-14 10:43:09', '4 new extn  created', '2018-09-28 11:39:35'),
(9, 'rajkumar.n@futurecalls.com', 'HR & Admin', 'Test Ticket', 'Test Ticket', 'Open', 'High', 'H280359', '2018-10-22 15:28:59', 'ticket verified updated this week', '2018-10-22 15:30:26'),
(10, '', 'HR & Admin', 'Visiting', 'Check Visiter', 'Closed', 'Medium', 'H170456', '2018-11-12 16:17:56', 'Completed', '2018-11-12 16:18:27'),
(11, 'shahinsha@futurecalls.com', 'Information Security', 'Watanmal - Mail Store user creation', 'need to add new user to mail store and sync with AD', 'Open', 'Medium', 'H440304', '2018-11-14 15:44:04', 'Mail ID created for the concern user and sync also completed', '2018-11-15 09:48:49'),
(12, 'pradeep@futurecalls.com', 'Voice and Contact Center', 'IQ back office', 'RIMS ', 'Open', 'High', 'V441142', '2018-09-28 11:44:42', '', '2018-11-22 17:49:26'),
(13, 'pradeep@futurecalls.com', 'Voice and Contact Center', 'Test', 'Test', 'Open', 'Low', 'V180319', '2018-11-23 15:18:19', 'first action', '2018-11-23 15:19:40'),
(14, 'pradeep@futurecalls.com', 'Voice and Contact Center', 'Test', 'Test', 'Open', 'Low', 'V180319', '2018-11-23 15:18:19', 'second action', '2018-11-23 15:19:56'),
(15, 'shahinsha@futurecalls.com', 'Information Security', 'Watanmal - Office365  ', 'Taking mails backup and delete the mails from webmail and also need to provide the necessary mail as per their requirement.', 'Open', 'Medium', 'H530327', '2018-11-14 15:53:27', 'Work in Process. Looking for solution..', '2018-11-26 10:25:44'),
(16, 'shahinsha@futurecalls.com', 'Information Security', 'Cogent - Web Application Assessment', 'Need to do Web Application Assessment', 'Open', 'Medium', 'H500333', '2018-11-14 15:50:33', 'Web Application Assessment done and report sent. Once they fix the vulnerability again generate the report.', '2018-11-26 10:29:14'),
(17, '', 'Information Security', 'OPmanager not working issue', 'OPManager page not working showing some error', 'Open', 'Medium', 'I500959', '2018-12-10 09:50:59', 'OPManager Tool not working got support from Zoho team and issue got resolved now', '2018-12-10 09:51:56'),
(18, 'Sakthivel@futurecalls.com', 'Information Security', 'Acunetix Acusensor mode enable', 'Need to activate AcuSencor in Acunetix (TVS Log)', 'Open', 'Medium', 'I380525', '2018-12-13 17:38:25', 'AcuSensor mode enabled Assessment has been done.', '2018-12-13 17:39:14'),
(19, 'Sakthivel@futurecalls.com', 'Information Security', 'Cogent- Antivirus Audit', 'Audit for Anti-virus in all department systems in cogent', 'Open', 'Medium', 'I500543', '2018-12-13 17:50:43', 'Antivirus Audit has been done in all systems in cogent, All antivirus process been checked and noted', '2018-12-13 17:52:08'),
(20, 'Sakthivel@futurecalls.com', 'Information Security', 'Anti-Virus Demo', 'Antivirus Demo & installation in AGIIT', 'Open', 'Medium', 'I520553', '2018-12-13 17:52:53', 'Seqrite Antivirus installation and demo also provide to client AGIIT', '2018-12-13 17:54:33'),
(21, 'Sakthivel@futurecalls.com', 'Information Security', 'Universal Engineers', 'Firewall enabling in universal', 'Open', 'Medium', 'I550505', '2018-12-13 17:55:05', '', '2018-12-13 17:55:45'),
(22, '', 'Information Security', 'Acunetix verification File issue', 'Acunetix error. Need to insert file in root directory and trouble tragets are need to verify', 'Open', 'Medium', 'I191206', '2018-12-10 12:19:06', 'Verification files are inserted', '2018-12-17 10:10:28'),
(23, '', 'Information Security', 'OPmanager not working issue', 'OPManager page not working showing some error', 'Open', 'Medium', 'I500959', '2018-12-10 09:50:59', 'Error has been cleared Opmanager is working good now!', '2018-12-17 10:10:56'),
(24, 'Sakthivel@futurecalls.com', 'Information Security', 'Cogent- Antivirus Audit', 'Audit for Anti-virus in all department systems in cogent', 'Open', 'Medium', 'I500543', '2018-12-13 17:50:43', 'Antivirus audit is done in cogent ', '2018-12-17 10:12:02'),
(25, 'Sakthivel@futurecalls.com', 'Information Security', 'Acunetix Acusensor mode enable', 'Need to activate AcuSencor in Acunetix (TVS Log)', 'Open', 'Medium', 'I380525', '2018-12-13 17:38:25', 'AcuSensor Option enabled in Acunetix', '2018-12-17 10:12:27'),
(26, 'shahinsha@futurecalls.com', 'Information Security', 'Cogent - Web Application Assessment', 'Need to do Web Application Assessment', 'Open', 'Medium', 'H500333', '2018-11-14 15:50:33', 'Assessment report are shared but client expecting to give some more details, so we are working on it.', '2018-12-17 10:13:44'),
(27, 'Sakthivel@futurecalls.com', 'Information Security', 'Relationship Science', 'Antivirus installation issue in RElSCI need to give Demo and training.', 'Open', 'High', 'I161001', '2018-12-17 10:16:01', '', '2018-12-17 10:23:07'),
(28, 'Sakthivel@futurecalls.com', 'Information Security', 'Futurecalls - Firewall issue', 'Network is too slow due too firewall issue', 'Open', 'Medium', 'I161026', '2018-12-18 10:16:26', 'Network speed get increased and firewall issue got resolved', '2018-12-18 10:17:13'),
(29, 'devakumar@futurecalls.com', 'Voice and Contact Center', 'Hexaware - Calls not landing issues', 'Calls are not landing to the agent and getting engaged tone...', 'Closed', 'High', 'V361206', '2018-11-19 12:36:06', 'Now issues got resolved and its working fine. Due to the IVR agent unavailability, they are getting engaged tone.', '2018-12-18 12:01:54'),
(30, 'devakumar@futurecalls.com', 'Voice and Contact Center', 'Hexaware - Altitude uCI 8.4 VBox Down', 'Altitude VBox getting down frequently ', 'Closed', 'Medium', 'V090309', '2018-11-27 15:09:09', 'Due to the network connectivity issues vbox getting down frequently. we informed them to check with network team.', '2018-12-18 12:03:26'),
(31, 'devakumar@futurecalls.com', 'Voice and Contact Center', 'Hexaware- VBox Went Unresponsive ', 'VBox went suddenly offline and they noticed the issue was server went unresponsive and they done hard restart then itâ€™s working fine. ', 'Closed', 'Medium', 'V510552', '2018-11-16 17:51:52', 'Due to the system hang issues, we faced this issues. so we need to be checked from vbox log and we couldn''t identify any issues from our logs so we need to escalate this to server vendor. One more thing we noticed that vbox patch is old and we recommended to update to latest one.', '2018-12-18 12:08:57'),
(32, 'devakumar@futurecalls.com', 'Voice and Contact Center', 'Hexaware Call Queuing Issue', 'Calls are not landing to agents and all the agents are ready only. But one agent went RONA, shared the required logs to the Altitude team.', 'Closed', 'Medium', 'V310425', '2018-11-02 16:31:25', 'We have informed them for a monitor for some more days, this is not an issue but the operation team misunderstand the flow, and this thing related to page refreshing and we informed the same to Hexaware team.', '2018-12-18 12:39:15'),
(33, 'Sakthivel@futurecalls.com', 'Information Security', 'Relationship Science', 'Antivirus installation issue in RElSCI need to give Demo and training.', 'Open', 'High', 'I161001', '2018-12-17 10:16:01', 'AV Demo and Training has been given to the concern person in RelSci', '2018-12-18 16:01:09'),
(34, 'Sakthivel@futurecalls.com', 'Information Security', 'SPICA', 'AD need to implement', 'Open', 'High', 'I281051', '2018-12-17 10:28:51', 'In discussion, after planing and schedule will initiate the implementation.', '2018-12-19 10:30:30'),
(35, 'Sakthivel@futurecalls.com', 'Information Security', 'Universal Engineers', 'Antivirus- Sophos need to implement', 'Open', 'High', 'I251035', '2018-12-17 10:25:35', 'Pending on customer side conformation', '2018-12-19 10:35:11'),
(36, 'Sakthivel@futurecalls.com', 'Information Security', 'Relationship Science', 'Antivirus installation issue in RElSCI need to give Demo and training.', 'Open', 'High', 'I161001', '2018-12-17 10:16:01', 'AntiVirus demo and training are given to customer', '2018-12-19 10:35:50'),
(37, 'rajakumar.r@futurecalls.com', 'Voice and Contact Center', 'CG Police Chat Notification ', 'Changes done as per client requirement but still agent not able to view full message\r\n', 'Open', 'Medium', 'V521025', '2018-12-24 10:52:25', 'Notification is working but not displayed properly and Need to test o agent desk\r\n\r\n', '2018-12-24 10:53:47'),
(38, 'rajakumar.r@futurecalls.com', 'Voice and Contact Center', 'CG Police Chat Notification ', 'Changes done as per client requirement but still agent not able to view full message\r\n', 'Open', 'Medium', 'V521025', '2018-12-24 10:52:25', 'Alti-RQST00000163599\r\n\r\nNeed to configure reverse proxy\r\n\r\nRemark:\r\n\r\n"Configured SSL certificate on IIS but Chat typing window with SSL encryption is showing protocol error.\r\nAs per meeting poing need to confiure the Reverse proxy to test the issue.\r\nWaiting for client confirmation"\r\n', '2018-12-24 10:56:24'),
(39, 'rajakumar.r@futurecalls.com', 'Voice and Contact Center', 'Hexaware', 'Demo License for Hexaware\r\n', 'Open', 'Medium', 'V021135', '2018-12-24 11:02:35', 'Provided Version 8 partener license\r\n', '2018-12-24 11:03:22'),
(40, 'rajakumar.r@futurecalls.com', 'Voice and Contact Center', 'Hexaware', 'V 7.5 Report issue \r\n', 'Open', 'Low', 'V081139', '2018-12-24 11:08:39', 'Alti- RQST00000164028\r\nAsked customer to provide full issue in details.\r\n', '2018-12-24 11:09:59'),
(41, 'rajakumar.r@futurecalls.com', 'Voice and Contact Center', 'Hexaware Alti- RQST00000164027', 'V 7.5 Call executing issue\r\n', 'Open', 'Medium', 'V101147', '2018-12-24 11:10:47', 'Changed the setting in System. Waiting for Customer confirmation.\r\n', '2018-12-24 11:12:39'),
(42, 'rajakumar.r@futurecalls.com', 'Voice and Contact Center', 'Hexaware', 'G 729 Codec\r\n', 'Open', 'Medium', 'V131156', '2018-12-24 11:13:56', '"G729 codec tested successfully on test environment.\r\nCustomer requested for live setup plan. SO we need confirmation from Altitude team for server spec and architecture details.\r\nWe had send mail to Prem for confirmation "\r\n', '2018-12-24 11:14:34'),
(43, 'rajakumar.r@futurecalls.com', 'Voice and Contact Center', 'Hexaware', 'License Shifting from V 7 to V 8\r\n', 'Open', 'Medium', 'V151125', '2018-12-24 11:15:25', '"Customer requested for license movement from V7 to V8 and costing details.\r\nWe need to share the details for the same"\r\n', '2018-12-24 11:15:51'),
(44, 'rajakumar.r@futurecalls.com', 'Voice and Contact Center', 'Hexaware', 'Russia - Report Requirement\r\n', 'Open', 'Low', 'V161147', '2018-12-24 11:16:47', 'Need to create report as per client requirement\r\n', '2018-12-24 11:17:38'),
(45, 'rajakumar.r@futurecalls.com', 'Voice and Contact Center', 'Hexaware', 'Russia - Call transfer to 3rd Party\r\n', 'Open', 'Medium', 'V181155', '2018-12-24 11:18:55', '"3rd party pbx which is out of altitude and once the call is out from altitude we cannot control the call more over 3rd party PBX will captre only the agent extenstion number which is used for transferying so this is not possible.\r\nWaiting for customer confirmation"\r\n', '2018-12-24 11:19:38'),
(46, 'rajakumar.r@futurecalls.com', 'Voice and Contact Center', 'L&T', 'Oveflow issue\r\n', 'Open', 'High', 'V201151', '2018-12-24 11:20:51', 'Alti - RQST00000162891\r\n\r\n"Informed custome need to enable auto answer to avoid such issue.\r\nBut customer not ready to enable this option."\r\n', '2018-12-24 11:21:58'),
(47, 'rajakumar.r@futurecalls.com', 'Voice and Contact Center', 'L&T', 'VBOX Shifting from Mumbai to Pune\r\n', 'On Hold', 'Medium', 'V231126', '2018-12-24 11:23:26', 'Waiting for customer confirmation\r\n', '2018-12-24 11:23:47'),
(48, 'rajakumar.r@futurecalls.com', 'Voice and Contact Center', 'L&T', 'OSP License\r\n', 'On Hold', 'Medium', 'V241137', '2018-12-24 11:24:37', 'Waiting for customer confirmation\r\n', '2018-12-24 11:24:54'),
(49, 'rajakumar.r@futurecalls.com', 'Voice and Contact Center', 'UHC', 'CR Email Rules\r\n', 'On Hold', 'Medium', 'V261147', '2018-12-24 11:26:47', 'Client confirmation pending..\r\n', '2018-12-24 11:27:24'),
(50, 'rajakumar.r@futurecalls.com', 'Voice and Contact Center', 'UHC', 'Banglore Site testing\r\n', 'On Hold', 'Medium', 'V281104', '2018-12-24 11:28:04', 'Need to demonstrate CTI less scenario to customer\r\n', '2018-12-24 11:28:24'),
(51, 'rajakumar.r@futurecalls.com', 'Voice and Contact Center', 'UHC', 'HDD change request \r\n', 'On Hold', 'Medium', 'V281149', '2018-12-24 11:28:49', 'Waiting for customer confirmation\r\n', '2018-12-24 11:29:20'),
(52, 'Sakthivel@futurecalls.com', 'Information Security', 'Universal Engineers', 'Antivirus- Sophos need to implement', 'Open', 'High', 'I251035', '2018-12-17 10:25:35', 'Anti-Virus installed successfully', '2019-01-08 09:52:25');

-- --------------------------------------------------------

--
-- Table structure for table `update_status`
--

CREATE TABLE `update_status` (
  `id` int(10) NOT NULL,
  `clientID` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `severity` varchar(250) NOT NULL,
  `ticketID` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `campaign_ID` varchar(250) DEFAULT NULL,
  `process` varchar(250) NOT NULL,
  `assigned_to` varchar(250) DEFAULT NULL,
  `action` text NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `update_status`
--

INSERT INTO `update_status` (`id`, `clientID`, `subject`, `description`, `severity`, `ticketID`, `status`, `campaign_ID`, `process`, `assigned_to`, `action`, `created_date`, `updated_at`) VALUES
(1, 'TVS5604', 'campaign test', 'test ticket', 'P2', '291132', 'Open', 'Cam1705', '7', 'sakthivel@futurecalls.com', 'first update', '2019-06-26 11:29:32', '2019-06-28 12:36:41'),
(2, 'IRC5804', 'Test', 'test ticket', 'P2', '250316', 'Open', 'Cam1705', '4', 'sakthivel@futurecalls.com', 'first Update', '2019-06-26 15:25:16', '2019-06-29 10:28:03'),
(3, 'IRC5804', 'Test', 'test ticket', 'P2', '250316', 'Open', 'Cam1705', '4', 'sakthivel@futurecalls.com', 'second update', '2019-06-26 15:25:16', '2019-06-29 10:28:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `usertype` varchar(250) NOT NULL,
  `resource` varchar(250) DEFAULT NULL,
  `location` varchar(250) DEFAULT NULL,
  `emp_id` varchar(250) DEFAULT NULL,
  `username` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `number` varchar(250) DEFAULT NULL,
  `role` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `flag` int(10) NOT NULL DEFAULT '0',
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` int(10) NOT NULL DEFAULT '1',
  `updated_at` timestamp NULL DEFAULT NULL,
  `login_status` varchar(250) NOT NULL DEFAULT '1',
  `image` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `resource`, `location`, `emp_id`, `username`, `email`, `name`, `number`, `role`, `password`, `flag`, `created_date`, `status`, `updated_at`, `login_status`, `image`) VALUES
(1, 'Internal User', 'remote', 'Address 1', NULL, 'santhiya', 'santhiya@futurecalls.com', 'Santhiya', '9843644039', 'Administrator', '$2y$10$Aq9cZVh6HWA65DZp84q6qejh2OBVDxhwI39S//9.xOhy8as7cSFhS', 0, '2019-03-29 10:57:51', 2, '2019-07-12 05:17:06', '1', NULL),
(2, 'Internal User', 'remote', 'Address 3', 'FC1005', 'sakthivel', 'sakthivel@futurecalls.com', 'Sakthivel', '9843644039', 'L1 support', '$2y$10$39m/OD8Bz8ijAuUNDWLk0u58r1czocRSmKQICbFYGcPSI9d46WLSa', 0, '2019-04-08 12:56:03', 2, '2019-06-27 10:20:37', '1', NULL),
(3, 'Internal User', 'remote', 'Address 2', 'FC00103', 'Shahinsha', 'shahinsha@futurecalls.com', 'Shahinsha', '9845124578', 'Team leader', '$2y$10$Jn5ARqzxEvzqUrKd4rjyo.MT2nOXCXs2IRGUH5SCh5DSKaxyaKk3m', 0, '2019-05-10 13:09:54', 1, NULL, '1', NULL),
(4, 'Internal User', 'remote', 'Address 2', NULL, 'veera', 'veera@futurecalls.com', 'veera', '9843644039', 'Administrator', '$2y$10$Q0nojqOfTj0cgTQSD0ktF.SAfWQ3NRknKdhva5jYar28MhPi5VSl6', 0, '2019-05-30 13:55:53', 2, '2019-06-17 12:35:04', '1', NULL),
(5, 'Internal User', 'remote', 'Address 1', '001', 'Amiyasagar', 'amiyasagar@futurecalls.com', 'Amiyasagar', '9999999999', 'Administrator', '$2y$10$xOBweSjmgK/G8IMVmQsye.qsEcsteFhdQZDL5o7ZkeiPyrL9rR9Bi', 0, '2019-06-04 15:38:19', 1, NULL, '1', NULL),
(6, 'Internal User', 'remote', 'Chennai', 'Fc001456', 'Manikandan', 'manikandan@futurecalls.com', 'Manikandan.B', '9845612356', 'Super Admin', '$2y$10$jDj3x1.zEllz55E2n0pO8esVCzXvBeAIw87p69wIN2G5EK6oxANjq', 0, '2019-06-18 15:32:08', 2, '2019-06-21 07:14:54', '1', NULL),
(7, 'Internal User', 'remote', 'Chennai', 'FC00103', 'Pradeep V.Nair', 'pradeep@futurecalls.com', 'Pradeep V.Nair', '9884246046', 'Team leader', '$2y$10$WY5vNg7j7wnRU0XicT/yweVdMeFLigvV5bGxsaBxkeSAJdJ1SJ5Vq', 0, '2019-06-20 14:19:13', 2, '2019-06-20 08:49:30', '1', NULL),
(8, 'CUB5404', '', 'Chennai', 'CUB1001', 'City Union Bank', 'helpdesk@futurecalls.com', 'City Union Bank', '9843644039', 'Customer', '$2y$10$wY4NGQK.b42AimaqMfMaRuKO.cUUPH6lvK1llUzyukuZpHuDJ1d0m', 0, '2019-06-25 16:59:20', 2, '2019-06-26 05:55:49', '1', NULL),
(9, 'Customer', '', 'Chennai', 'FC1005', 'AGS Health Care', 'ags@gmail.com', 'AGS Health Care', '9884246046', 'Customer', '$2y$10$Y9OavZdxaO8RjCd3Awe8BOO8fUj8haUBWdUnn1lA1iNgoEGn9oequ', 0, '2019-06-25 17:00:09', 2, '2019-07-19 17:44:45', '1', NULL),
(10, 'TVS5604', '', 'Chennai', 'TVS1007', 'TVS Logistics', 'tvslogistics@gmail.com', 'TVS Logistics', '9845123658', 'Customer', '$2y$10$.BhoGyGD./j8uRdlcXUEbOALD2eTP.LssWvRfsNteA29Vn7Lxdmbu', 0, '2019-06-25 17:01:08', 2, '2019-06-26 05:57:38', '1', NULL),
(11, 'IRC1603', '', 'Chennai', 'IRCS1004', 'IRCS', 'test@futurecalls.com', 'IRCS', '9884246046', 'Customer', '$2y$10$jeFFNFtyWXb5ndQDPMxa8uamXxtpa/99nQ4dLyh1gwOsFQFiLsCHm', 0, '2019-06-25 17:03:52', 2, '2019-06-26 06:00:36', '1', NULL),
(12, 'Internal User', 'remote', 'Chennai', '188', 'Devakumar', 'devakumar@futurecalls.com', 'Devakumar', '9994178714', 'L3 support', '$2y$10$qUz42GSVhYY3uGVhwj4ys.VKiZcV5uaHow7UOitdt6Dhr26lxIlYW', 0, '2019-07-17 22:56:31', 1, NULL, '1', NULL),
(13, 'Internal User', 'remote', 'Chennai', '203', 'SURESH JULURI', 'suresh.j@futurecalls.com', 'SURESH JULURI', '8939991513', 'Team leader', '$2y$10$iiESXSP6PGA8yhBKZjHRSe0krGCnptbUOE0QKJaqMMBq67epca6b2', 0, '2019-07-17 23:12:00', 1, NULL, '1', NULL),
(14, 'Internal User', 'remote', 'Chennai', '212', 'DILLI BABU G', 'dillibabu@futurecalls.com', 'DILLI BABU G', '9884154605', 'L3 support', '$2y$10$hxNtphHVpjwiuK2WPJZt7.GqsznECl.crREwM3El79.GrfYEkC8M.', 0, '2019-07-17 23:13:09', 1, NULL, '1', NULL),
(16, 'Internal User', 'remote', 'Chennai', '252', 'KARTHIK R', 'karthik@futurecalls.com', 'KARTHIK R', '7904883593', 'L2 support', '$2y$10$EHnd9tTXJodgHk3IvhTubenf3yEzdcy2TJRq2v8qa1HQDwddECTd2', 0, '2019-07-17 23:15:40', 1, NULL, '1', NULL),
(17, 'Internal User', 'remote', 'Chennai', '304', 'KANNAN M', 'kannan@futurecalls.com', 'KANNAN M', '9999999999', 'L1 support', '$2y$10$WbegoTKy0ETINIoYFzF94eGXpS1AyVhM5zuzu0NH51VXwW1e6g2Lu', 0, '2019-07-17 23:16:38', 1, NULL, '1', NULL),
(18, 'Internal User', 'remote', 'Chennai', '301', 'T VENGADESHWARAN', 'vengadeshwaran@futurecalls.com', 'T VENGADESHWARAN', '7339274140', 'L1 support', '$2y$10$ILUonbeQbBK1YRgXTcVjC.3TKWZFpwyQm1Bs2WdtDou.UvEu/2yc.', 0, '2019-07-17 23:19:32', 1, NULL, '1', NULL),
(19, 'Internal User', 'remote', 'Chennai', '338', 'SUBRAT BEHERA', 'subrat@futurecalls.com', 'SUBRAT BEHERA', '8124356907', 'L1 support', '$2y$10$cSWziaO0eE/3HdOxvnaKSuOuyXh.BBw8hSDg3810obTQg0.g0jcMO', 0, '2019-07-17 23:25:37', 1, NULL, '1', NULL),
(20, 'Internal User', 'remote', 'Chennai', '349', 'THOMAS CHACKO', 'thomas@futurecalls.com', 'THOMAS CHACKO', '9999999999', 'L1 support', '$2y$10$aVJnSHxFtt3YNJA7VEzdSO3155OFg0TsW6waa8ocD/ShwzgUfDIEi', 0, '2019-07-17 23:27:35', 1, NULL, '1', NULL),
(21, 'Tir4111', '', 'Chennai', 'Thiru01', 'Tirumala Milk Pvt Ltd â€“ Sophos XG firewall', 'karthik.p@tirumala.com', 'Tirumala Milk Pvt Ltd â€“ Sophos XG firewall', '8939811522', 'Customer', '$2y$10$VO48u86xVdLEFNb6AESaaOchtPStraLr4JpQJYGd0Kn15qF2F.72O', 0, '2019-07-18 00:22:58', 1, NULL, '1', NULL),
(22, 'ISO4111', '', 'Chennai', 'IS002', 'ISOFT Pvt Ltd â€“ Fortinet Firewall', 'isoft@gmail.com', 'ISOFT Pvt Ltd â€“ Fortinet Firewall', '9164301284', 'Customer', '$2y$10$c6y2CYErJl4wpVEuz.PCRekw401LMfPH6CAuPp/NjszfT0.10v.PC', 0, '2019-07-18 00:26:51', 1, NULL, '1', NULL),
(23, 'Uni4211', '', 'Chennai', 'UE003', 'Universal Engineers Pvt Ltd â€“ Sophos XG firewall', 'test@gmail.com', 'Universal Engineers Pvt Ltd â€“ Sophos XG firewall', '8098521750', 'Customer', '$2y$10$3yvuRJvcSY4AfzaFudRthuTnRZd5Z3z7TKdM1/Qs8pl1Zg97opBma', 0, '2019-07-18 00:28:01', 1, NULL, '1', NULL),
(24, 'IGe4311', '', 'Chennai', 'IGE004', 'IGene Entertainment Services Private Limited - Fortinet Firewall', 'ragav.v@igeneindia.com', 'IGene Entertainment Services Private Limited - Fortinet Firewall', '9500070099', 'Customer', '$2y$10$/Uugx2rQhUcSChCMhY6mJetznPZVQutrLcabcIhbN5JpmeabuSwqq', 0, '2019-07-18 00:29:09', 1, NULL, '1', NULL),
(25, 'Alt4411', '', 'Chennai', 'AG005', 'Altacit Global â€“ Fortinet Firewall', 'itadmin@altacit.com', 'Altacit Global â€“ Fortinet Firewall', '8608899958', 'Customer', '$2y$10$3H/IG4JiyF5D/CVC0Xgc4eVhRL6W6ZDAZbUcLiPOEe36fkFTLCNNW', 0, '2019-07-18 00:30:10', 1, NULL, '1', NULL),
(26, 'Raj4711', '', 'Chennai', 'RH006', 'Rajesh Home', 'rajesh.kuppuswamy@gmail.com', 'Rajesh Home', '8939644441', 'Customer', '$2y$10$jUnvmjRa5WlykqXCK5E3WeWlEka4pJuTuu92vaFQyf1Sclm/PktcS', 0, '2019-07-18 00:30:59', 1, NULL, '1', NULL),
(27, 'SSS4811', '', 'Chennai', 'SSS007', 'SSSindia', 'arun@sssindia.com', 'SSSindia', '9940067660', 'Customer', '$2y$10$UqhnzN.jNzV6TWLTK3JVseLfpQB8O2ry71SCybqsn0q03fzmJKkW6', 0, '2019-07-18 00:32:03', 1, NULL, '1', NULL),
(28, 'Int4911', '', 'Chennai', 'IGT008', 'Integratech', 'test1@gmail.com', 'Integratech', '9994993082', 'Customer', '$2y$10$uyonJnaZmk/Fe3Bu.l2n2.95WqVUFLd8hAocc2MTjZ7qjeCUQmBCe', 0, '2019-07-18 00:32:55', 1, NULL, '1', NULL),
(29, 'Hun4911', '', 'Chennai', 'HB009', 'Hunt and Badge', 'venkat@interviewdesk.in', 'Hunt and Badge', '8015102909', 'Customer', '$2y$10$DEcGtzh08xd/jgtKcxoc3.MN9p4cx9ubdGChRbfYHl2E0RXtjEqmi', 0, '2019-07-18 00:33:39', 1, NULL, '1', NULL),
(30, 'Sun5011', '', 'Chennai', 'SDT010', 'Sun Data Tech', 'test2@gmail.com', 'Sun Data Tech', '7826024290', 'Customer', '$2y$10$3xknseMCtEBNhK/e2m2UWebUg8hY14vBjW74oaa1HWBHRrupre/gG', 0, '2019-07-18 00:34:46', 1, NULL, '1', NULL),
(31, 'Pra5111', '', 'Chennai', 'PBD011', 'Prabhat Dairy', 'test3@gmail.com', 'Prabhat Dairy', '9999999999', 'Customer', '$2y$10$5pqONyJ5w0xVtTkTzse/Z.TkhQBNZhcFs7kqt8ZXjIcWDnsOm3dky', 0, '2019-07-18 00:35:39', 1, NULL, '1', NULL),
(32, 'Uni5211', '', 'Chennai', 'UHC012', 'United Health Care', 'test4@gmail.com', 'United Health Care', '9999999999', 'Customer', '$2y$10$agxRvUGElYNVuMM2iaFm2.eP7G3h9b0FXsF7uMKSeaIs8gvicKV5.', 0, '2019-07-18 00:36:30', 1, NULL, '1', NULL),
(33, 'The5311', '', 'Chennai', 'TSE013', 'Thermal Syatems and Engineering', 'preetham.sadagopan@thermalsystems.in', 'Thermal Syatems and Engineering', '9600199049', 'Customer', '$2y$10$EN5jLyF5Xnz.P9LkO/4jE.1Fy7mpf4y3lUP7IG0qyxb.C7liTQog2', 0, '2019-07-18 00:37:42', 1, NULL, '1', NULL),
(34, 'Sun5311', '', 'Chennai', 'SM014', 'Sun Motors', 'fm@sunmotorschennai.com', 'Sun Motors', '9710543125', 'Customer', '$2y$10$a1LOagq0BFOqG0jujBAR0uF3XbevetjmCCf6PYkIafxUjJrxmcxze', 0, '2019-07-18 00:38:28', 1, NULL, '1', NULL),
(35, 'Ste0911', '', 'Chennai', 'SHR016', 'Sterling Holidays', 'Sterlingholidays@gmail.com', 'Sterling Holidays', '9999999999', 'Customer', '$2y$10$1O01iRE7r6XFA.xnPsgiQ.ssMOHpC7xZiI8HlWDQJqxibWZz2n7ZS', 0, '2019-07-18 22:50:59', 1, NULL, '1', NULL),
(36, 'Fun1011', '', 'Chennai', 'funs017', 'Funds India', 'funs@gmail.com', 'Funds India', '9999999999', 'Customer', '$2y$10$s02izgm0fQ0rwTJ57ru6WO36fGvBGjog3u4dlkeceoAzs7ZZ9W9rO', 0, '2019-07-18 22:52:03', 1, NULL, '1', NULL),
(37, 'Cit1111', '', 'Chennai', 'CUB018', 'City Union Bank', 'cub@gmail.com', 'City Union Bank', '9999999999', 'Customer', '$2y$10$1vcevPTBzjTE.PLbCcV3.ueqnGcFVgmefcr012VScZoVjtGM1CvPy', 0, '2019-07-18 22:53:39', 1, NULL, '1', NULL),
(38, 'LN1211', '', 'Chennai', 'lnt019', 'L&T Infotech', 'lnt@gmail.com', 'L&T Infotech', '9999999999', 'Customer', '$2y$10$jods22iKBmUHItMRlsmyoOPA9arqOfgJUuZasEHKhdCHwX4F4MA7y', 0, '2019-07-18 22:54:42', 1, NULL, '1', NULL),
(39, 'Inf1311', '', 'Chennai', 'Info020', 'Infosys CPC', 'infosyscpc@gmail.com', 'Infosys CPC', '9999999999', 'Customer', '$2y$10$35qKceo3FTO3KlTD60TYn.rsgH.h2h8P6Y9kzHTsqnb08vIhd7D52', 0, '2019-07-18 22:55:38', 1, NULL, '1', NULL),
(40, 'Inf1311', '', 'Chennai', 'Info021', 'Infosys TDS', 'infosystds@gmail.com', 'Infosys TDS', '9999999999', 'Customer', '$2y$10$YB.wDYKH3AUwJkz1VRi6eeurvDIhZludbr0G0QeTIrq38nA.ZNVeW', 0, '2019-07-18 22:56:42', 1, NULL, '1', NULL),
(41, 'Inf1411', '', 'Chennai', 'Info022', 'Infosys MCA', 'infosymca@gmail.com', 'Infosys MCA', '9999999999', 'Customer', '$2y$10$4ZGOK6JP2eZ0gC44GJDOg.tpKGKdAOoDZtMr1qiC/un8RFj3H1Tmq', 0, '2019-07-18 22:57:40', 1, NULL, '1', NULL),
(42, 'Sod1411', '', 'Chennai', 'ssi023', 'Sodexo', 'Sodexo@gmail.com', 'Sodexo', '9999999999', 'Customer', '$2y$10$lzbFtI7sJCgVPbecwuRj3OwQqkpfPEiL7/sBkWaV7QLWfz7lT1Fnq', 0, '2019-07-18 22:58:30', 1, NULL, '1', NULL),
(43, 'Internal User', 'remote', 'Chennai', '054', 'Venkatesan M', 'Venkatesan@futurecalls.com', 'Venkatesan', '9999999999', 'Service Head', '$2y$10$/hBqBX/BDZpH6lHmM3j0bOuhcVlLfGXP/o8v5EcGHC24ZOl.fgz4O', 0, '2019-07-22 00:03:58', 2, '2019-07-22 20:40:41', '1', NULL),
(44, 'Internal User', 'remote', 'Chennai', '056', 'sagar', 'sagar@futurecalls.com', 'sagar', '9999999999', 'L3 support', '$2y$10$hlVjS7Z.jFH/apMvfYYUY.e/QeDvKkB4Ql6VlnPJ2jf0VAr1ZwbVS', 1, '2019-07-22 00:05:05', 2, '2019-07-23 17:43:26', '1', NULL),
(45, 'Tir4111', '', 'Chennai', 'test123', 'test1234', 'test123@gmail.com', 'test1234', '8745124578', 'Customer', '$2y$10$KLFQbVAdrpw3U7KOsg6lQuJjBvLuduZlrMqOIjqPwCenCl5JtCP5G', 0, '2019-07-22 03:43:21', 1, NULL, '1', NULL),
(46, 'Internal User', 'remote', 'Chennai', '0569', 'TAMILARASAN P', 'tamilarasan@futurecalls.com', 'TAMILARASAN P', '9999999999', 'Team leader', '$2y$10$9AuDmGEx7sEWKhoDW2pfYOlGb26EgqFamYV3ROQAX9jhZ06XaxaXC', 0, '2019-07-22 21:40:30', 2, '2019-07-23 17:10:47', '1', NULL),
(47, 'Rub5002', '', 'Chennai', 'ruby001', 'Ruby', 'ruby@gmail.com', 'Ruby', '9999999999', 'Customer', '$2y$10$w7yUBP8MYTbAv6dptCLyKuYPPzKf37i47XHwenDPDELbPvlGO.itS', 0, '2019-07-22 22:49:16', 1, NULL, '1', NULL),
(48, 'Gem0403', '', 'Chennai', 'gem002', 'Gem Hospital', 'gem@gmail.com', 'Gem Hospital', '9999999999', 'Customer', '$2y$10$BkkXNeQFoIcpRDAvfIRuGucTInNVjeF0OhQ3tdRlLgdfPK/yPRI6C', 0, '2019-07-22 22:50:17', 1, NULL, '1', NULL),
(49, 'SRM1003', '', 'Chennai', 'srm003', 'SRM', 'srm@gmail.com', 'SRM', '9999999999', 'Customer', '$2y$10$FZWwxh6ledohnG4s2TsAJOZEqowzUI5UX4APoU1dH98gMili0Bjvq', 0, '2019-07-22 22:51:01', 1, NULL, '1', NULL),
(50, 'CGP1103', '', 'Chennai', 'cgp004', 'CGPolice', 'cgp@gmail.com', 'CGPolice', '9999999999``', 'Customer', '$2y$10$ZmdE47Tsdt2EJpV9drlDeOEO0QOxFEz8uR8opPEeN8RRE0kae2cy.', 0, '2019-07-22 22:52:13', 1, NULL, '1', NULL),
(51, 'VMC1203', '', 'Chennai', 'vmch005', 'VMCH', 'vmch@gmail.com', 'VMCH', '9999999999', 'Customer', '$2y$10$FGphUp52HfCLFoQyLmcbdOhK/5tTpY7AYW1N4zRKMy6JLZx7mUJd.', 0, '2019-07-22 22:53:11', 1, NULL, '1', NULL),
(52, 'Sta1303', '', 'Chennai', 'sdx009', 'Standex', 'standex@gmail.com', 'Standex', '9999999999', 'Customer', '$2y$10$qsUvV0DggGj6/R5qrp1i4e7PL8W.4OqwdjLboK4GoUwPaJ4d2p92m', 0, '2019-07-22 22:57:22', 1, NULL, '1', NULL),
(53, 'God1403', '', 'Chennai', 'god010', 'God Tv', 'godtv@gmail.com', 'God Tv', '9999999999', 'Customer', '$2y$10$UKFbh4im60WUF1cQMG5p8.ovVmMQMGY5Sugh3cog1DvllKW8OPi5K', 0, '2019-07-22 22:58:19', 1, NULL, '1', NULL),
(54, 'ABA1503', '', 'Chennai', 'aban012', 'ABAN', 'aban@gmail.com', 'ABAN', '9999999999', 'Customer', '$2y$10$NTifePtSMYvnPFhudnAXr.LBZER4oSg2jHoKPmyPelQsIocMPoRHu', 0, '2019-07-22 22:59:12', 1, NULL, '1', NULL),
(55, 'GRT1503', '', 'Chennai', 'grt0123', 'GRT', 'grt@gmail.com', 'GRT', '9999999999', 'Team leader', '$2y$10$Q/QYBfxo2hj/hRpQxMSPM.O3fONsC7215sCCuvqCDMoythoSSgPda', 0, '2019-07-22 23:00:02', 1, NULL, '1', NULL),
(56, 'VSH1703', '', 'Chennai', 'vsh032', 'VS Hospital', 'vsh@gmail.com', 'VS HOSPITAL', '9999999999', 'Customer', '$2y$10$2wXy3.iJ2BEd55htvCILh.ucGS2yP/N0itvWdzIt2JfcquXiskx7m', 0, '2019-07-22 23:00:51', 1, NULL, '1', NULL),
(57, 'Kum1803', '', 'Chennai', 'kum065', 'Kumaran Hospital', 'kumaran@gmail.com', 'Kumaran hospital', '9999999999', 'Customer', '$2y$10$jTPNY8fUNzrSFs57tv7u5.cRwDQpewAf4mDmmXLYwd9o3Wk..G6oS', 0, '2019-07-22 23:01:59', 1, NULL, '1', NULL),
(58, 'SUN1903', '', 'Chennai', 'sunny564', 'Sunny Soft', 'sunnysoft@gmail.com', 'SUNNY SOFT', '9999999999', 'Customer', '$2y$10$Fq2Tffe3nNs4v/tzJZEvfuQ.XFLnEFyxTTev0ZYqJi25s/Xgrfu8i', 0, '2019-07-22 23:03:09', 1, NULL, '1', NULL),
(59, 'Pan2103', '', 'Chennai', 'pec465', 'Panimalar', 'panimalar@gmail.com', 'Panimalar', '9999999999', 'Customer', '$2y$10$9wUNS9lpHALNhbg6AZiiuu0MDXBdfZlz/1wlCLOefkzl7uMpd055a', 0, '2019-07-22 23:04:22', 1, NULL, '1', NULL),
(60, 'Red3712', '', 'Chennai', 'red446', 'Redgrape', 'redgrape@gmail.com', 'Redgrape', '9999999999', 'Customer', '$2y$10$/QVSHmTZazVfl7D.fD5wquIrTZ6q11r2Ddavgr2BMHdtoNm50nGvK', 0, '2019-07-22 23:05:14', 1, NULL, '1', NULL),
(61, 'Gan5312', '', 'Chennai', 'ganges64', 'Ganges', 'ganges@gmail.com', 'Ganges', '9999999999', 'Customer', '$2y$10$tvshfD84AXYcfW98jXziPuvgCaaNHTC.RYdnFsYPwr7FtydYN3Ewu', 0, '2019-07-22 23:06:16', 1, NULL, '1', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent_master`
--
ALTER TABLE `agent_master`
  ADD PRIMARY KEY (`agent_id`);

--
-- Indexes for table `campaign_client`
--
ALTER TABLE `campaign_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaign_master`
--
ALTER TABLE `campaign_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaign_service`
--
ALTER TABLE `campaign_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_location`
--
ALTER TABLE `client_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_master`
--
ALTER TABLE `client_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_service`
--
ALTER TABLE `client_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `closed_tickets`
--
ALTER TABLE `closed_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `encryption_test`
--
ALTER TABLE `encryption_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knowledge_base`
--
ALTER TABLE `knowledge_base`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginhistory`
--
ALTER TABLE `loginhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_master`
--
ALTER TABLE `notification_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outbound_campaign`
--
ALTER TABLE `outbound_campaign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outbound_history`
--
ALTER TABLE `outbound_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_temp`
--
ALTER TABLE `password_reset_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rolebased_user`
--
ALTER TABLE `rolebased_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_master`
--
ALTER TABLE `role_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_master`
--
ALTER TABLE `service_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sla_config`
--
ALTER TABLE `sla_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sla_master`
--
ALTER TABLE `sla_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `target_master`
--
ALTER TABLE `target_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `update_status`
--
ALTER TABLE `update_status`
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
-- AUTO_INCREMENT for table `agent_master`
--
ALTER TABLE `agent_master`
  MODIFY `agent_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `campaign_client`
--
ALTER TABLE `campaign_client`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `campaign_master`
--
ALTER TABLE `campaign_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `campaign_service`
--
ALTER TABLE `campaign_service`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `client_location`
--
ALTER TABLE `client_location`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `client_master`
--
ALTER TABLE `client_master`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `client_service`
--
ALTER TABLE `client_service`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `closed_tickets`
--
ALTER TABLE `closed_tickets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `encryption_test`
--
ALTER TABLE `encryption_test`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `knowledge_base`
--
ALTER TABLE `knowledge_base`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `loginhistory`
--
ALTER TABLE `loginhistory`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=401;
--
-- AUTO_INCREMENT for table `notification_master`
--
ALTER TABLE `notification_master`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `outbound_campaign`
--
ALTER TABLE `outbound_campaign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `outbound_history`
--
ALTER TABLE `outbound_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `password_reset_temp`
--
ALTER TABLE `password_reset_temp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `rolebased_user`
--
ALTER TABLE `rolebased_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `role_master`
--
ALTER TABLE `role_master`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `service_master`
--
ALTER TABLE `service_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sla_config`
--
ALTER TABLE `sla_config`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;
--
-- AUTO_INCREMENT for table `sla_master`
--
ALTER TABLE `sla_master`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `target_master`
--
ALTER TABLE `target_master`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `update_status`
--
ALTER TABLE `update_status`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
