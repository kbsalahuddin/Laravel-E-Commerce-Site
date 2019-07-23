-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2019 at 10:50 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` bigint(20) UNSIGNED NOT NULL,
  `adminEmail` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminPassword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminPhone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminEmail`, `adminPassword`, `adminName`, `adminPhone`, `created_at`, `updated_at`) VALUES
(1, 'fish@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Mark Fisher', '11223344', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brandId` bigint(20) UNSIGNED NOT NULL,
  `brandName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brandDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brandStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brandId`, `brandName`, `brandDescription`, `brandStatus`, `created_at`, `updated_at`) VALUES
(1, 'Adidas', 'Adidas German sportswear brand', 'published', NULL, NULL),
(2, 'Nike', 'Nike American sportswear brand!', 'published', NULL, NULL),
(3, 'Gucci', 'Gucci is an Italian luxury brand of fashion and leather goods', 'published', NULL, NULL),
(4, 'Louis Vuitton', 'Louis Vuitton French fashion house and luxury retail company', 'published', NULL, NULL),
(5, 'Yves Saint Laurent', 'Saint Laurent, is a French luxury fashion house', 'published', NULL, NULL),
(6, 'IKEA', 'Swedish-founded group that designs and sells ready-to-assemble furniture', 'published', NULL, NULL),
(7, 'Conforama', 'Conforama is Europe''s second largest home furnishings retail chain with over 200 stores', 'published', NULL, NULL),
(8, 'Apple', 'American multinational technology company headquartered in Cupertino, California', 'published', NULL, NULL),
(9, 'Samsung', 'South Korean multinational conglomerate headquartered in Samsung Town, Seoul', 'published', NULL, NULL),
(10, 'Penguin Random House LLC.', 'Random House is an American book publisher and the largest general-interest paperback publisher in the world', 'published', NULL, NULL),
(11, 'H&M', 'Hennes &amp; Mauritz AB is a Swedish multinational clothing-retail company', 'published', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryId` bigint(20) UNSIGNED NOT NULL,
  `categoryName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoryDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoryStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryId`, `categoryName`, `categoryDescription`, `categoryStatus`, `created_at`, `updated_at`) VALUES
(1, 'Men', 'The Men''s category', 'published', NULL, NULL),
(2, 'Women', 'The Women''s category', 'published', NULL, NULL),
(3, 'Children', 'The Children''s category', 'published', NULL, NULL),
(4, 'Electronics', 'All types of electronics here', 'published', NULL, NULL),
(5, 'Home Decor', 'Home improvement and accessories', 'published', NULL, NULL),
(6, 'Others', 'Others', 'published', NULL, NULL),
(11, 'Sports', 'The Sports category', 'published', NULL, NULL),
(12, 'Book', 'The Books shelf for you', 'published', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerId` bigint(20) UNSIGNED NOT NULL,
  `customerName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerEmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerPassword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerPhone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerId`, `customerName`, `customerEmail`, `customerPassword`, `customerPhone`, `created_at`, `updated_at`) VALUES
(2, 'Demo', 'demo@example.com', '25d55ad283aa400af464c76d713c07ad', '123123123', NULL, NULL),
(3, 'Bob Jones', 'bjones@gmail.com', '4297f44b13955235245b2497399d7a93', '123123123', NULL, NULL),
(4, 'Mr.A', 'mrA@gmail.com', '4297f44b13955235245b2497399d7a93', '1231231234', NULL, NULL),
(5, 'Mr.Two', 'two@asd.com', 'e10adc3949ba59abbe56e057f20f883e', '123456654', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_07_06_173421_create_tbl_admin_table', 1),
(2, '2019_07_07_062302_create_tbl_categories_table', 2),
(3, '2019_07_07_100550_create_tbl_brands_table', 3),
(4, '2019_07_07_113218_create_tbl_products_table', 4),
(5, '2019_07_08_130350_create_tbl_sliders_table', 5),
(6, '2019_07_09_103548_create_tbl_customers_table', 6),
(7, '2019_07_09_123817_creat_tbl_shippings_table', 7),
(8, '2019_07_10_121540_crate_tbl_payments_table', 8),
(9, '2019_07_10_121637_crate_tbl_orders_table', 8),
(10, '2019_07_10_121734_crate_tbl_order_details_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` bigint(20) UNSIGNED NOT NULL,
  `customerId` int(11) NOT NULL,
  `shipId` int(11) NOT NULL,
  `paymentId` int(11) NOT NULL,
  `orderTotal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orderStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `customerId`, `shipId`, `paymentId`, `orderTotal`, `orderStatus`, `created_at`, `updated_at`) VALUES
(1, 2, 13, 1, '14,000.00', 'pending', '2019-07-11 15:02:23', NULL),
(2, 3, 14, 2, '456,000.00', 'pending', '2019-07-11 16:58:43', NULL),
(3, 3, 15, 3, '35,000.00', 'pending', '2019-07-11 17:16:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `orderDetailsId` bigint(20) UNSIGNED NOT NULL,
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productPrice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`orderDetailsId`, `orderId`, `productId`, `productName`, `productPrice`, `productQuantity`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 'NMDR1', '7000', 2, NULL, NULL),
(2, 2, 9, 'iPhone XS', '120000', 2, NULL, NULL),
(3, 2, 1, 'Galaxy S10', '108000', 2, NULL, NULL),
(4, 3, 10, 'NMDR1', '7000', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `paymentId` bigint(20) UNSIGNED NOT NULL,
  `paymentOption` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`paymentId`, `paymentOption`, `paymentStatus`, `created_at`, `updated_at`) VALUES
(1, 'cash', 'pending', '2019-07-11 15:02:23', NULL),
(2, 'visa', 'pending', '2019-07-11 16:58:43', NULL),
(3, 'visa', 'pending', '2019-07-11 17:16:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` bigint(20) UNSIGNED NOT NULL,
  `categoryId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productShortDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `productLongDescription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `productPrice` double(8,2) NOT NULL,
  `productImage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `productSize` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `categoryId`, `brandId`, `productName`, `productShortDescription`, `productLongDescription`, `productPrice`, `productImage`, `productSize`, `productStatus`, `created_at`, `updated_at`) VALUES
(1, 4, 9, 'Galaxy S10', 'Galaxy S10', 'Galaxy S10', 108000.00, 'images/XpmWcNx50GOU8aC1TGs7.jpg', '6.4 inch', 'published', NULL, NULL),
(9, 4, 8, 'iPhone XS', 'iPhone XS', 'iPhone XS', 120000.00, 'images/EGzfDqRsByKXULXIOEqf.jpg', '5.8 inch', 'published', NULL, NULL),
(10, 1, 1, 'NMDR1', 'Adidas men''s NMDR1', 'Adidas men''s&nbsp;NMDR1', 7000.00, 'images/Y3b3qGBS4nIqKNtnr8k5.jpg', 'XS,S,M,L,XL', 'published', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `shipId` bigint(20) UNSIGNED NOT NULL,
  `shipName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipEmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipAddress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipPhone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipCity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`shipId`, `shipName`, `shipEmail`, `shipAddress`, `shipPhone`, `shipCity`, `created_at`, `updated_at`) VALUES
(13, 'Mrs.Demo', 'demoMrs@example.com', 'demo demo demo', '000123456', 'Dhaka', NULL, NULL),
(14, 'Mrs. Jones', 'jonesMrs@gmail.com', 'Blah', '011223344', 'London', NULL, NULL),
(15, 'Mrs. Jones', 'jonesMrs@gmail.com', 'Blah', '0011223344', 'London', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `sliderId` bigint(20) UNSIGNED NOT NULL,
  `sliderImage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sliderStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`sliderId`, `sliderImage`, `sliderStatus`, `created_at`, `updated_at`) VALUES
(1, 'slider/Ds8jPs4VHi9HP33V7hjV.jpg', 'published', NULL, NULL),
(2, 'slider/7KzZIpwNG4XIF7DCZMIJ.jpg', 'published', NULL, NULL),
(4, 'slider/kGyRnptnI8pEx3E8tx2i.jpg', 'published', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`),
  ADD UNIQUE KEY `admin_adminemail_unique` (`adminEmail`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`orderDetailsId`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`shipId`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`sliderId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brandId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `orderDetailsId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `paymentId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `shipId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `sliderId` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
