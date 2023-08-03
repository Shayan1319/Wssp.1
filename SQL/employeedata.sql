-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2023 at 09:08 PM
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
-- Table structure for table `employeedata`
--

CREATE TABLE `employeedata` (
  `Id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `fName` varchar(255) DEFAULT NULL,
  `mName` varchar(255) DEFAULT NULL,
  `lName` varchar(255) DEFAULT NULL,
  `father_Name` varchar(255) DEFAULT NULL,
  `CNIC` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pAddress` varchar(255) DEFAULT NULL,
  `cAddress` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `postAddress` varchar(255) DEFAULT NULL,
  `mNumber` varchar(255) DEFAULT NULL,
  `ofphNumber` varchar(255) DEFAULT NULL,
  `Alternate_Number` varchar(255) DEFAULT NULL,
  `DofB` date DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `BlGroup` varchar(255) DEFAULT NULL,
  `Domicile` varchar(255) DEFAULT NULL,
  `MaritalStatus` varchar(255) DEFAULT NULL,
  `NextofKin` varchar(255) DEFAULT NULL,
  `NextofKinCellNumber` varchar(255) DEFAULT NULL,
  `ContactPerson` varchar(255) DEFAULT NULL,
  `CPCN` varchar(255) DEFAULT NULL,
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
  `Weekly_Working_Days` varchar(255) DEFAULT NULL,
  `Bill_Waived_Off` varchar(255) DEFAULT NULL,
  `Employee_Pay_Classification` varchar(255) DEFAULT NULL,
  `Grade` varchar(255) DEFAULT NULL,
  `Department` varchar(255) DEFAULT NULL,
  `Job_Tiltle` varchar(255) DEFAULT NULL,
  `Salary_Mode` varchar(255) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `EmployeeNo` varchar(255) DEFAULT NULL,
  `Employee_Manager` varchar(255) DEFAULT NULL,
  `Joining_Date` date DEFAULT NULL,
  `Contract_Expiry_Date` date DEFAULT NULL,
  `Last_Working_Date` date DEFAULT NULL,
  `Attendance_Supervisor` varchar(255) DEFAULT NULL,
  `Duty_Location` varchar(255) DEFAULT NULL,
  `Duty_Point` varchar(255) DEFAULT NULL,
  `Online Status` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employeedata`
--

INSERT INTO `employeedata` (`Id`, `image`, `fName`, `mName`, `lName`, `father_Name`, `CNIC`, `email`, `pAddress`, `cAddress`, `city`, `postAddress`, `mNumber`, `ofphNumber`, `Alternate_Number`, `DofB`, `religion`, `gender`, `BlGroup`, `Domicile`, `MaritalStatus`, `NextofKin`, `NextofKinCellNumber`, `ContactPerson`, `CPCN`, `Employement_Group`, `Employee_Class`, `Employee_Group`, `Employee_Sub_Group`, `Employee_Quota`, `Salary_Bank`, `Salary_Branch`, `Account_No`, `Pay_Type`, `EOBI_No`, `Bill_Walved_Off`, `Weekly_Working_Days`, `Bill_Waived_Off`, `Employee_Pay_Classification`, `Grade`, `Department`, `Job_Tiltle`, `Salary_Mode`, `Status`, `EmployeeNo`, `Employee_Manager`, `Joining_Date`, `Contract_Expiry_Date`, `Last_Working_Date`, `Attendance_Supervisor`, `Duty_Location`, `Duty_Point`, `Online Status`, `type`) VALUES
(8, '', '', '', '', '', '1213', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', 'Choose Permanent/Daily Wages', 'Select', 'Select', 'Select', 'Select', '', 'Select', 'Select', 'Select', 'Select', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', 'Block', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employeedata`
--
ALTER TABLE `employeedata`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employeedata`
--
ALTER TABLE `employeedata`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
