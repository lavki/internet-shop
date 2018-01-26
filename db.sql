-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Час створення: Січ 18 2018 р., 10:37
-- Версія сервера: 5.7.18
-- Версія PHP: 7.1.1

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
-- Структура таблиці `color`
--

CREATE TABLE `color` (
  `id` int(10) UNSIGNED NOT NULL,
  `article` int(10) UNSIGNED NOT NULL,
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `color`
--

INSERT INTO `color` (`id`, `article`, `color`) VALUES
(101, 1, 'white'),
(102, 2, 'black'),
(103, 2, 'dark navy'),
(104, 3, 'black'),
(105, 4, 'red');

-- --------------------------------------------------------

--
-- Структура таблиці `product`
--

CREATE TABLE `product` (
  `article` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(7,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `product`
--

INSERT INTO `product` (`article`, `name`, `price`) VALUES
(1, 'T-shirt Сlassic', '150.00'),
(2, 'Jacket', '750.00'),
(3, 'Shoes', '499.99'),
(4, 'Belt', '100.00');

-- --------------------------------------------------------

--
-- Структура таблиці `size`
--

CREATE TABLE `size` (
  `id` int(10) UNSIGNED NOT NULL,
  `article` int(10) UNSIGNED NOT NULL,
  `size` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `size`
--

INSERT INTO `size` (`id`, `article`, `size`) VALUES
(101, 1, 's'),
(102, 1, 'm'),
(103, 1, 'l'),
(104, 2, 'xl'),
(105, 3, '43'),
(106, 4, 'l');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`article`),
  ADD KEY `name` (`name`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT для таблиці `product`
--
ALTER TABLE `product`
  MODIFY `article` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблиці `size`
--
ALTER TABLE `size`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
