-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2026 at 11:20 AM
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
-- Database: `evfast`
--

-- --------------------------------------------------------

--
-- Table structure for table `abandoned_checkouts`
--

CREATE TABLE `abandoned_checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` text DEFAULT NULL,
  `pincode` varchar(6) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `cart_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`cart_data`)),
  `total_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `coupon_code` varchar(255) DEFAULT NULL,
  `recovered` tinyint(1) NOT NULL DEFAULT 0,
  `recovered_order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abandoned_checkouts`
--

INSERT INTO `abandoned_checkouts` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `pincode`, `state`, `city`, `cart_data`, `total_amount`, `coupon_code`, `recovered`, `recovered_order_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'Digilinkerlab@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Delhi', 'Delhi', '[{\"name\":\"Portable Ev Charger 3.6 KW\",\"quantity\":1,\"price\":\"14999.00\",\"image\":\"1770703110.jpg\"}]', 14999.00, NULL, 1, 1, '2026-02-10 00:55:09', '2026-02-10 00:55:52'),
(2, NULL, 'Shahid', 'digilinkerlab@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Delhi', 'Delhi', '[{\"name\":\"Portable Ev Charger 3.6 KW With Accessoies\",\"quantity\":1,\"price\":\"16499.00\",\"image\":\"1770800460.jpg\"}]', 16499.00, NULL, 1, 2, '2026-02-13 00:08:42', '2026-02-13 00:10:26'),
(3, 1, 'admin', 'Digilinkerlab@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Delhi', 'Delhi', '[{\"name\":\"Portable Ev Charger 3.6 KW\",\"quantity\":1,\"price\":\"14999.00\",\"image\":\"1770800013.jpg\"},{\"name\":\"Portable Ev Charger 7.4 KW With Accessoies\",\"quantity\":1,\"price\":\"19999.00\",\"image\":\"1770800681.jpg\"}]', 34998.00, NULL, 1, 3, '2026-02-13 00:51:05', '2026-02-13 00:51:43'),
(4, NULL, 'Shahid', 'test@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Delhi', 'Delhi', '[{\"name\":\"Type 2 32A Gun With 5M Cable\",\"quantity\":1,\"price\":\"4499.00\",\"image\":\"1770802418.jpg\"}]', 4499.00, NULL, 1, 4, '2026-02-13 00:53:23', '2026-02-13 00:54:02'),
(5, NULL, 'Shahid', 'anil@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Delhi', 'Delhi', '[{\"name\":\"Portable Charger Enclosure\",\"quantity\":1,\"price\":\"1499.00\",\"image\":\"1770802436.jpg\"}]', 1499.00, NULL, 1, 5, '2026-02-13 01:39:48', '2026-02-13 01:40:19'),
(6, NULL, 'Shahid', 'Digilinkerlab@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Delhi', 'Delhi', '[{\"name\":\"22 KW EV Charger ( Standard)\",\"quantity\":1,\"price\":\"43999.00\",\"image\":\"1770801368.jpg\"}]', 43999.00, NULL, 1, 6, '2026-02-13 01:44:41', '2026-02-13 01:45:51'),
(7, NULL, 'shahid', 'test@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Delhi', 'Delhi', '[{\"name\":\"7.4 KW EV Charger ( Plug N Play \\/RFID)\",\"quantity\":1,\"price\":\"27499.00\",\"image\":\"1770800936.jpg\"}]', 27499.00, NULL, 1, 7, '2026-02-13 02:43:42', '2026-02-13 02:44:24'),
(8, NULL, 'Shahid', 'Digilinkerlab@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Delhi', 'Delhi', '[{\"name\":\"7.4 KW EV Charger  ( Standard )\",\"quantity\":1,\"price\":\"30999.00\",\"image\":\"1770801046.jpg\"}]', 30999.00, NULL, 1, 8, '2026-02-13 02:48:54', '2026-02-13 02:49:27'),
(9, NULL, 'Shahid', 'Digilinkerlab@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Delhi', 'Delhi', '[{\"name\":\"Portable Ev Charger 3.6 KW\",\"quantity\":1,\"price\":\"14999.00\",\"image\":\"1770800013.jpg\"}]', 14999.00, NULL, 1, 9, '2026-02-13 02:56:05', '2026-02-13 02:56:38'),
(10, 1, 'admin', 'test@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Delhi', 'Delhi', '[{\"name\":\"Portable Ev Charger 3.6 KW\",\"quantity\":1,\"price\":\"14999.00\",\"image\":\"1770800013.jpg\"}]', 14999.00, NULL, 1, 10, '2026-02-13 03:02:01', '2026-02-13 03:02:37'),
(11, NULL, 'Shahid', 'Digilinkerlab@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Delhi', 'Delhi', '[{\"name\":\"Portable Ev Charger 3.6 KW With Accessoies\",\"quantity\":1,\"price\":\"16499.00\",\"image\":\"1770800460.jpg\"}]', 16499.00, NULL, 1, 11, '2026-02-13 03:08:13', '2026-02-13 03:08:42'),
(12, NULL, 'shahid', 'shahid12@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Delhi', 'Delhi', '[{\"name\":\"Portable Ev Charger 3.6 KW With Accessoies\",\"quantity\":1,\"price\":\"16499.00\",\"image\":\"1770800460.jpg\"}]', 16499.00, NULL, 1, 12, '2026-02-13 03:11:50', '2026-02-13 03:12:40'),
(13, NULL, 'Shahid', 'Digilinkerlab@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Haryana', 'Haryana', '[{\"name\":\"7.4 KW EV Charger  ( Standard )\",\"quantity\":1,\"price\":\"30999.00\",\"image\":\"1770801046.jpg\"}]', 30999.00, NULL, 1, 13, '2026-02-13 03:17:44', '2026-02-13 03:21:21'),
(14, NULL, 'Shahid', 'Digilinkerlab@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Jammu & Kashmir', 'Delhi', '[{\"name\":\"Portable Ev Charger 3.6 KW\",\"quantity\":2,\"price\":\"14999.00\",\"image\":\"1770800013.jpg\"}]', 42598.00, NULL, 1, 14, '2026-02-13 03:46:06', '2026-02-13 03:46:44'),
(15, NULL, 'Shahid', 'Digilinkerlab@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Himachal Pradesh', 'Delhi', '[{\"name\":\"Portable Ev Charger 3.6 KW\",\"quantity\":1,\"price\":\"14999.00\",\"image\":\"1770800013.jpg\"}]', 21299.00, NULL, 1, 15, '2026-02-13 03:48:06', '2026-02-13 03:48:38'),
(16, NULL, 'Shahid', 'anil@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Himachal Pradesh', 'Delhi', '[{\"name\":\"Portable Ev Charger 3.6 KW\",\"quantity\":1,\"price\":\"14999.00\",\"image\":\"1770800013.jpg\"}]', 21299.00, NULL, 1, 16, '2026-02-13 03:49:22', '2026-02-13 03:50:01'),
(17, NULL, 'shahid324', 'aniket@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Delhi', 'Delhi', '[{\"name\":\"Portable Ev Charger 3.6 KW With Accessoies\",\"quantity\":1,\"price\":\"16499.00\",\"image\":\"1770800460.jpg\"}]', 16499.00, NULL, 1, 17, '2026-02-13 03:51:31', '2026-02-13 03:52:01'),
(18, 1, 'admin', 'Digilinkerlab@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Himachal Pradesh', 'Delhi', '[{\"name\":\"11 KW EV Charger ( Plug N Play \\/RFID)\",\"quantity\":1,\"price\":\"35499.00\",\"image\":\"1770801132.jpg\"}]', 35499.00, NULL, 1, 18, '2026-02-13 03:52:47', '2026-02-13 03:53:23'),
(19, NULL, 'shahid', 'Digilinkerlab@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Delhi', 'Delhi', '[{\"name\":\"Portable Ev Charger 3.6 KW\",\"quantity\":1,\"price\":\"14999.00\",\"image\":\"1770800013.jpg\"},{\"name\":\"Portable Ev Charger 3.6 KW With Accessoies\",\"quantity\":1,\"price\":\"16499.00\",\"image\":\"1770800460.jpg\"}]', 31498.00, NULL, 1, 19, '2026-02-13 03:53:53', '2026-02-13 03:54:23'),
(20, 1, 'admin', 'Digilinkerlab@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Delhi', 'Delhi', '[{\"name\":\"Portable Ev Charger 3.6 KW\",\"quantity\":1,\"price\":\"14999.00\",\"image\":\"1770800013.jpg\"}]', 14999.00, NULL, 1, 20, '2026-02-13 03:55:07', '2026-02-13 03:55:37'),
(21, NULL, 'Shahid', 'Digilinkerlab@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Haryana', 'Delhi', '[{\"name\":\"Portable Ev Charger 3.6 KW\",\"quantity\":1,\"price\":\"14999.00\",\"image\":\"1770800013.jpg\"}]', 21299.00, NULL, 1, 21, '2026-02-13 03:56:24', '2026-02-13 03:57:09'),
(22, 1, 'admin', 'test2@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Chhattisgarh', 'Delhi', '[{\"name\":\"Portable Ev Charger 3.6 KW With Accessoies\",\"quantity\":1,\"price\":\"16499.00\",\"image\":\"1770800460.jpg\"}]', 16499.00, NULL, 1, 22, '2026-02-13 04:38:48', '2026-02-13 04:39:36'),
(23, 1, 'admin', 'test3@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Delhi', 'Delhi', '[{\"name\":\"7.4 KW EV Charger ( Plug N Play \\/RFID)\",\"quantity\":1,\"price\":\"27499.00\",\"image\":\"1770800936.jpg\"},{\"name\":\"11 KW EV Charger ( Plug N Play \\/RFID)\",\"quantity\":1,\"price\":\"35499.00\",\"image\":\"1770801132.jpg\"},{\"name\":\"11 KW EV Charger ( Standard)\",\"quantity\":1,\"price\":\"39999.00\",\"image\":\"1770801223.jpg\"}]', 102997.00, NULL, 1, 23, '2026-02-13 04:41:26', '2026-02-13 04:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `addon_product`
--

CREATE TABLE `addon_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `addon_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `label` varchar(255) NOT NULL DEFAULT 'Home',
  `name` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `label`, `name`, `phone`, `address`, `pincode`, `state`, `city`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 2, 'Home', 'admin', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Delhi', 'Delhi', 1, '2026-02-10 00:55:52', '2026-02-10 00:55:52'),
(2, 3, 'Billing', 'Shahid', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Delhi', 'Delhi', 1, '2026-02-13 00:54:02', '2026-02-13 00:54:02'),
(3, 3, 'Shipping', 'shahid', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Delhi', 'Delhi', 0, '2026-02-13 00:54:02', '2026-02-13 00:54:02'),
(4, 4, 'Billing', 'Shahid', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Delhi', 'Delhi', 1, '2026-02-13 01:40:19', '2026-02-13 01:40:19'),
(5, 4, 'Shipping', 'anil', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Delhi', 'Delhi', 0, '2026-02-13 01:40:19', '2026-02-13 01:40:19'),
(6, 5, 'Billing', 'shahid', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Delhi', 'Delhi', 1, '2026-02-13 03:12:40', '2026-02-13 03:12:40'),
(7, 6, 'Billing', 'shahid324', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Delhi', 'Delhi', 1, '2026-02-13 03:52:01', '2026-02-13 03:52:01'),
(8, 7, 'Billing', 'admin', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Chhattisgarh', 'Delhi', 1, '2026-02-13 04:39:36', '2026-02-13 04:39:36'),
(9, 8, 'Billing', 'admin', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Delhi', 'Delhi', 1, '2026-02-13 04:42:03', '2026-02-13 04:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `featured_image` varchar(255) DEFAULT NULL,
  `post_title` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `blog_post` longtext NOT NULL,
  `description` text DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Portable Ev Charger', 'portable-ev-charger', 1, '2026-02-10 00:01:09', '2026-02-10 00:01:09'),
(2, 'Popular AC Charger', 'popular-ac-charger', 1, '2026-02-10 00:01:32', '2026-02-10 00:01:32'),
(3, 'AC Chargers', 'ac-chargers', 1, '2026-02-10 00:01:50', '2026-02-10 00:01:50'),
(4, 'DC Charger', 'dc-charger', 1, '2026-02-10 00:01:59', '2026-02-10 00:01:59'),
(5, 'Gun Holders', 'gun-holders', 1, '2026-02-10 00:02:09', '2026-02-10 00:02:09'),
(6, 'Accessories', 'accessories', 1, '2026-02-10 00:02:27', '2026-02-10 00:02:27');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'flat',
  `value` decimal(10,2) NOT NULL,
  `max_discount` decimal(10,2) DEFAULT NULL,
  `min_order_amount` decimal(10,2) DEFAULT NULL,
  `max_uses` int(11) NOT NULL DEFAULT 1,
  `used_count` int(11) NOT NULL DEFAULT 0,
  `expires_at` date NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_01_23_051814_add_role_and_status_to_users_table', 1),
(5, '2026_01_27_081946_create_categories_table', 1),
(6, '2026_01_27_085804_create_products_table', 1),
(7, '2026_01_28_054347_create_orders_table', 1),
(8, '2026_01_28_054418_create_order_items_table', 1),
(9, '2026_01_28_083610_alter_products_table_add_images', 1),
(10, '2026_01_28_104756_add_timestamps_to_orders_table', 1),
(11, '2026_01_28_105531_add_timestamps_to_order_items_table', 1),
(12, '2026_01_29_114314_add_address_fields_to_orders_table', 1),
(13, '2026_02_06_070110_add_extra_fields_to_products_table', 1),
(14, '2026_02_06_101153_create_addons_table', 1),
(15, '2026_02_06_101243_create_addon_product_table', 1),
(16, '2026_02_06_114001_create_product_related_table', 1),
(17, '2026_02_07_055641_add_youtube_url_to_products_table', 1),
(18, '2026_02_07_094616_add_payment_id_to_orders_table', 1),
(19, '2026_02_09_051025_create_blogs_table', 1),
(20, '2026_02_09_063945_add_gst_fields_to_products_table', 1),
(21, '2026_02_09_065501_add_coupon_fields_to_orders_table', 1),
(22, '2026_02_09_065501_add_gst_fields_to_order_items_table', 1),
(23, '2026_02_09_065502_create_coupons_table', 1),
(24, '2026_02_09_090656_create_shipping_zones_table', 1),
(25, '2026_02_09_090702_add_shipping_amount_to_orders_table', 1),
(26, '2026_02_09_090702_add_shipping_type_to_products_table', 1),
(27, '2026_02_09_100714_create_product_addon_table', 1),
(28, '2026_02_09_110000_add_user_id_to_orders_table', 1),
(29, '2026_02_09_110001_create_addresses_table', 1),
(30, '2026_02_09_110002_add_phone_and_image_to_users_table', 1),
(31, '2026_02_09_151428_add_payment_method_and_status_to_orders_table', 1),
(32, '2026_02_09_161243_create_abandoned_checkouts_table', 1),
(33, '2026_02_09_163525_add_invoice_number_to_orders_table', 1),
(34, '2026_02_12_043940_add_shipping_rate_and_gst_fields', 2),
(35, '2026_02_12_081219_add_gstin_and_shipping_address_fields', 2),
(36, '2026_02_12_090245_add_serial_number_to_order_items_table', 2),
(38, '2026_02_13_064155_add_hsn_code_to_products_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `discount_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `subtotal` decimal(10,2) NOT NULL DEFAULT 0.00,
  `gst_total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `shipping_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `shipping_gst` decimal(10,2) NOT NULL DEFAULT 0.00,
  `payment_method` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pincode` varchar(6) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `gstin` varchar(15) DEFAULT NULL,
  `shipping_name` varchar(255) DEFAULT NULL,
  `shipping_phone` varchar(10) DEFAULT NULL,
  `shipping_address` text DEFAULT NULL,
  `shipping_pincode` varchar(6) DEFAULT NULL,
  `shipping_state` varchar(255) DEFAULT NULL,
  `shipping_city` varchar(255) DEFAULT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `invoice_number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `total_amount`, `coupon_id`, `discount_amount`, `subtotal`, `gst_total`, `shipping_amount`, `shipping_gst`, `payment_method`, `payment_status`, `status`, `created_at`, `updated_at`, `pincode`, `state`, `city`, `gstin`, `shipping_name`, `shipping_phone`, `shipping_address`, `shipping_pincode`, `shipping_state`, `shipping_city`, `payment_id`, `invoice_number`) VALUES
(1, 2, 'admin', 'Digilinkerlab@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', 14999.00, NULL, 0.00, 14284.76, 714.24, 0.00, 0.00, 'razorpay', 'paid', 'canceled', '2026-02-10 00:55:52', '2026-02-10 03:58:14', '110028', 'Delhi', 'Delhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pay_SELL0IjzdwaLe1', 'EVF-2526-00001'),
(2, 2, 'Shahid', 'digilinkerlab@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', 16499.00, NULL, 0.00, 15713.33, 785.67, 0.00, 0.00, 'razorpay', 'paid', 'pending', '2026-02-13 00:10:25', '2026-02-13 00:10:25', '110028', 'Delhi', 'Delhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pay_SFWAMo9niCoBOP', 'EVF-2526-00002'),
(3, 2, 'admin', 'Digilinkerlab@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', 34998.00, NULL, 0.00, 33331.43, 1666.57, 0.00, 0.00, 'razorpay', 'paid', 'pending', '2026-02-13 00:51:42', '2026-02-13 00:51:42', '110028', 'Delhi', 'Delhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pay_SFWryVkte0vN3N', 'EVF-2526-00003'),
(4, 3, 'Shahid', 'test@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', 4499.00, NULL, 0.00, 3812.71, 686.29, 0.00, 0.00, 'razorpay', 'paid', 'pending', '2026-02-13 00:54:02', '2026-02-13 00:54:02', '110028', 'Delhi', 'Delhi', NULL, 'shahid', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Delhi', 'Delhi', 'pay_SFWuKuMwfCOow2', 'EVF-2526-00004'),
(5, 4, 'Shahid', 'anil@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', 1499.00, NULL, 0.00, 1270.34, 228.66, 0.00, 0.00, 'razorpay', 'paid', 'pending', '2026-02-13 01:40:19', '2026-02-13 01:40:19', '110028', 'Delhi', 'Delhi', NULL, 'anil', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Delhi', 'Delhi', 'pay_SFXhLu5XRBIckQ', 'EVF-2526-00005'),
(6, 2, 'Shahid', 'Digilinkerlab@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', 43999.00, NULL, 0.00, 41903.81, 2095.19, 0.00, 0.00, 'razorpay', 'paid', 'pending', '2026-02-13 01:45:51', '2026-02-13 01:45:51', '110028', 'Delhi', 'Delhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pay_SFXmWfeneYsDcJ', 'EVF-2526-00006'),
(7, 3, 'shahid', 'test@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', 27499.00, NULL, 0.00, 26189.52, 1309.48, 0.00, 0.00, 'razorpay', 'paid', 'pending', '2026-02-13 02:44:24', '2026-02-13 02:44:24', '110028', 'Delhi', 'Delhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pay_SFYn3WvWA1Qgqe', 'EVF-2526-00007'),
(8, 2, 'Shahid', 'Digilinkerlab@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', 30999.00, NULL, 0.00, 29522.86, 1476.14, 0.00, 0.00, 'razorpay', 'paid', 'pending', '2026-02-13 02:49:27', '2026-02-13 02:49:27', '110028', 'Delhi', 'Delhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pay_SFYsLIYYpUplCw', 'EVF-2526-00008'),
(9, 2, 'Shahid', 'Digilinkerlab@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', 14999.00, NULL, 0.00, 14284.76, 714.24, 0.00, 0.00, 'razorpay', 'paid', 'pending', '2026-02-13 02:56:38', '2026-02-13 02:56:38', '110028', 'Delhi', 'Delhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pay_SFYzwphzSSLVjV', 'EVF-2526-00009'),
(10, 3, 'admin', 'test@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', 14999.00, NULL, 0.00, 14284.76, 714.24, 0.00, 0.00, 'razorpay', 'paid', 'pending', '2026-02-13 03:02:37', '2026-02-13 03:02:37', '110028', 'Delhi', 'Delhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pay_SFZ6CJfWjUkO2q', 'EVF-2526-00010'),
(11, 2, 'Shahid', 'Digilinkerlab@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', 16499.00, NULL, 0.00, 15713.33, 785.67, 0.00, 0.00, 'razorpay', 'paid', 'pending', '2026-02-13 03:08:42', '2026-02-13 03:08:42', '110028', 'Delhi', 'Delhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pay_SFZCkx5py115dz', 'EVF-2526-00011'),
(12, 5, 'shahid', 'shahid12@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', 16499.00, NULL, 0.00, 15713.33, 785.67, 0.00, 0.00, 'razorpay', 'paid', 'pending', '2026-02-13 03:12:40', '2026-02-13 03:12:40', '110028', 'Delhi', 'Delhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pay_SFZGbVg0SEP5W0', 'EVF-2526-00012'),
(13, 2, 'Shahid', 'Digilinkerlab@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', 30999.00, NULL, 0.00, 29522.86, 1476.14, 0.00, 0.00, 'razorpay', 'paid', 'pending', '2026-02-13 03:21:21', '2026-02-13 03:21:21', '110028', 'Haryana', 'Haryana', NULL, 'shahid', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', '110028', 'Goa', 'Haryana', 'pay_SFZQ1HlLDM2V9A', 'EVF-2526-00013'),
(14, 2, 'Shahid', 'Digilinkerlab@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', 42598.00, NULL, 0.00, 28569.52, 2028.48, 12000.00, 600.00, 'razorpay', 'paid', 'pending', '2026-02-13 03:46:44', '2026-02-13 03:46:44', '110028', 'Jammu & Kashmir', 'Delhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pay_SFZqqs2yOiLyas', 'EVF-2526-00014'),
(15, 2, 'Shahid', 'Digilinkerlab@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', 21299.00, NULL, 0.00, 14284.76, 1014.24, 6000.00, 300.00, 'razorpay', 'paid', 'pending', '2026-02-13 03:48:38', '2026-02-13 03:48:38', '110028', 'Himachal Pradesh', 'Delhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pay_SFZsv6LEtjwbuR', 'EVF-2526-00015'),
(16, 4, 'Shahid', 'anil@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', 21299.00, NULL, 0.00, 14284.76, 1014.24, 6000.00, 300.00, 'razorpay', 'paid', 'pending', '2026-02-13 03:50:01', '2026-02-13 03:50:01', '110028', 'Himachal Pradesh', 'Delhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pay_SFZuHQAo3w84XN', 'EVF-2526-00016'),
(17, 6, 'shahid324', 'aniket@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', 16499.00, NULL, 0.00, 15713.33, 785.67, 0.00, 0.00, 'razorpay', 'paid', 'pending', '2026-02-13 03:52:01', '2026-02-13 03:52:01', '110028', 'Delhi', 'Delhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pay_SFZwUKdaVUaOCW', 'EVF-2526-00017'),
(18, 2, 'admin', 'Digilinkerlab@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', 35499.00, NULL, 0.00, 33808.57, 1690.43, 0.00, 0.00, 'razorpay', 'paid', 'pending', '2026-02-13 03:53:23', '2026-02-13 03:53:23', '110028', 'Himachal Pradesh', 'Delhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pay_SFZxpyHJ6yor3W', 'EVF-2526-00018'),
(19, 2, 'shahid', 'Digilinkerlab@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', 31498.00, NULL, 0.00, 29998.09, 1499.91, 0.00, 0.00, 'razorpay', 'paid', 'pending', '2026-02-13 03:54:23', '2026-02-13 03:54:23', '110028', 'Delhi', 'Delhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pay_SFZyxYN2rbgqgj', 'EVF-2526-00019'),
(20, 2, 'admin', 'Digilinkerlab@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', 14999.00, NULL, 0.00, 14284.76, 714.24, 0.00, 0.00, 'razorpay', 'paid', 'pending', '2026-02-13 03:55:37', '2026-02-13 03:55:37', '110028', 'Delhi', 'Delhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pay_SFa0HAtq784bFU', 'EVF-2526-00020'),
(21, 2, 'Shahid', 'Digilinkerlab@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', 21299.00, NULL, 0.00, 14284.76, 1014.24, 6000.00, 300.00, 'razorpay', 'paid', 'completed', '2026-02-13 03:57:09', '2026-02-13 04:32:49', '110028', 'Haryana', 'Delhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pay_SFa1cbAS7fukqI', 'EVF-2526-00021'),
(22, 7, 'admin', 'test2@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', 16499.00, NULL, 0.00, 15713.33, 785.67, 0.00, 0.00, 'razorpay', 'paid', 'dispatched', '2026-02-13 04:39:36', '2026-02-13 04:40:16', '110028', 'Chhattisgarh', 'Delhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pay_SFakkASi2pKjms', 'EVF-2526-00022'),
(23, 8, 'admin', 'test3@gmail.com', '9818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', 102997.00, NULL, 0.00, 98092.38, 4904.62, 0.00, 0.00, 'razorpay', 'paid', 'dispatched', '2026-02-13 04:42:03', '2026-02-13 04:43:15', '110028', 'Delhi', 'Delhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pay_SFanCmp5yal6bx', 'EVF-2526-00023');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `base_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `gst_percentage` decimal(5,2) NOT NULL DEFAULT 0.00,
  `gst_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `serial_number` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `base_price`, `gst_percentage`, `gst_amount`, `discount_amount`, `total_price`, `serial_number`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 14999.00, 14284.76, 5.00, 714.24, 0.00, 14999.00, NULL, '2026-02-10 00:55:52', '2026-02-10 00:55:52'),
(2, 2, 2, 1, 16499.00, 15713.33, 5.00, 785.67, 0.00, 16499.00, NULL, '2026-02-13 00:10:25', '2026-02-13 00:10:25'),
(3, 3, 1, 1, 14999.00, 14284.76, 5.00, 714.24, 0.00, 14999.00, NULL, '2026-02-13 00:51:42', '2026-02-13 00:51:42'),
(4, 3, 4, 1, 19999.00, 19046.67, 5.00, 952.33, 0.00, 19999.00, NULL, '2026-02-13 00:51:43', '2026-02-13 00:51:43'),
(5, 4, 25, 1, 4499.00, 3812.71, 18.00, 686.29, 0.00, 4499.00, NULL, '2026-02-13 00:54:02', '2026-02-13 00:54:02'),
(6, 5, 26, 1, 1499.00, 1270.34, 18.00, 228.66, 0.00, 1499.00, NULL, '2026-02-13 01:40:19', '2026-02-13 01:40:19'),
(7, 6, 10, 1, 43999.00, 41903.81, 5.00, 2095.19, 0.00, 43999.00, NULL, '2026-02-13 01:45:51', '2026-02-13 01:45:51'),
(8, 7, 5, 1, 27499.00, 26189.52, 5.00, 1309.48, 0.00, 27499.00, NULL, '2026-02-13 02:44:24', '2026-02-13 02:44:24'),
(9, 8, 6, 1, 30999.00, 29522.86, 5.00, 1476.14, 0.00, 30999.00, NULL, '2026-02-13 02:49:27', '2026-02-13 02:49:27'),
(10, 9, 1, 1, 14999.00, 14284.76, 5.00, 714.24, 0.00, 14999.00, NULL, '2026-02-13 02:56:38', '2026-02-13 02:56:38'),
(11, 10, 1, 1, 14999.00, 14284.76, 5.00, 714.24, 0.00, 14999.00, NULL, '2026-02-13 03:02:37', '2026-02-13 03:02:37'),
(12, 11, 2, 1, 16499.00, 15713.33, 5.00, 785.67, 0.00, 16499.00, NULL, '2026-02-13 03:08:42', '2026-02-13 03:08:42'),
(13, 12, 2, 1, 16499.00, 15713.33, 5.00, 785.67, 0.00, 16499.00, NULL, '2026-02-13 03:12:40', '2026-02-13 03:12:40'),
(14, 13, 6, 1, 30999.00, 29522.86, 5.00, 1476.14, 0.00, 30999.00, NULL, '2026-02-13 03:21:21', '2026-02-13 03:21:21'),
(15, 14, 1, 2, 14999.00, 14284.76, 5.00, 1428.48, 0.00, 29998.00, NULL, '2026-02-13 03:46:44', '2026-02-13 03:46:44'),
(16, 15, 1, 1, 14999.00, 14284.76, 5.00, 714.24, 0.00, 14999.00, NULL, '2026-02-13 03:48:38', '2026-02-13 03:48:38'),
(17, 16, 1, 1, 14999.00, 14284.76, 5.00, 714.24, 0.00, 14999.00, NULL, '2026-02-13 03:50:01', '2026-02-13 03:50:01'),
(18, 17, 2, 1, 16499.00, 15713.33, 5.00, 785.67, 0.00, 16499.00, NULL, '2026-02-13 03:52:01', '2026-02-13 03:52:01'),
(19, 18, 7, 1, 35499.00, 33808.57, 5.00, 1690.43, 0.00, 35499.00, NULL, '2026-02-13 03:53:23', '2026-02-13 03:53:23'),
(20, 19, 1, 1, 14999.00, 14284.76, 5.00, 714.24, 0.00, 14999.00, NULL, '2026-02-13 03:54:23', '2026-02-13 03:54:23'),
(21, 19, 2, 1, 16499.00, 15713.33, 5.00, 785.67, 0.00, 16499.00, NULL, '2026-02-13 03:54:23', '2026-02-13 03:54:23'),
(22, 20, 1, 1, 14999.00, 14284.76, 5.00, 714.24, 0.00, 14999.00, NULL, '2026-02-13 03:55:37', '2026-02-13 03:55:37'),
(23, 21, 1, 1, 14999.00, 14284.76, 5.00, 714.24, 0.00, 14999.00, '123456676', '2026-02-13 03:57:09', '2026-02-13 04:28:58'),
(24, 22, 2, 1, 16499.00, 15713.33, 5.00, 785.67, 0.00, 16499.00, '123456', '2026-02-13 04:39:36', '2026-02-13 04:40:16'),
(25, 23, 5, 1, 27499.00, 26189.52, 5.00, 1309.48, 0.00, 27499.00, '958296', '2026-02-13 04:42:03', '2026-02-13 04:43:15'),
(26, 23, 7, 1, 35499.00, 33808.57, 5.00, 1690.43, 0.00, 35499.00, '123546', '2026-02-13 04:42:03', '2026-02-13 04:43:15'),
(27, 23, 8, 1, 39999.00, 38094.29, 5.00, 1904.71, 0.00, 39999.00, '25964949', '2026-02-13 04:42:03', '2026-02-13 04:43:15');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('shahid12@gmail.com', '$2y$12$p8FWmoSp9.TKAJg2UqnHxeGTWkDdVqPEwwg.HiV7hpbf4yT/auIMi', '2026-02-13 03:12:40'),
('test@gmail.com', '$2y$12$m2E4bgnNBf0o0ygsZHeHIur.Oo4wrHDq4Q3tygOkRKlPP5sziETNa', '2026-02-13 00:54:03'),
('test2@gmail.com', '$2y$12$o.zFEBojf.7Z2CjdSFrlBOf9m7iN.B/CABSuZkcGJoxwIxnSTt8GG', '2026-02-13 04:39:37'),
('test3@gmail.com', '$2y$12$Sc19XOAiRNMOq4E2Uay/.Ow80Z5SBnPnnEzKClVrM3d3d5NSya5eW', '2026-02-13 04:42:04');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) DEFAULT NULL,
  `gst_percentage` decimal(5,2) NOT NULL DEFAULT 0.00,
  `gst_type` varchar(255) NOT NULL DEFAULT 'inclusive',
  `shipping_type` varchar(255) NOT NULL DEFAULT 'free',
  `shipping_rate` decimal(10,2) NOT NULL DEFAULT 0.00,
  `short_description` text DEFAULT NULL,
  `technical_features` text DEFAULT NULL,
  `warranty` text DEFAULT NULL,
  `youtube_url` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`)),
  `hsn_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `price`, `sale_price`, `gst_percentage`, `gst_type`, `shipping_type`, `shipping_rate`, `short_description`, `technical_features`, `warranty`, `youtube_url`, `quantity`, `description`, `status`, `image`, `images`, `hsn_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'Portable Ev Charger 3.6 KW', 'portable-ev-charger-36-kw', 14999.00, 20000.00, 5.00, 'inclusive', 'zone', 40.00, '<p>Tough and Long-Lasting</p><p>Zero Overheating Problems</p><p>Excellent After-Sales Service</p><p>Same-Day Shipping</p>', '<figure class=\"table\"><table><tbody><tr><td><strong>Specification</strong></td><td>Details</td></tr><tr><td><strong>Output Power</strong></td><td>3.6 KW (Single Phase)</td></tr><tr><td><strong>Current Adjustment</strong></td><td>7A, 8A, 10A, 13A, 16A</td></tr><tr><td><strong>Time Delay</strong></td><td>Up to 12 Hours</td></tr><tr><td><strong>Cable Length</strong></td><td>6 meters (Mains Plug to Charging Gun)</td></tr><tr><td><strong>IP Rating</strong></td><td>IP67 Waterproof Design</td></tr><tr><td><strong>Working Temperature</strong></td><td>-20°C to +50°C</td></tr><tr><td><strong>Display Type</strong></td><td>1.8 inch TFT LCD Display with LED Indicator</td></tr><tr><td><strong>Input Plug</strong></td><td>16A 3-Pin Power Plug</td></tr><tr><td><strong>Output Plug</strong></td><td>Type-2 (IEC62196-2)</td></tr><tr><td><strong>Safety Protection</strong></td><td>Over-voltage, Under-voltage, Over-current, No-Load, Earth Fault, Over-temperature</td></tr><tr><td><strong>Working Voltage</strong></td><td>230VAC ±15%</td></tr><tr><td><strong>Weight</strong></td><td>2.7 kg</td></tr></tbody></table></figure><p>&nbsp;</p><p><strong>Simple Installation Requirements</strong></p><p><strong>Power Socket:</strong><br>Use a <strong>16A power socket</strong> from a good brand for safe and smooth charging.</p><p><strong>Wiring:</strong><br>Use a 3-core, 4 sq. mm pure copper cable to safely handle the electrical load.</p><p><strong>Earthing:</strong><br>Proper earthing is mandatory to avoid electric shocks &amp; hazards.</p><p><strong>Safety Protection:</strong><br>Install a 20A Miniature Circuit Breaker (MCB) for protection against short circuits and overload conditions.</p><p><strong>Note:</strong><br>In areas with frequent or extreme voltage fluctuations, install a voltage stabilizer before the MCB for added protection.</p>', '<p>At <strong>EVFAST</strong>, we stand behind the quality and reliability of our EV Chargers, to give you complete peace of mind.</p><p>EVFAST products come with a <strong>1-year warranty</strong> against manufacturing defects.</p><p><strong>Accessories &amp; Add-ons:</strong><br>These items are <strong>not covered under warranty</strong>.</p><p><strong>Warranty Exclusions:</strong><br>The warranty does not apply to damage caused by power surges, supply-side electrical faults, burnouts, improper installation or usage, accidents, physical damage, unauthorized repairs or modifications.</p><p><strong>Customer Support</strong><br>📞<strong>Phone:</strong> +91 8595264742<br>🕘<strong>Hours:</strong> Monday to Saturday, 10:30 AM – 6:00 PM (IST)</p>', NULL, 0, '<p>Charge smarter and safer with the <strong>EVFAST 3.6 KW Portable EV Charger</strong>. Engineered for Indian environments, this 3.6 KW electric car charger offers superior safety, longer reach, and unmatched after sales support. Portable, powerful, and reliable, it’s an ideal EV charging solution for daily driving needs— wherever you are. The 12-hour timer reservation lets you schedule charging during off-peak hours for beter energy efficiency.</p>', 1, '1770800013.jpg', '[]', '123456', '2026-02-10 00:28:31', '2026-02-13 03:57:09'),
(2, 1, 'Portable Ev Charger 3.6 KW With Accessoies', 'portable-ev-charger-36-kw-with-accessoies', 16499.00, 20000.00, 5.00, 'inclusive', 'free', 0.00, '<p>Tough and Long-Lasting</p><p>Zero Overheating Problems</p><p>Excellent After-Sales Service</p><p>Same-Day Shipping</p>', '<figure class=\"table\"><table><tbody><tr><td><strong>Specification</strong></td><td>Details</td></tr><tr><td><strong>Output Power</strong></td><td>3.6 KW (Single Phase)</td></tr><tr><td><strong>Current Adjustment</strong></td><td>7A, 8A, 10A, 13A, 16A</td></tr><tr><td><strong>Time Delay</strong></td><td>Up to 12 Hours</td></tr><tr><td><strong>Cable Length</strong></td><td>6 meters (Mains Plug to Charging Gun)</td></tr><tr><td><strong>IP Rating</strong></td><td>IP67 Waterproof Design</td></tr><tr><td><strong>Working Temperature</strong></td><td>-20°C to +50°C</td></tr><tr><td><strong>Display Type</strong></td><td>1.8 inch TFT LCD Display with LED Indicator</td></tr><tr><td><strong>Input Plug</strong></td><td>16A 3-Pin Power Plug</td></tr><tr><td><strong>Output Plug</strong></td><td>Type-2 (IEC62196-2)</td></tr><tr><td><strong>Safety Protection</strong></td><td>Over-voltage, Under-voltage, Over-current, No-Load, Earth Fault, Over-temperature</td></tr><tr><td><strong>Working Voltage</strong></td><td>230VAC ±15%</td></tr><tr><td><strong>Weight</strong></td><td>2.7 kg</td></tr></tbody></table></figure>', '<p>At <strong>EVFAST</strong>, we stand behind the quality and reliability of our EV Chargers, to give you complete peace of mind.</p><p>EVFAST products come with a <strong>1-year warranty</strong> against manufacturing defects.</p><p><strong>Warranty Exclusions:</strong><br>The warranty does not apply to damage caused by power surges, supply-side electrical faults, burnouts, improper installation or usage, accidents, physical damage, unauthorized repairs or modifications.</p><p><strong>Accessories &amp; Add-ons:</strong><br>These items are <strong>not covered under warranty</strong>.</p><p><strong>Customer Support</strong><br>📞<strong>Phone:</strong> +91 8595264742<br>🕘<strong>Hours:</strong> Monday to Saturday, 10:30 AM – 6:00 PM (IST)</p>', NULL, 4, '<p>Charge smarter and safer with the <strong>EVFAST 3.6KW Portable EV Charger</strong>. Engineered for Indian environments, this <strong>3.6 KW electric car charger</strong> offers superior safety, longer reach, and unmatched after-sales support. Portable, powerful, and reliable, it’s an ideal EV charging solution for daily driving needs—wherever you are.The 12-hour timer reservation lets you schedule charging during off-peak hours for better energy efficiency.</p>', 1, '1770800460.jpg', '[]', NULL, '2026-02-10 00:49:01', '2026-02-13 04:39:36'),
(3, 1, 'Portable Ev Charger 7.4 KW', 'portable-ev-charger-74-kw', 17499.00, 22500.00, 5.00, 'inclusive', 'free', 0.00, '<p>Tough and Long-Lasting</p><p>Zero Overheating Problems</p><p>Excellent After-Sales Service</p><p>Same-Day Shipping</p>', '<figure class=\"table\"><table><tbody><tr><td><strong>Specification</strong></td><td><strong>Details</strong></td></tr><tr><td><strong>Output Power</strong></td><td>7.4 KW (Single Phase)</td></tr><tr><td><strong>Current Adjustment</strong></td><td>7A, 10A, 15A, 18A, 24A, 32A</td></tr><tr><td><strong>Time Delay</strong></td><td>Up to 12 Hours</td></tr><tr><td><strong>Cable Length</strong></td><td>6 meters (Mains Plug to Charging Gun)</td></tr><tr><td><strong>IP Rating</strong></td><td>IP67 Waterproof Design</td></tr><tr><td><strong>Working Temperature</strong></td><td>-20°C to +50°C</td></tr><tr><td><strong>Display Type</strong></td><td>1.8 inch TFT LCD Display with LED Indicator</td></tr><tr><td><strong>Input Plug</strong></td><td>32A 3-Pin Power Plug</td></tr><tr><td><strong>Output Plug</strong></td><td>Type-2 (IEC62196-2)</td></tr><tr><td><strong>Safety Protection</strong></td><td>Over-voltage, Under-voltage, Over-current, No-Load, Earth Fault, Over-temperature</td></tr><tr><td><strong>Working Voltage</strong></td><td>230VAC ±15%</td></tr><tr><td><strong>Weight</strong></td><td>3.5 kg</td></tr></tbody></table></figure><p><strong>Simple Installation Requirements</strong></p><p><strong>Power Socket:</strong><br>Use a 32A 3-Pinindustrialsocket from a good brand for safe and smooth charging.</p><p><strong>Wiring:</strong><br>Use a 3-core, 6 sq. mm pure copper cable to safely handle the electrical load.</p><p><strong>Earthing:</strong><br>Proper earthing is mandatory to avoid electric shocks &amp; hazards.</p><p><strong>Safety Protection:</strong><br>Install a 40A Miniature Circuit Breaker (MCB) for protection against short circuits and overload conditions.</p><p><strong>Note:</strong><br>In areas with frequent or extreme voltage fluctuations, install a voltage stabilizer before the MCB for added protection.</p>', '<p>At <strong>EVFAST</strong>, we stand behind the quality and reliability of our EV Chargers, to give you complete peace of mind.</p><p>EVFAST products come with a <strong>1-year warranty</strong> against manufacturing defects.</p><p><strong>Accessories &amp; Add-ons:</strong><br>These items are <strong>not covered under warranty</strong>.</p><p><strong>Warranty Exclusions:</strong><br>The warranty does not apply to damage caused by power surges, supply-side electrical faults, burnouts, improper installation or usage, accidents, physical damage, unauthorized repairs or modifications.</p><p><strong>Customer Support</strong><br>📞<strong>Phone:</strong> +91 8595264742<br>🕘<strong>Hours:</strong> Monday to Saturday, 10:30 AM – 6:00 PM (IST)</p>', NULL, 10, '<p>Power your EV <strong>up to twice as fast</strong> with the <strong>EVFAST 7.4 kW Portable EV Charger</strong>. Designed for fast, safe, and reliable charging, this advanced <strong>7.4 kW AC fast charger</strong> is compatible with leading EV brands,making it a perfect solution for home and travel charging needs.The 12-hour timer reservation lets you schedule charging during off-peak hours for better energy efficiency.</p>', 1, '1770800585.jpg', '[]', NULL, '2026-02-10 05:31:45', '2026-02-11 03:33:05'),
(4, 1, 'Portable Ev Charger 7.4 KW With Accessoies', 'portable-ev-charger-74-kw-with-accessoies', 19999.00, 25500.00, 5.00, 'inclusive', 'free', 0.00, '<p>Tough and Long-Lasting</p><p>Zero Overheating Problems</p><p>Excellent After-Sales Service</p><p>Same-Day Shipping</p>', '<figure class=\"table\"><table><tbody><tr><td><strong>Specification</strong></td><td>Details</td></tr><tr><td><strong>Output Power</strong></td><td>7.4 KW (Single Phase)</td></tr><tr><td><strong>Current Adjustment</strong></td><td>7A, 10A, 15A, 18A, 24A, 32A</td></tr><tr><td><strong>Time Delay</strong></td><td>Up to 12 Hours</td></tr><tr><td><strong>Cable Length</strong></td><td>6 meters (Mains Plug to Charging Gun)</td></tr><tr><td><strong>IP Rating</strong></td><td>IP67 Waterproof Design</td></tr><tr><td><strong>Working Temperature</strong></td><td>-20°C to +50°C</td></tr><tr><td><strong>Display Type</strong></td><td>1.8 inch TFT LCD Display with LED Indicator</td></tr><tr><td><strong>Input Plug</strong></td><td>32A 3-Pin Power Plug</td></tr><tr><td><strong>Output Plug</strong></td><td>Type-2 (IEC62196-2)</td></tr><tr><td><strong>Safety Protection</strong></td><td>Over-voltage, Under-voltage, Over-current, No-Load, Earth Fault, Over-temperature</td></tr><tr><td><strong>Working Voltage</strong></td><td>230VAC ±15%</td></tr><tr><td><strong>Weight</strong></td><td>3.5 kg</td></tr></tbody></table></figure><p><strong>Simple Installation Requirements</strong></p><p><strong>Power Socket:</strong><br>Use a 32A 3-Pinindustrialsocket from a good brand for safe and smooth charging.</p><p><strong>Wiring:</strong><br>Use a 3-core, 6 sq. mm pure copper cable to safely handle the electrical load.</p><p><strong>Earthing:</strong><br>Proper earthing is mandatory to avoid electric shocks &amp; hazards.</p><p><strong>Safety Protection:</strong><br>Install a 40A Miniature Circuit Breaker (MCB) for protection against short circuits and overload conditions.</p><p><strong>Note:</strong><br>In areas with frequent or extreme voltage fluctuations, install a voltage stabilizer before the MCB for added protection.</p>', '<p>At <strong>EVFAST</strong>, we stand behind the quality and reliability of our EV Chargers, to give you complete peace of mind.</p><p>EVFAST products come with a <strong>1-year warranty</strong> against manufacturing defects.</p><p><strong>Accessories &amp; Add-ons:</strong><br>These items are <strong>not covered under warranty</strong>.</p><p><strong>Warranty Exclusions:</strong><br>The warranty does not apply to damage caused by power surges, supply-side electrical faults, burnouts, improper installation or usage, accidents, physical damage, unauthorized repairs or modifications.</p><p><strong>Customer Support</strong><br>📞<strong>Phone:</strong> +91 8595264742<br>🕘<strong>Hours:</strong> Monday to Saturday, 10:30 AM – 6:00 PM (IST)</p>', NULL, 9, '<p>Power your EV <strong>up to twice as fast</strong> with the <strong>EVFAST 7.4 kW Portable EV Charger</strong>. Designed for fast, safe, and reliable charging, this advanced <strong>7.4 kW AC fast charger</strong> is compatible with leading EV brands,making it a perfect solution for home and travel charging needs.The 12-hour timer reservation lets you schedule charging during off-peak hours for better energy efficiency.</p>', 1, '1770800681.jpg', '[]', NULL, '2026-02-10 05:47:16', '2026-02-13 00:51:43'),
(5, 2, '7.4 KW EV Charger ( Plug N Play /RFID)', '74-kw-ev-charger-plug-n-play-rfid', 27499.00, 32500.00, 5.00, 'inclusive', 'zone', 0.00, '<p>Sleek wall-mounted premium design</p><p>Tough and Long-Lasting</p><p>Emergency stop switch for safety</p><p>Excellent After-Sales Service</p>', '<p><strong>INPUT PARAMETERS</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Specification</strong></td><td>Details</td></tr><tr><td><strong>Input Voltage:</strong></td><td>AC 230V ±15%</td></tr><tr><td><strong>Input Frequency:</strong></td><td>50 Hz ±1 Hz</td></tr><tr><td><strong>Wiring:</strong></td><td>3-wire (L, N, PE)</td></tr></tbody></table></figure><p>&nbsp;</p><p><strong>OUTPUT PARAMETERS</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Output Type:</strong></td><td>Single Phase, Type 2</td></tr><tr><td><strong>Maximum Output Power:</strong></td><td>7.4 kW</td></tr><tr><td><strong>Output Voltage:</strong></td><td>AC 230V ±15%</td></tr><tr><td><strong>Connector Type:</strong></td><td>AC Type 2(IEC 62196-2)</td></tr><tr><td><strong>Number of Connectors:</strong></td><td>Single gun</td></tr><tr><td><strong>Efficiency:</strong></td><td>≥ 95%</td></tr></tbody></table></figure><p>&nbsp;</p><p><strong>PROTECTION &amp; SAFETY</strong></p><figure class=\"table\"><table><tbody><tr><td>Over-voltage protection</td></tr><tr><td>Under-voltage protection</td></tr><tr><td>Over-current protection</td></tr><tr><td>Short-circuit protection</td></tr><tr><td>Ungrounded protection</td></tr><tr><td>A-type leakage protection</td></tr></tbody></table></figure><p>&nbsp;</p><p><strong>USER INTERFACE &amp; CONTROLS</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Specification</strong></td><td><strong>Details</strong></td></tr><tr><td><strong>Display:</strong></td><td>20 × 4 Jumbo LCD with LED indicators</td></tr><tr><td><strong>Language Support:</strong></td><td>English</td></tr><tr><td><strong>Emergency Control:</strong></td><td>Red Emergency Stop Button</td></tr><tr><td><strong>Status Indication:</strong></td><td>Input supply, charging, and error status</td></tr><tr><td><strong>User Authentication:</strong></td><td>Plug &amp; Play, RFID</td></tr></tbody></table></figure><p>&nbsp;</p><p><strong>MECHANICAL &amp; ENVIRONMENTAL</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Specification</strong></td><td>Details</td></tr><tr><td>Ingress Protection:</td><td>IP55</td></tr><tr><td>Charging Cable Length:</td><td>5 meters</td></tr><tr><td>Operating Temperature:</td><td>–20°C to +50°C</td></tr><tr><td>Dimensions (W × H × D):</td><td>235 × 310 × 130 mm</td></tr></tbody></table></figure><p>&nbsp;</p><p><strong>Simple Installation Requirements</strong><br><br><strong>Power:</strong><br>Install a 40 A 2-PoleMiniature Circuit Breaker (MCB) to provide power to the charger.</p><p><strong>Wiring:</strong><br>Use a 3-core, 10 sq. mm pure copper cable to safely handle the electrical load.</p><p><strong>Earthing:</strong><br>Proper earthing is mandatory to avoid electric shocks &amp; hazards.</p><p><strong>Note:</strong><br>In areas with frequent or extreme voltage fluctuations, install a voltage stabilizer before the MCB for added protection.</p>', '<p>At <strong>EVFAST</strong>, we stand behind the quality and reliability of our EV Chargers, to give you complete peace of mind.</p><p>EVFAST products come with a <strong>1-year warranty</strong> against manufacturing defects.</p><p><strong>Accessories &amp; Add-ons:</strong><br>These items are <strong>not covered under warranty</strong>.</p><p><strong>Warranty Exclusions:</strong><br>The warranty does not apply to damage caused by power surges, supply-side electrical faults, burnouts, improper installation or usage, accidents, physical damage, unauthorized repairs or modifications.</p><p><strong>Customer Support</strong><br>📞<strong>Phone:</strong> +91 8595264742<br>🕘<strong>Hours:</strong> Monday to Saturday, 10:30 AM – 6:00 PM (IST)</p>', NULL, 8, '<p>EVFAST is where refined design meets intelligent performance. This elegant 7.4 Kw&nbsp;</p><p>wall-mounted EV charger enhances your space while delivering a seamless charging experience. A built-in emergency stop switch and RCD ensures safety under unforeseen circumstances.&nbsp;</p><p>Choose how you charge with two modes—Plug &amp; Charge, RFID.</p>', 1, '1770800936.jpg', '[]', NULL, '2026-02-10 06:15:40', '2026-02-13 04:42:03'),
(6, 2, '7.4 KW EV Charger  ( Standard )', '74-kw-ev-charger-standard', 30999.00, 37800.00, 5.00, 'inclusive', 'zone', 0.00, '<p>Sleek wall-mounted premium design</p><p>Tough and Long-Lasting</p><p>Emergency stop switch for safety</p><p>Excellent After-Sales Service</p>', '<p><strong>INPUT PARAMETERS</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Parameter</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Input Voltage</strong></td><td>AC 415V ±15%</td></tr><tr><td><strong>Input Frequency</strong></td><td>50 Hz ±1 Hz</td></tr><tr><td><strong>Wiring</strong></td><td>5-wire (L1, L2, L3, N, PE)</td></tr></tbody></table></figure><p><br><strong>OUTPUT PARAMETERS</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Parameter</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Output Type</strong></td><td>AC Three Phase, Type 2</td></tr><tr><td><strong>Maximum Output Power</strong></td><td>11 kW</td></tr><tr><td><strong>Output Voltage</strong></td><td>AC 415V ±15%</td></tr><tr><td><strong>Connector Type</strong></td><td>AC Type 2 (IEC 62196-2)</td></tr><tr><td><strong>Number of Connectors</strong></td><td>Single Gun</td></tr><tr><td><strong>Efficiency</strong></td><td>≥ 95%</td></tr></tbody></table></figure><p>&nbsp;</p><p><strong>PROTECTION &amp; SAFETY</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Protection Type</strong></td><td><strong>Status</strong></td></tr><tr><td><strong>Over-voltage protection</strong></td><td>Available</td></tr><tr><td><strong>Under-voltage protection</strong></td><td>Available</td></tr><tr><td><strong>Over-current protection</strong></td><td>Available</td></tr><tr><td><strong>Short-circuit protection</strong></td><td>Available</td></tr><tr><td><strong>Ungrounded protection</strong></td><td>Available</td></tr><tr><td><strong>A-type leakage protection</strong></td><td>Available</td></tr></tbody></table></figure><p><br><strong>USER INTERFACE &amp; CONTROLS</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Display</strong></td><td>20 × 4 Jumbo LCD with LED indicators</td></tr><tr><td><strong>Language Support</strong></td><td>English</td></tr><tr><td><strong>Emergency Control</strong></td><td>Red Emergency Stop Button</td></tr><tr><td><strong>Status Indication</strong></td><td>Input supply, charging, and error status</td></tr><tr><td><strong>Network Communication</strong></td><td>4G/Wi-Fi</td></tr><tr><td><strong>OCPP Support</strong></td><td>OCPP 1.6 or above</td></tr><tr><td><strong>User Authentication</strong></td><td>Plug &amp; Play, RFID and App based</td></tr></tbody></table></figure><p><br><strong>MECHANICAL &amp; ENVIRONMENTAL</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Ingress Protection</strong></td><td>IP55</td></tr><tr><td><strong>Charging Cable Length</strong></td><td>5 meters</td></tr><tr><td><strong>Operating Temperature</strong></td><td>–20°C to +50°C</td></tr><tr><td><strong>Dimensions (W × H × D)</strong></td><td>235 × 310 × 130 mm</td></tr></tbody></table></figure><p><br><strong>Simple Installation Requirements</strong><br><br><strong>Power:</strong><br>Install a 40 A 2-Pole Miniature Circuit Breaker (MCB) to provide power to the charger.</p><p><strong>Wiring:</strong><br>Use a 3-core, 10 sq. mm pure copper cable to safely handle the electrical load.</p><p><strong>Earthing:</strong><br>Proper earthing is mandatory to avoid electric shocks &amp; hazards.</p><p><strong>Note:</strong><br>In areas with frequent or extreme voltage fluctuations, install a voltage stabilizer before the MCB for added protection.</p>', '<p>At <strong>EVFAST</strong>, we stand behind the quality and reliability of our EV Chargers, to give you complete peace of mind.</p><p>EVFAST products come with a <strong>1-year warranty</strong> against manufacturing defects.</p><p><strong>Accessories &amp; Add-ons:</strong><br>These items are <strong>not covered under warranty</strong>.</p><p><strong>Warranty Exclusions:</strong><br>The warranty does not apply to damage caused by power surges, supply-side electrical faults, burnouts, improper installation or usage, accidents, physical damage, unauthorized repairs or modifications.</p><p><strong>Customer Support</strong><br>📞<strong>Phone:</strong> +91 8595264742<br>🕘<strong>Hours:</strong> Monday to Saturday, 10:30 AM – 6:00 PM (IST)</p>', NULL, 8, '<p>EVFAST is where refined design meets intelligent performance. This elegant 7.4 Kw&nbsp;</p><p>wall-mounted EV charger enhances your space while delivering a seamless charging experience. A built-in emergency stop switch and RCD ensures safety under unforeseen circumstances. It can be used for charging vehicles for Residential, Commercial, Retail, Hospitality,Educational institutions and Fleets.</p><p>Choose how you charge with three modes— Plug &amp;Charge ,RFID and App based.</p>', 1, '1770801046.jpg', '[]', NULL, '2026-02-10 06:40:00', '2026-02-13 03:21:21'),
(7, 2, '11 KW EV Charger ( Plug N Play /RFID)', '11-kw-ev-charger-plug-n-play-rfid', 35499.00, 38500.00, 5.00, 'inclusive', 'zone', 0.00, '<p>Sleek wall-mounted premium design</p><p>Tough and Long-Lasting</p><p>Emergency stop switch for safety</p><p>Excellent After-Sales Service</p>', '<p><strong>INPUT PARAMETERS</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Input Voltage</strong></td><td>AC 415V ±15%</td></tr><tr><td><strong>Input Frequency</strong></td><td>50 Hz ±1 Hz</td></tr><tr><td><strong>Wiring</strong></td><td>5-wire (L1, L2, L3, N, PE)</td></tr></tbody></table></figure><p><br><strong>OUTPUT PARAMETERS</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Output Type</strong></td><td>AC Three Phase, Type 2</td></tr><tr><td><strong>Maximum Output Power</strong></td><td>11 kW</td></tr><tr><td><strong>Output Voltage</strong></td><td>AC 415V ±15%</td></tr><tr><td><strong>Connector Type</strong></td><td>AC Type 2 (IEC 62196-2)</td></tr><tr><td><strong>Number of Connectors</strong></td><td>Single gun</td></tr><tr><td><strong>Efficiency</strong></td><td>≥ 95%</td></tr></tbody></table></figure><p><br><strong>PROTECTION &amp; SAFETY</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Protection Features</strong></td></tr><tr><td>Over-voltage protection</td></tr><tr><td>Under-voltage protection</td></tr><tr><td>Over-current protection</td></tr><tr><td>Short-circuit protection</td></tr><tr><td>Ungrounded protection</td></tr><tr><td>A-type leakage protection</td></tr></tbody></table></figure><p><br><strong>USER INTERFACE &amp; CONTROLS</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Display</strong></td><td>20 × 4 Jumbo LCD with LED indicators</td></tr><tr><td><strong>Language Support</strong></td><td>English</td></tr><tr><td><strong>Emergency Control</strong></td><td>Red Emergency Stop Button</td></tr><tr><td><strong>Status Indication</strong></td><td>Input supply, charging, and error status</td></tr><tr><td><strong>User Authentication</strong></td><td>Plug &amp; Play, RFID</td></tr></tbody></table></figure><p><br><strong>MECHANICAL &amp; ENVIRONMENTAL</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Ingress Protection</strong></td><td>IP55</td></tr><tr><td><strong>Charging Cable Length</strong></td><td>5 meters</td></tr><tr><td><strong>Operating Temperature</strong></td><td>–20°C to +50°C</td></tr><tr><td><strong>Dimensions (W × H × D)</strong></td><td>300 × 380 × 160 mm</td></tr></tbody></table></figure><p><br><strong>Simple Installation Requirements</strong></p><p><strong>Power:</strong><br>Install a <strong>32A 4-PoleMiniature Circuit Breaker (MCB)</strong>to provide power to the charger.</p><p><strong>Wiring:</strong><br>&nbsp;Use <strong>6 sq. mm pure copper cable</strong> to safely handle the electrical load.</p><p><strong>Earthing:</strong><br>Proper earthing is <strong>mandatory</strong> to avoid electric shocks &amp; hazards.</p><p><strong>Note:</strong><br>In areas with <strong>frequent or extreme voltage fluctuations</strong>, install a <strong>voltage stabilizer before the MCB</strong> for added protection.</p>', '<p>At <strong>EVFAST</strong>, we stand behind the quality and reliability of our EV Chargers, to give you complete peace of mind.</p><p>EVFAST products come with a 1-year warranty against manufacturing defects.</p><p><strong>Accessories &amp; Add-ons:</strong><br>These items are <strong>not covered under warranty</strong>.</p><p><strong>Warranty Exclusions:</strong><br>The warranty does not apply to damage caused by power surges, supply-side electrical faults, burnouts, improper installation or usage, accidents, physical damage, unauthorized repairs or modifications.</p><p><strong>Customer Support</strong><br>📞<strong>Phone:</strong> +91 8595264742<br>🕘<strong>Hours:</strong> Monday to Saturday, 10:30 AM – 6:00 PM (IST)</p>', NULL, 8, '<p>EVFAST is where refined design meets intelligent performance. This elegant 11kW</p><p>wall-mounted EV charger enhances your space while delivering a seamless charging experience. A built-in emergency stop switch and RCD ensures safety under unforeseen circumstances.&nbsp;</p><p>Choose how you charge with two modes—Plug &amp; Charge, RFID.</p>', 1, '1770801132.jpg', '[]', NULL, '2026-02-10 23:21:40', '2026-02-13 04:42:03'),
(8, 2, '11 KW EV Charger ( Standard)', '11-kw-ev-charger-standard', 39999.00, 42800.00, 5.00, 'inclusive', 'zone', 0.00, '<p>Sleek wall-mounted premium design</p><p>Tough and Long-Lasting</p><p>Emergency stop switch for safety</p><p>Excellent After-Sales Service</p>', '<p><strong>INPUT PARAMETERS</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Input Voltage</strong></td><td>AC 415V ±15%</td></tr><tr><td><strong>Input Frequency</strong></td><td>50 Hz ±1 Hz</td></tr><tr><td><strong>Wiring</strong></td><td>5-wire (L1, L2, L3, N, PE)</td></tr></tbody></table></figure><p><br><strong>OUTPUT PARAMETERS</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Output Type</strong></td><td>AC Three Phase, Type 2</td></tr><tr><td><strong>Maximum Output Power</strong></td><td>11 kW</td></tr><tr><td><strong>Output Voltage</strong></td><td>AC 415V ±15%</td></tr><tr><td><strong>Connector Type</strong></td><td>AC Type 2 (IEC 62196-2)</td></tr><tr><td><strong>Number of Connectors</strong></td><td>Single gun</td></tr><tr><td><strong>Efficiency</strong></td><td>≥ 95%</td></tr></tbody></table></figure><p><br><strong>PROTECTION &amp; SAFETY</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Protection Features</strong></td></tr><tr><td>Over-voltage protection</td></tr><tr><td>Under-voltage protection</td></tr><tr><td>Over-current protection</td></tr><tr><td>Short-circuit protection</td></tr><tr><td>Ungrounded protection</td></tr><tr><td>A-type leakage protection</td></tr></tbody></table></figure><p><br><strong>USER INTERFACE &amp; CONTROLS</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Display</strong></td><td>20 × 4 Jumbo LCD with LED indicators</td></tr><tr><td><strong>Language Support</strong></td><td>English</td></tr><tr><td><strong>Emergency Control</strong></td><td>Red Emergency Stop Button</td></tr><tr><td><strong>Status Indication</strong></td><td>Input supply, charging, and error status</td></tr><tr><td><strong>Network Communication</strong></td><td>4G/Wi-Fi</td></tr><tr><td><strong>OCPP Support</strong></td><td>OCPP 1.6 or above</td></tr><tr><td><strong>User Authentication</strong></td><td>Plug &amp; Play, RFID and App based</td></tr></tbody></table></figure><p><br><strong>MECHANICAL &amp; ENVIRONMENTAL</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Ingress Protection</strong></td><td>IP55</td></tr><tr><td><strong>Charging Cable Length</strong></td><td>5 meters</td></tr><tr><td><strong>Operating Temperature</strong></td><td>–20°C to +50°C</td></tr><tr><td><strong>Dimensions (W × H × D)</strong></td><td>300 × 380 × 160 mm</td></tr></tbody></table></figure><p><br><strong>Simple Installation Requirements</strong></p><p><strong>Power:</strong><br>Install a 32 A 4-Pole Miniature Circuit Breaker (MCB) to provide power to the charger.</p><p><strong>Wiring:</strong><br>Use 6 sq. mm pure copper cable to safely handle the electrical load.</p><p><strong>Earthing:</strong><br>Proper earthing is mandatory to avoid electric shocks &amp; hazards.</p><p><strong>Note:</strong><br>In areas with frequent or extreme voltage fluctuations, install a voltage stabilizer before the MCB for added protection.</p>', '<p>At <strong>EVFAST</strong>, we stand behind the quality and reliability of our EV Chargers, to give you complete peace of mind.</p><p>EVFAST products come with a <strong>1-year warranty</strong> against manufacturing defects.</p><p><strong>Accessories &amp; Add-ons:</strong><br>These items are <strong>not covered under warranty</strong>.</p><p><strong>Warranty Exclusions:</strong><br>The warranty does not apply to damage caused by power surges, supply-side electrical faults, burnouts, improper installation or usage, accidents, physical damage, unauthorized repairs or modifications.</p><p><strong>Customer Support</strong><br>📞<strong>Phone:</strong> +91 8595264742<br>🕘<strong>Hours:</strong> Monday to Saturday, 10:30 AM – 6:00 PM (IST)</p>', NULL, 9, '<p>EVFAST is where refined design meets intelligent performance. This elegant 11 KW</p><p>wall-mounted EV charger enhances your space while delivering a seamless charging experience. A built-in emergency stop switch and RCD ensures safety under unforeseen circumstances. It can be used for charging vehicles for Residential, Commercial, Retail, Hospitality,Educational institutions and Fleets.</p><p>Choose how you charge with three modes— Plug &amp;Charge ,RFID and App based.</p>', 1, '1770801223.jpg', '[]', NULL, '2026-02-10 23:24:45', '2026-02-13 04:42:03'),
(9, 2, '22 KW EV Charger ( Plug N Play /RFID)', '22-kw-ev-charger-plug-n-play-rfid', 39499.00, 45800.00, 5.00, 'inclusive', 'zone', 0.00, '<p>Sleek wall-mounted premium design</p><p>Tough and Long-Lasting</p><p>Emergency stop switch for safety</p><p>Excellent After-Sales Service</p>', '<p><strong>INPUT PARAMETERS</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Input Voltage</strong></td><td>AC 415V ±15%</td></tr><tr><td><strong>Input Frequency</strong></td><td>50 Hz ±1 Hz</td></tr><tr><td><strong>Wiring</strong></td><td>5-wire (L1, L2, L3, N, PE)</td></tr></tbody></table></figure><p><br><strong>OUTPUT PARAMETERS</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Output Type</strong></td><td>AC Three Phase, Type 2</td></tr><tr><td><strong>Maximum Output Power</strong></td><td>22 kW</td></tr><tr><td><strong>Output Voltage</strong></td><td>AC 415V ±15%</td></tr><tr><td><strong>Connector Type</strong></td><td>AC Type 2 (IEC 62196-2)</td></tr><tr><td><strong>Number of Connectors</strong></td><td>Single gun</td></tr><tr><td><strong>Efficiency</strong></td><td>≥ 95%</td></tr></tbody></table></figure><p><br><strong>PROTECTION &amp; SAFETY</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Protection Features</strong></td></tr><tr><td>Over-voltage protection</td></tr><tr><td>Under-voltage protection</td></tr><tr><td>Over-current protection</td></tr><tr><td>Short-circuit protection</td></tr><tr><td>Ungrounded protection</td></tr><tr><td>A-type leakage protection</td></tr></tbody></table></figure><p><br><strong>USER INTERFACE &amp; CONTROLS</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Display</strong></td><td>20 × 4 Jumbo LCD with LED indicators</td></tr><tr><td><strong>Language Support</strong></td><td>English</td></tr><tr><td><strong>Emergency Control</strong></td><td>Red Emergency Stop Button</td></tr><tr><td><strong>Status Indication</strong></td><td>Input supply, charging, and error status</td></tr><tr><td><strong>User Authentication</strong></td><td>Plug &amp; Play, RFID</td></tr></tbody></table></figure><p><br><strong>MECHANICAL &amp; ENVIRONMENTAL</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Ingress Protection</strong></td><td>IP55</td></tr><tr><td><strong>Charging Cable Length</strong></td><td>5 meters</td></tr><tr><td><strong>Operating Temperature</strong></td><td>–20°C to +50°C</td></tr><tr><td><strong>Dimensions (W × H × D)</strong></td><td>300 × 380 × 160 mm</td></tr></tbody></table></figure><p><br><strong>Simple Installation Requirements</strong></p><p><strong>Power:</strong><br>Install a 63 A 4-Pole Miniature Circuit Breaker (MCB) to provide power to the charger.</p><p><strong>Wiring:</strong><br>Use 10 sq. mm pure copper cable to safely handle the electrical load.</p><p><strong>Earthing:</strong><br>Proper earthing is mandatory to avoid electric shocks &amp; hazards.</p><p><strong>Note:</strong><br>In areas with frequent or extreme voltage fluctuations, install a voltage stabilizer before the MCB for added protection.</p>', '<p>At <strong>EVFAST</strong>, we stand behind the quality and reliability of our EV Chargers, to give you complete peace of mind.</p><p>EVFAST products come with a 1-year warranty against manufacturing defects.</p><p><strong>Accessories &amp; Add-ons:</strong><br>These items are <strong>not covered under warranty</strong>.</p><p><strong>Warranty Exclusions:</strong><br>The warranty does not apply to damage caused by power surges, supply-side electrical faults, burnouts, improper installation or usage, accidents, physical damage, unauthorized repairs or modifications.</p><p><strong>Customer Support</strong><br>📞<strong>Phone:</strong> +91 8595264742<br>🕘<strong>Hours:</strong> Monday to Saturday, 10:30 AM – 6:00 PM (IST)</p>', NULL, 10, '<p>EVFAST is where refined design meets intelligent performance. This elegant 22 kW&nbsp;</p><p>wall-mounted EV charger enhances your space while delivering a seamless charging experience. A built-in emergency stop switch and RCD ensures safety under unforeseen circumstances.&nbsp;</p><p>Choose how you charge with two modes—Plug &amp; Charge, RFID.</p>', 1, '1770801301.jpg', '[]', NULL, '2026-02-10 23:46:24', '2026-02-11 03:45:01'),
(10, 2, '22 KW EV Charger ( Standard)', '22-kw-ev-charger-standard', 43999.00, 48500.00, 5.00, 'inclusive', 'zone', 0.00, '<p>Sleek wall-mounted premium design</p><p>Tough and Long-Lasting</p><p>Emergency stop switch for safety</p><p>Excellent After-Sales Service</p>', '<p><strong>INPUT PARAMETERS</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Input Voltage</strong></td><td>AC 415V ±15%</td></tr><tr><td><strong>Input Frequency</strong></td><td>50 Hz ±1 Hz</td></tr><tr><td><strong>Wiring</strong></td><td>5-wire (L1, L2, L3, N, PE)</td></tr></tbody></table></figure><p><br><strong>OUTPUT PARAMETERS</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Output Type</strong></td><td>AC Three Phase, Type 2</td></tr><tr><td><strong>Maximum Output Power</strong></td><td>22 kW</td></tr><tr><td><strong>Output Voltage</strong></td><td>AC 415V ±15%</td></tr><tr><td><strong>Connector Type</strong></td><td>AC Type 2 (IEC 62196-2)</td></tr><tr><td><strong>Number of Connectors</strong></td><td>Single gun</td></tr><tr><td><strong>Efficiency</strong></td><td>≥ 95%</td></tr></tbody></table></figure><p><br><strong>PROTECTION &amp; SAFETY</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Protection Features</strong></td></tr><tr><td>Over-voltage protection</td></tr><tr><td>Under-voltage protection</td></tr><tr><td>Over-current protection</td></tr><tr><td>Short-circuit protection</td></tr><tr><td>Ungrounded protection</td></tr><tr><td>A-type leakage protection</td></tr></tbody></table></figure><p><br><strong>USER INTERFACE &amp; CONTROLS</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Display</strong></td><td>20 × 4 Jumbo LCD with LED indicators</td></tr><tr><td><strong>Language Support</strong></td><td>English</td></tr><tr><td><strong>Emergency Control</strong></td><td>Red Emergency Stop Button</td></tr><tr><td><strong>Status Indication</strong></td><td>Input supply, charging, and error status</td></tr><tr><td><strong>Network Communication</strong></td><td>4G/Wi-Fi</td></tr><tr><td><strong>OCPP Support</strong></td><td>OCPP 1.6 or above</td></tr><tr><td><strong>User Authentication</strong></td><td>Plug &amp; Play, RFID and App based</td></tr></tbody></table></figure><p><br><strong>MECHANICAL &amp; ENVIRONMENTAL</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Ingress Protection</strong></td><td>IP55</td></tr><tr><td><strong>Charging Cable Length</strong></td><td>5 meters</td></tr><tr><td><strong>Operating Temperature</strong></td><td>–20°C to +50°C</td></tr><tr><td><strong>Dimensions (W × H × D)</strong></td><td>300 × 380 × 160 mm</td></tr></tbody></table></figure><p><br><strong>Simple Installation Requirements</strong></p><p><strong>Power:</strong><br>Install a 63 A 4-Pole Miniature Circuit Breaker (MCB) to provide power to the charger.</p><p><strong>Wiring:</strong><br>Use 10 sq. mm pure copper cable to safely handle the electrical load.</p><p><strong>Earthing:</strong><br>Proper earthing is mandatory to avoid electric shocks &amp; hazards.</p><p><strong>Note:</strong><br>In areas with frequent or extreme voltage fluctuations, install a voltage stabilizer before the MCB for added protection.</p>', '<p>At <strong>EVFAST</strong>, we stand behind the quality and reliability of our EV Chargers, to give you complete peace of mind.</p><p>EVFAST products come with a <strong>1-year warranty</strong> against manufacturing defects.</p><p><strong>Accessories &amp; Add-ons:</strong><br>These items are <strong>not covered under warranty</strong>.</p><p><strong>Warranty Exclusions:</strong><br>The warranty does not apply to damage caused by power surges, supply-side electrical faults, burnouts, improper installation or usage, accidents, physical damage, unauthorized repairs or modifications.</p><p><strong>Customer Support</strong><br>📞<strong>Phone:</strong> +91 8595264742<br>🕘<strong>Hours:</strong> Monday to Saturday, 10:30 AM – 6:00 PM (IST)</p>', NULL, 9, '<p>EVFAST is where refined design meets intelligent performance. This elegant 22 kW&nbsp;</p><p>wall-mounted EV charger enhances your space while delivering a seamless charging experience. A built-in emergency stop switch and RCD ensures safety under unforeseen circumstances. It can be used for charging vehicles for Residential, Commercial, Retail, Hospitality,Educational institutions and Fleets.</p><p>Choose how you charge with three modes— Plug &amp;Charge ,RFID and App based.</p>', 1, '1770801368.jpg', '[]', NULL, '2026-02-10 23:59:25', '2026-02-13 01:45:51'),
(11, 4, '30 KW DC Charger', '30-kw-dc-charger', 349999.00, 420500.00, 5.00, 'inclusive', 'zone', 0.00, '<p>Fast Charging</p><p>Efficient power delivery</p><p>Tough and long lasting</p><p>Excellent after sales service</p>', '<figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Charger Type</strong></td><td>DC Fast EV Charger</td></tr><tr><td><strong>Rated Output Power</strong></td><td>30 kW (Max)</td></tr><tr><td><strong>Charging Standard</strong></td><td>CCS2 (Combined Charging System Type-2)</td></tr><tr><td><strong>Connector Standard</strong></td><td>IEC 62196-3</td></tr><tr><td><strong>Input Voltage</strong></td><td>3-Phase AC, 415 V AC ±15%</td></tr><tr><td><strong>Input Frequency</strong></td><td>50 Hz</td></tr><tr><td><strong>Output Voltage Range</strong></td><td>200 V DC – 1000 V DC</td></tr><tr><td><strong>Maximum Output Current</strong></td><td>Up to 100 A DC</td></tr><tr><td><strong>Power Factor</strong></td><td>≥ 0.99 (at rated load)</td></tr><tr><td><strong>Communication Protocol</strong></td><td>PLC as per CCS2 standard</td></tr><tr><td><strong>User Interface</strong></td><td>LCD display with LED status indicators</td></tr><tr><td><strong>Network Communication</strong></td><td>Ethernet / 4G / Wi-Fi</td></tr><tr><td><strong>OCPP Support</strong></td><td>OCPP 1.6 or above</td></tr><tr><td><strong>User Authentication</strong></td><td>RFID, QR and App Based</td></tr><tr><td><strong>Safety Protections</strong></td><td>Over-voltage, under-voltage, over-current, short-circuit, earth fault, surge protection, over-temperature and leakage protection</td></tr><tr><td><strong>Cooling Method</strong></td><td>Fan cooling</td></tr><tr><td><strong>Enclosure Protection</strong></td><td>IP55 (Outdoor suitable)</td></tr><tr><td><strong>Installation Type</strong></td><td>Wall-mounted or Floor-mounted</td></tr><tr><td><strong>Operating Temperature</strong></td><td>−20°C to +55°C</td></tr><tr><td><strong>Storage Temperature</strong></td><td>−40°C to +70°C</td></tr><tr><td><strong>Operating Humidity</strong></td><td>Up to 95% RH (non-condensing)</td></tr><tr><td><strong>Altitude</strong></td><td>Up to 2000 m</td></tr><tr><td><strong>Emergency Stop</strong></td><td>Yes (Front panel)</td></tr><tr><td><strong>Compliance Standards</strong></td><td>IEC 62196-3</td></tr></tbody></table></figure><p><strong>Note : </strong>Wiring and installation shall be carried out as per site conditions and applicable electrical standards.</p>', '<p>At <strong>EVFAST</strong>, we stand behind the quality and reliability of our EV Chargers, to give you complete peace of mind.</p><p>EVFAST products come with a <strong>1-year warranty</strong> against manufacturing defects.</p><p><strong>Accessories &amp; Add-ons:</strong><br>These items are <strong>not covered under warranty</strong>.</p><p><strong>Warranty Exclusions:</strong><br>The warranty does not apply to damage caused by power surges, supply-side electrical faults, burnouts, improper installation or usage, accidents, physical damage, unauthorized repairs or modifications.</p><p><strong>Customer Support</strong><br>📞<strong>Phone:</strong> +91 8595264742<br>🕘<strong>Hours:</strong> Monday to Saturday, 10:30 AM – 6:00 PM (IST)</p>', NULL, 10, '<p>The <strong>EVFAST 30 kW CCS2 DC EV Charger</strong> is a compact and efficient DC fast-charging solution designed for commercial and public charging applications. Equipped with a <strong>CCS2 (Combined Charging System Type-2) connector</strong>, it enables rapid and safe DC charging for a wide range of electric vehicles, significantly reducing charging time.<br><br>Engineered with advanced power electronics and intelligent control systems, the charger ensures stable output, high efficiency, and comprehensive safety protection. Its robust, weather-resistant enclosure allows reliable operation in both indoor and outdoor environments, making it ideal for commercial parking areas, fleet depots, highways, and residential complexes.</p>', 1, '1770788059.jpg', '[]', NULL, '2026-02-11 00:04:19', '2026-02-11 00:06:23'),
(12, 5, 'Charger Cable Organizer with Type-2 Gun Holder', 'charger-cable-organizer-with-type-2-gun-holder', 699.00, 850.00, 18.00, 'inclusive', 'zone', 0.00, '<p>Minimal Lead Time</p><p>Superior Quality</p><p>Ideal for EV Chargers</p><p>Tough and Long-Lasting</p>', NULL, NULL, NULL, 10, '<p>As electric vehicles become more widespread, creating a neat, safe, and convenient charging setup at home or work is essential. An <strong>EV cable organiser with Type-2 Gun Holder&nbsp;</strong>offers an elegant solution by combining cable management with a dedicated holding point for your charging plug — keeping your EV charging area clean, accessible, and protected.</p><p>An EV cable organiser with a gun holder/dummy socket combines <strong>two key charging accessories</strong> into one coordinated solution:<br><br><strong>Gun Holder/Dummy Socket</strong></p><p>A robust mount for the charging plug when not in use.</p><p>Keeps the connector secure, upright, and protected.</p><p>Works with your Type-2 EV socket type.</p><p><strong>Cable Management System</strong></p><p>Integrated hooks, hangers, or wraps to neatly coil and store the charging cable.</p><p>Prevents tangles, kinks, and cable damage.</p><p>Helps maintain a clutter-free garage, driveway, or parking area.</p><p><strong>&nbsp;Key Benefits</strong></p><p>✅<strong>Enhanced Protection</strong><br>The charging plug stays off the ground and away from dirt and water — extending its life and keeping contacts clean.</p><p>✅<strong>Organised Space</strong><br>No more tangled cables on the floor. A dedicated organiser ensures your EV charging gear is always neat and accessible.</p><p>✅<strong>Better Safety</strong><br>Reducing cable clutter prevents trip hazards and accidental damage to the cable or plug.</p><p>✅<strong>Faster, Easier Charging</strong><br>With the plug and cable always in a predictable place, connecting your EV becomes quicker and more convenient.</p>', 1, '1770801896.jpg', '[]', NULL, '2026-02-11 00:09:09', '2026-02-11 03:54:56'),
(13, 5, 'Portable Charger Holder', 'portable-charger-holder', 299.00, 380.00, 18.00, 'inclusive', 'zone', 0.00, '<p>Minimal Lead Time</p><p>Superior Quality</p><p>Ideal for EV Chargers</p><p>Tough and Long-Lasting</p>', NULL, NULL, NULL, 10, '<p>Keep your EV charging setup organized, protected, and ready to go with this <strong>Portable Charger Holder</strong>. Designed for convenience, this holder provides a secure place to store your portable EV charger when it’s not in use, helping prevent cable damage, tangles, and clutter.</p><p>Built with durability in mind, the holder supports most standard portable EV chargers. Its compact, lightweight design makes it easy to mount in a garage.</p><p><strong>Ideal for:</strong> EV owners looking for a simple, reliable way to organize and protect their portable charging equipment.</p>', 1, '1770788459.jpg', '[]', NULL, '2026-02-11 00:10:59', '2026-02-11 00:10:59');
INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `price`, `sale_price`, `gst_percentage`, `gst_type`, `shipping_type`, `shipping_rate`, `short_description`, `technical_features`, `warranty`, `youtube_url`, `quantity`, `description`, `status`, `image`, `images`, `hsn_code`, `created_at`, `updated_at`) VALUES
(14, 3, '3.3 KW Smart Socket', '33-kw-smart-socket', 4999.00, 7500.00, 5.00, 'inclusive', 'zone', 0.00, '<p>Sleek wall-mounted premium design</p><p>Tough and Long-Lasting</p><p>Emergency stop switch for safety</p><p>Excellent After-Sales Service</p>', '<figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Model</strong></td><td>EVFAST Smart AC Charger – OCPP Based</td></tr><tr><td><strong>Rated Capacity</strong></td><td>3.3 kW</td></tr><tr><td><strong>Input Supply</strong></td><td>Single Phase AC</td></tr><tr><td><strong>Input Voltage</strong></td><td>AC 230 V ±15%</td></tr><tr><td><strong>Input Frequency</strong></td><td>50 Hz</td></tr><tr><td><strong>Wiring Configuration</strong></td><td>3 Wires – Line (L), Neutral (N) &amp; Protective Earth (PE)</td></tr><tr><td><strong>Output Voltage</strong></td><td>AC 230 V ±15%</td></tr><tr><td><strong>Charging Interface</strong></td><td>16A Universal / Industrial Socket</td></tr><tr><td><strong>Charging Mode</strong></td><td>AC Mode-2 / Mode-3 (as per vehicle &amp; cable)</td></tr><tr><td><strong>Energy Efficiency</strong></td><td>&gt;95%</td></tr><tr><td><strong>User Authentication</strong></td><td>QR Code / Mobile Application Based</td></tr><tr><td><strong>Payment System</strong></td><td>App Wallet Integration</td></tr><tr><td><strong>Communication Protocol</strong></td><td>OCPP 1.6 or higher</td></tr><tr><td><strong>Network Connectivity</strong></td><td>2G / 3G / 4G</td></tr><tr><td><strong>Display Interface</strong></td><td>1.3” OLED Screen or LED Indicators (Optional)</td></tr><tr><td><strong>Control Interface</strong></td><td>Emergency Stop Push Button</td></tr><tr><td><strong>Safety Protections</strong></td><td>Over-Voltage, Under-Voltage, Over-Current, Short-Circuit, Ungrounded, Reverse Connection</td></tr><tr><td><strong>Ingress Protection Rating</strong></td><td>IP54</td></tr><tr><td><strong>Operating Temperature Range</strong></td><td>-20°C to +55°C</td></tr><tr><td><strong>Mounting Type</strong></td><td>Wall Mounted</td></tr><tr><td><strong>Enclosure Type</strong></td><td>Robust, weather-resistant enclosure</td></tr><tr><td><strong>Overall Dimensions (W × H × D)</strong></td><td>180 × 280 × 95 mm</td></tr></tbody></table></figure><p><br><strong>Simple Installation Requirements</strong></p><p><strong>Power:</strong><br>Install a <strong>20A2-PoleMiniature Circuit Breaker (MCB)</strong>to provide power to the charger.</p><p><strong>Wiring:</strong><br>Use <strong>2.5 sq. mm 3 Core pure copper cable</strong> to safely handle the electrical load.</p><p><strong>Earthing:</strong><br>Proper earthing is <strong>mandatory</strong> to avoid electric shocks &amp; hazards.<br><br><strong>Note:</strong><br>In areas with <strong>frequent or extreme voltage fluctuations</strong>, install a <strong>voltage stabilizer before the MCB</strong> for added protection.</p>', '<p>At <strong>EVFAST</strong>, we stand behind the quality and reliability of our EV Chargers, to give you complete peace of mind.</p><p>EVFAST products come with a <strong>1-year warranty</strong> against manufacturing defects.</p><p><strong>Accessories &amp; Add-ons:</strong><br>These items are <strong>not covered under warranty</strong>.</p><p><strong>Warranty Exclusions:</strong><br>The warranty does not apply to damage caused by power surges, supply-side electrical faults, burnouts, improper installation or usage, accidents, physical damage, unauthorized repairs or modifications.</p><p><strong>Customer Support</strong><br>📞<strong>Phone:</strong> +91 8595264742<br>🕘<strong>Hours:</strong> Monday to Saturday, 10:30 AM – 6:00 PM (IST)</p>', NULL, 10, '<p>The 3.3 kW <strong>EVFAST</strong>AC EV Charger with 16A socket is a smart, efficient, and flexible charging solution designed for residential and light commercial EV charging applications. Equipped with OCPP compliance, the charger seamlessly integrates with centralized charging management systems, enabling remote monitoring, control, and data analytics.</p><p>Featuring a standard 16 Amp industrial socket, this charger supports plug-and-play charging using portable EV charging cables, offering maximum compatibility across a wide range of electric vehicles. Its compact wall-mounted design ensures easy installation while delivering stable and reliable AC charging performance.</p>', 1, '1770801513.jpg', '[]', NULL, '2026-02-11 00:56:37', '2026-02-11 03:48:33'),
(15, 3, 'Bharat Ac 001 ( 10KW )', 'bharat-ac-001-10kw', 34999.00, 42000.00, 5.00, 'inclusive', 'zone', 0.00, '<p>Sleek wall-mounted premium design</p><p>Tough and Long-Lasting</p><p>Emergency stop switch for safety</p><p>Excellent After-Sales Service</p>', '<p><strong>General</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Model</strong></td><td>EVFAST Bharat Charger AC 001 (ARAI APPROVED)</td></tr><tr><td><strong>Rated Capacity</strong></td><td>10 kW</td></tr></tbody></table></figure><p><br><strong>Input Parameters</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Input Supply</strong></td><td>Three Phase AC</td></tr><tr><td><strong>Input Voltage</strong></td><td>415 Vac (Operating Range: 380–440 Vac)</td></tr><tr><td><strong>Input Frequency</strong></td><td>50 Hz ±1 Hz</td></tr><tr><td><strong>Total Harmonic Distortion (THD)</strong></td><td>≤ 5% of nominal voltage</td></tr><tr><td><strong>Power Factor</strong></td><td>≥ 0.99 at full load</td></tr><tr><td><strong>Wiring Configuration</strong></td><td>L1, L2, L3, Neutral (N), Protective Earth (PE)</td></tr></tbody></table></figure><p><br><strong>Output Parameters</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Output Voltage</strong></td><td>230 Vac ±15% per output</td></tr><tr><td><strong>Number of Outputs / Connectors</strong></td><td>3</td></tr><tr><td><strong>Charging Power Distribution</strong></td><td>3.3 kW per output</td></tr><tr><td><strong>Standard Connector Type</strong></td><td>3-Pin Female Industrial Connector</td></tr><tr><td><strong>Charging Standard</strong></td><td>IEC 60309</td></tr><tr><td><strong>Overall Efficiency</strong></td><td>&gt; 95%</td></tr></tbody></table></figure><p><br><strong>Protection &amp; Safety</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Protections</strong></td><td>Over-Voltage, Under-Voltage, Over-Current, Short-Circuit, Ungrounded, A-Type Earth Leakage Protection</td></tr></tbody></table></figure><p><br><strong>USER INTERFACE &amp; CONTROLS</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Display</strong></td><td>20 × 4 Jumbo LCD with LED indicators</td></tr><tr><td><strong>Language Support</strong></td><td>English</td></tr><tr><td><strong>Emergency Control</strong></td><td>Red Emergency Stop Button</td></tr><tr><td><strong>Status Indication</strong></td><td>Input supply, charging, and error status</td></tr><tr><td><strong>Network Communication</strong></td><td>4G/Wi-Fi</td></tr><tr><td><strong>OCPP Support</strong></td><td>OCPP 1.6 or above</td></tr><tr><td><strong>User Authentication</strong></td><td>Plug &amp; Play, RFID and App based</td></tr></tbody></table></figure><p><br><strong>Mechanical &amp; Environmental</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Ingress Protection Rating</strong></td><td>IP54</td></tr><tr><td><strong>Cooling Method</strong></td><td>Natural Air Cooling</td></tr><tr><td><strong>Charging Cable</strong></td><td>Not included (Socket-Based Charger)</td></tr><tr><td><strong>Operating Temperature Range</strong></td><td>–20°C to +60°C</td></tr><tr><td><strong>Storage Temperature Range</strong></td><td>–20°C to +60°C</td></tr><tr><td><strong>Humidity</strong></td><td>5% to 95% RH (Non-Condensing)</td></tr><tr><td><strong>Installation Altitude</strong></td><td>Up to 2000 m above sea level</td></tr><tr><td><strong>Dimensions (W × H × D)</strong></td><td>400 × 620 × 190 mm</td></tr></tbody></table></figure><p><br><strong>Simple Installation Requirements</strong></p><p><strong>Power:</strong><br>Install a 32 A 4-Pole Miniature Circuit Breaker (MCB) to provide power to the charger.</p><p><strong>Wiring:</strong><br>Use 6 sq. mm pure copper cable to safely handle the electrical load.</p><p><strong>Earthing:</strong><br>Proper earthing is mandatory to avoid electric shocks &amp; hazards.</p><p><strong>Note:</strong><br>In areas with frequent or extreme voltage fluctuations, install a voltage stabilizer before the MCB for added protection.</p>', '<p>At <strong>EVFAST</strong>, we stand behind the quality and reliability of our EV Chargers, to give you complete peace of mind.</p><p>EVFAST products come with a <strong>1-year warranty</strong> against manufacturing defects.</p><p><strong>Accessories &amp; Add-ons:</strong><br>These items are <strong>not covered under warranty</strong>.</p><p><strong>Warranty Exclusions:</strong><br>The warranty does not apply to damage caused by power surges, supply-side electrical faults, burnouts, improper installation or usage, accidents, physical damage, unauthorized repairs or modifications.</p><p><strong>Customer Support</strong><br>📞<strong>Phone:</strong> +91 8595264742<br>🕘<strong>Hours:</strong> Monday to Saturday, 10:30 AM – 6:00 PM (IST)</p>', NULL, 10, '<p><strong>EVFAST BHARAT AC001 (ARAI APPROVED)10 kW AC EV Charger (3.3 kW × 3)</strong> is a smart, multi-output EV charging solution designed to charge <strong>up to three electric vehicles simultaneously</strong>. Each output delivers <strong>3.3 kW AC power</strong> through <strong>industrial-grade sockets</strong>, ensuring reliable, safe, and flexible charging using portable EV charging cables.</p><p>Built on an <strong>OCPP-based architecture</strong>, the charger enables seamless integration with central management systems for <strong>remote monitoring, user authentication, energy management, and billing</strong>. This makes it ideal for <strong>public, commercial, residential, and fleet charging applications</strong> where scalability and smart control are essential.</p>', 1, '1770801664.jpg', '[]', NULL, '2026-02-11 01:11:12', '2026-02-11 03:51:04'),
(16, 3, '14 KW Hybrid Charger', '14-kw-hybrid-charger', 39999.00, 45800.00, 5.00, 'inclusive', 'zone', 0.00, '<p>Sleek wall-mounted premium design</p><p>Tough and Long-Lasting</p><p>Emergency stop switch for safety</p><p>Excellent After-Sales Service</p>', '<p><strong>General</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Model</strong></td><td>EVFAST Hybrid Charger AC 14 kW</td></tr><tr><td><strong>Rated Capacity</strong></td><td>14 kW</td></tr></tbody></table></figure><p><br><strong>Input Parameters</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Input Supply</strong></td><td>Three Phase AC</td></tr><tr><td><strong>Input Voltage</strong></td><td>415 Vac (Operating Range: 380–440 Vac)</td></tr><tr><td><strong>Input Frequency</strong></td><td>50 Hz ±1 Hz</td></tr><tr><td><strong>Total Harmonic Distortion (THD)</strong></td><td>≤ 5% of nominal voltage</td></tr><tr><td><strong>Power Factor</strong></td><td>≥ 0.99 at full load</td></tr><tr><td><strong>Wiring Configuration</strong></td><td>L1, L2, L3, Neutral (N), Protective Earth (PE)</td></tr></tbody></table></figure><p><br><strong>Output Parameters</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Output Voltage</strong></td><td>230 Vac ±15% per output</td></tr><tr><td><strong>Number of Outputs / Connectors</strong></td><td>3</td></tr><tr><td><strong>Charging Power Distribution</strong></td><td>3.3 kW × 2 and 7.4 kW × 1 Output</td></tr><tr><td><strong>Standard Connector Type</strong></td><td>3-Pin Industrial Socket, 3-Pin Modular Socket and Type 2 Gun</td></tr><tr><td><strong>Charging Standard</strong></td><td>IEC 60309 and IEC 62196-2</td></tr><tr><td><strong>Overall Efficiency</strong></td><td>&gt; 95%</td></tr></tbody></table></figure><p><br><strong>Protection &amp; Safety</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Protections</strong></td><td>Over-Voltage, Under-Voltage, Over-Current, Short-Circuit, Ungrounded, A-Type Earth Leakage Protection</td></tr></tbody></table></figure><p><br><strong>USER INTERFACE &amp; CONTROLS</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Display</strong></td><td>20 × 4 Jumbo LCD with LED indicators</td></tr><tr><td><strong>Language Support</strong></td><td>English</td></tr><tr><td><strong>Emergency Control</strong></td><td>Red Emergency Stop Button</td></tr><tr><td><strong>Status Indication</strong></td><td>Input supply, charging, and error status</td></tr><tr><td><strong>Network Communication</strong></td><td>4G/Wi-Fi</td></tr><tr><td><strong>OCPP Support</strong></td><td>OCPP 1.6 or above</td></tr><tr><td><strong>User Authentication</strong></td><td>Plug &amp; Play, RFID and App based</td></tr></tbody></table></figure><p><br><strong>Mechanical &amp; Environmental</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Ingress Protection Rating</strong></td><td>IP54</td></tr><tr><td><strong>Cooling Method</strong></td><td>Natural Air Cooling</td></tr><tr><td><strong>Charging Cable</strong></td><td>Not included (Socket-Based Charger)</td></tr><tr><td><strong>Operating Temperature Range</strong></td><td>–20°C to +60°C</td></tr><tr><td><strong>Storage Temperature Range</strong></td><td>–20°C to +60°C</td></tr><tr><td><strong>Humidity</strong></td><td>5% to 95% RH (Non-Condensing)</td></tr><tr><td><strong>Installation Altitude</strong></td><td>Up to 2000 m above sea level</td></tr></tbody></table></figure><p><br><strong>Simple Installation Requirements</strong></p><p><strong>Power:</strong><br>Install a 63 A 4-Pole Miniature Circuit Breaker (MCB) to provide power to the charger.</p><p><strong>Wiring:</strong><br>Use 10 sq. mm pure copper cable to safely handle the electrical load.</p><p><strong>Earthing:</strong><br>Proper earthing is mandatory to avoid electric shocks &amp; hazards.</p><p><strong>Note:</strong><br>In areas with frequent or extreme voltage fluctuations, install a voltage stabilizer before the MCB for added protection.<br>&nbsp;</p>', '<p>At <strong>EVFAST</strong>, we stand behind the quality and reliability of our EV Chargers, to give you complete peace of mind.</p><p>EVFAST products come with a <strong>1-year warranty</strong> against manufacturing defects.</p><p><strong>Accessories &amp; Add-ons:</strong><br>These items are <strong>not covered under warranty</strong>.</p><p><strong>Warranty Exclusions:</strong><br>The warranty does not apply to damage caused by power surges, supply-side electrical faults, burnouts, improper installation or usage, accidents, physical damage, unauthorized repairs or modifications.</p><p><strong>Customer Support</strong><br>📞<strong>Phone:</strong> +91 8595264742<br>🕘<strong>Hours:</strong> Monday to Saturday, 10:30 AM – 6:00 PM (IST)</p>', NULL, 10, '<p>The <strong>EVFAST 14 kW HYBRID AC EV Charger</strong> with three outputs is a versatile and high-performance charging solution designed to support multiple EV charging interfaces from a single unit. With a combined output capacity of 14 kW, the charger enables simultaneous charging of different types of electric vehicles, making it ideal for shared and mixed-use charging environments.</p><p>This charger features a unique mixed-output configuration, ensuring compatibility with a wide range of EVs—from vehicles such as 2 wheelers and 3 wheelers using portable chargers to modern electric cars requiring faster Type-2 AC charging.</p>', 1, '1770801692.jpg', '[]', NULL, '2026-02-11 01:18:42', '2026-02-11 03:51:32'),
(17, 3, '14.8 kW Dual Gun Charger', '148-kw-dual-gun-charger', 35999.00, 42500.00, 5.00, 'inclusive', 'zone', 0.00, '<p>Sleek wall-mounted premium design</p><p>Tough and Long-Lasting</p><p>Emergency stop switch for safety</p><p>Excellent After-Sales Service</p>', '<p><strong>General</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Model</strong></td><td>EVFAST 14.8Kw Dual Gun</td></tr><tr><td><strong>Rated Capacity</strong></td><td>14.8 kW</td></tr></tbody></table></figure><p><br><strong>Input Parameters</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Input Supply</strong></td><td>Three Phase AC</td></tr><tr><td><strong>Input Voltage</strong></td><td>415 Vac (Operating Range: 380–440 Vac)</td></tr><tr><td><strong>Input Frequency</strong></td><td>50 Hz ±1 Hz</td></tr><tr><td><strong>Total Harmonic Distortion (THD)</strong></td><td>≤ 5% of nominal voltage</td></tr><tr><td><strong>Power Factor</strong></td><td>≥ 0.99 at full load</td></tr><tr><td><strong>Wiring Configuration</strong></td><td>L1, L2, L3, Neutral (N), Protective Earth (PE)</td></tr></tbody></table></figure><p><br><strong>Output Parameters</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Output Voltage</strong></td><td>230 Vac ±15% per output</td></tr><tr><td><strong>Number of Outputs / Connectors</strong></td><td>2</td></tr><tr><td><strong>Charging Power Distribution</strong></td><td>7.4 kW × 2 Output</td></tr><tr><td><strong>Standard Connector Type</strong></td><td>Type 2 Gun</td></tr><tr><td><strong>Charging Standard</strong></td><td>IEC 62196-2</td></tr><tr><td><strong>Overall Efficiency</strong></td><td>&gt; 95%</td></tr></tbody></table></figure><p><br><strong>Protection &amp; Safety</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Protections</strong></td><td>Over-Voltage, Under-Voltage, Over-Current, Short-Circuit, Ungrounded, A-Type Earth Leakage Protection</td></tr></tbody></table></figure><p><br><strong>USER INTERFACE &amp; CONTROLS</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Display</strong></td><td>20 × 4 Jumbo LCD with LED indicators</td></tr><tr><td><strong>Language Support</strong></td><td>English</td></tr><tr><td><strong>Emergency Control</strong></td><td>Red Emergency Stop Button</td></tr><tr><td><strong>Status Indication</strong></td><td>Input supply, charging, and error status</td></tr><tr><td><strong>Network Communication</strong></td><td>4G/Wi-Fi</td></tr><tr><td><strong>OCPP Support</strong></td><td>OCPP 1.6 or above</td></tr><tr><td><strong>User Authentication</strong></td><td>Plug &amp; Play, RFID and App based</td></tr></tbody></table></figure><p><br><strong>Mechanical &amp; Environmental</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Feature</strong></td><td><strong>Specification</strong></td></tr><tr><td><strong>Ingress Protection Rating</strong></td><td>IP54</td></tr><tr><td><strong>Cooling Method</strong></td><td>Natural Air Cooling</td></tr><tr><td><strong>Charging Cable</strong></td><td>Not included (Socket-Based Charger)</td></tr><tr><td><strong>Operating Temperature Range</strong></td><td>–20°C to +60°C</td></tr><tr><td><strong>Storage Temperature Range</strong></td><td>–20°C to +60°C</td></tr><tr><td><strong>Humidity</strong></td><td>5% to 95% RH (Non-Condensing)</td></tr><tr><td><strong>Installation Altitude</strong></td><td>Up to 2000 m above sea level</td></tr></tbody></table></figure><p><br><strong>Simple Installation Requirements</strong></p><p><strong>Power:</strong><br>Install a 63 A 4-Pole Miniature Circuit Breaker (MCB) to provide power to the charger.</p><p><strong>Wiring:</strong><br>Use 10 sq. mm pure copper cable to safely handle the electrical load.</p><p><strong>Earthing:</strong><br>Proper earthing is mandatory to avoid electric shocks &amp; hazards.</p><p><strong>Note:</strong><br>In areas with frequent or extreme voltage fluctuations, install a voltage stabilizer before the MCB for added protection.</p>', '<p>At <strong>EVFAST</strong>, we stand behind the quality and reliability of our EV Chargers, to give you complete peace of mind.</p><p>EVFAST products come with a <strong>1-year warranty</strong> against manufacturing defects.</p><p><strong>Accessories &amp; Add-ons:</strong><br>These items are <strong>not covered under warranty</strong>.</p><p><strong>Warranty Exclusions:</strong><br>The warranty does not apply to damage caused by power surges, supply-side electrical faults, burnouts, improper installation or usage, accidents, physical damage, unauthorized repairs or modifications.</p><p><strong>Customer Support</strong><br>📞<strong>Phone:</strong> +91 8595264742<br>🕘<strong>Hours:</strong> Monday to Saturday, 10:30 AM – 6:00 PM (IST)</p>', NULL, 10, '<p>The <strong>EVFAST14.8 kW Dual Gun AC EV Charger</strong> is a high-performance charging solution designed to charge two electric vehicles simultaneously. Equipped with two independent Type-2 charging guns, each delivering 7.4 kW AC power, this charger is ideal for residential societies, commercial buildings, offices, fleet depots, and semi-public charging locations.</p><p>With a total combined output of 14.8 kW, the charger ensures efficient power utilization, faster charging, and reliable performance. Its compact and robust design makes it suitable for both indoor and outdoor installations, supporting the growing demand for multi-vehicle AC charging infrastructure.</p><p>Choose how you charge with three modes— Plug &amp;Charge ,RFID and App based.</p>', 1, '1770801713.jpg', '[]', NULL, '2026-02-11 01:27:56', '2026-02-11 03:51:53'),
(18, 6, '32A Industrial Socket Box with MCB', '32a-industrial-socket-box-with-mcb', 1999.00, 2500.00, 18.00, 'inclusive', 'zone', 0.00, '<p>Minimal Lead Time</p><p>Superior Quality</p><p>Ideal for EV Chargers</p><p>Tough and Long-Lasting</p>', NULL, '<p>Please note that no warranty is applicable to accessories. Accessories are provided on an “as-is” basis, and the company does not offer any guarantee or warranty coverage. However, if a manufacturing defect is found upon receiving the product, it can be exchanged within one week.</p>', NULL, 10, '<p>The 32A Industrial Socket Box with 40A MCB is specifically designed to provide a safe and reliable power connection for <strong>Portable EV chargers</strong>. It ensures stable power delivery while offering essential electrical protection required for EV charging applications.</p><p>Equipped with a <strong>32A industrial socket</strong>, the unit supports high-current continuous loads commonly demanded by portable EV chargers. The integrated <strong>40A Miniature Circuit Breaker (MCB)</strong> provides effective protection against overloads and short circuits, ensuring safe operation during charging sessions and protecting both the charger and the electrical installation.</p><p>The socket box is housed in a <strong>rugged, impact-resistant enclosure</strong>, suitable for indoor and outdoor installations where portable EV charging is required, such as residential parking areas, commercial facilities, workshops, and temporary charging locations. Its secure enclosure helps prevent accidental disconnection and enhances user safety.<br>&nbsp;</p><figure class=\"table\"><table><tbody><tr><td><strong>Key Features</strong></td></tr><tr><td>Suitable for portable EV chargers</td></tr><tr><td>32A industrial socket for high-load applications</td></tr><tr><td>40A MCB for overload and short-circuit protection</td></tr><tr><td>Robust and durable enclosure</td></tr><tr><td>Safe and reliable power supply for EV charging</td></tr><tr><td>Ideal for residential, commercial, and temporary EV charging setups</td></tr></tbody></table></figure>', 1, '1770802297.jpg', '[]', NULL, '2026-02-11 01:31:18', '2026-02-11 04:01:37'),
(19, 6, '32A Wall Mounted Industrial Socket', '32a-wall-mounted-industrial-socket', 599.00, 950.00, 18.00, 'inclusive', 'zone', 0.00, '<p>Minimal Lead Time</p><p>Superior Quality</p><p>Ideal for EV Chargers</p><p>Tough and Long-Lasting</p>', NULL, '<p>Please note that no warranty is applicable to accessories. Accessories are provided on an “as-is” basis, and the company does not offer any guarantee or warranty coverage. However, if a manufacturing defect is found upon receiving the product, it can be exchanged within one week.</p>', NULL, 10, '<p>The <strong>32A Wall-Mounted Industrial Socket</strong> is a reliable and high-capacity power solution designed specifically for connecting portable EV chargers. Built to support higher current loads, it enables faster and more stable charging compared to standard household outlets, making it ideal for home garages, workplaces, and commercial EV charging setups.</p><p>Constructed from heavy-duty, impact-resistant materials, the socket is engineered for long-term performance in demanding environments. Its wall-mounted design ensures a secure, fixed connection point for portable EV chargers, helping reduce cable strain and improve charging safety. Designed to meet industrial electrical standards, it delivers dependable power for daily EV charging needs.<br>&nbsp;</p><figure class=\"table\"><table><tbody><tr><td><strong>Key Features</strong></td></tr><tr><td>32 amp rating suitable for 7.4 kW portable EV charger connections</td></tr><tr><td>Wall-mounted design for secure and organized installation</td></tr><tr><td>Heavy-duty industrial construction for durability and safety</td></tr><tr><td>Provides stable, high-current power for efficient EV charging</td></tr></tbody></table></figure><p><strong>Ideal For:</strong><br>Home garages, apartment complexes, workplaces, fleet depots, and commercial locations using portable EV chargers.</p>', 1, '1770802316.jpg', '[]', NULL, '2026-02-11 01:37:00', '2026-02-11 04:01:56'),
(20, 6, '32A to 16A Ev Jumper Cable', '32a-to-16a-ev-jumper-cable', 999.00, 1280.00, 18.00, 'inclusive', 'zone', 0.00, '<p>Minimal Lead Time</p><p>Superior Quality</p><p>Ideal for EV Chargers</p><p>Tough and Long-Lasting</p>', NULL, '<p>Please note that no warranty is applicable to accessories. Accessories are provided on an “as-is” basis, and the company does not offer any guarantee or warranty coverage. However, if a manufacturing defect is found upon receiving the product, it can be exchanged within one week.</p>', NULL, 10, '<p>The EV Jumper Cable- 32A to 16A Converter&nbsp; is an essential accessory for electric vehicle owners, providing a safe, flexible, and reliable connection between power sources and portable EV chargers. It allows portable EV charger users to adapt a 32A charger plug to a standard 16A household socket. This cable is ideal for chargers with variable current settings, enabling the user to safely connect an industrial plug to a household socket at a lower current. In emergencies or when an industrial socket is unavailable, the jumper cable ensures continued charging using the available 16A socket.</p><p>In short - 32A to 16A EV Jumper cable makes high-power EV chargers with variable current setting compatible with lower-current sockets, ensuring safe and flexible charging anywhere<br>&nbsp;</p><figure class=\"table\"><table><tbody><tr><td><strong>Key Features</strong></td></tr><tr><td><strong>Flexibility:</strong> Allows EV owners to charge in locations where only lower-current sockets are available (like older buildings, homes, or offices)</td></tr><tr><td><strong>Convenience:</strong> No need for specialized 32A infrastructure everywhere.</td></tr></tbody></table></figure>', 1, '1770802335.jpg', '[]', NULL, '2026-02-11 01:40:31', '2026-02-11 04:02:15'),
(21, 6, 'Charger Cable Organiser With Type 2 Gun Holder', 'charger-cable-organiser-with-type-2-gun-holder', 699.00, 850.00, 18.00, 'inclusive', 'zone', 0.00, '<p>Minimal Lead Time</p><p>Superior Quality</p><p>Ideal for EV Chargers</p><p>Tough and Long-Lasting</p>', NULL, '<p>Please note that no warranty is applicable to accessories. Accessories are provided on an “as-is” basis, and the company does not offer any guarantee or warranty coverage. However, if a manufacturing defect is found upon receiving the product, it can be exchanged within one week.</p>', NULL, 10, '<p>As electric vehicles become more widespread, creating a neat, safe, and convenient charging setup at home or work is essential. An <strong>EV cable organiser with Type-2 Gun Holder&nbsp;</strong>offers an elegant solution by combining cable management with a dedicated holding point for your charging plug — keeping your EV charging area clean, accessible, and protected.</p><p>An EV cable organiser with a gun holder/dummy socket combines <strong>two key charging accessories</strong> into one coordinated solution:<br>&nbsp;</p><figure class=\"table\"><table><tbody><tr><td><strong>Accessory</strong></td><td><strong>Description</strong></td></tr><tr><td><strong>Gun Holder / Dummy Socket</strong></td><td>A robust mount for the charging plug when not in use.<br>Keeps the connector secure, upright, and protected.<br>Works with your Type-2 EV socket type.</td></tr><tr><td><strong>Cable Management System</strong></td><td>Integrated hooks, hangers, or wraps to neatly coil and store the charging cable.<br>Prevents tangles, kinks, and cable damage.<br>Helps maintain a clutter-free garage, driveway, or parking area.</td></tr></tbody></table></figure><p><br><strong>Key Benefits</strong></p><figure class=\"table\"><table><tbody><tr><td><strong>Benefit</strong></td><td><strong>Description</strong></td></tr><tr><td><strong>Enhanced Protection</strong></td><td>The charging plug stays off the ground and away from dirt and water — extending its life and keeping contacts clean.</td></tr><tr><td><strong>Organised Space</strong></td><td>No more tangled cables on the floor. A dedicated organiser ensures your EV charging gear is always neat and accessible.</td></tr><tr><td><strong>Better Safety</strong></td><td>Reducing cable clutter prevents trip hazards and accidental damage to the cable or plug.</td></tr><tr><td><strong>Faster, Easier Charging</strong></td><td>With the plug and cable always in a predictable place, connecting your EV becomes quicker and more convenient.</td></tr></tbody></table></figure>', 1, '1770802354.jpg', '[]', NULL, '2026-02-11 01:46:39', '2026-02-11 04:02:34'),
(22, 6, 'Portable Charger Holders', 'portable-charger-holders', 299.00, 599.00, 18.00, 'inclusive', 'zone', 0.00, '<p>Minimal Lead Time</p><p>Superior Quality</p><p>Ideal for EV Chargers</p><p>Tough and Long-Lasting</p>', NULL, '<p>Please note that no warranty is applicable to accessories. Accessories are provided on an “as-is” basis, and the company does not offer any guarantee or warranty coverage. However, if a manufacturing defect is found upon receiving the product, it can be exchanged within one week.</p>', NULL, 10, '<p>Keep your EV charging setup organized, protected, and ready to go with this <strong>Portable Charger Holder</strong>. Designed for convenience, this holder provides a secure place to store your portable EV charger when it’s not in use, helping prevent cable damage, tangles, and clutter.</p><p>Built with durability in mind, the holder supports most standard portable EV chargers. Its compact, lightweight design makes it easy to mount in a garage.</p><p><strong>Ideal for:</strong> EV owners looking for a simple, reliable way to organize and protect their portable charging equipment.</p>', 1, '1770802371.jpg', '[]', NULL, '2026-02-11 01:51:07', '2026-02-11 04:02:51'),
(23, 6, 'Ac Ev Charger Stand', 'ac-ev-charger-stand', 3999.00, 4500.00, 18.00, 'inclusive', 'zone', 0.00, '<p>Minimal Lead Time</p><p>Superior Quality</p><p>Ideal for EV Chargers</p><p>Tough and Long-Lasting</p>', NULL, '<p>Please note that no warranty is applicable to accessories. Accessories are provided on an “as-is” basis, and the company does not offer any guarantee or warranty coverage. However, if a manufacturing defect is found upon receiving the product, it can be exchanged within one week.</p>', NULL, 10, '<p>The EV Charger Stand is a sturdy and reliable mounting solution designed to support electric vehicle charging equipment in residential, commercial, and public charging installations. It provides a secure and organized platform for installing EV chargers, especially in locations where wall mounting is not feasible.</p><p>Manufactured from <strong>high-strength metal with an anti-corrosion finish</strong>, the stand is built to withstand outdoor environmental conditions, ensuring long-term durability and stable performance. Its rigid structure offers excellent mechanical stability, protecting the charger from vibration, accidental impact, and misuse.</p><p>The stand features a <strong>floor-mounted pedestal design</strong> with a heavy-duty base plate for firm anchoring. Pre-drilled mounting provisions allow easy installation of various EV charger models. Integrated <strong>cable management support</strong> helps keep charging cables neatly arranged, improving safety and ease of use.</p><p>Designed for both <strong>indoor and outdoor applications</strong>, the EV Charger Stand is ideal for parking areas, residential societies, commercial buildings, workplaces, and public EV charging stations. Its practical design enhances charger accessibility while maintaining a clean and professional appearance.</p><p>The EV Charger Stand offers a dependable and efficient solution for organized, safe, and accessible EV charging infrastructure.</p>', 1, '1770802390.jpg', '[]', NULL, '2026-02-11 02:41:41', '2026-02-11 04:03:10'),
(24, 6, 'Type 2 16A Gun With 5M Cable', 'type-2-16a-gun-with-5m-cable', 2999.00, 3500.00, 18.00, 'inclusive', 'zone', 0.00, '<p>Minimal Lead Time</p><p>Superior Quality</p><p>Ideal for EV Chargers</p><p>Tough and Long-Lasting</p>', NULL, '<p>Please note that no warranty is applicable to accessories. Accessories are provided on an “as-is” basis, and the company does not offer any guarantee or warranty coverage. However, if a manufacturing defect is found upon receiving the product, it can be exchanged within one week.</p>', NULL, 10, '<p>The Type-2 EV Charging Gun with a 16A rating and 5-metre cable is designed for safe and reliable AC charging of electric vehicles compliant with Type-2 (IEC 62196-2) standards. It is ideal for residential, workplace, and portable EV charging applications.</p><p>Rated for&nbsp;<strong>16A single-phase charging</strong>, the connector provides efficient and stable power delivery suitable for regular daily charging needs. The&nbsp;<strong>5-metre high-quality cable</strong> offers sufficient reach for convenient vehicle connection, ensuring flexibility during installation and use.</p><p>The charging gun features an&nbsp;<strong>ergonomic design with a secure locking mechanism</strong>, ensuring a firm and safe connection throughout the charging process. Manufactured from&nbsp;<strong>durable, heat-resistant, and flame-retardant materials</strong>, it ensures long-term performance and user safety.</p><p>Suitable for&nbsp;<strong>indoor and outdoor use</strong>, the Type-2 16A charging gun is compatible with portable EV chargers, wall-mounted chargers, and AC charging stations, making it a practical and dependable EV charging solution.</p>', 1, '1770802405.jpg', '[]', NULL, '2026-02-11 02:42:51', '2026-02-11 04:03:25'),
(25, 6, 'Type 2 32A Gun With 5M Cable', 'type-2-32a-gun-with-5m-cable', 4499.00, 7000.00, 18.00, 'inclusive', 'zone', 0.00, '<p>Minimal Lead Time</p><p>Superior Quality</p><p>Ideal for EV Chargers</p><p>Tough and Long-Lasting</p>', NULL, '<p>Please note that no warranty is applicable to accessories. Accessories are provided on an “as-is” basis, and the company does not offer any guarantee or warranty coverage. However, if a manufacturing defect is found upon receiving the product, it can be exchanged within one week.</p>', NULL, 9, '<p>The Type-2 EV Charging Gun with a 32A rating and 5-metre cable is designed to deliver safe, efficient, and reliable AC charging for electric vehicles compliant with Type-2 (IEC 62196-2) standards. It is suitable for residential, commercial, and portable EV charging applications.</p><p>Rated for&nbsp;<strong>32A single-phase charging</strong>, the connector supports higher power transfer for faster charging compared to standard 16A solutions. The&nbsp;<strong>5-metre heavy-duty cable</strong> provides flexibility and ease of use, allowing convenient vehicle positioning during charging.</p><p>The charging gun features an&nbsp;<strong>ergonomic grip and secure locking mechanism</strong>, ensuring a stable connection throughout the charging process. Constructed from&nbsp;<strong>high-quality, heat-resistant, and flame-retardant materials</strong>, it offers excellent durability, electrical safety, and long service life.</p><p>Designed for&nbsp;<strong>indoor and outdoor use</strong>, the Type-2 32A charging gun is compatible with portable EV chargers, wall-mounted chargers, and AC charging stations, making it an ideal solution for dependable daily EV charging.</p>', 1, '1770802418.jpg', '[]', NULL, '2026-02-11 02:44:07', '2026-02-13 00:54:02'),
(26, 6, 'Portable Charger Enclosure', 'portable-charger-enclosure', 1499.00, 2500.00, 18.00, 'inclusive', 'zone', 0.00, '<p>Minimal Lead Time</p><p>Superior Quality</p><p>Ideal for EV Chargers</p><p>Tough and Long-Lasting</p>', NULL, '<p>Please note that no warranty is applicable to accessories. Accessories are provided on an “as-is” basis, and the company does not offer any guarantee or warranty coverage. However, if a manufacturing defect is found upon receiving the product, it can be exchanged within one week.</p>', NULL, 9, '<p>The enclosure for the portable EV charger is designed to provide robust protection and secure housing for charging electronics in demanding environments. It is engineered with dedicated provisions for&nbsp;<strong>LCD display and LED indicators</strong>, allowing clear visibility of charging status and system information while maintaining complete enclosure integrity.</p><p>Manufactured from&nbsp;<strong>high-quality, impact-resistant and flame-retardant material</strong>, the enclosure ensures excellent mechanical strength and long-term durability. With an&nbsp;<strong>IP67 protection rating</strong>, it offers complete protection against dust ingress and water immersion, making it ideal for both indoor and outdoor EV charging applications.</p><p>The enclosure features a&nbsp;<strong>precision-sealed design</strong> with weatherproof gaskets to prevent moisture, dust, and contaminants from entering. Transparent or cut-out sections are provided for LCD and LED integration without compromising the IP rating. Its compact and ergonomic design supports easy installation, servicing, and cable management for portable EV chargers.</p><p>Suitable for&nbsp;<strong>residential, commercial, and temporary charging setups</strong>, this IP67-rated enclosure enhances safety, reliability, and aesthetics of portable EV charging systems.</p>', 1, '1770802436.jpg', '[]', NULL, '2026-02-11 02:45:28', '2026-02-13 01:40:19');

-- --------------------------------------------------------

--
-- Table structure for table `product_addon`
--

CREATE TABLE `product_addon` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `addon_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_addon`
--

INSERT INTO `product_addon` (`id`, `product_id`, `addon_id`) VALUES
(1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_related`
--

CREATE TABLE `product_related` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `related_product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('jBTuJERasSX6auKKWkPbZwwXnifZRzueQZ5CfVS9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVWdKbHVsMTlBQ3RqSUZZUFUzOUE5eW00cXNjeHZaT0xSaW4weFZaVSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wYXltZW50LXN1Y2Nlc3MvMjEiO3M6NToicm91dGUiO3M6MTU6InBheW1lbnQuc3VjY2VzcyI7fX0=', 1770977928),
('Y9ZpKFGK92JeM0iqzuCK0aDpZfL6xWpg7AJfa8Hl', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiOUIxTG5JUk5CNndyeXZFRnBuNDNyN3dHQ3Z1VlR4c3FaRWlNT3ZudiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9pbnZvaWNlLzIzIjtzOjU6InJvdXRlIjtzOjE2OiJpbnZvaWNlLmRvd25sb2FkIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1770977972);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_zones`
--

CREATE TABLE `shipping_zones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `states` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`states`)),
  `rate` decimal(10,2) NOT NULL,
  `free_above` decimal(10,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_zones`
--

INSERT INTO `shipping_zones` (`id`, `name`, `states`, `rate`, `free_above`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Local', '[\"Delhi\"]', 0.00, NULL, 1, '2026-02-10 01:31:34', '2026-02-10 01:31:34'),
(2, 'North', '[\"Chandigarh\",\"Haryana\",\"Himachal Pradesh\",\"Jammu & Kashmir\",\"Ladakh\",\"Uttar Pradesh\"]', 150.00, 50000.00, 1, '2026-02-10 01:32:21', '2026-02-13 03:40:13'),
(3, 'South', '[\"Andaman & Nicobar Islands\",\"Assam\",\"Goa\",\"Karnataka\",\"Tamil Nadu\"]', 400.00, 50000.00, 1, '2026-02-10 01:33:21', '2026-02-13 03:31:44'),
(4, 'Punjab zone', '[\"Punjab\"]', 1.00, 500.00, 1, '2026-02-13 03:40:35', '2026-02-13 03:40:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `gstin` varchar(15) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `gstin`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, NULL, '1770715812_logo.png', NULL, '$2y$12$M.NJ0NUWUM4xTnVfk7oRI.JOmAwxoACIjJelM1uE2P6Z8HIZCw3xy', NULL, '2026-02-09 23:57:43', '2026-02-10 04:00:12', 'admin', 1),
(2, 'admin', 'Digilinkerlab@gmail.com', '9818000334', NULL, NULL, NULL, '$2y$12$yKVAXrzZOXDCRUPQHJcIfuf./MXTP1cwLx3kbHy57rzouZtls/M.W', NULL, '2026-02-10 00:55:52', '2026-02-10 00:55:52', 'user', 1),
(3, 'Shahid', 'test@gmail.com', '9818000334', NULL, NULL, NULL, '$2y$12$196eM.qDVTc.8.yUhCQhIOkx3QBGrYLcOL7u0FplgEta3BDQO7LmS', NULL, '2026-02-13 00:54:02', '2026-02-13 00:54:02', 'user', 1),
(4, 'Shahid', 'anil@gmail.com', '9818000334', NULL, NULL, NULL, '$2y$12$lX3Zsw/ng6pJm06FNPX5oOrRW4dAVN2sW87qy4kBRur5XQbp2D5ae', NULL, '2026-02-13 01:40:19', '2026-02-13 01:40:19', 'user', 1),
(5, 'shahid', 'shahid12@gmail.com', '9818000334', NULL, NULL, NULL, '$2y$12$uyW8exthI7Dj.rKA/6oBbeWrzWIgbO.gaK.yqU29xzDPcvDaNlK3m', NULL, '2026-02-13 03:12:40', '2026-02-13 03:12:40', 'user', 1),
(6, 'shahid324', 'aniket@gmail.com', '9818000334', NULL, NULL, NULL, '$2y$12$enVEdvTxkJUEckv9083k9.9kpturf.F5gLHov9F5GEimVFTqRVERe', NULL, '2026-02-13 03:52:01', '2026-02-13 03:52:01', 'user', 1),
(7, 'admin', 'test2@gmail.com', '9818000334', NULL, NULL, NULL, '$2y$12$G9QrBBcnuT4MYKjwUnb6CemNmsyi73LjcoxfCkkINFK/D493qjr1K', NULL, '2026-02-13 04:39:36', '2026-02-13 04:39:36', 'user', 1),
(8, 'admin', 'test3@gmail.com', '9818000334', NULL, NULL, NULL, '$2y$12$Qd9Q9ELqXLBGzUyStwNzOu5syFWuN96/74Ol5voBuyyLxJYXIu.eW', NULL, '2026-02-13 04:42:03', '2026-02-13 04:42:03', 'user', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abandoned_checkouts`
--
ALTER TABLE `abandoned_checkouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `abandoned_checkouts_user_id_foreign` (`user_id`),
  ADD KEY `abandoned_checkouts_recovered_order_id_foreign` (`recovered_order_id`);

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addon_product`
--
ALTER TABLE `addon_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addon_product_product_id_foreign` (`product_id`),
  ADD KEY `addon_product_addon_id_foreign` (`addon_id`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_invoice_number_unique` (`invoice_number`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_addon`
--
ALTER TABLE `product_addon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_addon_product_id_foreign` (`product_id`),
  ADD KEY `product_addon_addon_id_foreign` (`addon_id`);

--
-- Indexes for table `product_related`
--
ALTER TABLE `product_related`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_related_product_id_related_product_id_unique` (`product_id`,`related_product_id`),
  ADD KEY `product_related_related_product_id_foreign` (`related_product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shipping_zones`
--
ALTER TABLE `shipping_zones`
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
-- AUTO_INCREMENT for table `abandoned_checkouts`
--
ALTER TABLE `abandoned_checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `addon_product`
--
ALTER TABLE `addon_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_addon`
--
ALTER TABLE `product_addon`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_related`
--
ALTER TABLE `product_related`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_zones`
--
ALTER TABLE `shipping_zones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `abandoned_checkouts`
--
ALTER TABLE `abandoned_checkouts`
  ADD CONSTRAINT `abandoned_checkouts_recovered_order_id_foreign` FOREIGN KEY (`recovered_order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `abandoned_checkouts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `addon_product`
--
ALTER TABLE `addon_product`
  ADD CONSTRAINT `addon_product_addon_id_foreign` FOREIGN KEY (`addon_id`) REFERENCES `addons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `addon_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_addon`
--
ALTER TABLE `product_addon`
  ADD CONSTRAINT `product_addon_addon_id_foreign` FOREIGN KEY (`addon_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_addon_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_related`
--
ALTER TABLE `product_related`
  ADD CONSTRAINT `product_related_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_related_related_product_id_foreign` FOREIGN KEY (`related_product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
