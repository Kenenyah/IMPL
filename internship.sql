-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2021 at 02:59 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `internship`
--

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `SemesterID` int(11) NOT NULL,
  `Semester` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`SemesterID`, `Semester`) VALUES
(1, 'Aug - Dec 2021'),
(2, 'Aug - Dec 2022'),
(3, 'Aug - Dec 2023');

-- --------------------------------------------------------

--
-- Table structure for table `setup`
--

CREATE TABLE `setup` (
  `NameUni` varchar(128) NOT NULL,
  `DeptUni` varchar(128) DEFAULT NULL,
  `AdressUni` varchar(128) DEFAULT NULL,
  `CityUni` varchar(50) DEFAULT NULL,
  `TitleProf` varchar(20) DEFAULT NULL,
  `FNProf` varchar(50) NOT NULL,
  `LNProf` varchar(50) DEFAULT NULL,
  `Semester` int(11) NOT NULL,
  `PhoneUni` varchar(20) NOT NULL,
  `URL` varchar(1000) DEFAULT NULL,
  `CourseCode` varchar(10) DEFAULT NULL,
  `CourseName` varchar(128) DEFAULT NULL,
  `Pass` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setup`
--

INSERT INTO `setup` (`NameUni`, `DeptUni`, `AdressUni`, `CityUni`, `TitleProf`, `FNProf`, `LNProf`, `Semester`, `PhoneUni`, `URL`, `CourseCode`, `CourseName`, `Pass`) VALUES
('Universidad Interamericana de PR', 'Ciencias y Tecnología', 'Avenida Interamericana #11', 'San German, PR 00683', 'Catedrático Auxiliar', 'Rafael', 'Muñoz', 1, '787-123-4561', 'http://www.sg.inter.edu/', 'COMP 4910', 'Práctica y Ética Profesional', 'Pass');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_companies`
--

CREATE TABLE `tbl_companies` (
  `CompanyID` int(11) NOT NULL,
  `CompanyName` varchar(128) NOT NULL,
  `CompOwnerFN` varchar(50) NOT NULL,
  `CompOwnerLN` varchar(50) DEFAULT NULL,
  `CompAdress` varchar(128) DEFAULT NULL,
  `CompCity` varchar(50) DEFAULT NULL,
  `CompEmail` varchar(50) NOT NULL,
  `CompPhone` varchar(25) NOT NULL,
  `CompComments` text NOT NULL,
  `CompPostAddress` varchar(128) DEFAULT NULL,
  `CompPostCity` varchar(128) DEFAULT NULL,
  `IsActive` int(1) NOT NULL DEFAULT 1,
  `OwnerPosition` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_companies`
--

INSERT INTO `tbl_companies` (`CompanyID`, `CompanyName`, `CompOwnerFN`, `CompOwnerLN`, `CompAdress`, `CompCity`, `CompEmail`, `CompPhone`, `CompComments`, `CompPostAddress`, `CompPostCity`, `IsActive`, `OwnerPosition`) VALUES
(1, 'Tesla', 'Elon', 'Musk', '3500 Deer Creek Road', 'Palo Alto, CA 94304', 'tesla@gmail.com', '123-762-9833', 'We want interns who will work 40+ hours a week', '3500 Deer Creek Road', 'Palo Alto, CA 94304', 1, 'CEO'),
(2, 'Amazon ', 'Jeff', ' Bezos', '', ' ', 'amazon@gmai.com', '987-456-0123', 'We need responsible people.', '', '', 1, NULL),
(5, 'Microsoft', 'Bill', ' ', '', ' ', 'microsoft@gmail.com', '123-987-3254', 'qwertgyhujkl', '', '', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compdeps`
--

CREATE TABLE `tbl_compdeps` (
  `DepID` int(11) NOT NULL,
  `Company` int(11) NOT NULL,
  `DepartmentName` varchar(50) NOT NULL,
  `EncargadoFN` varchar(50) NOT NULL,
  `EncargadoLN` varchar(50) DEFAULT NULL,
  `EncargadoPhone` varchar(25) DEFAULT NULL,
  `EncargadoComment` text DEFAULT NULL,
  `depEmail` varchar(50) DEFAULT NULL,
  `depPhone` varchar(25) DEFAULT NULL,
  `TituloEncargado` varchar(10) DEFAULT NULL,
  `IsActive` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_compdeps`
--

INSERT INTO `tbl_compdeps` (`DepID`, `Company`, `DepartmentName`, `EncargadoFN`, `EncargadoLN`, `EncargadoPhone`, `EncargadoComment`, `depEmail`, `depPhone`, `TituloEncargado`, `IsActive`) VALUES
(1, 1, 'Software Development', 'Jeffrey', 'Straubel', '123-423-9157', 'Everything must be ready before due date', 'SoftDev@gmail.com', '(456) 789-1724', 'Dr.', 0),
(2, 2, 'R&D', 'Jeff', 'Bezos', '123-820-9721', 'We need very smart people.', 'ResNDev@gmail.com', '(321) 546-1852', 'Dr.', 1),
(3, 5, 'Sss', 'KENNY', '', '98648+89+5', '', '', '', '', 1),
(15, 1, 'Cars', 'Elon', 'Musk', '123-456-7890', '', 'cars@gmail.com', '123-456-7890', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `StudentID` int(11) NOT NULL,
  `StudentNumber` varchar(25) NOT NULL,
  `stFirstName` varchar(25) NOT NULL,
  `stLastName` varchar(25) DEFAULT NULL,
  `stEmail` varchar(50) DEFAULT NULL,
  `stAddress` varchar(128) DEFAULT NULL,
  `stCity` varchar(128) DEFAULT NULL,
  `stPhone` varchar(25) DEFAULT NULL,
  `stDepartment` int(11) DEFAULT NULL,
  `stSemester` int(11) DEFAULT NULL,
  `stCompany` int(11) DEFAULT NULL,
  `stComments` text DEFAULT NULL,
  `Gender` int(11) NOT NULL,
  `stPostal` varchar(128) DEFAULT NULL,
  `stPostalCity` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`StudentID`, `StudentNumber`, `stFirstName`, `stLastName`, `stEmail`, `stAddress`, `stCity`, `stPhone`, `stDepartment`, `stSemester`, `stCompany`, `stComments`, `Gender`, `stPostal`, `stPostalCity`) VALUES
(29, 'E00-51-0000', 'PATTI', 'Blancovitch', 'pat@gmail.com', '', '', '', 2, 1, 2, 'saFSAFDFS', 0, '', ''),
(15, 'e00-51-2356', 'Josue', 'Soto', 'js@gmail.com', '', '', '123-456-7981', 2, 3, 2, '9845631699\r\n2+47986', 2, '', ''),
(1, 'E00-55-9145', 'Kenenyah', 'Blancovitch', 'kblancovitch@gmail.com', 'Ave. Interamericana #73', 'San German, PR 00683', '787-538-0287', 1, 1, 1, 'Can work at any time', 0, '', ''),
(17, 'E00-89-6321', 'Pepito', 'Ramirez', 'pepram@gmail.com', '', '', '321-987-5462', 1, 2, 1, 'qrgsdgasdgsdfg9847569s4g1389asd64g53', 2, '', ''),
(28, 'E00522513', 'Pathryck', 'Blanco', 'p@gmail.com', '', '', '7879006553', 2, 3, 2, '', 0, '', ''),
(26, 'E11-32-5476', 'Juan', 'Ramos', '', '', '', '654-819-6400', 1, 1, 1, 'HELLOO WORLDD', 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`SemesterID`),
  ADD UNIQUE KEY `Semester` (`Semester`) USING HASH;

--
-- Indexes for table `setup`
--
ALTER TABLE `setup`
  ADD PRIMARY KEY (`NameUni`),
  ADD KEY `Semester` (`Semester`);

--
-- Indexes for table `tbl_companies`
--
ALTER TABLE `tbl_companies`
  ADD PRIMARY KEY (`CompanyID`,`CompanyName`),
  ADD KEY `CompanyID` (`CompanyID`);

--
-- Indexes for table `tbl_compdeps`
--
ALTER TABLE `tbl_compdeps`
  ADD PRIMARY KEY (`DepID`),
  ADD KEY `Company` (`Company`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`StudentNumber`),
  ADD KEY `StudentID` (`StudentID`),
  ADD KEY `stDepartment` (`stDepartment`,`stSemester`,`stCompany`),
  ADD KEY `stCompany` (`stCompany`),
  ADD KEY `stSemester` (`stSemester`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `SemesterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_companies`
--
ALTER TABLE `tbl_companies`
  MODIFY `CompanyID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_compdeps`
--
ALTER TABLE `tbl_compdeps`
  MODIFY `DepID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `StudentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `setup`
--
ALTER TABLE `setup`
  ADD CONSTRAINT `setup_ibfk_1` FOREIGN KEY (`Semester`) REFERENCES `semesters` (`SemesterID`);

--
-- Constraints for table `tbl_compdeps`
--
ALTER TABLE `tbl_compdeps`
  ADD CONSTRAINT `tbl_compdeps_ibfk_1` FOREIGN KEY (`Company`) REFERENCES `tbl_companies` (`CompanyID`);

--
-- Constraints for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD CONSTRAINT `tbl_students_ibfk_1` FOREIGN KEY (`stDepartment`) REFERENCES `tbl_compdeps` (`DepID`),
  ADD CONSTRAINT `tbl_students_ibfk_2` FOREIGN KEY (`stCompany`) REFERENCES `tbl_companies` (`CompanyID`),
  ADD CONSTRAINT `tbl_students_ibfk_3` FOREIGN KEY (`stSemester`) REFERENCES `semesters` (`SemesterID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
