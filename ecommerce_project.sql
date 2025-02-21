-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2025 at 07:11 AM
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
-- Database: `ecommerce_project`
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
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(41, 6, 18, '2025-01-06 22:23:52', '2025-01-06 22:23:52'),
(43, 6, 18, '2025-01-08 07:28:08', '2025-01-08 07:28:08');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Mens', '2024-11-10 08:46:40', '2024-12-30 08:44:02'),
(2, 'Womens', '2024-11-10 08:46:48', '2024-12-30 08:43:51'),
(4, 'Kids & Toys', '2024-11-12 21:49:55', '2024-12-31 04:16:03'),
(16, 'Fashion accessories', '2024-12-31 04:15:17', '2024-12-31 04:15:17'),
(17, 'Home accessories', '2025-01-05 08:59:49', '2025-01-05 08:59:49');

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
(4, '2024_11_10_135547_create_categories_table', 2),
(5, '2024_11_14_131956_create_products_table', 3),
(10, '2024_11_30_100740_create_carts_table', 4),
(11, '2024_11_30_123939_create_orders_table', 5),
(12, '2024_12_28_112355_add_payment_status_to_order_table', 6),
(13, '2024_12_28_170554_add_slug_column_to_products_table', 7),
(14, '2024_12_31_061536_create_shopping_lists_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `rec_address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'in progress',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'cash on delivery',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `rec_address`, `phone`, `status`, `user_id`, `product_id`, `payment_status`, `created_at`, `updated_at`, `quantity`, `size`) VALUES
(21, 'Ashan Kavinda', 'Trincomalee', '0763195706', 'on the way', 6, 22, 'cash on delivery', '2025-01-04 10:13:04', '2025-01-05 22:57:00', 2, 'small'),
(22, 'Ashan Kavinda', 'Trincomalee', '0763195706', 'Delivered', 6, 18, 'cash on delivery', '2025-01-04 10:17:29', '2025-01-05 22:56:58', 3, 'small'),
(25, 'Ashan Kavinda', 'Trincomalee', '0763195706', 'in progress', 6, 18, 'cash on delivery', '2025-01-05 22:57:58', '2025-01-05 22:57:58', 3, 'small'),
(26, 'Ashan Kavinda', 'Trincomalee', '0763195706', 'in progress', 6, 15, 'cash on delivery', '2025-01-05 22:57:58', '2025-01-05 22:57:58', 3, 'small'),
(27, 'Ashan Kavinda', 'Trincomalee', '0763195706', 'in progress', 6, 17, 'cash on delivery', '2025-01-05 23:09:34', '2025-01-05 23:09:34', 4, 'small'),
(28, 'Ashan Kavinda', 'Trincomalee', '0763195706', 'in progress', 6, 16, 'cash on delivery', '2025-01-06 05:05:05', '2025-01-06 05:05:05', 6, 'small'),
(29, 'Ashan Kavinda', 'Trincomalee', '0763195706', 'in progress', 6, 18, 'cash on delivery', '2025-01-06 22:03:56', '2025-01-06 22:03:56', 8, 'small');

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
('tharushijayasinghe2001@gmail.com', '$2y$12$zXUbEDknXpUE4QrgtMx2qu8UR0.AXPTuv8rU2JRvppo0JQ2pozTa6', '2024-12-28 02:09:18'),
('user@gmail.com', '$2y$12$NwS07Ke1XWZjuAiClyk85OcVC6dPFpQZhQ4w3GSwjbxvyUCBjyMt6', '2024-12-28 02:03:20');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `price`, `category`, `quantity`, `slug`, `created_at`, `updated_at`) VALUES
(15, 'frock', 'Party Casual Frock Dress For Girls 1-6 Years New Fashion Dress Kids Sleeveless Bridesmaid By Mon_linestore', '1735988514.jpg', '3000', 'Kids & Toys', '10', 'frock', '2025-01-04 05:31:55', '2025-01-08 20:35:04'),
(16, 'Frock', 'Linen Short Frocks', '1735988619.jpg', '2500', 'Womens', '5', 'frock-2', '2025-01-04 05:33:39', '2025-01-08 20:35:15'),
(17, 'Frock', 'Casual frocks and dressers. excludes silk,fur, leather and velvetwashed and ironed', '1736388292.jpg', '4500', 'Womens', '9', 'frock-3', '2025-01-04 05:35:18', '2025-01-08 20:34:52'),
(18, 'Frock', 'Enriched by our vast industrial experience in this business, we are involved in offering an enormous quality range of Ladies Stylish Frock.', '1735988860.jpg', '2000', 'Womens', '11', 'frock-4', '2025-01-04 05:37:40', '2025-01-04 05:37:40'),
(19, 'Crop Top', 'Side Ruched Crop Top – Olive Green', '1735988980.jpg', '1500', 'Womens', '10', 'crop-top', '2025-01-04 05:39:40', '2025-01-04 05:39:40'),
(20, 'crop top', 'It’s a classic fashion to style a crop and palazzo, It still has a demand.', '1735989176.jpg', '3500', 'Womens', '4', 'crop-top-2', '2025-01-04 05:42:56', '2025-01-04 05:42:56'),
(21, 'Trousers', 'Women Warm Casual Trousers, Girls Winter Fleece Jogger Pant,Ladies Thickened Thermal Sweatpants Sports Trousers with Drawstring Closure XL', '1735989276.jpg', '4000', 'Womens', '4', 'trousers', '2025-01-04 05:44:36', '2025-01-04 05:44:36'),
(22, 'Trouser', 'Dark Grey Cotton Chambray Trouser', '1735989366.jpg', '5500', 'Womens', '9', 'trouser', '2025-01-04 05:46:06', '2025-01-04 05:46:06'),
(23, 'Trouser', 'Girls 2 Pack Jersey School Trousers - Grey\r\nFrom £15', '1735989435.jpg', '1500', 'Kids & Toys', '7', 'trouser-2', '2025-01-04 05:47:15', '2025-01-04 05:47:15'),
(24, 'T-shirts', 'Buttoned Shoulder T-Shirt', '1736227577.jpeg', '2,500', 'Mens', '9', 't-shirts', '2025-01-06 23:56:17', '2025-01-06 23:56:17'),
(25, 'T-shirt', 'Bear Unisex Oversized Tshirt', '1736227685.jpg', '1,300', 'Mens', '12', 't-shirt', '2025-01-06 23:58:05', '2025-01-06 23:58:05'),
(26, 'Trouser', 'Acid Wash Denim Trouser', '1736227773.jpeg', '5,200', 'Mens', '9', 'trouser-3', '2025-01-06 23:59:33', '2025-01-06 23:59:33'),
(27, 'Frock', 'VIKITA Winter Toddler Girl Long Sleeve Dresses for Kids 2-12 Years, Soft Cotton, Machine Wash', '1736228045.jpg', '3,000', 'Kids & Toys', '6', 'frock-5', '2025-01-07 00:04:05', '2025-01-07 00:04:05'),
(28, 'Shirt and Jeans', 'Yilaku Baby Boy Plaid Shirt and Jeans Outfits Set | Toddler Suits for 1-7 Years Boys', '1736228169.jpg', '1,000', 'Kids & Toys', '10', 'shirt-and-jeans', '2025-01-07 00:06:09', '2025-01-07 00:06:09'),
(29, 'Hair Clip', 'Bow Hair Clip Korea Fashion Big Bow Ribbon Hair Tie Small Fresh Floral Hairpin Nicle', '1736228405.jpg', '500', 'Fashion accessories', '12', 'hair-clip', '2025-01-07 00:10:05', '2025-01-07 00:10:05'),
(30, 'Hair Clip', 'Bridal Hair Clip by Warren York', '1736228487.jpeg', '2,500', 'Fashion accessories', '5', 'hair-clip-2', '2025-01-07 00:11:27', '2025-01-07 00:11:27'),
(31, 'Bag', 'The word “accessories” conjures up images of handbags and headbands', '1736228823.jpg', '3,500', 'Fashion accessories', '4', 'bag', '2025-01-07 00:17:03', '2025-01-07 00:17:03'),
(32, 'Wall Clock', '3D Acrylic Digital Wall Clock Roman Numerals Design Mirror Wall Clock Fashion Large Round Wall Clock DIY Self Adhesive Clocks', '1736229019.jpg', '6,000', 'Home accessories', '2', 'wall-clock', '2025-01-07 00:20:19', '2025-01-07 00:20:19'),
(33, 'Plastic Vase', '1pc Nordic Plastic Vase Simple Small Fresh Flower Pot Storage Bottle for Flowers Living Room Modern Home Decorations Ornaments', '1736229175.jpg', '900', 'Home accessories', '6', 'plastic-vase', '2025-01-07 00:22:55', '2025-01-07 00:22:55');

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
('KiEbYQ4G9Ln5S4Ae1iqeMp2pyokK1NgxVqZCibma', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVEtLMk5GUEp2TVQ0ZkdzeXo2eUFLRjFVSVJKRkdIMEYxWTFGcDJ5dyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0ODoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3NlYXJjaD9xdWVyeT1mcm9jayUyMGZyb2NrIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Njt9', 1736401954),
('zo5BwgG3cZNbCwzjhSMNkOtIeohAdSz9g4JqgnVU', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZWlkcUc5c2tJck00MFdZdm0xSGZ2a1BDN3hrdnN6TzV2QzBjV2M2RSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zZWFyY2g/cXVlcnk9ZnJvY2siO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjE4OiJmbGFzaGVyOjplbnZlbG9wZXMiO2E6MDp7fX0=', 1736416571);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_lists`
--

CREATE TABLE `shopping_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `products` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`products`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT 'user',
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `phone`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@gmail.com', 'admin', '8976543', 'Kandy', NULL, '$2y$12$oQKLlCp/VTgSvSRtdC7iKOMHpyjyoC9JaScTq32rn89DWHPoLR61G', NULL, '2024-11-01 01:18:50', '2024-11-01 01:18:50'),
(3, 'user', 'user@gmail.com', 'user', '8976543', 'hgfjghjgh', NULL, '$2y$12$3OUX8JLq75kO7NQAGYfIMOS0G1h9q2RcjlogtpoaukHtbL2z7sCXi', NULL, '2024-11-23 08:38:03', '2024-11-23 08:38:03'),
(5, 'sanduni', 'sanduni@gmail.com', 'user', '0741149395', 'monaragala', NULL, '$2y$12$gTtiu.7kNRdSpzHBovZuv.78q5CCTf/croQ/sMCdVztnrp10KeQNK', NULL, '2024-12-03 10:59:11', '2024-12-03 10:59:11'),
(6, 'Ashan Kavinda', 'tharushijayasinghe2001@gmail.com', 'user', '0763195706', 'Trincomalee', '2024-12-28 06:06:55', '$2y$12$BaMpP1bxhP8EMjV.ik0VcOTW/7Sc0Hx3Ge7wANFFCqumvgMO9eZ4W', NULL, '2024-12-28 01:58:27', '2024-12-28 06:06:55'),
(9, 'Tharuk Randil', 'tharuk@gmail.com', 'user', '0741149395', 'gfghfghfghfghn', NULL, '$2y$12$w/Cdj6M2ZsN23AMNpx1hC.w1ZLWRk5fTIZ/YjbhLo0uU2hgwAwBN2', NULL, '2024-12-31 00:33:01', '2024-12-31 00:33:01');

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
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shopping_lists`
--
ALTER TABLE `shopping_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shopping_lists_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `shopping_lists`
--
ALTER TABLE `shopping_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shopping_lists`
--
ALTER TABLE `shopping_lists`
  ADD CONSTRAINT `shopping_lists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
