-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2022 at 12:24 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visaclapems`
--

-- --------------------------------------------------------

--
-- Table structure for table `country_visa`
--

CREATE TABLE `country_visa` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `visa_type_id` int(11) NOT NULL,
  `price` varchar(20) DEFAULT NULL,
  `visa_validity` varchar(20) DEFAULT NULL,
  `length_of_stay` varchar(20) DEFAULT NULL,
  `time_to_get_visa` varchar(20) DEFAULT NULL,
  `entry_type` varchar(20) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `service_charge` varchar(20) DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country_visa`
--

INSERT INTO `country_visa` (`id`, `country_id`, `visa_type_id`, `price`, `visa_validity`, `length_of_stay`, `time_to_get_visa`, `entry_type`, `description`, `service_charge`, `date`) VALUES
(120, 160, 127, '4000-?', '30-Days', '30-Days', '30-Days', 'Single', 'This is for malaysia visa', '500-?', '2022-08-23 05:06:43'),
(121, 160, 129, '3600-$', '30-Days', '30-Days', '30-Days', 'Single', 'this is for tourism', '1000-?', '2022-08-23 05:07:39'),
(122, 49, 130, '0-$', '90-Days', '90-Days', '0-Days', 'Multiple', 'You can visit china for 90 days', '0-$', '2022-08-29 13:58:03'),
(123, 49, 131, '0-$', '60-Days', '60-Days', '0-Days', 'Multiple', 'You can travel to china without any visa', '0-$', '2022-08-29 14:04:15'),
(124, 49, 132, '0-$', '30-Days', '30-Days', '0-Days', 'Multiple', 'you can travel to visa without any visa', '0-$', '2022-08-29 14:04:42'),
(125, 49, 133, '0-$', '15-Days', '15-Days', '15-Days', 'Multiple', 'you can travel to visa without any visa', '0-$', '2022-08-29 14:05:02'),
(126, 13, 134, '0-$', 'unlimited-Days', 'unlimited-Days', '0-Days', 'Multiple', 'You can travel unlimited times', '0-$', '2022-08-29 14:49:53'),
(127, 21, 134, '0-$', 'unlimited-Days-Days', 'unlimited-Days-Days', '0-Days', 'Multiple', 'You can travel unlimited times', '0-$', '2022-08-29 14:55:57'),
(128, 256, 134, '0-$', 'unlimited-Days-Days', 'unlimited-Days-Days', '0-Days', 'Multiple', 'You can travel unlimited times', '0-$', '2022-08-29 14:55:59'),
(129, 61, 134, '0-$', 'unlimited-Days-Days', 'unlimited-Days-Days', '0-Days', 'Multiple', 'You can travel unlimited times', '0-$', '2022-08-29 14:56:01'),
(130, 66, 134, '0-$', 'unlimited-Days-Days', 'unlimited-Days-Days', '0-Days', 'Multiple', 'You can travel unlimited times', '0-$', '2022-08-29 14:56:03'),
(131, 72, 134, '0-$', 'unlimited-Days-Days', 'unlimited-Days-Days', '0-Days', 'Multiple', 'You can travel unlimited times', '0-$', '2022-08-29 14:56:05'),
(132, 77, 134, '0-$', 'unlimited-Days-Days', 'unlimited-Days-Days', '0-Days', 'Multiple', 'You can travel unlimited times', '0-$', '2022-08-29 14:56:07'),
(133, 59, 134, '0-$', 'unlimited-Days-Days', 'unlimited-Days-Days', '0-Days', 'Multiple', 'You can travel unlimited times', '0-$', '2022-08-29 14:56:09'),
(134, 91, 134, '0-$', 'unlimited-Days-Days', 'unlimited-Days-Days', '0-Days', 'Multiple', 'You can travel unlimited times', '0-$', '2022-08-29 14:56:11'),
(135, 102, 134, '0-$', 'unlimited-Days-Days', 'unlimited-Days-Days', '0-Days', 'Multiple', 'You can travel unlimited times', '0-$', '2022-08-29 14:56:13'),
(136, 111, 134, '0-$', 'unlimited-Days-Days', 'unlimited-Days-Days', '0-Days', 'Multiple', 'You can travel unlimited times', '0-$', '2022-08-29 14:56:15'),
(137, 112, 134, '0-$', 'unlimited-Days-Days', 'unlimited-Days-Days', '0-Days', 'Multiple', 'You can travel unlimited times', '0-$', '2022-08-29 14:56:16'),
(138, 137, 134, '0-$', 'unlimited-Days-Days', 'unlimited-Days-Days', '0-Days', 'Multiple', 'You can travel unlimited times', '0-$', '2022-08-29 14:56:18'),
(139, 131, 134, '0-$', 'unlimited-Days-Days', 'unlimited-Days-Days', '0-Days', 'Multiple', 'You can travel unlimited times', '0-$', '2022-08-29 14:56:19'),
(140, 135, 134, '0-$', 'unlimited-Days-Days', 'unlimited-Days-Days', '0-Days', 'Multiple', 'You can travel unlimited times', '0-$', '2022-08-29 14:56:20'),
(141, 136, 134, '0-$', 'unlimited-Days-Days', 'unlimited-Days-Days', '0-Days', 'Multiple', 'You can travel unlimited times', '0-$', '2022-08-29 14:56:21'),
(142, 155, 134, '0-$', 'unlimited-Days-Days', 'unlimited-Days-Days', '0-Days', 'Multiple', 'You can travel unlimited times', '0-$', '2022-08-29 14:56:23'),
(143, 168, 134, '0-$', 'unlimited-Days-Days', 'unlimited-Days-Days', '0-Days', 'Multiple', 'You can travel unlimited times', '0-$', '2022-08-29 14:56:25'),
(144, 169, 134, '0-$', 'unlimited-Days-Days', 'unlimited-Days-Days', '0-Days', 'Multiple', 'You can travel unlimited times', '0-$', '2022-08-29 14:56:28'),
(145, 181, 134, '0-$', 'unlimited-Days-Days', 'unlimited-Days-Days', '0-Days', 'Multiple', 'You can travel unlimited times', '0-$', '2022-08-29 14:56:30'),
(146, 186, 134, '0-$', 'unlimited-Days-Days', 'unlimited-Days-Days', '0-Days', 'Multiple', 'You can travel unlimited times', '0-$', '2022-08-29 14:56:31'),
(147, 204, 134, '0-$', 'unlimited-Days-Days', 'unlimited-Days-Days', '0-Days', 'Multiple', 'You can travel unlimited times', '0-$', '2022-08-29 14:56:33'),
(148, 202, 134, '0-$', 'unlimited-Days-Days', 'unlimited-Days-Days', '0-Days', 'Multiple', 'You can travel unlimited times', '0-$', '2022-08-29 14:56:34'),
(149, 70, 134, '0-$', 'unlimited-Days-Days', 'unlimited-Days-Days', '0-Days', 'Multiple', 'You can travel unlimited times', '0-$', '2022-08-29 14:56:35'),
(150, 199, 134, '0-$', 'unlimited-Days-Days', 'unlimited-Days-Days', '0-Days', 'Multiple', 'You can travel unlimited times', '0-$', '2022-08-29 14:56:37'),
(151, 44, 134, '0-$', 'unlimited-Days-Days', 'unlimited-Days-Days', '0-Days', 'Multiple', 'You can travel unlimited times', '0-$', '2022-08-29 14:56:39'),
(152, 227, 138, '0-$', '180-Days', '90-Days', '0-Days', 'Multiple', 'Turkish Visa for tourism and business countries for specific countries.', '0-$', '2022-09-01 14:52:41'),
(153, 227, 139, '0-$', '180-Days', '60-Days', '0-Days', 'Multiple', 'Turkey 60 Days Visa Free travel', '0-$', '2022-09-01 14:59:39'),
(154, 227, 140, '0-$', '180-Days', '30-Days', '0-Days', 'Multiple', 'Turkey 30 days Visa free travel', '0-$', '2022-09-01 15:01:41'),
(155, 227, 137, '10-$', '180-Days', '30-Days', '2-Days', 'Single', 'This is only for single entry 30 days stay', '30-$', '2022-09-01 15:59:59'),
(156, 227, 141, '10-$', '180-Days', '90-Days', '2-Days', 'Multiple', 'this is for multiple entry visa', '20-$', '2022-09-01 16:00:36'),
(157, 227, 142, '10-$', '30-Days', '30-Days', '2-Days', 'Single', 'this visa is only for certain nationals', '20-$', '2022-09-01 16:05:33'),
(162, 63, 130, '0-$', '90-Days', '90-Days', '0-Days', 'Multiple', 'you can travel with out any visa and stay for 90 days', '0-$', '2022-10-15 08:58:06'),
(163, 6, 130, '0-$', '90-Days', '90-Days', '0-Days', 'Multiple', 'You can travel visa free and stay up to 90 days.', '0-$', '2022-10-15 11:14:20'),
(164, 1, 147, '0-$', '0-Days', '90-Days', '0-Days', 'Multiple', 'visa free to all nationals', '0-$', '2022-10-17 14:13:38'),
(165, 4, 149, '0-$', 'unlimited-Days', 'unlimited-Days', '0-Days', 'Multiple', 'Freedom of movement', '0-$', '2022-10-17 14:42:09'),
(166, 4, 151, '0-$', '6-Month', '6-Month', '0-Days', 'Multiple', 'You can enter with out a visa and stay for 6 months.', '0-$', '2022-10-17 14:50:01'),
(167, 4, 152, '0-$', '1-Month', '1-Month', '0-Days', 'Single', 'You can stay for 1 month', '0-$', '2022-10-17 14:58:18'),
(168, 6, 132, '0-$', '30-Days', '30-Days', '0-Days', 'Multiple', 'You can stay for 30 days without any visa', '0-$', '2022-10-17 15:27:48'),
(169, 9, 137, '120-$', '60-Days', '30-Days', '10-Days', 'Single', 'Tourist Visa', '50-$', '2022-10-17 15:59:33'),
(170, 235, 149, '0-$', 'unlimited-Days', 'unlimited-Days', '0-Days', 'Multiple', 'You can stay as per your wish', '0-$', '2022-10-18 14:55:25'),
(171, 235, 153, '14-$', '2-Year', '90-Days', '4-Days', 'Multiple', 'USA ESTA multiple entry', '20-$', '2022-10-18 15:08:25'),
(172, 7, 150, '0-$', '180-Days', '180-Days', '0-Days', 'Multiple', 'You can visit for any purpose', '0-$', '2022-10-18 15:19:45'),
(173, 7, 130, '0-$', '90-Days', '90-Days', '0-Days', 'Multiple', 'You can stay only upto 90 days', '0-$', '2022-10-18 15:22:58'),
(174, 7, 154, '0-$', '120-Days', '120-Days', '0-Days', 'Multiple', 'you can stay there upto 120 days', '0-$', '2022-10-18 15:31:25'),
(175, 7, 155, '37-$', '120-Days', '120-Days', '3-Days', 'Multiple', 'This is for multiple entry', '30-$', '2022-10-18 15:36:01');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `symbol` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `name`, `symbol`, `date`) VALUES
(10, 'USD', '$', '2022-04-14 16:58:14'),
(11, 'INR', '₹', '2022-04-14 16:58:27'),
(12, 'EURO', '€', '2022-05-15 07:41:29');

-- --------------------------------------------------------

--
-- Table structure for table `document_group`
--

CREATE TABLE `document_group` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `document_id` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document_group`
--

INSERT INTO `document_group` (`id`, `name`, `document_id`, `date`) VALUES
(56, 'malaysia visiting visa document group', '63,64,65,66,67', '2022-08-23 05:08:55'),
(57, 'Turkey 30,60,90 days visa free', '68', '2022-09-01 15:39:18'),
(62, 'Dominican Republic 90 days visa free document group', '63,64,80,81', '2022-10-15 09:00:00'),
(63, 'Albania 90 days visa free documents', '63,64,80,82,83', '2022-10-15 11:15:15'),
(64, 'andorra visa free documents', '', '2022-10-17 14:15:40'),
(65, 'Antigua and Barbuda documents for freedom of travel visa', '68,82', '2022-10-17 14:42:51'),
(66, 'Antigua and Barbuda documents for visa free 6 months', '63,64,67,68,80,81,82', '2022-10-17 14:52:32'),
(67, 'Antigua and Barbuda documents for visa free 1 month', '63,64,67,68,80,81,82', '2022-10-17 14:58:24'),
(68, 'Albania 30 days visa free documents', '63,64,80,82', '2022-10-17 15:28:18'),
(69, 'angola 30 days e-visa document', '63,64,65,67,80,81,84', '2022-10-17 16:08:57'),
(70, 'United States Freedom of movement documents', '64,68,80,81,82', '2022-10-18 14:55:54'),
(71, 'United States ESTA Document group', '80', '2022-10-18 15:01:35'),
(72, 'armenia 180 days documents', '63,64,67,80,81', '2022-10-18 15:20:43'),
(73, 'armenia 90 days documents', '63,64,67,80,81', '2022-10-18 15:23:11'),
(74, 'Basic Visa on Arrival Documents Master', '63,64,67,81,85', '2022-10-18 15:29:25'),
(75, 'Armenia e-Visa 120 Days Documents', '63,64,67,81,85', '2022-10-18 15:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `embassy`
--

CREATE TABLE `embassy` (
  `id` int(11) NOT NULL,
  `origin_country` int(11) NOT NULL,
  `destination_country` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fax` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `website` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `info_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `title`, `description`, `date`) VALUES
(25, 'india visiting visa form', 'india visiting visa form', '2022-06-09 09:49:33'),
(26, 'Malaysia form', 'Malaysia visiting visa form', '2022-09-04 12:36:37'),
(27, '', '', '2022-09-04 12:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `instructions`
--

CREATE TABLE `instructions` (
  `id` int(11) NOT NULL,
  `info_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `required_document`
--

CREATE TABLE `required_document` (
  `id` int(11) NOT NULL,
  `name` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `required_document`
--

INSERT INTO `required_document` (`id`, `name`, `date`) VALUES
(63, 'up and down flight ticket', '2022-06-28 06:39:30'),
(64, 'vaccination certificate', '2022-06-28 06:39:40'),
(65, 'Passport front and back picture', '2022-08-23 05:07:51'),
(66, 'Malaysia Passport size photo ', '2022-08-23 05:08:11'),
(67, 'Hotel confirmation (if you dont have any friends or family or business associates)', '2022-08-23 05:08:30'),
(68, 'Passport or Travel Document or ID card for certain countries', '2022-09-01 15:39:01'),
(80, 'Original Passport Issued by your country', '2022-10-15 08:59:16'),
(81, 'Medical Insurance', '2022-10-15 08:59:46'),
(82, 'ID Card for certain countries', '2022-10-15 11:14:42'),
(83, 'may enter using a national ID card or Irish passport card', '2022-10-17 15:33:26'),
(84, 'Passports must have a validity of 9 months and at least 2 blank pages', '2022-10-17 15:50:37'),
(85, 'Passports must have a validity of 6 months and at least 2 blank pages	', '2022-10-18 15:29:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attribute_value`
--

CREATE TABLE `tbl_attribute_value` (
  `id` int(11) NOT NULL,
  `form_attribute_id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `value` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_attribute_value`
--

INSERT INTO `tbl_attribute_value` (`id`, `form_attribute_id`, `name`, `value`) VALUES
(13, 101, 'Male', NULL),
(14, 101, 'Female', NULL),
(15, 123, 'Male', NULL),
(16, 123, 'Female', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE `tbl_country` (
  `id` int(5) NOT NULL,
  `code` varchar(20) DEFAULT '',
  `name` varchar(100) NOT NULL DEFAULT '',
  `currency` varchar(20) DEFAULT NULL,
  `capital` varchar(200) DEFAULT NULL,
  `area` text DEFAULT NULL,
  `languages` text DEFAULT NULL,
  `neighbour` text DEFAULT NULL,
  `description` text NOT NULL,
  `kind_of_visa` text DEFAULT NULL,
  `flag` varchar(200) DEFAULT NULL,
  `flag16` varchar(200) DEFAULT NULL,
  `flag32` varchar(200) DEFAULT NULL,
  `flag64` varchar(200) DEFAULT NULL,
  `place_image` varchar(200) DEFAULT NULL,
  `origin_slug` varchar(200) DEFAULT NULL,
  `destination_slug` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`id`, `code`, `name`, `currency`, `capital`, `area`, `languages`, `neighbour`, `description`, `kind_of_visa`, `flag`, `flag16`, `flag32`, `flag64`, `place_image`, `origin_slug`, `destination_slug`) VALUES
(1, 'we', 'Andorra', 'Euro (EUR)', 'Andorra la Vella', '468.0 kmÂ²', 'Catalan (ca)', 'Spain, France', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora beatae earum ipsa iusto nihil blanditiis esse fugit quo nam fuga.', '', 'assets/uploads/andorra-flag-icon-128.png', 'assets/uploads/andorra-flag-icon-16.png', 'assets/uploads/andorra-flag-icon-32.png', 'assets/uploads/andorra-flag-icon-64.png', NULL, 'andorra', NULL),
(2, 'saa', 'United Arab Emirates', 'Dirham (AED)', 'Abu Dhabi', '82,880.0 kmÂ²', 'Arabic (ar-AE), Persian (fa), English (en), Hindi (hi), Urdu (ur)', 'Saudi Arabia, Oman', 'asd', '', 'assets/uploads/united-arab-emirates-flag-icon-128.png', 'assets/uploads/united-arab-emirates-flag-icon-16.png', 'assets/uploads/united-arab-emirates-flag-icon-32.png', 'assets/uploads/united-arab-emirates-flag-icon-64.png', NULL, 'united-arab-emirates', ''),
(3, 'AF', 'Afghanistan', 'Afghani (AFN)', 'Kabul', '647,500.0 kmÂ²', 'Persian (fa-AF), Pushto (ps), Uzbek (uz-AF), Turkmen (tk)', 'Turkmenistan, China, Iran, Tajikistan, Pakistan, Uzbekistan', 'sadasd', '', 'assets/uploads/afghanistan-flag-icon-128.png', 'assets/uploads/afghanistan-flag-icon-16.png', 'assets/uploads/afghanistan-flag-icon-32.png', 'assets/uploads/afghanistan-flag-icon-64.png', 'assets/uploads/images.jpg', 'afghanistan', NULL),
(4, 'GD', 'Antigua and Barbuda', 'Dollar (XCD)', 'St John\'s', '443.0 kmÂ²', 'English (en-AG)', 'xz', 'z', '', 'assets/uploads/WhatsApp Image 2020-12-09 at 11.21.22 PM (1).jpeg', 'assets/uploads/WhatsApp Image 2020-12-09 at 11.21.21 PM.jpeg', 'assets/uploads/WhatsApp Image 2020-12-09 at 11.21.21 PM (1).jpeg', 'assets/uploads/WhatsApp Image 2020-12-09 at 11.21.22 PM.jpeg', NULL, 'antigua-and-barbuda', NULL),
(5, '', 'Anguilla', 'Dollar (XCD)', 'The Valley', '102.0 kmÂ²', 'English (en-AI)', '', '', NULL, 'assets/uploads/anguila 128.jpg', 'assets/uploads/anguila 16.jpg', 'assets/uploads/anguila 32.jpg', 'assets/uploads/anguila 64.jpg', NULL, NULL, NULL),
(6, '', 'Albania', 'Lek (ALL)', 'Tirana', '28,748.0 kmÂ²', 'Albanian (sq), Modern Greek (1453-) (el)', 'North Macedonia, Greece, Montenegro, Serbia, Kosovo', '', NULL, 'assets/uploads/albania-flag-icon-128.png', 'assets/uploads/albania-flag-icon-64.png', 'assets/uploads/albania-flag-icon-32.png', 'assets/uploads/albania-flag-icon-64.png', NULL, NULL, NULL),
(7, '', 'Armenia', 'Dram (AMD)', 'Yerevan', '29,800.0 kmÂ²', 'Armenian (hy)', 'Georgia, Iran, Azerbaijan, Turkey', '', NULL, 'assets/uploads/armenia-flag-icon-128.png', 'assets/uploads/armenia-flag-icon-16.png', 'assets/uploads/armenia-flag-icon-32.png', 'assets/uploads/armenia-flag-icon-64.png', NULL, NULL, NULL),
(8, '', 'Netherlands Antilles', 'Guilder (ANG)', '', '960.0 kmÂ²', 'Dutch (nl-AN), English (en), Spanish (es)', 'Guadeloupe', '', NULL, 'assets/uploads/netherlands-flag-icon-128.png', 'assets/uploads/netherlands-flag-icon-16.png', 'assets/uploads/netherlands-flag-icon-32.png', 'assets/uploads/netherlands-flag-icon-64.png', NULL, NULL, NULL),
(9, '', 'Angola', 'Kwanza (AOA)', 'Luanda', '1,246,700.0 kmÂ²', 'Portuguese (pt-AO)', 'DR Congo, Namibia, Zambia, Congo Republic', '', NULL, 'assets/uploads/angola-flag-icon-128.png', 'assets/uploads/angola-flag-icon-16.png', 'assets/uploads/angola-flag-icon-32.png', 'assets/uploads/angola-flag-icon-64.png', NULL, NULL, NULL),
(10, '', 'Antarctica', '()', '', '14,000,000.0 kmÂ²', '', 'Argentina, Australia, Chile, France, United Kingdom, Norway, New Zealand', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '', 'Argentina', 'Peso (ARS)', 'Buenos Aires', '2,766,890.0 kmÂ²', 'Spanish (es-AR), English (en), Italian (it), German (de), French (fr), Guarani (gn)', 'Chile, Bolivia, Uruguay, Paraguay, Brazil', '', NULL, 'assets/uploads/argentina-flag-icon-128.png', 'assets/uploads/argentina-flag-icon-16.png', 'assets/uploads/argentina-flag-icon-32.png', 'assets/uploads/argentina-flag-icon-64.png', NULL, NULL, NULL),
(12, '', 'American Samoa', 'Dollar (USD)', 'Pago Pago', '199.0 kmÂ²', 'English (en-AS), Samoan (sm), Tonga (Tonga Islands) (to)', '', '', NULL, NULL, 'assets/uploads/American-Samoa.png', NULL, NULL, NULL, NULL, NULL),
(13, '', 'Austria', 'Euro (EUR)', 'Vienna', '83,858.0 kmÂ²', 'German (de-AT), Croatian (hr), Hungarian (hu), Slovenian (sl)', 'Switzerland, Germany, Hungary, Slovakia, Czechia, Italy, Slovenia, Liechtenstein', '', NULL, 'assets/uploads/austria-flag-icon-128.jpg', 'assets/uploads/austria-flag-icon-16.png', 'assets/uploads/austria-flag-icon-32.png', 'assets/uploads/austria-flag-icon-64.png', NULL, NULL, NULL),
(14, '', 'Australia', 'Dollar (AUD)', 'Canberra', '7,686,850.0 kmÂ²', 'English (en-AU)', '', '', NULL, 'assets/uploads/australia-flag-icon-128.png', 'assets/uploads/australia-flag-icon-16.png', 'assets/uploads/australia-flag-icon-32.png', 'assets/uploads/australia-flag-icon-64.png', NULL, NULL, NULL),
(15, '', 'Aruba', 'Guilder (AWG)', 'Oranjestad', '193.0 kmÂ²', 'Dutch (nl-AW), Papiamento (pap), Spanish (es), English (en)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '', 'Ã…land', 'Euro (EUR)', 'Mariehamn', '1,580.0 kmÂ²', 'Swedish (sv-AX)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '', 'Azerbaijan', 'Manat (AZN)', 'Baku', '86,600.0 kmÂ²', 'Azerbaijani (az), Russian (ru), Armenian (hy)', 'Georgia, Iran, Armenia, Turkey, Russia', '', NULL, 'assets/uploads/azerbaijan-flag-icon-128.png', 'assets/uploads/azerbaijan-flag-icon-16.png', 'assets/uploads/azerbaijan-flag-icon-32.png', 'assets/uploads/azerbaijan-flag-icon-64.png', NULL, NULL, NULL),
(18, '', 'Bosnia and Herzegovina', 'Marka (BAM)', 'Sarajevo', '51,129.0 kmÂ²', 'Bosnian (bs), Croatian (hr-BA), Serbian (sr-BA)', 'Croatia, Montenegro, Serbia', '', NULL, 'assets/uploads/bosnia-and-herzegovina-flag-icon-128.jpg', 'assets/uploads/bosnia-and-herzegovina-flag-icon-16.png', 'assets/uploads/bosnia-and-herzegovina-flag-icon-32.png', 'assets/uploads/bosnia-and-herzegovina-flag-icon-64.png', NULL, NULL, NULL),
(19, '', 'Barbados', 'Dollar (BBD)', 'Bridgetown', '431.0 kmÂ²', 'English (en-BB)', '', '', NULL, 'assets/uploads/barbados-flag-icon-128.png', 'assets/uploads/barbados-flag-icon-16.png', 'assets/uploads/barbados-flag-icon-32.png', 'assets/uploads/barbados-flag-icon-64.png', NULL, NULL, NULL),
(20, '', 'Bangladesh', 'Taka (BDT)', 'Dhaka', '144,000.0 kmÂ²', 'Bengali (bn-BD), English (en)', 'Myanmar, India', '', NULL, 'assets/uploads/bangladesh-flag-icon-128.png', 'assets/uploads/bangladesh-flag-icon-16.png', 'assets/uploads/bangladesh-flag-icon-32.png', 'assets/uploads/bangladesh-flag-icon-64.png', NULL, NULL, NULL),
(21, '', 'Belgium', 'Euro (EUR)', 'Brussels', '30,510.0 kmÂ²', 'Dutch (nl-BE), French (fr-BE), German (de-BE)', 'Germany, Netherlands, Luxembourg, France', '', NULL, 'assets/uploads/belgium-flag-icon-128.jpg', 'assets/uploads/belgium-flag-icon-16.png', 'assets/uploads/belgium-flag-icon-32.png', 'assets/uploads/belgium-flag-icon-64.png', NULL, NULL, NULL),
(22, '', 'Burkina Faso', 'Franc (XOF)', 'Ouagadougou', '274,200.0 kmÂ²', 'French (fr-BF), Mossi (mos)', 'Niger, Benin, Ghana, Ivory Coast, Togo, Mali', '', NULL, 'assets/uploads/burkina-faso-flag-icon-128.png', 'assets/uploads/burkina-faso-flag-icon-16.png', 'assets/uploads/burkina-faso-flag-icon-32.png', 'assets/uploads/burkina-faso-flag-icon-64.png', NULL, NULL, NULL),
(23, '', 'Bulgaria', 'Lev (BGN)', 'Sofia', '110,910.0 kmÂ²', 'Bulgarian (bg), Turkish (tr-BG), Romany (rom)', 'North Macedonia, Greece, Romania, Turkey, Serbia', '', NULL, 'assets/uploads/bulgaria-flag-icon-128.png', 'assets/uploads/bulgaria-flag-icon-16.png', 'assets/uploads/bulgaria-flag-icon-32.png', 'assets/uploads/bulgaria-flag-icon-64.png', NULL, NULL, NULL),
(24, '', 'Bahrain', 'Dinar (BHD)', 'Manama', '665.0 kmÂ²', 'Arabic (ar-BH), English (en), Persian (fa), Urdu (ur)', '', '', NULL, 'assets/uploads/bahrain-flag-icon-128.png', 'assets/uploads/bahrain-flag-icon-16.png', 'assets/uploads/bahrain-flag-icon-32.png', 'assets/uploads/bahrain-flag-icon-64.png', NULL, NULL, NULL),
(25, '', 'Burundi', 'Franc (BIF)', 'Gitega', '27,830.0 kmÂ²', 'French (fr-BI), Rundi (rn)', 'Tanzania, DR Congo, Rwanda', '', NULL, 'assets/uploads/burundi-flag-icon-128.png', 'assets/uploads/burundi-flag-icon-16.png', 'assets/uploads/burundi-flag-icon-32.png', 'assets/uploads/burundi-flag-icon-64.png', NULL, NULL, NULL),
(26, '', 'Benin', 'Franc (XOF)', 'Porto-Novo', '112,620.0 kmÂ²', 'French (fr-BJ)', 'Niger, Togo, Burkina Faso, Nigeria', '', NULL, 'assets/uploads/benin-flag-icon-128.png', 'assets/uploads/benin-flag-icon-16.png', 'assets/uploads/benin-flag-icon-32.png', 'assets/uploads/benin-flag-icon-64.png', NULL, NULL, NULL),
(27, '', 'Saint BarthÃ©lemy', 'Euro (EUR)', 'Gustavia', '21.0 kmÂ²', 'French (fr)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, '', 'Bermuda', 'Dollar (BMD)', 'Hamilton', '53.0 kmÂ²', 'English (en-BM), Portuguese (pt)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, '', 'Brunei', 'Dollar (BND)', 'Bandar Seri Begawan', '5,770.0 kmÂ²', 'Malay (macrolanguage) (ms-BN), English (en-BN)', 'Malaysia', '', NULL, 'assets/uploads/brunei-flag-icon-128.png', 'assets/uploads/brunei-flag-icon-16.png', 'assets/uploads/brunei-flag-icon-32.png', 'assets/uploads/brunei-flag-icon-64.png', NULL, NULL, NULL),
(30, '', 'Bolivia', 'Boliviano (BOB)', 'Sucre', '1,098,580.0 kmÂ²', 'Spanish (es-BO), Quechua (qu), Aymara (ay)', 'Peru, Chile, Paraguay, Brazil, Argentina', '', NULL, 'assets/uploads/bolivia-flag-icon-128.png', 'assets/uploads/bolivia-flag-icon-16.png', 'assets/uploads/bolivia-flag-icon-32.png', 'assets/uploads/bolivia-flag-icon-64.png', NULL, NULL, NULL),
(31, '', 'Bonaire, Sint Eustatius, and Saba', 'Dollar (USD)', 'Kralendijk', '328.0 kmÂ²', 'Dutch (nl), Papiamento (pap), English (en)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, '', 'Brazil', 'Real (BRL)', 'BrasÃ­lia', '8,511,965.0 kmÂ²', 'Portuguese (pt-BR), Spanish (es), English (en), French (fr)', 'Suriname, Peru, Bolivia, Uruguay, Guyana, Paraguay, French Guiana, Venezuela, Colombia, Argentina', '', NULL, 'assets/uploads/brazil-flag-icon-128.png', 'assets/uploads/brazil-flag-icon-16.png', 'assets/uploads/brazil-flag-icon-32.png', 'assets/uploads/brazil-flag-icon-64.png', NULL, NULL, NULL),
(33, '', 'Bahamas', 'Dollar (BSD)', 'Nassau', '13,940.0 kmÂ²', 'English (en-BS)', '', '', NULL, 'assets/uploads/bahamas-flag-icon-128.png', 'assets/uploads/bahamas-flag-icon-16.png', 'assets/uploads/bahamas-flag-icon-32.png', 'assets/uploads/bahamas-flag-icon-64.png', NULL, NULL, NULL),
(34, '', 'Bhutan', 'Ngultrum (BTN)', 'Thimphu', '47,000.0 kmÂ²', 'Dzongkha (dz)', 'China, India', '', NULL, 'assets/uploads/bhutan-flag-icon-128.png', 'assets/uploads/bhutan-flag-icon-16.png', 'assets/uploads/bhutan-flag-icon-32.png', 'assets/uploads/bhutan-flag-icon-64.png', NULL, NULL, NULL),
(35, '', 'Bouvet Island', 'Krone (NOK)', '', '49.0 kmÂ²', '()', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, '', 'Botswana', 'Pula (BWP)', 'Gaborone', '600,370.0 kmÂ²', 'English (en-BW), Tswana (tn-BW)', 'Zimbabwe, South Africa, Namibia', '', NULL, 'assets/uploads/botswana-flag-icon-128.png', 'assets/uploads/botswana-flag-icon-16.png', 'assets/uploads/botswana-flag-icon-32.png', 'assets/uploads/botswana-flag-icon-64.png', NULL, NULL, NULL),
(37, '', 'Belarus', 'Belarusian ruble (BY', 'Minsk', '207,600.0 kmÂ²', 'Belarusian (be), Russian (ru)', 'Poland, Lithuania, Ukraine, Russia, Latvia', '', NULL, 'assets/uploads/belarus-flag-icon-128.png', 'assets/uploads/belarus-flag-icon-16.png', 'assets/uploads/belarus-flag-icon-32.png', 'assets/uploads/belarus-flag-icon-64.png', NULL, NULL, NULL),
(38, '', 'Belize', 'Dollar (BZD)', 'Belmopan', '22,966.0 kmÂ²', 'English (en-BZ), Spanish (es)', 'Guatemala, Mexico', '', NULL, 'assets/uploads/belize-flag-icon-128.png', 'assets/uploads/belize-flag-icon-16.png', 'assets/uploads/belize-flag-icon-32.png', 'assets/uploads/belize-flag-icon-64.png', NULL, NULL, NULL),
(39, '', 'Canada', 'Dollar (CAD)', 'Ottawa', '9,984,670.0 kmÂ²', 'English (en-CA), French (fr-CA), Inuktitut (iu)', 'United States', '', NULL, 'assets/uploads/canada-flag-icon-128.png', 'assets/uploads/canada-flag-icon-16.png', 'assets/uploads/canada-flag-icon-32.png', 'assets/uploads/canada-flag-icon-64.png', NULL, NULL, NULL),
(40, '', 'Cocos [Keeling] Islands', 'Dollar (AUD)', 'West Island', '14.0 kmÂ²', 'Malay (macrolanguage) (ms-CC), English (en)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, '', 'DR Congo', 'Franc (CDF)', 'Kinshasa', '2,345,410.0 kmÂ²', 'French (fr-CD), Lingala (ln), Kituba (Democratic Republic of Congo) (ktu), Kongo (kg), Swahili (macrolanguage) (sw), Luba-Lulua (lua)', 'Tanzania, Central African Republic, South Sudan, Rwanda, Zambia, Burundi, Uganda, Congo Republic, Angola', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, '', 'Central African Republic', 'Franc (XAF)', 'Bangui', '622,984.0 kmÂ²', 'French (fr-CF), Sango (sg), Lingala (ln), Kongo (kg)', 'Chad, Sudan, DR Congo, South Sudan, Cameroon, Congo Republic', '', NULL, 'assets/uploads/central-african-republic-flag-icon-128.png', 'assets/uploads/central-african-republic-flag-icon-16.png', 'assets/uploads/central-african-republic-flag-icon-32.png', 'assets/uploads/central-african-republic-flag-icon-64.png', NULL, NULL, NULL),
(43, '', 'Congo Republic', 'Franc (XAF)', 'Brazzaville', '342,000.0 kmÂ²', 'French (fr-CG), Kongo (kg), Lingala (ln-CG)', 'Central African Republic, Gabon, DR Congo, Cameroon, Angola', '', NULL, 'assets/uploads/congo-republic-of-the-flag-icon-128.png', 'assets/uploads/congo-republic-of-the-flag-icon-16.png', 'assets/uploads/congo-republic-of-the-flag-icon-32.png', 'assets/uploads/congo-republic-of-the-flag-icon-64.png', NULL, NULL, NULL),
(44, '', 'Switzerland', 'Franc (CHF)', 'Bern', '41,290.0 kmÂ²', 'German (de-CH), French (fr-CH), Italian (it-CH), Romansh (rm)', 'Germany, Italy, Liechtenstein, France, Austria', '', NULL, 'assets/uploads/switzerland-flag-icon-128.png', 'assets/uploads/switzerland-flag-icon-16.png', 'assets/uploads/switzerland-flag-icon-32.png', 'assets/uploads/switzerland-flag-icon-64.png', NULL, NULL, NULL),
(45, '', 'Ivory Coast', 'Franc (XOF)', 'Yamoussoukro', '322,460.0 kmÂ²', 'French (fr-CI)', 'Liberia, Ghana, Guinea, Burkina Faso, Mali', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, '', 'Cook Islands', 'Dollar (NZD)', 'Avarua', '240.0 kmÂ²', 'English (en-CK), Maori (mi)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, '', 'Chile', 'Peso (CLP)', 'Santiago', '756,950.0 kmÂ²', 'Spanish (es-CL)', 'Peru, Bolivia, Argentina', '', NULL, 'assets/uploads/chile-flag-icon-128.png', 'assets/uploads/chile-flag-icon-16.png', 'assets/uploads/chile-flag-icon-32.png', 'assets/uploads/chile-flag-icon-64.png', NULL, NULL, NULL),
(48, '', 'Cameroon', 'Franc (XAF)', 'YaoundÃ©', '475,440.0 kmÂ²', 'English (en-CM), French (fr-CM)', 'Chad, Central African Republic, Gabon, Equatorial Guinea, Congo Republic, Nigeria', '', NULL, 'assets/uploads/cameroon-flag-icon-128.png', 'assets/uploads/cameroon-flag-icon-16.png', 'assets/uploads/cameroon-flag-icon-32.png', 'assets/uploads/cameroon-flag-icon-64.png', NULL, NULL, NULL),
(49, '', 'China', 'Yuan Renminbi (CNY)', 'Beijing', '9,596,960.0 kmÂ²', 'Chinese (zh-CN), Yue Chinese (yue), Wu Chinese (wuu), Daur (dta), Uighur (ug), Zhuang (za)', 'Laos, Bhutan, Tajikistan, Kazakhstan, Mongolia, Afghanistan, Nepal, Myanmar, Kyrgyzstan, Pakistan, North Korea, Russia, Vietnam, India', '', NULL, 'assets/uploads/china-flag-icon-128.png', 'assets/uploads/china-flag-icon-16.png', 'assets/uploads/china-flag-icon-32.png', 'assets/uploads/china-flag-icon-64.png', NULL, NULL, NULL),
(50, '', 'Colombia', 'Peso (COP)', 'BogotÃ¡', '1,138,910.0 kmÂ²', 'Spanish (es-CO)', 'Ecuador, Peru, Panama, Brazil, Venezuela', '', NULL, 'assets/uploads/colombia-flag-icon-128.png', 'assets/uploads/colombia-flag-icon-16.png', 'assets/uploads/colombia-flag-icon-32.png', 'assets/uploads/colombia-flag-icon-64.png', NULL, NULL, NULL),
(51, '', 'Costa Rica', 'Colon (CRC)', 'San JosÃ©', '51,100.0 kmÂ²', 'Spanish (es-CR), English (en)', 'Panama, Nicaragua', '', NULL, 'assets/uploads/costa-rica-flag-icon-128.png', 'assets/uploads/costa-rica-flag-icon-16.png', 'assets/uploads/costa-rica-flag-icon-32.png', 'assets/uploads/costa-rica-flag-icon-64.png', NULL, NULL, NULL),
(52, '', 'Serbia and Montenegro', 'Dinar (RSD)', '', '102,350.0 kmÂ²', 'Church Slavic (cu), Hungarian (hu), Albanian (sq), Serbian (sr)', 'Albania, Hungary, North Macedonia, Romania, Croatia, Bosnia and Herzegovina, Bulgaria', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, '', 'Cuba', 'Peso (CUP)', 'Havana', '110,860.0 kmÂ²', 'Spanish (es-CU), Papiamento (pap)', 'United States', '', NULL, 'assets/uploads/cuba-flag-icon-128.png', 'assets/uploads/cuba-flag-icon-16.png', 'assets/uploads/cuba-flag-icon-32.png', 'assets/uploads/cuba-flag-icon-64.png', NULL, NULL, NULL),
(54, '', 'Cabo Verde', 'Escudo (CVE)', 'Praia', '4,033.0 kmÂ²', 'Portuguese (pt-CV)', '', '', NULL, 'assets/uploads/cape-verde-flag-icon-128.png', 'assets/uploads/cape-verde-flag-icon-16.png', 'assets/uploads/cape-verde-flag-icon-32.png', 'assets/uploads/cape-verde-flag-icon-64.png', NULL, NULL, NULL),
(55, '', 'CuraÃ§ao', 'Guilder (ANG)', 'Willemstad', '444.0 kmÂ²', 'Dutch (nl), Papiamento (pap)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, '', 'Christmas Island', 'Dollar (AUD)', 'Flying Fish Cove', '135.0 kmÂ²', 'English (en), Chinese (zh), Malay (macrolanguage) (ms-CC)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, '', 'Cyprus', 'Euro (EUR)', 'Nicosia', '9,250.0 kmÂ²', 'Modern Greek (1453-) (el-CY), Turkish (tr-CY), English (en)', '', '', NULL, 'assets/uploads/cyprus-flag-icon-128.png', 'assets/uploads/cyprus-flag-icon-16.png', 'assets/uploads/cyprus-flag-icon-32.png', 'assets/uploads/cyprus-flag-icon-64.png', NULL, NULL, NULL),
(58, '', 'Czechia', 'Koruna (CZK)', 'Prague', '78,866.0 kmÂ²', 'Czech (cs), Slovak (sk)', 'Poland, Germany, Slovakia, Austria', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, '', 'Germany', 'Euro (EUR)', 'Berlin', '357,021.0 kmÂ²', 'German (de)', 'Switzerland, Poland, Netherlands, Denmark, Belgium, Czechia, Luxembourg, France, Austria', '', NULL, 'assets/uploads/germany-flag-icon-128.png', 'assets/uploads/germany-flag-icon-16.png', 'assets/uploads/germany-flag-icon-32.png', 'assets/uploads/germany-flag-icon-64.png', NULL, NULL, NULL),
(60, '', 'Djibouti', 'Franc (DJF)', 'Djibouti', '23,000.0 kmÂ²', 'French (fr-DJ), Arabic (ar), Somali (so-DJ), Afar (aa)', 'Eritrea, Ethiopia, Somalia', '', NULL, 'assets/uploads/djibouti-flag-icon-128.png', 'assets/uploads/djibouti-flag-icon-16.png', 'assets/uploads/djibouti-flag-icon-32.png', 'assets/uploads/djibouti-flag-icon-64.png', NULL, NULL, NULL),
(61, '', 'Denmark', 'Krone (DKK)', 'Copenhagen', '43,094.0 kmÂ²', 'Danish (da-DK), English (en), Faroese (fo), German (de-DK)', 'Germany', '', NULL, 'assets/uploads/denmark-flag-icon-128.png', 'assets/uploads/denmark-flag-icon-16.png', 'assets/uploads/denmark-flag-icon-32.png', 'assets/uploads/denmark-flag-icon-64.png', NULL, NULL, NULL),
(62, '', 'Dominica', 'Dollar (XCD)', 'Roseau', '754.0 kmÂ²', 'English (en-DM)', '', '', NULL, 'assets/uploads/dominica-flag-icon-128.png', 'assets/uploads/dominica-flag-icon-16.png', 'assets/uploads/dominica-flag-icon-32.png', 'assets/uploads/dominica-flag-icon-64.png', NULL, NULL, NULL),
(63, '', 'Dominican Republic', 'Peso (DOP)', 'Santo Domingo', '48,730.0 kmÂ²', 'Spanish (es-DO)', 'Haiti', '', NULL, 'assets/uploads/dominican-republic-flag-icon-128.png', 'assets/uploads/dominican-republic-flag-icon-16.png', 'assets/uploads/dominican-republic-flag-icon-32.png', 'assets/uploads/dominican-republic-flag-icon-64.png', NULL, NULL, NULL),
(64, '', 'Algeria', 'Dinar (DZD)', 'Algiers', '2,381,740.0 kmÂ²', 'Arabic (ar-DZ)', 'Niger, Western Sahara, Libya, Mauritania, Tunisia, Morocco, Mali', '', NULL, 'assets/uploads/algeria-flag-icon-128.png', 'assets/uploads/algeria-flag-icon-16.png', 'assets/uploads/algeria-flag-icon-32.png', 'assets/uploads/algeria-flag-icon-64.png', NULL, NULL, NULL),
(65, '', 'Ecuador', 'Dollar (USD)', 'Quito', '283,560.0 kmÂ²', 'Spanish (es-EC)', 'Peru, Colombia', '', NULL, 'assets/uploads/ecuador-flag-icon-128.png', 'assets/uploads/ecuador-flag-icon-16.png', 'assets/uploads/ecuador-flag-icon-32.png', 'assets/uploads/ecuador-flag-icon-64.png', NULL, NULL, NULL),
(66, '', 'Estonia', 'Euro (EUR)', 'Tallinn', '45,226.0 kmÂ²', 'Estonian (et), Russian (ru)', 'Russia, Latvia', '', NULL, 'assets/uploads/estonia-flag-icon-128.png', 'assets/uploads/estonia-flag-icon-16.png', 'assets/uploads/estonia-flag-icon-32.png', 'assets/uploads/estonia-flag-icon-64.png', NULL, NULL, NULL),
(67, '', 'Egypt', 'Pound (EGP)', 'Cairo', '1,001,450.0 kmÂ²', 'Arabic (ar-EG), English (en), French (fr)', 'Libya, Sudan, Israel, Palestine', '', NULL, 'assets/uploads/egypt-flag-icon-128.png', 'assets/uploads/egypt-flag-icon-16.png', 'assets/uploads/egypt-flag-icon-32.png', 'assets/uploads/egypt-flag-icon-64.png', NULL, NULL, NULL),
(68, '', 'Western Sahara', 'Dirham (MAD)', '', '266,000.0 kmÂ²', 'Arabic (ar), Hassaniyya (mey)', 'Algeria, Mauritania, Morocco', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, '', 'Eritrea', 'Nakfa (ERN)', 'Asmara', '121,320.0 kmÂ²', 'Afar (aa-ER), Arabic (ar), Tigre (tig), Kunama (kun), Tigrinya (ti-ER)', 'Ethiopia, Sudan, Djibouti', '', NULL, 'assets/uploads/eritrea-flag-icon-128.png', 'assets/uploads/eritrea-flag-icon-16.png', 'assets/uploads/eritrea-flag-icon-32.png', 'assets/uploads/eritrea-flag-icon-64.png', NULL, NULL, NULL),
(70, '', 'Spain', 'Euro (EUR)', 'Madrid', '504,782.0 kmÂ²', 'Spanish (es-ES), Catalan (ca), Galician (gl), Basque (eu), Occitan (post 1500) (oc)', 'Andorra, Portugal, Gibraltar, France, Morocco', '', NULL, 'assets/uploads/spain-flag-icon-128.png', 'assets/uploads/spain-flag-icon-16.png', 'assets/uploads/spain-flag-icon-32.png', 'assets/uploads/spain-flag-icon-64.png', NULL, NULL, NULL),
(71, '', 'Ethiopia', 'Birr (ETB)', 'Addis Ababa', '1,127,127.0 kmÂ²', 'Amharic (am), English (en-ET), Oromo (om-ET), Tigrinya (ti-ET), Somali (so-ET), Sidamo (sid)', 'Eritrea, Kenya, Sudan, South Sudan, Somalia, Djibouti', '', NULL, 'assets/uploads/ethiopia-flag-icon-128.png', 'assets/uploads/ethiopia-flag-icon-16.png', 'assets/uploads/ethiopia-flag-icon-32.png', 'assets/uploads/ethiopia-flag-icon-64.png', NULL, NULL, NULL),
(72, '', 'Finland', 'Euro (EUR)', 'Helsinki', '337,030.0 kmÂ²', 'Finnish (fi-FI), Swedish (sv-FI), Inari Sami (smn)', 'Norway, Russia, Sweden', '', NULL, 'assets/uploads/finland-flag-icon-128.png', 'assets/uploads/finland-flag-icon-16.png', 'assets/uploads/finland-flag-icon-32.png', 'assets/uploads/finland-flag-icon-64.png', NULL, NULL, NULL),
(73, '', 'Fiji', 'Dollar (FJD)', 'Suva', '18,270.0 kmÂ²', 'English (en-FJ), Fijian (fj)', '', '', NULL, 'assets/uploads/fiji-flag-icon-128.png', 'assets/uploads/fiji-flag-icon-16.png', 'assets/uploads/fiji-flag-icon-32.png', 'assets/uploads/fiji-flag-icon-64.png', NULL, NULL, NULL),
(74, '', 'Falkland Islands', 'Pound (FKP)', 'Stanley', '12,173.0 kmÂ²', 'English (en-FK)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(75, '', 'Micronesia', 'Dollar (USD)', 'Palikir', '702.0 kmÂ²', 'English (en-FM), Chuukese (chk), Pohnpeian (pon), Yapese (yap), Kosraean (kos), Ulithian (uli), Woleaian (woe), Nukuoro (nkr), Kapingamarangi (kpg)', '', '', NULL, 'assets/uploads/micronesia-flag-icon-128.png', 'assets/uploads/micronesia-flag-icon-16.png', 'assets/uploads/micronesia-flag-icon-32.png', 'assets/uploads/micronesia-flag-icon-64.png', NULL, NULL, NULL),
(76, '', 'Faroe Islands', 'Krone (DKK)', 'TÃ³rshavn', '1,399.0 kmÂ²', 'Faroese (fo), Danish (da-FO)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, '', 'France', 'Euro (EUR)', 'Paris', '547,030.0 kmÂ²', 'French (fr-FR), Arpitan (frp), Breton (br), Corsican (co), Catalan (ca), Basque (eu), Occitan (post 1500) (oc)', 'Switzerland, Germany, Belgium, Luxembourg, Italy, Andorra, Monaco, Spain', '', NULL, 'assets/uploads/france-flag-icon-128.png', 'assets/uploads/france-flag-icon-16.png', 'assets/uploads/france-flag-icon-32.png', 'assets/uploads/france-flag-icon-64.png', NULL, NULL, NULL),
(78, '', 'Gabon', 'Franc (XAF)', 'Libreville', '267,667.0 kmÂ²', 'French (fr-GA)', 'Cameroon, Equatorial Guinea, Congo Republic', '', NULL, 'assets/uploads/gabon-flag-icon-128.png', 'assets/uploads/gabon-flag-icon-16.png', 'assets/uploads/gabon-flag-icon-32.png', 'assets/uploads/gabon-flag-icon-64.png', NULL, NULL, NULL),
(79, '', 'United Kingdom', 'Pound (GBP)', 'London', '244,820.0 kmÂ²', 'English (en-GB), Welsh (cy-GB), Scottish Gaelic (gd)', 'Ireland', '', NULL, 'assets/uploads/united-kingdom-flag-icon-128.png', 'assets/uploads/united-kingdom-flag-icon-16.png', 'assets/uploads/united-kingdom-flag-icon-32.png', 'assets/uploads/united-kingdom-flag-icon-64.png', NULL, NULL, NULL),
(80, '', 'Grenada', 'Dollar (XCD)', 'St. George\'s', '344.0 kmÂ²', 'English (en-GD)', '', '', NULL, 'assets/uploads/grenada-flag-icon-128.png', 'assets/uploads/grenada-flag-icon-16.png', 'assets/uploads/grenada-flag-icon-32.png', 'assets/uploads/grenada-flag-icon-64.png', NULL, NULL, NULL),
(81, '', 'Georgia', 'Lari (GEL)', 'Tbilisi', '69,700.0 kmÂ²', 'Georgian (ka), Russian (ru), Armenian (hy), Azerbaijani (az)', 'Armenia, Azerbaijan, Turkey, Russia', '', NULL, 'assets/uploads/georgia-flag-icon-128.png', 'assets/uploads/georgia-flag-icon-16.png', 'assets/uploads/georgia-flag-icon-32.png', 'assets/uploads/georgia-flag-icon-64.png', NULL, NULL, NULL),
(82, '', 'French Guiana', 'Euro (EUR)', 'Cayenne', '91,000.0 kmÂ²', 'French (fr-GF)', 'Suriname, Brazil', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(83, '', 'Guernsey', 'Pound (GBP)', 'St Peter Port', '78.0 kmÂ²', 'English (en), JÃ¨rriais (nrf)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(84, '', 'Ghana', 'Cedi (GHS)', 'Accra', '239,460.0 kmÂ²', 'English (en-GH), Akan (ak), Ewe (ee), Twi (tw)', 'Ivory Coast, Togo, Burkina Faso', '', NULL, 'assets/uploads/ghana-flag-icon-128.png', 'assets/uploads/ghana-flag-icon-16.png', 'assets/uploads/ghana-flag-icon-32.png', 'assets/uploads/ghana-flag-icon-64.png', NULL, NULL, NULL),
(85, '', 'Gibraltar', 'Pound (GIP)', 'Gibraltar', '6.5 kmÂ²', 'English (en-GI), Spanish (es), Italian (it), Portuguese (pt)', 'Spain', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(86, '', 'Greenland', 'Krone (DKK)', 'Nuuk', '2,166,086.0 kmÂ²', 'Kalaallisut (kl), Danish (da-GL), English (en)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, '', 'Gambia', 'Dalasi (GMD)', 'Banjul', '11,300.0 kmÂ²', 'English (en-GM), Mandinka (mnk), Gambian Wolof (wof), Wolof (wo), Fulah (ff)', 'Senegal', '', NULL, 'assets/uploads/gambia-flag-icon-128.png', 'assets/uploads/gambia-flag-icon-16.png', 'assets/uploads/gambia-flag-icon-32.png', 'assets/uploads/gambia-flag-icon-64.png', NULL, NULL, NULL),
(88, '', 'Guinea', 'Franc (GNF)', 'Conakry', '245,857.0 kmÂ²', 'French (fr-GN)', 'Liberia, Senegal, Sierra Leone, Ivory Coast, Guinea-Bissau, Mali', '', NULL, 'assets/uploads/guinea-flag-icon-128.png', 'assets/uploads/guinea-flag-icon-16.png', 'assets/uploads/guinea-flag-icon-32.png', 'assets/uploads/guinea-flag-icon-64.png', NULL, NULL, NULL),
(89, '', 'Guadeloupe', 'Euro (EUR)', 'Basse-Terre', '1,780.0 kmÂ²', 'French (fr-GP)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(90, '', 'Equatorial Guinea', 'Franc (XAF)', 'Malabo', '28,051.0 kmÂ²', 'Spanish (es-GQ), French (fr)', 'Gabon, Cameroon', '', NULL, 'assets/uploads/equatorial-guinea-flag-icon-128.png', 'assets/uploads/equatorial-guinea-flag-icon-16.png', 'assets/uploads/equatorial-guinea-flag-icon-32.png', 'assets/uploads/equatorial-guinea-flag-icon-64.png', NULL, NULL, NULL),
(91, '', 'Greece', 'Euro (EUR)', 'Athens', '131,940.0 kmÂ²', 'Modern Greek (1453-) (el-GR), English (en), French (fr)', 'Albania, North Macedonia, Turkey, Bulgaria', '', NULL, 'assets/uploads/greece-flag-icon-128.png', 'assets/uploads/greece-flag-icon-16.png', 'assets/uploads/greece-flag-icon-32.png', 'assets/uploads/greece-flag-icon-64.png', NULL, NULL, NULL),
(92, '', 'South Georgia and South Sandwich Islands', 'Pound (GBP)', 'Grytviken', '3,903.0 kmÂ²', 'English (en)', '', '', NULL, 'assets/uploads/guatemala-flag-icon-128.png', 'assets/uploads/guatemala-flag-icon-16.png', 'assets/uploads/guatemala-flag-icon-32.png', 'assets/uploads/guatemala-flag-icon-64.png', NULL, NULL, NULL),
(93, '', 'Guatemala', 'Quetzal (GTQ)', 'Guatemala City', '108,890.0 kmÂ²', 'Spanish (es-GT)', 'Mexico, Honduras, Belize, El Salvador', '', NULL, 'assets/uploads/guatemala-flag-icon-128.png', 'assets/uploads/guatemala-flag-icon-16.png', 'assets/uploads/guatemala-flag-icon-32.png', 'assets/uploads/guatemala-flag-icon-64.png', NULL, NULL, NULL),
(94, '', 'Guam', 'Dollar (USD)', 'HagÃ¥tÃ±a', '549.0 kmÂ²', 'English (en-GU), Chamorro (ch-GU)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(95, '', 'Guinea-Bissau', 'Franc (XOF)', 'Bissau', '36,120.0 kmÂ²', 'Portuguese (pt-GW), Upper Guinea Crioulo (pov)', 'Senegal, Guinea', '', NULL, 'assets/uploads/guinea-bissau-flag-icon-128.png', 'assets/uploads/guinea-bissau-flag-icon-16.png', 'assets/uploads/guinea-bissau-flag-icon-32.png', 'assets/uploads/guinea-bissau-flag-icon-64.png', NULL, NULL, NULL),
(96, '', 'Guyana', 'Dollar (GYD)', 'Georgetown', '214,970.0 kmÂ²', 'English (en-GY)', 'Suriname, Brazil, Venezuela', '', NULL, 'assets/uploads/guyana-flag-icon-128.png', 'assets/uploads/guyana-flag-icon-16.png', 'assets/uploads/guyana-flag-icon-32.png', 'assets/uploads/guyana-flag-icon-64.png', NULL, NULL, NULL),
(97, '', 'Hong Kong', 'Dollar (HKD)', 'Hong Kong', '1,092.0 kmÂ²', 'Chinese (zh-HK), Yue Chinese (yue), Chinese (zh), English (en)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, '', 'Heard Island and McDonald Islands', 'Dollar (AUD)', '', '412.0 kmÂ²', '()', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, '', 'Honduras', 'Lempira (HNL)', 'Tegucigalpa', '112,090.0 kmÂ²', 'Spanish (es-HN), Garifuna (cab), MÃ­skito (miq)', 'Guatemala, Nicaragua, El Salvador', '', NULL, 'assets/uploads/honduras-flag-icon-128.png', 'assets/uploads/honduras-flag-icon-16.png', 'assets/uploads/honduras-flag-icon-32.png', 'assets/uploads/honduras-flag-icon-64.png', NULL, NULL, NULL),
(100, '', 'Croatia', 'Kuna (HRK)', 'Zagreb', '56,542.0 kmÂ²', 'Croatian (hr-HR), Serbian (sr)', 'Hungary, Slovenia, Bosnia and Herzegovina, Montenegro, Serbia', '', NULL, 'assets/uploads/croatia-flag-icon-128.png', 'assets/uploads/croatia-flag-icon-16.png', 'assets/uploads/croatia-flag-icon-32.png', 'assets/uploads/croatia-flag-icon-64.png', NULL, NULL, NULL),
(101, '', 'Haiti', 'Gourde (HTG)', 'Port-au-Prince', '27,750.0 kmÂ²', 'Haitian (ht), French (fr-HT)', 'Dominican Republic', '', NULL, 'assets/uploads/haiti-flag-icon-128.png', 'assets/uploads/haiti-flag-icon-16.png', 'assets/uploads/haiti-flag-icon-32.png', 'assets/uploads/haiti-flag-icon-64.png', NULL, NULL, NULL),
(102, '', 'Hungary', 'Forint (HUF)', 'Budapest', '93,030.0 kmÂ²', 'Hungarian (hu-HU)', 'Slovakia, Slovenia, Romania, Ukraine, Croatia, Austria, Serbia', '', NULL, 'assets/uploads/hungary-flag-icon-128.png', 'assets/uploads/hungary-flag-icon-16.png', 'assets/uploads/hungary-flag-icon-32.png', 'assets/uploads/hungary-flag-icon-64.png', NULL, NULL, NULL),
(103, '', 'Indonesia', 'Rupiah (IDR)', 'Jakarta', '1,919,440.0 kmÂ²', 'Indonesian (id), English (en), Dutch (nl), Javanese (jv)', 'Papua New Guinea, Timor-Leste, Malaysia', '', NULL, 'assets/uploads/indonesia-flag-icon-128.png', 'assets/uploads/indonesia-flag-icon-16.png', 'assets/uploads/indonesia-flag-icon-32.png', 'assets/uploads/indonesia-flag-icon-64.png', NULL, NULL, NULL),
(104, '', 'Ireland', 'Euro (EUR)', 'Dublin', '70,280.0 kmÂ²', 'English (en-IE), Irish (ga-IE)', 'United Kingdom', '', NULL, 'assets/uploads/ireland-flag-icon-128.png', 'assets/uploads/ireland-flag-icon-16.png', 'assets/uploads/ireland-flag-icon-32.png', 'assets/uploads/ireland-flag-icon-64.png', NULL, NULL, NULL),
(105, '', 'Israel', 'Shekel (ILS)', '', '20,770.0 kmÂ²', 'Hebrew (he), Arabic (ar-IL), English (en-IL)', 'Syria, Jordan, Lebanon, Egypt, Palestine', '', NULL, 'assets/uploads/israel-flag-icon-128.png', 'assets/uploads/israel-flag-icon-16.png', 'assets/uploads/israel-flag-icon-32.png', 'assets/uploads/israel-flag-icon-64.png', NULL, NULL, NULL),
(106, '', 'Isle of Man', 'Pound (GBP)', 'Douglas', '572.0 kmÂ²', 'English (en), Manx (gv)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, 'IN', 'India', 'Rupee (INR)', 'New Delhi', '3,287,590.0 kmÂ²', 'English (en-IN), Hindi (hi), Bengali (bn), Telugu (te), Marathi (mr), Tamil (ta), Urdu (ur), Gujarati (gu), Kannada (kn), Malayalam (ml), Oriya (macrolanguage) (or), Panjabi (pa), Assamese (as), Bihari languages (bh), Santali (sat), Kashmiri (ks), Nepali (macrolanguage) (ne), Sindhi (sd), Konkani (macrolanguage) (kok), Dogri (macrolanguage) (doi), Manipuri (mni), Sino-Tibetan languages (sit), Sanskrit (sa), French (fr), Lushai (lus), Indic languages (inc)', 'China, Nepal, Myanmar, Bhutan, Pakistan, Bangladesh', 'zczczxcxz', '29,34', 'assets/uploads/india-flag-icon-128.png', 'assets/uploads/india-flag-icon-16.png', 'assets/uploads/india-flag-icon-32.png', 'assets/uploads/india-flag-icon-64.png', NULL, 'india', NULL),
(108, '', 'British Indian Ocean Territory', 'Dollar (USD)', '', '60.0 kmÂ²', 'English (en-IO)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(109, '', 'Iraq', 'Dinar (IQD)', 'Baghdad', '437,072.0 kmÂ²', 'Arabic (ar-IQ), Kurdish (ku), Armenian (hy)', 'Syria, Saudi Arabia, Iran, Jordan, Turkey, Kuwait', '', NULL, 'assets/uploads/iraq-flag-icon-128.png', 'assets/uploads/iraq-flag-icon-16.png', 'assets/uploads/iraq-flag-icon-32.png', 'assets/uploads/iraq-flag-icon-64.png', NULL, NULL, NULL),
(110, '', 'Iran', 'Rial (IRR)', 'Tehran', '1,648,000.0 kmÂ²', 'Persian (fa-IR), Kurdish (ku)', 'Turkmenistan, Afghanistan, Iraq, Armenia, Pakistan, Azerbaijan, Turkey', '', NULL, 'assets/uploads/iran-flag-icon-128.png', 'assets/uploads/iran-flag-icon-16.png', 'assets/uploads/iran-flag-icon-32.png', 'assets/uploads/iran-flag-icon-64.png', NULL, NULL, NULL),
(111, '', 'Iceland', 'Krona (ISK)', 'Reykjavik', '103,000.0 kmÂ²', 'Icelandic (is), English (en), German (de), Danish (da), Swedish (sv), Norwegian (no)', '', '', NULL, 'assets/uploads/iceland-flag-icon-128.png', 'assets/uploads/iceland-flag-icon-16.png', 'assets/uploads/iceland-flag-icon-32.png', 'assets/uploads/iceland-flag-icon-64.png', NULL, NULL, NULL),
(112, '', 'Italy', 'Euro (EUR)', 'Rome', '301,230.0 kmÂ²', 'Italian (it-IT), German (de-IT), French (fr-IT), Sardinian (sc), Catalan (ca), Corsican (co), Slovenian (sl)', 'Switzerland, Vatican City, Slovenia, San Marino, France, Austria', '', NULL, 'assets/uploads/italy-flag-icon-128.png', 'assets/uploads/italy-flag-icon-16.png', 'assets/uploads/italy-flag-icon-32.png', 'assets/uploads/italy-flag-icon-64.png', NULL, NULL, NULL),
(113, '', 'Jersey', 'Pound (GBP)', 'Saint Helier', '116.0 kmÂ²', 'English (en), French (fr), JÃ¨rriais (nrf)', '', '', NULL, 'assets/uploads/israel-flag-icon-128.png', 'assets/uploads/israel-flag-icon-16.png', 'assets/uploads/israel-flag-icon-32.png', 'assets/uploads/israel-flag-icon-64.png', NULL, NULL, NULL),
(114, '', 'Jamaica', 'Dollar (JMD)', 'Kingston', '10,991.0 kmÂ²', 'English (en-JM)', '', '', NULL, 'assets/uploads/jamaica-flag-icon-128.png', 'assets/uploads/jamaica-flag-icon-16.png', 'assets/uploads/jamaica-flag-icon-32.png', 'assets/uploads/jamaica-flag-icon-64.png', NULL, NULL, NULL),
(115, '', 'Jordan', 'Dinar (JOD)', 'Amman', '92,300.0 kmÂ²', 'Arabic (ar-JO), English (en)', 'Syria, Saudi Arabia, Iraq, Israel, Palestine', '', NULL, 'assets/uploads/jordan-flag-icon-128.png', 'assets/uploads/jordan-flag-icon-16.png', 'assets/uploads/jordan-flag-icon-32.png', 'assets/uploads/jordan-flag-icon-64.png', NULL, NULL, NULL),
(116, '', 'Japan', 'Yen (JPY)', 'Tokyo', '377,835.0 kmÂ²', 'Japanese (ja)', '', '', NULL, 'assets/uploads/japan-flag-icon-128.png', 'assets/uploads/japan-flag-icon-16.png', 'assets/uploads/japan-flag-icon-32.png', 'assets/uploads/japan-flag-icon-64.png', NULL, NULL, NULL),
(117, '', 'Kenya', 'Shilling (KES)', 'Nairobi', '582,650.0 kmÂ²', 'English (en-KE), Swahili (macrolanguage) (sw-KE)', 'Ethiopia, Tanzania, South Sudan, Somalia, Uganda', '', NULL, 'assets/uploads/kenya-flag-icon-128.png', 'assets/uploads/kenya-flag-icon-16.png', 'assets/uploads/kenya-flag-icon-32.png', 'assets/uploads/kenya-flag-icon-64.png', NULL, NULL, NULL),
(118, '', 'Kyrgyzstan', 'Som (KGS)', 'Bishkek', '198,500.0 kmÂ²', 'Kirghiz (ky), Uzbek (uz), Russian (ru)', 'China, Tajikistan, Uzbekistan, Kazakhstan', '', NULL, 'assets/uploads/kyrgyzstan-flag-icon-128.png', 'assets/uploads/kyrgyzstan-flag-icon-16.png', 'assets/uploads/kyrgyzstan-flag-icon-32.png', 'assets/uploads/kyrgyzstan-flag-icon-64.png', NULL, NULL, NULL),
(119, '', 'Cambodia', 'Riels (KHR)', 'Phnom Penh', '181,040.0 kmÂ²', 'Khmer (km), French (fr), English (en)', 'Laos, Thailand, Vietnam', '', NULL, 'assets/uploads/cambodia-flag-icon-128.png', 'assets/uploads/cambodia-flag-icon-16.png', 'assets/uploads/cambodia-flag-icon-32.png', 'assets/uploads/cambodia-flag-icon-64.png', NULL, NULL, NULL),
(120, '', 'Kiribati', 'Dollar (AUD)', 'Tarawa', '811.0 kmÂ²', 'English (en-KI), Gilbertese (gil)', '', '', NULL, 'assets/uploads/kiribati-flag-icon-128.png', 'assets/uploads/kiribati-flag-icon-16.png', 'assets/uploads/kiribati-flag-icon-32.png', 'assets/uploads/kiribati-flag-icon-64.png', NULL, NULL, NULL),
(121, '', 'Comoros', 'Franc (KMF)', 'Moroni', '2,170.0 kmÂ²', 'Arabic (ar), French (fr-KM)', '', '', NULL, 'assets/uploads/comoros-flag-icon-128.png', 'assets/uploads/comoros-flag-icon-16.png', 'assets/uploads/comoros-flag-icon-32.png', 'assets/uploads/comoros-flag-icon-64.png', NULL, NULL, NULL),
(122, '', 'St Kitts and Nevis', 'Dollar (XCD)', 'Basseterre', '261.0 kmÂ²', 'English (en-KN)', '', '', NULL, 'assets/uploads/saint-kitts-and-nevis-flag-icon-128.png', 'assets/uploads/saint-kitts-and-nevis-flag-icon-16.png', 'assets/uploads/saint-kitts-and-nevis-flag-icon-32.png', 'assets/uploads/saint-kitts-and-nevis-flag-icon-64.png', NULL, NULL, NULL),
(123, '', 'North Korea', 'Won (KPW)', 'Pyongyang', '120,540.0 kmÂ²', 'Korean (ko-KP)', 'China, South Korea, Russia', '', NULL, 'assets/uploads/north-korea-flag-icon-128.png', 'assets/uploads/north-korea-flag-icon-16.png', 'assets/uploads/north-korea-flag-icon-32.png', 'assets/uploads/north-korea-flag-icon-64.png', NULL, NULL, NULL),
(124, '', 'South Korea', 'Won (KRW)', 'Seoul', '98,480.0 kmÂ²', 'Korean (ko-KR), English (en)', 'North Korea', '', NULL, 'assets/uploads/south-korea-flag-icon-128.png', 'assets/uploads/south-korea-flag-icon-16.png', 'assets/uploads/south-korea-flag-icon-32.png', 'assets/uploads/south-korea-flag-icon-64.png', NULL, NULL, NULL),
(125, '', 'Kuwait', 'Dinar (KWD)', 'Kuwait City', '17,820.0 kmÂ²', 'Arabic (ar-KW), English (en)', 'Saudi Arabia, Iraq', '', NULL, 'assets/uploads/kuwait-flag-icon-128.png', 'assets/uploads/kuwait-flag-icon-16.png', 'assets/uploads/kuwait-flag-icon-32.png', 'assets/uploads/kuwait-flag-icon-64.png', NULL, NULL, NULL),
(126, '', 'Cayman Islands', 'Dollar (KYD)', 'George Town', '262.0 kmÂ²', 'English (en-KY)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, '', 'Kazakhstan', 'Tenge (KZT)', 'Nur-Sultan', '2,717,300.0 kmÂ²', 'Kazakh (kk), Russian (ru)', 'Turkmenistan, China, Kyrgyzstan, Uzbekistan, Russia', '', NULL, 'assets/uploads/kazakhstan-flag-icon-128.png', 'assets/uploads/kazakhstan-flag-icon-16.png', 'assets/uploads/kazakhstan-flag-icon-32.png', 'assets/uploads/kazakhstan-flag-icon-64.png', NULL, NULL, NULL),
(128, '', 'Laos', 'Kip (LAK)', 'Vientiane', '236,800.0 kmÂ²', 'Lao (lo), French (fr), English (en)', 'China, Myanmar, Cambodia, Thailand, Vietnam', '', NULL, 'assets/uploads/laos-flag-icon-128.png', 'assets/uploads/laos-flag-icon-16.png', 'assets/uploads/laos-flag-icon-32.png', 'assets/uploads/laos-flag-icon-64.png', NULL, NULL, NULL),
(129, '', 'Lebanon', 'Pound (LBP)', 'Beirut', '10,400.0 kmÂ²', 'Arabic (ar-LB), French (fr-LB), English (en), Armenian (hy)', 'Syria, Israel', '', NULL, 'assets/uploads/lebanon-flag-icon-128.png', 'assets/uploads/lebanon-flag-icon-16.png', 'assets/uploads/lebanon-flag-icon-32.png', 'assets/uploads/lebanon-flag-icon-64.png', NULL, NULL, NULL),
(130, '', 'Saint Lucia', 'Dollar (XCD)', 'Castries', '616.0 kmÂ²', 'English (en-LC)', '', '', NULL, 'assets/uploads/saint-lucia-flag-icon-128.png', 'assets/uploads/saint-lucia-flag-icon-16.png', 'assets/uploads/saint-lucia-flag-icon-32.png', 'assets/uploads/saint-lucia-flag-icon-64.png', NULL, NULL, NULL),
(131, '', 'Liechtenstein', 'Franc (CHF)', 'Vaduz', '160.0 kmÂ²', 'German (de-LI)', 'Switzerland, Austria', '', NULL, 'assets/uploads/liechtenstein-flag-icon-128.png', 'assets/uploads/liechtenstein-flag-icon-16.png', 'assets/uploads/liechtenstein-flag-icon-32.png', 'assets/uploads/liechtenstein-flag-icon-64.png', NULL, NULL, NULL),
(132, '', 'Sri Lanka', 'Rupee (LKR)', 'Colombo', '65,610.0 kmÂ²', 'Sinhala (si), Tamil (ta), English (en)', '', '', NULL, 'assets/uploads/sri-lanka-flag-icon-128.png', 'assets/uploads/sri-lanka-flag-icon-16.png', 'assets/uploads/sri-lanka-flag-icon-32.png', 'assets/uploads/sri-lanka-flag-icon-64.png', NULL, NULL, NULL),
(133, '', 'Liberia', 'Dollar (LRD)', 'Monrovia', '111,370.0 kmÂ²', 'English (en-LR)', 'Sierra Leone, Ivory Coast, Guinea', '', NULL, 'assets/uploads/liberia-flag-icon-128.png', 'assets/uploads/liberia-flag-icon-16.png', 'assets/uploads/liberia-flag-icon-32.png', 'assets/uploads/liberia-flag-icon-64.png', NULL, NULL, NULL),
(134, '', 'Lesotho', 'Loti (LSL)', 'Maseru', '30,355.0 kmÂ²', 'English (en-LS), Southern Sotho (st), Zulu (zu), Xhosa (xh)', 'South Africa', '', NULL, 'assets/uploads/lesotho-flag-icon-128.png', 'assets/uploads/lesotho-flag-icon-16.png', NULL, 'assets/uploads/lesotho-flag-icon-64.png', NULL, NULL, NULL),
(135, '', 'Lithuania', 'Euro (EUR)', 'Vilnius', '65,200.0 kmÂ²', 'Lithuanian (lt), Russian (ru), Polish (pl)', 'Poland, Belarus, Russia, Latvia', '', NULL, 'assets/uploads/lithuania-flag-icon-128.png', 'assets/uploads/lithuania-flag-icon-16.png', 'assets/uploads/lithuania-flag-icon-32.png', 'assets/uploads/lithuania-flag-icon-64.png', NULL, NULL, NULL),
(136, '', 'Luxembourg', 'Euro (EUR)', 'Luxembourg', '2,586.0 kmÂ²', 'Luxembourgish (lb), German (de-LU), French (fr-LU)', 'Germany, Belgium, France', '', NULL, 'assets/uploads/luxembourg-flag-icon-128.png', 'assets/uploads/luxembourg-flag-icon-16.png', 'assets/uploads/luxembourg-flag-icon-32.png', 'assets/uploads/luxembourg-flag-icon-64.png', NULL, NULL, NULL),
(137, '', 'Latvia', 'Euro (EUR)', 'Riga', '64,589.0 kmÂ²', 'Latvian (lv), Russian (ru), Lithuanian (lt)', 'Lithuania, Estonia, Belarus, Russia', '', NULL, 'assets/uploads/latvia-flag-icon-128.png', 'assets/uploads/latvia-flag-icon-16.png', 'assets/uploads/latvia-flag-icon-32.png', 'assets/uploads/latvia-flag-icon-64.png', NULL, NULL, NULL),
(138, '', 'Libya', 'Dinar (LYD)', 'Tripoli', '1,759,540.0 kmÂ²', 'Arabic (ar-LY), Italian (it), English (en)', 'Chad, Niger, Algeria, Sudan, Tunisia, Egypt', '', NULL, 'assets/uploads/libya-flag-icon-128.png', 'assets/uploads/libya-flag-icon-16.png', 'assets/uploads/libya-flag-icon-32.png', 'assets/uploads/libya-flag-icon-64.png', NULL, NULL, NULL),
(139, '', 'Morocco', 'Dirham (MAD)', 'Rabat', '446,550.0 kmÂ²', 'Arabic (ar-MA), Berber languages (ber), French (fr)', 'Algeria, Western Sahara, Spain', '', NULL, 'assets/uploads/morocco-flag-icon-128.png', 'assets/uploads/morocco-flag-icon-16.png', 'assets/uploads/morocco-flag-square-icon-32.png', 'assets/uploads/morocco-flag-icon-64.png', NULL, NULL, NULL),
(140, '', 'Monaco', 'Euro (EUR)', 'Monaco', '1.9 kmÂ²', 'French (fr-MC), English (en), Italian (it)', 'France', '', NULL, 'assets/uploads/monaco-flag-icon-128.png', 'assets/uploads/monaco-flag-icon-16.png', 'assets/uploads/monaco-flag-icon-32.png', 'assets/uploads/monaco-flag-icon-64.png', NULL, NULL, NULL),
(141, '', 'Moldova', 'Leu (MDL)', 'ChiÈ™inÄƒu', '33,843.0 kmÂ²', 'Romanian (ro), Russian (ru), Gagauz (gag), Turkish (tr)', 'Romania, Ukraine', '', NULL, 'assets/uploads/moldova-flag-icon-128.png', 'assets/uploads/moldova-flag-icon-16.png', 'assets/uploads/moldova-flag-icon-32.png', 'assets/uploads/moldova-flag-icon-64.png', NULL, NULL, NULL),
(142, '', 'Montenegro', 'Euro (EUR)', 'Podgorica', '14,026.0 kmÂ²', 'Serbian (sr), Hungarian (hu), Bosnian (bs), Albanian (sq), Croatian (hr), Romany (rom)', 'Albania, Croatia, Bosnia and Herzegovina, Serbia, Kosovo', '', NULL, 'assets/uploads/montenegro-flag-icon-128.png', 'assets/uploads/montenegro-flag-icon-16.png', 'assets/uploads/montenegro-flag-icon-32.png', 'assets/uploads/montenegro-flag-icon-64.png', NULL, NULL, NULL),
(143, '', 'Saint Martin', 'Euro (EUR)', 'Marigot', '53.0 kmÂ²', 'French (fr)', 'Sint Maarten', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, '', 'Madagascar', 'Ariary (MGA)', 'Antananarivo', '587,040.0 kmÂ²', 'French (fr-MG), Malagasy (mg)', '', '', NULL, 'assets/uploads/madagascar-flag-icon-128.png', 'assets/uploads/madagascar-flag-icon-16.png', 'assets/uploads/madagascar-flag-icon-32.png', 'assets/uploads/madagascar-flag-icon-64.png', NULL, NULL, NULL),
(145, '', 'Marshall Islands', 'Dollar (USD)', 'Majuro', '181.3 kmÂ²', 'Marshallese (mh), English (en-MH)', '', '', NULL, 'assets/uploads/marshall-islands-flag-icon-128.png', 'assets/uploads/marshall-islands-flag-icon-16.png', 'assets/uploads/marshall-islands-flag-icon-32.png', 'assets/uploads/marshall-islands-flag-icon-64.png', NULL, NULL, NULL),
(146, '', 'North Macedonia', 'Denar (MKD)', 'Skopje', '25,333.0 kmÂ²', 'Macedonian (mk), Albanian (sq), Turkish (tr), Roma (rmm), Serbian (sr)', 'Albania, Greece, Bulgaria, Serbia, Kosovo', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, '', 'Mali', 'Franc (XOF)', 'Bamako', '1,240,000.0 kmÂ²', 'French (fr-ML), Bambara (bm)', 'Senegal, Niger, Algeria, Ivory Coast, Guinea, Mauritania, Burkina Faso', '', NULL, 'assets/uploads/mali-flag-icon-128.png', 'assets/uploads/mali-flag-icon-16.png', 'assets/uploads/mali-flag-icon-32.png', 'assets/uploads/mali-flag-icon-64.png', NULL, NULL, NULL),
(148, '', 'Myanmar', 'Kyat (MMK)', 'Nay Pyi Taw', '678,500.0 kmÂ²', 'Burmese (my)', 'China, Laos, Thailand, Bangladesh, India', '', NULL, 'assets/uploads/myanmar-flag-icon-128.png', 'assets/uploads/myanmar-flag-icon-16.png', 'assets/uploads/myanmar-flag-icon-32.png', 'assets/uploads/myanmar-flag-icon-64.png', NULL, NULL, NULL),
(149, '', 'Mongolia', 'Tugrik (MNT)', 'Ulaanbaatar', '1,565,000.0 kmÂ²', 'Mongolian (mn), Russian (ru)', 'China, Russia', '', NULL, 'assets/uploads/mongolia-flag-icon-128.png', 'assets/uploads/mongolia-flag-icon-16.png', 'assets/uploads/mongolia-flag-icon-32.png', 'assets/uploads/mongolia-flag-icon-64.png', NULL, NULL, NULL),
(150, '', 'Macao', 'Pataca (MOP)', 'Macao', '254.0 kmÂ²', 'Chinese (zh), Chinese (zh-MO), Portuguese (pt)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(151, '', 'Northern Mariana Islands', 'Dollar (USD)', 'Saipan', '477.0 kmÂ²', 'Filipino (fil), Tagalog (tl), Chinese (zh), Chamorro (ch-MP), English (en-MP)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, '', 'Martinique', 'Euro (EUR)', 'Fort-de-France', '1,100.0 kmÂ²', 'French (fr-MQ)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(153, '', 'Mauritania', 'Ouguiya (MRU)', 'Nouakchott', '1,030,700.0 kmÂ²', 'Arabic (ar-MR), Pulaar (fuc), Soninke (snk), French (fr), Hassaniyya (mey), Wolof (wo)', 'Senegal, Algeria, Western Sahara, Mali', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(154, '', 'Montserrat', 'Dollar (XCD)', 'Plymouth', '102.0 kmÂ²', 'English (en-MS)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, '', 'Malta', 'Euro (EUR)', 'Valletta', '316.0 kmÂ²', 'Maltese (mt), English (en-MT)', '', '', NULL, 'assets/uploads/malta-flag-icon-128.png', 'assets/uploads/malta-flag-icon-16.png', 'assets/uploads/malta-flag-icon-32.png', 'assets/uploads/malta-flag-icon-64.png', NULL, NULL, NULL),
(156, '', 'Mauritius', 'Rupee (MUR)', 'Port Louis', '2,040.0 kmÂ²', 'English (en-MU), Bhojpuri (bho), French (fr)', '', '', NULL, 'assets/uploads/mauritius-flag-icon-128.png', 'assets/uploads/mauritius-flag-icon-16.png', 'assets/uploads/mauritius-flag-icon-32.png', 'assets/uploads/mauritius-flag-icon-64.png', NULL, NULL, NULL),
(157, '', 'Maldives', 'Rufiyaa (MVR)', 'MalÃ©', '300.0 kmÂ²', 'Dhivehi (dv), English (en)', '', '', NULL, 'assets/uploads/maldives-flag-icon-128.png', 'assets/uploads/maldives-flag-icon-16.png', 'assets/uploads/maldives-flag-icon-32.png', 'assets/uploads/maldives-flag-icon-64.png', NULL, NULL, NULL),
(158, '', 'Malawi', 'Kwacha (MWK)', 'Lilongwe', '118,480.0 kmÂ²', 'Nyanja (ny), Yao (yao), Tumbuka (tum), Malawi Sena (swk)', 'Tanzania, Mozambique, Zambia', '', NULL, 'assets/uploads/malawi-flag-icon-128.png', 'assets/uploads/malawi-flag-icon-16.png', 'assets/uploads/malawi-flag-icon-32.png', 'assets/uploads/malawi-flag-icon-64.png', NULL, NULL, NULL),
(159, '', 'Mexico', 'Peso (MXN)', 'Mexico City', '1,972,550.0 kmÂ²', 'Spanish (es-MX)', 'Guatemala, United States, Belize', '', NULL, 'assets/uploads/mexico-flag-icon-128.png', 'assets/uploads/mexico-flag-icon-16.png', 'assets/uploads/mexico-flag-icon-32.png', 'assets/uploads/mexico-flag-icon-64.png', NULL, NULL, NULL);
INSERT INTO `tbl_country` (`id`, `code`, `name`, `currency`, `capital`, `area`, `languages`, `neighbour`, `description`, `kind_of_visa`, `flag`, `flag16`, `flag32`, `flag64`, `place_image`, `origin_slug`, `destination_slug`) VALUES
(160, '', 'Malaysia', 'Ringgit (MYR)', 'Kuala Lumpur', '329,750.0 kmÂ²', 'Malay (macrolanguage) (ms-MY), English (en), Chinese (zh), Tamil (ta), Telugu (te), Malayalam (ml), Panjabi (pa), Thai (th)', 'Brunei, Thailand, Indonesia', '', NULL, 'assets/uploads/malaysia-flag-icon-128.png', 'assets/uploads/malaysia-flag-icon-16.png', 'assets/uploads/malaysia-flag-icon-32.png', 'assets/uploads/malaysia-flag-icon-64.png', NULL, NULL, NULL),
(161, '', 'Mozambique', 'Metical (MZN)', 'Maputo', '801,590.0 kmÂ²', 'Portuguese (pt-MZ), Makhuwa (vmw)', 'Zimbabwe, Tanzania, Eswatini, South Africa, Zambia, Malawi', '', NULL, 'assets/uploads/mozambique-flag-icon-128.png', 'assets/uploads/mozambique-flag-icon-16.png', 'assets/uploads/mozambique-flag-icon-32.png', 'assets/uploads/mozambique-flag-icon-64.png', NULL, NULL, NULL),
(162, '', 'Namibia', 'Dollar (NAD)', 'Windhoek', '825,418.0 kmÂ²', 'English (en-NA), Afrikaans (af), German (de), Herero (hz), Khoekhoe (naq)', 'South Africa, Botswana, Zambia, Angola', '', NULL, 'assets/uploads/namibia-flag-icon-128.png', 'assets/uploads/namibia-flag-icon-16.png', 'assets/uploads/namibia-flag-icon-32.png', 'assets/uploads/namibia-flag-icon-64.png', NULL, NULL, NULL),
(163, '', 'New Caledonia', 'Franc (XPF)', 'Noumea', '19,060.0 kmÂ²', 'French (fr-NC)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(164, '', 'Niger', 'Franc (XOF)', 'Niamey', '1,267,000.0 kmÂ²', 'French (fr-NE), Hausa (ha), Kanuri (kr), Zarma (dje)', 'Chad, Benin, Algeria, Libya, Burkina Faso, Nigeria, Mali', '', NULL, 'assets/uploads/niger-flag-icon-128.png', 'assets/uploads/niger-flag-icon-16.png', 'assets/uploads/niger-flag-icon-32.png', 'assets/uploads/niger-flag-icon-64.png', NULL, NULL, NULL),
(165, '', 'Norfolk Island', 'Dollar (AUD)', 'Kingston', '34.6 kmÂ²', 'English (en-NF)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(166, '', 'Nigeria', 'Naira (NGN)', 'Abuja', '923,768.0 kmÂ²', 'English (en-NG), Hausa (ha), Yoruba (yo), Igbo (ig), Fulah (ff)', 'Chad, Niger, Benin, Cameroon', '', NULL, 'assets/uploads/nigeria-flag-icon-128.png', 'assets/uploads/nigeria-flag-icon-16.png', 'assets/uploads/nigeria-flag-icon-32.png', 'assets/uploads/nigeria-flag-icon-64.png', NULL, NULL, NULL),
(167, '', 'Nicaragua', 'Cordoba (NIO)', 'Managua', '129,494.0 kmÂ²', 'Spanish (es-NI), English (en)', 'Costa Rica, Honduras', '', NULL, 'assets/uploads/nicaragua-flag-icon-128.png', 'assets/uploads/nicaragua-flag-icon-16.png', 'assets/uploads/nicaragua-flag-icon-32.png', 'assets/uploads/nicaragua-flag-icon-64.png', NULL, NULL, NULL),
(168, '', 'Netherlands', 'Euro (EUR)', 'Amsterdam', '41,526.0 kmÂ²', 'Dutch (nl-NL), Western Frisian (fy-NL)', 'Germany, Belgium', '', NULL, 'assets/uploads/netherlands-flag-icon-128.png', 'assets/uploads/netherlands-flag-icon-16.png', 'assets/uploads/netherlands-flag-icon-32.png', 'assets/uploads/netherlands-flag-icon-64.png', NULL, NULL, NULL),
(169, '', 'Norway', 'Krone (NOK)', 'Oslo', '324,220.0 kmÂ²', 'Norwegian (no), Norwegian BokmÃ¥l (nb), Norwegian Nynorsk (nn), Northern Sami (se), Finnish (fi)', 'Finland, Russia, Sweden', '', NULL, 'assets/uploads/norway-flag-icon-128.png', 'assets/uploads/norway-flag-icon-16.png', 'assets/uploads/norway-flag-icon-32.png', 'assets/uploads/norway-flag-icon-64.png', NULL, NULL, NULL),
(170, '', 'Nepal', 'Rupee (NPR)', 'Kathmandu', '140,800.0 kmÂ²', 'Nepali (macrolanguage) (ne), English (en)', 'China, India', '', NULL, 'assets/uploads/nepal-flag-icon-128.png', 'assets/uploads/nepal-flag-icon-16.png', 'assets/uploads/nepal-flag-icon-32.png', 'assets/uploads/nepal-flag-icon-64.png', NULL, NULL, NULL),
(171, '', 'Nauru', 'Dollar (AUD)', 'Yaren District', '21.0 kmÂ²', 'Nauru (na), English (en-NR)', '', '', NULL, 'assets/uploads/nauru-flag-icon-128.png', 'assets/uploads/nauru-flag-icon-16.png', 'assets/uploads/nauru-flag-icon-32.png', 'assets/uploads/nauru-flag-icon-64.png', NULL, NULL, NULL),
(172, '', 'Niue', 'Dollar (NZD)', 'Alofi', '260.0 kmÂ²', 'Niuean (niu), English (en-NU)', '', '', NULL, 'assets/uploads/niue-flag-icon-128.png', 'assets/uploads/niue-flag-icon-16.png', 'assets/uploads/niue-flag-icon-32.png', 'assets/uploads/niue-flag-icon-64.png', NULL, NULL, NULL),
(173, '', 'New Zealand', 'Dollar (NZD)', 'Wellington', '268,680.0 kmÂ²', 'English (en-NZ), Maori (mi)', '', '', NULL, 'assets/uploads/new-zealand-flag-icon-128.png', 'assets/uploads/new-zealand-flag-icon-16.png', 'assets/uploads/new-zealand-flag-icon-32.png', 'assets/uploads/new-zealand-flag-icon-64.png', NULL, NULL, NULL),
(174, '', 'Oman', 'Rial (OMR)', 'Muscat', '212,460.0 kmÂ²', 'Arabic (ar-OM), English (en), Baluchi (bal), Urdu (ur)', 'Saudi Arabia, Yemen, United Arab Emirates', '', NULL, 'assets/uploads/oman-flag-icon-128.png', 'assets/uploads/oman-flag-icon-16.png', 'assets/uploads/oman-flag-icon-32.png', 'assets/uploads/oman-flag-icon-64.png', NULL, NULL, NULL),
(175, '', 'Panama', 'Balboa (PAB)', 'Panama City', '78,200.0 kmÂ²', 'Spanish (es-PA), English (en)', 'Costa Rica, Colombia', '', NULL, 'assets/uploads/panama-flag-icon-128.png', 'assets/uploads/panama-flag-icon-16.png', 'assets/uploads/panama-flag-icon-32.png', 'assets/uploads/panama-flag-icon-64.png', NULL, NULL, NULL),
(176, '', 'Peru', 'Sol (PEN)', 'Lima', '1,285,220.0 kmÂ²', 'Spanish (es-PE), Quechua (qu), Aymara (ay)', 'Ecuador, Chile, Bolivia, Brazil, Colombia', '', NULL, 'assets/uploads/peru-flag-icon-128.png', 'assets/uploads/peru-flag-icon-16.png', 'assets/uploads/peru-flag-icon-32.png', 'assets/uploads/peru-flag-icon-64.png', NULL, NULL, NULL),
(177, '', 'French Polynesia', 'Franc (XPF)', 'Papeete', '4,167.0 kmÂ²', 'French (fr-PF), Tahitian (ty)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(178, '', 'Papua New Guinea', 'Kina (PGK)', 'Port Moresby', '462,840.0 kmÂ²', 'English (en-PG), Hiri Motu (ho), Motu (meu), Tok Pisin (tpi)', 'Indonesia', '', NULL, 'assets/uploads/papua-new-guinea-flag-icon-128.png', 'assets/uploads/papua-new-guinea-flag-icon-16.png', 'assets/uploads/papua-new-guinea-flag-icon-32.png', 'assets/uploads/papua-new-guinea-flag-icon-64.png', NULL, NULL, NULL),
(179, '', 'Philippines', 'Peso (PHP)', 'Manila', '300,000.0 kmÂ²', 'Tagalog (tl), English (en-PH), Filipino (fil), Cebuano (ceb), Tagalog (tgl), Iloko (ilo), Hiligaynon (hil), Waray (Philippines) (war), Pampanga (pam), Bikol (bik), Central Bikol (bcl), Pangasinan (pag), Maranao (mrw), Tausug (tsg), Maguindanaon (mdh), Chavacano (cbk), Kinaray-A (krj), Surigaonon (sgd), Masbatenyo (msb), Aklanon (akl), Ibanag (ibg), Yakan (yka), Cotabato Manobo (mta), Inabaknon (abx)', '', '', NULL, 'assets/uploads/philippines-flag-icon-128.png', 'assets/uploads/philippines-flag-icon-16.png', 'assets/uploads/philippines-flag-icon-32.png', 'assets/uploads/philippines-flag-icon-64.png', NULL, NULL, NULL),
(180, '', 'Pakistan', 'Rupee (PKR)', 'Islamabad', '803,940.0 kmÂ²', 'Urdu (ur-PK), English (en-PK), Panjabi (pa), Sindhi (sd), Pushto (ps), Brahui (brh)', 'China, Afghanistan, Iran, India', '', NULL, 'assets/uploads/pakistan-flag-icon-128.png', 'assets/uploads/pakistan-flag-icon-16.png', 'assets/uploads/pakistan-flag-icon-32.png', 'assets/uploads/pakistan-flag-icon-64.png', NULL, NULL, NULL),
(181, '', 'Poland', 'Zloty (PLN)', 'Warsaw', '312,685.0 kmÂ²', 'Polish (pl)', 'Germany, Lithuania, Slovakia, Czechia, Belarus, Ukraine, Russia', '', NULL, 'assets/uploads/poland-flag-icon-128.png', 'assets/uploads/poland-flag-icon-16.png', 'assets/uploads/poland-flag-icon-32.png', 'assets/uploads/poland-flag-icon-64.png', NULL, NULL, NULL),
(182, '', 'Saint Pierre and Miquelon', 'Euro (EUR)', 'Saint-Pierre', '242.0 kmÂ²', 'French (fr-PM)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(183, '', 'Pitcairn Islands', 'Dollar (NZD)', 'Adamstown', '47.0 kmÂ²', 'English (en-PN)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(184, '', 'Puerto Rico', 'Dollar (USD)', 'San Juan', '9,104.0 kmÂ²', 'English (en-PR), Spanish (es-PR)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(185, '', 'Palestine', 'Shekel (ILS)', '', '5,970.0 kmÂ²', 'Arabic (ar-PS)', 'Jordan, Israel, Egypt', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(186, '', 'Portugal', 'Euro (EUR)', 'Lisbon', '92,391.0 kmÂ²', 'Portuguese (pt-PT), Mirandese (mwl)', 'Spain', '', NULL, 'assets/uploads/portugal-flag-icon-128.png', 'assets/uploads/portugal-flag-icon-16.png', 'assets/uploads/portugal-flag-icon-32.png', 'assets/uploads/portugal-flag-icon-64.png', NULL, NULL, NULL),
(187, '', 'Palau', 'Dollar (USD)', 'Ngerulmud', '458.0 kmÂ²', 'Palauan (pau), Sonsorol (sov), English (en-PW), Tobian (tox), Japanese (ja), Filipino (fil), Chinese (zh)', '', '', NULL, 'assets/uploads/palau-flag-icon-128.png', 'assets/uploads/palau-flag-icon-16.png', 'assets/uploads/palau-flag-icon-32.png', 'assets/uploads/palau-flag-icon-64.png', NULL, NULL, NULL),
(188, '', 'Paraguay', 'Guarani (PYG)', 'AsunciÃ³n', '406,750.0 kmÂ²', 'Spanish (es-PY), Guarani (gn)', 'Bolivia, Brazil, Argentina', '', NULL, 'assets/uploads/paraguay-flag-icon-128.png', 'assets/uploads/paraguay-flag-icon-16.png', 'assets/uploads/paraguay-flag-icon-32.png', 'assets/uploads/paraguay-flag-icon-64.png', NULL, NULL, NULL),
(189, '', 'Qatar', 'Rial (QAR)', 'Doha', '11,437.0 kmÂ²', 'Arabic (ar-QA), Spanish (es)', 'Saudi Arabia', '', NULL, 'assets/uploads/qatar-flag-icon-128.png', 'assets/uploads/qatar-flag-icon-16.png', 'assets/uploads/qatar-flag-icon-32.png', 'assets/uploads/qatar-flag-icon-64.png', NULL, NULL, NULL),
(190, '', 'RÃ©union', 'Euro (EUR)', 'Saint-Denis', '2,517.0 kmÂ²', 'French (fr-RE)', '', '', NULL, 'assets/uploads/qatar-flag-icon-128.png', 'assets/uploads/qatar-flag-icon-16.png', 'assets/uploads/qatar-flag-icon-32.png', 'assets/uploads/qatar-flag-icon-64.png', NULL, NULL, NULL),
(191, '', 'Romania', 'Leu (RON)', 'Bucharest', '237,500.0 kmÂ²', 'Romanian (ro), Hungarian (hu), Romany (rom)', 'Moldova, Hungary, Ukraine, Bulgaria, Serbia', '', NULL, 'assets/uploads/romania-flag-icon-128.png', 'assets/uploads/romania-flag-icon-16.png', 'assets/uploads/romania-flag-icon-32.png', 'assets/uploads/romania-flag-icon-64.png', NULL, NULL, NULL),
(192, '', 'Serbia', 'Dinar (RSD)', 'Belgrade', '88,361.0 kmÂ²', 'Serbian (sr), Hungarian (hu), Bosnian (bs), Romany (rom)', 'Albania, Hungary, North Macedonia, Romania, Croatia, Bosnia and Herzegovina, Bulgaria, Montenegro, Kosovo', '', NULL, 'assets/uploads/serbia-flag-icon-128.png', 'assets/uploads/serbia-flag-icon-16.png', 'assets/uploads/serbia-flag-icon-32.png', 'assets/uploads/serbia-flag-icon-64.png', NULL, NULL, NULL),
(193, '', 'Russia', 'Ruble (RUB)', 'Moscow', '17,100,000.0 kmÂ²', 'Russian (ru), Tatar (tt), Kalmyk (xal), Caucasian languages (cau), Adyghe (ady), Komi (kv), Chechen (ce), Tuvinian (tyv), Chuvash (cv), Udmurt (udm), Altaic languages (tut), Mansi (mns), Buriat (bua), Erzya (myv), Moksha (mdf), Mari (Russia) (chm), Bashkir (ba), Ingush (inh), Kabardian (kbd), Karachay-Balkar (krc), Avaric (av), Yakut (sah), Nogai (nog)', 'Georgia, China, Belarus, Ukraine, Kazakhstan, Latvia, Poland, Estonia, Lithuania, Finland, Mongolia, Norway, Azerbaijan, North Korea', '', NULL, 'assets/uploads/russia-flag-icon-128.png', 'assets/uploads/russia-flag-icon-16.png', 'assets/uploads/russia-flag-icon-32.png', 'assets/uploads/russia-flag-icon-64.png', NULL, NULL, NULL),
(194, '', 'Rwanda', 'Franc (RWF)', 'Kigali', '26,338.0 kmÂ²', 'Kinyarwanda (rw), English (en-RW), French (fr-RW), Swahili (macrolanguage) (sw)', 'Tanzania, DR Congo, Burundi, Uganda', '', NULL, 'assets/uploads/rwanda-flag-icon-128.png', 'assets/uploads/rwanda-flag-icon-16.png', 'assets/uploads/rwanda-flag-icon-32.png', 'assets/uploads/rwanda-flag-icon-64.png', NULL, NULL, NULL),
(195, '', 'Saudi Arabia', 'Rial (SAR)', 'Riyadh', '1,960,582.0 kmÂ²', 'Arabic (ar-SA)', 'Qatar, Oman, Iraq, Yemen, Jordan, United Arab Emirates, Kuwait', '', NULL, 'assets/uploads/saudi-arabia-flag-icon-128.png', 'assets/uploads/saudi-arabia-flag-icon-16.png', 'assets/uploads/saudi-arabia-flag-icon-32.png', 'assets/uploads/saudi-arabia-flag-icon-64.png', NULL, NULL, NULL),
(196, '', 'Solomon Islands', 'Dollar (SBD)', 'Honiara', '28,450.0 kmÂ²', 'English (en-SB), Tok Pisin (tpi)', '', '', NULL, 'assets/uploads/solomon-islands-flag-icon-128.png', 'assets/uploads/solomon-islands-flag-icon-16.png', 'assets/uploads/solomon-islands-flag-icon-32.png', 'assets/uploads/solomon-islands-flag-icon-64.png', NULL, NULL, NULL),
(197, '', 'Seychelles', 'Rupee (SCR)', 'Victoria', '455.0 kmÂ²', 'English (en-SC), French (fr-SC)', '', '', NULL, 'assets/uploads/seychelles-flag-icon-128.png', 'assets/uploads/seychelles-flag-icon-16.png', 'assets/uploads/seychelles-flag-icon-32.png', 'assets/uploads/seychelles-flag-icon-64.png', NULL, NULL, NULL),
(198, '', 'Sudan', 'Pound (SDG)', 'Khartoum', '1,861,484.0 kmÂ²', 'Arabic (ar-SD), English (en), Nobiin (fia)', 'South Sudan, Chad, Egypt, Ethiopia, Eritrea, Libya, Central African Republic', '', NULL, 'assets/uploads/sudan-flag-icon-128.png', 'assets/uploads/sudan-flag-icon-16.png', 'assets/uploads/sudan-flag-icon-32.png', 'assets/uploads/sudan-flag-icon-64.png', NULL, NULL, NULL),
(199, '', 'Sweden', 'Krona (SEK)', 'Stockholm', '449,964.0 kmÂ²', 'Swedish (sv-SE), Northern Sami (se), Southern Sami (sma), Finnish (fi-SE)', 'Norway, Finland', '', NULL, 'assets/uploads/sweden-flag-icon-128.png', 'assets/uploads/sweden-flag-icon-16.png', 'assets/uploads/sweden-flag-icon-32.png', 'assets/uploads/sweden-flag-icon-64.png', NULL, NULL, NULL),
(200, '', 'Singapore', 'Dollar (SGD)', 'Singapore', '692.7 kmÂ²', 'Mandarin Chinese (cmn), English (en-SG), Malay (macrolanguage) (ms-SG), Tamil (ta-SG), Chinese (zh-SG)', '', '', NULL, 'assets/uploads/singapore-flag-icon-128.png', 'assets/uploads/singapore-flag-icon-16.png', 'assets/uploads/singapore-flag-icon-32.png', 'assets/uploads/singapore-flag-icon-64.png', NULL, NULL, NULL),
(201, '', 'Saint Helena', 'Pound (SHP)', 'Jamestown', '410.0 kmÂ²', 'English (en-SH)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(202, '', 'Slovenia', 'Euro (EUR)', 'Ljubljana', '20,273.0 kmÂ²', 'Slovenian (sl), Serbo-Croatian (sh)', 'Hungary, Italy, Croatia, Austria', '', NULL, 'assets/uploads/slovenia-flag-icon-128.png', 'assets/uploads/slovenia-flag-icon-16.png', 'assets/uploads/slovenia-flag-icon-32.png', 'assets/uploads/slovenia-flag-icon-64.png', NULL, NULL, NULL),
(203, '', 'Svalbard and Jan Mayen', 'Krone (NOK)', 'Longyearbyen', '62,049.0 kmÂ²', 'Norwegian (no), Russian (ru)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(204, '', 'Slovakia', 'Euro (EUR)', 'Bratislava', '48,845.0 kmÂ²', 'Slovak (sk), Hungarian (hu)', 'Poland, Hungary, Czechia, Ukraine, Austria', '', NULL, 'assets/uploads/slovakia-flag-icon-128.png', 'assets/uploads/slovakia-flag-icon-16.png', 'assets/uploads/slovakia-flag-icon-32.png', 'assets/uploads/slovakia-flag-icon-64.png', NULL, NULL, NULL),
(205, '', 'Sierra Leone', 'Leone (SLL)', 'Freetown', '71,740.0 kmÂ²', 'English (en-SL), Mende (Sierra Leone) (men), Timne (tem)', 'Liberia, Guinea', '', NULL, 'assets/uploads/sierra-leone-flag-icon-128.png', 'assets/uploads/sierra-leone-flag-icon-16.png', 'assets/uploads/sierra-leone-flag-icon-32.png', 'assets/uploads/sierra-leone-flag-icon-64.png', NULL, NULL, NULL),
(206, '', 'San Marino', 'Euro (EUR)', 'San Marino', '61.2 kmÂ²', 'Italian (it-SM)', 'Italy', '', NULL, 'assets/uploads/san-marino-flag-icon-128.png', 'assets/uploads/san-marino-flag-icon-16.png', 'assets/uploads/san-marino-flag-icon-32.png', 'assets/uploads/san-marino-flag-icon-64.png', NULL, NULL, NULL),
(207, '', 'Senegal', 'Franc (XOF)', 'Dakar', '196,190.0 kmÂ²', 'French (fr-SN), Wolof (wo), Pulaar (fuc), Mandinka (mnk)', 'Guinea, Mauritania, Guinea-Bissau, Gambia, Mali', '', NULL, 'assets/uploads/senegal-flag-icon-128.png', 'assets/uploads/senegal-flag-icon-16.png', 'assets/uploads/senegal-flag-icon-32.png', 'assets/uploads/senegal-flag-icon-64.png', NULL, NULL, NULL),
(208, '', 'Somalia', 'Shilling (SOS)', 'Mogadishu', '637,657.0 kmÂ²', 'Somali (so-SO), Arabic (ar-SO), Italian (it), English (en-SO)', 'Ethiopia, Kenya, Djibouti', '', NULL, 'assets/uploads/somalia-flag-icon-128.png', 'assets/uploads/somalia-flag-icon-16.png', 'assets/uploads/somalia-flag-icon-32.png', 'assets/uploads/somalia-flag-icon-64.png', NULL, NULL, NULL),
(209, '', 'Suriname', 'Dollar (SRD)', 'Paramaribo', '163,270.0 kmÂ²', 'Dutch (nl-SR), English (en), Sranan Tongo (srn), Caribbean Hindustani (hns), Javanese (jv)', 'Guyana, Brazil, French Guiana', '', NULL, 'assets/uploads/suriname-flag-icon-128.png', 'assets/uploads/suriname-flag-icon-16.png', 'assets/uploads/suriname-flag-icon-32.png', 'assets/uploads/suriname-flag-icon-64.png', NULL, NULL, NULL),
(210, '', 'South Sudan', 'Pound (SSP)', 'Juba', '644,329.0 kmÂ²', 'English (en)', 'DR Congo, Central African Republic, Ethiopia, Kenya, Sudan, Uganda', '', NULL, 'assets/uploads/south-sudan-flag-icon-128.png', 'assets/uploads/south-sudan-flag-icon-16.png', 'assets/uploads/south-sudan-flag-icon-32.png', 'assets/uploads/south-sudan-flag-icon-64.png', NULL, NULL, NULL),
(211, '', 'SÃ£o TomÃ© and PrÃ­ncipe', 'Dobra (STD)', 'SÃ£o TomÃ©', '1,001.0 kmÂ²', 'Portuguese (pt-ST)', '', '', NULL, 'assets/uploads/sao-tome-and-principe-flag-icon-128.png', 'assets/uploads/sao-tome-and-principe-flag-icon-16.png', 'assets/uploads/sao-tome-and-principe-flag-icon-32.png', 'assets/uploads/sao-tome-and-principe-flag-icon-64.png', NULL, NULL, NULL),
(212, '', 'El Salvador', 'Dollar (USD)', 'San Salvador', '21,040.0 kmÂ²', 'Spanish (es-SV)', 'Guatemala, Honduras', '', NULL, 'assets/uploads/el-salvador-flag-icon-128.png', 'assets/uploads/el-salvador-flag-icon-16.png', 'assets/uploads/el-salvador-flag-icon-32.png', 'assets/uploads/el-salvador-flag-icon-64.png', NULL, NULL, NULL),
(213, '', 'Sint Maarten', 'Guilder (ANG)', 'Philipsburg', '21.0 kmÂ²', 'Dutch (nl), English (en)', 'Saint Martin', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(214, '', 'Syria', 'Pound (SYP)', 'Damascus', '185,180.0 kmÂ²', 'Arabic (ar-SY), Kurdish (ku), Armenian (hy), Official Aramaic (700-300 BCE) (arc), French (fr), English (en)', 'Iraq, Jordan, Israel, Turkey, Lebanon', '', NULL, 'assets/uploads/syria-flag-icon-128.png', 'assets/uploads/syria-flag-icon-16.png', 'assets/uploads/syria-flag-icon-32.png', 'assets/uploads/syria-flag-icon-64.png', NULL, NULL, NULL),
(215, '', 'Eswatini', 'Lilangeni (SZL)', 'Mbabane', '17,363.0 kmÂ²', 'English (en-SZ), Swati (ss-SZ)', 'South Africa, Mozambique', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(216, '', 'Turks and Caicos Islands', 'Dollar (USD)', 'Cockburn Town', '430.0 kmÂ²', 'English (en-TC)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(217, '', 'Chad', 'Franc (XAF)', 'N\'Djamena', '1,284,000.0 kmÂ²', 'French (fr-TD), Arabic (ar-TD), Sara (sre)', 'Niger, Libya, Central African Republic, Sudan, Cameroon, Nigeria', '', NULL, 'assets/uploads/chad-flag-icon-128.png', 'assets/uploads/chad-flag-icon-16.png', 'assets/uploads/chad-flag-icon-32.png', 'assets/uploads/chad-flag-icon-64.png', NULL, NULL, NULL),
(218, '', 'French Southern Territories', 'Euro (EUR)', 'Port-aux-FranÃ§ais', '7,829.0 kmÂ²', 'French (fr)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(219, '', 'Togo', 'Franc (XOF)', 'LomÃ©', '56,785.0 kmÂ²', 'French (fr-TG), Ewe (ee), Mina (Cameroon) (hna), KabiyÃ¨ (kbp), Dagbani (dag), Hausa (ha)', 'Benin, Ghana, Burkina Faso', '', NULL, 'assets/uploads/togo-flag-icon-128.png', 'assets/uploads/togo-flag-icon-16.png', 'assets/uploads/togo-flag-icon-32.png', 'assets/uploads/togo-flag-icon-64.png', NULL, NULL, NULL),
(220, '', 'Thailand', 'Baht (THB)', 'Bangkok', '514,000.0 kmÂ²', 'Thai (th), English (en)', 'Laos, Myanmar, Cambodia, Malaysia', '', NULL, 'assets/uploads/thailand-flag-icon-128.png', 'assets/uploads/thailand-flag-icon-16.png', 'assets/uploads/thailand-flag-icon-32.png', 'assets/uploads/thailand-flag-icon-64.png', NULL, NULL, NULL),
(221, '', 'Tajikistan', 'Somoni (TJS)', 'Dushanbe', '143,100.0 kmÂ²', 'Tajik (tg), Russian (ru)', 'China, Afghanistan, Kyrgyzstan, Uzbekistan', '', NULL, 'assets/uploads/tajikistan-flag-icon-128.png', 'assets/uploads/tajikistan-flag-icon-16.png', 'assets/uploads/tajikistan-flag-icon-32.png', 'assets/uploads/tajikistan-flag-icon-64.png', NULL, NULL, NULL),
(222, '', 'Tokelau', 'Dollar (NZD)', '', '10.0 kmÂ²', 'Tokelau (tkl), English (en-TK)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(223, '', 'Timor-Leste', 'Dollar (USD)', 'Dili', '15,007.0 kmÂ²', 'Tetum (tet), Portuguese (pt-TL), Indonesian (id), English (en)', 'Indonesia', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(224, '', 'Turkmenistan', 'Manat (TMT)', 'Ashgabat', '488,100.0 kmÂ²', 'Turkmen (tk), Russian (ru), Uzbek (uz)', 'Afghanistan, Iran, Uzbekistan, Kazakhstan', '', NULL, 'assets/uploads/turkmenistan-flag-icon-128.png', 'assets/uploads/turkmenistan-flag-icon-16.png', 'assets/uploads/turkmenistan-flag-icon-32.png', 'assets/uploads/turkmenistan-flag-icon-64.png', NULL, NULL, NULL),
(225, '', 'Tunisia', 'Dinar (TND)', 'Tunis', '163,610.0 kmÂ²', 'Arabic (ar-TN), French (fr)', 'Algeria, Libya', '', NULL, 'assets/uploads/tunisia-flag-icon-128.png', 'assets/uploads/tunisia-flag-icon-16.png', 'assets/uploads/tunisia-flag-icon-32.png', 'assets/uploads/tunisia-flag-icon-64.png', NULL, NULL, NULL),
(226, '', 'Tonga', 'Pa\'anga (TOP)', 'Nuku\'alofa', '748.0 kmÂ²', 'Tonga (Tonga Islands) (to), English (en-TO)', '', '', NULL, 'assets/uploads/tonga-flag-icon-128.png', 'assets/uploads/tonga-flag-icon-16.png', 'assets/uploads/tonga-flag-icon-32.png', 'assets/uploads/tonga-flag-icon-64.png', NULL, NULL, NULL),
(227, '', 'Turkey', 'Lira (TRY)', 'Ankara', '780,580.0 kmÂ²', 'Turkish (tr-TR), Kurdish (ku), Dimli (individual language) (diq), Azerbaijani (az), Avaric (av)', 'Syria, Georgia, Iraq, Iran, Greece, Armenia, Azerbaijan, Bulgaria', '', NULL, 'assets/uploads/turkey-flag-icon-128.png', 'assets/uploads/turkey-flag-icon-16.png', 'assets/uploads/turkey-flag-icon-32.png', 'assets/uploads/turkey-flag-icon-64.png', NULL, NULL, NULL),
(228, '', 'Trinidad and Tobago', 'Dollar (TTD)', 'Port of Spain', '5,128.0 kmÂ²', 'English (en-TT), Caribbean Hindustani (hns), French (fr), Spanish (es), Chinese (zh)', '', '', NULL, 'assets/uploads/trinidad-and-tobago-flag-icon-128.png', 'assets/uploads/trinidad-and-tobago-flag-icon-16.png', 'assets/uploads/trinidad-and-tobago-flag-icon-32.png', 'assets/uploads/trinidad-and-tobago-flag-icon-64.png', NULL, NULL, NULL),
(229, '', 'Tuvalu', 'Dollar (AUD)', 'Funafuti', '26.0 kmÂ²', 'Tuvalu (tvl), English (en), Samoan (sm), Gilbertese (gil)', '', '', NULL, 'assets/uploads/tuvalu-flag-icon-128.png', 'assets/uploads/tuvalu-flag-icon-16.png', 'assets/uploads/tuvalu-flag-icon-32.png', 'assets/uploads/tuvalu-flag-icon-64.png', NULL, NULL, NULL),
(230, '', 'Taiwan', 'Dollar (TWD)', 'Taipei', '35,980.0 kmÂ²', 'Chinese (zh-TW), Chinese (zh), Min Nan Chinese (nan), Hakka Chinese (hak)', '', '', NULL, 'assets/uploads/taiwan-flag-icon-128.png', 'assets/uploads/taiwan-flag-icon-16.png', 'assets/uploads/taiwan-flag-icon-32.png', 'assets/uploads/taiwan-flag-icon-64.png', NULL, NULL, NULL),
(231, '', 'Tanzania', 'Shilling (TZS)', 'Dodoma', '945,087.0 kmÂ²', 'Swahili (macrolanguage) (sw-TZ), English (en), Arabic (ar)', 'Mozambique, Kenya, DR Congo, Rwanda, Zambia, Burundi, Uganda, Malawi', '', NULL, 'assets/uploads/tanzania-flag-icon-128.png', 'assets/uploads/tanzania-flag-icon-16.png', 'assets/uploads/tanzania-flag-icon-32.png', 'assets/uploads/tanzania-flag-icon-64.png', NULL, NULL, NULL),
(232, '', 'Ukraine', 'Hryvnia (UAH)', 'Kyiv', '603,700.0 kmÂ²', 'Ukrainian (uk), Russian (ru-UA), Romany (rom), Polish (pl), Hungarian (hu)', 'Poland, Moldova, Hungary, Slovakia, Belarus, Romania, Russia', '', NULL, 'assets/uploads/ukraine-flag-icon-128.png', 'assets/uploads/ukraine-flag-icon-16.png', 'assets/uploads/ukraine-flag-icon-32.png', 'assets/uploads/ukraine-flag-icon-64.png', NULL, NULL, NULL),
(233, '', 'Uganda', 'Shilling (UGX)', 'Kampala', '236,040.0 kmÂ²', 'English (en-UG), Ganda (lg), Swahili (macrolanguage) (sw), Arabic (ar)', 'Tanzania, Kenya, South Sudan, DR Congo, Rwanda', '', NULL, 'assets/uploads/uganda-flag-icon-128.png', 'assets/uploads/uganda-flag-icon-16.png', 'assets/uploads/uganda-flag-icon-32.png', 'assets/uploads/uganda-flag-icon-64.png', NULL, NULL, NULL),
(234, '', 'U.S. Minor Outlying Islands', 'Dollar (USD)', '', '0.0 kmÂ²', 'English (en-UM)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(235, '', 'United States', 'Dollar (USD)', 'Washington', '9,629,091.0 kmÂ²', 'English (en-US), Spanish (es-US), Hawaiian (haw), French (fr)', 'Canada, Mexico, Cuba', '', NULL, 'assets/uploads/united-states-of-america-flag-icon-128.png', 'assets/uploads/united-states-of-america-flag-icon-16.png', 'assets/uploads/united-states-of-america-flag-icon-32.png', 'assets/uploads/united-states-of-america-flag-icon-64.png', NULL, NULL, NULL),
(236, '', 'Uruguay', 'Peso (UYU)', 'Montevideo', '176,220.0 kmÂ²', 'Spanish (es-UY)', 'Brazil, Argentina', '', NULL, 'assets/uploads/uruguay-flag-icon-128.png', 'assets/uploads/uruguay-flag-icon-16.png', 'assets/uploads/uruguay-flag-icon-32.png', 'assets/uploads/uruguay-flag-icon-64.png', NULL, NULL, NULL),
(237, '', 'Uzbekistan', 'Som (UZS)', 'Tashkent', '447,400.0 kmÂ²', 'Uzbek (uz), Russian (ru), Tajik (tg)', 'Turkmenistan, Afghanistan, Kyrgyzstan, Tajikistan, Kazakhstan', '', NULL, 'assets/uploads/uzbekistan-flag-icon-128.png', 'assets/uploads/uzbekistan-flag-icon-16.png', 'assets/uploads/uzbekistan-flag-icon-32.png', 'assets/uploads/uzbekistan-flag-icon-64.png', NULL, NULL, NULL),
(238, '', 'Vatican City', 'Euro (EUR)', 'Vatican City', '0.4 kmÂ²', 'Latin (la), Italian (it), French (fr)', 'Italy', '', NULL, 'assets/uploads/vatican-city-flag-icon-128.png', 'assets/uploads/vatican-city-flag-icon-16.png', 'assets/uploads/vatican-city-flag-icon-32.png', 'assets/uploads/vatican-city-flag-icon-64.png', NULL, NULL, NULL),
(239, '', 'St Vincent and Grenadines', 'Dollar (XCD)', 'Kingstown', '389.0 kmÂ²', 'English (en-VC), French (fr)', '', '', NULL, 'assets/uploads/saint-vincent-and-the-grenadines-flag-icon-128.png', 'assets/uploads/saint-vincent-and-the-grenadines-flag-icon-16.png', 'assets/uploads/saint-vincent-and-the-grenadines-flag-icon-32.png', 'assets/uploads/saint-vincent-and-the-grenadines-flag-icon-64.png', NULL, NULL, NULL),
(240, '', 'Venezuela', 'Bolivar Soberano (VE', 'Caracas', '912,050.0 kmÂ²', 'Spanish (es-VE)', 'Guyana, Brazil, Colombia', '', NULL, 'assets/uploads/venezuela-flag-icon-128.png', 'assets/uploads/venezuela-flag-icon-16.png', 'assets/uploads/venezuela-flag-icon-32.png', 'assets/uploads/venezuela-flag-icon-64.png', NULL, NULL, NULL),
(241, '', 'British Virgin Islands', 'Dollar (USD)', 'Road Town', '153.0 kmÂ²', 'English (en-VG)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(242, '', 'U.S. Virgin Islands', 'Dollar (USD)', 'Charlotte Amalie', '352.0 kmÂ²', 'English (en-VI)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(243, '', 'Vietnam', 'Dong (VND)', 'Hanoi', '329,560.0 kmÂ²', 'Vietnamese (vi), English (en), French (fr), Chinese (zh), Khmer (km)', 'China, Laos, Cambodia', '', NULL, 'assets/uploads/vietnam-flag-icon-128.png', 'assets/uploads/vietnam-flag-icon-16.png', 'assets/uploads/vietnam-flag-icon-32.png', 'assets/uploads/vietnam-flag-icon-64.png', NULL, NULL, NULL),
(244, '', 'Vanuatu', 'Vatu (VUV)', 'Port Vila', '12,200.0 kmÂ²', 'Bislama (bi), English (en-VU), French (fr-VU)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(245, '', 'Wallis and Futuna', 'Franc (XPF)', 'Mata-Utu', '274.0 kmÂ²', 'Wallisian (wls), East Futuna (fud), French (fr-WF)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(246, '', 'Samoa', 'Tala (WST)', 'Apia', '2,944.0 kmÂ²', 'Samoan (sm), English (en-WS)', '', '', NULL, 'assets/uploads/samoa-flag-icon-128.png', 'assets/uploads/samoa-flag-icon-16.png', 'assets/uploads/samoa-flag-icon-32.png', 'assets/uploads/samoa-flag-icon-64.png', NULL, NULL, NULL),
(247, '', 'Kosovo', 'Euro (EUR)', 'Pristina', '10,908.0 kmÂ²', 'Albanian (sq), Serbian (sr)', 'Serbia, Albania, North Macedonia, Montenegro', '', NULL, 'assets/uploads/kosovo-flag-icon-128.png', 'assets/uploads/kosovo-flag-icon-16.png', 'assets/uploads/kosovo-flag-icon-32.png', 'assets/uploads/kosovo-flag-icon-64.png', NULL, NULL, NULL),
(248, '', 'Yemen', 'Rial (YER)', 'Sanaa', '527,970.0 kmÂ²', 'Arabic (ar-YE)', 'Saudi Arabia, Oman', '', NULL, 'assets/uploads/yemen-flag-icon-128.png', 'assets/uploads/yemen-flag-icon-16.png', 'assets/uploads/yemen-flag-icon-32.png', 'assets/uploads/yemen-flag-icon-64.png', NULL, NULL, NULL),
(249, '', 'Mayotte', 'Euro (EUR)', 'Mamoudzou', '374.0 kmÂ²', 'French (fr-YT)', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(250, '', 'South Africa', 'Rand (ZAR)', 'Pretoria', '1,219,912.0 kmÂ²', 'Zulu (zu), Xhosa (xh), Afrikaans (af), Pedi (nso), English (en-ZA), Tswana (tn), Southern Sotho (st), Tsonga (ts), Swati (ss), Venda (ve), South Ndebele (nr)', 'Zimbabwe, Eswatini, Mozambique, Botswana, Namibia, Lesotho', '', NULL, 'assets/uploads/south-africa-flag-icon-128.png', 'assets/uploads/south-africa-flag-icon-16.png', 'assets/uploads/south-africa-flag-icon-32.png', 'assets/uploads/south-africa-flag-icon-64.png', NULL, NULL, NULL),
(251, '', 'Zambia', 'Kwacha (ZMW)', 'Lusaka', '752,614.0 kmÂ²', 'English (en-ZM), Bemba (Zambia) (bem), Lozi (loz), Lunda (lun), Luvale (lue), Nyanja (ny), Tonga (Zambia) (toi)', 'Zimbabwe, Tanzania, Mozambique, DR Congo, Namibia, Malawi, Angola', '', NULL, 'assets/uploads/zambia-flag-icon-128.png', 'assets/uploads/zambia-flag-icon-16.png', 'assets/uploads/zambia-flag-icon-32.png', 'assets/uploads/zambia-flag-icon-64.png', NULL, NULL, NULL),
(252, '', 'Zimbabwe', 'Dollar (ZWL)', 'Harare', '390,580.0 kmÂ²', 'English (en-ZW), Shona (sn), South Ndebele (nr), North Ndebele (nd)', 'South Africa, Mozambique, Botswana, Zambia', '', NULL, 'assets/uploads/zimbabwe-flag-icon-128.png', 'assets/uploads/zimbabwe-flag-icon-16.png', 'assets/uploads/zimbabwe-flag-icon-32.png', 'assets/uploads/zimbabwe-flag-icon-64.png', NULL, NULL, NULL),
(253, '', 'Cape Verde', '', NULL, NULL, NULL, NULL, '', NULL, 'assets/uploads/cape-verde-flag-icon-128.png', 'assets/uploads/cape-verde-flag-icon-16.png', 'assets/uploads/cape-verde-flag-icon-32.png', 'assets/uploads/cape-verde-flag-icon-64.png', NULL, NULL, NULL),
(254, '', 'Republic of the Congo', '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(255, '', 'Democratic Republic of the Congo', '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(256, '', 'Czech Republic', '', NULL, NULL, NULL, NULL, '', NULL, 'assets/uploads/czech-republic-flag-icon-128.png', 'assets/uploads/czech-republic-flag-icon-16.png', 'assets/uploads/czech-republic-flag-icon-32.png', 'assets/uploads/czech-republic-flag-icon-64.png', NULL, NULL, NULL),
(257, '', 'Saint Kitts and Nevis', '', NULL, NULL, NULL, NULL, '', NULL, 'assets/uploads/saint-kitts-and-nevis-flag-icon-128.png', 'assets/uploads/saint-kitts-and-nevis-flag-icon-16.png', 'assets/uploads/saint-kitts-and-nevis-flag-icon-32.png', 'assets/uploads/saint-kitts-and-nevis-flag-icon-64.png', NULL, NULL, NULL),
(258, 'Vincent', 'Saint Vincent and the Grenadines', 'Vincent', 'Vincent', '3,287,590.0 km²', 'English (en-IN), Hindi (hi), Bengali (bn), Telugu (te), Marathi (mr), Tamil (ta), Urdu (ur), Gujarati (gu), Kannada (kn), Malayalam (ml), Oriya (macrolanguage) (or), Panjabi (pa), Assamese (as), Bihari languages (bh), Santali (sat), Kashmiri (ks), Nepali (macrolanguage) (ne), Sindhi (sd), Konkani (macrolanguage) (kok), Dogri (macrolanguage) (doi), Manipuri (mni), Sino-Tibetan languages (sit), Sanskrit (sa), French (fr), Lushai (lus), Indic languages (inc)', 'China, Nepal, Myanmar, Bhutan, Pakistan, Bangladesh', 'Vincent', '', 'assets/uploads/saint-vincent-and-the-grenadines-flag-icon-128.png', 'assets/uploads/saint-vincent-and-the-grenadines-flag-icon-16.png', 'assets/uploads/saint-vincent-and-the-grenadines-flag-icon-32.png', 'assets/uploads/saint-vincent-and-the-grenadines-flag-icon-64.png', NULL, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enquiry`
--

CREATE TABLE `tbl_enquiry` (
  `id` int(11) NOT NULL,
  `generalinfo_id` int(11) NOT NULL,
  `visa_type` int(11) NOT NULL,
  `origin_country` int(11) NOT NULL,
  `franchise_id` int(11) DEFAULT NULL,
  `destination_country` int(11) NOT NULL,
  `form_data` longtext NOT NULL,
  `stage` varchar(10) NOT NULL DEFAULT 'new',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_enquiry`
--

INSERT INTO `tbl_enquiry` (`id`, `generalinfo_id`, `visa_type`, `origin_country`, `franchise_id`, `destination_country`, `form_data`, `stage`, `date`) VALUES
(1, 205, 127, 107, 1, 160, 'a:1:{s:19:\"general_information\";a:1:{s:6:\"gender\";a:1:{i:1;s:4:\"Male\";}}}', 'new', '2022-08-22 18:30:00'),
(2, 205, 127, 107, 1, 160, 'a:1:{s:19:\"general_information\";a:1:{s:6:\"gender\";a:1:{i:1;s:4:\"Male\";}}}', 'new', '2022-08-22 18:30:00'),
(3, 205, 127, 107, 1, 160, 'a:1:{s:19:\"general_information\";a:2:{s:6:\"gender\";a:1:{i:1;s:4:\"Male\";}s:7:\"surname\";a:1:{i:1;s:0:\"\";}}}', 'new', '2022-08-22 18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_form_attribute`
--

CREATE TABLE `tbl_form_attribute` (
  `id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `form_group` varchar(20) NOT NULL,
  `label_name` text NOT NULL,
  `input_type` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=deactive,1=active',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_form_attribute`
--

INSERT INTO `tbl_form_attribute` (`id`, `form_id`, `form_group`, `label_name`, `input_type`, `status`, `date`) VALUES
(101, 25, 'General information', 'Gender', 'radio', 1, '2022-06-15 09:35:20'),
(102, 25, 'General information', 'surname', 'text', 1, '2022-08-23 05:15:05'),
(103, 25, 'General information', 'given name', 'text', 1, '2022-08-23 05:15:14'),
(104, 25, 'General information', 'country of birth', 'country', 1, '2022-08-23 05:15:34'),
(105, 25, 'Passport information', 'Passport no', 'text', 1, '2022-09-04 12:30:34'),
(106, 25, 'Passport information', 'Valid from', 'date', 1, '2022-09-04 12:30:49'),
(107, 25, 'Passport information', 'Valid till', 'date', 1, '2022-09-04 12:31:13'),
(108, 25, 'Passport information', 'Date of birth', 'date', 1, '2022-09-04 12:31:51'),
(109, 25, 'Passport information', 'Country of birth', 'country', 1, '2022-09-04 12:32:10'),
(110, 25, 'Passport information', 'Mailing address', 'text', 1, '2022-09-04 12:32:34'),
(111, 25, 'Passport information', 'Place of birth', 'text', 1, '2022-09-04 12:32:51'),
(113, 25, 'Travel information', 'Travel date', 'date', 1, '2022-09-04 12:33:44'),
(114, 25, 'Travel information', 'Return date', 'date', 1, '2022-09-04 12:33:53'),
(115, 25, 'Travel information', 'Address where you stay', 'text', 1, '2022-09-04 12:34:05'),
(116, 25, 'Travel information', 'Full name of the contact person', 'text', 1, '2022-09-04 12:34:20'),
(117, 25, 'Travel information', 'Mobile no of the contact person', 'text', 1, '2022-09-04 12:34:32'),
(118, 25, 'Travel information', 'Email of the contact person', 'text', 1, '2022-09-04 12:34:51'),
(119, 25, 'Education informatio', 'College Name of highest graduation', 'text', 1, '2022-09-04 12:35:53'),
(120, 25, 'Education informatio', 'Address of college', 'text', 1, '2022-09-04 12:36:03'),
(121, 25, 'Education informatio', 'Country', 'country', 1, '2022-09-04 12:36:13'),
(122, 25, 'Education informatio', 'Course name', 'text', 1, '2022-09-04 12:36:27'),
(123, 26, 'General information', 'Gender', 'radio', 1, '2022-09-04 12:36:37'),
(124, 26, 'General information', 'surname', 'text', 1, '2022-09-04 12:36:37'),
(125, 26, 'General information', 'given name', 'text', 1, '2022-09-04 12:36:37'),
(126, 26, 'General information', 'country of birth', 'country', 1, '2022-09-04 12:36:37'),
(127, 26, 'Passport information', 'Passport no', 'text', 1, '2022-09-04 12:36:37'),
(128, 26, 'Passport information', 'Valid from', 'date', 1, '2022-09-04 12:36:37'),
(129, 26, 'Passport information', 'Valid till', 'date', 1, '2022-09-04 12:36:37'),
(130, 26, 'Passport information', 'Date of birth', 'date', 1, '2022-09-04 12:36:37'),
(131, 26, 'Passport information', 'Country of birth', 'country', 1, '2022-09-04 12:36:37'),
(132, 26, 'Passport information', 'Mailing address', 'text', 1, '2022-09-04 12:36:37'),
(133, 26, 'Passport information', 'Place of birth', 'text', 1, '2022-09-04 12:36:37'),
(134, 26, 'Travel information', 'Travel date', 'date', 1, '2022-09-04 12:36:37'),
(135, 26, 'Travel information', 'Return date', 'date', 1, '2022-09-04 12:36:37'),
(136, 26, 'Travel information', 'Address where you stay', 'text', 1, '2022-09-04 12:36:37'),
(137, 26, 'Travel information', 'Full name of the contact person', 'text', 1, '2022-09-04 12:36:37'),
(138, 26, 'Travel information', 'Mobile no of the contact person', 'text', 1, '2022-09-04 12:36:37'),
(139, 26, 'Travel information', 'Email of the contact person', 'text', 1, '2022-09-04 12:36:37'),
(140, 26, 'Education informatio', 'College Name of highest graduation', 'text', 1, '2022-09-04 12:36:37'),
(141, 26, 'Education informatio', 'Address of college', 'text', 1, '2022-09-04 12:36:37'),
(142, 26, 'Education informatio', 'Country', 'country', 1, '2022-09-04 12:36:37'),
(143, 26, 'Education informatio', 'Course name', 'text', 1, '2022-09-04 12:36:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_generalinfo`
--

CREATE TABLE `tbl_generalinfo` (
  `id` int(11) NOT NULL,
  `form_id` int(11) DEFAULT NULL,
  `origin_country` int(11) NOT NULL,
  `destination_country` int(11) NOT NULL,
  `visa_type` text DEFAULT NULL,
  `separate_page` text NOT NULL,
  `notes` longtext DEFAULT NULL,
  `extra_notes` longtext DEFAULT NULL,
  `process` longtext DEFAULT NULL,
  `required_document` text DEFAULT NULL,
  `origin_slug` varchar(200) DEFAULT NULL,
  `destination_slug` varchar(200) DEFAULT NULL,
  `default_sulg` varchar(200) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_generalinfo`
--

INSERT INTO `tbl_generalinfo` (`id`, `form_id`, `origin_country`, `destination_country`, `visa_type`, `separate_page`, `notes`, `extra_notes`, `process`, `required_document`, `origin_slug`, `destination_slug`, `default_sulg`, `date`) VALUES
(205, 0, 107, 160, '120,121', '', '', '', '8,9,10', '', 'india', '', 'malaysia-visa-requirement', '2022-08-23 05:10:00'),
(206, 0, 7, 49, '122', '', '', '', '11', '', 'armenia', '', 'china-visa-requirement', '2022-08-29 14:00:41'),
(207, 0, 18, 49, '122', '', '', '', '11', '', 'bosnia-and-herzegovina', '', 'china-visa-requirement', '2022-08-29 14:00:41'),
(208, 0, 206, 49, '122', '', '', '', '11', '', 'san-marino', '', 'china-visa-requirement', '2022-08-29 14:00:41'),
(209, 0, 156, 49, '123', '', '', '', '11', '', 'mauritius', '', 'china-visa-requirement', '2022-08-29 14:22:56'),
(210, 0, 2, 49, '124', '', '', '', '11', '', 'united-arab-emirates', '', 'china-visa-requirement', '2022-08-29 14:25:22'),
(211, 0, 19, 49, '124', '', '', '', '11', '', 'barbados', '', 'china-visa-requirement', '2022-08-29 14:25:22'),
(212, 0, 33, 49, '124', '', '', '', '11', '', 'bahamas', '', 'china-visa-requirement', '2022-08-29 14:25:22'),
(213, 0, 37, 49, '124', '', '', '', '11', '', 'belarus', '', 'china-visa-requirement', '2022-08-29 14:25:22'),
(214, 0, 65, 49, '124', '', '', '', '11', '', 'ecuador', '', 'china-visa-requirement', '2022-08-29 14:25:22'),
(215, 0, 73, 49, '124', '', '', '', '11', '', 'fiji', '', 'china-visa-requirement', '2022-08-29 14:25:23'),
(216, 0, 80, 49, '124', '', '', '', '11', '', 'grenada', '', 'china-visa-requirement', '2022-08-29 14:25:23'),
(217, 0, 189, 49, '124', '', '', '', '11', '', 'qatar', '', 'china-visa-requirement', '2022-08-29 14:25:23'),
(218, 0, 192, 49, '124', '', '', '', '11', '', 'serbia', '', 'china-visa-requirement', '2022-08-29 14:25:23'),
(219, 0, 197, 49, '124', '', '', '', '11', '', 'seychelles', '', 'china-visa-requirement', '2022-08-29 14:25:23'),
(220, 0, 209, 49, '124', '', '', '', '11', '', 'suriname', '', 'china-visa-requirement', '2022-08-29 14:25:23'),
(221, 0, 226, 49, '124', '', '', '', '11', '', 'tonga', '', 'china-visa-requirement', '2022-08-29 14:25:23'),
(222, 0, 29, 49, '125', '', '', '', '11', '', 'brunei', '', 'china-visa-requirement', '2022-08-29 14:26:10'),
(223, 0, 116, 49, '125', '', '', '', '11', '', 'japan', '', 'china-visa-requirement', '2022-08-29 14:26:10'),
(224, 0, 200, 49, '125', '', '', '', '11', '', 'singapore', '', 'china-visa-requirement', '2022-08-29 14:26:10'),
(225, 0, 21, 13, '126', '', '', '', '11', '', 'belgium', '', 'austria-visa-requirement', '2022-08-29 15:02:47'),
(226, 0, 44, 13, '126', '', '', '', '11', '', 'switzerland', '', 'austria-visa-requirement', '2022-08-29 15:02:47'),
(227, 0, 59, 13, '126', '', '', '', '11', '', 'germany', '', 'austria-visa-requirement', '2022-08-29 15:02:47'),
(228, 0, 61, 13, '126', '', '', '', '11', '', 'denmark', '', 'austria-visa-requirement', '2022-08-29 15:02:47'),
(229, 0, 66, 13, '126', '', '', '', '11', '', 'estonia', '', 'austria-visa-requirement', '2022-08-29 15:02:47'),
(230, 0, 70, 13, '126', '', '', '', '11', '', 'spain', '', 'austria-visa-requirement', '2022-08-29 15:02:47'),
(231, 0, 72, 13, '126', '', '', '', '11', '', 'finland', '', 'austria-visa-requirement', '2022-08-29 15:02:47'),
(232, 0, 77, 13, '126', '', '', '', '11', '', 'france', '', 'austria-visa-requirement', '2022-08-29 15:02:47'),
(233, 0, 91, 13, '126', '', '', '', '11', '', 'greece', '', 'austria-visa-requirement', '2022-08-29 15:02:47'),
(234, 0, 102, 13, '126', '', '', '', '11', '', 'hungary', '', 'austria-visa-requirement', '2022-08-29 15:02:47'),
(235, 0, 111, 13, '126', '', '', '', '11', '', 'iceland', '', 'austria-visa-requirement', '2022-08-29 15:02:47'),
(236, 0, 112, 13, '126', '', '', '', '11', '', 'italy', '', 'austria-visa-requirement', '2022-08-29 15:02:47'),
(237, 0, 131, 13, '126', '', '', '', '11', '', 'liechtenstein', '', 'austria-visa-requirement', '2022-08-29 15:02:47'),
(238, 0, 135, 13, '126', '', '', '', '11', '', 'lithuania', '', 'austria-visa-requirement', '2022-08-29 15:02:47'),
(239, 0, 136, 13, '126', '', '', '', '11', '', 'luxembourg', '', 'austria-visa-requirement', '2022-08-29 15:02:47'),
(240, 0, 137, 13, '126', '', '', '', '11', '', 'latvia', '', 'austria-visa-requirement', '2022-08-29 15:02:47'),
(241, 0, 155, 13, '126', '', '', '', '11', '', 'malta', '', 'austria-visa-requirement', '2022-08-29 15:02:47'),
(242, 0, 168, 13, '126', '', '', '', '11', '', 'netherlands', '', 'austria-visa-requirement', '2022-08-29 15:02:47'),
(243, 0, 169, 13, '126', '', '', '', '11', '', 'norway', '', 'austria-visa-requirement', '2022-08-29 15:02:47'),
(244, 0, 181, 13, '126', '', '', '', '11', '', 'poland', '', 'austria-visa-requirement', '2022-08-29 15:02:47'),
(245, 0, 186, 13, '126', '', '', '', '11', '', 'portugal', '', 'austria-visa-requirement', '2022-08-29 15:02:47'),
(246, 0, 199, 13, '126', '', '', '', '11', '', 'sweden', '', 'austria-visa-requirement', '2022-08-29 15:02:47'),
(247, 0, 202, 13, '126', '', '', '', '11', '', 'slovenia', '', 'austria-visa-requirement', '2022-08-29 15:02:47'),
(248, 0, 204, 13, '126', '', '', '', '11', '', 'slovakia', '', 'austria-visa-requirement', '2022-08-29 15:02:47'),
(249, 0, 256, 13, '126', '', '', '', '11', '', 'czech-republic', '', 'austria-visa-requirement', '2022-08-29 15:02:47'),
(250, 0, 13, 21, '127', '', '', '', '11', '', 'austria', '', 'belgium-visa-requirement', '2022-08-29 15:05:50'),
(251, 0, 44, 21, '127', '', '', '', '11', '', 'switzerland', '', 'belgium-visa-requirement', '2022-08-29 15:05:50'),
(252, 0, 59, 21, '127', '', '', '', '11', '', 'germany', '', 'belgium-visa-requirement', '2022-08-29 15:05:50'),
(253, 0, 61, 21, '127', '', '', '', '11', '', 'denmark', '', 'belgium-visa-requirement', '2022-08-29 15:05:50'),
(254, 0, 66, 21, '127', '', '', '', '11', '', 'estonia', '', 'belgium-visa-requirement', '2022-08-29 15:05:50'),
(255, 0, 70, 21, '127', '', '', '', '11', '', 'spain', '', 'belgium-visa-requirement', '2022-08-29 15:05:50'),
(256, 0, 72, 21, '127', '', '', '', '11', '', 'finland', '', 'belgium-visa-requirement', '2022-08-29 15:05:50'),
(257, 0, 77, 21, '127', '', '', '', '11', '', 'france', '', 'belgium-visa-requirement', '2022-08-29 15:05:50'),
(258, 0, 91, 21, '127', '', '', '', '11', '', 'greece', '', 'belgium-visa-requirement', '2022-08-29 15:05:50'),
(259, 0, 102, 21, '127', '', '', '', '11', '', 'hungary', '', 'belgium-visa-requirement', '2022-08-29 15:05:50'),
(260, 0, 111, 21, '127', '', '', '', '11', '', 'iceland', '', 'belgium-visa-requirement', '2022-08-29 15:05:50'),
(261, 0, 112, 21, '127', '', '', '', '11', '', 'italy', '', 'belgium-visa-requirement', '2022-08-29 15:05:50'),
(262, 0, 131, 21, '127', '', '', '', '11', '', 'liechtenstein', '', 'belgium-visa-requirement', '2022-08-29 15:05:50'),
(263, 0, 135, 21, '127', '', '', '', '11', '', 'lithuania', '', 'belgium-visa-requirement', '2022-08-29 15:05:50'),
(264, 0, 136, 21, '127', '', '', '', '11', '', 'luxembourg', '', 'belgium-visa-requirement', '2022-08-29 15:05:50'),
(265, 0, 137, 21, '127', '', '', '', '11', '', 'latvia', '', 'belgium-visa-requirement', '2022-08-29 15:05:50'),
(266, 0, 155, 21, '127', '', '', '', '11', '', 'malta', '', 'belgium-visa-requirement', '2022-08-29 15:05:50'),
(267, 0, 168, 21, '127', '', '', '', '11', '', 'netherlands', '', 'belgium-visa-requirement', '2022-08-29 15:05:50'),
(268, 0, 169, 21, '127', '', '', '', '11', '', 'norway', '', 'belgium-visa-requirement', '2022-08-29 15:05:50'),
(269, 0, 181, 21, '127', '', '', '', '11', '', 'poland', '', 'belgium-visa-requirement', '2022-08-29 15:05:50'),
(270, 0, 186, 21, '127', '', '', '', '11', '', 'portugal', '', 'belgium-visa-requirement', '2022-08-29 15:05:50'),
(271, 0, 199, 21, '127', '', '', '', '11', '', 'sweden', '', 'belgium-visa-requirement', '2022-08-29 15:05:50'),
(272, 0, 202, 21, '127', '', '', '', '11', '', 'slovenia', '', 'belgium-visa-requirement', '2022-08-29 15:05:50'),
(273, 0, 204, 21, '127', '', '', '', '11', '', 'slovakia', '', 'belgium-visa-requirement', '2022-08-29 15:05:50'),
(274, 0, 256, 21, '127', '', '', '', '11', '', 'czech-republic', '', 'belgium-visa-requirement', '2022-08-29 15:05:50'),
(275, 0, 13, 256, '128', '', '', '', '11', '', 'austria', '', 'czech-republic-visa-requirement', '2022-08-29 15:08:37'),
(276, 0, 21, 256, '128', '', '', '', '11', '', 'belgium', '', 'czech-republic-visa-requirement', '2022-08-29 15:08:37'),
(277, 0, 44, 256, '128', '', '', '', '11', '', 'switzerland', '', 'czech-republic-visa-requirement', '2022-08-29 15:08:37'),
(278, 0, 59, 256, '128', '', '', '', '11', '', 'germany', '', 'czech-republic-visa-requirement', '2022-08-29 15:08:37'),
(279, 0, 61, 256, '128', '', '', '', '11', '', 'denmark', '', 'czech-republic-visa-requirement', '2022-08-29 15:08:37'),
(280, 0, 66, 256, '128', '', '', '', '11', '', 'estonia', '', 'czech-republic-visa-requirement', '2022-08-29 15:08:37'),
(281, 0, 70, 256, '128', '', '', '', '11', '', 'spain', '', 'czech-republic-visa-requirement', '2022-08-29 15:08:37'),
(282, 0, 72, 256, '128', '', '', '', '11', '', 'finland', '', 'czech-republic-visa-requirement', '2022-08-29 15:08:37'),
(283, 0, 77, 256, '128', '', '', '', '11', '', 'france', '', 'czech-republic-visa-requirement', '2022-08-29 15:08:37'),
(284, 0, 91, 256, '128', '', '', '', '11', '', 'greece', '', 'czech-republic-visa-requirement', '2022-08-29 15:08:37'),
(285, 0, 102, 256, '128', '', '', '', '11', '', 'hungary', '', 'czech-republic-visa-requirement', '2022-08-29 15:08:37'),
(286, 0, 111, 256, '128', '', '', '', '11', '', 'iceland', '', 'czech-republic-visa-requirement', '2022-08-29 15:08:37'),
(287, 0, 112, 256, '128', '', '', '', '11', '', 'italy', '', 'czech-republic-visa-requirement', '2022-08-29 15:08:37'),
(288, 0, 131, 256, '128', '', '', '', '11', '', 'liechtenstein', '', 'czech-republic-visa-requirement', '2022-08-29 15:08:37'),
(289, 0, 135, 256, '128', '', '', '', '11', '', 'lithuania', '', 'czech-republic-visa-requirement', '2022-08-29 15:08:37'),
(290, 0, 136, 256, '128', '', '', '', '11', '', 'luxembourg', '', 'czech-republic-visa-requirement', '2022-08-29 15:08:37'),
(291, 0, 137, 256, '128', '', '', '', '11', '', 'latvia', '', 'czech-republic-visa-requirement', '2022-08-29 15:08:37'),
(292, 0, 155, 256, '128', '', '', '', '11', '', 'malta', '', 'czech-republic-visa-requirement', '2022-08-29 15:08:37'),
(293, 0, 168, 256, '128', '', '', '', '11', '', 'netherlands', '', 'czech-republic-visa-requirement', '2022-08-29 15:08:37'),
(294, 0, 169, 256, '128', '', '', '', '11', '', 'norway', '', 'czech-republic-visa-requirement', '2022-08-29 15:08:37'),
(295, 0, 181, 256, '128', '', '', '', '11', '', 'poland', '', 'czech-republic-visa-requirement', '2022-08-29 15:08:37'),
(296, 0, 186, 256, '128', '', '', '', '11', '', 'portugal', '', 'czech-republic-visa-requirement', '2022-08-29 15:08:37'),
(297, 0, 199, 256, '128', '', '', '', '11', '', 'sweden', '', 'czech-republic-visa-requirement', '2022-08-29 15:08:37'),
(298, 0, 202, 256, '128', '', '', '', '11', '', 'slovenia', '', 'czech-republic-visa-requirement', '2022-08-29 15:08:37'),
(299, 0, 204, 256, '128', '', '', '', '11', '', 'slovakia', '', 'czech-republic-visa-requirement', '2022-08-29 15:08:37'),
(300, 0, 13, 61, '129', '', '', '', '11', '', 'austria', '', 'denmark-visa-requirement', '2022-08-29 15:11:28'),
(301, 0, 21, 61, '129', '', '', '', '11', '', 'belgium', '', 'denmark-visa-requirement', '2022-08-29 15:11:28'),
(302, 0, 44, 61, '129', '', '', '', '11', '', 'switzerland', '', 'denmark-visa-requirement', '2022-08-29 15:11:28'),
(303, 0, 59, 61, '129', '', '', '', '11', '', 'germany', '', 'denmark-visa-requirement', '2022-08-29 15:11:28'),
(304, 0, 66, 61, '129', '', '', '', '11', '', 'estonia', '', 'denmark-visa-requirement', '2022-08-29 15:11:28'),
(305, 0, 70, 61, '129', '', '', '', '11', '', 'spain', '', 'denmark-visa-requirement', '2022-08-29 15:11:28'),
(306, 0, 72, 61, '129', '', '', '', '11', '', 'finland', '', 'denmark-visa-requirement', '2022-08-29 15:11:28'),
(307, 0, 77, 61, '129', '', '', '', '11', '', 'france', '', 'denmark-visa-requirement', '2022-08-29 15:11:28'),
(308, 0, 91, 61, '129', '', '', '', '11', '', 'greece', '', 'denmark-visa-requirement', '2022-08-29 15:11:28'),
(309, 0, 102, 61, '129', '', '', '', '11', '', 'hungary', '', 'denmark-visa-requirement', '2022-08-29 15:11:28'),
(310, 0, 111, 61, '129', '', '', '', '11', '', 'iceland', '', 'denmark-visa-requirement', '2022-08-29 15:11:28'),
(311, 0, 112, 61, '129', '', '', '', '11', '', 'italy', '', 'denmark-visa-requirement', '2022-08-29 15:11:28'),
(312, 0, 131, 61, '129', '', '', '', '11', '', 'liechtenstein', '', 'denmark-visa-requirement', '2022-08-29 15:11:28'),
(313, 0, 135, 61, '129', '', '', '', '11', '', 'lithuania', '', 'denmark-visa-requirement', '2022-08-29 15:11:28'),
(314, 0, 136, 61, '129', '', '', '', '11', '', 'luxembourg', '', 'denmark-visa-requirement', '2022-08-29 15:11:28'),
(315, 0, 137, 61, '129', '', '', '', '11', '', 'latvia', '', 'denmark-visa-requirement', '2022-08-29 15:11:28'),
(316, 0, 155, 61, '129', '', '', '', '11', '', 'malta', '', 'denmark-visa-requirement', '2022-08-29 15:11:28'),
(317, 0, 168, 61, '129', '', '', '', '11', '', 'netherlands', '', 'denmark-visa-requirement', '2022-08-29 15:11:28'),
(318, 0, 169, 61, '129', '', '', '', '11', '', 'norway', '', 'denmark-visa-requirement', '2022-08-29 15:11:28'),
(319, 0, 181, 61, '129', '', '', '', '11', '', 'poland', '', 'denmark-visa-requirement', '2022-08-29 15:11:28'),
(320, 0, 186, 61, '129', '', '', '', '11', '', 'portugal', '', 'denmark-visa-requirement', '2022-08-29 15:11:28'),
(321, 0, 199, 61, '129', '', '', '', '11', '', 'sweden', '', 'denmark-visa-requirement', '2022-08-29 15:11:28'),
(322, 0, 202, 61, '129', '', '', '', '11', '', 'slovenia', '', 'denmark-visa-requirement', '2022-08-29 15:11:28'),
(323, 0, 204, 61, '129', '', '', '', '11', '', 'slovakia', '', 'denmark-visa-requirement', '2022-08-29 15:11:28'),
(324, 0, 256, 61, '129', '', '', '', '11', '', 'czech-republic', '', 'denmark-visa-requirement', '2022-08-29 15:11:28'),
(325, 0, 13, 66, '130', '', '', '', '11', '', 'austria', '', 'estonia-visa-requirement', '2022-08-29 15:15:16'),
(326, 0, 21, 66, '130', '', '', '', '11', '', 'belgium', '', 'estonia-visa-requirement', '2022-08-29 15:15:16'),
(327, 0, 44, 66, '130', '', '', '', '11', '', 'switzerland', '', 'estonia-visa-requirement', '2022-08-29 15:15:16'),
(328, 0, 59, 66, '130', '', '', '', '11', '', 'germany', '', 'estonia-visa-requirement', '2022-08-29 15:15:16'),
(329, 0, 61, 66, '130', '', '', '', '11', '', 'denmark', '', 'estonia-visa-requirement', '2022-08-29 15:15:16'),
(330, 0, 70, 66, '130', '', '', '', '11', '', 'spain', '', 'estonia-visa-requirement', '2022-08-29 15:15:16'),
(331, 0, 72, 66, '130', '', '', '', '11', '', 'finland', '', 'estonia-visa-requirement', '2022-08-29 15:15:16'),
(332, 0, 77, 66, '130', '', '', '', '11', '', 'france', '', 'estonia-visa-requirement', '2022-08-29 15:15:16'),
(333, 0, 91, 66, '130', '', '', '', '11', '', 'greece', '', 'estonia-visa-requirement', '2022-08-29 15:15:16'),
(334, 0, 102, 66, '130', '', '', '', '11', '', 'hungary', '', 'estonia-visa-requirement', '2022-08-29 15:15:16'),
(335, 0, 111, 66, '130', '', '', '', '11', '', 'iceland', '', 'estonia-visa-requirement', '2022-08-29 15:15:16'),
(336, 0, 112, 66, '130', '', '', '', '11', '', 'italy', '', 'estonia-visa-requirement', '2022-08-29 15:15:16'),
(337, 0, 131, 66, '130', '', '', '', '11', '', 'liechtenstein', '', 'estonia-visa-requirement', '2022-08-29 15:15:16'),
(338, 0, 135, 66, '130', '', '', '', '11', '', 'lithuania', '', 'estonia-visa-requirement', '2022-08-29 15:15:16'),
(339, 0, 136, 66, '130', '', '', '', '11', '', 'luxembourg', '', 'estonia-visa-requirement', '2022-08-29 15:15:16'),
(340, 0, 137, 66, '130', '', '', '', '11', '', 'latvia', '', 'estonia-visa-requirement', '2022-08-29 15:15:16'),
(341, 0, 155, 66, '130', '', '', '', '11', '', 'malta', '', 'estonia-visa-requirement', '2022-08-29 15:15:16'),
(342, 0, 168, 66, '130', '', '', '', '11', '', 'netherlands', '', 'estonia-visa-requirement', '2022-08-29 15:15:16'),
(343, 0, 169, 66, '130', '', '', '', '11', '', 'norway', '', 'estonia-visa-requirement', '2022-08-29 15:15:16'),
(344, 0, 181, 66, '130', '', '', '', '11', '', 'poland', '', 'estonia-visa-requirement', '2022-08-29 15:15:16'),
(345, 0, 186, 66, '130', '', '', '', '11', '', 'portugal', '', 'estonia-visa-requirement', '2022-08-29 15:15:16'),
(346, 0, 199, 66, '130', '', '', '', '11', '', 'sweden', '', 'estonia-visa-requirement', '2022-08-29 15:15:16'),
(347, 0, 202, 66, '130', '', '', '', '11', '', 'slovenia', '', 'estonia-visa-requirement', '2022-08-29 15:15:16'),
(348, 0, 204, 66, '130', '', '', '', '11', '', 'slovakia', '', 'estonia-visa-requirement', '2022-08-29 15:15:16'),
(349, 0, 256, 66, '130', '', '', '', '11', '', 'czech-republic', '', 'estonia-visa-requirement', '2022-08-29 15:15:16'),
(350, 0, 13, 72, '131', '', '', '', '11', '', 'austria', '', 'finland-visa-requirement', '2022-08-29 15:19:21'),
(351, 0, 21, 72, '131', '', '', '', '11', '', 'belgium', '', 'finland-visa-requirement', '2022-08-29 15:19:21'),
(352, 0, 44, 72, '131', '', '', '', '11', '', 'switzerland', '', 'finland-visa-requirement', '2022-08-29 15:19:21'),
(353, 0, 59, 72, '131', '', '', '', '11', '', 'germany', '', 'finland-visa-requirement', '2022-08-29 15:19:21'),
(354, 0, 61, 72, '131', '', '', '', '11', '', 'denmark', '', 'finland-visa-requirement', '2022-08-29 15:19:21'),
(355, 0, 66, 72, '131', '', '', '', '11', '', 'estonia', '', 'finland-visa-requirement', '2022-08-29 15:19:21'),
(356, 0, 70, 72, '131', '', '', '', '11', '', 'spain', '', 'finland-visa-requirement', '2022-08-29 15:19:21'),
(357, 0, 77, 72, '131', '', '', '', '11', '', 'france', '', 'finland-visa-requirement', '2022-08-29 15:19:21'),
(358, 0, 91, 72, '131', '', '', '', '11', '', 'greece', '', 'finland-visa-requirement', '2022-08-29 15:19:21'),
(359, 0, 102, 72, '131', '', '', '', '11', '', 'hungary', '', 'finland-visa-requirement', '2022-08-29 15:19:21'),
(360, 0, 111, 72, '131', '', '', '', '11', '', 'iceland', '', 'finland-visa-requirement', '2022-08-29 15:19:21'),
(361, 0, 112, 72, '131', '', '', '', '11', '', 'italy', '', 'finland-visa-requirement', '2022-08-29 15:19:21'),
(362, 0, 131, 72, '131', '', '', '', '11', '', 'liechtenstein', '', 'finland-visa-requirement', '2022-08-29 15:19:21'),
(363, 0, 135, 72, '131', '', '', '', '11', '', 'lithuania', '', 'finland-visa-requirement', '2022-08-29 15:19:21'),
(364, 0, 136, 72, '131', '', '', '', '11', '', 'luxembourg', '', 'finland-visa-requirement', '2022-08-29 15:19:21'),
(365, 0, 137, 72, '131', '', '', '', '11', '', 'latvia', '', 'finland-visa-requirement', '2022-08-29 15:19:21'),
(366, 0, 155, 72, '131', '', '', '', '11', '', 'malta', '', 'finland-visa-requirement', '2022-08-29 15:19:21'),
(367, 0, 168, 72, '131', '', '', '', '11', '', 'netherlands', '', 'finland-visa-requirement', '2022-08-29 15:19:21'),
(368, 0, 169, 72, '131', '', '', '', '11', '', 'norway', '', 'finland-visa-requirement', '2022-08-29 15:19:21'),
(369, 0, 181, 72, '131', '', '', '', '11', '', 'poland', '', 'finland-visa-requirement', '2022-08-29 15:19:21'),
(370, 0, 186, 72, '131', '', '', '', '11', '', 'portugal', '', 'finland-visa-requirement', '2022-08-29 15:19:21'),
(371, 0, 199, 72, '131', '', '', '', '11', '', 'sweden', '', 'finland-visa-requirement', '2022-08-29 15:19:21'),
(372, 0, 202, 72, '131', '', '', '', '11', '', 'slovenia', '', 'finland-visa-requirement', '2022-08-29 15:19:21'),
(373, 0, 204, 72, '131', '', '', '', '11', '', 'slovakia', '', 'finland-visa-requirement', '2022-08-29 15:19:21'),
(374, 0, 256, 72, '131', '', '', '', '11', '', 'czech-republic', '', 'finland-visa-requirement', '2022-08-29 15:19:21'),
(375, 0, 13, 77, '132', '', '', '', '11', '', 'austria', '', 'france-visa-requirement', '2022-08-29 15:21:52'),
(376, 0, 21, 77, '132', '', '', '', '11', '', 'belgium', '', 'france-visa-requirement', '2022-08-29 15:21:52'),
(377, 0, 44, 77, '132', '', '', '', '11', '', 'switzerland', '', 'france-visa-requirement', '2022-08-29 15:21:52'),
(378, 0, 59, 77, '132', '', '', '', '11', '', 'germany', '', 'france-visa-requirement', '2022-08-29 15:21:52'),
(379, 0, 61, 77, '132', '', '', '', '11', '', 'denmark', '', 'france-visa-requirement', '2022-08-29 15:21:52'),
(380, 0, 66, 77, '132', '', '', '', '11', '', 'estonia', '', 'france-visa-requirement', '2022-08-29 15:21:52'),
(381, 0, 70, 77, '132', '', '', '', '11', '', 'spain', '', 'france-visa-requirement', '2022-08-29 15:21:52'),
(382, 0, 72, 77, '132', '', '', '', '11', '', 'finland', '', 'france-visa-requirement', '2022-08-29 15:21:52'),
(383, 0, 91, 77, '132', '', '', '', '11', '', 'greece', '', 'france-visa-requirement', '2022-08-29 15:21:52'),
(384, 0, 102, 77, '132', '', '', '', '11', '', 'hungary', '', 'france-visa-requirement', '2022-08-29 15:21:52'),
(385, 0, 111, 77, '132', '', '', '', '11', '', 'iceland', '', 'france-visa-requirement', '2022-08-29 15:21:52'),
(386, 0, 112, 77, '132', '', '', '', '11', '', 'italy', '', 'france-visa-requirement', '2022-08-29 15:21:52'),
(387, 0, 131, 77, '132', '', '', '', '11', '', 'liechtenstein', '', 'france-visa-requirement', '2022-08-29 15:21:52'),
(388, 0, 135, 77, '132', '', '', '', '11', '', 'lithuania', '', 'france-visa-requirement', '2022-08-29 15:21:52'),
(389, 0, 136, 77, '132', '', '', '', '11', '', 'luxembourg', '', 'france-visa-requirement', '2022-08-29 15:21:52'),
(390, 0, 137, 77, '132', '', '', '', '11', '', 'latvia', '', 'france-visa-requirement', '2022-08-29 15:21:52'),
(391, 0, 155, 77, '132', '', '', '', '11', '', 'malta', '', 'france-visa-requirement', '2022-08-29 15:21:52'),
(392, 0, 168, 77, '132', '', '', '', '11', '', 'netherlands', '', 'france-visa-requirement', '2022-08-29 15:21:52'),
(393, 0, 169, 77, '132', '', '', '', '11', '', 'norway', '', 'france-visa-requirement', '2022-08-29 15:21:52'),
(394, 0, 181, 77, '132', '', '', '', '11', '', 'poland', '', 'france-visa-requirement', '2022-08-29 15:21:52'),
(395, 0, 186, 77, '132', '', '', '', '11', '', 'portugal', '', 'france-visa-requirement', '2022-08-29 15:21:52'),
(396, 0, 199, 77, '132', '', '', '', '11', '', 'sweden', '', 'france-visa-requirement', '2022-08-29 15:21:52'),
(397, 0, 202, 77, '132', '', '', '', '11', '', 'slovenia', '', 'france-visa-requirement', '2022-08-29 15:21:52'),
(398, 0, 204, 77, '132', '', '', '', '11', '', 'slovakia', '', 'france-visa-requirement', '2022-08-29 15:21:52'),
(399, 0, 256, 77, '132', '', '', '', '11', '', 'czech-republic', '', 'france-visa-requirement', '2022-08-29 15:21:52'),
(400, 0, 13, 59, '133', '', '', '', '11', '', 'austria', '', 'germany-visa-requirement', '2022-08-29 15:24:59'),
(401, 0, 21, 59, '133', '', '', '', '11', '', 'belgium', '', 'germany-visa-requirement', '2022-08-29 15:24:59'),
(402, 0, 44, 59, '133', '', '', '', '11', '', 'switzerland', '', 'germany-visa-requirement', '2022-08-29 15:24:59'),
(403, 0, 61, 59, '133', '', '', '', '11', '', 'denmark', '', 'germany-visa-requirement', '2022-08-29 15:24:59'),
(404, 0, 66, 59, '133', '', '', '', '11', '', 'estonia', '', 'germany-visa-requirement', '2022-08-29 15:24:59'),
(405, 0, 70, 59, '133', '', '', '', '11', '', 'spain', '', 'germany-visa-requirement', '2022-08-29 15:24:59'),
(406, 0, 72, 59, '133', '', '', '', '11', '', 'finland', '', 'germany-visa-requirement', '2022-08-29 15:24:59'),
(407, 0, 77, 59, '133', '', '', '', '11', '', 'france', '', 'germany-visa-requirement', '2022-08-29 15:24:59'),
(408, 0, 91, 59, '133', '', '', '', '11', '', 'greece', '', 'germany-visa-requirement', '2022-08-29 15:24:59'),
(409, 0, 102, 59, '133', '', '', '', '11', '', 'hungary', '', 'germany-visa-requirement', '2022-08-29 15:24:59'),
(410, 0, 111, 59, '133', '', '', '', '11', '', 'iceland', '', 'germany-visa-requirement', '2022-08-29 15:24:59'),
(411, 0, 112, 59, '133', '', '', '', '11', '', 'italy', '', 'germany-visa-requirement', '2022-08-29 15:24:59'),
(412, 0, 131, 59, '133', '', '', '', '11', '', 'liechtenstein', '', 'germany-visa-requirement', '2022-08-29 15:24:59'),
(413, 0, 135, 59, '133', '', '', '', '11', '', 'lithuania', '', 'germany-visa-requirement', '2022-08-29 15:24:59'),
(414, 0, 136, 59, '133', '', '', '', '11', '', 'luxembourg', '', 'germany-visa-requirement', '2022-08-29 15:24:59'),
(415, 0, 137, 59, '133', '', '', '', '11', '', 'latvia', '', 'germany-visa-requirement', '2022-08-29 15:24:59'),
(416, 0, 155, 59, '133', '', '', '', '11', '', 'malta', '', 'germany-visa-requirement', '2022-08-29 15:24:59'),
(417, 0, 168, 59, '133', '', '', '', '11', '', 'netherlands', '', 'germany-visa-requirement', '2022-08-29 15:24:59'),
(418, 0, 169, 59, '133', '', '', '', '11', '', 'norway', '', 'germany-visa-requirement', '2022-08-29 15:24:59'),
(419, 0, 181, 59, '133', '', '', '', '11', '', 'poland', '', 'germany-visa-requirement', '2022-08-29 15:24:59'),
(420, 0, 186, 59, '133', '', '', '', '11', '', 'portugal', '', 'germany-visa-requirement', '2022-08-29 15:24:59'),
(421, 0, 199, 59, '133', '', '', '', '11', '', 'sweden', '', 'germany-visa-requirement', '2022-08-29 15:24:59'),
(422, 0, 202, 59, '133', '', '', '', '11', '', 'slovenia', '', 'germany-visa-requirement', '2022-08-29 15:24:59'),
(423, 0, 204, 59, '133', '', '', '', '11', '', 'slovakia', '', 'germany-visa-requirement', '2022-08-29 15:24:59'),
(424, 0, 256, 59, '133', '', '', '', '11', '', 'czech-republic', '', 'germany-visa-requirement', '2022-08-29 15:24:59'),
(425, 0, 13, 91, '134', '', '', '', '11', '', 'austria', '', 'greece-visa-requirement', '2022-08-29 15:31:14'),
(426, 0, 21, 91, '134', '', '', '', '11', '', 'belgium', '', 'greece-visa-requirement', '2022-08-29 15:31:14'),
(427, 0, 44, 91, '134', '', '', '', '11', '', 'switzerland', '', 'greece-visa-requirement', '2022-08-29 15:31:14'),
(428, 0, 59, 91, '134', '', '', '', '11', '', 'germany', '', 'greece-visa-requirement', '2022-08-29 15:31:14'),
(429, 0, 61, 91, '134', '', '', '', '11', '', 'denmark', '', 'greece-visa-requirement', '2022-08-29 15:31:14'),
(430, 0, 66, 91, '134', '', '', '', '11', '', 'estonia', '', 'greece-visa-requirement', '2022-08-29 15:31:14'),
(431, 0, 70, 91, '134', '', '', '', '11', '', 'spain', '', 'greece-visa-requirement', '2022-08-29 15:31:14'),
(432, 0, 72, 91, '134', '', '', '', '11', '', 'finland', '', 'greece-visa-requirement', '2022-08-29 15:31:14'),
(433, 0, 77, 91, '134', '', '', '', '11', '', 'france', '', 'greece-visa-requirement', '2022-08-29 15:31:14'),
(434, 0, 102, 91, '134', '', '', '', '11', '', 'hungary', '', 'greece-visa-requirement', '2022-08-29 15:31:14'),
(435, 0, 111, 91, '134', '', '', '', '11', '', 'iceland', '', 'greece-visa-requirement', '2022-08-29 15:31:14'),
(436, 0, 112, 91, '134', '', '', '', '11', '', 'italy', '', 'greece-visa-requirement', '2022-08-29 15:31:14'),
(437, 0, 131, 91, '134', '', '', '', '11', '', 'liechtenstein', '', 'greece-visa-requirement', '2022-08-29 15:31:14'),
(438, 0, 135, 91, '134', '', '', '', '11', '', 'lithuania', '', 'greece-visa-requirement', '2022-08-29 15:31:14'),
(439, 0, 136, 91, '134', '', '', '', '11', '', 'luxembourg', '', 'greece-visa-requirement', '2022-08-29 15:31:14'),
(440, 0, 137, 91, '134', '', '', '', '11', '', 'latvia', '', 'greece-visa-requirement', '2022-08-29 15:31:14'),
(441, 0, 155, 91, '134', '', '', '', '11', '', 'malta', '', 'greece-visa-requirement', '2022-08-29 15:31:14'),
(442, 0, 168, 91, '134', '', '', '', '11', '', 'netherlands', '', 'greece-visa-requirement', '2022-08-29 15:31:14'),
(443, 0, 169, 91, '134', '', '', '', '11', '', 'norway', '', 'greece-visa-requirement', '2022-08-29 15:31:14'),
(444, 0, 181, 91, '134', '', '', '', '11', '', 'poland', '', 'greece-visa-requirement', '2022-08-29 15:31:14'),
(445, 0, 186, 91, '134', '', '', '', '11', '', 'portugal', '', 'greece-visa-requirement', '2022-08-29 15:31:14'),
(446, 0, 199, 91, '134', '', '', '', '11', '', 'sweden', '', 'greece-visa-requirement', '2022-08-29 15:31:14'),
(447, 0, 202, 91, '134', '', '', '', '11', '', 'slovenia', '', 'greece-visa-requirement', '2022-08-29 15:31:14'),
(448, 0, 204, 91, '134', '', '', '', '11', '', 'slovakia', '', 'greece-visa-requirement', '2022-08-29 15:31:14'),
(449, 0, 256, 91, '134', '', '', '', '11', '', 'czech-republic', '', 'greece-visa-requirement', '2022-08-29 15:31:14'),
(450, 0, 13, 102, '135', '', '', '', '11', '', 'austria', '', 'hungary-visa-requirement', '2022-08-29 15:33:42'),
(451, 0, 21, 102, '135', '', '', '', '11', '', 'belgium', '', 'hungary-visa-requirement', '2022-08-29 15:33:42'),
(452, 0, 44, 102, '135', '', '', '', '11', '', 'switzerland', '', 'hungary-visa-requirement', '2022-08-29 15:33:42'),
(453, 0, 59, 102, '135', '', '', '', '11', '', 'germany', '', 'hungary-visa-requirement', '2022-08-29 15:33:42'),
(454, 0, 61, 102, '135', '', '', '', '11', '', 'denmark', '', 'hungary-visa-requirement', '2022-08-29 15:33:42'),
(455, 0, 66, 102, '135', '', '', '', '11', '', 'estonia', '', 'hungary-visa-requirement', '2022-08-29 15:33:42'),
(456, 0, 70, 102, '135', '', '', '', '11', '', 'spain', '', 'hungary-visa-requirement', '2022-08-29 15:33:42'),
(457, 0, 72, 102, '135', '', '', '', '11', '', 'finland', '', 'hungary-visa-requirement', '2022-08-29 15:33:42'),
(458, 0, 77, 102, '135', '', '', '', '11', '', 'france', '', 'hungary-visa-requirement', '2022-08-29 15:33:42'),
(459, 0, 91, 102, '135', '', '', '', '11', '', 'greece', '', 'hungary-visa-requirement', '2022-08-29 15:33:42'),
(460, 0, 111, 102, '135', '', '', '', '11', '', 'iceland', '', 'hungary-visa-requirement', '2022-08-29 15:33:42'),
(461, 0, 112, 102, '135', '', '', '', '11', '', 'italy', '', 'hungary-visa-requirement', '2022-08-29 15:33:42'),
(462, 0, 131, 102, '135', '', '', '', '11', '', 'liechtenstein', '', 'hungary-visa-requirement', '2022-08-29 15:33:42'),
(463, 0, 135, 102, '135', '', '', '', '11', '', 'lithuania', '', 'hungary-visa-requirement', '2022-08-29 15:33:42'),
(464, 0, 136, 102, '135', '', '', '', '11', '', 'luxembourg', '', 'hungary-visa-requirement', '2022-08-29 15:33:42'),
(465, 0, 137, 102, '135', '', '', '', '11', '', 'latvia', '', 'hungary-visa-requirement', '2022-08-29 15:33:42'),
(466, 0, 155, 102, '135', '', '', '', '11', '', 'malta', '', 'hungary-visa-requirement', '2022-08-29 15:33:42'),
(467, 0, 168, 102, '135', '', '', '', '11', '', 'netherlands', '', 'hungary-visa-requirement', '2022-08-29 15:33:42'),
(468, 0, 169, 102, '135', '', '', '', '11', '', 'norway', '', 'hungary-visa-requirement', '2022-08-29 15:33:42'),
(469, 0, 181, 102, '135', '', '', '', '11', '', 'poland', '', 'hungary-visa-requirement', '2022-08-29 15:33:42'),
(470, 0, 186, 102, '135', '', '', '', '11', '', 'portugal', '', 'hungary-visa-requirement', '2022-08-29 15:33:42'),
(471, 0, 199, 102, '135', '', '', '', '11', '', 'sweden', '', 'hungary-visa-requirement', '2022-08-29 15:33:42'),
(472, 0, 202, 102, '135', '', '', '', '11', '', 'slovenia', '', 'hungary-visa-requirement', '2022-08-29 15:33:42'),
(473, 0, 204, 102, '135', '', '', '', '11', '', 'slovakia', '', 'hungary-visa-requirement', '2022-08-29 15:33:42'),
(474, 0, 256, 102, '135', '', '', '', '11', '', 'czech-republic', '', 'hungary-visa-requirement', '2022-08-29 15:33:42'),
(475, 0, 13, 111, '136', '', '', '', '11', '', 'austria', '', 'iceland-visa-requirement', '2022-08-29 15:37:33'),
(476, 0, 21, 111, '136', '', '', '', '11', '', 'belgium', '', 'iceland-visa-requirement', '2022-08-29 15:37:33'),
(477, 0, 44, 111, '136', '', '', '', '11', '', 'switzerland', '', 'iceland-visa-requirement', '2022-08-29 15:37:33'),
(478, 0, 59, 111, '136', '', '', '', '11', '', 'germany', '', 'iceland-visa-requirement', '2022-08-29 15:37:33'),
(479, 0, 61, 111, '136', '', '', '', '11', '', 'denmark', '', 'iceland-visa-requirement', '2022-08-29 15:37:33'),
(480, 0, 66, 111, '136', '', '', '', '11', '', 'estonia', '', 'iceland-visa-requirement', '2022-08-29 15:37:33'),
(481, 0, 70, 111, '136', '', '', '', '11', '', 'spain', '', 'iceland-visa-requirement', '2022-08-29 15:37:33'),
(482, 0, 72, 111, '136', '', '', '', '11', '', 'finland', '', 'iceland-visa-requirement', '2022-08-29 15:37:33'),
(483, 0, 77, 111, '136', '', '', '', '11', '', 'france', '', 'iceland-visa-requirement', '2022-08-29 15:37:33'),
(484, 0, 91, 111, '136', '', '', '', '11', '', 'greece', '', 'iceland-visa-requirement', '2022-08-29 15:37:33'),
(485, 0, 102, 111, '136', '', '', '', '11', '', 'hungary', '', 'iceland-visa-requirement', '2022-08-29 15:37:33'),
(486, 0, 112, 111, '136', '', '', '', '11', '', 'italy', '', 'iceland-visa-requirement', '2022-08-29 15:37:33'),
(487, 0, 131, 111, '136', '', '', '', '11', '', 'liechtenstein', '', 'iceland-visa-requirement', '2022-08-29 15:37:33'),
(488, 0, 135, 111, '136', '', '', '', '11', '', 'lithuania', '', 'iceland-visa-requirement', '2022-08-29 15:37:33'),
(489, 0, 136, 111, '136', '', '', '', '11', '', 'luxembourg', '', 'iceland-visa-requirement', '2022-08-29 15:37:33'),
(490, 0, 137, 111, '136', '', '', '', '11', '', 'latvia', '', 'iceland-visa-requirement', '2022-08-29 15:37:33'),
(491, 0, 155, 111, '136', '', '', '', '11', '', 'malta', '', 'iceland-visa-requirement', '2022-08-29 15:37:33'),
(492, 0, 168, 111, '136', '', '', '', '11', '', 'netherlands', '', 'iceland-visa-requirement', '2022-08-29 15:37:33'),
(493, 0, 169, 111, '136', '', '', '', '11', '', 'norway', '', 'iceland-visa-requirement', '2022-08-29 15:37:33'),
(494, 0, 181, 111, '136', '', '', '', '11', '', 'poland', '', 'iceland-visa-requirement', '2022-08-29 15:37:33'),
(495, 0, 186, 111, '136', '', '', '', '11', '', 'portugal', '', 'iceland-visa-requirement', '2022-08-29 15:37:33'),
(496, 0, 199, 111, '136', '', '', '', '11', '', 'sweden', '', 'iceland-visa-requirement', '2022-08-29 15:37:33'),
(497, 0, 202, 111, '136', '', '', '', '11', '', 'slovenia', '', 'iceland-visa-requirement', '2022-08-29 15:37:33'),
(498, 0, 204, 111, '136', '', '', '', '11', '', 'slovakia', '', 'iceland-visa-requirement', '2022-08-29 15:37:33'),
(499, 0, 256, 111, '136', '', '', '', '11', '', 'czech-republic', '', 'iceland-visa-requirement', '2022-08-29 15:37:33'),
(500, 0, 13, 112, '137', '', '', '', '11', '', 'austria', '', 'italy-visa-requirement', '2022-08-29 15:40:30'),
(501, 0, 21, 112, '137', '', '', '', '11', '', 'belgium', '', 'italy-visa-requirement', '2022-08-29 15:40:30'),
(502, 0, 44, 112, '137', '', '', '', '11', '', 'switzerland', '', 'italy-visa-requirement', '2022-08-29 15:40:30'),
(503, 0, 59, 112, '137', '', '', '', '11', '', 'germany', '', 'italy-visa-requirement', '2022-08-29 15:40:30'),
(504, 0, 61, 112, '137', '', '', '', '11', '', 'denmark', '', 'italy-visa-requirement', '2022-08-29 15:40:30'),
(505, 0, 66, 112, '137', '', '', '', '11', '', 'estonia', '', 'italy-visa-requirement', '2022-08-29 15:40:30'),
(506, 0, 70, 112, '137', '', '', '', '11', '', 'spain', '', 'italy-visa-requirement', '2022-08-29 15:40:30'),
(507, 0, 72, 112, '137', '', '', '', '11', '', 'finland', '', 'italy-visa-requirement', '2022-08-29 15:40:30'),
(508, 0, 77, 112, '137', '', '', '', '11', '', 'france', '', 'italy-visa-requirement', '2022-08-29 15:40:30'),
(509, 0, 91, 112, '137', '', '', '', '11', '', 'greece', '', 'italy-visa-requirement', '2022-08-29 15:40:30'),
(510, 0, 102, 112, '137', '', '', '', '11', '', 'hungary', '', 'italy-visa-requirement', '2022-08-29 15:40:30'),
(511, 0, 111, 112, '137', '', '', '', '11', '', 'iceland', '', 'italy-visa-requirement', '2022-08-29 15:40:30'),
(512, 0, 131, 112, '137', '', '', '', '11', '', 'liechtenstein', '', 'italy-visa-requirement', '2022-08-29 15:40:30'),
(513, 0, 135, 112, '137', '', '', '', '11', '', 'lithuania', '', 'italy-visa-requirement', '2022-08-29 15:40:30'),
(514, 0, 136, 112, '137', '', '', '', '11', '', 'luxembourg', '', 'italy-visa-requirement', '2022-08-29 15:40:30'),
(515, 0, 137, 112, '137', '', '', '', '11', '', 'latvia', '', 'italy-visa-requirement', '2022-08-29 15:40:30'),
(516, 0, 155, 112, '137', '', '', '', '11', '', 'malta', '', 'italy-visa-requirement', '2022-08-29 15:40:30'),
(517, 0, 168, 112, '137', '', '', '', '11', '', 'netherlands', '', 'italy-visa-requirement', '2022-08-29 15:40:30'),
(518, 0, 169, 112, '137', '', '', '', '11', '', 'norway', '', 'italy-visa-requirement', '2022-08-29 15:40:30'),
(519, 0, 181, 112, '137', '', '', '', '11', '', 'poland', '', 'italy-visa-requirement', '2022-08-29 15:40:30'),
(520, 0, 186, 112, '137', '', '', '', '11', '', 'portugal', '', 'italy-visa-requirement', '2022-08-29 15:40:30'),
(521, 0, 199, 112, '137', '', '', '', '11', '', 'sweden', '', 'italy-visa-requirement', '2022-08-29 15:40:30'),
(522, 0, 202, 112, '137', '', '', '', '11', '', 'slovenia', '', 'italy-visa-requirement', '2022-08-29 15:40:30'),
(523, 0, 204, 112, '137', '', '', '', '11', '', 'slovakia', '', 'italy-visa-requirement', '2022-08-29 15:40:30'),
(524, 0, 256, 112, '137', '', '', '', '11', '', 'czech-republic', '', 'italy-visa-requirement', '2022-08-29 15:40:30'),
(525, 0, 13, 137, '138', '', '', '', '11', '', 'austria', '', 'latvia-visa-requirement', '2022-08-29 15:43:52'),
(526, 0, 21, 137, '138', '', '', '', '11', '', 'belgium', '', 'latvia-visa-requirement', '2022-08-29 15:43:52'),
(527, 0, 44, 137, '138', '', '', '', '11', '', 'switzerland', '', 'latvia-visa-requirement', '2022-08-29 15:43:52'),
(528, 0, 59, 137, '138', '', '', '', '11', '', 'germany', '', 'latvia-visa-requirement', '2022-08-29 15:43:52'),
(529, 0, 61, 137, '138', '', '', '', '11', '', 'denmark', '', 'latvia-visa-requirement', '2022-08-29 15:43:52'),
(530, 0, 66, 137, '138', '', '', '', '11', '', 'estonia', '', 'latvia-visa-requirement', '2022-08-29 15:43:52'),
(531, 0, 70, 137, '138', '', '', '', '11', '', 'spain', '', 'latvia-visa-requirement', '2022-08-29 15:43:52'),
(532, 0, 72, 137, '138', '', '', '', '11', '', 'finland', '', 'latvia-visa-requirement', '2022-08-29 15:43:52'),
(533, 0, 77, 137, '138', '', '', '', '11', '', 'france', '', 'latvia-visa-requirement', '2022-08-29 15:43:52'),
(534, 0, 91, 137, '138', '', '', '', '11', '', 'greece', '', 'latvia-visa-requirement', '2022-08-29 15:43:52'),
(535, 0, 102, 137, '138', '', '', '', '11', '', 'hungary', '', 'latvia-visa-requirement', '2022-08-29 15:43:52'),
(536, 0, 111, 137, '138', '', '', '', '11', '', 'iceland', '', 'latvia-visa-requirement', '2022-08-29 15:43:52'),
(537, 0, 112, 137, '138', '', '', '', '11', '', 'italy', '', 'latvia-visa-requirement', '2022-08-29 15:43:52'),
(538, 0, 131, 137, '138', '', '', '', '11', '', 'liechtenstein', '', 'latvia-visa-requirement', '2022-08-29 15:43:52'),
(539, 0, 135, 137, '138', '', '', '', '11', '', 'lithuania', '', 'latvia-visa-requirement', '2022-08-29 15:43:52'),
(540, 0, 136, 137, '138', '', '', '', '11', '', 'luxembourg', '', 'latvia-visa-requirement', '2022-08-29 15:43:52'),
(541, 0, 155, 137, '138', '', '', '', '11', '', 'malta', '', 'latvia-visa-requirement', '2022-08-29 15:43:52'),
(542, 0, 168, 137, '138', '', '', '', '11', '', 'netherlands', '', 'latvia-visa-requirement', '2022-08-29 15:43:52'),
(543, 0, 169, 137, '138', '', '', '', '11', '', 'norway', '', 'latvia-visa-requirement', '2022-08-29 15:43:52'),
(544, 0, 181, 137, '138', '', '', '', '11', '', 'poland', '', 'latvia-visa-requirement', '2022-08-29 15:43:52'),
(545, 0, 186, 137, '138', '', '', '', '11', '', 'portugal', '', 'latvia-visa-requirement', '2022-08-29 15:43:52'),
(546, 0, 199, 137, '138', '', '', '', '11', '', 'sweden', '', 'latvia-visa-requirement', '2022-08-29 15:43:52'),
(547, 0, 202, 137, '138', '', '', '', '11', '', 'slovenia', '', 'latvia-visa-requirement', '2022-08-29 15:43:52'),
(548, 0, 204, 137, '138', '', '', '', '11', '', 'slovakia', '', 'latvia-visa-requirement', '2022-08-29 15:43:52'),
(549, 0, 256, 137, '138', '', '', '', '11', '', 'czech-republic', '', 'latvia-visa-requirement', '2022-08-29 15:43:52'),
(550, 0, 13, 131, '139', '', '', '', '11', '', 'austria', '', 'liechtenstein-visa-requirement', '2022-08-29 15:47:02'),
(551, 0, 21, 131, '139', '', '', '', '11', '', 'belgium', '', 'liechtenstein-visa-requirement', '2022-08-29 15:47:02'),
(552, 0, 44, 131, '139', '', '', '', '11', '', 'switzerland', '', 'liechtenstein-visa-requirement', '2022-08-29 15:47:02'),
(553, 0, 59, 131, '139', '', '', '', '11', '', 'germany', '', 'liechtenstein-visa-requirement', '2022-08-29 15:47:02'),
(554, 0, 61, 131, '139', '', '', '', '11', '', 'denmark', '', 'liechtenstein-visa-requirement', '2022-08-29 15:47:02'),
(555, 0, 66, 131, '139', '', '', '', '11', '', 'estonia', '', 'liechtenstein-visa-requirement', '2022-08-29 15:47:02'),
(556, 0, 70, 131, '139', '', '', '', '11', '', 'spain', '', 'liechtenstein-visa-requirement', '2022-08-29 15:47:02'),
(557, 0, 72, 131, '139', '', '', '', '11', '', 'finland', '', 'liechtenstein-visa-requirement', '2022-08-29 15:47:02'),
(558, 0, 77, 131, '139', '', '', '', '11', '', 'france', '', 'liechtenstein-visa-requirement', '2022-08-29 15:47:02'),
(559, 0, 91, 131, '139', '', '', '', '11', '', 'greece', '', 'liechtenstein-visa-requirement', '2022-08-29 15:47:02'),
(560, 0, 102, 131, '139', '', '', '', '11', '', 'hungary', '', 'liechtenstein-visa-requirement', '2022-08-29 15:47:02'),
(561, 0, 111, 131, '139', '', '', '', '11', '', 'iceland', '', 'liechtenstein-visa-requirement', '2022-08-29 15:47:02'),
(562, 0, 112, 131, '139', '', '', '', '11', '', 'italy', '', 'liechtenstein-visa-requirement', '2022-08-29 15:47:02'),
(563, 0, 135, 131, '139', '', '', '', '11', '', 'lithuania', '', 'liechtenstein-visa-requirement', '2022-08-29 15:47:02'),
(564, 0, 136, 131, '139', '', '', '', '11', '', 'luxembourg', '', 'liechtenstein-visa-requirement', '2022-08-29 15:47:02'),
(565, 0, 137, 131, '139', '', '', '', '11', '', 'latvia', '', 'liechtenstein-visa-requirement', '2022-08-29 15:47:02'),
(566, 0, 155, 131, '139', '', '', '', '11', '', 'malta', '', 'liechtenstein-visa-requirement', '2022-08-29 15:47:02'),
(567, 0, 168, 131, '139', '', '', '', '11', '', 'netherlands', '', 'liechtenstein-visa-requirement', '2022-08-29 15:47:02'),
(568, 0, 169, 131, '139', '', '', '', '11', '', 'norway', '', 'liechtenstein-visa-requirement', '2022-08-29 15:47:02'),
(569, 0, 181, 131, '139', '', '', '', '11', '', 'poland', '', 'liechtenstein-visa-requirement', '2022-08-29 15:47:02'),
(570, 0, 186, 131, '139', '', '', '', '11', '', 'portugal', '', 'liechtenstein-visa-requirement', '2022-08-29 15:47:02'),
(571, 0, 199, 131, '139', '', '', '', '11', '', 'sweden', '', 'liechtenstein-visa-requirement', '2022-08-29 15:47:02'),
(572, 0, 202, 131, '139', '', '', '', '11', '', 'slovenia', '', 'liechtenstein-visa-requirement', '2022-08-29 15:47:02'),
(573, 0, 204, 131, '139', '', '', '', '11', '', 'slovakia', '', 'liechtenstein-visa-requirement', '2022-08-29 15:47:02'),
(574, 0, 256, 131, '139', '', '', '', '11', '', 'czech-republic', '', 'liechtenstein-visa-requirement', '2022-08-29 15:47:02'),
(575, 0, 13, 135, '140', '', '', '', '11', '', 'austria', '', 'lithuania-visa-requirement', '2022-08-29 15:49:29'),
(576, 0, 21, 135, '140', '', '', '', '11', '', 'belgium', '', 'lithuania-visa-requirement', '2022-08-29 15:49:29'),
(577, 0, 44, 135, '140', '', '', '', '11', '', 'switzerland', '', 'lithuania-visa-requirement', '2022-08-29 15:49:29'),
(578, 0, 59, 135, '140', '', '', '', '11', '', 'germany', '', 'lithuania-visa-requirement', '2022-08-29 15:49:29'),
(579, 0, 61, 135, '140', '', '', '', '11', '', 'denmark', '', 'lithuania-visa-requirement', '2022-08-29 15:49:29'),
(580, 0, 66, 135, '140', '', '', '', '11', '', 'estonia', '', 'lithuania-visa-requirement', '2022-08-29 15:49:29'),
(581, 0, 70, 135, '140', '', '', '', '11', '', 'spain', '', 'lithuania-visa-requirement', '2022-08-29 15:49:29'),
(582, 0, 72, 135, '140', '', '', '', '11', '', 'finland', '', 'lithuania-visa-requirement', '2022-08-29 15:49:29'),
(583, 0, 77, 135, '140', '', '', '', '11', '', 'france', '', 'lithuania-visa-requirement', '2022-08-29 15:49:29'),
(584, 0, 91, 135, '140', '', '', '', '11', '', 'greece', '', 'lithuania-visa-requirement', '2022-08-29 15:49:29'),
(585, 0, 102, 135, '140', '', '', '', '11', '', 'hungary', '', 'lithuania-visa-requirement', '2022-08-29 15:49:29'),
(586, 0, 111, 135, '140', '', '', '', '11', '', 'iceland', '', 'lithuania-visa-requirement', '2022-08-29 15:49:29'),
(587, 0, 112, 135, '140', '', '', '', '11', '', 'italy', '', 'lithuania-visa-requirement', '2022-08-29 15:49:29'),
(588, 0, 131, 135, '140', '', '', '', '11', '', 'liechtenstein', '', 'lithuania-visa-requirement', '2022-08-29 15:49:29'),
(589, 0, 136, 135, '140', '', '', '', '11', '', 'luxembourg', '', 'lithuania-visa-requirement', '2022-08-29 15:49:29'),
(590, 0, 137, 135, '140', '', '', '', '11', '', 'latvia', '', 'lithuania-visa-requirement', '2022-08-29 15:49:29'),
(591, 0, 155, 135, '140', '', '', '', '11', '', 'malta', '', 'lithuania-visa-requirement', '2022-08-29 15:49:29'),
(592, 0, 168, 135, '140', '', '', '', '11', '', 'netherlands', '', 'lithuania-visa-requirement', '2022-08-29 15:49:29'),
(593, 0, 169, 135, '140', '', '', '', '11', '', 'norway', '', 'lithuania-visa-requirement', '2022-08-29 15:49:29'),
(594, 0, 181, 135, '140', '', '', '', '11', '', 'poland', '', 'lithuania-visa-requirement', '2022-08-29 15:49:29'),
(595, 0, 186, 135, '140', '', '', '', '11', '', 'portugal', '', 'lithuania-visa-requirement', '2022-08-29 15:49:29'),
(596, 0, 199, 135, '140', '', '', '', '11', '', 'sweden', '', 'lithuania-visa-requirement', '2022-08-29 15:49:29'),
(597, 0, 202, 135, '140', '', '', '', '11', '', 'slovenia', '', 'lithuania-visa-requirement', '2022-08-29 15:49:29'),
(598, 0, 204, 135, '140', '', '', '', '11', '', 'slovakia', '', 'lithuania-visa-requirement', '2022-08-29 15:49:29'),
(599, 0, 256, 135, '140', '', '', '', '11', '', 'czech-republic', '', 'lithuania-visa-requirement', '2022-08-29 15:49:29'),
(600, 0, 13, 136, '141', '', '', '', '11', '', 'austria', '', 'luxembourg-visa-requirement', '2022-08-29 15:51:35'),
(601, 0, 21, 136, '141', '', '', '', '11', '', 'belgium', '', 'luxembourg-visa-requirement', '2022-08-29 15:51:35'),
(602, 0, 44, 136, '141', '', '', '', '11', '', 'switzerland', '', 'luxembourg-visa-requirement', '2022-08-29 15:51:35'),
(603, 0, 59, 136, '141', '', '', '', '11', '', 'germany', '', 'luxembourg-visa-requirement', '2022-08-29 15:51:35'),
(604, 0, 61, 136, '141', '', '', '', '11', '', 'denmark', '', 'luxembourg-visa-requirement', '2022-08-29 15:51:35'),
(605, 0, 66, 136, '141', '', '', '', '11', '', 'estonia', '', 'luxembourg-visa-requirement', '2022-08-29 15:51:35'),
(606, 0, 70, 136, '141', '', '', '', '11', '', 'spain', '', 'luxembourg-visa-requirement', '2022-08-29 15:51:35'),
(607, 0, 72, 136, '141', '', '', '', '11', '', 'finland', '', 'luxembourg-visa-requirement', '2022-08-29 15:51:35'),
(608, 0, 77, 136, '141', '', '', '', '11', '', 'france', '', 'luxembourg-visa-requirement', '2022-08-29 15:51:35'),
(609, 0, 91, 136, '141', '', '', '', '11', '', 'greece', '', 'luxembourg-visa-requirement', '2022-08-29 15:51:35'),
(610, 0, 102, 136, '141', '', '', '', '11', '', 'hungary', '', 'luxembourg-visa-requirement', '2022-08-29 15:51:35'),
(611, 0, 111, 136, '141', '', '', '', '11', '', 'iceland', '', 'luxembourg-visa-requirement', '2022-08-29 15:51:35'),
(612, 0, 112, 136, '141', '', '', '', '11', '', 'italy', '', 'luxembourg-visa-requirement', '2022-08-29 15:51:35'),
(613, 0, 131, 136, '141', '', '', '', '11', '', 'liechtenstein', '', 'luxembourg-visa-requirement', '2022-08-29 15:51:35'),
(614, 0, 135, 136, '141', '', '', '', '11', '', 'lithuania', '', 'luxembourg-visa-requirement', '2022-08-29 15:51:35'),
(615, 0, 137, 136, '141', '', '', '', '11', '', 'latvia', '', 'luxembourg-visa-requirement', '2022-08-29 15:51:35'),
(616, 0, 155, 136, '141', '', '', '', '11', '', 'malta', '', 'luxembourg-visa-requirement', '2022-08-29 15:51:35'),
(617, 0, 168, 136, '141', '', '', '', '11', '', 'netherlands', '', 'luxembourg-visa-requirement', '2022-08-29 15:51:35'),
(618, 0, 169, 136, '141', '', '', '', '11', '', 'norway', '', 'luxembourg-visa-requirement', '2022-08-29 15:51:35'),
(619, 0, 181, 136, '141', '', '', '', '11', '', 'poland', '', 'luxembourg-visa-requirement', '2022-08-29 15:51:35'),
(620, 0, 186, 136, '141', '', '', '', '11', '', 'portugal', '', 'luxembourg-visa-requirement', '2022-08-29 15:51:35'),
(621, 0, 199, 136, '141', '', '', '', '11', '', 'sweden', '', 'luxembourg-visa-requirement', '2022-08-29 15:51:35'),
(622, 0, 202, 136, '141', '', '', '', '11', '', 'slovenia', '', 'luxembourg-visa-requirement', '2022-08-29 15:51:35'),
(623, 0, 204, 136, '141', '', '', '', '11', '', 'slovakia', '', 'luxembourg-visa-requirement', '2022-08-29 15:51:35'),
(624, 0, 256, 136, '141', '', '', '', '11', '', 'czech-republic', '', 'luxembourg-visa-requirement', '2022-08-29 15:51:35'),
(625, 0, 13, 155, '142', '', '', '', '11', '', 'austria', '', 'malta-visa-requirement', '2022-08-29 15:54:14'),
(626, 0, 21, 155, '142', '', '', '', '11', '', 'belgium', '', 'malta-visa-requirement', '2022-08-29 15:54:14'),
(627, 0, 44, 155, '142', '', '', '', '11', '', 'switzerland', '', 'malta-visa-requirement', '2022-08-29 15:54:14'),
(628, 0, 59, 155, '142', '', '', '', '11', '', 'germany', '', 'malta-visa-requirement', '2022-08-29 15:54:14'),
(629, 0, 61, 155, '142', '', '', '', '11', '', 'denmark', '', 'malta-visa-requirement', '2022-08-29 15:54:14'),
(630, 0, 66, 155, '142', '', '', '', '11', '', 'estonia', '', 'malta-visa-requirement', '2022-08-29 15:54:14'),
(631, 0, 70, 155, '142', '', '', '', '11', '', 'spain', '', 'malta-visa-requirement', '2022-08-29 15:54:14'),
(632, 0, 72, 155, '142', '', '', '', '11', '', 'finland', '', 'malta-visa-requirement', '2022-08-29 15:54:14'),
(633, 0, 77, 155, '142', '', '', '', '11', '', 'france', '', 'malta-visa-requirement', '2022-08-29 15:54:14'),
(634, 0, 91, 155, '142', '', '', '', '11', '', 'greece', '', 'malta-visa-requirement', '2022-08-29 15:54:14'),
(635, 0, 102, 155, '142', '', '', '', '11', '', 'hungary', '', 'malta-visa-requirement', '2022-08-29 15:54:14'),
(636, 0, 111, 155, '142', '', '', '', '11', '', 'iceland', '', 'malta-visa-requirement', '2022-08-29 15:54:14'),
(637, 0, 112, 155, '142', '', '', '', '11', '', 'italy', '', 'malta-visa-requirement', '2022-08-29 15:54:14'),
(638, 0, 131, 155, '142', '', '', '', '11', '', 'liechtenstein', '', 'malta-visa-requirement', '2022-08-29 15:54:14'),
(639, 0, 135, 155, '142', '', '', '', '11', '', 'lithuania', '', 'malta-visa-requirement', '2022-08-29 15:54:14'),
(640, 0, 136, 155, '142', '', '', '', '11', '', 'luxembourg', '', 'malta-visa-requirement', '2022-08-29 15:54:14'),
(641, 0, 137, 155, '142', '', '', '', '11', '', 'latvia', '', 'malta-visa-requirement', '2022-08-29 15:54:14'),
(642, 0, 168, 155, '142', '', '', '', '11', '', 'netherlands', '', 'malta-visa-requirement', '2022-08-29 15:54:14');
INSERT INTO `tbl_generalinfo` (`id`, `form_id`, `origin_country`, `destination_country`, `visa_type`, `separate_page`, `notes`, `extra_notes`, `process`, `required_document`, `origin_slug`, `destination_slug`, `default_sulg`, `date`) VALUES
(643, 0, 169, 155, '142', '', '', '', '11', '', 'norway', '', 'malta-visa-requirement', '2022-08-29 15:54:14'),
(644, 0, 181, 155, '142', '', '', '', '11', '', 'poland', '', 'malta-visa-requirement', '2022-08-29 15:54:14'),
(645, 0, 186, 155, '142', '', '', '', '11', '', 'portugal', '', 'malta-visa-requirement', '2022-08-29 15:54:14'),
(646, 0, 199, 155, '142', '', '', '', '11', '', 'sweden', '', 'malta-visa-requirement', '2022-08-29 15:54:14'),
(647, 0, 202, 155, '142', '', '', '', '11', '', 'slovenia', '', 'malta-visa-requirement', '2022-08-29 15:54:14'),
(648, 0, 204, 155, '142', '', '', '', '11', '', 'slovakia', '', 'malta-visa-requirement', '2022-08-29 15:54:14'),
(649, 0, 256, 155, '142', '', '', '', '11', '', 'czech-republic', '', 'malta-visa-requirement', '2022-08-29 15:54:14'),
(650, 0, 13, 168, '143', '', '', '', '11', '', 'austria', '', 'netherlands-visa-requirement', '2022-08-29 15:57:25'),
(651, 0, 21, 168, '143', '', '', '', '11', '', 'belgium', '', 'netherlands-visa-requirement', '2022-08-29 15:57:25'),
(652, 0, 44, 168, '143', '', '', '', '11', '', 'switzerland', '', 'netherlands-visa-requirement', '2022-08-29 15:57:25'),
(653, 0, 59, 168, '143', '', '', '', '11', '', 'germany', '', 'netherlands-visa-requirement', '2022-08-29 15:57:25'),
(654, 0, 61, 168, '143', '', '', '', '11', '', 'denmark', '', 'netherlands-visa-requirement', '2022-08-29 15:57:25'),
(655, 0, 66, 168, '143', '', '', '', '11', '', 'estonia', '', 'netherlands-visa-requirement', '2022-08-29 15:57:25'),
(656, 0, 70, 168, '143', '', '', '', '11', '', 'spain', '', 'netherlands-visa-requirement', '2022-08-29 15:57:25'),
(657, 0, 72, 168, '143', '', '', '', '11', '', 'finland', '', 'netherlands-visa-requirement', '2022-08-29 15:57:25'),
(658, 0, 77, 168, '143', '', '', '', '11', '', 'france', '', 'netherlands-visa-requirement', '2022-08-29 15:57:25'),
(659, 0, 91, 168, '143', '', '', '', '11', '', 'greece', '', 'netherlands-visa-requirement', '2022-08-29 15:57:25'),
(660, 0, 102, 168, '143', '', '', '', '11', '', 'hungary', '', 'netherlands-visa-requirement', '2022-08-29 15:57:25'),
(661, 0, 111, 168, '143', '', '', '', '11', '', 'iceland', '', 'netherlands-visa-requirement', '2022-08-29 15:57:25'),
(662, 0, 112, 168, '143', '', '', '', '11', '', 'italy', '', 'netherlands-visa-requirement', '2022-08-29 15:57:25'),
(663, 0, 131, 168, '143', '', '', '', '11', '', 'liechtenstein', '', 'netherlands-visa-requirement', '2022-08-29 15:57:25'),
(664, 0, 135, 168, '143', '', '', '', '11', '', 'lithuania', '', 'netherlands-visa-requirement', '2022-08-29 15:57:25'),
(665, 0, 136, 168, '143', '', '', '', '11', '', 'luxembourg', '', 'netherlands-visa-requirement', '2022-08-29 15:57:25'),
(666, 0, 137, 168, '143', '', '', '', '11', '', 'latvia', '', 'netherlands-visa-requirement', '2022-08-29 15:57:25'),
(667, 0, 155, 168, '143', '', '', '', '11', '', 'malta', '', 'netherlands-visa-requirement', '2022-08-29 15:57:25'),
(668, 0, 169, 168, '143', '', '', '', '11', '', 'norway', '', 'netherlands-visa-requirement', '2022-08-29 15:57:25'),
(669, 0, 181, 168, '143', '', '', '', '11', '', 'poland', '', 'netherlands-visa-requirement', '2022-08-29 15:57:25'),
(670, 0, 186, 168, '143', '', '', '', '11', '', 'portugal', '', 'netherlands-visa-requirement', '2022-08-29 15:57:25'),
(671, 0, 199, 168, '143', '', '', '', '11', '', 'sweden', '', 'netherlands-visa-requirement', '2022-08-29 15:57:25'),
(672, 0, 202, 168, '143', '', '', '', '11', '', 'slovenia', '', 'netherlands-visa-requirement', '2022-08-29 15:57:25'),
(673, 0, 204, 168, '143', '', '', '', '11', '', 'slovakia', '', 'netherlands-visa-requirement', '2022-08-29 15:57:25'),
(674, 0, 256, 168, '143', '', '', '', '11', '', 'czech-republic', '', 'netherlands-visa-requirement', '2022-08-29 15:57:25'),
(675, 0, 13, 169, '144', '', '', '', '11', '', 'austria', '', 'norway-visa-requirement', '2022-08-29 15:59:59'),
(676, 0, 21, 169, '144', '', '', '', '11', '', 'belgium', '', 'norway-visa-requirement', '2022-08-29 15:59:59'),
(677, 0, 44, 169, '144', '', '', '', '11', '', 'switzerland', '', 'norway-visa-requirement', '2022-08-29 15:59:59'),
(678, 0, 59, 169, '144', '', '', '', '11', '', 'germany', '', 'norway-visa-requirement', '2022-08-29 15:59:59'),
(679, 0, 61, 169, '144', '', '', '', '11', '', 'denmark', '', 'norway-visa-requirement', '2022-08-29 15:59:59'),
(680, 0, 66, 169, '144', '', '', '', '11', '', 'estonia', '', 'norway-visa-requirement', '2022-08-29 15:59:59'),
(681, 0, 70, 169, '144', '', '', '', '11', '', 'spain', '', 'norway-visa-requirement', '2022-08-29 15:59:59'),
(682, 0, 72, 169, '144', '', '', '', '11', '', 'finland', '', 'norway-visa-requirement', '2022-08-29 15:59:59'),
(683, 0, 77, 169, '144', '', '', '', '11', '', 'france', '', 'norway-visa-requirement', '2022-08-29 15:59:59'),
(684, 0, 91, 169, '144', '', '', '', '11', '', 'greece', '', 'norway-visa-requirement', '2022-08-29 15:59:59'),
(685, 0, 102, 169, '144', '', '', '', '11', '', 'hungary', '', 'norway-visa-requirement', '2022-08-29 15:59:59'),
(686, 0, 111, 169, '144', '', '', '', '11', '', 'iceland', '', 'norway-visa-requirement', '2022-08-29 15:59:59'),
(687, 0, 112, 169, '144', '', '', '', '11', '', 'italy', '', 'norway-visa-requirement', '2022-08-29 15:59:59'),
(688, 0, 131, 169, '144', '', '', '', '11', '', 'liechtenstein', '', 'norway-visa-requirement', '2022-08-29 15:59:59'),
(689, 0, 135, 169, '144', '', '', '', '11', '', 'lithuania', '', 'norway-visa-requirement', '2022-08-29 15:59:59'),
(690, 0, 136, 169, '144', '', '', '', '11', '', 'luxembourg', '', 'norway-visa-requirement', '2022-08-29 15:59:59'),
(691, 0, 137, 169, '144', '', '', '', '11', '', 'latvia', '', 'norway-visa-requirement', '2022-08-29 15:59:59'),
(692, 0, 155, 169, '144', '', '', '', '11', '', 'malta', '', 'norway-visa-requirement', '2022-08-29 15:59:59'),
(693, 0, 168, 169, '144', '', '', '', '11', '', 'netherlands', '', 'norway-visa-requirement', '2022-08-29 15:59:59'),
(694, 0, 181, 169, '144', '', '', '', '11', '', 'poland', '', 'norway-visa-requirement', '2022-08-29 15:59:59'),
(695, 0, 186, 169, '144', '', '', '', '11', '', 'portugal', '', 'norway-visa-requirement', '2022-08-29 15:59:59'),
(696, 0, 199, 169, '144', '', '', '', '11', '', 'sweden', '', 'norway-visa-requirement', '2022-08-29 15:59:59'),
(697, 0, 202, 169, '144', '', '', '', '11', '', 'slovenia', '', 'norway-visa-requirement', '2022-08-29 15:59:59'),
(698, 0, 204, 169, '144', '', '', '', '11', '', 'slovakia', '', 'norway-visa-requirement', '2022-08-29 15:59:59'),
(699, 0, 256, 169, '144', '', '', '', '11', '', 'czech-republic', '', 'norway-visa-requirement', '2022-08-29 15:59:59'),
(700, 0, 13, 181, '145', '', '', '', '11', '', 'austria', '', 'poland-visa-requirement', '2022-08-29 16:02:25'),
(701, 0, 21, 181, '145', '', '', '', '11', '', 'belgium', '', 'poland-visa-requirement', '2022-08-29 16:02:25'),
(702, 0, 44, 181, '145', '', '', '', '11', '', 'switzerland', '', 'poland-visa-requirement', '2022-08-29 16:02:25'),
(703, 0, 59, 181, '145', '', '', '', '11', '', 'germany', '', 'poland-visa-requirement', '2022-08-29 16:02:25'),
(704, 0, 61, 181, '145', '', '', '', '11', '', 'denmark', '', 'poland-visa-requirement', '2022-08-29 16:02:25'),
(705, 0, 66, 181, '145', '', '', '', '11', '', 'estonia', '', 'poland-visa-requirement', '2022-08-29 16:02:25'),
(706, 0, 70, 181, '145', '', '', '', '11', '', 'spain', '', 'poland-visa-requirement', '2022-08-29 16:02:25'),
(707, 0, 72, 181, '145', '', '', '', '11', '', 'finland', '', 'poland-visa-requirement', '2022-08-29 16:02:25'),
(708, 0, 77, 181, '145', '', '', '', '11', '', 'france', '', 'poland-visa-requirement', '2022-08-29 16:02:25'),
(709, 0, 91, 181, '145', '', '', '', '11', '', 'greece', '', 'poland-visa-requirement', '2022-08-29 16:02:25'),
(710, 0, 102, 181, '145', '', '', '', '11', '', 'hungary', '', 'poland-visa-requirement', '2022-08-29 16:02:25'),
(711, 0, 111, 181, '145', '', '', '', '11', '', 'iceland', '', 'poland-visa-requirement', '2022-08-29 16:02:25'),
(712, 0, 112, 181, '145', '', '', '', '11', '', 'italy', '', 'poland-visa-requirement', '2022-08-29 16:02:25'),
(713, 0, 131, 181, '145', '', '', '', '11', '', 'liechtenstein', '', 'poland-visa-requirement', '2022-08-29 16:02:25'),
(714, 0, 135, 181, '145', '', '', '', '11', '', 'lithuania', '', 'poland-visa-requirement', '2022-08-29 16:02:25'),
(715, 0, 136, 181, '145', '', '', '', '11', '', 'luxembourg', '', 'poland-visa-requirement', '2022-08-29 16:02:25'),
(716, 0, 137, 181, '145', '', '', '', '11', '', 'latvia', '', 'poland-visa-requirement', '2022-08-29 16:02:25'),
(717, 0, 155, 181, '145', '', '', '', '11', '', 'malta', '', 'poland-visa-requirement', '2022-08-29 16:02:25'),
(718, 0, 168, 181, '145', '', '', '', '11', '', 'netherlands', '', 'poland-visa-requirement', '2022-08-29 16:02:25'),
(719, 0, 169, 181, '145', '', '', '', '11', '', 'norway', '', 'poland-visa-requirement', '2022-08-29 16:02:25'),
(720, 0, 186, 181, '145', '', '', '', '11', '', 'portugal', '', 'poland-visa-requirement', '2022-08-29 16:02:25'),
(721, 0, 199, 181, '145', '', '', '', '11', '', 'sweden', '', 'poland-visa-requirement', '2022-08-29 16:02:25'),
(722, 0, 202, 181, '145', '', '', '', '11', '', 'slovenia', '', 'poland-visa-requirement', '2022-08-29 16:02:25'),
(723, 0, 204, 181, '145', '', '', '', '11', '', 'slovakia', '', 'poland-visa-requirement', '2022-08-29 16:02:25'),
(724, 0, 256, 181, '145', '', '', '', '11', '', 'czech-republic', '', 'poland-visa-requirement', '2022-08-29 16:02:25'),
(725, 0, 13, 186, '146', '', '', '', '11', '', 'austria', '', 'portugal-visa-requirement', '2022-08-29 16:05:10'),
(726, 0, 21, 186, '146', '', '', '', '11', '', 'belgium', '', 'portugal-visa-requirement', '2022-08-29 16:05:10'),
(727, 0, 44, 186, '146', '', '', '', '11', '', 'switzerland', '', 'portugal-visa-requirement', '2022-08-29 16:05:10'),
(728, 0, 59, 186, '146', '', '', '', '11', '', 'germany', '', 'portugal-visa-requirement', '2022-08-29 16:05:10'),
(729, 0, 61, 186, '146', '', '', '', '11', '', 'denmark', '', 'portugal-visa-requirement', '2022-08-29 16:05:10'),
(730, 0, 66, 186, '146', '', '', '', '11', '', 'estonia', '', 'portugal-visa-requirement', '2022-08-29 16:05:10'),
(731, 0, 70, 186, '146', '', '', '', '11', '', 'spain', '', 'portugal-visa-requirement', '2022-08-29 16:05:10'),
(732, 0, 72, 186, '146', '', '', '', '11', '', 'finland', '', 'portugal-visa-requirement', '2022-08-29 16:05:10'),
(733, 0, 77, 186, '146', '', '', '', '11', '', 'france', '', 'portugal-visa-requirement', '2022-08-29 16:05:10'),
(734, 0, 91, 186, '146', '', '', '', '11', '', 'greece', '', 'portugal-visa-requirement', '2022-08-29 16:05:10'),
(735, 0, 102, 186, '146', '', '', '', '11', '', 'hungary', '', 'portugal-visa-requirement', '2022-08-29 16:05:10'),
(736, 0, 111, 186, '146', '', '', '', '11', '', 'iceland', '', 'portugal-visa-requirement', '2022-08-29 16:05:10'),
(737, 0, 112, 186, '146', '', '', '', '11', '', 'italy', '', 'portugal-visa-requirement', '2022-08-29 16:05:10'),
(738, 0, 131, 186, '146', '', '', '', '11', '', 'liechtenstein', '', 'portugal-visa-requirement', '2022-08-29 16:05:10'),
(739, 0, 135, 186, '146', '', '', '', '11', '', 'lithuania', '', 'portugal-visa-requirement', '2022-08-29 16:05:10'),
(740, 0, 136, 186, '146', '', '', '', '11', '', 'luxembourg', '', 'portugal-visa-requirement', '2022-08-29 16:05:10'),
(741, 0, 137, 186, '146', '', '', '', '11', '', 'latvia', '', 'portugal-visa-requirement', '2022-08-29 16:05:10'),
(742, 0, 155, 186, '146', '', '', '', '11', '', 'malta', '', 'portugal-visa-requirement', '2022-08-29 16:05:10'),
(743, 0, 168, 186, '146', '', '', '', '11', '', 'netherlands', '', 'portugal-visa-requirement', '2022-08-29 16:05:10'),
(744, 0, 169, 186, '146', '', '', '', '11', '', 'norway', '', 'portugal-visa-requirement', '2022-08-29 16:05:10'),
(745, 0, 181, 186, '146', '', '', '', '11', '', 'poland', '', 'portugal-visa-requirement', '2022-08-29 16:05:10'),
(746, 0, 199, 186, '146', '', '', '', '11', '', 'sweden', '', 'portugal-visa-requirement', '2022-08-29 16:05:10'),
(747, 0, 202, 186, '146', '', '', '', '11', '', 'slovenia', '', 'portugal-visa-requirement', '2022-08-29 16:05:10'),
(748, 0, 204, 186, '146', '', '', '', '11', '', 'slovakia', '', 'portugal-visa-requirement', '2022-08-29 16:05:10'),
(749, 0, 256, 186, '146', '', '', '', '11', '', 'czech-republic', '', 'portugal-visa-requirement', '2022-08-29 16:05:10'),
(750, 0, 13, 202, '148', '', '', '', '11', '', 'austria', '', 'slovenia-visa-requirement', '2022-08-29 16:07:25'),
(751, 0, 21, 202, '148', '', '', '', '11', '', 'belgium', '', 'slovenia-visa-requirement', '2022-08-29 16:07:25'),
(752, 0, 44, 202, '148', '', '', '', '11', '', 'switzerland', '', 'slovenia-visa-requirement', '2022-08-29 16:07:25'),
(753, 0, 59, 202, '148', '', '', '', '11', '', 'germany', '', 'slovenia-visa-requirement', '2022-08-29 16:07:25'),
(754, 0, 61, 202, '148', '', '', '', '11', '', 'denmark', '', 'slovenia-visa-requirement', '2022-08-29 16:07:25'),
(755, 0, 66, 202, '148', '', '', '', '11', '', 'estonia', '', 'slovenia-visa-requirement', '2022-08-29 16:07:25'),
(756, 0, 70, 202, '148', '', '', '', '11', '', 'spain', '', 'slovenia-visa-requirement', '2022-08-29 16:07:25'),
(757, 0, 72, 202, '148', '', '', '', '11', '', 'finland', '', 'slovenia-visa-requirement', '2022-08-29 16:07:25'),
(758, 0, 77, 202, '148', '', '', '', '11', '', 'france', '', 'slovenia-visa-requirement', '2022-08-29 16:07:25'),
(759, 0, 91, 202, '148', '', '', '', '11', '', 'greece', '', 'slovenia-visa-requirement', '2022-08-29 16:07:25'),
(760, 0, 102, 202, '148', '', '', '', '11', '', 'hungary', '', 'slovenia-visa-requirement', '2022-08-29 16:07:25'),
(761, 0, 111, 202, '148', '', '', '', '11', '', 'iceland', '', 'slovenia-visa-requirement', '2022-08-29 16:07:25'),
(762, 0, 112, 202, '148', '', '', '', '11', '', 'italy', '', 'slovenia-visa-requirement', '2022-08-29 16:07:25'),
(763, 0, 131, 202, '148', '', '', '', '11', '', 'liechtenstein', '', 'slovenia-visa-requirement', '2022-08-29 16:07:25'),
(764, 0, 135, 202, '148', '', '', '', '11', '', 'lithuania', '', 'slovenia-visa-requirement', '2022-08-29 16:07:25'),
(765, 0, 136, 202, '148', '', '', '', '11', '', 'luxembourg', '', 'slovenia-visa-requirement', '2022-08-29 16:07:25'),
(766, 0, 137, 202, '148', '', '', '', '11', '', 'latvia', '', 'slovenia-visa-requirement', '2022-08-29 16:07:25'),
(767, 0, 155, 202, '148', '', '', '', '11', '', 'malta', '', 'slovenia-visa-requirement', '2022-08-29 16:07:25'),
(768, 0, 168, 202, '148', '', '', '', '11', '', 'netherlands', '', 'slovenia-visa-requirement', '2022-08-29 16:07:25'),
(769, 0, 169, 202, '148', '', '', '', '11', '', 'norway', '', 'slovenia-visa-requirement', '2022-08-29 16:07:25'),
(770, 0, 181, 202, '148', '', '', '', '11', '', 'poland', '', 'slovenia-visa-requirement', '2022-08-29 16:07:25'),
(771, 0, 186, 202, '148', '', '', '', '11', '', 'portugal', '', 'slovenia-visa-requirement', '2022-08-29 16:07:25'),
(772, 0, 199, 202, '148', '', '', '', '11', '', 'sweden', '', 'slovenia-visa-requirement', '2022-08-29 16:07:25'),
(773, 0, 204, 202, '148', '', '', '', '11', '', 'slovakia', '', 'slovenia-visa-requirement', '2022-08-29 16:07:25'),
(774, 0, 256, 202, '148', '', '', '', '11', '', 'czech-republic', '', 'slovenia-visa-requirement', '2022-08-29 16:07:25'),
(775, 0, 13, 204, '147', '', '', '', '11', '', 'austria', '', 'slovakia-visa-requirement', '2022-08-29 16:09:41'),
(776, 0, 21, 204, '147', '', '', '', '11', '', 'belgium', '', 'slovakia-visa-requirement', '2022-08-29 16:09:41'),
(777, 0, 44, 204, '147', '', '', '', '11', '', 'switzerland', '', 'slovakia-visa-requirement', '2022-08-29 16:09:41'),
(778, 0, 59, 204, '147', '', '', '', '11', '', 'germany', '', 'slovakia-visa-requirement', '2022-08-29 16:09:41'),
(779, 0, 61, 204, '147', '', '', '', '11', '', 'denmark', '', 'slovakia-visa-requirement', '2022-08-29 16:09:41'),
(780, 0, 66, 204, '147', '', '', '', '11', '', 'estonia', '', 'slovakia-visa-requirement', '2022-08-29 16:09:41'),
(781, 0, 70, 204, '147', '', '', '', '11', '', 'spain', '', 'slovakia-visa-requirement', '2022-08-29 16:09:41'),
(782, 0, 72, 204, '147', '', '', '', '11', '', 'finland', '', 'slovakia-visa-requirement', '2022-08-29 16:09:41'),
(783, 0, 77, 204, '147', '', '', '', '11', '', 'france', '', 'slovakia-visa-requirement', '2022-08-29 16:09:41'),
(784, 0, 91, 204, '147', '', '', '', '11', '', 'greece', '', 'slovakia-visa-requirement', '2022-08-29 16:09:41'),
(785, 0, 102, 204, '147', '', '', '', '11', '', 'hungary', '', 'slovakia-visa-requirement', '2022-08-29 16:09:41'),
(786, 0, 111, 204, '147', '', '', '', '11', '', 'iceland', '', 'slovakia-visa-requirement', '2022-08-29 16:09:41'),
(787, 0, 112, 204, '147', '', '', '', '11', '', 'italy', '', 'slovakia-visa-requirement', '2022-08-29 16:09:41'),
(788, 0, 131, 204, '147', '', '', '', '11', '', 'liechtenstein', '', 'slovakia-visa-requirement', '2022-08-29 16:09:41'),
(789, 0, 135, 204, '147', '', '', '', '11', '', 'lithuania', '', 'slovakia-visa-requirement', '2022-08-29 16:09:41'),
(790, 0, 136, 204, '147', '', '', '', '11', '', 'luxembourg', '', 'slovakia-visa-requirement', '2022-08-29 16:09:41'),
(791, 0, 137, 204, '147', '', '', '', '11', '', 'latvia', '', 'slovakia-visa-requirement', '2022-08-29 16:09:41'),
(792, 0, 155, 204, '147', '', '', '', '11', '', 'malta', '', 'slovakia-visa-requirement', '2022-08-29 16:09:41'),
(793, 0, 168, 204, '147', '', '', '', '11', '', 'netherlands', '', 'slovakia-visa-requirement', '2022-08-29 16:09:41'),
(794, 0, 169, 204, '147', '', '', '', '11', '', 'norway', '', 'slovakia-visa-requirement', '2022-08-29 16:09:41'),
(795, 0, 181, 204, '147', '', '', '', '11', '', 'poland', '', 'slovakia-visa-requirement', '2022-08-29 16:09:41'),
(796, 0, 186, 204, '147', '', '', '', '11', '', 'portugal', '', 'slovakia-visa-requirement', '2022-08-29 16:09:41'),
(797, 0, 199, 204, '147', '', '', '', '11', '', 'sweden', '', 'slovakia-visa-requirement', '2022-08-29 16:09:41'),
(798, 0, 202, 204, '147', '', '', '', '11', '', 'slovenia', '', 'slovakia-visa-requirement', '2022-08-29 16:09:41'),
(799, 0, 256, 204, '147', '', '', '', '11', '', 'czech-republic', '', 'slovakia-visa-requirement', '2022-08-29 16:09:41'),
(800, 0, 13, 70, '149', '', '', '', '11', '', 'austria', '', 'spain-visa-requirement', '2022-08-29 16:11:30'),
(801, 0, 21, 70, '149', '', '', '', '11', '', 'belgium', '', 'spain-visa-requirement', '2022-08-29 16:11:30'),
(802, 0, 44, 70, '149', '', '', '', '11', '', 'switzerland', '', 'spain-visa-requirement', '2022-08-29 16:11:30'),
(803, 0, 59, 70, '149', '', '', '', '11', '', 'germany', '', 'spain-visa-requirement', '2022-08-29 16:11:30'),
(804, 0, 61, 70, '149', '', '', '', '11', '', 'denmark', '', 'spain-visa-requirement', '2022-08-29 16:11:30'),
(805, 0, 66, 70, '149', '', '', '', '11', '', 'estonia', '', 'spain-visa-requirement', '2022-08-29 16:11:30'),
(806, 0, 72, 70, '149', '', '', '', '11', '', 'finland', '', 'spain-visa-requirement', '2022-08-29 16:11:30'),
(807, 0, 77, 70, '149', '', '', '', '11', '', 'france', '', 'spain-visa-requirement', '2022-08-29 16:11:30'),
(808, 0, 91, 70, '149', '', '', '', '11', '', 'greece', '', 'spain-visa-requirement', '2022-08-29 16:11:30'),
(809, 0, 102, 70, '149', '', '', '', '11', '', 'hungary', '', 'spain-visa-requirement', '2022-08-29 16:11:30'),
(810, 0, 111, 70, '149', '', '', '', '11', '', 'iceland', '', 'spain-visa-requirement', '2022-08-29 16:11:30'),
(811, 0, 112, 70, '149', '', '', '', '11', '', 'italy', '', 'spain-visa-requirement', '2022-08-29 16:11:30'),
(812, 0, 131, 70, '149', '', '', '', '11', '', 'liechtenstein', '', 'spain-visa-requirement', '2022-08-29 16:11:30'),
(813, 0, 135, 70, '149', '', '', '', '11', '', 'lithuania', '', 'spain-visa-requirement', '2022-08-29 16:11:30'),
(814, 0, 136, 70, '149', '', '', '', '11', '', 'luxembourg', '', 'spain-visa-requirement', '2022-08-29 16:11:30'),
(815, 0, 137, 70, '149', '', '', '', '11', '', 'latvia', '', 'spain-visa-requirement', '2022-08-29 16:11:30'),
(816, 0, 155, 70, '149', '', '', '', '11', '', 'malta', '', 'spain-visa-requirement', '2022-08-29 16:11:30'),
(817, 0, 168, 70, '149', '', '', '', '11', '', 'netherlands', '', 'spain-visa-requirement', '2022-08-29 16:11:30'),
(818, 0, 169, 70, '149', '', '', '', '11', '', 'norway', '', 'spain-visa-requirement', '2022-08-29 16:11:30'),
(819, 0, 181, 70, '149', '', '', '', '11', '', 'poland', '', 'spain-visa-requirement', '2022-08-29 16:11:30'),
(820, 0, 186, 70, '149', '', '', '', '11', '', 'portugal', '', 'spain-visa-requirement', '2022-08-29 16:11:30'),
(821, 0, 199, 70, '149', '', '', '', '11', '', 'sweden', '', 'spain-visa-requirement', '2022-08-29 16:11:30'),
(822, 0, 202, 70, '149', '', '', '', '11', '', 'slovenia', '', 'spain-visa-requirement', '2022-08-29 16:11:30'),
(823, 0, 204, 70, '149', '', '', '', '11', '', 'slovakia', '', 'spain-visa-requirement', '2022-08-29 16:11:30'),
(824, 0, 256, 70, '149', '', '', '', '11', '', 'czech-republic', '', 'spain-visa-requirement', '2022-08-29 16:11:30'),
(825, 0, 13, 199, '150', '', '', '', '11', '', 'austria', '', 'sweden-visa-requirement', '2022-08-29 16:13:43'),
(826, 0, 21, 199, '150', '', '', '', '11', '', 'belgium', '', 'sweden-visa-requirement', '2022-08-29 16:13:43'),
(827, 0, 44, 199, '150', '', '', '', '11', '', 'switzerland', '', 'sweden-visa-requirement', '2022-08-29 16:13:43'),
(828, 0, 59, 199, '150', '', '', '', '11', '', 'germany', '', 'sweden-visa-requirement', '2022-08-29 16:13:43'),
(829, 0, 61, 199, '150', '', '', '', '11', '', 'denmark', '', 'sweden-visa-requirement', '2022-08-29 16:13:43'),
(830, 0, 66, 199, '150', '', '', '', '11', '', 'estonia', '', 'sweden-visa-requirement', '2022-08-29 16:13:43'),
(831, 0, 70, 199, '150', '', '', '', '11', '', 'spain', '', 'sweden-visa-requirement', '2022-08-29 16:13:43'),
(832, 0, 72, 199, '150', '', '', '', '11', '', 'finland', '', 'sweden-visa-requirement', '2022-08-29 16:13:43'),
(833, 0, 77, 199, '150', '', '', '', '11', '', 'france', '', 'sweden-visa-requirement', '2022-08-29 16:13:43'),
(834, 0, 91, 199, '150', '', '', '', '11', '', 'greece', '', 'sweden-visa-requirement', '2022-08-29 16:13:43'),
(835, 0, 102, 199, '150', '', '', '', '11', '', 'hungary', '', 'sweden-visa-requirement', '2022-08-29 16:13:43'),
(836, 0, 111, 199, '150', '', '', '', '11', '', 'iceland', '', 'sweden-visa-requirement', '2022-08-29 16:13:43'),
(837, 0, 112, 199, '150', '', '', '', '11', '', 'italy', '', 'sweden-visa-requirement', '2022-08-29 16:13:43'),
(838, 0, 131, 199, '150', '', '', '', '11', '', 'liechtenstein', '', 'sweden-visa-requirement', '2022-08-29 16:13:43'),
(839, 0, 135, 199, '150', '', '', '', '11', '', 'lithuania', '', 'sweden-visa-requirement', '2022-08-29 16:13:43'),
(840, 0, 136, 199, '150', '', '', '', '11', '', 'luxembourg', '', 'sweden-visa-requirement', '2022-08-29 16:13:43'),
(841, 0, 137, 199, '150', '', '', '', '11', '', 'latvia', '', 'sweden-visa-requirement', '2022-08-29 16:13:43'),
(842, 0, 155, 199, '150', '', '', '', '11', '', 'malta', '', 'sweden-visa-requirement', '2022-08-29 16:13:43'),
(843, 0, 168, 199, '150', '', '', '', '11', '', 'netherlands', '', 'sweden-visa-requirement', '2022-08-29 16:13:43'),
(844, 0, 169, 199, '150', '', '', '', '11', '', 'norway', '', 'sweden-visa-requirement', '2022-08-29 16:13:43'),
(845, 0, 181, 199, '150', '', '', '', '11', '', 'poland', '', 'sweden-visa-requirement', '2022-08-29 16:13:43'),
(846, 0, 186, 199, '150', '', '', '', '11', '', 'portugal', '', 'sweden-visa-requirement', '2022-08-29 16:13:43'),
(847, 0, 202, 199, '150', '', '', '', '11', '', 'slovenia', '', 'sweden-visa-requirement', '2022-08-29 16:13:43'),
(848, 0, 204, 199, '150', '', '', '', '11', '', 'slovakia', '', 'sweden-visa-requirement', '2022-08-29 16:13:43'),
(849, 0, 256, 199, '150', '', '', '', '11', '', 'czech-republic', '', 'sweden-visa-requirement', '2022-08-29 16:13:43'),
(850, 0, 13, 44, '151', '', '', '', '11', '', 'austria', '', 'switzerland-visa-requirement', '2022-08-29 16:15:42'),
(851, 0, 21, 44, '151', '', '', '', '11', '', 'belgium', '', 'switzerland-visa-requirement', '2022-08-29 16:15:42'),
(852, 0, 59, 44, '151', '', '', '', '11', '', 'germany', '', 'switzerland-visa-requirement', '2022-08-29 16:15:42'),
(853, 0, 61, 44, '151', '', '', '', '11', '', 'denmark', '', 'switzerland-visa-requirement', '2022-08-29 16:15:42'),
(854, 0, 66, 44, '151', '', '', '', '11', '', 'estonia', '', 'switzerland-visa-requirement', '2022-08-29 16:15:42'),
(855, 0, 70, 44, '151', '', '', '', '11', '', 'spain', '', 'switzerland-visa-requirement', '2022-08-29 16:15:42'),
(856, 0, 72, 44, '151', '', '', '', '11', '', 'finland', '', 'switzerland-visa-requirement', '2022-08-29 16:15:42'),
(857, 0, 77, 44, '151', '', '', '', '11', '', 'france', '', 'switzerland-visa-requirement', '2022-08-29 16:15:42'),
(858, 0, 91, 44, '151', '', '', '', '11', '', 'greece', '', 'switzerland-visa-requirement', '2022-08-29 16:15:42'),
(859, 0, 102, 44, '151', '', '', '', '11', '', 'hungary', '', 'switzerland-visa-requirement', '2022-08-29 16:15:42'),
(860, 0, 111, 44, '151', '', '', '', '11', '', 'iceland', '', 'switzerland-visa-requirement', '2022-08-29 16:15:42'),
(861, 0, 112, 44, '151', '', '', '', '11', '', 'italy', '', 'switzerland-visa-requirement', '2022-08-29 16:15:42'),
(862, 0, 131, 44, '151', '', '', '', '11', '', 'liechtenstein', '', 'switzerland-visa-requirement', '2022-08-29 16:15:42'),
(863, 0, 135, 44, '151', '', '', '', '11', '', 'lithuania', '', 'switzerland-visa-requirement', '2022-08-29 16:15:42'),
(864, 0, 136, 44, '151', '', '', '', '11', '', 'luxembourg', '', 'switzerland-visa-requirement', '2022-08-29 16:15:42'),
(865, 0, 137, 44, '151', '', '', '', '11', '', 'latvia', '', 'switzerland-visa-requirement', '2022-08-29 16:15:42'),
(866, 0, 155, 44, '151', '', '', '', '11', '', 'malta', '', 'switzerland-visa-requirement', '2022-08-29 16:15:42'),
(867, 0, 168, 44, '151', '', '', '', '11', '', 'netherlands', '', 'switzerland-visa-requirement', '2022-08-29 16:15:42'),
(868, 0, 169, 44, '151', '', '', '', '11', '', 'norway', '', 'switzerland-visa-requirement', '2022-08-29 16:15:42'),
(869, 0, 181, 44, '151', '', '', '', '11', '', 'poland', '', 'switzerland-visa-requirement', '2022-08-29 16:15:42'),
(870, 0, 186, 44, '151', '', '', '', '11', '', 'portugal', '', 'switzerland-visa-requirement', '2022-08-29 16:15:42'),
(871, 0, 199, 44, '151', '', '', '', '11', '', 'sweden', '', 'switzerland-visa-requirement', '2022-08-29 16:15:42'),
(872, 0, 202, 44, '151', '', '', '', '11', '', 'slovenia', '', 'switzerland-visa-requirement', '2022-08-29 16:15:42'),
(873, 0, 204, 44, '151', '', '', '', '11', '', 'slovakia', '', 'switzerland-visa-requirement', '2022-08-29 16:15:42'),
(874, 0, 256, 44, '151', '', '', '', '11', '', 'czech-republic', '', 'switzerland-visa-requirement', '2022-08-29 16:15:42'),
(875, 0, 1, 227, '152', '', '', '', '11', '', 'andorra', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(876, 0, 6, 227, '152', '', '', '', '11', '', 'albania', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(877, 0, 13, 227, '152', '', '', '', '11', '', 'austria', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(878, 0, 17, 227, '152', '', '', '', '11', '', 'azerbaijan', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(879, 0, 18, 227, '152', '', '', '', '11', '', 'bosnia-and-herzegovina', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(880, 0, 21, 227, '152', '', '', '', '11', '', 'belgium', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(881, 0, 23, 227, '152', '', '', '', '11', '', 'bulgaria', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(882, 0, 30, 227, '152', '', '', '', '11', '', 'bolivia', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(883, 0, 32, 227, '152', '', '', '', '11', '', 'brazil', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(884, 0, 38, 227, '152', '', '', '', '11', '', 'belize', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(885, 0, 44, 227, '152', '', '', '', '11', '', 'switzerland', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(886, 0, 47, 227, '152', '', '', '', '11', '', 'chile', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(887, 0, 50, 227, '152', '', '', '', '11', '', 'colombia', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(888, 0, 59, 227, '152', '', '', '', '11', '', 'germany', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(889, 0, 61, 227, '152', '', '', '', '11', '', 'denmark', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(890, 0, 65, 227, '152', '', '', '', '11', '', 'ecuador', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(891, 0, 66, 227, '152', '', '', '', '11', '', 'estonia', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(892, 0, 70, 227, '152', '', '', '', '11', '', 'spain', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(893, 0, 72, 227, '152', '', '', '', '11', '', 'finland', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(894, 0, 77, 227, '152', '', '', '', '11', '', 'france', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(895, 0, 79, 227, '152', '', '', '', '11', '', 'united-kingdom', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(896, 0, 81, 227, '152', '', '', '', '11', '', 'georgia', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(897, 0, 91, 227, '152', '', '', '', '11', '', 'greece', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(898, 0, 93, 227, '152', '', '', '', '11', '', 'guatemala', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(899, 0, 97, 227, '152', '', '', '', '11', '', 'hong-kong', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(900, 0, 99, 227, '152', '', '', '', '11', '', 'honduras', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(901, 0, 100, 227, '152', '', '', '', '11', '', 'croatia', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(902, 0, 102, 227, '152', '', '', '', '11', '', 'hungary', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(903, 0, 104, 227, '152', '', '', '', '11', '', 'ireland', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(904, 0, 105, 227, '152', '', '', '', '11', '', 'israel', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(905, 0, 110, 227, '152', '', '', '', '11', '', 'iran', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(906, 0, 111, 227, '152', '', '', '', '11', '', 'iceland', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(907, 0, 112, 227, '152', '', '', '', '11', '', 'italy', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(908, 0, 115, 227, '152', '', '', '', '11', '', 'jordan', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(909, 0, 116, 227, '152', '', '', '', '11', '', 'japan', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(910, 0, 118, 227, '152', '', '', '', '11', '', 'kyrgyzstan', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(911, 0, 124, 227, '152', '', '', '', '11', '', 'south-korea', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(912, 0, 125, 227, '152', '', '', '', '11', '', 'kuwait', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(913, 0, 127, 227, '152', '', '', '', '11', '', 'kazakhstan', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(914, 0, 129, 227, '152', '', '', '', '11', '', 'lebanon', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(915, 0, 131, 227, '152', '', '', '', '11', '', 'liechtenstein', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(916, 0, 135, 227, '152', '', '', '', '11', '', 'lithuania', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(917, 0, 136, 227, '152', '', '', '', '11', '', 'luxembourg', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(918, 0, 137, 227, '152', '', '', '', '11', '', 'latvia', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(919, 0, 139, 227, '152', '', '', '', '11', '', 'morocco', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(920, 0, 141, 227, '152', '', '', '', '11', '', 'moldova', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(921, 0, 142, 227, '152', '', '', '', '11', '', 'montenegro', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(922, 0, 146, 227, '152', '', '', '', '11', '', 'north-macedonia', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(923, 0, 155, 227, '152', '', '', '', '11', '', 'malta', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(924, 0, 160, 227, '152', '', '', '', '11', '', 'malaysia', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(925, 0, 167, 227, '152', '', '', '', '11', '', 'nicaragua', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(926, 0, 168, 227, '152', '', '', '', '11', '', 'netherlands', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(927, 0, 169, 227, '152', '', '', '', '11', '', 'norway', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(928, 0, 173, 227, '152', '', '', '', '11', '', 'new-zealand', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(929, 0, 175, 227, '152', '', '', '', '11', '', 'panama', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(930, 0, 176, 227, '152', '', '', '', '11', '', 'peru', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(931, 0, 181, 227, '152', '', '', '', '11', '', 'poland', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(932, 0, 186, 227, '152', '', '', '', '11', '', 'portugal', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(933, 0, 188, 227, '152', '', '', '', '11', '', 'paraguay', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(934, 0, 189, 227, '152', '', '', '', '11', '', 'qatar', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(935, 0, 191, 227, '152', '', '', '', '11', '', 'romania', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(936, 0, 192, 227, '152', '', '', '', '11', '', 'serbia', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(937, 0, 197, 227, '152', '', '', '', '11', '', 'seychelles', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(938, 0, 199, 227, '152', '', '', '', '11', '', 'sweden', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(939, 0, 200, 227, '152', '', '', '', '11', '', 'singapore', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(940, 0, 202, 227, '152', '', '', '', '11', '', 'slovenia', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(941, 0, 204, 227, '152', '', '', '', '11', '', 'slovakia', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(942, 0, 206, 227, '152', '', '', '', '11', '', 'san-marino', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(943, 0, 212, 227, '152', '', '', '', '11', '', 'el-salvador', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(944, 0, 221, 227, '152', '', '', '', '11', '', 'tajikistan', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(945, 0, 225, 227, '152', '', '', '', '11', '', 'tunisia', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(946, 0, 228, 227, '152', '', '', '', '11', '', 'trinidad-and-tobago', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(947, 0, 232, 227, '152', '', '', '', '11', '', 'ukraine', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(948, 0, 236, 227, '152', '', '', '', '11', '', 'uruguay', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(949, 0, 237, 227, '152', '', '', '', '11', '', 'uzbekistan', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(950, 0, 238, 227, '152', '', '', '', '11', '', 'vatican-city', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(951, 0, 240, 227, '152', '', '', '', '11', '', 'venezuela', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(952, 0, 247, 227, '152', '', '', '', '11', '', 'kosovo', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(953, 0, 256, 227, '152', '', '', '', '11', '', 'czech-republic', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(954, 0, 257, 227, '152', '', '', '', '11', '', 'saint-kitts-and-nevis', '', 'turkey-visa-requirement', '2022-09-01 15:10:29'),
(955, 0, 11, 227, '152', '', '', '', '11', '', 'argentina', '', 'turkey-visa-requirement', '2022-09-01 15:12:01'),
(956, 0, 140, 227, '152', '', '', '', '11', '', 'monaco', '', 'turkey-visa-requirement', '2022-09-01 15:15:33'),
(957, 0, 193, 227, '153', '', '', '', '11', '', 'russia', '', 'turkey-visa-requirement', '2022-09-01 15:21:06'),
(958, 0, 29, 227, '154', '', '', '', '11', '', 'brunei', '', 'turkey-visa-requirement', '2022-09-01 15:23:06'),
(959, 0, 37, 227, '154', '', '', '', '11', '', 'belarus', '', 'turkey-visa-requirement', '2022-09-01 15:23:06'),
(960, 0, 51, 227, '154', '', '', '', '11', '', 'costa-rica', '', 'turkey-visa-requirement', '2022-09-01 15:23:06'),
(961, 0, 103, 227, '154', '', '', '', '11', '', 'indonesia', '', 'turkey-visa-requirement', '2022-09-01 15:23:06'),
(962, 0, 149, 227, '154', '', '', '', '11', '', 'mongolia', '', 'turkey-visa-requirement', '2022-09-01 15:23:06'),
(963, 0, 150, 227, '154', '', '', '', '11', '', 'macao', '', 'turkey-visa-requirement', '2022-09-01 15:23:06'),
(964, 0, 220, 227, '154', '', '', '', '11', '', 'thailand', '', 'turkey-visa-requirement', '2022-09-01 15:23:06'),
(965, 0, 224, 227, '154', '', '', '', '11', '', 'turkmenistan', '', 'turkey-visa-requirement', '2022-09-01 15:23:06'),
(966, 0, 3, 227, '157', '', '', '', '8,9,10', '', 'afghanistan', '', 'turkey-visa-requirement', '2022-09-01 16:10:32'),
(967, 0, 20, 227, '157', '', '', '', '8,9,10', '', 'bangladesh', '', 'turkey-visa-requirement', '2022-09-01 16:10:32'),
(968, 0, 64, 227, '157', '', '', '', '8,9,10', '', 'algeria', '', 'turkey-visa-requirement', '2022-09-01 16:10:32'),
(969, 0, 67, 227, '157', '', '', '', '8,9,10', '', 'egypt', '', 'turkey-visa-requirement', '2022-09-01 16:10:32'),
(970, 0, 90, 227, '157', '', '', '', '8,9,10', '', 'equatorial-guinea', '', 'turkey-visa-requirement', '2022-09-01 16:10:32'),
(971, 0, 107, 227, '157', '', '', '', '8,9,10', '', 'india', '', 'turkey-visa-requirement', '2022-09-01 16:10:32'),
(972, 0, 109, 227, '157', '', '', '', '8,9,10', '', 'iraq', '', 'turkey-visa-requirement', '2022-09-01 16:10:32'),
(973, 0, 132, 227, '157', '', '', '', '8,9,10', '', 'sri-lanka', '', 'turkey-visa-requirement', '2022-09-01 16:10:32'),
(974, 0, 138, 227, '157', '', '', '', '8,9,10', '', 'libya', '', 'turkey-visa-requirement', '2022-09-01 16:10:32'),
(975, 0, 179, 227, '157', '', '', '', '8,9,10', '', 'philippines', '', 'turkey-visa-requirement', '2022-09-01 16:10:32'),
(976, 0, 180, 227, '157', '', '', '', '8,9,10', '', 'pakistan', '', 'turkey-visa-requirement', '2022-09-01 16:10:32'),
(977, 0, 185, 227, '157', '', '', '', '8,9,10', '', 'palestine', '', 'turkey-visa-requirement', '2022-09-01 16:10:32'),
(978, 0, 207, 227, '157', '', '', '', '8,9,10', '', 'senegal', '', 'turkey-visa-requirement', '2022-09-01 16:10:32'),
(979, 0, 243, 227, '157', '', '', '', '8,9,10', '', 'vietnam', '', 'turkey-visa-requirement', '2022-09-01 16:10:32'),
(980, 0, 248, 227, '157', '', '', '', '8,9,10', '', 'yemen', '', 'turkey-visa-requirement', '2022-09-01 16:10:32'),
(981, 0, 253, 227, '157', '', '', '', '8,9,10', '', 'cape-verde', '', 'turkey-visa-requirement', '2022-09-01 16:10:32'),
(988, 0, 13, 63, '162', '', '', '', '11', '', 'austria', '', 'dominican-republic-visa-requirement', '2022-10-15 09:45:12'),
(989, 0, 21, 63, '162', '', '', '', '11', '', 'belgium', '', 'dominican-republic-visa-requirement', '2022-10-15 09:45:12'),
(990, 0, 23, 63, '162', '', '', '', '11', '', 'bulgaria', '', 'dominican-republic-visa-requirement', '2022-10-15 09:45:12'),
(991, 0, 57, 63, '162', '', '', '', '11', '', 'cyprus', '', 'dominican-republic-visa-requirement', '2022-10-15 09:45:12'),
(992, 0, 59, 63, '162', '', '', '', '11', '', 'germany', '', 'dominican-republic-visa-requirement', '2022-10-15 09:45:12'),
(993, 0, 61, 63, '162', '', '', '', '11', '', 'denmark', '', 'dominican-republic-visa-requirement', '2022-10-15 09:45:12'),
(994, 0, 66, 63, '162', '', '', '', '11', '', 'estonia', '', 'dominican-republic-visa-requirement', '2022-10-15 09:45:12'),
(995, 0, 70, 63, '162', '', '', '', '11', '', 'spain', '', 'dominican-republic-visa-requirement', '2022-10-15 09:45:12'),
(996, 0, 72, 63, '162', '', '', '', '11', '', 'finland', '', 'dominican-republic-visa-requirement', '2022-10-15 09:45:12'),
(997, 0, 77, 63, '162', '', '', '', '11', '', 'france', '', 'dominican-republic-visa-requirement', '2022-10-15 09:45:12'),
(998, 0, 91, 63, '162', '', '', '', '11', '', 'greece', '', 'dominican-republic-visa-requirement', '2022-10-15 09:45:12'),
(999, 0, 100, 63, '162', '', '', '', '11', '', 'croatia', '', 'dominican-republic-visa-requirement', '2022-10-15 09:45:12'),
(1000, 0, 102, 63, '162', '', '', '', '11', '', 'hungary', '', 'dominican-republic-visa-requirement', '2022-10-15 09:45:12'),
(1001, 0, 104, 63, '162', '', '', '', '11', '', 'ireland', '', 'dominican-republic-visa-requirement', '2022-10-15 09:45:12'),
(1002, 0, 112, 63, '162', '', '', '', '11', '', 'italy', '', 'dominican-republic-visa-requirement', '2022-10-15 09:45:12'),
(1003, 0, 135, 63, '162', '', '', '', '11', '', 'lithuania', '', 'dominican-republic-visa-requirement', '2022-10-15 09:45:12'),
(1004, 0, 136, 63, '162', '', '', '', '11', '', 'luxembourg', '', 'dominican-republic-visa-requirement', '2022-10-15 09:45:12'),
(1005, 0, 137, 63, '162', '', '', '', '11', '', 'latvia', '', 'dominican-republic-visa-requirement', '2022-10-15 09:45:12'),
(1006, 0, 155, 63, '162', '', '', '', '11', '', 'malta', '', 'dominican-republic-visa-requirement', '2022-10-15 09:45:12'),
(1007, 0, 168, 63, '162', '', '', '', '11', '', 'netherlands', '', 'dominican-republic-visa-requirement', '2022-10-15 09:45:12'),
(1008, 0, 181, 63, '162', '', '', '', '11', '', 'poland', '', 'dominican-republic-visa-requirement', '2022-10-15 09:45:12'),
(1009, 0, 186, 63, '162', '', '', '', '11', '', 'portugal', '', 'dominican-republic-visa-requirement', '2022-10-15 09:45:12'),
(1010, 0, 191, 63, '162', '', '', '', '11', '', 'romania', '', 'dominican-republic-visa-requirement', '2022-10-15 09:45:12'),
(1011, 0, 199, 63, '162', '', '', '', '11', '', 'sweden', '', 'dominican-republic-visa-requirement', '2022-10-15 09:45:12'),
(1012, 0, 202, 63, '162', '', '', '', '11', '', 'slovenia', '', 'dominican-republic-visa-requirement', '2022-10-15 09:45:12'),
(1013, 0, 204, 63, '162', '', '', '', '11', '', 'slovakia', '', 'dominican-republic-visa-requirement', '2022-10-15 09:45:12'),
(1014, 0, 256, 63, '162', '', '', '', '11', '', 'czech-republic', '', 'dominican-republic-visa-requirement', '2022-10-15 09:45:12'),
(1094, 0, 1, 63, '162', '', '', '', '11', '', 'andorra', '', 'dominican-republic-visa-requirement', '2022-10-15 10:49:59'),
(1095, 0, 2, 63, '162', '', '', '', '11', '', 'united-arab-emirates', '', 'dominican-republic-visa-requirement', '2022-10-15 10:49:59'),
(1096, 0, 4, 63, '162', '', '', '', '11', '', 'antigua-and-barbuda', '', 'dominican-republic-visa-requirement', '2022-10-15 10:49:59'),
(1097, 0, 6, 63, '162', '', '', '', '11', '', 'albania', '', 'dominican-republic-visa-requirement', '2022-10-15 10:49:59'),
(1098, 0, 11, 63, '162', '', '', '', '11', '', 'argentina', '', 'dominican-republic-visa-requirement', '2022-10-15 10:49:59'),
(1099, 0, 14, 63, '162', '', '', '', '11', '', 'australia', '', 'dominican-republic-visa-requirement', '2022-10-15 10:49:59'),
(1100, 0, 18, 63, '162', '', '', '', '11', '', 'bosnia-and-herzegovina', '', 'dominican-republic-visa-requirement', '2022-10-15 10:49:59'),
(1101, 0, 19, 63, '162', '', '', '', '11', '', 'barbados', '', 'dominican-republic-visa-requirement', '2022-10-15 10:49:59'),
(1102, 0, 24, 63, '162', '', '', '', '11', '', 'bahrain', '', 'dominican-republic-visa-requirement', '2022-10-15 10:49:59'),
(1103, 0, 29, 63, '162', '', '', '', '11', '', 'brunei', '', 'dominican-republic-visa-requirement', '2022-10-15 10:49:59'),
(1104, 0, 30, 63, '162', '', '', '', '11', '', 'bolivia', '', 'dominican-republic-visa-requirement', '2022-10-15 10:49:59'),
(1105, 0, 32, 63, '162', '', '', '', '11', '', 'brazil', '', 'dominican-republic-visa-requirement', '2022-10-15 10:49:59'),
(1106, 0, 33, 63, '162', '', '', '', '11', '', 'bahamas', '', 'dominican-republic-visa-requirement', '2022-10-15 10:49:59'),
(1107, 0, 36, 63, '162', '', '', '', '11', '', 'botswana', '', 'dominican-republic-visa-requirement', '2022-10-15 10:49:59'),
(1108, 0, 38, 63, '162', '', '', '', '11', '', 'belize', '', 'dominican-republic-visa-requirement', '2022-10-15 10:49:59'),
(1109, 0, 39, 63, '162', '', '', '', '11', '', 'canada', '', 'dominican-republic-visa-requirement', '2022-10-15 10:49:59'),
(1110, 0, 44, 63, '162', '', '', '', '11', '', 'switzerland', '', 'dominican-republic-visa-requirement', '2022-10-15 10:49:59'),
(1111, 0, 47, 63, '162', '', '', '', '11', '', 'chile', '', 'dominican-republic-visa-requirement', '2022-10-15 10:49:59'),
(1112, 0, 50, 63, '162', '', '', '', '11', '', 'colombia', '', 'dominican-republic-visa-requirement', '2022-10-15 10:49:59'),
(1113, 0, 51, 63, '162', '', '', '', '11', '', 'costa-rica', '', 'dominican-republic-visa-requirement', '2022-10-15 10:49:59'),
(1114, 0, 62, 63, '162', '', '', '', '11', '', 'dominica', '', 'dominican-republic-visa-requirement', '2022-10-15 10:49:59'),
(1115, 0, 65, 63, '162', '', '', '', '11', '', 'ecuador', '', 'dominican-republic-visa-requirement', '2022-10-15 10:49:59'),
(1116, 0, 73, 63, '162', '', '', '', '11', '', 'fiji', '', 'dominican-republic-visa-requirement', '2022-10-15 10:49:59'),
(1117, 0, 75, 63, '162', '', '', '', '11', '', 'micronesia', '', 'dominican-republic-visa-requirement', '2022-10-15 10:49:59'),
(1118, 0, 79, 63, '162', '', '', '', '11', '', 'united-kingdom', '', 'dominican-republic-visa-requirement', '2022-10-15 10:49:59'),
(1119, 0, 80, 63, '162', '', '', '', '11', '', 'grenada', '', 'dominican-republic-visa-requirement', '2022-10-15 10:49:59'),
(1120, 0, 93, 63, '162', '', '', '', '11', '', 'guatemala', '', 'dominican-republic-visa-requirement', '2022-10-15 10:49:59'),
(1121, 0, 96, 63, '162', '', '', '', '11', '', 'guyana', '', 'dominican-republic-visa-requirement', '2022-10-15 10:49:59'),
(1122, 0, 97, 63, '162', '', '', '', '11', '', 'hong-kong', '', 'dominican-republic-visa-requirement', '2022-10-15 10:49:59'),
(1123, 0, 99, 63, '162', '', '', '', '11', '', 'honduras', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1124, 0, 105, 63, '162', '', '', '', '11', '', 'israel', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1125, 0, 111, 63, '162', '', '', '', '11', '', 'iceland', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1126, 0, 114, 63, '162', '', '', '', '11', '', 'jamaica', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1127, 0, 116, 63, '162', '', '', '', '11', '', 'japan', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1128, 0, 120, 63, '162', '', '', '', '11', '', 'kiribati', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1129, 0, 124, 63, '162', '', '', '', '11', '', 'south-korea', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1130, 0, 125, 63, '162', '', '', '', '11', '', 'kuwait', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1131, 0, 127, 63, '162', '', '', '', '11', '', 'kazakhstan', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1132, 0, 130, 63, '162', '', '', '', '11', '', 'saint-lucia', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1133, 0, 139, 63, '162', '', '', '', '11', '', 'morocco', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1134, 0, 140, 63, '162', '', '', '', '11', '', 'monaco', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1135, 0, 142, 63, '162', '', '', '', '11', '', 'montenegro', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1136, 0, 145, 63, '162', '', '', '', '11', '', 'marshall-islands', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1137, 0, 146, 63, '162', '', '', '', '11', '', 'north-macedonia', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1138, 0, 150, 63, '162', '', '', '', '11', '', 'macao', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1139, 0, 156, 63, '162', '', '', '', '11', '', 'mauritius', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1140, 0, 159, 63, '162', '', '', '', '11', '', 'mexico', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1141, 0, 160, 63, '162', '', '', '', '11', '', 'malaysia', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1142, 0, 162, 63, '162', '', '', '', '11', '', 'namibia', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1143, 0, 167, 63, '162', '', '', '', '11', '', 'nicaragua', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1144, 0, 169, 63, '162', '', '', '', '11', '', 'norway', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1145, 0, 171, 63, '162', '', '', '', '11', '', 'nauru', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1146, 0, 173, 63, '162', '', '', '', '11', '', 'new-zealand', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1147, 0, 175, 63, '162', '', '', '', '11', '', 'panama', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1148, 0, 176, 63, '162', '', '', '', '11', '', 'peru', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1149, 0, 178, 63, '162', '', '', '', '11', '', 'papua-new-guinea', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1150, 0, 188, 63, '162', '', '', '', '11', '', 'paraguay', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1151, 0, 189, 63, '162', '', '', '', '11', '', 'qatar', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1152, 0, 192, 63, '162', '', '', '', '11', '', 'serbia', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1153, 0, 193, 63, '162', '', '', '', '11', '', 'russia', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1154, 0, 196, 63, '162', '', '', '', '11', '', 'solomon-islands', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1155, 0, 197, 63, '162', '', '', '', '11', '', 'seychelles', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1156, 0, 200, 63, '162', '', '', '', '11', '', 'singapore', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00');
INSERT INTO `tbl_generalinfo` (`id`, `form_id`, `origin_country`, `destination_country`, `visa_type`, `separate_page`, `notes`, `extra_notes`, `process`, `required_document`, `origin_slug`, `destination_slug`, `default_sulg`, `date`) VALUES
(1157, 0, 206, 63, '162', '', '', '', '11', '', 'san-marino', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1158, 0, 209, 63, '162', '', '', '', '11', '', 'suriname', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1159, 0, 212, 63, '162', '', '', '', '11', '', 'el-salvador', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1160, 0, 220, 63, '162', '', '', '', '11', '', 'thailand', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1161, 0, 226, 63, '162', '', '', '', '11', '', 'tonga', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1162, 0, 227, 63, '162', '', '', '', '11', '', 'turkey', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1163, 0, 228, 63, '162', '', '', '', '11', '', 'trinidad-and-tobago', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1164, 0, 229, 63, '162', '', '', '', '11', '', 'tuvalu', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1165, 0, 230, 63, '162', '', '', '', '11', '', 'taiwan', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1166, 0, 232, 63, '162', '', '', '', '11', '', 'ukraine', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1167, 0, 235, 63, '162', '', '', '', '11', '', 'united-states', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1168, 0, 236, 63, '162', '', '', '', '11', '', 'uruguay', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1169, 0, 238, 63, '162', '', '', '', '11', '', 'vatican-city', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1170, 0, 244, 63, '162', '', '', '', '11', '', 'vanuatu', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1171, 0, 250, 63, '162', '', '', '', '11', '', 'south-africa', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1172, 0, 257, 63, '162', '', '', '', '11', '', 'saint-kitts-and-nevis', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1173, 0, 258, 63, '162', '', '', '', '11', '', 'saint-vincent-and-the-grenadines', '', 'dominican-republic-visa-requirement', '2022-10-15 10:50:00'),
(1213, 0, 62, 4, '165', '', '', '', '11', '', 'dominica', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:44:09'),
(1214, 0, 80, 4, '165', '', '', '', '11', '', 'grenada', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:44:09'),
(1215, 0, 130, 4, '165', '', '', '', '11', '', 'saint-lucia', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:44:09'),
(1216, 0, 257, 4, '165', '', '', '', '11', '', 'saint-kitts-and-nevis', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:44:09'),
(1217, 0, 258, 4, '165', '', '', '', '11', '', 'saint-vincent-and-the-grenadines', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:44:09'),
(1218, 0, 2, 1, '164', '', '', '', '11', '', 'united-arab-emirates', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1219, 0, 3, 1, '164', '', '', '', '11', '', 'afghanistan', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1220, 0, 4, 1, '164', '', '', '', '11', '', 'antigua-and-barbuda', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1221, 0, 5, 1, '164', '', '', '', '11', '', 'anguilla', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1222, 0, 6, 1, '164', '', '', '', '11', '', 'albania', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1223, 0, 7, 1, '164', '', '', '', '11', '', 'armenia', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1224, 0, 8, 1, '164', '', '', '', '11', '', 'netherlands-antilles', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1225, 0, 9, 1, '164', '', '', '', '11', '', 'angola', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1226, 0, 10, 1, '164', '', '', '', '11', '', 'antarctica', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1227, 0, 11, 1, '164', '', '', '', '11', '', 'argentina', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1228, 0, 12, 1, '164', '', '', '', '11', '', 'american-samoa', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1229, 0, 13, 1, '164', '', '', '', '11', '', 'austria', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1230, 0, 14, 1, '164', '', '', '', '11', '', 'australia', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1231, 0, 15, 1, '164', '', '', '', '11', '', 'aruba', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1232, 0, 16, 1, '164', '', '', '', '11', '', 'land', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1233, 0, 17, 1, '164', '', '', '', '11', '', 'azerbaijan', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1234, 0, 18, 1, '164', '', '', '', '11', '', 'bosnia-and-herzegovina', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1235, 0, 19, 1, '164', '', '', '', '11', '', 'barbados', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1236, 0, 20, 1, '164', '', '', '', '11', '', 'bangladesh', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1237, 0, 21, 1, '164', '', '', '', '11', '', 'belgium', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1238, 0, 22, 1, '164', '', '', '', '11', '', 'burkina-faso', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1239, 0, 23, 1, '164', '', '', '', '11', '', 'bulgaria', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1240, 0, 24, 1, '164', '', '', '', '11', '', 'bahrain', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1241, 0, 25, 1, '164', '', '', '', '11', '', 'burundi', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1242, 0, 26, 1, '164', '', '', '', '11', '', 'benin', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1243, 0, 27, 1, '164', '', '', '', '11', '', 'saint-barth-lemy', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1244, 0, 28, 1, '164', '', '', '', '11', '', 'bermuda', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1245, 0, 29, 1, '164', '', '', '', '11', '', 'brunei', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1246, 0, 30, 1, '164', '', '', '', '11', '', 'bolivia', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1247, 0, 31, 1, '164', '', '', '', '11', '', 'bonaire-sint-eustatius-and-saba', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1248, 0, 32, 1, '164', '', '', '', '11', '', 'brazil', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1249, 0, 33, 1, '164', '', '', '', '11', '', 'bahamas', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1250, 0, 34, 1, '164', '', '', '', '11', '', 'bhutan', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1251, 0, 35, 1, '164', '', '', '', '11', '', 'bouvet-island', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1252, 0, 36, 1, '164', '', '', '', '11', '', 'botswana', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1253, 0, 37, 1, '164', '', '', '', '11', '', 'belarus', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1254, 0, 38, 1, '164', '', '', '', '11', '', 'belize', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1255, 0, 39, 1, '164', '', '', '', '11', '', 'canada', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1256, 0, 40, 1, '164', '', '', '', '11', '', 'cocos-keeling-islands', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1257, 0, 41, 1, '164', '', '', '', '11', '', 'dr-congo', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1258, 0, 42, 1, '164', '', '', '', '11', '', 'central-african-republic', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1259, 0, 43, 1, '164', '', '', '', '11', '', 'congo-republic', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1260, 0, 44, 1, '164', '', '', '', '11', '', 'switzerland', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1261, 0, 45, 1, '164', '', '', '', '11', '', 'ivory-coast', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1262, 0, 46, 1, '164', '', '', '', '11', '', 'cook-islands', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1263, 0, 47, 1, '164', '', '', '', '11', '', 'chile', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1264, 0, 48, 1, '164', '', '', '', '11', '', 'cameroon', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1265, 0, 49, 1, '164', '', '', '', '11', '', 'china', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1266, 0, 50, 1, '164', '', '', '', '11', '', 'colombia', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1267, 0, 51, 1, '164', '', '', '', '11', '', 'costa-rica', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1268, 0, 52, 1, '164', '', '', '', '11', '', 'serbia-and-montenegro', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1269, 0, 53, 1, '164', '', '', '', '11', '', 'cuba', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1270, 0, 54, 1, '164', '', '', '', '11', '', 'cabo-verde', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1271, 0, 55, 1, '164', '', '', '', '11', '', 'cura-ao', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1272, 0, 56, 1, '164', '', '', '', '11', '', 'christmas-island', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1273, 0, 57, 1, '164', '', '', '', '11', '', 'cyprus', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1274, 0, 58, 1, '164', '', '', '', '11', '', 'czechia', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1275, 0, 59, 1, '164', '', '', '', '11', '', 'germany', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1276, 0, 60, 1, '164', '', '', '', '11', '', 'djibouti', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1277, 0, 61, 1, '164', '', '', '', '11', '', 'denmark', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1278, 0, 62, 1, '164', '', '', '', '11', '', 'dominica', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1279, 0, 63, 1, '164', '', '', '', '11', '', 'dominican-republic', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1280, 0, 64, 1, '164', '', '', '', '11', '', 'algeria', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1281, 0, 65, 1, '164', '', '', '', '11', '', 'ecuador', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1282, 0, 66, 1, '164', '', '', '', '11', '', 'estonia', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1283, 0, 67, 1, '164', '', '', '', '11', '', 'egypt', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1284, 0, 68, 1, '164', '', '', '', '11', '', 'western-sahara', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1285, 0, 69, 1, '164', '', '', '', '11', '', 'eritrea', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1286, 0, 70, 1, '164', '', '', '', '11', '', 'spain', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1287, 0, 71, 1, '164', '', '', '', '11', '', 'ethiopia', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1288, 0, 72, 1, '164', '', '', '', '11', '', 'finland', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1289, 0, 73, 1, '164', '', '', '', '11', '', 'fiji', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1290, 0, 74, 1, '164', '', '', '', '11', '', 'falkland-islands', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1291, 0, 75, 1, '164', '', '', '', '11', '', 'micronesia', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1292, 0, 76, 1, '164', '', '', '', '11', '', 'faroe-islands', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1293, 0, 77, 1, '164', '', '', '', '11', '', 'france', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1294, 0, 78, 1, '164', '', '', '', '11', '', 'gabon', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1295, 0, 79, 1, '164', '', '', '', '11', '', 'united-kingdom', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1296, 0, 80, 1, '164', '', '', '', '11', '', 'grenada', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1297, 0, 81, 1, '164', '', '', '', '11', '', 'georgia', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1298, 0, 82, 1, '164', '', '', '', '11', '', 'french-guiana', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1299, 0, 83, 1, '164', '', '', '', '11', '', 'guernsey', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1300, 0, 84, 1, '164', '', '', '', '11', '', 'ghana', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1301, 0, 85, 1, '164', '', '', '', '11', '', 'gibraltar', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1302, 0, 86, 1, '164', '', '', '', '11', '', 'greenland', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1303, 0, 87, 1, '164', '', '', '', '11', '', 'gambia', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1304, 0, 88, 1, '164', '', '', '', '11', '', 'guinea', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1305, 0, 89, 1, '164', '', '', '', '11', '', 'guadeloupe', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1306, 0, 90, 1, '164', '', '', '', '11', '', 'equatorial-guinea', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1307, 0, 91, 1, '164', '', '', '', '11', '', 'greece', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1308, 0, 92, 1, '164', '', '', '', '11', '', 'south-georgia-and-south-sandwich-islands', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1309, 0, 93, 1, '164', '', '', '', '11', '', 'guatemala', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1310, 0, 94, 1, '164', '', '', '', '11', '', 'guam', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1311, 0, 95, 1, '164', '', '', '', '11', '', 'guinea-bissau', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1312, 0, 96, 1, '164', '', '', '', '11', '', 'guyana', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1313, 0, 97, 1, '164', '', '', '', '11', '', 'hong-kong', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1314, 0, 98, 1, '164', '', '', '', '11', '', 'heard-island-and-mcdonald-islands', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1315, 0, 99, 1, '164', '', '', '', '11', '', 'honduras', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1316, 0, 100, 1, '164', '', '', '', '11', '', 'croatia', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1317, 0, 101, 1, '164', '', '', '', '11', '', 'haiti', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1318, 0, 102, 1, '164', '', '', '', '11', '', 'hungary', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1319, 0, 103, 1, '164', '', '', '', '11', '', 'indonesia', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1320, 0, 104, 1, '164', '', '', '', '11', '', 'ireland', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1321, 0, 105, 1, '164', '', '', '', '11', '', 'israel', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1322, 0, 106, 1, '164', '', '', '', '11', '', 'isle-of-man', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1323, 0, 107, 1, '164', '', '', '', '11', '', 'india', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1324, 0, 108, 1, '164', '', '', '', '11', '', 'british-indian-ocean-territory', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1325, 0, 109, 1, '164', '', '', '', '11', '', 'iraq', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1326, 0, 110, 1, '164', '', '', '', '11', '', 'iran', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1327, 0, 111, 1, '164', '', '', '', '11', '', 'iceland', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1328, 0, 112, 1, '164', '', '', '', '11', '', 'italy', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1329, 0, 113, 1, '164', '', '', '', '11', '', 'jersey', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1330, 0, 114, 1, '164', '', '', '', '11', '', 'jamaica', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1331, 0, 115, 1, '164', '', '', '', '11', '', 'jordan', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1332, 0, 116, 1, '164', '', '', '', '11', '', 'japan', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1333, 0, 117, 1, '164', '', '', '', '11', '', 'kenya', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1334, 0, 118, 1, '164', '', '', '', '11', '', 'kyrgyzstan', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1335, 0, 119, 1, '164', '', '', '', '11', '', 'cambodia', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1336, 0, 120, 1, '164', '', '', '', '11', '', 'kiribati', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1337, 0, 121, 1, '164', '', '', '', '11', '', 'comoros', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1338, 0, 122, 1, '164', '', '', '', '11', '', 'st-kitts-and-nevis', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1339, 0, 123, 1, '164', '', '', '', '11', '', 'north-korea', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1340, 0, 124, 1, '164', '', '', '', '11', '', 'south-korea', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1341, 0, 125, 1, '164', '', '', '', '11', '', 'kuwait', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1342, 0, 126, 1, '164', '', '', '', '11', '', 'cayman-islands', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1343, 0, 127, 1, '164', '', '', '', '11', '', 'kazakhstan', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1344, 0, 128, 1, '164', '', '', '', '11', '', 'laos', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1345, 0, 129, 1, '164', '', '', '', '11', '', 'lebanon', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1346, 0, 130, 1, '164', '', '', '', '11', '', 'saint-lucia', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1347, 0, 131, 1, '164', '', '', '', '11', '', 'liechtenstein', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1348, 0, 132, 1, '164', '', '', '', '11', '', 'sri-lanka', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1349, 0, 133, 1, '164', '', '', '', '11', '', 'liberia', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1350, 0, 134, 1, '164', '', '', '', '11', '', 'lesotho', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1351, 0, 135, 1, '164', '', '', '', '11', '', 'lithuania', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1352, 0, 136, 1, '164', '', '', '', '11', '', 'luxembourg', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1353, 0, 137, 1, '164', '', '', '', '11', '', 'latvia', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1354, 0, 138, 1, '164', '', '', '', '11', '', 'libya', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1355, 0, 139, 1, '164', '', '', '', '11', '', 'morocco', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1356, 0, 140, 1, '164', '', '', '', '11', '', 'monaco', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1357, 0, 141, 1, '164', '', '', '', '11', '', 'moldova', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1358, 0, 142, 1, '164', '', '', '', '11', '', 'montenegro', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1359, 0, 143, 1, '164', '', '', '', '11', '', 'saint-martin', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1360, 0, 144, 1, '164', '', '', '', '11', '', 'madagascar', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1361, 0, 145, 1, '164', '', '', '', '11', '', 'marshall-islands', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1362, 0, 146, 1, '164', '', '', '', '11', '', 'north-macedonia', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1363, 0, 147, 1, '164', '', '', '', '11', '', 'mali', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1364, 0, 148, 1, '164', '', '', '', '11', '', 'myanmar', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1365, 0, 149, 1, '164', '', '', '', '11', '', 'mongolia', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1366, 0, 150, 1, '164', '', '', '', '11', '', 'macao', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1367, 0, 151, 1, '164', '', '', '', '11', '', 'northern-mariana-islands', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1368, 0, 152, 1, '164', '', '', '', '11', '', 'martinique', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1369, 0, 153, 1, '164', '', '', '', '11', '', 'mauritania', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1370, 0, 154, 1, '164', '', '', '', '11', '', 'montserrat', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1371, 0, 155, 1, '164', '', '', '', '11', '', 'malta', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1372, 0, 156, 1, '164', '', '', '', '11', '', 'mauritius', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1373, 0, 157, 1, '164', '', '', '', '11', '', 'maldives', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1374, 0, 158, 1, '164', '', '', '', '11', '', 'malawi', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1375, 0, 159, 1, '164', '', '', '', '11', '', 'mexico', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1376, 0, 160, 1, '164', '', '', '', '11', '', 'malaysia', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1377, 0, 161, 1, '164', '', '', '', '11', '', 'mozambique', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1378, 0, 162, 1, '164', '', '', '', '11', '', 'namibia', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1379, 0, 163, 1, '164', '', '', '', '11', '', 'new-caledonia', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1380, 0, 164, 1, '164', '', '', '', '11', '', 'niger', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1381, 0, 165, 1, '164', '', '', '', '11', '', 'norfolk-island', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1382, 0, 166, 1, '164', '', '', '', '11', '', 'nigeria', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1383, 0, 167, 1, '164', '', '', '', '11', '', 'nicaragua', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1384, 0, 168, 1, '164', '', '', '', '11', '', 'netherlands', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1385, 0, 169, 1, '164', '', '', '', '11', '', 'norway', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1386, 0, 170, 1, '164', '', '', '', '11', '', 'nepal', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1387, 0, 171, 1, '164', '', '', '', '11', '', 'nauru', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1388, 0, 172, 1, '164', '', '', '', '11', '', 'niue', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1389, 0, 173, 1, '164', '', '', '', '11', '', 'new-zealand', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1390, 0, 174, 1, '164', '', '', '', '11', '', 'oman', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1391, 0, 175, 1, '164', '', '', '', '11', '', 'panama', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1392, 0, 176, 1, '164', '', '', '', '11', '', 'peru', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1393, 0, 177, 1, '164', '', '', '', '11', '', 'french-polynesia', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1394, 0, 178, 1, '164', '', '', '', '11', '', 'papua-new-guinea', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1395, 0, 179, 1, '164', '', '', '', '11', '', 'philippines', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1396, 0, 180, 1, '164', '', '', '', '11', '', 'pakistan', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1397, 0, 181, 1, '164', '', '', '', '11', '', 'poland', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1398, 0, 182, 1, '164', '', '', '', '11', '', 'saint-pierre-and-miquelon', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1399, 0, 183, 1, '164', '', '', '', '11', '', 'pitcairn-islands', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1400, 0, 184, 1, '164', '', '', '', '11', '', 'puerto-rico', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1401, 0, 185, 1, '164', '', '', '', '11', '', 'palestine', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1402, 0, 186, 1, '164', '', '', '', '11', '', 'portugal', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1403, 0, 187, 1, '164', '', '', '', '11', '', 'palau', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1404, 0, 188, 1, '164', '', '', '', '11', '', 'paraguay', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1405, 0, 189, 1, '164', '', '', '', '11', '', 'qatar', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1406, 0, 190, 1, '164', '', '', '', '11', '', 'r-union', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1407, 0, 191, 1, '164', '', '', '', '11', '', 'romania', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1408, 0, 192, 1, '164', '', '', '', '11', '', 'serbia', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1409, 0, 193, 1, '164', '', '', '', '11', '', 'russia', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1410, 0, 194, 1, '164', '', '', '', '11', '', 'rwanda', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1411, 0, 195, 1, '164', '', '', '', '11', '', 'saudi-arabia', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1412, 0, 196, 1, '164', '', '', '', '11', '', 'solomon-islands', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1413, 0, 197, 1, '164', '', '', '', '11', '', 'seychelles', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1414, 0, 198, 1, '164', '', '', '', '11', '', 'sudan', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1415, 0, 199, 1, '164', '', '', '', '11', '', 'sweden', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1416, 0, 200, 1, '164', '', '', '', '11', '', 'singapore', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1417, 0, 201, 1, '164', '', '', '', '11', '', 'saint-helena', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1418, 0, 202, 1, '164', '', '', '', '11', '', 'slovenia', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1419, 0, 203, 1, '164', '', '', '', '11', '', 'svalbard-and-jan-mayen', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1420, 0, 204, 1, '164', '', '', '', '11', '', 'slovakia', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1421, 0, 205, 1, '164', '', '', '', '11', '', 'sierra-leone', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1422, 0, 206, 1, '164', '', '', '', '11', '', 'san-marino', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1423, 0, 207, 1, '164', '', '', '', '11', '', 'senegal', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1424, 0, 208, 1, '164', '', '', '', '11', '', 'somalia', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1425, 0, 209, 1, '164', '', '', '', '11', '', 'suriname', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1426, 0, 210, 1, '164', '', '', '', '11', '', 'south-sudan', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1427, 0, 211, 1, '164', '', '', '', '11', '', 's-o-tom-and-pr-ncipe', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1428, 0, 212, 1, '164', '', '', '', '11', '', 'el-salvador', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1429, 0, 213, 1, '164', '', '', '', '11', '', 'sint-maarten', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1430, 0, 214, 1, '164', '', '', '', '11', '', 'syria', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1431, 0, 215, 1, '164', '', '', '', '11', '', 'eswatini', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1432, 0, 216, 1, '164', '', '', '', '11', '', 'turks-and-caicos-islands', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1433, 0, 217, 1, '164', '', '', '', '11', '', 'chad', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1434, 0, 218, 1, '164', '', '', '', '11', '', 'french-southern-territories', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1435, 0, 219, 1, '164', '', '', '', '11', '', 'togo', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1436, 0, 220, 1, '164', '', '', '', '11', '', 'thailand', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1437, 0, 221, 1, '164', '', '', '', '11', '', 'tajikistan', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1438, 0, 222, 1, '164', '', '', '', '11', '', 'tokelau', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1439, 0, 223, 1, '164', '', '', '', '11', '', 'timor-leste', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1440, 0, 224, 1, '164', '', '', '', '11', '', 'turkmenistan', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1441, 0, 225, 1, '164', '', '', '', '11', '', 'tunisia', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1442, 0, 226, 1, '164', '', '', '', '11', '', 'tonga', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1443, 0, 227, 1, '164', '', '', '', '11', '', 'turkey', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1444, 0, 228, 1, '164', '', '', '', '11', '', 'trinidad-and-tobago', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1445, 0, 229, 1, '164', '', '', '', '11', '', 'tuvalu', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1446, 0, 230, 1, '164', '', '', '', '11', '', 'taiwan', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1447, 0, 231, 1, '164', '', '', '', '11', '', 'tanzania', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1448, 0, 232, 1, '164', '', '', '', '11', '', 'ukraine', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1449, 0, 233, 1, '164', '', '', '', '11', '', 'uganda', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1450, 0, 234, 1, '164', '', '', '', '11', '', 'u-s-minor-outlying-islands', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1451, 0, 235, 1, '164', '', '', '', '11', '', 'united-states', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1452, 0, 236, 1, '164', '', '', '', '11', '', 'uruguay', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1453, 0, 237, 1, '164', '', '', '', '11', '', 'uzbekistan', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1454, 0, 238, 1, '164', '', '', '', '11', '', 'vatican-city', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1455, 0, 239, 1, '164', '', '', '', '11', '', 'st-vincent-and-grenadines', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1456, 0, 240, 1, '164', '', '', '', '11', '', 'venezuela', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1457, 0, 241, 1, '164', '', '', '', '11', '', 'british-virgin-islands', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1458, 0, 242, 1, '164', '', '', '', '11', '', 'u-s-virgin-islands', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1459, 0, 243, 1, '164', '', '', '', '11', '', 'vietnam', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1460, 0, 244, 1, '164', '', '', '', '11', '', 'vanuatu', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1461, 0, 245, 1, '164', '', '', '', '11', '', 'wallis-and-futuna', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1462, 0, 246, 1, '164', '', '', '', '11', '', 'samoa', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1463, 0, 247, 1, '164', '', '', '', '11', '', 'kosovo', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1464, 0, 248, 1, '164', '', '', '', '11', '', 'yemen', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1465, 0, 249, 1, '164', '', '', '', '11', '', 'mayotte', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1466, 0, 250, 1, '164', '', '', '', '11', '', 'south-africa', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1467, 0, 251, 1, '164', '', '', '', '11', '', 'zambia', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1468, 0, 252, 1, '164', '', '', '', '11', '', 'zimbabwe', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1469, 0, 253, 1, '164', '', '', '', '11', '', 'cape-verde', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1470, 0, 254, 1, '164', '', '', '', '11', '', 'republic-of-the-congo', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1471, 0, 255, 1, '164', '', '', '', '11', '', 'democratic-republic-of-the-congo', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1472, 0, 256, 1, '164', '', '', '', '11', '', 'czech-republic', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1473, 0, 257, 1, '164', '', '', '', '11', '', 'saint-kitts-and-nevis', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1474, 0, 258, 1, '164', '', '', '', '11', '', 'saint-vincent-and-the-grenadines', '', 'andorra-visa-requirement', '2022-10-17 14:44:22'),
(1475, 0, 13, 4, '166', '', '', '', '11', '', 'austria', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:53:16'),
(1476, 0, 21, 4, '166', '', '', '', '11', '', 'belgium', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:53:16'),
(1477, 0, 23, 4, '166', '', '', '', '11', '', 'bulgaria', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:53:16'),
(1478, 0, 57, 4, '166', '', '', '', '11', '', 'cyprus', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:53:16'),
(1479, 0, 59, 4, '166', '', '', '', '11', '', 'germany', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:53:16'),
(1480, 0, 61, 4, '166', '', '', '', '11', '', 'denmark', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:53:16'),
(1481, 0, 66, 4, '166', '', '', '', '11', '', 'estonia', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:53:16'),
(1482, 0, 70, 4, '166', '', '', '', '11', '', 'spain', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:53:16'),
(1483, 0, 72, 4, '166', '', '', '', '11', '', 'finland', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:53:16'),
(1484, 0, 77, 4, '166', '', '', '', '11', '', 'france', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:53:16'),
(1485, 0, 91, 4, '166', '', '', '', '11', '', 'greece', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:53:16'),
(1486, 0, 100, 4, '166', '', '', '', '11', '', 'croatia', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:53:16'),
(1487, 0, 102, 4, '166', '', '', '', '11', '', 'hungary', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:53:16'),
(1488, 0, 104, 4, '166', '', '', '', '11', '', 'ireland', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:53:16'),
(1489, 0, 112, 4, '166', '', '', '', '11', '', 'italy', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:53:16'),
(1490, 0, 135, 4, '166', '', '', '', '11', '', 'lithuania', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:53:16'),
(1491, 0, 136, 4, '166', '', '', '', '11', '', 'luxembourg', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:53:16'),
(1492, 0, 137, 4, '166', '', '', '', '11', '', 'latvia', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:53:16'),
(1493, 0, 155, 4, '166', '', '', '', '11', '', 'malta', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:53:16'),
(1494, 0, 168, 4, '166', '', '', '', '11', '', 'netherlands', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:53:16'),
(1495, 0, 181, 4, '166', '', '', '', '11', '', 'poland', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:53:16'),
(1496, 0, 186, 4, '166', '', '', '', '11', '', 'portugal', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:53:16'),
(1497, 0, 191, 4, '166', '', '', '', '11', '', 'romania', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:53:16'),
(1498, 0, 199, 4, '166', '', '', '', '11', '', 'sweden', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:53:16'),
(1499, 0, 202, 4, '166', '', '', '', '11', '', 'slovenia', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:53:16'),
(1500, 0, 204, 4, '166', '', '', '', '11', '', 'slovakia', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:53:16'),
(1501, 0, 256, 4, '166', '', '', '', '11', '', 'czech-republic', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:53:16'),
(1502, 0, 6, 4, '166', '', '', '', '11', '', 'albania', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:55:01'),
(1503, 0, 49, 4, '167', '', '', '', '11', '', 'china', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:59:41'),
(1504, 0, 53, 4, '167', '', '', '', '11', '', 'cuba', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:59:41'),
(1505, 0, 97, 4, '167', '', '', '', '11', '', 'hong-kong', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:59:41'),
(1506, 0, 103, 4, '167', '', '', '', '11', '', 'indonesia', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:59:41'),
(1507, 0, 150, 4, '167', '', '', '', '11', '', 'macao', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:59:41'),
(1508, 0, 230, 4, '167', '', '', '', '11', '', 'taiwan', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 14:59:41'),
(1509, 0, 2, 4, '166', '', '', '', '11', '', 'united-arab-emirates', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1510, 0, 7, 4, '166', '', '', '', '11', '', 'armenia', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1511, 0, 11, 4, '166', '', '', '', '11', '', 'argentina', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1512, 0, 14, 4, '166', '', '', '', '11', '', 'australia', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1513, 0, 17, 4, '166', '', '', '', '11', '', 'azerbaijan', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1514, 0, 19, 4, '166', '', '', '', '11', '', 'barbados', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1515, 0, 29, 4, '166', '', '', '', '11', '', 'brunei', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1516, 0, 32, 4, '166', '', '', '', '11', '', 'brazil', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1517, 0, 33, 4, '166', '', '', '', '11', '', 'bahamas', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1518, 0, 36, 4, '166', '', '', '', '11', '', 'botswana', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1519, 0, 37, 4, '166', '', '', '', '11', '', 'belarus', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1520, 0, 38, 4, '166', '', '', '', '11', '', 'belize', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1521, 0, 39, 4, '166', '', '', '', '11', '', 'canada', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1522, 0, 44, 4, '166', '', '', '', '11', '', 'switzerland', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1523, 0, 47, 4, '166', '', '', '', '11', '', 'chile', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1524, 0, 50, 4, '166', '', '', '', '11', '', 'colombia', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1525, 0, 73, 4, '166', '', '', '', '11', '', 'fiji', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1526, 0, 79, 4, '166', '', '', '', '11', '', 'united-kingdom', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1527, 0, 81, 4, '166', '', '', '', '11', '', 'georgia', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1528, 0, 96, 4, '166', '', '', '', '11', '', 'guyana', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1529, 0, 111, 4, '166', '', '', '', '11', '', 'iceland', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1530, 0, 114, 4, '166', '', '', '', '11', '', 'jamaica', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1531, 0, 116, 4, '166', '', '', '', '11', '', 'japan', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1532, 0, 117, 4, '166', '', '', '', '11', '', 'kenya', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1533, 0, 118, 4, '166', '', '', '', '11', '', 'kyrgyzstan', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1534, 0, 120, 4, '166', '', '', '', '11', '', 'kiribati', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1535, 0, 124, 4, '166', '', '', '', '11', '', 'south-korea', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1536, 0, 127, 4, '166', '', '', '', '11', '', 'kazakhstan', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1537, 0, 131, 4, '166', '', '', '', '11', '', 'liechtenstein', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1538, 0, 134, 4, '166', '', '', '', '11', '', 'lesotho', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1539, 0, 140, 4, '166', '', '', '', '11', '', 'monaco', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1540, 0, 141, 4, '166', '', '', '', '11', '', 'moldova', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1541, 0, 145, 4, '166', '', '', '', '11', '', 'marshall-islands', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1542, 0, 156, 4, '166', '', '', '', '11', '', 'mauritius', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1543, 0, 157, 4, '166', '', '', '', '11', '', 'maldives', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1544, 0, 158, 4, '166', '', '', '', '11', '', 'malawi', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1545, 0, 159, 4, '166', '', '', '', '11', '', 'mexico', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1546, 0, 160, 4, '166', '', '', '', '11', '', 'malaysia', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1547, 0, 162, 4, '166', '', '', '', '11', '', 'namibia', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1548, 0, 169, 4, '166', '', '', '', '11', '', 'norway', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1549, 0, 171, 4, '166', '', '', '', '11', '', 'nauru', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1550, 0, 173, 4, '166', '', '', '', '11', '', 'new-zealand', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1551, 0, 175, 4, '166', '', '', '', '11', '', 'panama', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1552, 0, 176, 4, '166', '', '', '', '11', '', 'peru', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1553, 0, 178, 4, '166', '', '', '', '11', '', 'papua-new-guinea', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1554, 0, 193, 4, '166', '', '', '', '11', '', 'russia', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1555, 0, 196, 4, '166', '', '', '', '11', '', 'solomon-islands', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1556, 0, 197, 4, '166', '', '', '', '11', '', 'seychelles', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1557, 0, 200, 4, '166', '', '', '', '11', '', 'singapore', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1558, 0, 206, 4, '166', '', '', '', '11', '', 'san-marino', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1559, 0, 209, 4, '166', '', '', '', '11', '', 'suriname', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1560, 0, 215, 4, '166', '', '', '', '11', '', 'eswatini', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1561, 0, 221, 4, '166', '', '', '', '11', '', 'tajikistan', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1562, 0, 224, 4, '166', '', '', '', '11', '', 'turkmenistan', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1563, 0, 227, 4, '166', '', '', '', '11', '', 'turkey', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1564, 0, 228, 4, '166', '', '', '', '11', '', 'trinidad-and-tobago', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1565, 0, 229, 4, '166', '', '', '', '11', '', 'tuvalu', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1566, 0, 231, 4, '166', '', '', '', '11', '', 'tanzania', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1567, 0, 232, 4, '166', '', '', '', '11', '', 'ukraine', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:47'),
(1568, 0, 233, 4, '166', '', '', '', '11', '', 'uganda', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:48'),
(1569, 0, 235, 4, '166', '', '', '', '11', '', 'united-states', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:48'),
(1570, 0, 237, 4, '166', '', '', '', '11', '', 'uzbekistan', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:48'),
(1571, 0, 238, 4, '166', '', '', '', '11', '', 'vatican-city', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:48'),
(1572, 0, 240, 4, '166', '', '', '', '11', '', 'venezuela', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:48'),
(1573, 0, 244, 4, '166', '', '', '', '11', '', 'vanuatu', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:48'),
(1574, 0, 246, 4, '166', '', '', '', '11', '', 'samoa', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:48'),
(1575, 0, 250, 4, '166', '', '', '', '11', '', 'south-africa', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:48'),
(1576, 0, 251, 4, '166', '', '', '', '11', '', 'zambia', '', 'antigua-and-barbuda-visa-requirement', '2022-10-17 15:02:48'),
(1641, 0, 13, 9, '169', '', '', '', '8,9,11,12', '', 'austria', '', 'angola-visa-requirement', '2022-10-17 16:07:44'),
(1642, 0, 21, 9, '169', '', '', '', '8,9,11,12', '', 'belgium', '', 'angola-visa-requirement', '2022-10-17 16:07:44'),
(1643, 0, 23, 9, '169', '', '', '', '8,9,11,12', '', 'bulgaria', '', 'angola-visa-requirement', '2022-10-17 16:07:44'),
(1644, 0, 57, 9, '169', '', '', '', '8,9,11,12', '', 'cyprus', '', 'angola-visa-requirement', '2022-10-17 16:07:44'),
(1645, 0, 59, 9, '169', '', '', '', '8,9,11,12', '', 'germany', '', 'angola-visa-requirement', '2022-10-17 16:07:44'),
(1646, 0, 61, 9, '169', '', '', '', '8,9,11,12', '', 'denmark', '', 'angola-visa-requirement', '2022-10-17 16:07:44'),
(1647, 0, 66, 9, '169', '', '', '', '8,9,11,12', '', 'estonia', '', 'angola-visa-requirement', '2022-10-17 16:07:44'),
(1648, 0, 70, 9, '169', '', '', '', '8,9,11,12', '', 'spain', '', 'angola-visa-requirement', '2022-10-17 16:07:44'),
(1649, 0, 72, 9, '169', '', '', '', '8,9,11,12', '', 'finland', '', 'angola-visa-requirement', '2022-10-17 16:07:44'),
(1650, 0, 77, 9, '169', '', '', '', '8,9,11,12', '', 'france', '', 'angola-visa-requirement', '2022-10-17 16:07:44'),
(1651, 0, 91, 9, '169', '', '', '', '8,9,11,12', '', 'greece', '', 'angola-visa-requirement', '2022-10-17 16:07:44'),
(1652, 0, 100, 9, '169', '', '', '', '8,9,11,12', '', 'croatia', '', 'angola-visa-requirement', '2022-10-17 16:07:44'),
(1653, 0, 102, 9, '169', '', '', '', '8,9,11,12', '', 'hungary', '', 'angola-visa-requirement', '2022-10-17 16:07:44'),
(1654, 0, 104, 9, '169', '', '', '', '8,9,11,12', '', 'ireland', '', 'angola-visa-requirement', '2022-10-17 16:07:44'),
(1655, 0, 112, 9, '169', '', '', '', '8,9,11,12', '', 'italy', '', 'angola-visa-requirement', '2022-10-17 16:07:44'),
(1656, 0, 135, 9, '169', '', '', '', '8,9,11,12', '', 'lithuania', '', 'angola-visa-requirement', '2022-10-17 16:07:44'),
(1657, 0, 136, 9, '169', '', '', '', '8,9,11,12', '', 'luxembourg', '', 'angola-visa-requirement', '2022-10-17 16:07:44'),
(1658, 0, 137, 9, '169', '', '', '', '8,9,11,12', '', 'latvia', '', 'angola-visa-requirement', '2022-10-17 16:07:44'),
(1659, 0, 155, 9, '169', '', '', '', '8,9,11,12', '', 'malta', '', 'angola-visa-requirement', '2022-10-17 16:07:44'),
(1660, 0, 168, 9, '169', '', '', '', '8,9,11,12', '', 'netherlands', '', 'angola-visa-requirement', '2022-10-17 16:07:44'),
(1661, 0, 181, 9, '169', '', '', '', '8,9,11,12', '', 'poland', '', 'angola-visa-requirement', '2022-10-17 16:07:44'),
(1662, 0, 186, 9, '169', '', '', '', '8,9,11,12', '', 'portugal', '', 'angola-visa-requirement', '2022-10-17 16:07:44'),
(1663, 0, 191, 9, '169', '', '', '', '8,9,11,12', '', 'romania', '', 'angola-visa-requirement', '2022-10-17 16:07:44'),
(1664, 0, 199, 9, '169', '', '', '', '8,9,11,12', '', 'sweden', '', 'angola-visa-requirement', '2022-10-17 16:07:44'),
(1665, 0, 202, 9, '169', '', '', '', '8,9,11,12', '', 'slovenia', '', 'angola-visa-requirement', '2022-10-17 16:07:44'),
(1666, 0, 204, 9, '169', '', '', '', '8,9,11,12', '', 'slovakia', '', 'angola-visa-requirement', '2022-10-17 16:07:44'),
(1667, 0, 256, 9, '169', '', '', '', '8,9,11,12', '', 'czech-republic', '', 'angola-visa-requirement', '2022-10-17 16:07:44'),
(1668, 0, 2, 9, '169', '', '', '', '8,9,11,12', '', 'united-arab-emirates', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1669, 0, 11, 9, '169', '', '', '', '8,9,11,12', '', 'argentina', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1670, 0, 14, 9, '169', '', '', '', '8,9,11,12', '', 'australia', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1671, 0, 32, 9, '169', '', '', '', '8,9,11,12', '', 'brazil', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1672, 0, 39, 9, '169', '', '', '', '8,9,11,12', '', 'canada', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1673, 0, 44, 9, '169', '', '', '', '8,9,11,12', '', 'switzerland', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1674, 0, 47, 9, '169', '', '', '', '8,9,11,12', '', 'chile', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1675, 0, 49, 9, '169', '', '', '', '8,9,11,12', '', 'china', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1676, 0, 53, 9, '169', '', '', '', '8,9,11,12', '', 'cuba', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1677, 0, 64, 9, '169', '', '', '', '8,9,11,12', '', 'algeria', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1678, 0, 79, 9, '169', '', '', '', '8,9,11,12', '', 'united-kingdom', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1679, 0, 90, 9, '169', '', '', '', '8,9,11,12', '', 'equatorial-guinea', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1680, 0, 95, 9, '169', '', '', '', '8,9,11,12', '', 'guinea-bissau', '', 'angola-visa-requirement', '2022-10-17 16:10:54');
INSERT INTO `tbl_generalinfo` (`id`, `form_id`, `origin_country`, `destination_country`, `visa_type`, `separate_page`, `notes`, `extra_notes`, `process`, `required_document`, `origin_slug`, `destination_slug`, `default_sulg`, `date`) VALUES
(1681, 0, 103, 9, '169', '', '', '', '8,9,11,12', '', 'indonesia', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1682, 0, 105, 9, '169', '', '', '', '8,9,11,12', '', 'israel', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1683, 0, 107, 9, '169', '', '', '', '8,9,11,12', '', 'india', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1684, 0, 111, 9, '169', '', '', '', '8,9,11,12', '', 'iceland', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1685, 0, 116, 9, '169', '', '', '', '8,9,11,12', '', 'japan', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1686, 0, 124, 9, '169', '', '', '', '8,9,11,12', '', 'south-korea', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1687, 0, 134, 9, '169', '', '', '', '8,9,11,12', '', 'lesotho', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1688, 0, 139, 9, '169', '', '', '', '8,9,11,12', '', 'morocco', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1689, 0, 140, 9, '169', '', '', '', '8,9,11,12', '', 'monaco', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1690, 0, 144, 9, '169', '', '', '', '8,9,11,12', '', 'madagascar', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1691, 0, 169, 9, '169', '', '', '', '8,9,11,12', '', 'norway', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1692, 0, 173, 9, '169', '', '', '', '8,9,11,12', '', 'new-zealand', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1693, 0, 193, 9, '169', '', '', '', '8,9,11,12', '', 'russia', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1694, 0, 211, 9, '169', '', '', '', '8,9,11,12', '', 's-o-tom-and-pr-ncipe', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1695, 0, 215, 9, '169', '', '', '', '8,9,11,12', '', 'eswatini', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1696, 0, 223, 9, '169', '', '', '', '8,9,11,12', '', 'timor-leste', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1697, 0, 235, 9, '169', '', '', '', '8,9,11,12', '', 'united-states', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1698, 0, 236, 9, '169', '', '', '', '8,9,11,12', '', 'uruguay', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1699, 0, 238, 9, '169', '', '', '', '8,9,11,12', '', 'vatican-city', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1700, 0, 240, 9, '169', '', '', '', '8,9,11,12', '', 'venezuela', '', 'angola-visa-requirement', '2022-10-17 16:10:54'),
(1701, 0, 75, 235, '170', '', '', '', '11', '', 'micronesia', '', 'united-states-visa-requirement', '2022-10-18 14:57:37'),
(1702, 0, 145, 235, '170', '', '', '', '11', '', 'marshall-islands', '', 'united-states-visa-requirement', '2022-10-18 14:57:37'),
(1703, 0, 187, 235, '170', '', '', '', '11', '', 'palau', '', 'united-states-visa-requirement', '2022-10-18 14:57:37'),
(1704, 0, 13, 235, '171', '', '', '', '8,9,13', '', 'austria', '', 'united-states-visa-requirement', '2022-10-18 15:13:50'),
(1705, 0, 21, 235, '171', '', '', '', '8,9,13', '', 'belgium', '', 'united-states-visa-requirement', '2022-10-18 15:13:50'),
(1706, 0, 44, 235, '171', '', '', '', '8,9,13', '', 'switzerland', '', 'united-states-visa-requirement', '2022-10-18 15:13:50'),
(1707, 0, 59, 235, '171', '', '', '', '8,9,13', '', 'germany', '', 'united-states-visa-requirement', '2022-10-18 15:13:50'),
(1708, 0, 61, 235, '171', '', '', '', '8,9,13', '', 'denmark', '', 'united-states-visa-requirement', '2022-10-18 15:13:50'),
(1709, 0, 66, 235, '171', '', '', '', '8,9,13', '', 'estonia', '', 'united-states-visa-requirement', '2022-10-18 15:13:50'),
(1710, 0, 70, 235, '171', '', '', '', '8,9,13', '', 'spain', '', 'united-states-visa-requirement', '2022-10-18 15:13:50'),
(1711, 0, 72, 235, '171', '', '', '', '8,9,13', '', 'finland', '', 'united-states-visa-requirement', '2022-10-18 15:13:50'),
(1712, 0, 77, 235, '171', '', '', '', '8,9,13', '', 'france', '', 'united-states-visa-requirement', '2022-10-18 15:13:50'),
(1713, 0, 91, 235, '171', '', '', '', '8,9,13', '', 'greece', '', 'united-states-visa-requirement', '2022-10-18 15:13:50'),
(1714, 0, 102, 235, '171', '', '', '', '8,9,13', '', 'hungary', '', 'united-states-visa-requirement', '2022-10-18 15:13:50'),
(1715, 0, 111, 235, '171', '', '', '', '8,9,13', '', 'iceland', '', 'united-states-visa-requirement', '2022-10-18 15:13:50'),
(1716, 0, 112, 235, '171', '', '', '', '8,9,13', '', 'italy', '', 'united-states-visa-requirement', '2022-10-18 15:13:50'),
(1717, 0, 131, 235, '171', '', '', '', '8,9,13', '', 'liechtenstein', '', 'united-states-visa-requirement', '2022-10-18 15:13:50'),
(1718, 0, 135, 235, '171', '', '', '', '8,9,13', '', 'lithuania', '', 'united-states-visa-requirement', '2022-10-18 15:13:50'),
(1719, 0, 136, 235, '171', '', '', '', '8,9,13', '', 'luxembourg', '', 'united-states-visa-requirement', '2022-10-18 15:13:50'),
(1720, 0, 137, 235, '171', '', '', '', '8,9,13', '', 'latvia', '', 'united-states-visa-requirement', '2022-10-18 15:13:50'),
(1721, 0, 155, 235, '171', '', '', '', '8,9,13', '', 'malta', '', 'united-states-visa-requirement', '2022-10-18 15:13:50'),
(1722, 0, 168, 235, '171', '', '', '', '8,9,13', '', 'netherlands', '', 'united-states-visa-requirement', '2022-10-18 15:13:50'),
(1723, 0, 169, 235, '171', '', '', '', '8,9,13', '', 'norway', '', 'united-states-visa-requirement', '2022-10-18 15:13:50'),
(1724, 0, 181, 235, '171', '', '', '', '8,9,13', '', 'poland', '', 'united-states-visa-requirement', '2022-10-18 15:13:50'),
(1725, 0, 186, 235, '171', '', '', '', '8,9,13', '', 'portugal', '', 'united-states-visa-requirement', '2022-10-18 15:13:50'),
(1726, 0, 199, 235, '171', '', '', '', '8,9,13', '', 'sweden', '', 'united-states-visa-requirement', '2022-10-18 15:13:50'),
(1727, 0, 202, 235, '171', '', '', '', '8,9,13', '', 'slovenia', '', 'united-states-visa-requirement', '2022-10-18 15:13:50'),
(1728, 0, 204, 235, '171', '', '', '', '8,9,13', '', 'slovakia', '', 'united-states-visa-requirement', '2022-10-18 15:13:50'),
(1729, 0, 256, 235, '171', '', '', '', '8,9,13', '', 'czech-republic', '', 'united-states-visa-requirement', '2022-10-18 15:13:50'),
(1730, 0, 1, 235, '171', '', '', '', '8,9,13', '', 'andorra', '', 'united-states-visa-requirement', '2022-10-18 15:15:37'),
(1731, 0, 14, 235, '171', '', '', '', '8,9,13', '', 'australia', '', 'united-states-visa-requirement', '2022-10-18 15:15:37'),
(1732, 0, 29, 235, '171', '', '', '', '8,9,13', '', 'brunei', '', 'united-states-visa-requirement', '2022-10-18 15:15:37'),
(1733, 0, 47, 235, '171', '', '', '', '8,9,13', '', 'chile', '', 'united-states-visa-requirement', '2022-10-18 15:15:37'),
(1734, 0, 79, 235, '171', '', '', '', '8,9,13', '', 'united-kingdom', '', 'united-states-visa-requirement', '2022-10-18 15:15:37'),
(1735, 0, 100, 235, '171', '', '', '', '8,9,13', '', 'croatia', '', 'united-states-visa-requirement', '2022-10-18 15:15:37'),
(1736, 0, 104, 235, '171', '', '', '', '8,9,13', '', 'ireland', '', 'united-states-visa-requirement', '2022-10-18 15:15:37'),
(1737, 0, 116, 235, '171', '', '', '', '8,9,13', '', 'japan', '', 'united-states-visa-requirement', '2022-10-18 15:15:37'),
(1738, 0, 124, 235, '171', '', '', '', '8,9,13', '', 'south-korea', '', 'united-states-visa-requirement', '2022-10-18 15:15:37'),
(1739, 0, 140, 235, '171', '', '', '', '8,9,13', '', 'monaco', '', 'united-states-visa-requirement', '2022-10-18 15:15:37'),
(1740, 0, 173, 235, '171', '', '', '', '8,9,13', '', 'new-zealand', '', 'united-states-visa-requirement', '2022-10-18 15:15:37'),
(1741, 0, 200, 235, '171', '', '', '', '8,9,13', '', 'singapore', '', 'united-states-visa-requirement', '2022-10-18 15:15:37'),
(1742, 0, 206, 235, '171', '', '', '', '8,9,13', '', 'san-marino', '', 'united-states-visa-requirement', '2022-10-18 15:15:37'),
(1743, 0, 230, 235, '171', '', '', '', '8,9,13', '', 'taiwan', '', 'united-states-visa-requirement', '2022-10-18 15:15:37'),
(1744, 0, 13, 7, '172', '', '', '', '11', '', 'austria', '', 'armenia-visa-requirement', '2022-10-18 15:23:50'),
(1745, 0, 21, 7, '172', '', '', '', '11', '', 'belgium', '', 'armenia-visa-requirement', '2022-10-18 15:23:50'),
(1746, 0, 23, 7, '172', '', '', '', '11', '', 'bulgaria', '', 'armenia-visa-requirement', '2022-10-18 15:23:50'),
(1747, 0, 57, 7, '172', '', '', '', '11', '', 'cyprus', '', 'armenia-visa-requirement', '2022-10-18 15:23:50'),
(1748, 0, 59, 7, '172', '', '', '', '11', '', 'germany', '', 'armenia-visa-requirement', '2022-10-18 15:23:50'),
(1749, 0, 61, 7, '172', '', '', '', '11', '', 'denmark', '', 'armenia-visa-requirement', '2022-10-18 15:23:50'),
(1750, 0, 66, 7, '172', '', '', '', '11', '', 'estonia', '', 'armenia-visa-requirement', '2022-10-18 15:23:50'),
(1751, 0, 70, 7, '172', '', '', '', '11', '', 'spain', '', 'armenia-visa-requirement', '2022-10-18 15:23:50'),
(1752, 0, 72, 7, '172', '', '', '', '11', '', 'finland', '', 'armenia-visa-requirement', '2022-10-18 15:23:50'),
(1753, 0, 77, 7, '172', '', '', '', '11', '', 'france', '', 'armenia-visa-requirement', '2022-10-18 15:23:50'),
(1754, 0, 91, 7, '172', '', '', '', '11', '', 'greece', '', 'armenia-visa-requirement', '2022-10-18 15:23:50'),
(1755, 0, 100, 7, '172', '', '', '', '11', '', 'croatia', '', 'armenia-visa-requirement', '2022-10-18 15:23:50'),
(1756, 0, 102, 7, '172', '', '', '', '11', '', 'hungary', '', 'armenia-visa-requirement', '2022-10-18 15:23:50'),
(1757, 0, 104, 7, '172', '', '', '', '11', '', 'ireland', '', 'armenia-visa-requirement', '2022-10-18 15:23:50'),
(1758, 0, 112, 7, '172', '', '', '', '11', '', 'italy', '', 'armenia-visa-requirement', '2022-10-18 15:23:50'),
(1759, 0, 135, 7, '172', '', '', '', '11', '', 'lithuania', '', 'armenia-visa-requirement', '2022-10-18 15:23:50'),
(1760, 0, 136, 7, '172', '', '', '', '11', '', 'luxembourg', '', 'armenia-visa-requirement', '2022-10-18 15:23:50'),
(1761, 0, 137, 7, '172', '', '', '', '11', '', 'latvia', '', 'armenia-visa-requirement', '2022-10-18 15:23:50'),
(1762, 0, 155, 7, '172', '', '', '', '11', '', 'malta', '', 'armenia-visa-requirement', '2022-10-18 15:23:50'),
(1763, 0, 168, 7, '172', '', '', '', '11', '', 'netherlands', '', 'armenia-visa-requirement', '2022-10-18 15:23:50'),
(1764, 0, 181, 7, '172', '', '', '', '11', '', 'poland', '', 'armenia-visa-requirement', '2022-10-18 15:23:50'),
(1765, 0, 186, 7, '172', '', '', '', '11', '', 'portugal', '', 'armenia-visa-requirement', '2022-10-18 15:23:50'),
(1766, 0, 191, 7, '172', '', '', '', '11', '', 'romania', '', 'armenia-visa-requirement', '2022-10-18 15:23:50'),
(1767, 0, 199, 7, '172', '', '', '', '11', '', 'sweden', '', 'armenia-visa-requirement', '2022-10-18 15:23:50'),
(1768, 0, 202, 7, '172', '', '', '', '11', '', 'slovenia', '', 'armenia-visa-requirement', '2022-10-18 15:23:50'),
(1769, 0, 204, 7, '172', '', '', '', '11', '', 'slovakia', '', 'armenia-visa-requirement', '2022-10-18 15:23:50'),
(1770, 0, 256, 7, '172', '', '', '', '11', '', 'czech-republic', '', 'armenia-visa-requirement', '2022-10-18 15:23:50'),
(1771, 0, 49, 7, '173', '', '', '', '11', '', 'china', '', 'armenia-visa-requirement', '2022-10-18 15:26:01'),
(1772, 0, 110, 7, '173', '', '', '', '11', '', 'iran', '', 'armenia-visa-requirement', '2022-10-18 15:26:01'),
(1773, 0, 150, 7, '173', '', '', '', '11', '', 'macao', '', 'armenia-visa-requirement', '2022-10-18 15:26:01'),
(1774, 0, 221, 7, '173', '', '', '', '11', '', 'tajikistan', '', 'armenia-visa-requirement', '2022-10-18 15:26:01'),
(1775, 0, 1, 7, '172', '', '', '', '11', '', 'andorra', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1776, 0, 2, 7, '172', '', '', '', '11', '', 'united-arab-emirates', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1777, 0, 6, 7, '172', '', '', '', '11', '', 'albania', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1778, 0, 11, 7, '172', '', '', '', '11', '', 'argentina', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1779, 0, 14, 7, '172', '', '', '', '11', '', 'australia', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1780, 0, 32, 7, '172', '', '', '', '11', '', 'brazil', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1781, 0, 37, 7, '172', '', '', '', '11', '', 'belarus', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1782, 0, 44, 7, '172', '', '', '', '11', '', 'switzerland', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1783, 0, 65, 7, '172', '', '', '', '11', '', 'ecuador', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1784, 0, 79, 7, '172', '', '', '', '11', '', 'united-kingdom', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1785, 0, 81, 7, '172', '', '', '', '11', '', 'georgia', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1786, 0, 97, 7, '172', '', '', '', '11', '', 'hong-kong', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1787, 0, 111, 7, '172', '', '', '', '11', '', 'iceland', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1788, 0, 116, 7, '172', '', '', '', '11', '', 'japan', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1789, 0, 118, 7, '172', '', '', '', '11', '', 'kyrgyzstan', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1790, 0, 124, 7, '172', '', '', '', '11', '', 'south-korea', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1791, 0, 125, 7, '172', '', '', '', '11', '', 'kuwait', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1792, 0, 127, 7, '172', '', '', '', '11', '', 'kazakhstan', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1793, 0, 131, 7, '172', '', '', '', '11', '', 'liechtenstein', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1794, 0, 140, 7, '172', '', '', '', '11', '', 'monaco', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1795, 0, 141, 7, '172', '', '', '', '11', '', 'moldova', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1796, 0, 142, 7, '172', '', '', '', '11', '', 'montenegro', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1797, 0, 169, 7, '172', '', '', '', '11', '', 'norway', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1798, 0, 173, 7, '172', '', '', '', '11', '', 'new-zealand', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1799, 0, 189, 7, '172', '', '', '', '11', '', 'qatar', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1800, 0, 192, 7, '172', '', '', '', '11', '', 'serbia', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1801, 0, 200, 7, '172', '', '', '', '11', '', 'singapore', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1802, 0, 206, 7, '172', '', '', '', '11', '', 'san-marino', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1803, 0, 232, 7, '172', '', '', '', '11', '', 'ukraine', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1804, 0, 235, 7, '172', '', '', '', '11', '', 'united-states', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1805, 0, 236, 7, '172', '', '', '', '11', '', 'uruguay', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1806, 0, 237, 7, '172', '', '', '', '11', '', 'uzbekistan', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1807, 0, 238, 7, '172', '', '', '', '11', '', 'vatican-city', '', 'armenia-visa-requirement', '2022-10-18 15:27:19'),
(1808, 0, 4, 7, '175', '', '', '', '8,9,12', '', 'antigua-and-barbuda', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1809, 0, 18, 7, '175', '', '', '', '8,9,12', '', 'bosnia-and-herzegovina', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1810, 0, 19, 7, '175', '', '', '', '8,9,12', '', 'barbados', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1811, 0, 24, 7, '175', '', '', '', '8,9,12', '', 'bahrain', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1812, 0, 29, 7, '175', '', '', '', '8,9,12', '', 'brunei', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1813, 0, 30, 7, '175', '', '', '', '8,9,12', '', 'bolivia', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1814, 0, 33, 7, '175', '', '', '', '8,9,12', '', 'bahamas', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1815, 0, 34, 7, '175', '', '', '', '8,9,12', '', 'bhutan', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1816, 0, 38, 7, '175', '', '', '', '8,9,12', '', 'belize', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1817, 0, 39, 7, '175', '', '', '', '8,9,12', '', 'canada', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1818, 0, 47, 7, '175', '', '', '', '8,9,12', '', 'chile', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1819, 0, 50, 7, '175', '', '', '', '8,9,12', '', 'colombia', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1820, 0, 51, 7, '175', '', '', '', '8,9,12', '', 'costa-rica', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1821, 0, 53, 7, '175', '', '', '', '8,9,12', '', 'cuba', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1822, 0, 62, 7, '175', '', '', '', '8,9,12', '', 'dominica', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1823, 0, 63, 7, '175', '', '', '', '8,9,12', '', 'dominican-republic', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1824, 0, 64, 7, '175', '', '', '', '8,9,12', '', 'algeria', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1825, 0, 67, 7, '175', '', '', '', '8,9,12', '', 'egypt', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1826, 0, 73, 7, '175', '', '', '', '8,9,12', '', 'fiji', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1827, 0, 75, 7, '175', '', '', '', '8,9,12', '', 'micronesia', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1828, 0, 80, 7, '175', '', '', '', '8,9,12', '', 'grenada', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1829, 0, 93, 7, '175', '', '', '', '8,9,12', '', 'guatemala', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1830, 0, 96, 7, '175', '', '', '', '8,9,12', '', 'guyana', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1831, 0, 99, 7, '175', '', '', '', '8,9,12', '', 'honduras', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1832, 0, 101, 7, '175', '', '', '', '8,9,12', '', 'haiti', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1833, 0, 103, 7, '175', '', '', '', '8,9,12', '', 'indonesia', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1834, 0, 105, 7, '175', '', '', '', '8,9,12', '', 'israel', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1835, 0, 107, 7, '175', '', '', '', '8,9,12', '', 'india', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1836, 0, 109, 7, '175', '', '', '', '8,9,12', '', 'iraq', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1837, 0, 114, 7, '175', '', '', '', '8,9,12', '', 'jamaica', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1838, 0, 115, 7, '175', '', '', '', '8,9,12', '', 'jordan', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1839, 0, 119, 7, '175', '', '', '', '8,9,12', '', 'cambodia', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1840, 0, 120, 7, '175', '', '', '', '8,9,12', '', 'kiribati', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1841, 0, 123, 7, '175', '', '', '', '8,9,12', '', 'north-korea', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1842, 0, 128, 7, '175', '', '', '', '8,9,12', '', 'laos', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1843, 0, 129, 7, '175', '', '', '', '8,9,12', '', 'lebanon', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1844, 0, 130, 7, '175', '', '', '', '8,9,12', '', 'saint-lucia', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1845, 0, 139, 7, '175', '', '', '', '8,9,12', '', 'morocco', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1846, 0, 145, 7, '175', '', '', '', '8,9,12', '', 'marshall-islands', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1847, 0, 146, 7, '175', '', '', '', '8,9,12', '', 'north-macedonia', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1848, 0, 148, 7, '175', '', '', '', '8,9,12', '', 'myanmar', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1849, 0, 149, 7, '175', '', '', '', '8,9,12', '', 'mongolia', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1850, 0, 157, 7, '175', '', '', '', '8,9,12', '', 'maldives', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1851, 0, 159, 7, '175', '', '', '', '8,9,12', '', 'mexico', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1852, 0, 160, 7, '175', '', '', '', '8,9,12', '', 'malaysia', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1853, 0, 167, 7, '175', '', '', '', '8,9,12', '', 'nicaragua', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1854, 0, 171, 7, '175', '', '', '', '8,9,12', '', 'nauru', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1855, 0, 174, 7, '175', '', '', '', '8,9,12', '', 'oman', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1856, 0, 175, 7, '175', '', '', '', '8,9,12', '', 'panama', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1857, 0, 176, 7, '175', '', '', '', '8,9,12', '', 'peru', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1858, 0, 178, 7, '175', '', '', '', '8,9,12', '', 'papua-new-guinea', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1859, 0, 179, 7, '175', '', '', '', '8,9,12', '', 'philippines', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1860, 0, 187, 7, '175', '', '', '', '8,9,12', '', 'palau', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1861, 0, 188, 7, '175', '', '', '', '8,9,12', '', 'paraguay', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1862, 0, 195, 7, '175', '', '', '', '8,9,12', '', 'saudi-arabia', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1863, 0, 196, 7, '175', '', '', '', '8,9,12', '', 'solomon-islands', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1864, 0, 209, 7, '175', '', '', '', '8,9,12', '', 'suriname', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1865, 0, 212, 7, '175', '', '', '', '8,9,12', '', 'el-salvador', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1866, 0, 220, 7, '175', '', '', '', '8,9,12', '', 'thailand', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1867, 0, 223, 7, '175', '', '', '', '8,9,12', '', 'timor-leste', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1868, 0, 224, 7, '175', '', '', '', '8,9,12', '', 'turkmenistan', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1869, 0, 225, 7, '175', '', '', '', '8,9,12', '', 'tunisia', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1870, 0, 226, 7, '175', '', '', '', '8,9,12', '', 'tonga', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1871, 0, 227, 7, '175', '', '', '', '8,9,12', '', 'turkey', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1872, 0, 228, 7, '175', '', '', '', '8,9,12', '', 'trinidad-and-tobago', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1873, 0, 229, 7, '175', '', '', '', '8,9,12', '', 'tuvalu', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1874, 0, 240, 7, '175', '', '', '', '8,9,12', '', 'venezuela', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1875, 0, 243, 7, '175', '', '', '', '8,9,12', '', 'vietnam', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1876, 0, 244, 7, '175', '', '', '', '8,9,12', '', 'vanuatu', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1877, 0, 246, 7, '175', '', '', '', '8,9,12', '', 'samoa', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1878, 0, 250, 7, '175', '', '', '', '8,9,12', '', 'south-africa', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1879, 0, 257, 7, '175', '', '', '', '8,9,12', '', 'saint-kitts-and-nevis', '', 'armenia-visa-requirement', '2022-10-18 15:43:01'),
(1880, 0, 258, 7, '175', '', '', '', '8,9,12', '', 'saint-vincent-and-the-grenadines', '', 'armenia-visa-requirement', '2022-10-18 15:43:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `role` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0=admin,1=user',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `name`, `email`, `password`, `mobile`, `role`, `date`) VALUES
(1, 'admin', 'admin@gmail.com', '1c34c458701c107a82b8c7a48edfb161', '', '0', '2020-04-06 17:44:32'),
(4, 'sandeep', 'sandeepp@gmail.com', '4297f44b13955235245b2497399d7a93', '9999999999', '0', '2022-04-18 10:27:43'),
(5, 'Sai', 'sai@gmail.com', '4297f44b13955235245b2497399d7a93', '12345', '1', '2022-05-10 05:06:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notes`
--

CREATE TABLE `tbl_notes` (
  `id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `name` text NOT NULL,
  `notes` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notes`
--

INSERT INTO `tbl_notes` (`id`, `type`, `name`, `notes`, `date`) VALUES
(27, 'notes', 'india notes', 'must carry vaccination certificate,must carry covid test', '2022-06-09 09:49:18'),
(28, 'notes', 'Turkey Visa notes 90 days  visa free, 60 days  visa free, 30 days visa free', 'The passport validity requirement does not apply to citizens of Belgium France Luxembourg Portugal Spain and Switzerland who can enter with a passport expired for less than five years.,Citizens of Germany who can enter with a passport or an ID card expired for less than one year.,Citizens of Bulgaria who are only required to have a passport valid for their period of stay.,An identity card is accepted in lieu of a passport for citizens of Azerbaijan Belgium Bulgaria France Georgia Germany Greece Italy Liechtenstein Luxembourg Malta Moldova Netherlands Norway Northern Cyprus Poland Portugal Serbia Spain Switzerland and Ukraine,The validity period requirement also does not apply to nationals of countries whose identity cards are accepted.', '2022-09-01 15:22:40'),
(29, 'notes', 'Turkey Visa notes 90 days  visa free, 60 days  visa free, 30 days visa free for diplomatic passports', 'The passport validity requirement does not apply to citizens of Belgium France Luxembourg Portugal Spain and Switzerland who can enter with a passport expired for less than five years.,Citizens of Germany who can enter with a passport or an ID card expired for less than one year.,Citizens of Bulgaria who are only required to have a passport valid for their period of stay.,An identity card is accepted in lieu of a passport for citizens of Azerbaijan Belgium Bulgaria France Georgia Germany Greece Italy Liechtenstein Luxembourg Malta Moldova Netherlands Norway Northern Cyprus Poland Portugal Serbia Spain Switzerland and Ukraine,The validity period requirement also does not apply to nationals of countries whose identity cards are accepted.,Under reciprocal agreements, holders of diplomatic or service passports or laissez-passers issued by the following jurisdictions are allowed to enter and remain in Turkey for up to 90 days in a 180-day period (unless otherwise noted).', '2022-09-01 15:44:15'),
(30, 'notes', 'Turkey 30 days single entry conditional e-visa', 'you must hold a valid visa or residence permit from one of the following countries- Schengen area countries or Republic of Ireland or the United Kingdom or the United States.,Electronic visas or e-residence permits are not accepted.,Egyptian citizens who are under 20 or over 45 years old do not need to fulfill this requirement.,All citizens except for the citizens of Afghanistan  Bangladesh India Pakistan and Philippines must travel with one of the airlines that has protocols with Turkish Ministry of Foreign Affairs.,The following airlines meet the criteria- Pegasus Airlines and Turkish Airlines.,Citizens of Egypt may also travel on flights operated by EgyptAir.,Must hold a hotel reservation and adequate financial means ($50 per day).,Algerian citizens must be aged below 18 or over 35 years old to be eligible for e-Visa Otherwise a sticker visa is required.', '2022-09-01 16:09:12'),
(31, 'notes', 'test notes for bavin', 'test notes for bavin desciption', '2022-10-07 11:16:17'),
(32, 'notes', 'andorra notes', 'The Andorran government imposes no visa requirements on its visitors and only requires a passport or European Union national identity card for entrance.,However, since the country is only accessible via the Schengen countries of Spain or France, entrance is not possible without entering the Schengen area first and the Schengen visa rules can therefore be regarded to apply.,a multiple entry visa is required to re-enter the Schengen area when leaving Andorra.,Foreign visitors looking to stay in Andorra more than 90 days require a residence permit.,Contact us to get the Schengen visa. we can help you with applying visa.', '2022-10-17 14:18:13'),
(33, 'notes', 'angola e-visa 30 days notes', 'Visitors must first apply for a pre-visa online then After the pre-visa is granted  they can then obtain a visa on arrival at the following designated ports of entry,List of ports:,Quatro de Fevereiro Airport (Luanda),Lubango Airport,Massabi (Republic of the Congo border),Luau (Democratic Republic of the Congo border),Curoca (Namibia border),holders of diplomatic or official passports of the below following countries can also visit Angola without a visa 1-Algeria 2-Mozambique 3-Argentina 4-Portugal 5-Brazil 6-Russia 7-Cape Verde 8-Sao Tome and Principe 9-China 10-South Africa 11-DR Congo 12-South Korea 13-Cuba 14-Spain 15-Egypt 16-Switzerland 17-France 18-Venezuela 19-Guinea-Bissau 20-Vietnam 21-Indonesia 22-Zambia 23-Italy', '2022-10-17 16:11:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_places`
--

CREATE TABLE `tbl_places` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city` varchar(200) NOT NULL,
  `place_name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_process`
--

CREATE TABLE `tbl_process` (
  `id` int(11) NOT NULL,
  `text` longtext NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_process`
--

INSERT INTO `tbl_process` (`id`, `text`, `image`) VALUES
(8, 'Enter Information', 'assets/uploads/apply.jpg'),
(9, 'Do payment', 'assets/uploads/payment.jpg'),
(10, 'Get Visa and Travel', 'assets/uploads/travel.jpg'),
(11, 'Just fly', 'assets/uploads/travel.jpg'),
(12, 'Get E-Visa', 'assets/uploads/evisa-min.jpg'),
(13, 'Get ESTA', 'assets/uploads/esta.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_question`
--

CREATE TABLE `tbl_question` (
  `id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `form_group` varchar(50) NOT NULL,
  `question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userdetail`
--

CREATE TABLE `tbl_userdetail` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(200) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `term_condition`
--

CREATE TABLE `term_condition` (
  `id` int(11) NOT NULL,
  `name` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `term_condition_group`
--

CREATE TABLE `term_condition_group` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `term_condition_id` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `type_of_visa`
--

CREATE TABLE `type_of_visa` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` varchar(50) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `separate_page` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=yes,0=no',
  `required_document` text DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_of_visa`
--

INSERT INTO `type_of_visa` (`id`, `name`, `price`, `notes`, `separate_page`, `required_document`, `date`) VALUES
(127, 'Visting visa', '', '', 0, '', '2022-06-28 06:38:15'),
(128, 'Business visa', '', '', 0, '', '2022-06-28 06:38:21'),
(129, 'Tourist Visa', '', '', 0, '', '2022-08-23 04:42:42'),
(130, 'Visa Free 90 Days', '', '', 0, '', '2022-08-29 13:57:02'),
(131, 'Visa Free 60 Days', '', '', 0, '', '2022-08-29 14:02:09'),
(132, 'Visa Free 30 Days', '', '', 0, '', '2022-08-29 14:02:56'),
(133, 'Visa Free 15 Days', '', '', 0, '', '2022-08-29 14:03:06'),
(134, 'Unlimited Visa Free Travel', '', '', 0, '', '2022-08-29 14:37:16'),
(136, 'Visa-Exempt', '', '', 0, '', '2022-09-01 14:45:10'),
(137, 'e-Visa 30 Days', '', '', 0, '', '2022-09-01 14:45:21'),
(138, 'Visa Free 90 days', '', '', 0, '', '2022-09-01 14:51:24'),
(139, 'Visa Free 60 Days', '', '', 0, '', '2022-09-01 14:58:45'),
(140, 'Visa Free 30 Days', '', '', 0, '', '2022-09-01 14:58:56'),
(141, 'e-Visa 90 Days', '', '', 0, '', '2022-09-01 15:58:57'),
(142, 'Turkey e-Visa', '', '', 0, '', '2022-09-01 16:04:46'),
(147, 'Visa free to all countries', '', '', 0, '', '2022-10-17 14:12:46'),
(149, 'Freedom of movement', '', '', 0, '', '2022-10-17 14:36:57'),
(150, 'Visa Free 180 Days', '', '', 0, '', '2022-10-17 14:39:06'),
(151, 'Visa Free 6 Months', '', '', 0, '', '2022-10-17 14:47:04'),
(152, 'Visa Free 1 Month', '', '', 0, '', '2022-10-17 14:57:22'),
(153, 'ESTA', '', '', 0, '', '2022-10-18 14:59:59'),
(154, 'Visa on Arrival', '', '', 0, '', '2022-10-18 15:26:41'),
(155, 'e-Visa', '', '', 0, '', '2022-10-18 15:33:08');

-- --------------------------------------------------------

--
-- Table structure for table `visagroup`
--

CREATE TABLE `visagroup` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `visa_type` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visagroup`
--

INSERT INTO `visagroup` (`id`, `country_id`, `visa_type`) VALUES
(40, 2, '127,128,129'),
(41, 195, '128,129'),
(42, 174, '127,129'),
(43, 24, '127,129'),
(44, 220, '127,129'),
(45, 200, '127,129'),
(46, 160, '127,129'),
(47, 49, '130,131,132,133'),
(48, 13, '134'),
(49, 21, '134'),
(50, 256, '134'),
(51, 61, '134'),
(52, 66, '134'),
(53, 72, '134'),
(54, 77, '134'),
(55, 59, '134'),
(56, 91, '134'),
(57, 102, '134'),
(58, 111, '134'),
(59, 112, '134'),
(60, 137, '134'),
(61, 131, '134'),
(62, 135, '134'),
(63, 136, '134'),
(64, 155, '134'),
(65, 168, '134'),
(66, 169, '134'),
(67, 181, '134'),
(68, 186, '134'),
(69, 204, '134'),
(70, 202, '134'),
(71, 70, '134'),
(72, 199, '134'),
(73, 44, '134'),
(75, 227, '136,137,138,139,140,141,142'),
(77, 14, '128'),
(79, 63, '130'),
(80, 6, '130,132'),
(81, 1, '147'),
(82, 4, '149,151,152'),
(83, 9, '137'),
(85, 235, '149,153'),
(86, 7, '130,150,154,155');

-- --------------------------------------------------------

--
-- Table structure for table `visapolicy_document`
--

CREATE TABLE `visapolicy_document` (
  `id` int(11) NOT NULL,
  `visapolicy_id` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `visa_type` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `visapolicy_forms`
--

CREATE TABLE `visapolicy_forms` (
  `id` int(11) NOT NULL,
  `visapolicy_id` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `visa_type` int(11) NOT NULL,
  `form_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visapolicy_forms`
--

INSERT INTO `visapolicy_forms` (`id`, `visapolicy_id`, `country`, `visa_type`, `form_id`) VALUES
(1, 205, 107, 120, 25),
(2, 205, 107, 121, 26);

-- --------------------------------------------------------

--
-- Table structure for table `visapolicy_notes`
--

CREATE TABLE `visapolicy_notes` (
  `id` int(11) NOT NULL,
  `visapolicy_id` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `visa_type` int(11) NOT NULL,
  `notes` longtext NOT NULL,
  `extra_notes` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visapolicy_notes`
--

INSERT INTO `visapolicy_notes` (`id`, `visapolicy_id`, `country`, `visa_type`, `notes`, `extra_notes`) VALUES
(1, 965, 224, 152, '28', 'Select Extra Notes'),
(2, 964, 220, 152, '28', 'Select Extra Notes'),
(3, 963, 150, 152, '28', 'Select Extra Notes'),
(4, 962, 149, 152, '28', 'Select Extra Notes'),
(5, 961, 103, 152, '28', 'Select Extra Notes'),
(6, 960, 51, 152, '28', 'Select Extra Notes'),
(7, 959, 37, 152, '28', 'Select Extra Notes'),
(8, 958, 29, 152, '28', 'Select Extra Notes'),
(9, 957, 193, 152, '28', 'Select Extra Notes'),
(10, 956, 140, 152, '28', 'Select Extra Notes'),
(11, 955, 11, 152, '28', 'Select Extra Notes'),
(12, 954, 257, 152, '28', 'Select Extra Notes'),
(13, 953, 256, 152, '28', 'Select Extra Notes'),
(14, 952, 247, 152, '28', 'Select Extra Notes'),
(15, 951, 240, 152, '28', 'Select Extra Notes'),
(16, 950, 238, 152, '28', 'Select Extra Notes'),
(17, 949, 237, 152, '28', 'Select Extra Notes'),
(18, 948, 236, 152, '28', 'Select Extra Notes'),
(19, 947, 232, 152, '28', 'Select Extra Notes'),
(20, 946, 228, 152, '28', 'Select Extra Notes'),
(21, 945, 225, 152, '28', 'Select Extra Notes'),
(22, 944, 221, 152, '28', 'Select Extra Notes'),
(23, 943, 212, 152, '28', 'Select Extra Notes'),
(24, 942, 206, 152, '28', 'Select Extra Notes'),
(25, 941, 204, 152, '28', 'Select Extra Notes'),
(26, 940, 202, 152, '28', 'Select Extra Notes'),
(27, 939, 200, 152, '28', 'Select Extra Notes'),
(28, 938, 199, 152, '28', 'Select Extra Notes'),
(29, 937, 197, 152, '28', 'Select Extra Notes'),
(30, 936, 192, 152, '28', 'Select Extra Notes'),
(31, 935, 191, 152, '28', 'Select Extra Notes'),
(32, 934, 189, 152, '28', 'Select Extra Notes'),
(33, 933, 188, 152, '28', 'Select Extra Notes'),
(34, 932, 186, 152, '28', 'Select Extra Notes'),
(35, 931, 181, 152, '28', 'Select Extra Notes'),
(36, 930, 176, 152, '28', 'Select Extra Notes'),
(37, 929, 175, 152, '28', 'Select Extra Notes'),
(38, 928, 173, 152, '28', 'Select Extra Notes'),
(39, 927, 169, 152, '28', 'Select Extra Notes'),
(40, 926, 168, 152, '28', 'Select Extra Notes'),
(41, 925, 167, 152, '28', 'Select Extra Notes'),
(42, 924, 160, 152, '28', 'Select Extra Notes'),
(43, 923, 155, 152, '28', 'Select Extra Notes'),
(44, 922, 146, 152, '28', 'Select Extra Notes'),
(45, 921, 142, 152, '28', 'Select Extra Notes'),
(46, 920, 141, 152, '28', 'Select Extra Notes'),
(47, 919, 139, 152, '28', 'Select Extra Notes'),
(48, 918, 137, 152, '28', 'Select Extra Notes'),
(49, 917, 136, 152, '28', 'Select Extra Notes'),
(50, 916, 135, 152, '28', 'Select Extra Notes'),
(51, 915, 131, 152, '28', 'Select Extra Notes'),
(52, 914, 129, 152, '28', 'Select Extra Notes'),
(53, 913, 127, 152, '28', 'Select Extra Notes'),
(54, 912, 125, 152, '28', 'Select Extra Notes'),
(55, 911, 124, 152, '28', 'Select Extra Notes'),
(56, 910, 118, 152, '28', 'Select Extra Notes'),
(57, 909, 116, 152, '28', 'Select Extra Notes'),
(58, 908, 115, 152, '28', 'Select Extra Notes'),
(59, 907, 112, 152, '28', 'Select Extra Notes'),
(60, 906, 111, 152, '28', 'Select Extra Notes'),
(61, 905, 110, 152, '28', 'Select Extra Notes'),
(62, 904, 105, 152, '28', 'Select Extra Notes'),
(63, 903, 104, 152, '28', 'Select Extra Notes'),
(64, 902, 102, 152, '28', 'Select Extra Notes'),
(65, 901, 100, 152, '28', 'Select Extra Notes'),
(66, 900, 99, 152, '28', 'Select Extra Notes'),
(67, 899, 97, 152, '28', 'Select Extra Notes'),
(68, 898, 93, 152, '28', 'Select Extra Notes'),
(69, 897, 91, 152, '28', 'Select Extra Notes'),
(70, 896, 81, 152, '28', 'Select Extra Notes'),
(71, 895, 79, 152, '28', 'Select Extra Notes'),
(72, 894, 77, 152, '28', 'Select Extra Notes'),
(73, 893, 72, 152, '28', 'Select Extra Notes'),
(74, 892, 70, 152, '28', 'Select Extra Notes'),
(75, 891, 66, 152, '28', 'Select Extra Notes'),
(76, 890, 65, 152, '28', 'Select Extra Notes'),
(77, 889, 61, 152, '28', 'Select Extra Notes'),
(78, 888, 59, 152, '28', 'Select Extra Notes'),
(79, 887, 50, 152, '28', 'Select Extra Notes'),
(80, 886, 47, 152, '28', 'Select Extra Notes'),
(81, 885, 44, 152, '28', 'Select Extra Notes'),
(82, 884, 38, 152, '28', 'Select Extra Notes'),
(83, 883, 32, 152, '28', 'Select Extra Notes'),
(84, 882, 30, 152, '28', 'Select Extra Notes'),
(85, 881, 23, 152, '28', 'Select Extra Notes'),
(86, 880, 21, 152, '28', 'Select Extra Notes'),
(87, 879, 18, 152, '28', 'Select Extra Notes'),
(88, 878, 17, 152, '28', 'Select Extra Notes'),
(89, 877, 13, 152, '28', 'Select Extra Notes'),
(90, 876, 6, 152, '28', 'Select Extra Notes'),
(91, 875, 1, 152, '28', 'Select Extra Notes'),
(92, 965, 224, 154, '28', 'Select Extra Notes'),
(93, 964, 220, 154, '29', 'Select Extra Notes'),
(94, 963, 150, 154, '28', 'Select Extra Notes'),
(95, 962, 149, 154, '28', 'Select Extra Notes'),
(96, 961, 103, 154, '29', 'Select Extra Notes'),
(97, 960, 51, 154, '28', 'Select Extra Notes'),
(98, 959, 37, 154, '28', 'Select Extra Notes'),
(99, 958, 29, 154, '28', 'Select Extra Notes'),
(100, 957, 193, 153, '28', 'Select Extra Notes'),
(101, 981, 253, 157, '30', 'Select Extra Notes'),
(102, 980, 248, 157, '30', 'Select Extra Notes'),
(103, 979, 243, 157, '30', 'Select Extra Notes'),
(104, 978, 207, 157, '30', 'Select Extra Notes'),
(105, 977, 185, 157, '30', 'Select Extra Notes'),
(106, 976, 180, 157, '30', 'Select Extra Notes'),
(107, 975, 179, 157, '30', 'Select Extra Notes'),
(108, 974, 138, 157, '30', 'Select Extra Notes'),
(109, 973, 132, 157, '30', 'Select Extra Notes'),
(110, 972, 109, 157, '30', 'Select Extra Notes'),
(111, 971, 107, 157, '30', 'Select Extra Notes'),
(112, 970, 90, 157, '30', 'Select Extra Notes'),
(113, 969, 67, 157, '30', 'Select Extra Notes'),
(114, 968, 64, 157, '30', 'Select Extra Notes'),
(115, 967, 20, 157, '30', 'Select Extra Notes'),
(116, 966, 3, 157, '30', 'Select Extra Notes'),
(117, 957, 193, 154, '29', 'Select Extra Notes'),
(118, 956, 140, 154, '29', 'Select Extra Notes'),
(119, 953, 256, 154, '29', 'Select Extra Notes'),
(120, 941, 204, 154, '29', 'Select Extra Notes'),
(121, 940, 202, 154, '29', 'Select Extra Notes'),
(122, 939, 200, 154, '29', 'Select Extra Notes'),
(123, 938, 199, 154, '29', 'Select Extra Notes'),
(124, 935, 191, 154, '29', 'Select Extra Notes'),
(125, 932, 186, 154, '29', 'Select Extra Notes'),
(126, 931, 181, 154, '29', 'Select Extra Notes'),
(127, 927, 169, 154, '29', 'Select Extra Notes'),
(128, 926, 168, 154, '29', 'Select Extra Notes'),
(129, 923, 155, 154, '29', 'Select Extra Notes'),
(130, 918, 137, 154, '29', 'Select Extra Notes'),
(131, 917, 136, 154, '29', 'Select Extra Notes'),
(132, 916, 135, 154, '29', 'Select Extra Notes'),
(133, 915, 131, 154, '29', 'Select Extra Notes'),
(134, 911, 124, 154, '29', 'Select Extra Notes'),
(135, 909, 116, 154, '29', 'Select Extra Notes'),
(136, 907, 112, 154, '29', 'Select Extra Notes'),
(137, 906, 111, 154, '29', 'Select Extra Notes'),
(138, 904, 105, 154, '29', 'Select Extra Notes'),
(139, 903, 104, 154, '29', 'Select Extra Notes'),
(140, 902, 102, 154, '29', 'Select Extra Notes'),
(141, 901, 100, 154, '29', 'Select Extra Notes'),
(142, 897, 91, 154, '29', 'Select Extra Notes'),
(143, 895, 79, 154, '29', 'Select Extra Notes'),
(144, 894, 77, 154, '29', 'Select Extra Notes'),
(145, 893, 72, 154, '29', 'Select Extra Notes'),
(146, 892, 70, 154, '29', 'Select Extra Notes'),
(147, 891, 66, 154, '29', 'Select Extra Notes'),
(148, 889, 61, 154, '29', 'Select Extra Notes'),
(149, 888, 59, 154, '29', 'Select Extra Notes'),
(150, 885, 44, 154, '29', 'Select Extra Notes'),
(151, 883, 32, 154, '29', 'Select Extra Notes'),
(152, 881, 23, 154, '29', 'Select Extra Notes'),
(153, 880, 21, 154, '29', 'Select Extra Notes'),
(154, 878, 17, 154, '29', 'Select Extra Notes'),
(155, 877, 13, 154, '29', 'Select Extra Notes'),
(156, 875, 1, 154, '29', 'Select Extra Notes'),
(157, 1697, 235, 169, '33', 'Select Extra Notes'),
(158, 1700, 240, 169, '33', 'Select Extra Notes'),
(159, 1699, 238, 169, '33', 'Select Extra Notes'),
(160, 1698, 236, 169, '33', 'Select Extra Notes'),
(161, 1696, 223, 169, '33', 'Select Extra Notes'),
(162, 1695, 215, 169, '33', 'Select Extra Notes'),
(163, 1694, 211, 169, '33', 'Select Extra Notes'),
(164, 1693, 193, 169, '33', 'Select Extra Notes'),
(165, 1692, 173, 169, '33', 'Select Extra Notes'),
(166, 1691, 169, 169, '33', 'Select Extra Notes'),
(167, 1690, 144, 169, '33', 'Select Extra Notes'),
(168, 1689, 140, 169, '33', 'Select Extra Notes'),
(169, 1688, 139, 169, '33', 'Select Extra Notes'),
(170, 1687, 134, 169, '33', 'Select Extra Notes'),
(171, 1686, 124, 169, '33', 'Select Extra Notes'),
(172, 1685, 116, 169, '33', 'Select Extra Notes'),
(173, 1684, 111, 169, '33', 'Select Extra Notes'),
(174, 1683, 107, 169, '33', 'Select Extra Notes'),
(175, 1682, 105, 169, '33', 'Select Extra Notes'),
(176, 1681, 103, 169, '33', 'Select Extra Notes'),
(177, 1680, 95, 169, '33', 'Select Extra Notes'),
(178, 1679, 90, 169, '33', 'Select Extra Notes'),
(179, 1678, 79, 169, '33', 'Select Extra Notes'),
(180, 1677, 64, 169, '33', 'Select Extra Notes'),
(181, 1676, 53, 169, '33', 'Select Extra Notes'),
(182, 1675, 49, 169, '33', 'Select Extra Notes'),
(183, 1674, 47, 169, '33', 'Select Extra Notes'),
(184, 1673, 44, 169, '33', 'Select Extra Notes'),
(185, 1672, 39, 169, '33', 'Select Extra Notes'),
(186, 1671, 32, 169, '33', 'Select Extra Notes'),
(187, 1670, 14, 169, '33', 'Select Extra Notes'),
(188, 1669, 11, 169, '33', 'Select Extra Notes'),
(189, 1668, 2, 169, '33', 'Select Extra Notes'),
(190, 1667, 256, 169, '33', 'Select Extra Notes'),
(191, 1666, 204, 169, '33', 'Select Extra Notes'),
(192, 1665, 202, 169, '33', 'Select Extra Notes'),
(193, 1664, 199, 169, '33', 'Select Extra Notes'),
(194, 1663, 191, 169, '33', 'Select Extra Notes'),
(195, 1662, 186, 169, '33', 'Select Extra Notes'),
(196, 1661, 181, 169, '33', 'Select Extra Notes'),
(197, 1660, 168, 169, '33', 'Select Extra Notes'),
(198, 1659, 155, 169, '33', 'Select Extra Notes'),
(199, 1658, 137, 169, '33', 'Select Extra Notes'),
(200, 1657, 136, 169, '33', 'Select Extra Notes'),
(201, 1656, 135, 169, '33', 'Select Extra Notes'),
(202, 1655, 112, 169, '33', 'Select Extra Notes'),
(203, 1654, 104, 169, '33', 'Select Extra Notes'),
(204, 1653, 102, 169, '33', 'Select Extra Notes'),
(205, 1652, 100, 169, '33', 'Select Extra Notes'),
(206, 1651, 91, 169, '33', 'Select Extra Notes'),
(207, 1650, 77, 169, '33', 'Select Extra Notes'),
(208, 1649, 72, 169, '33', 'Select Extra Notes'),
(209, 1648, 70, 169, '33', 'Select Extra Notes'),
(210, 1647, 66, 169, '33', 'Select Extra Notes'),
(211, 1646, 61, 169, '33', 'Select Extra Notes'),
(212, 1645, 59, 169, '33', 'Select Extra Notes'),
(213, 1644, 57, 169, '33', 'Select Extra Notes'),
(214, 1643, 23, 169, '33', 'Select Extra Notes'),
(215, 1642, 21, 169, '33', 'Select Extra Notes'),
(216, 1641, 13, 169, '33', 'Select Extra Notes');

-- --------------------------------------------------------

--
-- Table structure for table `visatypegroup`
--

CREATE TABLE `visatypegroup` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `visatype_id` int(11) NOT NULL,
  `document` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visatypegroup`
--

INSERT INTO `visatypegroup` (`id`, `country_id`, `visatype_id`, `document`) VALUES
(31, 160, 120, '56'),
(32, 160, 121, '56'),
(33, 227, 154, '57'),
(34, 227, 153, '57'),
(35, 227, 152, '57'),
(40, 63, 162, '62'),
(41, 6, 163, '63'),
(42, 1, 164, '64'),
(43, 4, 165, '65'),
(44, 4, 166, '66'),
(45, 4, 167, '67'),
(46, 6, 168, '68'),
(47, 9, 169, '69'),
(48, 235, 170, '70'),
(49, 235, 171, '71'),
(50, 7, 172, '72'),
(51, 7, 173, '73'),
(52, 7, 174, '75'),
(53, 7, 175, '75');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country_visa`
--
ALTER TABLE `country_visa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_group`
--
ALTER TABLE `document_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `embassy`
--
ALTER TABLE `embassy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructions`
--
ALTER TABLE `instructions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `required_document`
--
ALTER TABLE `required_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_attribute_value`
--
ALTER TABLE `tbl_attribute_value`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_country`
--
ALTER TABLE `tbl_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_enquiry`
--
ALTER TABLE `tbl_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_form_attribute`
--
ALTER TABLE `tbl_form_attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_generalinfo`
--
ALTER TABLE `tbl_generalinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notes`
--
ALTER TABLE `tbl_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_places`
--
ALTER TABLE `tbl_places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_process`
--
ALTER TABLE `tbl_process`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_question`
--
ALTER TABLE `tbl_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_userdetail`
--
ALTER TABLE `tbl_userdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `term_condition`
--
ALTER TABLE `term_condition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `term_condition_group`
--
ALTER TABLE `term_condition_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_of_visa`
--
ALTER TABLE `type_of_visa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visagroup`
--
ALTER TABLE `visagroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visapolicy_document`
--
ALTER TABLE `visapolicy_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visapolicy_forms`
--
ALTER TABLE `visapolicy_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visapolicy_notes`
--
ALTER TABLE `visapolicy_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visatypegroup`
--
ALTER TABLE `visatypegroup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country_visa`
--
ALTER TABLE `country_visa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `document_group`
--
ALTER TABLE `document_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `embassy`
--
ALTER TABLE `embassy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `instructions`
--
ALTER TABLE `instructions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `required_document`
--
ALTER TABLE `required_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `tbl_attribute_value`
--
ALTER TABLE `tbl_attribute_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_country`
--
ALTER TABLE `tbl_country`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT for table `tbl_enquiry`
--
ALTER TABLE `tbl_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_form_attribute`
--
ALTER TABLE `tbl_form_attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `tbl_generalinfo`
--
ALTER TABLE `tbl_generalinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1881;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_notes`
--
ALTER TABLE `tbl_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_places`
--
ALTER TABLE `tbl_places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_process`
--
ALTER TABLE `tbl_process`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_question`
--
ALTER TABLE `tbl_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_userdetail`
--
ALTER TABLE `tbl_userdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `term_condition`
--
ALTER TABLE `term_condition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `term_condition_group`
--
ALTER TABLE `term_condition_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type_of_visa`
--
ALTER TABLE `type_of_visa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `visagroup`
--
ALTER TABLE `visagroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `visapolicy_document`
--
ALTER TABLE `visapolicy_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visapolicy_forms`
--
ALTER TABLE `visapolicy_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visapolicy_notes`
--
ALTER TABLE `visapolicy_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `visatypegroup`
--
ALTER TABLE `visatypegroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
