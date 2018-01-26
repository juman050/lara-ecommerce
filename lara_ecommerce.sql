-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2018 at 03:29 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lara_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `admin_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `admin_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `created_at`, `updated_at`) VALUES
(1, 'mr. admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2017-04-30 22:15:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emailAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `phoneNumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `districtName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstName`, `lastName`, `emailAddress`, `password`, `address`, `phoneNumber`, `districtName`, `created_at`, `updated_at`) VALUES
(1, 'Md', 'Ahmed', 'juman@gmail.com', '900150983cd24fb0d6963f7d28e17f72', 'akhalia', '01764287785', 'SY', '2017-05-09 00:14:52', '2017-05-09 00:14:52'),
(2, 'First', 'User', 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@dhaka', '01727374858', 'DH', '2017-05-12 13:53:31', '2017-05-12 13:53:31'),
(3, 'juman', 'ahmed', 'juman@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'sylhet,Bangladesh', '01764287785', 'SY', '2017-05-17 05:09:41', '2017-05-17 05:09:41'),
(4, 'juman', 'Ahmed', 'juman@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'sylhet', '056464644', 'SY', '2017-08-19 10:16:16', '2017-08-19 10:16:16'),
(5, 'Mr.', 'Test', 'test@domain.com', 'e10adc3949ba59abbe56e057f20f883e', 'something', '47774587877', 'SY', '2017-10-13 00:09:33', '2017-10-13 00:09:33'),
(6, 'juman', 'ahmed', 'juman@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'sdd', '0678865', 'KL', '2018-01-03 23:36:19', '2018-01-03 23:36:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_04_02_160045_create_admin_table', 1),
(4, '2017_04_10_160400_create_category_table', 1),
(5, '2017_04_12_170245_create_manufacturer_table', 1),
(6, '2017_04_13_072320_create_products_table', 1),
(7, '2017_04_13_142306_create_customers_table', 1),
(8, '2017_04_13_151623_create_shippings_table', 1),
(9, '2017_04_13_154051_create_orders_table', 1),
(10, '2017_04_13_154103_create_payments_table', 1),
(11, '2017_04_13_154154_create_order_details_table', 1),
(12, '2017_04_26_150330_create_wishlists_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customerId` int(11) NOT NULL,
  `shippingId` int(11) NOT NULL,
  `orderTotal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `orderStatus` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customerId`, `shippingId`, `orderTotal`, `orderStatus`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '560', '1', '2017-05-17 05:10:01', '2017-08-19 10:22:00'),
(2, 3, 2, '448', 'pending', '2017-05-17 05:26:54', '2017-05-17 05:26:54'),
(3, 4, 3, '448', 'pending', '2017-08-19 10:16:33', '2017-08-19 10:16:33'),
(4, 4, 4, '448', 'pending', '2017-08-21 07:24:57', '2017-08-21 07:24:57'),
(5, 4, 5, '224', 'pending', '2017-08-26 12:31:59', '2017-08-26 12:31:59');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `orderId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productPrice` double(10,2) NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `orderId`, `productId`, `productName`, `productPrice`, `productQuantity`, `created_at`, `updated_at`) VALUES
(7, 1, 1, 'Men''s Blue T-shirt', 200.00, 1, NULL, NULL),
(8, 1, 5, 'i-phone brand new', 300.00, 1, NULL, NULL),
(9, 2, 1, 'Men''s Blue T-shirt', 200.00, 2, NULL, NULL),
(10, 3, 1, 'Men''s Blue T-shirt', 200.00, 2, NULL, NULL),
(11, 4, 1, 'Men''s Blue T-shirt', 200.00, 2, NULL, NULL),
(12, 5, 1, 'Men''s Blue T-shirt', 200.00, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `orderId` int(11) NOT NULL,
  `paymentType` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paymentStatus` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `orderId`, `paymentType`, `paymentStatus`, `created_at`, `updated_at`) VALUES
(1, 1, 'cashOnDelivery', 'pending', '2017-05-09 00:20:27', '2017-05-09 00:20:27'),
(2, 2, 'cashOnDelivery', 'pending', '2017-05-12 13:54:03', '2017-05-12 13:54:03'),
(3, 1, 'paypal', 'pending', '2017-05-17 05:10:01', '2017-05-17 05:10:01'),
(4, 2, 'paypal', 'pending', '2017-05-17 05:26:54', '2017-05-17 05:26:54'),
(5, 3, 'paypal', 'pending', '2017-08-19 10:16:33', '2017-08-19 10:16:33'),
(6, 4, 'paypal', 'pending', '2017-08-21 07:24:57', '2017-08-21 07:24:57'),
(7, 5, 'paypal', 'pending', '2017-08-26 12:31:59', '2017-08-26 12:31:59'),
(8, 6, 'paypal', 'pending', '2017-08-26 12:32:37', '2017-08-26 12:32:37'),
(9, 7, 'paypal', 'pending', '2017-08-26 12:38:58', '2017-08-26 12:38:58'),
(10, 8, 'paypal', 'pending', '2017-08-26 12:41:59', '2017-08-26 12:41:59'),
(11, 9, 'paypal', 'pending', '2017-08-26 12:43:43', '2017-08-26 12:43:43'),
(12, 10, 'paypal', 'pending', '2017-08-26 12:45:06', '2017-08-26 12:45:06'),
(13, 11, 'paypal', 'pending', '2017-08-26 12:46:41', '2017-08-26 12:46:41'),
(14, 6, 'paypal', 'pending', '2017-10-13 00:10:34', '2017-10-13 00:10:34');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categoryId` int(11) NOT NULL,
  `manufacturerId` int(11) NOT NULL,
  `productPrice` double(10,2) NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `productShortDescription` text COLLATE utf8_unicode_ci NOT NULL,
  `productLongDescription` text COLLATE utf8_unicode_ci NOT NULL,
  `productImage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publicationStatus` tinyint(4) NOT NULL,
  `isFeatured` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productName`, `categoryId`, `manufacturerId`, `productPrice`, `productQuantity`, `productShortDescription`, `productLongDescription`, `productImage`, `publicationStatus`, `isFeatured`, `created_at`, `updated_at`) VALUES
(1, 'Men''s Blue T-shirt', 4, 1, 200.00, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.</p>', '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.</div>', 'public/productImages/8LDfHlQSPqhbmkkc4051.png', 1, 1, '2017-05-02 07:58:43', '2017-10-13 00:10:34'),
(2, 'Nesta Scarts', 5, 1, 120.00, 3, '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.</div>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.</p>', 'public/productImages/1nHeeeZRG0NpbCNqtXbv.jpg', 1, 0, '2017-05-02 08:02:27', '2017-08-26 12:43:43'),
(3, 'Samsung Galaxy S7', 9, 1, 300.00, 11, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.</p>', 'public/productImages/8yoVQQ7IL27e2cSd8yKl.jpg', 1, 1, '2017-05-02 08:11:12', '2017-08-26 12:38:58'),
(4, 'Sports cloths', 4, 7, 332.00, 11, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.</p>', 'public/productImages/6l1pzziKggiPIXrXIpGg.jpg', 1, 0, '2017-05-02 08:14:47', '2017-05-09 00:20:27'),
(5, 'i-phone brand new', 9, 8, 300.00, 8, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.</p>', 'public/productImages/T2k6ClJrOFVtyrm8aqkH.png', 1, 1, '2017-05-02 08:30:02', '2017-10-13 00:10:34'),
(6, 'Men''s  Watch', 3, 9, 120.00, 33, '<p><span style="font-family: ''Open Sans'', Arial, sans-serif; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla in ultricies dolor. Praesent non risus sed metus euismod faucibus. Aliquam condimentum purus eu orci imperdiet aliquam.</span></p>', '<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: ''Open Sans'', Arial, sans-serif;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla in ultricies dolor. Praesent non risus sed metus euismod faucibus. Aliquam condimentum purus eu orci imperdiet aliquam. Sed id consequat mi, a scelerisque arcu. Suspendisse iaculis lorem mi, et posuere sapien mollis quis. Suspendisse tempus libero et bibendum pellentesque. In consectetur diam et tellus dapibus tristique. Cras vel lorem at dolor tempus luctus quis eget eros. Nulla vehicula at ante quis accumsan.</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: ''Open Sans'', Arial, sans-serif;">Donec et lorem non augue ultrices rhoncus. Suspendisse potenti. Suspendisse rutrum sollicitudin arcu, a venenatis erat finibus id. Aenean eu euismod orci. Nam vehicula vitae turpis nec rutrum. Vestibulum eu dignissim nunc. Vivamus ullamcorper consequat massa sit amet tempus. Duis tristique orci diam, vel laoreet est consequat commodo. Suspendisse facilisis justo in eros bibendum, eget elementum velit porttitor. Curabitur massa risus, ornare eu efficitur in, mattis iaculis urna. Sed leo dolor, accumsan ac lacus in, sagittis imperdiet leo.</p>\r\n<p style="margin: 0px 0px 15px; padding: 0px; text-align: justify; font-family: ''Open Sans'', Arial, sans-serif;">Proin dignissim metus mauris, ac luctus purus ullamcorper sit amet. Etiam convallis efficitur tempor. Curabitur ac metus in ex feugiat faucibus. Donec vel sem justo. Curabitur ullamcorper ex libero, et elementum libero laoreet vitae. Pellentesque quis elementum tellus, non tempor purus. Maecenas luctus interdum turpis, ac fermentum odio varius vitae. Nunc orci nisl, viverra non libero ac, dapibus hendrerit enim. Quisque feugiat vestibulum sem, at tempus massa rutrum rutrum. Maecenas rutrum felis eros, suscipit vulputate nulla varius at.</p>', 'public/productImages/HGOyDqp0FjmmTYrpTjLk.jpg', 1, 1, '2017-05-10 09:29:54', '2017-08-26 12:38:58'),
(7, 'Nokia 3310 returns', 9, 6, 340.00, 22, '<p><span style="font-family: ''Open Sans'', Arial, sans-serif; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla in ultricies dolor. Praesent non risus sed metus euismod faucibus. Aliquam condimentum purus eu orci imperdiet aliquam</span></p>', '<p><span style="font-family: ''Open Sans'', Arial, sans-serif; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla in ultricies dolor. Praesent non risus sed metus euismod faucibus. Aliquam condimentum purus eu orci imperdiet aliquam</span><span style="font-family: ''Open Sans'', Arial, sans-serif; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla in ultricies dolor. Praesent non risus sed metus euismod faucibus. Aliquam condimentum purus eu orci imperdiet aliquam</span></p>\r\n<p><span style="font-family: ''Open Sans'', Arial, sans-serif; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla in ultricies dolor. Praesent non risus sed metus euismod faucibus. Aliquam condimentum purus eu orci imperdiet aliquam</span><span style="font-family: ''Open Sans'', Arial, sans-serif; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla in ultricies dolor. Praesent non risus sed metus euismod faucibus. Aliquam condimentum purus eu orci imperdiet aliquam</span></p>', 'public/productImages/ZcH9ESUB37Wz7Yd9XaUS.jpg', 1, 0, '2017-05-10 09:32:09', '2017-05-10 09:32:09'),
(8, 'MacBook pro', 8, 8, 700.00, 12, '<p><span style="font-family: ''Open Sans'', Arial, sans-serif; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla in ultricies dolor. Praesent non risus sed metus euismod faucibus. Aliquam condimentum purus eu orci imperdiet aliquam</span></p>', '<p><span style="font-family: ''Open Sans'', Arial, sans-serif; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla in ultricies dolor. Praesent non risus sed metus euismod faucibus. Aliquam condimentum purus eu orci imperdiet aliquam</span><span style="font-family: ''Open Sans'', Arial, sans-serif; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla in ultricies dolor. Praesent non risus sed metus euismod faucibus. Aliquam condimentum purus eu orci imperdiet aliquam</span></p>\r\n<p><span style="font-family: ''Open Sans'', Arial, sans-serif; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla in ultricies dolor. Praesent non risus sed metus euismod faucibus. Aliquam condimentum purus eu orci imperdiet aliquam</span><span style="font-family: ''Open Sans'', Arial, sans-serif; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla in ultricies dolor. Praesent non risus sed metus euismod faucibus. Aliquam condimentum purus eu orci imperdiet aliquam</span></p>', 'public/productImages/1S2vE36LVZHmpv9GZDrc.png', 1, 1, '2017-05-10 09:34:35', '2017-05-14 08:34:09'),
(9, 'White Earphone', 1, 1, 120.00, 13, '<p><span style="font-family: ''Open Sans'', Arial, sans-serif; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla in ultricies dolor. Praesent non risus sed metus euismod faucibus. Aliquam condimentum purus eu orci imperdiet aliquam.</span></p>', '<p><span style="font-family: ''Open Sans'', Arial, sans-serif; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla in ultricies dolor. Praesent non risus sed metus euismod faucibus. Aliquam condimentum purus eu orci imperdiet aliquam</span><span style="font-family: ''Open Sans'', Arial, sans-serif; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla in ultricies dolor. Praesent non risus sed metus euismod faucibus. Aliquam condimentum purus eu orci imperdiet aliquam.</span></p>\r\n<p><span style="font-family: ''Open Sans'', Arial, sans-serif; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla in ultricies dolor. Praesent non risus sed metus euismod faucibus. Aliquam condimentum purus eu orci imperdiet aliquam</span><span style="font-family: ''Open Sans'', Arial, sans-serif; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla in ultricies dolor. Praesent non risus sed metus euismod faucibus. Aliquam condimentum purus eu orci imperdiet aliquam</span><span style="font-family: ''Open Sans'', Arial, sans-serif; text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla in ultricies dolor. Praesent non risus sed metus euismod faucibus. Aliquam condimentum purus eu orci imperdiet aliquam.</span></p>', 'public/productImages/95zSBZZxQflD3aTe3IYc.jpg', 1, 1, '2017-05-10 09:39:15', '2017-05-10 09:39:15');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `emailAddress` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `phoneNumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `districtName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `fullName`, `emailAddress`, `address`, `phoneNumber`, `districtName`, `created_at`, `updated_at`) VALUES
(1, 'juman ahmed', 'juman@gmail.com', 'sylhet,Bangladesh', '01764287785', 'SY', '2017-05-17 05:09:46', '2017-05-17 05:09:46'),
(2, 'juman ahmed', 'juman@gmail.com', 'sylhet,Bangladesh', '01764287785', 'SY', '2017-05-17 05:26:09', '2017-05-17 05:26:09'),
(3, 'juman Ahmed', 'juman@gmail.com', 'sylhet', '056464644', 'SY', '2017-08-19 10:16:27', '2017-08-19 10:16:27'),
(4, 'juman Ahmed', 'juman@gmail.com', 'sylhet', '056464644', 'SY', '2017-08-21 07:24:45', '2017-08-21 07:24:45'),
(5, 'mr', 'mr@gmail.com', 'sylhet', '05646464443', 'SY', '2017-08-26 12:31:56', '2017-08-26 12:31:56'),
(6, 'john', 'john@gmail.com', 'Dhaka', '056464644', 'DH', '2017-08-26 12:38:39', '2017-08-26 12:38:39'),
(7, 'juman Ahmed', 'juman@gmail.com', 'sylhet', '056464644', 'SY', '2017-08-26 12:41:57', '2017-08-26 12:41:57'),
(8, 'la la land', 'lalal@gmail.com', 'sylhet', '056464644', 'SY', '2017-08-26 12:43:37', '2017-08-26 12:43:37'),
(9, 'juman Ahmed', 'juman@gmail.com', 'sylhet', '056464644', 'SY', '2017-08-26 12:45:03', '2017-08-26 12:45:03'),
(10, 'new user', 'user@gmail.com', 'sylhet', '056464644', 'SY', '2017-08-26 12:46:38', '2017-08-26 12:46:38'),
(11, 'Mr. Test', 'test@domain.com', 'something', '47774587877', 'SY', '2017-10-13 00:10:06', '2017-10-13 00:10:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `categoryName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `categoryDescription` text COLLATE utf8_unicode_ci NOT NULL,
  `publicationStatus` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `parent`, `categoryName`, `categoryDescription`, `publicationStatus`, `created_at`, `updated_at`) VALUES
(1, 0, 'Electronics', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.</p>\r\n', 1, '2017-05-02 07:42:04', '2017-05-10 09:25:28'),
(2, 0, 'Sports', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.\r\n', 0, '2017-05-02 07:43:06', '2017-05-10 09:25:54'),
(3, 0, 'Watch', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.</p>\r\n', 1, '2017-05-02 07:52:30', '2017-05-02 07:52:30'),
(4, 0, 'Cloths', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.</p>', 1, '2017-05-02 07:52:53', '2017-05-10 10:02:12'),
(5, 0, 'Dress', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.</p>\r\n', 1, '2017-05-02 07:53:07', '2017-05-02 07:53:07'),
(6, 0, 'Glasses', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.</p>\r\n', 1, '2017-05-02 07:53:50', '2017-05-02 07:53:50'),
(7, 0, 'Shirts', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.</p>\r\n', 1, '2017-05-02 07:54:20', '2017-05-02 07:54:20'),
(8, 1, 'Laptop', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable.<span class="Apple-converted-space"><br /></span></p>', 1, '2017-05-02 07:54:49', '2017-05-10 09:17:21'),
(9, 1, 'Mobile', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.</p>\r\n', 1, '2017-05-02 07:55:03', '2017-05-02 07:55:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manufacturer`
--

CREATE TABLE `tbl_manufacturer` (
  `id` int(10) UNSIGNED NOT NULL,
  `manufacturerName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `manufacturerDescription` text COLLATE utf8_unicode_ci NOT NULL,
  `manufacturerImage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `publicationStatus` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_manufacturer`
--

INSERT INTO `tbl_manufacturer` (`id`, `manufacturerName`, `manufacturerDescription`, `manufacturerImage`, `publicationStatus`, `created_at`, `updated_at`) VALUES
(1, 'Samsung', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.</p>\r\n', 'public/manufacturerImages/GN0kBTAOHUbCQu9jSFNZ.png', 1, '2017-05-02 07:45:49', '2017-05-02 07:45:49'),
(2, 'Oppo', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.</p>\r\n', 'public/manufacturerImages/H0KGsFnJLuZYe9qVjQnl.jpg', 0, '2017-05-02 07:46:31', '2017-05-02 07:46:31'),
(3, 'Sony', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.</p>\r\n', 'public/manufacturerImages/ZrgKQFwYOtYEUgTkQ9Yc.png', 0, '2017-05-02 07:47:09', '2017-05-02 07:47:09'),
(4, 'Acer', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.</p>\r\n', 'public/manufacturerImages/puBkzupmA0yMJhrpRroW.png', 1, '2017-05-02 07:47:32', '2017-05-02 07:47:32'),
(5, 'Apple', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.</p>\r\n', 'public/manufacturerImages/qSW1vULxlHFW0BXtyU30.jpg', 0, '2017-05-02 07:47:54', '2017-05-02 07:47:54'),
(6, 'Nokia', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.</p>\r\n', 'public/manufacturerImages/tjJOhOLwlAiBYKtw41DN.jpg', 1, '2017-05-02 07:48:10', '2017-05-02 07:48:10'),
(7, 'Arong', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.</p>\r\n', 'public/manufacturerImages/b293KBKb49MBzxtoZI8c.jpg', 1, '2017-05-02 07:50:10', '2017-05-02 07:50:10'),
(8, 'Apple', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.', 'public/manufacturerImages/nY0iPrRw3pIAWa3cgfVP.jpg', 1, '2017-05-02 08:16:19', '2017-05-02 08:16:19'),
(9, 'Nike', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.', 'public/manufacturerImages/ByvTKvlED9m4rsrTEyqm.png', 0, '2017-05-02 08:17:42', '2017-05-14 08:30:39'),
(10, 'Hp', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.', 'public/manufacturerImages/TF2vpWPR7Ozk3aIawpbl.jpg', 1, '2017-05-02 08:18:38', '2017-05-02 08:18:38'),
(11, 'ASUS', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sem dolor, rhoncus ullamcorper aliquam sit amet, vestibulum et urna. Vestibulum elementum interdum ex.', 'public/manufacturerImages/fGRp1nRCn7bfwOzHYZP5.png', 1, '2017-05-02 08:19:06', '2017-05-02 08:19:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(10) UNSIGNED NOT NULL,
  `customerId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `customerId`, `productId`, `created_at`, `updated_at`) VALUES
(29, 3, 1, '2017-05-17 05:56:01', '2017-05-17 05:56:01'),
(30, 3, 2, '2017-05-17 05:56:03', '2017-05-17 05:56:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
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
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_manufacturer`
--
ALTER TABLE `tbl_manufacturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_manufacturer`
--
ALTER TABLE `tbl_manufacturer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
