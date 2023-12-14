-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 11:04 AM
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
  `status` varchar(255) DEFAULT NULL,
  `ManagerStatus` varchar(255) NOT NULL DEFAULT 'PENDING',
  `ManagerStatusDate` date DEFAULT NULL,
  `GMStatus` varchar(255) NOT NULL DEFAULT 'PENDING',
  `GMStatusData` date DEFAULT NULL,
  `PayrollStatus` varchar(255) NOT NULL DEFAULT 'PENDING',
  `PayrollStatusDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, '', 'Emp1', 'name', '-', '-', '123455431', 'email@email.com', '-', '-', '-', '-', '-', '-', '-', '2023-09-07', '-', 'Male', '-', '-', ' Unmarried', '-', '-', '-', '-', 'WSSC - ADMIN PAY', 'TMA PAY', 'WSSC - COMMERCIAL', 'TMA - ADMIN - PERMANENT PAY', 'DECEASED SON', '-', '-', '-', '-', '-', '-', 5, '-', '-', '', 'ADMINISTRATION', 'CHIEF EXECUTIVE OFFICER', 'BANK TRANSFER', 'CONTRACT EXP', 100002, 100006, '2023-09-30', '2023-10-27', '2023-10-27', NULL, '-', '-', 'ACCPET', '', '100003', 34);

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
-- Table structure for table `holidays`
--

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
(2, NULL, NULL, 'hr@wssc.com', 'Wssc@123', 100002, 'HR manager');

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE `master` (
  `id` int(11) NOT NULL,
  `drop` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `CNIC` varchar(15) DEFAULT NULL,
  `Date_of_B` date DEFAULT NULL,
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `allowancesrateupdate`
--
ALTER TABLE `allowancesrateupdate`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `atandece`
--
ALTER TABLE `atandece`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employeedataupdate`
--
ALTER TABLE `employeedataupdate`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_performance`
--
ALTER TABLE `employee_performance`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leavereq`
--
ALTER TABLE `leavereq`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `master`
--
ALTER TABLE `master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payrole`
--
ALTER TABLE `payrole`
  MODIFY `Allownceid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabill`
--
ALTER TABLE `tabill`
  MODIFY `TAid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timeperiod`
--
ALTER TABLE `timeperiod`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
