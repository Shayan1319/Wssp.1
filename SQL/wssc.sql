-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2024 at 12:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wssc`
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
(2, 'OVER TIME', 'GROSS PAY', 'OVERTIME', 'EARNING', 'ACTIVE', 800),
(3, 'DOUBLE DUTY', 'GROSS PAY', 'DOUBLE DUTY', 'EARNING', 'ACTIVE', 1200),
(4, 'LEAVE', 'GROSS PAY', 'PRESENT RATE', 'EARNING', 'ACTIVE', 1);

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
(1, 0, 'OVER TIME', 800, 2),
(2, 0, 'DOUBLE DUTY', 1200, 3);

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
  `ManagerStatus` varchar(255) NOT NULL DEFAULT 'PENDING',
  `ManagerStatusDate` date DEFAULT NULL,
  `GMStatus` varchar(255) NOT NULL DEFAULT 'PENDING',
  `GMStatusData` date DEFAULT NULL,
  `PayrollStatus` varchar(255) NOT NULL DEFAULT 'PENDING',
  `PayrollStatusDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, '', 'Admin', 'Wssc', '-', '-', '12345', 'admin@wssc.com', '-', '-', '-', '-', '-', '-', '-', '2023-09-05', '', 'Male', '-', '-', '', '-', '-', '-', '-', 'WSSC - ADMIN PAY', '', '', '', 'DECEASED SON', '', '', '-', '', '-', '-', 6, 'NO', 'EMPLOYEE PAY CLASSIFICATION WSSC', '', 'ADMINISTRATION', 'CHIEF EXECUTIVE OFFICER', 'BANK TRANSFER', 'ON-DUTY', 100001, 10001343, '2023-10-10', '2023-10-10', '2023-10-31', 0, '-', '-', 'ACCEPT', '', '', 34),
(2, '', 'Emp1', 'name', '-', '-', '123455431', 'email@email.com', '-', '-', '-', '-', '-', '-', '-', '2023-09-07', '', 'Male', '-', '-', '', '-', '-', '-', '-', 'WSSC - ADMIN PAY', 'WSS-PAY', 'WSSC - ADMIN PAY', 'TMA - ADMIN - PERMANENT PAY', 'DECEASED SON', 'HBL', 'HBL SWAT', '-', '', '-', '-', 5, 'NO', 'EMPLOYEE PAY CLASSIFICATION WSSC', '', 'ADMINISTRATION', 'CHIEF EXECUTIVE OFFICER', 'BANK TRANSFER', 'ON-DUTY', 100002, 10001343, '2023-09-30', '2023-10-27', '2023-10-27', 10000019, '-', '-', 'ACCPET', '', '100003', 34),
(3, '', 'CEO', 'CEO', '', '-', '12345678900', 'shan@gmail.comn', '-', '-', '-', '', '-', '-', '-', '0000-00-00', 'ISLAM', 'Male', '-', '-', '', '-', '', '-', '-', 'WSSC - ADMIN PAY', 'WSS-PAY', 'WSSC - ADMIN PAY', 'WSSC - ADMIN - PERMANENT PAY', '', '', '', '', '', '', '', 6, 'NO', 'EMPLOYEE PAY CLASSIFICATION WSSC', 'M-2', '', 'CHIEF EXECUTIVE OFFICER', '', 'ON-DUTY', 100003, 10001343, '0000-00-00', '0000-00-00', '0000-00-00', 10000019, '', '', 'ACCEPT', '', '', 34),
(4, '', 'Shayan', '', 'Khan', 'Riayat Khan', '263524728', 'payroll@wssc.com', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 'WSSC - ADMIN PAY', 'TMA PAY', '', 'TMA - ADMIN - PERMANENT PAY', 'DECEASED SON', '', '', '12444', '', '-', '-', 0, 'NO', 'EMPLOYEE PAY CLASSIFICATION WSSC', 'M-1', 'ADMINISTRATION', 'DY- MANAGER - ADMIN & PROCUREMENT', 'BANK TRANSFER', 'ON-DUTY', 100004, 10001343, '2024-01-27', '2024-06-28', '2024-07-31', 10000019, 'Jehanger', 'Jehanger', 'ACCPET', '', '', 34),
(5, '', 'Shayan', '', 'Khan', 'Riayat Khan', '3740560259313', 'kurtlar125225@gmail.com', 'Jehangira Sawabi', 'Jehangiara', 'Jehangiara', 'Jehangira', '03491616168', '03091991002', '', '1999-08-28', '', '', 'B+', 'Swabi', '', 'kdfjkjsdf', 'fasdfasdf', '-', '-', 'WSSC - ADMIN PAY', 'TMA PAY', '', 'TMA - ADMIN - PERMANENT PAY', 'DECEASED SON', 'HBL', 'KBO SWAT', '21345', 'CASH', '2134', '34235345', 5, 'YES', '', 'M-1', 'ADMINISTRATION', 'MANAGER SOLID WASTE', 'BANK TRANSFER', 'ON-DUTY', 10000019, 10001343, '2024-02-01', '2024-02-29', '2024-02-29', 100003, 'JEHANGIRA', 'JEHANGIRA', 'WSSC', 'MANAGER', '10001343', 34),
(15, '', 'kjsadlfkas', 'klsdfkl', 'kldsfkjl', 'dklfksl', '12345678908765', 'shayanm@gmail.com', 'kasdfj', 'lsdkfkl', 'sdfljkslk', 'kjsfdlk', '7898', '7', '989', '9887-08-08', 'iaflkjasdf', '', 'kasdf', 'asdfasf', '', 'adfasdf', '4323234', 'dfsdsdf', '234234', 'WSSC - ADMIN PAY', 'TMA PAY', 'WSSC - ADMIN PAY', 'TMA - ADMIN - PERMANENT PAY', 'DECEASED SON', 'HBL', '', '', '', '', '', 5, 'NO', 'fsdfasdf', 'M-1', 'ADMINISTRATION', 'CHIEF EXECUTIVE OFFICER', 'BANK TRANSFER', 'ON-DUTY', 10001343, 100003, '2024-01-30', '2024-03-02', '2024-03-02', 100002, 'sdfsdsadfasdf', 'sdfasd', 'WSSC', 'DY_ MANAGER', '', 34),
(16, '', 'Abdul', 'moaez', 'Khan', 'Riayat khan', '12343234565434', 'abd@gmail.co', '', '', '', '', '', '', '', '0000-00-00', 'ISLAM', 'Mail', '', '', '', '', '', '', '', 'WSSC - ADMIN PAY', 'WSS-PAY', 'WSSC - ADMIN PAY', 'WSSC - ADMIN - PERMANENT PAY', 'DAILY WAGES', 'HBL', 'HBL SWAT', 'e55678', 'CASH', '234565432', '345678876543', 6, 'YES', 'EMPLOYEE PAY CLASSIFICATION WSSC', 'S-2', 'MANAGMENT', 'DY- MANAGER - ADMIN & PROCUREMENT', 'BANK TRANSFER', 'ON-DUTY', 100006, 10001343, '01 04 2024', '20 09 2024', '', 10000019, '', '', 'WSSC', '', '', 34),
(17, '', 'Riayat', '', 'Khan', 'Dilawar Khan', '56465465464677', 'email@email.com', '', '', '', '', '', '', '', '0000-00-00', 'ISLAM', 'Mail', '', '', '', '', '', '', '', 'WSSC - ADMIN PAY', 'WSS-PAY', 'WSSC - ADMIN PAY', 'TMA - ADMIN - PERMANENT PAY', 'DAILY WAGES', 'BOK', 'KBO SWAT', '6545645664', 'CHIQ', '', '', 7, 'NO', 'EMPLOYEE PAY CLASSIFICATION WSSC', 'M-1', 'ADMINISTRATION', 'MANAGER SOLID WASTE', 'CHEQUE', 'ON-DUTY', 100008, 10001343, '30 04 2024', '20 09 2024', '0000-00-00', 10000019, '', '', 'WSSC', '', '', 34),
(18, '', 'test', '', 'five', 'father', '13224124141234', 'erefm@email.com', 'asdjfjlk', 'afskjkl', 'slkdfjkl', '', '', '', '', '12 08 1999', 'ISLAM', 'Mail', '', '', '', '', '', '', '', 'WSSC - ADMIN PAY', 'WSSC PAY', 'WSSC - ADMIN PAY', 'WSSC - ADMIN - PERMANENT PAY', 'DECEASED SON', '', '', '', '', '', '', 6, 'NO', 'WSSC ADMIN PAY - CONTRACTUAL', 'BPS-6', 'SANITATION', 'AM - HR', '', 'NEW', 100005, 10000019, '01 06 2024', '01 06 2024', '', 100004, '', '', 'WSSC', '', '', 34);

--
-- Indexes for dumped tables
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
  `date` date,
  `AuthBy` varchar(255) DEFAULT NULL,
  `leaveAlreadyAvailedUpdate` int(255) NOT NULL DEFAULT 34
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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



CREATE TABLE `holidays` (
  `ID` int(11) NOT NULL,
  `DateOfSub` date DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Day` varchar(10) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(6, 'Manager', '', 'manag@wssc.com', 'Wssc@123', 10001343, 'Manager');

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
(1, 'WSSC - ADMIN PAY', 'EmpGroup'),
(2, 'TMA PAY', 'Employee_Class'),
(3, 'WSSC - ADMIN PAY', 'Employee_Group'),
(4, 'TMA - ADMIN - PERMANENT PAY', 'Employee_Sub_Group'),
(6, 'DECEASED SON', 'Employee_Quota'),
(7, 'M-1', 'Grade'),
(9, 'M-2', 'Grade'),
(10, 'ADMINISTRATION', 'Department'),
(11, 'DY- MANAGER - ADMIN & PROCUREMENT', 'Job_Tiltle'),
(12, 'GM (HR, ADMIN & PROCUREMENT)', 'Job_Tiltle'),
(13, 'CHIEF EXECUTIVE OFFICER', 'Job_Tiltle'),
(14, 'MANAGER SOLID WASTE', 'Job_Tiltle'),
(15, 'ADMIN', 'Type'),
(16, 'CEO', 'Type'),
(17, 'DY_ MANAGER', 'Type'),
(18, 'FINANCE', 'Type'),
(19, 'EMPLOYEE', 'Type'),
(20, 'GM', 'Type'),
(21, 'BANK TRANSFER', 'Salary_Mode'),
(22, 'CHEQUE', 'Salary_Mode'),
(23, 'CONTRACT EXP', 'Status'),
(24, 'ON-DUTY', 'Status'),
(25, 'SUPERVISO', 'Type'),
(26, 'MANAGER', 'Type'),
(30, 'HBL', 'SalaryBank'),
(31, 'KBO SWAT', 'SalaryBankBranch'),
(32, 'CHIQ', 'PayType'),
(33, 'CASH', 'PayType'),
(34, '5', 'WeeklyWorkingDays'),
(36, 'FATHER', 'dependertype'),
(37, 'ISLAM', 'Religion'),
(38, 'HUNDU', 'Religion'),
(39, 'CHRISTIANITY', 'Religion'),
(40, 'JEWISH', 'Religion'),
(41, 'TMA-ADMIN PAY', 'EmpGroup'),
(42, 'WSS-PAY', 'Employee_Class'),
(43, 'TMA - ADMIN PAY', 'Employee_Group'),
(44, 'WSSC - ADMIN - PERMANENT PAY', 'Employee_Sub_Group'),
(45, 'DAILY WAGES', 'Employee_Quota'),
(46, 'UBL', 'SalaryBank'),
(47, 'BOK', 'SalaryBank'),
(48, 'UBL SWAT', 'SalaryBankBranch'),
(49, 'HBL SWAT', 'SalaryBankBranch'),
(51, 'DALY', 'PayType'),
(52, '6', 'WeeklyWorkingDays'),
(53, '7', 'WeeklyWorkingDays'),
(54, 'EMPLOYEE PAY CLASSIFICATION TMA', 'Employee_Pay_Classification'),
(55, 'EMPLOYEE PAY CLASSIFICATION WSSC', 'Employee_Pay_Classification'),
(56, 'S-1', 'Grade'),
(57, 'S-2', 'Grade'),
(58, 'MANAGMENT', 'Department'),
(59, 'NEW', 'Status'),
(60, 'MOTHER', 'dependertype'),
(61, 'SON', 'dependertype');

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



CREATE TABLE `rate` (
  `id` int(11) NOT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `allowances_id` int(11) DEFAULT NULL,
  `EmployementType` varchar(255) DEFAULT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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


CREATE TABLE `timeperiod` (
  `ID` int(11) NOT NULL,
  `DateOfSub` date DEFAULT NULL,
  `FromDate` date DEFAULT NULL,
  `ToDate` date DEFAULT NULL,
  `WrokingDays` int(11) DEFAULT NULL,
  `HRStatus` varchar(255) DEFAULT 'PENDING',
  `DateOfHRStatus` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`Id`, `Training_Serial_Number`, `Training_Name`, `Institute`, `City`, `Institute_Address`, `Oblige_Sponsor`, `From`, `To`, `Duration`, `employee_id`, `Status`) VALUES
(3, '1231', 'FAFAF', 'DFA', 'DFASFA', 'ADSFSF', 'AFSF', '01 03 2024', '31 03 2024', '1', '10001343', 'ACCPET'),
(4, '34566', 'JJKHKJ', 'HKJHKJ', 'JJJKJKHJK', 'MJKHJKHKJ', 'JJKJKH', '01 04 2024', '30 04 2024', '1', '100006', 'ACCPET');

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

--
-- Dumping data for table `transfer`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `child`
--
ALTER TABLE `child`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `earning_deduction_fund`
--
ALTER TABLE `earning_deduction_fund`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employeedata`
--
ALTER TABLE `employeedata`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `employeedataupdate`
--
ALTER TABLE `employeedataupdate`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_performance`
--
ALTER TABLE `employee_performance`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leavereq`
--
ALTER TABLE `leavereq`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `master`
--
ALTER TABLE `master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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

--
-- Table structure for table `gratuity`
--

CREATE TABLE `gratuity` (
  `EmployeeNo` int(11) NOT NULL,
  `empNo` int(11) DEFAULT NULL,
  `EmpName` varchar(100) NOT NULL,
  `EmpDesignation` varchar(100) DEFAULT NULL,
  `Grade` varchar(50) DEFAULT NULL,
  `JoiningDate` date DEFAULT NULL,
  `ContrExpDate` date DEFAULT NULL,
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
  `GratuityBreakupM` decimal(10,2) DEFAULT NULL,
  `GratuityBreakupY` decimal(10,2) DEFAULT NULL,
  `TotalPeriodGratuity` decimal(10,2) DEFAULT NULL,
  `TotalServiceGratuity` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gratuity`
--
ALTER TABLE `gratuity`
  ADD PRIMARY KEY (`EmployeeNo`),
  ADD KEY `fk_empNo` (`empNo`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gratuity`
--
ALTER TABLE `gratuity`
  ADD CONSTRAINT `fk_empNo` FOREIGN KEY (`empNo`) REFERENCES `employeedata` (`EmployeeNo`);
COMMIT;

ALTER TABLE `gratuity` CHANGE `EmployeeNo` `EmployeeNo` INT(11) NOT NULL AUTO_INCREMENT; 
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
ALTER TABLE `gratuity` CHANGE `CEO_Status` `CEO_Status` ENUM('pending','accept','reject') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'pending', CHANGE `Finance_Status` `Finance_Status` ENUM('pending','accept','reject') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'pending'; 
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
-- Indexes for dumped tables
--

--
-- Indexes for table `forgetpassword`
--
ALTER TABLE `forgetpassword`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forgetpassword`
--
ALTER TABLE `forgetpassword`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;
ALTER TABLE `atandece`
ADD COLUMN `timeperiodId` INT AFTER `status`;

-- Add the foreign key constraint for timeperiodId
ALTER TABLE `atandece`
ADD CONSTRAINT `fk_timeperiodId`
FOREIGN KEY (`timeperiodId`) REFERENCES `timeperiod`(`ID`);

-- Add the foreign key constraint for Employeeid
ALTER TABLE `atandece`
ADD CONSTRAINT `fk_Employeeid`
FOREIGN KEY (`Employeeid`) REFERENCES `employeedata`(`EmployeeNo`);


-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2024 at 03:09 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Indexes for dumped tables
--

--
-- Indexes for table `encasement`
--
ALTER TABLE `encasement`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_emp_period` (`Employee`,`Period`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `encasement`
--
ALTER TABLE `encasement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `encasement`
--
ALTER TABLE `encasement`
  ADD CONSTRAINT `fk_empNo_new` FOREIGN KEY (`Employee`) REFERENCES `employeedata` (`EmployeeNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
