-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2019 at 09:17 PM
-- Server version: 10.3.16-MariaDB
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
-- Database: `nss_attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_date` date NOT NULL,
  `event_location` varchar(100) NOT NULL,
  `senior_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `junior_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `chief_guest` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `junior_data`
--

CREATE TABLE `junior_data` (
  `id` int(2) DEFAULT NULL,
  `name` varchar(23) DEFAULT NULL,
  `branch` varchar(6) DEFAULT NULL,
  `roll_no` int(2) DEFAULT NULL,
  `no_of_events` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `junior_data`
--

INSERT INTO `junior_data` (`id`, `name`, `branch`, `roll_no`, `no_of_events`) VALUES
(1, 'Mohd. Shaif Shaikh', 'ELEX', 36, 1),
(2, 'Mohammad Hirani', 'CMPN1', 37, 1),
(3, 'Jigar Dave', 'CMPN1', 19, 1),
(4, 'Sree Ramya Pullapantula', 'ELEX', 29, 1),
(5, 'Shweta Gusaria', 'CMPN1', 33, 1),
(6, 'Pranay Shetty', 'INFT2', 40, 1),
(7, 'Alay Shah', 'INFT2', 35, 1),
(8, 'Sanidhya Purohit', 'INFT2', 26, 1),
(9, 'Monica Suryawanshi', 'INFT2', 51, 1),
(10, 'Tanvi Thakur', 'INFT2', 52, 1),
(11, 'Shrilatha Shripathi', 'INFT2', 43, 1),
(12, 'Aaden Fernando', 'CMPN1', 23, 1),
(13, 'Shreya Matta', 'CMPN1', 60, 1),
(14, 'Kriti Kulshrestha', 'CMPN1', 53, 1),
(15, 'Tanmay Kulkarni', 'ELEX', 16, 1),
(16, 'Karneshwar Sannamani', 'ELEX', 32, 1),
(17, 'Devang Pokar', 'INFT2', 22, 1),
(18, 'Ajit Yadav', 'INFT2', 58, 1),
(19, 'Anuksha Kamaraj', 'ELEC', 6, 1),
(20, 'Pravin Pole', 'ELEC', 66, 1),
(21, 'Ashish Yadav', 'INFT2', 59, 1),
(22, 'Shraddha Rasal', 'ELEC', 67, 1),
(23, 'Swarangi Satpute', 'INFT2', 33, 1),
(24, 'Aditya Totade', 'INFT2', 53, 1),
(25, 'Ashish Verma', 'INFT1', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `junior_login`
--

CREATE TABLE `junior_login` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `junior_login`
--

INSERT INTO `junior_login` (`username`, `password`) VALUES
('junior_login', '916816ec30e79c3db594fe0bfc714fdd');

-- --------------------------------------------------------

--
-- Table structure for table `master_login`
--

CREATE TABLE `master_login` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_login`
--

INSERT INTO `master_login` (`email`, `password`) VALUES
('jishanta@gmail.com', '87127416ec9c2924c704df7267d3bfe3');

-- --------------------------------------------------------

--
-- Table structure for table `senior_data`
--

CREATE TABLE `senior_data` (
  `id` int(2) DEFAULT NULL,
  `name` varchar(18) DEFAULT NULL,
  `branch` varchar(4) DEFAULT NULL,
  `no_of_events` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `senior_data`
--

INSERT INTO `senior_data` (`id`, `name`, `branch`, `no_of_events`) VALUES
(1, 'JISHANT ACHARYA', 'CMPN', 2),
(2, 'AKSHAY AGRAWAL', 'CMPN', 2),
(3, 'KEDAR DAMANI', 'CMPN', 1),
(4, 'KAUSHIK KOLI', 'CMPN', 1),
(5, 'VAIBHAV LAKHOTIA', 'CMPN', 2),
(6, 'HARSHIL LALKA', 'CMPN', 2),
(7, 'SAMEER NAIK', 'CMPN', 1),
(8, 'TEJAS SHELAR', 'INFT', 1),
(9, 'SHUBHAM CHACHAN', 'INFT', 2),
(10, 'NIKHIL CHAUDHARY', 'EXTC', 1),
(11, 'ROHIT GUPTA', 'EXTC', 1),
(12, 'ADITI JADYAL', 'EXTC', 1),
(13, 'SIDDHARTH KALE', 'EXTC', 2),
(14, 'RAHUL GIRI', 'EXTC', 1),
(15, 'KARTIK JALUI', 'EXTC', 2),
(16, 'SHAUBHIK KATA', 'EXTC', 1),
(17, 'VIKRAM RAJAK', 'EXTC', 2),
(18, 'KARAN SANAP', 'EXTC', 1),
(19, 'AJAY KHANDAGLE', 'ELEX', 1),
(20, 'AJINKYA GAIKWAD', 'ELEC', 1),
(21, 'VEDANT KADAM', 'ELEC', 2),
(22, 'POOJA KALYANKAR', 'ELEC', 1),
(23, 'OMKAR LAMKHADE', 'ELEC', 1),
(24, 'AMEY MHATRE', 'ELEC', 2),
(25, 'HARSHWARDHAN PATIL', 'ELEC', 2),
(26, 'VISMAY SANCHETI', 'ELEC', 1),
(27, 'ADARSHUNNITHAN', 'ELEC', 1);

-- --------------------------------------------------------

--
-- Table structure for table `senior_login`
--

CREATE TABLE `senior_login` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `senior_login`
--

INSERT INTO `senior_login` (`username`, `password`) VALUES
('senior_test', '27373fee548aeb20d8de7fc2412408a3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
