-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2020 at 01:19 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(5, '2', 'sakthivel@futurecalls.com', 'L1 support'),
(6, '2', 'shahinsha@futurecalls.com', 'Team leader'),
(7, '3', 'karthik@futurecalls.com', 'L2 support'),
(8, '3', 'vengadeshwaran@futurecalls.com', 'L1 support'),
(9, '4', 'santhiya@futurecalls.com', 'Administrator'),
(10, '4', 'manikandan@futurecalls.com', 'Super Admin'),
(11, '6', 'sakthivel@futurecalls.com', 'L1 support'),
(13, '6', 'manikandan@futurecalls.com', 'Super Admin'),
(15, '6', 'devakumar@futurecalls.com', 'L3 support'),
(17, '6', 'dillibabu@futurecalls.com', 'L3 support'),
(18, '6', 'karthik@futurecalls.com', 'L2 support'),
(19, '6', 'vengadeshwaran@futurecalls.com', 'L1 support'),
(20, '6', 'venkatesan@futurecalls.com', 'Service Head');

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
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `amc_master`
--

INSERT INTO `amc_master` (`id`, `clientname`, `client_ID`, `contact_person`, `number`, `email`, `vertical`, `oem`, `product`, `ordervalue`, `start_date`, `end_date`, `accountmanager`, `created_at`) VALUES
(1, 'manikandan & co', 'man5405', 'manikandan', '8778787743', 'manikandan@futurecalls.com', '2', '1', 'Cable', '10000', '2020-01-17', '2020-01-20', 'vijaybalaji@futurecalls.com', '2020-01-17 17:54:58');

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
  `email` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `campaign_master`
--

INSERT INTO `campaign_master` (`id`, `campaigntype`, `campaignID`, `callscript`, `campaignname`, `campaigndescrip`, `modeofcomm`, `email`, `created_at`) VALUES
(1, 'Inbound', 'Con4905', NULL, 'Contact Center', 'contact center department', 'email,oncall', 'helpdesk@futurecalls.com', '2019-12-06 06:07:30'),
(2, 'Inbound', 'Inf5005', NULL, 'Information Security', 'information security', 'email,oncall', 'santhiya@futurecalls.com', '2019-12-09 10:34:24'),
(3, 'Inbound', 'Net5105', NULL, 'Network and Data', 'networking', 'email,oncall', 'veera1@futurecalls.com', '2019-12-20 13:22:18'),
(4, 'Inbound', 'FTO5105', NULL, 'Software', 'crm support', 'email,oncall', 'manikandan@futurecalls.com', '2019-12-06 06:08:17'),
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
  `created` datetime DEFAULT CURRENT_TIMESTAMP
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
(26, '1', 10, 'others', '2019-11-28 16:27:31'),
(27, '4', 8, 'software support', '2019-12-06 12:57:17'),
(28, '6', 11, 'sms support', '2019-12-20 19:05:24');

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
(16, 'Funds India', 'Fun1011', 'Funds India', '7358650128', '2019-07-19', '2020-02-29', '24/7', 'remote', '', '2019-07-19 05:40:28'),
(17, 'City Union Bank', 'Cit1111', 'CUB', '9843644039', '2019-07-01', '2020-05-30', '24/7', 'remote', '', '2019-07-19 05:41:02'),
(24, 'Gem Hospital', 'Gem0403', 'Gem Hospital', '9787141830', '2019-07-24', '2020-04-24', '24/7', 'remote', '', '2019-07-19 09:34:43'),
(41, 'GRT Jwellers', 'GRT3712', 'Mr. Kathiresan', '7825888824', '2019-12-06', '2020-06-30', '24/7', '', '', '2019-12-06 07:07:46');

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
(19, 'Fun0504', 'Altitude Support', 2, '2019-07-02 16:05:37'),
(72, 'Cit1111', 'Altitude Support', 2, '2019-12-06 12:33:14'),
(73, 'Fun1011', 'Altitude Support', 2, '2019-12-06 12:34:13'),
(76, 'GRT3712', 'Avaya Support', 1, '2019-12-06 12:37:46'),
(77, 'GRT3712', 'software support', 8, '2019-12-06 12:37:46'),
(78, 'Gem0403', 'Avaya Support', 1, '2019-12-06 12:48:25'),
(79, 'Gem0403', 'Network Support', 3, '2019-12-06 12:48:25');

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
  `closing_status` int(10) NOT NULL DEFAULT '0',
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

INSERT INTO `closedtickets` (`id`, `clientID`, `email`, `number`, `subject`, `description`, `severity`, `ticketID`, `status`, `closing_status`, `campaign_ID`, `process`, `assigned_to`, `action`, `created_date`, `closed_at`) VALUES
(1, 'Cit1111', 'sandigopalan@gmail.com', '9843644039', 'Mobile number validation test', 'mobile number validation', 'P2', '280602', 'Close', 1, '1', '2', 'Not Assigned', 'issue resolved', '2019-12-06 18:28:05', '2019-12-09 10:17:22'),
(2, 'Cit1111', 'sandigopalan@gmail.com', '9843644039', 'outbound not working', 'outbound not working', 'P4', '141040', 'Close', 2, '1', '2', 'dillibabu@futurecalls.com', 'issue resolved', '2019-12-09 10:14:50', '2019-12-09 10:28:05'),
(3, 'Cit1111', 'sandigopalan@gmail.com', '9843644039', 'outbound not working', 'outbound not working', 'P4', '141040', 'Close', 2, '1', '2', 'dillibabu@futurecalls.com', 'issue resolved', '2019-12-09 10:14:50', '2019-12-09 10:38:20'),
(4, 'GRT3712', 'kathiresun.vr@gmail.com', '7825888824', 'Unable to print of invoice', 'Hi Team,\r\n\r\nUnable to print of invoice\r\n\r\n\r\nRegards,\r\nKathiresan.V', 'P2', '011152', 'Close', 2, '1', '1', 'dillibabu@futurecalls.com', 'issue resolved', '2019-12-09 11:01:54', '2019-12-09 11:50:35'),
(5, 'Cit1111', 'sandigopalan@gmail.com', '9843644039', 'On call Ticket', 'On call ticket Test', 'P2', '111226', 'Close', 1, '1', '2', 'Not Assigned', 'fhgjhfgj', '2019-12-09 12:11:27', '2019-12-10 17:27:19'),
(6, 'Cit1111', 'sandigopalan@gmail.com', '9843644039', 'On call Ticket', 'On call ticket Test', 'P2', '111226', 'Close', 1, '1', '2', 'Not Assigned', 'fgjmnfgj', '2019-12-09 12:11:27', '2019-12-10 17:29:56'),
(7, 'Cit1111', 'sandigopalan@gmail.com', '8776767676', 'testing mail for notification', 'please ignore this mail', 'P2', '330437', 'Close', 2, '1', '2', 'pradeep@futurecalls.com', 'issue resolved', '2019-12-11 16:34:02', '2019-12-19 16:39:25');

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
  `status` varchar(255) NOT NULL,
  `assignee` varchar(255) NOT NULL,
  `closure_value` varchar(250) DEFAULT NULL,
  `payment_mode` varchar(250) DEFAULT NULL,
  `service_customer` varchar(250) DEFAULT NULL,
  `closed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_status` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `closed_lead`
--

INSERT INTO `closed_lead` (`id`, `lead_id`, `customername`, `company`, `industry`, `leadsource`, `number`, `email`, `vertical`, `oem`, `product`, `ordervalue`, `created_at`, `closed_reason`, `status`, `assignee`, `closure_value`, `payment_mode`, `service_customer`, `closed_at`, `payment_status`) VALUES
(1, '400135', 'testing', 'testingcompany', '10', 'Advertisement', '90987878765', 'manikandan@futurecalls.com', '2', '3', 'biometric', '500000', '2019-12-10 13:40:35', 'PO Collected', 'Close', 'vijaybalaji@futurecalls.com', '80000', '60', 'no', '2020-01-17 10:35:21', 0),
(2, '130304', 'manikandan', 'manikandan & co', '14', 'Advertisement', '8778787743', 'manikandan@futurecalls.com', '2', '1', 'Cable', '5000', '2019-12-21 15:13:04', 'Email Received', 'Close', 'vijaybalaji@futurecalls.com', '10000', '30', 'yes', '2020-01-17 12:24:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_feedback`
--

CREATE TABLE `customer_feedback` (
  `id` int(10) NOT NULL,
  `clientID` varchar(250) DEFAULT NULL,
  `ticketID` varchar(250) DEFAULT NULL,
  `q1` text,
  `answer` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_feedback`
--

INSERT INTO `customer_feedback` (`id`, `clientID`, `ticketID`, `q1`, `answer`, `created_at`) VALUES
(1, NULL, '141040', 'how would you rate your experience with our service?', 'Satisfied', '2019-12-09 10:39:04'),
(2, NULL, '011152', 'how would you rate your experience with our service?', 'Satisfied', '2019-12-09 11:55:00');

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
  `dropped_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drop_lead`
--

INSERT INTO `drop_lead` (`id`, `lead_id`, `customername`, `company`, `product`, `ordervalue`, `assignee`, `dropreason`, `status`, `dropped_at`) VALUES
(2, '300858', 'joseph', 'Joseph', '', '50000', 'vijaybalaji@futurecalls.com', 'Order canceled', 'Drop', '2020-01-17 11:06:57');

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
  `description` text,
  `attachment` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `read_status` int(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `ticketID`, `from_email`, `to_email`, `subject`, `description`, `attachment`, `created_at`, `read_status`) VALUES
(3, '040123', 'helpdesk@futurecalls.com', 'sandigopalan@gmail.com', 'Holiday IVR not working', 'Kindly share the holiday list we will check', '', '2019-12-06 13:53:48', 0),
(4, '040123', 'sandigopalan@gmail.com', 'helpdesk@futurecalls.com', 'Re: [040123#]Holiday IVR not working', 'Holiday list already uploaded in DB\r\n\r\nOn Fri, Dec 6, 2019 at 1:53 PM <helpdesk@futurecalls.com> wrote:\r\n\r\n> Kindly share the holiday list we will check\r\n>\r\n> Thanks & Regards,\r\n>\r\n> Futurecalls Helpdesk Team\r\n>\r\n> Note: Do not change the subject line While replying this message\r\n>\r\n', NULL, '2019-12-06 13:55:21', 0),
(6, '390529', 'helpdesk@futurecalls.com', 'pradeepvnair2001@yahoo.co.in', 'ticket', 'Dear Customer,  This ticket will be assigned to mr. dillibabu. He will be contact You soon.\r\nContact No: 9845123659', '', '2019-12-06 17:48:03', 0),
(7, '390529', 'pradeepvnair2001@yahoo.co.in', 'helpdesk@futurecalls.com', 'Re: [390529#]ticket', ' \r\nok please complete ASAP    On Friday, 6 December, 2019, 05:48:06 pm IST, helpdesk@futurecalls.com <helpdesk@futurecalls.com> wrote:  \r\n \r\n Dear Customer, This ticket will be assigned to mr. dillibabu. He will be contact You soon.Contact No: 9845123659\r\nThanks & Regards,\r\n\r\nFuturecalls Helpdesk Team\r\n\r\nNote: Do not change the subject line While replying this message\r\n  ', NULL, '2019-12-06 17:51:44', 0),
(18, '141040', 'sandigopalan@gmail.com', 'helpdesk@futurecalls.com', 'Re: [141040#]outbound not working', 'Please resolve asap\r\n\r\nOn Mon, Dec 9, 2019 at 10:16 AM <helpdesk@futurecalls.com> wrote:\r\n\r\n> Dear Customer, Your ticket has been updated please check updates\r\n>\r\n> ticket number is  141040\r\n>\r\n> Thanks & Regards,\r\n>\r\n> Futurecalls Helpdesk Team\r\n>\r\n> Note: Do not change the subject line While replying this message\r\n>\r\n', NULL, '2019-12-09 10:22:13', 0),
(20, '011152', 'helpdesk@futurecalls.com', 'kathiresun.vr@gmail.com', 'Unable to print of invoice', 'please find the attachment', 'focus.png', '2019-12-09 11:09:33', 0),
(21, '011152', 'kathiresun.vr@gmail.com', 'helpdesk@futurecalls.com', 'Re: [011152#]Unable to print of invoice', 'RESENDING the info\r\nHi Team,\r\n\r\nThank you for your email and update.\r\n\r\nRegards,\r\nKathiresan.V\r\n\r\n\r\nOn Mon, Dec 9, 2019 at 11:11 AM kathiresun veerappan <\r\nkathiresun.vr@gmail.com> wrote:\r\n\r\n> Hi Team,\r\n>\r\n> Thank you for your email and update.\r\n>\r\n> Regards,\r\n> Kathiresan.V\r\n>\r\n> On Mon, Dec 9, 2019 at 11:02 AM <helpdesk@futurecalls.com> wrote:\r\n>\r\n>> Dear Customer,\r\n>>\r\n>> Your Ticket has been created successfully. Your ticket number is  011152\r\n>>\r\n>> Thanks & Regards,\r\n>>\r\n>> Futurecalls Helpdesk Team\r\n>>\r\n>\r\n', NULL, '2019-12-09 11:15:02', 0),
(22, '011152', 'kathiresun.vr@gmail.com', 'helpdesk@futurecalls.com', 'Re: [011152#]Unable to print of invoice', '--00000000000012d08c05993f0cb8\r\nContent-Type: text/plain; charset=\"UTF-8\"\r\n\r\nI am here with sending the attachment.\r\n\r\nRegards,\r\nKathiresan.V\r\n\r\nOn Mon, Dec 9, 2019 at 11:15 AM <helpdesk@futurecalls.com> wrote:\r\n\r\n> Dear Customer,\r\n>\r\n> Your Request has been received. Our support executive will contact you\r\n> soon.\r\n>\r\n> Thanks & Regards,\r\n>\r\n> Futurecalls Helpdesk Team\r\n>\r\n\r\n--00000000000012d08c05993f0cb8\r\nContent-Type: text/html; charset=\"UTF-8\"\r\nContent-Transfer-Encoding: quoted-printable\r\n\r\n<div dir=3D\"ltr\">I am here with sending the attachment.<div><br></div><div>=\r\nRegards,</div><div>Kathiresan.V</div></div><br><div class=3D\"gmail_quote\"><=\r\ndiv dir=3D\"ltr\" class=3D\"gmail_attr\">On Mon, Dec 9, 2019 at 11:15 AM &lt;<a=\r\n href=3D\"mailto:helpdesk@futurecalls.com\">helpdesk@futurecalls.com</a>&gt; =\r\nwrote:<br></div><blockquote class=3D\"gmail_quote\" style=3D\"margin:0px 0px 0=\r\npx 0.8ex;border-left:1px solid rgb(204,204,204);padding-left:1ex\"><p>Dear C=\r\nustomer,</p><p>Your Request has been received. Our support executive will c=\r\nontact you soon. </p><p>Thanks &amp; Regards,</p><p>Futurecalls Helpdesk Te=\r\nam</p>\r\n\r\n</blockquote></div>\r\n\r\n--00000000000012d08c05993f0cb8--', 'expelo.xlsx', '2019-12-09 11:26:13', 0),
(23, '111226', 'helpdesk@futurecalls.com', 'sandigopalan@gmail.com', 'On call Ticket', 'hghghfghf', 'email-issue.png', '2019-12-09 15:09:07', 0),
(24, '040123', 'helpdesk@futurecalls.com', 'sandigopalan@gmail.com', 'Holiday IVR not working', 'this ticket not assigned', 'pen.png', '2019-12-09 16:46:53', 0),
(25, '111226', 'helpdesk@futurecalls.com', 'sandigopalan@gmail.com', 'On call Ticket', 'test message', 'sales target.jpg', '2019-12-09 17:03:07', 0),
(26, '111226', 'helpdesk@futurecalls.com', 'sandigopalan@gmail.com', 'On call Ticket', 'mail attachment not loaded properly', 'Funds India _ ThankIng_ Msg.jpg', '2019-12-09 17:12:42', 0);

-- --------------------------------------------------------

--
-- Table structure for table `email_campaign`
--

CREATE TABLE `email_campaign` (
  `id` int(10) NOT NULL,
  `subject` varchar(250) DEFAULT NULL,
  `description` text,
  `attachment` varchar(250) DEFAULT NULL,
  `sent_at` datetime DEFAULT CURRENT_TIMESTAMP
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `escalation_master`
--

INSERT INTO `escalation_master` (`id`, `campaign`, `level`, `name`, `email`, `number`, `created_at`) VALUES
(22, '1', 'L1', 'Pradeep', 'santhiya@futurecalls.com', '917358650128', '2019-08-16 15:24:59'),
(23, '1', 'L2', 'Pradeep', 'manikandan@futurecalls.com', '9001245783', '2019-08-16 15:24:59'),
(24, '1', 'L3', 'Pradeep', 'manikandan@futurecalls.com', '8945123568', '2019-08-16 15:24:59'),
(25, '1', 'L4', 'Pradeep', 'manikandan@futurecalls.com', '5612354859', '2019-08-16 15:24:59'),
(26, '2', 'L1', 'Shahinsha', 'veera@futurecalls.com', '9843644039', '2019-08-16 15:27:46'),
(27, '2', 'L2', 'Shahinsha', 'veera@futurecalls.com', '1547824565', '2019-08-16 15:27:47'),
(28, '2', 'L3', 'Shahinsha', 'veera@futurecalls.com', '1547824569', '2019-08-16 15:27:47'),
(29, '2', 'L4', 'Shahinsha', 'veera@futurecalls.com', '1547824576', '2019-08-16 15:27:47'),
(30, '3', 'L1', 'Tamilarasan', 'santhiya@futurecalls.com', '9845123659', '2019-08-16 15:28:55'),
(31, '3', 'L2', 'Tamilarasan', 'santhiya@futurecalls.com', '9845123659', '2019-08-16 15:28:56'),
(32, '3', 'L3', 'Tamilarasan', 'santhiya@futurecalls.com', '9845123659', '2019-08-16 15:28:56'),
(33, '3', 'L4', 'Tamilarasan', 'santhiya@futurecalls.com', '9845123659', '2019-08-16 15:28:56'),
(34, '6', 'L1', 'veera', 'veera@futurecalls.com', '8825577595', '2019-12-20 19:01:44');

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(13, 'Engineering'),
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
  `status` varchar(255) NOT NULL,
  `comment_status` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `closure_value` varchar(250) NOT NULL,
  `flag` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lead`
--

INSERT INTO `lead` (`id`, `lead_id`, `leadowner`, `customertype`, `customername`, `company`, `industry`, `leadsource`, `phone`, `mobile`, `email`, `customeraddress`, `vertical`, `leadstatus`, `oem`, `product`, `assignee`, `ordervalue`, `closuredate`, `status`, `comment_status`, `created_at`, `closure_value`, `flag`) VALUES
(3, '400135', 'vijaybalaji', 'Existing', 'testing', 'testingcompany', '10', 'Advertisement', '04423434543', '90987878765', 'manikandan@futurecalls.com', '', '2', 'Upside', '3', 'biometric', 'vijaybalaji@futurecalls.com', '500000', '2019-12-11', 'Close', 1, '2019-12-10 08:10:35', '80000', 0),
(4, '130304', 'vijaybalaji', 'New', 'manikandan', 'manikandan & co', '14', 'Advertisement', '04423456567', '8778787743', 'manikandan@futurecalls.com', '', '2', 'Commit', '1', 'Cable', 'vijaybalaji@futurecalls.com', '5000', '2019-12-22', 'Close', 1, '2019-12-21 09:43:04', '10000', 0),
(13, '300858', 'vijaybalaji', 'New', 'joseph', 'Joseph', '16', 'Website', '', '87676565454', 'veeraiyan14@gmail.com', 'velachery', '2', 'Lead', '1', '', 'vijaybalaji@futurecalls.com', '50000', '2020-01-01', 'Drop', NULL, '2019-12-21 15:00:59', '', 0),
(14, '570832', 'Vijaybalaji', 'Existing', 'Aban', 'Aban', '', 'Employee Referral', '9876545678', '9876567890', 'santhiya@futurecalls.com', '', '2', 'Upside', '1', 'Anti Virus', 'vijaybalaji@futurecalls.com', '100000', '2020-01-02', 'Postponed', 1, '2019-12-22 03:27:32', '900000', 0),
(15, '400435', 'vijaybalaji', 'Existing', 'Tata', 'Tata consultancy', '30', 'Employee Referral', '0442568975', '9845124589', 'xxx@gmail.com', '', '2', 'Lead', '1', 'switches', 'vijaybalaji@futurecalls.com', '100000', '2020-02-29', 'Open', 1, '2020-01-17 11:10:35', '', 0),
(16, '420429', 'vijaybalaji', 'Existing', 'Vimal', 'IRCS', '18', 'Advertisement', '0442145698', '9842153659', 'ircs@gmail.com', '', '3', 'Lead', '5', 'Information security', 'vijaybalaji@futurecalls.com', '500000', '2020-03-31', 'Lost', 1, '2020-01-17 11:12:29', '', 0),
(17, '501100', '', '', 'Vimal', 'Blood Bank', '', 'Email', '04425632568', '9845123658', 'santhiya@futurecalls.com', '', '', '', '', '', 'vijaybalaji@futurecalls.com', '', '', 'Open', NULL, '2020-01-20 11:08:45', '', 2);

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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lead_update`
--

INSERT INTO `lead_update` (`id`, `lead_id`, `customername`, `company`, `industry`, `leadsource`, `phone`, `mobile`, `email`, `vertical`, `oem`, `product`, `leadstatus`, `assignee`, `ordervalue`, `closuredate`, `status`, `created_at`, `actiontaken`, `nextaction`, `nextactiondate`, `updated_at`) VALUES
(1, '400135', 'testing', 'testingcompany', '10', 'Advertisement', '04423434543', '9845124568', 'vijaybalaji@futurecalls.com', '2', '3', 'biometric', 'Commit', 'viaybalaji@futurecalls.com', '50000', '2019-12-11', 'Open', '2019-12-10 13:40:35', '1', 'solution need to proposed with the help of technical person', '2020-01-13', '2020-01-12 19:12:46'),
(2, '400135', 'testing', 'testingcompany', '10', 'Advertisement', '04423434543', '90987878765', '90987878765', '2', '3', 'biometric', 'Commit', 'vijaybalaji@futurecalls.com', '500000', '2019-12-11', 'Open', '2019-12-10 13:40:35', '3', 'demo scheduled today', '2020-01-17', '2020-01-17 05:49:03');

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
(168, 'ragu@futurecalls.com', '10.10.10.62', '2020-01-20 17:13:16', 'Google Chrome', 'windows', '79.0.3945.117');

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
  `lost_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lost_lead`
--

INSERT INTO `lost_lead` (`id`, `lead_id`, `customername`, `company`, `product`, `ordervalue`, `assignee`, `lostreason`, `losttowhom`, `status`, `lost_at`) VALUES
(1, '420429', 'Vimal', 'IRCS', 'Information security', '500000', 'vijaybalaji@futurecalls.com', 'Price difference', 'Unknown Vendor', 'Lost', '2020-01-17 11:26:15');

-- --------------------------------------------------------

--
-- Table structure for table `management_info`
--

CREATE TABLE `management_info` (
  `id` int(10) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `title` text,
  `description` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `management_info`
--

INSERT INTO `management_info` (`id`, `name`, `title`, `description`, `created_at`) VALUES
(3, 'Venkatesan M', 'Management Message', 'Today we have a meeting at 4 pm&nbsp;', '2019-12-03 15:46:55');

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(6, 'Create', 'email', 'email', 'Dear Customer , Your ticket has been raised', 'Dear Customer , Your ticket has been raised', 'Dear Team , New ticket  raised from', 'Dear Team , New ticket  raised from', '2019-08-02 11:00:40'),
(8, 'Close', 'email', 'email', 'Dear customer,\r\n             Your ticket has been closed please check the updates', 'Dear customer,\r\n             Your ticket has been closed please check the updates', 'Dear User,\r\n             Your ticket has been closed please check the updates', 'Dear User,\r\n             Your ticket has been closed please check the updates', '2019-08-06 11:06:49'),
(9, 'Re-Assign', 'email', 'email', 'Dear Customer,\r\nYour ticket will be assigned to', 'Dear Customer,\r\nYour ticket will be assigned to', 'Dear User,\r\nNew ticket assigned from', 'Dear User,\r\nNew ticket assigned from', '2019-08-06 11:10:18'),
(10, 'SLA Violations', 'email', 'email', 'Dear customer your ticket has been crossed', 'Dear customer your ticket has been crossed', 'Dear Team,  the following  ticket has been crossed', 'Dear Team, the following  ticket has been crossed', '2019-08-14 10:09:18'),
(11, 'Update', 'email', 'email', 'Dear Customer,\r\n    Your ticket has been updated  please check updates', 'Dear Customer,\r\n    Your ticket has been updated  please check updates.', 'Dear Team,\r\n    ticket has been updated  please check updates', 'Dear Team,\r\n    ticket has been updated  please check updates', '2019-09-24 10:12:14');

-- --------------------------------------------------------

--
-- Table structure for table `oem_master`
--

CREATE TABLE `oem_master` (
  `id` int(11) NOT NULL,
  `oemname` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(21, 'Others', '2020-01-20 05:31:40');

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outbound_lead`
--

INSERT INTO `outbound_lead` (`id`, `name`, `mobile`, `email`, `assignee`, `created_at`) VALUES
(1, 'john', '9878787878', 'john@gmail.com', 'rejina', '2019-11-21 05:35:46'),
(2, 'ferros', '9878787879', 'ferros@gmail.com', 'ragu', '2019-11-21 05:35:46'),
(3, 'cristan', '9878787880', 'cristan@gmail.com', 'Not Assign', '2019-11-21 05:35:46'),
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
(3, 'manikandan@futurecalls.com', '768e78024aa8fdb9b8fe87be86f647452699aeaa2a', '2019-07-17 12:01:31');

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postponed_lead`
--

INSERT INTO `postponed_lead` (`id`, `lead_id`, `customername`, `company`, `product`, `ordervalue`, `assignee`, `postponeddate`, `postponedreason`, `status`, `created_at`) VALUES
(2, '570832', 'Aban', 'Aban', 'Anti Virus', '100000', 'vijaybalaji@futurecalls.com', '2020-01-31', 'posponed process test', 'Postponed', '2020-01-17 10:34:04');

-- --------------------------------------------------------

--
-- Table structure for table `product_master`
--

CREATE TABLE `product_master` (
  `id` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(8, 'software support', 'Onsite support', '0000-00-00 00:00:00'),
(9, 'Telecom Support', 'tata ILL support', '0000-00-00 00:00:00'),
(10, 'others', 'Email process', '0000-00-00 00:00:00'),
(11, 'sms support', 'sms support', '0000-00-00 00:00:00');

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
(1, 'GRT3712', '1', 'P1', '8', '', '', '', '2019-12-06 12:38:27'),
(2, 'GRT3712', '1', 'P2', '8', NULL, NULL, NULL, '2019-12-06 12:38:27'),
(3, 'GRT3712', '1', 'P3', '8', NULL, NULL, NULL, '2019-12-06 12:38:27'),
(4, 'GRT3712', '1', 'P4', '8', NULL, NULL, NULL, '2019-12-06 12:38:27'),
(5, 'GRT3712', '8', 'P1', '8', '', '', '', '2019-12-06 12:38:45'),
(6, 'GRT3712', '8', 'P2', '8', NULL, NULL, NULL, '2019-12-06 12:38:45'),
(7, 'GRT3712', '8', 'P3', '8', NULL, NULL, NULL, '2019-12-06 12:38:45'),
(8, 'GRT3712', '8', 'P4', '8', NULL, NULL, NULL, '2019-12-06 12:38:45'),
(9, 'Fun1011', '2', 'P1', '4', '', '', '', '2019-12-06 12:39:23'),
(10, 'Fun1011', '2', 'P2', '8', NULL, NULL, NULL, '2019-12-06 12:39:23'),
(11, 'Fun1011', '2', 'P3', '8', NULL, NULL, NULL, '2019-12-06 12:39:23'),
(12, 'Fun1011', '2', 'P4', '8', NULL, NULL, NULL, '2019-12-06 12:39:23'),
(13, 'Cit1111', '2', 'P1', '4', '', '', '', '2019-12-06 12:39:40'),
(14, 'Cit1111', '2', 'P2', '4', NULL, NULL, NULL, '2019-12-06 12:39:40'),
(15, 'Cit1111', '2', 'P3', '4', NULL, NULL, NULL, '2019-12-06 12:39:40'),
(16, 'Cit1111', '2', 'P4', '4', NULL, NULL, NULL, '2019-12-06 12:39:40'),
(17, 'Gem0403', '3', 'P1', '12', '', '', '', '2019-12-06 12:40:12'),
(18, 'Gem0403', '3', 'P2', '12', NULL, NULL, NULL, '2019-12-06 12:40:12'),
(19, 'Gem0403', '3', 'P3', '12', NULL, NULL, NULL, '2019-12-06 12:40:12'),
(20, 'Gem0403', '3', 'P4', '12', NULL, NULL, NULL, '2019-12-06 12:40:12'),
(21, 'Gem0403', '1', 'P1', '8', '', '', '', '2019-12-06 12:40:36'),
(22, 'Gem0403', '1', 'P2', '8', NULL, NULL, NULL, '2019-12-06 12:40:36'),
(23, 'Gem0403', '1', 'P3', '8', NULL, NULL, NULL, '2019-12-06 12:40:36'),
(24, 'Gem0403', '1', 'P4', '8', NULL, NULL, NULL, '2019-12-06 12:40:36');

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
-- Table structure for table `tempsms`
--

CREATE TABLE `tempsms` (
  `id` int(11) NOT NULL,
  `number` varchar(255) NOT NULL,
  `message` varchar(500) NOT NULL,
  `messagedate` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `closing_status` int(10) NOT NULL DEFAULT '0',
  `time` varchar(250) DEFAULT NULL,
  `campaign_ID` varchar(250) DEFAULT NULL,
  `process` varchar(250) DEFAULT NULL,
  `assigned_to` varchar(250) DEFAULT 'Not Assigned',
  `role` varchar(250) DEFAULT NULL,
  `attachment` varchar(250) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `l1` int(10) NOT NULL DEFAULT '0',
  `l2` int(10) NOT NULL DEFAULT '0',
  `l3` int(10) NOT NULL DEFAULT '0',
  `l4` int(10) NOT NULL DEFAULT '0',
  `read_status` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `clientID`, `email`, `number`, `subject`, `description`, `severity`, `ticketID`, `status`, `closing_status`, `time`, `campaign_ID`, `process`, `assigned_to`, `role`, `attachment`, `created_at`, `l1`, `l2`, `l3`, `l4`, `read_status`) VALUES
(1, 'Cit1111', 'sandigopalan@gmail.com', '9843644039', 'Holiday IVR not working', 'Team, Holiday IVR is not working. whenever holiday it plays only hold message', 'P1', '040123', 'Open', 0, NULL, '1', '2', 'Not Assigned', NULL, '', '2019-12-06 13:04:26', 0, 0, 0, 0, 0),
(11, 'GRT3712', 'kathiresun.vr@gmail.com', '7825888824', 'Unable to print of invoice', 'Hi Team,\r\n\r\nUnable to print of invoice\r\n\r\n\r\nRegards,\r\nKathiresan.V\r\n', 'P2', '011152', 'Open', 2, NULL, '1', '1', 'dillibabu@futurecalls.com', NULL, NULL, '2019-12-09 11:01:54', 0, 0, 0, 0, 0),
(10, 'Gem0403', 'pradeepvnair2001@yahoo.co.in', '9787141830', 'ticket', 'hi\r\nplz add ticket', 'P2', '231050', 'Open', 0, NULL, '1', '1', 'Not Assigned', NULL, NULL, '2019-12-09 10:24:02', 0, 0, 0, 0, 0),
(12, 'GRT3712', 'kathiresun.vr@gmail.com', '7825888824', 'Sending attachment to check whether its getting added', '--0000000000003a653d05993f025a\r\nContent-Type: text/plain; charset=\"UTF-8\"\r\n\r\nHi All,\r\n\r\nSending attachment to check whether its getting added to the ticket.\r\n\r\nRegards,\r\nKathiresan.V\r\n\r\n--0000000000003a653d05993f025a\r\nContent-Type: text/html; charset=\"UTF', 'P2', '231125', 'Open', 0, NULL, '1', '1', 'Not Assigned', NULL, 'test.txt', '2019-12-09 11:23:29', 0, 0, 0, 0, 0),
(9, 'Cit1111', 'sandigopalan@gmail.com', '9843644039', 'outbound not working', 'outbound not working', 'P4', '141040', 'Close', 2, NULL, '1', '2', 'dillibabu@futurecalls.com', 'L3 support', '', '2019-12-09 10:14:50', 0, 0, 0, 0, 0),
(8, 'Cit1111', 'sandigopalan@gmail.com', '9843644039', 'Mobile number validation test', 'mobile number validation\r\n', 'P2', '280602', 'Open', 0, NULL, '1', '2', 'Not Assigned', NULL, NULL, '2019-12-06 18:28:05', 0, 0, 0, 0, 0),
(7, 'Gem0403', 'pradeepvnair2001@yahoo.co.in', '9787141830', 'ticket', 'please address my desk phone did number', 'P2', '390529', 'Open', 0, NULL, '1', '1', 'dillibabu@futurecalls.com', 'L3 support', NULL, '2019-12-06 17:39:31', 0, 0, 0, 0, 0),
(13, 'Cit1111', 'sandigopalan@gmail.com', '9843644039', 'On call Ticket', 'On call ticket Test', 'P2', '111226', 'Open', 0, NULL, '1', '2', 'Not Assigned', NULL, '', '2019-12-09 12:11:27', 0, 0, 0, 0, 0),
(14, 'GRT3712', 'kathiresun.vr@gmail.com', '7825888824', 'Monitor Issue', 'Monitor not working', 'P4', '161248', 'Open', 0, NULL, '1', '1', 'dillibabu@futurecalls.com', 'L3 support', '', '2019-12-09 12:16:49', 0, 0, 0, 0, 0),
(15, 'Cit1111', 'sandigopalan@gmail.com', '8776767676', 'testing mail for notification', 'please ignore this mail', 'P2', '330437', 'Close', 2, NULL, '1', '2', 'pradeep@futurecalls.com', 'L3 support', '', '2019-12-11 16:34:02', 0, 0, 0, 0, 0),
(16, 'Gem0403', 'pradeepvnair2001@yahoo.co.in', '8767666676', 'description is not covered', 'my monitor is not working', 'P1', '370443', 'Open', 0, NULL, '1', '1', 'Not Assigned', NULL, '', '2019-12-11 16:37:44', 0, 0, 0, 0, 0),
(17, 'Cit1111', 'sandigopalan@gmail.com', '6556666666', 'thyhy', 'brgb', 'P1', '251236', 'Open', 0, NULL, '1', '2', 'Not Assigned', NULL, '', '2019-12-16 12:25:37', 0, 0, 0, 0, 0),
(33, 'Gem0403', 'veera@futurecalls.com', '9787141830', 'MGLTK AVAYA PROBLEM', NULL, 'P2', '091237', 'Open', 0, NULL, '6', '11', 'manikandan@futurecalls.com', 'Service Head', NULL, '2019-12-21 12:09:37', 0, 0, 0, 0, 0),
(34, 'Gem0403', 'veera@futurecalls.com', '9787141830', 'MGLTK AVAYA PROBLEM', NULL, 'P2', '091237', 'Open', 0, NULL, '6', '11', 'manikandan@futurecalls.com', 'Service Head', NULL, '2019-12-21 12:09:37', 0, 0, 0, 0, 0),
(35, 'Gem0403', 'veera@futurecalls.com', '9787141830', 'MGLTK AVAYA PROBLEM', NULL, 'P2', '241237', 'Open', 0, NULL, '6', '11', 'Not Assigned', NULL, NULL, '2019-12-21 12:24:37', 0, 0, 0, 0, 2),
(36, 'Gem0403', 'veera@futurecalls.com', '9787141830', 'MGLTK AVAYA PROBLEM', NULL, 'P2', '241238', 'Open', 0, NULL, '6', '11', 'Not Assigned', NULL, NULL, '2019-12-21 12:24:38', 0, 0, 0, 0, 2),
(37, 'Gem0403', 'veera@futurecalls.com', '9787141830', 'MGLTK AVAYA PROBLEM', NULL, 'P2', '261233', 'Open', 0, NULL, '6', '11', 'Not Assigned', NULL, NULL, '2019-12-21 12:26:33', 0, 0, 0, 0, 2),
(32, 'Gem0403', 'pradeepvnair2001@yahoo.co.in', '9787141830', 'ticket', 'My avaya ipo have some problem', 'P2', '001256', 'Open', 0, NULL, '1', '1', 'pradeep@futurecalls.com', 'L3 support', NULL, '2019-12-21 12:00:59', 0, 0, 0, 0, 0);

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `update_status`
--

INSERT INTO `update_status` (`id`, `clientID`, `email`, `number`, `subject`, `description`, `severity`, `ticketID`, `status`, `campaign_ID`, `process`, `assigned_to`, `action`, `created_date`, `updated_at`) VALUES
(2, 'Cit1111', 'sandigopalan@gmail.com', '9843644039', 'outbound not working', 'outbound not working', 'P4', '141040', 'Open', '1', '2', 'dillibabu@futurecalls.com', 'working with contaq team will be resolved soon', '2019-12-09 10:14:50', '2019-12-09 10:16:29'),
(3, 'GRT3712', 'kathiresun.vr@gmail.com', '7825888824', 'Monitor Issue', 'Monitor not working', 'P4', '161248', 'Open', '1', '1', 'dillibabu@futurecalls.com', 'Monitor screen changed', '2019-12-09 12:16:49', '2019-12-09 12:19:52');

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
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(1, 'Internal User', 'remote', 'Address 1', 'EMP002', 'santhiya', 'santhiya@futurecalls.com', 'Santhiya', '9840939362', 'Administrator', '$2y$10$YqjByKif9.qZL.F5AmTVPeFn/oPOOh/ybColv2Gs1Y7.g5H.lsvHS', 0, '2019-03-29 10:57:51', 2, '2019-11-28 11:43:53', '1', NULL),
(2, 'Internal User', 'remote', 'Address 3', 'FC1005', 'sakthivel', 'sakthivel@futurecalls.com', 'Sakthivel', '9451236589', 'L1 support', '$2y$10$1MgqLu.264RwabYQj6xKqOskNZNXVBAjltj7I2YvWLazWJ3DB1HTm', 0, '2019-04-08 12:56:03', 2, '2019-11-20 12:09:03', '1', NULL),
(3, 'Internal User', 'remote', 'Address 2', 'FC00103', 'Shahinsha', 'shahinsha@futurecalls.com', 'Shahinsha', '9845124578', 'Team leader', '$2y$10$LE3/uJUIukVpgrFmi8hI6Ol8oJ0pTh/l62UBJCoLGjMWWg3C.huJK', 0, '2019-05-10 13:09:54', 2, '2019-07-26 10:48:16', '1', NULL),
(6, 'Internal User', 'remote', 'Chennai', 'Fc001456', 'Manikandan', 'manikandan@futurecalls.com', 'Manikandan.B', '9845612356', 'Super Admin', '$2y$10$jDj3x1.zEllz55E2n0pO8esVCzXvBeAIw87p69wIN2G5EK6oxANjq', 0, '2019-06-18 15:32:08', 2, '2019-06-21 07:14:54', '1', NULL),
(7, 'Internal User', 'remote', 'Chennai', 'FC00103', 'Pradeep V.Nair', 'pradeep@futurecalls.com', 'Pradeep V.Nair', '9884246046', 'Team leader', '$2y$10$RUaSyzdq6PHSkvfdUT4esOm41VaOxwQOxWB/BwaPYNM0GoIVVHnBm', 0, '2019-06-20 14:19:13', 2, '2020-01-03 09:42:37', '1', NULL),
(12, 'Internal User', 'remote', 'Chennai', '188', 'Devakumar', 'devakumar@futurecalls.com', 'Devakumar', '9994178714', 'L3 support', '$2y$10$C7irSjbcR4kheRj9xph0cOqpdDUc/kS2C4Tk72xs5QbGnwfCekcca', 0, '2019-07-17 22:56:31', 2, '2019-08-29 09:45:49', '1', NULL),
(13, 'Internal User', 'remote', 'Chennai', '203', 'SURESH JULURI', 'suresh.j@futurecalls.com', 'SURESH JULURI', '8939991513', 'Team leader', '$2y$10$iiESXSP6PGA8yhBKZjHRSe0krGCnptbUOE0QKJaqMMBq67epca6b2', 0, '2019-07-17 23:12:00', 1, NULL, '1', NULL),
(14, 'Internal User', 'remote', 'Chennai', '212', 'DILLI BABU G', 'dillibabu@futurecalls.com', 'DILLI BABU G', '9884154605', 'L3 support', '$2y$10$Xri3W7tazvVuOBvBirT2JeYo6AC7.HGjwMTXnQ1ef/n2zgVjsTMGm', 0, '2019-07-17 23:13:09', 2, '2019-12-09 05:32:53', '1', NULL),
(16, 'Internal User', 'remote', 'Chennai', '252', 'KARTHIK R', 'karthik@futurecalls.com', 'KARTHIK R', '7904883593', 'L2 support', '$2y$10$EHnd9tTXJodgHk3IvhTubenf3yEzdcy2TJRq2v8qa1HQDwddECTd2', 0, '2019-07-17 23:15:40', 1, NULL, '1', NULL),
(18, 'Internal User', 'remote', 'Chennai', '301', 'T VENGADESHWARAN', 'vengadeshwaran@futurecalls.com', 'T VENGADESHWARAN', '7339274140', 'L1 support', '$2y$10$ILUonbeQbBK1YRgXTcVjC.3TKWZFpwyQm1Bs2WdtDou.UvEu/2yc.', 0, '2019-07-17 23:19:32', 1, NULL, '1', NULL),
(62, 'GRT3712', '', 'Chennai', 'EMP001', 'Mr.kathiresun', 'kathiresun.vr@gmail.com', 'Mr.kathiresun', '7825888824', 'Customer', '$2y$10$uXHVPtU3QbI1a7VGBuzuF.YospGsf5d6FQtZtI16RTLiQLZOGTTlG', 1, '2019-12-06 12:42:36', 2, '2019-12-09 06:50:47', '1', NULL),
(63, 'Cit1111', '', 'Chennai', 'EMP002', 'CUB', 'sandigopalan@gmail.com', 'CUB', '9629015788', 'Customer', '$2y$10$WVjVcxcBZcx8jyUdqYeGIO7RFEVY0e9bBUQ7ZGt8iEBir.qhLNMdW', 0, '2019-12-06 12:44:01', 2, '2019-12-21 06:24:21', '1', NULL),
(64, 'Gem0403', '', 'Chennai', 'EMP002', 'GEM Hospital', 'pradeepvnair2001@yahoo.co.in', 'GEM', '9787141830', 'Customer', '$2y$10$HvJk3autWChke95tAcFCtelzGyLYBVCTSexonbufiEF2hCuM.9.KC', 0, '2019-12-06 12:47:58', 1, NULL, '1', NULL),
(65, 'GRT3712', '', 'Chennai', 'EMP001', 'Kathiresun', 'veera@futurecalls.com', 'Kathiresun', '917845505528', 'Customer', '$2y$10$Ly8aKoiRV.rcVcTrlZXAAu0RzQnROoMVjoNa9/M7Yi1pXYJ.ye4cq', 0, '2019-12-09 10:47:56', 1, NULL, '1', NULL),
(66, 'Internal User', '', 'Chennai', 'EMP001', 'Venkatesan', 'venkatesan@futurecalls.com', 'Venkatesan', '9845781245', 'Service Head', '$2y$10$SS6JJAwvk6Ii5XkzwAk3EORYJ0F9R5VZYmf45ZgYmCNfl1sBjl17e', 0, '2019-12-09 11:58:17', 2, '2019-12-09 06:28:31', '1', NULL),
(67, 'Internal User', '', 'Chennai', 'EMP_189', 'vijaybalaji', 'vijaybalaji@futurecalls.com', 'vijaybalaji', '7200277776', 'Account Manager', '$2y$10$s9vJzis3qpfXuPNyxPn7fe/iibgHigWq9P11t556RxS6JK/awEIW.', 0, '2019-12-21 13:11:45', 2, '2019-12-21 07:41:52', '1', NULL),
(68, 'Internal User', '', 'Chennai', 'EMP_005', 'ragu', 'ragu@futurecalls.com', 'ragu', '8787665654', 'Telecaller', '$2y$10$PoYeeUDV1m1a2rWDy9HSJuLwCPyy.lC3ljG39EKDM9Ivwi8sIiJN6', 0, '2019-12-21 13:50:54', 2, '2019-12-21 08:21:06', '1', NULL),
(69, 'Internal User', '', 'Chennai', 'EMP_007', 'saleshead', 'saleshead@futurecalls.com', 'saleshead', '8976565676', 'Sales Head', '$2y$10$VkzEjjfwss/d6SXX8UubVO55vouFVeO4Aeo7FzYyNM6rV2.3260XC', 0, '2019-12-21 16:01:27', 2, '2019-12-21 10:31:45', '1', NULL),
(70, 'Internal User', '', 'Chennai', 'EMP_200', 'Sales Admin', 'salesadmin@futurecalls.com', 'Sales Admin', '9854525478', 'Sales Admin', '$2y$10$0.S08WO0pkkCdQoTcRWfvecYKnVozN2XZjJyrSDsHwYL2ua3u54JC', 0, '2019-12-26 11:56:17', 2, '2019-12-26 06:26:36', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vertical_master`
--

CREATE TABLE `vertical_master` (
  `id` int(11) NOT NULL,
  `verticalname` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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

--
-- Dumping data for table `violations`
--

INSERT INTO `violations` (`id`, `ticketID`, `l1_time`, `l2_time`, `l3_time`, `l4_time`) VALUES
(37, '300443', '2019-08-19 15:50:34', NULL, NULL, NULL),
(38, '460452', '2019-08-19 15:50:38', NULL, NULL, NULL),
(39, '510231', '2019-08-19 15:50:39', NULL, NULL, NULL),
(40, '500200', '2019-08-19 15:50:42', '2019-09-10 11:39:17', '2019-10-01 15:47:27', NULL),
(41, '470238', '2019-08-19 15:50:43', '2019-09-10 11:39:20', NULL, NULL),
(42, '440243', '2019-08-19 15:50:44', '2019-09-10 11:39:22', NULL, NULL),
(43, '011138', '2019-08-19 15:50:45', NULL, NULL, NULL),
(44, '001143', '2019-08-19 15:50:47', NULL, NULL, NULL),
(45, '401053', '2019-08-19 15:50:48', '2019-09-10 11:39:24', '2019-10-01 15:47:29', NULL),
(46, 'N181139', '2019-08-19 15:50:49', '2019-09-10 11:39:26', '2019-10-01 15:47:30', NULL),
(47, 'N171155', '2019-08-19 15:50:50', '2019-09-10 11:39:28', '2019-10-01 15:47:32', NULL),
(48, 'N081105', '2019-08-19 15:50:51', '2019-09-10 11:39:32', '2019-10-01 15:47:34', NULL),
(49, 'N011158', '2019-08-19 15:50:52', NULL, NULL, NULL),
(50, 'N501050', '2019-08-19 15:50:54', '2019-09-10 11:45:59', NULL, NULL),
(51, '481054', '2019-08-19 15:50:55', '2019-09-10 11:46:04', NULL, NULL),
(52, 'N431034', '2019-08-19 15:50:57', '2019-09-10 11:46:08', NULL, NULL),
(53, 'N431056', '2019-08-19 15:50:58', '2019-09-10 11:46:12', NULL, NULL),
(54, 'V221024', '2019-08-19 15:50:59', '2019-09-10 11:46:14', NULL, NULL),
(55, 'V550456', '2019-08-19 15:51:01', '2019-09-10 11:46:19', NULL, NULL),
(56, 'V540426', '2019-08-19 15:51:02', '2019-09-10 11:46:24', NULL, NULL),
(57, '120355', '2019-09-10 11:39:04', '2019-10-01 15:47:20', NULL, NULL),
(58, '410125', '2019-09-10 11:39:08', '2019-10-01 15:47:22', NULL, NULL),
(59, '320115', '2019-09-10 11:39:10', '2019-10-01 15:47:23', NULL, NULL),
(60, '220300', '2019-09-10 11:39:12', '2019-10-01 15:47:24', NULL, NULL),
(61, '060350', '2019-09-10 11:39:14', '2019-10-01 15:47:25', NULL, NULL),
(62, '180435', '2019-10-01 15:47:08', NULL, NULL, NULL),
(63, '050409', '2019-10-01 15:47:14', NULL, NULL, NULL),
(64, '580334', '2019-10-01 15:47:15', NULL, NULL, NULL),
(65, '560344', '2019-10-01 15:47:17', NULL, NULL, NULL),
(66, '400312', '2019-10-01 15:47:18', NULL, NULL, NULL),
(67, '000426', '2019-10-01 15:47:19', NULL, NULL, NULL),
(68, '240344', '2019-12-03 11:12:00', NULL, NULL, NULL),
(69, '460452', '2019-12-03 11:12:02', NULL, NULL, NULL);

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
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `flag` int(10) NOT NULL DEFAULT '0'
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
  MODIFY `agent_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `amc_master`
--
ALTER TABLE `amc_master`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `client_location`
--
ALTER TABLE `client_location`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `client_master`
--
ALTER TABLE `client_master`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `client_service`
--
ALTER TABLE `client_service`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `closedtickets`
--
ALTER TABLE `closedtickets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `closed_lead`
--
ALTER TABLE `closed_lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_feedback`
--
ALTER TABLE `customer_feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `drop_lead`
--
ALTER TABLE `drop_lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `lead_update`
--
ALTER TABLE `lead_update`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loginhistory`
--
ALTER TABLE `loginhistory`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `lost_lead`
--
ALTER TABLE `lost_lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `management_info`
--
ALTER TABLE `management_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `oem_master`
--
ALTER TABLE `oem_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `postponed_lead`
--
ALTER TABLE `postponed_lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sla_config`
--
ALTER TABLE `sla_config`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `update_websitelead`
--
ALTER TABLE `update_websitelead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `website_lead`
--
ALTER TABLE `website_lead`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
