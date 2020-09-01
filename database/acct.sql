-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2020 at 08:46 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acct`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `custId` int(11) NOT NULL,
  `custName` varchar(255) NOT NULL,
  `custEmail` varchar(255) NOT NULL,
  `custAddress` varchar(255) NOT NULL,
  `custState` varchar(255) NOT NULL,
  `custPostcode` int(5) NOT NULL,
  `companyCode` varchar(20) NOT NULL,
  `hp1` varchar(255) NOT NULL,
  `hp2` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`custId`, `custName`, `custEmail`, `custAddress`, `custState`, `custPostcode`, `companyCode`, `hp1`, `hp2`, `type`, `created_at`, `updated_at`, `user_id`) VALUES
(1001, 'Customer1', 'cust@gmail.com', '43, Tringkap', 'Pahang', 39100, '1001', '0125063780', '0125063780', 'Supplier', '2020-05-18 16:00:00', '2020-05-19 16:00:00', 1),
(1002, 'Customer2', 'cust2@gmail.com', '22, Kampung Raja', 'Pahang', 39010, '1002', '12345678', '12345678', 'Customer', '2020-05-19 16:00:00', '2020-05-11 16:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `invId` int(11) NOT NULL,
  `invDate` date NOT NULL,
  `custName` varchar(255) NOT NULL,
  `payment` int(11) NOT NULL,
  `total` float NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `invId`, `invDate`, `custName`, `payment`, `total`, `updated_at`, `created_at`, `user_id`) VALUES
(17, 1, '2020-05-28', 'Customer1', 1, 35, '2020-06-29 12:35:23', '2020-05-27 21:41:04', 1),
(18, 2, '2020-06-28', 'Customer2', 1, 144, '2020-07-01 08:12:20', '2020-06-28 02:19:45', 1),
(19, 3, '2020-06-28', 'Customer2', 1, 1936, '2020-07-01 08:53:21', '2020-06-28 02:32:56', 1),
(20, 4, '2020-06-28', 'Customer2', 0, 23232, '2020-07-01 08:07:36', '2020-06-28 02:33:12', 1),
(21, 5, '2020-08-03', 'Customer1', 0, 49005, '2020-08-03 05:59:28', '2020-08-03 05:59:28', 1),
(22, 6, '2020-08-09', 'Customer2', 0, 1250, '2020-08-09 06:17:04', '2020-08-09 06:17:04', 1);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_05_11_154804_add_created_at_to_invoice', 1),
(5, '2020_05_12_110333_add_created_at_to_orderinvoice', 2),
(6, '2020_05_14_073819_add_timestamp_to_payment', 3),
(7, '2020_05_17_151916_add_timestamp_to_company', 4),
(8, '2020_05_17_152459_add_timestamp_to_company', 5),
(9, '2020_05_25_155810_add_timestamp_to_purchase', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orderinvoice`
--

CREATE TABLE `orderinvoice` (
  `id` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `productWeight` double NOT NULL,
  `productQty` int(11) NOT NULL,
  `productCost` double NOT NULL,
  `productMkg` double NOT NULL,
  `productRemarks` varchar(255) NOT NULL,
  `invId` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderinvoice`
--

INSERT INTO `orderinvoice` (`id`, `productName`, `productWeight`, `productQty`, `productCost`, `productMkg`, `productRemarks`, `invId`, `updated_at`, `created_at`, `user_id`) VALUES
(48, 'as', 12, 12, 1, 0, '-', 2, '2020-06-28 10:19:45', NULL, 1),
(49, 'zxzx', 44, 44, 1, 0, '-', 3, '2020-06-28 10:32:56', NULL, 1),
(50, 'zxzx', 44, 44, 12, 0, '-', 4, '2020-06-28 10:33:12', NULL, 1),
(51, 'item1', 2, 2, 2, 2, '-', 1, '2020-08-03 13:57:11', NULL, 1),
(52, 'item2', 3, 3, 3, 0, '-', 1, '2020-08-03 13:57:11', NULL, 1),
(53, 'item1', 99, 99, 5, 0, '-', 5, '2020-08-03 13:59:28', NULL, 1),
(54, 'Item1', 50, 5, 5, 0, '-', 6, '2020-08-09 14:17:05', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `purchaseId` int(11) NOT NULL,
  `paymentDate` date NOT NULL,
  `paymentDest` varchar(255) NOT NULL,
  `total` double NOT NULL,
  `custId` int(11) NOT NULL,
  `custName` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `purchaseId`, `paymentDate`, `paymentDest`, `total`, `custId`, `custName`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 1, '2020-05-23', 'Payment 666', 20, 1001, 'Customer1', '2020-05-23 04:15:33', '2020-05-23 04:15:33', 1),
(2, 2, '2020-05-23', 'Payment 123456', 200, 1002, 'Customer2', '2020-05-23 04:24:53', '2020-05-23 04:24:53', 1),
(3, 3, '2020-05-23', 'Payment 3', 20, 1001, 'Customer1', '2020-05-23 07:35:24', '2020-05-23 07:35:24', 1),
(17, 4, '2020-06-29', 'Payment 2', 1980, 1002, 'Customer2', '2020-06-29 04:03:59', '2020-06-29 04:03:59', 1),
(18, 5, '2020-06-29', 'Payment 99', 20, 1001, 'Customer1', '2020-06-29 04:35:23', '2020-06-29 04:35:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchaseinvoice`
--

CREATE TABLE `purchaseinvoice` (
  `id` int(11) NOT NULL,
  `purchaseId` int(11) NOT NULL,
  `purchaseDate` date NOT NULL,
  `custId` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'TestAcc1', 'hanshengliang@outlook.com', NULL, '$2y$10$cO683linHok5HNCLQ8cpkeMB41rG.PE.uJgM14UxQl/Ms70znpJiy', 'SAkoFZ6hqw6IjoUZ53gkV7Ab4B2c7GcVvbcwaPW9MGwiEwHb18o5byWqyZCn', '2020-05-20 23:24:40', '2020-05-20 23:24:40'),
(2, 'TestAcc2', 'hanshengliang@gmail.com', NULL, '$2y$10$MPWVR.sJ1ygqOK4c1KVRiec8urORWk.IyRG0TcGlwNrtgeuVmORm6', NULL, '2020-05-20 23:37:41', '2020-05-20 23:37:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`custId`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderinvoice`
--
ALTER TABLE `orderinvoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchaseinvoice`
--
ALTER TABLE `purchaseinvoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `custId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orderinvoice`
--
ALTER TABLE `orderinvoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `purchaseinvoice`
--
ALTER TABLE `purchaseinvoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
