-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2020 at 03:45 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodstuff`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `qty` int(100) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `product_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_name`, `product_price`, `product_image`, `qty`, `total_price`, `product_code`) VALUES
(39, 'Sprite', '30', 'upload/cd-sprite_1583380015.jpg', 2, '60', 'P002'),
(40, 'Coca-Cola', '50', 'upload/cd-coco_1583379966.jpg', 1, '50', 'P001'),
(41, 'Idali', '90', 'upload/si-idali_1583380173.jpg', 1, '90', 'P005'),
(42, 'Dhosa', '120', 'upload/si-dhosa_1583380113.jpeg', 1, '120', 'P004'),
(43, 'Samosa', '20', 'upload/ff-samosa_1583380996.jpg', 1, '20', 'P011');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(15) NOT NULL,
  `message` varchar(255) NOT NULL,
  `send_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `phone`, `message`, `send_time`) VALUES
(21, 'sen denial', 'hiren@gmail.com', 2147483647, 'fgh', '2020-04-07 00:04:14'),
(22, 'f', 'f', 0, 'f', '2020-04-07 09:38:53');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pmode` varchar(50) NOT NULL,
  `products` varchar(255) NOT NULL,
  `amount_paid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_price`, `product_image`, `product_code`) VALUES
(1, 'Coca-Cola', '50', 'upload/cd-coco_1583379966.jpg', 'P001'),
(2, 'Sprite', '30', 'upload/cd-sprite_1583380015.jpg', 'P002'),
(3, 'Thums-up', '60', 'upload/cd-thumsup_1583380077.jpg', 'P003'),
(4, 'Dhosa', '120', 'upload/si-dhosa_1583380113.jpeg', 'P004'),
(5, 'Idali', '90', 'upload/si-idali_1583380173.jpg', 'P005'),
(6, 'Vada', '50', 'upload/si-vada_1583380198.jpg', 'P006'),
(7, 'Thepla', '60', 'upload/gf-thepla_1583380609.jpg', 'P007'),
(8, 'Gujrati Dish', '240', 'upload/gf-fullthali_1583380661.jpg', 'P008'),
(9, 'Khandvi', '120', 'upload/gf-khandvi_1583380682.jpg', 'P009'),
(10, 'Vadapav', '30', 'upload/ff-vadapav_1583380973.jpg', 'P010'),
(11, 'Samosa', '20', 'upload/ff-samosa_1583380996.jpg', 'P011'),
(12, 'Dabeli', '20', 'upload/ff-dabeli._1583381018.jpg', 'P012');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `person` varchar(10) NOT NULL,
  `timestemp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `name`, `email`, `phone`, `date`, `time`, `person`, `timestemp`) VALUES
(9, 'sen denial', 'patelhyran@gmail.com', '02228597699', '2020-04-16', '12:00', '3', '2020-04-07 07:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobileno` varchar(15) NOT NULL,
  `user_role` enum('admin','users') NOT NULL DEFAULT 'users',
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `reset_token` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `address`, `mobileno`, `user_role`, `created`, `reset_token`) VALUES
(1, 'Admin', 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '', '', 'admin', '2020-03-30 03:44:37', NULL),
(2, 'Hiren', 'imhiren', 'shekhdah@gmail.com', 'caf1a3dfb505ffed0d024130f58c5cfa', 'SMVS', '9512327005', 'users', '2020-03-30 08:20:28', '1586273387aa1ccb64dcb588dc2fe34c470528ff54'),
(41, 'Harsh Limbadiya', 'harsh123', 'patelhyran@gmail.com', '56468d5607a5aaf1604ff5e15593b003', 'SMVS swaminarayan mandir Surendranagr 363002', '9512327005', 'users', '2020-03-30 16:29:48', ''),
(43, 'Harsh Limbadiya', 'harsh', 'harshlimbadiya1702@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', '', 'users', '2020-04-01 06:28:03', ''),
(44, 'Harsh', 'harsh', 'harshlimbadiya1702@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 's.nagar', '8000544844', 'users', '2020-04-04 05:10:30', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
