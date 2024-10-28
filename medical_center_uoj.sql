-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2024 at 06:14 AM
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
-- Database: `medical_center`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_name` varchar(5) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_name`, `admin_password`) VALUES
('admin', 'admin'),
('admin', '$2y$10$sf1MhNcRVF.MCUsD7fNIrOzjpzyyfXUHQoxKR4FPu1qLqVan6K4aO');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `reg_number` varchar(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `remark` varchar(300) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `number`, `reg_number`, `name`, `email`, `date`, `remark`, `gender`) VALUES
(135, 1, '2021-CSC-08', 'K.S.N. Perera', 'snirthana1@gmail.com', '2024-10-23', '', ''),
(137, 89, '2021CSC081', 'K.S.N. Perera', 'snirthana1@gamil.com', '2024-10-26', 'Sick', 'Male'),
(138, 47, '2021CSC081', 'K.S.N. Perera', 'snirthana1@gamil.com', '2024-10-26', '', 'Male'),
(139, 26, '2021CSC081', 'K.S.N. Perera', 'snirthana1@gamil.com', '2024-10-26', '', 'Male'),
(140, 1, '2021CSC081', 'K.S.N. Perera', 'snirthana1@gamil.com', '2024-10-28', '', 'Male'),
(141, 2, '2021CSC081', 'K.S.N. Perera', 'snirthana1@gamil.com', '2024-10-28', '', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `dr_id` int(11) NOT NULL,
  `dr_name` varchar(100) NOT NULL,
  `hospital` varchar(30) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `contact_no` int(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL DEFAULT 'newDoctor1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`dr_id`, `dr_name`, `hospital`, `nic`, `contact_no`, `address`, `email`, `gender`, `password`) VALUES
(20, 'J. Srikandarajah', 'Medical Center', '196632822435', 769090987, 'Jaffna', 'srikandarajah66@gmail.com', 'Female', '$2y$10$QCYYeXwXWhOWBr6yuN15AOFlAm18SuCKlUizBhjnuHiylUbaj0KCu'),
(21, 'J. Lawrence', 'Medical Center', '197535173935', 766545782, 'Jaffna', 'lawrence75@gmail.com', 'Male', '$2y$10$QCYYeXwXWhOWBr6yuN15AOFlAm18SuCKlUizBhjnuHiylUbaj0KCu'),
(30, 'J. Srikandarajah', 'Medical Center', '200127402679', 769090987, 'Jaffna', 'srikandarajah66@gmail.com', 'Female', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `reg_number` varchar(12) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `name_with_initials` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `mobile_number` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `residential_address` varchar(100) NOT NULL,
  `permenent_address` varchar(100) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `martial_status` varchar(10) NOT NULL,
  `faculty` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `height` float NOT NULL,
  `weight` float NOT NULL,
  `gardian_name` varchar(50) NOT NULL,
  `relation` varchar(50) NOT NULL,
  `contact_number` int(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `blood_group` varchar(5) DEFAULT NULL,
  `last_school_attend` varchar(30) DEFAULT NULL,
  `profile_photo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`reg_number`, `full_name`, `name_with_initials`, `gender`, `dob`, `mobile_number`, `email`, `residential_address`, `permenent_address`, `nic`, `martial_status`, `faculty`, `department`, `height`, `weight`, `gardian_name`, `relation`, `contact_number`, `password`, `blood_group`, `last_school_attend`, `profile_photo`) VALUES
('2021CSC081', 'Savidya Nirthana Perera', 'K.S.N. Perera', 'Male', '2001-09-30', 714322410, 'snirthana1@gamil.com', 'Kelaniya', 'Jaffna', '200127402679', 'Single', 'Science', 'Computer Science', 150, 60, 'K.S.P.Perera', 'Farther', 2147483647, '$2y$10$8cTGUakkkB2PQl5bFNG9luu8.vLuVlZbxolmJaOMl/acqcwcpehKO', 'O+', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`dr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `dr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
