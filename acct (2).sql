-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2020 at 09:39 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `companyCode` int(11) NOT NULL,
  `custEmail` varchar(255) NOT NULL,
  `custAddress` varchar(255) NOT NULL,
  `custState` varchar(255) NOT NULL,
  `custPostcode` int(5) NOT NULL,
  `hp1` varchar(255) NOT NULL,
  `hp2` varchar(255) NOT NULL,
  `type` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `companyName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`companyCode`, `custEmail`, `custAddress`, `custState`, `custPostcode`, `hp1`, `hp2`, `type`, `created_at`, `updated_at`, `user_id`, `companyName`) VALUES
(123, 'ali@gmail.com', 'rumah ali', 'Pahang', 12345, '123445567', '14568799', 'customer', NULL, NULL, 3, 'Ali Sdn Bhd'),
(1001, 'cust@gmail.com', '43, Tringkap', 'Pahang', 39100, '0125063780', '0125063780', 'Supplier', '2020-05-18 16:00:00', '2020-05-19 16:00:00', 1, 'cust1'),
(1002, 'cust2@gmail.com', '22, Kampung Raja', 'Pahang', 39010, '12345678', '12345678', 'Customer', '2020-05-19 16:00:00', '2020-05-11 16:00:00', 1, 'cust2');

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
  `custId` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `total` float NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `invId`, `invDate`, `custId`, `payment`, `total`, `updated_at`, `created_at`, `user_id`) VALUES
(17, 1, '2020-05-28', 0, 1, 35, '2020-06-29 12:35:23', '2020-05-27 21:41:04', 1),
(18, 2, '2020-06-28', 0, 1, 144, '2020-07-01 08:12:20', '2020-06-28 02:19:45', 1),
(19, 3, '2020-06-28', 0, 1, 1936, '2020-07-01 08:53:21', '2020-06-28 02:32:56', 1),
(20, 4, '2020-06-28', 0, 0, 23232, '2020-07-01 08:07:36', '2020-06-28 02:33:12', 1),
(21, 5, '2020-08-03', 0, 0, 49005, '2020-08-03 05:59:28', '2020-08-03 05:59:28', 1),
(22, 6, '2020-08-09', 0, 0, 1250, '2020-08-09 06:17:04', '2020-08-09 06:17:04', 1),
(24, 2, '2020-08-24', 0, 0, 360, '2020-09-02 16:47:45', '2020-08-24 05:52:22', 23),
(28, 2, '2020-09-04', 1001, 0, 1450, '2020-09-03 18:41:35', '2020-09-03 18:41:35', 3),
(29, 3, '2020-09-04', 1001, 0, 116, '2020-09-03 18:42:03', '2020-09-03 18:42:03', 3),
(62, 3, '2020-09-04', 1001, 0, 1000, '2020-09-03 20:45:47', '2020-09-03 20:45:47', 3),
(63, 4, '2020-09-04', 1001, 0, 1000, '2020-09-03 20:46:28', '2020-09-03 20:46:28', 3);

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
(62, 'ali', 20, 2, 25, 0, '-', 4, '2020-09-04 04:46:50', NULL, 3);

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
  `paymentId` int(11) NOT NULL,
  `purchaseId` int(11) NOT NULL,
  `paymentDate` date NOT NULL,
  `paymentDest` varchar(255) NOT NULL,
  `total` double NOT NULL,
  `custId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`paymentId`, `purchaseId`, `paymentDate`, `paymentDest`, `total`, `custId`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 1, '2020-05-23', 'Payment 666', 20, 1001, '2020-05-23 04:15:33', '2020-05-23 04:15:33', 1),
(2, 2, '2020-05-23', 'Payment 123456', 200, 1002, '2020-05-23 04:24:53', '2020-05-23 04:24:53', 1),
(3, 3, '2020-05-23', 'Payment 3', 20, 1001, '2020-05-23 07:35:24', '2020-05-23 07:35:24', 1),
(17, 4, '2020-06-29', 'Payment 2', 1980, 1002, '2020-06-29 04:03:59', '2020-06-29 04:03:59', 1),
(18, 5, '2020-06-29', 'Payment 99', 20, 1001, '2020-06-29 04:35:23', '2020-06-29 04:35:23', 1),
(19, 1, '2020-09-02', '1233', 700, 123, '2020-09-02 07:03:43', '2020-09-02 07:03:43', 3);

-- --------------------------------------------------------

--
-- Table structure for table `purchasedetails`
--

CREATE TABLE `purchasedetails` (
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
-- Dumping data for table `purchasedetails`
--

INSERT INTO `purchasedetails` (`id`, `productName`, `productWeight`, `productQty`, `productCost`, `productMkg`, `productRemarks`, `invId`, `updated_at`, `created_at`, `user_id`) VALUES
(7, 'abu', 20, 4, 6, 0, '-', 3, '2020-08-24 14:25:49', NULL, 3),
(8, 'siti', 20, 4, 3, 10, '-', 3, '2020-08-24 14:25:49', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `purchaseinvoice`
--

CREATE TABLE `purchaseinvoice` (
  `invId` int(11) NOT NULL,
  `date` date NOT NULL,
  `vendorId` varchar(255) NOT NULL,
  `payment` int(11) NOT NULL,
  `total` float NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchaseinvoice`
--

INSERT INTO `purchaseinvoice` (`invId`, `date`, `vendorId`, `payment`, `total`, `updated_at`, `created_at`, `user_id`) VALUES
(6, '2020-08-24', 'ali', 0, 480, '2020-08-24 05:54:08', '2020-08-24 05:54:08', 3),
(7, '2020-08-24', 'ali', 0, 210, '2020-09-02 16:09:43', '2020-08-24 06:25:39', 3);

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
(2, 'TestAcc2', 'hanshengliang@gmail.com', NULL, '$2y$10$MPWVR.sJ1ygqOK4c1KVRiec8urORWk.IyRG0TcGlwNrtgeuVmORm6', NULL, '2020-05-20 23:37:41', '2020-05-20 23:37:41'),
(3, 'abu', 'abu@gmail.com', NULL, '$2y$10$OcP8WZ6dyvXnJWMOaaqGfO1OrjH1W6tm70YvGeq10vcFz7Q94LnTi', NULL, '2020-08-21 02:13:01', '2020-08-21 02:13:01');

-- --------------------------------------------------------

--
-- Table structure for table `vendorpayment`
--

CREATE TABLE `vendorpayment` (
  `id` int(11) NOT NULL,
  `purchaseId` int(11) NOT NULL,
  `paymentDate` date NOT NULL,
  `paymentDest` varchar(255) NOT NULL,
  `total` double NOT NULL,
  `vendorId` int(11) NOT NULL,
  `vendorName` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`companyCode`);

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
  ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `purchasedetails`
--
ALTER TABLE `purchasedetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchaseinvoice`
--
ALTER TABLE `purchaseinvoice`
  ADD PRIMARY KEY (`invId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendorpayment`
--
ALTER TABLE `vendorpayment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `companyCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orderinvoice`
--
ALTER TABLE `orderinvoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `paymentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `purchasedetails`
--
ALTER TABLE `purchasedetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `purchaseinvoice`
--
ALTER TABLE `purchaseinvoice`
  MODIFY `invId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendorpayment`
--
ALTER TABLE `vendorpayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
