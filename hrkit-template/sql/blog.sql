-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2019 at 02:38 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` char(200) NOT NULL,
  `date` date NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `date`, `content`) VALUES
(1, 'Моя первая статья', '2011-09-01', '<p>Первая статья.</p>'),
(2, 'Вторая статья', '2011-09-08', '<p>Вот и вторая статья</p>'),
(3, 'Третья статья', '2011-09-09', '<p>Третья статья.</p>'),
(4, 'Четвертая статья', '2011-09-20', '<p>Да, это четвертая статья.</p>'),
(5, 'Пятая статья', '2011-09-01', '<p>Пятая статья.</p>'),
(6, 'Шестая статья', '2011-09-08', '<p>Шестая статья</p>'),
(7, 'Седьмая статья', '2011-09-09', '<p>Седьмая статья.</p>'),
(8, 'Восьмая статья', '2011-09-20', '<p> Восьмая статья.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` char(100) NOT NULL,
  `date` date NOT NULL,
  `content` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`id`, `title`, `date`, `content`) VALUES
(1, 'Методика 1 обновлена', '2011-09-01', '<p>Добавили фичи</p>'),
(2, 'Методика 2 обновлена', '2011-09-01', '<p>Добавили фичи и убрали баги</p>'),
(3, 'Методика 3 обновлена', '2011-09-01', '<p>Добавили фичи, убрали баги, кота погладили</p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
