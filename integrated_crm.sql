-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2020 at 08:13 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `integrated_crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `actiontaken`
--

CREATE TABLE `actiontaken` (
  `id` int(11) NOT NULL,
  `actiontaken` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actiontaken`
--

INSERT INTO `actiontaken` (`id`, `actiontaken`, `created_at`) VALUES
(1, 'Requirements Noted..', '2019-09-30 06:02:53'),
(2, 'Solutions Proposed', '2019-09-30 06:02:53'),
(3, 'Demo Scheduled', '2019-09-30 06:02:53'),
(4, 'Proposal Sent', '2019-09-30 06:02:53'),
(5, 'Negotiations', '2019-09-30 06:02:53'),
(6, 'Po Collected', '2019-09-30 06:02:53');

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
(1, '1', 'pradeep@futurecalls.com', 'Team leader'),
(2, '1', 'devakumar@futurecalls.com', 'L3 support'),
(3, '1', 'suresh.j@futurecalls.com', 'Team leader'),
(4, '1', 'dillibabu@futurecalls.com', 'L3 support'),
(5, '1', 'kannan@futurecalls.com', 'L1 support'),
(6, '1', 'sagar@futurecalls.com', 'L3 support'),
(7, '2', 'sakthivel@futurecalls.com', 'L3 support'),
(8, '2', 'shahinsha@futurecalls.com', 'Team leader'),
(9, '3', 'karthik@futurecalls.com', 'L2 support'),
(10, '3', 'vengadeshwaran@futurecalls.com', 'L1 support'),
(11, '3', 'subrat@futurecalls.com', 'L1 support'),
(12, '3', 'tamilarasan@futurecalls.com', 'Team leader'),
(13, '1', 'akash.sachdev@futurecalls.com', 'L2 support'),
(14, '1', 'prasad@futurecalls.com', 'L1 support'),
(15, '1', 'thomas@futurecalls.com', 'L1 support');

-- --------------------------------------------------------

--
-- Table structure for table `amc_master`
--

CREATE TABLE `amc_master` (
  `id` int(10) NOT NULL,
  `clientname` varchar(250) DEFAULT NULL,
  `client_ID` varchar(250) DEFAULT NULL,
  `contact_person` varchar(250) DEFAULT NULL,
  `number` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `vertical` varchar(250) DEFAULT NULL,
  `oem` varchar(250) DEFAULT NULL,
  `product` varchar(250) DEFAULT NULL,
  `ordervalue` varchar(250) DEFAULT NULL,
  `start_date` varchar(250) DEFAULT NULL,
  `end_date` varchar(250) DEFAULT NULL,
  `accountmanager` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amc_master`
--

INSERT INTO `amc_master` (`id`, `clientname`, `client_ID`, `contact_person`, `number`, `email`, `vertical`, `oem`, `product`, `ordervalue`, `start_date`, `end_date`, `accountmanager`, `created_at`) VALUES
(1, 'VRCM', 'VRC0710', 'VRCM', '9787141830', 'pradeep@futurecalls.com', '1', '1', 'Avaya IPO', '240000', '', '', 'pradeep@futurecalls.com', '2020-01-28 10:07:43'),
(2, 'Panimalar', 'Pan3401', 'Panimalar Hospital', '', 'rajesekar@gmail.com', '1', '21', 'XTEND BILLING SOFTWARE', '23600', '2020-02-06', '2021-02-05', 'tamilarasan@futurecalls.com', '2020-02-05 13:34:46'),
(3, 'AXIS WIND FARMS (RAYALASEEMA) PRIVATE LIMITED', 'AXI4106', 'AXIS WIND FARMS (RAYALASEEMA) PRIVATE LIMITED', '', 'AXIS WIND FARMS (RAYALASEEMA) PRIVATE LIMITED', '2', '22', 'Cabeling', '46830', '', '', 'mazhar@futurecalls.com', '2020-02-06 18:41:09'),
(4, 'Zenonline', 'Zen5209', 'Jagadish', '', 'pradeep@futurecalls.com', '1', '1', 'Avaya IPO', '48000', '', '', 'pradeep@futurecalls.com', '2020-02-10 09:52:57');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_client`
--

CREATE TABLE `campaign_client` (
  `id` int(10) NOT NULL,
  `campaign_id` varchar(250) DEFAULT NULL,
  `clientID` varchar(250) DEFAULT NULL,
  `process` varchar(250) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp()
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
  `callscript` text DEFAULT NULL,
  `campaignname` varchar(255) NOT NULL,
  `campaigndescrip` varchar(500) NOT NULL,
  `modeofcomm` varchar(255) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaign_master`
--

INSERT INTO `campaign_master` (`id`, `campaigntype`, `campaignID`, `callscript`, `campaignname`, `campaigndescrip`, `modeofcomm`, `email`, `created_at`) VALUES
(1, 'Inbound', 'Con4905', NULL, 'Contact Center', 'contact center department', 'email,oncall', 'helpdesk@futurecalls.com', '2019-12-06 06:07:30'),
(2, 'Inbound', 'Inf5005', NULL, 'Information Security', 'information security', 'email,oncall', 'santhiya@futurecalls.com', '2019-12-09 10:34:24'),
(3, 'Inbound', 'Net5105', NULL, 'Network and Data', 'networking', 'email,oncall', 'veera1@futurecalls.com', '2019-12-20 13:22:18'),
(4, 'Inbound', 'FTO5105', NULL, 'FTOSS', 'crm support', 'email,oncall', 'manikandan@futurecalls.com', '2020-01-23 06:07:51'),
(5, 'Inbound', 'Tel4102', NULL, 'Telecom', 'Managed Telecom(TATA)', 'email,oncall', 'pradeep@futurecalls.com', '2019-11-21 06:47:26'),
(6, 'Inbound', 'sms5006', NULL, 'sms', 'sms', 'oncall,onweb', 'veera@futurecalls.com', '2019-12-20 13:22:26');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_service`
--

CREATE TABLE `campaign_service` (
  `id` int(10) NOT NULL,
  `campaign_id` varchar(250) NOT NULL,
  `service_id` int(10) NOT NULL,
  `servicename` varchar(250) DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaign_service`
--

INSERT INTO `campaign_service` (`id`, `campaign_id`, `service_id`, `servicename`, `created`) VALUES
(17, '1', 1, 'Avaya Support', '2019-11-28 16:26:31'),
(18, '1', 2, 'Altitude Support', '2019-11-28 16:26:31'),
(19, '1', 5, 'Martrix Support', '2019-11-28 16:26:32'),
(20, '1', 6, 'Contaque Support', '2019-11-28 16:26:32'),
(21, '2', 4, 'Firewall Support', '2019-11-28 16:26:57'),
(22, '2', 7, 'Security Support', '2019-11-28 16:26:57'),
(23, '3', 3, 'Network Support', '2019-11-28 16:27:10'),
(25, '5', 9, 'Telecom Support', '2019-11-28 16:27:24'),
(27, '4', 8, 'software support', '2019-12-06 12:57:17'),
(28, '6', 12, 'sms support', '2019-12-20 19:05:24'),
(29, '6', 10, 'others', '2020-01-23 12:27:47'),
(30, '6', 11, 'Internal support', '2020-01-23 12:27:47');

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
  `created_at` datetime DEFAULT current_timestamp()
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_master`
--

INSERT INTO `client_master` (`id`, `clientname`, `client_ID`, `contact_person`, `number`, `start_date`, `end_date`, `support_time`, `support_type`, `documents`, `created_at`) VALUES
(1, 'Tirumala Milk Pvt Ltd', 'Tir4111', 'Karthick', '8939811522', '2019-01-01', '2021-01-01', '8/5', 'remote', '', '2019-07-18 00:41:01'),
(2, 'ISOFT Pvt Ltd', 'ISO4111', 'Sathish', '9164301284', '2019-01-01', '2020-01-01', '8/5', 'remote', '', '2019-07-18 00:41:59'),
(3, 'Universal Engineers Pvt Ltd', 'Uni4211', 'Vignesh', '8098521750', '2019-01-01', '2022-01-01', '8/5', 'remote', '', '2019-07-18 00:42:49'),
(4, 'IGene Entertainment Services Private Limited', 'IGe4311', 'Ragav', '9500070099', '2019-01-01', '2020-01-01', '8/5', 'remote', '', '2019-07-18 00:43:27'),
(5, 'Altacit Global', 'Alt4411', 'Prakash', '8608899958', '2019-01-01', '2022-01-01', '8/5', 'remote', '', '2019-07-18 00:44:16'),
(6, 'Rajesh Hom', 'Raj4711', 'Rajesh', '8939644441', '2019-01-01', '2020-01-01', '8/5', 'remote', '', '2019-07-18 00:47:41'),
(7, 'SSSindia (Auditor)', 'SSS4811', 'Arun', '9940067660', '2019-01-01', '2020-01-01', '8/5', 'remote', '', '2019-07-18 00:48:28'),
(8, 'Integratech', 'Int4911', 'Shankar', '9994993082', '2019-01-01', '2020-01-01', '8/5', 'remote', '', '2019-07-18 00:49:01'),
(9, 'Hunt and Badge', 'Hun4911', 'Venkat', '8015102909', '2019-01-01', '2022-01-01', '8/5', 'remote', '', '2019-07-18 00:49:41'),
(10, 'Sun Data Tech', 'Sun5011', 'Suresh', '7826024290', '2019-01-01', '2022-01-01', '8/5', 'remote', '', '2019-07-18 00:50:12'),
(11, 'Prabhat Dairy', 'Pra5111', 'Prabhat', '99999999999', '2019-01-01', '2022-01-01', '8/5', 'remote', '', '2019-07-18 00:51:51'),
(12, 'United Health Care', 'Uni5211', 'United Health Care', '9999999991', '2019-01-01', '2022-01-01', '8/5', 'remote', '', '2019-07-18 00:52:37'),
(13, 'Thermal Syatems and Engineering', 'The5311', 'Ranganathan', '9566955954', '2019-01-01', '2022-01-01', '8/5', 'remote', '', '2019-07-18 00:53:16'),
(14, 'Sun Motors', 'Sun5311', 'Sailesh', '9710543125', '2019-01-01', '2022-01-01', '8/5', 'remote', '', '2019-07-18 00:53:53'),
(15, 'Sterling Holidays Resorts Limited', 'Ste0911', 'Sterling', '9999999999', '2019-07-19', '2020-03-18', '8/5', 'remote', '', '2019-07-19 00:09:50'),
(16, 'Funds India', 'Fun1011', 'Funds India', '9999999999', '2019-07-19', '2020-02-29', '8/5', 'remote', '', '2019-07-19 00:10:28'),
(17, 'City Union Bank', 'Cit1111', 'CUB', '9999999999', '2019-07-01', '2020-05-30', '8/5', 'remote', '', '2019-07-19 00:11:02'),
(18, 'L&T Infotech', 'LN1211', 'L&T Infotech', '9999999999', '2019-07-18', '2020-02-18', '8/5', 'remote', '', '2019-07-19 00:12:40'),
(19, 'Infosys CPC', 'Inf1311', 'Infosys CPC', '9999999999', '2019-07-19', '2020-03-28', '8/5', 'remote', '', '2019-07-19 00:13:11'),
(20, 'Infosys TDS', 'Inf1311', 'Infosys TDS', '9999999999', '2019-07-17', '2020-03-18', '8/5', 'remote', '', '2019-07-19 00:13:35'),
(21, 'Infosys MCA', 'Inf1411', 'Infosys MCA', '9999999999', '2019-07-25', '2020-02-28', '8/5', 'remote', '', '2019-07-19 00:14:06'),
(22, 'Sodexo SVC India Pvt Ltd', 'Sod1411', 'Sodexo', '9999999999', '2019-07-18', '2020-05-22', '8/5', 'remote', '', '2019-07-19 00:14:43'),
(23, 'Ruby', 'Rub5002', 'Ruby', '9999999999', '2019-07-18', '2020-01-31', '8/5', 'remote', '', '2019-07-19 03:50:20'),
(24, 'Gem Hospital', 'Gem0403', 'Gem Hospital', '9999999999', '2019-07-24', '2020-04-24', '8/5', 'remote', '', '2019-07-19 04:04:43'),
(25, 'SRM', 'SRM1003', 'SRM', '9999999999', '2019-07-19', '2020-03-19', '8/5', 'remote', '', '2019-07-19 04:10:17'),
(26, 'CG Police', 'CGP1103', 'CG Police', '9999999999', '2019-07-19', '2020-03-11', '24/7', 'remote', '', '2019-07-19 04:11:09'),
(27, 'VMCH', 'VMC1203', 'VMCH', '9999999999', '2019-07-19', '2020-01-18', '8/5', 'remote', '', '2019-07-19 04:12:58'),
(28, 'Standex', 'Sta1303', 'Standex', '9999999999', '2019-07-19', '2020-01-24', '8/5', 'remote', '', '2019-07-19 04:13:30'),
(29, 'God Tv', 'God1403', 'God Tv', '9999999999', '2019-07-19', '2020-02-20', '8/5', 'remote', '', '2019-07-19 04:14:21'),
(30, 'ABAN', 'ABA1503', 'aban', '9999999999', '2019-07-19', '2020-04-23', '8/5', 'remote', '', '2019-07-19 04:15:05'),
(31, 'GRT', 'GRT1503', 'grt', '9999999999', '2019-07-19', '2020-03-20', '8/5', 'remote', '', '2019-07-19 04:15:42'),
(32, 'IRCS', 'IRC1603', 'ircs', '9999999999', '2019-07-19', '2020-03-31', '8/5', 'remote', '', '2019-07-19 04:16:14'),
(33, 'VS HOSPITAL', 'VSH1703', 'VS HOSPITAL', '9999999999', '2019-07-19', '2020-05-21', '8/5', 'remote', '', '2019-07-19 04:17:06'),
(34, 'Kumaran hospital', 'Kum1803', 'Kumaran hospital', '9999999999', '2019-07-19', '2019-12-31', '8/5', 'remote', '', '2019-07-19 04:18:57'),
(35, 'SUNNYSOFT', 'SUN1903', 'Sunnysoft', '9999999999', '2019-07-19', '2020-05-28', '8/5', 'remote', '', '2019-07-19 04:19:47'),
(36, 'Panimalar Engineering College', 'Pan2103', 'Panimalar', '9999999999', '2019-07-19', '2020-07-31', '8/5', 'remote', '', '2019-07-19 04:21:10'),
(37, 'Redgrape', 'Red3712', 'Redgrape', '9999999999', '2019-07-18', '2019-09-20', '24/7', 'remote', '', '2019-07-22 01:37:17'),
(38, 'Ganges Internationale Pvt Ltd', 'Gan5312', 'Ganges Internationale Pvt Ltd', '9999999999', '2019-07-18', '2020-03-06', '24/7', 'remote', '', '2019-07-22 01:53:09'),
(39, 'TVS logistics', 'TVS4711', 'Mr. Deviprakash', '1234567893', '2019-07-24', '2019-07-25', '8/5', 'remote', '', '2019-07-24 00:47:37'),
(40, 'Hexaware Technologies', 'Hex0901', 'Test', '8745124578', '2019-07-24', '2019-08-29', '24/7', 'remote', '', '2019-07-24 02:09:32'),
(41, 'CASA GRAND', 'CAS1201', 'test', '9999999999', '2019-07-24', '2019-11-30', '24/7', 'remote', '', '2019-07-24 02:12:50'),
(42, 'Shriram value', 'Shr0604', 'Mr. Anand', '9787141830', '2019-07-24', '2019-07-24', '8/5', 'remote', '', '2019-07-24 05:06:17'),
(43, 'Spark capital', 'Spa1801', 'Arun', '9791710903', '2019-07-26', '2019-07-26', '8/5', 'remote', '', '2019-07-26 02:18:49'),
(44, 'IFCI', 'IFC1010', 'Gopalakrishnan', '9876543267', '2019-07-10', '2019-08-01', '8/5', 'remote', '', '2019-07-29 23:10:42'),
(45, 'viveks', 'viv0011', 'caroline', '7358332211', '2019-07-31', '2020-09-30', '8/5', 'remote', '', '2019-07-31 00:00:42'),
(46, 'Futurecalls Technology', 'Fut5012', '***', '0987654321', '2019-08-01', '2019-08-31', '8/5', 'remote', '', '2019-08-01 01:50:15'),
(47, 'Parsec Telesystems Pvt. Ltd.', 'Par2110', 'Pranjol', '0077889966', '2019-08-08', '2020-08-09', '8/5', 'remote', '', '2019-08-08 23:21:04'),
(48, 'Shriram City Finance', 'Shr1511', 'Raghu', '0987654321', '2019-06-13', '2021-09-17', '8/5', 'remote', '', '2019-08-31 00:15:56'),
(49, 'Watanmal Pvt Ltd', 'Wat1811', 'Sundar', '0987657898', '2018-10-01', '2021-01-01', '8/5', 'remote', '', '2019-08-31 00:18:53'),
(50, 'grt hotel  thiruthani', 'grt4110', 'Karthick', '9787141830', '2019-09-12', '2019-12-31', '8/5', 'remote', '', '2019-09-11 23:41:22'),
(51, 'HLL Bio Tech', 'HLL2811', 'Nijandhan', '0987654321', '2019-09-17', '2021-09-22', '8/5', 'remote', '', '2019-09-18 00:28:11'),
(52, 'Integra Software pvt ltd', 'Int1811', 'Sridharan', '0987654321', '2019-10-01', '2019-11-30', '8/5', 'remote', '', '2019-11-01 00:18:04'),
(53, 'TeleBuy India Pvt Ltd', 'Tel2211', 'Vasanth', '0987654321', '2019-10-20', '2019-01-31', '8/5', 'remote', '', '2019-11-01 00:22:50'),
(54, 'AGS Health', 'AGS4310', 'Bala', '0987654321', '2019-11-06', '2019-12-31', '8/5', 'remote', '', '2019-11-05 23:43:34'),
(55, 'New Horizon', 'New0804', 'Satya', '0987654321', '2019-11-06', '2019-12-31', '8/5', 'remote', '', '2019-11-06 05:08:56'),
(56, 'Cogent Innovations', 'Cog1210', 'Gulam', '0987654321', '2019-11-20', '2020-12-31', '8/5', 'remote', '', '2019-11-26 23:12:35'),
(57, 'SPIC', 'SPI1410', 'Raja Gopalan', '0987654321', '2019-11-26', '2020-12-31', '8/5', 'remote', '', '2019-11-26 23:14:14'),
(58, 'Malles Constructions', 'Mal1710', 'xxx', '0987654321', '2019-11-01', '2020-12-31', '8/5', 'remote', '', '2019-11-26 23:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `client_service`
--

CREATE TABLE `client_service` (
  `id` int(10) NOT NULL,
  `client_ID` varchar(250) DEFAULT NULL,
  `service` varchar(250) DEFAULT NULL,
  `service_id` int(10) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_service`
--

INSERT INTO `client_service` (`id`, `client_ID`, `service`, `service_id`, `created_at`) VALUES
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
(51, 'CGP1103', 'Altitude Support', 2, '2019-07-19 02:41:09'),
(52, 'VMC1203', 'Avaya Support', 1, '2019-07-19 02:42:58'),
(53, 'Sta1303', 'Avaya Support', 1, '2019-07-19 02:43:30'),
(54, 'God1403', 'Avaya Support', 1, '2019-07-19 02:44:21'),
(58, 'VSH1703', 'Network Support', 3, '2019-07-19 02:47:06'),
(59, 'VSH1703', 'Martrix Support', 5, '2019-07-19 02:47:06'),
(61, 'SUN1903', 'Network Support', 3, '2019-07-19 02:49:47'),
(62, 'Pan2103', 'Network Support', 3, '2019-07-19 02:51:10'),
(63, 'Red3712', 'Avaya Support', 1, '2019-07-22 00:07:17'),
(64, 'Gan5312', 'Avaya Support', 1, '2019-07-22 00:23:09'),
(65, 'TVS4711', 'Martrix Support', 5, '2019-07-23 23:17:37'),
(66, 'Hex0901', 'Altitude Support', 2, '2019-07-24 00:39:32'),
(67, 'CAS1201', 'Altitude Support', 2, '2019-07-24 00:42:50'),
(68, 'Shr0604', 'Martrix Support', 5, '2019-07-24 03:36:17'),
(69, 'GRT1503', 'Avaya Support', 1, '2019-07-24 22:15:11'),
(70, 'GRT1503', 'Martrix Support', 5, '2019-07-24 22:15:11'),
(74, 'Spa1801', 'Martrix Support', 5, '2019-07-26 00:48:49'),
(75, 'Kum1803', 'Avaya Support', 1, '2019-07-29 00:50:23'),
(76, 'Kum1803', 'Network Support', 3, '2019-07-29 00:50:23'),
(77, 'The5311', 'Firewall Support', 4, '2019-07-29 21:34:38'),
(78, 'The5311', 'Others', 10, '2019-07-29 21:34:38'),
(79, 'IFC1010', 'Firewall Support', 4, '2019-07-29 21:40:42'),
(81, 'viv0011', 'Avaya Support', 1, '2019-07-30 22:33:04'),
(82, 'SRM1003', 'Network Support', 3, '2019-07-31 02:49:36'),
(89, 'Fut5012', 'Network Support', 3, '2019-08-01 02:21:18'),
(90, 'Fut5012', 'Firewall Support', 4, '2019-08-01 02:21:18'),
(91, 'Fut5012', 'Contaque Support', 6, '2019-08-01 02:21:18'),
(92, 'Fut5012', 'Security Support', 7, '2019-08-01 02:21:18'),
(93, 'Fut5012', 'Others', 10, '2019-08-01 02:21:18'),
(94, 'Fut5012', 'Internal Support', 11, '2019-08-01 02:21:18'),
(95, 'Par2110', 'Firewall Support', 4, '2019-08-08 21:51:04'),
(96, 'Par2110', 'Security Support', 7, '2019-08-08 21:51:04'),
(97, 'ABA1503', 'Avaya Support', 1, '2019-08-18 23:28:34'),
(98, 'Shr1511', 'Firewall Support', 4, '2019-08-31 11:15:57'),
(99, 'Wat1811', 'Firewall Support', 4, '2019-08-31 11:18:53'),
(100, 'grt4110', 'Martrix Support', 5, '2019-09-12 10:41:22'),
(101, 'HLL2811', 'Firewall Support', 4, '2019-09-18 11:28:11'),
(102, 'Int1811', 'Firewall Support', 4, '2019-11-01 11:18:04'),
(103, 'Tel2211', 'Firewall Support', 4, '2019-11-01 11:22:50'),
(104, 'AGS4310', 'Firewall Support', 4, '2019-11-06 10:43:34'),
(105, 'New0804', 'Firewall Support', 4, '2019-11-06 16:08:56'),
(106, 'Cog1210', 'Firewall Support', 4, '2019-11-27 10:12:35'),
(107, 'SPI1410', 'Firewall Support', 4, '2019-11-27 10:14:14'),
(108, 'Mal1710', 'Firewall Support', 4, '2019-11-27 10:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `closedtickets`
--

CREATE TABLE `closedtickets` (
  `id` int(10) NOT NULL,
  `clientID` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `number` varchar(255) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `severity` varchar(250) NOT NULL,
  `ticketID` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `closing_status` int(10) NOT NULL DEFAULT 0,
  `campaign_ID` varchar(250) DEFAULT NULL,
  `process` varchar(250) NOT NULL,
  `assigned_to` varchar(250) DEFAULT NULL,
  `action` text NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `closed_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `closedtickets`
--

INSERT INTO `closedtickets` (`id`, `clientID`, `email`, `number`, `subject`, `description`, `severity`, `ticketID`, `status`, `closing_status`, `campaign_ID`, `process`, `assigned_to`, `action`, `created_date`, `closed_at`) VALUES
(1, 'TVS5604', NULL, NULL, 'campaign test', 'test ticket', 'P2', '291132', 'Close', 2, 'Cam1705', '7', 'sakthivel@futurecalls.com', 'Issue Resolved', '2019-06-26 11:29:32', '2019-06-28 12:50:51'),
(2, 'Cit1111', NULL, NULL, 'CUB - Ticketing Server Migration', 'City Union Bank - Ticketing Server Migration from DR to Chennai DC', 'P4', 'V370427', 'Close', 2, '1', '2', 'devakumar@futurecalls.com', 'Server migration done and tested system on boarded with new server', '2019-04-03 16:37:00', '2019-07-23 22:40:10'),
(3, 'IRC1603', NULL, NULL, 'IRCS', 'FHS  JSSK s/w issues', 'P2', 'V550456', 'Close', 2, '1', '1', 'santhiya@futurecalls.com', 'Isuues resolved', '2019-06-19 16:55:00', '2019-07-23 23:10:33'),
(4, 'Red3712', NULL, NULL, 'Phone installation', 'Redgrape', 'P3', 'V131007', 'Close', 2, '1', '1', 'dillibabu@futurecalls.com', 'Completed', '2019-04-19 10:13:00', '2019-07-23 23:11:00'),
(5, 'Red3712', NULL, NULL, 'Phone installation', 'Redgrape', 'P3', 'V131007', 'Close', 2, '1', '1', 'dillibabu@futurecalls.com', 'Completed', '2019-04-19 10:13:00', '2019-07-23 23:11:05'),
(6, 'Gan5312', NULL, NULL, '2 VC Xt4300 installation', 'Ganges int', 'P2', 'V141019', 'Close', 2, '1', '1', 'dillibabu@futurecalls.com', 'issues resolved.', '2019-04-19 16:37:00', '2019-07-23 23:11:42'),
(7, 'GRT1503', NULL, NULL, 'GRT kanchipuram', 'kanchipuram grt  call billing s/w issues', 'P2', 'V540426', 'Close', 2, '1', '1', 'dillibabu@futurecalls.com', 'resolved', '2019-06-19 16:54:00', '2019-07-23 23:12:04'),
(8, 'GRT1503', NULL, NULL, 'gust name not displayed', 'GRT madurai', 'P2', 'V131000', 'Close', 2, '1', '1', 'dillibabu@futurecalls.com', 'resolved', '2019-05-19 10:13:00', '2019-07-23 23:12:38'),
(9, 'God1403', NULL, NULL, 'GOD  TV', 'preventive maintenance', 'P2', 'V211053', 'Close', 2, '1', '1', 'pradeep@futurecalls.com', 'completed', '2019-06-19 10:21:00', '2019-07-23 23:13:23'),
(10, 'VMC1203', NULL, NULL, 'System upgrade', 'VMCH', 'P2', 'V231059', 'Close', 2, '1', '1', 'pradeep@futurecalls.com', 'completed', '2019-05-19 10:23:00', '2019-07-23 23:13:39'),
(11, 'VMC1203', NULL, NULL, 'VMCH', 'VCE network error', 'P2', 'V290153', 'Close', 2, '1', '1', 'dillibabu@futurecalls.com', 'completed', '2018-12-27 13:29:00', '2019-07-23 23:14:02'),
(12, 'ABA1503', NULL, NULL, 'Aban', 'preventive maintenance', 'P2', 'V221024', 'Close', 2, '1', '1', 'pradeep@futurecalls.com', 'extension issues resolved', '2019-07-19 10:22:00', '2019-07-23 23:14:31'),
(13, 'GRT1503', NULL, NULL, 'GRT thiruthani  new analog card installation', 'new card installation ( Analog)', 'P3', '381121', 'Close', 2, '1', '1', 'dillibabu@futurecalls.com', 'Completed', '2019-07-23 23:08:25', '2019-07-26 00:56:25'),
(14, 'IFC1010', NULL, NULL, 'Firewall Sophos Demo', 'Demo firewall', 'P2', '221029', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'Firewall rules and policies are checked and ports are opened FW is live now', '2019-07-29 21:52:29', '2019-07-29 21:57:01'),
(15, 'The5311', NULL, NULL, 'Server data transfer', 'data transfer', 'P2', '071001', 'Close', 2, '2', '10', 'sakthivel@futurecalls.com', 'Data transfer completed from old server to new server and file sharing access also enabled to all AD users', '2019-07-29 21:37:01', '2019-07-29 21:57:51'),
(16, 'Spa1801', NULL, NULL, 'Spark capital', 'VMS card', 'P2', '250126', 'Close', 2, '1', '5', 'dillibabu@futurecalls.com', 'Issues  resolved', '2019-07-26 00:55:26', '2019-07-30 22:19:10'),
(17, 'Gem0403', NULL, NULL, 'Share folder creation, Gemhospital website issue.', 'Need to create share folder for each dept and needs to fix Gemhospital.com website.', 'P3', '490203', 'Close', 2, '3', '3', 'karthik@futurecalls.com', 'Share folder has been created for each department and website issue is resolved.', '2019-07-31 02:19:06', '2019-07-31 02:42:38'),
(18, 'Fut5012', NULL, NULL, 'Contaque Dialer', 'Contaque Dialer OS', 'P2', '060318', 'Close', 2, '2', '11', 'sakthivel@futurecalls.com', 'Contaque Dialer Ubuntu OS installed in VM machine instance and also NAT ip enabked to our Public IP', '2019-08-01 02:36:20', '2019-08-01 02:37:50'),
(19, 'The5311', NULL, NULL, 'Seqrite AV installation', 'Anti-Virus installation for Server and Client', 'P3', '191256', 'Close', 2, '2', '10', 'sakthivel@futurecalls.com', 'AV installation completed', '2019-07-31 23:49:57', '2019-08-04 21:19:58'),
(20, 'Hun4911', NULL, NULL, 'Firewall', 'Firewall rules', 'P2', '410228', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'Rules and policies are changed and enabled', '2019-08-06 02:11:35', '2019-08-06 02:13:04'),
(21, 'Tir4111', 'testtetw@tirumala.com', '9843644039', 'Email Test', 'test mail', 'P4', '070646', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'All notification working(Create, Update,Assign, Close)', '2019-08-08 05:37:48', '2019-08-08 05:43:42'),
(22, 'The5311', 'preetham@thermalsystems.in', '6987654321', 'Windows OS', 'OS service pack installation', 'P2', '181011', 'Close', 2, '2', '10', 'sakthivel@futurecalls.com', 'OS service pack installed and old AV uninstalled also IE version 11 updated', '2019-08-08 21:48:11', '2019-08-08 22:02:40'),
(23, 'Tir4111', 'testtetw@tirumala.com', '0928765454', 'Firewall', 'Firewall rules error', 'P2', '171013', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'Firewall rules are created by client and HTTPS block enabled in rules so all rules are working with blocking all sites... so now issue got rectified', '2019-08-08 21:47:14', '2019-08-08 22:03:53'),
(24, 'Uni4211', 'test@gmail.com', '0987654654', 'Server and Workstation', 'Server pricing quote', 'P3', '181050', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'Server and workstation price for tender and order price is shared in the quote', '2019-08-08 21:48:50', '2019-08-08 22:04:21'),
(25, 'Par2110', 'pra@ParsecTelesystems.com', '0077889955', 'Firewall', 'Firewall installation', 'P2', '281046', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'Awaiting for client conformation', '2019-08-08 21:58:47', '2019-08-08 22:08:30'),
(26, 'viv0011', 'caroline@viveks.com', '9787141830', 'Avaya analog extn issues', 'Avaya extn', 'P3', '071130', 'Close', 2, '1', '1', '', 'Resolved', '2019-07-30 22:37:31', '2019-08-09 02:55:37'),
(27, 'Uni4211', 'test@gmail.com', '0928765454', 'Firewall', 'FW new rules', 'P2', '341120', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'New rules created for conference device and ipaddress ports  numbers are assigned as per the given details and also some links are entered in Exception', '2019-08-11 23:04:21', '2019-08-11 23:06:18'),
(28, 'Hun4911', 'test@interviewdesk.in', '0987654654', 'Firewall', 'Firewall Rule Change', 'P3', '061212', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'URL whitelisted and prioritize to enable', '2019-08-12 23:36:13', '2019-08-12 23:37:06'),
(29, 'CGP1103', 'cgpolice@futurecalls.com', '9999999999', 'CGPolice SSL Certificate Configuration', 'Need to configure SSL certificate for Chat URL', 'P3', 'V201108', 'Close', 2, '1', '2', 'sagar@futurecalls.com', 'SSL Configuration DOne.', '2018-12-24 11:20:00', '2019-08-19 03:52:02'),
(30, 'CGP1103', 'cgpolice@futurecalls.com', '9999999999', 'CG Police SSL certificate', 'SSL certificate applied but chat typing window not working. Informed customer to configure the reverse proxy', 'P3', 'V541056', 'Close', 2, '1', '2', 'sagar@futurecalls.com', 'Configured SSL Certificate and tested successfully.', '2018-12-24 11:20:00', '2019-08-19 03:52:58'),
(31, 'CGP1103', 'cgpolice@futurecalls.com', '9999999999', 'CG Police Campaign Name Change', 'New Request Check with Altitude and configure the same', 'P3', 'V581011', 'Close', 2, '1', '2', 'sagar@futurecalls.com', 'Already inform Customer to this will consider as a change request.', '2018-12-24 11:20:00', '2019-08-19 03:56:27'),
(32, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'System Down', 'RCA for system down.', 'P2', '250350', 'Close', 2, '1', '2', 'sagar@futurecalls.com', 'Meeting Point assign dedicated USB.', '2019-08-13 02:55:51', '2019-08-19 05:17:21'),
(33, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'Sales Force connector', 'Sales Force connector logout or unable to set ready if agent Idle', 'P2', '170401', 'Close', 2, '1', '2', 'sagar@futurecalls.com', 'Sales force connector logout if agent idle because system having power saving setting enabled.So already informed to IT Team to make the changes in user systems to avoid this issue.', '2019-08-13 03:47:02', '2019-08-19 05:20:47'),
(34, 'Par2110', 'pra@ParsecTelesystems.com', '0077889955', 'Firewall', 'Firewall phase 3', 'P2', '040236', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'VPN user and server access are completed', '2019-08-20 01:34:37', '2019-08-20 01:39:35'),
(35, 'The5311', 'preetham@thermalsystems.in', '0987654654', 'Pheripharal Control', 'USB enabling and Admin access', 'P2', '040203', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'USB controls are enabled for user to install the application', '2019-08-20 01:34:04', '2019-08-20 01:39:58'),
(36, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'ER ANI', 'ER ANI not appering', 'P4', '040451', 'Close', 2, '1', '2', 'akash.sachdev@futurecalls.com', 'Patch updated now ANI showing', '2019-08-13 03:34:52', '2019-08-20 02:45:21'),
(37, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '9843644039', 'Test Ticket', 'Test Ticket', 'P4', '490535', 'Close', 2, '1', '2', 'akash.sachdev@futurecalls.com', 'This is test ticke', '2019-08-08 05:19:39', '2019-08-20 02:45:58'),
(38, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'Outbound campaign reports', 'Call status in Outbound campaign report .', 'P3', '480349', 'Close', 2, '1', '2', 'prasad@futurecalls.com', 'Done changes from saurabh', '2019-08-13 03:18:51', '2019-08-20 03:37:19'),
(39, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'APR Report', 'Get APR report confirmation from RomiÂ ', 'P3', '440303', 'Close', 2, '1', '2', 'prasad@futurecalls.com', 'Created a report from Saurabh', '2019-08-13 03:14:05', '2019-08-20 03:39:05'),
(40, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'RCA  system down ( RQST00000173102 )', 'RCA for system down.', 'P2', '150442', 'Close', 2, '1', '2', 'sagar@futurecalls.com', 'Duplicate ticket Open with same Request number so closing duplicate tickets.\r\n\r\nRCA  system down ( RQST00000173102 )', '2019-08-13 03:45:43', '2019-08-20 09:13:18'),
(41, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'RCA  system down ( RQST00000173816 )', 'RCA for system down', 'P2', '130400', 'Close', 2, '1', '2', 'sagar@futurecalls.com', 'Duplicate ticket Open with same Request number so closing duplicate tickets.\r\n\r\nRCA  system down ( RQST00000173102 )', '2019-08-13 03:43:01', '2019-08-20 09:14:05'),
(42, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'RCA  system down ( RQST00000173816 )', 'RCA for system down', 'P2', '120459', 'Close', 2, '1', '2', 'sagar@futurecalls.com', 'Duplicate ticket Open with same Request number so closing duplicate tickets.\r\n\r\nRCA  system down ( RQST00000173102 )', '2019-08-13 03:43:00', '2019-08-20 09:14:38'),
(43, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'RCA  system down ( RQST00000173816 )', 'RCA for system down', 'P2', '120450', 'Close', 2, '1', '2', 'sagar@futurecalls.com', 'Duplicate ticket Open with same Request number so closing duplicate tickets.\r\n\r\nRCA  system down ( RQST00000173102 )', '2019-08-13 03:42:50', '2019-08-20 09:14:53'),
(44, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'not able to sign in altitude', 'Prabhat is not able to login in altitude.', 'P4', '130314', 'Close', 2, '1', '2', 'prasad@futurecalls.com', 'Restart system', '2019-08-20 02:43:15', '2019-08-21 15:50:25'),
(45, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'user auto logout', 'Nancy is facing issue that while call going on it auto logout', 'P3', '460522', 'Close', 2, '1', '2', 'akash.sachdev@futurecalls.com', 'Accidently make 4 same tickets', '2019-08-21 17:16:25', '2019-08-21 17:32:16'),
(46, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'user auto logout', 'Nancy is facing issue that while call going on it auto logout', 'P3', '450558', 'Close', 2, '1', '2', 'akash.sachdev@futurecalls.com', 'Accidently make 4 same tickets', '2019-08-21 17:16:02', '2019-08-21 17:33:06'),
(47, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'user auto logout', 'Nancy is facing issue that while call going on it auto logout', 'P3', '460503', 'Close', 2, '1', '2', 'akash.sachdev@futurecalls.com', 'Accidentally make 4 same tickets', '2019-08-21 17:16:12', '2019-08-21 17:35:05'),
(48, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'user auto logout', 'Nancy is facing issue that while call going on it auto logout', 'P3', '450549', 'Close', 2, '1', '2', 'akash.sachdev@futurecalls.com', 'Accidentally make 4 same tickets', '2019-08-21 17:15:58', '2019-08-21 17:35:30'),
(49, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'user auto logout', 'Nancy is facing issue that while call going on it auto logout', 'P3', '460512', 'Close', 2, '1', '2', 'akash.sachdev@futurecalls.com', 'Accidentally make 4 same tickets', '2019-08-21 17:16:17', '2019-08-21 17:35:57'),
(50, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'user auto logout', 'Nancy is facing issue that while call going on it auto logout', 'P3', '460517', 'Close', 2, '1', '2', 'akash.sachdev@futurecalls.com', 'Accidentally make 4 same tickets', '2019-08-21 17:16:22', '2019-08-21 17:36:17'),
(51, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'user auto logout', 'Nancy is facing issue that while call going on it auto logout', 'P3', '460525', 'Close', 2, '1', '2', 'akash.sachdev@futurecalls.com', 'Accidentally make 4 same tickets', '2019-08-21 17:16:29', '2019-08-21 17:36:29'),
(52, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'user auto logout', 'Nancy is facing issue that while call going on it auto logout', 'P3', '460543', 'Close', 2, '1', '2', 'akash.sachdev@futurecalls.com', 'Accidentally make 4 same tickets', '2019-08-21 17:16:49', '2019-08-21 17:36:41'),
(53, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'Not able to login In altitude', 'Devendra is not able to login in Altitude Softphone', 'P3', '420527', 'Close', 2, '1', '2', 'akash.sachdev@futurecalls.com', 'issue fix after login in altitude siphone application', '2019-08-21 17:12:30', '2019-08-21 17:44:23'),
(54, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'user auto logout', 'Nancy is facing issue that while call going on it auto logout', 'P3', '470515', 'Close', 2, '1', '2', 'akash.sachdev@futurecalls.com', '', '2019-08-21 17:17:19', '2019-08-21 17:44:36'),
(55, 'Ste0911', 'sterling@futurecalls.com', '9999999999', 'Before landing call to Agent Please wait while we transfer is played twice', 'Before landing call to Agent Please wait while we transfer is played twice', 'P2', 'A261153', 'Close', 2, '1', '2', 'devakumar@futurecalls.com', 'Issues with script and we have done the changes in the script now IVR playing correctly', '2019-01-19 11:26:00', '2019-08-22 00:34:43'),
(56, 'Ste0911', 'sterling@futurecalls.com', '9999999999', 'Outbound Dialing - Should disable prefixing 0 before numbers', 'Outbound Dialing - Should disable prefixing 0 before numbers', 'P2', 'A271136', 'Close', 2, '1', '2', 'devakumar@futurecalls.com', 'We have created the access line rule and now we can dial only the corresponding number.', '2019-01-19 11:27:00', '2019-08-22 01:35:31'),
(57, 'Ste0911', 'sterling@futurecalls.com', '9999999999', 'Outbound - No Recording. No Reports.', 'Outbound - No Recording. No Reports.', 'P2', 'V291106', 'Close', 2, '1', '2', 'devakumar@futurecalls.com', 'Issue Fixed now they can able to get the report and recordings', '2019-01-19 11:29:00', '2019-08-22 01:36:25'),
(58, 'The5311', 'preetham@thermalsystems.in', '0987654654', 'Firewall and AD', 'AD implement Antivirus and Firewall', 'P2', '170815', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'AD & Firewall & AV config all done pending for some small complaints', '2019-08-22 07:47:17', '2019-08-22 07:48:21'),
(59, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'unable to recording detail of  agents', 'Sundana Kadam is not able to see user login details', 'P3', '200604', 'Close', 2, '1', '2', 'akash.sachdev@futurecalls.com', '', '2019-08-21 17:50:05', '2019-08-23 03:08:59'),
(60, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'Dashboard not working', 'Showing error on dashboard', 'P4', '360529', 'Close', 2, '1', '2', 'prasad@futurecalls.com', 'Logout  Dashboard user and log in, issue resolved.', '2019-08-22 05:06:30', '2019-08-23 21:40:43'),
(61, 'Tir4111', 'test123@gmail.com', '6987654321', 'Firewall', 'URL exception and Reports', 'P2', '531028', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'URL added in exception for down loading reports for their own page as in FQDN in and FQDN host', '2019-08-27 10:53:29', '2019-08-27 10:54:41'),
(62, 'The5311', 'preetham@thermalsystems.in', '0928765454', 'Printer Enabling', 'Printer enable for systems', 'P2', '491035', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'Printer configured', '2019-08-27 10:49:47', '2019-08-27 12:09:55'),
(63, 'Hex0901', 'hexaware@futurecalls.com', '9653420360', 'Call abandon issue - V 7.5', 'calls were handled by agent but in report it concider as abandon', 'P3', '361004', 'Close', 2, '1', '2', 'sagar@futurecalls.com', '', '2019-08-19 22:06:05', '2019-08-29 16:02:14'),
(64, 'Hex0901', 'hexaware@futurecalls.com', '9653420360', 'Wrap time data issue', '6th August raw data that call wrap time is showing 77:02:42 which is incorrect and whereas as per the script time AHT should be 0:03:17.', 'P3', '381056', 'Close', 2, '1', '2', 'sagar@futurecalls.com', 'After change the shared memory setting no issue observed.', '2019-08-19 22:08:57', '2019-08-29 16:04:11'),
(65, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'Softphone not working', 'Sipphone not working in agent system', 'P4', '370540', 'Close', 2, '1', '2', 'akash.sachdev@futurecalls.com', 'force fully stopped from task manager and reopened the same.\r\n\r\nIssue resolved.', '2019-08-22 05:07:41', '2019-08-30 16:07:10'),
(66, 'Wat1811', 'wat@watan.com', '6987654321', 'Server', 'Server', 'P3', '311120', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'server need to change in aws also to migrate.\r\nmail users enabled and deleted some users', '2019-08-31 11:31:24', '2019-08-31 11:35:19'),
(67, 'Shr1511', 'rag@shriram.com', '0987654321', 'SIEM', 'SIEM TOOL', 'P2', '301124', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'SIEM tool Configured and logs enabled.....Some changed as per customer request', '2019-08-31 11:30:26', '2019-08-31 11:36:04'),
(68, 'Par2110', 'pra@ParsecTelesystems.com', '0987654654', 'Firewall', 'Firewall phase 2 configuration', 'P2', '580941', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'Firewall config all done some changes are pendings from customer side', '2019-08-12 21:28:42', '2019-08-31 11:36:54'),
(69, 'Uni4211', 'test@gmail.com', '0928765454', 'Firewall', 'Firewall rule', 'P2', '501046', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'Business rules created for CCTV as 3 different ipaddress and ports numbers opened for DVR and NVR for accessing the CCTV from outside network', '2019-09-04 10:50:48', '2019-09-04 10:52:40'),
(70, 'Uni4211', 'test@gmail.com', '6987654321', 'AntiVirus', 'Seqrite AV', 'P1', '171053', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'AV got corrupted so reinstalled in all client systems and console got reseted also license renewed', '2019-09-06 10:18:05', '2019-09-06 10:23:12'),
(71, 'Par2110', 'pra@ParsecTelesystems.com', '0928765454', 'Firewall', 'Firewall pending Config', 'P2', '171006', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'VPN config done', '2019-09-06 10:17:18', '2019-09-06 10:27:33'),
(72, 'Cit1111', 'helpdesk@futurecalls.com', '8801238822', 'Email Test', 'test ticket', 'P2', '510557', 'Close', 2, '1', '2', '', 'It is a test ticket please close', '2019-08-20 05:21:58', '2019-09-06 13:28:15'),
(73, 'Cit1111', 'helpdesk@futurecalls.com', '', 'email content test', 'email content test', 'P4', '120444', 'Close', 2, '1', '2', '', 'This is a test ticket so it is closed', '2019-08-09 03:42:45', '2019-09-06 13:29:03'),
(74, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'Screen recording issue in system', 'there are 3 system where screen recording issue is there', 'P3', '080613', 'Close', 2, '1', '2', 'akash.sachdev@futurecalls.com', 'Already 45 licence used in 45 desktop. request you to use 45 license configured desktop to avoid recording issue.', '2019-08-21 17:38:14', '2019-09-11 13:40:30'),
(75, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'Screen recording issue', 'Not all agent screen are recording', 'P2', '500536', 'Close', 2, '1', '2', 'akash.sachdev@futurecalls.com', 'all system recording except one system. due to licence used.', '2019-08-21 17:20:39', '2019-09-11 13:42:11'),
(76, 'Uni4211', 'test@gmail.com', '6987654321', 'Firewall', 'Sophos XG FW', 'P2', '440210', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'Universal web page blocked and web page unavailable issue cleared by byepass the FW rules', '2019-09-11 14:44:11', '2019-09-11 14:46:00'),
(77, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'Server memory Increase', 'Recording server memory increase . Decide schedule and implement .', 'P3', '280306', 'Close', 2, '1', '2', 'akash.sachdev@futurecalls.com', 'Memory increased. now its 20GB', '2019-08-13 02:58:07', '2019-09-11 18:02:09'),
(78, 'Hex0901', 'GaneshY@hexaware.com', '9004095180', 'Unable to view site (all telephony gateway disappear) in uSupervisor', 'Unable to view site (all telephony gateway disappear) in uSupervisor after rebooting the system. Before reboot the system done the below configuration changes in shared memory tab as per meeting point suggestion.\r\n\r\nuser 1100 - 1300\r\nout campaign - 140 -', 'P2', '070149', 'Close', 2, '1', '2', 'prasad@futurecalls.com', 'Changed setting from metting  point now working fine', '2019-08-22 00:37:50', '2019-09-15 21:49:32'),
(79, 'CGP1103', 'cgp@gmail.com', '9004095180', 'Altitude System Down - 29/08/2019', 'Altitude system down, unable to login in uAgent application', 'P2', '060434', 'Close', 2, '1', '2', 'sagar@futurecalls.com', 'System Down due to hard disk space unavailability. After shrink of DB log issue resolved.', '2019-08-29 16:06:34', '2019-09-15 22:39:42'),
(80, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'Outbound  report', 'Outbound report : Reports for contacts which are not dialed.', 'P2', '080401', 'Close', 2, '1', '2', 'akash.sachdev@futurecalls.com', 'Issue resolved by Saurabh.', '2019-08-13 03:38:02', '2019-09-17 10:51:27'),
(81, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'Unable to hear voice', 'Geeta drop mail- I was unable to hear the incoming call as there was no sound in call. \r\n\r\n \r\n\r\nPlease find the screen shot in attached file.\r\n\r\n \r\n\r\nIt was working fine now after restarting the software\r\n\r\n\r\n\r\nMeeting point ticket number- RQST00000176145', 'P3', '400316', 'Close', 2, '1', '2', 'akash.sachdev@futurecalls.com', 'Re- login sip phone. Issue resolved', '2019-09-13 15:40:16', '2019-09-19 13:29:10'),
(82, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '9004036628', 'Not able to hear sound', 'In headset not able to hear sound (headset sound problem)', 'P4', '520903', 'Close', 2, '1', '2', 'akash.sachdev@futurecalls.com', 're-login sip phone. Issue resolved', '2019-09-15 21:52:03', '2019-09-19 13:30:18'),
(83, 'Hun4911', 'test@interviewdesk.in', '0928765454', 'Firewall', 'Firewall rules', 'P3', '570415', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'Rules enabled for a user to access the social media and ipaddress changed for user', '2019-09-19 16:57:20', '2019-09-19 17:01:21'),
(84, 'Cit1111', 'helpdesk@futurecalls.com', '8939991513', 'Branch care to DC', 'Branch care Instance need to be migrated to DC from DR.', 'P3', '180251', 'Close', 2, '1', '2', 'suresh.j@futurecalls.com', 'Issue resolved and system went online', '2019-08-08 01:48:52', '2019-09-20 12:26:01'),
(85, 'HLL2811', 'hblbio@hll.com', '0987654321', 'Firewall', 'Sophos XG firewall', 'P2', '301158', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'Installation completed and FW fixed now ISP shared through firewall', '2019-09-18 11:31:01', '2019-09-23 10:24:34'),
(86, 'The5311', 'preetham@thermalsystems.in', '6987654321', 'Server', 'Server connectivity', 'P2', '581130', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'Server connectivty issue is there they connected server power conec in junction box so need to connect in switch board coz of that server is loading continuosly and tally also not loading', '2019-09-24 11:58:31', '2019-09-24 12:00:41'),
(87, 'HLL2811', 'hblbio@hll.com', '0928765454', 'Firewall', 'Citrix client', 'P2', '571141', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'Cirtrix client is not connected now the http is enabled so now isue got rectified an solved can able to connect it from vpn and locallhy in both citrix receiver and client', '2019-09-24 11:57:41', '2019-09-24 12:01:59'),
(88, 'Par2110', 'pra@ParsecTelesystems.com', '0928765454', 'Firewall', 'Firewall VPN', 'P2', '430218', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'VPN config done connection established and tunnel is working now can able to reach client side server and remote ip.....all config done', '2019-09-11 14:43:19', '2019-09-26 15:06:06'),
(89, 'Tel2211', 'teleby@india.com', '0987654321', 'Security Assessment', 'Assessment report', 'P2', '241137', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'reports prepared and shared details are entered', '2019-11-01 11:24:40', '2019-11-01 11:31:15'),
(90, 'Int1811', 'int@ontgrsift.com', '0987654321', 'AntiVirus Demo', 'Kaspersky AV', 'P1', '211118', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'Kaspersky lic updated for next 10 days updated in client side', '2019-11-01 11:21:25', '2019-11-01 11:32:05'),
(91, 'Int4911', 'test1@gmail.com', '6987654321', 'Firewall', 'SOPHOS FW rules', 'P2', '030303', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'FW rules modified for users and allowed categories now all,working on user expectation', '2019-11-01 15:03:06', '2019-11-01 15:04:46'),
(92, 'Tir4111', 'testtetw@tirumala.com', '8939811522', 'Wifi access point and controller installation and configuration.', 'Need to configure and install Dlink AP&#39;s and Controller.', 'P3', '450346', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'AP fixed and now WIfi users accessing internet through that AP', '2019-07-31 03:15:48', '2019-11-01 15:05:14'),
(93, 'Int4911', 'test1@gmail.com', '0987654321', 'Firewall', 'FW LIc', 'P2', '180358', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'FW license key updated with 3 years subscription', '2019-11-01 15:19:00', '2019-11-01 15:19:55'),
(94, 'The5311', 'preetham@thermalsystems.in', '6987654321', 'Network Monitoring & Server space', 'Space allocation', 'P2', '081007', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'network are started to monitor as by enabling the ping ans SSH in firewall', '2019-11-04 10:08:08', '2019-11-04 10:10:00'),
(95, 'Int1811', 'int@ontgrsift.com', '6987654321', 'AntiVirus Demo', 'Demo Session', 'P2', '411027', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'Demo completed and customer queries are pending as per the below points\r\n\r\n1. Multi Authentication\r\n                2. Support for Linux and Mac Platform (Currently using OS version 10.6 to 10.15)\r\n                3. Zero Day Attack\r\n                4. Rescan(if scan fails on that time)\r\n                5. Daily pattern update details\r\n                6. SOP document \r\n                7. Windows server OS support', '2019-11-06 10:41:28', '2019-11-06 11:02:07'),
(96, 'Raj4711', 'rajesh.kupy@gmail.com', '0987654321', 'Access point, Firewall, Printer, ISP', 'home network setup', 'P2', '571005', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'AWS instance pending for console management', '2019-11-06 10:57:11', '2019-11-06 11:11:00'),
(97, 'AGS4310', 'ags@ags.inco', '0987654321', 'Acunetix PoC', 'Acunetix', 'P2', '541058', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'Acunetix iniciated need to give demo for client and add target....queries are raised in mail for clarification', '2019-11-06 10:54:59', '2019-11-06 16:07:17'),
(98, 'New0804', 'new@horixo.com', '0987654321', 'Firewall', 'Firewall proposal', 'P2', '100423', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'Cyberoam to SOPHOS renewal proposal shared to client awaiting for client conformation', '2019-11-06 16:10:24', '2019-11-06 16:12:03'),
(99, 'Raj4711', 'rajesh.kupy@gmail.com', '0987654321', 'Firewall', 'AP and ISP', 'P2', '311156', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'ISP side issue in internet network slow and static ip got refreshed', '2019-11-14 11:31:56', '2019-11-14 11:45:10'),
(100, 'New0804', 'new@horixo.com', '0987654321', 'Firewall', 'FW renewal', 'P1', '311109', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'FW sophos upgradation meetinig done clinet going for 3 yrs subscri', '2019-11-14 11:31:10', '2019-11-14 11:47:40'),
(101, 'The5311', 'preetham@thermalsystems.in', '0987654321', 'Active Directory', 'AD user', 'P2', '431019', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'Space segrihation and tree creation done', '2019-11-14 10:43:21', '2019-11-14 11:49:14'),
(102, 'The5311', 'preetham@thermalsystems.in', '0987654321', 'Active Directory', 'AD user', 'P2', '431019', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'Space segrihation and tree creation done in AD', '2019-11-14 10:43:21', '2019-11-14 11:49:24'),
(103, 'AGS4310', 'ags@ags.inco', '0987654321', 'Acunetix PoC', 'Acunetix demo', 'P2', '421047', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'Demo completed traget added queries are raised and solution given to customer', '2019-11-14 10:42:49', '2019-11-14 11:50:28'),
(104, 'AGS4310', 'ags@ags.inco', '0987654321', 'Acunetix PoC', 'Acunetix', 'P1', '061001', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'tool has been reinstalled and now can able to access with ipaddress of the server as with following ports', '2019-11-19 10:06:06', '2019-11-19 10:12:29'),
(105, 'Uni4211', 'test@gmail.com', '0987654321', 'DELL server', 'Server installation', 'P2', '071012', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'now server is ready to install the catia software as per the customer requirement only the HDD casing need to replace', '2019-11-19 10:07:12', '2019-11-19 10:13:26'),
(106, 'The5311', 'preetham@thermalsystems.in', '0987654321', 'AV Seqrite', 'AV installation', 'P2', '071057', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'AV installing in remaining systems and printer have to install and getting into the network', '2019-11-19 10:07:58', '2019-11-19 10:14:24'),
(107, 'SPI1410', 'spic@spi.com', '0987654321', 'AWS', 'AWS DR solution', 'P2', '201026', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'waiting for client conformation in PO', '2019-11-27 10:20:27', '2019-11-27 10:25:45'),
(108, 'Cog1210', 'cog@innov.com', '0987654321', 'AWS_Gulam team', 'AWS instance', 'P2', '201004', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'waiting for AWS team in mail confromation', '2019-11-27 10:20:04', '2019-11-27 10:36:28'),
(109, 'Cog1210', 'cog@innov.com', '0987654321', 'AWS_RAM team', 'AWS instance', 'P2', '191039', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'server created and went for live', '2019-11-27 10:19:40', '2019-11-27 10:44:23'),
(110, 'Mal1710', 'malles@const.com', '0987654321', 'Firewall and Antivirus', 'FW and AV', 'P2', '191016', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'once received installation will start', '2019-11-27 10:19:16', '2019-11-27 10:46:24'),
(111, 'Int1811', 'int@ontgrsift.com', '0987654321', 'End Point', 'Antivirus', 'P2', '091055', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'AV demo success waiting for PO from client side and scope of work shared', '2019-11-27 10:09:55', '2019-11-27 10:46:59'),
(112, 'AGS4310', 'ags@ags.inco', '0987654321', 'VAPT tool', 'Demo LIC', 'P2', '091000', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'Acunetix PoC done.....going with it and client required to sign in NDA documents from Acunetix team', '2019-11-27 10:09:00', '2019-11-27 10:48:31'),
(113, 'The5311', 'preetham@thermalsystems.in', '0987654321', 'AD', 'User creation', 'P2', '071056', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'new AD users are created and loged in', '2019-11-27 10:07:57', '2019-11-27 10:49:03'),
(114, 'Uni4211', 'test@gmail.com', '0987654321', 'Server HDD', 'HDD casing', 'P2', '071021', 'Close', 2, '2', '4', 'sakthivel@futurecalls.com', 'Server SSD HDD casing issue is there so new casing received waiting to fix it up', '2019-11-27 10:07:21', '2019-11-27 10:49:48'),
(115, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'while altitude is logout still getting calls.', 'while Altitude is logout still get call. Timing between 12:56 pm.\r\nPlease find attachment.', 'P4', '190141', 'Close', 2, '1', '2', 'akash.sachdev@futurecalls.com', 'Altitude team has make changes in Setting and we monitor few week, this issue not occurred again', '2019-09-18 13:19:42', '2019-12-23 10:44:59'),
(116, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'Nandini is facing issue. for function button disable', 'Nandini report- that while on call, all function are disbale.. Screenshot attached .\r\n\r\nMeeting point ticket number- RQST00000176244', 'P3', '140450', 'Close', 2, '1', '2', 'akash.sachdev@futurecalls.com', 'Currently this issue did not occurred from last months, as Altitude has check the logs.', '2019-09-17 16:14:53', '2019-12-23 10:46:40');

-- --------------------------------------------------------

--
-- Table structure for table `closed_lead`
--

CREATE TABLE `closed_lead` (
  `id` int(11) NOT NULL,
  `lead_id` varchar(255) NOT NULL,
  `customername` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `leadsource` varchar(255) NOT NULL,
  `number` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `vertical` varchar(250) NOT NULL,
  `oem` varchar(250) NOT NULL,
  `product` varchar(255) NOT NULL,
  `ordervalue` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `closed_reason` varchar(255) NOT NULL,
  `leadperiod` varchar(250) DEFAULT 'Onetime',
  `status` varchar(255) NOT NULL,
  `assignee` varchar(255) NOT NULL,
  `closure_value` varchar(250) DEFAULT NULL,
  `payment_mode` varchar(250) DEFAULT NULL,
  `service_customer` varchar(250) DEFAULT NULL,
  `closed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `payment_status` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `closed_lead`
--

INSERT INTO `closed_lead` (`id`, `lead_id`, `customername`, `company`, `industry`, `leadsource`, `number`, `email`, `vertical`, `oem`, `product`, `ordervalue`, `created_at`, `closed_reason`, `leadperiod`, `status`, `assignee`, `closure_value`, `payment_mode`, `service_customer`, `closed_at`, `payment_status`) VALUES
(1, 'shr270149', 'shriram value', 'shriram value', '13', 'Employee Referral', '9787141830', 'pradeep@futurecalls.com', '1', '4', 'gateway', '410000', '0000-00-00 00:00:00', 'PO Collected', 'Onetime', 'Close', 'pradeep@futurecalls.com', '410000', '30', 'no', '2020-01-28 04:35:51', 0),
(2, 'VRC230124', 'VRCM', 'VRCM', '13', 'Employee Referral', '9787141830', 'pradeep@futurecalls.com', '1', '1', 'Avaya IPO', '240000', '0000-00-00 00:00:00', 'PO Collected', 'Onetime', 'Close', 'pradeep@futurecalls.com', '240000', '30', '', '2020-01-28 04:37:43', 0),
(3, 'Tru061211', 'Truecover', 'Truecover', '13', 'Employee Referral', '', 'amiyasagar@futurecalls.com', '3', '22', 'Web Application Assessment', '94400', '0000-00-00 00:00:00', 'PO Collected', 'Onetime', 'Close', 'shahinsha@futurecalls.com', '94400', '30', 'no', '2020-01-28 05:39:40', 0),
(4, '421001', 'Vijay', 'TVS Logistics', '26', 'Other', '9884264422', 'admin@futurecalls.com', '3', '18', 'Nessus-Tenable iO', '590000', '2020-01-28 10:42:01', 'PO Collected', 'Onetime', 'Close', 'shahinsha@futurecalls.com', '590000', '30', 'no', '2020-01-28 05:40:18', 0),
(5, 'OPG350747', 'OPG Power', 'OPG Power', '13', 'Employee Referral', '9841522439', 'Pratap@opg.com', '7', '20', 'HP  Server Renewal', '25400', '0000-00-00 00:00:00', 'Email Received', 'Onetime', 'Close', 'vijaybalaji@futurecalls.com', '25370', '30', 'no', '2020-01-31 04:08:46', 0),
(6, 'VIV510947', 'VIVEKS', 'VIVEKS', '13', 'Employee Referral', '9500173293', 'harikrishnan.rajagopalan@viveks.com', '7', '20', 'TATA', '1000', '0000-00-00 00:00:00', 'Email Received', 'Onetime', 'Close', 'guruprasath@futurecalls.com', '1', '30', 'no', '2020-02-03 05:08:36', 0),
(7, '560727', 'SRM', 'SRM UNIVERSITY', '10', 'Other', '8569991549', 'BOOPALAN.M@SRMUNIVERSITY.AC.IN', '2', '19', 'Fortinet Firewall & Networking', '100000', '2020-02-04 07:56:27', 'Email Received', 'Onetime', 'Close', 'tamilarasan@futurecalls.com', '100000', '60', 'no', '2020-02-04 02:27:39', 0),
(8, '331002', 'Panimalar Hospital', 'Panimalar', '20', 'Other', '', 'rajesekar@gmail.com', '1', '21', 'XTEND BILLING SOFTWARE', '23600', '2020-02-02 22:33:02', 'PO Collected', 'Onetime', 'Close', 'tamilarasan@futurecalls.com', '23600', '30', 'yes', '2020-02-05 08:04:46', 0),
(9, '370356', 'MANIKANDAN', 'GEM HOSPITAL', '20', 'Other', '9600114902', 'itchennai@geminstitute.in', '2', '21', 'XTEND BILLING SOFTWARE', '6490', '2020-02-05 15:37:56', 'PO Collected', 'Onetime', 'Close', 'tamilarasan@futurecalls.com', '6490', '30', 'no', '2020-02-05 10:09:48', 0),
(10, 'AXI131242', 'AXIS WIND FARMS (RAYALASEEMA) PRIVATE LIMITED', 'AXIS WIND FARMS (RAYALASEEMA) PRIVATE LIMITED', '13', 'Employee Referral', '', 'AXIS WIND FARMS (RAYALASEEMA) PRIVATE LIMITED', '2', '22', 'Cabeling', '42900', '0000-00-00 00:00:00', 'PO Collected', 'Onetime', 'Close', 'mazhar@futurecalls.com', '46830', '30', '', '2020-02-06 13:11:09', 0),
(150, '281241', 'Mohideen', 'AGS Health', '13', 'Other', '', 'Mohideen@agshealth.com', '7', '21', 'Nexpose', '55630', '2020-01-22 12:28:41', 'PO Collected', 'Onetime', 'Close', 'vijaybalaji@futurecalls.com', '55630', '30', 'no', '2020-02-10 02:06:02', 0),
(151, 'Cha480924', 'Chandrasekar School', 'Chandrasekar School', '13', 'Employee Referral', '9841522439', 'egams@gmail.com', '7', '20', 'OFC Cable', '67000', '0000-00-00 00:00:00', 'Email Received', 'Onetime', 'Close', 'vijaybalaji@futurecalls.com', '67208', '30', 'no', '2020-02-10 02:09:05', 0),
(152, 'Sic440616', 'Sicagen', 'Sicagen', '13', 'Employee Referral', '9790967402', 'ragavansitaram@gmail.com', '7', '5', 'Kaspersky', '442500', '0000-00-00 00:00:00', 'PO Collected', 'Onetime', 'Close', 'vijaybalaji@futurecalls.com', '442500', '30', 'no', '2020-02-10 02:11:36', 0),
(153, '111037', 'Arun', 'Spark Capital', '13', 'Other', '9791710903', '', '1', '4', 'Matrix EPABX', '540299', '0000-00-00 00:00:00', 'PO Collected', 'Onetime', 'Close', 'vijaybalaji@futurecalls.com', '540299', '30', 'no', '2020-02-10 02:14:54', 0),
(154, 'Spa231103', 'Spark Capital', 'Spark Capital', '13', 'Employee Referral', '9841522439', 'arun@sparkcapital.in', '1', '4', 'Matrix IP Extension.', '12000', '0000-00-00 00:00:00', 'PO Collected', 'Onetime', 'Close', 'vijaybalaji@futurecalls.com', '12890', '30', 'no', '2020-02-10 02:18:26', 0),
(155, '531205', 'Jagadish', 'Zenonline', '13', 'Partner', '', 'pradeep@futurecalls.com', '1', '1', 'Avaya IPO', '48000', '2020-02-07 12:53:05', 'PO Collected', 'Onetime', 'Close', 'pradeep@futurecalls.com', '48000', '30', '', '2020-02-10 04:22:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_feedback`
--

CREATE TABLE `customer_feedback` (
  `id` int(10) NOT NULL,
  `clientID` varchar(250) DEFAULT NULL,
  `ticketID` varchar(250) DEFAULT NULL,
  `q1` text DEFAULT NULL,
  `answer` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `delete_lead`
--

CREATE TABLE `delete_lead` (
  `id` int(11) NOT NULL,
  `lead_id` varchar(255) NOT NULL,
  `customername` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `ordervalue` varchar(255) NOT NULL,
  `assignee` varchar(255) NOT NULL,
  `deletereason` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delete_lead`
--

INSERT INTO `delete_lead` (`id`, `lead_id`, `customername`, `company`, `product`, `ordervalue`, `assignee`, `deletereason`, `status`, `deleted_at`) VALUES
(0, 'Cha480924', 'Chandrasekar School', 'Chandrasekar School', 'OFC Cable', '67000', 'vijaybalaji@futurecalls.com', 'Delee', 'Delete', '2020-01-31 07:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `drop_lead`
--

CREATE TABLE `drop_lead` (
  `id` int(11) NOT NULL,
  `lead_id` varchar(255) NOT NULL,
  `customername` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `ordervalue` varchar(255) NOT NULL,
  `assignee` varchar(255) NOT NULL,
  `dropreason` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `dropped_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drop_lead`
--

INSERT INTO `drop_lead` (`id`, `lead_id`, `customername`, `company`, `product`, `ordervalue`, `assignee`, `dropreason`, `status`, `dropped_at`) VALUES
(1, 'Inf471244', 'Infosys CPC', 'Infosys CPC', 'Outbound IVR', '1120500', 'suresh.j@futurecalls.com', 'miss understanding', 'Drop', '2020-01-27 06:54:06'),
(2, 'SKY591011', 'SKYRAMS Outdoor Advertisings India Pvt Ltd', 'SKYRAMS Outdoor Advertisings India Pvt Ltd', 'Matrix', '1', 'guruprasath@futurecalls.com', 'customer not interested', 'Drop', '2020-01-28 04:59:52'),
(3, 'Med251004', 'Medraperit pep LLp', 'Medraperit pep LLp', 'Smartoffice', '0', 'guruprasath@futurecalls.com', 'customer not interested', 'Drop', '2020-01-28 05:23:45'),
(4, 'Pro191029', 'Proconnect', 'Proconnect', 'MPLS- Secure connect', '0', 'guruprasath@futurecalls.com', 'dropped', 'Drop', '2020-01-28 05:24:00'),
(5, 'Yog421008', 'Veritas Finance Pvt Ltd', 'Veritas Finance Pvt Ltd', 'Trend micro', '78150', 'guruprasath@futurecalls.com', 'dropped', 'Drop', '2020-01-28 05:24:14'),
(6, 'Ver391011', 'Veritas finance Pvt Ltd', 'Veritas finance Pvt Ltd', 'Audio and video Mixture', '213329', 'guruprasath@futurecalls.com', 'dropped', 'Drop', '2020-01-28 05:24:26'),
(7, 'Le 310920', 'Le  Meridan', 'Le  Meridan', 'Ruckus', '25594', 'guruprasath@futurecalls.com', 'customer not interested', 'Drop', '2020-01-28 05:25:30'),
(8, 'BFG191031', 'BFG INDIA', 'BFG INDIA', 'Antivirus', '30500', 'guruprasath@futurecalls.com', 'customer not interested', 'Drop', '2020-01-28 05:25:51'),
(9, 'Sta500957', 'Arulraj', 'Mobius', 'Call Center', '500000', 'vijaybalaji@futurecalls.com', 'Wrong Entry', 'Drop', '2020-01-28 06:05:10'),
(10, 'Sma581009', 'Smart Work Business Centre Pvt. Ltd', 'Smart Work Business Centre Pvt. Ltd', 'others', '1', 'vijaybalaji@futurecalls.com', 'Went with existing vendor', 'Drop', '2020-01-31 04:04:48'),
(11, 'Mot200512', 'Motherhood Hospitals', 'Motherhood Hospitals', 'CCTV', '600000', 'vijaybalaji@futurecalls.com', 'Project drop', 'Drop', '2020-01-31 04:06:17'),
(12, 'Anj400444', 'Anjuman Trust', 'Anjuman Trust', 'VC', '150000', 'pradeep@futurecalls.com', 'next year plan', 'Drop', '2020-01-31 04:16:36'),
(13, 'GRT091039', 'GRT Logistic', 'GRT Logistic', 'EPABX and cbaling', '200000', 'pradeep@futurecalls.com', 'not going for EPABX solution', 'Drop', '2020-01-31 04:16:59'),
(14, '461102', 'IP LINK', 'IP LINK', 'iSPARK CRM', '120120', 'pradeep@futurecalls.com', 'not interested', 'Drop', '2020-01-31 04:18:21'),
(15, 'Ora321208', 'Orange Retail', 'Orange Retail', 'EPABX for branches', '500000', 'pradeep@futurecalls.com', 'not interested', 'Drop', '2020-01-31 04:24:53'),
(16, 'Mr.561051', 'Mr. Prakash Hosur.', 'Mr. Prakash Hosur.', 'cloud VC', '55000', 'pradeep@futurecalls.com', 'not interested', 'Drop', '2020-01-31 04:25:16'),
(17, 'woo481146', 'woori bank', 'woori bank', 'Networking', '1', 'vijaybalaji@futurecalls.com', 'Delay from Customer End.', 'Drop', '2020-02-02 17:25:53'),
(18, 'syg261011', 'sygna Engery', 'sygna Engery', 'ftoss', '10000', 'vijaybalaji@futurecalls.com', 'No updates from customer End', 'Drop', '2020-02-02 17:27:00'),
(19, 'rsp001033', 'rspminfotech', 'rspminfotech', 'Switch & 9U Rack', '0', 'vijaybalaji@futurecalls.com', 'No Updates from Customer End.', 'Drop', '2020-02-02 17:29:01'),
(20, 'Sap211253', 'Sapphire Consultancy', 'Sapphire Consultancy', 'L1 Support', '20000', 'mazhar@futurecalls.com', 'Not Giving any information. Always delay to give his responce.', 'Drop', '2020-02-06 13:06:12'),
(21, 'DEB261225', 'DEBS', 'DEBS', 'Conf number', '56280', 'suresh.j@futurecalls.com', 'no update', 'Drop', '2020-02-10 04:37:10'),
(22, '411026', 'Arumugam', 'SSN COlllege', 'FORTINET', '', 'guruprasath@futurecalls.com', 'they bought from another vendor', 'Drop', '2020-02-10 05:32:00'),
(23, 'Gan411058', 'Ganges', 'Ganges', 'MPLS', '17000', 'guruprasath@futurecalls.com', 'Customer not needed', 'Drop', '2020-02-10 05:32:22'),
(24, 'TOP001004', 'TOPPR TECHNOLOGIES PRIVATE LIMITED', 'TOPPR TECHNOLOGIES PRIVATE LIMITED', 'TATA', '170000', 'guruprasath@futurecalls.com', 'Dropped', 'Drop', '2020-02-10 05:34:19'),
(25, 'Hyu361125', 'Hyundai Mobis', 'Hyundai Mobis', 'TATA TOLL FREE', '9999', 'guruprasath@futurecalls.com', 'Dropped', 'Drop', '2020-02-10 05:34:32'),
(26, 'APJ001015', 'APJ Medical technology private ltd.', 'APJ Medical technology private ltd.', 'CRM', '1', 'guruprasath@futurecalls.com', 'Drop', 'Drop', '2020-02-10 05:35:21'),
(27, 'Eff500903', 'Effitrac', 'Effitrac', 'CRM', '1', 'guruprasath@futurecalls.com', 'Dropped', 'Drop', '2020-02-10 05:35:35'),
(28, 'SAI550938', 'SAI media productions', 'SAI media productions', 'CRM', '1', 'guruprasath@futurecalls.com', 'Dropped', 'Drop', '2020-02-10 05:36:24'),
(29, 'Int251048', 'Integrated Enterprises', 'Integrated Enterprises', 'TATA MPLS', '500000', 'guruprasath@futurecalls.com', 'Dropped', 'Drop', '2020-02-10 05:36:42'),
(30, 'Sel520949', 'Selathaar Ventures', 'Selathaar Ventures', 'CRM', '1', 'guruprasath@futurecalls.com', 'Dropped', 'Drop', '2020-02-10 05:36:56'),
(31, 'Shr580908', 'Shrijothi New media consulting services', 'Shrijothi New media consulting services', 'CRM', '1', 'guruprasath@futurecalls.com', 'Dropped', 'Drop', '2020-02-10 05:37:09');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` int(10) NOT NULL,
  `ticketID` varchar(250) DEFAULT NULL,
  `from_email` varchar(250) DEFAULT NULL,
  `to_email` varchar(250) NOT NULL,
  `subject` varchar(1000) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `attachment` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `read_status` int(10) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `email_campaign`
--

CREATE TABLE `email_campaign` (
  `id` int(10) NOT NULL,
  `subject` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `attachment` varchar(250) DEFAULT NULL,
  `sent_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_campaign`
--

INSERT INTO `email_campaign` (`id`, `subject`, `description`, `attachment`, `sent_at`) VALUES
(1, 'Test mail', 'Test mail', '', '2019-11-21 12:33:52'),
(2, 'Email Attachment Test', 'Email Attachment not working', 'smart1.png', '2019-12-09 16:06:29');

-- --------------------------------------------------------

--
-- Table structure for table `email_leads`
--

CREATE TABLE `email_leads` (
  `id` int(11) NOT NULL,
  `lead_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `campaign_ID` varchar(255) NOT NULL,
  `assignee` varchar(255) NOT NULL DEFAULT 'Not Assign',
  `customername` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_leads`
--

INSERT INTO `email_leads` (`id`, `lead_id`, `email`, `subject`, `description`, `campaign_ID`, `assignee`, `customername`, `created_at`) VALUES
(1, '210228', 'manikandan@futurecalls.com', 'I need Cisco firewall', 'Dear Team,\r\n\r\n \r\n\r\n               We\'re looking for cisco firewall pls share the price .\r\n\r\n \r\n\r\n \r\n\r\n\r\n\r\n-- \r\nThis email has been checked for viruses by Avast antivirus software.\r\nhttps://www.avast.com/antivirus\r\n', '1', 'rejina', 'manikandan', '2019-10-23 08:51:29'),
(2, '200506', 'veera@futurecalls.com', 'firewall', 'I need Sophos firewall\r\n\r\n \r\n\r\nThanks,\r\n\r\n \r\n\r\nVeera\r\n\r\n', '1', 'rejina', 'kishore', '2019-10-29 11:50:06'),
(3, '240519', 'veera@futurecalls.com', 'i need cisco', 'I need cisco \r\n\r\n', '1', 'rejina', '', '2019-10-29 11:54:20'),
(4, '', 'manikandan@futurecalls.com', 'Desktop', 'Desktop issues\r\n\r\n \r\n\r\n \r\n\r\nThanks & Regards,\r\n\r\n \r\n\r\nManikandan B\r\n\r\n \r\n\r\n', '1', 'ragu', '', '2019-12-22 04:14:39'),
(5, '501100', 'santhiya@futurecalls.com', 'New Requirement', 'Dear Team,\r\n\r\n                  I need Ticketing CRM kindly share pricing details \r\n\r\n', '1', 'ragu', 'Vimal', '2020-01-20 06:20:00');

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
-- Table structure for table `escalation_master`
--

CREATE TABLE `escalation_master` (
  `id` int(11) NOT NULL,
  `campaign` varchar(250) DEFAULT NULL,
  `level` varchar(250) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `number` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `escalation_master`
--

INSERT INTO `escalation_master` (`id`, `campaign`, `level`, `name`, `email`, `number`, `created_at`) VALUES
(13, '1', 'L1', 'Pradeep.V', 'pradeep@futurecalls.com', '9843644039', '2019-08-17 00:57:46'),
(14, '1', 'L2', 'Pradeep.V', 'pradeep@futurecalls.com', '9999999999', '2019-08-17 00:57:46'),
(15, '1', 'L3', 'Pradeep.V', 'pradeep@futurecalls.com', '9999999999', '2019-08-17 00:57:46'),
(16, '1', 'L4', 'Pradeep.V', 'pradeep@futurecalls.com', '9999999999', '2019-08-17 00:57:46'),
(17, '2', 'L1', 'Shahinsha.Z', 'shahinsha@futurecalls.com', '9999999999', '2019-08-17 00:58:48'),
(18, '2', 'L2', 'Shahinsha.Z', 'shahinsha@futurecalls.com', '9999999999', '2019-08-17 00:58:48'),
(19, '2', 'L3', 'Shahinsha.Z', 'shahinsha@futurecalls.com', '9999999999', '2019-08-17 00:58:48'),
(20, '2', 'L4', 'Shahinsha.Z', 'shahinsha@futurecalls.com', '9999999999', '2019-08-17 00:58:48'),
(21, '3', 'L1', 'Tamilarasan', 'tamilarasan@futurecalls.com', '9999999999', '2019-08-17 00:59:46'),
(22, '3', 'L2', 'Tamilarasan', 'tamilarasan@futurecalls.com', '9999999999', '2019-08-17 00:59:46'),
(23, '3', 'L3', 'Tamilarasan', 'tamilarasan@futurecalls.com', '9999999997', '2019-08-17 00:59:46'),
(24, '3', 'L4', 'Tamilarasan', 'tamilarasan@futurecalls.com', '9999999997', '2019-08-17 00:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `individualtarget`
--

CREATE TABLE `individualtarget` (
  `id` int(11) NOT NULL,
  `outboundcaller` varchar(255) NOT NULL,
  `q1amount` varchar(255) NOT NULL,
  `q2amount` varchar(255) NOT NULL,
  `q3amount` varchar(255) NOT NULL,
  `q4amount` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `individualtarget`
--

INSERT INTO `individualtarget` (`id`, `outboundcaller`, `q1amount`, `q2amount`, `q3amount`, `q4amount`, `created_at`) VALUES
(1, '65', '3400000', '3280000', '3600000', '3850000', '2019-11-21 11:58:04'),
(2, '65', '12', '1', '1', '1', '2019-11-25 10:08:04');

-- --------------------------------------------------------

--
-- Table structure for table `industry`
--

CREATE TABLE `industry` (
  `id` int(11) NOT NULL,
  `indus_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `industry`
--

INSERT INTO `industry` (`id`, `indus_name`) VALUES
(2, 'Agriculture'),
(3, 'Apparel'),
(4, 'Banking'),
(5, 'Biotechnology'),
(6, 'Chemicals'),
(7, 'Communications'),
(8, 'Construction'),
(9, 'Consulting'),
(10, 'Education'),
(11, 'Electronics'),
(12, 'Energy'),
(13, 'IT'),
(14, 'Entertainment'),
(15, 'Environmental'),
(16, 'Finance'),
(17, 'Food & Beverage'),
(18, 'Government'),
(19, 'HealthCare'),
(20, 'Hospitality'),
(21, 'Insurance'),
(22, 'Machinery'),
(23, 'Manufacturing'),
(24, 'Media'),
(25, 'Not For Profit'),
(26, 'Other'),
(27, 'Recreation'),
(28, 'Retail'),
(29, 'Shipping'),
(30, 'Technology'),
(31, 'Telecommunications'),
(32, 'Transportation'),
(33, 'Utilities');

-- --------------------------------------------------------

--
-- Table structure for table `knowledge_base`
--

CREATE TABLE `knowledge_base` (
  `id` int(10) NOT NULL,
  `subject` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `keyword` varchar(250) DEFAULT NULL,
  `file` varchar(250) DEFAULT NULL,
  `version` float DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `knowledge_base`
--

INSERT INTO `knowledge_base` (`id`, `subject`, `description`, `keyword`, `file`, `version`, `created_at`) VALUES
(1, 'Print Issu', 'Printer not working', 'Print', 'Ispat-Network Design.png', 1, '2019-12-09 11:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `lead`
--

CREATE TABLE `lead` (
  `id` int(11) NOT NULL,
  `lead_id` varchar(255) NOT NULL,
  `leadowner` varchar(255) NOT NULL,
  `customertype` varchar(255) NOT NULL,
  `customername` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `leadsource` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `customeraddress` varchar(500) NOT NULL,
  `vertical` varchar(255) NOT NULL,
  `leadstatus` varchar(255) NOT NULL,
  `oem` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `assignee` varchar(255) NOT NULL,
  `ordervalue` varchar(255) NOT NULL,
  `closuredate` varchar(255) NOT NULL,
  `leadperiod` varchar(250) NOT NULL DEFAULT 'Onetime',
  `status` varchar(255) NOT NULL,
  `comment_status` int(10) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `closure_value` varchar(250) NOT NULL,
  `flag` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lead`
--

INSERT INTO `lead` (`id`, `lead_id`, `leadowner`, `customertype`, `customername`, `company`, `industry`, `leadsource`, `phone`, `mobile`, `email`, `customeraddress`, `vertical`, `leadstatus`, `oem`, `product`, `assignee`, `ordervalue`, `closuredate`, `leadperiod`, `status`, `comment_status`, `created_at`, `closure_value`, `flag`) VALUES
(2, 'Anj400444', 'Pradeep V.Nair', 'New', 'Anjuman Trust', 'Anjuman Trust', '13', 'Employee Referral', '9884246046', '9884246046', 'info@gmail.com', 'chennai', '1', 'Cold', '1', ' VC', 'pradeep@futurecalls.com', '150000', '12/7/2018', 'Onetime', 'Drop', 0, '0000-00-00 00:00:00', '', 0),
(4, 'Wea341144', 'Suresh.J', 'Existing', 'WealthIndia Pvt Ltd', 'WealthIndia Pvt Ltd', '13', 'Employee Referral', '9840357191', '9840357191', 'sunil.bissa@fundsindia.com', 'Wealth India Pvt Ltd, royepet chennai', '1', 'Upside', '2', '30 Outbound License All inclusive', 'suresh.j@futurecalls.com', '4681772', '11/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(5, 'BFG191031', 'vinodha', 'Existing', 'BFG INDIA', 'BFG INDIA', '13', 'Employee Referral', '7799553222', '7799553222', 'mani@bfgindia.com', 'sricity', '3', 'Lead', '20', 'Antivirus', 'guruprasath@futurecalls.com', '30500', '12/7/2018', 'Onetime', 'Drop', 0, '0000-00-00 00:00:00', '', 0),
(6, 'Ver391011', 'vinodha', 'New', 'Veritas finance Pvt Ltd', 'Veritas finance Pvt Ltd', '13', 'Employee Referral', '9500079868', '9500079868', 'yogaraj.v@veritasfin.in', 'Gunidy', '2', 'Lead', '20', 'Audio and video Mixture', 'guruprasath@futurecalls.com', '213329', '12/18/2018', 'Onetime', 'Drop', 0, '0000-00-00 00:00:00', '', 0),
(7, 'Yog421008', 'vinodha', 'New', 'Veritas Finance Pvt Ltd', 'Veritas Finance Pvt Ltd', '13', 'Employee Referral', '9500079868', '9500079868', 'yogaraj.v@veritasfin.in', 'Gunidy', '3', 'Lead', '20', 'Trend micro', 'guruprasath@futurecalls.com', '78150', '12/18/2018', 'Onetime', 'Drop', 0, '0000-00-00 00:00:00', '', 0),
(8, 'Sma581009', 'vinodha', 'New', 'Smart Work Business Centre Pvt. Ltd', 'Smart Work Business Centre Pvt. Ltd', '13', 'Employee Referral', '9094566775', '9094566775', '\'it.chennai001@sworks.co.in\'', 'Gunidy', '2', 'Cold', '20', 'others', 'vijaybalaji@futurecalls.com', '1', '1/2/2019', 'Onetime', 'Drop', 0, '0000-00-00 00:00:00', '', 0),
(9, 'Sta500957', '', 'New', 'Arulraj', 'Mobius', '13', 'Employee Referral', '9094034585', '9094034585', 'arulrajk@mobiusservices.com', 'KK Nagar ', '1', 'Upside', '3', 'Call Center', 'vijaybalaji@futurecalls.com', '500000', '10/02.2020', 'Onetime', 'Drop', 0, '0000-00-00 00:00:00', '', 0),
(10, 'L&T341022', 'subhash V', 'Existing', 'L&T, SSC', 'L&T, SSC', '13', 'Employee Referral', '', '', 'Surajit.Saha@larsentoubro.com', 'Sakinaka, Mumbai', '1', 'Lead', '2', 'Altitude contact center ', 'subhashv@futurecalls.com', '700000', '11/20/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(11, 'rsp001033', 'Vijay Balaji', 'New', 'rspminfotech', 'rspminfotech', '13', 'Employee Referral', '9994698435', '9994698435', 'rspminfotech@gmail.com', 'Chennai', '7', 'Lead', '20', 'Switch & 9U Rack', 'vijaybalaji@futurecalls.com', '0', '12/14/2018', 'Onetime', 'Drop', 0, '0000-00-00 00:00:00', '', 0),
(12, 'Pro191029', 'Ranganath ', 'Existing', 'Proconnect', 'Proconnect', '13', 'Employee Referral', '7603930300', '7603930300', 'jaya.shankar@proconnect.co.in', 'Ekathuthangal', '5', 'Cold', '20', 'MPLS- Secure connect', 'guruprasath@futurecalls.com', '0', '1/31/2019', 'Onetime', 'Drop', 0, '0000-00-00 00:00:00', '', 0),
(13, 'Med251004', 'Ranganath ', 'New', 'Medraperit pep LLp', 'Medraperit pep LLp', '13', 'Employee Referral', '9840411922', '9840411922', 'anandhi@medraperitllp.com', 'Mylapore', '5', 'Lead', '20', 'Smartoffice', 'guruprasath@futurecalls.com', '0', '1/31/2019', 'Onetime', 'Drop', 0, '0000-00-00 00:00:00', '', 0),
(14, 'IBM411013', 'ArulJothi', 'New', 'IBM', 'IBM', '13', 'Employee Referral', '', '', 'kiran@IBM.com', 'Banglore', '1', 'Cold', '2', 'Altitude', 'aruljothi@futurecalls.com', '21000000', '3/29/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(17, 'Xph440941', 'Ranganath', 'New', 'Xphase solutions Pvt LTd', 'Xphase solutions Pvt LTd', '13', 'Employee Referral', '9845084143', '9845084143', 'anand.murthy@xphase.in', 'Bangalore', '1', 'Lead', '20', 'USB Headsets', 'vijaybalaji@futurecalls.com', '100000', '2/28/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(18, 'RIT480932', 'Vijay Balaji', 'Existing', 'RIT', 'RIT', '13', 'Employee Referral', '9841522439', '9841522439', 'vijaybalaji@futurecalls.com', 'Rajapalyam ', '7', 'Lead', '6', 'AMC / Switch ', 'vijaybalaji@futurecalls.com', '2200000', '2/20/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(19, 'L&T201017', 'subhash V', 'Existing', 'L&T, SSC', 'L&T, SSC', '13', 'Employee Referral', '9867661492', '9867661492', 'Surajit.Saha@larsentoubro.com', 'Sakinaka, Mumbai', '1', 'Lead', '2', 'Altitude contact center ', 'subhashv@futurecalls.com', '20000', '11/13/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(20, 'GRT091039', 'Pradeep V.Nair', 'New', 'GRT Logistic', 'GRT Logistic', '13', 'Employee Referral', '9176885773', '9176885773', 'viganandajothi@gmail.com', 'HCL building OMR', '1', 'Cold', '4', 'EPABX and cbaling ', 'pradeep@futurecalls.com', '200000', '12/17/2018', 'Onetime', 'Drop', 0, '0000-00-00 00:00:00', '', 0),
(21, 'CAM221014', 'ArulJothi', 'New', 'CAMS', 'CAMS', '13', 'Employee Referral', '', '', 'aruljothi@futurecalls.com', 'CHENNAI', '3', 'Cold', '20', 'SIEM', 'aruljothi@futurecalls.com', '1', '12/28/2018', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(22, 'CHO231031', 'ArulJothi', 'New', 'CHOLAMS', 'CHOLAMS', '13', 'Employee Referral', '', '', 'aruljothi@futurecalls.com', 'CHENNAI', '7', 'Cold', '20', 'INFOSEC AWARENESS TRAINING', 'aruljothi@futurecalls.com', '1', '12/26/2018', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(23, 'Ora181127', 'Vijay Balaji', 'Existing', 'Orange Retail finance ', 'Orange Retail finance ', '13', 'Employee Referral', '9841522439', '9841522439', 'balaji@orangeretailfinance.com', 'Chennai', '7', 'Lead', '20', 'AWS ', 'vijaybalaji@futurecalls.com', '22000', '2/20/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(25, 'TVS440530', '', 'Existing', 'TVS  Logistics ', 'TVS  Logistics ', '13', 'Employee Referral', '9841522439', '9841522439', ' vijay.shankar@tvslsl.com', 'Chennai', '3', 'Lead', '20', 'SOC ( Managed Security Operations Center ) Services', 'vijaybalaji@futurecalls.com', '3000000', '2/21/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(26, 'Shr360229', 'Pradeep V.Nair', 'Existing', 'Shriram value', 'Shriram value', '13', 'Employee Referral', '9566770558', '9566770558', 'madhankumar.n@shriramvalue.in', 'Mylapore', '1', 'Upside', '4', 'Avaya amc', 'pradeep@futurecalls.com', '35000', '2020-02-15', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(27, 'Vit000830', 'Vijay Balaji', 'Existing', 'Vital Papers ', 'Vital Papers ', '13', 'Employee Referral', '9841522439', '9841522439', 'vijaybalaji@futurecalls.com', 'TADA ', '7', 'Lead', '20', 'Chatbox ', 'vijaybalaji@futurecalls.com', '1', '2/22/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(31, 'Amo560916', 'Rajakirubanithi', 'New', 'Amogha', 'Amogha', '13', 'Employee Referral', '7904502624', '7904502624', 'bkarthic@amogapolymers.com', 'S.F.No. 336 /2, 4/1, Office 3 A, 2nd Floor,, Mayflower Valencia Building, Near Nava India Junction, Avinashi Road,, Coimbatore, Tamil Nadu 641004', '2', 'Lead', '20', 'Server', 'vijaybalaji@futurecalls.com', '10000', '2020-04-15', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(32, 'TVS130801', 'Vijay Balaji', 'Existing', 'TVS  Logistics ', 'TVS  Logistics ', '13', 'Employee Referral', '9841522439', '9841522439', 'manikandasaran.v@tvslsl.com', 'Chennai', '1', 'Lead', '15', 'Panasonic Phone ', 'vijaybalaji@futurecalls.com', '100000', '2/20/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(33, 'Ora230842', 'Vijay Balaji', 'Existing', 'Orange Retail finance ', 'Orange Retail finance ', '13', 'Employee Referral', '9841522439', '9841522439', 'balaji@orangeretailfinance.com', 'Chennai', '7', 'Lead', '19', 'Fortigate ', 'vijaybalaji@futurecalls.com', '400000', '2/18/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(34, 'Bat011116', 'subhash V', 'Existing', 'Batlivala & Karani Securities Ltd', 'Batlivala & Karani Securities Ltd', '13', 'Employee Referral', '-40316931', '-40316931', 'mukesh.mehta@bksec.com', 'Fort, Mumbai ', '1', 'Lead', '1', 'IPO', 'subhashv@futurecalls.com', '3000000', '11/19/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(36, 'Eff570432', 'vinodha', 'New', 'Efftronics', 'Efftronics', '13', 'Employee Referral', '9948681111', '9948681111', 'ravitheja@efftronics.com', 'Vijaywada', '3', 'Lead', '20', 'Antivirus', 'guruprasath@futurecalls.com', '300000', '5/20/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(37, 'Le 310920', 'Rajakirubanithi', 'New', 'Le  Meridan', 'Le  Meridan', '13', 'Employee Referral', '8939886130', '8939886130', 'rajakumar.thangaswamy@lemeridiencoimbatore.com', '762 Avinashi Road, Village, Neelambur, Coimbatore, Tamil Nadu 641062', '2', 'Lead', '20', 'Ruckus', 'guruprasath@futurecalls.com', '25594', '2/28/2019', 'Onetime', 'Drop', 0, '0000-00-00 00:00:00', '', 0),
(38, 'Man141143', 'vinodha', 'Existing', 'BFG INDIA', 'BFG INDIA', '13', 'Employee Referral', '7799553222', '7799553222', 'mani@bfgindia.com', 'sricity', '2', 'Lead', '20', 'others', 'guruprasath@futurecalls.com', '200000', '3/20/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(39, 'ish041251', 'Rajakirubanithi', 'New', 'isha', 'isha', '13', 'Employee Referral', '9962552696', '9962552696', 'vivek.sv@ishafoundation.org', 'Velliangiri Foothills Semmedu Post \r\n', '3', 'Lead', '20', 'Network Monitoring Tool', 'vijaybalaji@futurecalls.com', '7', '4/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(40, 'E F461223', 'Rajakirubanithi', 'New', 'E Facility', 'E Facility', '13', 'Employee Referral', '', '', 'rajan.d@sieratec.com', 'Kalapatti-Kurumbapalayam Rd', '2', 'Lead', '20', 'Networking', 'vijaybalaji@futurecalls.com', '777', '2020-03-30', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(41, 'Vih441204', '', 'New', 'Vihaan Info Service', 'Vihaan Info Service', '13', 'Employee Referral', '9930963318', '9930963318', 'shailendra@vihaaninfo.co.in', 'Bhandup (west), Mumbai', '1', 'Upside', '20', 'Headsets', 'sagar@futurecalls.com', '45000', '2/12/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(42, 'Vih491245', 'subhash V', 'New', 'Vihaan Info Service', 'Vihaan Info Service', '13', 'Employee Referral', '9930963318', '9930963318', 'shailendra@vihaaninfo.co.in', 'Bhandup(West), Mumbai', '1', 'Upside', '20', 'Headsets', 'sagar@futurecalls.com', '45000', '2/12/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(44, 'CUB591228', 'Suresh.J', 'Existing', 'CUB', 'CUB', '13', 'Employee Referral', '8801238822', '8801238822', 'suresh.j@futurecalls.com', 'chennai', '1', 'Upside', '20', 'SBC SIP to SIP gateway', 'suresh.j@futurecalls.com', '681500', '9/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(45, 'New171113', 'Vijay Balaji', 'Existing', 'RM Infocom', 'RM Infocom', '13', 'Employee Referral', '9841522439', '9841522439', 'manickam@newage.com', 'Chennai', '7', 'Lead', '20', 'EPABX ', 'vijaybalaji@futurecalls.com', '50000', '2/27/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(46, 'ROT320843', 'Vijay Balaji', 'New', 'ROTPL ', 'ROTPL ', '13', 'Employee Referral', '9841522439', '9841522439', 'rajesh@rotpl.com', 'Tripur ', '2', 'Lead', '20', 'Networking ', 'vijaybalaji@futurecalls.com', '50000', '3/8/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(47, 'App420943', 'Vijay Balaji', 'Existing', 'Apptium Technology', 'Apptium Technology', '13', 'Employee Referral', '9841522439', '9841522439', 'senthilkumar@apptium.com', 'Chennai ', '7', 'Lead', '19', 'Fortigate 300E & 80E', 'vijaybalaji@futurecalls.com', '500000', '2020-04-07', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(48, 'TVS440954', 'Vijay Balaji', 'Existing', 'TVS  Logistics ', 'TVS  Logistics ', '13', 'Employee Referral', '984522439', '984522439', 'manikandasaran.v@tvslsl.com', 'Chennai', '7', 'Lead', '20', 'I 2V Camera Software', 'vijaybalaji@futurecalls.com', '600000', '2/28/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(50, 'Qwa251044', 'Rajakirubanithi', 'Existing', 'Qway Technologies', 'Qway Technologies', '13', 'Employee Referral', '9944768912', '9944768912', 'boobalan@qwaytechnologies.com', 'QWay Technologies PVT, LTD\r\nJaya Enclave, 1st floor #1057,Avinashi Road,\r\nCoimbatore, Tamil Nadu â€“ 641 018', '2', 'Lead', '20', 'Networking', 'vijaybalaji@futurecalls.com', '777', '6/1/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(51, 'Bas250711', 'Vijay Balaji', 'New', 'Baskaran', 'Baskaran', '13', 'Employee Referral', '9841522439', '9841522439', 'vijaybalaji@futurecalls.com', 'Chennai', '7', 'Lead', '20', 'CCTV', 'vijaybalaji@futurecalls.com', '150000', '2020-04-07', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(52, 'woo481146', 'ArulJothi', 'Existing', 'woori bank', 'woori bank', '13', 'Employee Referral', '9841522499', '9841522499', 'aruljothi@futurecalls.com', 'chennai', '2', 'Cold', '20', 'Networking', 'vijaybalaji@futurecalls.com', '1', '3/12/2019', 'Onetime', 'Drop', 0, '0000-00-00 00:00:00', '', 0),
(54, 'ARM000934', 'Rajakirubanithi', 'New', 'ARMA Productions', 'ARMA Productions', '13', 'Employee Referral', '7708637444', '7708637444', 'dev@armapipl.com', '125, Villankurichi Rd, Behind Guru Complex, Vallar Nagar, Vishweshwara Nagar, Villankurichi, Coimbatore, Tamil Nadu 641035', '2', 'Lead', '20', 'Networking Cabling', 'vijaybalaji@futurecalls.com', '777', '2020-03-18', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(55, 'Uni191047', 'subhash V', 'Existing', 'UnitedHealthcare Parekh Insurance TPA Private Limited', 'UnitedHealthcare Parekh Insurance TPA Private Limited', '13', 'Employee Referral', '022 30657501', '022 30657501', 'vasudev.palav@uhcpindia.com', 'Sakinaka, Mumbai', '1', 'Upside', '2', 'V8 - Contact center', 'subhashv@futurecalls.com', '800000', '10/15/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(57, 'INF291045', 'ArulJothi', 'Existing', 'INFOSYS', 'INFOSYS', '13', 'Employee Referral', '9841522499', '9841522499', 'aruljothi@futurecalls.com', 'CHENNAI', '3', 'Lead', '20', 'RAPID7', 'aruljothi@futurecalls.com', '37020000', '3/19/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(60, 'Mad540922', 'ArulJothi', 'New', 'Madras Security Printer Smart City', 'Madras Security Printer Smart City', '13', 'Employee Referral', '9841522499', '9841522499', 'aruljothi@futurecalls.com', 'No.16/2 thiruveethi amman koil street koyambedu\r\nchennai', '1', 'Lead', '2', 'Altitude', 'aruljothi@futurecalls.com', '500000', '4/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(61, 'EPI211050', 'Pradeep V.Nair', 'New', 'EPICSOURCE', 'EPICSOURCE', '13', 'Employee Referral', '8681013111', '8681013111', '\'techdesk@episource.com\'', 'Chennai', '1', 'Cold', '1', 'EPABX and cbaling ', 'pradeep@futurecalls.com', '370000', '3/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(62, 'NHK161204', 'vinodha', 'Existing', 'NHK Spring', 'NHK Spring', '13', 'Employee Referral', '9731400446', '9731400446', 'arunkumarg@nhkspringindia.com', 'Sricity', '1', 'Lead', '1', 'Video Conference', 'guruprasath@futurecalls.com', '400000', '4/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(64, 'CTB240304', 'vinodha', 'New', 'CTBT Bank', 'CTBT Bank', '13', 'Employee Referral', '9840939362', '9840939362', 'srinivasan.s@ctbcbank.com', 'Sriperumpudur', '2', 'Lead', '20', 'Dell', 'guruprasath@futurecalls.com', '150000', '4/5/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(65, 'Sun170816', 'Vijay Balaji', 'New', 'Sundaram Medical ', 'Sundaram Medical ', '13', 'Employee Referral', '9841522439', '9841522439', 'Sundaran@medical.com', 'Chennai', '7', 'Lead', '16', 'Building To Building Connectivity.', 'vijaybalaji@futurecalls.com', '1', '5/3/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(66, 'Mot200512', 'Rajakirubanithi', 'New', 'Motherhood Hospitals', 'Motherhood Hospitals', '13', 'Employee Referral', '9840736693', '9840736693', 'yuvaraj.v@motherhoodindia.com', 'Opp. Indian Terrain, New No. 542, TT Krishnamachari Rd, Alwarpet, Chennai, Tamil Nadu 600018', '2', 'Upside', '13', 'CCTV', 'vijaybalaji@futurecalls.com', '600000', '7/7/2019', 'Onetime', 'Drop', 0, '0000-00-00 00:00:00', '', 0),
(67, 'GRT420500', 'Rajakirubanithi', 'Existing', 'GRT Logistics', 'GRT Logistics', '13', 'Employee Referral', '1234', '1234', 'ambalavanan.k@in.issworld.com', '89 tvk industrial estate ekkattuthangal, Chennai, Tamil Nadu 600036', '1', 'Upside', '4', 'EPABX, Switch, Microsoft office and Outlook', 'vijaybalaji@futurecalls.com', '1,59,666', '2020-03-05', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(68, 'OPG350747', 'Vijay Balaji', 'New', 'OPG Power', 'OPG Power', '13', 'Employee Referral', '9841522439', '9841522439', 'Pratap@opg.com', 'chennai', '7', 'Commit', '20', 'HP  Server Renewal', 'vijaybalaji@futurecalls.com', '25400', '1/24/2020', 'Onetime', 'Close', 0, '0000-00-00 00:00:00', '25370', 0),
(69, 'Pre231129', 'Rajakirubanithi', 'New', 'Precot Meridian', 'Precot Meridian', '13', 'Employee Referral', '9944422424', '9944422424', 'viswanathan@precot.com', 'puliakulam Road, Coimbatore', '2', 'Lead', '20', 'AVAYA', 'vijaybalaji@futurecalls.com', '777777777', '5/7/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(70, 'Mer301114', 'Rajakirubanithi', 'New', 'Meridian Hospital', 'Meridian Hospital', '13', 'Employee Referral', '4425564843', '4425564843', 'info@walfsinfra.com', 'kolathur, Chennai', '2', 'Upside', '20', 'Networking', 'vijaybalaji@futurecalls.com', '77777777', '6/22/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(71, 'Woo251056', '', 'Existing', 'Woori Bank', 'Woori Bank', '13', 'Employee Referral', '', '', 'pr', 'Gurgaon, Delhi', '7', 'Lead', '20', 'Chaviram to meet and explore opportunity', 'chaviram@futurecalls.com', '0', '6/1/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(72, 'Kri381032', 'vinodha', 'New', 'Kriti labs', 'Kriti labs', '13', 'Employee Referral', '9840634551', '9840634551', 'bala@kiritilabs.com', 'Thiruvanmiyur', '1', 'Lead', '3', 'Contaque', 'vijaybalaji@futurecalls.com', '150000', '5/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(73, 'Kir350907', 'Rajakirubanithi', 'New', 'Kirti Labs', 'Kirti Labs', '13', 'Employee Referral', '', '', 'bala.s@kritilabs.com', '#24A, S&M Consortium Dr. VSI Estate Phase2, Thiruvanmiyur, Chennai, Tamil Nadu 600041', '1', 'Upside', '3', 'Matrix', 'vijaybalaji@futurecalls.com', '138718', '2020-02-19', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(74, 'Kir360906', 'Rajakirubanithi', 'New', 'Kirti Labs', 'Kirti Labs', '13', 'Employee Referral', '', '', 'bala.s@kritilabs.com', '#24A, S&M Consortium Dr. VSI Estate Phase2, Thiruvanmiyur, Chennai, Tamil Nadu 600041', '1', 'Upside', '3', 'Contaque', 'vijaybalaji@futurecalls.com', '302080', '6/5/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(75, 'Spa541229', 'vinodha', 'New', 'Space Research center ', 'Space Research center ', '13', 'Employee Referral', '9440216251', '9440216251', 'graha@shar.gov.in', 'Andrapradesh', '7', 'Lead', '20', 'NVT Phy Bridge', 'guruprasath@futurecalls.com', '150000', '5/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(76, 'RRD520203', 'Rajakirubanithi', 'New', 'RRD Corporation Building', 'RRD Corporation Building', '13', 'Employee Referral', '11111', '11111', '1', 'Guindy Industrial Estate', '2', 'Lead', '20', 'Networking', 'vijaybalaji@futurecalls.com', '77', '6/7/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(77, 'bal171007', 'ArulJothi', 'Existing', 'orange  retails', 'orange  retails', '13', 'Employee Referral', '', '', 'aruljothi@futurecalls.com', 'chennai', '7', 'Lead', '20', 'SIEM', 'aruljothi@futurecalls.com', '20000', '6/21/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(78, 'Sue190900', 'Rajakirubanithi', 'New', 'Suez Project', 'Suez Project', '13', 'Employee Referral', '9871145963', '9871145963', 'parveshkumar.ext@suez.com', 'Avinashi road Coimbatore\r\n', '2', 'Upside', '20', 'Networking', 'vijaybalaji@futurecalls.com', '500000', '6/21/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(79, 'L&T571127', 'Admin', 'New', 'L&T Metro', 'L&T Metro', '13', 'Employee Referral', '9949612314', '9949612314', 'anirban.sinha@landtmetro.com', 'Hyd', '2', 'Upside', '8', 'Extreme Switches', 'vijaybalaji@futurecalls.com', '200000', '6/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(80, 'Hyu550909', 'Rajakirubanithi', 'New', 'Hyundai Mobis', 'Hyundai Mobis', '13', 'Employee Referral', '8754509066', '8754509066', 'ssubash@gmobis.com', 'MOBIS INDIA LIMITED,G-1, SIPCOT Industrial Park, Irrungattukottai, Sriperumbudur Taluk,Kancheepuram District,\r\n', '1', 'Lead', '3', 'Contaque', 'vijaybalaji@futurecalls.com', '777', '2020-03-25', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(81, 'GRT560951', 'Rajakirubanithi', 'Existing', 'GRT Jewellers', 'GRT Jewellers', '13', 'Employee Referral', '9600056500', '9600056500', 'vijay.r@grtjewelrs.com', 'T-Nagar', '1', 'Lead', '3', 'Contaque', 'vijaybalaji@futurecalls.com', '777', '2020-04-08', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(82, 'Ver191246', 'ArulJothi', 'New', 'Veritas Finance', 'Veritas Finance', '13', 'Employee Referral', '9841522499', '9841522499', 'aruljothi@futurecalls.com', 'chennai', '7', 'Lead', '20', 'LTS -SIEM', 'aruljothi@futurecalls.com', '400000', '7/24/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(84, 'Spa231103', 'Vijay Balaji', 'Existing', 'Spark Capital', 'Spark Capital', '13', 'Employee Referral', '9841522439', '9841522439', 'arun@sparkcapital.in', 'Chennai', '1', 'Commit', '4', 'Matrix IP Extension.', 'vijaybalaji@futurecalls.com', '12000', '2020-02-13', 'Onetime', 'Close', 0, '0000-00-00 00:00:00', '12890', 0),
(85, 'Nau121018', 'vinodha', 'New', 'Nauny Consultant', 'Nauny Consultant', '13', 'Employee Referral', '9886651381', '9886651381', 'Sam <sam@ashersolutions.in>', 'Bangalore', '2', 'Lead', '20', 'Dell Server', 'guruprasath@futurecalls.com', '9000000', '6/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(86, 'Sha241017', 'vinodha', 'New', 'Shariff  Consultant', 'Shariff  Consultant', '13', 'Employee Referral', '8122212922', '8122212922', 'Sam <sam@ashersolutions.in>', 'Mountroad', '2', 'Lead', '20', 'Lenovo Desktop', 'guruprasath@futurecalls.com', '4000000', '6/24/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(87, 'mob531009', 'Rajakirubanithi', 'New', 'mobius 365', 'mobius 365', '13', 'Employee Referral', '9789652800', '9789652800', 'anbuvadivel@mobius365.com', 'Pappanaickenpalayam, Coimbatore', '1', 'Lead', '3', 'Contaque', 'vijaybalaji@futurecalls.com', '77', '7/31/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(88, 'Mr.561051', 'Pradeep V.Nair', 'New', 'Mr. Prakash Hosur.', 'Mr. Prakash Hosur.', '13', 'Employee Referral', '9787141830', '9787141830', 'pradeep@futurecalls.com', '16/2 thiruveedi\r\nkoyampedu', '1', 'Upside', '1', 'cloud VC', 'pradeep@futurecalls.com', '55000', '6/30/2019', 'Onetime', 'Drop', 0, '0000-00-00 00:00:00', '', 0),
(89, 'IRC001101', 'Pradeep V.Nair', 'Existing', 'IRCS', 'IRCS', '13', 'Employee Referral', '', '', 'vimal@ircs.org', 'DMS', '1', 'Upside', '1', 'avaya AMC', 'pradeep@futurecalls.com', '960000', '6/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(90, 'New440916', 'Rajakirubanithi', 'New', 'New', 'New', '13', 'Employee Referral', '9677773536', '9677773536', 'arun.bsmed@gmail.com', 'Coimbatore', '1', 'Lead', '3', 'Contaque', 'vijaybalaji@futurecalls.com', '777', '7/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(91, 'Ind071045', 'Rajakirubanithi', 'New', 'Indus Towers', 'Indus Towers', '13', 'Employee Referral', '', '', 'ithd.chn@industowers.com', 'Jawaharlal Nehru road, Ekkattuthangal\r\n', '5', 'Lead', '20', 'MPLS', 'vijaybalaji@futurecalls.com', '777', '2020-04-13', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '10000', 0),
(93, 'Gan411058', 'Rajakirubanithi', 'New', 'Ganges', 'Ganges', '13', 'Employee Referral', '7550260311', '7550260311', 'shivashankar@gangesintl.com', 'Chennai', '5', 'Upside', '20', 'MPLS', 'guruprasath@futurecalls.com', '17000', '7/30/2019', 'Onetime', 'Drop', 0, '0000-00-00 00:00:00', '', 0),
(94, 'For580114', 'Rajakirubanithi', 'New', 'Forsan Foods & Consumer Products India PVT Ltd', 'Forsan Foods & Consumer Products India PVT Ltd', '13', 'Employee Referral', '9629490537', '9629490537', 'sarjun@forsan.in', 'Adambakkam, Chennai', '1', 'Upside', '4', 'EPABX', 'vijaybalaji@futurecalls.com', '87980', '2020-03-15', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(95, 'Cha480924', 'Vijay Balaji', 'Existing', 'Chandrasekar School', 'Chandrasekar School', '13', 'Employee Referral', '9841522439', '9841522439', 'egams@gmail.com', 'Chennai ', '7', 'Commit', '20', 'OFC Cable', 'vijaybalaji@futurecalls.com', '67000', '2020-02-07', 'Onetime', 'Close', 0, '0000-00-00 00:00:00', '67208', 0),
(96, 'Ora301231', 'T.Jaganathan', 'Existing', 'Orange Retail', 'Orange Retail', '13', 'Employee Referral', '97906 36009', '97906 36009', 'balaji.tk@orangeretailfinance.com', 'Adyar, Chennai', '6', 'Lead', '22', 'iSPARK ticketing system', 'guruprasath@futurecalls.com', '100000', '7/5/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(97, 'Ora321208', 'T.Jaganathan', 'Existing', 'Orange Retail', 'Orange Retail', '13', 'Employee Referral', '99999', '99999', 'balaji.tk@orangeretailfinance.com', 'Adyar, Chennai', '1', 'Upside', '4', 'EPABX for branches', 'pradeep@futurecalls.com', '500000', '7/5/2019', 'Onetime', 'Drop', 0, '0000-00-00 00:00:00', '', 0),
(98, 'Uni121226', 'subhash V', 'Existing', 'UnitedHealthcare Parekh Insurance', 'UnitedHealthcare Parekh Insurance', '13', 'Employee Referral', '2230657501', '2230657501', 'vasudev.palav@uhcpindia.com', 'Sakinaka, Andheri', '1', 'Lead', '2', 'Basic Chat', 'subhashv@futurecalls.com', '500000', '11/13/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(99, 'bha080256', 'Admin', 'New', 'bhawan cybertek', 'bhawan cybertek', '13', 'Employee Referral', '9856453219', '9856453219', 'Jhavla@bhawancybertek.com', 'OMR', '2', 'Lead', '20', 'CISCO', 'vijaybalaji@futurecalls.com', '500000', '2020-03-12', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(100, 'Baw000122', 'vinodha', 'New', 'Bawan Cybertek Dubai ', 'Bawan Cybertek Dubai ', '13', 'Employee Referral', '9717009795', '9717009795', 'shyam.s@bahwancybertek.com', 'OMR', '1', 'Lead', '20', 'Ip Phone', 'guruprasath@futurecalls.com', '10000000', '7/31/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(101, 'CEW110141', 'vinodha', 'New', 'CEWIT- CENTER OF EXCELLENCE IN WIRELESS TECHNOLOGY', 'CEWIT- CENTER OF EXCELLENCE IN WIRELESS TECHNOLOGY', '13', 'Employee Referral', '9940449934', '9940449934', 'Manikandan N <nmani@cewit.org.in>', 'Taramani', '2', 'Lead', '20', 'Dell server,Workstation,Desktop', 'guruprasath@futurecalls.com', '100000', '7/31/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(103, 'Pre430419', 'Rajakirubanithi', 'New', 'Precot Meridian', 'Precot Meridian', '13', 'Employee Referral', '9944422424', '9944422424', 'viswanathan@precot.com', '#737, Green Fields, Puliakulam Road, Coimbatore, Tamil Nadu 641045', '1', 'Lead', '1', 'VC', 'guruprasath@futurecalls.com', '84960', '11/1/2019', 'Onetime', 'Postponed', 0, '0000-00-00 00:00:00', '', 0),
(104, 'Pra260118', 'subhash V', 'Existing', 'Prabhat Dairy', 'Prabhat Dairy', '13', 'Employee Referral', '9.17E+11', '9.17E+11', 'sujeet.pathak@prabhatdairy.in', 'Srirampur, Maharashtra', '2', 'Lead', '5', 'Wireless network', 'subhashv@futurecalls.com', '700000', '8/14/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(105, 'TOP001004', 'Rajakirubanithi', 'New', 'TOPPR TECHNOLOGIES PRIVATE LIMITED ', 'TOPPR TECHNOLOGIES PRIVATE LIMITED ', '13', 'Employee Referral', '9677714342', '9677714342', 'ashok.ks@toppr.com', '50, 1st Floor, Nelson Manickam Rd, Opp Skywalk, Behind Indian Oil Pump,\r\nChennai - 600029', '5', 'Upside', '20', 'TATA', 'guruprasath@futurecalls.com', '170000', '8/31/2019', 'Onetime', 'Drop', 0, '0000-00-00 00:00:00', '', 0),
(106, 'CUB051040', 'Rajakirubanithi', 'New', 'CUBE84', 'CUBE84', '13', 'Employee Referral', '7358777009', '7358777009', 'naresh@cube84.com', 'Nelson Manickam Rd\r\n', '1', 'Lead', '1', 'XT4300 & AWS', 'vijaybalaji@futurecalls.com', '300000', '2020-04-15', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(107, 'TVS030801', 'Vijay Balaji', 'Existing', 'TVS ', 'TVS ', '13', 'Employee Referral', '9841522439', '9841522439', 'manikandasaran@tvs.com', 'Chennai ', '7', 'Upside', '20', 'TVS Panasonic EPABX ', 'vijaybalaji@futurecalls.com', '500000', '8/10/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(108, 'GRT041030', 'Pradeep V.Nair', 'Existing', 'GRT jewllery', 'GRT jewllery', '13', 'Employee Referral', '9787141830', '9787141830', 'vijay.r@grtgrand.com', 't nager', '1', 'Upside', '3', 'Contaque & ispark', 'pradeep@futurecalls.com', '975000', '8/24/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(109, 'Ava241039', 'vinodha', 'New', 'Avanti Feeds Limited', 'Avanti Feeds Limited', '13', 'Employee Referral', '9848136000', '9848136000', '\'kpraju@avantifeeds.com\'', 'vanti Feeds Limited,G-2, Concorde Apartments, 6-3-658, Somajiguda,Hyderabad-500082\'', '2', 'Lead', '20', 'Antivirus', 'guruprasath@futurecalls.com', '100000', '9/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(110, 'DP 271047', 'vinodha', 'New', 'DP World', 'DP World', '13', 'Employee Referral', '9820366296', '9820366296', 'Saugat.Dutta@dpworld.com', 'Delex,F5&F6, Mahakali Caves Rd, Shanti Nagar, Andheri East, Mumbai, Maharashtra 400093', '4', 'Lead', '20', 'l1 Resource', 'guruprasath@futurecalls.com', '100000', '9/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(111, 'inf331018', 'ArulJothi', 'Existing', 'infosys', 'infosys', '13', 'Employee Referral', '', '', 'aruljothi@futurecalls.com', 'chennai', '7', 'Lead', '20', 'rapid7', 'aruljothi@futurecalls.com', '0', '8/15/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(112, 'Vin561003', 'Dillibabu', 'New', 'Vinayaga Mechine', 'Vinayaga Mechine', '13', 'Employee Referral', '9362104515', '9362104515', 'post2murugan@gmail.com', 'salem', '1', 'Lead', '1', 'IP OFFICE', 'dillibabu@futurecalls.com', '100000', '9/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(113, 'BOR031122', 'Dillibabu', 'New', 'BORN Commerce Private Limited', 'BORN Commerce Private Limited', '13', 'Employee Referral', '9791012147', '9791012147', 'karthik.gangadaran@borngroup.com', 'Taramani, Chennai', '1', 'Lead', '1', 'AMC (Communication Manager)', 'dillibabu@futurecalls.com', '150000', '9/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(114, 'Hyu361125', 'Rajakirubanithi', 'New', 'Hyundai Mobis', 'Hyundai Mobis', '13', 'Employee Referral', '9840847785', '9840847785', 'sarvesh@gmobis.com', '989,Dhandapani Street,pappanaickenpalayam,\r\nvenugopal Pillai Layout,', '5', 'Upside', '20', 'TATA TOLL FREE', 'guruprasath@futurecalls.com', '9999', '9/8/2019', 'Onetime', 'Drop', 0, '0000-00-00 00:00:00', '', 0),
(115, 'Ste241249', 'Suresh.J', 'New', 'Sterling Holidays ', 'Sterling Holidays ', '13', 'Employee Referral', '8939991513', '8939991513', 'suresh.juluru@yahoo.com', 'Perungudi', '7', 'Upside', '20', 'Flotbot', 'suresh.j@futurecalls.com', '2800000', '11/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(116, 'Bha081104', 'vinodha', 'New', 'Bharath Institute ', 'Bharath Institute ', '13', 'Employee Referral', '9176343407', '9176343407', 'stephen.sysadmin@bharathuniv.ac.in', 'selaiyur', '1', 'Lead', '20', 'Sangoma Phones', 'guruprasath@futurecalls.com', '1400000', '8/12/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(117, 'Hyb260427', 'vinodha', 'New', 'Hyber', 'Hyber', '13', 'Employee Referral', '7810818822', '7810818822', 'lijiajun@hyber.com.cn', 'sricity', '2', 'Lead', '7', 'cabling.networking', 'guruprasath@futurecalls.com', '500000', '9/20/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(118, 'The350701', 'Vijay Balaji', 'Existing', 'Thermal Systems And Engineering.', 'Thermal Systems And Engineering.', '13', 'Employee Referral', '9841522439', '9841522439', 'preetham.sadagopan@thermalsystems.in', 'Chennai', '7', 'Upside', '14', 'CCTV  & Winserver ', 'vijaybalaji@futurecalls.com', '100000', '8/31/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(119, 'sue400742', 'Vijay Balaji', 'Existing', 'suez Project', 'suez Project', '13', 'Employee Referral', '9841522439', '9841522439', 'parvesh.kumar.ext@suez.com', 'Coimbatore ', '2', 'Upside', '20', 'Legrand  Fiber Cabile  ', 'vijaybalaji@futurecalls.com', '39900', '9/3/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(120, 'Fif420750', 'Vijay Balaji', 'Existing', 'Fifth Avenue', 'Fifth Avenue', '13', 'Employee Referral', '', '', 'manikham@fifthavenue.com', 'Chennai ', '7', 'Upside', '4', 'Biometric & CCTV', 'vijaybalaji@futurecalls.com', '25000', '2020-03-15', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(121, 'Tor191039', 'vinodha', 'New', 'Toray Industries (India) Private Limited', 'Toray Industries (India) Private Limited', '13', 'Employee Referral', '9952998355', '9952998355', 'manikanta.m@toray.in', '1800, EMC Road, Sricity, Chitoor, ', '2', 'Lead', '9', 'Laptop', 'guruprasath@futurecalls.com', '500000', '9/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(122, 'IEL241036', 'vinodha', 'New', 'IELEKTRON TECHNOLOGIES', 'IELEKTRON TECHNOLOGIES', '13', 'Employee Referral', '9962416878', '9962416878', 'admin@ielektron.com', 'Taramani, Chennai-600113,', '2', 'Lead', '20', 'Server/Server Lic ', 'guruprasath@futurecalls.com', '265000', '9/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(123, 'NSE291023', 'vinodha', 'New', 'NSEIT Limited ', 'NSEIT Limited ', '13', 'Employee Referral', '8976070704', '8976070704', 'services@globecaliber.com', 'No : 167, 1st Floor, A.R Complex, Arcot Road, Vadapalani, ', '7', 'Lead', '20', '50 Nos L1 Engineer', 'guruprasath@futurecalls.com', '100000', '9/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(124, 'tes420306', 'Pradeep V.Nair', 'Existing', 'test', 'test', '13', 'Employee Referral', '9843644039', '9843644039', 'santhiya@futurecalls.com', 'chennai', '1', 'Cold', '1', 'phone', 'pradeep@futurecalls.com', '5000', '8/31/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(125, 'Unl101232', 'Rajakirubanithi', 'New', 'Unlimited Innovation', 'Unlimited Innovation', '13', 'Employee Referral', '8072544946', '8072544946', 'itsupport@ubtiinc.com', 'Guindy Estate', '2', 'Upside', '20', 'Touch Screen TV(IT) ', 'vijaybalaji@futurecalls.com', '190000', '3/10/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(126, 'Inf410609', 'Suresh.J', 'Existing', 'Infosys CPC', 'Infosys CPC', '13', 'Employee Referral', '8939991513', '8939991513', 'suresh.j@futurecalls.com', 'bangalore', '7', 'Cold', '20', 'Automation Anyware', 'suresh.j@futurecalls.com', '1500000', '10/31/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(127, 'Unl331003', '', 'Existing', 'Unlimited Innovation', 'Unlimited Innovation', '13', 'Employee Referral', '8072544946', '8072544946', 'itsupport@ubtiinc.com', 'Guindy Estate', '2', 'Upside', '9', 'HP LaserJet MFP M436nda Printer', 'vijaybalaji@futurecalls.com', '71120', '3/1/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(128, 'MC 250440', 'Rajakirubanithi', 'New', 'MC Wayne', 'MC Wayne', '13', 'Employee Referral', '0422 4006400 ', '0422 4006400 ', 'rajakirubanithi@futurecalls.com', 'Coimbatore', '2', 'Lead', '20', 'All', 'vijaybalaji@futurecalls.com', '7', '11/1/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(129, 'Eff500903', 'Guruprasath', 'New', 'Effitrac', 'Effitrac', '13', 'Employee Referral', '9940286542', '9940286542', 'manojprabakar@effitrac.in', 'coimbatore', '6', 'Cold', '20', 'CRM', 'guruprasath@futurecalls.com', '1', '10/1/2019', 'Onetime', 'Drop', 0, '0000-00-00 00:00:00', '', 0),
(130, 'Sel520949', 'Guruprasath', 'New', 'Selathaar Ventures', 'Selathaar Ventures', '13', 'Employee Referral', '9600025015', '9600025015', 'AMER@SELATHAAR.COM', 'chennai', '6', 'Cold', '20', 'CRM', 'guruprasath@futurecalls.com', '1', '10/1/2019', 'Onetime', 'Drop', 0, '0000-00-00 00:00:00', '', 0),
(131, 'SAI550938', 'Guruprasath', 'New', 'SAI media productions', 'SAI media productions', '13', 'Employee Referral', '9884339875', '9884339875', 'venkatesan@saiproductionsindia.com', 'chennai', '6', 'Cold', '20', 'CRM', 'guruprasath@futurecalls.com', '1', '10/1/2019', 'Onetime', 'Drop', 0, '0000-00-00 00:00:00', '', 0),
(132, 'Shr580908', 'Guruprasath', 'New', 'Shrijothi New media consulting services', 'Shrijothi New media consulting services', '13', 'Employee Referral', '8754504713', '8754504713', 'srikanthpj@sjnmcs.in', 'chennai', '6', 'Cold', '20', 'CRM', 'guruprasath@futurecalls.com', '1', '10/1/2019', 'Onetime', 'Drop', 0, '0000-00-00 00:00:00', '', 0),
(133, 'APJ001015', 'Guruprasath', 'New', 'APJ Medical technology private ltd.', 'APJ Medical technology private ltd.', '13', 'Employee Referral', '9677006606', '9677006606', 'aarjun2110@gmail.com', 'chennai', '6', 'Cold', '20', 'CRM', 'guruprasath@futurecalls.com', '1', '10/1/2019', 'Onetime', 'Drop', 0, '0000-00-00 00:00:00', '', 0),
(134, 'UBS051005', 'Vijay Balaji', 'New', 'UBS ', 'UBS ', '13', 'Employee Referral', '9841522439', '9841522439', '\'navin.taneja@ubs.com\'', 'Hydrabad ', '1', 'Upside', '4', 'EPABX ', 'vijaybalaji@futurecalls.com', '600000', '9/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(135, 'shr391036', 'ArulJothi', 'Existing', 'shriram value', 'shriram value', '13', 'Employee Referral', '9841522499', '9841522499', 'aruljothi@futurecalls.com', 'CHENNAI', '7', 'Lead', '20', 'trend micro ', 'aruljothi@futurecalls.com', '1', '10/23/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(136, 'CON431020', 'ArulJothi', 'New', 'CONSULNEO WATT', 'CONSULNEO WATT', '13', 'Employee Referral', '9841522499', '9841522499', 'aruljothi@futurecalls.com', 'CHENNAI', '1', 'Lead', '20', 'contaque', 'aruljothi@futurecalls.com', '1', '9/26/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(137, 'Bri141004', 'ArulJothi', 'New', 'Brigade ', 'Brigade ', '13', 'Employee Referral', '9841522499', '9841522499', 'aruljothi@futurecalls.com', 'CHENNAI', '7', 'Lead', '20', 'sagama ip phone', 'aruljothi@futurecalls.com', '25000', '9/20/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(138, 'hdf331007', 'ArulJothi', 'New', 'hdfc', 'hdfc', '13', 'Employee Referral', '9841522499', '9841522499', 'aruljothi@futurecalls.com', 'CHENNAI', '7', 'Lead', '4', 'gsm gateway', 'aruljothi@futurecalls.com', '1', '9/25/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(139, 'TAT101025', 'subhash V', 'Existing', 'TATA Projects ', 'TATA Projects ', '13', 'Employee Referral', '9.20E+11', '9.20E+11', 'deepakm@tataprojects.com', 'Raipur', '1', 'Lead', '2', 'PS', 'subhashv@futurecalls.com', '1500000', '11/13/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(140, 'Vak190710', 'Vijay Balaji', 'New', 'Vakil Search ', 'Vakil Search ', '13', 'Employee Referral', '9841522439', '9841522439', 'balasubramanian@vakilsearch.com', 'Chennai ', '7', 'Upside', '19', 'Firewall ', 'vijaybalaji@futurecalls.com', '50000', '9/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(141, 'GAL220722', 'Vijay Balaji', 'New', 'GALORE NETWORKS INDIA PRIVATE LIMITED (S PRUDHVI KRISHNA)', 'GALORE NETWORKS INDIA PRIVATE LIMITED (S PRUDHVI KRISHNA)', '13', 'Employee Referral', '9176637266', '9176637266', 'prudhvi@ga-lore.com', 'Chennai ', '7', 'Upside', '22', 'Asses Management', 'vijaybalaji@futurecalls.com', '12000', '2020-02-13', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(142, 'TVS390912', 'Shahinsha', 'Existing', 'TVS Logistics', 'TVS Logistics', '13', 'Employee Referral', '9884264422', '9884264422', 'info@futurecalls.com', 'Chennai', '3', 'Upside', '18', 'NESSUS', 'vijaybalaji@futurecalls.com', '400000', '10/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(143, 'viv230243', 'Pradeep V.Nair', 'Existing', 'viveks', 'viveks', '13', 'Employee Referral', '9787141830', '9787141830', 'pradeep@futurecalls.com', '16/2 thiruveedi\r\nkoyampedu', '6', 'Upside', '22', 'ISPARK', 'pradeep@futurecalls.com', '150000', '9/27/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(144, 'net250250', 'Pradeep V.Nair', 'New', 'netech', 'netech', '13', 'Employee Referral', '9787141830', '9787141830', 'pradeep@futurecalls.com', 'Arumbakkam', '6', 'Cold', '22', 'ISPARK', 'pradeep@futurecalls.com', '100000', '9/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(145, 'Ter481115', 'subhash V', 'Existing', 'Terraform Global Pvt Ltd', 'Terraform Global Pvt Ltd', '13', 'Employee Referral', '91 22 49192800', '91 22 49192800', 'rachudan@terraformglobal.com', 'Equinox Tower 3, Kurla, Mumbai', '1', 'Lead', '1', 'AVAYA J169 phones', 'subhashv@futurecalls.com', '150000', '10/18/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(146, 'KLA171021', 'ArulJothi', 'Existing', 'KLA Tencore', 'KLA Tencore', '13', 'Employee Referral', '9841522499', '9841522499', 'aruljothi@futurecalls.com', 'CHENNAI', '7', 'Commit', '20', 'Automation Anywhere', 'aruljothi@futurecalls.com', '37000', '11/7/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(147, 'The181014', 'Vijay Balaji', 'Existing', 'Thermal Systems And Engineering.', 'Thermal Systems And Engineering.', '13', 'Employee Referral', '9841522439', '9841522439', 'preetham.sadagopan@thermalsystems.in', 'Ambatture ', '7', 'Upside', '20', 'Server License ', 'vijaybalaji@futurecalls.com', '70000', '10/16/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(148, 'TAT021119', 'subhash V', 'Existing', 'TATA Projects ', 'TATA Projects ', '13', 'Employee Referral', '91 9630731172', '91 9630731172', 'indrasingh-v@tataprojects.com', 'CG Dial 112, Raipur, Chhattisgarh', '1', 'Upside', '2', 'Altitude AMC ', 'subhashv@futurecalls.com', '120000', '12/25/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(150, 'Luc230414', 'Suresh.J', 'New', 'Lucknow_Police', 'Lucknow_Police', '13', 'Employee Referral', '8939991513', '8939991513', 'suresh.j@futurecalls.com', 'Lucknow', '6', 'Upside', '22', 'iSPARK 10 User', 'suresh.j@futurecalls.com', '630000', '12/31/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(151, 'Luc420442', 'Suresh.J', 'New', 'Lucknow_Police', 'Lucknow_Police', '13', 'Employee Referral', '8939991513', '8939991513', 'suresh.j@futurecalls.com', 'Lucknow', '1', 'Lead', '3', '10 sects', 'suresh.j@futurecalls.com', '284400', '12/31/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(152, 'Tri350430', 'Suresh.J', 'New', 'Tripura Tender', 'Tripura Tender', '13', 'Employee Referral', '8939991513', '8939991513', 'suresh.j@futurecalls.com', 'Tripura', '1', 'Upside', '2', '25 seats  call center', 'suresh.j@futurecalls.com', '920000', '12/31/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(153, 'Tri370450', 'Suresh.J', 'New', 'Tripura Tender', 'Tripura Tender', '13', 'Employee Referral', '8939991513', '8939991513', 'suresh.j@futurecalls.com', 'Tripura', '6', 'Upside', '22', 'iSPARK 30 users', 'suresh.j@futurecalls.com', '550000', '12/31/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(154, 'syg261011', 'Admin', 'New', 'sygna Engery', 'sygna Engery', '13', 'Employee Referral', '9837445699', '9837445699', 'meenakshi@sygnaeenergy.com', 'Hyd', '4', 'Cold', '22', 'ftoss', 'vijaybalaji@futurecalls.com', '10000', '11/30/2019', 'Onetime', 'Drop', 0, '0000-00-00 00:00:00', '', 0),
(155, 'KLA401039', 'Guruprasath', 'Existing', 'KLA Tencore', 'KLA Tencore', '13', 'Employee Referral', '9994006308', '9994006308', 'krishnakumar.madhavan@kla-tencor.com', 'chennai', '1', 'Lead', '1', 'AVAYA', 'guruprasath@futurecalls.com', '1', '11/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(156, 'Vin461020', 'Vijay Balaji', 'New', 'Vinoth ', 'Vinoth ', '13', 'Employee Referral', '9841522439', '9841522439', 'vioth@info.com', 'Chennai ', '7', 'Upside', '20', 'Access Point ', 'vijaybalaji@futurecalls.com', '20000', '10/26/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(157, 'Ast541034', 'vinodha', 'New', 'Astro software Technology', 'Astro software Technology', '13', 'Employee Referral', '8610389141', '8610389141', 'karthick@astro.com', 'Maraimalainagar', '3', 'Lead', '20', 'AWS storage', 'guruprasath@futurecalls.com', '250000', '2020-02-28', 'Onetime', 'Postponed', 0, '0000-00-00 00:00:00', '', 0),
(159, 'Uni511104', 'subhash V', 'Existing', 'UnitedHealthcare', 'UnitedHealthcare', '13', 'Employee Referral', '9769330546', '9769330546', 'vasudev.palav@uhcpindia.com', 'Sakinaka, Andheri, Mumbai', '2', 'Lead', '5', 'not yet finalize', 'subhashv@futurecalls.com', '100000', '11/20/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(160, 'Esq510949', 'Pradeep V.Nair', 'New', 'Esquire express india pvt ltd', 'Esquire express india pvt ltd', '13', 'Employee Referral', '9940071717', '9940071717', 'shakthiv@esquireexpress.in', 't nager', '6', 'Lead', '20', 'ISPARK', 'pradeep@futurecalls.com', '100000', '2/29/2020', 'Onetime', 'Postponed', 0, '0000-00-00 00:00:00', '', 0),
(161, 'pro530945', 'Pradeep V.Nair', 'New', 'proconnect', 'proconnect', '13', 'Employee Referral', '7338833516', '7338833516', 'jayen.natrajan@proconnect.co.in', 'gundy', '6', 'Lead', '20', 'ISPARK', 'pradeep@futurecalls.com', '200000', '11/30/2019', 'Onetime', 'Postponed', 0, '0000-00-00 00:00:00', '', 0),
(162, 'Spi121007', 'vinodha', 'New', 'Spic', 'Spic', '13', 'Employee Referral', '9840039350', '9840039350', 'n.rajagopalan@spic.co.in', 'Gunidy', '3', 'Lead', '20', 'AWS ', 'guruprasath@futurecalls.com', '400000', '11/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(163, 'Spi141004', 'vinodha', 'New', 'Spic', 'Spic', '13', 'Employee Referral', '9840039350', '9840039350', 'n.rajagopalan@spic.co.in', 'Gunidy', '7', 'Lead', '20', '200 MBPS', 'guruprasath@futurecalls.com', '150000', '11/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(164, 'AGS201051', 'Shahinsha', 'Existing', 'AGS Health', 'AGS Health', '13', 'Employee Referral', '9884264422', '9884264422', 'admin@futurecalls.com', 'Chennai', '3', 'Upside', '18', 'F-Secure- RDR', 'shahinsha@futurecalls.com', '400000', '25-02-2020', 'Onetime', 'Postponed', 0, '0000-00-00 00:00:00', '', 0),
(165, 'Int251048', 'vinodha', 'New', 'Integrated Enterprises', 'Integrated Enterprises', '13', 'Employee Referral', '8939994556', '8939994556', 'murali@integratedindia.in', 'Tnagar', '7', 'Cold', '20', 'TATA MPLS', 'guruprasath@futurecalls.com', '500000', '11/30/2019', 'Onetime', 'Drop', 0, '0000-00-00 00:00:00', '', 0),
(166, 'SPI481101', 'Shahinsha', 'New', 'SPIC', 'SPIC', '13', 'Employee Referral', '9884264422', '9884264422', 'Admin@futurecalls.com', 'chennai', '7', 'Upside', '20', 'AWS', 'shahinsha@futurecalls.com', '100000', '28-02-2020', 'Onetime', 'Postponed', 0, '0000-00-00 00:00:00', '', 0),
(167, 'inf011150', 'ArulJothi', 'Existing', 'infosys TDS', 'infosys TDS', '13', 'Employee Referral', '9841522499', '9841522499', 'aruljothi@futurecalls.com', 'bang lore', '1', 'Lead', '2', 'altitude', 'aruljothi@futurecalls.com', '1', '11/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(168, 'vis061100', 'ArulJothi', 'Existing', 'visinoryrcm', 'visinoryrcm', '13', 'Employee Referral', '9841522499', '9841522499', 'aruljothi@futurecalls.com', 'CHENNAI', '1', 'Lead', '20', 'Acunetix ', 'aruljothi@futurecalls.com', '1', '11/23/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(169, 'shr151132', 'ArulJothi', 'Existing', 'shriram city union', 'shriram city union', '13', 'Employee Referral', '9841522499', '9841522499', 'aruljothi@futurecalls.com', 'chennai', '7', 'Upside', '20', 'LTS -VA', 'aruljothi@futurecalls.com', '285000', '11/8/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(170, 'Shi011027', 'Pradeep V.Nair', 'Existing', 'Shipnet', 'Shipnet', '13', 'Employee Referral', '9787141830', '9787141830', 'pradeep@futurecalls.com', 'K360 thuraipakkam', '1', 'Lead', '1', 'EPABX  AMC', 'guruprasath@futurecalls.com', '80000', '11/16/2019', 'Onetime', 'Postponed', 0, '0000-00-00 00:00:00', '', 0),
(171, 'Sun001239', 'Guruprasath', 'New', 'Sun data tech', 'Sun data tech', '13', 'Employee Referral', '9345497061', '9345497061', 'sundatatech1920@gmail.com', 'coimbatore', '2', 'Lead', '19', 'sophos', 'guruprasath@futurecalls.com', '100000', '11/29/2019', 'Onetime', 'Postponed', 0, '0000-00-00 00:00:00', '', 0),
(172, 'NCR100400', 'ArulJothi', 'New', 'NCRMP EWDS Project - Kerala ', 'NCRMP EWDS Project - Kerala ', '13', 'Employee Referral', '9841522499', '9841522499', 'aruljothi@futurecalls.com', 'kerala', '1', 'Lead', '2', 'altitude', 'aruljothi@futurecalls.com', '2000000', '11/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(173, 'idf290710', 'ArulJothi', 'New', 'idfc bank', 'idfc bank', '13', 'Employee Referral', '9841522499', '9841522499', 'aruljothi@futurecalls.com', 'mumbai', '1', 'Lead', '4', 'gsm gateway', 'aruljothi@futurecalls.com', '1', '11/29/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(174, 'Spa360711', 'Vijay Balaji', 'Existing', 'Spark Capital ', 'Spark Capital ', '13', 'Employee Referral', '', '', 'arun@sparkcapital.in ', 'Chennai ', '7', 'Upside', '4', 'AMC ', 'vijaybalaji@futurecalls.com', '80000', '11/22/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0);
INSERT INTO `lead` (`id`, `lead_id`, `leadowner`, `customertype`, `customername`, `company`, `industry`, `leadsource`, `phone`, `mobile`, `email`, `customeraddress`, `vertical`, `leadstatus`, `oem`, `product`, `assignee`, `ordervalue`, `closuredate`, `leadperiod`, `status`, `comment_status`, `created_at`, `closure_value`, `flag`) VALUES
(175, 'Spa370740', 'Vijay Balaji', 'Existing', 'Spark Capital ', 'Spark Capital ', '13', 'Employee Referral', '9841522439', '9841522439', 'arun@sparkcapital.in ', 'Chennai ', '7', 'Upside', '4', 'Matrix Expansion Card ', 'vijaybalaji@futurecalls.com', '15000', '11/22/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(176, 'The480756', 'Vijay Balaji', 'Existing', 'Thermal Systems And Engineering.', 'Thermal Systems And Engineering.', '13', 'Employee Referral', '9841522439', '9841522439', 'preetham.sadagopan@thermalsystems.in', 'Chennai ', '7', 'Upside', '14', 'CCTV ', 'vijaybalaji@futurecalls.com', '50000', '11/22/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(177, 'TVS000855', 'Shahinsha', 'Existing', 'TVS', 'TVS', '13', 'Employee Referral', '9884264422', '9884264422', 'shahinsha@futurecalls.com', 'Chennai', '3', 'Upside', '18', 'Acunetix', 'shahinsha@futurecalls.com', '600000', '25-02-2020', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(178, 'SAV281022', 'Guruprasath', 'New', 'SAVVYAN', 'SAVVYAN', '13', 'Employee Referral', '9994006308', '9994006308', 'mahesh.n@savvyan.com', 'chennai', '7', 'Lead', '20', 'TATA', 'guruprasath@futurecalls.com', '300000', '11/22/2019', 'Onetime', 'Postponed', 0, '0000-00-00 00:00:00', '', 0),
(179, 'VID331046', 'Guruprasath', 'New', 'VIDHYA MANDHIR', 'VIDHYA MANDHIR', '13', 'Employee Referral', '9566060000', '9566060000', 'naren@vidhyamandhir.com', 'SRIPERUMBUTHUR', '2', 'Lead', '19', 'sophos', 'guruprasath@futurecalls.com', '100000', '1/30/2020', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(180, 'Pro321103', 'T.Jaganathan', 'New', 'ProConnect', 'ProConnect', '13', 'Employee Referral', '', '', 'jayen.natarajan@proconnect.co.in', 'Chennai', '3', 'Upside', '20', 'LTS Secure - Single Sign On', 'aruljothi@futurecalls.com', '600000', '11/20/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(181, 'INF241206', 'ArulJothi', 'Existing', 'INFOSYS National Open Access Registry (NOAR) Opportunity ', 'INFOSYS National Open Access Registry (NOAR) Opportunity ', '13', 'Employee Referral', '9841522499', '9841522499', 'aruljothi@futurecalls.com', 'Banglore', '7', 'Lead', '2', 'altitude', 'aruljothi@futurecalls.com', '1', '11/16/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(182, 'Fun080153', 'Suresh.J', 'Existing', 'Fundsindia', 'Fundsindia', '13', 'Employee Referral', '8939991513', '8939991513', 'suresh.j@futurecalls.com', 'chennai', '1', 'Upside', '22', '5 PS support', 'suresh.j@futurecalls.com', '20000', '11/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(183, 'Ora250937', 'Vijay Balaji', 'Existing', 'Orange Retail Finance ', 'Orange Retail Finance ', '13', 'Employee Referral', '9841522439', '9841522439', 'balaji@orangefinance.com', 'chennai', '7', 'Upside', '20', 'Clear tone Headset ', 'vijaybalaji@futurecalls.com', '32000', '11/22/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(184, 'Tec540958', 'Vijay Balaji', 'New', 'Tecton Engineering & Construction (India) Pvt.Ltd', 'Tecton Engineering & Construction (India) Pvt.Ltd', '13', 'Employee Referral', '9094162909', '9094162909', 'prabhu@tectonindia.com', 'Chennai', '7', 'Upside', '4', 'EPABX Matrix ', 'vijaybalaji@futurecalls.com', '182000', '11/29/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(185, 'EMR201011', 'Admin', 'New', 'EMRI', 'EMRI', '13', 'Employee Referral', '7655456782', '7655456782', 'prasad@emri.com', 'Hyd', '1', 'Lead', '1', 'Nortel', 'aruljothi@futurecalls.com', '4000000', '11/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(186, 'Mal441015', 'ArulJothi', 'New', 'Malles construction', 'Malles construction', '13', 'Employee Referral', '9841522499', '9841522499', 'aruljothi@futurecalls.com', 'chennai', '3', 'Commit', '20', 'Firewall / Antivirus', 'vijaybalaji@futurecalls.com', '100000', '2020-02-29', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(187, 'San371130', 'T.Jaganathan', 'Existing', 'Sankara Nethralaya', 'Sankara Nethralaya', '13', 'Employee Referral', '', '', 'mouli@snmail.org', 'College Road, Chennai', '2', 'Upside', '20', 'Switch & EPABX', 'vijaybalaji@futurecalls.com', '400000', '12/10/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(188, 'UHC250847', 'Suresh.J', 'Existing', 'UHC', 'UHC', '13', 'Employee Referral', '8939991513', '8939991513', 'suresh.j@futurecalls.com', 'Mumbai', '1', 'Upside', '1', 'IPOffice', 'subhashv@futurecalls.com', '170000', '12/31/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(189, 'Jou511125', 'vinodha', 'New', 'JoulestoWatts', 'JoulestoWatts', '13', 'Employee Referral', '9962479143', '9962479143', 'vinodhaarul123@gmail.com', 'chennai', '1', 'Lead', '1', 'Conference phone', 'guruprasath@futurecalls.com', '50000', '11/25/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(190, 'DEB261225', 'Suresh.J', 'New', 'DEBS', 'DEBS', '13', 'Employee Referral', '8939991513', '8939991513', 'suresh.j@futurecalls.com', 'chennai', '1', 'Upside', '1', 'Conf number', 'suresh.j@futurecalls.com', '56280', '11/30/2019', 'Onetime', 'Drop', 0, '0000-00-00 00:00:00', '', 0),
(191, 'viv120343', 'Suresh.J', 'Existing', 'viveks', 'viveks', '13', 'Employee Referral', '8939991513', '8939991513', 'suresh.j@futurecalls.com', 'chennai', '1', 'Upside', '3', 'Upgrade of existing version', 'suresh.j@futurecalls.com', '82600', '11/30/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(192, 'Apo001201', 'ArulJothi', 'New', 'Apollo Hospital', 'Apollo Hospital', '13', 'Employee Referral', '9841522499', '9841522499', 'aruljothi@futurecalls.com', 'chennai', '1', 'Lead', '4', 'matrix', 'aruljothi@futurecalls.com', '1', '12/19/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(196, 'shr021231', 'ArulJothi', 'Existing', 'shriram life', 'shriram life', '13', 'Employee Referral', '9841522499', '9841522499', 'aruljothi@futurecalls.com', 'chennai', '3', 'Lead', '20', 'LTS -SIEM', 'aruljothi@futurecalls.com', '1400000', '12/20/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(201, 'Int361033', 'vinodha', 'New', 'Integra software Pvt Ltd', 'Integra software Pvt Ltd', '13', 'Employee Referral', '8939994556', '8939994556', 'kalaiselvan.d@cleartc1.com', 'Pondicherry', '6', 'Upside', '22', 'Ticketing Tool', 'vijaybalaji@futurecalls.com', '300000', '2020-03-15', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(202, 'Int551031', 'vinodha', 'New', 'Integra software Pvt Ltd', 'Integra software Pvt Ltd', '13', 'Employee Referral', '8939994556', '8939994556', 'kalaiselvan.d@cleartc1.com', 'pondicherry', '3', 'Upside', '20', 'Asset Scan & Management', 'vijaybalaji@futurecalls.com', '300000', '2020-03-20', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(203, 'Ste331215', 'Suresh.J', 'Existing', 'Sterling Holidays ', 'Sterling Holidays ', '13', 'Employee Referral', '8939991513', '8939991513', 'suresh.j@futurecalls.com', 'chennai', '1', 'Lead', '2', 'AER', 'suresh.j@futurecalls.com', '1680000', '12/31/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(204, 'inf300242', 'ArulJothi', 'Existing', 'infosys SYED ', 'infosys SYED ', '13', 'Employee Referral', '9841522499', '9841522499', 'aruljothi@futurecalls.com', 'hydrabed', '1', 'Lead', '2', 'altitude', 'aruljothi@futurecalls.com', '1', '12/29/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(205, 'Hex161146', 'subhash V', 'Existing', 'Hexaware', 'Hexaware', '13', 'Employee Referral', '022-27783300 ', '022-27783300 ', 'ganeshy@hexaware.com', 'MAhape, New Mumbai', '1', 'Cold', '2', 'Supervisor licenses', 'subhashv@futurecalls.com', '50000', '12/25/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(206, 'Ste040906', 'Suresh.J', 'Existing', 'Sterling Holidays', 'Sterling Holidays', '13', 'Employee Referral', '8939991513', '8939991513', 'suresh.j@futurecalls.com', 'chennai', '1', 'Commit', '2', 'IVR PS', 'suresh.j@futurecalls.com', '121000', '2020-03-31', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(207, 'AXI490208', 'Mazhar', 'New', 'AXIS WIND FARMS (RAYALASEEMA) PRIVATE LIMITED', 'AXIS WIND FARMS (RAYALASEEMA) PRIVATE LIMITED', '13', 'Employee Referral', '', '', 'AXIS WIND FARMS (RAYALASEEMA) PRIVATE LIMITED', '6/5/694/2, near Ambedkar bhavan, SREENAGAR COLONY,\r\nAnantapur, Andhra Pradesh, 515001', '2', 'Upside', '22', 'Cabeling', 'subhashv@futurecalls.com', '42900', '12/31/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(208, 'AXI510233', 'Mazhar', 'New', 'AXIS WIND FARMS (RAYALASEEMA) PRIVATE LIMITED', 'AXIS WIND FARMS (RAYALASEEMA) PRIVATE LIMITED', '13', 'Employee Referral', '', '', 'AXIS WIND FARMS (RAYALASEEMA) PRIVATE LIMITED', '6/5/694/2, near Ambedkar bhavan, SREENAGAR COLONY,\r\nAnantapur, Andhra Pradesh, 515001', '2', 'Upside', '22', 'Cabeling', 'subhashv@futurecalls.com', '42900', '12/31/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(209, 'AXI520233', 'Mazhar', 'New', 'AXIS WIND FARMS (RAYALASEEMA) PRIVATE LIMITED', 'AXIS WIND FARMS (RAYALASEEMA) PRIVATE LIMITED', '13', 'Employee Referral', '', '', 'AXIS WIND FARMS (RAYALASEEMA) PRIVATE LIMITED', '6/5/694/2, near Ambedkar bhavan, SREENAGAR COLONY,\r\nAnantapur, Andhra Pradesh, 515001', '2', 'Lead', '22', 'Cabeling', 'subhashv@futurecalls.com', '42900', '12/19/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(210, 'AXI530221', 'Mazhar', 'New', 'AXIS WIND FARMS (RAYALASEEMA) PRIVATE LIMITED', 'AXIS WIND FARMS (RAYALASEEMA) PRIVATE LIMITED', '13', 'Employee Referral', '', '', 'AXIS WIND FARMS (RAYALASEEMA) PRIVATE LIMITED', '6/5/694/2, near Ambedkar bhavan, SREENAGAR COLONY,\r\nAnantapur, Andhra Pradesh, 515001', '2', 'Lead', '22', 'Cabeling', 'subhashv@futurecalls.com', '42900', '12/19/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(211, 'AXI131242', 'Mazhar', 'New', 'AXIS WIND FARMS (RAYALASEEMA) PRIVATE LIMITED', 'AXIS WIND FARMS (RAYALASEEMA) PRIVATE LIMITED', '13', 'Employee Referral', '', '', 'AXIS WIND FARMS (RAYALASEEMA) PRIVATE LIMITED', '6/5/694/2, near Ambedkar bhavan, SREENAGAR COLONY,\r\nAnantapur, Andhra Pradesh, 515001', '2', 'Upside', '22', 'Cabeling', 'mazhar@futurecalls.com', '42900', '12/31/2019', 'Onetime', 'Close', 0, '0000-00-00 00:00:00', '46830', 0),
(212, 'Sap211253', 'Mazhar', 'New', 'Sapphire Consultancy', 'Sapphire Consultancy', '13', 'Employee Referral', '', '', '\"ashok kumar\" <ashok.kumar@shapphirehs.com>; ', 'Solitor Park, Andheri East.', '7', 'Upside', '22', 'L1 Support', 'mazhar@futurecalls.com', '20000', '12/31/2019', 'Onetime', 'Drop', 0, '0000-00-00 00:00:00', '', 0),
(213, 'Sic440616', 'Vijay Balaji', 'Existing', 'Sicagen', 'Sicagen', '13', 'Employee Referral', '9790967402', '9790967402', 'ragavansitaram@gmail.com', 'Chennai ', '7', 'Commit', '5', 'Kaspersky', 'vijaybalaji@futurecalls.com', '442500', '2020-02-07', 'Onetime', 'Close', 0, '0000-00-00 00:00:00', '442500', 0),
(214, 'TA 050753', 'Vijay Balaji', 'New', 'TA  Venkata Subramani ', 'TA  Venkata Subramani ', '13', 'Employee Referral', '9600083324', '9600083324', 'vijaybalaji@futurecalls.com', 'Chennai ', '7', 'Upside', '20', 'Networking ', 'vijaybalaji@futurecalls.com', '123', '12/31/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(215, 'Rel090722', 'Vijay Balaji', 'Existing', 'Relationship Science ', 'Relationship Science ', '13', 'Employee Referral', '9902090291', '9902090291', 'vijaygopaalen7@gmail.com', 'Chennai', '7', 'Upside', '20', 'Stackup ', 'vijaybalaji@futurecalls.com', '12000', '12/31/2019', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(216, 'VRC230124', 'Pradeep V.Nair', 'Existing', 'VRCM', 'VRCM', '13', 'Employee Referral', '9787141830', '9787141830', 'pradeep@futurecalls.com', 'Hyd', '1', 'Commit', '1', 'Avaya IPO', 'pradeep@futurecalls.com', '240000', '2020-01-27', 'Onetime', 'Close', 0, '0000-00-00 00:00:00', '240000', 0),
(217, 'VRC260107', 'Pradeep V.Nair', 'Existing', 'VRCM', 'VRCM', '13', 'Employee Referral', '9787141830', '9787141830', 'pradeep@futurecalls.com', 'VRCM', '1', 'Commit', '1', 'Avaya IPO AMC', 'pradeep@futurecalls.com', '198000', '2020-02-08', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(218, 'shr270149', 'Pradeep V.Nair', 'Existing', 'shriram value', 'shriram value', '13', 'Employee Referral', '9787141830', '9787141830', 'pradeep@futurecalls.com', 'Perugudi', '1', 'Commit', '4', 'gateway', 'pradeep@futurecalls.com', '410000', '2020-01-27', 'Onetime', 'Close', 0, '0000-00-00 00:00:00', '410000', 0),
(219, 'shr280156', 'Pradeep V.Nair', 'Existing', 'shriram value', 'shriram value', '13', 'Employee Referral', '9787141830', '9787141830', 'pradeep@futurecalls.com', 'mylapore', '1', 'Commit', '4', 'Matrix amc', 'pradeep@futurecalls.com', '90000', '2020-02-15', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(220, 'Tri300139', 'Pradeep V.Nair', 'Existing', 'Trill it', 'Trill it', '13', 'Employee Referral', '9787141830', '9787141830', 'pradeep@futurecalls.com', 'Ramanujam IT park', '1', 'Commit', '1', 'Avaya IPO AMC', 'pradeep@futurecalls.com', '135000', '2020-02-15', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(221, 'ver001052', 'Admin', 'Existing', 'vermerian controls', 'vermerian controls', '13', 'Employee Referral', '9100903851', '9100903851', 'avinash@vermirian.com', 'tada', '2', 'Lead', '13', 'cctv', 'tamilarasan@futurecalls.com', '800000', '1/10/2020', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(222, 'Sun191036', 'ArulJothi', 'New', 'Sundaram Clayton Limited', 'Sundaram Clayton Limited', '13', 'Employee Referral', '', '', 'aruljothi@futurecalls.com', 'chennai', '7', 'Lead', '22', 'assessment', 'aruljothi@futurecalls.com', '0', '1/3/2020', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(223, 'Wab081230', 'T.Jaganathan', 'New', 'Wabag', 'Wabag', '13', 'Employee Referral', '72990 96652', '72990 96652', 'M.sivasubramanian@wabag.in', 'Wabag', '7', 'Upside', '4', 'Mobility Management', 'vijaybalaji@futurecalls.com', '300000', '1/30/2020', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(224, 'Pan121204', 'Tamilarasan', 'New', 'Panimalar Engineering College', 'Panimalar Engineering College', '13', 'Employee Referral', '8825951527', '8825951527', 'Rajesekar@gmail.com', 'Panimalar Engineering College', '7', 'Upside', '20', 'Matrix and Networking', 'tamilarasan@futurecalls.com', '2000000', '2020-04-04', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(225, 'Gem141259', 'Tamilarasan', 'Existing', 'Gem Hospital', 'Gem Hospital', '13', 'Employee Referral', '9600114902', '9600114902', 'IT GEM <it@geminstitute.in>', 'Chennai', '1', 'Upside', '1', 'Avaya Gateway & Recording Systems', 'tamilarasan@futurecalls.com', '300000', '1/10/2020', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(226, 'SKY591011', 'Guruprasath', 'Existing', 'SKYRAMS Outdoor Advertisings India Pvt Ltd', 'SKYRAMS Outdoor Advertisings India Pvt Ltd', '13', 'Employee Referral', '7397380600', '7397380600', 'guruking484@gmail.com', 'Chennai', '1', 'Upside', '4', 'Matrix', 'guruprasath@futurecalls.com', '1', '1/20/2020', 'Onetime', 'Drop', 0, '0000-00-00 00:00:00', '', 0),
(227, 'idf410923', '', 'New', 'idfc bank', 'idfc bank', '13', 'Employee Referral', '9841522499', '9841522499', 'aruljothi@futurecalls.com', 'CHENNAI', '1', 'Lead', '20', 'plantronic', 'aruljothi@futurecalls.com', '0', '1/24/2020', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(228, 'Cho520946', 'Suresh.J', 'New', 'Chola', 'Chola', '13', 'Employee Referral', '8939991513', '8939991513', 'suresh.j@futurecalls.com', 'Hyderabad', '1', 'Commit', '4', 'Epabx', 'suresh.j@futurecalls.com', '90820', '1/31/2020', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(229, 'Res591136', 'Tamilarasan', 'New', 'Resonance', 'Resonance', '13', 'Employee Referral', '', '', 'joseph@itresonance.com', 'Nungabakkam', '2', 'Upside', '4', 'CISCO SWITHES & MATRIX PRODUCTS', 'tamilarasan@futurecalls.com', '1000000', '2020-02-15', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(230, 'Pro021235', 'T.Jaganathan', 'Existing', 'ProConnect', 'ProConnect', '13', 'Employee Referral', '', '', 'jayashankar@proconnect.com', 'Mumbai', '2', 'Lead', '20', 'Networking at Warehouse', 'guruprasath@futurecalls.com', '100000', '1/10/2020', 'Onetime', 'Postponed', 0, '0000-00-00 00:00:00', '', 0),
(231, 'Tru061211', 'T.Jaganathan', 'New', 'Truecover', 'Truecover', '13', 'Employee Referral', '', '', 'amiyasagar@futurecalls.com', 'Mumbai', '3', 'Commit', '22', 'Web Application Assessment', 'shahinsha@futurecalls.com', '94400', '2020-01-28', 'Onetime', 'Close', 0, '0000-00-00 00:00:00', '94400', 0),
(233, 'Roy271212', 'T.Jaganathan', 'New', 'Royal Sundaram', 'Royal Sundaram', '13', 'Employee Referral', '', '', 'd', 'Chennai', '1', 'Lead', '20', 'Aurus RichCall', 'aruljothi@futurecalls.com', '400000', '1/30/2020', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(234, 'inf111026', 'ArulJothi', 'Existing', 'infosys ICEGATE', 'infosys ICEGATE', '13', 'Employee Referral', '9841522499', '9841522499', 'aruljothi@futurecalls.com', 'CHENNAI', '1', 'Cold', '22', 'contaque/rapid 7', 'aruljothi@futurecalls.com', '2000000', '1/22/2020', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(235, 'inf121034', 'ArulJothi', 'Existing', 'infosys BPO Preetham', 'infosys BPO Preetham', '13', 'Employee Referral', '9841522499', '9841522499', 'aruljothi@futurecalls.com', 'CHENNAI', '1', 'Lead', '2', 'altitude', 'aruljothi@futurecalls.com', '0', '1/16/2020', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(236, 'Ren060719', 'T.Jaganathan', 'New', 'Rentatowel', 'Rentatowel', '13', 'Employee Referral', '', '', 'ram.mohan@hyjiya.com', 'Dubai', '6', 'Commit', '22', 'iSPARK Sales & Service CRM', 'pradeep@futurecalls.com', '300000', '2020-02-15', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(237, 'UHC090853', 'T.Jaganathan', 'Existing', 'UHCP', 'UHCP', '13', 'Employee Referral', '', '', 'vasudev@optum.com', 'UHCP, Bengaluru', '1', 'Commit', '4', 'EPABX & Gateway', 'subhashv@futurecalls.com', '200000', '1/20/2020', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(238, 'UHC110824', 'T.Jaganathan', 'Existing', 'UHCP', 'UHCP', '13', 'Employee Referral', '', '', 'vasudev@optum.com', 'UHCP, Mumbai', '2', 'Upside', '5', 'LAN Switches', 'subhashv@futurecalls.com', '2000000', '1/18/2020', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(239, 'UHC120853', 'T.Jaganathan', 'Existing', 'UHCP', 'UHCP', '13', 'Employee Referral', '', '', 'vasudev@optum.com', 'UHCP, Mumbai', '1', 'Commit', '4', 'Gateway AMC', 'subhashv@futurecalls.com', '100000', '1/20/2020', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(240, 'Uni381110', 'subhash V', 'Existing', 'UnitedHealthcare', 'UnitedHealthcare', '13', 'Employee Referral', '+91 8928173817', '+91 8928173817', 'vasudev.palav@uhcpindia.com', 'Sakinaka, Andheri, Mumbai', '2', 'Lead', '20', 'Wi-Fi Solution', 'mazhar@futurecalls.com', '50000', '1/22/2020', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(241, 'Cri551110', 'Mazhar', 'New', 'Crimson&Co', 'Crimson&Co', '13', 'Employee Referral', '7045937433', '7045937433', '', 'Solitair Park, Andheri East. MUmbai 99', '7', 'Upside', '22', 'FMS', 'mazhar@futurecalls.com', '55000', '2020-02-20', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(242, 'Pol171240', 'Mazhar', 'Existing', 'Policy Bazaar Insurance Web Aggregator Pvt Ltd.', 'Policy Bazaar Insurance Web Aggregator Pvt Ltd.', '13', 'Employee Referral', '', '', '\"Md. Shafique Alam\" <shafique@policybazaar.com>; ', '14th floor DLH Park, Goregoan West.', '2', 'Upside', '7', '36U Network Enclosure Frame-600X1000-STEEL (NFR-36U-6010-BL-SK) and HDMI Cable.', 'mazhar@futurecalls.com', '32425', '1/16/2020', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(243, 'Inf471244', 'Suresh.J', 'Existing', 'Infosys CPC', 'Infosys CPC', '13', 'Employee Referral', '8939991513', '8939991513', 'suresh.j@futurecalls.com', 'Bangalore', '1', 'Commit', '2', 'Outbound IVR', 'suresh.j@futurecalls.com', '1120500', '1/31/2020', 'Onetime', 'Drop', 0, '0000-00-00 00:00:00', '', 0),
(244, 'Pan221010', 'Tamilarasan', 'Existing', 'Panimalar Hospital & Research Institute', 'Panimalar Hospital & Research Institute', '13', 'Employee Referral', '8825951527', '8825951527', 'rajj.mahes@gmail.com', 'Panimalar Medical College - Chennai', '2', 'Upside', '7', 'DLINK - NMS', 'tamilarasan@futurecalls.com', '80000', '2020-02-10', 'Onetime', 'Open', 0, '0000-00-00 00:00:00', '', 0),
(245, 'VIV510947', 'Guruprasath', 'Existing', 'VIVEKS', 'VIVEKS', '13', 'Employee Referral', '9500173293', '9500173293', 'harikrishnan.rajagopalan@viveks.com', 'chennai', '7', 'Commit', '20', 'TATA', 'guruprasath@futurecalls.com', '1000', '1/24/2020', 'Onetime', 'Close', 0, '0000-00-00 00:00:00', '1', 0),
(249, '031102', 'Pradeep V.Nair', 'New', 'Kathiresan', 'GRT', '13', 'Employee Referral', '044124578', '9898989898', 'kathresan@futurecalls.com', '', '6', 'Lead', '22', 'CRM', 'pradeep@futurecalls.com', '100000', '2020-01-31', 'Onetime', 'Open', 1, NULL, '', 0),
(250, '371142', 'Pradeep V.Nair', 'New', 'Raj Kumar', 'VS Hospital', '13', 'Employee Referral', '230858', '9876543210', 'rajkumar@vshospital.com', '', '6', 'Lead', '22', 'iSPRAK CRM', 'pradeep@futurecalls.com', '200000', '2020-02-03', 'Onetime', 'Open', 1, NULL, '', 0),
(251, '391131', 'Pradeep V.Nair', 'New', 'Viveks', 'Viveks', '13', 'Employee Referral', '230847', '9638527410', 'Viveks@gmail.com', '', '6', 'Lead', '22', 'iSPARK CRM', 'pradeep@futurecalls.com', '100000', '2020-02-09', 'Onetime', 'Open', 1, NULL, '', 0),
(252, '411107', 'Pradeep V.Nair', 'New', 'IP LINK', 'IP LINK', '13', 'Employee Referral', '230101', '7845129630', 'iplink@ip.com', '', '6', 'Lead', '22', 'iSPARK CRM', 'pradeep@futurecalls.com', '123123', '2020-01-31', 'Onetime', 'Open', 1, NULL, '', 0),
(253, '461102', 'Pradeep V.Nair', 'New', 'IP LINK', 'IP LINK', '13', 'Employee Referral', '230101', '7418529630', 'iplink@gmail.com', '', '6', 'Lead', '22', 'iSPARK CRM', 'pradeep@futurecalls.com', '120120', '2020-01-30', 'Onetime', 'Drop', 1, NULL, '', 0),
(254, '491138', 'Pradeep V.Nair', 'New', 'GAN Tech Solution', 'GAN Tech Solution', '13', 'Employee Referral', '230474', '8745963210', 'gantech@gmail.com', '', '6', 'Lead', '22', 'iSPARK CRM', 'pradeep@futurecalls.com', '333000', '2020-02-21', 'Onetime', 'Open', 1, NULL, '', 0),
(255, '511125', 'Pradeep V.Nair', 'New', 'Gani', 'Shankara Nethralaya', '13', 'Employee Referral', '230963', '6321459870', 'gani@gmail.com', '', '6', 'Lead', '22', 'iSPARK CRM', 'pradeep@futurecalls.com', '400000', '2020-03-16', 'Onetime', 'Open', 1, NULL, '', 0),
(256, '551153', 'Pradeep V.Nair', 'New', 'Hari', 'Redgrape', '13', 'Employee Referral', '203698', '5647891230', 'hari@gmail.com', '', '6', 'Lead', '22', 'iSPARK CRM', 'pradeep@futurecalls.com', '210210', '2020-02-07', 'Onetime', 'Open', 1, NULL, '', 0),
(257, '571129', 'Pradeep V.Nair', 'New', 'Bala', 'HDFC', '13', 'Employee Referral', '547541', '9988776655', 'bala@hdfc.com', '', '6', 'Lead', '22', 'iSPARK CRM', 'pradeep@futurecalls.com', '214564', '2020-02-11', 'Onetime', 'Open', 1, NULL, '', 0),
(258, '011227', 'Pradeep V.Nair', 'New', 'asdas', 'sdasdas', '3', 'Customer Event', '5122303205', '5122303205', 'herofasion@gmailcom', '', '2', '', '16', 'ISPARK CRM', 'chaviram@futurecalls.com', '100000', '2020-01-25', 'Onetime', 'Open', 1, NULL, '', 0),
(259, '051227', 'Pradeep V.Nair', 'New', 'Rintchen', 'LTS', '13', 'Employee Referral', '555444', '9874512630', 'Rintchen@gmal.com', '', '6', 'Lead', '22', 'iSPARK CRM', 'pradeep@futurecalls.com', '635241', '2020-02-06', 'Onetime', 'Open', 1, NULL, '', 0),
(260, '071225', 'Pradeep V.Nair', 'New', 'Bala Krishnan', 'Phoenix Mall', '13', 'Employee Referral', '857495', '7485961023', 'balakrishnan@gmail.com', '', '6', 'Lead', '22', 'iSPARK CRM', 'pradeep@futurecalls.com', '258741', '2020-02-26', 'Onetime', 'Open', 1, NULL, '', 0),
(261, '091204', 'Pradeep V.Nair', 'New', 'Lakshmi Narayanan', 'Fontier', '13', 'Employee Referral', '410852', '8574963210', 'lakshminarayanan@gmail.com', '', '6', 'Lead', '22', 'iPSPARK CRM', 'pradeep@futurecalls.com', '857485', '2020-02-11', 'Onetime', 'Open', 1, NULL, '', 0),
(262, '101252', 'Pradeep V.Nair', 'New', 'Ramakrishnan', 'Fahrenheit Technologies', '13', 'Employee Referral', '857136', '8364197510', 'ramakrishnan@gmail.com', '', '6', 'Lead', '22', 'iSPARK CRM', 'pradeep@futurecalls.com', '857496', '2020-03-17', 'Onetime', 'Open', 1, NULL, '', 0),
(263, '251242', 'Pradeep V.Nair', 'New', 'Silambarasan', 'SEC Communication', '13', 'Employee Referral', '852741', '7418529872', 'silambarasan@gmail.com', '', '6', 'Lead', '22', 'iSPARK CRM', 'pradeep@futurecalls.com', '748594', '2020-03-18', 'Onetime', 'Open', 1, NULL, '', 0),
(264, '301237', 'Pradeep V.Nair', 'New', 'Balaji', 'Trump Tech', '13', 'Employee Referral', '896523', '7845120610', 'balaji@gmail.com', '', '6', 'Lead', '22', 'iSPARK CRM', 'pradeep@futurecalls.com', '587421', '2020-03-12', 'Onetime', 'Open', 1, NULL, '', 0),
(265, '351234', 'Pradeep V.Nair', 'New', 'sk', 'sk telesystem', '13', 'Employee Referral', '857421', '9874563210', 'sk@gmail.com', '', '6', 'Lead', '22', 'iSPARK CRM', 'pradeep@futurecalls.com', '741852', '2020-03-11', 'Onetime', 'Open', 1, NULL, '', 0),
(266, '391208', 'Pradeep V.Nair', 'New', 'visa', 'visa telecom', '13', 'Employee Referral', '344544', '9743310255', 'visa@gmail.com', '', '6', 'Lead', '22', 'iSPARK CRM', 'pradeep@futurecalls.com', '748596', '2020-03-25', 'Onetime', 'Open', 1, NULL, '', 0),
(267, '471218', 'Pradeep V.Nair', 'New', 'Com', 'Com tech system', '13', 'Employee Referral', '635241', '7894258410', 'com@gmail.com', '', '6', 'Lead', '22', 'iSPARK CRM', 'pradeep@futurecalls.com', '888821', '2020-03-06', 'Onetime', 'Open', 1, NULL, '', 0),
(268, '501215', 'Pradeep V.Nair', 'New', 'Trust', 'Trust marketing', '13', 'Employee Referral', '963555', '8888888888', 'trust@gmail.com', '', '6', 'Lead', '22', 'iSPARK CRM', 'pradeep@futurecalls.com', '852747', '2020-02-06', 'Onetime', 'Open', 1, NULL, '', 0),
(269, '531201', 'Pradeep V.Nair', 'New', 'perfect', 'perfect vendor systems', '13', 'Customer Event', '741852', '7418529630', 'perfect@gmail.com', '', '6', 'Lead', '22', 'iSPARK CRM', 'pradeep@futurecalls.com', '258741', '2020-03-07', 'Onetime', 'Open', 1, NULL, '', 0),
(270, '561204', 'Pradeep V.Nair', 'New', 'Ae', 'Ae adfonic enterprise', '13', 'Employee Referral', '999666', '7418529630', 'aedfo@gmail.com', '', '6', 'Lead', '22', 'iSPARK CRM', 'pradeep@futurecalls.com', '963584', '2020-03-18', 'Onetime', 'Open', 1, NULL, '', 0),
(271, '571251', 'Pradeep V.Nair', 'New', 'telecraft', 'Telecraft avaya partner', '13', 'Employee Referral', '874521', '1028475960', 'telecraft@gmail.com', '', '6', 'Lead', '22', 'iSPARK CRM', 'pradeep@futurecalls.com', '547851', '2020-02-04', 'Onetime', 'Open', 1, NULL, '', 0),
(272, '591258', 'Pradeep V.Nair', 'New', 'Leo', 'Leo Tech', '13', 'Employee Referral', '852412', '7418529630', 'leo@gmail.com', '', '6', 'Lead', '22', 'iSPARK CRM', 'pradeep@futurecalls.com', '852741', '2020-03-18', 'Onetime', 'Open', 1, NULL, '', 0),
(273, '020112', 'Pradeep V.Nair', 'New', 'Sridaran', 'Integratech', '13', 'Employee Referral', '963851', '1234567890', 'sridaran@gmail.com', '', '6', 'Lead', '22', 'iSPARK CRM', 'ramya@futurecalls.com', '300000', '2020-03-24', 'Onetime', 'Open', 1, NULL, '', 0),
(274, '040138', 'Pradeep V.Nair', 'New', 'karthick', 'jay one minerals', '13', 'Employee Referral', '963524', '7418529630', 'karthick@gmail.com', '', '6', 'Lead', '22', 'iSPARK CRM', 'pradeep@futurecalls.com', '325412', '2020-03-10', 'Onetime', 'Open', 1, NULL, '', 0),
(275, '120129', 'Pradeep V.Nair', 'New', 'Swami', 'kumaran hospital', '13', 'Employee Referral', '957451', '9857431210', 'swami@gmail.com', '', '6', 'Lead', '22', 'iSPARK CRM', 'pradeep@futurecalls.com', '789054', '2020-02-05', 'Onetime', 'Open', 1, NULL, '', 0),
(276, '140133', 'Pradeep V.Nair', 'New', 'Deepan', 'Tiger analytics', '13', 'Employee Referral', '524196', '9685741230', 'deepan@gmail.com', '', '6', 'Lead', '22', 'iSPARK CRM', 'pradeep@futurecalls.com', '102010', '2020-02-19', 'Onetime', 'Open', 1, NULL, '', 0),
(277, '170140', 'Pradeep V.Nair', 'New', 'paneerselvam', 'DCD infra', '13', 'Employee Referral', '98765', '9685740321', 'paneerselvam@gmail.com', '', '6', 'Lead', '22', 'iSPARK CRM', 'pradeep@futurecalls.com', '987654', '2020-03-10', 'Onetime', 'Open', 1, NULL, '', 0),
(278, '220121', 'Pradeep V.Nair', 'New', 'Gokul', 'RAMCO', '13', 'Employee Referral', '458796', '7413692580', 'gokul@gmail.com', '', '6', 'Lead', '22', 'iSPARK CRM', 'ramya@futurecalls.com', '857496', '2020-03-11', 'Onetime', 'Open', 1, NULL, '', 0),
(279, '421031', 'Jaganathan', 'Existing', 'AGS Health', 'AGS Health', '13', 'Purchased List', '', '', 'pritesh.kabra@agshealth.com', '', '2', 'Commit', '8', 'LAN Switches', 'vijaybalaji@futurecalls.com', '6000000', '2020-02-21', 'Onetime', 'Open', 1, NULL, '', 0),
(280, '111037', 'Vijaybalaji.V', 'Existing', 'Arun', 'Spark Capital', '13', 'Other', '', '9791710903', '', '', '1', 'Commit', '4', 'Matrix EPABX', 'vijaybalaji@futurecalls.com', '540299', '2020-02-07', 'Onetime', 'Close', 1, NULL, '540299', 0),
(281, '421001', 'Shahinsha', 'Existing', 'Vijay', 'TVS Logistics', '26', 'Other', '', '9884264422', 'admin@futurecalls.com', '', '3', 'Commit', '18', 'Nessus-Tenable iO', 'shahinsha@futurecalls.com', '590000', '2020-01-28', 'Onetime', 'Close', 1, '2020-01-28 10:42:01', '590000', 0),
(282, '111123', 'Vijaybalaji.V', 'New', 'Arulraj', 'Mobius', '', 'Other', '9841522439', '', 'vijaygopaalen7@gmail.com', '', '1', 'Upside', '3', 'Call Center', 'vijaybalaji@futurecalls.com', '50000', '2020-02-10', 'Onetime', 'Open', 1, '2020-01-28 11:11:23', '', 0),
(283, '110525', 'Jaganathan', 'New', 'Arul Raj', 'Mobius', '13', 'Customer Event', '', '', '', '', '1', 'Commit', '3', 'Contaque & iSPARK', 'vijaybalaji@futurecalls.com', '200000', '2020-02-14', 'Onetime', 'Open', 1, '2020-01-28 17:11:25', '', 0),
(284, '141144', 'Subhash.V', 'Existing', 'Vasudev Palav', 'UnitedHealthcare', '19', 'Partner', '', '919769330546', 'vasudev.palav@uhcpindia.com', '', '1', 'Commit', '2', 'Altitude V8', 'subhashv@futurecalls.com', '815000', '2020-01-31', 'Onetime', 'Open', 1, '2020-01-28 23:14:44', '', 0),
(285, '321129', 'Subhash.V', 'Existing', 'Surajit Saha', 'L&T', '26', 'Partner', '', '9867661492', 'Surajit.Saha@larsentoubro.com', '', '1', 'Commit', '2', 'Altitude V8', 'subhashv@futurecalls.com', '299000', '2020-01-31', 'Onetime', 'Open', 1, '2020-01-28 23:32:29', '', 0),
(286, '090954', 'Subhash.V', 'New', 'Dr. Siddharth', 'Prudent Insurance Brokers', '21', 'Other', '', '+917506274482', '', '', '6', 'Lead', '22', 'Email management system', 'subhashv@futurecalls.com', '', '2020-02-29', 'Onetime', 'Open', 1, '2020-01-29 09:09:54', '', 0),
(287, '401143', 'Vijaybalaji.V', 'New', 'Rao', 'Rao', '19', 'Other', '', '9840231111', '', '', '1', 'Upside', '21', 'Voice & PBX', 'vijaybalaji@futurecalls.com', '80000', '2020-02-21', 'Onetime', 'Open', 1, '2020-01-29 11:40:43', '', 0),
(288, '561153', 'SURESH JULURI', 'New', 'Mr.Amar Kanna', 'Myanmar', '', 'Employee Referral', '', '8939991513', 'suresh.j@futurecalls.com', '', '1', 'Commit', '3', 'Contaque', 'suresh.j@futurecalls.com', '2520$', '2020-02-29', 'Onetime', 'Open', 1, '2020-01-29 11:56:53', '', 0),
(289, '020504', 'Aruljothi', 'New', 'madura micro  finance', 'Rajiv', '16', 'Other', '9003045859', '9941323596', 'aruljothi@futurecalls.com', '', '3', 'Lead', '22', 'LTS -SIEM', 'aruljothi@futurecalls.com', '0', '2020-02-20', 'Onetime', 'Open', 1, '2020-01-29 17:02:04', '', 0),
(290, '221041', 'SURESH JULURI', 'New', 'Mobis', 'Mobis', '', 'Other', '', '8939991513', 'suresh.j@futurecalls.com', '', '1', 'Upside', '3', 'Contact Center', 'suresh.j@futurecalls.com', '0', '2020-02-29', 'Onetime', 'Open', 1, '2020-01-30 10:22:41', '', 0),
(291, '191144', 'Subhash.V', 'Existing', 'Vasudev Palav', 'UnitedHealthare', '19', 'Employee Referral', '', '919769330546', 'vasudev.palav@uhcpindia.com', '', '2', 'Commit', '21', 'LAN Port scanning and rectification', 'subhashv@futurecalls.com', '60000', '2020-03-07', 'Onetime', 'Open', 1, '2020-01-30 23:19:44', '', 0),
(292, '170908', 'Jaganathan', 'New', 'Rajiv', 'Madura Micro Finance', '16', 'Customer Event', '', '', 'rajiv@mmfl.in', '', '5', 'Upside', '21', 'SmartVPN from TTSL', 'guruprasath@futurecalls.com', '200000', '2020-02-28', 'Onetime', 'Open', 1, '2020-01-31 09:17:08', '', 0),
(293, '190912', 'Jaganathan', 'New', 'Rajiv', 'Madura Micro Finance', '16', 'Customer Event', '', '', '', '', '1', 'Upside', '1', 'AVAYA Video Conference', 'guruprasath@futurecalls.com', '300000', '2020-02-28', 'Onetime', 'Open', 1, '2020-01-31 09:19:12', '', 0),
(294, '200948', 'Jaganathan', 'New', 'Ashok', 'Sundaram Clayton', '23', 'Employee Referral', '', '', '', '', '3', 'Lead', '18', 'LTS Secure SIEM', 'aruljothi@futurecalls.com', '1000000', '2020-02-28', 'Onetime', 'Open', 1, '2020-01-31 09:20:48', '', 0),
(295, '210958', 'Jaganathan', 'New', 'Sandy', 'Ashok Leyland', '23', 'Employee Referral', '', '', '', '', '3', 'Lead', '21', 'LTS Secure SIEM', 'aruljothi@futurecalls.com', '1000000', '2020-02-28', 'Onetime', 'Open', 1, '2020-01-31 09:21:58', '', 0),
(296, '330916', 'Vijaybalaji.V', 'Existing', 'Balaji', 'Orange Retail Finance', '13', 'Other', '09841522439', '', 'balaji@orangefinance.com', '', '1', 'Upside', '3', 'Call Center', 'vijaybalaji@futurecalls.com', '130000', '2020-02-14', 'Onetime', 'Open', 1, '2020-01-31 09:33:16', '', 0),
(297, '191124', 'Vijaybalaji.V', 'New', 'Surabi Technology', 'Surabi Technology', '3', 'Advertisement', '0448945265', '9845124589', 'surabi@gmail.com', '', '2', 'Commit', '3', 'server', 'vijaybalaji@futurecalls.com', '100000', '2020-02-14', 'Onetime', 'Open', 1, '2020-02-01 11:19:24', '', 0),
(298, '581238', 'Subhash.V', 'New', 'Prashant Mehere', 'Anand Rathi', '16', 'Partner', '02262817000', '', 'procurement@rathi.com', '', '1', 'Lead', '21', 'IP Phones', 'subhashv@futurecalls.com', '31000', '2020-02-08', 'Onetime', 'Open', 1, '2020-02-01 12:58:38', '', 0),
(299, '331002', 'TAMILARASAN P', 'Existing', 'Panimalar Hospital', 'Panimalar', '20', 'Other', '', '', 'rajesekar@gmail.com', '', '1', 'Commit', '21', 'XTEND BILLING SOFTWARE', 'tamilarasan@futurecalls.com', '23600', '2020-02-03', 'Onetime', 'Close', 1, '2020-02-02 22:33:02', '23600', 0),
(300, '560727', 'TAMILARASAN P', 'Existing', 'SRM', 'SRM UNIVERSITY', '10', 'Other', '8976767673', '8569991549', 'BOOPALAN.M@SRMUNIVERSITY.AC.IN', '', '2', 'Commit', '19', 'Fortinet Firewall & Networking', 'tamilarasan@futurecalls.com', '100000', '2020-02-04', 'Onetime', 'Close', 1, '2020-02-04 07:56:27', '100000', 0),
(301, '411026', 'Vijay.R', 'New', 'Arumugam', 'SSN COlllege', '10', 'Employee Referral', '9003277888', '9003277888', 'arumugam@ssn.co.in', '', '3', 'Lead', '19', 'FORTINET', 'guruprasath@futurecalls.com', '', '2020-02-29', 'Onetime', 'Drop', 1, '2020-02-04 10:41:26', '', 0),
(302, '180423', 'Notice:  Undefined index: username in C:\\xampp\\htdocs\\integrated-crm\\app\\views\\lead\\lead_master.php on line 74', 'New', 'rISHI', 'BridgeI2P', '10', 'Partner', '', '7829222200', 'rishi@bridgei2p.com', '', '1', 'Upside', '3', 'CONTAQUE', 'guruprasath@futurecalls.com', '', '2020-02-29', 'Onetime', 'Open', 1, '2020-02-04 16:18:23', '', 0),
(303, '281241', 'Vijaybalaji.V', 'Existing', 'Mohideen', 'AGS Health', '13', 'Other', '09841522439', '', 'Mohideen@agshealth.com', '', '7', 'Commit', '21', 'Nexpose', 'vijaybalaji@futurecalls.com', '55630', '2020-02-07', 'Onetime', 'Close', 1, '2020-01-22 12:28:41', '55630', 0),
(304, '370356', 'TAMILARASAN P', 'Existing', 'MANIKANDAN', 'GEM HOSPITAL', '20', 'Other', '', '9600114902', 'itchennai@geminstitute.in', '', '2', 'Commit', '21', 'XTEND BILLING SOFTWARE', 'tamilarasan@futurecalls.com', '6490', '2020-02-05', 'Onetime', 'Close', 1, '2020-02-05 15:37:56', '6490', 0),
(305, '590508', '<br />\r\n<b>Notice</b>:  Undefined index: username in <b>C:\\xampp\\htdocs\\integrated-crm\\app\\views\\lead\\lead_master.php</b> on line <b>74</b><br />', 'New', 'Uppilli Ramabhadran', 'IndusInd Bank', '4', 'Purchased List', '', '9840995997', 'uppily.ramabadran@indusind.com', '', '5', 'Upside', '21', 'SIP 100 channels', 'guruprasath@futurecalls.com', '45000', '2020-02-25', 'Onetime', 'Open', 1, '2020-02-05 17:59:08', '', 0),
(306, '241108', 'Vijay.R', 'Existing', 'Vimal', 'Blood Bank', '6', 'Employee Referral', '0441245789', '9845124578', 'ayzzz@gmail.com', '', '3', 'Cold', '19', 'Information security', 'shahinsha@futurecalls.com', '1000', '2020-02-07', 'Onetime', 'Open', 1, '2020-02-06 11:24:09', '', 0),
(307, '140541', 'Vijaybalaji.V', 'Existing', 'Vijayakumar', 'SRM', '13', 'Other', '', '9843684175', '', '', '7', '', '19', 'Fortnet 60E Renewal', 'vijaybalaji@futurecalls.com', '15000', '2020-02-22', 'Onetime', 'Open', 1, '2020-02-06 17:14:42', '', 0),
(308, '450639', 'Mazhar Khan', 'New', 'Mr. Prashant Mehere', 'M/S. Anand Rathi', '16', 'Advertisement', '02262817000', '', '', '', '1', 'Upside', '7', 'Digium Asterisk A22 - IP Phones', 'mazhar@futurecalls.com', '35,680', '2020-02-20', 'Onetime', 'Open', 1, '2020-02-06 18:45:40', '', 0),
(309, '531205', 'Pradeep V.Nair', 'New', 'Jagadish', 'Zenonline', '13', 'Partner', '9787141830', '', 'pradeep@futurecalls.com', '', '1', 'Commit', '1', 'Avaya IPO', 'pradeep@futurecalls.com', '48000', '2020-02-07', 'Onetime', 'Close', 1, '2020-02-07 12:53:05', '48000', 0),
(310, '581223', 'Pradeep V.Nair', 'New', 'Mr.Babu Ramaligam', 'ONX', '13', 'Other', '9787141830', '', 'pradeep@futurecalls.com', '', '1', 'Upside', '1', 'Avaya IPO', 'pradeep@futurecalls.com', '1600000', '2020-02-28', 'Onetime', 'Open', 1, '2020-02-07 12:58:23', '', 0),
(311, '000132', 'SURESH JULURI', 'Existing', 'Suresh', 'ITD Delhi', '13', 'Other', '8939991513', '8939991513', 'suresh.j@futurecalls.com', '', '1', 'Commit', '2', 'AMC', 'suresh.j@futurecalls.com', '742500', '2020-03-31', 'Onetime', 'Open', 1, '2020-02-07 13:00:33', '', 0),
(312, '010106', 'Pradeep V.Nair', 'Existing', 'Mr. Ravi', 'sharon playboard', '23', 'Other', '9787141830', '', 'pradeep@futurecalls.com', '', '1', 'Upside', '1', 'Avaya IPO', 'pradeep@futurecalls.com', '340000', '2020-02-28', 'Onetime', 'Open', 1, '2020-02-07 13:01:07', '', 0),
(313, '150115', 'TAMILARASAN P', 'Existing', 'Mr.Boopalan', 'SRM NIVERSITY', '10', 'Other', '', '8569991549', 'BOOPALAN.M@SRMUNIVERSITY.AC.IN', '', '2', 'Commit', '19', 'Fortinet Firewall', 'tamilarasan@futurecalls.com', '2400000', '2020-02-15', 'Onetime', 'Open', 1, '2020-02-07 13:15:16', '', 0),
(314, '230205', 'Guruprasath', 'Existing', 'Vijay Bysani', 'Viveks Home serve', '23', 'Other', '9840866000', '9840866000', 'vp@myhomeserveindia.com', '', '2', 'Commit', '4', 'GSM Gatway', 'guruprasath@futurecalls.com', '200000', '2020-02-29', 'Onetime', 'Open', 1, '2020-02-07 14:23:26', '', 0),
(315, '450451', 'Vijaybalaji.V', 'Existing', 'Sivakumar', 'Lapizdigital', '13', 'Other', '23623151', '9841522439', 'sivakumar@lapizdigital.com', '', '2', 'Lead', '21', 'Nexpose', 'aruljothi@futurecalls.com', '2050000', '2020-02-29', 'Onetime', 'Open', 1, '2020-02-07 16:45:52', '', 0),
(316, '270636', 'SURESH JULURI', 'New', 'MSP ARUL', 'LTS Saharanpur Smart city', '13', 'Other', '9841522499', '9841522499', 'aruljothi@futurecalls.com', '', '3', 'Cold', '21', 'LTS', 'aruljothi@futurecalls.com', '20111625', '2021-02-28', 'Onetime', 'Open', 1, '2020-02-08 18:27:57', '', 0),
(317, '540700', 'Vijaybalaji.V', 'Existing', 'Balaji', 'Orange Retail Finance', '13', 'Other', '23632150', '9841522439', 'balaji@orangefinance.com', '', '7', 'Commit', '19', 'Fortigate 80E', 'vijaybalaji@futurecalls.com', '131452', '2020-02-15', 'Onetime', 'Open', 1, '2020-02-10 07:54:21', '', 0),
(318, '570756', 'Vijaybalaji.V', 'New', 'Kalyan', 'Westminster', '20', 'Other', '9840485200', '9840485200', 'Kalyan@gmail.com', '', '7', 'Lead', '21', 'IPO', 'vijaybalaji@futurecalls.com', '100000', '2020-02-29', 'Onetime', 'Open', 1, '2020-02-10 07:57:56', '', 0),
(319, '570937', 'Pradeep V.Nair', 'Existing', 'Arul', 'VMCH', '19', 'Purchased List', '9787141830', '9787141830', 'pradeep@futurecalls.com', '', '1', 'Commit', '1', 'Avaya IPO AMC', 'pradeep@futurecalls.com', '140000', '2020-02-15', 'Annual', 'Open', 1, '2020-02-10 09:57:38', '', 0),
(320, '021058', 'Pradeep V.Nair', 'Existing', 'Arul', 'Vallammal Eng', '10', 'Purchased List', '9787141830', '9787141830', 'pradeep@futurecalls.com', '', '1', 'Commit', '1', 'Avaya IPO AMC', 'pradeep@futurecalls.com', '54000', '2020-02-15', 'Annual', 'Open', 1, '2020-02-10 10:02:59', '', 0),
(321, '231056', 'Guruprasath', 'Existing', 'Christopher', 'VIT', '10', 'Purchased List', '7338855861', '7338855861', 'guruprasath@futurecalls.com', '', '1', 'Upside', '21', 'TATA', 'guruprasath@futurecalls.com', '130000', '2020-02-29', 'Annual', 'Open', 1, '2020-02-10 10:23:57', '', 0),
(322, '271020', 'Shahinsha', 'New', 'Mr.Elango', 'Annexmed', '19', 'Employee Referral', '9884264422', '9884264422', 'admin@futurecalls.com', '', '3', 'Commit', '22', 'Information Security Assessment', 'shahinsha@futurecalls.com', '180000', '2020-02-12', 'Annual', 'Open', 1, '2020-02-10 10:27:20', '', 0),
(323, '291035', 'Shahinsha', 'New', 'Mr.Elango', 'Annexmed', '19', 'Employee Referral', '9884264422', '9884264422', 'admin@futurecalls.com', '', '3', 'Commit', '22', 'Information Security Assessment', 'shahinsha@futurecalls.com', '180000', '2020-02-12', 'Annual', 'Open', 1, '2020-02-10 10:29:35', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lead_update`
--

CREATE TABLE `lead_update` (
  `id` int(11) NOT NULL,
  `lead_id` varchar(255) NOT NULL,
  `customername` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `leadsource` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `vertical` varchar(255) NOT NULL,
  `oem` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `leadstatus` varchar(255) NOT NULL,
  `assignee` varchar(255) NOT NULL,
  `ordervalue` varchar(255) NOT NULL,
  `closuredate` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `actiontaken` varchar(255) NOT NULL,
  `nextaction` varchar(500) NOT NULL,
  `nextactiondate` date NOT NULL,
  `action_by` varchar(250) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lead_update`
--

INSERT INTO `lead_update` (`id`, `lead_id`, `customername`, `company`, `industry`, `leadsource`, `phone`, `mobile`, `email`, `vertical`, `oem`, `product`, `leadstatus`, `assignee`, `ordervalue`, `closuredate`, `status`, `created_at`, `actiontaken`, `nextaction`, `nextactiondate`, `action_by`, `updated_at`) VALUES
(1, '400135', 'testing', 'testingcompany', '10', 'Advertisement', '04423434543', '9845124568', 'vijaybalaji@futurecalls.com', '2', '3', 'biometric', 'Commit', 'viaybalaji@futurecalls.com', '50000', '2019-12-11', 'Open', '2019-12-10 13:40:35', '1', 'solution need to proposed with the help of technical person', '2020-01-13', NULL, '2020-01-12 19:12:46'),
(2, '400135', 'testing', 'testingcompany', '10', 'Advertisement', '04423434543', '90987878765', '90987878765', '2', '3', 'biometric', 'Commit', 'vijaybalaji@futurecalls.com', '500000', '2019-12-11', 'Open', '2019-12-10 13:40:35', '3', 'demo scheduled today', '2020-01-17', NULL, '2020-01-17 05:49:03'),
(3, '570832', 'Aban', 'Aban', '', 'Employee Referral', '9876545678', '9876567890', '9876567890', '2', '1', 'Anti Virus', 'Upside', 'vijaybalaji@futurecalls.com', '100000', '2020-01-02', 'Postponed', '2019-12-22 08:57:32', '1', 'Schedule demo', '2020-01-22', NULL, '2020-01-22 06:38:25'),
(4, 'Ste040906', 'Sterling Holidays', 'Sterling Holidays', '13', 'Employee Referral', '8939991513', '8939991513', '8939991513', '1', '2', 'IVR PS', 'Commit', 'suresh.j@futurecalls.com', '121000', '2020-03-31', 'Open', '0000-00-00 00:00:00', '2', 'Commercial on hold as customer requested to hold this for some time', '2020-03-31', NULL, '2020-01-28 04:29:07'),
(5, 'OPG350747', 'OPG Power', 'OPG Power', '13', 'Employee Referral', '9841522439', '9841522439', '9841522439', '7', '20', 'HP  Server Renewal', 'Commit', 'vijaybalaji@futurecalls.com', '25400', '1/24/2020', 'Open', '0000-00-00 00:00:00', '6', 'Should share the document', '0000-00-00', NULL, '2020-01-28 04:32:22'),
(6, 'Cho520946', 'Chola', 'Chola', '13', 'Employee Referral', '8939991513', '8939991513', '8939991513', '1', '4', 'Epabx', 'Commit', 'suresh.j@futurecalls.com', '90820', '1/31/2020', 'Open', '0000-00-00 00:00:00', '4', 'Negotiation call need to take which we will schedule today', '2020-01-28', NULL, '2020-01-28 04:38:35'),
(7, 'OPG350747', 'OPG Power', 'OPG Power', '13', 'Employee Referral', '9841522439', '9841522439', '9841522439', '7', '20', 'HP  Server Renewal', 'Commit', 'vijaybalaji@futurecalls.com', '25400', '1/24/2020', 'Open', '0000-00-00 00:00:00', '6', 'Should share the document', '2020-01-31', NULL, '2020-01-28 04:59:47'),
(8, 'AGS201051', 'AGS Health', 'AGS Health', '13', 'Employee Referral', '9884264422', '9884264422', '9884264422', '3', '18', 'F-Secure- RDR', 'Upside', 'shahinsha@futurecalls.com', '400000', '2/30/2020', 'Open', '0000-00-00 00:00:00', '2', 'Waiting for mamagement approval', '2020-02-28', NULL, '2020-01-28 05:17:17'),
(9, 'SPI481101', 'SPIC', 'SPIC', '13', 'Employee Referral', '9884264422', '9884264422', '9884264422', '7', '20', 'AWS', 'Upside', 'shahinsha@futurecalls.com', '10000', '02/10/2020', 'Open', '0000-00-00 00:00:00', '', '', '2020-02-16', NULL, '2020-01-28 05:27:42'),
(10, '421031', 'AGS Health', 'AGS Health', '13', 'Purchased List', '', '', '', '2', '8', 'LAN Switches', 'Commit', 'vijaybalaji@futurecalls.com', '2000000', '2020-01-31', 'Open', '0000-00-00 00:00:00', '1', 'AMC Proposal has to be sent by today EOD.', '2020-01-28', NULL, '2020-01-28 05:52:17'),
(11, 'Sma581009', 'Smart Work Business Centre Pvt. Ltd', 'Smart Work Business Centre Pvt. Ltd', '13', 'Employee Referral', '9094566775', '9094566775', '9094566775', '2', '20', 'others', 'Cold', 'vijaybalaji@futurecalls.com', '1', '1/2/2019', 'Open', '0000-00-00 00:00:00', '3', 'test mail', '2020-01-29', NULL, '2020-01-29 09:43:25'),
(12, 'Wea341144', 'WealthIndia Pvt Ltd', 'WealthIndia Pvt Ltd', '13', 'Employee Referral', '9840357191', '9840357191', '9840357191', '1', '2', '30 Outbound License All inclusive', 'Upside', 'suresh.j@futurecalls.com', '4681772', '11/30/2019', 'Open', '0000-00-00 00:00:00', '3', 'Demo license need to be provided for configuring the system with ZOHO', '2020-02-03', NULL, '2020-01-30 06:29:44'),
(13, '141144', 'Vasudev Palav', 'UnitedHealthcare', '19', 'Partner', '', '919769330546', '919769330546', '1', '2', 'Altitude V8', 'Commit', 'subhashv@futurecalls.com', '815000', '2020-01-31', 'Open', '2020-01-28 23:14:44', '4', 'PO received from customer', '2020-01-01', NULL, '2020-01-30 17:45:02'),
(14, 'Ren060719', 'Rentatowel', 'Rentatowel', '13', 'Employee Referral', '', '', '', '6', '22', 'iSPARK Sales & Service CRM', 'Commit', 'pradeep@futurecalls.com', '300000', '2020-02-08', 'Open', '0000-00-00 00:00:00', '3', 'Please make minimum changes and schedule demo', '2020-02-05', NULL, '2020-01-31 09:38:17'),
(15, 'Spa231103', 'Spark Capital', 'Spark Capital', '13', 'Employee Referral', '9841522439', '9841522439', '9841522439', '1', '4', 'Matrix IP Extension.', 'Commit', 'vijaybalaji@futurecalls.com', '12000', '6/13/2019', 'Open', '0000-00-00 00:00:00', '2', 'demo scheduled', '2020-02-01', NULL, '2020-02-01 06:10:55'),
(16, 'VRC260107', 'VRCM', 'VRCM', '13', 'Employee Referral', '9787141830', '9787141830', '9787141830', '1', '1', 'Avaya IPO AMC', 'Commit', 'pradeep@futurecalls.com', '198000', '2020-02-08', 'Open', '0000-00-00 00:00:00', '2', 'Still in AMC , Amc expire 15 feb before we get the PO', '2020-02-05', NULL, '2020-02-03 04:22:52'),
(17, 'shr280156', 'shriram value', 'shriram value', '13', 'Employee Referral', '9787141830', '9787141830', '9787141830', '1', '4', 'Matrix amc', 'Commit', 'pradeep@futurecalls.com', '90000', '2020-02-08', 'Open', '0000-00-00 00:00:00', '2', 'Quote submitted waiting for PO AMc expire end of feb', '2020-02-06', NULL, '2020-02-03 04:23:39'),
(18, 'Tri300139', 'Trill it', 'Trill it', '13', 'Employee Referral', '9787141830', '9787141830', '9787141830', '1', '1', 'Avaya IPO AMC', 'Commit', 'pradeep@futurecalls.com', '135000', '2020-02-08', 'Open', '0000-00-00 00:00:00', '2', 'AMC quote send  we contact the IT head will get end of this week', '2020-02-08', NULL, '2020-02-03 04:24:23'),
(19, 'Ren060719', 'Rentatowel', 'Rentatowel', '13', 'Employee Referral', '', '', '', '6', '22', 'iSPARK Sales & Service CRM', 'Commit', 'pradeep@futurecalls.com', '300000', '2020-02-08', 'Open', '0000-00-00 00:00:00', '2', 'Whats up integration going once finish will get the PO', '2020-02-29', NULL, '2020-02-03 04:25:14'),
(20, 'Shr360229', 'Shriram value', 'Shriram value', '13', 'Employee Referral', '9566770558', '9566770558', '9566770558', '1', '4', 'Avaya amc', 'Upside', 'pradeep@futurecalls.com', '35000', '2020-02-15', 'Open', '0000-00-00 00:00:00', '2', 'AMC Avaya will expire  30 march', '2020-03-30', NULL, '2020-02-03 04:26:25'),
(21, 'IRC001101', 'IRCS', 'IRCS', '13', 'Employee Referral', '', '', '', '1', '1', 'avaya AMC', 'Upside', 'pradeep@futurecalls.com', '960000', '6/30/2019', 'Open', '0000-00-00 00:00:00', '2', 'Already expired   send proposal waiting confirmation', '2020-02-15', NULL, '2020-02-03 04:27:44'),
(22, 'GRT041030', 'GRT jewllery', 'GRT jewllery', '13', 'Employee Referral', '9787141830', '9787141830', '9787141830', '1', '3', 'Contaque & ispark', 'Upside', 'pradeep@futurecalls.com', '975000', '8/24/2019', 'Open', '0000-00-00 00:00:00', '3', 'Demo running . after complete will get the PO', '2020-02-15', NULL, '2020-02-03 04:28:45'),
(24, 'Cri551110', 'Crimson&Co', 'Crimson&Co', '13', 'Employee Referral', '7045937433', '7045937433', '7045937433', '7', '22', 'FMS', 'Upside', 'mazhar@futurecalls.com', '100000', '1/21/2020', 'Open', '0000-00-00 00:00:00', '4', '', '0000-00-00', 'Mazhar Khan', '2020-02-06 13:17:49'),
(25, '531205', 'Jagadish', 'Zenonline', '13', 'Partner', '9787141830', '', '', '1', '1', 'Avaya IPO', 'Commit', 'pradeep@futurecalls.com', '48000', '2020-02-07', 'Open', '2020-02-07 12:53:05', '6', 'LIC should delivered', '2020-02-09', 'Pradeep V.Nair', '2020-02-10 04:22:22'),
(26, 'Ren060719', 'Rentatowel', 'Rentatowel', '13', 'Employee Referral', '', '', '', '6', '22', 'iSPARK Sales & Service CRM', 'Commit', 'pradeep@futurecalls.com', '300000', '2020-02-08', 'Open', '0000-00-00 00:00:00', '3', 'after whatsup', '2020-02-22', 'Pradeep V.Nair', '2020-02-10 04:23:52'),
(27, 'shr280156', 'shriram value', 'shriram value', '13', 'Employee Referral', '9787141830', '9787141830', '9787141830', '1', '4', 'Matrix amc', 'Commit', 'pradeep@futurecalls.com', '90000', '2020-02-08', 'Open', '0000-00-00 00:00:00', '4', 'following up', '2020-02-15', 'Pradeep V.Nair', '2020-02-10 04:24:34'),
(28, 'Tri300139', 'Trill it', 'Trill it', '13', 'Employee Referral', '9787141830', '9787141830', '9787141830', '1', '1', 'Avaya IPO AMC', 'Commit', 'pradeep@futurecalls.com', '135000', '2020-02-08', 'Open', '0000-00-00 00:00:00', '4', 'end of this months', '2020-02-15', 'Pradeep V.Nair', '2020-02-10 04:25:29'),
(29, 'VRC260107', 'VRCM', 'VRCM', '13', 'Employee Referral', '9787141830', '9787141830', '9787141830', '1', '1', 'Avaya IPO AMC', 'Commit', 'pradeep@futurecalls.com', '198000', '2020-02-08', 'Open', '0000-00-00 00:00:00', '4', 'today will receive', '2020-02-14', 'Pradeep V.Nair', '2020-02-10 04:25:58'),
(30, 'Wea341144', 'WealthIndia Pvt Ltd', 'WealthIndia Pvt Ltd', '13', 'Employee Referral', '9840357191', '9840357191', '9840357191', '1', '2', '30 Outbound License All inclusive', 'Upside', 'suresh.j@futurecalls.com', '4681772', '11/30/2019', 'Open', '0000-00-00 00:00:00', '3', 'POC need to be implemented', '2020-02-22', 'SURESH JULURI', '2020-02-10 04:34:27');

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
(1, 'santhiya@futurecalls.com', '10.10.10.62', '2019-12-06 12:32:37', 'Google Chrome', 'windows', '78.0.3904.108'),
(2, 'pradeep@futurecalls.com', '10.10.10.62', '2019-12-06 13:00:59', 'Google Chrome', 'windows', '78.0.3904.108'),
(3, 'pradeep@futurecalls.com', '10.10.10.62', '2019-12-06 17:08:31', 'Google Chrome', 'windows', '78.0.3904.108'),
(4, 'santhiya@futurecalls.com', '10.10.10.62', '2019-12-06 17:25:08', 'Google Chrome', 'windows', '78.0.3904.108'),
(5, 'dillibabu@futurecalls.com', '10.10.10.62', '2019-12-06 17:26:37', 'Google Chrome', 'windows', '78.0.3904.108'),
(6, 'pradeep@futurecalls.com', '10.10.10.62', '2019-12-06 18:11:14', 'Google Chrome', 'windows', '78.0.3904.108'),
(7, 'santhiya@futurecalls.com', '10.10.10.62', '2019-12-06 18:12:07', 'Google Chrome', 'windows', '78.0.3904.108'),
(8, 'pradeep@futurecalls.com', '10.10.10.62', '2019-12-06 18:15:31', 'Google Chrome', 'windows', '78.0.3904.108'),
(9, 'pradeep@futurecalls.com', '10.10.10.62', '2019-12-07 10:29:04', 'Google Chrome', 'windows', '78.0.3904.108'),
(10, 'pradeep@futurecalls.com', '10.10.10.62', '2019-12-07 11:33:48', 'Google Chrome', 'windows', '78.0.3904.108'),
(11, 'santhiya@futurecalls.com', '10.10.10.62', '2019-12-07 11:44:51', 'Google Chrome', 'windows', '78.0.3904.108'),
(12, 'pradeep@futurecalls.com', '10.10.10.62', '2019-12-09 10:10:23', 'Google Chrome', 'windows', '78.0.3904.108'),
(13, 'pradeep@futurecalls.com', '10.10.10.62', '2019-12-09 10:41:37', 'Google Chrome', 'windows', '78.0.3904.108'),
(14, 'santhiya@futurecalls.com', '10.10.10.62', '2019-12-09 10:41:50', 'Google Chrome', 'windows', '78.0.3904.108'),
(15, 'santhiya@futurecalls.com', '10.10.10.62', '2019-12-09 10:43:39', 'Google Chrome', 'windows', '78.0.3904.108'),
(16, 'pradeep@futurecalls.com', '10.10.10.62', '2019-12-09 10:56:18', 'Google Chrome', 'windows', '78.0.3904.108'),
(17, 'dillibabu@futurecalls.com', '10.10.10.62', '2019-12-09 11:02:53', 'Google Chrome', 'windows', '78.0.3904.108'),
(18, 'dillibabu@futurecalls.com', '10.10.10.62', '2019-12-09 11:03:33', 'Google Chrome', 'windows', '78.0.3904.108'),
(19, 'santhiya@futurecalls.com', '10.10.10.62', '2019-12-09 11:57:31', 'Google Chrome', 'windows', '78.0.3904.108'),
(20, 'venkatesan@futurecalls.com', '10.10.10.62', '2019-12-09 11:58:31', 'Google Chrome', 'windows', '78.0.3904.108'),
(21, 'venkatesan@futurecalls.com', '10.10.10.62', '2019-12-09 11:59:02', 'Google Chrome', 'windows', '78.0.3904.108'),
(22, 'santhiya@futurecalls.com', '10.10.10.62', '2019-12-09 12:04:05', 'Google Chrome', 'windows', '78.0.3904.108'),
(23, 'pradeep@futurecalls.com', '10.10.10.62', '2019-12-09 12:12:34', 'Google Chrome', 'windows', '78.0.3904.108'),
(24, 'kathiresun.vr@gmail.com', '10.10.10.62', '2019-12-09 12:20:47', 'Google Chrome', 'windows', '78.0.3904.108'),
(25, 'kathiresun.vr@gmail.com', '10.10.10.62', '2019-12-09 12:21:17', 'Google Chrome', 'windows', '78.0.3904.108'),
(26, 'pradeep@futurecalls.com', '10.10.10.62', '2019-12-09 15:08:36', 'Google Chrome', 'windows', '78.0.3904.108'),
(27, 'venkatesan@futurecalls.com', '10.10.10.62', '2019-12-09 16:05:22', 'Google Chrome', 'windows', '78.0.3904.108'),
(28, 'pradeep@futurecalls.com', '10.10.10.62', '2019-12-09 16:46:09', 'Google Chrome', 'windows', '78.0.3904.108'),
(29, 'pradeep@futurecalls.com', '10.10.10.62', '2019-12-10 16:51:40', 'Google Chrome', 'windows', '78.0.3904.108'),
(30, 'santhiya@futurecalls.com', '10.10.10.62', '2019-12-10 17:15:35', 'Google Chrome', 'windows', '78.0.3904.108'),
(31, 'pradeep@futurecalls.com', '10.10.10.62', '2019-12-10 17:25:15', 'Google Chrome', 'windows', '78.0.3904.108'),
(32, 'dillibabu@futurecalls.com', '10.10.10.62', '2019-12-10 17:30:39', 'Google Chrome', 'windows', '78.0.3904.108'),
(33, 'pradeep@futurecalls.com', '10.10.10.107', '2019-12-11 15:39:59', 'Google Chrome', 'windows', '78.0.3904.108'),
(34, 'pradeep@futurecalls.com', '10.10.10.107', '2019-12-12 10:04:43', 'Google Chrome', 'windows', '78.0.3904.108'),
(35, 'pradeep@futurecalls.com', '10.10.10.107', '2019-12-12 11:32:56', 'Google Chrome', 'windows', '78.0.3904.108'),
(36, 'pradeep@futurecalls.com', '10.10.10.107', '2019-12-12 11:56:30', 'Google Chrome', 'windows', '78.0.3904.108'),
(37, 'santhiya@futurecalls.com', '10.10.10.107', '2019-12-12 13:18:23', 'Google Chrome', 'windows', '78.0.3904.108'),
(38, 'pradeep@futurecalls.com', '10.10.10.107', '2019-12-12 13:20:14', 'Google Chrome', 'windows', '78.0.3904.108'),
(39, 'pradeep@futurecalls.com', '10.10.10.107', '2019-12-12 13:39:00', 'Google Chrome', 'windows', '78.0.3904.108'),
(40, 'pradeep@futurecalls.com', '10.10.10.107', '2019-12-12 15:08:22', 'Google Chrome', 'windows', '79.0.3945.79'),
(41, 'pradeep@futurecalls.com', '10.10.10.107', '2019-12-12 15:11:38', 'Google Chrome', 'windows', '79.0.3945.79'),
(42, 'pradeep@futurecalls.com', '10.10.10.107', '2019-12-12 15:58:05', 'Google Chrome', 'windows', '78.0.3904.108'),
(43, 'pradeep@futurecalls.com', '10.10.10.107', '2019-12-12 17:13:30', 'Google Chrome', 'windows', '78.0.3904.108'),
(44, 'pradeep@futurecalls.com', '10.10.10.107', '2019-12-13 10:04:11', 'Google Chrome', 'windows', '78.0.3904.108'),
(45, 'pradeep@futurecalls.com', '10.10.10.107', '2019-12-13 11:27:56', 'Google Chrome', 'windows', '78.0.3904.108'),
(46, 'pradeep@futurecalls.com', '10.10.10.107', '2019-12-13 16:48:15', 'Google Chrome', 'windows', '78.0.3904.108'),
(47, 'pradeep@futurecalls.com', '10.10.10.107', '2019-12-14 19:25:41', 'Google Chrome', 'windows', '78.0.3904.108'),
(48, 'pradeep@futurecalls.com', '10.10.10.107', '2019-12-16 11:46:33', 'Google Chrome', 'windows', '78.0.3904.108'),
(49, 'pradeep@futurecalls.com', '10.10.10.107', '2019-12-16 12:31:41', 'Google Chrome', 'windows', '78.0.3904.108'),
(50, 'pradeep@futurecalls.com', '10.10.10.107', '2019-12-16 13:11:01', 'Google Chrome', 'windows', '78.0.3904.108'),
(51, 'pradeep@futurecalls.com', '10.10.10.107', '2019-12-18 10:01:09', 'Google Chrome', 'windows', '79.0.3945.79'),
(52, 'pradeep@futurecalls.com', '10.10.10.107', '2019-12-18 14:26:38', 'Google Chrome', 'windows', '79.0.3945.79'),
(53, 'santhiya@futurecalls.com', '10.10.10.107', '2019-12-19 12:18:17', 'Google Chrome', 'windows', '79.0.3945.79'),
(54, 'santhiya@futurecalls.com', '10.10.10.107', '2019-12-19 15:46:03', 'Google Chrome', 'windows', '79.0.3945.88'),
(55, 'santhiya@futurecalls.com', '10.10.10.107', '2019-12-19 16:09:29', 'Google Chrome', 'windows', '79.0.3945.79'),
(56, 'pradeep@futurecalls.com', '10.10.10.107', '2019-12-19 16:32:24', 'Google Chrome', 'windows', '79.0.3945.88'),
(57, 'pradeep@futurecalls.com', '10.10.10.107', '2019-12-19 16:51:10', 'Google Chrome', 'windows', '79.0.3945.79'),
(58, 'santhiya@futurecalls.com', '10.10.10.107', '2019-12-19 16:57:21', 'Google Chrome', 'windows', '79.0.3945.88'),
(59, 'venkatesan@futurecalls.com', '10.10.10.107', '2019-12-19 16:57:43', 'Google Chrome', 'windows', '79.0.3945.88'),
(60, 'santhiya@futurecalls.com', '10.10.10.107', '2019-12-20 18:49:16', 'Google Chrome', 'windows', '79.0.3945.79'),
(61, 'santhiya@futurecalls.com', '10.10.10.107', '2019-12-20 19:38:58', 'Google Chrome', 'windows', '79.0.3945.79'),
(62, 'pradeep@futurecalls.com', '10.10.10.107', '2019-12-20 19:39:29', 'Google Chrome', 'windows', '79.0.3945.79'),
(63, 'pradeep@futurecalls.com', '10.10.10.107', '2019-12-21 10:44:23', 'Google Chrome', 'windows', '79.0.3945.88'),
(64, 'santhiya@futurecalls.com', '10.10.10.107', '2019-12-21 10:44:52', 'Google Chrome', 'windows', '79.0.3945.88'),
(65, 'pradeep@futurecalls.com', '10.10.10.107', '2019-12-21 10:47:54', 'Google Chrome', 'windows', '79.0.3945.88'),
(66, 'pradeep@futurecalls.com', '10.10.10.107', '2019-12-21 11:22:45', 'Google Chrome', 'windows', '79.0.3945.88'),
(67, 'sandigopalan@gmail.com', '10.10.10.107', '2019-12-21 11:54:20', 'Google Chrome', 'windows', '79.0.3945.88'),
(68, 'sandigopalan@gmail.com', '10.10.10.107', '2019-12-21 11:54:53', 'Google Chrome', 'windows', '79.0.3945.88'),
(69, 'santhiya@futurecalls.com', '10.10.10.107', '2019-12-21 11:57:58', 'Google Chrome', 'windows', '79.0.3945.88'),
(70, 'pradeep@futurecalls.com', '10.10.10.107', '2019-12-21 11:58:52', 'Google Chrome', 'windows', '79.0.3945.88'),
(71, 'venkatesan@futurecalls.com', '10.10.10.107', '2019-12-21 12:05:32', 'Google Chrome', 'windows', '79.0.3945.88'),
(72, 'venkatesan@futurecalls.com', '10.10.10.107', '2019-12-21 12:59:41', 'Google Chrome', 'windows', '79.0.3945.88'),
(73, 'santhiya@futurecalls.com', '10.10.10.107', '2019-12-21 13:10:22', 'Google Chrome', 'windows', '79.0.3945.88'),
(74, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2019-12-21 13:11:52', 'Google Chrome', 'windows', '79.0.3945.88'),
(75, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2019-12-21 13:12:13', 'Google Chrome', 'windows', '79.0.3945.88'),
(76, 'santhiya@futurecalls.com', '10.10.10.107', '2019-12-21 13:49:44', 'Google Chrome', 'windows', '79.0.3945.88'),
(77, 'ragu@futurecalls.com', '10.10.10.107', '2019-12-21 13:51:06', 'Google Chrome', 'windows', '79.0.3945.88'),
(78, 'ragu@futurecalls.com', '10.10.10.107', '2019-12-21 13:51:33', 'Google Chrome', 'windows', '79.0.3945.88'),
(79, 'ragu@futurecalls.com', '10.10.10.107', '2019-12-21 14:42:38', 'Google Chrome', 'windows', '79.0.3945.88'),
(80, 'ragu@futurecalls.com', '10.10.10.107', '2019-12-21 14:47:00', 'Google Chrome', 'windows', '79.0.3945.88'),
(81, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2019-12-21 14:47:27', 'Google Chrome', 'windows', '79.0.3945.88'),
(82, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2019-12-21 15:23:48', 'Google Chrome', 'windows', '79.0.3945.88'),
(83, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2019-12-21 15:47:10', 'Google Chrome', 'windows', '79.0.3945.88'),
(84, 'santhiya@futurecalls.com', '10.10.10.107', '2019-12-21 15:58:15', 'Google Chrome', 'windows', '79.0.3945.88'),
(85, 'saleshead@futurecalls.com', '10.10.10.107', '2019-12-21 16:01:44', 'Google Chrome', 'windows', '79.0.3945.88'),
(86, 'saleshead@futurecalls.com', '10.10.10.107', '2019-12-21 16:02:10', 'Google Chrome', 'windows', '79.0.3945.88'),
(87, 'ragu@futurecalls.com', '10.10.10.107', '2019-12-21 16:59:40', 'Google Chrome', 'windows', '79.0.3945.88'),
(88, 'santhiya@futurecalls.com', '10.10.10.107', '2019-12-21 19:17:46', 'Google Chrome', 'windows', '78.0.3904.108'),
(89, 'saleshead@futurecalls.com', '10.10.10.107', '2019-12-21 19:26:21', 'Google Chrome', 'windows', '78.0.3904.108'),
(90, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2019-12-21 19:41:55', 'Google Chrome', 'windows', '79.0.3945.88'),
(91, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2019-12-21 19:46:50', 'Google Chrome', 'windows', '78.0.3904.108'),
(92, 'ragu@futurecalls.com', '10.10.10.107', '2019-12-21 19:55:13', 'Google Chrome', 'windows', '78.0.3904.108'),
(93, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2019-12-21 20:37:44', 'Google Chrome', 'windows', '78.0.3904.108'),
(94, 'ragu@futurecalls.com', '10.10.10.107', '2019-12-21 20:39:53', 'Google Chrome', 'windows', '78.0.3904.108'),
(95, 'saleshead@futurecalls.com', '10.10.10.107', '2019-12-22 08:53:21', 'Google Chrome', 'windows', '79.0.3945.88'),
(96, 'saleshead@futurecalls.com', '10.10.10.107', '2019-12-22 08:54:52', 'Google Chrome', 'windows', '79.0.3945.88'),
(97, 'ragu@futurecalls.com', '10.10.10.107', '2019-12-22 08:55:03', 'Google Chrome', 'windows', '79.0.3945.88'),
(98, 'saleshead@futurecalls.com', '10.10.10.107', '2019-12-22 09:01:45', 'Google Chrome', 'windows', '79.0.3945.88'),
(99, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2019-12-22 09:04:33', 'Google Chrome', 'windows', '78.0.3904.108'),
(100, 'saleshead@futurecalls.com', '10.10.10.107', '2019-12-22 09:28:06', 'Google Chrome', 'windows', '79.0.3945.88'),
(101, 'ragu@futurecalls.com', '10.10.10.107', '2019-12-22 09:28:53', 'Google Chrome', 'windows', '79.0.3945.88'),
(102, 'ragu@futurecalls.com', '10.10.10.107', '2019-12-22 09:42:40', 'Google Chrome', 'windows', '79.0.3945.88'),
(103, 'saleshead@futurecalls.com', '10.10.10.107', '2019-12-22 09:56:35', 'Google Chrome', 'windows', '79.0.3945.88'),
(104, 'ragu@futurecalls.com', '10.10.10.107', '2019-12-22 10:30:08', 'Google Chrome', 'windows', '79.0.3945.88'),
(105, 'ragu@futurecalls.com', '10.10.10.107', '2019-12-22 10:35:29', 'Google Chrome', 'windows', '79.0.3945.88'),
(106, 'ragu@futurecalls.com', '10.10.10.107', '2019-12-23 09:44:34', 'Google Chrome', 'windows', '78.0.3904.108'),
(107, 'ragu@futurecalls.com', '10.10.10.107', '2019-12-23 14:49:22', 'Google Chrome', 'windows', '78.0.3904.108'),
(108, 'ragu@futurecalls.com', '10.10.10.107', '2019-12-24 10:02:51', 'Google Chrome', 'windows', '78.0.3904.108'),
(109, 'saleshead@futurecalls.com', '10.10.10.107', '2019-12-24 17:27:49', 'Google Chrome', 'windows', '78.0.3904.108'),
(110, 'saleshead@futurecalls.com', '10.10.10.107', '2019-12-24 21:28:30', 'Google Chrome', 'windows', '79.0.3945.88'),
(111, 'saleshead@futurecalls.com', '10.10.10.107', '2019-12-26 09:26:39', 'Google Chrome', 'windows', '78.0.3904.108'),
(112, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2019-12-26 11:07:39', 'Google Chrome', 'windows', '78.0.3904.108'),
(113, 'santhiya@futurecalls.com', '10.10.10.107', '2019-12-26 11:54:09', 'Google Chrome', 'windows', '78.0.3904.108'),
(114, 'salesadmin@futurecalls.com', '10.10.10.107', '2019-12-26 11:56:36', 'Google Chrome', 'windows', '78.0.3904.108'),
(115, 'salesadmin@futurecalls.com', '10.10.10.107', '2019-12-26 11:57:10', 'Google Chrome', 'windows', '78.0.3904.108'),
(116, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2019-12-26 12:00:20', 'Google Chrome', 'windows', '78.0.3904.108'),
(117, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2019-12-26 14:48:25', 'Google Chrome', 'windows', '79.0.3945.88'),
(118, 'salesadmin@futurecalls.com', '10.10.10.107', '2019-12-26 16:50:19', 'Google Chrome', 'windows', '78.0.3904.108'),
(119, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2019-12-26 16:50:48', 'Google Chrome', 'windows', '78.0.3904.108'),
(120, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2019-12-30 09:55:46', 'Google Chrome', 'windows', '78.0.3904.108'),
(121, 'pradeep@futurecalls.com', '10.10.10.107', '2019-12-30 12:04:37', 'Google Chrome', 'windows', '79.0.3945.88'),
(122, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2019-12-30 12:05:07', 'Google Chrome', 'windows', '79.0.3945.88'),
(123, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2019-12-30 13:07:19', 'Google Chrome', 'windows', '79.0.3945.88'),
(124, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2019-12-31 10:25:34', 'Google Chrome', 'windows', '79.0.3945.88'),
(125, 'ragu@futurecalls.com', '10.10.10.107', '2019-12-31 11:46:03', 'Google Chrome', 'windows', '79.0.3945.88'),
(126, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2019-12-31 12:12:38', 'Google Chrome', 'windows', '79.0.3945.88'),
(127, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2019-12-31 12:21:15', 'Google Chrome', 'windows', '79.0.3945.88'),
(128, 'saleshead@futurecalls.com', '10.10.10.107', '2019-12-31 17:05:23', 'Google Chrome', 'windows', '79.0.3945.88'),
(129, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-01-02 09:53:03', 'Google Chrome', 'windows', '79.0.3945.88'),
(130, 'ragu@futurecalls.com', '10.10.10.107', '2020-01-02 13:14:24', 'Google Chrome', 'windows', '79.0.3945.88'),
(131, 'ragu@futurecalls.com', '10.10.10.107', '2020-01-02 17:29:01', 'Google Chrome', 'windows', '79.0.3945.88'),
(132, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-01-03 10:20:34', 'Google Chrome', 'windows', '79.0.3945.88'),
(133, 'pradeep@futurecalls.com', '10.10.10.107', '2020-01-03 15:12:37', 'Google Chrome', 'windows', '79.0.3945.88'),
(134, 'pradeep@futurecalls.com', '10.10.10.107', '2020-01-03 15:13:12', 'Google Chrome', 'windows', '79.0.3945.88'),
(135, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-01-04 11:21:48', 'Google Chrome', 'windows', '79.0.3945.88'),
(136, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-01-04 12:01:52', 'Google Chrome', 'windows', '79.0.3945.88'),
(137, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-01-06 09:54:12', 'Google Chrome', 'windows', '79.0.3945.88'),
(138, 'salesadmin@futurecalls.com', '10.10.10.62', '2020-01-06 11:02:35', 'Google Chrome', 'windows', '79.0.3945.88'),
(139, 'salesadmin@futurecalls.com', '10.10.10.62', '2020-01-06 11:06:49', 'Google Chrome', 'windows', '79.0.3945.88'),
(140, 'saleshead@futurecalls.com', '10.10.10.62', '2020-01-06 11:08:48', 'Google Chrome', 'windows', '79.0.3945.88'),
(141, 'salesadmin@futurecalls.com', '10.10.10.62', '2020-01-08 15:24:03', 'Google Chrome', 'windows', '79.0.3945.88'),
(142, 'saleshead@futurecalls.com', '10.10.10.62', '2020-01-08 15:32:10', 'Google Chrome', 'windows', '79.0.3945.88'),
(143, 'saleshead@futurecalls.com', '10.10.10.62', '2020-01-09 10:04:14', 'Google Chrome', 'windows', '79.0.3945.88'),
(144, 'vijaybalaji@futurecalls.com', '10.10.10.62', '2020-01-09 11:08:15', 'Google Chrome', 'windows', '79.0.3945.88'),
(145, 'saleshead@futurecalls.com', '10.10.10.62', '2020-01-09 15:20:15', 'Google Chrome', 'windows', '79.0.3945.117'),
(146, 'vijaybalaji@futurecalls.com', '10.10.10.62', '2020-01-09 15:24:59', 'Google Chrome', 'windows', '79.0.3945.117'),
(147, 'vijaybalaji@futurecalls.com', '192.168.1.6', '2020-01-10 22:41:59', 'Google Chrome', 'windows', '79.0.3945.117'),
(148, 'vijaybalaji@futurecalls.com', '192.168.1.6', '2020-01-10 23:12:42', 'Google Chrome', 'windows', '79.0.3945.117'),
(149, 'vijaybalaji@futurecalls.com', '127.0.0.1', '2020-01-11 22:17:14', 'Google Chrome', 'windows', '79.0.3945.117'),
(150, 'vijaybalaji@futurecalls.com', '127.0.0.1', '2020-01-12 14:22:50', 'Google Chrome', 'windows', '79.0.3945.117'),
(151, 'vijaybalaji@futurecalls.com', '192.168.1.6', '2020-01-12 23:56:20', 'Google Chrome', 'windows', '79.0.3945.117'),
(152, 'vijaybalaji@futurecalls.com', '10.10.10.62', '2020-01-13 11:39:46', 'Google Chrome', 'windows', '79.0.3945.117'),
(153, 'vijaybalaji@futurecalls.com', '10.10.10.62', '2020-01-17 11:17:23', 'Google Chrome', 'windows', '79.0.3945.117'),
(154, 'saleshead@futurecalls.com', '10.10.10.62', '2020-01-17 14:58:05', 'Google Chrome', 'windows', '79.0.3945.117'),
(155, 'saleshead@futurecalls.com', '10.10.10.62', '2020-01-17 14:59:25', 'Google Chrome', 'windows', '79.0.3945.117'),
(156, 'saleshead@futurecalls.com', '10.10.10.62', '2020-01-17 15:08:39', 'Google Chrome', 'windows', '79.0.3945.117'),
(157, 'saleshead@futurecalls.com', '10.10.10.62', '2020-01-17 16:58:49', 'Google Chrome', 'windows', '79.0.3945.117'),
(158, 'vijaybalaji@futurecalls.com', '10.10.10.62', '2020-01-18 10:38:34', 'Google Chrome', 'windows', '79.0.3945.117'),
(159, 'salesadmin@futurecalls.com', '10.10.10.62', '2020-01-20 10:20:03', 'Google Chrome', 'windows', '79.0.3945.117'),
(160, 'vijaybalaji@futurecalls.com', '10.10.10.62', '2020-01-20 10:21:33', 'Google Chrome', 'windows', '79.0.3945.117'),
(161, 'salesadmin@futurecalls.com', '10.10.10.62', '2020-01-20 10:37:58', 'Google Chrome', 'windows', '79.0.3945.117'),
(162, 'ragu@futurecalls.com', '10.10.10.62', '2020-01-20 11:42:32', 'Google Chrome', 'windows', '79.0.3945.117'),
(163, 'saleshead@futurecalls.com', '10.10.10.62', '2020-01-20 12:59:36', 'Google Chrome', 'windows', '79.0.3945.117'),
(164, 'saleshead@futurecalls.com', '10.10.10.62', '2020-01-20 14:48:25', 'Google Chrome', 'windows', '79.0.3945.117'),
(165, 'ragu@futurecalls.com', '10.10.10.62', '2020-01-20 16:31:11', 'Google Chrome', 'windows', '79.0.3945.117'),
(166, 'saleshead@futurecalls.com', '10.10.10.62', '2020-01-20 16:42:27', 'Google Chrome', 'windows', '79.0.3945.117'),
(167, 'vijaybalaji@futurecalls.com', '10.10.10.62', '2020-01-20 17:07:01', 'Google Chrome', 'windows', '79.0.3945.117'),
(168, 'ragu@futurecalls.com', '10.10.10.62', '2020-01-20 17:13:16', 'Google Chrome', 'windows', '79.0.3945.117'),
(169, 'santhiya@futurecalls.com', '10.10.10.107', '2020-01-21 15:40:02', 'Google Chrome', 'windows', '79.0.3945.117'),
(170, 'pradeep@futurecalls.com', '10.10.10.107', '2020-01-21 15:40:55', 'Google Chrome', 'windows', '79.0.3945.117'),
(171, 'pradeep@futurecalls.com', '10.10.10.107', '2020-01-21 15:44:18', 'Google Chrome', 'windows', '79.0.3945.117'),
(172, 'dillibabu@futurecalls.com', '10.10.10.107', '2020-01-21 15:45:40', 'Google Chrome', 'windows', '79.0.3945.117'),
(173, 'saleshead@futurecalls.com', '10.10.10.107', '2020-01-21 15:46:47', 'Google Chrome', 'windows', '79.0.3945.117'),
(174, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-01-21 15:47:47', 'Google Chrome', 'windows', '79.0.3945.117'),
(175, 'ragu@futurecalls.com', '10.10.10.107', '2020-01-21 15:48:24', 'Google Chrome', 'windows', '79.0.3945.117'),
(176, 'salesadmin@futurecalls.com', '10.10.10.107', '2020-01-21 15:50:37', 'Google Chrome', 'windows', '79.0.3945.117'),
(177, 'venkatesan@futurecalls.com', '10.10.10.107', '2020-01-21 16:01:36', 'Google Chrome', 'windows', '79.0.3945.117'),
(178, 'venkatesan@futurecalls.com', '10.10.10.107', '2020-01-21 16:02:00', 'Google Chrome', 'windows', '79.0.3945.117'),
(179, 'saleshead@futurecalls.com', '10.10.10.107', '2020-01-22 11:16:50', 'Google Chrome', 'windows', '79.0.3945.117'),
(180, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-01-22 11:17:24', 'Google Chrome', 'windows', '79.0.3945.117'),
(181, 'santhiya@futurecalls.com', '10.10.10.107', '2020-01-22 11:24:08', 'Google Chrome', 'windows', '79.0.3945.117'),
(182, 'santhiya@futurecalls.com', '10.10.10.107', '2020-01-22 12:00:41', 'Google Chrome', 'windows', '79.0.3945.130'),
(183, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-01-22 12:01:15', 'Google Chrome', 'windows', '79.0.3945.130'),
(184, 'santhiya@futurecalls.com', '10.10.10.107', '2020-01-22 12:04:54', 'Google Chrome', 'windows', '79.0.3945.130'),
(185, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-01-22 12:06:14', 'Google Chrome', 'windows', '79.0.3945.117'),
(186, 'saleshead@futurecalls.com', '10.10.10.107', '2020-01-22 12:14:02', 'Google Chrome', 'windows', '79.0.3945.117'),
(187, 'salesadmin@futurecalls.com', '10.10.10.107', '2020-01-22 12:17:30', 'Google Chrome', 'windows', '79.0.3945.117'),
(188, 'saleshead@futurecalls.com', '10.10.10.107', '2020-01-22 12:20:28', 'Google Chrome', 'windows', '79.0.3945.117'),
(189, 'ragu@futurecalls.com', '10.10.10.107', '2020-01-22 12:22:38', 'Google Chrome', 'windows', '79.0.3945.117'),
(190, 'santhiya@futurecalls.com', '10.10.10.107', '2020-01-22 12:25:17', 'Google Chrome', 'windows', '79.0.3945.117'),
(191, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-01-22 15:43:49', 'Google Chrome', 'windows', '79.0.3945.117'),
(192, 'saleshead@futurecalls.com', '10.10.10.107', '2020-01-22 15:49:41', 'Google Chrome', 'windows', '79.0.3945.117'),
(193, 'saleshead@futurecalls.com', '10.10.10.107', '2020-01-23 11:03:00', 'Google Chrome', 'windows', '79.0.3945.130'),
(194, 'santhiya@futurecalls.com', '10.10.10.107', '2020-01-23 12:11:20', 'Google Chrome', 'windows', '79.0.3945.130'),
(195, 'santhiya@futurecalls.com', '10.10.10.107', '2020-01-23 12:11:58', 'Google Chrome', 'windows', '79.0.3945.130'),
(196, 'pradeep@futurecalls.com', '10.10.10.107', '2020-01-23 12:29:53', 'Google Chrome', 'windows', '79.0.3945.130'),
(197, 'pradeep@futurecalls.com', '10.10.10.107', '2020-01-23 12:30:31', 'Google Chrome', 'windows', '79.0.3945.130'),
(198, 'admin@futurecalls.com', '10.10.10.107', '2020-01-23 12:52:24', 'Google Chrome', 'windows', '79.0.3945.130'),
(199, 'pradeep@futurecalls.com', '10.10.10.107', '2020-01-23 12:53:13', 'Google Chrome', 'windows', '79.0.3945.130'),
(200, 'admin@futurecalls.com', '10.10.10.107', '2020-01-23 12:53:56', 'Google Chrome', 'windows', '79.0.3945.130'),
(201, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-01-23 13:10:21', 'Google Chrome', 'windows', '79.0.3945.130'),
(202, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-01-23 13:12:31', 'Google Chrome', 'windows', '79.0.3945.130'),
(203, 'guruprasath@futurecalls.com', '10.10.10.107', '2020-01-23 13:15:33', 'Google Chrome', 'windows', '79.0.3945.130'),
(204, 'guruprasath@futurecalls.com', '10.10.10.107', '2020-01-23 13:16:20', 'Google Chrome', 'windows', '79.0.3945.130'),
(205, 'santhiya@futurecalls.com', '10.10.10.107', '2020-01-23 13:20:17', 'Google Chrome', 'windows', '79.0.3945.130'),
(206, 'santhiya@futurecalls.com', '10.10.10.107', '2020-01-23 13:25:42', 'Google Chrome', 'windows', '79.0.3945.130'),
(207, 'santhiya@futurecalls.com', '10.10.10.107', '2020-01-23 13:30:02', 'Google Chrome', 'windows', '79.0.3945.130'),
(208, 'pradeep@futurecalls.com', '10.10.10.107', '2020-01-23 14:50:09', 'Google Chrome', 'windows', '79.0.3945.130'),
(209, 'devakumar@futurecalls.com', '10.10.10.107', '2020-01-23 14:54:46', 'Google Chrome', 'windows', '79.0.3945.130'),
(210, 'devakumar@futurecalls.com', '10.10.10.107', '2020-01-23 14:55:21', 'Google Chrome', 'windows', '79.0.3945.130'),
(211, 'admin@futurecalls.com', '10.10.10.107', '2020-01-23 15:09:32', 'Google Chrome', 'windows', '79.0.3945.130'),
(212, 'santhiya@futurecalls.com', '10.10.10.107', '2020-01-23 15:19:40', 'Google Chrome', 'windows', '79.0.3945.130'),
(213, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-01-23 15:53:10', 'Google Chrome', 'windows', '79.0.3945.130'),
(214, 'admin@futurecalls.com', '10.10.10.107', '2020-01-23 15:58:10', 'Google Chrome', 'windows', '79.0.3945.130'),
(215, 'pradeep@futurecalls.com', '10.10.10.107', '2020-01-24 10:12:21', 'Google Chrome', 'windows', '79.0.3945.130'),
(216, 'santhiya@futurecalls.com', '10.10.10.107', '2020-01-24 10:15:33', 'Google Chrome', 'windows', '79.0.3945.130'),
(217, 'salesadmin@futurecalls.com', '10.10.10.107', '2020-01-24 10:17:13', 'Google Chrome', 'windows', '79.0.3945.130'),
(218, 'salesadmin@futurecalls.com', '10.10.10.107', '2020-01-24 10:17:52', 'Google Chrome', 'windows', '79.0.3945.130'),
(219, 'pradeep@futurecalls.com', '10.10.10.107', '2020-01-24 10:18:38', 'Google Chrome', 'windows', '79.0.3945.130'),
(220, 'pradeep@futurecalls.com', '10.10.10.107', '2020-01-24 10:19:27', 'Google Chrome', 'windows', '79.0.3945.130'),
(221, 'salesadmin@futurecalls.com', '10.10.10.107', '2020-01-24 10:24:37', 'Google Chrome', 'windows', '79.0.3945.130'),
(222, 'pradeep@futurecalls.com', '10.10.10.107', '2020-01-24 10:25:22', 'Google Chrome', 'windows', '79.0.3945.130'),
(223, 'pradeep@futurecalls.com', '10.10.10.107', '2020-01-24 10:38:07', 'Google Chrome', 'windows', '79.0.3945.130'),
(224, 'salesadmin@futurecalls.com', '10.10.10.107', '2020-01-24 11:13:38', 'Google Chrome', 'windows', '79.0.3945.130'),
(225, 'aruljothi@futurecalls.com', '10.10.10.107', '2020-01-24 11:15:57', 'Google Chrome', 'windows', '79.0.3945.130'),
(226, 'pradeep@futurecalls.com', '10.10.10.107', '2020-01-24 11:21:53', 'Google Chrome', 'windows', '79.0.3945.130'),
(227, 'pradeep@futurecalls.com', '10.10.10.107', '2020-01-24 12:00:29', 'Google Chrome', 'windows', '79.0.3945.130'),
(228, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-01-24 13:49:41', 'Google Chrome', 'windows', '79.0.3945.130'),
(229, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-01-24 14:35:54', 'Google Chrome', 'windows', '79.0.3945.130'),
(230, 'pradeep@futurecalls.com', '10.10.10.107', '2020-01-24 15:34:35', 'Google Chrome', 'windows', '79.0.3945.130'),
(231, 'admin@futurecalls.com', '10.10.10.107', '2020-01-25 19:14:45', 'Google Chrome', 'linux', '79.0.3945.136'),
(232, 'admin@futurecalls.com', '10.10.10.107', '2020-01-25 19:15:27', 'Google Chrome', 'linux', '79.0.3945.136'),
(233, 'admin@futurecalls.com', '10.10.10.107', '2020-01-25 19:16:32', 'Google Chrome', 'linux', '79.0.3945.136'),
(234, 'admin@futurecalls.com', '10.10.10.107', '2020-01-25 19:17:29', 'Google Chrome', 'linux', '79.0.3945.136'),
(235, 'santhiya@futurecalls.com', '10.10.10.107', '2020-01-25 21:34:35', 'Google Chrome', 'windows', '79.0.3945.130'),
(236, 'tjaganathan@futurecalls.com', '10.10.10.107', '2020-01-25 21:35:08', 'Google Chrome', 'windows', '79.0.3945.130'),
(237, 'tjaganathan@futurecalls.com', '10.10.10.107', '2020-01-25 21:42:55', 'Google Chrome', 'windows', '79.0.3945.130'),
(238, 'tjaganathan@futurecalls.com', '10.10.10.107', '2020-01-25 21:45:09', 'Google Chrome', 'windows', '79.0.3945.130'),
(239, 'tjaganathan@futurecalls.com', '10.10.10.107', '2020-01-25 21:49:13', 'Google Chrome', 'linux', '79.0.3945.136'),
(240, 'tjaganathan@futurecalls.com', '10.10.10.107', '2020-01-25 22:34:56', 'Google Chrome', 'windows', '79.0.3945.130'),
(241, 'suresh.j@futurecalls.com', '10.10.10.107', '2020-01-27 12:10:05', 'Google Chrome', 'windows', '79.0.3945.130'),
(242, 'suresh.j@futurecalls.com', '10.10.10.107', '2020-01-28 09:53:48', 'Google Chrome', 'windows', '79.0.3945.130'),
(243, 'pradeep@futurecalls.com', '10.10.10.107', '2020-01-28 10:00:56', 'Google Chrome', 'windows', '79.0.3945.130'),
(244, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-01-28 10:01:29', 'Google Chrome', 'windows', '79.0.3945.130'),
(245, 'guruprasath@futurecalls.com', '10.10.10.107', '2020-01-28 10:06:27', 'Google Chrome', 'windows', '79.0.3945.130'),
(246, 'venkatesan@futurecalls.com', '10.10.10.107', '2020-01-28 10:08:37', 'Google Chrome', 'windows', '79.0.3945.130'),
(247, 'venkatesan@futurecalls.com', '10.10.10.107', '2020-01-28 10:16:43', 'Google Chrome', 'windows', '79.0.3945.130'),
(248, 'shahinsha@futurecalls.com', '10.10.10.107', '2020-01-28 10:19:13', 'Google Chrome', 'windows', '79.0.3945.130'),
(249, 'shahinsha@futurecalls.com', '10.10.10.107', '2020-01-28 10:19:54', 'Google Chrome', 'windows', '79.0.3945.130'),
(250, 'shahinsha@futurecalls.com', '10.10.10.107', '2020-01-28 10:20:55', 'Google Chrome', 'windows', '79.0.3945.130'),
(251, 'admin@futurecalls.com', '10.10.10.107', '2020-01-28 10:24:00', 'Google Chrome', 'linux', '79.0.3945.136'),
(252, 'admin@futurecalls.com', '10.10.10.107', '2020-01-28 10:24:24', 'Google Chrome', 'linux', '79.0.3945.136'),
(253, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-01-28 10:24:54', 'Google Chrome', 'windows', '79.0.3945.130'),
(254, 'admin@futurecalls.com', '10.10.10.107', '2020-01-28 10:29:53', 'Google Chrome', 'windows', '79.0.3945.130'),
(255, 'admin@futurecalls.com', '10.10.10.107', '2020-01-28 10:37:03', 'Mozilla Firefox', 'windows', '72.0'),
(256, 'tjaganathan@futurecalls.com', '10.10.10.107', '2020-01-28 11:12:40', 'Google Chrome', 'windows', '79.0.3945.130'),
(257, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-01-28 11:18:13', 'Google Chrome', 'windows', '79.0.3945.130'),
(258, 'mazhar@futurecalls.com', '10.10.10.107', '2020-01-28 13:34:36', 'Google Chrome', 'windows', '79.0.3945.130'),
(259, 'mazhar@futurecalls.com', '10.10.10.107', '2020-01-28 13:36:55', 'Google Chrome', 'windows', '79.0.3945.130'),
(260, 'mazhar@futurecalls.com', '10.10.10.107', '2020-01-28 13:39:02', 'Google Chrome', 'windows', '79.0.3945.130'),
(261, 'subhashv@futurecalls.com', '10.10.10.107', '2020-01-28 22:56:00', 'Google Chrome', 'windows', '79.0.3945.130'),
(262, 'subhashv@futurecalls.com', '10.10.10.107', '2020-01-28 23:04:47', 'Google Chrome', 'windows', '79.0.3945.130'),
(263, 'subhashv@futurecalls.com', '10.10.10.107', '2020-01-29 08:38:05', 'Google Chrome', 'windows', '42.0.2311.135'),
(264, 'admin@futurecalls.com', '10.10.10.107', '2020-01-29 10:38:35', 'Google Chrome', 'windows', '79.0.3945.130'),
(265, 'admin@futurecalls.com', '10.10.10.107', '2020-01-29 10:43:13', 'Google Chrome', 'windows', '79.0.3945.130'),
(266, 'admin@futurecalls.com', '10.10.10.107', '2020-01-29 11:04:29', 'Google Chrome', 'windows', '79.0.3945.130'),
(267, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-01-29 11:18:47', 'Google Chrome', 'windows', '79.0.3945.130'),
(268, 'admin@futurecalls.com', '10.10.10.107', '2020-01-29 11:33:47', 'Google Chrome', 'windows', '79.0.3945.130'),
(269, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-01-29 11:34:21', 'Google Chrome', 'windows', '79.0.3945.130'),
(270, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-01-29 11:38:08', 'Google Chrome', 'windows', '79.0.3945.130'),
(271, 'suresh.j@futurecalls.com', '10.10.10.107', '2020-01-29 11:53:32', 'Google Chrome', 'windows', '79.0.3945.130'),
(272, 'admin@futurecalls.com', '10.10.10.107', '2020-01-29 11:53:45', 'Google Chrome', 'windows', '79.0.3945.130'),
(273, 'aruljothi@futurecalls.com', '10.10.10.107', '2020-01-29 14:56:00', 'Google Chrome', 'windows', '79.0.3945.130'),
(274, 'aruljothi@futurecalls.com', '10.10.10.107', '2020-01-29 15:02:22', 'Google Chrome', 'windows', '79.0.3945.130'),
(275, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-01-29 15:11:46', 'Google Chrome', 'windows', '79.0.3945.130'),
(276, 'admin@futurecalls.com', '10.10.10.107', '2020-01-29 15:21:16', 'Google Chrome', 'windows', '79.0.3945.130'),
(277, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-01-29 15:22:25', 'Google Chrome', 'windows', '79.0.3945.130'),
(278, 'admin@futurecalls.com', '10.10.10.107', '2020-01-29 15:52:53', 'Google Chrome', 'windows', '79.0.3945.130'),
(279, 'admin@futurecalls.com', '10.10.10.107', '2020-01-29 15:56:22', 'Google Chrome', 'linux', '79.0.3945.136'),
(280, 'admin@futurecalls.com', '10.10.10.107', '2020-01-29 22:23:43', 'Google Chrome', 'linux', '79.0.3945.136'),
(281, 'santhiya@futurecalls.com', '10.10.10.107', '2020-01-30 09:35:39', 'Google Chrome', 'windows', '79.0.3945.130'),
(282, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-01-30 09:35:58', 'Google Chrome', 'windows', '79.0.3945.130'),
(283, 'suresh.j@futurecalls.com', '10.10.10.107', '2020-01-30 10:17:58', 'Google Chrome', 'windows', '79.0.3945.130'),
(284, 'pradeep@futurecalls.com', '10.10.10.107', '2020-01-30 11:35:20', 'Google Chrome', 'windows', '79.0.3945.130'),
(285, 'tjaganathan@futurecalls.com', '10.10.10.107', '2020-01-30 16:10:29', 'Google Chrome', 'windows', '79.0.3945.130'),
(286, 'admin@futurecalls.com', '10.10.10.107', '2020-01-30 16:49:28', 'Google Chrome', 'linux', '79.0.3945.136'),
(287, 'mazhar@futurecalls.com', '10.10.10.107', '2020-01-30 16:57:59', 'Google Chrome', 'windows', '79.0.3945.130'),
(288, 'mazhar@futurecalls.com', '10.10.10.107', '2020-01-30 17:00:11', 'Google Chrome', 'windows', '79.0.3945.130'),
(289, 'Mazhar@futurecalls.com', '10.10.10.107', '2020-01-30 17:02:35', 'Google Chrome', 'windows', '70.0.3538.102'),
(290, 'subhashv@futurecalls.com', '10.10.10.107', '2020-01-30 23:12:05', 'Google Chrome', 'windows', '63.0.3239.132'),
(291, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-01-31 09:30:47', 'Google Chrome', 'windows', '79.0.3945.130'),
(292, 'pradeep@futurecalls.com', '10.10.10.107', '2020-01-31 09:44:48', 'Google Chrome', 'windows', '79.0.3945.130'),
(293, 'pradeep@futurecalls.com', '10.10.10.107', '2020-01-31 09:45:19', 'Google Chrome', 'windows', '79.0.3945.130'),
(294, 'pradeep@futurecalls.com', '10.10.10.107', '2020-01-31 09:56:20', 'Google Chrome', 'windows', '79.0.3945.130'),
(295, 'admin@futurecalls.com', '10.10.10.107', '2020-01-31 10:12:08', 'Google Chrome', 'windows', '79.0.3945.130'),
(296, 'tjaganathan@futurecalls.com', '10.10.10.107', '2020-01-31 10:13:37', 'Google Chrome', 'windows', '79.0.3945.130'),
(297, 'tjaganathan@futurecalls.com', '10.10.10.107', '2020-01-31 10:25:05', 'Google Chrome', 'windows', '79.0.3945.130'),
(298, 'admin@futurecalls.com', '10.10.10.107', '2020-01-31 10:30:42', 'Google Chrome', 'windows', '79.0.3945.130'),
(299, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-01-31 10:31:06', 'Google Chrome', 'windows', '79.0.3945.130'),
(300, 'tjaganathan@futurecalls.com', '10.10.10.107', '2020-01-31 10:51:41', 'Google Chrome', 'windows', '79.0.3945.130'),
(301, 'tjaganathan@futurecalls.com', '10.10.10.107', '2020-01-31 10:59:34', 'Google Chrome', 'windows', '79.0.3945.130'),
(302, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-01-31 11:06:25', 'Google Chrome', 'windows', '79.0.3945.130'),
(303, 'tjaganathan@futurecalls.com', '10.10.10.107', '2020-01-31 11:07:43', 'Google Chrome', 'windows', '79.0.3945.130'),
(304, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-01-31 11:15:41', 'Google Chrome', 'windows', '79.0.3945.130'),
(305, 'aruljothi@futurecalls.com', '10.10.10.107', '2020-01-31 12:03:14', 'Google Chrome', 'windows', '79.0.3945.130'),
(306, 'tjaganathan@futurecalls.com', '10.10.10.107', '2020-01-31 13:50:14', 'Google Chrome', 'windows', '79.0.3945.130'),
(307, 'tjaganathan@futurecalls.com', '10.10.10.107', '2020-01-31 13:53:54', 'Google Chrome', 'windows', '79.0.3945.130'),
(308, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-01-31 13:54:43', 'Google Chrome', 'windows', '79.0.3945.130'),
(309, 'mazhar@futurecalls.com', '10.10.10.107', '2020-01-31 16:07:59', 'Google Chrome', 'windows', '79.0.3945.130'),
(310, 'subhashv@futurecalls.com', '10.10.10.107', '2020-01-31 16:12:16', 'Google Chrome', 'windows', '63.0.3239.132'),
(311, 'mazhar@futurecalls.com', '10.10.10.107', '2020-01-31 16:12:17', 'Google Chrome', 'windows', '70.0.3538.102'),
(312, 'admin@futurecalls.com', '10.10.10.107', '2020-01-31 17:57:58', 'Google Chrome', 'windows', '79.0.3945.130'),
(313, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-01 11:08:30', 'Google Chrome', 'windows', '79.0.3945.130'),
(314, 'aruljothi@futurecalls.com', '10.10.10.107', '2020-02-01 11:09:43', 'Google Chrome', 'windows', '79.0.3945.130'),
(315, 'admin@futurecalls.com', '10.10.10.107', '2020-02-01 11:50:06', 'Google Chrome', 'windows', '79.0.3945.130'),
(316, 'santhiya@futurecalls.com', '10.10.10.107', '2020-02-01 12:01:35', 'Google Chrome', 'windows', '79.0.3945.130'),
(317, 'pradeep@futurecalls.com', '10.10.10.107', '2020-02-01 12:22:01', 'Google Chrome', 'windows', '79.0.3945.130'),
(318, 'subhashv@futurecalls.com', '10.10.10.107', '2020-02-01 12:47:48', 'Google Chrome', 'windows', '79.0.3945.130'),
(319, 'admin@futurecalls.com', '10.10.10.107', '2020-02-02 09:29:27', 'Google Chrome', 'windows', '79.0.3945.130'),
(320, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-02 09:37:33', 'Google Chrome', 'windows', '79.0.3945.130'),
(321, 'tamilarasan@futurecalls.com', '10.10.10.107', '2020-02-02 20:23:38', 'Google Chrome', 'windows', '70.0.3538.102'),
(322, 'tamilarasan@futurecalls.com', '10.10.10.107', '2020-02-02 22:29:11', 'Google Chrome', 'windows', '79.0.3945.130'),
(323, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-02 22:52:35', 'Google Chrome', 'windows', '79.0.3945.130'),
(324, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-03 08:11:11', 'Google Chrome', 'windows', '79.0.3945.130'),
(325, 'pradeep@futurecalls.com', '10.10.10.107', '2020-02-03 09:43:29', 'Google Chrome', 'windows', '79.0.3945.130'),
(326, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-03 09:55:35', 'Unknown', 'windows', '?'),
(327, 'admin@futurecalls.com', '10.10.10.107', '2020-02-03 10:36:20', 'Google Chrome', 'windows', '79.0.3945.130'),
(328, 'guruprasath@futurecalls.com', '10.10.10.107', '2020-02-03 10:37:12', 'Google Chrome', 'windows', '79.0.3945.130'),
(329, 'shahinsha@futurecalls.com', '10.10.10.107', '2020-02-03 10:55:46', 'Google Chrome', 'windows', '79.0.3945.130'),
(330, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-03 11:18:12', 'Google Chrome', 'windows', '79.0.3945.130'),
(331, 'santhiya@futurecalls.com', '10.10.10.107', '2020-02-03 14:35:17', 'Google Chrome', 'windows', '79.0.3945.130'),
(332, 'santhiya@futurecalls.com', '10.10.10.107', '2020-02-03 15:26:46', 'Google Chrome', 'windows', '79.0.3945.130'),
(333, 'santhiya@futurecalls.com', '10.10.10.107', '2020-02-03 15:36:50', 'Google Chrome', 'windows', '79.0.3945.130'),
(334, 'pradeep@futurecalls.com', '10.10.10.107', '2020-02-03 15:46:20', 'Google Chrome', 'windows', '79.0.3945.130'),
(335, 'santhiya@futurecalls.com', '10.10.10.107', '2020-02-03 16:04:09', 'Google Chrome', 'windows', '79.0.3945.130'),
(336, 'pradeep@futurecalls.com', '10.10.10.107', '2020-02-03 16:41:40', 'Google Chrome', 'windows', '79.0.3945.130'),
(337, 'Mazhar@futurecalls.com', '10.10.10.107', '2020-02-03 16:49:10', 'Google Chrome', 'windows', '70.0.3538.102'),
(338, 'santhiya@futurecalls.com', '10.10.10.107', '2020-02-03 16:52:34', 'Google Chrome', 'windows', '79.0.3945.130'),
(339, 'tamilarasan@futurecalls.com', '10.10.10.107', '2020-02-04 07:53:59', 'Google Chrome', 'windows', '79.0.3945.130'),
(340, 'admin@futurecalls.com', '10.10.10.107', '2020-02-04 10:37:47', 'Google Chrome', 'windows', '79.0.3945.130'),
(341, 'Admin@futurecalls.com', '10.10.10.107', '2020-02-04 10:38:16', 'Google Chrome', 'windows', '79.0.3945.130'),
(342, 'santhiya@futurecalls.com', '10.10.10.107', '2020-02-04 10:40:53', 'Google Chrome', 'windows', '79.0.3945.130'),
(343, 'santhiya@futurecalls.com', '10.10.10.107', '2020-02-04 11:05:35', 'Google Chrome', 'windows', '79.0.3945.130'),
(344, 'yuvasriravi1997@gmail.com', '10.10.10.107', '2020-02-04 11:08:37', 'Google Chrome', 'windows', '79.0.3945.130'),
(345, 'yuvasriravi1997@gmail.com', '10.10.10.107', '2020-02-04 11:09:18', 'Google Chrome', 'windows', '79.0.3945.130'),
(346, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-04 11:10:10', 'Google Chrome', 'windows', '79.0.3945.130'),
(347, 'yuvasriravi1997@gmail.com', '10.10.10.107', '2020-02-04 11:12:15', 'Google Chrome', 'windows', '79.0.3945.130'),
(348, 'admin@futurecalls.com', '10.10.10.107', '2020-02-04 11:24:36', 'Google Chrome', 'windows', '79.0.3945.130'),
(349, 'pradeep@futurecalls.com', '10.10.10.107', '2020-02-04 11:57:01', 'Google Chrome', 'windows', '79.0.3945.130'),
(350, 'dillibabu@futurecalls.com', '10.10.10.107', '2020-02-04 13:21:08', 'Google Chrome', 'windows', '79.0.3945.130'),
(351, 'dillibabu@futurecalls.com', '10.10.10.107', '2020-02-04 13:22:04', 'Google Chrome', 'windows', '79.0.3945.130'),
(352, 'pradeep@futurecalls.com', '10.10.10.107', '2020-02-04 13:35:44', 'Google Chrome', 'windows', '79.0.3945.130'),
(353, 'admin@futurecalls.com', '10.10.10.107', '2020-02-04 16:21:04', 'Google Chrome', 'windows', '79.0.3945.130'),
(354, 'admin@futurecalls.com', '10.10.10.107', '2020-02-04 17:03:58', 'Google Chrome', 'linux', '4.0'),
(355, 'admin@futurecalls.com', '10.10.10.107', '2020-02-04 17:05:19', 'Google Chrome', 'linux', '4.0'),
(356, 'santhiya@futurecalls.com', '10.10.10.107', '2020-02-04 17:06:38', 'Google Chrome', 'linux', '4.0'),
(357, 'tamilarasan@futurecalls.com', '10.10.10.107', '2020-02-04 17:21:06', 'Google Chrome', 'windows', '79.0.3945.130'),
(358, 'subhashv@futurecalls.com', '10.10.10.107', '2020-02-04 19:46:48', 'Google Chrome', 'windows', '79.0.3945.130'),
(359, 'admin@futurecalls.com', '10.10.10.107', '2020-02-05 09:29:16', 'Google Chrome', 'linux', '4.0'),
(360, 'tjaganathan@futurecalls.com', '10.10.10.107', '2020-02-05 10:32:37', 'Google Chrome', 'windows', '79.0.3945.130'),
(361, 'ramya@futurecalls.com', '10.10.10.107', '2020-02-05 10:38:26', 'Google Chrome', 'windows', '79.0.3945.130'),
(362, 'ramya@futurecalls.com', '10.10.10.107', '2020-02-05 10:39:12', 'Google Chrome', 'windows', '79.0.3945.130'),
(363, 'pradeep@futurecalls.com', '10.10.10.107', '2020-02-05 10:39:56', 'Google Chrome', 'windows', '79.0.3945.130'),
(364, 'ramya@futurecalls.com', '10.10.10.107', '2020-02-05 10:41:58', 'Google Chrome', 'windows', '79.0.3945.130'),
(365, 'santhiya@futurecalls.com', '10.10.10.107', '2020-02-05 10:45:26', 'Google Chrome', 'windows', '79.0.3945.130'),
(366, 'ramya11@futurecalls.com', '10.10.10.107', '2020-02-05 10:47:52', 'Google Chrome', 'windows', '79.0.3945.130'),
(367, 'ramya11@futurecalls.com', '10.10.10.107', '2020-02-05 10:48:26', 'Google Chrome', 'windows', '79.0.3945.130'),
(368, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-05 11:44:05', 'Google Chrome', 'windows', '79.0.3945.130'),
(369, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-05 12:25:56', 'Google Chrome', 'windows', '79.0.3945.130'),
(370, 'admin@futurecalls.com', '10.10.10.107', '2020-02-05 12:29:47', 'Google Chrome', 'windows', '79.0.3945.130'),
(371, 'tamilarasan@futurecalls.com', '10.10.10.107', '2020-02-05 13:23:45', 'Google Chrome', 'windows', '79.0.3945.130'),
(372, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-05 14:54:36', 'Google Chrome', 'windows', '79.0.3945.130'),
(373, 'tamilarasan@futurecalls.com', '10.10.10.107', '2020-02-05 15:35:11', 'Google Chrome', 'windows', '79.0.3945.130'),
(374, 'pradeep@futurecalls.com', '10.10.10.107', '2020-02-05 15:53:41', 'Google Chrome', 'windows', '79.0.3945.130'),
(375, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-05 16:47:48', 'Google Chrome', 'windows', '79.0.3945.130'),
(376, 'admin@futurecalls.com', '10.10.10.107', '2020-02-06 10:00:45', 'Google Chrome', 'windows', '79.0.3945.130'),
(377, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-06 10:16:01', 'Google Chrome', 'windows', '80.0.3987.87'),
(378, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-06 10:25:07', 'Google Chrome', 'windows', '80.0.3987.87'),
(379, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-06 11:39:11', 'Google Chrome', 'windows', '79.0.3945.130'),
(380, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-06 11:46:26', 'Google Chrome', 'windows', '79.0.3945.130'),
(381, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-06 12:27:37', 'Google Chrome', 'windows', '80.0.3987.87'),
(382, 'admin@futurecalls.com', '10.10.10.107', '2020-02-06 14:51:09', 'Google Chrome', 'windows', '79.0.3945.130'),
(383, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-06 15:38:13', 'Google Chrome', 'windows', '79.0.3945.130'),
(384, 'admin@futurecalls.com', '10.10.10.107', '2020-02-06 15:48:56', 'Google Chrome', 'windows', '79.0.3945.130'),
(385, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-06 15:59:34', 'Google Chrome', 'windows', '79.0.3945.130'),
(386, 'admin@futurecalls.com', '10.10.10.107', '2020-02-06 16:11:46', 'Google Chrome', 'windows', '79.0.3945.130'),
(387, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-06 17:12:51', 'Google Chrome', 'windows', '80.0.3987.87'),
(388, 'mazhar@futurecalls.com', '10.10.10.107', '2020-02-06 17:52:13', 'Google Chrome', 'windows', '79.0.3945.130'),
(389, 'admin@futurecalls.com', '10.10.10.107', '2020-02-07 09:30:38', 'Google Chrome', 'windows', '79.0.3945.130'),
(390, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-07 09:33:53', 'Google Chrome', 'windows', '79.0.3945.130'),
(391, 'santhiya@futurecalls.com', '10.10.10.107', '2020-02-07 09:34:53', 'Google Chrome', 'windows', '79.0.3945.130'),
(392, 'pradeep@futurecalls.com', '10.10.10.107', '2020-02-07 09:36:46', 'Google Chrome', 'windows', '79.0.3945.130'),
(393, 'admin@futurecalls.com', '10.10.10.107', '2020-02-07 11:00:53', 'Google Chrome', 'windows', '79.0.3945.130'),
(394, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-07 12:24:59', 'Google Chrome', 'windows', '79.0.3945.130'),
(395, 'santhiya@futurecalls.com', '10.10.10.107', '2020-02-07 12:49:48', 'Google Chrome', 'windows', '79.0.3945.130'),
(396, 'pradeep@futurecalls.com', '10.10.10.107', '2020-02-07 12:50:06', 'Google Chrome', 'windows', '79.0.3945.130'),
(397, 'pradeep@futurecalls.com', '10.10.10.107', '2020-02-07 12:50:06', 'Google Chrome', 'windows', '79.0.3945.130'),
(398, 'santhiya@futurecalls.com', '10.10.10.107', '2020-02-07 12:52:40', 'Google Chrome', 'windows', '79.0.3945.130'),
(399, 'admin@futurecalls.com', '10.10.10.107', '2020-02-07 12:53:31', 'Google Chrome', 'windows', '79.0.3945.130'),
(400, 'suresh.j@futurecalls.com', '10.10.10.107', '2020-02-07 12:54:40', 'Google Chrome', 'windows', '79.0.3945.130'),
(401, 'tamilarasan@futurecalls.com', '10.10.10.107', '2020-02-07 13:10:08', 'Google Chrome', 'windows', '79.0.3945.130'),
(402, 'pradeep@futurecalls.com', '10.10.10.107', '2020-02-07 13:10:30', 'Google Chrome', 'windows', '79.0.3945.130'),
(403, 'pradeep@futurecalls.com', '10.10.10.107', '2020-02-07 13:10:30', 'Google Chrome', 'windows', '79.0.3945.130'),
(404, 'guruprasath@futurecalls.com', '10.10.10.107', '2020-02-07 14:16:08', 'Google Chrome', 'windows', '79.0.3945.130'),
(405, 'admin@futurecalls.com', '10.10.10.107', '2020-02-07 14:41:50', 'Google Chrome', 'linux', '4.0'),
(406, 'admin@futurecalls.com', '10.10.10.107', '2020-02-07 15:37:11', 'Google Chrome', 'windows', '79.0.3945.130'),
(407, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-07 15:38:20', 'Google Chrome', 'windows', '79.0.3945.130'),
(408, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-07 16:13:34', 'Google Chrome', 'windows', '79.0.3945.130'),
(409, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-07 16:34:12', 'Google Chrome', 'windows', '80.0.3987.87'),
(410, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-07 16:51:10', 'Google Chrome', 'windows', '79.0.3945.130'),
(411, 'admin@futurecalls.com', '10.10.10.107', '2020-02-07 17:59:27', 'Google Chrome', 'windows', '79.0.3945.130'),
(412, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-07 21:54:31', 'Google Chrome', 'windows', '80.0.3987.87'),
(413, 'suresh.j@futurecalls.com', '10.10.10.107', '2020-02-08 18:23:01', 'Google Chrome', 'windows', '79.0.3945.130'),
(414, 'aruljothi@futurecalls.com', '10.10.10.107', '2020-02-08 18:31:47', 'Google Chrome', 'windows', '79.0.3945.130'),
(415, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-10 07:30:27', 'Google Chrome', 'windows', '80.0.3987.87'),
(416, 'admin@futurecalls.com', '10.10.10.107', '2020-02-10 09:49:30', 'Google Chrome', 'windows', '80.0.3987.87'),
(417, 'admin@futurecalls.com', '10.10.10.107', '2020-02-10 09:50:12', 'Google Chrome', 'windows', '80.0.3987.87'),
(418, 'pradeep@futurecalls.com', '10.10.10.107', '2020-02-10 09:50:17', 'Google Chrome', 'windows', '79.0.3945.130'),
(419, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-10 09:50:21', 'Google Chrome', 'windows', '80.0.3987.87'),
(420, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-10 09:50:29', 'Google Chrome', 'windows', '80.0.3987.87'),
(421, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-10 09:50:40', 'Google Chrome', 'windows', '80.0.3987.87'),
(422, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-10 09:50:54', 'Google Chrome', 'windows', '80.0.3987.87'),
(423, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-10 09:51:10', 'Google Chrome', 'windows', '80.0.3987.87'),
(424, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-10 09:51:34', 'Google Chrome', 'windows', '80.0.3987.87'),
(425, 'pradeep@futurecalls.com', '10.10.10.107', '2020-02-10 09:51:40', 'Google Chrome', 'windows', '79.0.3945.130'),
(426, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-10 09:59:14', 'Google Chrome', 'windows', '80.0.3987.87'),
(427, 'suresh.j@futurecalls.com', '10.10.10.107', '2020-02-10 10:03:23', 'Google Chrome', 'windows', '79.0.3945.130'),
(428, 'admin@futurecalls.com', '10.10.10.107', '2020-02-10 10:13:54', 'Google Chrome', 'windows', '79.0.3945.130');
INSERT INTO `loginhistory` (`id`, `username`, `ipaddress`, `Last_login`, `browser`, `platform`, `version`) VALUES
(429, 'admin@futurecalls.com', '10.10.10.107', '2020-02-10 10:15:32', 'Google Chrome', 'windows', '80.0.3987.87'),
(430, 'pradeep@futurecalls.com', '10.10.10.107', '2020-02-10 10:15:54', 'Google Chrome', 'windows', '79.0.3945.130'),
(431, 'guruprasath@futurecalls.com', '10.10.10.107', '2020-02-10 10:17:45', 'Google Chrome', 'windows', '80.0.3987.87'),
(432, 'pradeep@futurecalls.com', '10.10.10.107', '2020-02-10 10:17:57', 'Google Chrome', 'windows', '79.0.3945.130'),
(433, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-10 10:18:00', 'Google Chrome', 'windows', '79.0.3945.130'),
(434, 'shahinsha@futurecalls.com', '10.10.10.107', '2020-02-10 10:23:46', 'Google Chrome', 'windows', '79.0.3945.130'),
(435, 'admin@futurecalls.com', '10.10.10.107', '2020-02-10 10:37:21', 'Google Chrome', 'windows', '80.0.3987.87'),
(436, 'guruprasath@futurecalls.com', '10.10.10.107', '2020-02-10 10:40:36', 'Google Chrome', 'windows', '80.0.3987.87'),
(437, 'admin@futurecalls.com', '10.10.10.107', '2020-02-10 10:49:39', 'Google Chrome', 'windows', '80.0.3987.87'),
(438, 'shahinsha@futurecalls.com', '10.10.10.107', '2020-02-10 10:50:41', 'Google Chrome', 'windows', '79.0.3945.130'),
(439, 'tamilarasan@futurecalls.com', '10.10.10.107', '2020-02-10 10:52:00', 'Google Chrome', 'windows', '79.0.3945.130'),
(440, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-10 10:53:00', 'Google Chrome', 'windows', '80.0.3987.87'),
(441, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-10 10:53:29', 'Google Chrome', 'windows', '79.0.3945.130'),
(442, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-10 10:54:04', 'Google Chrome', 'windows', '80.0.3987.87'),
(443, 'suresh.j@futurecalls.com', '10.10.10.107', '2020-02-10 11:11:49', 'Google Chrome', 'windows', '79.0.3945.130'),
(444, 'admin@futurecalls.com', '10.10.10.107', '2020-02-10 11:22:56', 'Google Chrome', 'windows', '80.0.3987.87'),
(445, 'subhashv@futurecalls.com', '10.10.10.107', '2020-02-10 11:25:09', 'Google Chrome', 'windows', '80.0.3987.87'),
(446, 'admin@futurecalls.com', '10.10.10.107', '2020-02-10 11:45:55', 'Google Chrome', 'windows', '80.0.3987.87'),
(447, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-10 12:01:12', 'Google Chrome', 'windows', '80.0.3987.87'),
(448, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-10 12:08:30', 'Google Chrome', 'windows', '80.0.3987.87'),
(449, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-10 12:10:58', 'Google Chrome', 'windows', '80.0.3987.87'),
(450, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-10 12:18:29', 'Google Chrome', 'windows', '79.0.3945.130'),
(451, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-10 12:18:46', 'Google Chrome', 'windows', '79.0.3945.130'),
(452, 'pradeep@futurecalls.com', '10.10.10.107', '2020-02-10 12:22:37', 'Google Chrome', 'windows', '79.0.3945.130'),
(453, 'vijaybalaji@futurecalls.com', '10.10.10.107', '2020-02-10 12:29:40', 'Google Chrome', 'windows', '79.0.3945.130'),
(454, 'santhiya@futurecalls.com', '10.10.10.107', '2020-02-10 12:39:31', 'Google Chrome', 'windows', '80.0.3987.87'),
(455, 'guruprasath@futurecalls.com', '10.10.10.107', '2020-02-10 12:42:14', 'Google Chrome', 'windows', '80.0.3987.87');

-- --------------------------------------------------------

--
-- Table structure for table `lost_lead`
--

CREATE TABLE `lost_lead` (
  `id` int(11) NOT NULL,
  `lead_id` varchar(255) NOT NULL,
  `customername` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `ordervalue` varchar(255) NOT NULL,
  `assignee` varchar(250) DEFAULT NULL,
  `lostreason` varchar(255) NOT NULL,
  `losttowhom` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `lost_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `management_info`
--

CREATE TABLE `management_info` (
  `id` int(10) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meetinginfo`
--

CREATE TABLE `meetinginfo` (
  `id` int(11) NOT NULL,
  `lead_id` varchar(255) NOT NULL,
  `from_name` varchar(255) NOT NULL,
  `from_address` varchar(500) NOT NULL,
  `to_name` varchar(255) NOT NULL,
  `to_address` varchar(500) NOT NULL,
  `startTime` varchar(255) NOT NULL,
  `endTime` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `location` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meetinginfo`
--

INSERT INTO `meetinginfo` (`id`, `lead_id`, `from_name`, `from_address`, `to_name`, `to_address`, `startTime`, `endTime`, `subject`, `description`, `location`, `created_at`) VALUES
(1, 'kan080555', 'vijaybalaji', 'vijaybalaji@futurecalls.com', 'mani', 'manikandan@futurecalls.com', '2019/10/29 18:00', '2019/10/29 19:00', 'first meeting', 'hi sir please be free on that time for our meeting', 'chennai', '2019-10-29 11:09:31'),
(2, 'kan080555', 'vijaybalaji', 'vijaybalaji@futurecalls.com', 'mani', 'manikandan@futurecalls.com', '2019/10/29 19:00', '2019/10/29 20:00', 'second meeting', 'dear sir', 'chennai', '2019-10-29 12:01:55'),
(3, 'kan080555', 'vijaybalaji', 'vijaybalaji@futurecalls.com', 'mani', 'veera@futurecalls.com', '2019/10/29 20:00', '2019/10/29 21:00', 'meeting', 'meeting', 'chennai', '2019-10-29 12:03:02'),
(4, 'kan080555', 'vijaybalaji', 'vijaybalaji@futurecalls.com', 'mani', 'vijaybalaji@futurecalls.com', '2019/11/19 17:00', '2019/11/19 17:00', 'testing', 'testing', 'chennai', '2019-11-19 10:46:49'),
(5, 'kan080555', 'vijaybalaji', 'vijaybalaji@futurecalls.com', 'mani', 'veera@futurecalls.com', '2019/11/19 17:00', '2019/11/19 18:00', 'testing', 'testing', 'chennai', '2019-11-19 10:48:45'),
(6, '281024', 'vijaybalaji', 'vijaybalaji@futurecalls.com', 'john', 'veera@futurecalls.com', '2019/11/20 12:00', '2019/11/20 12:00', 'first meeting', 'requirement gathering', 'chennai', '2019-11-20 05:53:32'),
(7, '281024', 'vijaybalaji', 'vijaybalaji@futurecalls.com', 'john', 'veera@futurecalls.com', '2019/11/20 12:00', '2019/11/20 13:00', 'second meeting', 'testing', 'chennai', '2019-11-20 05:55:45'),
(8, '281024', 'vijaybalaji', 'vijaybalaji@futurecalls.com', 'john', 'veera@futurecalls.com', '2019/11/20 13:00', '2019/11/20 13:00', 'meeting', 'meeting', 'chennai', '2019-11-20 06:07:34'),
(9, '431127', 'SalesExecutive', 'accountmanager@leotechnosoft.net', 'Customer', 'santhiya@futurecalls.com', '2019/11/26 13:00', '2019/11/26 14:00', 'CRM Demo', 'Test Invite', 'Chennai', '2019-11-26 06:22:04'),
(10, '130304', 'vijaybalaji', 'vijaybalaji@futurecalls.com', 'manikandan', 'manikandan@futurecalls.com', '2019/12/21 16:00', '2019/12/21 16:00', 'fadfas', 'sdfasdf', 'casdffasdf', '2019-12-21 09:48:18'),
(11, '130304', 'vijaybalaji', 'vijaybalaji@futurecalls.com', 'manikandan', 'manikandan@futurecalls.com,veera@futurecalls.com', '2019/12/30 19:00', '2019/12/30 20:00', 'test', 'test', 'chennai', '2019-12-30 12:26:49'),
(12, '130304', 'vijaybalaji', 'vijaybalaji@futurecalls.com', 'manikandan', 'manikandan@futurecalls.com,veera@futurecalls.com', '2019/12/30 19:00', '2019/12/30 20:00', 'test', 'tesssss', 'chennai', '2019-12-30 12:30:05'),
(13, '130304', 'vijaybalaji', 'vijaybalaji@futurecalls.com', 'manikandan', 'manikandan@futurecalls.com', '2019/12/30 19:00', '2019/12/30 20:00', 'test', 'tesssss', 'chennai', '2019-12-30 12:33:36'),
(14, '130304', 'vijaybalaji', 'vijaybalaji@futurecalls.com', 'manikandan', 'manikandan@futurecalls.com', '2019/12/30 19:00', '2019/12/30 20:00', 'test', 'tesssss', 'chennai', '2019-12-30 12:34:37'),
(15, '130304', 'vijaybalaji', 'vijaybalaji@futurecalls.com', 'manikandan', 'manikandan@futurecalls.com,veera@futurecalls.com', '2019/12/30 19:00', '2019/12/30 20:00', 'test', 'tesssss', 'chennai', '2019-12-30 12:34:44'),
(16, '130304', 'vijaybalaji', 'vijaybalaji@futurecalls.com', 'manikandan', 'manikandan@futurecalls.com,veera@futurecalls.com', '2019/12/30 19:00', '2019/12/30 20:00', 'test', 'tesssss', 'chennai', '2019-12-30 12:35:06'),
(17, '130304', 'vijaybalaji', 'vijaybalaji@futurecalls.com', 'manikandan', 'manikandan@futurecalls.com,veera@futurecalls.com', '2019/12/30 19:00', '2019/12/30 20:00', 'test', 'tesssss', 'chennai', '2019-12-30 12:35:39'),
(18, '130304', 'vijaybalaji', 'vijaybalaji@futurecalls.com', 'manikandan', 'manikandan@futurecalls.com,veera@futurecalls.com', '2019/12/31 20:00', '2019/12/31 12:00', 'test', 'tests', 'chennai', '2019-12-31 05:10:09'),
(19, '400135', 'vijaybalaji@futurecalls.com', 'vijaybalaji@futurecalls.com', 'testing', 'manikandan@futurecalls.com', '2020/01/14 11:00', '2020/01/14 12:00', 'Solution Proposal Meeting', 'Meeting invite test', 'Chennai', '2020-01-13 09:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `mom_master`
--

CREATE TABLE `mom_master` (
  `id` int(11) NOT NULL,
  `lead_id` varchar(255) NOT NULL,
  `customername` varchar(255) NOT NULL,
  `meetingname` varchar(255) NOT NULL,
  `momupload` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mom_master`
--

INSERT INTO `mom_master` (`id`, `lead_id`, `customername`, `meetingname`, `momupload`, `description`, `created_at`) VALUES
(1, 'kan080555', 'mani', 'first meeting', 'mani kra.xlsx', 'dfasdf', '2019-10-31 06:56:01'),
(2, '431127', 'Customer', 'CRM Demo', '', 'Dear Customer,\r\n\r\n as per our discussion  sharing demo link', '2019-11-26 06:23:45'),
(3, '431127', 'Customer', 'CRM Demo', 'download.jpg', 'sdfadsf', '2019-11-26 07:00:14'),
(4, '130304', 'manikandan', 'fadfas', 'leads.csv', 'test', '2019-12-21 09:52:38'),
(5, '130304', 'manikandan', 'fadfas', 'leads.csv', 'test', '2019-12-21 09:53:33'),
(6, '400135', 'testing', 'Solution Proposal Meeting', 'EMAIL-SMS Format.docx', 'MOM update test', '2020-01-13 11:08:12');

-- --------------------------------------------------------

--
-- Table structure for table `notification_master`
--

CREATE TABLE `notification_master` (
  `id` int(10) NOT NULL,
  `activity` varchar(250) DEFAULT NULL,
  `helpdesk_notification` varchar(250) DEFAULT NULL,
  `customer_notification` varchar(250) DEFAULT NULL,
  `email_message` text DEFAULT NULL,
  `sms_message` text DEFAULT NULL,
  `email_message1` text NOT NULL,
  `sms_message1` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_master`
--

INSERT INTO `notification_master` (`id`, `activity`, `helpdesk_notification`, `customer_notification`, `email_message`, `sms_message`, `email_message1`, `sms_message1`, `created_at`) VALUES
(1, 'Create', 'email', 'email', 'Dear Customer, your ticket has been created successfully. Our support executive will contact you soon', 'Dear Customer,  your request has been received. Your Ticket Number is', 'Dear Team, New Ticket raised  from', 'New ticket raised from', '2018-12-28 19:48:52'),
(2, 'Update', 'email', 'email', 'Your Ticket status Updated', 'Dear customer,  Your Ticket status updated please verify.   Ticket  Number', 'Ticket has been updated. ', 'Ticket has been updated. ', '2018-12-30 22:35:35'),
(3, 'Close', 'email', 'email', 'Thanks for using our portal. Your issue has been resolve', 'Your issue has been resolved Ticket Id:', 'Ticket  has been Closed Ticket Id: ', 'Dear Team,  this ticket has been closed. Ticket Id: ', '2018-12-30 22:55:37'),
(4, 'Re-Assign', 'email', 'email', 'Your Ticket will be assigned to', 'Dear Customer,  Your Ticket Will be  assigned', 'Dear Team, New Ticket assigned from', 'Deat Team, New ticket Assigned to you', '2018-12-30 23:00:16'),
(5, 'SLA Violations', 'email', 'email', 'Dear Customer, Please allow us some time shall soon update you on this.', 'Dear Customer, This ticket has been crossed.  ', 'Dear Team, This ticket will be due on today. Because the SLA limit crossed ', 'Dear Team, This ticket will be due on today. Because the SLA limit crossed. ', '2018-12-30 23:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `oem_master`
--

CREATE TABLE `oem_master` (
  `id` int(11) NOT NULL,
  `oemname` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `oem_master`
--

INSERT INTO `oem_master` (`id`, `oemname`, `created_at`) VALUES
(1, 'AVAYA', '2020-01-20 05:24:58'),
(2, 'Altitude', '2020-01-20 05:24:58'),
(3, 'Contaque', '2020-01-20 05:24:58'),
(4, 'Matrix', '2020-01-20 05:24:58'),
(5, 'Cisco', '2020-01-20 05:24:58'),
(6, 'Juniper', '2020-01-20 05:24:58'),
(7, 'Dlink', '2020-01-20 05:24:58'),
(8, 'Extreme', '2020-01-20 05:24:58'),
(9, 'HP', '2020-01-20 05:24:58'),
(10, 'Netgear', '2020-01-20 05:24:58'),
(11, 'Infotrend', '2020-01-20 05:24:58'),
(12, 'NVT', '2020-01-20 05:24:58'),
(13, 'Hik Vision', '2020-01-20 05:24:58'),
(14, 'CP Plus', '2020-01-20 05:24:58'),
(15, 'Panasonic', '2020-01-20 05:24:58'),
(16, 'Aruba', '2020-01-20 05:24:58'),
(17, 'Unibox', '2020-01-20 05:24:58'),
(18, 'infosec Assessment tools', '2020-01-20 05:24:58'),
(19, 'Firewalls', '2020-01-20 05:24:58'),
(20, 'Antivirus', '2020-01-20 05:25:29'),
(21, 'Others', '2020-01-20 05:31:40'),
(22, 'Futurecalls', '2020-01-24 04:48:14');

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
  `log` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `outbound_lead`
--

CREATE TABLE `outbound_lead` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `assignee` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outbound_lead`
--

INSERT INTO `outbound_lead` (`id`, `name`, `mobile`, `email`, `assignee`, `created_at`) VALUES
(1, 'john', '9878787878', 'john@gmail.com', 'rejina', '2019-11-21 05:35:46'),
(2, 'ferros', '9878787879', 'ferros@gmail.com', 'ragu', '2019-11-21 05:35:46'),
(3, 'cristan', '9878787880', 'cristan@gmail.com', 'Ramya', '2019-11-21 05:35:46'),
(4, 'mark', '9878787881', 'mark@gmail.com', 'Not Assign', '2019-11-21 05:35:46'),
(5, 'luther', '9878787882', 'luther@gmail.com', 'Not Assign', '2019-11-21 05:35:46'),
(6, 'sumith', '9878787883', 'sumith@gmail.com', 'Not Assign', '2019-11-21 05:35:46'),
(7, 'sugan', '9878787884', 'sugan@gmail.com', 'Not Assign', '2019-11-21 05:35:46'),
(8, 'ram', '9878787885', 'ram@gmail.com', 'Not Assign', '2019-11-21 05:35:46'),
(9, 'rajesh', '9878787886', 'rajesh@gmail.com', 'Not Assign', '2019-11-21 05:35:46'),
(10, 'vimal', '9878787887', 'vimal@gmail.com', 'Not Assign', '2019-11-21 05:35:46'),
(11, 'sravan', '9878787888', 'sravan@gmail.com', 'Not Assign', '2019-11-21 05:35:46'),
(12, 'yuvarani', '9878787889', 'yuvarani@gmail.com', 'Not Assign', '2019-11-21 05:35:46'),
(13, 'jospeh', '9878787890', 'jospeh@gmail.com', 'Not Assign', '2019-11-21 05:35:46');

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
(3, 'manikandan@futurecalls.com', '768e78024aa8fdb9b8fe87be86f647452699aeaa2a', '2019-07-17 12:01:31'),
(7, 'shahinsha@futurecalls.com', '768e78024aa8fdb9b8fe87be86f647450bc17adcc2', '2020-01-29 10:18:32');

-- --------------------------------------------------------

--
-- Table structure for table `postponed_lead`
--

CREATE TABLE `postponed_lead` (
  `id` int(11) NOT NULL,
  `lead_id` varchar(255) NOT NULL,
  `customername` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `ordervalue` varchar(255) NOT NULL,
  `assignee` varchar(250) NOT NULL,
  `postponeddate` varchar(255) NOT NULL,
  `postponedreason` varchar(500) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postponed_lead`
--

INSERT INTO `postponed_lead` (`id`, `lead_id`, `customername`, `company`, `product`, `ordervalue`, `assignee`, `postponeddate`, `postponedreason`, `status`, `created_at`) VALUES
(1, 'Gan411058', 'Ganges', 'Ganges', 'MPLS', '17000', 'guruprasath@futurecalls.com', '2020-02-07', 'Customer not interested', 'Postponed', '2020-01-28 04:52:15'),
(2, 'SKY591011', 'SKYRAMS Outdoor Advertisings India Pvt Ltd', 'SKYRAMS Outdoor Advertisings India Pvt Ltd', 'Matrix', '1', 'guruprasath@futurecalls.com', '2020-02-24', 'customer not needed now', 'Postponed', '2020-01-28 04:57:08'),
(3, 'SAV281022', 'SAVVYAN', 'SAVVYAN', 'TATA', '300000', 'guruprasath@futurecalls.com', '2020-02-24', 'customer not needed now', 'Postponed', '2020-01-28 04:58:47'),
(4, 'Le 310920', 'Le  Meridan', 'Le  Meridan', 'Ruckus', '25594', 'guruprasath@futurecalls.com', '2020-02-28', 'customer not need now', 'Postponed', '2020-01-28 05:14:36'),
(5, 'Pre430419', 'Precot Meridian', 'Precot Meridian', 'VC', '84960', 'guruprasath@futurecalls.com', '2020-01-30', 'customer not need now', 'Postponed', '2020-01-28 05:15:04'),
(6, 'Shi011027', 'Shipnet', 'Shipnet', 'EPABX  AMC', '80000', 'guruprasath@futurecalls.com', '2020-02-28', 'customer not need now', 'Postponed', '2020-01-28 05:15:47'),
(7, 'Sun001239', 'Sun data tech', 'Sun data tech', 'sophos', '100000', 'guruprasath@futurecalls.com', '2020-02-28', 'customer not need now', 'Postponed', '2020-01-28 05:16:11'),
(8, 'SAV281022', 'SAVVYAN', 'SAVVYAN', 'TATA', '300000', 'guruprasath@futurecalls.com', '2020-02-28', 'customer not need now', 'Postponed', '2020-01-28 05:17:03'),
(9, 'Pro021235', 'ProConnect', 'ProConnect', 'Networking at Warehouse', '100000', 'guruprasath@futurecalls.com', '2020-02-29', 'customer not need now', 'Postponed', '2020-01-28 05:17:24'),
(10, 'BFG191031', 'BFG INDIA', 'BFG INDIA', 'Antivirus', '30500', 'guruprasath@futurecalls.com', '2020-03-15', 'customer not need now', 'Postponed', '2020-01-28 05:17:58'),
(11, 'AGS201051', 'AGS Health', 'AGS Health', 'F-Secure- RDR', '400000', 'shahinsha@futurecalls.com', '2020-02-28', '', 'Postponed', '2020-01-28 05:18:05'),
(12, 'BFG191031', 'BFG INDIA', 'BFG INDIA', 'Antivirus', '30500', 'guruprasath@futurecalls.com', '2020-02-24', 'customer not need now', 'Postponed', '2020-01-28 05:21:13'),
(13, 'BFG191031', 'BFG INDIA', 'BFG INDIA', 'Antivirus', '30500', 'guruprasath@futurecalls.com', '2020-02-25', 'customer not need now', 'Postponed', '2020-01-28 05:21:30'),
(14, 'Le 310920', 'Le  Meridan', 'Le  Meridan', 'Ruckus', '25594', 'guruprasath@futurecalls.com', '2020-01-29', 'customer not need now', 'Postponed', '2020-01-28 05:21:53'),
(15, 'Le 310920', 'Le  Meridan', 'Le  Meridan', 'Ruckus', '25594', 'guruprasath@futurecalls.com', '2020-03-24', 'customer not need now', 'Postponed', '2020-01-28 05:22:12'),
(16, 'Le 310920', 'Le  Meridan', 'Le  Meridan', 'Ruckus', '25594', 'guruprasath@futurecalls.com', '2020-02-24', '', 'Postponed', '2020-01-28 05:22:35'),
(17, 'Le 310920', 'Le  Meridan', 'Le  Meridan', 'Ruckus', '25594', 'guruprasath@futurecalls.com', '2020-02-25', 'customer not need now', 'Postponed', '2020-01-28 05:22:53'),
(18, 'Med251004', 'Medraperit pep LLp', 'Medraperit pep LLp', 'Smartoffice', '0', 'guruprasath@futurecalls.com', '2020-02-26', 'customer not need now', 'Postponed', '2020-01-28 05:23:14'),
(19, 'BFG191031', 'BFG INDIA', 'BFG INDIA', 'Antivirus', '30500', 'guruprasath@futurecalls.com', '2020-02-25', 'customer not need now', 'Postponed', '2020-01-28 05:24:59'),
(20, 'SPI481101', 'SPIC', 'SPIC', 'AWS', '10000', 'shahinsha@futurecalls.com', '2020-01-28', 'discussion', 'Postponed', '2020-01-28 05:29:18'),
(21, 'pro530945', 'proconnect', 'proconnect', 'ISPARK', '200000', 'pradeep@futurecalls.com', '2020-02-15', 'demo completed back office work not yet completed', 'Postponed', '2020-01-31 04:17:54'),
(22, 'pro530945', 'proconnect', 'proconnect', 'ISPARK', '200000', 'pradeep@futurecalls.com', '2020-02-15', 'demo completed back office work not yet completed', 'Postponed', '2020-01-31 04:17:54'),
(23, 'pro530945', 'proconnect', 'proconnect', 'ISPARK', '200000', 'pradeep@futurecalls.com', '2020-02-29', 'back office work not completed', 'Postponed', '2020-01-31 04:19:04'),
(24, 'pro530945', 'proconnect', 'proconnect', 'ISPARK', '200000', 'pradeep@futurecalls.com', '2020-02-29', 'back office work not yet completed', 'Postponed', '2020-01-31 04:19:42'),
(25, 'Esq510949', 'Esquire express india pvt ltd', 'Esquire express india pvt ltd', 'ISPARK', '100000', 'pradeep@futurecalls.com', '2020-02-29', 'post pond next month', 'Postponed', '2020-01-31 04:20:24'),
(26, 'Esq510949', 'Esquire express india pvt ltd', 'Esquire express india pvt ltd', 'ISPARK', '100000', 'pradeep@futurecalls.com', '2020-02-29', 'next month', 'Postponed', '2020-01-31 04:22:54'),
(27, 'Ast541034', 'Astro software Technology', 'Astro software Technology', 'AWS storage', '250000', 'guruprasath@futurecalls.com', '2020-02-28', 'He need more time', 'Postponed', '2020-02-10 05:36:02');

-- --------------------------------------------------------

--
-- Table structure for table `product_master`
--

CREATE TABLE `product_master` (
  `id` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_master`
--

INSERT INTO `product_master` (`id`, `productname`, `created_at`) VALUES
(2, 'sdfsdf', '2019-11-25 12:41:56'),
(3, 'sdfasdf', '2019-11-25 12:42:22'),
(5, 'dsfasdf', '2019-11-25 12:50:46'),
(6, 'switches', '2019-11-25 12:50:58'),
(7, 'others', '2020-01-20 05:37:29'),
(8, 'ispark', '2020-01-20 05:38:01');

-- --------------------------------------------------------

--
-- Table structure for table `quatation_master`
--

CREATE TABLE `quatation_master` (
  `id` int(11) NOT NULL,
  `lead_id` varchar(255) NOT NULL,
  `customername` varchar(255) NOT NULL,
  `quatationupload` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quatation_master`
--

INSERT INTO `quatation_master` (`id`, `lead_id`, `customername`, `quatationupload`, `description`, `created_at`) VALUES
(1, '431127', 'Customer', 'IRCS - Wireframe- Discussion.pdf', 'PFA', '2019-11-26 06:26:21'),
(2, '431127', 'Customer', 'Bharat Bill Payment System_Version_1.4.pdf', 'test', '2019-11-26 06:35:36'),
(3, '431127', 'Customer', 'Bharat Bill Payment System_Version_1.4.pdf', 'test', '2019-11-26 06:59:31'),
(4, '431127', 'Customer', 'Agilisys.doc', 'tewt', '2019-11-29 11:01:31'),
(5, '130304', 'manikandan', 'receiver.php', 'dsfasdf', '2019-12-21 09:54:05'),
(6, '400135', 'testing', 'Payslip-Oct.pdf', 'Quotation update test', '2020-01-13 11:17:07');

-- --------------------------------------------------------

--
-- Table structure for table `rolebased_user`
--

CREATE TABLE `rolebased_user` (
  `id` int(10) NOT NULL,
  `client_name` varchar(250) DEFAULT NULL,
  `role` varchar(250) DEFAULT NULL,
  `total_user` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
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
  `created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_master`
--

INSERT INTO `role_master` (`id`, `role`, `created`) VALUES
(1, 'Administrator', '2019-05-16 12:49:54'),
(3, 'Account Manager', '2019-05-16 12:50:59'),
(4, 'Service Head', '2019-05-16 12:51:08'),
(6, 'Team leader', '2019-05-16 12:55:17'),
(7, 'L1 support', '2019-05-16 12:55:51'),
(8, 'L2 support', '2019-05-16 12:56:02'),
(9, 'L3 support', '2019-05-16 12:56:13'),
(10, 'Specialist', '2019-05-16 12:56:25'),
(12, 'Customer', '2019-05-16 12:56:51'),
(15, 'Super Admin', '2019-06-11 16:32:45'),
(16, 'Telecaller', '2019-12-21 13:50:03'),
(17, 'Sales Head', '2019-12-21 16:00:34'),
(18, 'Sales Admin', '2019-12-26 11:54:31');

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
(8, 'FMS support', 'Onsite support', '0000-00-00 00:00:00'),
(9, 'Telecom Support', 'tata ILL support', '0000-00-00 00:00:00'),
(10, 'others', 'Email process', '0000-00-00 00:00:00'),
(11, 'Internal support', 'sms support', '0000-00-00 00:00:00'),
(12, 'sms', 'sms tickets support', '0000-00-00 00:00:00');

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
  `created_at` datetime DEFAULT current_timestamp()
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
(93, 'ABA1503', '1', 'P1', '12', '8', '8', '9', '2019-07-23 00:44:01'),
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
(148, 'SUN1903', '3', 'P4', '8', '8', '8', '8', '2019-07-23 00:52:35'),
(149, 'TVS4711', '5', 'P1', '8', '8', '8', '8', '2019-07-23 23:22:32'),
(150, 'TVS4711', '5', 'P2', '8', '8', '8', '8', '2019-07-23 23:22:32'),
(151, 'TVS4711', '5', 'P3', '8', '8', '8', '8', '2019-07-23 23:22:32'),
(152, 'TVS4711', '5', 'P4', '8', '8', '8', '8', '2019-07-23 23:22:32'),
(153, 'Hex0901', '2', 'P1', '8', '8', '8', '8', '2019-07-24 00:41:40'),
(154, 'Hex0901', '2', 'P2', '8', '8', '8', '8', '2019-07-24 00:41:40'),
(155, 'Hex0901', '2', 'P3', '8', '8', '8', '8', '2019-07-24 00:41:40'),
(156, 'Hex0901', '2', 'P4', '8', '8', '8', '8', '2019-07-24 00:41:40'),
(157, 'CAS1201', '2', 'P1', '8', '8', '8', '8', '2019-07-24 00:46:36'),
(158, 'CAS1201', '2', 'P2', '8', '8', '8', '8', '2019-07-24 00:46:36'),
(159, 'CAS1201', '2', 'P3', '8', '8', '8', '8', '2019-07-24 00:46:36'),
(160, 'CAS1201', '2', 'P4', '8', '8', '8', '8', '2019-07-24 00:46:36'),
(161, 'GRT1503', '5', 'P1', '8', '8', '8', '8', '2019-07-24 22:15:55'),
(162, 'GRT1503', '5', 'P2', '8', '8', '8', '8', '2019-07-24 22:15:55'),
(163, 'GRT1503', '5', 'P3', '8', '8', '8', '8', '2019-07-24 22:15:55'),
(164, 'GRT1503', '5', 'P4', '8', '8', '8', '8', '2019-07-24 22:15:55'),
(165, 'Spa1801', '5', 'P1', '12', '12', '12', '12', '2019-07-26 00:52:57'),
(166, 'Spa1801', '5', 'P2', '12', '12', '12', '12', '2019-07-26 00:52:57'),
(167, 'Spa1801', '5', 'P3', '12', '12', '12', '12', '2019-07-26 00:52:57'),
(168, 'Spa1801', '5', 'P4', '12', '12', '12', '12', '2019-07-26 00:52:57'),
(169, 'Shr0604', '5', 'P1', '8', '8', '8', '8', '2019-07-30 02:33:58'),
(170, 'Shr0604', '5', 'P2', '8', '8', '8', '8', '2019-07-30 02:33:58'),
(171, 'Shr0604', '5', 'P3', '8', '8', '8', '8', '2019-07-30 02:33:58'),
(172, 'Shr0604', '5', 'P4', '8', '8', '8', '8', '2019-07-30 02:33:58'),
(173, 'viv0011', '1', 'P1', '12', '12', '12', '12', '2019-07-30 22:34:06'),
(174, 'viv0011', '1', 'P2', '12', '12', '12', '12', '2019-07-30 22:34:06'),
(175, 'viv0011', '1', 'P3', '12', '12', '11', '12', '2019-07-30 22:34:07'),
(176, 'viv0011', '1', 'P4', '12', '12', '12', '12', '2019-07-30 22:34:07'),
(177, 'Fut5012', '6', 'P1', '8', '8', '8', '8', '2019-08-01 01:50:26'),
(178, 'Fut5012', '6', 'P2', '8', '8', '8', '8', '2019-08-01 01:50:26'),
(179, 'Fut5012', '6', 'P3', '8', '8', '8', '8', '2019-08-01 01:50:26'),
(180, 'Fut5012', '6', 'P4', '8', '8', '8', '8', '2019-08-01 01:50:26'),
(181, 'Fut5012', '11', 'P1', '8', '8', '8', '8', '2019-08-01 02:21:53'),
(182, 'Fut5012', '11', 'P2', '8', '8', '8', '8', '2019-08-01 02:21:53'),
(183, 'Fut5012', '11', 'P3', '8', '8', '8', '8', '2019-08-01 02:21:53'),
(184, 'Fut5012', '11', 'P4', '8', '8', '8', '8', '2019-08-01 02:21:53');

-- --------------------------------------------------------

--
-- Table structure for table `sla_master`
--

CREATE TABLE `sla_master` (
  `id` int(10) NOT NULL,
  `severity` varchar(250) DEFAULT NULL,
  `severity_name` varchar(250) NOT NULL,
  `duration` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
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
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `id` int(10) NOT NULL,
  `client_name` varchar(250) DEFAULT NULL,
  `total_users` varchar(250) DEFAULT NULL,
  `concurrent_users` varchar(250) DEFAULT NULL,
  `inbound` varchar(250) NOT NULL,
  `outbound` varchar(250) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
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
-- Table structure for table `tempsms`
--

CREATE TABLE `tempsms` (
  `id` int(11) NOT NULL,
  `number` varchar(255) NOT NULL,
  `message` varchar(500) NOT NULL,
  `messagedate` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tempsms`
--

INSERT INTO `tempsms` (`id`, `number`, `message`, `messagedate`, `created_at`) VALUES
(1, '9629015788', 'MGLTK good morning', '2019-12-20 15:55:13', '2019-12-20 18:16:19'),
(2, '9629015788', 'MGLTK good morning', '2019-12-20 15:55:13', '2019-12-20 18:16:20');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) NOT NULL,
  `clientID` varchar(255) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `number` varchar(250) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `severity` varchar(250) NOT NULL,
  `ticketID` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `closing_status` int(10) NOT NULL DEFAULT 0,
  `time` varchar(250) DEFAULT NULL,
  `campaign_ID` varchar(250) DEFAULT NULL,
  `process` varchar(250) DEFAULT NULL,
  `assigned_to` varchar(250) DEFAULT 'Not Assigned',
  `role` varchar(250) DEFAULT NULL,
  `attachment` varchar(250) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `l1` int(10) NOT NULL DEFAULT 0,
  `l2` int(10) NOT NULL DEFAULT 0,
  `l3` int(10) NOT NULL DEFAULT 0,
  `l4` int(10) NOT NULL DEFAULT 0,
  `read_status` int(10) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `clientID`, `email`, `number`, `subject`, `description`, `severity`, `ticketID`, `status`, `closing_status`, `time`, `campaign_ID`, `process`, `assigned_to`, `role`, `attachment`, `created_at`, `l1`, `l2`, `l3`, `l4`, `read_status`) VALUES
(1, 'SRM1003', 'srm@futurecalls.com', '9999999999', 'SRM unibox GLobal Access regards ', '', 'P2', 'N201033', 'Open', 0, '14954', '3', '3', 'tamilarasan@futurecalls.com', 'Team leader', '', '2018-01-10 10:20:00', 1, 1, 1, 1, 0),
(2, 'CGP1103', 'cgpolice@futurecalls.com', '9999999999', 'CGPolice SSL Certificate Configuration', 'Need to configure SSL certificate for Chat URL', 'P3', 'V201108', 'Close', 2, '5596', '1', '2', 'sagar@futurecalls.com', 'L3 support', '', '2018-12-24 11:20:00', 1, 1, 1, 1, 0),
(3, 'CGP1103', 'cgpolice@futurecalls.com', '9999999999', 'CG Police Campaign Name Change', 'New Request Check with Altitude and configure the same', 'P3', 'V581011', 'Close', 2, '5596', '1', '2', 'sagar@futurecalls.com', 'L3 support', '', '2018-12-24 11:20:00', 1, 1, 1, 1, 0),
(4, 'CGP1103', 'cgpolice@futurecalls.com', '9999999999', 'CG Police SSL certificate', 'SSL certificate applied but chat typing window not working. Informed customer to configure the reverse proxy', 'P3', 'V541056', 'Close', 2, '5596', '1', '2', 'sagar@futurecalls.com', 'L3 support', '', '2018-12-24 11:20:00', 1, 1, 1, 1, 0),
(5, 'VMC1203', 'vmch@futurecalls.com', '9999999999', 'VMCH', 'VCE network error', 'P2', 'V290153', 'Close', 2, '4994', '1', '1', 'dillibabu@futurecalls.com', 'L3 support', '', '2018-12-27 13:29:00', 1, 1, 1, 1, 0),
(6, 'Ste0911', 'sterling@futurecalls.com', '9999999999', 'Before landing call to Agent Please wait while we transfer is played twice', 'Before landing call to Agent Please wait while we transfer is played twice', 'P2', 'A261153', 'Close', 2, '5148', '1', '2', 'devakumar@futurecalls.com', 'L3 support', '', '2019-01-19 11:26:00', 1, 1, 1, 1, 0),
(7, 'Ste0911', 'sterling@futurecalls.com', '9999999999', 'Outbound Dialing - Should disable prefixing 0 before numbers', 'Outbound Dialing - Should disable prefixing 0 before numbers', 'P2', 'A271136', 'Close', 2, '5148', '1', '2', 'devakumar@futurecalls.com', 'L3 support', '', '2019-01-19 11:27:00', 1, 1, 1, 1, 0),
(8, 'Ste0911', 'sterling@futurecalls.com', '9999999999', 'Outbound - No Recording. No Reports.', 'Outbound - No Recording. No Reports.', 'P2', 'V291106', 'Close', 2, '5148', '1', '2', 'devakumar@futurecalls.com', 'L3 support', '', '2019-01-19 11:29:00', 1, 1, 1, 1, 0),
(9, 'Cit1111', 'cub@futurecalls.com', '9999999999', 'CUB - Ticketing Server Migration', 'City Union Bank - Ticketing Server Migration from DR to Chennai DC', 'P4', 'V370427', 'Open', 0, '4196', '1', '2', 'devakumar@futurecalls.com', 'Service Head', '', '2019-04-03 16:37:00', 1, 1, 1, 1, 0),
(10, 'Red3712', 'redgrape@futurecalls.com', '9999999999', 'Phone installation', 'Redgrape', 'P3', 'V131007', 'Close', 2, '2285', '1', '1', 'dillibabu@futurecalls.com', 'L3 support', '', '2019-04-19 10:13:00', 1, 1, 1, 1, 0),
(11, 'Gan5312', 'ganges@gmail.com', '9999999999', '2 VC Xt4300 installation', 'Ganges int', 'P2', 'V141019', 'Close', 2, '2279', '1', '1', 'dillibabu@futurecalls.com', 'L3 support', '', '2019-04-19 16:37:00', 1, 1, 1, 1, 0),
(12, 'VMC1203', 'vmch@gmail.com', '9999999999', 'System upgrade', 'VMCH', 'P2', 'V231059', 'Close', 2, '1565', '1', '1', 'pradeep@futurecalls.com', 'Team leader', '', '2019-05-19 10:23:00', 1, 1, 1, 1, 0),
(13, 'GRT1503', 'grt@futurecalls.com', '9999999999', ' gust name not displayed ', 'GRT madurai', 'P2', 'V131000', 'Close', 2, '1565', '1', '1', 'dillibabu@futurecalls.com', 'L3 support', '', '2019-05-19 10:13:00', 1, 1, 1, 1, 0),
(14, 'Sta1303', 'standex@futurecalls.com', '9999999999', 'Satndex', 'Standex electronics  need some changes in IP adress', 'P2', 'V191008', 'Open', 0, '2354', '1', '1', 'pradeep@futurecalls.com', 'Team leader', '', '2019-06-19 10:19:00', 1, 1, 1, 1, 0),
(15, 'God1403', 'godtv@futurecalls.com', '9999999999', 'GOD  TV', 'preventive maintenance', 'P2', 'V211053', 'Close', 2, '821', '1', '1', 'pradeep@futurecalls.com', 'Team leader', '', '2019-06-19 10:21:00', 1, 1, 1, 1, 0),
(16, 'ABA1503', 'aban@gmail.com', '9999999999', 'Aban', 'preventive maintenance ', 'P2', 'V221024', 'Close', 2, '101', '1', '1', 'pradeep@futurecalls.com', 'Team leader', '', '2019-07-19 10:22:00', 1, 1, 1, 1, 0),
(17, 'GRT1503', 'grt@futurecalls.com', '9999999999', 'GRT kanchipuram', 'kanchipuram grt  call billing s/w issues', 'P2', 'V540426', 'Close', 2, '815', '1', '1', 'dillibabu@futurecalls.com', 'L3 support', '', '2019-06-19 16:54:00', 1, 1, 1, 1, 0),
(18, 'IRC1603', 'ircs@futurecalls.com', '9999999999', 'IRCS', 'FHS  JSSK s/w issues', 'P2', 'V550456', 'Close', 2, '815', '1', '1', 'santhiya@futurecalls.com', '', '', '2019-06-19 16:55:00', 1, 1, 1, 1, 0),
(19, 'Kum1803', 'kumaranhs@futurecalls.com', '9999999999', 'Kumaran hospital, Coimbatore', 'Kumaran hospital implementation.', 'P2', 'N011158', 'Open', 0, '1633', '3', '3', 'vengadeshwaran@futurecalls.com', 'L1 support', '', '2019-07-19 11:01:00', 1, 1, 1, 1, 0),
(20, 'SUN1903', 'ssoft@futurecalls.com', '9999999999', 'Sunnysoft, Coimbatore', 'Sunnysoft implemetation.', 'P2', 'N081105', 'Open', 0, '1633', '3', '3', 'vengadeshwaran@futurecalls.com', 'L1 support', '', '2019-07-19 11:08:00', 1, 1, 1, 1, 0),
(21, 'Pan2103', 'panimalar@futurecalls.com', '9999999999', 'Panimalar college,Chennai', 'Panimalar college site supervision and implemetation.', 'P2', 'N171155', 'Open', 0, '1633', '3', '3', 'senthil@futurecalls.com', 'L3 support', '', '2019-07-19 11:17:00', 1, 1, 1, 1, 0),
(22, 'Pan2103', 'panimalar@futurecalls.com', '9999999999', 'Panimalar college,Chennai', 'Panimalar college site supervision and implemetation.', 'P2', 'N181139', 'Open', 0, '1633', '3', '3', 'subrat@futurecalls.com', 'L1 support', '', '2019-07-19 11:18:00', 1, 1, 1, 1, 0),
(23, 'Pan2103', 'panimalar@futurecalls.com', '9999999999', 'Panimalar college,Chennai', 'Panimalar Project.', 'P3', 'N431034', 'Open', 0, '1633', '3', '3', 'tamilarasan@futurecalls.com', 'Team leader', '', '2019-07-19 10:43:00', 1, 1, 1, 1, 0),
(24, 'Gem0403', 'gemhs@futurecalls.com', '9999999999', 'Gem Hospitals, Chennai', 'Gem Project.', 'P4', 'N431056', 'Open', 0, '1633', '3', '3', 'tamilarasan@futurecalls.com', 'Team leader', '', '2019-07-19 10:43:00', 1, 1, 1, 1, 0),
(25, 'SRM1003', 'srm@futurecalls.com', '9999999999', 'SRM,sonipet', 'SRM project', 'P3', '481054', 'Open', 0, '1633', '3', '3', 'Not Assigned', '', '', '2019-07-19 10:48:00', 1, 1, 1, 1, 0),
(26, 'SRM1003', 'srm@futurecalls.com', '9999999999', 'SRM,sonipet', 'SRM project', 'P3', 'N501050', 'Open', 0, '1633', '3', '3', 'tamilarasan@futurecalls.com', 'Team leader', '', '2019-07-19 10:50:00', 1, 1, 1, 1, 0),
(28, 'GRT1503', 'grt@gmail.com', '9787141830', 'GRT thiruthani  new analog card installation', 'new card installation ( Analog)', 'P3', '381121', 'Close', 2, '37', '1', '1', 'dillibabu@futurecalls.com', 'L1 support', '', '2019-07-23 23:08:25', 1, 1, 1, 1, 0),
(30, 'Spa1801', 'spark@gmail.com', '9787141830', 'Spark capital', 'VMS card', 'P2', '250126', 'Close', 2, '106', '1', '5', 'dillibabu@futurecalls.com', 'L3 support', '', '2019-07-26 00:55:26', 1, 1, 1, 1, 0),
(31, 'The5311', 'preetham@thermalsystems.in', '9876543234', 'Server data transfer', 'data transfer', 'P2', '071001', 'Close', 2, NULL, '2', '10', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-07-29 21:37:01', 1, 1, 1, 1, 0),
(32, 'IFC1010', 'gopl@ifci.com', '6987654321', 'Firewall Sophos Demo', 'Demo firewall', 'P2', '221029', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-07-29 21:52:29', 1, 1, 1, 1, 0),
(63, 'Gan5312', 'ganges@gmail.com', '9787141830', 'Avaya  VC issues', 'Delhi avaya vc not connected', 'P3', '350357', 'Open', 0, '1137', '1', '1', 'Not Assigned', NULL, '', '2019-08-09 03:05:58', 1, 1, 1, 1, 0),
(64, 'Cit1111', 'helpdesk@futurecalls.com', NULL, 'email content test', 'email content test', 'P4', '120444', 'Close', 2, '612', '1', '2', 'Not Assigned', NULL, '', '2019-08-09 03:42:45', 1, 1, 1, 1, 0),
(62, 'Red3712', 'redgrape@gmail.com', '9787141830', 'IVR', 'IVR issues', 'P3', '310306', 'Open', 0, '1137', '1', '1', 'Not Assigned', NULL, '', '2019-08-09 03:01:07', 1, 1, 1, 1, 0),
(59, 'The5311', 'preetham@thermalsystems.in', '6987654321', 'Windows OS', 'OS service pack installation', 'P2', '181011', 'Close', 2, NULL, '2', '10', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-08-08 21:48:11', 1, 1, 1, 1, 0),
(60, 'Uni4211', 'test@gmail.com', '0987654654', 'Server and Workstation', 'Server pricing quote', 'P3', '181050', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-08-08 21:48:50', 1, 1, 1, 1, 0),
(61, 'Par2110', 'pra@ParsecTelesystems.com', '0077889955', 'Firewall', 'Firewall installation', 'P2', '281046', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-08-08 21:58:47', 1, 1, 1, 1, 0),
(57, 'Tir4111', 'testtetw@tirumala.com', '9843644039', 'Email Test', 'test mail', 'P4', '070646', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-08-08 05:37:48', 1, 1, 1, 1, 0),
(58, 'Tir4111', 'testtetw@tirumala.com', '0928765454', 'Firewall', 'Firewall rules error', 'P2', '171013', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-08-08 21:47:14', 1, 1, 1, 1, 0),
(56, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '9843644039', 'Test Ticket', 'Test Ticket', 'P4', '490535', 'Close', 2, '298', '1', '2', 'akash.sachdev@futurecalls.com', 'L2 support', '', '2019-08-08 05:19:39', 1, 1, 1, 1, 0),
(55, 'Cit1111', 'helpdesk@futurecalls.com', '8939991513', 'Branch care to DC', 'Branch care Instance need to be migrated to DC from DR.', 'P3', '180251', 'Close', 2, '849', '1', '2', 'suresh.j@futurecalls.com', 'L2 support', '', '2019-08-08 01:48:52', 1, 1, 1, 1, 0),
(39, 'viv0011', 'caroline@viveks.com', '9787141830', 'Avaya analog extn issues', 'Avaya extn', 'P3', '071130', 'Close', 2, '208', '1', '1', 'Not Assigned', NULL, '', '2019-07-30 22:37:31', 1, 1, 1, 1, 0),
(40, 'Gem0403', 'gem@gmail.com', '9840618290', 'Share folder creation, Gemhospital website issue.', 'Need to create share folder for each dept and needs to fix Gemhospital.com website.', 'P3', '490203', 'Close', 2, NULL, '3', '3', 'karthik@futurecalls.com', 'Team leader', '', '2019-07-31 02:19:06', 1, 1, 1, 1, 0),
(54, 'Hun4911', 'test@interviewdesk.in', '6987654321', 'Firewall', 'Firewall rules', 'P2', '410228', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-08-06 02:11:35', 1, 1, 1, 1, 0),
(42, 'Tir4111', 'testtetw@tirumala.com', '8939811522', 'Wifi access point and controller installation and configuration.', 'Need to configure and install Dlink AP\'s and Controller.', 'P3', '450346', 'Close', 2, '2240', '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-07-31 03:15:48', 1, 1, 1, 1, 0),
(44, 'The5311', 'preetham@thermalsystems.in', '6987654321', 'Seqrite AV installation', 'Anti-Virus installation for Server and Client', 'P3', '191256', 'Close', 2, NULL, '2', '10', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-07-31 23:49:57', 1, 1, 1, 1, 0),
(47, 'Fut5012', 'Future@futurecalls.com', '6987654321', 'Contaque Dialer', 'Contaque Dialer OS', 'P2', '060318', 'Close', 2, NULL, '2', '11', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-08-01 02:36:20', 1, 1, 1, 1, 0),
(66, 'Par2110', 'pra@ParsecTelesystems.com', '0987654654', 'Firewall', 'Firewall phase 2 configuration', 'P2', '580941', 'Close', 2, '403', '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-08-12 21:28:42', 1, 1, 1, 1, 0),
(65, 'Uni4211', 'test@gmail.com', '0928765454', 'Firewall', 'FW new rules', 'P2', '341120', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-08-11 23:04:21', 1, 1, 1, 1, 0),
(67, 'Hun4911', 'test@interviewdesk.in', '0987654654', 'Firewall', 'Firewall Rule Change', 'P3', '061212', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-08-12 23:36:13', 1, 1, 1, 1, 0),
(68, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'Hold - Screen Recording', 'Hold duration screen recording. (Please give ticket number to escalate)', 'P4', '110339', 'Open', 0, '1041', '1', '2', 'prasad@futurecalls.com', 'L1 support', '', '2019-08-13 02:41:40', 1, 1, 1, 1, 0),
(69, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'System Down', 'RCA for system down.', 'P2', '250350', 'Close', 2, '158', '1', '2', 'sagar@futurecalls.com', 'L2 support', '', '2019-08-13 02:55:51', 1, 1, 1, 1, 0),
(70, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'Server memory Increase', 'Recording server memory increase . Decide schedule and implement .', 'P3', '280306', 'Close', 2, '687', '1', '2', 'akash.sachdev@futurecalls.com', 'L2 support', '', '2019-08-13 02:58:07', 1, 1, 1, 1, 0),
(71, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'IVR script changes', 'IVR script changes for enqueue call & sudden holidays .', 'P2', '390356', 'Open', 0, '1041', '1', '2', 'prasad@futurecalls.com', 'L1 support', '', '2019-08-13 03:09:57', 1, 1, 1, 1, 0),
(72, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'APR Report', 'Get APR report confirmation from RomiÂ ', 'P3', '440303', 'Close', 2, '180', '1', '2', 'prasad@futurecalls.com', 'L1 support', '', '2019-08-13 03:14:05', 1, 1, 1, 1, 0),
(73, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'Outbound campaign reports', 'Call status in Outbound campaign report .', 'P3', '480349', 'Close', 2, '180', '1', '2', 'prasad@futurecalls.com', 'L1 support', '', '2019-08-13 03:18:51', 1, 1, 1, 1, 0),
(74, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'Sodexo_Mapping_Report', 'Sodexo_Mapping_Report \r\nCall key in CSAT campaign & Agent campaign is different most of the time. Altitude creates new call key in case of transfer call. Â But in few cases call key matches.(Need to Open Ticket)\r\nNo records in Tr_CSAT campaign. As per mee', 'P3', '510353', 'Open', 0, '1041', '1', '2', 'prasad@futurecalls.com', 'L1 support', '', '2019-08-13 03:21:55', 1, 1, 1, 1, 0),
(75, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'SLA needs to be calculated', 'SLA needs to be calculated & not from system. Currently it is giving from system', 'P4', '540328', 'Open', 0, '1041', '1', '2', 'akash.sachdev@futurecalls.com', 'L2 support', '', '2019-08-13 03:24:29', 1, 1, 1, 1, 0),
(76, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'Retrival Tool', 'Screen Resolution of Enterprise recording.(Retrival Tool)', 'P2', '570337', 'Open', 0, '1041', '1', '2', 'prasad@futurecalls.com', 'L1 support', '', '2019-08-13 03:27:40', 1, 1, 1, 1, 0),
(77, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'IVR script changes', 'IVR script changes for Reports', 'P2', '000430', 'Hold', 0, '1041', '1', '2', 'akash.sachdev@futurecalls.com', 'L2 support', '', '2019-08-13 03:30:34', 1, 1, 1, 1, 0),
(78, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'ER ANI', 'ER ANI not appering', 'P4', '040451', 'Close', 2, '180', '1', '2', 'akash.sachdev@futurecalls.com', 'L2 support', '', '2019-08-13 03:34:52', 1, 1, 1, 1, 0),
(79, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'campaign dimension reports.', 'Previous Agents not reflecting in campaign dimension reports.', 'P4', '060410', 'Open', 0, '1041', '1', '2', 'prasad@futurecalls.com', 'L1 support', '', '2019-08-13 03:36:12', 1, 1, 1, 1, 0),
(80, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'Outbound  report', 'Outbound report : Reports for contacts which are not dialed.', 'P2', '080401', 'Close', 2, '727', '1', '2', 'akash.sachdev@futurecalls.com', 'L2 support', '', '2019-08-13 03:38:02', 1, 1, 1, 1, 0),
(81, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'RCA  system down', 'RCA for system down', 'P2', '090436', 'Open', 0, '1040', '1', '2', 'akash.sachdev@futurecalls.com', 'L2 support', '', '2019-08-13 03:39:37', 1, 1, 1, 1, 0),
(82, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'RCA  system down ( RQST00000173816 )', 'RCA for system down', 'P2', '120445', 'Esclate', 0, '1040', '1', '2', 'sagar@futurecalls.com', 'L2 support', '', '2019-08-13 03:42:46', 1, 1, 1, 1, 0),
(83, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'RCA  system down ( RQST00000173816 )', 'RCA for system down', 'P2', '120450', 'Close', 2, '179', '1', '2', 'sagar@futurecalls.com', 'L2 support', '', '2019-08-13 03:42:50', 1, 1, 1, 1, 0),
(84, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'RCA  system down ( RQST00000173816 )', 'RCA for system down', 'P2', '120459', 'Close', 2, '179', '1', '2', 'sagar@futurecalls.com', 'L2 support', '', '2019-08-13 03:43:00', 1, 1, 1, 1, 0),
(85, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'RCA  system down ( RQST00000173816 )', 'RCA for system down', 'P2', '130400', 'Close', 2, '179', '1', '2', 'sagar@futurecalls.com', 'L2 support', '', '2019-08-13 03:43:01', 1, 1, 1, 1, 0),
(86, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'RCA  system down ( RQST00000173816 )', 'RCA for system down', 'P2', '130401', 'Open', 0, '1040', '1', '2', 'akash.sachdev@futurecalls.com', 'L2 support', '', '2019-08-13 03:43:02', 1, 1, 1, 1, 0),
(87, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'RCA  system down ( RQST00000173102 )', 'RCA for system down.', 'P2', '150442', 'Close', 2, '179', '1', '2', 'sagar@futurecalls.com', 'L2 support', '', '2019-08-13 03:45:43', 1, 1, 1, 1, 0),
(88, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'Sales Force connector', 'Sales Force connector logout or unable to set ready if agent Idle', 'P2', '170401', 'Close', 2, '157', '1', '2', 'sagar@futurecalls.com', 'L2 support', '', '2019-08-13 03:47:02', 1, 1, 1, 1, 0),
(89, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'system down ( RQST00000174086)', 'system went down', 'P2', '200402', 'Esclate', 0, '1040', '1', '2', 'sagar@futurecalls.com', 'L2 support', '', '2019-08-13 03:50:03', 1, 1, 1, 1, 0),
(90, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'Eroor in Welcome message', 'Disturbance in Welcome message', 'P3', '220457', 'Hold', 0, '1040', '1', '2', 'sagar@futurecalls.com', 'L2 support', '', '2019-08-13 03:52:58', 1, 1, 1, 1, 0),
(91, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'System down ( RQST00000174348)', 'System Went down', 'P2', '240436', 'Hold', 0, '1040', '1', '2', 'akash.sachdev@futurecalls.com', 'L2 support', '', '2019-08-13 03:54:37', 1, 1, 1, 1, 0),
(92, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', NULL, 'Data consistency issue', 'Then handle time in the agent performance report, and mapping data are different. The average handle time of the floor differs by 1m23s in the two reports', 'P2', '180621', 'Open', 0, '1038', '1', '2', 'prasad@futurecalls.com', 'L1 support', 'Difference in Handle time.xlsx', '2019-08-13 05:48:23', 1, 1, 1, 1, 0),
(108, 'Hex0901', 'hexaware@futurecalls.com', '9653420360', 'Call abandon issue - V 7.5', 'calls were handled by agent but in report it concider as abandon', 'P3', '361004', 'Close', 2, '160', '1', '2', 'sagar@futurecalls.com', 'L1 support', '', '2019-08-19 22:06:05', 1, 1, 1, 1, 0),
(109, 'Hex0901', 'hexaware@futurecalls.com', '9653420360', 'Wrap time data issue', '6th August raw data that call wrap time is showing 77:02:42 which is incorrect and whereas as per the script time AHT should be 0:03:17.', 'P3', '381056', 'Close', 2, '160', '1', '2', 'sagar@futurecalls.com', 'L1 support', '6th Aug.xlsx', '2019-08-19 22:08:57', 1, 1, 1, 1, 0),
(110, 'The5311', 'preetham@thermalsystems.in', '0987654654', 'Pheripharal Control', 'USB enabling and Admin access', 'P2', '040203', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-08-20 01:34:04', 1, 1, 1, 1, 0),
(111, 'Par2110', 'pra@ParsecTelesystems.com', '0077889955', 'Firewall', 'Firewall phase 3', 'P2', '040236', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-08-20 01:34:37', 1, 1, 1, 1, 0),
(112, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'not able to sign in altitude', 'Prabhat is not able to login in altitude.', 'P4', '130314', 'Close', 2, '45', '1', '2', 'prasad@futurecalls.com', 'L1 support', '', '2019-08-20 02:43:15', 1, 1, 1, 1, 0),
(113, 'GRT1503', 'grt@gmail.com', '8801238822', 'Branch care to DC', 'test', 'P1', '400550', 'Open', 0, '871', '1', '1', 'pradeep@futurecalls.com', 'L1 support', '', '2019-08-20 05:10:52', 1, 1, 1, 1, 0),
(114, 'Cit1111', 'helpdesk@futurecalls.com', '8801238822', 'Email Test', 'test ticket', 'P2', '510557', 'Close', 2, '347', '1', '2', 'Not Assigned', NULL, '', '2019-08-20 05:21:58', 1, 1, 1, 1, 0),
(115, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'Not able to login In altitude', 'Devendra is not able to login in Altitude Softphone', 'P3', '420527', 'Close', 2, NULL, '1', '2', 'akash.sachdev@futurecalls.com', 'L1 support', '', '2019-08-21 17:12:30', 1, 1, 1, 1, 0),
(116, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'user auto logout', 'Nancy is facing issue that while call going on it auto logout', 'P3', '450549', 'Close', 2, NULL, '1', '2', 'akash.sachdev@futurecalls.com', 'L1 support', '', '2019-08-21 17:15:58', 1, 1, 1, 1, 0),
(117, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'user auto logout', 'Nancy is facing issue that while call going on it auto logout', 'P3', '450558', 'Close', 2, NULL, '1', '2', 'akash.sachdev@futurecalls.com', 'L1 support', '', '2019-08-21 17:16:02', 1, 1, 1, 1, 0),
(118, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'user auto logout', 'Nancy is facing issue that while call going on it auto logout', 'P3', '460503', 'Close', 2, NULL, '1', '2', 'akash.sachdev@futurecalls.com', 'L1 support', '', '2019-08-21 17:16:12', 1, 1, 1, 1, 0),
(119, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'user auto logout', 'Nancy is facing issue that while call going on it auto logout', 'P3', '460512', 'Close', 2, NULL, '1', '2', 'akash.sachdev@futurecalls.com', 'L1 support', '', '2019-08-21 17:16:17', 1, 1, 1, 1, 0),
(120, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'user auto logout', 'Nancy is facing issue that while call going on it auto logout', 'P3', '460517', 'Close', 2, NULL, '1', '2', 'akash.sachdev@futurecalls.com', 'L1 support', '', '2019-08-21 17:16:22', 1, 1, 1, 1, 0),
(121, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'user auto logout', 'Nancy is facing issue that while call going on it auto logout', 'P3', '460522', 'Close', 2, NULL, '1', '2', 'akash.sachdev@futurecalls.com', 'L1 support', '', '2019-08-21 17:16:25', 1, 1, 1, 1, 0),
(122, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'user auto logout', 'Nancy is facing issue that while call going on it auto logout', 'P3', '460525', 'Close', 2, NULL, '1', '2', 'akash.sachdev@futurecalls.com', 'L1 support', '', '2019-08-21 17:16:29', 1, 1, 1, 1, 0),
(123, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'user auto logout', 'Nancy is facing issue that while call going on it auto logout', 'P3', '460543', 'Close', 2, NULL, '1', '2', 'akash.sachdev@futurecalls.com', 'L1 support', '', '2019-08-21 17:16:49', 1, 1, 1, 1, 0),
(124, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'user auto logout', 'Nancy is facing issue that while call going on it auto logout', 'P3', '470515', 'Close', 2, NULL, '1', '2', 'akash.sachdev@futurecalls.com', 'L1 support', '', '2019-08-21 17:17:19', 1, 1, 1, 1, 0),
(125, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'Screen recording issue', 'Not all agent screen are recording', 'P2', '500536', 'Close', 2, '481', '1', '2', 'akash.sachdev@futurecalls.com', 'L1 support', '', '2019-08-21 17:20:39', 1, 1, 1, 1, 0),
(126, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'Screen recording issue in system', 'there are 3 system where screen recording issue is there', 'P3', '080613', 'Close', 2, '480', '1', '2', 'akash.sachdev@futurecalls.com', 'L1 support', '', '2019-08-21 17:38:14', 1, 1, 1, 1, 0),
(127, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'unable to recording detail of  agents', 'Sundana Kadam is not able to see user login details', 'P3', '200604', 'Close', 2, '42', '1', '2', 'akash.sachdev@futurecalls.com', 'L1 support', '', '2019-08-21 17:50:05', 1, 1, 1, 1, 0),
(128, 'Hex0901', 'GaneshY@hexaware.com', '9004095180', 'Unable to view site (all telephony gateway disappear) in uSupervisor', 'Unable to view site (all telephony gateway disappear) in uSupervisor after rebooting the system. Before reboot the system done the below configuration changes in shared memory tab as per meeting point suggestion.\r\n\r\nuser 1100 - 1300\r\nout campaign - 140 - ', 'P2', '070149', 'Close', 2, '514', '1', '2', 'prasad@futurecalls.com', 'L1 support', '', '2019-08-22 00:37:50', 1, 1, 1, 1, 0),
(129, 'Hex0901', 'hexaware@futurecalls.com', '9994178714', 'Unable to Retrieve the Not Ready', 'One Agents are facing issues while they try to change the not ready mode it remains that same and not changing. The agent is not able to change the not ready mode from break as it is not changing. Please let us know what are the logs required to analyses ', 'P3', '020104', 'Open', 0, '828', '1', '2', 'devakumar@futurecalls.com', 'L1 support', '', '2019-08-22 00:32:05', 1, 1, 1, 1, 0),
(130, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'Dashboard not working', 'Showing error on dashboard', 'P4', '360529', 'Close', 2, '31', '1', '2', 'prasad@futurecalls.com', 'L1 support', '', '2019-08-22 05:06:30', 1, 1, 1, 1, 0),
(131, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'Softphone not working', 'Sipphone not working in agent system', 'P4', '370540', 'Close', 2, '179', '1', '2', 'akash.sachdev@futurecalls.com', 'L1 support', '', '2019-08-22 05:07:41', 1, 1, 1, 1, 0),
(132, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'Recording mismatch', 'Recording mismatch on recording retrieval. Meeting point ticket no. RQST00000175177', 'P3', '390525', 'Open', 0, '823', '1', '2', 'prasad@futurecalls.com', 'L1 support', '', '2019-08-22 05:09:27', 1, 1, 1, 1, 0),
(133, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'Hold time gape', 'Hold time gape in voice is trimmed . Meeting point ticket no. RQST00000175178', 'P4', '410501', 'Open', 0, '823', '1', '2', 'prasad@futurecalls.com', 'L1 support', '', '2019-08-22 05:11:05', 1, 1, 1, 1, 0),
(134, 'The5311', 'preetham@thermalsystems.in', '0987654654', 'Firewall and AD', 'AD implement Antivirus and Firewall', 'P2', '170815', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-08-22 07:47:17', 1, 1, 1, 1, 0),
(141, 'The5311', 'preetham@thermalsystems.in', '0928765454', 'Printer Enabling', 'Printer enable for systems', 'P2', '491035', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-08-27 10:49:47', 1, 1, 1, 1, 0),
(142, 'Tir4111', 'test123@gmail.com', '6987654321', 'Firewall', 'URL exception and Reports', 'P2', '531028', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-08-27 10:53:29', 1, 1, 1, 1, 0),
(143, 'CGP1103', 'cgp@gmail.com', '9004095180', 'Altitude System Down - 29/08/2019', 'Altitude system down, unable to login in uAgent application', 'P2', '060434', 'Close', 2, '330', '1', '2', 'sagar@futurecalls.com', 'L1 support', '', '2019-08-29 16:06:34', 1, 1, 1, 1, 0),
(145, 'Shr1511', 'rag@shriram.com', '0987654321', 'SIEM', 'SIEM TOOL', 'P2', '301124', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-08-31 11:30:26', 1, 1, 1, 1, 0),
(146, 'Wat1811', 'wat@watan.com', '6987654321', 'Server', 'Server', 'P3', '311120', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-08-31 11:31:24', 1, 1, 1, 1, 0),
(147, 'GRT1503', 'grt@gmail.com', '9787141830', 'GRT  t nager', 'reception  phone issues', 'P2', '121009', 'Open', 0, '530', '1', '1', 'Not Assigned', NULL, '', '2019-09-03 10:12:10', 1, 1, 1, 1, 0),
(148, 'GRT1503', 'grt@gmail.com', '9787141830', 'GRT kanchipuram', 'Matrix EPABX trunk issues', 'P2', '131018', 'Open', 0, '530', '1', '1', 'Not Assigned', NULL, '', '2019-09-03 10:13:19', 1, 1, 1, 1, 0),
(149, 'Uni4211', 'test@gmail.com', '0928765454', 'Firewall', 'Firewall rule', 'P2', '501046', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-09-04 10:50:48', 1, 1, 1, 1, 0),
(150, 'Par2110', 'pra@ParsecTelesystems.com', '0928765454', 'Firewall', 'Firewall pending Config', 'P2', '171006', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-09-06 10:17:18', 1, 1, 1, 1, 0),
(151, 'Uni4211', 'test@gmail.com', '6987654321', 'AntiVirus', 'Seqrite AV', 'P1', '171053', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-09-06 10:18:05', 1, 1, 1, 1, 0),
(159, 'Par2110', 'pra@ParsecTelesystems.com', '0928765454', 'Firewall', 'Firewall VPN', 'P2', '430218', 'Close', 2, '333', '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-09-11 14:43:19', 1, 1, 1, 1, 0),
(160, 'Uni4211', 'test@gmail.com', '6987654321', 'Firewall', 'Sophos XG FW', 'P2', '440210', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-09-11 14:44:11', 1, 1, 1, 1, 0),
(161, 'viv0011', 'caroline@viveks.com', '9787141830', 'Avaya', 'Need to reconfigure', 'P3', '321046', 'Open', 0, '314', '1', '1', 'pradeep@futurecalls.com', 'L1 support', '', '2019-09-12 10:32:47', 1, 1, 1, 1, 0),
(164, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'unable to resume call', 'sachin mail - While retrieving call, call got disconnected but all icons on consillium where greyed out while retriving call 12:01pm.', 'P3', '200114', 'Open', 0, '287', '1', '2', 'akash.sachdev@futurecalls.com', 'L1 support', 'sachin error.jpg', '2019-09-13 13:20:16', 1, 1, 1, 1, 0),
(165, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'Unable to hear voice', 'Geeta drop mail- I was unable to hear the incoming call as there was no sound in call. \r\n\r\n \r\n\r\nPlease find the screen shot in attached file.\r\n\r\n \r\n\r\nIt was working fine now after restarting the software\r\n\r\n\r\n\r\nMeeting point ticket number- RQST00000176145', 'P3', '400316', 'Close', 2, NULL, '1', '2', 'akash.sachdev@futurecalls.com', 'L1 support', 'voice issue.png', '2019-09-13 15:40:16', 1, 1, 1, 1, 0),
(166, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '9004036628', 'Not able to hear sound', 'In headset not able to hear sound (headset sound problem)', 'P4', '520903', 'Close', 2, NULL, '1', '2', 'akash.sachdev@futurecalls.com', 'L1 support', '', '2019-09-15 21:52:03', 1, 1, 1, 1, 0),
(167, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'Nandini is facing issue. for function button disable', 'Nandini report- that while on call, all function are disbale.. Screenshot attached .\r\n\r\nMeeting point ticket number- RQST00000176244', 'P3', '140450', 'Close', 2, '188', '1', '2', 'akash.sachdev@futurecalls.com', 'L1 support', 'nandini.png', '2019-09-17 16:14:53', 1, 1, 1, 1, 0),
(168, 'HLL2811', 'hblbio@hll.com', '0987654321', 'Firewall', 'Sophos XG firewall', 'P2', '301158', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-09-18 11:31:01', 1, 1, 1, 1, 0),
(169, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'Rohit facing auto logout while transferring call to IVR', 'User report while is transferring to IVR it automatically logout  Timing in between 12.51 pm to 12.55 pm.\r\nPFA. And in screenshot recording is still working.', 'P4', '180136', 'Open', 0, '167', '1', '2', 'akash.sachdev@futurecalls.com', 'L1 support', 'rohit 1.png', '2019-09-18 13:18:37', 1, 1, 1, 1, 0),
(170, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'while altitude is logout still getting calls.', 'while Altitude is logout still get call. Timing between 12:56 pm.\r\nPlease find attachment.', 'P4', '190141', 'Close', 2, '167', '1', '2', 'akash.sachdev@futurecalls.com', 'L1 support', 'rohit 2.png', '2019-09-18 13:19:42', 1, 1, 1, 1, 0),
(172, 'Hun4911', 'test@interviewdesk.in', '0928765454', 'Firewall', 'Firewall rules', 'P3', '570415', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-09-19 16:57:20', 1, 1, 1, 1, 0),
(173, 'HLL2811', 'hblbio@hll.com', '0928765454', 'Firewall', 'Citrix client', 'P2', '571141', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-09-24 11:57:41', 1, 1, 1, 1, 0),
(174, 'The5311', 'preetham@thermalsystems.in', '6987654321', 'Server', 'Server connectivity', 'P2', '581130', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-09-24 11:58:31', 1, 1, 1, 1, 0),
(175, 'Int1811', 'int@ontgrsift.com', '0987654321', 'AntiVirus Demo', 'Kaspersky AV', 'P1', '211118', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-11-01 11:21:25', 1, 1, 1, 1, 0),
(176, 'Tel2211', 'teleby@india.com', '0987654321', 'Security Assessment', 'Assessment report', 'P2', '241137', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-11-01 11:24:40', 1, 1, 1, 1, 0),
(177, 'Int4911', 'test1@gmail.com', '6987654321', 'Firewall', 'SOPHOS FW rules', 'P2', '030303', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-11-01 15:03:06', 1, 1, 1, 1, 0),
(178, 'Int4911', 'test1@gmail.com', '0987654321', 'Firewall', 'FW LIc', 'P2', '180358', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-11-01 15:19:00', 1, 1, 1, 1, 0),
(179, 'GRT1503', 'grt@gmail.com', '9787141830', 'Avaya mod 30 issues', 'Avaya analog mod 30 issues', 'P2', '031027', 'Open', 0, NULL, '1', '1', 'Not Assigned', NULL, '', '2019-11-04 10:03:28', 1, 1, 1, 1, 0),
(180, 'viv0011', 'caroline@viveks.com', '9787141830', 'Extension re-assinment', 'Extn re-assinment', 'P2', '041019', 'Open', 0, NULL, '1', '1', 'Not Assigned', NULL, '', '2019-11-04 10:04:21', 1, 1, 1, 1, 0),
(181, 'Gan5312', 'ganges@gmail.com', '9787141830', 'Avaya VC installation  hubli', 'Avaya VC mic issues in hubli', 'P2', '051022', 'Open', 0, NULL, '1', '1', 'Not Assigned', NULL, '', '2019-11-04 10:05:23', 1, 1, 1, 1, 0),
(182, 'The5311', 'preetham@thermalsystems.in', '6987654321', 'Network Monitoring & Server space', 'Space allocation', 'P2', '081007', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-11-04 10:08:08', 1, 1, 1, 1, 0),
(183, 'Int1811', 'int@ontgrsift.com', '6987654321', 'AntiVirus Demo', 'Demo Session', 'P2', '411027', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-11-06 10:41:28', 1, 1, 1, 1, 0),
(184, 'AGS4310', 'ags@ags.inco', '0987654321', 'Acunetix PoC', 'Acunetix', 'P2', '541058', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-11-06 10:54:59', 1, 1, 1, 1, 0),
(185, 'Raj4711', 'rajesh.kupy@gmail.com', '0987654321', 'Access point, Firewall, Printer, ISP', 'home network setup', 'P2', '571005', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-11-06 10:57:11', 1, 1, 1, 1, 0),
(186, 'New0804', 'new@horixo.com', '0987654321', 'Firewall', 'Firewall proposal', 'P2', '100423', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-11-06 16:10:24', 1, 1, 1, 1, 0),
(187, 'AGS4310', 'ags@ags.inco', '0987654321', 'Acunetix PoC', 'Acunetix demo', 'P2', '421047', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-11-14 10:42:49', 1, 1, 1, 1, 0),
(188, 'The5311', 'preetham@thermalsystems.in', '0987654321', 'Active Directory', 'AD user', 'P2', '431019', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-11-14 10:43:21', 1, 1, 1, 1, 0),
(189, 'New0804', 'new@horixo.com', '0987654321', 'Firewall', 'FW renewal', 'P1', '311109', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-11-14 11:31:10', 1, 1, 1, 1, 0),
(190, 'Raj4711', 'rajesh.kupy@gmail.com', '0987654321', 'Firewall', 'AP and ISP', 'P2', '311156', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-11-14 11:31:56', 1, 1, 1, 1, 0),
(192, 'AGS4310', 'ags@ags.inco', '0987654321', 'Acunetix PoC', 'Acunetix', 'P1', '061001', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-11-19 10:06:06', 1, 1, 1, 1, 0),
(193, 'Uni4211', 'test@gmail.com', '0987654321', 'DELL server', 'Server installation', 'P2', '071012', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-11-19 10:07:12', 1, 1, 1, 1, 0),
(194, 'The5311', 'preetham@thermalsystems.in', '0987654321', 'AV Seqrite', 'AV installation', 'P2', '071057', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-11-19 10:07:58', 1, 1, 1, 1, 0),
(195, 'Uni4211', 'test@gmail.com', '0987654321', 'Server HDD', 'HDD casing', 'P2', '071021', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-11-27 10:07:21', 1, 1, 1, 1, 0),
(196, 'The5311', 'preetham@thermalsystems.in', '0987654321', 'AD', 'User creation', 'P2', '071056', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-11-27 10:07:57', 1, 1, 1, 1, 0),
(197, 'AGS4310', 'ags@ags.inco', '0987654321', 'VAPT tool', 'Demo LIC', 'P2', '091000', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-11-27 10:09:00', 1, 1, 1, 1, 0),
(198, 'Int1811', 'int@ontgrsift.com', '0987654321', 'End Point', 'Antivirus', 'P2', '091055', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-11-27 10:09:55', 1, 1, 1, 1, 0),
(199, 'Mal1710', 'malles@const.com', '0987654321', 'Firewall and Antivirus', 'FW and AV', 'P2', '191016', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-11-27 10:19:16', 1, 1, 1, 1, 0),
(200, 'Cog1210', 'cog@innov.com', '0987654321', 'AWS_RAM team', 'AWS instance', 'P2', '191039', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-11-27 10:19:40', 1, 1, 1, 1, 0),
(201, 'Cog1210', 'cog@innov.com', '0987654321', 'AWS_Gulam team', 'AWS instance', 'P2', '201004', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-11-27 10:20:04', 1, 1, 1, 1, 0),
(202, 'SPI1410', 'spic@spi.com', '0987654321', 'AWS', 'AWS DR solution', 'P2', '201026', 'Close', 2, NULL, '2', '4', 'sakthivel@futurecalls.com', 'Team leader', '', '2019-11-27 10:20:27', 1, 1, 1, 1, 0),
(203, 'IRC1603', 'test@futurecalls.com', '9787141830', 'dash board for tevatel software', 'waiting for API existing software', 'P3', '470909', 'Open', 0, NULL, '1', '1', 'dillibabu@futurecalls.com', 'L1 support', '', '2020-02-03 09:47:10', 0, 0, 0, 0, 0),
(204, 'Shr0604', 'sriramvalue@gmail.com', '9787141830', 'gateway installation', 'mumbai gateway installation pending some issues  in hardware', 'P2', '480935', 'Open', 0, NULL, '1', '5', 'prasad@futurecalls.com', 'L1 support', '', '2020-02-03 09:48:37', 0, 0, 0, 0, 0),
(205, 'GRT1503', 'grt@gmail.com', '9787141830', 'Analog mod 30 two ports issues', 'Avaya mod 30 two port issues', 'P2', '490939', 'Open', 0, NULL, '1', '1', 'dillibabu@futurecalls.com', 'L1 support', '', '2020-02-03 09:49:40', 0, 0, 0, 0, 0);

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
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
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
(31, 'devakumar@futurecalls.com', 'Voice and Contact Center', 'Hexaware- VBox Went Unresponsive ', 'VBox went suddenly offline and they noticed the issue was server went unresponsive and they done hard restart then itâ€™s working fine. ', 'Closed', 'Medium', 'V510552', '2018-11-16 17:51:52', 'Due to the system hang issues, we faced this issues. so we need to be checked from vbox log and we couldn\'t identify any issues from our logs so we need to escalate this to server vendor. One more thing we noticed that vbox patch is old and we recommended to update to latest one.', '2018-12-18 12:08:57'),
(32, 'devakumar@futurecalls.com', 'Voice and Contact Center', 'Hexaware Call Queuing Issue', 'Calls are not landing to agents and all the agents are ready only. But one agent went RONA, shared the required logs to the Altitude team.', 'Closed', 'Medium', 'V310425', '2018-11-02 16:31:25', 'We have informed them for a monitor for some more days, this is not an issue but the operation team misunderstand the flow, and this thing related to page refreshing and we informed the same to Hexaware team.', '2018-12-18 12:39:15'),
(33, 'Sakthivel@futurecalls.com', 'Information Security', 'Relationship Science', 'Antivirus installation issue in RElSCI need to give Demo and training.', 'Open', 'High', 'I161001', '2018-12-17 10:16:01', 'AV Demo and Training has been given to the concern person in RelSci', '2018-12-18 16:01:09'),
(34, 'Sakthivel@futurecalls.com', 'Information Security', 'SPICA', 'AD need to implement', 'Open', 'High', 'I281051', '2018-12-17 10:28:51', 'In discussion, after planing and schedule will initiate the implementation.', '2018-12-19 10:30:30'),
(35, 'Sakthivel@futurecalls.com', 'Information Security', 'Universal Engineers', 'Antivirus- Sophos need to implement', 'Open', 'High', 'I251035', '2018-12-17 10:25:35', 'Pending on customer side conformation', '2018-12-19 10:35:11'),
(36, 'Sakthivel@futurecalls.com', 'Information Security', 'Relationship Science', 'Antivirus installation issue in RElSCI need to give Demo and training.', 'Open', 'High', 'I161001', '2018-12-17 10:16:01', 'AntiVirus demo and training are given to customer', '2018-12-19 10:35:50'),
(37, 'rajakumar.r@futurecalls.com', 'Voice and Contact Center', 'CG Police Chat Notification ', 'Changes done as per client requirement but still agent not able to view full message\r\n', 'Open', 'Medium', 'V521025', '2018-12-24 10:52:25', 'Notification is working but not displayed properly and Need to test o agent desk\r\n\r\n', '2018-12-24 10:53:47'),
(38, 'rajakumar.r@futurecalls.com', 'Voice and Contact Center', 'CG Police Chat Notification ', 'Changes done as per client requirement but still agent not able to view full message\r\n', 'Open', 'Medium', 'V521025', '2018-12-24 10:52:25', 'Alti-RQST00000163599\r\n\r\nNeed to configure reverse proxy\r\n\r\nRemark:\r\n\r\n\"Configured SSL certificate on IIS but Chat typing window with SSL encryption is showing protocol error.\r\nAs per meeting poing need to confiure the Reverse proxy to test the issue.\r\nWaiting for client confirmation\"\r\n', '2018-12-24 10:56:24'),
(39, 'rajakumar.r@futurecalls.com', 'Voice and Contact Center', 'Hexaware', 'Demo License for Hexaware\r\n', 'Open', 'Medium', 'V021135', '2018-12-24 11:02:35', 'Provided Version 8 partener license\r\n', '2018-12-24 11:03:22'),
(40, 'rajakumar.r@futurecalls.com', 'Voice and Contact Center', 'Hexaware', 'V 7.5 Report issue \r\n', 'Open', 'Low', 'V081139', '2018-12-24 11:08:39', 'Alti- RQST00000164028\r\nAsked customer to provide full issue in details.\r\n', '2018-12-24 11:09:59'),
(41, 'rajakumar.r@futurecalls.com', 'Voice and Contact Center', 'Hexaware Alti- RQST00000164027', 'V 7.5 Call executing issue\r\n', 'Open', 'Medium', 'V101147', '2018-12-24 11:10:47', 'Changed the setting in System. Waiting for Customer confirmation.\r\n', '2018-12-24 11:12:39'),
(42, 'rajakumar.r@futurecalls.com', 'Voice and Contact Center', 'Hexaware', 'G 729 Codec\r\n', 'Open', 'Medium', 'V131156', '2018-12-24 11:13:56', '\"G729 codec tested successfully on test environment.\r\nCustomer requested for live setup plan. SO we need confirmation from Altitude team for server spec and architecture details.\r\nWe had send mail to Prem for confirmation \"\r\n', '2018-12-24 11:14:34'),
(43, 'rajakumar.r@futurecalls.com', 'Voice and Contact Center', 'Hexaware', 'License Shifting from V 7 to V 8\r\n', 'Open', 'Medium', 'V151125', '2018-12-24 11:15:25', '\"Customer requested for license movement from V7 to V8 and costing details.\r\nWe need to share the details for the same\"\r\n', '2018-12-24 11:15:51'),
(44, 'rajakumar.r@futurecalls.com', 'Voice and Contact Center', 'Hexaware', 'Russia - Report Requirement\r\n', 'Open', 'Low', 'V161147', '2018-12-24 11:16:47', 'Need to create report as per client requirement\r\n', '2018-12-24 11:17:38'),
(45, 'rajakumar.r@futurecalls.com', 'Voice and Contact Center', 'Hexaware', 'Russia - Call transfer to 3rd Party\r\n', 'Open', 'Medium', 'V181155', '2018-12-24 11:18:55', '\"3rd party pbx which is out of altitude and once the call is out from altitude we cannot control the call more over 3rd party PBX will captre only the agent extenstion number which is used for transferying so this is not possible.\r\nWaiting for customer confirmation\"\r\n', '2018-12-24 11:19:38'),
(46, 'rajakumar.r@futurecalls.com', 'Voice and Contact Center', 'L&T', 'Oveflow issue\r\n', 'Open', 'High', 'V201151', '2018-12-24 11:20:51', 'Alti - RQST00000162891\r\n\r\n\"Informed custome need to enable auto answer to avoid such issue.\r\nBut customer not ready to enable this option.\"\r\n', '2018-12-24 11:21:58'),
(47, 'rajakumar.r@futurecalls.com', 'Voice and Contact Center', 'L&T', 'VBOX Shifting from Mumbai to Pune\r\n', 'On Hold', 'Medium', 'V231126', '2018-12-24 11:23:26', 'Waiting for customer confirmation\r\n', '2018-12-24 11:23:47'),
(48, 'rajakumar.r@futurecalls.com', 'Voice and Contact Center', 'L&T', 'OSP License\r\n', 'On Hold', 'Medium', 'V241137', '2018-12-24 11:24:37', 'Waiting for customer confirmation\r\n', '2018-12-24 11:24:54'),
(49, 'rajakumar.r@futurecalls.com', 'Voice and Contact Center', 'UHC', 'CR Email Rules\r\n', 'On Hold', 'Medium', 'V261147', '2018-12-24 11:26:47', 'Client confirmation pending..\r\n', '2018-12-24 11:27:24'),
(50, 'rajakumar.r@futurecalls.com', 'Voice and Contact Center', 'UHC', 'Banglore Site testing\r\n', 'On Hold', 'Medium', 'V281104', '2018-12-24 11:28:04', 'Need to demonstrate CTI less scenario to customer\r\n', '2018-12-24 11:28:24'),
(51, 'rajakumar.r@futurecalls.com', 'Voice and Contact Center', 'UHC', 'HDD change request \r\n', 'On Hold', 'Medium', 'V281149', '2018-12-24 11:28:49', 'Waiting for customer confirmation\r\n', '2018-12-24 11:29:20'),
(52, 'Sakthivel@futurecalls.com', 'Information Security', 'Universal Engineers', 'Antivirus- Sophos need to implement', 'Open', 'High', 'I251035', '2018-12-17 10:25:35', 'Anti-Virus installed successfully', '2019-01-08 09:52:25');

-- --------------------------------------------------------

--
-- Table structure for table `update_emaillead`
--

CREATE TABLE `update_emaillead` (
  `id` int(11) NOT NULL,
  `lead_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `update_emaillead`
--

INSERT INTO `update_emaillead` (`id`, `lead_id`, `email`, `subject`, `description`, `created_at`) VALUES
(1, '461114', 'veera@futurecalls.com', 'firewall requiremnt', 'can you share your mobile number', '2019-10-22 06:17:38'),
(2, '461114', 'veera@futurecalls.com', 'firewall requiremnt', 'tset', '2019-10-22 07:23:39'),
(3, '461114', 'veera@futurecalls.com', 'RE: [461114#]firewall requiremnt', 'Thank you for your reply\r\n\r\n \r\n\r\nFrom: veera@futurecalls.com <veera@futurecalls.com> \r\nSent: Tuesday, October 22, 2019 12:59 PM\r\nTo: \'helpdesk@futurecalls.com\' <helpdesk@futurecalls.com>\r\nSubject: [461114#]firewall requiremnt\r\n\r\n \r\n\r\nThank you\r\n\r\n \r\n\r\nFrom: helpdesk@futurecalls.com <mailto:helpdesk@futurecalls.com>\r\n<helpdesk@futurecalls.com <mailto:helpdesk@futurecalls.com> > \r\nSent: Tuesday, October 22, 2019 12:54 PM\r\nTo: veera@futurecalls.com <mailto:veera@futurecalls.com> \r\nSubject: [461114#]firewall requiremnt\r\n\r\n \r\n\r\nYour Lead id is  461114 \r\n\r\ntset\r\n\r\nThanks & Regards,\r\n\r\nFuturecalls Helpdesk Team\r\n\r\n', '2019-10-22 07:42:46'),
(4, '210228', 'manikandan@futurecalls.com', 'I need Cisco firewall', 'can you share your mobile number', '2019-10-23 09:02:42'),
(5, '200506', 'veera@futurecalls.com', 'firewall', 'can you share your mobile number', '2019-10-29 11:51:21'),
(6, '240519', 'veera@futurecalls.com', 'i need cisco', 'please can you share mobile number', '2019-10-29 11:56:47'),
(7, '240519', 'veera@futurecalls.com', 'RE: [240519#]i need cisco', '9xxxxxxxxxxx\r\n\r\n \r\n\r\nFrom: helpdesk@futurecalls.com <helpdesk@futurecalls.com> \r\nSent: Tuesday, October 29, 2019 5:27 PM\r\nTo: veera@futurecalls.com\r\nSubject: [240519#]i need cisco\r\n\r\n \r\n\r\nYour Lead id is  240519 \r\n\r\nplease can you share mobile number\r\n\r\nThanks & Regards,\r\n\r\nFuturecalls Helpdesk Team\r\n\r\n', '2019-10-29 11:57:23'),
(8, '240519', 'veera@futurecalls.com', 'i need cisco', 'sure sir', '2019-12-06 09:54:39'),
(9, '240519', 'veera@futurecalls.com', 'RE: [240519#]i need cisco', 'How much cost is it.\r\n\r\n \r\n\r\nFrom: helpdesk@futurecalls.com <helpdesk@futurecalls.com> \r\nSent: Friday, December 6, 2019 3:25 PM\r\nTo: veera@futurecalls.com\r\nSubject: [240519#]i need cisco\r\n\r\n \r\n\r\nYour Lead id is  240519 \r\n\r\nsure sir\r\n\r\nThanks & Regards,\r\n\r\nFuturecalls Helpdesk Team\r\n\r\n', '2019-12-06 09:57:42'),
(10, '', 'manikandan@futurecalls.com', 'Desktop', 'What kind of issue in your desktop', '2019-12-22 04:17:32'),
(11, '', 'manikandan@futurecalls.com', 'Desktop', 'kindly share your contact number', '2020-01-20 06:13:52');

-- --------------------------------------------------------

--
-- Table structure for table `update_status`
--

CREATE TABLE `update_status` (
  `id` int(10) NOT NULL,
  `clientID` varchar(255) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `number` varchar(250) DEFAULT NULL,
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
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `update_status`
--

INSERT INTO `update_status` (`id`, `clientID`, `email`, `number`, `subject`, `description`, `severity`, `ticketID`, `status`, `campaign_ID`, `process`, `assigned_to`, `action`, `created_date`, `updated_at`) VALUES
(1, 'TVS5604', NULL, NULL, 'campaign test', 'test ticket', 'P2', '291132', 'Open', 'Cam1705', '7', 'sakthivel@futurecalls.com', 'first update', '2019-06-26 11:29:32', '2019-06-28 12:36:41'),
(2, 'IRC5804', NULL, NULL, 'Test', 'test ticket', 'P2', '250316', 'Open', 'Cam1705', '4', 'sakthivel@futurecalls.com', 'first Update', '2019-06-26 15:25:16', '2019-06-29 10:28:03'),
(3, 'IRC5804', NULL, NULL, 'Test', 'test ticket', 'P2', '250316', 'Open', 'Cam1705', '4', 'sakthivel@futurecalls.com', 'second update', '2019-06-26 15:25:16', '2019-06-29 10:28:15'),
(4, 'The5311', NULL, NULL, 'Seqrite AV installation', 'Anti-Virus installation for Server and Client', 'P3', '191256', 'Open', '2', '10', 'sakthivel@futurecalls.com', 'AV installed and updated', '2019-07-31 23:49:57', '2019-08-04 21:18:57'),
(5, 'Cit1111', NULL, NULL, 'Branch care to DC', 'Branch care Instance need to be migrated to DC from DR.', 'P3', '180251', 'Open', '1', '2', '', 'Instance clone moved to DC and Host name changed and now they have installed Windows server patches and due to this system is not responding and we have requested them to un install the windows patches on the same.', '2019-08-08 01:48:52', '2019-08-08 01:50:26'),
(6, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '9843644039', 'Test Ticket', 'Test Ticket', 'P4', '490535', 'Open', '1', '2', 'akash.sachdev@futurecalls.com', 'Is this a test ticket ?', '2019-08-08 05:19:39', '2019-08-08 05:25:58'),
(7, 'Tir4111', 'testtetw@tirumala.com', '9843644039', 'Email Test', 'test mail', 'P4', '070646', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'test update', '2019-08-08 05:37:48', '2019-08-08 05:39:21'),
(8, 'Par2110', 'pra@ParsecTelesystems.com', '0077889955', 'Firewall', 'Firewall installation', 'P2', '281046', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'Firewall installation process is scheduled today', '2019-08-08 21:58:47', '2019-08-08 22:04:49'),
(9, 'Par2110', 'pra@ParsecTelesystems.com', '0077889955', 'Firewall', 'Firewall installation', 'P2', '281046', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'FW installed and 2 WAN are config and also one WAN need to enable in bridge mode', '2019-08-08 21:58:47', '2019-08-08 22:05:41'),
(10, 'Par2110', 'pra@ParsecTelesystems.com', '0077889955', 'Firewall', 'Firewall installation', 'P2', '281046', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'MAC filter is enabled for 2 users as A and B.....FW wed policies are placed still rules need to shape....waiting for client to conform the rule to block sites', '2019-08-08 21:58:47', '2019-08-08 22:07:47'),
(11, 'Par2110', 'pra@ParsecTelesystems.com', '0987654654', 'Firewall', 'Firewall phase 2 configuration', 'P2', '580941', 'Open', '2', '4', 'sakthivel@futurecalls.com', '1.	USERGROUP (User1) : Allow all websites except below web sites [ for MAC Ids of machines configured to this user group ]\r\nâ€¢	Naukri.com\r\nâ€¢	Job.com\r\nâ€¢	Gmail.com\r\nâ€¢	Yahoo.com\r\nâ€¢	Facebook.com\r\nâ€¢	Jabong.com\r\nâ€¢	Hotmail.com\r\nâ€¢	Amazon.com\r\nâ€¢	Flipkart.com\r\n\r\n2.	USERGROUP  (User2) : Block all web sites except below web sites [ for MAC Ids of machines configured to this user group ]\r\nâ€¢	Cisco.com\r\nâ€¢	Parsec-tech.com\r\nâ€¢	Bing.com\r\n\r\n3.	VPN Connectivity : Using a laptop outside our enterprise network we were able to download Sophos VPN client and connect to our network by entering the provided VPN user credentials \r\n\r\nPending rules and config need to check with the team and conform from client side\r\n\r\nNext session session scheduled on 14th Sep 2019', '2019-08-12 21:28:42', '2019-08-12 21:31:09'),
(12, 'Cit1111', 'helpdesk@futurecalls.com', '8939991513', 'Branch care to DC', 'Branch care Instance need to be migrated to DC from DR.', 'P3', '180251', 'Open', '1', '2', '', 'Instance is up and running, Supervisor alone is not working since there is an issue on IIS module we have requested CUB to reinstall IIS module to retry', '2019-08-08 01:48:52', '2019-08-13 02:57:11'),
(13, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'Hold - Screen Recording', 'Hold duration screen recording. (Please give ticket number to escalate)', 'P4', '110339', 'Open', '1', '2', 'sagar@futurecalls.com', 'As per Altitude Patch updated and issue under observation..', '2019-08-13 02:41:40', '2019-08-19 03:55:28'),
(14, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'System Down', 'RCA for system down.', 'P2', '250350', 'Open', '1', '2', 'sagar@futurecalls.com', 'From easy.log we can see the LMC process was not able to login to LMS, this means something went wrong with Altitude License Manager, usually the service is down. So in this situations the Contact Center is automatically shut down.\r\n\r\nMeeting Point has assign dedicated USB for license dongle to avoid such issue in future.', '2019-08-13 02:55:51', '2019-08-19 05:16:08'),
(15, 'Cit1111', 'helpdesk@futurecalls.com', '8939991513', 'Branch care to DC', 'Branch care Instance need to be migrated to DC from DR.', 'P3', '180251', 'Open', '1', '2', '', 'New server provided and today we have installed supervisor alone first to check if the old issue is resolved and tomorrow we will do all the remaining installation.', '2019-08-08 01:48:52', '2019-08-19 09:22:41'),
(16, 'Par2110', 'pra@ParsecTelesystems.com', '0987654654', 'Firewall', 'Firewall phase 2 configuration', 'P2', '580941', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'Phase 3 installation completed pending for VPN user details and policy shaping', '2019-08-12 21:28:42', '2019-08-20 01:37:08'),
(17, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'ER ANI', 'ER ANI not appering', 'P4', '040451', 'Open', '1', '2', 'akash.sachdev@futurecalls.com', 'Patch updated now showing ANI', '2019-08-13 03:34:52', '2019-08-20 02:44:48'),
(18, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '', 'Data consistency issue', 'Then handle time in the agent performance report, and mapping data are different. The average handle time of the floor differs by 1m23s in the two reports', 'P2', '180621', 'Open', '1', '2', 'prasad@futurecalls.com', 'Different dimension report cant match explained to the client.', '2019-08-13 05:48:23', '2019-08-20 03:34:42'),
(19, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'Sodexo_Mapping_Report', 'Sodexo_Mapping_Report \r\nCall key in CSAT campaign & Agent campaign is different most of the time. Altitude creates new call key in case of transfer call. Â But in few cases call key matches.(Need to Open Ticket)\r\nNo records in Tr_CSAT campaign. As per mee', 'P3', '510353', 'Open', '1', '2', 'prasad@futurecalls.com', 'Escalated to the meeting point. RQST00000173370', '2019-08-13 03:21:55', '2019-08-20 03:35:38'),
(20, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'Outbound campaign reports', 'Call status in Outbound campaign report .', 'P3', '480349', 'Open', '1', '2', 'prasad@futurecalls.com', 'Done changes proper.', '2019-08-13 03:18:51', '2019-08-20 03:36:52'),
(21, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'IVR script changes', 'IVR script changes for enqueue call & sudden holidays .', 'P2', '390356', 'Open', '1', '2', 'prasad@futurecalls.com', 'enqueue call Done/Holiday - Pending', '2019-08-13 03:09:57', '2019-08-20 03:40:46'),
(22, 'GRT1503', 'grt@gmail.com', '8801238822', 'Branch care to DC', 'test', 'P1', '400550', 'Open', '1', '1', 'pradeep@futurecalls.com', 'test action', '2019-08-20 05:10:52', '2019-08-20 05:19:19'),
(23, 'Cit1111', 'helpdesk@futurecalls.com', '8801238822', 'Email Test', 'test ticket', 'P2', '510557', 'Open', '1', '2', '', 'test action', '2019-08-20 05:21:58', '2019-08-20 05:29:17'),
(24, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'Eroor in Welcome message', 'Disturbance in Welcome message', 'P3', '220457', 'Hold', '1', '2', 'sagar@futurecalls.com', 'All the analyses shared with the customer and customer need to update on this.. this ticket keeping on hold.', '2019-08-13 03:52:58', '2019-08-20 08:56:19'),
(25, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'system down ( RQST00000174086)', 'system went down', 'P2', '200402', 'Esclate', '1', '2', 'sagar@futurecalls.com', 'Ticket Open with Meeting Point and shared required logs to analysis the issue. Waiting for the Update from the Meeting Point Team..', '2019-08-13 03:50:03', '2019-08-20 08:58:25'),
(26, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'RCA  system down ( RQST00000173816 )', 'RCA for system down', 'P2', '130400', 'Open', '1', '2', 'sagar@futurecalls.com', 'Duplicate ticket Open with same Request number so closing duplicate tickets.\r\n\r\nRCA  system down ( RQST00000173102 )', '2019-08-13 03:43:01', '2019-08-20 09:13:34'),
(27, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'RCA  system down ( RQST00000173816 )', 'RCA for system down', 'P2', '120459', 'Open', '1', '2', 'sagar@futurecalls.com', 'Duplicate ticket Open with same Request number so closing duplicate tickets.\r\n\r\nRCA  system down ( RQST00000173102 )', '2019-08-13 03:43:00', '2019-08-20 09:14:18'),
(28, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'RCA  system down ( RQST00000173816 )', 'RCA for system down', 'P2', '120445', 'Esclate', '1', '2', 'sagar@futurecalls.com', 'Ticket Open with the Meeting Point and shared the requested logs. R&D team is working on the issue and will update you and share the RCA once get confirmation from R&D Team.', '2019-08-13 03:42:46', '2019-08-20 09:17:56'),
(29, 'Hex0901', 'hexaware@futurecalls.com', '9653420360', 'Wrap time data issue', '6th August raw data that call wrap time is showing 77:02:42 which is incorrect and whereas as per the script time AHT should be 0:03:17.', 'P3', '381056', 'Open', '1', '2', 'sagar@futurecalls.com', 'Share the analysis with customer and inform to configure the shared memory.', '2019-08-19 22:08:57', '2019-08-20 09:33:03'),
(30, 'Hex0901', 'hexaware@futurecalls.com', '9653420360', 'Call abandon issue - V 7.5', 'calls were handled by agent but in report it concider as abandon', 'P3', '361004', 'Esclate', '1', '2', 'sagar@futurecalls.com', 'Generally agent name will highlight in from of abandoned call when there will be case of RONA(rotate on no answer & rotate on error).\r\n\r\nStill we are checking this issue with meeting Point to more clarity on this..', '2019-08-19 22:06:05', '2019-08-20 09:34:48'),
(31, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'not able to sign in altitude', 'Prabhat is not able to login in altitude.', 'P4', '130314', 'Open', '1', '2', 'prasad@futurecalls.com', 'A clean agent from supervisor', '2019-08-20 02:43:15', '2019-08-21 12:52:34'),
(32, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'Screen recording issue', 'Not all agent screen are recording', 'P2', '500536', 'Open', '1', '2', 'akash.sachdev@futurecalls.com', 'As updated by Prem that screen recording is not running iin there system', '2019-08-21 17:20:39', '2019-08-21 17:40:51'),
(33, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'Not able to login In altitude', 'Devendra is not able to login in Altitude Softphone', 'P3', '420527', 'Open', '1', '2', 'akash.sachdev@futurecalls.com', 'Need to reinstalled Altitude Softphone(salesforce website) due to antivirus is blocking and informed by Dinesh.. after that still he is not able is login and i found that altitude siphone application is not login', '2019-08-21 17:12:30', '2019-08-21 17:43:40'),
(34, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'unable to recording detail of  agents', 'Sundana Kadam is not able to see user login details', 'P3', '200604', 'Open', '1', '2', 'akash.sachdev@futurecalls.com', 'Inform to prem for resolution and raise ticket in meeting point', '2019-08-21 17:50:05', '2019-08-21 18:21:57'),
(35, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'unable to recording detail of  agents', 'Sundana Kadam is not able to see user login details', 'P3', '200604', 'Open', '1', '2', 'akash.sachdev@futurecalls.com', 'Meeting point TICKET: RQST00000175113. prem need sip standalone phones logs and event viewer but Madam is not available today', '2019-08-21 17:50:05', '2019-08-21 23:07:15'),
(36, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'Screen recording issue', 'Not all agent screen are recording', 'P2', '500536', 'Open', '1', '2', 'akash.sachdev@futurecalls.com', 'TICKET: RQST00000175109', '2019-08-21 17:20:39', '2019-08-21 23:11:23'),
(37, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'IVR script changes', 'IVR script changes for Reports', 'P2', '000430', 'Open', '1', '2', 'akash.sachdev@futurecalls.com', 'Saurabh to update. FLG before call unqiue', '2019-08-13 03:30:34', '2019-08-22 01:05:06'),
(38, 'Par2110', 'pra@ParsecTelesystems.com', '0987654654', 'Firewall', 'Firewall phase 2 configuration', 'P2', '580941', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'phase 4 config completed and some policies and rules are pending from fw also DSL2 network need to enbake bridge mode', '2019-08-12 21:28:42', '2019-08-22 07:46:13'),
(39, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'unable to recording detail of  agents', 'Sundana Kadam is not able to see user login details', 'P3', '200604', 'Open', '1', '2', 'akash.sachdev@futurecalls.com', 'User is able to view all screen record. Due to the wrong credential it show blank screen.', '2019-08-21 17:50:05', '2019-08-23 03:07:56'),
(40, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'Recording mismatch', 'Recording mismatch on recording retrieval. Meeting point ticket no. RQST00000175177', 'P3', '390525', 'Open', '1', '2', 'prasad@futurecalls.com', 'told the user to use superviosr for recording for recording mismatch.', '2019-08-22 05:09:27', '2019-08-23 21:43:52'),
(41, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'Hold time gape', 'Hold time gape in voice is trimmed . Meeting point ticket no. RQST00000175178', 'P4', '410501', 'Open', '1', '2', 'prasad@futurecalls.com', 'told the user access recording from supervisor and confirm.', '2019-08-22 05:11:05', '2019-08-23 21:44:46'),
(42, 'Cit1111', 'helpdesk@futurecalls.com', '8939991513', 'Branch care to DC', 'Branch care Instance need to be migrated to DC from DR.', 'P3', '180251', 'Open', '1', '2', 'suresh.j@futurecalls.com', 'We have informed customer to install windows patches up to date and still this has not pending and customer is facing some issues on windows patch update', '2019-08-08 01:48:52', '2019-08-25 22:51:58'),
(43, 'Par2110', 'pra@ParsecTelesystems.com', '0987654654', 'Firewall', 'Firewall phase 2 configuration', 'P2', '580941', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'pending config are all done rules checking are done by client side awaiting for client conformation', '2019-08-12 21:28:42', '2019-08-27 10:51:42'),
(44, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'Server memory Increase', 'Recording server memory increase . Decide schedule and implement .', 'P3', '280306', 'Hold', '1', '2', 'akash.sachdev@futurecalls.com', 'This will done during the server change activity.', '2019-08-13 02:58:07', '2019-08-30 16:09:14'),
(45, 'HLL2811', 'hblbio@hll.com', '0987654321', 'Firewall', 'Sophos XG firewall', 'P2', '301158', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'Firewall basic installation completed ans rules are created from their existing firewall fortinet also pending rules VPN and tunnel creation has to be done later....', '2019-09-18 11:31:01', '2019-09-18 11:39:32'),
(46, 'Par2110', 'pra@ParsecTelesystems.com', '0928765454', 'Firewall', 'Firewall VPN', 'P2', '430218', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'VPN tunnel creation need to create required details pending from client side', '2019-09-11 14:43:19', '2019-09-18 11:40:08'),
(47, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '9004036628', 'Not able to hear sound', 'In headset not able to hear sound (headset sound problem)', 'P4', '520903', 'Open', '1', '2', 'akash.sachdev@futurecalls.com', 'Prateek informed that -  For just single case you not need to make the system reboot, may be the customer is not in the good strength network zone you can not judge the system performance on the basis of the single call.\r\n\r\nJust like in our normal cellular mobile phone some time due to the low strength of the signal our voice not transmit properly sometimes dead air.\r\n\r\n \r\n\r\nSo next time please make a test call to check the issue and then let us know for further findings.', '2019-09-15 21:52:03', '2019-09-19 13:26:19'),
(48, 'Par2110', 'pra@ParsecTelesystems.com', '0928765454', 'Firewall', 'Firewall VPN', 'P2', '430218', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'VPN ipsec tunnel created connection status enabled its up', '2019-09-11 14:43:19', '2019-09-19 16:46:22'),
(49, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'unable to resume call', 'sachin mail - While retrieving call, call got disconnected but all icons on consillium where greyed out while retriving call 12:01pm.', 'P3', '200114', 'Open', '1', '2', 'akash.sachdev@futurecalls.com', 'Log shared with Prem on 13 sept 2019.', '2019-09-13 13:20:16', '2019-09-19 17:29:40'),
(50, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'Nandini is facing issue. for function button disable', 'Nandini report- that while on call, all function are disbale.. Screenshot attached .\r\n\r\nMeeting point ticket number- RQST00000176244', 'P3', '140450', 'Open', '1', '2', 'akash.sachdev@futurecalls.com', 'Prem inform to install wireshark on that system to check network connectivity. as i inform to Sodexo IT team.', '2019-09-17 16:14:53', '2019-09-19 17:32:02'),
(51, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'Rohit facing auto logout while transferring call to IVR', 'User report while is transferring to IVR it automatically logout  Timing in between 12.51 pm to 12.55 pm.\r\nPFA. And in screenshot recording is still working.', 'P4', '180136', 'Open', '1', '2', 'akash.sachdev@futurecalls.com', 'Prem inform to install wireshark on that system to check network connectivity. as i inform to Sodexo IT team.', '2019-09-18 13:18:37', '2019-09-19 17:32:18'),
(52, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7021755214', 'while altitude is logout still getting calls.', 'while Altitude is logout still get call. Timing between 12:56 pm.\r\nPlease find attachment.', 'P4', '190141', 'Open', '1', '2', 'akash.sachdev@futurecalls.com', 'Prem inform to install wireshark on that system to check network connectivity. as i inform to Sodexo IT team.', '2019-09-18 13:19:42', '2019-09-19 17:32:38'),
(53, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'IVR script changes', 'IVR script changes for Reports', 'P2', '000430', 'Hold', '1', '2', 'akash.sachdev@futurecalls.com', 'Script is ready. Implementation need down time, which will be completed during down time plan in future.', '2019-08-13 03:30:34', '2019-09-19 17:38:04'),
(54, 'Sod1411', 'Romi.BHATTACHARJEE@sodexo.com', '7829388299', 'System down ( RQST00000174348)', 'System Went down', 'P2', '240436', 'Hold', '1', '2', 'akash.sachdev@futurecalls.com', 'As per communicated with prem this is the bug and this will resolved in next patch, But currently no patch available for this issue.', '2019-08-13 03:54:37', '2019-09-19 17:40:19'),
(55, 'Par2110', 'pra@ParsecTelesystems.com', '0928765454', 'Firewall', 'Firewall VPN', 'P2', '430218', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'VPN tunnel is working client checked from USA and now connection establised through UDP ports need to enable TCP ports for further connection.......waiting for port number to TCP port enabling client side pending.....', '2019-09-11 14:43:19', '2019-09-24 11:55:22'),
(56, 'Tel2211', 'teleby@india.com', '0987654321', 'Security Assessment', 'Assessment report', 'P2', '241137', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'Assessment completed and reports and all network details analysed need to change settings in firewall and info sec awareness need to given to client', '2019-11-01 11:24:40', '2019-11-01 11:30:01'),
(57, 'The5311', 'preetham@thermalsystems.in', '6987654321', 'Network Monitoring & Server space', 'Space allocation', 'P2', '081007', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'Space allocated for all employees as 20GB and mapped in server as per the request', '2019-11-04 10:08:08', '2019-11-04 10:09:11'),
(58, 'AGS4310', 'ags@ags.inco', '0987654321', 'Acunetix PoC', 'Acunetix', 'P2', '541058', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'PoC awaiting for client to create VM instance in their end', '2019-11-06 10:54:59', '2019-11-06 11:03:48'),
(59, 'AGS4310', 'ags@ags.inco', '0987654321', 'Acunetix PoC', 'Acunetix', 'P2', '541058', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'PoC scheduled on 12 PM today', '2019-11-06 10:54:59', '2019-11-06 11:05:49'),
(60, 'Raj4711', 'rajesh.kupy@gmail.com', '0987654321', 'Access point, Firewall, Printer, ISP', 'home network setup', 'P2', '571005', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'Access point Hz increased and spped checked with all networks in all 4 floors 300mbps/8 total 40 mbps AP issue cleared', '2019-11-06 10:57:11', '2019-11-06 11:07:35'),
(61, 'Raj4711', 'rajesh.kupy@gmail.com', '0987654321', 'Access point, Firewall, Printer, ISP', 'home network setup', 'P2', '571005', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'Firewall rules are enabled to all AP and in all devices in home also enabled ports for IPCam, Door and bells policy entered in MAC based', '2019-11-06 10:57:11', '2019-11-06 11:08:45'),
(62, 'Raj4711', 'rajesh.kupy@gmail.com', '0987654321', 'Access point, Firewall, Printer, ISP', 'home network setup', 'P2', '571005', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'SSL VPN created in firewall and checked i its working client now using Open VPN for SSL VPN to access home network', '2019-11-06 10:57:11', '2019-11-06 11:10:03'),
(63, 'Raj4711', 'rajesh.kupy@gmail.com', '0987654321', 'Access point, Firewall, Printer, ISP', 'home network setup', 'P2', '571005', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'AWS instance need to create for customer to access AP enGenius console', '2019-11-06 10:57:11', '2019-11-06 11:10:35'),
(64, 'The5311', 'preetham@thermalsystems.in', '0987654321', 'AV Seqrite', 'AV installation', 'P2', '071057', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'AV installed in system need to update in console', '2019-11-19 10:07:58', '2019-11-19 10:09:27'),
(65, 'Uni4211', 'test@gmail.com', '0987654321', 'DELL server', 'Server installation', 'P2', '071012', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'DELL poweredge r540 server installed with RAID configuration as per the client requirement and HDD fixed in the server', '2019-11-19 10:07:12', '2019-11-19 10:10:31'),
(66, 'Uni4211', 'test@gmail.com', '0987654321', 'DELL server', 'Server installation', 'P2', '071012', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'HDD patching is mismatching in the server its not fixing up in the server need to check with vendor', '2019-11-19 10:07:12', '2019-11-19 10:11:11'),
(67, 'AGS4310', 'ags@ags.inco', '0987654321', 'Acunetix PoC', 'Acunetix', 'P1', '061001', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'Acunetix need to reinstall for ipaddress in link to acccesss the tool in local network', '2019-11-19 10:06:06', '2019-11-19 10:11:50'),
(68, 'SPI1410', 'spic@spi.com', '0987654321', 'AWS', 'AWS DR solution', 'P2', '201026', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'AWS DR set up with HANA large setup instance creation', '2019-11-27 10:20:27', '2019-11-27 10:22:22'),
(69, 'SPI1410', 'spic@spi.com', '0987654321', 'AWS', 'AWS DR solution', 'P2', '201026', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'meeting with client and discussed about the requirement....also requirement shared in mail by client', '2019-11-27 10:20:27', '2019-11-27 10:22:55'),
(70, 'SPI1410', 'spic@spi.com', '0987654321', 'AWS', 'AWS DR solution', 'P2', '201026', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'AWS first cut quote shared to client', '2019-11-27 10:20:27', '2019-11-27 10:24:50'),
(71, 'SPI1410', 'spic@spi.com', '0987654321', 'AWS', 'AWS DR solution', 'P2', '201026', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'Reworked in quote for DR AWS shared to client as per their requirement', '2019-11-27 10:20:27', '2019-11-27 10:25:23'),
(72, 'Cog1210', 'cog@innov.com', '0987654321', 'AWS_Gulam team', 'AWS instance', 'P2', '201004', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'AWS instance created and scheduled for PoC', '2019-11-27 10:20:04', '2019-11-27 10:26:08'),
(73, 'Cog1210', 'cog@innov.com', '0987654321', 'AWS_Gulam team', 'AWS instance', 'P2', '201004', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'instance created for APP and DB in same server', '2019-11-27 10:20:04', '2019-11-27 10:26:30'),
(74, 'Cog1210', 'cog@innov.com', '0987654321', 'AWS_Gulam team', 'AWS instance', 'P2', '201004', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'Recommended for separation in server so split in AWS console as APP and DB', '2019-11-27 10:20:04', '2019-11-27 10:27:00'),
(75, 'Cog1210', 'cog@innov.com', '0987654321', 'AWS_Gulam team', 'AWS instance', 'P2', '201004', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'required Port number and services are enabled as per client requirement', '2019-11-27 10:20:04', '2019-11-27 10:27:22'),
(76, 'Cog1210', 'cog@innov.com', '0987654321', 'AWS_Gulam team', 'AWS instance', 'P2', '201004', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'Client conformed PO and instance terminated and newly created as per app and DB server invidully with same network', '2019-11-27 10:20:04', '2019-11-27 10:28:38'),
(77, 'Cog1210', 'cog@innov.com', '0987654321', 'AWS_Gulam team', 'AWS instance', 'P2', '201004', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'FTP server and required  IIS are configured in win server 2016 all services a=enabled as per client request', '2019-11-27 10:20:04', '2019-11-27 10:31:04'),
(78, 'Cog1210', 'cog@innov.com', '0987654321', 'AWS_Gulam team', 'AWS instance', 'P2', '201004', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'Mail cant able to share from client CRM to their customer AWS blocking port 25 as request daily 200 mails ca share and pending are in queue', '2019-11-27 10:20:04', '2019-11-27 10:32:08'),
(79, 'Cog1210', 'cog@innov.com', '0987654321', 'AWS_Gulam team', 'AWS instance', 'P2', '201004', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'port 25 enabling request shared to AWS team and FTP through files not sharing error in filezilla from local to AWS server', '2019-11-27 10:20:04', '2019-11-27 10:34:23'),
(80, 'Cog1210', 'cog@innov.com', '0987654321', 'AWS_Gulam team', 'AWS instance', 'P2', '201004', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'file copying issue solved in filezilla now able to transfer files to AWS', '2019-11-27 10:20:04', '2019-11-27 10:34:55'),
(81, 'Cog1210', 'cog@innov.com', '0987654321', 'AWS_RAM team', 'AWS instance', 'P2', '191039', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'AWS instance created with APP and DB', '2019-11-27 10:19:40', '2019-11-27 10:42:20'),
(82, 'Cog1210', 'cog@innov.com', '0987654321', 'AWS_RAM team', 'AWS instance', 'P2', '191039', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'Server initiated with win server manger feature installed', '2019-11-27 10:19:40', '2019-11-27 10:43:53'),
(83, 'Mal1710', 'malles@const.com', '0987654321', 'Firewall and Antivirus', 'FW and AV', 'P2', '191016', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'Seqrite AV poC done with client and Sophos FW quote sent', '2019-11-27 10:19:16', '2019-11-27 10:45:10'),
(84, 'Mal1710', 'malles@const.com', '0987654321', 'Firewall and Antivirus', 'FW and AV', 'P2', '191016', 'Open', '2', '4', 'sakthivel@futurecalls.com', 'order conformed client going with AV and FW waiting for PO', '2019-11-27 10:19:16', '2019-11-27 10:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `update_websitelead`
--

CREATE TABLE `update_websitelead` (
  `id` int(11) NOT NULL,
  `lead_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `update_websitelead`
--

INSERT INTO `update_websitelead` (`id`, `lead_id`, `email`, `subject`, `description`, `created_at`) VALUES
(1, '020932', 'veeraiyan14@gmail.com', 'regarding requirement', 'Dear sir,\r\n\r\n    What kind of requirement you have can you tell me elabrately.\r\n\r\nRegards,\r\n\r\nRagu\r\nFuturecalls Technology', '2019-12-24 11:18:03');

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
  `flag` int(10) NOT NULL DEFAULT 0,
  `created_date` datetime DEFAULT current_timestamp(),
  `status` int(10) NOT NULL DEFAULT 1,
  `updated_at` timestamp NULL DEFAULT NULL,
  `login_status` varchar(250) NOT NULL DEFAULT '1',
  `image` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `resource`, `location`, `emp_id`, `username`, `email`, `name`, `number`, `role`, `password`, `flag`, `created_date`, `status`, `updated_at`, `login_status`, `image`) VALUES
(1, 'Internal User', 'remote', 'Address 1', NULL, 'santhiya', 'santhiya@futurecalls.com', 'Santhiya', '9843644039', 'Administrator', '$2y$10$HX1.xPIY7ctM3OedFcfEXew8WvAc6E3/j9EnP.qxH6FebcmRzp/aq', 1, '2019-03-29 10:57:51', 2, '2020-01-23 07:54:08', '1', NULL),
(2, 'Internal User', 'remote', 'Address 3', 'FC1005', 'sakthivel', 'sakthivel@futurecalls.com', 'Sakthivel', '9843644039', 'L3 support', '$2y$10$NUwiGPROodDOXnPM/GV2z.tLvMViIGNpzAPKf75YXfcuAPcqVcSI.', 1, '2019-04-08 12:56:03', 2, '2019-12-04 03:26:41', '1', NULL),
(3, 'Internal User', 'remote', 'Address 2', 'FC00103', 'Shahinsha', 'shahinsha@futurecalls.com', 'Shahinsha', '9845124578', 'Team leader', '$2y$10$d5xd1G0LXSJCe0y7WSOECeUGJ65EPt6bQ/zqkPRlveiwEqYEChaKm', 1, '2019-05-10 13:09:54', 2, '2020-01-28 04:49:54', '1', NULL),
(4, 'Internal User', 'remote', 'Address 1', '001', 'Amiyasagar', 'amiyasagar@futurecalls.com', 'Amiyasagar', '9999999999', 'Administrator', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-06-04 15:38:19', 2, '2019-07-30 11:24:23', '1', NULL),
(5, 'Internal User', 'remote', 'Chennai', 'Fc001456', 'Manikandan', 'manikandan@futurecalls.com', 'Manikandan.B', '9845612356', 'Super Admin', '$2y$10$Z25FH/X4dker.OkrTOU70eAn9KB5e7F/5U7LsWfehOli3W6oBkwYu', 1, '2019-06-18 15:32:08', 2, '2019-12-12 05:10:01', '1', NULL),
(6, 'Internal User', 'remote', 'Chennai', 'FC00103', 'Pradeep V.Nair', 'pradeep@futurecalls.com', 'Pradeep V.Nair', '9884246046', 'Team leader', '$2y$10$VSyHAITFLz1ULq9z8GmOMu7x.NNjiA3nRPagvCFksyjpn5dqUITRO', 0, '2019-06-20 14:19:13', 2, '2020-01-23 06:59:53', '1', NULL),
(7, 'TVS5604', '', 'Chennai', 'TVS1007', 'TVS Logistics', 'tvslogtest@gmail.com', 'TVS Logistics', '9845123658', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-06-25 17:01:08', 2, '2019-07-30 11:24:23', '1', NULL),
(8, 'IRC1603', '', 'Chennai', 'IRCS1004', 'IRCS', 'test@futurecalls.com', 'IRCS', '9884246046', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-06-25 17:03:52', 2, '2019-07-30 11:24:23', '1', NULL),
(9, 'Internal User', 'remote', 'Chennai', '188', 'Devakumar', 'devakumar@futurecalls.com', 'Devakumar', '9994178714', 'L3 support', '$2y$10$wMgqXTpqFKT3WePptChWKuDKfUykVnW8DFG0NyTUrYP61eEmqXksi', 1, '2019-07-17 22:56:31', 2, '2020-01-23 09:24:47', '1', NULL),
(10, 'Internal User', 'remote', 'Chennai', '203', 'SURESH JULURI', 'suresh.j@futurecalls.com', 'SURESH JULURI', '8939991513', 'Team leader', '$2y$10$XPNZQWgcLzmVjv6ZuOkIWeHeIkgvt9a223Ot7LRoVGxnjS8tKbJu2', 0, '2019-07-17 23:12:00', 2, '2020-01-27 06:39:36', '1', NULL),
(11, 'Internal User', 'remote', 'Chennai', '212', 'DILLI BABU G', 'dillibabu@futurecalls.com', 'DILLI BABU G', '9884154605', 'L3 support', '$2y$10$POb1jpmVfaXx.zPU8f6pDugNrwwxgiW0mqNxMSeaOb0nYd8rkVZxe', 0, '2019-07-17 23:13:09', 2, '2020-02-04 07:51:08', '1', NULL),
(12, 'Internal User', 'remote', 'Chennai', '252', 'KARTHIK R', 'karthik@futurecalls.com', 'KARTHIK R', '7904883593', 'L2 support', '$2y$10$My6jtT7LQHcKjjZVCYMgJ.rXfVlv6jrSe43KmGVDqfakoeWk1njHq', 0, '2019-07-17 23:15:40', 2, '2019-07-31 16:40:49', '1', NULL),
(13, 'Internal User', 'remote', 'Chennai', '304', 'KANNAN M', 'kannan@futurecalls.com', 'KANNAN M', '9999999999', 'L1 support', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-17 23:16:38', 2, '2019-07-30 11:24:23', '1', NULL),
(14, 'Internal User', 'remote', 'Chennai', '301', 'T VENGADESHWARAN', 'vengadeshwaran@futurecalls.com', 'T VENGADESHWARAN', '7339274140', 'L1 support', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-17 23:19:32', 2, '2019-07-30 11:24:23', '1', NULL),
(15, 'Internal User', 'remote', 'Chennai', '338', 'SUBRAT BEHERA', 'subrat@futurecalls.com', 'SUBRAT BEHERA', '8124356907', 'L1 support', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-17 23:25:37', 2, '2019-07-30 11:24:23', '1', NULL),
(16, 'Internal User', 'remote', 'Chennai', '349', 'THOMAS CHACKO', 'thomas@futurecalls.com', 'THOMAS CHACKO', '85479 38587', 'L1 support', '$2y$10$NDf3k5xmS9aLcRN2bqGCzOsDgtGiwchCtics5vEy5QiNbeWT1De8i', 0, '2019-07-17 23:27:35', 2, '2019-12-17 04:47:28', '1', NULL),
(17, 'Tir4111', '', 'Chennai', 'Thiru01', 'Tirumala Milk Pvt Ltd â€“ Sophos XG firewall', 'testtetw@tirumala.com', 'Tirumala Milk Pvt Ltd â€“ Sophos XG firewall', '8939811522', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-18 00:22:58', 2, '2019-07-30 11:24:23', '1', NULL),
(18, 'ISO4111', '', 'Chennai', 'IS002', 'ISOFT Pvt Ltd â€“ Fortinet Firewall', 'isoft@gmail.com', 'ISOFT Pvt Ltd â€“ Fortinet Firewall', '9164301284', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-18 00:26:51', 2, '2019-07-30 11:24:23', '1', NULL),
(19, 'Uni4211', '', 'Chennai', 'UE003', 'Universal Engineers Pvt Ltd â€“ Sophos XG firewall', 'test@gmail.com', 'Universal Engineers Pvt Ltd â€“ Sophos XG firewall', '8098521750', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-18 00:28:01', 2, '2019-07-30 11:24:23', '1', NULL),
(20, 'IGe4311', '', 'Chennai', 'IGE004', 'IGene Entertainment Services Private Limited - Fortinet Firewall', 'testtt@igeneindia.com', 'IGene Entertainment Services Private Limited - Fortinet Firewall', '9500070099', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-18 00:29:09', 2, '2019-07-30 11:24:23', '1', NULL),
(21, 'Alt4411', '', 'Chennai', 'AG005', 'Altacit Global â€“ Fortinet Firewall', 'test@altacit.com', 'Altacit Global â€“ Fortinet Firewall', '8608899958', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-18 00:30:10', 2, '2019-07-30 11:24:23', '1', NULL),
(22, 'Raj4711', '', 'Chennai', 'RH006', 'Rajesh Home', 'rajesh.kupy@gmail.com', 'Rajesh Home', '0987654321', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-18 00:30:59', 2, '2019-07-30 11:24:23', '1', NULL),
(23, 'SSS4811', '', 'Chennai', 'SSS007', 'SSSindia', 'testtt@sssindia.com', 'SSSindia', '9940067660', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-18 00:32:03', 2, '2019-07-30 11:24:23', '1', NULL),
(24, 'Int4911', '', 'Chennai', 'IGT008', 'Integratech', 'test1@gmail.com', 'Integratech', '9994993082', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-18 00:32:55', 2, '2019-07-30 11:24:23', '1', NULL),
(25, 'Hun4911', '', 'Chennai', 'HB009', 'Hunt and Badge', 'test@interviewdesk.in', 'Hunt and Badge', '8015102909', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-18 00:33:39', 2, '2019-07-30 11:24:23', '1', NULL),
(26, 'Sun5011', '', 'Chennai', 'SDT010', 'Sun Data Tech', 'test2@gmail.com', 'Sun Data Tech', '7826024290', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-18 00:34:46', 2, '2019-07-30 11:24:23', '1', NULL),
(27, 'Pra5111', '', 'Chennai', 'PBD011', 'Prabhat Dairy', 'test3@gmail.com', 'Prabhat Dairy', '9999999999', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-18 00:35:39', 2, '2019-07-30 11:24:23', '1', NULL),
(28, 'Uni5211', '', 'Chennai', 'UHC012', 'United Health Care', 'test4@gmail.com', 'United Health Care', '9999999999', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-18 00:36:30', 2, '2019-07-30 11:24:23', '1', NULL),
(29, 'The5311', '', 'Chennai', 'TSE013', 'Thermal Syatems and Engineering', 'preetham@thermalsystems.in', 'Thermal Syatems and Engineering', '9600199049', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-18 00:37:42', 2, '2019-07-30 11:24:23', '1', NULL),
(30, 'Sun5311', '', 'Chennai', 'SM014', 'Sun Motors', 'fm@sunmotorschennai.com', 'Sun Motors', '9710543125', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-18 00:38:28', 2, '2019-07-30 11:24:23', '1', NULL),
(31, 'Ste0911', '', 'Chennai', 'SHR016', 'Sterling Holidays', 'Sterlingholidays@gmail.com', 'Sterling Holidays', '9999999999', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-18 22:50:59', 2, '2019-07-30 11:24:23', '1', NULL),
(32, 'Fun1011', '', 'Chennai', 'funs017', 'Funds India', 'funs@gmail.com', 'Funds India', '9999999999', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-18 22:52:03', 2, '2019-07-30 11:24:23', '1', NULL),
(33, 'Cit1111', '', 'Chennai', 'CUB018', 'City Union Bank', 'helpdesk@futurecalls.com', 'City Union Bank', '9999999999', 'Customer', '$2y$10$tqHlwqHl9W3pdPDpODIwaun/y/xvoXMhsjMsG/ffP/Kn1mtrRUdd2', 1, '2019-07-18 22:53:39', 2, '2019-12-09 01:09:11', '1', NULL),
(34, 'LN1211', '', 'Chennai', 'lnt019', 'L&T Infotech', 'lnt@gmail.com', 'L&T Infotech', '9999999999', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-18 22:54:42', 2, '2019-07-30 11:24:23', '1', NULL),
(35, 'Inf1311', '', 'Chennai', 'Info020', 'Infosys CPC', 'infosyscpc@gmail.com', 'Infosys CPC', '9999999999', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-18 22:55:38', 2, '2019-07-30 11:24:23', '1', NULL),
(36, 'Inf1311', '', 'Chennai', 'Info021', 'Infosys TDS', 'infosystds@gmail.com', 'Infosys TDS', '9999999999', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-18 22:56:42', 2, '2019-07-30 11:24:23', '1', NULL),
(37, 'Inf1411', '', 'Chennai', 'Info022', 'Infosys MCA', 'infosymca@gmail.com', 'Infosys MCA', '9999999999', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-18 22:57:40', 2, '2019-07-30 11:24:23', '1', NULL),
(38, 'Sod1411', '', 'Chennai', 'Sodexo123', 'Romi', 'Romi.BHATTACHARJEE@sodexo.com', 'Romi', '7829388299', 'Customer', '$2y$10$8rHblCs6SZQYflA/iq5nW.OPxDA/.qxGGHgYCzbpxa4NkhMBDZ3b6', 1, '2019-07-18 22:58:30', 2, '2019-11-05 19:52:33', '1', NULL),
(39, 'Internal User', 'remote', 'Chennai', '054', 'Venkatesan M', 'Venkatesan@futurecalls.com', 'Venkatesan', '9999999999', 'Service Head', '$2y$10$dGb74aMgH3Agv8zV9BAz2O.6rvxMi./BgxPsLAM56GO8t2QqUEIYy', 0, '2019-07-22 00:03:58', 2, '2020-01-17 02:54:12', '1', NULL),
(40, 'Internal User', 'remote', 'Chennai', '056', 'sagar', 'sagar@futurecalls.com', 'sagar', '9999999999', 'L3 support', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-22 00:05:05', 2, '2019-07-30 11:24:23', '1', NULL),
(41, 'Tir4111', '', 'Chennai', 'test123', 'test1234', 'test123@gmail.com', 'test1234', '8745124578', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-22 03:43:21', 2, '2019-07-30 11:24:23', '1', NULL),
(42, 'Internal User', 'remote', 'Chennai', '0569', 'TAMILARASAN P', 'tamilarasan@futurecalls.com', 'TAMILARASAN P', '9999999999', 'Team leader', '$2y$10$Jhcl9VJs/vszYu4IBzrLEea6VJj3W/Ml5r7lRaocmLnSsm827Y1FK', 1, '2019-07-22 21:40:30', 2, '2020-02-02 14:52:49', '1', NULL),
(43, 'Rub5002', '', 'Chennai', 'ruby001', 'Ruby', 'ruby@gmail.com', 'Ruby', '9999999999', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-22 22:49:16', 2, '2019-07-30 11:24:23', '1', NULL),
(44, 'Gem0403', '', 'Chennai', 'gem002', 'Gem Hospital', 'gem@gmail.com', 'Gem Hospital', '9999999999', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-22 22:50:17', 2, '2019-07-30 11:24:23', '1', NULL),
(45, 'SRM1003', '', 'Chennai', 'srm003', 'SRM', 'srm@gmail.com', 'SRM', '9999999999', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-22 22:51:01', 2, '2019-07-30 11:24:23', '1', NULL),
(46, 'CGP1103', '', 'Chennai', 'cgp004', 'CGPolice', 'cgp@gmail.com', 'CGPolice', '9999999999``', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-22 22:52:13', 2, '2019-07-30 11:24:23', '1', NULL),
(47, 'VMC1203', '', 'Chennai', 'vmch005', 'VMCH', 'vmch@gmail.com', 'VMCH', '9999999999', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-22 22:53:11', 2, '2019-07-30 11:24:23', '1', NULL),
(48, 'Sta1303', '', 'Chennai', 'sdx009', 'Standex', 'standex@gmail.com', 'Standex', '9999999999', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-22 22:57:22', 2, '2019-07-30 11:24:23', '1', NULL),
(49, 'God1403', '', 'Chennai', 'god010', 'God Tv', 'godtv@gmail.com', 'God Tv', '9999999999', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-22 22:58:19', 2, '2019-07-30 11:24:23', '1', NULL),
(50, 'ABA1503', '', 'Chennai', 'aban012', 'ABAN', 'aban@gmail.com', 'ABAN', '9999999999', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-22 22:59:12', 2, '2019-07-30 11:24:23', '1', NULL),
(51, 'GRT1503', '', 'Chennai', 'grt0123', 'GRT', 'grt@gmail.com', 'GRT', '9999999999', 'Team leader', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-22 23:00:02', 2, '2019-07-30 11:24:23', '1', NULL),
(52, 'VSH1703', '', 'Chennai', 'vsh032', 'VS Hospital', 'vsh@gmail.com', 'VS HOSPITAL', '9999999999', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-22 23:00:51', 2, '2019-07-30 11:24:23', '1', NULL),
(53, 'Kum1803', '', 'Chennai', 'kum065', 'Kumaran Hospital', 'kumaran@gmail.com', 'Kumaran hospital', '9999999999', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-22 23:01:59', 2, '2019-07-30 11:24:23', '1', NULL),
(54, 'SUN1903', '', 'Chennai', 'sunny564', 'Sunny Soft', 'sunnysoft@gmail.com', 'SUNNY SOFT', '9999999999', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-22 23:03:09', 2, '2019-07-30 11:24:23', '1', NULL),
(55, 'Pan2103', '', 'Chennai', 'pec465', 'Panimalar', 'panimalar@gmail.com', 'Panimalar', '9999999999', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-22 23:04:22', 2, '2019-07-30 11:24:23', '1', NULL),
(56, 'Red3712', '', 'Chennai', 'red446', 'Redgrape', 'redgrape@gmail.com', 'Redgrape', '9999999999', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-22 23:05:14', 2, '2019-07-30 11:24:23', '1', NULL),
(57, 'Gan5312', '', 'Chennai', 'ganges64', 'Ganges', 'ganges@gmail.com', 'Ganges', '9999999999', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-22 23:06:16', 2, '2019-07-30 11:24:23', '1', NULL),
(58, 'Internal User', '', 'Chennai', '092', 'Jaganathan', 'tjaganathan@futurecalls.com', 'Jaganathan T', '9874563210', 'Sales Head', '$2y$10$IIU3czehC7DC7zYz8BWegOzYHZaPiUELpR2Ik5efzVdesEZoL.5lu', 1, '2019-07-23 22:48:44', 2, '2020-01-31 10:06:53', '1', NULL),
(59, 'Internal User', '', 'Chennai', 'Fc001456', 'Rajkumar.N', 'rajkumar.n@futurecalls.com', 'Rajkumar.N', '9176361054', 'Client Administrator', '$2y$10$i9K3ahOeN5ctOK4/Lme7.ucPKdWsufxrwVKoXlN2Z3wcoobnhz2BS', 0, '2019-07-23 23:39:17', 2, '2019-08-05 13:13:20', '1', NULL),
(60, 'Internal User', '', 'Chennai', '100', 'vijay rajagopalan', 'vijayr@futurecalls.com', 'vijayr', '8939991514', 'Administrator', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-24 00:21:31', 2, '2019-07-30 11:24:23', '1', NULL),
(61, 'Hex0901', '', 'Chennai', 'test123', 'Hexaware Technologies', 'hexaware@futurecalls.com', 'Hexaware Technologies', '9999999999', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-24 00:41:09', 2, '2019-07-30 11:24:23', '1', NULL),
(62, 'CAS1201', '', 'Chennai', 'test123', 'CASA GRAND', 'casagrand@gmail.com', 'CASA GRAND', '9999999999', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-24 00:43:48', 2, '2019-07-30 11:24:23', '1', NULL),
(63, 'Internal User', '', 'Chennai', 'FC00103', 'VEERA', 'veera@futurecalls.com', 'veeraiyan', '9845123658', 'Administrator', '$2y$10$brID.L5LvKl9x89i5Ym4GO1tSgFGYsuYhHO3qTrNafTmpXQZi9tVO', 0, '2019-07-24 22:15:01', 2, '2019-12-12 05:06:07', '1', NULL),
(64, 'Spa1801', '', 'Chennai', 'FC00103', 'Spark Capital', 'spark@gmail.com', 'Spark capital', '9845124578', 'Customer', '$2y$10$UYiRd1UQ.IBZl/pTAqcaLuBn7vwKc/TsAHZfN90fTCjuuaw8eoDSm', 0, '2019-07-26 00:54:32', 2, '2019-07-30 11:24:23', '1', NULL),
(65, 'IFC1010', '', 'Chennai', '878687', 'IFCI', 'gopl@ifci.com', 'IFCI', '6987654321', 'Customer', '$2y$10$52adtj7zSWvFWUxC54AryOQE6M0rqTDVivFXB5sT9vHA.9g/hvlZW', 0, '2019-07-29 21:50:30', 1, NULL, '1', NULL),
(66, 'Shr0604', '', 'Chennai', '1104', 'Shriram Value', 'sriramvalue@gmail.com', 'Shriram Value', '9999999999', 'Customer', '$2y$10$kBS8FthNGG31NDGCrxGJa.KDXggK8rxqoTgqU1teiKj/8w28UsuqC', 0, '2019-07-30 02:32:30', 1, NULL, '1', NULL),
(67, 'viv0011', '', 'Chennai', '007', 'viveks', 'caroline@viveks.com', 'viveks', '7358332211', 'Customer', '$2y$10$9NyCdEaaqoqDP88W6ZtgAu249nJgVm.GKGB5qcCjLem6fSc5Yy4Z2', 0, '2019-07-30 22:36:07', 1, NULL, '1', NULL),
(68, 'Fut5012', '', 'Chennai', '2345', 'shahinsha@futurecalls.com', 'Future@futurecalls.com', 'Futurecalls', '0987654654', 'Customer', '$2y$10$BiqMZMc2tFyoo1syKGcqjOOd17Vqm8I8Lro61gofDRmBGCflhukle', 0, '2019-08-01 00:33:52', 1, NULL, '1', NULL),
(69, 'Internal User', '', 'Chennai', 'Prasad', 'Prasad Gatkal', 'prasad@futurecalls.com', 'Prasad Gatkal', '9004036628', 'L1 support', '$2y$10$1aN1LL91ZSMGl4euhpeNzeiUsn9gQgSVqomHoeWFx/EYegQu.yjye', 1, '2019-08-08 01:54:54', 2, '2019-10-31 05:31:46', '1', NULL),
(70, 'Internal User', '', 'Chennai', 'FC1005', 'Akash', 'akash.sachdev@futurecalls.com', 'Akash', '9999999999', 'L2 support', '$2y$10$1dh.OBHOckCI1hqlykRPyeapNFILkA8bKnaD6HuaIpCbPtNCsa.UG', 1, '2019-08-08 04:32:02', 2, '2019-12-22 23:31:36', '1', NULL),
(71, 'Par2110', '', 'Chennai', '765', 'shahinsha@futurecalls.com', 'pra@ParsecTelesystems.com', 'Pranjol', '0077889955', 'Customer', '$2y$10$5oEiXcYEdigxYq4zohO1hOCXiGhBZpLD2eYg6Zr15V7o0foPY/qjS', 0, '2019-08-08 21:53:08', 1, NULL, '1', NULL),
(72, 'Internal User', '', 'Chennai', 'Demo001', 'Demo', 'service@futurecalls.com', 'Demo', '999999999', 'Service Head', '$2y$10$973PdmWlZKAyJ3SSh1vzWuKlTHmUIeelXfCGClVEyTzibpdCxnFTC', 0, '2019-08-11 21:56:44', 2, '2019-12-24 00:52:07', '1', NULL),
(73, 'Hex0901', '', 'Chennai', 'FC00103', 'Ganesh Y', 'GaneshY@hexaware.com', 'Ganesh Y', '9999999999', 'Customer', '$2y$10$EDiRoKSPq95sqgLPGIpLauCVHqkHiXK7k3mPSZWooGd8ODTFgCBzW', 1, '2019-08-20 01:29:28', 1, NULL, '1', NULL),
(74, 'Shr1511', '', 'Chennai', '657', 'shahinsha@futurecalls.com', 'rag@shriram.com', 'Raghu', '0987654321', 'Customer', '$2y$10$wmPJm2AJx88RI/wto/cV5O01AlRqzNFY6biEYbe8b./ha7drjR0fi', 0, '2019-08-31 11:17:18', 1, NULL, '1', NULL),
(75, 'Wat1811', '', 'Chennai', '9876', 'shahinsha@futurecalls.com', 'wat@watan.com', 'Sundar', '0986578908', 'Customer', '$2y$10$oxlvj2y2MOuf15Dwx4n36ODWVl1SpEEa4ovHmNuS6lcMo3OrC3Cxy', 0, '2019-08-31 11:19:42', 1, NULL, '1', NULL),
(76, 'HLL2811', '', 'Chennai', '868976', 'shahinsha@futurecalls.com', 'hblbio@hll.com', 'Njandhan', '0987654321', 'Customer', '$2y$10$NX/S85pLI0PviN9n2fG3f.0Hi5nxkqnBbfWbri7l0k9Rfa7FV3rqW', 0, '2019-09-18 11:30:15', 1, NULL, '1', NULL),
(77, 'Int1811', '', 'Chennai', '9798', 'Integra', 'int@ontgrsift.com', 'Integra', '0987654321', 'Customer', '$2y$10$sfkGHJY4HhIZTAno6Lt0/O0MllXFEVzOG4mrElhK6y.e8nBIy78G.', 0, '2019-11-01 11:20:12', 1, NULL, '1', NULL),
(78, 'Tel2211', '', 'Chennai', '08907', 'Telebuy', 'teleby@india.com', 'Telebuy', '0987654321', 'Customer', '$2y$10$wCuOx8xJza2NN5M2wmUohOeTHJnrr.8cg/cRFsZPxyXxusOtCMTfe', 0, '2019-11-01 11:24:03', 1, NULL, '1', NULL),
(79, 'AGS4310', '', 'Chennai', '876', 'bala', 'ags@ags.inco', 'bala', '0987654321', 'Customer', '$2y$10$GcMPQgv0SbJCUWF/UEHUSOd5QXYZTZCyBzOnk55b/Ig77nrbEJnzy', 0, '2019-11-06 10:44:39', 1, NULL, '1', NULL),
(80, 'New0804', '', 'Chennai', '7647', 'Satya', 'new@horixo.com', 'Satya', '0987654321', 'Customer', '$2y$10$SxQfpjPdtdtkKX7oGDEMhuKgpOtft3agPCdZVmhCSijWyKohbrhRW', 0, '2019-11-06 16:09:51', 1, NULL, '1', NULL),
(81, 'Internal User', '', 'Chennai', '0122', 'Mazhar Khan', 'mazhar@futurecalls.com', 'Mazhar Khan', '9999999999', 'Account Manager', '$2y$10$bBXXG5kILKNfjYag6c67O.Cty7u5z78iaNgXJ80J/30JI8NPI7CZO', 1, '2019-11-13 15:00:56', 2, '2020-02-06 12:21:24', '1', NULL),
(82, 'Cog1210', '', 'Chennai', '986', 'gulam', 'cog@innov.com', 'gulam', '0987654321', 'Customer', '$2y$10$EwixSJZ4U8EjeJhA7MFAJO3f8m0mQeALSdlheFBDGFV2dk3Eo4THu', 0, '2019-11-27 10:13:25', 1, NULL, '1', NULL),
(83, 'SPI1410', '', 'Chennai', '76576', 'Rajagopalan', 'spic@spi.com', 'Rajagopalan', '0987654321', 'Customer', '$2y$10$wlBLchC/MAqOg94N/I7aHeYNC2Fb67KAJTu/FAOzVgFn/eDYKlPe.', 0, '2019-11-27 10:15:26', 1, NULL, '1', NULL),
(84, 'Mal1710', '', 'Chennai', '76587', 'xxx', 'malles@const.com', 'xxx', '0987654321', 'Customer', '$2y$10$bDKwYKM1RkoV7lhoAgXIGuCDqwd1YLjwPk454s8WzRd6ailhTgmsu', 0, '2019-11-27 10:17:44', 1, NULL, '1', NULL),
(85, 'Internal User', '', 'Chennai', 'EMP008', 'Vijay.R', 'admin@futurecalls.com', 'Vijay.R', '9500028429', 'Sales Head', '$2y$10$IH1E2dQTdd8.foOZPDmPbeh7AS0g5KiCjn/uTD/Z7MAsUsVkrAIAS', 1, '2020-01-23 12:16:08', 2, '2020-01-23 07:22:24', '1', NULL),
(86, 'Internal User', '', 'Chennai', 'EMP009', 'Vijaybalaji.V', 'vijaybalaji@futurecalls.com', 'Vijaybalaji', '9841522439', 'Account Manager', '$2y$10$GLDbHGVInbPaGv2wIIF7DeHoAeGClYC/1VD.AVP4haUMhc5d4zeUy', 1, '2020-01-23 12:18:06', 2, '2020-01-23 07:40:21', '1', NULL),
(87, 'Internal User', '', 'Chennai', 'EMP010', 'Guruprasath', 'guruprasath@futurecalls.com', 'Guru', '9898989898', 'Account Manager', '$2y$10$c5khZpwrnVSeGXiHKJcybu6BPP39WkKEI7QDU8XdDPDl/BhwJ3nfK', 1, '2020-01-23 12:19:27', 2, '2020-01-23 07:45:33', '1', NULL),
(88, 'Internal User', '', 'Chennai', 'EMP011', 'Ramya', 'ramya@futurecalls.com', 'Ramya', '9595959595', 'Account Manager', '$2y$10$hkqbwgRnJMC.TJ5b9R.O1.jM44NWt5Zg0KBaxLs3xK8KmgMsXUmg.', 0, '2020-01-23 12:21:10', 2, '2020-02-05 05:08:26', '1', NULL),
(89, 'Internal User', '', 'Chennai', 'EMP012', 'Subhash.V', 'subhashv@futurecalls.com', 'Subhash.V', '9494949494', 'Account Manager', '$2y$10$ws2XoY9HXptwtRKWlgJXHO1iHcaMU16GVfuanFBgSds3YWYLu3lDW', 1, '2020-01-23 15:31:20', 2, '2020-01-29 03:05:24', '1', NULL),
(90, 'Internal User', '', 'Chennai', 'EMP013', 'Chaviram', 'chaviram@futurecalls.com', 'Chaviram', '9393939393', 'Account Manager', '$2y$10$FP4rrNc3aXVkHlQqRnKLauNhTvJR9FeJrORqptdaGYdqJX0UIycJ2', 0, '2020-01-23 15:33:19', 1, NULL, '1', NULL),
(91, 'Internal User', '', 'Chennai', '0091', 'Sales Admin', 'salesadmin@futurecalls.com', 'Sales Admin', '9876543210', 'Sales Admin', '$2y$10$oDwLtbNq9n/8jjKByUg9mONWdPHSa2.8uG5yh4bFJIHtEGMISx0zC', 0, '2020-01-24 10:16:58', 2, '2020-01-24 04:47:13', '1', NULL),
(92, 'Internal User', '', 'Chennai', '112', 'Aruljothi', 'aruljothi@futurecalls.com', 'Aruljothi', '9841522499', 'Account Manager', '$2y$10$vJKsYWZOCDVE8euNZXljceswvJ8ouZKIip8t3DjyqxgP1mP4hu/1G', 0, '2020-01-24 11:15:45', 2, '2020-01-24 05:46:19', '1', NULL),
(93, 'Fut5012', '', 'Chennai', 'EMP_001', 'yuvasri', 'yuvasriravi1997@gmail.com', 'yuvasri', '9789890068', 'Administrator', '$2y$10$DvKpCvChv8Bwmd8xQzi94ukELZcJH.cv2WT.LFPx4N/99Rd03OXVa', 1, '2020-02-04 11:08:10', 2, '2020-02-04 05:39:40', '1', NULL),
(94, 'Internal User', '', 'Chennai', 'EMP008', 'Ramya', 'ramya11@futurecalls.com', 'Ramya', '9845254181', 'Telecaller', '$2y$10$CmkLFFr.vTWs0SLWkHHEWezq10IHPROBKZXN4wUFxmXCNxDupvB2u', 0, '2020-02-05 10:47:32', 2, '2020-02-05 05:17:52', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vertical_master`
--

CREATE TABLE `vertical_master` (
  `id` int(11) NOT NULL,
  `verticalname` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vertical_master`
--

INSERT INTO `vertical_master` (`id`, `verticalname`, `created_at`) VALUES
(1, 'Voice & Contact Center', '2020-01-20 05:08:13'),
(2, 'Networking', '2020-01-20 05:09:25'),
(3, 'Information Security', '2020-01-20 05:09:44'),
(4, 'FTOSS', '2020-01-20 05:10:00'),
(5, 'Managed Telecom', '2020-01-20 05:10:09'),
(6, 'iSPARK', '2020-01-20 05:10:22'),
(7, 'Others', '2020-01-20 05:10:27');

-- --------------------------------------------------------

--
-- Table structure for table `vertical_target`
--

CREATE TABLE `vertical_target` (
  `id` int(11) NOT NULL,
  `verticals` varchar(255) NOT NULL,
  `q1targetamount` varchar(255) NOT NULL,
  `q2targetamount` varchar(255) NOT NULL,
  `q3targetamount` varchar(255) NOT NULL,
  `q4targetamount` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `violations`
--

CREATE TABLE `violations` (
  `id` int(10) NOT NULL,
  `ticketID` varchar(250) DEFAULT NULL,
  `l1_time` datetime DEFAULT NULL,
  `l2_time` datetime DEFAULT NULL,
  `l3_time` datetime DEFAULT NULL,
  `l4_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `website_lead`
--

CREATE TABLE `website_lead` (
  `id` int(11) NOT NULL,
  `lead_id` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `customername` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `customeraddress` varchar(500) NOT NULL,
  `leadsource` varchar(255) NOT NULL,
  `assignee` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `flag` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `website_lead`
--

INSERT INTO `website_lead` (`id`, `lead_id`, `mobile`, `customername`, `email`, `customeraddress`, `leadsource`, `assignee`, `status`, `created_at`, `flag`) VALUES
(1, '020932', '87676565454', 'joseph', 'veeraiyan14@gmail.com', 'velachery', 'Website', 'ragu@futurecalls.com', 'Open', '2019-12-21 21:02:34', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actiontaken`
--
ALTER TABLE `actiontaken`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent_master`
--
ALTER TABLE `agent_master`
  ADD PRIMARY KEY (`agent_id`);

--
-- Indexes for table `amc_master`
--
ALTER TABLE `amc_master`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `closedtickets`
--
ALTER TABLE `closedtickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `closed_lead`
--
ALTER TABLE `closed_lead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_feedback`
--
ALTER TABLE `customer_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drop_lead`
--
ALTER TABLE `drop_lead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_campaign`
--
ALTER TABLE `email_campaign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_leads`
--
ALTER TABLE `email_leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `encryption_test`
--
ALTER TABLE `encryption_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `escalation_master`
--
ALTER TABLE `escalation_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `individualtarget`
--
ALTER TABLE `individualtarget`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `industry`
--
ALTER TABLE `industry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knowledge_base`
--
ALTER TABLE `knowledge_base`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead`
--
ALTER TABLE `lead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_update`
--
ALTER TABLE `lead_update`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loginhistory`
--
ALTER TABLE `loginhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lost_lead`
--
ALTER TABLE `lost_lead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `management_info`
--
ALTER TABLE `management_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetinginfo`
--
ALTER TABLE `meetinginfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mom_master`
--
ALTER TABLE `mom_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_master`
--
ALTER TABLE `notification_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oem_master`
--
ALTER TABLE `oem_master`
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
-- Indexes for table `outbound_lead`
--
ALTER TABLE `outbound_lead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_temp`
--
ALTER TABLE `password_reset_temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postponed_lead`
--
ALTER TABLE `postponed_lead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_master`
--
ALTER TABLE `product_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quatation_master`
--
ALTER TABLE `quatation_master`
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
-- Indexes for table `tempsms`
--
ALTER TABLE `tempsms`
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
-- Indexes for table `update_emaillead`
--
ALTER TABLE `update_emaillead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `update_status`
--
ALTER TABLE `update_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `update_websitelead`
--
ALTER TABLE `update_websitelead`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vertical_master`
--
ALTER TABLE `vertical_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vertical_target`
--
ALTER TABLE `vertical_target`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `violations`
--
ALTER TABLE `violations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_lead`
--
ALTER TABLE `website_lead`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent_master`
--
ALTER TABLE `agent_master`
  MODIFY `agent_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `amc_master`
--
ALTER TABLE `amc_master`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `campaign_client`
--
ALTER TABLE `campaign_client`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `campaign_master`
--
ALTER TABLE `campaign_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `campaign_service`
--
ALTER TABLE `campaign_service`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `client_location`
--
ALTER TABLE `client_location`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `client_master`
--
ALTER TABLE `client_master`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `client_service`
--
ALTER TABLE `client_service`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `closedtickets`
--
ALTER TABLE `closedtickets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `closed_lead`
--
ALTER TABLE `closed_lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `customer_feedback`
--
ALTER TABLE `customer_feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drop_lead`
--
ALTER TABLE `drop_lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_campaign`
--
ALTER TABLE `email_campaign`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `email_leads`
--
ALTER TABLE `email_leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `encryption_test`
--
ALTER TABLE `encryption_test`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `escalation_master`
--
ALTER TABLE `escalation_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `individualtarget`
--
ALTER TABLE `individualtarget`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `industry`
--
ALTER TABLE `industry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `knowledge_base`
--
ALTER TABLE `knowledge_base`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lead`
--
ALTER TABLE `lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=324;

--
-- AUTO_INCREMENT for table `lead_update`
--
ALTER TABLE `lead_update`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `loginhistory`
--
ALTER TABLE `loginhistory`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=456;

--
-- AUTO_INCREMENT for table `lost_lead`
--
ALTER TABLE `lost_lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `management_info`
--
ALTER TABLE `management_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meetinginfo`
--
ALTER TABLE `meetinginfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `mom_master`
--
ALTER TABLE `mom_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notification_master`
--
ALTER TABLE `notification_master`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `oem_master`
--
ALTER TABLE `oem_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `outbound_campaign`
--
ALTER TABLE `outbound_campaign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `outbound_history`
--
ALTER TABLE `outbound_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `outbound_lead`
--
ALTER TABLE `outbound_lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `password_reset_temp`
--
ALTER TABLE `password_reset_temp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `postponed_lead`
--
ALTER TABLE `postponed_lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_master`
--
ALTER TABLE `product_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `quatation_master`
--
ALTER TABLE `quatation_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rolebased_user`
--
ALTER TABLE `rolebased_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `role_master`
--
ALTER TABLE `role_master`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `service_master`
--
ALTER TABLE `service_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sla_config`
--
ALTER TABLE `sla_config`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- AUTO_INCREMENT for table `sla_master`
--
ALTER TABLE `sla_master`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- AUTO_INCREMENT for table `tempsms`
--
ALTER TABLE `tempsms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `update_emaillead`
--
ALTER TABLE `update_emaillead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `update_status`
--
ALTER TABLE `update_status`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `update_websitelead`
--
ALTER TABLE `update_websitelead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `vertical_master`
--
ALTER TABLE `vertical_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vertical_target`
--
ALTER TABLE `vertical_target`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `violations`
--
ALTER TABLE `violations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `website_lead`
--
ALTER TABLE `website_lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
