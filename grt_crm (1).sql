-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2019 at 07:56 AM
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
-- Database: `grt_crm`
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
(1, '1', 'pradeep@futurecalls.com', 'Team leader'),
(2, '1', 'devakumar@futurecalls.com', 'L3 support'),
(3, '1', 'suresh.j@futurecalls.com', 'Team leader'),
(4, '1', 'dillibabu@futurecalls.com', 'L3 support'),
(5, '2', 'sakthivel@futurecalls.com', 'L1 support'),
(6, '2', 'shahinsha@futurecalls.com', 'Team leader'),
(7, '3', 'karthik@futurecalls.com', 'L2 support'),
(8, '3', 'vengadeshwaran@futurecalls.com', 'L1 support'),
(9, '4', 'santhiya@futurecalls.com', 'Administrator'),
(10, '4', 'manikandan@futurecalls.com', 'Super Admin');

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
(3, 'Inbound', 'Net5105', NULL, 'Network and Data', 'networking', 'email,oncall', 'veera@futurecalls.com', '2019-11-21 06:47:04'),
(4, 'Inbound', 'FTO5105', NULL, 'Software', 'crm support', 'email,oncall', 'manikandan@futurecalls.com', '2019-12-06 06:08:17'),
(5, 'Inbound', 'Tel4102', NULL, 'Telecom', 'Managed Telecom(TATA)', 'email,oncall', 'pradeep@futurecalls.com', '2019-11-21 06:47:26');

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
(27, '4', 8, 'software support', '2019-12-06 12:57:17');

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
(6, 'Cit1111', 'sandigopalan@gmail.com', '9843644039', 'On call Ticket', 'On call ticket Test', 'P2', '111226', 'Close', 1, '1', '2', 'Not Assigned', 'fgjmnfgj', '2019-12-09 12:11:27', '2019-12-10 17:29:56');

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
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `ticketID`, `from_email`, `to_email`, `subject`, `description`, `attachment`, `created_at`) VALUES
(3, '040123', 'helpdesk@futurecalls.com', 'sandigopalan@gmail.com', 'Holiday IVR not working', 'Kindly share the holiday list we will check', '', '2019-12-06 13:53:48'),
(4, '040123', 'sandigopalan@gmail.com', 'helpdesk@futurecalls.com', 'Re: [040123#]Holiday IVR not working', 'Holiday list already uploaded in DB\r\n\r\nOn Fri, Dec 6, 2019 at 1:53 PM <helpdesk@futurecalls.com> wrote:\r\n\r\n> Kindly share the holiday list we will check\r\n>\r\n> Thanks & Regards,\r\n>\r\n> Futurecalls Helpdesk Team\r\n>\r\n> Note: Do not change the subject line While replying this message\r\n>\r\n', NULL, '2019-12-06 13:55:21'),
(6, '390529', 'helpdesk@futurecalls.com', 'pradeepvnair2001@yahoo.co.in', 'ticket', 'Dear Customer,  This ticket will be assigned to mr. dillibabu. He will be contact You soon.\r\nContact No: 9845123659', '', '2019-12-06 17:48:03'),
(7, '390529', 'pradeepvnair2001@yahoo.co.in', 'helpdesk@futurecalls.com', 'Re: [390529#]ticket', ' \r\nok please complete ASAP    On Friday, 6 December, 2019, 05:48:06 pm IST, helpdesk@futurecalls.com <helpdesk@futurecalls.com> wrote:  \r\n \r\n Dear Customer, This ticket will be assigned to mr. dillibabu. He will be contact You soon.Contact No: 9845123659\r\nThanks & Regards,\r\n\r\nFuturecalls Helpdesk Team\r\n\r\nNote: Do not change the subject line While replying this message\r\n  ', NULL, '2019-12-06 17:51:44'),
(18, '141040', 'sandigopalan@gmail.com', 'helpdesk@futurecalls.com', 'Re: [141040#]outbound not working', 'Please resolve asap\r\n\r\nOn Mon, Dec 9, 2019 at 10:16 AM <helpdesk@futurecalls.com> wrote:\r\n\r\n> Dear Customer, Your ticket has been updated please check updates\r\n>\r\n> ticket number is  141040\r\n>\r\n> Thanks & Regards,\r\n>\r\n> Futurecalls Helpdesk Team\r\n>\r\n> Note: Do not change the subject line While replying this message\r\n>\r\n', NULL, '2019-12-09 10:22:13'),
(20, '011152', 'helpdesk@futurecalls.com', 'kathiresun.vr@gmail.com', 'Unable to print of invoice', 'please find the attachment', 'focus.png', '2019-12-09 11:09:33'),
(21, '011152', 'kathiresun.vr@gmail.com', 'helpdesk@futurecalls.com', 'Re: [011152#]Unable to print of invoice', 'RESENDING the info\r\nHi Team,\r\n\r\nThank you for your email and update.\r\n\r\nRegards,\r\nKathiresan.V\r\n\r\n\r\nOn Mon, Dec 9, 2019 at 11:11 AM kathiresun veerappan <\r\nkathiresun.vr@gmail.com> wrote:\r\n\r\n> Hi Team,\r\n>\r\n> Thank you for your email and update.\r\n>\r\n> Regards,\r\n> Kathiresan.V\r\n>\r\n> On Mon, Dec 9, 2019 at 11:02 AM <helpdesk@futurecalls.com> wrote:\r\n>\r\n>> Dear Customer,\r\n>>\r\n>> Your Ticket has been created successfully. Your ticket number is  011152\r\n>>\r\n>> Thanks & Regards,\r\n>>\r\n>> Futurecalls Helpdesk Team\r\n>>\r\n>\r\n', NULL, '2019-12-09 11:15:02'),
(22, '011152', 'kathiresun.vr@gmail.com', 'helpdesk@futurecalls.com', 'Re: [011152#]Unable to print of invoice', '--00000000000012d08c05993f0cb8\r\nContent-Type: text/plain; charset=\"UTF-8\"\r\n\r\nI am here with sending the attachment.\r\n\r\nRegards,\r\nKathiresan.V\r\n\r\nOn Mon, Dec 9, 2019 at 11:15 AM <helpdesk@futurecalls.com> wrote:\r\n\r\n> Dear Customer,\r\n>\r\n> Your Request has been received. Our support executive will contact you\r\n> soon.\r\n>\r\n> Thanks & Regards,\r\n>\r\n> Futurecalls Helpdesk Team\r\n>\r\n\r\n--00000000000012d08c05993f0cb8\r\nContent-Type: text/html; charset=\"UTF-8\"\r\nContent-Transfer-Encoding: quoted-printable\r\n\r\n<div dir=3D\"ltr\">I am here with sending the attachment.<div><br></div><div>=\r\nRegards,</div><div>Kathiresan.V</div></div><br><div class=3D\"gmail_quote\"><=\r\ndiv dir=3D\"ltr\" class=3D\"gmail_attr\">On Mon, Dec 9, 2019 at 11:15 AM &lt;<a=\r\n href=3D\"mailto:helpdesk@futurecalls.com\">helpdesk@futurecalls.com</a>&gt; =\r\nwrote:<br></div><blockquote class=3D\"gmail_quote\" style=3D\"margin:0px 0px 0=\r\npx 0.8ex;border-left:1px solid rgb(204,204,204);padding-left:1ex\"><p>Dear C=\r\nustomer,</p><p>Your Request has been received. Our support executive will c=\r\nontact you soon. </p><p>Thanks &amp; Regards,</p><p>Futurecalls Helpdesk Te=\r\nam</p>\r\n\r\n</blockquote></div>\r\n\r\n--00000000000012d08c05993f0cb8--', 'expelo.xlsx', '2019-12-09 11:26:13'),
(23, '111226', 'helpdesk@futurecalls.com', 'sandigopalan@gmail.com', 'On call Ticket', 'hghghfghf', 'email-issue.png', '2019-12-09 15:09:07'),
(24, '040123', 'helpdesk@futurecalls.com', 'sandigopalan@gmail.com', 'Holiday IVR not working', 'this ticket not assigned', 'pen.png', '2019-12-09 16:46:53'),
(25, '111226', 'helpdesk@futurecalls.com', 'sandigopalan@gmail.com', 'On call Ticket', 'test message', 'sales target.jpg', '2019-12-09 17:03:07'),
(26, '111226', 'helpdesk@futurecalls.com', 'sandigopalan@gmail.com', 'On call Ticket', 'mail attachment not loaded properly', 'Funds India _ ThankIng_ Msg.jpg', '2019-12-09 17:12:42');

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
  `id` int(10) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `subject` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `campaign_ID` varchar(250) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_leads`
--

INSERT INTO `email_leads` (`id`, `email`, `subject`, `description`, `campaign_ID`, `created_at`) VALUES
(1, 'santhiya@futurecalls.com', 'Email Lead', 'Hi please contact me this number  7358650128 I need CRM requirement\r\n\r\n', '2', '2019-10-17 14:56:08'),
(2, 'manikandan@futurecalls.com', '', '', '2', '2019-10-17 16:52:18'),
(3, 'veera@futurecalls.com', 'test', 'test\r\n', '2', '2019-10-17 16:52:21');

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
(33, '3', 'L4', 'Tamilarasan', 'santhiya@futurecalls.com', '9845123659', '2019-08-16 15:28:56');

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
(32, 'dillibabu@futurecalls.com', '10.10.10.62', '2019-12-10 17:30:39', 'Google Chrome', 'windows', '78.0.3904.108');

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
(8, 'software support', 'Onsite support', '0000-00-00 00:00:00'),
(9, 'Telecom Support', 'tata ILL support', '0000-00-00 00:00:00'),
(10, 'others', 'Email process', '0000-00-00 00:00:00');

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
  `l4` int(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `clientID`, `email`, `number`, `subject`, `description`, `severity`, `ticketID`, `status`, `closing_status`, `time`, `campaign_ID`, `process`, `assigned_to`, `role`, `attachment`, `created_at`, `l1`, `l2`, `l3`, `l4`) VALUES
(1, 'Cit1111', 'sandigopalan@gmail.com', '9843644039', 'Holiday IVR not working', 'Team, Holiday IVR is not working. whenever holiday it plays only hold message', 'P1', '040123', 'Open', 0, NULL, '1', '2', 'Not Assigned', NULL, '', '2019-12-06 13:04:26', 0, 0, 0, 0),
(11, 'GRT3712', 'kathiresun.vr@gmail.com', '7825888824', 'Unable to print of invoice', 'Hi Team,\r\n\r\nUnable to print of invoice\r\n\r\n\r\nRegards,\r\nKathiresan.V\r\n', 'P2', '011152', 'Open', 2, NULL, '1', '1', 'dillibabu@futurecalls.com', NULL, NULL, '2019-12-09 11:01:54', 0, 0, 0, 0),
(10, 'Gem0403', 'pradeepvnair2001@yahoo.co.in', '9787141830', 'ticket', 'hi\r\nplz add ticket', 'P2', '231050', 'Open', 0, NULL, '1', '1', 'Not Assigned', NULL, NULL, '2019-12-09 10:24:02', 0, 0, 0, 0),
(12, 'GRT3712', 'kathiresun.vr@gmail.com', '7825888824', 'Sending attachment to check whether its getting added', '--0000000000003a653d05993f025a\r\nContent-Type: text/plain; charset=\"UTF-8\"\r\n\r\nHi All,\r\n\r\nSending attachment to check whether its getting added to the ticket.\r\n\r\nRegards,\r\nKathiresan.V\r\n\r\n--0000000000003a653d05993f025a\r\nContent-Type: text/html; charset=\"UTF', 'P2', '231125', 'Open', 0, NULL, '1', '1', 'Not Assigned', NULL, 'test.txt', '2019-12-09 11:23:29', 0, 0, 0, 0),
(9, 'Cit1111', 'sandigopalan@gmail.com', '9843644039', 'outbound not working', 'outbound not working', 'P4', '141040', 'Close', 2, NULL, '1', '2', 'dillibabu@futurecalls.com', 'L3 support', '', '2019-12-09 10:14:50', 0, 0, 0, 0),
(8, 'Cit1111', 'sandigopalan@gmail.com', '9843644039', 'Mobile number validation test', 'mobile number validation\r\n', 'P2', '280602', 'Open', 0, NULL, '1', '2', 'Not Assigned', NULL, NULL, '2019-12-06 18:28:05', 0, 0, 0, 0),
(7, 'Gem0403', 'pradeepvnair2001@yahoo.co.in', '9787141830', 'ticket', 'please address my desk phone did number', 'P2', '390529', 'Open', 0, NULL, '1', '1', 'dillibabu@futurecalls.com', 'L3 support', NULL, '2019-12-06 17:39:31', 0, 0, 0, 0),
(13, 'Cit1111', 'sandigopalan@gmail.com', '9843644039', 'On call Ticket', 'On call ticket Test', 'P2', '111226', 'Open', 0, NULL, '1', '2', 'Not Assigned', NULL, '', '2019-12-09 12:11:27', 0, 0, 0, 0),
(14, 'GRT3712', 'kathiresun.vr@gmail.com', '7825888824', 'Monitor Issue', 'Monitor not working', 'P4', '161248', 'Open', 0, NULL, '1', '1', 'dillibabu@futurecalls.com', 'L3 support', '', '2019-12-09 12:16:49', 0, 0, 0, 0);

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
(7, 'Internal User', 'remote', 'Chennai', 'FC00103', 'Pradeep V.Nair', 'pradeep@futurecalls.com', 'Pradeep V.Nair', '9884246046', 'Team leader', '$2y$10$AfNCcKe.pr6v8eC9LJYLhuPxlHw7S/LClYfNugPKuhT4Pk.r3R1ze', 0, '2019-06-20 14:19:13', 2, '2019-10-25 08:04:52', '1', NULL),
(12, 'Internal User', 'remote', 'Chennai', '188', 'Devakumar', 'devakumar@futurecalls.com', 'Devakumar', '9994178714', 'L3 support', '$2y$10$C7irSjbcR4kheRj9xph0cOqpdDUc/kS2C4Tk72xs5QbGnwfCekcca', 0, '2019-07-17 22:56:31', 2, '2019-08-29 09:45:49', '1', NULL),
(13, 'Internal User', 'remote', 'Chennai', '203', 'SURESH JULURI', 'suresh.j@futurecalls.com', 'SURESH JULURI', '8939991513', 'Team leader', '$2y$10$iiESXSP6PGA8yhBKZjHRSe0krGCnptbUOE0QKJaqMMBq67epca6b2', 0, '2019-07-17 23:12:00', 1, NULL, '1', NULL),
(14, 'Internal User', 'remote', 'Chennai', '212', 'DILLI BABU G', 'dillibabu@futurecalls.com', 'DILLI BABU G', '9884154605', 'L3 support', '$2y$10$Xri3W7tazvVuOBvBirT2JeYo6AC7.HGjwMTXnQ1ef/n2zgVjsTMGm', 0, '2019-07-17 23:13:09', 2, '2019-12-09 05:32:53', '1', NULL),
(16, 'Internal User', 'remote', 'Chennai', '252', 'KARTHIK R', 'karthik@futurecalls.com', 'KARTHIK R', '7904883593', 'L2 support', '$2y$10$EHnd9tTXJodgHk3IvhTubenf3yEzdcy2TJRq2v8qa1HQDwddECTd2', 0, '2019-07-17 23:15:40', 1, NULL, '1', NULL),
(18, 'Internal User', 'remote', 'Chennai', '301', 'T VENGADESHWARAN', 'vengadeshwaran@futurecalls.com', 'T VENGADESHWARAN', '7339274140', 'L1 support', '$2y$10$ILUonbeQbBK1YRgXTcVjC.3TKWZFpwyQm1Bs2WdtDou.UvEu/2yc.', 0, '2019-07-17 23:19:32', 1, NULL, '1', NULL),
(62, 'GRT3712', '', 'Chennai', 'EMP001', 'Mr.kathiresun', 'kathiresun.vr@gmail.com', 'Mr.kathiresun', '7825888824', 'Customer', '$2y$10$uXHVPtU3QbI1a7VGBuzuF.YospGsf5d6FQtZtI16RTLiQLZOGTTlG', 1, '2019-12-06 12:42:36', 2, '2019-12-09 06:50:47', '1', NULL),
(63, 'Cit1111', '', 'Chennai', 'EMP002', 'CUB', 'sandigopalan@gmail.com', 'CUB', '9843644039', 'Customer', '$2y$10$z9.BpaoacDE4ENfkg1GAoOEK9UYqzGB9zmdssnm/xL8Wq1U5gedim', 0, '2019-12-06 12:44:01', 1, NULL, '1', NULL),
(64, 'Gem0403', '', 'Chennai', 'EMP002', 'GEM Hospital', 'pradeepvnair2001@yahoo.co.in', 'GEM', '9787141830', 'Customer', '$2y$10$HvJk3autWChke95tAcFCtelzGyLYBVCTSexonbufiEF2hCuM.9.KC', 0, '2019-12-06 12:47:58', 1, NULL, '1', NULL),
(65, 'GRT3712', '', 'Chennai', 'EMP001', 'Kathiresun', 'kathiresun_vr@yahoo.com', 'Kathiresun', '9444653781', 'Customer', '$2y$10$Ly8aKoiRV.rcVcTrlZXAAu0RzQnROoMVjoNa9/M7Yi1pXYJ.ye4cq', 0, '2019-12-09 10:47:56', 1, NULL, '1', NULL),
(66, 'Internal User', '', 'Chennai', 'EMP001', 'Venkatesan', 'venkatesan@futurecalls.com', 'Venkatesan', '9845781245', 'Service Head', '$2y$10$SS6JJAwvk6Ii5XkzwAk3EORYJ0F9R5VZYmf45ZgYmCNfl1sBjl17e', 1, '2019-12-09 11:58:17', 2, '2019-12-09 06:28:31', '1', NULL);

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
-- Indexes for table `closedtickets`
--
ALTER TABLE `closedtickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_feedback`
--
ALTER TABLE `customer_feedback`
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
-- Indexes for table `management_info`
--
ALTER TABLE `management_info`
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
-- Indexes for table `violations`
--
ALTER TABLE `violations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent_master`
--
ALTER TABLE `agent_master`
  MODIFY `agent_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `campaign_client`
--
ALTER TABLE `campaign_client`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `campaign_master`
--
ALTER TABLE `campaign_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `campaign_service`
--
ALTER TABLE `campaign_service`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_feedback`
--
ALTER TABLE `customer_feedback`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `encryption_test`
--
ALTER TABLE `encryption_test`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `escalation_master`
--
ALTER TABLE `escalation_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `knowledge_base`
--
ALTER TABLE `knowledge_base`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loginhistory`
--
ALTER TABLE `loginhistory`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `management_info`
--
ALTER TABLE `management_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notification_master`
--
ALTER TABLE `notification_master`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `violations`
--
ALTER TABLE `violations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
