-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Час створення: Лют 16 2023 р., 16:17
-- Версія сервера: 5.7.34
-- Версія PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `auction`
--

-- --------------------------------------------------------

--
-- Структура таблиці `bid_list`
--

CREATE TABLE `bid_list` (
  `bid_id` int(155) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `bid` float DEFAULT NULL,
  `bid_time` datetime DEFAULT NULL,
  `bid_contact` varchar(255) NOT NULL,
  `bid_phone` varchar(255) NOT NULL,
  `show_my_name` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `bid_list`
--

INSERT INTO `bid_list` (`bid_id`, `name`, `bid`, `bid_time`, `bid_contact`, `bid_phone`, `show_my_name`) VALUES
(32, 'ÐŸÐ¾Ñ‡Ð°Ñ‚ÐºÐ¾Ð²Ð° ÑÑ‚Ð°Ð²ÐºÐ° / Initial bid', 2000, '2022-10-06 15:58:11', 'alexandr.rybchinskij@gmail.com', '0637025256', 'on'),
(33, 'ÐÐ»ÐµÐºÑÐµÐ¹', 5000, '2022-10-06 16:01:23', 'onufriy47@gmail.com', '+380(93)582-45-56', 'on'),
(34, 'Ð’ÑÑ‡ÐµÑÐ»Ð°Ð²', 6000, '2022-10-07 11:38:50', 'slavik180419990@ukr.net', '0638804058', 'on'),
(35, 'Craig Atkins', 6475, '2022-10-08 15:30:45', 'Rocketbridges@gmail.com', '9792480591', 'on'),
(36, 'Ð’ÑÑ‡ÐµÑÐ»Ð°Ð² ', 6700, '2022-10-08 18:34:36', 'slavik180419990@ukr.net', '0638804058', 'on'),
(37, 'Ð’Ð¾Ð»Ð¾Ð´Ð¸Ð¼Ð¸Ñ€', 10000, '2022-10-08 20:57:08', 'mironov35@ukr.net', '+38 (066) 322-57-90', 'on'),
(38, 'Рибчинський Олександр', 10001, '2022-12-22 20:26:25', 'alexandr.rybchinskij@gmail.com', '+380637025256', 'on');

-- --------------------------------------------------------

--
-- Структура таблиці `currency`
--

CREATE TABLE `currency` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `currency` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `currency`
--

INSERT INTO `currency` (`id`, `name`, `currency`) VALUES
(1, 'USD', 37);

-- --------------------------------------------------------

--
-- Структура таблиці `params`
--

CREATE TABLE `params` (
  `id` int(11) NOT NULL,
  `param` varchar(11) DEFAULT NULL,
  `value` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `params`
--

INSERT INTO `params` (`id`, `param`, `value`) VALUES
(1, 'login', 'All4Ukraine'),
(2, 'pass', 'passw');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `bid_list`
--
ALTER TABLE `bid_list`
  ADD PRIMARY KEY (`bid_id`);

--
-- Індекси таблиці `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `params`
--
ALTER TABLE `params`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `bid_list`
--
ALTER TABLE `bid_list`
  MODIFY `bid_id` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблиці `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблиці `params`
--
ALTER TABLE `params`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
