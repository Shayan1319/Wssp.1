-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2024 at 03:07 PM
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
(1, 'SALARY', 'GROSS PAY', 'PRESENT RATE', 'EARNING', 'ACTIVE', 1),
(2, 'EOBI-ER', 'EOBI-ER', 'PRESENT RATE', 'FUND', 'ACTIVE', 1),
(3, 'FUND', 'LOAN-EE', 'PRESENT RATE', 'FUND', 'ACTIVE', 1),
(5, 'OFF DUTY', 'GROSS PAY', 'OFF PAY', 'DEDUCTION', 'ACTIVE', 1),
(6, 'OVER TIME', 'GROSS PAY', 'OVERTIME', 'EARNING', 'ACTIVE', 800),
(7, 'DOUBLE DUTY', 'GROSS PAY', 'DOUBLE DUTY', 'EARNING', 'ACTIVE', 1200);

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
(1, 1, 'OVER TIME', 800, 6),
(2, 1, 'DOUBLE DUTY', 1200, 7);

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
  `status` varchar(255) DEFAULT 'PRESENT',
  `timeperiodId` int(11) DEFAULT NULL,
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

INSERT INTO `atandece` (`id`, `Employeeid`, `Shift`, `Tehsil`, `Area`, `Date`, `DDorOT`, `status`, `timeperiodId`, `ManagerStatus`, `ManagerStatusDate`, `GMStatus`, `GMStatusData`, `PayrollStatus`, `PayrollStatusDate`) VALUES
(1, 100001, 'Morning', '-', '-', '2024-03-01', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(2, 100001, 'Morning', '-', '-', '2024-03-02', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(3, 100001, 'Morning', '-', '-', '2024-03-04', 'Over Time', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(4, 100001, 'Morning', '-', '-', '2024-03-05', 'Double duty', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(5, 100001, 'Morning', '-', '-', '2024-03-06', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(6, 100001, 'Morning', '-', '-', '2024-03-07', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(7, 100001, 'Morning', '-', '-', '2024-03-08', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(8, 100001, 'Morning', '-', '-', '2024-03-09', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(9, 100001, 'Morning', '-', '-', '2024-03-11', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(10, 100001, 'Morning', '-', '-', '2024-03-12', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(11, 100001, 'Morning', '-', '-', '2024-03-13', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(12, 100001, 'Morning', '-', '-', '2024-03-14', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(13, 100001, 'Morning', '-', '-', '2024-03-15', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(14, 100001, 'Morning', '-', '-', '2024-03-16', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(15, 100001, 'Morning', '-', '-', '2024-03-18', 'Double duty', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(16, 100001, 'Morning', '-', '-', '2024-03-19', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(17, 100001, 'Morning', '-', '-', '2024-03-20', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(18, 100001, 'Morning', '-', '-', '2024-03-21', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(19, 100001, 'Morning', '-', '-', '2024-03-22', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(20, 100001, 'Morning', '-', '-', '2024-03-23', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(21, 100001, 'Morning', '-', '-', '2024-03-25', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(22, 100001, 'Morning', '-', '-', '2024-03-26', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(23, 100001, 'Morning', '-', '-', '2024-03-27', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(24, 100001, 'Morning', '-', '-', '2024-03-28', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(25, 100001, 'Morning', '-', '-', '2024-03-29', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(26, 100001, 'Morning', '-', '-', '2024-03-30', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(27, 100006, 'Morning', '', '', '2024-03-01', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(28, 100006, 'Morning', '', '', '2024-03-02', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(29, 100006, 'Morning', '', '', '2024-03-04', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(30, 100006, 'Morning', '', '', '2024-03-05', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(31, 100006, 'Morning', '', '', '2024-03-06', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(32, 100006, 'Morning', '', '', '2024-03-07', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(33, 100006, 'Morning', '', '', '2024-03-08', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(34, 100006, 'Morning', '', '', '2024-03-09', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(35, 100006, 'Morning', '', '', '2024-03-11', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(36, 100006, 'Morning', '', '', '2024-03-12', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(37, 100006, 'Morning', '', '', '2024-03-13', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(38, 100006, 'Morning', '', '', '2024-03-14', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(39, 100006, 'Morning', '', '', '2024-03-15', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(40, 100006, 'Morning', '', '', '2024-03-16', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(41, 100006, 'Morning', '', '', '2024-03-18', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(42, 100006, 'Morning', '', '', '2024-03-19', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(43, 100006, 'Morning', '', '', '2024-03-20', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(44, 100006, 'Morning', '', '', '2024-03-21', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(45, 100006, 'Morning', '', '', '2024-03-22', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(46, 100006, 'Morning', '', '', '2024-03-23', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(47, 100006, 'Morning', '', '', '2024-03-25', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(48, 100006, 'Morning', '', '', '2024-03-26', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(49, 100006, 'Morning', '', '', '2024-03-27', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(50, 100006, 'Morning', '', '', '2024-03-28', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(51, 100006, 'Morning', '', '', '2024-03-29', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07'),
(52, 100006, 'Morning', '', '', '2024-03-30', '', 'Present', 1, 'PENDING', NULL, 'PENDING', NULL, 'ACCEPT', '2024-08-07');

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
(1, 17, 7000.00, 195000.00, 0.00, 195000.00);

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
  `DofB` varchar(20) DEFAULT NULL,
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
  `Status` varchar(255) DEFAULT 'NEW',
  `EmployeeNo` int(11) DEFAULT NULL,
  `Employee_Manager` int(11) DEFAULT NULL,
  `Joining_Date` varchar(20) DEFAULT NULL,
  `Contract_Expiry_Date` varchar(20) DEFAULT NULL,
  `Last_Working_Date` varchar(20) DEFAULT NULL,
  `Attendance_Supervisor` int(11) DEFAULT NULL,
  `Duty_Location` varchar(255) DEFAULT NULL,
  `Duty_Point` varchar(255) DEFAULT NULL,
  `TypeEmp` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `DY_Supervisor` varchar(255) DEFAULT NULL,
  `leaveAlreadyAvailed` int(255) NOT NULL DEFAULT 34
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employeedata`
--

INSERT INTO `employeedata` (`Id`, `image`, `fName`, `mName`, `lName`, `father_Name`, `CNIC`, `email`, `pAddress`, `cAddress`, `city`, `postAddress`, `mNumber`, `ofphNumber`, `Alternate_Number`, `DofB`, `religion`, `gender`, `BlGroup`, `Domicile`, `MaritalStatus`, `NextofKin`, `NextofKinCellNumber`, `ContactPerson`, `CPCN`, `Employement_Group`, `Employee_Class`, `Employee_Group`, `Employee_Sub_Group`, `Employee_Quota`, `Salary_Bank`, `Salary_Branch`, `Account_No`, `Pay_Type`, `EOBI_No`, `Bill_Walved_Off`, `Weekly_Working_Days`, `Bill_Waived_Off`, `Employee_Pay_Classification`, `Grade`, `Department`, `Job_Tiltle`, `Salary_Mode`, `Status`, `EmployeeNo`, `Employee_Manager`, `Joining_Date`, `Contract_Expiry_Date`, `Last_Working_Date`, `Attendance_Supervisor`, `Duty_Location`, `Duty_Point`, `TypeEmp`, `type`, `DY_Supervisor`, `leaveAlreadyAvailed`) VALUES
(1, 'dp.png', 'Admin', 'Wssc', '-', '-', '12345', 'admin@wssc.com', '-', '-', '-', '-', '-', '-', '-', '2023-09-05', '', 'Male', '-', '-', '', '-', '-', '-', '-', 'WSSC - ADMIN PAY', 'WSSC PAY', 'WSSCS - ADMIN PAY', 'WSSCS - ADMIN - CONTINGENT PAY', 'DECEASED SON', '', '', '-', '', '-', '-', 6, 'NO', 'EMPLOYEE PAY CLASSIFICATION WSSC', '', 'ADMINISTRATION', 'CHIEF EXECUTIVE OFFICER', 'BANK TRANSFER', 'ON-DUTY', 100001, 10001343, '2023-10-10', '01 06 2023', '2023-10-31', 100008, '-', '-', 'ACCEPT', '', '', 34),
(2, '', 'Emp1', 'name', '-', '-', '123455431', 'email@email.com', '-', '-', '-', '-', '-', '-', '-', '2023-09-07', '', 'Male', '-', '-', '', '-', '-', '-', '-', 'WSSC - ADMIN PAY', 'WSS-PAY', 'WSSC - ADMIN PAY', 'TMA - ADMIN - PERMANENT PAY', 'DECEASED SON', 'HBL', 'HBL SWAT', '-', '', '-', '-', 5, 'NO', 'EMPLOYEE PAY CLASSIFICATION WSSC', '', 'ADMINISTRATION', 'CHIEF EXECUTIVE OFFICER', 'BANK TRANSFER', 'ON-DUTY', 100002, 10001343, '2023-09-30', '01 06 2024', '2023-10-27', 10000019, '-', '-', 'ACCPET', '', '100003', 34),
(3, '', 'CEO', 'CEO', '', '-', '12345678900', 'shan@gmail.comn', '-', '-', '-', '', '-', '-', '-', '0000-00-00', 'ISLAM', 'Male', '-', '-', '', '-', '', '-', '-', 'WSSC - ADMIN PAY', 'WSS-PAY', 'WSSC - ADMIN PAY', 'WSSC - ADMIN - PERMANENT PAY', '', '', '', '', '', '', '', 6, 'NO', 'EMPLOYEE PAY CLASSIFICATION WSSC', 'M-2', '', 'CHIEF EXECUTIVE OFFICER', '', 'ON-DUTY', 100003, 10001343, '0000-00-00', '01 06 2023', '0000-00-00', 10000019, '', '', 'ACCEPT', '', '', 34),
(4, '', 'Shayan', '', 'Khan', 'Riayat Khan', '263524728', 'payroll@wssc.com', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 'WSSC - ADMIN PAY', 'TMA PAY', '', 'TMA - ADMIN - PERMANENT PAY', 'DECEASED SON', '', '', '12444', '', '-', '-', 0, 'NO', 'EMPLOYEE PAY CLASSIFICATION WSSC', 'M-1', 'ADMINISTRATION', 'DY- MANAGER - ADMIN & PROCUREMENT', 'BANK TRANSFER', 'ON-DUTY', 100004, 10001343, '01 02 2022', '01 06 2026', '2024-07-31', 10000019, 'Jehanger', 'Jehanger', 'ACCPET', '', '', 34),
(5, '', 'Shayan', '', 'Khan', 'Riayat Khan', '3740560259313', 'kurtlar125225@gmail.com', 'Jehangira Sawabi', 'Jehangiara', 'Jehangiara', 'Jehangira', '03491616168', '03091991002', '', '1999-08-28', '', '', 'B+', 'Swabi', '', 'kdfjkjsdf', 'fasdfasdf', '-', '-', 'WSSC - ADMIN PAY', 'TMA PAY', '', 'TMA - ADMIN - PERMANENT PAY', 'DECEASED SON', 'HBL', 'KBO SWAT', '21345', 'CASH', '2134', '34235345', 5, 'YES', '', 'M-1', 'ADMINISTRATION', 'MANAGER SOLID WASTE', 'BANK TRANSFER', 'ON-DUTY', 10000019, 10001343, '01 01 2023', '01 06 2025', '2024-02-29', 100003, 'JEHANGIRA', 'JEHANGIRA', 'WSSC', 'MANAGER', '10001343', 34),
(15, '', 'kjsadlfkas', 'klsdfkl', 'kldsfkjl', 'dklfksl', '12345678908765', 'shayanm@gmail.com', 'kasdfj', 'lsdkfkl', 'sdfljkslk', 'kjsfdlk', '7898', '7', '989', '9887-08-08', 'iaflkjasdf', '', 'kasdf', 'asdfasf', '', 'adfasdf', '4323234', 'dfsdsdf', '234234', 'WSSC - ADMIN PAY', 'TMA PAY', 'WSSC - ADMIN PAY', 'TMA - ADMIN - PERMANENT PAY', 'DECEASED SON', 'HBL', '', '', '', '', '', 5, 'NO', 'fsdfasdf', 'M-1', 'ADMINISTRATION', 'CHIEF EXECUTIVE OFFICER', 'BANK TRANSFER', 'ON-DUTY', 10001343, 100003, '01 06 2023', '01 06 2024', '2024-03-02', 100002, 'sdfsdsadfasdf', 'sdfasd', 'WSSC', 'DY_ MANAGER', '', 34),
(16, '', 'Abdul', 'moaez', 'Khan', 'Riayat khan', '12343234565434', 'abd@gmail.co', '', '', '', '', '', '', '', '0000-00-00', 'ISLAM', 'Mail', '', '', '', '', '', '', '', 'WSSC - ADMIN PAY', 'WSS-PAY', 'WSSC - ADMIN PAY', 'WSSC - ADMIN - PERMANENT PAY', 'DAILY WAGES', 'HBL', 'HBL SWAT', 'e55678', 'CASH', '234565432', '345678876543', 6, 'YES', 'EMPLOYEE PAY CLASSIFICATION WSSC', 'S-2', 'MANAGMENT', 'DY- MANAGER - ADMIN & PROCUREMENT', 'BANK TRANSFER', 'ON-DUTY', 100006, 10001343, '01 06 2022', '20 09 2024', '', 100008, '', '', 'WSSC', '', '', 34),
(17, '', 'Riayat', '', 'Khan', 'Dilawar Khan', '56465465464677', 'email@email.com', '', '', '', '', '', '', '', '0000-00-00', 'ISLAM', 'Mail', '', '', '', '', '', '', '', 'WSSC - ADMIN PAY', 'WSS-PAY', 'WSSC - ADMIN PAY', 'TMA - ADMIN - PERMANENT PAY', 'DAILY WAGES', 'BOK', 'KBO SWAT', '6545645664', 'CHIQ', '', '', 7, 'NO', 'EMPLOYEE PAY CLASSIFICATION WSSC', 'M-1', 'ADMINISTRATION', 'MANAGER SOLID WASTE', 'CHEQUE', 'ON-DUTY', 100008, 10001343, '01 06 2022', '20 09 2024', '0000-00-00', 10000019, '', '', 'WSSC', '', '', 34),
(18, '', 'test', '', 'five', 'father', '13224124141234', 'erefm@email.com', 'asdjfjlk', 'afskjkl', 'slkdfjkl', '', '', '', '', '12 08 1999', 'ISLAM', 'Mail', '', '', '', '', '', '', '', 'WSSC - ADMIN PAY', 'WSSC PAY', 'WSSC - ADMIN PAY', 'WSSC - ADMIN - PERMANENT PAY', 'DECEASED SON', '', '', '', '', '', '', 6, 'NO', 'WSSC ADMIN PAY - CONTRACTUAL', 'BPS-6', 'SANITATION', 'AM - HR', '', 'REJECT', 100005, 10000019, '01 06 2022', '01 06 2024', '', 100008, '', '', 'WSSC', '', '', 34);

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
  `Emptype` varchar(255) DEFAULT NULL,
  `typeUpdate` varchar(255) DEFAULT NULL,
  `DY_SupervisorUpdate` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `Change By` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `AuthBy` varchar(255) DEFAULT NULL,
  `leaveAlreadyAvailedUpdate` int(255) NOT NULL DEFAULT 34
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employeedataupdate`
--

INSERT INTO `employeedataupdate` (`Id`, `IdUpdate`, `imageUpdate`, `fNameUpdate`, `mNameUpdate`, `lNameUpdate`, `father_NameUpdate`, `CNICUpdate`, `emailUpdate`, `pAddressUpdate`, `cAddressUpdate`, `cityUpdate`, `postAddressUpdate`, `mNumberUpdate`, `ofphNumberUpdate`, `Alternate_NumberUpdate`, `DofBUpdate`, `religionUpdate`, `genderUpdate`, `BlGroupUpdate`, `DomicileUpdate`, `MaritalStatusUpdate`, `NextofKinUpdate`, `NextofKinCellNumberUpdate`, `ContactPersonUpdate`, `CPCNUpdate`, `Employement_GroupUpdate`, `Employee_ClassUpdate`, `Employee_GroupUpdate`, `Employee_Sub_GroupUpdate`, `Employee_QuotaUpdate`, `Salary_BankUpdate`, `Salary_BranchUpdate`, `Account_NoUpdate`, `Pay_TypeUpdate`, `EOBI_NoUpdate`, `Bill_Walved_OffUpdate`, `Weekly_Working_DaysUpdate`, `Bill_Waived_OffUpdate`, `Employee_Pay_ClassificationUpdate`, `GradeUpdate`, `DepartmentUpdate`, `Job_TiltleUpdate`, `Salary_ModeUpdate`, `StatusUpdate`, `EmployeeNoUpdate`, `Employee_ManagerUpdate`, `Joining_DateUpdate`, `Contract_Expiry_DateUpdate`, `Last_Working_DateUpdate`, `Attendance_SupervisorUpdate`, `Duty_LocationUpdate`, `Duty_PointUpdate`, `Emptype`, `typeUpdate`, `DY_SupervisorUpdate`, `status`, `Change By`, `date`, `AuthBy`, `leaveAlreadyAvailedUpdate`) VALUES
(1, 1, '', 'Admin', 'Wssc', '-', '-', '12345', 'admin@wssc.com', '-', '-', '-', '-', '-', '-', '-', '2023-09-05', '', 'Male', '-', '-', '', '-', '-', '-', '-', 'WSSC - ADMIN PAY', '', '', '', 'DECEASED SON', '', '', '-', '', '-', '-', 6, 'NO', 'EMPLOYEE PAY CLASSIFICATION WSSC', '', 'ADMINISTRATION', '', 'BANK TRANSFER', 'ON-DUTY', 100001, 10001343, '2023-10-10', '0000-00-00', '2023-10-31', 100008, '-', '-', 'WSSC', '', '', 'IN PROCESS', '100002', '2024-08-25', NULL, 34);

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

-- --------------------------------------------------------

--
-- Table structure for table `encasement`
--

CREATE TABLE `encasement` (
  `id` int(11) NOT NULL,
  `Employee` int(11) NOT NULL,
  `Ann_Leave_Entitlement` int(11) NOT NULL,
  `Ann_Leave_Availed` int(11) NOT NULL,
  `Ann_Leave_Balance` int(11) NOT NULL,
  `Ann_Leave_Payable` decimal(10,2) NOT NULL,
  `Gross_Pay_Monthly` decimal(10,2) NOT NULL,
  `Gross_Pay_Yearly` decimal(10,2) NOT NULL,
  `Gross_Pay_Daily` decimal(10,2) NOT NULL,
  `Amount_Payable` decimal(10,2) NOT NULL,
  `Bank_Branch` varchar(255) NOT NULL,
  `Account_No` varchar(255) NOT NULL,
  `Period` varchar(50) NOT NULL,
  `CEO_Status` enum('pending','accept','reject') DEFAULT 'pending',
  `Finance_Status` enum('pending','accept','reject') DEFAULT 'pending',
  `CEO_Status_Date` date DEFAULT NULL,
  `Finance_Status_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `encasement`
--

INSERT INTO `encasement` (`id`, `Employee`, `Ann_Leave_Entitlement`, `Ann_Leave_Availed`, `Ann_Leave_Balance`, `Ann_Leave_Payable`, `Gross_Pay_Monthly`, `Gross_Pay_Yearly`, `Gross_Pay_Daily`, `Amount_Payable`, `Bank_Branch`, `Account_No`, `Period`, `CEO_Status`, `Finance_Status`, `CEO_Status_Date`, `Finance_Status_Date`) VALUES
(1, 100008, 15, 0, 15, 7.50, 195000.00, 2340000.00, 6964.29, 52232.14, 'BOKKBO SWAT', '6545645664', '23-2024', 'accept', 'accept', '2024-08-09', '2024-08-09');

-- --------------------------------------------------------

--
-- Table structure for table `forgetpassword`
--

CREATE TABLE `forgetpassword` (
  `Id` int(11) NOT NULL,
  `employeeNO` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `MobileNumber` varchar(20) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Status` enum('Pending','Completed') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forgetpassword`
--

INSERT INTO `forgetpassword` (`Id`, `employeeNO`, `Email`, `MobileNumber`, `Name`, `Status`) VALUES
(1, '100001', 'shayans1215225@gmail.com', '023884242', 'test api post man', 'Pending'),
(2, '10001', 'shayans1215225@gmail.com', '023884242', 'test api post man', 'Pending'),
(3, '100005', 'shayan1215225@gmail.com', '923491916168', 'Shayan Khan', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `gratuity`
--

CREATE TABLE `gratuity` (
  `EmployeeNo` int(11) NOT NULL,
  `empNo` int(11) DEFAULT NULL,
  `EmpName` varchar(100) NOT NULL,
  `EmpDesignation` varchar(100) DEFAULT NULL,
  `Grade` varchar(50) DEFAULT NULL,
  `JoiningDate` varchar(15) DEFAULT NULL,
  `ContrExpDate` varchar(15) DEFAULT NULL,
  `TotalServiceD` int(11) DEFAULT NULL,
  `TotalServiceM` int(11) DEFAULT NULL,
  `TotalServiceY` int(11) DEFAULT NULL,
  `PeriodServiceD` int(11) DEFAULT NULL,
  `PeriodServiceM` int(11) DEFAULT NULL,
  `PeriodServiceY` int(11) DEFAULT NULL,
  `GratuityRateD` decimal(10,2) DEFAULT NULL,
  `GratuityRateM` decimal(10,2) DEFAULT NULL,
  `GratuityRateY` decimal(10,2) DEFAULT NULL,
  `ServiceGratuityBreakupD` decimal(10,2) DEFAULT NULL,
  `ServiceGratuityBreakupM` decimal(10,2) DEFAULT NULL,
  `ServiceGratuityBreakupY` decimal(10,2) DEFAULT NULL,
  `PeriodGratuityBreakupD` decimal(10,2) DEFAULT NULL,
  `PeriodGratuityBreakupM` decimal(10,2) DEFAULT NULL,
  `PeriodGratuityBreakupY` decimal(10,2) DEFAULT NULL,
  `TotalPeriodGratuity` decimal(10,2) DEFAULT NULL,
  `TotalServiceGratuity` decimal(10,2) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `CEO_Status` enum('pending','accept','reject') DEFAULT 'pending',
  `CEO_Status_Date` date DEFAULT NULL,
  `Finance_Status` enum('pending','accept','reject') DEFAULT 'pending',
  `Finance_Status_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gratuity`
--

INSERT INTO `gratuity` (`EmployeeNo`, `empNo`, `EmpName`, `EmpDesignation`, `Grade`, `JoiningDate`, `ContrExpDate`, `TotalServiceD`, `TotalServiceM`, `TotalServiceY`, `PeriodServiceD`, `PeriodServiceM`, `PeriodServiceY`, `GratuityRateD`, `GratuityRateM`, `GratuityRateY`, `ServiceGratuityBreakupD`, `ServiceGratuityBreakupM`, `ServiceGratuityBreakupY`, `PeriodGratuityBreakupD`, `PeriodGratuityBreakupM`, `PeriodGratuityBreakupY`, `TotalPeriodGratuity`, `TotalServiceGratuity`, `Date`, `CEO_Status`, `CEO_Status_Date`, `Finance_Status`, `Finance_Status_Date`) VALUES
(1, 100008, 'Riayat Khan', 'MANAGER SOLID WASTE', 'M-1', '01 06 2022', '20 09 2024', 30, 9, 1, 1, 3, 0, 6964.00, 195000.00, 0.00, 6500.00, 1755000.00, 195000.00, 195000.00, 585000.00, 0.00, 780000.00, 1956500.00, '2024-08-09', 'accept', '2024-08-09', 'accept', '2024-08-09'),
(2, 100006, 'Riayat Khan', 'MANAGER SOLID WASTE', 'M-1', '01 06 2022', '20 09 2024', 30, 9, 1, 1, 3, 0, 6964.00, 195000.00, 0.00, 6500.00, 1755000.00, 195000.00, 195000.00, 585000.00, 0.00, 780000.00, 1956500.00, '2024-08-09', 'pending', '2024-08-09', 'pending', '2024-08-09');

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
(1, '2024-08-05', '2024-03-03', 'Sunday', 'Weekly Holiday'),
(2, '2024-08-05', '2024-03-10', 'Sunday', 'Weekly Holiday'),
(3, '2024-08-05', '2024-03-17', 'Sunday', 'Weekly Holiday'),
(4, '2024-08-05', '2024-03-24', 'Sunday', 'Weekly Holiday'),
(5, '2024-08-05', '2024-03-31', 'Sunday', 'Weekly Holiday');

-- --------------------------------------------------------

--
-- Table structure for table `leavereq`
--

CREATE TABLE `leavereq` (
  `Id` int(11) NOT NULL,
  `EmployeeNo` int(11) DEFAULT NULL,
  `PhoneNumberOnLeave` varchar(15) DEFAULT NULL,
  `LeaveType` varchar(255) DEFAULT NULL,
  `LeaveFrom` varchar(20) DEFAULT NULL,
  `LeaveTo` varchar(20) DEFAULT NULL,
  `TotalDays` int(11) DEFAULT NULL,
  `LeaveAvailed` int(11) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Statusofmanger` varchar(255) DEFAULT 'PENDING',
  `StatusofGm` varchar(255) DEFAULT 'PENDING',
  `DateofApply` varchar(20) NOT NULL,
  `DateOfAccepManager` varchar(20) NOT NULL,
  `DateOfAccepGm` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, NULL, NULL, 'admin@wssc.com', 'Wssc@123', 100001, 'Admin'),
(2, NULL, NULL, 'hr@wssc.com', 'Wssc@123', 100002, 'HR manager'),
(3, 'CEO', 'Male', 'ceo@wssc.com', 'wssc@123', 100003, 'CEO'),
(4, 'paryroll', '', 'payroll@gmail.com', 'Wssc@123', 100004, 'Payroll manager'),
(5, 'GM', '', 'gm@wssc.com', 'Wssc@123', 10000019, 'GM'),
(6, 'Manager', '', 'manag@wssc.com', 'Wssc@123', 10001343, 'Manager'),
(7, 'shayan khan', '', 'supervisor@wssc.com', 'Wssc@123', 100008, 'Supervisor'),
(8, 'khan g', '', 'finance125225@wssc.com', 'Wssc@123', 100006, 'FinanceAdmin');

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE `master` (
  `id` int(11) NOT NULL,
  `Perant` varchar(255) NOT NULL,
  `drop` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`id`, `Perant`, `drop`, `name`) VALUES
(1, '0', 'WSSC - ADMIN PAY', 'EmpGroup'),
(6, '0', 'DECEASED SON', 'Employee_Quota'),
(15, '0', 'ADMIN', 'Type'),
(16, '0', 'CEO', 'Type'),
(17, '0', 'DY_ MANAGER', 'Type'),
(18, '0', 'FINANCE', 'Type'),
(19, '0', 'EMPLOYEE', 'Type'),
(20, '0', 'GM', 'Type'),
(21, '0', 'BANK TRANSFER', 'Salary_Mode'),
(22, '0', 'CHEQUE', 'Salary_Mode'),
(23, '0', 'CONTRACT EXP', 'Status'),
(24, '0', 'ON-DUTY', 'Status'),
(25, '0', 'SUPERVISO', 'Type'),
(26, '0', 'MANAGER', 'Type'),
(32, '0', 'CHIQ', 'PayType'),
(33, '0', 'CASH', 'PayType'),
(34, '0', '5', 'WeeklyWorkingDays'),
(36, '0', 'FATHER', 'dependertype'),
(37, '0', 'ISLAM', 'Religion'),
(38, '0', 'HUNDU', 'Religion'),
(39, '0', 'CHRISTIANITY', 'Religion'),
(40, '0', 'JEWISH', 'Religion'),
(41, '0', 'TMA-ADMIN PAY', 'EmpGroup'),
(45, '0', 'DAILY WAGES', 'Employee_Quota'),
(51, '0', 'DALY', 'PayType'),
(52, '0', '6', 'WeeklyWorkingDays'),
(53, '0', '7', 'WeeklyWorkingDays'),
(54, '0', 'EMPLOYEE PAY CLASSIFICATION TMA', 'Employee_Pay_Classification'),
(55, '0', 'EMPLOYEE PAY CLASSIFICATION WSSC', 'Employee_Pay_Classification'),
(59, '0', 'NEW', 'Status'),
(60, '0', 'MOTHER', 'dependertype'),
(61, '0', 'SON', 'dependertype'),
(69, 'WSSC', 'WSSC PAY', 'Employee_Class'),
(70, 'TMA', 'TMA PAY', 'Employee_Class'),
(71, 'TMA PAY', 'TMA - ADMIN PAY', 'Employee_Group'),
(72, 'WSSC PAY', 'WSSCS - ADMIN PAY', 'Employee_Group'),
(73, 'WSSCS - ADMIN PAY', 'WSSCS - ADMIN - CONTINGENT PAY', 'Employee_Sub_Group'),
(75, '', 'HBL', 'SalaryBank'),
(76, '', 'UBL', 'SalaryBank'),
(77, 'HBL', 'HBL SWAT', 'SalaryBankBranch'),
(81, 'WSSC', 'ADMINISTRATION', 'Department'),
(82, 'WSSC', 'TEST', 'Job_Tiltle'),
(83, 'WSSC', 'M-1', 'Grade'),
(84, 'TMA PAY', 'TMA - COMMERCIAL', 'Employee_Group'),
(85, 'WSSC PAY', 'WSSCS - COMMERCIAL', 'Employee_Group'),
(86, 'TMA - ADMIN PAY', 'TMA - ADMIN - PERMANENT PAY', 'Employee_Sub_Group'),
(87, 'TMA - COMMERCIAL', 'TMA - COMMERCIAL - PERMANENT PAY', 'Employee_Sub_Group'),
(88, 'UBL', 'UBL SWAT', 'SalaryBankBranch'),
(89, 'WSSC', 'M-2', 'Grade'),
(90, 'TMA', 'S-1', 'Grade'),
(91, 'TMA', 'S-2', 'Grade'),
(92, 'WSSC', 'SANITATION', 'Department'),
(93, 'TMA', 'COMMERCIAL', 'Department'),
(94, 'WSSC', 'TESTWSSC1', 'Job_Tiltle'),
(95, 'TMA', 'TESTTMA1', 'Job_Tiltle');

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
  `Date` varchar(20) DEFAULT NULL,
  `timeperiod` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `Promotion_Date` varchar(10) NOT NULL,
  `Promotion_Number` varchar(255) NOT NULL,
  `Department1` varchar(255) NOT NULL,
  `Acting` varchar(255) NOT NULL,
  `Remarks` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 200000.00, 17, 1, '', '2024-08-09'),
(2, 5000.00, 17, 2, '', '2024-08-09'),
(3, 2000.00, 17, 3, '', '2024-08-09'),
(4, 0.00, 17, 5, '', '2024-08-09'),
(5, 0.00, 17, 6, '', '2024-08-09'),
(6, 0.00, 17, 7, '', '2024-08-09');

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

-- --------------------------------------------------------

--
-- Table structure for table `spouse`
--

CREATE TABLE `spouse` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `Spouse_Name` varchar(255) DEFAULT NULL,
  `CNIC` varchar(13) DEFAULT NULL,
  `Date_of_B` varchar(10) DEFAULT NULL,
  `Father_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabill`
--

CREATE TABLE `tabill` (
  `TAid` int(11) NOT NULL,
  `EmployeeNo` int(11) DEFAULT NULL,
  `RequestNoTravel` int(11) DEFAULT NULL,
  `BillNo` int(11) DEFAULT NULL,
  `BillDate` varchar(20) DEFAULT NULL,
  `TravelAllowance` decimal(10,2) DEFAULT NULL,
  `DailyAllowance` decimal(10,2) DEFAULT NULL,
  `NightAllowance` decimal(10,2) DEFAULT NULL,
  `BillStatus` varchar(255) DEFAULT NULL,
  `Statusofmanger` varchar(255) DEFAULT 'PENDING',
  `StatusofGm` varchar(255) DEFAULT 'PENDING',
  `DateofApply` varchar(20) DEFAULT NULL,
  `DateOfAccepManager` varchar(20) DEFAULT NULL,
  `DateOfAccepGm` varchar(20) DEFAULT NULL
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
(1, '2024-08-05', '2024-03-01', '2024-03-31', 26, 'ACCEPT', '2024-08-09');

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
  `From` varchar(10) NOT NULL,
  `To` varchar(10) NOT NULL,
  `Duration` varchar(255) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `Worked_From` varchar(10) DEFAULT NULL,
  `Transfer_Date` date DEFAULT NULL,
  `file` varchar(255) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'PENDING',
  `ToGrade` varchar(255) NOT NULL,
  `ToDepartment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `DepartureOn` varchar(10) DEFAULT NULL,
  `ReturnDate` varchar(10) DEFAULT NULL,
  `TravelMode` varchar(255) DEFAULT NULL,
  `Justification` text DEFAULT NULL,
  `Statusofmanger` varchar(255) DEFAULT 'PENDING',
  `StatusofGm` varchar(255) DEFAULT 'PENDING',
  `DateOfAccepManager` varchar(20) DEFAULT NULL,
  `DateOfAccepGm` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  ADD KEY `Employeeid` (`Employeeid`),
  ADD KEY `fk_timeperiodId` (`timeperiodId`);

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
  ADD UNIQUE KEY `EmployeeNo` (`EmployeeNo`),
  ADD UNIQUE KEY `uc_status_cnic` (`Status`,`CNIC`);

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
-- Indexes for table `encasement`
--
ALTER TABLE `encasement`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_emp_period` (`Employee`,`Period`);

--
-- Indexes for table `forgetpassword`
--
ALTER TABLE `forgetpassword`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `gratuity`
--
ALTER TABLE `gratuity`
  ADD PRIMARY KEY (`EmployeeNo`),
  ADD KEY `fk_empNo` (`empNo`);

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
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Employee_id` (`Employee_id`),
  ADD KEY `Employee_id_2` (`Employee_id`);

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
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Training_Serial_Number` (`Training_Serial_Number`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `allowancesrateupdate`
--
ALTER TABLE `allowancesrateupdate`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `atandece`
--
ALTER TABLE `atandece`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `child`
--
ALTER TABLE `child`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `earning_deduction_fund`
--
ALTER TABLE `earning_deduction_fund`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employeedata`
--
ALTER TABLE `employeedata`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `employeedataupdate`
--
ALTER TABLE `employeedataupdate`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_performance`
--
ALTER TABLE `employee_performance`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `encasement`
--
ALTER TABLE `encasement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `forgetpassword`
--
ALTER TABLE `forgetpassword`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gratuity`
--
ALTER TABLE `gratuity`
  MODIFY `EmployeeNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `leavereq`
--
ALTER TABLE `leavereq`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `master`
--
ALTER TABLE `master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `payrole`
--
ALTER TABLE `payrole`
  MODIFY `Allownceid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spouse`
--
ALTER TABLE `spouse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tabill`
--
ALTER TABLE `tabill`
  MODIFY `TAid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `timeperiod`
--
ALTER TABLE `timeperiod`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `travelrequest`
--
ALTER TABLE `travelrequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `atandece`
--
ALTER TABLE `atandece`
  ADD CONSTRAINT `atandece_ibfk_1` FOREIGN KEY (`Employeeid`) REFERENCES `employeedata` (`EmployeeNo`),
  ADD CONSTRAINT `fk_Employeeid` FOREIGN KEY (`Employeeid`) REFERENCES `employeedata` (`EmployeeNo`),
  ADD CONSTRAINT `fk_timeperiodId` FOREIGN KEY (`timeperiodId`) REFERENCES `timeperiod` (`ID`);

--
-- Constraints for table `encasement`
--
ALTER TABLE `encasement`
  ADD CONSTRAINT `fk_empNo_new` FOREIGN KEY (`Employee`) REFERENCES `employeedata` (`EmployeeNo`);

--
-- Constraints for table `gratuity`
--
ALTER TABLE `gratuity`
  ADD CONSTRAINT `fk_empNo` FOREIGN KEY (`empNo`) REFERENCES `employeedata` (`EmployeeNo`);

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
