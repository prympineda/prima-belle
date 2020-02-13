-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 13, 2020 at 02:43 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `primabelle`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '05212c49-8d1a-4644-a0b0-862b5526a72d',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `for_admin` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `uid`, `user_id`, `action`, `status`, `for_admin`, `created_at`, `updated_at`) VALUES
(1, '02cc8f16-2a4f-478c-aea1-d8016b666ac4', 1, 'Place Order for Mules 1 (3). Customer Name:Lebron', 1, 0, '2020-02-12 14:11:18', '2020-02-12 14:11:18'),
(2, '001e2217-112b-47ad-afa0-b478bdfd0f90', 1, 'Place Order for Mules 1 (2). Customer Name:KD', 1, 0, '2020-02-12 14:13:16', '2020-02-12 14:13:16'),
(3, '2c87f706-595c-45c0-9dca-18c9e13fbb6c', 1, 'Place Order for Mules 1 (2). Customer Name:Jim', 1, 0, '2020-02-12 14:13:59', '2020-02-12 14:13:59'),
(4, '80092574-1d8d-45bd-9558-9220936b4609', 1, 'Sold  To Lebron', 1, 0, '2020-02-12 15:10:52', '2020-02-12 15:10:52'),
(5, '54d77086-83ab-4605-adae-4da0b5fde702', 1, 'Sold Mules 1 To Jim', 1, 0, '2020-02-12 15:12:47', '2020-02-12 15:12:47'),
(6, '34f6c3a3-cf4a-4c01-b69c-db41a2d8cdbb', 1, 'Place Order for Mules 1 (M-1) - Size: 7- Customer Name:Thompson', 1, 0, '2020-02-12 15:49:38', '2020-02-12 15:49:38'),
(7, '115217ae-007b-4b15-ae1d-6abb873d4990', 1, 'Cancel Order - \"Mules 1 (M-1)\" - Customer Name: Thompson', 1, 0, '2020-02-12 16:22:51', '2020-02-12 16:22:51'),
(8, 'f4df3560-9d29-48cd-843a-ca93b7d5b38d', 1, 'Update Order Quantity for \"Mules 1 (M-1)\" From 4 To 4', 1, 0, '2020-02-12 19:27:03', '2020-02-12 19:27:03'),
(9, '03e696f4-377b-499e-a959-d29143e5e23b', 1, 'Update Order Quantity for \"Mules 1 (M-1)\" From 4 To 3', 1, 0, '2020-02-12 19:28:05', '2020-02-12 19:28:05'),
(10, 'bdd6f4a8-962e-4c83-a225-c4907bd19e1e', 1, 'Place Order for \"doll shoes 4 (ds 4)\" - Size: 8Quantity: 3 - Customer Name:Kobe', 1, 0, '2020-02-12 19:33:30', '2020-02-12 19:33:30'),
(11, '71d00a75-5fb7-4ad0-9d38-2ccc96845951', 1, 'Cancel Order - \"Doll Shoes 4(ds 4)\" - Customer Name: Kobe', 1, 0, '2020-02-12 23:27:34', '2020-02-12 23:27:34'),
(12, '2b8f5c37-e990-46cc-a365-a5d6ec26ad06', 1, 'Place Order for \"Doll Shoes 1(ds 1)\" - Size: 7 - Quantity: 2 - Customer Name: Poy', 1, 0, '2020-02-12 23:28:19', '2020-02-12 23:28:19'),
(13, '4abfec7f-83a8-44bd-99cd-ddfaf7b60929', 1, 'Cancel Order - \"Doll Shoes 1(ds 1)\" - Customer Name: Poy', 1, 0, '2020-02-12 23:29:18', '2020-02-12 23:29:18'),
(14, '5e5eea22-d433-45f2-bea5-d553928f240e', 1, 'Update Product Stock for \"Doll Shoes 2(DS 2)\" From 6 To 3', 1, 0, '2020-02-13 01:13:20', '2020-02-13 01:13:20');

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
(3, '2020_02_11_035714_create_roles_table', 1),
(4, '2020_02_11_040611_user_role', 1),
(5, '2020_02_11_092703_create_products_table', 1),
(6, '2020_02_11_093030_create_shoe_categories_table', 1),
(7, '2020_02_11_115606_create_orders_table', 1),
(8, '2020_02_11_115647_create_activity_logs_table', 1),
(9, '2020_02_11_115724_create_notifications_table', 1),
(10, '2020_02_11_115748_create_notification_statuses_table', 1),
(11, '2020_02_11_144024_add_shoe_categories_id_on_products_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2246605a-14ae-408a-9628-1bc9d5cd0d95',
  `status` int(11) NOT NULL DEFAULT '1',
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `uid`, `status`, `message`, `title`, `created_at`, `updated_at`) VALUES
(1, '8c12c209-daf7-46be-97a0-837fdf5a1060', 1, 'Place Order for Mules 1 (3). Customer Name:Lebron', 'Place Order', '2020-02-12 14:11:18', '2020-02-12 14:11:18'),
(2, 'b335a5d3-8215-4dac-b940-d6562ca5afd8', 1, 'Place Order for Mules 1 (2). Customer Name:KD', 'Place Order', '2020-02-12 14:13:16', '2020-02-12 14:13:16'),
(3, '6c752ca4-e1b7-4d70-ba31-9159454e36e3', 1, 'Place Order for Mules 1 (2). Customer Name:Jim', 'Place Order', '2020-02-12 14:13:59', '2020-02-12 14:13:59'),
(4, 'c6b30294-719e-4de8-af1d-aa37d9be24b9', 1, 'Sold  To Lebron', 'Place Order', '2020-02-12 15:10:52', '2020-02-12 15:10:52'),
(5, '5c37393c-35c2-43ce-a039-1cdbde984e86', 1, 'Sold Mules 1 To Jim', 'Place Order', '2020-02-12 15:12:47', '2020-02-12 15:12:47'),
(6, '541e5095-0dc1-4726-9b03-1dc9aa13f7d1', 1, 'Place Order for Mules 1 (M-1) - Size: 7- Customer Name:Thompson', 'Place Order', '2020-02-12 15:49:38', '2020-02-12 15:49:38'),
(7, '27147055-6638-4a48-902d-0c352176e921', 1, 'Mules 1 (M-1)\" - Customer Name: Thompson', 'Cancel Order', '2020-02-12 16:22:51', '2020-02-12 16:22:51'),
(8, '8be7713d-90b0-472f-81f9-a273cda00377', 1, 'Update Order Quantity for \"Mules 1 (M-1)\" From 4 To 4', 'Update Order Quantity', '2020-02-12 19:27:03', '2020-02-12 19:27:03'),
(9, '9023424d-ca16-4d1e-aad8-8d2c43525340', 1, 'Update Order Quantity for \"Mules 1 (M-1)\" From 4 To 3', 'Update Order Quantity', '2020-02-12 19:28:05', '2020-02-12 19:28:05'),
(10, '6c95a90d-243d-48d8-ab07-393f39c9e4f8', 1, 'Place Order for \"doll shoes 4 (ds 4)\" - Size: 8Quantity: 3 - Customer Name:Kobe', 'Place Order', '2020-02-12 19:33:30', '2020-02-12 19:33:30'),
(11, '3bd4fc0e-a963-4473-a313-573600c139d6', 1, '\"Doll Shoes 4(ds 4)\" - Customer Name: Kobe', 'Cancel Order', '2020-02-12 23:27:34', '2020-02-12 23:27:34'),
(12, '2ed86813-40fb-4463-b272-70a2da14695d', 1, 'Place Order for \"Doll Shoes 1(ds 1)\" - Size: 7 - Quantity: 2 - Customer Name: Poy', 'Place Order', '2020-02-12 23:28:20', '2020-02-12 23:28:20'),
(13, '8bdf8f35-f0d4-4c2b-b353-9feee49a79e6', 1, '\"Doll Shoes 1(ds 1)\" - Customer Name: Poy', 'Cancel Order', '2020-02-12 23:29:18', '2020-02-12 23:29:18'),
(14, '082065b0-dd9f-4776-9db6-37de850dd27c', 1, 'Update Order Stock for \"Doll Shoes 2(DS 2)\" From 6 To 3', 'Update Product Stock', '2020-02-13 01:13:21', '2020-02-13 01:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `notification_statuses`
--

CREATE TABLE `notification_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'c3a859c5-1b14-4942-9612-c7bb19f5c87d',
  `notif_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `is_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_statuses`
--

INSERT INTO `notification_statuses` (`id`, `uid`, `notif_id`, `user_id`, `status`, `is_status`, `created_at`, `updated_at`) VALUES
(1, '09f22573-bd60-46de-9a85-777d2508ba8f', 3, 1, 1, 0, '2020-02-12 14:13:59', '2020-02-12 14:13:59'),
(2, 'e3fb1b08-6b9d-49a5-b5e6-8faaacad16b3', 3, 2, 1, 0, '2020-02-12 14:13:59', '2020-02-12 14:13:59'),
(3, '5cc16a95-5d2f-4a9b-a921-79cb4b30e711', 4, 1, 1, 0, '2020-02-12 15:10:52', '2020-02-12 15:10:52'),
(4, '71bde8f6-1467-4e33-b294-d42891c6f960', 4, 2, 1, 0, '2020-02-12 15:10:52', '2020-02-12 15:10:52'),
(5, 'a9093dbf-24b5-439d-912d-fa1e5f040d31', 5, 1, 1, 0, '2020-02-12 15:12:47', '2020-02-12 15:12:47'),
(6, '986649c7-4507-4aa0-838f-7ec6bd1b9be6', 5, 2, 1, 0, '2020-02-12 15:12:47', '2020-02-12 15:12:47'),
(7, '3e388ac0-f2d1-40e2-9289-8cbb6d6d47f2', 6, 1, 1, 0, '2020-02-12 15:49:38', '2020-02-12 15:49:38'),
(8, '69231815-2b15-4391-9386-804b7032cea2', 6, 2, 1, 0, '2020-02-12 15:49:38', '2020-02-12 15:49:38'),
(9, '210ae3af-5ac4-4709-9016-ff3a4ec96614', 7, 1, 1, 0, '2020-02-12 16:22:51', '2020-02-12 16:22:51'),
(10, 'f7e2be31-9a14-4152-ad2f-cf2cf8845086', 7, 2, 1, 0, '2020-02-12 16:22:51', '2020-02-12 16:22:51'),
(11, '52a7dcde-70b1-4cbc-a117-534e2c348808', 8, 1, 1, 0, '2020-02-12 19:27:03', '2020-02-12 19:27:03'),
(12, '8cbf9468-6896-4c17-b8d9-1a2887495cfe', 8, 2, 1, 0, '2020-02-12 19:27:03', '2020-02-12 19:27:03'),
(13, '3d2da131-b165-41b2-b3d7-9a88e9ff398b', 9, 1, 1, 0, '2020-02-12 19:28:05', '2020-02-12 19:28:05'),
(14, '02ea1b88-184e-4d47-a57d-1e576803900c', 9, 2, 1, 0, '2020-02-12 19:28:05', '2020-02-12 19:28:05'),
(15, '513d8808-0093-46ca-8b86-e41a1ee4e1c5', 10, 1, 1, 0, '2020-02-12 19:33:30', '2020-02-12 19:33:30'),
(16, '211cff26-9707-4e67-8995-cc3bd8345c87', 10, 2, 1, 0, '2020-02-12 19:33:30', '2020-02-12 19:33:30'),
(17, '324c6211-1798-43e4-9b49-2defc4b839ac', 11, 1, 1, 0, '2020-02-12 23:27:34', '2020-02-12 23:27:34'),
(18, 'a6c2dca1-243f-4073-85d4-e943d1120530', 11, 2, 1, 0, '2020-02-12 23:27:34', '2020-02-12 23:27:34'),
(19, 'b91163c0-932c-4394-8eb0-a50bd8d5cf75', 12, 1, 1, 0, '2020-02-12 23:28:20', '2020-02-12 23:28:20'),
(20, '07a808f6-40e7-4de1-bb3e-1e39cf0df09d', 12, 2, 1, 0, '2020-02-12 23:28:20', '2020-02-12 23:28:20'),
(21, '797ff92e-cc75-415f-bd1d-fc9b9eb6d600', 13, 1, 1, 0, '2020-02-12 23:29:19', '2020-02-12 23:29:19'),
(22, '9a1fddb9-245a-4fdf-a9f3-745cad5b54e8', 13, 2, 1, 0, '2020-02-12 23:29:19', '2020-02-12 23:29:19'),
(23, '1273afb5-0758-49db-88cb-7f134cb8cc13', 14, 1, 1, 0, '2020-02-13 01:13:21', '2020-02-13 01:13:21'),
(24, '385129f6-8285-44d7-bca8-b39076b14c89', 14, 2, 1, 0, '2020-02-13 01:13:21', '2020-02-13 01:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '9f4d348d-a151-4ca9-b497-543e03a1d670',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `is_active` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `uid`, `user_id`, `product_id`, `quantity`, `customer_name`, `address`, `contact_details`, `note`, `status`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '6b47361e-e1fe-4db7-8217-1570bdb9192e', 1, 29, 3, 'Lebron', NULL, NULL, NULL, 2, 1, '2020-02-12 14:11:18', '2020-02-12 15:10:52'),
(2, 'e8f90de5-7747-46e0-ae3c-968fa9a62aec', 2, 29, 3, 'KD', NULL, NULL, NULL, 1, 1, '2020-02-12 14:13:16', '2020-02-12 19:28:05'),
(3, '292107ee-8a71-41a0-a37b-619691f75758', 1, 29, 2, 'Jim', NULL, NULL, NULL, 2, 1, '2020-02-12 14:13:59', '2020-02-12 15:12:47'),
(4, '00193f9a-a4fa-457c-963b-8deef134c3fb', 1, 29, 1, 'Thompson', NULL, NULL, NULL, 3, 1, '2020-02-12 15:49:38', '2020-02-12 16:22:51'),
(5, '2f56f8b6-7e3b-411b-8af1-79c94f312919', 1, 27, 3, 'Kobe', NULL, NULL, NULL, 3, 1, '2020-02-12 19:33:30', '2020-02-12 23:27:32'),
(6, 'ff16d94c-96b5-4d3b-81af-ac3e6db9e664', 1, 24, 2, 'poy', NULL, NULL, NULL, 3, 1, '2020-02-12 23:28:19', '2020-02-12 23:29:18');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '62e27951-6610-4269-86c3-4bad4f56818c',
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` int(10) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `old_price` int(11) DEFAULT NULL,
  `stock` int(10) UNSIGNED NOT NULL,
  `is_sale` int(11) DEFAULT NULL,
  `ribbon_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sc_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `uid`, `code`, `name`, `is_active`, `description`, `size`, `price`, `old_price`, `stock`, `is_sale`, `ribbon_tag`, `photo_name`, `created_at`, `updated_at`, `sc_id`) VALUES
(24, '01062048-92c7-480d-8730-e94df990175e', 'DS 1', 'doll shoes 1', 1, 'doll shoes 1', 7, 350, NULL, 4, NULL, 'NEW', '158151585185100969_1476899819131362_7811180734026088448_o.jpg', '2020-02-12 05:57:31', '2020-02-13 01:04:16', 3),
(25, 'd45793cc-71f1-4344-81ce-14be5aa9eb53', 'DS 2', 'doll shoes 2', 1, 'doll shoes 2', 8, 370, 420, 3, NULL, NULL, '158151800782112640_1458995130921831_5653141667025256448_o.jpg', '2020-02-12 06:33:27', '2020-02-13 01:13:19', 3),
(26, 'f4f72400-c587-4c34-8176-479a65fcb77d', 'ds 3', 'doll shoes 3', 1, 'doll shoes 3', 7, 320, NULL, 0, NULL, 'Sale', '1581518196doll_shoes_4.jpg', '2020-02-12 06:36:36', '2020-02-12 06:36:36', 3),
(27, '5535d6b4-1a32-4810-bfd6-7aea5489a5c6', 'ds 4', 'doll shoes 4', 1, 'doll shoes 4', 8, 340, NULL, 5, NULL, NULL, '1581518298doll_shoes_3.jpg', '2020-02-12 06:38:18', '2020-02-12 23:27:32', 3),
(28, '860b16c7-30da-43f2-9d88-af19237ded7d', 'ds 5', 'doll shoes 5', 1, 'doll shoes 5', 8, 350, NULL, 2, NULL, NULL, '158151899984348840_1476899505798060_5746676558559444992_o.jpg', '2020-02-12 06:49:59', '2020-02-12 06:49:59', 3),
(29, '6ab7e283-392c-498c-ab04-f55566392bdf', 'M-1', 'Mules 1', 1, 'Mules 1', 7, 350, NULL, 1, NULL, NULL, '1581546138mules_1.jpg', '2020-02-12 11:22:18', '2020-02-12 19:28:05', 4);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '3f958f6a-170d-4625-a204-d081887a5c86',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `uid`, `name`, `created_at`, `updated_at`) VALUES
(1, 'e0f96ff2-ff84-469b-b603-55e627be954b', 'administrator', NULL, NULL),
(2, '0ab1fa6e-3a5b-49b5-a4f7-f384f87c65e6', 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shoe_categories`
--

CREATE TABLE `shoe_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '70a12540-4cd2-4326-b876-14ccf79ce025',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shoe_categories`
--

INSERT INTO `shoe_categories` (`id`, `uid`, `name`, `is_active`, `note`, `created_at`, `updated_at`) VALUES
(1, '93f9e34c-cb8d-4043-b4c6-b7f70f382002', '2 Inches Heels', 1, NULL, NULL, NULL),
(2, 'ba622264-097a-4970-a625-5934f9d3e535', 'Half Inch Heels', 1, NULL, NULL, NULL),
(3, 'e85cac6c-e2e2-43aa-8fcb-d163ddcc66f9', 'Doll Shoes', 1, NULL, NULL, NULL),
(4, '7ec99fcb-6058-4c60-a87d-f83717ddd87d', 'Mules', 1, NULL, NULL, NULL),
(5, '4eebcbac-e065-4ffc-bfbb-6eb01eaa3b4c', 'Birks', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'f6e23fa6-a6df-4417-8300-d0d4defc5e01',
  `is_active` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uid`, `is_active`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'abd652b6-fa7f-439d-9f9a-2eb78575c959', 1, 'Prym', 'prym@prima-belle.com', NULL, '$2y$10$eoFfcqqK6/fK004epN5syOOQoW6Pvs1ch1QNddABOUTxHjGw5WjOy', NULL, NULL, NULL, 1),
(2, '6a330ce7-9fd9-4283-92f9-e7caf9faf014', 1, 'Khaliza', 'khaliza@prima-belle.com', NULL, '$2y$10$PqD4CufXH.n4BXf8k8P.3eWLriTLn8udMbngfmj5cCwangTA.0AqC', NULL, NULL, NULL, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_statuses`
--
ALTER TABLE `notification_statuses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_statuses_notif_id_foreign` (`notif_id`),
  ADD KEY `notification_statuses_user_id_foreign` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_code_unique` (`code`),
  ADD KEY `products_sc_id_foreign` (`sc_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shoe_categories`
--
ALTER TABLE `shoe_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `notification_statuses`
--
ALTER TABLE `notification_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shoe_categories`
--
ALTER TABLE `shoe_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notification_statuses`
--
ALTER TABLE `notification_statuses`
  ADD CONSTRAINT `notification_statuses_notif_id_foreign` FOREIGN KEY (`notif_id`) REFERENCES `notifications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notification_statuses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_sc_id_foreign` FOREIGN KEY (`sc_id`) REFERENCES `shoe_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
