-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 10:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laptop_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'nilushika', '$2y$10$jqjxRms.TfIOf5Aqc0goiOKKaHQHQVbVbZ7lHU/tqlpH8Spq7ppkW', 'nilushika@gmail.com', '2024-05-24 03:17:06');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `laptop_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laptops`
--

CREATE TABLE `laptops` (
  `laptop_id` int(11) NOT NULL,
  `model` varchar(100) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `ram` varchar(50) NOT NULL,
  `cpu` varchar(50) NOT NULL,
  `vga` varchar(50) NOT NULL,
  `memory` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `warranty_period` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laptops`
--

INSERT INTO `laptops` (`laptop_id`, `model`, `brand`, `ram`, `cpu`, `vga`, `memory`, `price`, `image`, `description`, `warranty_period`, `created_at`) VALUES
(1, 'Dell XPS 15', 'Dell', '16GB DDR4', 'Intel Core i7-11800H (8 cores, up to 4.6 GHz)', 'NVIDIA GeForce RTX 3050 Ti 4GB GDDR6', '512GB PCIe NVMe SSD', 1799.00, 'uploads/Dell 15.webp', 'The Dell XPS 15 combines powerful performance with a stunning InfinityEdge display, making it perfect for content creators and professionals who demand top-notch performance and portability.', '1 year', '2024-05-24 03:24:31'),
(2, 'MacBook Air (M2)', 'Apple', '8GB unified memory', ' Apple M2 chip', 'Apple GPU', '256GB SSD', 1199.00, 'uploads/MacBook-Pro-14inch-Space-Grey-2023-Apple-Asia-1.webp', 'The MacBook Air (M2) features Apple\'s latest M2 chip, offering exceptional performance and efficiency. With its sleek design, Retina display, and all-day battery life, it\'s the perfect choice for users who value both style and productivity.', '1 year', '2024-05-24 05:19:47'),
(3, 'ASUS ROG Zephyrus G14', 'ASUS', '16GB DDR4', 'AMD Ryzen 9 5900HS (8 cores, up to 4.6 GHz)', 'NVIDIA GeForce RTX 3060 6GB GDDR6', '1TB PCIe NVMe SSD', 1499.00, 'uploads/zephyrus_g16_grey_05_l_rgb_1.jpg', 'The ASUS ROG Zephyrus G14 is a compact gaming laptop packed with powerful hardware, including the latest AMD Ryzen processor and NVIDIA graphics. Its unique AniMe Matrix display on the lid allows for customizable animations, making it stand out from the crowd.', '2 years', '2024-05-24 05:21:11'),
(4, 'Lenovo ThinkPad X1 Carbon (Gen 11, 2024)', 'Lenovo', '16GB', 'Intel Core i7-1355U', 'Integrated Intel Iris Xe', ' 1TB SSD', 2099.00, 'uploads/ThinkPad_X1_Carbon_Gen_11_CT1_05.png', 'The ThinkPad X1 Carbon is a business laptop with a sleek design, excellent performance, and robust security features.', '1 year', '2024-05-24 07:57:53'),
(5, 'Microsoft Surface Laptop 5 (2023)', 'Microsoft', '16GB', 'Intel Core i7-1265U', 'Integrated Intel Iris Xe', '512GB SSD', 1799.00, 'uploads/61GqSlHr41L.jpg', 'The Surface Laptop 5 offers a premium build, a vibrant PixelSense touchscreen, and great performance for everyday tasks.', '1 year', '2024-05-24 07:59:38'),
(6, 'Razer Blade 15 (2023)', 'Razer', '32GB', 'Intel Core i9-13900H', 'NVIDIA GeForce RTX 4080', '1TB SSD', 3299.00, 'uploads/617xAAmW2eL.jpg', 'The Razer Blade 15 is a high-performance gaming laptop with top-tier graphics, a fast refresh rate display, and a sleek design.', '1 year', '2024-05-24 08:00:43'),
(7, 'Acer Predator Helios 300 (2023)', 'Acer', '16GB', 'Intel Core i7-13700H', 'NVIDIA GeForce RTX 3070 Ti', '1TB SSD', 2099.00, 'uploads/acer_predator_helios_16_ph1671_1690598085_72dfde7d_progressive.jpg', 'The Predator Helios 300 is designed for gamers, featuring powerful graphics, a high-refresh-rate display, and robust cooling.', '1 year', '2024-05-24 08:02:01'),
(8, 'Samsung Galaxy Book Pro 360 (2023)', 'Samsung', '16GB', 'Intel Core i7-1260P', 'Integrated Intel Iris Xe', '512GB SSD', 1599.00, 'uploads/Venus4MoonstoneGray_001.webp', 'A 2-in-1 laptop with an AMOLED display, S Pen support, and lightweight design, perfect for creative professionals.', '1 year', '2024-05-24 08:04:06'),
(9, 'LG Gram 17 (2023)', 'LG', '16GB', 'Intel Core i7-1260P', 'Integrated Intel Iris Xe', '1TB SSD', 1899.00, 'uploads/lg-gram-17-20232-1700187329.jpg', 'The LG Gram 17 is an ultra-lightweight laptop with a large 17-inch display, long battery life, and strong performance.', '1 year', '2024-05-24 08:05:23'),
(10, 'HP Envy x360 (2023)', 'HP', '16GB', 'AMD Ryzen 7 7730U', 'Integrated AMD Radeon Graphics', '512GB SSD', 1299.00, 'uploads/hp lap 2023.png', ' A versatile 2-in-1 convertible laptop with a sleek design, vibrant display, and robust performance for daily tasks.', '1 year', '2024-05-24 08:06:29'),
(11, 'Acer Swift 5 (2023)', 'Acer', '16GB', 'Intel Core i7-12700H', 'Integrated Intel Iris Xe', '1TB SSD', 1499.00, 'uploads/swift_5_sf514_55_fpbl1_mg_01a_b0bd.jpg', 'A lightweight and powerful laptop with a 14-inch touchscreen display, long battery life, and fast performance.', '1 year', '2024-05-24 08:08:33'),
(12, 'Gigabyte Aero 16 (2023)', 'Gigabyte', '32GB', 'Intel Core i9-13900H', 'NVIDIA GeForce RTX 4070', '1TB SSD', 2799.00, 'uploads/61jKryQlY1L.jpg', 'A high-performance laptop designed for creative professionals, featuring a 4K OLED display and powerful GPU.', '1 year', '2024-05-24 08:09:21'),
(13, 'MSI Stealth 15M (2023)', 'MSI', '16GB', 'Intel Core i7-12700H', 'NVIDIA GeForce RTX 3060', '512GB SSD', 1699.00, 'uploads/msi-stealth-15m-a11uek-202.webp', 'A slim and powerful gaming laptop with a fast refresh rate display, advanced cooling, and sleek design.', '1 year', '2024-05-24 08:10:29');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `total_price`, `order_date`, `status`) VALUES
(1, 1, 5397.00, '2024-05-24 04:57:07', 'Shipped');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`detail_id`, `order_id`, `payment_method`, `payment_status`, `address_line1`, `address_line2`, `city`, `state`, `postal_code`, `country`) VALUES
(1, 1, 'PayPal', 'Pending', 'no:22 , udagama,', 'mawanalla , kegalle', 'kegalle', 'sabaragamuwa', '2077', 'sri lanka');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `laptop_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `laptop_id`, `quantity`, `price`) VALUES
(1, 1, 1, 3, 1799.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `created_at`, `address`) VALUES
(1, 'user', '$2y$10$PKmVUj/zLPPTXHyQQ6M64Oogu95pnomsQbAlnsFaYpQauAov6M9aW', 'user@gmail.com', '2024-05-24 03:41:26', 'abc kegalle road');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `laptop_id` (`laptop_id`);

--
-- Indexes for table `laptops`
--
ALTER TABLE `laptops`
  ADD PRIMARY KEY (`laptop_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `laptop_id` (`laptop_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laptops`
--
ALTER TABLE `laptops`
  MODIFY `laptop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`laptop_id`) REFERENCES `laptops` (`laptop_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`laptop_id`) REFERENCES `laptops` (`laptop_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
