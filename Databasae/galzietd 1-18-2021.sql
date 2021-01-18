-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2021 at 05:24 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galzietd`
--

-- --------------------------------------------------------

--
-- Table structure for table `addons`
--

CREATE TABLE `addons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `add_on_type` enum('color','glass','frame','frame_color','frame_glass','handle','hingle_side') COLLATE utf8mb4_unicode_ci NOT NULL,
  `addon_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` double(9,2) NOT NULL,
  `quantity` double(9,2) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_price` double(9,2) NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `postcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_type` enum('billing','shipping') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `customer_id`, `country_id`, `state_id`, `city_id`, `postcode`, `address`, `address_type`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 44, 79, 20, 18, 'Nina', 'Herrod', 'billing', '1', 44, NULL, '2021-01-14 23:38:55', '2021-01-14 23:38:55'),
(2, 44, 5, 20, 17, 'Roanna', 'Chastity', 'shipping', '1', 44, NULL, '2021-01-14 23:38:55', '2021-01-14 23:38:55');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `last_name`, `profile`, `address`, `contact_no`) VALUES
(1, 'saif', 'saifrehman', 'saifrehman@gmail.com', NULL, '$2y$10$fSB.0cOKSw.kyuc/QBicreQmHTevHpDnMECfS3gwl.xTyBK3j4tIi', NULL, '2021-01-14 00:56:26', '2021-01-14 00:57:10', 'rehman', '5fffdd36c61deamdin.jpg', 'address', 'address');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `crated_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `attribute_name`, `description`, `image`, `status`, `crated_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'shape', 'This is description', 'This is imaged', '1', 1, NULL, NULL, NULL),
(2, 'color', 'This is description', 'This is imaged', '1', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `description`, `status`, `image`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'asdf', NULL, '1', NULL, 1, NULL, '2021-01-14 23:24:47', '2021-01-14 23:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` double(9,2) NOT NULL,
  `price` double(9,2) NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `session_id`, `product_id`, `quantity`, `price`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'XqQmXdPJaQy1ma1uYIgQSDhiJmb2OCd9n67NghLx', 5, 1.00, 142.00, '1', NULL, NULL, '2021-01-14 23:37:23', '2021-01-14 23:37:56'),
(2, 'XqQmXdPJaQy1ma1uYIgQSDhiJmb2OCd9n67NghLx', 3, 1.00, 161.00, '1', NULL, NULL, '2021-01-14 23:37:31', '2021-01-14 23:37:53'),
(3, 'XqQmXdPJaQy1ma1uYIgQSDhiJmb2OCd9n67NghLx', 2, 1.00, 246.00, '1', NULL, NULL, '2021-01-14 23:37:40', '2021-01-14 23:37:50');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `updated_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `description`, `parent_id`, `status`, `image`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Door', NULL, NULL, '1', NULL, 1, NULL, '2021-01-14 23:33:24', '2021-01-14 23:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `state_id`, `created_at`, `updated_at`) VALUES
(1, 'Tanya', 1, '2021-01-14 02:57:12', '2021-01-14 02:57:12'),
(2, 'Shaine', 2, '2021-01-14 03:02:06', '2021-01-14 03:02:06'),
(3, 'Shaine', 3, '2021-01-14 03:06:58', '2021-01-14 03:06:58'),
(4, 'Shaine', 4, '2021-01-14 03:07:38', '2021-01-14 03:07:38'),
(5, 'Colleen', 5, '2021-01-14 03:08:29', '2021-01-14 03:08:29'),
(6, 'Lacota', 9, '2021-01-14 04:12:13', '2021-01-14 04:12:13'),
(7, 'Nita', 11, '2021-01-14 04:22:48', '2021-01-14 04:22:48'),
(8, 'Damian', 12, '2021-01-14 04:25:43', '2021-01-14 04:25:43'),
(9, 'Dominique', 13, '2021-01-14 04:28:48', '2021-01-14 04:28:48'),
(10, 'Virginia', 14, '2021-01-14 04:29:57', '2021-01-14 04:29:57'),
(11, 'Dana', 15, '2021-01-14 04:32:10', '2021-01-14 04:32:10'),
(12, 'Donovan', 16, '2021-01-14 04:37:17', '2021-01-14 04:37:17'),
(13, 'Mark', 17, '2021-01-14 04:39:46', '2021-01-14 04:39:46'),
(14, 'Regina', 18, '2021-01-14 04:50:33', '2021-01-14 04:50:33'),
(15, 'Nevada', 19, '2021-01-14 06:37:05', '2021-01-14 06:37:05'),
(16, 'Abra', 19, '2021-01-14 06:43:46', '2021-01-14 06:43:46'),
(17, 'Morgan', 20, '2021-01-14 23:38:55', '2021-01-14 23:38:55'),
(18, 'Oliver', 20, '2021-01-14 23:38:55', '2021-01-14 23:38:55'),
(19, 'Ora', 21, '2021-01-15 00:06:22', '2021-01-15 00:06:22'),
(20, 'Rahim yar khan', 22, '2021-01-15 00:20:02', '2021-01-15 00:20:02'),
(21, 'Velit repellendus I', 22, '2021-01-15 05:57:07', '2021-01-15 05:57:07'),
(22, 'Hayley', 22, '2021-01-15 05:59:53', '2021-01-15 05:59:53'),
(23, 'punjab', 22, '2021-01-15 06:01:27', '2021-01-15 06:01:27'),
(24, 'asdfasdf', 22, '2021-01-15 06:05:48', '2021-01-15 06:05:48'),
(25, 'Rahim yar khan', 23, '2021-01-15 06:54:21', '2021-01-15 06:54:21');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonecode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`, `phonecode`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'Afghanistan', '93', NULL, NULL),
(2, 'AL', 'Albania', '355', NULL, NULL),
(3, 'DZ', 'Algeria', '213', NULL, NULL),
(4, 'AS', 'American Samoa', '1684', NULL, NULL),
(5, 'AD', 'Andorra', '376', NULL, NULL),
(6, 'AO', 'Angola', '244', NULL, NULL),
(7, 'AI', 'Anguilla', '1264', NULL, NULL),
(8, 'AQ', 'Antarctica', '0', NULL, NULL),
(9, 'AG', 'Antigua And Barbuda', '1268', NULL, NULL),
(10, 'AR', 'Argentina', '54', NULL, NULL),
(11, 'AM', 'Armenia', '374', NULL, NULL),
(12, 'AW', 'Aruba', '297', NULL, NULL),
(13, 'AU', 'Australia', '61', NULL, NULL),
(14, 'AT', 'Austria', '43', NULL, NULL),
(15, 'AZ', 'Azerbaijan', '994', NULL, NULL),
(16, 'BS', 'Bahamas The', '1242', NULL, NULL),
(17, 'BH', 'Bahrain', '973', NULL, NULL),
(18, 'BD', 'Bangladesh', '880', NULL, NULL),
(19, 'BB', 'Barbados', '1246', NULL, NULL),
(20, 'BY', 'Belarus', '375', NULL, NULL),
(21, 'BE', 'Belgium', '32', NULL, NULL),
(22, 'BZ', 'Belize', '501', NULL, NULL),
(23, 'BJ', 'Benin', '229', NULL, NULL),
(24, 'BM', 'Bermuda', '1441', NULL, NULL),
(25, 'BT', 'Bhutan', '975', NULL, NULL),
(26, 'BO', 'Bolivia', '591', NULL, NULL),
(27, 'BA', 'Bosnia and Herzegovina', '387', NULL, NULL),
(28, 'BW', 'Botswana', '267', NULL, NULL),
(29, 'BV', 'Bouvet Island', '0', NULL, NULL),
(30, 'BR', 'Brazil', '55', NULL, NULL),
(31, 'IO', 'British Indian Ocean Territory', '246', NULL, NULL),
(32, 'BN', 'Brunei', '673', NULL, NULL),
(33, 'BG', 'Bulgaria', '359', NULL, NULL),
(34, 'BF', 'Burkina Faso', '226', NULL, NULL),
(35, 'BI', 'Burundi', '257', NULL, NULL),
(36, 'KH', 'Cambodia', '855', NULL, NULL),
(37, 'CM', 'Cameroon', '237', NULL, NULL),
(38, 'CA', 'Canada', '1', NULL, NULL),
(39, 'CV', 'Cape Verde', '238', NULL, NULL),
(40, 'KY', 'Cayman Islands', '1345', NULL, NULL),
(41, 'CF', 'Central African Republic', '236', NULL, NULL),
(42, 'TD', 'Chad', '235', NULL, NULL),
(43, 'CL', 'Chile', '56', NULL, NULL),
(44, 'CN', 'China', '86', NULL, NULL),
(45, 'CX', 'Christmas Island', '61', NULL, NULL),
(46, 'CC', 'Cocos (Keeling) Islands', '672', NULL, NULL),
(47, 'CO', 'Colombia', '57', NULL, NULL),
(48, 'KM', 'Comoros', '269', NULL, NULL),
(49, 'CG', 'Congo', '242', NULL, NULL),
(50, 'CD', 'Congo The Democratic Republic Of The', '242', NULL, NULL),
(51, 'CK', 'Cook Islands', '682', NULL, NULL),
(52, 'CR', 'Costa Rica', '506', NULL, NULL),
(53, 'CI', 'Cote D Ivoire (Ivory Coast)', '225', NULL, NULL),
(54, 'HR', 'Croatia (Hrvatska)', '385', NULL, NULL),
(55, 'CU', 'Cuba', '53', NULL, NULL),
(56, 'CY', 'Cyprus', '357', NULL, NULL),
(57, 'CZ', 'Czech Republic', '420', NULL, NULL),
(58, 'DK', 'Denmark', '45', NULL, NULL),
(59, 'DJ', 'Djibouti', '253', NULL, NULL),
(60, 'DM', 'Dominica', '1767', NULL, NULL),
(61, 'DO', 'Dominican Republic', '1809', NULL, NULL),
(62, 'TP', 'East Timor', '670', NULL, NULL),
(63, 'EC', 'Ecuador', '593', NULL, NULL),
(64, 'EG', 'Egypt', '20', NULL, NULL),
(65, 'SV', 'El Salvador', '503', NULL, NULL),
(66, 'GQ', 'Equatorial Guinea', '240', NULL, NULL),
(67, 'ER', 'Eritrea', '291', NULL, NULL),
(68, 'EE', 'Estonia', '372', NULL, NULL),
(69, 'ET', 'Ethiopia', '251', NULL, NULL),
(70, 'XA', 'External Territories of Australia', '61', NULL, NULL),
(71, 'FK', 'Falkland Islands', '500', NULL, NULL),
(72, 'FO', 'Faroe Islands', '298', NULL, NULL),
(73, 'FJ', 'Fiji Islands', '679', NULL, NULL),
(74, 'FI', 'Finland', '358', NULL, NULL),
(75, 'FR', 'France', '33', NULL, NULL),
(76, 'GF', 'French Guiana', '594', NULL, NULL),
(77, 'PF', 'French Polynesia', '689', NULL, NULL),
(78, 'TF', 'French Southern Territories', '0', NULL, NULL),
(79, 'GA', 'Gabon', '241', NULL, NULL),
(80, 'GM', 'Gambia The', '220', NULL, NULL),
(81, 'GE', 'Georgia', '995', NULL, NULL),
(82, 'DE', 'Germany', '49', NULL, NULL),
(83, 'GH', 'Ghana', '233', NULL, NULL),
(84, 'GI', 'Gibraltar', '350', NULL, NULL),
(85, 'GR', 'Greece', '30', NULL, NULL),
(86, 'GL', 'Greenland', '299', NULL, NULL),
(87, 'GD', 'Grenada', '1473', NULL, NULL),
(88, 'GP', 'Guadeloupe', '590', NULL, NULL),
(89, 'GU', 'Guam', '1671', NULL, NULL),
(90, 'GT', 'Guatemala', '502', NULL, NULL),
(91, 'XU', 'Guernsey and Alderney', '44', NULL, NULL),
(92, 'GN', 'Guinea', '224', NULL, NULL),
(93, 'GW', 'Guinea-Bissau', '245', NULL, NULL),
(94, 'GY', 'Guyana', '592', NULL, NULL),
(95, 'HT', 'Haiti', '509', NULL, NULL),
(96, 'HM', 'Heard and McDonald Islands', '0', NULL, NULL),
(97, 'HN', 'Honduras', '504', NULL, NULL),
(98, 'HK', 'Hong Kong S.A.R.', '852', NULL, NULL),
(99, 'HU', 'Hungary', '36', NULL, NULL),
(100, 'IS', 'Iceland', '354', NULL, NULL),
(101, 'IN', 'India', '91', NULL, NULL),
(102, 'ID', 'Indonesia', '62', NULL, NULL),
(103, 'IR', 'Iran', '98', NULL, NULL),
(104, 'IQ', 'Iraq', '964', NULL, NULL),
(105, 'IE', 'Ireland', '353', NULL, NULL),
(106, 'IL', 'Israel', '972', NULL, NULL),
(107, 'IT', 'Italy', '39', NULL, NULL),
(108, 'JM', 'Jamaica', '1876', NULL, NULL),
(109, 'JP', 'Japan', '81', NULL, NULL),
(110, 'XJ', 'Jersey', '44', NULL, NULL),
(111, 'JO', 'Jordan', '962', NULL, NULL),
(112, 'KZ', 'Kazakhstan', '7', NULL, NULL),
(113, 'KE', 'Kenya', '254', NULL, NULL),
(114, 'KI', 'Kiribati', '686', NULL, NULL),
(115, 'KP', 'Korea North', '850', NULL, NULL),
(116, 'KR', 'Korea South', '82', NULL, NULL),
(117, 'KW', 'Kuwait', '965', NULL, NULL),
(118, 'KG', 'Kyrgyzstan', '996', NULL, NULL),
(119, 'LA', 'Laos', '856', NULL, NULL),
(120, 'LV', 'Latvia', '371', NULL, NULL),
(121, 'LB', 'Lebanon', '961', NULL, NULL),
(122, 'LS', 'Lesotho', '266', NULL, NULL),
(123, 'LR', 'Liberia', '231', NULL, NULL),
(124, 'LY', 'Libya', '218', NULL, NULL),
(125, 'LI', 'Liechtenstein', '423', NULL, NULL),
(126, 'LT', 'Lithuania', '370', NULL, NULL),
(127, 'LU', 'Luxembourg', '352', NULL, NULL),
(128, 'MO', 'Macau S.A.R.', '853', NULL, NULL),
(129, 'MK', 'Macedonia', '389', NULL, NULL),
(130, 'MG', 'Madagascar', '261', NULL, NULL),
(131, 'MW', 'Malawi', '265', NULL, NULL),
(132, 'MY', 'Malaysia', '60', NULL, NULL),
(133, 'MV', 'Maldives', '960', NULL, NULL),
(134, 'ML', 'Mali', '223', NULL, NULL),
(135, 'MT', 'Malta', '356', NULL, NULL),
(136, 'XM', 'Man (Isle of)', '44', NULL, NULL),
(137, 'MH', 'Marshall Islands', '692', NULL, NULL),
(138, 'MQ', 'Martinique', '596', NULL, NULL),
(139, 'MR', 'Mauritania', '222', NULL, NULL),
(140, 'MU', 'Mauritius', '230', NULL, NULL),
(141, 'YT', 'Mayotte', '269', NULL, NULL),
(142, 'MX', 'Mexico', '52', NULL, NULL),
(143, 'FM', 'Micronesia', '691', NULL, NULL),
(144, 'MD', 'Moldova', '373', NULL, NULL),
(145, 'MC', 'Monaco', '377', NULL, NULL),
(146, 'MN', 'Mongolia', '976', NULL, NULL),
(147, 'MS', 'Montserrat', '1664', NULL, NULL),
(148, 'MA', 'Morocco', '212', NULL, NULL),
(149, 'MZ', 'Mozambique', '258', NULL, NULL),
(150, 'MM', 'Myanmar', '95', NULL, NULL),
(151, 'NA', 'Namibia', '264', NULL, NULL),
(152, 'NR', 'Nauru', '674', NULL, NULL),
(153, 'NP', 'Nepal', '977', NULL, NULL),
(154, 'AN', 'Netherlands Antilles', '599', NULL, NULL),
(155, 'NL', 'Netherlands The', '31', NULL, NULL),
(156, 'NC', 'New Caledonia', '687', NULL, NULL),
(157, 'NZ', 'New Zealand', '64', NULL, NULL),
(158, 'NI', 'Nicaragua', '505', NULL, NULL),
(159, 'NE', 'Niger', '227', NULL, NULL),
(160, 'NG', 'Nigeria', '234', NULL, NULL),
(161, 'NU', 'Niue', '683', NULL, NULL),
(162, 'NF', 'Norfolk Island', '672', NULL, NULL),
(163, 'MP', 'Northern Mariana Islands', '1670', NULL, NULL),
(164, 'NO', 'Norway', '47', NULL, NULL),
(165, 'OM', 'Oman', '968', NULL, NULL),
(166, 'PK', 'Pakistan', '92', NULL, NULL),
(167, 'PW', 'Palau', '680', NULL, NULL),
(168, 'PS', 'Palestinian Territory Occupied', '970', NULL, NULL),
(169, 'PA', 'Panama', '507', NULL, NULL),
(170, 'PG', 'Papua new Guinea', '675', NULL, NULL),
(171, 'PY', 'Paraguay', '595', NULL, NULL),
(172, 'PE', 'Peru', '51', NULL, NULL),
(173, 'PH', 'Philippines', '63', NULL, NULL),
(174, 'PN', 'Pitcairn Island', '0', NULL, NULL),
(175, 'PL', 'Poland', '48', NULL, NULL),
(176, 'PT', 'Portugal', '351', NULL, NULL),
(177, 'PR', 'Puerto Rico', '1787', NULL, NULL),
(178, 'QA', 'Qatar', '974', NULL, NULL),
(179, 'RE', 'Reunion', '262', NULL, NULL),
(180, 'RO', 'Romania', '40', NULL, NULL),
(181, 'RU', 'Russia', '70', NULL, NULL),
(182, 'RW', 'Rwanda', '250', NULL, NULL),
(183, 'SH', 'Saint Helena', '290', NULL, NULL),
(184, 'KN', 'Saint Kitts And Nevis', '1869', NULL, NULL),
(185, 'LC', 'Saint Lucia', '1758', NULL, NULL),
(186, 'PM', 'Saint Pierre and Miquelon', '508', NULL, NULL),
(187, 'VC', 'Saint Vincent And The Grenadines', '1784', NULL, NULL),
(188, 'WS', 'Samoa', '684', NULL, NULL),
(189, 'SM', 'San Marino', '378', NULL, NULL),
(190, 'ST', 'Sao Tome and Principe', '239', NULL, NULL),
(191, 'SA', 'Saudi Arabia', '966', NULL, NULL),
(192, 'SN', 'Senegal', '221', NULL, NULL),
(193, 'RS', 'Serbia', '381', NULL, NULL),
(194, 'SC', 'Seychelles', '248', NULL, NULL),
(195, 'SL', 'Sierra Leone', '232', NULL, NULL),
(196, 'SG', 'Singapore', '65', NULL, NULL),
(197, 'SK', 'Slovakia', '421', NULL, NULL),
(198, 'SI', 'Slovenia', '386', NULL, NULL),
(199, 'XG', 'Smaller Territories of the UK', '44', NULL, NULL),
(200, 'SB', 'Solomon Islands', '677', NULL, NULL),
(201, 'SO', 'Somalia', '252', NULL, NULL),
(202, 'ZA', 'South Africa', '27', NULL, NULL),
(203, 'GS', 'South Georgia', '0', NULL, NULL),
(204, 'SS', 'South Sudan', '211', NULL, NULL),
(205, 'ES', 'Spain', '34', NULL, NULL),
(206, 'LK', 'Sri Lanka', '94', NULL, NULL),
(207, 'SD', 'Sudan', '249', NULL, NULL),
(208, 'SR', 'Suriname', '597', NULL, NULL),
(209, 'SJ', 'Svalbard And Jan Mayen Islands', '47', NULL, NULL),
(210, 'SZ', 'Swaziland', '268', NULL, NULL),
(211, 'SE', 'Sweden', '46', NULL, NULL),
(212, 'CH', 'Switzerland', '41', NULL, NULL),
(213, 'SY', 'Syria', '963', NULL, NULL),
(214, 'TW', 'Taiwan', '886', NULL, NULL),
(215, 'TJ', 'Tajikistan', '992', NULL, NULL),
(216, 'TZ', 'Tanzania', '255', NULL, NULL),
(217, 'TH', 'Thailand', '66', NULL, NULL),
(218, 'TG', 'Togo', '228', NULL, NULL),
(219, 'TK', 'Tokelau', '690', NULL, NULL),
(220, 'TO', 'Tonga', '676', NULL, NULL),
(221, 'TT', 'Trinidad And Tobago', '1868', NULL, NULL),
(222, 'TN', 'Tunisia', '216', NULL, NULL),
(223, 'TR', 'Turkey', '90', NULL, NULL),
(224, 'TM', 'Turkmenistan', '7370', NULL, NULL),
(225, 'TC', 'Turks And Caicos Islands', '1649', NULL, NULL),
(226, 'TV', 'Tuvalu', '688', NULL, NULL),
(227, 'UG', 'Uganda', '256', NULL, NULL),
(228, 'UA', 'Ukraine', '380', NULL, NULL),
(229, 'AE', 'United Arab Emirates', '971', NULL, NULL),
(230, 'GB', 'United Kingdom', '44', NULL, NULL),
(231, 'US', 'United States', '1', NULL, NULL),
(232, 'UM', 'United States Minor Outlying Islands', '1', NULL, NULL),
(233, 'UY', 'Uruguay', '598', NULL, NULL),
(234, 'UZ', 'Uzbekistan', '998', NULL, NULL),
(235, 'VU', 'Vanuatu', '678', NULL, NULL),
(236, 'VA', 'Vatican City State (Holy See)', '39', NULL, NULL),
(237, 'VE', 'Venezuela', '58', NULL, NULL),
(238, 'VN', 'Vietnam', '84', NULL, NULL),
(239, 'VG', 'Virgin Islands (British)', '1284', NULL, NULL),
(240, 'VI', 'Virgin Islands (US)', '1340', NULL, NULL),
(241, 'WF', 'Wallis And Futuna Islands', '681', NULL, NULL),
(242, 'EH', 'Western Sahara', '212', NULL, NULL),
(243, 'YE', 'Yemen', '967', NULL, NULL),
(244, 'YU', 'Yugoslavia', '38', NULL, NULL),
(245, 'ZM', 'Zambia', '260', NULL, NULL),
(246, 'ZW', 'Zimbabwe', '263', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `installer_companies`
--

CREATE TABLE `installer_companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `installer_id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `postcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `installer_companies`
--

INSERT INTO `installer_companies` (`id`, `installer_id`, `company_name`, `address`, `email`, `logo`, `cover`, `contact_no`, `country_id`, `state_id`, `city_id`, `postcode`, `company_description`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(20, 48, 'Virtuenetzzz', 'Abbasia town ryk', 'virtuenetx@example.com', '60016a7e5101edown234.png', '60016d1d7d423download (1).jfif', '0sd36523132', 166, 22, 24, '64200', '<h1><b><i>You broke <span style=\"background-color: rgb(16, 74, 90);\">my heat I will beak your bon</span>es</i></b></h1>', '1', NULL, NULL, '2021-01-15 00:20:02', '2021-01-15 06:05:48'),
(21, 49, 'Virtuenetz', 'this is address Two', 'saifrehman@gmail.com', '6001826d98f01amdin.jpg', '6001826d98a67download (1).jfif', 'Virtuenetz', 166, 23, 25, '50000', '<p>This is company description</p>', '1', NULL, NULL, '2021-01-15 06:54:21', '2021-01-16 01:02:58');

-- --------------------------------------------------------

--
-- Table structure for table `install_infos`
--

CREATE TABLE `install_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `installer_id` bigint(20) UNSIGNED NOT NULL,
  `experience` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skills` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recharge` double NOT NULL,
  `installation_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `install_infos`
--

INSERT INTO `install_infos` (`id`, `installer_id`, `experience`, `skills`, `recharge`, `installation_type`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(31, 48, '2 year', '<h1><b><i>These are my skills asd</i></b></h1>', 2500, 'window,door,lentern', '1', NULL, NULL, '2021-01-15 00:20:02', '2021-01-15 06:01:27'),
(32, 49, '2 year', '<h1><font color=\"#000000\"><span style=\"background-color: rgb(255, 255, 0);\"><b><i>This is the skills</i></b></span></font></h1>', 2500, 'window,door,lentern', '1', NULL, NULL, '2021-01-15 06:54:21', '2021-01-16 01:02:58'),
(33, 50, 'Nichole', NULL, 13, 'window,Aperiam', '1', NULL, NULL, '2021-01-15 23:55:30', '2021-01-15 23:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_02_041937_create_admins_table', 1),
(5, '2020_12_02_074043_add_first_name_and_add_profile_and_last_name_and_to_admins', 1),
(6, '2020_12_07_062657_add_address_to_admins_table', 1),
(7, '2020_12_07_115506_create_categories_table', 1),
(8, '2020_12_07_134055_create_brands_table', 1),
(9, '2020_12_08_164536_add_profile_to_users', 1),
(10, '2020_12_19_223655_create_products_table', 1),
(11, '2020_12_21_192522_create_productgalleries_table', 1),
(12, '2020_12_22_213547_create_product_sizes_table', 1),
(13, '2020_12_23_222539_create_attributes_table', 1),
(14, '2020_12_23_232359_create_product_attributes_table', 1),
(15, '2020_12_24_010130_create_terms_table', 1),
(16, '2020_12_24_191059_create_product_categories_table', 1),
(17, '2020_12_28_181318_create_countries_table', 1),
(18, '2020_12_28_181915_create_states_table', 1),
(19, '2020_12_28_183328_create_cities_table', 1),
(20, '2020_12_29_001120_create_product_tags_table', 1),
(21, '2021_01_04_052133_create_carts_table', 1),
(22, '2021_01_05_092039_add_columns_to_users_table', 1),
(23, '2021_01_06_035717_create_addresses_table', 1),
(24, '2021_01_06_050247_create_orders_table', 1),
(25, '2021_01_06_050400_create_order_details_table', 1),
(26, '2021_01_11_104905_add_columns_to_products_table', 1),
(27, '2021_01_12_065852_create_addons_table', 1),
(28, '2021_01_12_114151_create_request_hirings_table', 1),
(29, '2021_01_14_044618_add_column_to_users_table', 1),
(30, '2021_01_14_045602_create_install_infos_table', 1),
(31, '2021_01_14_053334_create_installer_companies_table', 2),
(32, '2021_01_14_085427_create_installer_companies_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `total_amount` double(9,2) NOT NULL,
  `discount` double(9,2) NOT NULL,
  `net_total` double(9,2) NOT NULL,
  `status` enum('pending','canceled','shipped','completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total_amount`, `discount`, `net_total`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 44, 549.00, 0.00, 549.00, 'pending', 44, NULL, '2021-01-14 23:38:56', '2021-01-16 01:19:25');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` bigint(20) UNSIGNED NOT NULL,
  `price` double(9,2) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 1, 142.00, 44, NULL, '2021-01-14 23:38:56', '2021-01-14 23:38:56'),
(2, 1, 3, 1, 161.00, 44, NULL, '2021-01-14 23:38:56', '2021-01-14 23:38:56'),
(3, 1, 2, 1, 246.00, 44, NULL, '2021-01-14 23:38:56', '2021-01-14 23:38:56');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productgalleries`
--

CREATE TABLE `productgalleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `products_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_primary` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productgalleries`
--

INSERT INTO `productgalleries` (`id`, `products_id`, `image`, `image_title`, `is_primary`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 'productimages/2021/01/60011a98086c0aluminium-front-door-glass-insert.jpg', 'Bo Oneal', '1', '1', 1, NULL, '2021-01-14 23:31:20', '2021-01-14 23:31:20'),
(2, 2, 'productimages/2021/01/60011a982e80edownload (1).jfif', 'Bo Oneal', '0', '1', 1, NULL, '2021-01-14 23:31:20', '2021-01-14 23:31:20'),
(3, 2, 'productimages/2021/01/60011a983ed15download (2).jfif', 'Bo Oneal', '0', '1', 1, NULL, '2021-01-14 23:31:20', '2021-01-14 23:31:20'),
(4, 2, 'productimages/2021/01/60011a985ccf1download.jfif', 'Bo Oneal', '0', '1', 1, NULL, '2021-01-14 23:31:20', '2021-01-14 23:31:20'),
(5, 3, 'productimages/2021/01/60011ab2df008aluminium-front-door-glass-insert.jpg', 'Yolanda Hogan', '0', '1', 1, NULL, '2021-01-14 23:31:46', '2021-01-14 23:31:46'),
(6, 3, 'productimages/2021/01/60011ab2ecb83download (1).jfif', 'Yolanda Hogan', '1', '1', 1, NULL, '2021-01-14 23:31:46', '2021-01-14 23:31:46'),
(7, 3, 'productimages/2021/01/60011ab306875download (2).jfif', 'Yolanda Hogan', '0', '1', 1, NULL, '2021-01-14 23:31:47', '2021-01-14 23:31:47'),
(8, 3, 'productimages/2021/01/60011ab341d01download.jfif', 'Yolanda Hogan', '0', '1', 1, NULL, '2021-01-14 23:31:47', '2021-01-14 23:31:47'),
(9, 4, 'productimages/2021/01/60011ad51c9f6aluminium-front-door-glass-insert.jpg', 'Yolanda Hogan', '0', '1', 1, NULL, '2021-01-14 23:32:21', '2021-01-14 23:32:21'),
(10, 4, 'productimages/2021/01/60011ad53a186download (1).jfif', 'Yolanda Hogan', '0', '1', 1, NULL, '2021-01-14 23:32:21', '2021-01-14 23:32:21'),
(11, 4, 'productimages/2021/01/60011ad542237download (2).jfif', 'Yolanda Hogan', '1', '1', 1, NULL, '2021-01-14 23:32:21', '2021-01-14 23:32:21'),
(12, 4, 'productimages/2021/01/60011ad54a64cdownload.jfif', 'Yolanda Hogan', '0', '1', 1, NULL, '2021-01-14 23:32:21', '2021-01-14 23:32:21'),
(13, 5, 'productimages/2021/01/60011b3dc9d55aluminium-front-door-glass-insert - Copy.jpg', 'Christopher Lawson', '0', '1', 1, NULL, '2021-01-14 23:34:05', '2021-01-14 23:34:05'),
(14, 5, 'productimages/2021/01/60011b3ddb369aluminium-front-door-glass-insert.jpg', 'Christopher Lawson', '0', '1', 1, NULL, '2021-01-14 23:34:05', '2021-01-14 23:34:05'),
(15, 5, 'productimages/2021/01/60011b3de8d4bdownload (1).jfif', 'Christopher Lawson', '0', '1', 1, NULL, '2021-01-14 23:34:05', '2021-01-14 23:34:05'),
(16, 5, 'productimages/2021/01/60011b3e12aa2download (2).jfif', 'Christopher Lawson', '1', '1', 1, NULL, '2021-01-14 23:34:06', '2021-01-14 23:34:06'),
(17, 5, 'productimages/2021/01/60011b3e1b09fdownload.jfif', 'Christopher Lawson', '0', '1', 1, NULL, '2021-01-14 23:34:06', '2021-01-14 23:34:06');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regular_price` double(9,2) NOT NULL,
  `sale_price` double(9,2) NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` bigint(20) UNSIGNED NOT NULL,
  `weight` bigint(20) UNSIGNED DEFAULT NULL,
  `product_type` enum('window','door','frame','lentern','handle') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `crated_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` enum('simple','customize') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `product_name`, `regular_price`, `sale_price`, `short_description`, `description`, `quantity`, `weight`, `product_type`, `status`, `crated_by`, `updated_by`, `created_at`, `updated_at`, `type`) VALUES
(2, 1, 'Bo Oneal', 381.00, 246.00, 'Mollit blanditiis po', NULL, 207, 951, 'frame', '1', 1, NULL, '2021-01-14 23:31:19', '2021-01-14 23:31:19', 'customize'),
(3, 1, 'Yolanda Hogan', 409.00, 161.00, 'Cupiditate in vel et', NULL, 801, 244, 'lentern', '1', 1, NULL, '2021-01-14 23:31:46', '2021-01-14 23:31:46', 'customize'),
(4, 1, 'Yolanda Hogan', 409.00, 161.00, 'Cupiditate in vel et', NULL, 801, 244, 'lentern', '1', 1, NULL, '2021-01-14 23:32:21', '2021-01-14 23:32:21', 'customize'),
(5, 1, 'Christopher Lawson', 544.00, 142.00, 'Cumque voluptatem re', NULL, 115, 829, 'window', '1', 1, NULL, '2021-01-14 23:34:05', '2021-01-14 23:34:05', 'customize');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `attribute_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '1', 1, NULL, '2021-01-14 23:31:20', '2021-01-14 23:31:20'),
(2, 3, 2, '1', 1, NULL, '2021-01-14 23:31:47', '2021-01-14 23:31:47'),
(3, 4, 2, '1', 1, NULL, '2021-01-14 23:32:21', '2021-01-14 23:32:21'),
(4, 5, 2, '1', 1, NULL, '2021-01-14 23:34:06', '2021-01-14 23:34:06');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `product_id`, `category_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 5, 1, '1', 1, NULL, '2021-01-14 23:34:06', '2021-01-14 23:34:06');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` double(9,2) NOT NULL,
  `width` double(9,2) NOT NULL,
  `thickness` double(9,2) NOT NULL,
  `price` double(9,2) NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_tags`
--

CREATE TABLE `product_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `tag_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_hirings`
--

CREATE TABLE `request_hirings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `working_details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `estimated_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(9,2) NOT NULL,
  `installer_id` bigint(20) UNSIGNED NOT NULL,
  `hiring_status` enum('pending','inprogress','cancel','complete') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_hirings`
--

INSERT INTO `request_hirings` (`id`, `customer_id`, `working_details`, `estimated_time`, `amount`, `installer_id`, `hiring_status`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 52, 'Ullamco sed eos ven', 'Hayfa', 79.00, 49, 'inprogress', '1', NULL, NULL, '2021-01-16 02:09:27', '2021-01-16 07:08:52'),
(2, 53, 'Enim adipisicing ad', 'Kermit', 8.00, 49, 'inprogress', '1', NULL, NULL, '2021-01-16 02:13:57', '2021-01-16 02:26:59'),
(3, 54, 'Dolores ea illum ex', 'Ayanna', 72.00, 49, 'inprogress', '1', NULL, NULL, '2021-01-16 02:14:41', '2021-01-16 06:53:40'),
(4, 55, 'Excepturi qui ut rep', 'Alexa', 69.00, 49, 'complete', '1', NULL, NULL, '2021-01-16 02:15:57', '2021-01-16 02:30:11'),
(5, 56, 'Maiores hic magnam e', 'Alika', 71.00, 49, 'pending', '1', NULL, NULL, '2021-01-16 02:16:26', '2021-01-16 02:16:26');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'Nevada', 43, '2021-01-14 02:57:12', '2021-01-14 02:57:12'),
(2, 'Declan', 223, '2021-01-14 03:02:05', '2021-01-14 03:02:05'),
(3, 'Declan', 223, '2021-01-14 03:06:58', '2021-01-14 03:06:58'),
(4, 'Declan', 223, '2021-01-14 03:07:38', '2021-01-14 03:07:38'),
(5, 'Ora', 140, '2021-01-14 03:08:29', '2021-01-14 03:08:29'),
(6, 'Herman', 216, '2021-01-14 03:10:43', '2021-01-14 03:10:43'),
(7, 'Herman', 216, '2021-01-14 03:17:50', '2021-01-14 03:17:50'),
(8, 'Herman', 216, '2021-01-14 03:18:35', '2021-01-14 03:18:35'),
(9, 'Piper', 241, '2021-01-14 04:06:25', '2021-01-14 04:06:25'),
(10, 'Piper', 241, '2021-01-14 04:07:48', '2021-01-14 04:07:48'),
(11, 'Berk', 42, '2021-01-14 04:22:47', '2021-01-14 04:22:47'),
(12, 'April', 28, '2021-01-14 04:25:43', '2021-01-14 04:25:43'),
(13, 'Edan', 24, '2021-01-14 04:28:48', '2021-01-14 04:28:48'),
(14, 'Jorden', 239, '2021-01-14 04:29:56', '2021-01-14 04:29:56'),
(15, 'Abra', 52, '2021-01-14 04:32:10', '2021-01-14 04:32:10'),
(16, 'Alice', 233, '2021-01-14 04:37:17', '2021-01-14 04:37:17'),
(17, 'Xanthus', 216, '2021-01-14 04:39:46', '2021-01-14 04:39:46'),
(18, 'Quasi sit accusamus', 59, '2021-01-14 04:50:33', '2021-01-14 04:50:33'),
(19, 'Nevada', 1, '2021-01-14 06:37:04', '2021-01-14 06:37:04'),
(20, 'Velit repellendus I', 79, '2021-01-14 23:38:55', '2021-01-14 23:38:55'),
(21, 'Hayley', 60, '2021-01-15 00:06:22', '2021-01-15 00:06:22'),
(22, 'punjab', 166, '2021-01-15 00:20:02', '2021-01-15 00:20:02'),
(23, 'Islamabad Capital', 166, '2021-01-15 06:54:21', '2021-01-15 06:54:21');

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `attribute_id`, `name`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 2, 'red', '1', 1, NULL, '2021-01-14 23:32:21', '2021-01-14 23:32:21'),
(2, 2, 'green', '1', 1, NULL, '2021-01-14 23:32:21', '2021-01-14 23:32:21'),
(3, 2, 'blue', '1', 1, NULL, '2021-01-14 23:32:21', '2021-01-14 23:32:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('customer','installer') COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_info` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `first_name`, `last_name`, `avatar`, `contact_no`, `address`, `status`, `type`, `company_info`) VALUES
(44, 'RaymondClayton', 'telizy@mailinator.com', NULL, '$2y$10$u7idYDgN6q9SLxmF/NNsV.XgTfw4NtnfgEBKc9eVQnOh0/1o4Yk/m', NULL, '2021-01-14 23:38:11', '2021-01-14 23:38:11', 'Raymond', 'Clayton', 'defaultimg.png', 'Rachel', 'Herrod', '1', 'installer', NULL),
(49, 'saifrehman', 'saifrehman@gmail.com', NULL, '$2y$10$rHb.GIQpFhq/XV6ne5n9Ve45lLUdi0Okil2bYebtEj7ykqfXy3slu', NULL, '2021-01-15 06:54:21', '2021-01-16 01:02:57', 'saif', 'rehman', '6001826d1d8daamdin.jpg', '03038822474', 'this is address Two', '1', 'installer', '1'),
(50, 'HolleeJaime', 'nivedyta@mailinator.com', NULL, '$2y$10$8eyIDQVedVXvAkLrJs53..sfEsSeHdTQqYDZ7onNH3QP8/ESLHj7O', NULL, '2021-01-15 23:55:30', '2021-01-16 00:16:56', 'Hollee', 'Jaime', '600276c81969damdin.jpg', 'Melinda', NULL, '1', 'installer', '0'),
(52, 'MatthewAmber', 'nuhe@mailinator.com', NULL, '$2y$10$GkjjZsQhm2yYgNhhr5TflOPeh3P3TgOPnWaYoP.Hxcxv6OpbV2Uk6', NULL, '2021-01-16 02:09:27', '2021-01-16 02:09:27', 'Matthew', 'Amber', NULL, 'Mohammad', 'Priscilla', '1', 'installer', NULL),
(53, 'RachelJohn', 'midejuzu@mailinator.com', NULL, '$2y$10$NTCVhRB7dCNG.8.eyCkZWeODAXqPEyUF3J0xDzZbZUYWE7m3ZeO4i', NULL, '2021-01-16 02:13:57', '2021-01-16 02:13:57', 'Rachel', 'John', NULL, 'Aidan', 'Cailin', '1', 'installer', NULL),
(54, 'YenJasmine', 'fuladut@mailinator.com', NULL, '$2y$10$OTps2D8Zf3tp/DSpeC1avOI4Hsr7kss.8EblCJ/WDFyWZgP0TEC9C', NULL, '2021-01-16 02:14:41', '2021-01-16 02:14:41', 'Yen', 'Jasmine', NULL, 'Hayfa', 'Dennis', '1', 'installer', NULL),
(55, 'LisandraNerea', 'sisitizyj@mailinator.com', NULL, '$2y$10$mczyfLiCHb4h5K0vssght.Yxs.hDPcwrwE1twwsFJhIj3.slotpXa', NULL, '2021-01-16 02:15:56', '2021-01-16 02:15:56', 'Lisandra', 'Nerea', NULL, 'Sean', 'Macey', '1', 'installer', NULL),
(56, 'CarissaShaeleigh', 'hana@mailinator.com', NULL, '$2y$10$XeT1wJu64b16/Ep3Fqe5NOmUyP4v/VW5KT2MI2ky.b5jLYXJYgut6', NULL, '2021-01-16 02:16:26', '2021-01-16 02:16:26', 'Carissa', 'Shaeleigh', NULL, 'Bruce', 'Elaine', '1', 'installer', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addons`
--
ALTER TABLE `addons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addons_product_id_foreign` (`product_id`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_customer_id_foreign` (`customer_id`),
  ADD KEY `addresses_country_id_foreign` (`country_id`),
  ADD KEY `addresses_state_id_foreign` (`state_id`),
  ADD KEY `addresses_city_id_foreign` (`city_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_state_id_foreign` (`state_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `installer_companies`
--
ALTER TABLE `installer_companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `installer_companies_installer_id_foreign` (`installer_id`),
  ADD KEY `installer_companies_country_id_foreign` (`country_id`),
  ADD KEY `installer_companies_state_id_foreign` (`state_id`),
  ADD KEY `installer_companies_city_id_foreign` (`city_id`);

--
-- Indexes for table `install_infos`
--
ALTER TABLE `install_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `install_infos_installer_id_foreign` (`installer_id`);

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
  ADD KEY `orders_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `productgalleries`
--
ALTER TABLE `productgalleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productgalleries_products_id_foreign` (`products_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_attributes_product_id_foreign` (`product_id`),
  ADD KEY `product_attributes_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_categories_product_id_foreign` (`product_id`),
  ADD KEY `product_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_sizes_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_tags_product_id_foreign` (`product_id`);

--
-- Indexes for table `request_hirings`
--
ALTER TABLE `request_hirings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_hirings_customer_id_foreign` (`customer_id`),
  ADD KEY `request_hirings_installer_id_foreign` (`installer_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_country_id_foreign` (`country_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `terms_attribute_id_foreign` (`attribute_id`);

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
-- AUTO_INCREMENT for table `addons`
--
ALTER TABLE `addons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `installer_companies`
--
ALTER TABLE `installer_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `install_infos`
--
ALTER TABLE `install_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `productgalleries`
--
ALTER TABLE `productgalleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_hirings`
--
ALTER TABLE `request_hirings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addons`
--
ALTER TABLE `addons`
  ADD CONSTRAINT `addons_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `addresses_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `addresses_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `addresses_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `installer_companies`
--
ALTER TABLE `installer_companies`
  ADD CONSTRAINT `installer_companies_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `installer_companies_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `installer_companies_installer_id_foreign` FOREIGN KEY (`installer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `installer_companies_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `install_infos`
--
ALTER TABLE `install_infos`
  ADD CONSTRAINT `install_infos_installer_id_foreign` FOREIGN KEY (`installer_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `productgalleries`
--
ALTER TABLE `productgalleries`
  ADD CONSTRAINT `productgalleries_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);

--
-- Constraints for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD CONSTRAINT `product_attributes_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`),
  ADD CONSTRAINT `product_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `product_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD CONSTRAINT `product_sizes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_tags`
--
ALTER TABLE `product_tags`
  ADD CONSTRAINT `product_tags_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `request_hirings`
--
ALTER TABLE `request_hirings`
  ADD CONSTRAINT `request_hirings_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `request_hirings_installer_id_foreign` FOREIGN KEY (`installer_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `terms`
--
ALTER TABLE `terms`
  ADD CONSTRAINT `terms_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
