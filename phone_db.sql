-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 27, 2024 at 01:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phone_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `paid` tinyint(1) NOT NULL DEFAULT 0,
  `count` int(11) NOT NULL DEFAULT 1,
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
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_01_29_134453_create_user_table', 1),
(5, '2024_01_29_143620_create_products_table', 1),
(6, '2024_01_29_143901_create_carts_table', 1),
(7, '2024_02_14_014620_create_payments_table', 1);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `payer_id` varchar(255) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_id`, `payer_id`, `payer_email`, `amount`, `currency`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 'PAYID-MXMEHVY9SF300330S575302A', 'PAYID-MXMEHVY9SF300330S575302A', 'sb-bf8mb27647017@business.example.com', 500.00, 'USD', 'VERIFIED', '2024-02-23 00:07:26', '2024-02-23 00:07:26'),
(2, 'PAYID-MYBMVAQ5XX698355M548535D', 'PAYID-MYBMVAQ5XX698355M548535D', 'sb-bf8mb27647017@business.example.com', 2000.00, 'USD', 'VERIFIED', '2024-03-26 06:16:01', '2024-03-26 06:16:01'),
(3, 'PAYID-MYBYFMI49R245988S971472X', 'PAYID-MYBYFMI49R245988S971472X', 'sb-bf8mb27647017@business.example.com', 1500.00, 'USD', 'VERIFIED', '2024-03-26 19:22:02', '2024-03-26 19:22:02'),
(4, 'PAYID-MYBYF6A7MB45219VW721771P', 'PAYID-MYBYF6A7MB45219VW721771P', 'sb-bf8mb27647017@business.example.com', 1400.00, 'USD', 'VERIFIED', '2024-03-26 19:22:56', '2024-03-26 19:22:56');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `categories` varchar(255) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `feature` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `short_description`, `image`, `categories`, `price`, `feature`, `created_at`, `updated_at`) VALUES
(12, 'iphone 10', 'tab_s1', 'Display: 5.8-inch Super Retina HD display with OLED technology Resolution: 2436 x 1125 pixels at 458 ppi Chip: A11 Bionic chip with 64-bit architecture Storage Options: Available in 64GB and 256GB variants Camera: Dual 12MP wide-angle and telephoto cameras Optical zoom; digital zoom up to 10x Portrait mode, Portrait Lighting (beta), and Optical Image Stabilization 4K video recording at 24 fps, 30 fps, or 60 fps Front Camera: 7MP TrueDepth camera with Portrait mode, Portrait Lighting (beta), Animoji, and Memoji Face ID: Facial recognition technology enabled by TrueDepth camera Battery Life: Lasts up to 2 hours longer than iPhone 7 Water and Dust Resistance: Rated IP67 under IEC standard 60529 Operating System: iOS (at release, iOS 11) Other Features: Wireless charging, Animoji, Augmented Reality capabilities', 'iPhone X is the future of the smartphone in a gorgeous all-glass design with a beautiful 5.8-inch Super Retina display.', 'productImages/VTtD9BVplG20Udo8xNDmVOHOc1H2HCrRTNqYHFlz.png', 'new, trending, suit price', 215, 1, '2024-02-21 21:31:45', '2024-03-26 07:41:08'),
(13, 'Samsung s24 ultra', 'tab_s2', 'Samsung Galaxy S24 Ultra mobile was launched on 17th January 2024. The phone comes with a 120 Hz refresh rate 6.80-inch touchscreen display (QHD+).', '256GB 12GB RAM, 512GB 12GB RAM, 1TB 12GB RAM', 'productImages/bO40M76EtfbCis3s1XkIMnm0XuXBsBgfzvfcOxdH.png', 'new, trending', 1400, 1, '2024-02-21 21:35:14', '2024-03-26 07:40:50'),
(14, 'Headphones | Wireless', 'tab_s3', '2X* stronger voice reduction *Compared with soundcore Life Q30 headphones Reduce noise by up to 98%* with adaptive noise cancelling *Tested by soundcore under laboratory conditions Crisp, Hi-Res sound via 40mm dynamic drivers Worry-free battery (40H ANC on, 55H ANC off) 8° rotating ear cups and soft integrated headband for all-day comfort 5 levels of adjustable transparency to tune your world TCO Certified: For Better Sustainability', '2X* stronger voice reduction *Compared with soundcore Life Q30 headphones', 'productImages/1sNKBawik2LK5humKCbJv4XsN84QsPK44LWGHV2R.png', 'new, trending, suit price', 100, 1, '2024-02-22 20:43:45', '2024-03-26 07:40:20'),
(15, 'AirPods Pro', 'tab_s4', 'AirPods Pro (2nd generation) with MagSafe Charging Case (USB-C) deliver up to 2x more Active Noise Cancellation than the previous generation,¹ with Transparency mode that enables you to hear the world around you. All-new Adaptive Audio that dynamically tailors noise control to your environment.¹⁶ Conversation Awareness helps lower media volume and enhance the voices in front of you while you’re interacting with others.¹⁶ A single charge delivers up to 6 hours of battery life.⁷ And Touch control lets you easily adjust volume with a swipe. The MagSafe Charging Case¹⁷ is a marvel on its own with Precision Finding,¹⁵ built-in speaker, and lanyard loop.˄', 'AirPods Pro (2nd generation) with MagSafe Charging Case (USB-C)', 'productImages/5JbvgNDyBRncTdchgBp30jsIYBHke1J3H9DTcp6B.png', 'new, trending, Promotion. Quality', 230, 1, '2024-02-22 20:48:43', '2024-03-26 07:39:06'),
(16, 'iphone 12', 'tab_s5', 'Super Retina XDR display. 6.1‑inch (diagonal) all‑screen OLED display. 2532‑by‑1170-pixel resolution at 460 ppi. HDR display. True Tone. Wide color (P3) Haptic Touch. 2,000,000:1 contrast ratio (typical)', 'Apple iPhone 12 ; OS, iOS 14.1, upgradable to iOS 17.3.1 ; Chipset, Apple A14 Bionic (5 nm) ;', 'productImages/ChPBLhmfdI9CU9OJmlyuvVQsDj74fgM44NUyBwq9.webp', 'new, trending, Promotion. Quality', 620, 1, '2024-02-22 20:55:25', '2024-03-26 07:38:57'),
(17, 'Samsung s23 ultra', 'tab_s6', '256 GB or 512 GB built-in. Rear Camera. 12 MP. Memory. 8 GB or 12 GB. Battery info. 5000 mAh. Dimensions info. 78.1 × 163.4 × 8.9mm. Android™ 13. Rear Cameras. 200 MP Wide. 12 MP Ultra Wide. 10 MP Tele 3X. 10 MP Tele 10X. Front Camera. 12 MP. Wireless & Location info. 5G. 5G Non-Standalone (NSA), Standalone (SA), Sub6 / mmWave. LTE.', 'Samsung Galaxy S23 Ultra ; OS, Android 13, upgradable to Android 14, One UI 6 ; Chipset, Qualcomm SM8550-AC Snapdragon 8 Gen 2 (4 nm) ; CPU, Octa-core (1x3.36 GHz', 'productImages/Y9MR2sN9uvXbN63C5cqiiu44kGK5PqpoC1bdVsC9.png', 'new, trending, Suit_price', 1000, 1, '2024-02-22 20:58:04', '2024-03-26 07:38:30'),
(19, 'Zebronics jet Pro', 'tab_s7', 'Driver Size	40mm Microphone Sensitivity	-38dB±3dB Connector type	3.5mm + USB (for lights) Cable length	2 Meters Package Dimension (W x D x H)	202 x 114 x 225 mm', 'Specifications ; Driver Size, 40mm ; Speaker Impedance, 32Ω ; Frequency Response, 20Hz-20kHz ; Sensitivity, 120dB ± 3dB ; Microphone Impedance, 32Ω.', 'productImages/TSEnK04WnXC1RZXfeJTFWsesroKojSQz4iV8w0Wc.png', 'new, trending, Promotion. Quality', 50, 1, '2024-02-22 21:01:15', '2024-03-26 07:39:55'),
(20, 'iphone 13', 'tab_s8', 'Display Type	OLED display	 Display Technology	Super Retina XDR Display	 Screen Size (Display Size)	6.1\"	Better than 80 % of phones rated. Screen Resolution (Display Resolution)	2532 x 1170 pixels	Better than 93 % of phones rated. Pixel Density	460 ppi	Better than 85 % of phones rated.', 'Apple iPhone 13 ; OS, iOS 15, upgradable to iOS 17.3.1 ; Chipset, Apple A15 Bionic (5 nm) ; CPU, Hexa-core (2x3.23 GHz Avalanche + 4x1.82 GHz Blizzard) ; GPU, Apple', 'productImages/4vDclU1zRQrry22bM3Si0hZDlMZ52f3clU9Ad9e5.png', 'new, trending', 700, 1, '2024-02-22 21:02:51', '2024-03-26 07:37:24'),
(22, 'iphone 11', 'tab_s10', 'Liquid Retina HD display. 6.1‑inch (diagonal) all-screen LCD Multi-Touch display with IPS technology. 1792‑by‑828‑pixel resolution at 326 ppi. 1400:1 contrast ratio (typical) True Tone display. Wide color display (P3) Haptic Touch. 625 nits max brightness (typical)', 'Apple iPhone 11 · 6.1\" 828x1792 pixels · 12MP 2160p · 4GB RAM Apple A13 Bionic · 3110mAh PD2.05W', 'productImages/qtwOs7B6TTY6TWl2dWjAB8icF5ZzQkIZ4TK7bJXx.png', 'Suit_price, Quality, Promotion', 500, 1, '2024-02-22 21:06:19', '2024-03-26 07:37:15'),
(23, 'Samsung Galaxy A13', 'tab_s11', 'Galaxy A13 Dimensions	165.1 x 76.4 x 8.8mm, 195g Display1	6.6-inch TFT V-Cut (1080 x 2408) Camera	Rear	Main: 50MP, F1.8 Ultra Wide: 5MP, F2.2 Macro: 2MP, F2.4 Depth: 2MP, F2.4 Front	8MP, F2.2', 'Samsung Galaxy A13 ; Size, 6.6 inches, 104.9 cm2 (~83.2% screen-to-body ratio) ; Resolution, 1080 x 2408 pixels, 20:9 ratio (~400 ppi density) ; Protection', 'productImages/nPfSvOHePuAcBjwdmmIZARgtUXo6egulcq3YgGNO.png', 'Suit_price, Quality, Promotion', 120, 1, '2024-02-22 21:08:13', '2024-03-26 07:36:40'),
(24, 'Samsung Galaxy A12', 'tab_s12', 'LAUNCH	Announced	2020, November 24 Status	Available. Released 2020, December 21 BODY	Dimensions	164 x 75.8 x 8.9 mm (6.46 x 2.98 x 0.35 in) Weight	205 g (7.23 oz) Build	Glass front, plastic back, plastic frame SIM	Single SIM (Nano-SIM) or Dual SIM (Nano-SIM, dual stand-by) DISPLAY	Type	PLS LCD Size	6.5 inches, 102.0 cm2 (~82.1% screen-to-body ratio) Resolution	720 x 1600 pixels, 20:9 ratio (~270 ppi density) PLATFORM	OS	Android 10, upgradable to Android 12, One UI 4.1 Chipset	Mediatek MT6765 Helio P35 (12nm) CPU	Octa-core (4x2.35 GHz Cortex-A53 & 4x1.8 GHz Cortex-A53) GPU	PowerVR GE8320 MEMORY	Card slot	microSDXC (dedicated slot) Internal	32GB 2GB RAM, 32GB 3GB RAM, 64GB 4GB RAM, 128GB 3GB RAM, 128GB 4GB RAM, 128GB 6GB RAM  	eMMC 5.1', 'Samsung Galaxy A12 ; Size, 6.5 inches, 102.0 cm2 (~82.1% screen-to-body ratio) ; Resolution, 720 x 1600 pixels, 20:9 ratio (~270 ppi density) ; OS, Android 10,', 'productImages/bZR66QZSEvua8RwbFMUXQYaNodNZEBcyqpgOzXST.png', 'new, trending, Promotion. Quality', 90, 1, '2024-02-22 21:11:10', '2024-03-26 07:36:11'),
(26, 'Samsung Galaxy A14', 'tab_s15', 'LAUNCH	Announced	2023, February 28 Status	Available. Released 2023, March 27 BODY	Dimensions	167.7 x 78 x 9.1 mm (6.60 x 3.07 x 0.36 in) Weight	201 g (7.09 oz) Build	Glass front, plastic back, plastic frame SIM	Single SIM (Nano-SIM) or Dual SIM (Nano-SIM, dual stand-by) DISPLAY	Type	PLS LCD Size	6.6 inches, 104.9 cm2 (~80.2% screen-to-body ratio) Resolution	1080 x 2408 pixels, 20:9 ratio (~400 ppi density)', 'Samsung Galaxy A14 ; Size, 6.6 inches, 104.9 cm2 (~80.2% screen-to-body ratio) ; Resolution, 1080 x 2408 pixels, 20:9 ratio (~400 ppi density) ; OS, Android 13,', 'productImages/P5UW2INo1FW1OHGwo28w8dGRB8DcbWZYS8E9Many.png', 'new, trending, Promotion. Quality', 130, 0, '2024-02-22 21:19:00', '2024-03-26 07:35:52'),
(27, 'Samsung Galaxy A16', 'tab_s16', 'Display6.67 inches (16.94 cm) ProcessorOcta core (2.4 GHz, Dual core, Cortex A78 + 2 GHz, Hexa Core, Cortex A55) Rear Camera50 MP + 8 MP + 2 MP Front Camera16 MP Battery5000 mAh Operating SystemAndroid v13 RAM4 GB', 'Samsung Galaxy A16 is a Android v13 phone, speculated price is Rs 16,990 in India with 50 MP + 8 MP + 2 MP Rear Camera, Octa core (2.4 GHz, Dual core, Cortex', 'productImages/LXfpen0XKha1JQKrD4ybt1EZ0uW43w2jhJGyZ9KA.png', 'new, trending', 160, 0, '2024-02-22 21:21:01', '2024-03-26 07:35:22'),
(28, 'Samsung Galaxy S20', 'tab_s17', 'Samsung Galaxy S20 ; Type, Dynamic AMOLED 2X, 120Hz, HDR10+, 1200 nits (peak) ; Size, 6.2 inches, 93.8 cm2 (~89.5% screen-to-body ratio) ; Resolution, 1440 x 3200', 'Samsung Galaxy S20 ; Type, Dynamic AMOLED 2X, 120Hz, HDR10+, 1200 nits (peak) ;', 'productImages/n3xzGNzUwuOaPVCK5Ehn1af7AzCaxnfVB1UdzF2I.png', 'new, trending, Promotion. Quality', 230, 0, '2024-02-22 21:22:49', '2024-03-26 07:34:46'),
(29, 'Samsung Galaxy S21 5G', 'tab_s18', 'Samsung Galaxy S21 5G ; Size, 6.2 inches, 94.1 cm2 (~87.2% screen-to-body ratio) ; Resolution, 1080 x 2400 pixels, 20:9 ratio (~421 ppi density) ; Protection', 'Samsung Galaxy S21 5G ; Size, 6.2 inches, 94.1 cm2 (~87.2% screen-to-body ratio) ;', 'productImages/e0kFOElgXoTxe2D603ie0wJYrawVyz42oDprFYoJ.png', 'Suit_price, Quality, Promotion', 210, 0, '2024-02-22 21:24:36', '2024-03-26 07:34:21'),
(30, 'Samsung Galaxy S22 5G', 'tab_s19', 'Samsung Galaxy S22 5G · Released 2022, February 25 · 167g / 168g (mmWave), 7.6mm thickness · Android 12, up to Android 14, One UI 6 · 128GB/256GB storage, no card', 'Samsung Galaxy S22 5G · Released 2022, February 25 · 167g / 168g (mmWave),', 'productImages/q0uIDRm23Iw6O33FziW8r82jcd5Zio3ejs1AkA7s.png', 'new, trending, Promotion. Quality', 290, 0, '2024-02-22 21:25:40', '2024-03-26 07:33:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'naroth@example.com', 'naroth', '$2y$12$VTQujM4GkEVRODwwnYWcyOc7Wu2ZUQHCaqSCIav97GGafo3lNfwaq', '2024-02-20 01:37:34', '2024-02-20 01:37:34'),
(2, 'loofgodd@example.com', 'loofgodd', '$2y$12$1CuxhnRWUkosMgXyBFivAeECA0.Xu9HGg4G0Yao.ChWqRg9nQ55UK', '2024-03-26 06:11:35', '2024-03-26 06:11:35'),
(3, 'ecommerce@example.com', 'E-commerce', '$2y$12$CuGkcD9koeTDDSjOUwfuQObi0MvwVHkDuODhcw3b8faFMwiAnqZ0C', '2024-03-26 19:18:36', '2024-03-26 19:18:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
