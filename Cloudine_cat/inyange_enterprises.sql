-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2024 at 04:00 PM
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
-- Database: `inyange_enterprise`
--

-- --------------------------------------------------------

--
-- Table structure for table `annoucement`
--

CREATE TABLE `annoucement` (
  `id` int(11) NOT NULL,
  `message` varchar(90) DEFAULT NULL,
  `date_added` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `names` varchar(90) DEFAULT NULL,
  `address` varchar(90) DEFAULT NULL,
  `age` varchar(90) DEFAULT NULL,
  `gender` varchar(90) DEFAULT NULL,
  `email` varchar(90) DEFAULT NULL,
  `password` varchar(90) DEFAULT NULL,
  `role` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `distr_sales`
--

CREATE TABLE `distr_sales` (
  `id` int(11) NOT NULL,
  `client_name` varchar(90) DEFAULT NULL,
  `product` varchar(90) DEFAULT NULL,
  `quantity` varchar(90) DEFAULT NULL,
  `amount` varchar(90) DEFAULT NULL,
  `date_` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `distr_sales`
--

INSERT INTO `distr_sales` (`id`, `client_name`, `product`, `quantity`, `amount`, `date_`) VALUES
(1, 'mm', 'Milk', 'mm', 'mm', '2024-02-18 18:51:48');

-- --------------------------------------------------------

--
-- Table structure for table `distr_stock`
--

CREATE TABLE `distr_stock` (
  `id` int(11) NOT NULL,
  `product_name` varchar(90) DEFAULT NULL,
  `product_id` varchar(90) DEFAULT NULL,
  `amount` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `distr_stock`
--

INSERT INTO `distr_stock` (`id`, `product_name`, `product_id`, `amount`) VALUES
(1, 'Juice', '67', '78'),
(2, 'Milk', '90', '78'),
(3, 'Milk', '', ''),
(4, 'Milk', '90', '78');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `distributer_names` varchar(90) DEFAULT NULL,
  `message` varchar(90) DEFAULT NULL,
  `date_` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `distributer_names`, `message`, `date_`) VALUES
(1, NULL, 'asas', '2024-02-18 18:34:48');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `distributer_names` varchar(90) DEFAULT NULL,
  `distributer_id` varchar(90) DEFAULT NULL,
  `date_` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_` varchar(90) DEFAULT NULL,
  `amount` varchar(90) DEFAULT NULL,
  `confirm_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `distributer_names`, `distributer_id`, `date_`, `product_`, `amount`, `confirm_status`) VALUES
(1, 'rt', '1', '2024-02-18 19:38:11', 'Milk', '232', 0),
(2, 'bn', '1', '2024-02-18 19:39:27', 'Milk', '11', 0),
(3, 'w', '1', '2024-02-18 19:40:15', 'Milk', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `distributer_names` varchar(90) DEFAULT NULL,
  `distributer_id` varchar(90) DEFAULT NULL,
  `date_` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `amount` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(90) DEFAULT NULL,
  `boxes` varchar(90) DEFAULT NULL,
  `amount` varchar(90) DEFAULT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `boxes`, `amount`, `date_added`) VALUES
(1, 'qw', '21', '21', '2024-02-18 17:22:14'),
(2, 'inyange', '111', '200', '2024-02-18 17:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE sales`` (
  `id` int(11) NOT NULL,
  `distributer_names` varchar(90) DEFAULT NULL,
  `distributer_id` varchar(90) DEFAULT NULL,
  `date_` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_` varchar(90) DEFAULT NULL,
  `amount` varchar(90) DEFAULT NULL,
  `boxes` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `distributer_names`, `distributer_id`, `date_`, `product_`, `amount`, `boxes`) VALUES
(1, 'cloudine', '111', '2024-03-10 07:28:27', 'Milk', '20000', ''),
(2, 'cloud', '11111', '2024-03-10 07:28:23', 'Milk', '20000', ''),
(3, 'mike', '1', '2024-02-18 16:53:50', 'Milk', '1111', '111');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `names` varchar(90) DEFAULT NULL,
  `address` varchar(90) DEFAULT NULL,
  `age` varchar(90) DEFAULT NULL,
  `gender` varchar(90) DEFAULT NULL,
  `email` varchar(90) DEFAULT NULL,
  `password` varchar(90) DEFAULT NULL,
  `role` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `names`, `address`, `age`, `gender`, `email`, `password`, `role`) VALUES
(1, 'setString', 'setString', '56', 'Male', 'setString', 'setString', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annoucement`
--
ALTER TABLE `annoucement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distr_sales`
--
ALTER TABLE `distr_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distr_stock`
--
ALTER TABLE `distr_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annoucement`
--
ALTER TABLE `annoucement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `distr_sales`
--
ALTER TABLE `distr_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `distr_stock`
--
ALTER TABLE `distr_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
