-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2023 at 01:27 PM
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
-- Database: `pawprint`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_info`
--

CREATE TABLE `book_info` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `dog_name` varchar(255) NOT NULL,
  `dog_gender` varchar(10) NOT NULL,
  `dog_breed` varchar(50) NOT NULL,
  `dog_color` varchar(50) NOT NULL,
  `dog_age` int(11) NOT NULL,
  `dog_weight` decimal(5,2) NOT NULL,
  `fully_vaccinated` tinyint(1) NOT NULL,
  `additional_info` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_info`
--

INSERT INTO `book_info` (`id`, `email`, `phone_number`, `address1`, `address2`, `dog_name`, `dog_gender`, `dog_breed`, `dog_color`, `dog_age`, `dog_weight`, `fully_vaccinated`, `additional_info`, `created_at`) VALUES
(1, 'ram123@gmail.com', '984567321', 'ktm', 'ktm', 'hary', 'male', 'Chihuahua', 'red', 12, '20.00', 1, '', '2023-09-27 11:25:27'),
(2, 'ram123@gmail.com', '984567321', 'ktm', 'ktm', 'hary', 'male', 'Chihuahua', 'red', 12, '20.00', 1, '', '2023-09-27 11:25:49');

-- --------------------------------------------------------

--
-- Table structure for table `shelter_info`
--

CREATE TABLE `shelter_info` (
  `shelter_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `img` varchar(20) NOT NULL,
  `address` varchar(25) NOT NULL,
  `info` varchar(400) NOT NULL,
  `price` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `occupied` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shelter_info`
--

INSERT INTO `shelter_info` (`shelter_id`, `name`, `img`, `address`, `info`, `price`, `capacity`, `occupied`) VALUES
(1, 'One', 'img/shelter.jpg', 'Gwarko,Lalitpur', 'Service Objects\r\nServices are performed on different objects, for example, media sources, media sinks, connections and Virtual Circuits (Vcs), hence QoS parameterization species these service objects', 500, 50, 30),
(2, 'Two', 'img/shelter.jpg', 'Satdobato,Lalitpur', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod                                       non  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1000, 20, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_info`
--
ALTER TABLE `book_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shelter_info`
--
ALTER TABLE `shelter_info`
  ADD PRIMARY KEY (`shelter_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_info`
--
ALTER TABLE `book_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shelter_info`
--
ALTER TABLE `shelter_info`
  MODIFY `shelter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
