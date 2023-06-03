-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 30, 2023 at 04:34 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sqlphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` enum('Administration','student','teacher') COLLATE utf8_unicode_ci DEFAULT 'teacher',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `email`, `password`, `phone`, `address`, `type`, `created_at`, `updated_at`) VALUES
(27, 'thaongan', 'thaongan@tgu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 335627466, '98/3 áº¤p Báº¯c, PhÆ°á»ng 10, ThÃ nh Phá»‘ Má»¹ Tho, Tiá»n Giang', 'teacher', '2023-05-02 11:28:20', '2023-05-02 11:28:20'),
(28, 'thaotrang', 'thaotrang@tgu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 335627466, 'wefw', 'teacher', '2023-05-02 11:28:42', '2023-05-02 11:28:42'),
(32, 'myhuyen', 'myhuyen@tgu.edu.vn', 'e10adc3949ba59abbe56e057f20f883e', 335627466, '98/3 khu pho 4', 'teacher', '2023-05-26 15:07:45', '2023-05-26 22:11:48'),
(57, 'thaongan', 'phong@gmail.com', 'thaongan', 335627466, '98/3 khu pho 4', 'teacher', '2023-05-26 23:14:43', '2023-05-26 23:14:43');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
