-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 23, 2020 at 02:43 AM
-- Server version: 10.3.23-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cureandca55om_orkit`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_advance`
--

CREATE TABLE `tbl_advance` (
  `Advance_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `service_month_id` int(11) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'a',
  `added_by` int(11) NOT NULL,
  `entry_date` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` date NOT NULL,
  `total_advance` int(11) NOT NULL,
  `total_due` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_advance`
--

INSERT INTO `tbl_advance` (`Advance_id`, `unit_id`, `service_month_id`, `status`, `added_by`, `entry_date`, `updated_by`, `updated_date`, `total_advance`, `total_due`, `description`, `account_number`, `branch_id`) VALUES
(1, 2, 0, 'd', 1, '2020-03-22', 0, '0000-00-00', 4554, 0, 'rrr', NULL, 1),
(2, 2, 0, 'd', 1, '2020-03-23', 0, '0000-00-00', 400, 0, 'hfgg', NULL, 1),
(3, 3, 0, 'd', 1, '2020-03-23', 0, '0000-00-00', 5656, 0, 'sdsd', NULL, 1),
(4, 2, 0, 'd', 1, '2020-03-23', 0, '0000-00-00', 5000, 0, 'gf', NULL, 1),
(5, 2, 0, 'd', 1, '2020-03-23', 0, '0000-00-00', 50000, 0, 'dsd', NULL, 1),
(6, 1, 0, 'a', 1, '2020-03-23', 0, '0000-00-00', 4545, 0, 'ff', NULL, 1),
(7, 6, 0, 'a', 1, '2020-03-01', 0, '0000-00-00', 10000, 0, 'paid', NULL, 2),
(8, 4, 0, 'a', 1, '2020-03-03', 0, '0000-00-00', 10000, 0, 'paid', NULL, 1),
(9, 48, 0, 'a', 10, '2019-12-01', 0, '0000-00-00', 14500, 0, 'PAID', NULL, 4),
(10, 42, 0, 'a', 10, '2020-03-01', 0, '0000-00-00', 14000, 0, 'CASH', NULL, 4),
(11, 44, 0, 'a', 10, '2019-12-01', 0, '0000-00-00', 14000, 0, 'CASH', NULL, 4),
(12, 45, 0, 'a', 10, '2019-12-01', 0, '0000-00-00', 13000, 0, 'CASH', NULL, 4),
(13, 46, 0, 'a', 10, '2019-12-01', 0, '0000-00-00', 15000, 0, 'CASH', NULL, 4),
(14, 47, 0, 'a', 10, '2019-12-01', 0, '0000-00-00', 13500, 0, 'CASH', NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_branch`
--

CREATE TABLE `tbl_branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` text NOT NULL,
  `branch_title` text NOT NULL,
  `branch_address` text NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `entry_date` date NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_branch`
--

INSERT INTO `tbl_branch` (`branch_id`, `branch_name`, `branch_title`, `branch_address`, `added_by`, `updated_by`, `entry_date`, `status`) VALUES
(1, 'Main Branch', 'Main Branch', 'Main Branch', 1, 1, '2020-03-10', 'a'),
(2, 'Sub branch', 'branch', 'dhaka', 1, 0, '2020-03-11', 'a'),
(3, 'ORKIDE SOFIULLAH OWNERS ASSOCITION', 'OSOA', '312, UTTARA, DHAKA-1230.', 1, 0, '2020-03-25', 'a'),
(4, 'ORKIDE SOFIULLAH VILLA ', 'OSV', '312, UTTARA, DHAKA-1230.', 10, 10, '2020-03-28', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_building_expense`
--

CREATE TABLE `tbl_building_expense` (
  `expense_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `taka` int(11) NOT NULL,
  `expense_by` int(11) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'a',
  `branch_id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `account_number` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_building_expense`
--

INSERT INTO `tbl_building_expense` (`expense_id`, `type`, `taka`, `expense_by`, `status`, `branch_id`, `code`, `account_number`, `date`, `description`) VALUES
(1, 1, 3444, 1, 'd', 1, 'A00001', NULL, '2020-03-15', 'as'),
(2, 2, 342323, 1, 'd', 1, 'A00002', NULL, '2020-03-15', 'asas'),
(3, 1, 43333, 1, 'a', 1, 'A00003', '2323', '2020-03-15', 'sds'),
(4, 2, 5000, 1, 'a', 1, 'A00004', NULL, '2020-03-15', 'ssss'),
(5, 1, 54545, 1, 'a', 1, 'A00005', NULL, '2020-03-15', 'gfgfg'),
(6, 1, 54545, 1, 'a', 1, 'A00006', NULL, '2020-03-15', 'gfgfg'),
(7, 1, 54545, 1, 'a', 1, 'A00007', NULL, '2020-03-15', 'gfgfg'),
(8, 2, 5000, 1, 'a', 1, 'A00008', NULL, '2020-03-15', 'ererer'),
(9, 2, 4545, 1, 'a', 1, 'A00009', NULL, '2020-03-15', 'dsdsd'),
(10, 2, 5656, 1, 'a', 1, 'A00010', NULL, '2020-03-15', 'rfggg'),
(11, 2, 4545, 1, 'a', 1, 'A00011', NULL, '2020-03-15', 'dfdf'),
(12, 1, 5000, 1, 'a', 1, 'A00012', NULL, '2020-03-15', 'dfdfd'),
(13, 1, 5000, 1, 'a', 1, 'A00013', NULL, '2020-03-15', 'dfdfd'),
(14, 2, 50000, 1, 'a', 1, 'A00014', NULL, '2020-03-15', 'rtrtrt'),
(15, 2, 50000, 1, 'a', 1, 'A00015', NULL, '2020-03-15', 'rtrtrt'),
(16, 2, 50000, 1, 'a', 1, 'A00016', NULL, '2020-03-15', 'rtrtrt'),
(17, 2, 433434, 1, 'a', 1, 'A00017', '232323', '2020-03-15', 'rrrrer'),
(18, 2, 433434, 1, 'a', 1, 'A00018', '232323', '2020-03-15', 'rrrrer'),
(19, 1, 34, 1, 'a', 1, 'A00019', NULL, '2020-03-16', 'dsds'),
(20, 1, 55, 1, 'a', 1, 'A00020', NULL, '2020-03-16', 'ff'),
(21, 2, 55, 1, 'a', 1, 'A00021', NULL, '2020-03-16', 'ff'),
(22, 1, 34, 1, 'a', 1, 'A00022', NULL, '2020-03-18', 'as'),
(23, 1, 400, 1, 'a', 1, 'A00023', NULL, '2020-03-19', 'sdd'),
(24, 1, 400, 1, 'a', 1, 'A00024', NULL, '2020-03-19', 'sdd'),
(25, 3, 4000, 1, 'a', 1, 'A00025', NULL, '2020-03-19', 'fgfg'),
(26, 3, 4000, 1, 'a', 1, 'A00026', NULL, '2020-03-19', 'fgfg'),
(27, 1, 45, 1, 'a', 1, 'A00027', NULL, '2020-03-19', 'sdd'),
(28, 2, 5000, 1, 'a', 1, 'A00028', NULL, '2020-03-19', 'der'),
(29, 2, 4545, 1, 'a', 1, 'A00029', '67567', '2020-03-17', 'ere'),
(30, 1, 54, 1, 'a', 1, 'A00030', NULL, '2020-03-18', 'erfe'),
(31, 1, 343434, 1, 'a', 1, 'A00031', NULL, '2020-03-19', 'wewe'),
(32, 1, 343434, 1, 'a', 1, 'A00032', NULL, '2020-03-19', 'wewe'),
(33, 2, 4000, 1, 'a', 1, 'A00033', NULL, '2020-03-19', 'sdsd'),
(34, 2, 4545, 1, 'a', 1, 'A00034', NULL, '2020-03-19', 'rtrt'),
(35, 1, 4500, 1, 'a', 1, 'A00035', NULL, '2020-03-19', ' dfdf'),
(36, 1, 4500, 1, 'a', 1, 'A00036', NULL, '2020-03-19', ' dfdf'),
(37, 1, 4500, 1, 'a', 1, 'A00037', NULL, '2020-03-19', ' dfdf'),
(38, 1, 4545, 1, 'a', 1, 'A00038', NULL, '2020-03-18', 'dsds'),
(39, 2, 43343434, 1, 'd', 1, 'A00039', NULL, '2020-03-18', 'sdsd'),
(40, 2, 454, 1, 'a', 1, 'A00039', NULL, '2020-03-22', 'sdsd'),
(41, 3, 500000, 1, 'a', 1, 'A00041', NULL, '2020-03-22', 'jj'),
(42, 3, 5000, 1, 'a', 1, 'A00042', NULL, '2020-03-23', 'sdsd'),
(43, 2, 5545, 1, 'a', 1, 'A00043', NULL, '2020-03-23', 'sds'),
(44, 3, 500, 1, 'a', 1, 'A00044', NULL, '2020-03-23', 'dsdd');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_building_inf`
--

CREATE TABLE `tbl_building_inf` (
  `id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `house_name` varchar(255) NOT NULL,
  `house_description` varchar(255) NOT NULL,
  `road_number` varchar(255) NOT NULL,
  `village_name` text NOT NULL,
  `word_no` varchar(255) NOT NULL,
  `poster_code` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_building_inf`
--

INSERT INTO `tbl_building_inf` (`id`, `unit_id`, `bill_id`, `house_name`, `house_description`, `road_number`, `village_name`, `word_no`, `poster_code`, `branch_id`) VALUES
(1, 0, 0, 'ORKIDE SOFIULLAH VILLA OWNERS ASSOCIATION', '<p>&nbsp;</p>\r\n\r\n<p>HOUSE NO # 312, HAZI ISMAIL DEWAN ROAD, POST OFFICE : AZAMPUR,</p>\r\n\r\n<p>POLLICE STATION : DAKSHAIN KHAN, WARD NO 50, DHAKA - 1230.</p>\r\n', 'HAZI ISMAIL DEWAN ROAD', 'AZAMPUR', '50', 1230, 1),
(2, 0, 0, 'অর্কিড শফিউল্লাহ ভিলা মালিক সমিতি', '<p>অর্কিড শফিউল্লাহ ভিলা মালিক সমিতি</p>\r\n', '22', 'as', '23', 1012, 2),
(3, 0, 0, 'ORKIDE SOFIULLAH VILLA OWNERS ASSOCIATION', '<p>HOUSE NO # 312, HAZI ISMAIL DEWAN ROAD, POST OFFICE : AZAMPUR,</p>\r\n\r\n<p>POLLICE STATION : DAKSHAIN KHAN, WARD NO 50, DHAKA - 1230.</p>\r\n\r\n<p>PHONE NO : 01712634851, 017123757802.</p>\r\n', 'HAZI ISMAIL DEWAN ROAD', 'AZAMPUR', '50', 1230, 3),
(4, 0, 0, 'ORKIDE SOFIULLAH VILLA ', '<p>HOUSE NO # 312, HAZI ISMAIL DEWAN ROAD, POST OFFICE : AZAMPUR,</p>\r\n\r\n<p>POLLICE STATION : DAKSHAIN KHAN, WARD NO 50, DHAKA - 1230.</p>\r\n', 'HAZI ISMAIL DEWAN ROAD', 'AZAMPUR', '50', 1230, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expense_type`
--

CREATE TABLE `tbl_expense_type` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `expense_name` text NOT NULL,
  `added_by` int(11) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'a',
  `branch_id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_expense_type`
--

INSERT INTO `tbl_expense_type` (`id`, `code`, `expense_name`, `added_by`, `status`, `branch_id`, `description`) VALUES
(1, 'A00001', 'House color', 1, 'a', 1, 'House color'),
(2, 'A00002', 'House ', 1, 'a', 1, ''),
(3, 'A00003', 'hello', 1, 'a', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_floor`
--

CREATE TABLE `tbl_floor` (
  `id` int(11) NOT NULL,
  `floor_name` varchar(255) NOT NULL,
  `active` varchar(1) NOT NULL DEFAULT 'a',
  `added_by` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_floor`
--

INSERT INTO `tbl_floor` (`id`, `floor_name`, `active`, `added_by`, `branch_id`) VALUES
(1, '1st floors', 'a', 1, 1),
(2, '2nd floors', 'a', 1, 1),
(4, '1st floors', 'a', 1, 2),
(5, 'GROUND FLOORS', 'a', 10, 3),
(6, '1 ST FLOORS', 'a', 10, 3),
(7, '2 ND FLOORS', 'a', 10, 3),
(8, '3 RD FLOORS', 'a', 10, 3),
(9, '4 TH FLOORS', 'a', 10, 3),
(10, '5 TH FLOORS', 'a', 10, 3),
(11, '6 TH FLOORS', 'a', 10, 3),
(12, 'GROUND FLOORES', 'a', 10, 4),
(13, '2 ND FLOORS', 'a', 10, 4),
(14, '4 TH FLOORS', 'a', 10, 4),
(15, '6 TH FLOORS', 'a', 10, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_members`
--

CREATE TABLE `tbl_members` (
  `id` int(11) NOT NULL,
  `resident_id` int(11) NOT NULL,
  `fld_name` varchar(100) NOT NULL,
  `fld_age` varchar(3) NOT NULL,
  `fld_relation` varchar(20) NOT NULL,
  `fld_profession` text NOT NULL,
  `phone_number` int(20) NOT NULL,
  `fld_nid` int(20) NOT NULL,
  `Branch_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_members`
--

INSERT INTO `tbl_members` (`id`, `resident_id`, `fld_name`, `fld_age`, `fld_relation`, `fld_profession`, `phone_number`, `fld_nid`, `Branch_id`) VALUES
(1, 1, 'dfdf', 'fdf', 'fdsf', 'erer', 5454, 4545, 0),
(2, 2, 'asas', '343', 'we', 'asa', 3434, 34, 0),
(3, 3, 'sdsas', '454', 'erer', 'asas', 5445, 43434, 0),
(4, 4, 'sdsds', '434', 'sdsd', 'sdsd', 434, 34434, 0),
(5, 5, 'dsas', '343', 'asas', 'asasa', 3434, 343, 0),
(6, 6, 'dfdf', '54', 'rtrt', 'dfd', 4545, 45, 0),
(7, 7, 'sdd', 'sds', 'dsds', 'sdsd', 0, 0, 0),
(8, 8, 'sdsd', '323', 'sas', 'sdsd', 3423, 5454, 0),
(9, 9, 'asaa', 'asa', 'asas', 'asas', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_month_entry`
--

CREATE TABLE `tbl_month_entry` (
  `id` int(11) NOT NULL,
  `month_name` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'a',
  `year` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_month_entry`
--

INSERT INTO `tbl_month_entry` (`id`, `month_name`, `status`, `year`, `branch_id`) VALUES
(1, 'January-2020', 'a', 0, 1),
(2, 'February-2020', 'a', 0, 1),
(3, 'March-2020', 'a', 0, 1),
(4, 'April-2020', 'a', 0, 1),
(5, 'May-2020', 'a', 0, 1),
(6, 'Jun-2020', 'a', 0, 1),
(7, 'July-2020', 'a', 0, 1),
(8, 'January-2020', 'a', 0, 2),
(9, 'February-2020', 'a', 0, 2),
(10, 'March-2020', 'a', 0, 2),
(11, 'JANUARY - 2020', 'a', 0, 3),
(12, 'FEBRUARY - 2020', 'a', 0, 3),
(13, 'MARCH - 2020', 'a', 0, 3),
(14, 'APRIL - 2020', 'a', 0, 3),
(15, 'MAY - 2020', 'a', 0, 3),
(16, 'JUN - 2020', 'a', 0, 3),
(17, 'JANUARY - 2020', 'a', 0, 4),
(18, 'FEBRUARY - 2020', 'a', 0, 4),
(19, 'FEBRUARY - 2020', 'd', 0, 4),
(20, 'MARCH - 2020', 'a', 0, 4),
(21, 'APRIL - 2020', 'a', 0, 4),
(22, 'MAY - 2020', 'a', 0, 4),
(23, 'JUN - 2020', 'a', 0, 4),
(24, 'august-2020 ', 'a', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_name`
--

CREATE TABLE `tbl_name` (
  `id` int(11) NOT NULL,
  `month_name` varchar(60) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rent_transaction`
--

CREATE TABLE `tbl_rent_transaction` (
  `id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `resident_id` int(11) NOT NULL,
  `rent_amount` int(11) NOT NULL,
  `fld_garage` int(11) NOT NULL,
  `fld_others` int(11) NOT NULL,
  `fld_total` int(11) NOT NULL,
  `paid_amount` int(11) DEFAULT NULL,
  `due_amount` int(11) DEFAULT NULL,
  `fld_status` varchar(1) NOT NULL,
  `collection_date` date DEFAULT NULL,
  `fld_generate_by` int(11) NOT NULL,
  `generate_date` date DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `collection_by` int(11) NOT NULL,
  `service_month_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `account_number` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_rent_transaction`
--

INSERT INTO `tbl_rent_transaction` (`id`, `unit_id`, `resident_id`, `rent_amount`, `fld_garage`, `fld_others`, `fld_total`, `paid_amount`, `due_amount`, `fld_status`, `collection_date`, `fld_generate_by`, `generate_date`, `created_by`, `collection_by`, `service_month_id`, `branch_id`, `description`, `account_number`) VALUES
(1, 2, 0, 5000, 500, 700, 6200, 6000, -200, 'a', '2020-03-21', 1, '2020-03-10', 0, 1, 1, 1, 'dsds', '1212'),
(3, 2, 0, 5000, 500, 700, 6200, NULL, 250, 'a', '2020-03-15', 0, '2020-03-15', 1, 1, 2, 1, '', NULL),
(4, 3, 0, 600, 600, 600, 1800, NULL, NULL, 'a', NULL, 0, '2020-03-15', 1, 0, 3, 1, '', NULL),
(5, 4, 0, 6000, 0, 0, 6000, 42000, 36000, 'a', '2020-03-22', 1, '2020-03-22', 0, 1, 3, 1, NULL, NULL),
(6, 3, 0, 600, 600, 600, 1800, 1890, 90, 'a', '2020-03-23', 0, '2020-03-23', 1, 1, 4, 1, 'asas', NULL),
(7, 4, 0, 6000, 0, 0, 6000, 0, -6000, 'a', '2020-03-23', 0, '2020-03-23', 1, 1, 4, 1, 'sas', NULL),
(8, 5, 0, 500, 0, 0, 500, NULL, NULL, 'p', NULL, 1, '2020-03-23', 0, 0, 4, 1, NULL, NULL),
(9, 3, 0, 600, 600, 600, 1800, 545, -1255, 'a', '2020-03-23', 0, '2020-03-23', 1, 1, 5, 1, 'ddfd', NULL),
(10, 4, 0, 6000, 0, 0, 6000, 0, -6000, 'a', '2020-03-23', 0, '2020-03-23', 1, 1, 5, 1, NULL, NULL),
(11, 3, 0, 600, 600, 600, 1800, 3000, 1200, 'a', '2020-03-24', 0, '2020-03-23', 1, 1, 7, 1, 'asas', NULL),
(12, 4, 0, 6000, 0, 0, 6000, 10000, 4000, 'a', '2020-03-24', 0, '2020-03-23', 1, 1, 7, 1, NULL, NULL),
(13, 6, 0, 500, 0, 0, 500, 500, 0, 'a', '2020-03-24', 8, '2020-03-24', 0, 8, 8, 2, 'Rent', NULL),
(14, 7, 0, 500, 0, 0, 500, NULL, NULL, 'p', NULL, 8, '2020-03-24', 0, 0, 8, 2, NULL, NULL),
(15, 6, 0, 500, 0, 0, 500, 500, 0, 'a', '2020-03-24', 0, '2020-03-24', 8, 8, 9, 2, 'dffd', '2323232'),
(16, 6, 0, 300, 0, 0, 300, 300, 0, 'a', '2020-03-24', 0, '2020-03-24', 8, 8, 10, 2, 'asa', NULL),
(17, 6, 0, 300, 0, 0, 300, NULL, NULL, 'p', NULL, 0, '2020-03-24', 1, 0, 20, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resident`
--

CREATE TABLE `tbl_resident` (
  `id` int(11) NOT NULL,
  `unit_id` int(255) NOT NULL,
  `generate_date` date DEFAULT NULL,
  `fld_image` text DEFAULT NULL,
  `resident_name` varchar(100) DEFAULT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `village` text DEFAULT NULL,
  `marital_status` varchar(6) DEFAULT NULL,
  `police_station` text NOT NULL,
  `district` text NOT NULL,
  `work_address` text NOT NULL,
  `religion` text NOT NULL,
  `educational_qualifications` text NOT NULL,
  `mobile_number` int(15) NOT NULL,
  `national_id_number` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `passport_number` varchar(255) DEFAULT NULL,
  `emergency_name` varchar(255) DEFAULT NULL,
  `emergency_relationships` varchar(255) DEFAULT NULL,
  `emergency_address` varchar(255) DEFAULT NULL,
  `emergency_number` int(15) DEFAULT NULL,
  `housekeeper_name` varchar(100) DEFAULT NULL,
  `housekeeper_national_id` varchar(20) DEFAULT NULL,
  `housekeeper_number` int(15) DEFAULT NULL,
  `housekeeper_address` text DEFAULT NULL,
  `driver_name` text DEFAULT NULL,
  `driver_nid_number` varchar(255) DEFAULT NULL,
  `driver_address` text DEFAULT NULL,
  `driver_number` int(15) DEFAULT NULL,
  `previous_landlord_name` varchar(255) DEFAULT NULL,
  `previous_landlord_number` int(15) DEFAULT NULL,
  `previous_landlord_address` text DEFAULT NULL,
  `reasons_to_leave_previous_home` varchar(255) DEFAULT NULL,
  `current_landlord_name` varchar(255) DEFAULT NULL,
  `current_landlord_number` int(15) DEFAULT NULL,
  `living_date_current_home` date DEFAULT NULL,
  `security_guard_name` varchar(255) DEFAULT NULL,
  `security_guard_nid_number` varchar(255) DEFAULT NULL,
  `security_guard_number` int(15) DEFAULT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'a',
  `security_guard_address` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `create_date` date NOT NULL,
  `resident_type` int(11) DEFAULT NULL,
  `signature_one` text DEFAULT NULL,
  `signature_two` text DEFAULT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_resident`
--

INSERT INTO `tbl_resident` (`id`, `unit_id`, `generate_date`, `fld_image`, `resident_name`, `father_name`, `date_of_birth`, `village`, `marital_status`, `police_station`, `district`, `work_address`, `religion`, `educational_qualifications`, `mobile_number`, `national_id_number`, `email`, `passport_number`, `emergency_name`, `emergency_relationships`, `emergency_address`, `emergency_number`, `housekeeper_name`, `housekeeper_national_id`, `housekeeper_number`, `housekeeper_address`, `driver_name`, `driver_nid_number`, `driver_address`, `driver_number`, `previous_landlord_name`, `previous_landlord_number`, `previous_landlord_address`, `reasons_to_leave_previous_home`, `current_landlord_name`, `current_landlord_number`, `living_date_current_home`, `security_guard_name`, `security_guard_nid_number`, `security_guard_number`, `status`, `security_guard_address`, `created_by`, `create_date`, `resident_type`, `signature_one`, `signature_two`, `branch_id`) VALUES
(2, 3, '2020-03-11', '32654.jpg', 'xssdads', 'sdsdsd', '0000-00-00', 'sdsd', 'sdsds', 'sds', 'dsd', 'ds', 'sdsd', 'dsdsdss', 454, '3434434', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a', NULL, 1, '0000-00-00', 1, '17327.', NULL, 1),
(3, 2, '2020-03-11', '1524.jpg', 'sds', 'sdds', '0000-00-00', 'dsddsd', 'dsdsds', 'sdsdsd', 'sdsdsds', 'dsdsdsd', 'sdsds', 'sdsd', 3434, '43443', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a', NULL, 1, '0000-00-00', 2, '4381.', NULL, 1),
(4, 3, '2020-03-11', '20370.jpg', 'asas', 'asas', '0000-00-00', 'asas', 'asas', 'as', 'asas', 'asas', 'asas', 'asas', 322, '232323', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'd', NULL, 1, '0000-00-00', 1, '3427.jpg', NULL, 1),
(5, 2, '2020-03-11', '3424.jpg', 'asdaas', 'asas', '0000-00-00', 'asas', 'asas', 'asas', 'asas', 'asa', 'asas', 'asas', 3434, '34533434', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a', NULL, 1, '0000-00-00', 1, '8729.', NULL, 1),
(6, 2, '2020-03-11', '14973.jpg', 'sdsds', 'ssdsd', '0000-00-00', 'dsdsd', 'ssdsds', 'sdsd', 'sdsd', 'sdsd', 'sdsd', 'sdsd', 4545, '5656', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a', NULL, 1, '0000-00-00', 1, '11634.', NULL, 1),
(7, 2, '2020-03-11', '21135.', 'sdsds', 'dsdsdsd', '0000-00-00', 'sdsd', 'dsdsd', 'sdsds', 'sdsssds', 'sdsds', 'dfdf', 'dfff', 343434, '435545', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'd', NULL, 1, '0000-00-00', 1, '26908.', NULL, 1),
(8, 1, '2020-03-11', '17859.jpg', 'zsdsds', 'sdsd', '0000-00-00', 'sdsds', 'dsdsd', 'dsdsds', 'dsdsd', 'sdsdsds', 'sds', 'dsdsd', 4544, '564665', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a', NULL, 1, '0000-00-00', 1, '20032.', NULL, 1),
(9, 6, '2020-03-24', '6113.jpg', 'Ashikur', 'Ataur', '0000-00-00', 'asas', 'unmeri', 'asas', 'saas', 'as', 'islam', 'sas', 34334334, '3433343', 'asas@asa', '3434', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'a', NULL, 8, '0000-00-00', 1, '26886.jpg', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service_transaction`
--

CREATE TABLE `tbl_service_transaction` (
  `id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `resident_id` int(11) NOT NULL,
  `service_month_id` int(11) NOT NULL,
  `generate_by` int(11) NOT NULL,
  `generate_date` date NOT NULL,
  `owner_fund` decimal(10,2) NOT NULL,
  `security_generator` decimal(10,2) NOT NULL,
  `electricity_amount` decimal(10,2) NOT NULL,
  `gas_amount` decimal(10,2) NOT NULL,
  `water_amount` decimal(10,2) NOT NULL,
  `police_cleaners` decimal(10,2) NOT NULL,
  `common_service` decimal(10,2) NOT NULL,
  `fld_others` decimal(10,2) NOT NULL,
  `fld_total` decimal(15,2) NOT NULL,
  `due_amount` int(11) DEFAULT NULL,
  `fld_status` varchar(1) NOT NULL,
  `paid_amount` int(11) DEFAULT NULL,
  `collected_by` int(11) DEFAULT NULL,
  `collection_date` date DEFAULT NULL,
  `Branch_id` int(11) NOT NULL,
  `code` varchar(20) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `account_number` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_service_transaction`
--

INSERT INTO `tbl_service_transaction` (`id`, `unit_id`, `resident_id`, `service_month_id`, `generate_by`, `generate_date`, `owner_fund`, `security_generator`, `electricity_amount`, `gas_amount`, `water_amount`, `police_cleaners`, `common_service`, `fld_others`, `fld_total`, `due_amount`, `fld_status`, `paid_amount`, `collected_by`, `collection_date`, `Branch_id`, `code`, `description`, `account_number`) VALUES
(1, 1, 1, 1, 1, '2020-03-10', 500.00, 232.00, 356.00, 566.00, 200.00, 565.00, 400.00, 232.00, 3051.00, NULL, 'a', NULL, 1, '2020-03-14', 1, NULL, NULL, NULL),
(2, 3, 1, 1, 1, '2020-03-11', 500.00, 232.00, 356.00, 566.00, 200.00, 565.00, 400.00, 565.00, 3384.00, -1616, 'a', 5000, 1, '2020-03-21', 1, NULL, NULL, NULL),
(3, 1, 1, 3, 1, '2020-03-15', 500.00, 232.00, 356.00, 566.00, 200.00, 565.00, 400.00, 232.00, 3551.00, 449, 'a', 4000, 1, '2020-03-21', 1, NULL, NULL, NULL),
(4, 3, 1, 3, 1, '2020-03-15', 500.00, 232.00, 356.00, 566.00, 200.00, 565.00, 400.00, 565.00, 3884.00, NULL, 'a', 400, 1, '2020-03-21', 1, NULL, NULL, NULL),
(5, 1, 1, 2, 1, '2020-03-22', 500.00, 232.00, 356.00, 566.00, 200.00, 565.00, 400.00, 232.00, 3551.00, -1, 'a', 3550, 1, '2020-03-22', 1, NULL, NULL, NULL),
(6, 3, 1, 2, 1, '2020-03-22', 500.00, 232.00, 356.00, 566.00, 200.00, 565.00, 400.00, 565.00, 3884.00, 0, 'a', 3884, 1, '2020-03-22', 1, NULL, 'asas', NULL),
(7, 1, 1, 4, 1, '2020-03-22', 500.00, 232.00, 356.00, 566.00, 200.00, 565.00, 400.00, 232.00, 3551.00, -551, 'a', 3000, 1, '2020-03-23', 1, NULL, 'bill', '12'),
(8, 3, 1, 4, 1, '2020-03-22', 500.00, 232.00, 356.00, 566.00, 200.00, 565.00, 400.00, 565.00, 3884.00, 116, 'a', 4000, 1, '2020-03-23', 1, NULL, 'rf', NULL),
(9, 1, 1, 5, 1, '2020-03-23', 500.00, 232.00, 356.00, 566.00, 200.00, 565.00, 400.00, 232.00, 3551.00, 449, 'a', 4000, 1, '2020-03-23', 1, NULL, NULL, NULL),
(10, 3, 1, 5, 1, '2020-03-23', 500.00, 232.00, 356.00, 566.00, 200.00, 565.00, 400.00, 565.00, 3884.00, 1116, 'a', 5000, 1, '2020-03-23', 1, NULL, 'sdsd', NULL),
(11, 1, 1, 6, 1, '2020-03-23', 500.00, 232.00, 356.00, 566.00, 200.00, 565.00, 400.00, 232.00, 3551.00, 1449, 'a', 5000, 1, '2020-03-23', 1, NULL, 'fefdf', NULL),
(12, 3, 1, 6, 1, '2020-03-23', 500.00, 232.00, 356.00, 566.00, 200.00, 565.00, 400.00, 565.00, 3884.00, 1116, 'a', 5000, 1, '2020-03-23', 1, NULL, 'sdsd', NULL),
(13, 1, 1, 7, 1, '2020-03-23', 500.00, 232.00, 356.00, 566.00, 200.00, 565.00, 400.00, 232.00, 3551.00, -3551, 'a', 0, 1, '2020-03-23', 1, NULL, 'asaas', NULL),
(14, 3, 1, 7, 1, '2020-03-23', 500.00, 232.00, 356.00, 566.00, 200.00, 565.00, 400.00, 565.00, 3884.00, 116, 'a', 4000, 1, '2020-03-23', 1, NULL, 'asaas', NULL),
(15, 6, 2, 8, 8, '2020-03-24', 500.00, 500.00, 500.00, 500.00, 500.00, 500.00, 500.00, 500.00, 4000.00, 0, 'a', 4000, 8, '2020-03-24', 2, NULL, 'Service', NULL),
(16, 6, 2, 9, 8, '2020-03-24', 200.00, 200.00, 200.00, 200.00, 200.00, 200.00, 200.00, 200.00, 1800.00, 0, 'a', 1800, 8, '2020-03-24', 2, NULL, 'Service', NULL),
(17, 6, 2, 10, 8, '2020-03-24', 200.00, 200.00, 200.00, 200.00, 200.00, 200.00, 200.00, 200.00, 1800.00, -100, 'a', 1700, 8, '2020-03-24', 2, NULL, 'sdsds', NULL),
(18, 10, 2, 11, 10, '2020-03-25', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3700.00, 0.00, 3700.00, 0, 'a', 3700, 10, '2020-03-25', 3, NULL, 'paid', NULL),
(19, 10, 2, 12, 10, '2020-03-25', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3700.00, 0.00, 3700.00, NULL, 'p', NULL, NULL, NULL, 3, NULL, NULL, NULL),
(20, 10, 2, 13, 10, '2020-03-28', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3700.00, 28700.00, 32400.00, NULL, 'p', NULL, NULL, NULL, 3, NULL, NULL, NULL),
(21, 36, 2, 17, 8, '2020-06-14', 1000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1000.00, NULL, 'p', NULL, NULL, NULL, 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_unit`
--

CREATE TABLE `tbl_unit` (
  `id` int(11) NOT NULL,
  `floor_id` int(11) NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `ownar_name` varchar(60) DEFAULT NULL,
  `fathers_name` varchar(60) DEFAULT NULL,
  `fld_address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `fld_email` varchar(60) DEFAULT NULL,
  `entry_date` date NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'a',
  `added_by` int(2) NOT NULL,
  `update_by` int(11) NOT NULL,
  `update_date` int(11) NOT NULL,
  `fld_status` varchar(1) NOT NULL,
  `Branch_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_unit`
--

INSERT INTO `tbl_unit` (`id`, `floor_id`, `unit_name`, `ownar_name`, `fathers_name`, `fld_address`, `phone_number`, `fld_email`, `entry_date`, `status`, `added_by`, `update_by`, `update_date`, `fld_status`, `Branch_id`) VALUES
(1, 1, 'A-101', 'Ashik Rahman', 'Ataur Rahman', 'Gazipur', '01516762466', 'a@gmail.com', '2020-03-10', 'a', 1, 0, 0, '', 1),
(2, 1, 'A-102', 'Shohan', 'Shohan', 'Borisal', '0122221', 'borisal@gmail.com', '2020-03-10', 'a', 1, 0, 0, '', 1),
(3, 1, 'A-101', 'Ashik Rahman', 'Ataur Rahman', 'Gazipur', '01516762466', 'a@gmail.com', '2020-03-10', 'd', 1, 0, 0, '', 1),
(4, 1, 'A-3', 'Peters', 'frank', 'uk', '01615142', 'uk@gmail.com', '2020-03-22', 'a', 1, 0, 0, '', 1),
(6, 4, 'A111', 'as', 'as', 'as', '121', 'as@as', '2020-03-24', 'a', 8, 0, 0, '', 2),
(8, 1, 'A-103', 'Ashik Rahman', 'Ataur Rahman', 'Gazipur', '01516762466', 'a@gmail.com', '2020-03-24', 'a', 8, 0, 0, '', 1),
(9, 6, 'A 201', 'NAJMA', 'MD ', '312, UTTARA', '12345', 'a@gmail.com', '2020-03-25', 'd', 10, 0, 0, '', 3),
(10, 6, 'A - 201', 'NAJMA', 'MD ', '312, UTTARA', '12345', 'a@gmail.com', '2020-03-25', 'a', 10, 0, 0, '', 3),
(11, 6, 'B - 202', 'ROKUNZAMAN', 'MD ', '312, UTTARA', '12345', 'b@gmail.com', '2020-03-25', 'a', 10, 0, 0, '', 3),
(12, 6, 'C - 203', 'SAIFUL', 'MD ', '312, UTTARA', '12345', 'c@gmail.com', '2020-03-25', 'a', 10, 0, 0, '', 3),
(13, 6, 'A - 301', 'MD SOFIULLAH', 'MD ', '312, UTTARA', '12345', 'd@gmail.com', '2020-03-25', 'd', 10, 0, 0, '', 3),
(14, 7, 'A - 301', 'MD SOFIULLAH', 'MD ', '312, UTTARA', '12345', 'd@gmail.com', '2020-03-25', 'a', 10, 0, 0, '', 3),
(15, 7, 'B - 303', 'MD SOFIULLAH', 'MD ', '312, UTTARA', '12345', 'e@gmail.com', '2020-03-25', 'd', 10, 0, 0, '', 3),
(16, 8, 'A - 401', 'MD TOWHIDUL', 'MD ', '312, UTTARA', '12345', 'e@gmail.com', '2020-03-25', 'a', 10, 0, 0, '', 3),
(17, 8, 'A - 301', 'MD AZIZ', 'MD ', '312, UTTARA', '12345', 'f@gmail.com', '2020-03-25', 'd', 10, 0, 0, '', 3),
(18, 8, 'B - 301', 'MD AZIZ', 'MD ', '312, UTTARA', '12345', 'f@gmail.com', '2020-03-25', 'd', 10, 0, 0, '', 3),
(19, 8, 'B - 402', 'MD AZIZ', 'MD ', '312, UTTARA', '12345', 'f@gmail.com', '2020-03-25', 'a', 10, 0, 0, '', 3),
(20, 8, 'C - 403', 'MD JOSIM', 'MD ', '312, UTTARA', '12345', 'g@gmail.com', '2020-03-25', 'a', 10, 0, 0, '', 3),
(21, 9, 'A - 501', 'MD SOFIULLAH', 'MD ', '312, UTTARA', '12345', 'h@gmail.com', '2020-03-25', 'a', 10, 0, 0, '', 3),
(22, 6, 'B - 502', 'MD SOFIULLAH', 'MD ', '312, UTTARA', '12345', 'i@gmail.com', '2020-03-25', 'd', 10, 0, 0, '', 3),
(23, 9, 'C - 503', 'MD SOFIULLAH', 'MD ', '312, UTTARA', '12345', 'j@gmail.com', '2020-03-25', 'd', 10, 0, 0, '', 3),
(24, 9, 'B - 502', 'MD SOFIULLAH', 'MD ', '312, UTTARA', '12345', 'i@gmail.com', '2020-03-25', 'a', 10, 0, 0, '', 3),
(25, 11, 'A - 701', 'MD SOFIULLAH', 'MD ', '312, UTTARA', '12345', 'k@gmail.com', '2020-03-25', 'a', 10, 0, 0, '', 3),
(26, 11, 'B - 702', 'MD SOFIULLAH', 'MD ', '312, UTTARA', '12345', 'l@gmail.com', '2020-03-25', 'a', 10, 0, 0, '', 3),
(27, 11, 'C - 703', 'MD SOFIULLAH', 'MD ', '312, UTTARA', '12345', 'l@gmail.com', '2020-03-25', 'a', 10, 0, 0, '', 3),
(28, 10, 'A - 601', 'AZHARUL', 'MD ', '312, UTTARA', '12345', 'm@gmail.com', '2020-03-25', 'a', 10, 0, 0, '', 3),
(29, 10, 'B - 602', 'ZISAN', 'MD ', '312, UTTARA', '12345', 'n@gmail.com', '2020-03-25', 'a', 10, 0, 0, '', 3),
(30, 10, 'C - 603', 'FIROZ', 'MD ', '312, UTTARA', '12345', 'o@gmail.com', '2020-03-25', 'a', 10, 0, 0, '', 3),
(31, 7, 'C - 303', 'MD SOFIULLAH', 'MD ', '312, UTTARA', '12345', 'e@gmail.com', '2020-03-25', 'a', 10, 0, 0, '', 3),
(32, 9, 'C - 503', 'MD SOFIULLAH', 'MD ', '312, UTTARA', '12345', 'j@gmail.com', '2020-03-25', 'a', 10, 0, 0, '', 3),
(33, 12, 'CAR PARKING 1', 'MD SOFIULLAH', 'MR . SULTAN', '312, UTTARA, DHAKA', '12345', 'a@gmail.com', '2020-03-28', 'd', 10, 0, 0, '', 4),
(34, 12, 'CAR PARKING 1  (HAYDER ALI)', 'MD SOFIULLAH', 'MR . SULTAN', '312, UTTARA, DHAKA', '12345', 'b@gmail.com', '2020-03-28', 'd', 10, 0, 0, '', 4),
(35, 12, 'CAR PARKING 1 (RUBEL)', 'MD SOFIULLAH', 'MR . SULTAN', '312, UTTARA, DHAKA', '12345', 'a@gmail.com', '2020-03-28', 'd', 10, 0, 0, '', 4),
(36, 12, 'CAR PARKING 2 ( MEHDI HASAN)', 'MD SOFIULLAH', 'MR . SULTAN', '312, UTTARA, DHAKA', '12345', 'a@gmail.com', '2020-03-28', 'a', 10, 0, 0, '', 4),
(37, 12, 'CAR PARKING 2 ( TAREK HASAN))', 'MD SOFIULLAH', 'MR . SULTAN', '312, UTTARA, DHAKA', '12345', 'a@gmail.com', '2020-03-28', 'd', 10, 0, 0, '', 4),
(38, 12, 'CAR PARKING 4  (HAYDER ALI)', 'MD SOFIULLAH', 'MR . SULTAN', '312, UTTARA, DHAKA', '12345', 'b@gmail.com', '2020-03-28', 'a', 10, 0, 0, '', 4),
(39, 12, 'CAR PARKING 4 ( TAREK HASAN))', 'MD SOFIULLAH', 'MR . SULTAN', '312, UTTARA, DHAKA', '12345', 'a@gmail.com', '2020-03-28', 'a', 10, 0, 0, '', 4),
(40, 12, 'CAR PARKING 8 (RUBEL)', 'MD SOFIULLAH', 'MR . SULTAN', '312, UTTARA, DHAKA', '12345', 'a@gmail.com', '2020-03-28', 'a', 10, 0, 0, '', 4),
(41, 12, 'C - 303', 'MD SOFIULLAH', 'MR . SULTAN', '312, UTTARA, DHAKA', '12345', 'a@gmail.com', '2020-03-28', 'd', 10, 0, 0, '', 4),
(42, 14, 'A - 501', 'MD SOFIULLAH', 'MR . SULTAN', '312, UTTARA, DHAKA', '12345', 'a@gmail.com', '2020-03-28', 'a', 10, 0, 0, '', 4),
(43, 14, 'B - 502', 'MD SOFIULLAH', 'MR . SULTAN', '312, UTTARA, DHAKA', '12345', 'a@gmail.com', '2020-03-28', 'a', 10, 0, 0, '', 4),
(44, 14, 'C - 503', 'MD SOFIULLAH', 'MR . SULTAN', '312, UTTARA, DHAKA', '12345', 'a@gmail.com', '2020-03-28', 'a', 10, 0, 0, '', 4),
(45, 15, 'A - 701', 'MD SOFIULLAH', 'MR . SULTAN', '312, UTTARA, DHAKA', '12345', 'a@gmail.com', '2020-03-28', 'a', 10, 0, 0, '', 4),
(46, 15, 'B - 702', 'MD SOFIULLAH', 'MR . SULTAN', '312, UTTARA, DHAKA', '12345', 'a@gmail.com', '2020-03-28', 'a', 10, 0, 0, '', 4),
(47, 15, 'C - 703', 'MD SOFIULLAH', 'MR . SULTAN', '312, UTTARA, DHAKA', '12345', 'a@gmail.com', '2020-03-28', 'a', 10, 0, 0, '', 4),
(48, 13, 'C - 303', 'MD SOFIULLAH', 'MR . SULTAN', '312, UTTARA, DHAKA', '12345', 'a@gmail.com', '2020-03-28', 'a', 10, 0, 0, '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT 'a',
  `type` varchar(2) NOT NULL DEFAULT 'a',
  `added_by` int(11) NOT NULL,
  `menu_name` text DEFAULT NULL,
  `Branch_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `user_name`, `email`, `password`, `status`, `type`, `added_by`, `menu_name`, `Branch_id`) VALUES
(1, 'admin', 'b@gmail.com', '202cb962ac59075b964b07152d234b70', 'a', 'a', 0, 'ranter_register,all_renter_list,unit_bill_entry,bill_entry,Service_collection,Report_collection,User_access,branch_access,Cash_transaction,floor_entry,unit_entry', 1),
(2, 'admin1', 'a@gmail.com', '202cb962ac59075b964b07152d234b70', 'd', 'u', 1, 'User_access,branch_access,month_entry,house_info,unit_entry,floor_entry,Report_collection,Service_collection,unit_bill_entry,bill_entry,all_renter_list,ranter_register', 2),
(8, 'ashik', 'as@gmail.com', '202cb962ac59075b964b07152d234b70', 'a', 'u', 1, 'ranter_register,service,all_renter_list,unit_bill_entry,bill_entry,User_access,Service_collection,Cash_transaction,floor_entry,unit_entry,house_info,month_entry,branch_access,Report_collection,expense_report,advance,all_expense_report', 1),
(9, 'admin', 'admin@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'a', 'u', 1, 'Report_collection,expense_report,service,all_expense_report,advance,branch_access,month_entry,house_info,unit_entry,floor_entry,Cash_transaction,Service_collection,ranter_register,all_renter_list,unit_bill_entry,bill_entry,User_access', 2),
(10, 'ORKIDE SOFIULLAH VILLA OWNERS ASSOCITION', 'osoa@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'a', 'u', 1, 'ranter_register,all_renter_list,unit_bill_entry,bill_entry,Service_collection,Cash_transaction,floor_entry,unit_entry,house_info,month_entry,branch_access,Report_collection,expense_report,advance,all_expense_report,service', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_advance`
--
ALTER TABLE `tbl_advance`
  ADD PRIMARY KEY (`Advance_id`);

--
-- Indexes for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `tbl_building_expense`
--
ALTER TABLE `tbl_building_expense`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `tbl_building_inf`
--
ALTER TABLE `tbl_building_inf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_expense_type`
--
ALTER TABLE `tbl_expense_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_floor`
--
ALTER TABLE `tbl_floor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_members`
--
ALTER TABLE `tbl_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_month_entry`
--
ALTER TABLE `tbl_month_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_name`
--
ALTER TABLE `tbl_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_rent_transaction`
--
ALTER TABLE `tbl_rent_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_resident`
--
ALTER TABLE `tbl_resident`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_service_transaction`
--
ALTER TABLE `tbl_service_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_advance`
--
ALTER TABLE `tbl_advance`
  MODIFY `Advance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_branch`
--
ALTER TABLE `tbl_branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_building_expense`
--
ALTER TABLE `tbl_building_expense`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_building_inf`
--
ALTER TABLE `tbl_building_inf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_expense_type`
--
ALTER TABLE `tbl_expense_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_floor`
--
ALTER TABLE `tbl_floor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_members`
--
ALTER TABLE `tbl_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_month_entry`
--
ALTER TABLE `tbl_month_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_name`
--
ALTER TABLE `tbl_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_rent_transaction`
--
ALTER TABLE `tbl_rent_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_resident`
--
ALTER TABLE `tbl_resident`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_service_transaction`
--
ALTER TABLE `tbl_service_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_unit`
--
ALTER TABLE `tbl_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
