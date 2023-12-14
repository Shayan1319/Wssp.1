-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 09:02 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_wssc`
--

-- --------------------------------------------------------

--
-- Table structure for table `allowances`
--

CREATE TABLE `allowances` (
  `id` int(11) NOT NULL,
  `allowance` varchar(255) DEFAULT NULL,
  `fin_classification` varchar(255) DEFAULT NULL,
  `rate_calc_mode` varchar(255) DEFAULT NULL,
  `earning_deduction_fund` varchar(255) DEFAULT NULL,
  `allowance_status` varchar(255) DEFAULT NULL,
  `price` int(255) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `allowances`
--

INSERT INTO `allowances` (`id`, `allowance`, `fin_classification`, `rate_calc_mode`, `earning_deduction_fund`, `allowance_status`, `price`) VALUES
(1, 'SAERY', 'GROSS PAY', 'PRESENT RATE', 'EARNING', 'ACTIVE', 1),
(2, 'OFFPAY', 'GROSS PAY', 'OFF PAY', 'DEDUCTION', 'ACTIVE', 1),
(3, 'OVERTIME', 'GROSS PAY', 'OVERTIME', 'EARNING', 'ACTIVE', 800),
(4, 'DOUBLEDUTY', 'GROSS PAY', 'DOUBLE DUTY', 'EARNING', 'ACTIVE', 1600),
(5, 'FULE', 'GROSS PAY', 'PREVAILING RATE', 'EARNING', 'ACTIVE', 280),
(6, 'PENTION', 'EOBI-ER', 'PRESENT RATE', 'EARNING', 'ACTIVE', 1),
(7, 'EID', 'GROSS PAY', 'PRESENT RATE', 'EARNING', 'ACTIVE', 1),
(8, 'DEDUCTION', 'GROSS PAY', 'PRESENT RATE', 'DEDUCTION', 'ACTIVE', 1),
(9, 'HOUSERENT', 'GROSS PAY', 'PRESENT RATE', 'EARNING', 'ACTIVE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `allowancesrateupdate`
--

CREATE TABLE `allowancesrateupdate` (
  `ID` int(255) NOT NULL,
  `timeperiod` int(255) NOT NULL,
  `discription` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `allownce_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `allowancesrateupdate`
--

INSERT INTO `allowancesrateupdate` (`ID`, `timeperiod`, `discription`, `price`, `allownce_id`) VALUES
(1, 3, '', 270, 5),
(2, 3, 'FULE', 270, 5),
(3, 1, 'FULE', 280, 5);

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Q1` text NOT NULL,
  `ceodata` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `Subject`, `Q1`, `ceodata`) VALUES
(1, 'Subject', '', '2023-12-10'),
(2, 'test 2', '', '2023-12-10'),
(3, 'Test', '', '2023-12-10');

-- --------------------------------------------------------

--
-- Table structure for table `atandece`
--

CREATE TABLE `atandece` (
  `id` int(11) NOT NULL,
  `Employeeid` int(11) DEFAULT NULL,
  `Shift` varchar(255) DEFAULT NULL,
  `Tehsil` varchar(255) DEFAULT NULL,
  `Area` varchar(255) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `DDorOT` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `ManagerStatus` varchar(255) NOT NULL DEFAULT 'PENDING',
  `ManagerStatusDate` date DEFAULT NULL,
  `GMStatus` varchar(255) NOT NULL DEFAULT 'PENDING',
  `GMStatusData` date DEFAULT NULL,
  `PayrollStatus` varchar(255) NOT NULL DEFAULT 'PENDING',
  `PayrollStatusDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `atandece`
--

INSERT INTO `atandece` (`id`, `Employeeid`, `Shift`, `Tehsil`, `Area`, `Date`, `DDorOT`, `status`, `ManagerStatus`, `ManagerStatusDate`, `GMStatus`, `GMStatusData`, `PayrollStatus`, `PayrollStatusDate`) VALUES
(1, 100003, NULL, NULL, NULL, '2023-11-10', 'OVERTIME', NULL, 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27'),
(2, 100004, NULL, NULL, NULL, '2023-11-11', NULL, 'ABSENT', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27'),
(3, 100003, NULL, NULL, NULL, '2023-12-09', NULL, 'ABSENT', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02'),
(4, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-11-01', NULL, 'PTESENT', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27'),
(5, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-11-02', NULL, 'PTESENT', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27'),
(6, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-11-03', NULL, 'PTESENT', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27'),
(7, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-11-04', NULL, 'PTESENT', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27'),
(8, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-11-06', 'DOUBLE DUTY', 'PTESENT', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27'),
(9, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-11-07', 'DOUBLE DUTY', 'PTESENT', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27'),
(10, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-11-08', 'DOUBLE DUTY', 'PTESENT', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27'),
(11, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-11-09', 'DOUBLE DUTY', 'PTESENT', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27'),
(12, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-11-10', NULL, 'PTESENT', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27'),
(13, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-11-11', NULL, 'PTESENT', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27'),
(14, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-11-13', NULL, 'PTESENT', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27'),
(15, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-11-14', 'OVERTIME', 'PTESENT', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27'),
(16, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-11-15', 'OVERTIME', 'PTESENT', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27'),
(17, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-11-16', 'OVERTIME', 'PTESENT', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27'),
(18, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-11-17', NULL, 'PTESENT', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27'),
(19, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-11-18', NULL, 'ABSENT', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27'),
(20, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-11-20', NULL, 'ABSENT', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27'),
(21, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-11-21', NULL, 'PTESENT', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27'),
(22, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-11-22', NULL, 'PTESENT', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27'),
(23, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-11-23', NULL, 'PTESENT', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27'),
(24, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-11-24', NULL, 'PTESENT', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27'),
(25, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-11-25', NULL, 'PTESENT', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27'),
(26, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-11-27', NULL, 'PTESENT', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27'),
(27, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-11-28', NULL, 'PTESENT', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27'),
(28, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-11-29', NULL, 'PTESENT', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27'),
(29, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-11-30', NULL, 'PTESENT', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27', 'ACCEPT', '2023-11-27'),
(30, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-12-01', 'DOUBLE DUTY', 'PTESENT', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02'),
(31, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-12-02', 'DOUBLE DUTY', 'PTESENT', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02'),
(32, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-12-04', 'OVERTIME', 'PTESENT', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02'),
(33, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-12-05', 'OVERTIME', 'PTESENT', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02'),
(34, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-12-06', 'OVERTIME', 'PTESENT', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02'),
(35, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-12-07', NULL, 'ABSENT', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02'),
(36, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-12-08', NULL, 'ABSENT', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02'),
(37, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-12-09', NULL, 'PTESENT', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02'),
(38, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-12-11', NULL, 'PTESENT', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02'),
(39, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-12-12', NULL, 'PTESENT', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02'),
(40, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-12-13', NULL, 'PTESENT', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02'),
(41, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-12-14', NULL, 'PTESENT', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02'),
(42, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-12-15', NULL, 'PTESENT', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02'),
(43, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-12-16', NULL, 'PTESENT', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02'),
(44, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-12-18', NULL, 'PTESENT', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02'),
(45, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-12-18', NULL, 'PTESENT', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02'),
(46, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-12-20', NULL, 'PTESENT', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02'),
(47, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-12-21', NULL, 'PTESENT', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02'),
(48, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-12-22', NULL, 'PTESENT', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02'),
(49, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-12-23', NULL, 'PTESENT', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02'),
(50, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-12-25', NULL, 'PTESENT', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02'),
(51, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-12-26', NULL, 'PTESENT', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02'),
(52, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-12-27', NULL, 'PTESENT', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02'),
(53, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-12-28', NULL, 'PTESENT', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02'),
(54, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-12-29', NULL, 'PTESENT', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02'),
(55, 100005, 'Morning', 'Lahore', 'Jehangira', '2023-12-30', NULL, 'PTESENT', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02', 'ACCEPT', '2023-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `child`
--

CREATE TABLE `child` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `CNIC` varchar(15) DEFAULT NULL,
  `Date_of_B` date DEFAULT NULL,
  `MouterCNIC` varchar(15) NOT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `child`
--

INSERT INTO `child` (`id`, `Name`, `CNIC`, `Date_of_B`, `MouterCNIC`, `Gender`, `Status`) VALUES
(1, 'XYZ', '34567', '2023-10-10', '123456', 'MALE', 'PENDING'),
(2, 'SON', '1231', '2023-10-02', '2323', 'MALE', 'PENDING'),
(3, 'DOUG', '', '2023-10-02', '2323', 'FEMALE', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `earning_deduction_fund`
--

CREATE TABLE `earning_deduction_fund` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `fund` decimal(10,2) DEFAULT NULL,
  `gross_pay` decimal(10,2) DEFAULT NULL,
  `deduction` decimal(10,2) DEFAULT NULL,
  `net_pay` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `earning_deduction_fund`
--

INSERT INTO `earning_deduction_fund` (`id`, `employee_id`, `fund`, `gross_pay`, `deduction`, `net_pay`) VALUES
(1, 8, 0.00, 50500.00, 0.00, 50500.00);

-- --------------------------------------------------------

--
-- Table structure for table `employeedata`
--

CREATE TABLE `employeedata` (
  `Id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `fName` varchar(255) DEFAULT NULL,
  `mName` varchar(255) DEFAULT NULL,
  `lName` varchar(255) DEFAULT NULL,
  `father_Name` varchar(255) DEFAULT NULL,
  `CNIC` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pAddress` varchar(255) DEFAULT NULL,
  `cAddress` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postAddress` varchar(255) DEFAULT NULL,
  `mNumber` varchar(15) DEFAULT NULL,
  `ofphNumber` varchar(15) DEFAULT NULL,
  `Alternate_Number` varchar(15) DEFAULT NULL,
  `DofB` date DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `BlGroup` varchar(5) DEFAULT NULL,
  `Domicile` varchar(255) DEFAULT NULL,
  `MaritalStatus` varchar(255) DEFAULT NULL,
  `NextofKin` varchar(255) DEFAULT NULL,
  `NextofKinCellNumber` varchar(15) DEFAULT NULL,
  `ContactPerson` varchar(255) DEFAULT NULL,
  `CPCN` varchar(15) DEFAULT NULL,
  `Employement_Group` varchar(255) DEFAULT NULL,
  `Employee_Class` varchar(255) DEFAULT NULL,
  `Employee_Group` varchar(255) DEFAULT NULL,
  `Employee_Sub_Group` varchar(255) DEFAULT NULL,
  `Employee_Quota` varchar(255) DEFAULT NULL,
  `Salary_Bank` varchar(255) DEFAULT NULL,
  `Salary_Branch` varchar(255) DEFAULT NULL,
  `Account_No` varchar(255) DEFAULT NULL,
  `Pay_Type` varchar(255) DEFAULT NULL,
  `EOBI_No` varchar(255) DEFAULT NULL,
  `Bill_Walved_Off` varchar(255) DEFAULT NULL,
  `Weekly_Working_Days` int(11) DEFAULT NULL,
  `Bill_Waived_Off` varchar(255) DEFAULT NULL,
  `Employee_Pay_Classification` varchar(255) DEFAULT NULL,
  `Grade` varchar(255) DEFAULT NULL,
  `Department` varchar(255) DEFAULT NULL,
  `Job_Tiltle` varchar(255) DEFAULT NULL,
  `Salary_Mode` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `EmployeeNo` int(11) DEFAULT NULL,
  `Employee_Manager` int(11) DEFAULT NULL,
  `Joining_Date` date DEFAULT NULL,
  `Contract_Expiry_Date` date DEFAULT NULL,
  `Last_Working_Date` date DEFAULT NULL,
  `Attendance_Supervisor` int(11) DEFAULT NULL,
  `Duty_Location` varchar(255) DEFAULT NULL,
  `Duty_Point` varchar(255) DEFAULT NULL,
  `Online Status` varchar(255) DEFAULT 'PENDING',
  `type` varchar(255) DEFAULT NULL,
  `DY_Supervisor` varchar(255) DEFAULT NULL,
  `leaveAlreadyAvailed` int(255) NOT NULL DEFAULT 34
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employeedata`
--

INSERT INTO `employeedata` (`Id`, `image`, `fName`, `mName`, `lName`, `father_Name`, `CNIC`, `email`, `pAddress`, `cAddress`, `city`, `postAddress`, `mNumber`, `ofphNumber`, `Alternate_Number`, `DofB`, `religion`, `gender`, `BlGroup`, `Domicile`, `MaritalStatus`, `NextofKin`, `NextofKinCellNumber`, `ContactPerson`, `CPCN`, `Employement_Group`, `Employee_Class`, `Employee_Group`, `Employee_Sub_Group`, `Employee_Quota`, `Salary_Bank`, `Salary_Branch`, `Account_No`, `Pay_Type`, `EOBI_No`, `Bill_Walved_Off`, `Weekly_Working_Days`, `Bill_Waived_Off`, `Employee_Pay_Classification`, `Grade`, `Department`, `Job_Tiltle`, `Salary_Mode`, `Status`, `EmployeeNo`, `Employee_Manager`, `Joining_Date`, `Contract_Expiry_Date`, `Last_Working_Date`, `Attendance_Supervisor`, `Duty_Location`, `Duty_Point`, `Online Status`, `type`, `DY_Supervisor`, `leaveAlreadyAvailed`) VALUES
(1, '', 'Admin', 'Wssc', '-', '-', '12345', 'admin@wssc.com', '-', '-', '-', '-', '-', '-', '-', '2023-09-05', '-', 'Male', '-', '-', 'Unmarried', '-', '-', '-', '-', 'WSSC - ADMIN PAY', 'WSSC PAY', 'WSSC - COMMERCIAL', '', 'DECEASED SON', '-', '-', '-', '-', '-', '-', 6, '-', '-', '', 'ADMINISTRATION', 'CHIEF EXECUTIVE OFFICER', 'BANK TRANSFER', 'CONTRACT EXP', 100001, 100006, '2023-10-10', '2023-10-10', '2023-10-31', 100004, '-', '-', 'ACCPET', '', '', 34),
(2, '', 'Emp1', 'name', '-', '-', '123455431', 'email@email.com', '-', '-', '-', '-', '-', '-', '-', '2023-09-07', '-', 'Male', '-', '-', ' Unmarried', '-', '-', '-', '-', 'WSSC - ADMIN PAY', 'TMA PAY', 'WSSC - COMMERCIAL', 'TMA - ADMIN - PERMANENT PAY', 'DECEASED SON', '-', '-', '-', '-', '-', '-', 5, '-', '-', '', 'ADMINISTRATION', 'CHIEF EXECUTIVE OFFICER', 'BANK TRANSFER', 'CONTRACT EXP', 100002, 100006, '2023-09-30', '2023-10-27', '2023-10-27', NULL, '-', '-', 'ACCPET', '', '100003', 34),
(6, '', '', '', '', '', '123', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 'WSSC CONTRACTUAL', 'Wssc Pay', 'WSSCS-ADMIN PAY', 'WSSCS-ADMIN-CONTINGENT PAY', 'DECEASED SON', '', '', '', '', '', '', 6, '', '', 'CONTINGENT', 'ADMINISTRATION', 'CHIEF EXECUTIVE OFFICER', 'BANK TRANSFER', 'ON-DUTY', 100003, 100006, '0000-00-00', '0000-00-00', '0000-00-00', 100004, '', '', 'ACCPET', 'DY_MANAGER', '', 34),
(7, '', 'kjsdfj', 'lksjdfklj', 'lkjadsklfj', '', '2131243', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', 'Wssc Pay', 'WSSCS-ADMIN PAY', 'WSSCS-ADMIN-CONTINGENT PAY', 'DECEASED SON', '', '', '', '', '', '', 6, '', '', 'CONTINGENT', 'ADMINISTRATION', 'CHIEF EXECUTIVE OFFICER', 'BANK TRANSFER', 'ON-DUTY', 100004, 100006, '0000-00-00', '0000-00-00', '0000-00-00', NULL, '', '', 'ACCPET', 'SUPERVISO', '', 34),
(8, '1.png', 'Shayan', 'Khan', 'Kurtlar', 'Riayat Khan', '41234235', 'kurtlar1215225@gmail.com', '-', '-', '-', '-', '-', '-', '-', '2023-09-24', '-', 'Mail', '-', '-', ' Unmarried', '-', '-', '-', '-', 'WSSC - ADMIN PAY', 'WSSC PAY ', '', 'TMA - ADMIN - PERMANENT PAY', 'DECEASED SON', '12345', '-', '-', '-', '-', '-', 5, '-', '-', 'M-1', 'COMMERCIAL', 'MANAGER SOLID WASTE', 'CHEQUE', 'ON-DUTY', 100005, 100006, '2023-09-24', '2023-10-20', '2023-10-26', 100004, '-', '-', 'ACCPET', 'FINANCE', '100003', 34),
(9, 'apple-touch-icon.png', 'Shayan', 'Khan', 'kurtlar', 'Riayat Khan', '1234235', 'kurtlar1215225@gmail.com', '-', '-', '-', '-', '-', '-', '-', '2023-10-03', '-', 'Mail', '-', '-', ' Unmarried', '-', '-', '-', '-', 'WSSC - ADMIN PAY', 'TMA PAY', '', 'TMA - ADMIN - PERMANENT PAY', 'DECEASED SON', '-', '-', '-', '-', '-', '-', 6, '-', '-', 'M-1', 'COMMERCIAL', 'MANAGER SOLID WASTE', 'CHEQUE', 'ON-DUTY', 100006, 100002, '2023-10-02', '2023-10-28', '2023-10-25', NULL, '-', '-', 'ACCPET', 'MANAGER', '100003', 34);

-- --------------------------------------------------------

--
-- Table structure for table `employeedataupdate`
--

CREATE TABLE `employeedataupdate` (
  `Id` int(11) NOT NULL,
  `IdUpdate` int(11) NOT NULL,
  `imageUpdate` varchar(255) DEFAULT NULL,
  `fNameUpdate` varchar(255) DEFAULT NULL,
  `mNameUpdate` varchar(255) DEFAULT NULL,
  `lNameUpdate` varchar(255) DEFAULT NULL,
  `father_NameUpdate` varchar(255) DEFAULT NULL,
  `CNICUpdate` varchar(15) DEFAULT NULL,
  `emailUpdate` varchar(255) DEFAULT NULL,
  `pAddressUpdate` varchar(255) DEFAULT NULL,
  `cAddressUpdate` varchar(255) DEFAULT NULL,
  `cityUpdate` varchar(255) DEFAULT NULL,
  `postAddressUpdate` varchar(255) DEFAULT NULL,
  `mNumberUpdate` varchar(15) DEFAULT NULL,
  `ofphNumberUpdate` varchar(15) DEFAULT NULL,
  `Alternate_NumberUpdate` varchar(15) DEFAULT NULL,
  `DofBUpdate` date DEFAULT NULL,
  `religionUpdate` varchar(255) DEFAULT NULL,
  `genderUpdate` varchar(10) DEFAULT NULL,
  `BlGroupUpdate` varchar(5) DEFAULT NULL,
  `DomicileUpdate` varchar(255) DEFAULT NULL,
  `MaritalStatusUpdate` varchar(255) DEFAULT NULL,
  `NextofKinUpdate` varchar(255) DEFAULT NULL,
  `NextofKinCellNumberUpdate` varchar(15) DEFAULT NULL,
  `ContactPersonUpdate` varchar(255) DEFAULT NULL,
  `CPCNUpdate` varchar(15) DEFAULT NULL,
  `Employement_GroupUpdate` varchar(255) DEFAULT NULL,
  `Employee_ClassUpdate` varchar(255) DEFAULT NULL,
  `Employee_GroupUpdate` varchar(255) DEFAULT NULL,
  `Employee_Sub_GroupUpdate` varchar(255) DEFAULT NULL,
  `Employee_QuotaUpdate` varchar(255) DEFAULT NULL,
  `Salary_BankUpdate` varchar(255) DEFAULT NULL,
  `Salary_BranchUpdate` varchar(255) DEFAULT NULL,
  `Account_NoUpdate` varchar(255) DEFAULT NULL,
  `Pay_TypeUpdate` varchar(255) DEFAULT NULL,
  `EOBI_NoUpdate` varchar(255) DEFAULT NULL,
  `Bill_Walved_OffUpdate` varchar(255) DEFAULT NULL,
  `Weekly_Working_DaysUpdate` int(11) DEFAULT NULL,
  `Bill_Waived_OffUpdate` varchar(255) DEFAULT NULL,
  `Employee_Pay_ClassificationUpdate` varchar(255) DEFAULT NULL,
  `GradeUpdate` varchar(255) DEFAULT NULL,
  `DepartmentUpdate` varchar(255) DEFAULT NULL,
  `Job_TiltleUpdate` varchar(255) DEFAULT NULL,
  `Salary_ModeUpdate` varchar(255) DEFAULT NULL,
  `StatusUpdate` varchar(255) DEFAULT NULL,
  `EmployeeNoUpdate` int(11) DEFAULT NULL,
  `Employee_ManagerUpdate` int(11) DEFAULT NULL,
  `Joining_DateUpdate` date DEFAULT NULL,
  `Contract_Expiry_DateUpdate` date DEFAULT NULL,
  `Last_Working_DateUpdate` date DEFAULT NULL,
  `Attendance_SupervisorUpdate` int(11) DEFAULT NULL,
  `Duty_LocationUpdate` varchar(255) DEFAULT NULL,
  `Duty_PointUpdate` varchar(255) DEFAULT NULL,
  `OnlineUpdate Status` varchar(255) DEFAULT 'PENDING',
  `typeUpdate` varchar(255) DEFAULT NULL,
  `DY_SupervisorUpdate` varchar(255) DEFAULT NULL,
  `leaveAlreadyAvailedUpdate` int(255) NOT NULL DEFAULT 34
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employeedataupdate`
--

INSERT INTO `employeedataupdate` (`Id`, `IdUpdate`, `imageUpdate`, `fNameUpdate`, `mNameUpdate`, `lNameUpdate`, `father_NameUpdate`, `CNICUpdate`, `emailUpdate`, `pAddressUpdate`, `cAddressUpdate`, `cityUpdate`, `postAddressUpdate`, `mNumberUpdate`, `ofphNumberUpdate`, `Alternate_NumberUpdate`, `DofBUpdate`, `religionUpdate`, `genderUpdate`, `BlGroupUpdate`, `DomicileUpdate`, `MaritalStatusUpdate`, `NextofKinUpdate`, `NextofKinCellNumberUpdate`, `ContactPersonUpdate`, `CPCNUpdate`, `Employement_GroupUpdate`, `Employee_ClassUpdate`, `Employee_GroupUpdate`, `Employee_Sub_GroupUpdate`, `Employee_QuotaUpdate`, `Salary_BankUpdate`, `Salary_BranchUpdate`, `Account_NoUpdate`, `Pay_TypeUpdate`, `EOBI_NoUpdate`, `Bill_Walved_OffUpdate`, `Weekly_Working_DaysUpdate`, `Bill_Waived_OffUpdate`, `Employee_Pay_ClassificationUpdate`, `GradeUpdate`, `DepartmentUpdate`, `Job_TiltleUpdate`, `Salary_ModeUpdate`, `StatusUpdate`, `EmployeeNoUpdate`, `Employee_ManagerUpdate`, `Joining_DateUpdate`, `Contract_Expiry_DateUpdate`, `Last_Working_DateUpdate`, `Attendance_SupervisorUpdate`, `Duty_LocationUpdate`, `Duty_PointUpdate`, `OnlineUpdate Status`, `typeUpdate`, `DY_SupervisorUpdate`, `leaveAlreadyAvailedUpdate`) VALUES
(3, 2, '', 'Emp1', 'name', '-', '-', '123455431', 'email@email.com', '-', '-', '-', '-', '-', '-', '-', '2023-09-07', '-', 'Male', '-', '-', ' Unmarried', '-', '-', '-', '-', 'WSSC CONTRACTUAL', 'TMA PAY', 'WSSC - COMMERCIAL', 'TMA - ADMIN - PERMANENT PAY', 'DECEASED SON', '-', '-', '-', '-', '-', '-', 5, '-', '-', '', 'ADMINISTRATION', 'CHIEF EXECUTIVE OFFICER', 'BANK TRANSFER', 'CONTRACT EXP', 100002, 0, '0000-00-00', '0000-00-00', '0000-00-00', 0, '-', '-', 'PENDING', 'MANAGER', '', 34),
(4, 1, '', 'Admin', 'Wssc', '-', '-', '12345', 'admin@wssc.com', '-', '-', '-', '-', '-', '-', '-', '2023-09-05', '-', 'Male', '-', '-', ' Unmarried', '-', '-', '-', '-', 'WSSC - ADMIN PAY', 'WSSC PAY', 'WSSC - COMMERCIAL', '', 'DECEASED SON', '-', '-', '-', '-', '-', '-', 6, '-', '-', '', 'ADMINISTRATION', 'CHIEF EXECUTIVE OFFICER', 'BANK TRANSFER', 'CONTRACT EXP', 100001, 100006, '2023-10-10', '2023-10-10', '2023-10-31', 0, '-', '-', 'PENDING', '', '', 34);

-- --------------------------------------------------------

--
-- Table structure for table `employee_exit`
--

CREATE TABLE `employee_exit` (
  `Id` int(11) NOT NULL,
  `Employee_id` varchar(255) NOT NULL,
  `Reason_of_Leaving` varchar(255) DEFAULT NULL,
  `Leaving_Date` date DEFAULT NULL,
  `HRMS` varchar(10) DEFAULT NULL,
  `HRMS_Remarks` text DEFAULT NULL,
  `EOBI` varchar(10) DEFAULT NULL,
  `EOBI_Remarks` text DEFAULT NULL,
  `Leve` varchar(10) DEFAULT NULL,
  `Leve_Remarks` text DEFAULT NULL,
  `Gratuity` varchar(10) DEFAULT NULL,
  `HR_Approved_Date` date DEFAULT NULL,
  `Gratuity_Remarks` text DEFAULT NULL,
  `Email_Suspension` varchar(10) DEFAULT NULL,
  `Email_Susp_Remarks` text DEFAULT NULL,
  `Soft_Data` varchar(10) DEFAULT NULL,
  `Soft_Data_Remarks` text DEFAULT NULL,
  `Heard_Data` varchar(10) DEFAULT NULL,
  `Heard_Data_Remarks` text DEFAULT NULL,
  `IT_Other` varchar(10) DEFAULT NULL,
  `IT_Remarks` text DEFAULT NULL,
  `IT_Approved_Date` date DEFAULT NULL,
  `Handover_File` varchar(10) DEFAULT NULL,
  `Handover_File_Remarks` text DEFAULT NULL,
  `Handover_Info` varchar(255) NOT NULL,
  `Handover_Info_Remarks` text DEFAULT NULL,
  `Capital_Equipment` varchar(10) DEFAULT NULL,
  `Capital_Remarks` text DEFAULT NULL,
  `HOD_Other` varchar(10) DEFAULT NULL,
  `HOD_Remarks` text DEFAULT NULL,
  `HOD_Approved_Date` date DEFAULT NULL,
  `Uniform` varchar(10) DEFAULT NULL,
  `Uniform_Remarks` text DEFAULT NULL,
  `Equipment` varchar(10) DEFAULT NULL,
  `Equipment_Remarks` text DEFAULT NULL,
  `Assets` varchar(10) DEFAULT NULL,
  `Assets_Remarks` text DEFAULT NULL,
  `Admin_Other` varchar(10) DEFAULT NULL,
  `Admin_Remarks` text DEFAULT NULL,
  `Admin_Approved_Date` date DEFAULT NULL,
  `Loan` varchar(10) DEFAULT NULL,
  `Loan_Remarks` text DEFAULT NULL,
  `OverPay` varchar(10) DEFAULT NULL,
  `OverPay_Remarks` text DEFAULT NULL,
  `Finance_Other` varchar(10) DEFAULT NULL,
  `Finance_Remarks` text DEFAULT NULL,
  `Finance_Approved_Date` date DEFAULT NULL,
  `Approved_CEO` varchar(10) DEFAULT NULL,
  `CEO_Approved_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_exit`
--

INSERT INTO `employee_exit` (`Id`, `Employee_id`, `Reason_of_Leaving`, `Leaving_Date`, `HRMS`, `HRMS_Remarks`, `EOBI`, `EOBI_Remarks`, `Leve`, `Leve_Remarks`, `Gratuity`, `HR_Approved_Date`, `Gratuity_Remarks`, `Email_Suspension`, `Email_Susp_Remarks`, `Soft_Data`, `Soft_Data_Remarks`, `Heard_Data`, `Heard_Data_Remarks`, `IT_Other`, `IT_Remarks`, `IT_Approved_Date`, `Handover_File`, `Handover_File_Remarks`, `Handover_Info`, `Handover_Info_Remarks`, `Capital_Equipment`, `Capital_Remarks`, `HOD_Other`, `HOD_Remarks`, `HOD_Approved_Date`, `Uniform`, `Uniform_Remarks`, `Equipment`, `Equipment_Remarks`, `Assets`, `Assets_Remarks`, `Admin_Other`, `Admin_Remarks`, `Admin_Approved_Date`, `Loan`, `Loan_Remarks`, `OverPay`, `OverPay_Remarks`, `Finance_Other`, `Finance_Remarks`, `Finance_Approved_Date`, `Approved_CEO`, `CEO_Approved_Date`) VALUES
(0, '100001', '<p>fguiguifyfdvyi</p>\r\n', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_performance`
--

CREATE TABLE `employee_performance` (
  `Id` int(11) NOT NULL,
  `EmployeeID` varchar(255) DEFAULT NULL,
  `JobDescription` text DEFAULT NULL,
  `Q1` text DEFAULT NULL,
  `Intelligence` varchar(255) DEFAULT NULL,
  `ConfidenceAndWillPower` varchar(255) DEFAULT NULL,
  `AcceptanceOfResponsibility` varchar(255) DEFAULT NULL,
  `ReliabilityUnderPressure` varchar(255) DEFAULT NULL,
  `FinancialResponsibility` varchar(255) DEFAULT NULL,
  `RelationsWithSuperiors` varchar(255) DEFAULT NULL,
  `RelationsWithColleagues` varchar(255) DEFAULT NULL,
  `RelationsWithSubordinates` varchar(255) DEFAULT NULL,
  `BehaviorWithPublic` varchar(255) DEFAULT NULL,
  `AblityToDecideRoutineMatters` varchar(255) DEFAULT NULL,
  `KnowledgeOfRelavantLawsETC` varchar(255) DEFAULT NULL,
  `Q2` text DEFAULT NULL,
  `Integrity` varchar(255) DEFAULT NULL,
  `Q3` text DEFAULT NULL,
  `SpecialAptitude` varchar(255) DEFAULT NULL,
  `RecommendedForFutureTraining` varchar(255) DEFAULT NULL,
  `OverallGradingByReportingOfficer` text DEFAULT NULL,
  `OverallGradingByCountersigningOfficer` text DEFAULT NULL,
  `FitnessForPromotionByReportingOfficer` text DEFAULT NULL,
  `FitnessForPromotionByCountersigningOfficer` text DEFAULT NULL,
  `NameOfReportingOfficer` varchar(255) DEFAULT NULL,
  `DesignationOfReportingOfficer` varchar(255) DEFAULT NULL,
  `DateOfReportingOfficer` date DEFAULT NULL,
  `CEOQ1` text DEFAULT NULL,
  `CEOQ2` text DEFAULT NULL,
  `NameOfCountersigningOfficer` varchar(255) DEFAULT NULL,
  `DesignationOfCountersigningOfficer` varchar(255) DEFAULT NULL,
  `DateOfCountersigningOfficer` date DEFAULT NULL,
  `RemarksOfSecondCountersigningOfficer` text DEFAULT NULL,
  `NameOfSecondCountersigningOfficer` varchar(255) DEFAULT NULL,
  `DesignationOfSecondCountersigningOfficer` varchar(255) DEFAULT NULL,
  `DateOfSecondCountersigningOfficer` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_performance`
--

INSERT INTO `employee_performance` (`Id`, `EmployeeID`, `JobDescription`, `Q1`, `Intelligence`, `ConfidenceAndWillPower`, `AcceptanceOfResponsibility`, `ReliabilityUnderPressure`, `FinancialResponsibility`, `RelationsWithSuperiors`, `RelationsWithColleagues`, `RelationsWithSubordinates`, `BehaviorWithPublic`, `AblityToDecideRoutineMatters`, `KnowledgeOfRelavantLawsETC`, `Q2`, `Integrity`, `Q3`, `SpecialAptitude`, `RecommendedForFutureTraining`, `OverallGradingByReportingOfficer`, `OverallGradingByCountersigningOfficer`, `FitnessForPromotionByReportingOfficer`, `FitnessForPromotionByCountersigningOfficer`, `NameOfReportingOfficer`, `DesignationOfReportingOfficer`, `DateOfReportingOfficer`, `CEOQ1`, `CEOQ2`, `NameOfCountersigningOfficer`, `DesignationOfCountersigningOfficer`, `DateOfCountersigningOfficer`, `RemarksOfSecondCountersigningOfficer`, `NameOfSecondCountersigningOfficer`, `DesignationOfSecondCountersigningOfficer`, `DateOfSecondCountersigningOfficer`) VALUES
(1, '', '<p><em><strong>jggyufio</strong></em></p>\r\n', '<p>uiuhuihioljkljkl</p>\r\n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `ID` int(11) NOT NULL,
  `DateOfSub` date DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Day` varchar(10) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`ID`, `DateOfSub`, `Date`, `Day`, `Type`) VALUES
(1, '2023-11-10', '2023-11-09', 'Thursday', 'Public Holiday'),
(2, '2023-11-20', '2023-12-25', 'Monday', 'Public Holiday'),
(3, '2023-11-26', '2023-11-05', 'Sunday', 'Weekly Holiday'),
(4, '2023-11-26', '2023-11-12', 'Sunday', 'Weekly Holiday'),
(5, '2023-11-26', '2023-11-19', 'Sunday', 'Weekly Holiday'),
(6, '2023-11-26', '2023-11-26', 'Sunday', 'Weekly Holiday'),
(7, '2023-12-01', '2023-12-03', 'Sunday', 'Weekly Holiday'),
(8, '2023-12-01', '2023-12-10', 'Sunday', 'Weekly Holiday'),
(9, '2023-12-01', '2023-12-17', 'Sunday', 'Weekly Holiday'),
(10, '2023-12-01', '2023-12-24', 'Sunday', 'Weekly Holiday'),
(11, '2023-12-01', '2023-12-31', 'Sunday', 'Weekly Holiday');

-- --------------------------------------------------------

--
-- Table structure for table `leavereq`
--

CREATE TABLE `leavereq` (
  `Id` int(11) NOT NULL,
  `EmployeeNo` int(11) DEFAULT NULL,
  `PhoneNumberOnLeave` varchar(15) DEFAULT NULL,
  `LeaveType` varchar(255) DEFAULT NULL,
  `LeaveFrom` date DEFAULT NULL,
  `LeaveTo` date DEFAULT NULL,
  `TotalDays` int(11) DEFAULT NULL,
  `LeaveAvailed` int(11) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Statusofmanger` varchar(255) DEFAULT 'PENDING',
  `StatusofGm` varchar(255) DEFAULT 'PENDING',
  `DateofApply` date NOT NULL,
  `DateOfAccepManager` date NOT NULL,
  `DateOfAccepGm` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leavereq`
--

INSERT INTO `leavereq` (`Id`, `EmployeeNo`, `PhoneNumberOnLeave`, `LeaveType`, `LeaveFrom`, `LeaveTo`, `TotalDays`, `LeaveAvailed`, `Description`, `Statusofmanger`, `StatusofGm`, `DateofApply`, `DateOfAccepManager`, `DateOfAccepGm`) VALUES
(1, 100001, '+123456', 'Sick', '2023-12-21', '2023-12-23', 3, 0, 'i am sick', 'PENDING', 'PENDING', '2023-10-20', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Id` int(11) NOT NULL,
  `FullName` varchar(255) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `EmployeeNumber` int(11) DEFAULT NULL,
  `Designation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Id`, `FullName`, `Gender`, `Email`, `Password`, `EmployeeNumber`, `Designation`) VALUES
(1, 'Admin', 'Male', 'admin@wssc.com', 'Wssc@123', 100001, 'Admin'),
(2, 'Payroll', NULL, 'payroll@wssc.com', 'Wssc@123', 100002, 'Payroll manager'),
(3, 'Hr Admin', '', 'hr@wssc.com', 'Wssc@123', 100002, 'HR manager'),
(4, 'CEO', '', 'ceo@wssc.com', 'Wssc@123', 100003, 'CEO'),
(5, 'paryroll', '', 'payroll@gmail.com', 'Wssc@123', 100003, 'Payroll manager'),
(7, 'GM', '', 'gm12@wssc.com', 'Wssc@123', 100004, 'GM'),
(8, 'Manager', '', 'manag@wssc.com', 'Wssc@123', 100006, 'Manager'),
(9, 'Finance', '', 'finance125225@wssc.com', 'Wssc@123', 100005, 'FinanceAdmin'),
(10, 'InternalAuditor', '', 'internalauditor@gmail.com', 'Wssc@123', 100001, 'Internal Auditor');

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE `master` (
  `id` int(11) NOT NULL,
  `drop` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`id`, `drop`, `name`) VALUES
(3, 'WSSC - ADMIN PAY', 'EmpGroup'),
(4, 'WSSC CONTRACTUAL', 'EmpGroup'),
(5, 'WSSC - MSW PAY', 'EmpGroup'),
(6, 'TMA PAY', 'Employee_Class'),
(7, 'WSSC PAY', 'Employee_Class'),
(9, 'WSSC - COMMERCIAL', 'Employee_Group'),
(10, 'TMA - ADMIN - PERMANENT PAY', 'Employee_Sub_Group'),
(11, 'DECEASED SON', 'Employee_Quota'),
(12, 'DISABLED', 'Employee_Quota'),
(13, 'MINORITIES', 'Employee_Quota'),
(21, 'M-1', 'Grade'),
(22, 'M-2', 'Grade'),
(23, 'S-1', 'Grade'),
(24, 'S-2', 'Grade'),
(26, 'COMMERCIAL', 'Department'),
(27, 'CHIEF EXECUTIVE OFFICER', 'Job_Tiltle'),
(28, 'GM (HR, ADMIN & PROCUREMENT)', 'Job_Tiltle'),
(29, 'MANAGER SOLID WASTE', 'Job_Tiltle'),
(30, 'DY- MANAGER - ADMIN & PROCUREMENT', 'Job_Tiltle'),
(31, 'SUPERVISOR', 'Job_Tiltle'),
(32, 'CEO', 'Type'),
(33, 'MANAGER', 'Type'),
(34, 'DY_ MANAGER', 'Type'),
(35, 'HR MANAGER', 'Type'),
(36, 'ADMIN', 'Type'),
(37, 'SUPERVISOR', 'Type'),
(38, 'EMPLOYEE', 'Type'),
(39, '', 'EmpGroup'),
(40, 'GM', 'Type'),
(41, 'FINANCE', 'Type'),
(42, 'PAYROLL', 'Type'),
(45, 'CHEQUE', 'Salary_Mode'),
(46, 'BANK TRANSFER', 'Salary_Mode'),
(47, 'ADMINISTRATION', 'Department'),
(48, 'CONTRACT EXP', 'Status'),
(49, 'ON-DUTY', 'Status'),
(50, 'OTHER', 'Status'),
(51, 'PROBATION', 'Status');

-- --------------------------------------------------------

--
-- Table structure for table `payrole`
--

CREATE TABLE `payrole` (
  `Allownceid` int(11) NOT NULL,
  `EmpNo` int(11) DEFAULT NULL,
  `AllowancesName` varchar(255) DEFAULT NULL,
  `AllowancesId` int(11) DEFAULT NULL,
  `fin_classification` varchar(255) NOT NULL,
  `rate_calc_mode` varchar(255) NOT NULL,
  `earning_deduction_fund` varchar(255) NOT NULL,
  `Rate` decimal(10,2) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `total` varchar(255) NOT NULL,
  `Date` date DEFAULT NULL,
  `timeperiod` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payrole`
--

INSERT INTO `payrole` (`Allownceid`, `EmpNo`, `AllowancesName`, `AllowancesId`, `fin_classification`, `rate_calc_mode`, `earning_deduction_fund`, `Rate`, `price`, `total`, `Date`, `timeperiod`) VALUES
(1, 8, 'SAERY', 1, 'GROSS PAY', 'PRESENT RATE', ' EARNING', 30000.00, 1, '30000', '2023-12-10', 1),
(2, 8, 'OFFPAY', 2, 'GROSS PAY', 'OFF PAY', ' DEDUCTION', 3.00, 2295, '6885', '2023-12-10', 1),
(3, 8, 'OVERTIME', 3, 'GROSS PAY', 'OVERTIME', ' EARNING', 3.00, 800, '2400', '2023-12-10', 1),
(4, 8, 'DOUBLEDUTY', 4, 'GROSS PAY', 'DOUBLE DUTY', ' EARNING', 4.00, 1600, '6400', '2023-12-10', 1),
(5, 8, 'FULE', 5, 'GROSS PAY', 'PREVAILING RATE', ' EARNING', 50.00, 280, '14000', '2023-12-10', 1),
(6, 8, 'PENTION', 6, 'EOBI-ER', 'PRESENT RATE', ' EARNING', 2000.00, 1, '2000', '2023-12-10', 1),
(7, 8, 'HOUSERENT', 9, 'GROSS PAY', 'PRESENT RATE', ' EARNING', 5000.00, 1, '5000', '2023-12-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `Id` int(255) NOT NULL,
  `From_Designation` varchar(255) NOT NULL,
  `To_Designation` varchar(255) NOT NULL,
  `From_BPS` varchar(255) NOT NULL,
  `ToBps` varchar(255) NOT NULL,
  `Promotion_Date` date NOT NULL,
  `Promotion_Number` varchar(255) NOT NULL,
  `Department1` varchar(255) NOT NULL,
  `Acting` varchar(255) NOT NULL,
  `Remarks` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`Id`, `From_Designation`, `To_Designation`, `From_BPS`, `ToBps`, `Promotion_Date`, `Promotion_Number`, `Department1`, `Acting`, `Remarks`, `file`, `employee_id`, `Status`) VALUES
(1, 'S–4', 'M–1', '', 'UNDEFINED', '2023-10-01', '1213', 'WSSC', 'REGULAR', 'KDJFLAJDDFJLK', 'Appraisal 2023 Blank.docx', '123', 'PENDING'),
(2, 'S–4', 'M–1', '', 'UNDEFINED', '2023-10-01', '1213', 'WSSC', 'REGULAR', 'KDJFLAJDDFJLK', 'Appraisal 2023 Blank.docx', '123', 'PENDING'),
(3, 'S–4', 'M–1', '', 'UNDEFINED', '2023-10-01', '1213', 'WSSC', 'REGULAR', 'KDJFLAJDDFJLK', 'Appraisal 2023 Blank.docx', '123', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE `qualification` (
  `Id` int(255) NOT NULL,
  `Qualification` varchar(255) NOT NULL,
  `Grade/Division` varchar(255) NOT NULL,
  `Passing Year of Degree` varchar(255) NOT NULL,
  `Last Institute` varchar(255) NOT NULL,
  `PEC Registration` varchar(255) NOT NULL,
  `CV` varchar(255) NOT NULL,
  `Institute Address` varchar(255) NOT NULL,
  `Major Subject` varchar(255) NOT NULL,
  `Remarks` varchar(255) NOT NULL,
  `Employee_id` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`Id`, `Qualification`, `Grade/Division`, `Passing Year of Degree`, `Last Institute`, `PEC Registration`, `CV`, `Institute Address`, `Major Subject`, `Remarks`, `Employee_id`, `Status`) VALUES
(1, 'DFA', 'SDFASD', '', '', '', '', '', '', '', '2131243', 'PENDING'),
(2, 'BS', '-', '-', '-', '-', '', '-', '-', 'XYZ', '41234235', 'PENDING'),
(3, 'BS', '-', '2023', '', '-', '', '', '-', '-', '1234235', 'PENDING'),
(4, 'BS', '3.5', '23', 'KFJASD', 'WSFSD', '', 'SDFSD', 'WSDGSD', 'SDFSD', '12345', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `id` int(11) NOT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `allowances_id` int(11) DEFAULT NULL,
  `EmployementType` varchar(255) DEFAULT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`id`, `rate`, `employee_id`, `allowances_id`, `EmployementType`, `Date`) VALUES
(1, 30000.00, 8, 1, 'FINANCE', '2023-11-27'),
(2, 0.00, 8, 2, 'FINANCE', '2023-11-27'),
(3, 0.00, 8, 3, 'FINANCE', '2023-11-27'),
(4, 0.00, 8, 4, 'FINANCE', '2023-11-27'),
(5, 50.00, 8, 5, 'FINANCE', '2023-11-27'),
(6, 2000.00, 8, 6, 'FINANCE', '2023-11-27'),
(7, 5000.00, 8, 9, 'FINANCE', '2023-11-27');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `fund` decimal(10,2) DEFAULT NULL,
  `gross_pay` decimal(10,2) DEFAULT NULL,
  `deduction` decimal(10,2) DEFAULT NULL,
  `net_pay` decimal(10,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `EmpName` varchar(255) DEFAULT NULL,
  `EmpFatherName` varchar(255) DEFAULT NULL,
  `EmpCNIC` varchar(15) DEFAULT NULL,
  `JoiningDate` date DEFAULT NULL,
  `JobTitle` varchar(255) DEFAULT NULL,
  `Grade` varchar(255) DEFAULT NULL,
  `EmploymentType` varchar(255) DEFAULT NULL,
  `Department` varchar(255) DEFAULT NULL,
  `ClassGroup` varchar(255) DEFAULT NULL,
  `SubGroup` varchar(255) DEFAULT NULL,
  `PaymentMode` varchar(255) DEFAULT NULL,
  `BankAccountNo` varchar(20) DEFAULT NULL,
  `timeperiod` int(255) NOT NULL,
  `HrReview` varchar(255) NOT NULL DEFAULT 'PENDING',
  `HrReviewDate` date DEFAULT NULL,
  `finace` varchar(255) NOT NULL DEFAULT 'PENDING',
  `finacedate` date DEFAULT NULL,
  `ceo` varchar(255) NOT NULL DEFAULT 'PENDING',
  `ceodata` date DEFAULT NULL,
  `InternalAuditor` varchar(255) NOT NULL DEFAULT 'PENDING',
  `InternalAuditordate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `employee_id`, `fund`, `gross_pay`, `deduction`, `net_pay`, `date`, `EmpName`, `EmpFatherName`, `EmpCNIC`, `JoiningDate`, `JobTitle`, `Grade`, `EmploymentType`, `Department`, `ClassGroup`, `SubGroup`, `PaymentMode`, `BankAccountNo`, `timeperiod`, `HrReview`, `HrReviewDate`, `finace`, `finacedate`, `ceo`, `ceodata`, `InternalAuditor`, `InternalAuditordate`) VALUES
(1, 100005, 0.00, 36210.00, 4590.00, 31620.00, '2023-11-30', 'Shayan Khan Kurtlar', 'Riayat Khan', '41234235', '2023-09-24', 'MANAGER SOLID WASTE', 'M-1', 'FINANCE', 'COMMERCIAL', ' WSSC PAY ', 'TMA - ADMIN - PERMANENT PAY', '-', '-', 1, 'ACCEPT', '2023-12-01', 'ACCEPT', '2023-12-01', 'PENDING', '2023-12-01', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `spouse`
--

CREATE TABLE `spouse` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `Spouse_Name` varchar(255) DEFAULT NULL,
  `CNIC` varchar(15) DEFAULT NULL,
  `Date_of_B` date DEFAULT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `spouse`
--

INSERT INTO `spouse` (`id`, `employee_id`, `Spouse_Name`, `CNIC`, `Date_of_B`, `Status`) VALUES
(1, '123', 'XYZ', '123456', '2023-10-03', 'ACCPET'),
(2, '1234235', 'XYZ', '2323', '2023-10-17', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `tabill`
--

CREATE TABLE `tabill` (
  `TAid` int(11) NOT NULL,
  `EmployeeNo` int(11) DEFAULT NULL,
  `RequestNoTravel` int(11) DEFAULT NULL,
  `BillNo` int(11) DEFAULT NULL,
  `BillDate` date DEFAULT NULL,
  `TravelAllowance` decimal(10,2) DEFAULT NULL,
  `DailyAllowance` decimal(10,2) DEFAULT NULL,
  `NightAllowance` decimal(10,2) DEFAULT NULL,
  `BillStatus` varchar(255) DEFAULT NULL,
  `Statusofmanger` varchar(255) DEFAULT 'PENDING',
  `StatusofGm` varchar(255) DEFAULT 'PENDING',
  `DateofApply` date DEFAULT NULL,
  `DateOfAccepManager` date DEFAULT NULL,
  `DateOfAccepGm` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timeperiod`
--

CREATE TABLE `timeperiod` (
  `ID` int(11) NOT NULL,
  `DateOfSub` date DEFAULT NULL,
  `FromDate` date DEFAULT NULL,
  `ToDate` date DEFAULT NULL,
  `WrokingDays` int(11) DEFAULT NULL,
  `HRStatus` varchar(255) DEFAULT 'PENDING',
  `DateOfHRStatus` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timeperiod`
--

INSERT INTO `timeperiod` (`ID`, `DateOfSub`, `FromDate`, `ToDate`, `WrokingDays`, `HRStatus`, `DateOfHRStatus`) VALUES
(1, '2023-11-26', '2023-11-01', '2023-11-30', 26, 'ACCEPT', '2023-11-26'),
(2, '2023-12-01', '2023-12-01', '2023-12-31', 26, 'ACCEPT', '2023-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `Id` int(255) NOT NULL,
  `Training_Serial_Number` varchar(255) NOT NULL,
  `Training_Name` varchar(255) NOT NULL,
  `Institute` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Institute_Address` varchar(255) NOT NULL,
  `Oblige_Sponsor` varchar(255) NOT NULL,
  `From` date NOT NULL,
  `To` date NOT NULL,
  `Duration` varchar(255) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`Id`, `Training_Serial_Number`, `Training_Name`, `Institute`, `City`, `Institute_Address`, `Oblige_Sponsor`, `From`, `To`, `Duration`, `employee_id`, `Status`) VALUES
(1, 'BLUE', 'FRUNT', 'IMG', '', '', '', '0000-00-00', '0000-00-00', '', '12345', 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `id` int(11) NOT NULL,
  `Transfer_Order_Number` varchar(255) DEFAULT NULL,
  `Designation` varchar(255) DEFAULT NULL,
  `BPS` varchar(255) DEFAULT NULL,
  `From_Department` varchar(255) DEFAULT NULL,
  `To_Project` varchar(255) DEFAULT NULL,
  `From_Station` varchar(255) DEFAULT NULL,
  `To_Station` varchar(255) DEFAULT NULL,
  `Worked_From` date DEFAULT NULL,
  `Transfer_Date` date DEFAULT NULL,
  `file` varchar(255) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`id`, `Transfer_Order_Number`, `Designation`, `BPS`, `From_Department`, `To_Project`, `From_Station`, `To_Station`, `Worked_From`, `Transfer_Date`, `file`, `employee_id`, `Status`) VALUES
(1, 'DATA', 'GASDFD', 'SDFASD', 'DSFSDF', 'SDGSD', 'QSDGFSDF', 'QSDFSDF', '2023-10-18', '2023-10-06', '', 123, 'ACCPET'),
(2, '2SSDFSF', 'FSKLJLJK', 'KDJKASD', 'KKLJLJKSD', 'KJKDFKJ', 'LKKLJASFD', 'LKLJLJKSDF', '2023-10-03', '2023-10-12', 'Attendance.pdf', 123, 'REJECT');

-- --------------------------------------------------------

--
-- Table structure for table `travelrequest`
--

CREATE TABLE `travelrequest` (
  `id` int(11) NOT NULL,
  `EmployeeNo` int(11) DEFAULT NULL,
  `RequestNo` int(11) DEFAULT NULL,
  `RequestDate` date DEFAULT NULL,
  `FromCity` varchar(255) DEFAULT NULL,
  `ToCity` varchar(255) DEFAULT NULL,
  `DepartureOn` date DEFAULT NULL,
  `ReturnDate` date DEFAULT NULL,
  `TravelMode` varchar(255) DEFAULT NULL,
  `Justification` text DEFAULT NULL,
  `Statusofmanger` varchar(255) DEFAULT 'PENDING',
  `StatusofGm` varchar(255) DEFAULT 'PENDING',
  `DateOfAccepManager` date DEFAULT NULL,
  `DateOfAccepGm` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `travelrequest`
--

INSERT INTO `travelrequest` (`id`, `EmployeeNo`, `RequestNo`, `RequestDate`, `FromCity`, `ToCity`, `DepartureOn`, `ReturnDate`, `TravelMode`, `Justification`, `Statusofmanger`, `StatusofGm`, `DateOfAccepManager`, `DateOfAccepGm`) VALUES
(9, 100002, 0, '2023-12-12', 'xyz', 'xyz', '2023-11-09', '2023-12-13', 'onyear', 'juc', 'PENDING', 'PENDING', NULL, NULL),
(10, 100001, 0, '0000-00-00', 'sdfkj', 'kjsdfjk', '2023-10-01', '2023-10-11', 'kjklsdf', ';ljl', 'PENDING', 'PENDING', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allowances`
--
ALTER TABLE `allowances`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `allowance` (`allowance`);

--
-- Indexes for table `allowancesrateupdate`
--
ALTER TABLE `allowancesrateupdate`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `atandece`
--
ALTER TABLE `atandece`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Employeeid` (`Employeeid`);

--
-- Indexes for table `child`
--
ALTER TABLE `child`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `earning_deduction_fund`
--
ALTER TABLE `earning_deduction_fund`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeedata`
--
ALTER TABLE `employeedata`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `EmployeeNo` (`EmployeeNo`);

--
-- Indexes for table `employeedataupdate`
--
ALTER TABLE `employeedataupdate`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `employee_performance`
--
ALTER TABLE `employee_performance`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Date` (`Date`);

--
-- Indexes for table `leavereq`
--
ALTER TABLE `leavereq`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `EmployeeNo` (`EmployeeNo`),
  ADD KEY `EmployeeNo_2` (`EmployeeNo`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `EmployeeNumber` (`EmployeeNumber`);

--
-- Indexes for table `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payrole`
--
ALTER TABLE `payrole`
  ADD PRIMARY KEY (`Allownceid`),
  ADD KEY `EmpNo` (`EmpNo`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `spouse`
--
ALTER TABLE `spouse`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CNIC` (`CNIC`);

--
-- Indexes for table `tabill`
--
ALTER TABLE `tabill`
  ADD PRIMARY KEY (`TAid`),
  ADD KEY `EmployeeNo` (`EmployeeNo`);

--
-- Indexes for table `timeperiod`
--
ALTER TABLE `timeperiod`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `DateOfSub` (`DateOfSub`),
  ADD UNIQUE KEY `FromDate` (`FromDate`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travelrequest`
--
ALTER TABLE `travelrequest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EmployeeNo` (`EmployeeNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allowances`
--
ALTER TABLE `allowances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `allowancesrateupdate`
--
ALTER TABLE `allowancesrateupdate`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `atandece`
--
ALTER TABLE `atandece`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `child`
--
ALTER TABLE `child`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `earning_deduction_fund`
--
ALTER TABLE `earning_deduction_fund`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employeedata`
--
ALTER TABLE `employeedata`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employeedataupdate`
--
ALTER TABLE `employeedataupdate`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee_performance`
--
ALTER TABLE `employee_performance`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `leavereq`
--
ALTER TABLE `leavereq`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `master`
--
ALTER TABLE `master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `payrole`
--
ALTER TABLE `payrole`
  MODIFY `Allownceid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `spouse`
--
ALTER TABLE `spouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tabill`
--
ALTER TABLE `tabill`
  MODIFY `TAid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timeperiod`
--
ALTER TABLE `timeperiod`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `travelrequest`
--
ALTER TABLE `travelrequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `atandece`
--
ALTER TABLE `atandece`
  ADD CONSTRAINT `atandece_ibfk_1` FOREIGN KEY (`Employeeid`) REFERENCES `employeedata` (`EmployeeNo`);

--
-- Constraints for table `leavereq`
--
ALTER TABLE `leavereq`
  ADD CONSTRAINT `leavereq_ibfk_1` FOREIGN KEY (`EmployeeNo`) REFERENCES `employeedata` (`EmployeeNo`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`EmployeeNumber`) REFERENCES `employeedata` (`EmployeeNo`);

--
-- Constraints for table `payrole`
--
ALTER TABLE `payrole`
  ADD CONSTRAINT `payrole_ibfk_1` FOREIGN KEY (`EmpNo`) REFERENCES `employeedata` (`Id`);

--
-- Constraints for table `salary`
--
ALTER TABLE `salary`
  ADD CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employeedata` (`EmployeeNo`);

--
-- Constraints for table `tabill`
--
ALTER TABLE `tabill`
  ADD CONSTRAINT `tabill_ibfk_1` FOREIGN KEY (`EmployeeNo`) REFERENCES `travelrequest` (`EmployeeNo`),
  ADD CONSTRAINT `tabill_ibfk_2` FOREIGN KEY (`EmployeeNo`) REFERENCES `employeedata` (`EmployeeNo`);

--
-- Constraints for table `travelrequest`
--
ALTER TABLE `travelrequest`
  ADD CONSTRAINT `travelrequest_ibfk_1` FOREIGN KEY (`EmployeeNo`) REFERENCES `employeedata` (`EmployeeNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
