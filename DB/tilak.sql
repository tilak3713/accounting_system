-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2019 at 11:42 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thoadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `account_group` int(11) DEFAULT NULL,
  `parent_account` varchar(50) NOT NULL DEFAULT '0',
  `advance_account` varchar(20) DEFAULT NULL,
  `is_cash_or_bank` int(11) NOT NULL DEFAULT '0',
  `is_customer_related` int(11) NOT NULL DEFAULT '0',
  `all_ledger_printing` int(11) NOT NULL DEFAULT '0',
  `is_supplier_account` int(11) NOT NULL DEFAULT '0',
  `is_expense_account` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1',
  `account_additional_info` varchar(250) NOT NULL,
  `updated_at` varchar(50) NOT NULL,
  `created_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `account_name`, `account_group`, `parent_account`, `advance_account`, `is_cash_or_bank`, `is_customer_related`, `all_ledger_printing`, `is_supplier_account`, `is_expense_account`, `status`, `account_additional_info`, `updated_at`, `created_at`) VALUES
(1, 'jgjgjgj', 1, '0', NULL, 0, 0, 0, 0, 1, 1, 'xc', '2019-06-06 17:39:31', '2019-06-06 12:55:10'),
(2, 'visa', 1, '0', NULL, 1, 0, 0, 0, 0, 1, 'cards', '2019-06-06 17:40:14', '2019-06-06 17:40:14');

-- --------------------------------------------------------

--
-- Table structure for table `account_group`
--

CREATE TABLE `account_group` (
  `id` int(11) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `group_type` varchar(50) NOT NULL,
  `position` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `updated_at` varchar(50) NOT NULL,
  `created_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_group`
--

INSERT INTO `account_group` (`id`, `group_name`, `group_type`, `position`, `status`, `updated_at`, `created_at`) VALUES
(1, 'tsfdsgdsfgsdfg', 'B', NULL, 1, '2019-06-06 12:58:20', '2019-06-06 12:58:20');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `cash_or_bank_ac` varchar(20) NOT NULL,
  `narration` varchar(250) NOT NULL,
  `account` varchar(20) NOT NULL,
  `tax_type` varchar(20) NOT NULL,
  `amount_without_tax` varchar(20) NOT NULL,
  `tax_amount` varchar(20) NOT NULL,
  `amount_with_tax` varchar(20) NOT NULL,
  `updated_at` varchar(20) NOT NULL,
  `created_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `cash_or_bank_ac`, `narration`, `account`, `tax_type`, `amount_without_tax`, `tax_amount`, `amount_with_tax`, `updated_at`, `created_at`) VALUES
(1, '2', 'dsfsdfsdf', '1', '12', '12999.00', '1559.88', '14558.88', '2019-06-06 17:45:04', '2019-06-06 17:40:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packagecategory`
--

CREATE TABLE `packagecategory` (
  `id` int(11) NOT NULL,
  `category` varchar(250) NOT NULL,
  `parent_id` varchar(20) NOT NULL,
  `user` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `id` int(11) NOT NULL,
  `tax_type_code` varchar(20) NOT NULL,
  `tax_type_name` varchar(20) NOT NULL,
  `tax_rate` varchar(20) NOT NULL,
  `updated_at` varchar(20) NOT NULL,
  `created_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`id`, `tax_type_code`, `tax_type_name`, `tax_rate`, `updated_at`, `created_at`) VALUES
(1, 'newgst', 'GST5', '12', '2019-06-06 17:44:36', '2019-06-06 17:35:03');

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
(1, 'Tilak singh', 'tilak@gmail.com', NULL, '$2y$10$zmuD8GAj.cUk8TCXZzMMfO7hGRLlf5EI7fwizU9lXz9SclLBdomFG', 'DC1id9UKFBKkEJ0gSRZGqWsJ0xxrP96ABDDjumJgYhCJGjCajdaFzHXoZjjM', '2019-05-27 23:17:47', '2019-05-29 05:12:54'),
(2, 'anand 111', 'anand@gmail.com', NULL, '$2y$10$GxtlizXBtsmEO9m5gFVeseEQKt2j.FtcRjVQrueFe9WvL48mFBXQ6', NULL, '2019-05-28 01:16:10', '2019-05-29 09:02:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_group` (`account_group`);

--
-- Indexes for table `account_group`
--
ALTER TABLE `account_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packagecategory`
--
ALTER TABLE `packagecategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
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
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `account_group`
--
ALTER TABLE `account_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packagecategory`
--
ALTER TABLE `packagecategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
