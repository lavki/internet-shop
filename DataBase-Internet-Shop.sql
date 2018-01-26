-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Час створення: Січ 26 2018 р., 04:41
-- Версія сервера: 5.7.21-log
-- Версія PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `internet-shop`
--

-- --------------------------------------------------------

--
-- Структура таблиці `modification`
--

CREATE TABLE `modification` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `size` varchar(5) NOT NULL,
  `color` varchar(50) NOT NULL,
  `article` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `modification`
--

INSERT INTO `modification` (`product_id`, `size`, `color`, `article`) VALUES
(1, 's', 'white', 1001),
(1, 'm', 'white', 1002),
(1, 'l', 'white', 1003),
(2, 'xl', '#6ca6d8', 1004),
(2, 'xl', 'chocolate', 1005),
(3, '43', 'purple', 1006),
(4, 'l', 'orange', 1007),
(5, 's', 'white', 1008),
(5, 's', 'orange', 1009),
(5, 's', 'yellowgreen', 1010),
(5, 'm', 'white', 1011),
(5, 'm', 'orange', 1012),
(5, 'm', 'yellowgreen', 1013),
(5, 'l', 'white', 1014),
(5, 'l', 'orange', 1015),
(5, 'l', 'yellowgreen', 1016),
(5, 'xl', 'white', 1017),
(5, 'xl', 'orange', 1018),
(5, 'xl', 'yellowgreen', 1019),
(5, 'xxl', 'green', 1020),
(5, 'xl', 'tomato', 1021);

-- --------------------------------------------------------

--
-- Структура таблиці `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(7,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `product`
--

INSERT INTO `product` (`id`, `name`, `price`) VALUES
(1, 'Shirt Сlassic', '150.00'),
(2, 'Jacket', '300.00'),
(3, 'Shoes', '499.99'),
(4, 'Belt', '100.00'),
(5, 'T-Shirt', '50.00');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `modification`
--
ALTER TABLE `modification`
  ADD PRIMARY KEY (`article`);

--
-- Індекси таблиці `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `modification`
--
ALTER TABLE `modification`
  MODIFY `article` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1022;

--
-- AUTO_INCREMENT для таблиці `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
