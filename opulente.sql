-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 03, 2023 at 11:13 PM
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
-- Database: `opulente`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `buyer_username` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_gender` varchar(100) NOT NULL,
  `product_color` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_title`, `buyer_username`, `quantity`, `product_category`, `product_gender`, `product_color`) VALUES
(1, 'robe_black', 'wi21b039', 1, 'robe', 'male', 'black'),
(3, 'robe_black', 'wi21b039', 1, 'robe', 'male', 'black');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_gender` varchar(50) NOT NULL,
  `product_color` varchar(100) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(200) NOT NULL,
  `product_price` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_category`, `product_gender`, `product_color`, `file_name`, `product_title`, `product_description`, `product_price`) VALUES
(34, 'loungewear_black_woman_top', 'loungewear', 'female', 'black', 'loungewear_black_woman_top.jpg', 'loungewear_black_woman_top', 'loungewear_black_woman_top', '€100'),
(33, 'loungewear_black_woman_bottom', 'loungewear', 'female', 'black', 'loungewear_black_woman_bottom.jpg', 'loungewear_black_woman_bottom', 'loungewear_black_woman_bottom', '€100'),
(32, 'loungewear_black_man_top', 'loungewear', 'male', 'black', 'loungewear_black_man_top.jpg', 'loungewear_black_man_top', 'loungewear_black_man_top', '€100'),
(31, 'loungewear_black_man_bottom', 'loungewear', 'male', 'black', 'loungewear_black_man_bottom.jpg', 'loungewear_black_man_bottom', 'loungewear_black_man_bottom', '€100'),
(30, 'robe_white', 'robe', 'male', 'white', 'robe_white.jpg', 'robe_white', 'robe_white', '€100'),
(29, 'robe_brown', 'robe', 'male', 'brown', 'robe_brown.jpg', 'robe_brown', 'robe_brown', '€100'),
(28, 'robe_black', 'robe', 'male', 'black', 'robe_black.jpg', 'robe_black', 'robe_black', '€100'),
(35, 'loungewear_brown_man_bottom', 'loungewear', 'male', 'brown', 'loungewear_brown_man_bottom.jpg', 'loungewear_brown_man_bottom', 'loungewear_brown_man_bottom', '€100'),
(36, 'loungewear_brown_man_top', 'loungewear', 'male', 'brown', 'loungewear_brown_man_top.jpg', 'loungewear_brown_man_top', 'loungewear_brown_man_top', '€100'),
(37, 'loungewear_brown_woman_bottom', 'loungewear', 'female', 'brown', 'loungewear_brown_woman_bottom.jpg', 'loungewear_brown_woman_bottom', 'loungewear_brown_woman_bottom', '€100'),
(38, 'loungewear_brown_woman_top', 'loungewear', 'female', 'brown', 'loungewear_brown_woman_top.jpg', 'loungewear_brown_woman_top', 'loungewear_brown_woman_top', '€100'),
(39, 'loungewear_cream_man_bottom', 'loungewear', 'male', 'cream', 'loungewear_cream_man_bottom.jpg', 'loungewear_cream_man_bottom', 'loungewear_cream_man_bottom', '€100'),
(40, 'loungewear_cream_man_top', 'loungewear', 'male', 'cream', 'loungewear_cream_man_top.jpg', 'loungewear_cream_man_top', 'loungewear_cream_man_top', '€100'),
(41, 'loungewear_cream_woman_bottom', 'loungewear', 'female', 'cream', 'loungewear_cream_woman_bottom.jpg', 'loungewear_cream_woman_bottom', 'loungewear_cream_woman_bottom', '€100'),
(42, 'loungewear_cream_woman_top', 'loungewear', 'female', 'cream', 'loungewear_cream_woman_top.jpg', 'loungewear_cream_woman_top', 'loungewear_cream_woman_top', '€100');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `salutation` varchar(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user',
  `active` varchar(10) NOT NULL DEFAULT 'true'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `reg_date`, `salutation`, `first_name`, `last_name`, `address`, `zip`, `country`, `password`, `role`, `active`) VALUES
(6, 'wi21b039', 'wi21b039@gmail.com', '2023-07-03 20:59:55', 'Herr', 'Deniz', 'Senkarabacak', 'spengergasse 27', '1050', 'AT', 'd41d8cd98f00b204e9800998ecf8427e', 'user', 'true'),
(7, 'wi21b03900', 'wi21b03900@gmail.com', '2023-07-03 20:59:55', 'Herr', 'Deniz', 'Senkarabacak', 'spengergasse 27', '1050', 'AT', 'd41d8cd98f00b204e9800998ecf8427e', 'admin', 'true');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
