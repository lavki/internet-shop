-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Час створення: Січ 18 2018 р., 11:30
-- Версія сервера: 5.7.20-log
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
-- База даних: `market-shop`
--

-- --------------------------------------------------------

--
-- Структура таблиці `color`
--

CREATE TABLE `color` (
  `article` int(10) UNSIGNED NOT NULL,
  `color` varchar(50) NOT NULL,
  `price` decimal(7,2) NOT NULL DEFAULT '0.00',
  `size_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `color`
--

INSERT INTO `color` (`article`, `color`, `price`, `size_id`) VALUES
(101, 'white', '150.00', 1),
(102, 'black', '350.00', 4),
(103, 'dark navy', '370.00', 4),
(105, 'black', '499.99', 5),
(106, 'red', '100.00', 6);

-- --------------------------------------------------------

--
-- Структура таблиці `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `product`
--

INSERT INTO `product` (`id`, `name`) VALUES
(1, 'T-shirt Сlassic'),
(2, 'Jacket'),
(3, 'Shoes'),
(4, 'Belt');

-- --------------------------------------------------------

--
-- Структура таблиці `size`
--

CREATE TABLE `size` (
  `id` int(10) UNSIGNED NOT NULL,
  `size` char(5) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `size`
--

INSERT INTO `size` (`id`, `size`, `product_id`) VALUES
(1, 's', 1),
(2, 'm', 1),
(3, 'l', 1),
(4, 'xl', 2),
(5, '43', 3),
(6, 'l', 4);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`article`);

--
-- Індекси таблиці `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `color`
--
ALTER TABLE `color`
  MODIFY `article` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT для таблиці `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `size`
--
ALTER TABLE `size`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
