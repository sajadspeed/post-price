-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 27, 2020 at 07:20 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zeepshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
CREATE TABLE IF NOT EXISTS `provinces` (
  `id` int(2) NOT NULL,
  `name` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`) VALUES
(1, 'تهران'),
(2, 'گیلان'),
(3, 'آذربایجان شرقی'),
(4, 'خوزستان'),
(5, 'فارس'),
(6, 'اصفهان'),
(7, 'خراسان رضوی'),
(8, 'قزوین'),
(9, 'سمنان'),
(10, 'قم'),
(11, 'مرکزی'),
(12, 'زنجان'),
(13, 'مازندران'),
(14, 'گلستان'),
(15, 'اردبیل'),
(16, 'آذربایجان غربی'),
(17, 'همدان'),
(18, 'کردستان'),
(19, 'کرمانشاه'),
(20, 'لرستان'),
(21, 'بوشهر'),
(22, 'کرمان'),
(23, 'هرمزگان'),
(24, 'چهارمحال و بختیاری'),
(25, 'یزد'),
(26, 'سیستان و بلوچستان'),
(27, 'ایلام'),
(28, 'کهگلویه و بویراحمد'),
(29, 'خراسان شمالی'),
(30, 'خراسان جنوبی'),
(31, 'البرز');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
