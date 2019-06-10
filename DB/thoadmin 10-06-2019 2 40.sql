-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2019 at 11:09 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

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
-- Table structure for table `category_setup`
--

CREATE TABLE `category_setup` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `company_id_fk` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_setup`
--

INSERT INTO `category_setup` (`id`, `category_name`, `status`, `company_id_fk`, `created_at`, `updated_at`) VALUES
(3, 'Deluxe', 1, NULL, '2019-05-30 14:25:27', '2019-06-10 09:58:50'),
(4, 'Luxury', 1, NULL, '2019-05-30 14:43:08', '2019-06-04 17:47:09'),
(5, 'Comfort', 1, NULL, '2019-05-30 14:43:52', '2019-06-06 16:06:37');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_phone` varchar(20) NOT NULL,
  `contact_mobile` varchar(20) NOT NULL,
  `contact_address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `contact_name`, `contact_phone`, `contact_mobile`, `contact_address`, `created_at`, `updated_at`) VALUES
(4, 'Ranjan Kumar', '8470029133', '9122713468', 's', '2019-05-30 12:04:22', '2019-05-30 12:04:22'),
(5, 'Ranjan Kumar', '8470029133', '9122713468', 'dddd', '2019-05-30 12:09:35', '2019-05-30 12:09:35');

-- --------------------------------------------------------

--
-- Table structure for table `country_setup`
--

CREATE TABLE `country_setup` (
  `id` int(11) NOT NULL,
  `country_name` varchar(255) DEFAULT NULL,
  `currency_code` varchar(255) DEFAULT NULL,
  `currency_symbol` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `company_id_fk` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country_setup`
--

INSERT INTO `country_setup` (`id`, `country_name`, `currency_code`, `currency_symbol`, `status`, `company_id_fk`, `created_at`, `updated_at`) VALUES
(3, 'India', 'INR', '₹', 0, NULL, '2019-05-31 11:56:17', '2019-06-10 09:58:58'),
(4, 'NewZealand', 'NZD', 'NZD$', 1, NULL, '2019-05-31 12:07:13', '2019-06-06 16:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `customer_setup`
--

CREATE TABLE `customer_setup` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `cus_name` varchar(255) DEFAULT NULL,
  `cus_email` varchar(255) DEFAULT NULL,
  `contact_no` text,
  `parent_acc` varchar(255) DEFAULT NULL,
  `location_id_fk` int(11) DEFAULT NULL,
  `tax_type_id` varchar(255) DEFAULT NULL,
  `additional_info` text,
  `company_id_fk` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_setup`
--

INSERT INTO `customer_setup` (`id`, `title`, `cus_name`, `cus_email`, `contact_no`, `parent_acc`, `location_id_fk`, `tax_type_id`, `additional_info`, `company_id_fk`, `created_at`, `updated_at`) VALUES
(2, 'Mr', 'Anand sd', 'anand@gmail.com', '9876543210', '1', 2, '1', 'hiii', NULL, '2019-06-04 11:05:12', '2019-06-10 09:54:32'),
(4, 'Mr', 'Prashant', 'prashant@gmail.com', '9876543277', '4', 2, '4', 'hi', NULL, '2019-06-04 12:52:12', '2019-06-04 12:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `event_date` date NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `event_date`, `event_name`, `event_description`, `created_at`, `updated_at`) VALUES
(3, '2020-12-26', 'Justin Bieber Concert', 'Full Masti and Party krenge', '2019-05-31 16:52:47', '2019-05-31 16:53:11');

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
-- Table structure for table `invoice_item`
--

CREATE TABLE `invoice_item` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `is_tour` tinyint(1) NOT NULL DEFAULT '0',
  `exclude_from_discounts` tinyint(1) NOT NULL DEFAULT '0',
  `status` int(11) DEFAULT NULL,
  `company_id_fk` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_item`
--

INSERT INTO `invoice_item` (`id`, `item_name`, `is_tour`, `exclude_from_discounts`, `status`, `company_id_fk`, `created_at`, `updated_at`) VALUES
(1, 'Accomodation', 1, 1, 1, NULL, '2019-06-06 10:19:57', '2019-06-10 09:54:39'),
(2, 'ABN Ganges Cruise', 0, 0, 1, NULL, '2019-06-06 10:22:57', '2019-06-06 14:53:10'),
(6, 'erfg', 0, 1, 1, NULL, '2019-06-06 11:32:29', '2019-06-06 14:28:20'),
(7, 'ghk', 0, 1, 1, NULL, '2019-06-06 11:32:58', '2019-06-07 15:06:12');

-- --------------------------------------------------------

--
-- Table structure for table `location_setup`
--

CREATE TABLE `location_setup` (
  `id` int(11) NOT NULL,
  `location_name` varchar(255) DEFAULT NULL,
  `region` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `company_id_fk` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_setup`
--

INSERT INTO `location_setup` (`id`, `location_name`, `region`, `status`, `company_id_fk`, `created_at`, `updated_at`) VALUES
(1, 'Abbotsford-VIC', 3, 1, NULL, '2019-06-03 10:27:18', '2019-06-10 10:00:23'),
(2, 'Alexandra Hills-QLD', 4, 1, NULL, '2019-06-03 11:21:50', '2019-06-07 12:33:02'),
(3, 'dfgd', 1, 1, NULL, '2019-06-10 09:59:23', '2019-06-10 10:00:25');

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
-- Table structure for table `purchase_item`
--

CREATE TABLE `purchase_item` (
  `id` int(11) NOT NULL,
  `po_id_fk` varchar(255) NOT NULL,
  `pi_booking_reference` varchar(255) NOT NULL,
  `pi_supplier_amount` varchar(255) NOT NULL,
  `pi_amount` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_item`
--

INSERT INTO `purchase_item` (`id`, `po_id_fk`, `pi_booking_reference`, `pi_supplier_amount`, `pi_amount`, `created_at`, `updated_at`) VALUES
(31, '20', 'THOU', '25000', '25000', '2019-06-10 07:25:20', '2019-06-10 07:25:20'),
(32, '20', 'THOU', '15000', '150000', '2019-06-10 07:25:20', '2019-06-10 07:25:20');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id` int(11) NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `po_supplier_name` varchar(255) NOT NULL,
  `po_supplier_currency` varchar(255) NOT NULL,
  `po_closing_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `po_ex_usd_rate` varchar(255) NOT NULL,
  `po_ex_aud_rate` varchar(255) NOT NULL,
  `po_narration` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`id`, `purchase_date`, `po_supplier_name`, `po_supplier_currency`, `po_closing_date`, `po_ex_usd_rate`, `po_ex_aud_rate`, `po_narration`, `created_at`, `updated_at`) VALUES
(20, '2019-06-09 18:30:00', '2', '2', '2019-06-09 18:30:00', '1.00', '1.00', 'IN', '2019-06-10 07:25:20', '2019-06-10 07:25:20');

-- --------------------------------------------------------

--
-- Table structure for table `region_setup`
--

CREATE TABLE `region_setup` (
  `id` int(11) NOT NULL,
  `region_name` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `company_id_fk` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region_setup`
--

INSERT INTO `region_setup` (`id`, `region_name`, `status`, `company_id_fk`, `created_at`, `updated_at`) VALUES
(1, 'Delhi', 0, NULL, '2019-05-31 15:14:48', '2019-06-10 09:59:03'),
(3, 'Victoria', 1, NULL, '2019-06-03 09:50:40', '2019-06-07 11:25:14'),
(4, 'Queensland', 1, NULL, '2019-06-03 09:50:50', '2019-06-07 11:25:14'),
(5, 'ATC', 1, NULL, '2019-06-03 09:50:58', '2019-06-07 11:25:14'),
(6, 'Western Australia', 1, NULL, '2019-06-03 09:51:27', '2019-06-07 11:25:14'),
(7, 'New South wales', 1, NULL, '2019-06-03 09:51:44', '2019-06-07 11:25:14'),
(8, 'Tasmania', 1, NULL, '2019-06-03 09:52:12', '2019-06-07 11:25:39');

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
(1, 'Tilak singh', 'tilak@gmail.com', NULL, '$2y$10$zmuD8GAj.cUk8TCXZzMMfO7hGRLlf5EI7fwizU9lXz9SclLBdomFG', 'zYEijasQweDPMiyE9p2rj2c9Pxvfhk3hOdBtQdVN6BAR9T7bz9FK7cfy24ho', '2019-05-27 23:17:47', '2019-05-29 05:12:54'),
(2, 'anand 111', 'anand@gmail.com', NULL, '$2y$10$GxtlizXBtsmEO9m5gFVeseEQKt2j.FtcRjVQrueFe9WvL48mFBXQ6', NULL, '2019-05-28 01:16:10', '2019-05-29 09:02:40'),
(3, 'Ranjan', 'ranjan@gmail.com', NULL, '$2y$10$8jo6rnUDHiYibJv7Xp6hhuDOHSPDZdRsTBCbJsnjYxkMgS/t/fQnW', NULL, '2019-05-29 09:34:40', '2019-05-29 09:34:40');

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
-- Indexes for table `category_setup`
--
ALTER TABLE `category_setup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_setup`
--
ALTER TABLE `country_setup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_setup`
--
ALTER TABLE `customer_setup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_item`
--
ALTER TABLE `invoice_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location_setup`
--
ALTER TABLE `location_setup`
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
-- Indexes for table `purchase_item`
--
ALTER TABLE `purchase_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
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
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `purchase_item`
--
ALTER TABLE `purchase_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
