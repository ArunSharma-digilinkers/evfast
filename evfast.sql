-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2026 at 12:38 PM
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
(7, 'Portable Ev Charger', 'portable-ev-charger', 1, '2026-01-28 06:20:47', '2026-01-28 06:20:47'),
(8, 'Wall Mount Ev Charger', 'wall-mount-ev-charger', 1, '2026-01-28 06:21:04', '2026-01-28 06:21:04'),
(9, 'AC Charger', 'ac-charger', 1, '2026-01-28 06:21:14', '2026-01-28 06:21:14'),
(10, 'DC Charger', 'dc-charger', 1, '2026-01-28 06:21:33', '2026-01-28 06:21:33'),
(11, 'Gun Holder', 'gun-holder', 1, '2026-01-28 06:21:55', '2026-01-28 06:21:55'),
(12, 'Accessories', 'accessories', 1, '2026-01-28 06:22:06', '2026-01-28 06:22:06');

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
(4, '2026_01_23_041349_create_products_table', 1),
(5, '2026_01_23_051814_add_role_and_status_to_users_table', 1),
(6, '2026_01_27_081946_create_categories_table', 1),
(7, '2026_01_27_085804_create_products_table', 2),
(15, '2026_01_28_054347_create_orders_table', 3),
(16, '2026_01_28_054418_create_order_items_table', 3),
(17, '2026_01_28_083610_alter_products_table_add_images', 3),
(19, '2026_01_28_104756_add_timestamps_to_orders_table', 4),
(20, '2026_01_28_105531_add_timestamps_to_order_items_table', 5),
(21, '2026_01_29_114314_add_address_fields_to_orders_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pincode` varchar(6) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `total_amount`, `status`, `created_at`, `updated_at`, `pincode`, `state`, `city`) VALUES
(1, 'Shahid', 'Digilinkerlab@gmail.com', '09818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', 200000.00, 'pending', '2026-01-28 05:20:23', '2026-01-28 05:20:23', '', '', ''),
(2, 'Shahid', 'Digilinkerlab@gmail.com', '09818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', 200000.00, 'pending', '2026-01-28 05:26:12', '2026-01-28 05:26:12', '', '', ''),
(3, 'Shahid', 'Digilinkerlab@gmail.com', '09818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', 33.00, 'pending', '2026-01-28 05:27:41', '2026-01-28 05:27:41', '', '', ''),
(4, 'Shahid', 'Digilinkerlab@gmail.com', '09818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', 50000.00, 'canceled', '2026-01-28 05:28:23', '2026-01-28 05:35:41', '', '', ''),
(5, 'Shahid', 'Digilinkerlab@gmail.com', '09818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', 50000.00, 'completed', '2026-01-28 05:29:46', '2026-01-28 05:35:31', '', '', ''),
(6, 'Shahid', 'Digilinkerlab@gmail.com', '09818000334', 'B-96/1, opposite Soniya Gandi Camp, Industrial Area Phase I Naraina,New Delhi, 110028', 120000.00, 'pending', '2026-01-29 05:48:59', '2026-01-29 05:48:59', '', '', '');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(5, 6, 31, 12, 10000.00, '2026-01-29 05:48:59', '2026-01-29 05:48:59');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `quantity` int(11) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `price`, `quantity`, `description`, `status`, `image`, `images`, `created_at`, `updated_at`) VALUES
(6, 7, 'Portable Ev Charger 3.6 KW', 'portable-ev-charger-36-kw', 50000.00, 10, NULL, 1, '1769601175.jpg', '[]', '2026-01-28 06:22:55', '2026-01-28 06:22:55'),
(7, 7, 'Portable Ev Charger 3.6 KW With Accessoies', 'portable-ev-charger-36-kw-with-accessoies', 5000.00, 10, NULL, 1, '1769601288.png', '[]', '2026-01-28 06:24:48', '2026-01-28 06:24:48'),
(8, 8, '7.4 KW EV Charger ( Plug N Play )', '74-kw-ev-charger-plug-n-play', 8000.00, 10, NULL, 1, '1769675298.png', '[]', '2026-01-29 02:58:19', '2026-01-29 02:58:19'),
(9, 8, '7.4 KW EV Charger  ( Standard )', '74-kw-ev-charger-standard', 8000.00, 10, NULL, 1, '1769675416.png', '[]', '2026-01-29 03:00:16', '2026-01-29 03:00:16'),
(10, 8, '11 KW EV Charger ( Plug N Play )', '11-kw-ev-charger-plug-n-play', 50000.00, 10, NULL, 1, '1769675583.png', '[]', '2026-01-29 03:03:03', '2026-01-29 03:03:03'),
(11, 8, '11 KW EV Charger ( Standard )', '11-kw-ev-charger-standard', 6000.00, 10, NULL, 1, '1769675643.png', '[]', '2026-01-29 03:04:03', '2026-01-29 03:04:03'),
(12, 8, '22 KW EV Charger ( Plug N Play )', '22-kw-ev-charger-plug-n-play', 9000.00, 10, NULL, 1, '1769675744.png', '[]', '2026-01-29 03:05:44', '2026-01-29 03:05:44'),
(13, 8, '22 KW EV Charger ( Standard )', '22-kw-ev-charger-standard', 10000.00, 10, NULL, 1, '1769675782.png', '[]', '2026-01-29 03:06:22', '2026-01-29 03:06:22'),
(14, 7, 'Portable Ev Charger 7.4 KW', 'portable-ev-charger-74-kw', 10000.00, 20, NULL, 1, '1769675979.png', '[]', '2026-01-29 03:09:39', '2026-01-29 03:09:39'),
(15, 7, 'Portable Ev Charger 7.4 KW With Accessorios', 'portable-ev-charger-74-kw-with-accessorios', 50000.00, 30, NULL, 1, '1769676192.png', '[]', '2026-01-29 03:13:12', '2026-01-29 03:13:12'),
(16, 9, '3.3 KW Smart Socket', '33-kw-smart-socket', 3000.00, 20, NULL, 1, '1769676282.jpg', '[]', '2026-01-29 03:14:42', '2026-01-29 03:14:42'),
(17, 9, 'Bharat Ac 001 ( 10 KW )', 'bharat-ac-001-10-kw', 20000.00, 10, NULL, 1, '1769676633.jpg', '[]', '2026-01-29 03:20:33', '2026-01-29 03:20:33'),
(18, 9, '14 KW Hybrid Charger', '14-kw-hybrid-charger', 3000.00, 10, NULL, 1, '1769676696.jpg', '[]', '2026-01-29 03:21:36', '2026-01-29 03:21:36'),
(19, 9, '14.8 Dual Gun Charger', '148-dual-gun-charger', 3000.00, 10, NULL, 1, '1769676736.jpg', '[]', '2026-01-29 03:22:16', '2026-01-29 03:22:16'),
(20, 10, '30 KW DC Charger', '30-kw-dc-charger', 2000.00, 10, NULL, 1, '1769676808.jpg', '[]', '2026-01-29 03:23:28', '2026-01-29 03:23:28'),
(21, 11, 'Type 2 Gun Holder', 'type-2-gun-holder', 2000.00, 10, NULL, 1, '1769677033.jpg', '[]', '2026-01-29 03:27:13', '2026-01-29 03:27:13'),
(22, 11, 'CCS2 Gun Holder', 'ccs2-gun-holder', 5000.00, 10, NULL, 1, '1769677057.jpg', '[]', '2026-01-29 03:27:37', '2026-01-29 03:27:37'),
(23, 12, '32A Industrial Socket Box With MCB', '32a-industrial-socket-box-with-mcb', 5000.00, 10, NULL, 1, '1769677104.jpg', '[]', '2026-01-29 03:28:24', '2026-01-29 03:28:24'),
(24, 12, '32A Wall Mounted Industrial Socket', '32a-wall-mounted-industrial-socket', 5000.00, 10, NULL, 1, '1769677184.jpg', '[]', '2026-01-29 03:29:44', '2026-01-29 03:29:44'),
(25, 12, '32A to 16A Ev Jumper Cable', '32a-to-16a-ev-jumper-cable', 5000.00, 10, NULL, 1, '1769677206.jpg', '[]', '2026-01-29 03:30:06', '2026-01-29 03:30:06'),
(26, 12, 'Charger Cable Organiser With Type 2 Gun Holder', 'charger-cable-organiser-with-type-2-gun-holder', 2000.00, 10, NULL, 1, '1769677355.jpg', '[]', '2026-01-29 03:32:35', '2026-01-29 03:32:35'),
(27, 12, 'Portable Charger Holder', 'portable-charger-holder', 5000.00, 10, NULL, 1, '1769677394.jpg', '[]', '2026-01-29 03:33:14', '2026-01-29 03:33:14'),
(28, 12, 'Ac Ev Charger Stand', 'ac-ev-charger-stand', 5000.00, 10, NULL, 1, '1769677426.jpg', '[]', '2026-01-29 03:33:46', '2026-01-29 03:33:46'),
(29, 12, 'Type 2 16A Gun With 5M Cable', 'type-2-16a-gun-with-5m-cable', 5000.00, 10, NULL, 1, '1769677509.jpg', '[]', '2026-01-29 03:35:09', '2026-01-29 03:35:09'),
(30, 12, 'Type 2 32A Gun With 5M Cable', 'type-2-32a-gun-with-5m-cable', 5000.00, 10, NULL, 1, '1769677730.jpg', '[]', '2026-01-29 03:38:50', '2026-01-29 03:38:50'),
(31, 12, 'Portable Charger Enclosure', 'portable-charger-enclosure', 10000.00, -2, NULL, 1, '1769677792.jpg', '[]', '2026-01-29 03:39:52', '2026-01-29 05:48:59');

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
('87buyY10NxdoSPNiMZv9jxjuLCC3fSSeGBGdABAj', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiYzhyZm1pYmlFVmkwU3ZlQjdIM2FtU3JZS0V0R1NvdkV1aThVYTRDQSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo0OiJjYXJ0IjthOjM6e3M6MTg6IjMzLWt3LXNtYXJ0LXNvY2tldCI7YTo0OntzOjQ6Im5hbWUiO3M6MTk6IjMuMyBLVyBTbWFydCBTb2NrZXQiO3M6NToicHJpY2UiO3M6NzoiMzAwMC4wMCI7czo4OiJxdWFudGl0eSI7aToxO3M6NToiaW1hZ2UiO3M6MTQ6IjE3Njk2NzYyODIuanBnIjt9czo0NjoiY2hhcmdlci1jYWJsZS1vcmdhbmlzZXItd2l0aC10eXBlLTItZ3VuLWhvbGRlciI7YTo0OntzOjQ6Im5hbWUiO3M6NDY6IkNoYXJnZXIgQ2FibGUgT3JnYW5pc2VyIFdpdGggVHlwZSAyIEd1biBIb2xkZXIiO3M6NToicHJpY2UiO3M6NzoiMjAwMC4wMCI7czo4OiJxdWFudGl0eSI7aToxO3M6NToiaW1hZ2UiO3M6MTQ6IjE3Njk2NzczNTUuanBnIjt9czoyMzoicG9ydGFibGUtY2hhcmdlci1ob2xkZXIiO2E6NDp7czo0OiJuYW1lIjtzOjIzOiJQb3J0YWJsZSBDaGFyZ2VyIEhvbGRlciI7czo1OiJwcmljZSI7czo3OiI1MDAwLjAwIjtzOjg6InF1YW50aXR5IjtpOjE7czo1OiJpbWFnZSI7czoxNDoiMTc2OTY3NzM5NC5qcGciO319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMDoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2NoZWNrb3V0Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1769687914),
('geuvXyMucGkjoLXXRR0zCstXBfiyrj26QoixGJId', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:147.0) Gecko/20100101 Firefox/147.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiRlI2YmpYT2p2TXYya2JQZ1FKV3NjMkN5ZFlsSkpycGRBZlhBY3h4diI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hYm91dC11cyI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo0OiJjYXJ0IjthOjE6e3M6NDY6ImNoYXJnZXItY2FibGUtb3JnYW5pc2VyLXdpdGgtdHlwZS0yLWd1bi1ob2xkZXIiO2E6NDp7czo0OiJuYW1lIjtzOjQ2OiJDaGFyZ2VyIENhYmxlIE9yZ2FuaXNlciBXaXRoIFR5cGUgMiBHdW4gSG9sZGVyIjtzOjU6InByaWNlIjtzOjc6IjIwMDAuMDAiO3M6ODoicXVhbnRpdHkiO2k6MTtzOjU6ImltYWdlIjtzOjE0OiIxNzY5Njc3MzU1LmpwZyI7fX1zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjMwOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvY2hlY2tvdXQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1769687782),
('GLb03ZuN0wzc7zzBIuEw5EPCZG1UHKbJsguPz5UH', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiV0g4aHZ2M25VaTRsQU5KRzJjWW9xdWV3SDhwanRmRENZZEpaWmxSSiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jb250YWN0LXVzIjtzOjU6InJvdXRlIjtOO31zOjQ6ImNhcnQiO2E6MTp7czoyNjoicG9ydGFibGUtY2hhcmdlci1lbmNsb3N1cmUiO2E6NDp7czo0OiJuYW1lIjtzOjI2OiJQb3J0YWJsZSBDaGFyZ2VyIEVuY2xvc3VyZSI7czo1OiJwcmljZSI7czo4OiIxMDAwMC4wMCI7czo4OiJxdWFudGl0eSI7aToxO3M6NToiaW1hZ2UiO3M6MTQ6IjE3Njk2Nzc3OTIuanBnIjt9fX0=', 1769751660),
('InIEnUK0olY0qK54YZnUWscEaIeizV0yJQVcuOOT', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaFhEVVptUm1hbTRxN2NyN2NDa1FsRG1FbTFJT0NtNGJTcUhvNGcwciI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jb250YWN0LXVzIjtzOjU6InJvdXRlIjtOO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1769769484),
('mgwv9ymad3YLgyiDqO7fi3OaNSFGXOtUORa8z9rP', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQVlNZ2REWXEyRUkxWVlWaWF3SlpuNFJBeVEwRUZZSVVobE9sOGxXTyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9wcm9kdWN0cyI7czo1OiJyb3V0ZSI7czoyMDoiYWRtaW4ucHJvZHVjdHMuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1769687782);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `status`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$tbz.9kfhyYIkwYPbKAIu1OqIc5fDuSK4IdrvGLmUJ5lGnd3aJDx1a', NULL, '2026-01-27 03:56:26', '2026-01-27 03:56:26', 'admin', 1),
(2, 'Anas', 'anas@gmail.com', NULL, '$2y$12$q1LWl0PohDZsOqQXmDzsYOrveYiwIUnDbIq1Osd28Ucp7QASKz1Py', NULL, '2026-01-27 04:37:15', '2026-01-27 04:37:15', 'user', 1),
(3, 'aman', 'aman@gmail.com', NULL, '$2y$12$FOcJPrYWky.iEp.x5wijYuNLEku38W56z4h5Hc/nkjxnfQFWaU5V6', NULL, '2026-01-27 04:50:39', '2026-01-27 04:50:39', 'user', 1);

--
-- Indexes for dumped tables
--

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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
