-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2021 at 01:00 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pic` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email`, `password`, `pic`) VALUES
(1, 'Iskuhi', 'Vardanyan', 'vardanyan@gmail.com', '$2y$10$3eHPmP6CWj3CMuojCBEgUufDkT0mpjHtkCQZ7GbSX/7JRjSH5FTau', '6092b1163011c9.97934680.jpg'),
(2, 'Anna', 'Adamyan', 'adamyan@gmail.com', '$2y$10$K8oVw3e0YuRtmm8AflxmHuedPlz3WrBja1/ecmNWqHs9JCQ6D7B.a', 'asas'),
(3, 'Levon', 'Karapetyan', 'karapetyan@gmail.com', '$2y$10$IS7ZlP4xWaQYDN2cPJ5nhujtBhfc2abFJ9b2mwrXZo/nvzsC2/9dO', '6076d69db107d3.18631728.jpg'),
(8, 'rtdrgtdr', 'rtretret', 'erftertfger@sdf.ffff', '$2y$10$WnnKjODg3VyjIJOSZ6XVI.79x7rriNOgKhRKeg/twtveLqJAHSyNW', '608164e7cd42d2.41566813.jpg'),
(9, 'Ani', 'Adamyan', 'adamyan@gmail.ru', '$2y$10$jpXm0nwTFmjQQ75usdso/OK.KvZpvbgOfEsHtapvXYmsgONzKw6lC', NULL),
(10, 'Armine', 'Lalayan', 'lalayan@gmail.com', '$2y$10$waRYZTxHxiNrwuVynjEAJutvmN61vtdQ7qf1g5ioUly7PXGcW7BzW', NULL),
(11, 'Anush ', 'Badalyan', 'badalyan@gmail.com', '$2y$10$50Se.IywPTSjSy7v7DmQRuLoi7HhDgVhFSTt1XD3cFO8YMfGZaFVS', '6092b13d6eecc9.04204704.jpg'),
(12, 'dsdfdsf', 'dsfdsfds', 'dsfsdfs@dfdf.mm', '$2y$10$.T6GRUQQrhvwELdZCLp59.7itM8taRbc9pWtaHM9I7GmtQQPwchc.', NULL),
(13, 'dsfsdfs', 'dsfsdfs', 's@dfdf.mm', '$2y$10$D.EKOS8ZDnVB2VTIMVz5CupclJOupa9FClc5/Pp1ieo2Q2mU5ryYO', '609131bec5f837.93807373.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
