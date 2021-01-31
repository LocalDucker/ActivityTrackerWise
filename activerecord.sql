-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Січ 31 2021 р., 22:02
-- Версія сервера: 10.3.22-MariaDB
-- Версія PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `activerecord`
--

-- --------------------------------------------------------

--
-- Структура таблиці `activity_types`
--

CREATE TABLE `activity_types` (
  `id` int(11) NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `activity_types`
--

INSERT INTO `activity_types` (`id`, `type`) VALUES
(1, 'run'),
(2, 'ride');

-- --------------------------------------------------------

--
-- Структура таблиці `generalinfo`
--

CREATE TABLE `generalinfo` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `activity_type_id` int(11) NOT NULL,
  `distance` int(11) NOT NULL,
  `timeactivity` varchar(255) NOT NULL,
  `averagespeed` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `generalinfo`
--

INSERT INTO `generalinfo` (`id`, `date`, `activity_type_id`, `distance`, `timeactivity`, `averagespeed`) VALUES
(1, '2021-01-31', 2, 3213, '1 Days 0 Hours 0 Seconds', 133.88),
(2, '2021-01-31', 1, 555, '1 Days 0 Hours 0 Seconds', 0.02),
(3, '2021-01-31', 1, 43434, '1 Days 0 Hours 0 Seconds', 1.81),
(4, '2021-01-31', 1, 545, '7 Days 0 Hours 5 Seconds', 0),
(5, '2021-01-31', 1, 888, '7 Days 0 Hours 0 Seconds', 0.01),
(6, '2021-01-31', 2, 55, '7 Days 0 Hours 0 Seconds', 0),
(7, '2021-01-31', 1, 888, '7 Days 0 Hours 0 Seconds', 0.01),
(8, '2021-01-31', 1, 332323, '4 Days 0 Hours 0 Seconds', 3.46),
(9, '2021-01-31', 1, 888, '7 Days 0 Hours 0 Seconds', 0.01),
(10, '2021-01-31', 1, 323, '7 Days 0 Hours 0 Seconds', 0),
(11, '2021-01-31', 1, 1111, '7 Days 0 Hours 0 Seconds', 0.01),
(12, '2021-01-31', 1, 32323, '7 Days 0 Hours 0 Seconds', 0.19),
(13, '2021-01-31', 2, 123, '7 Days 0 Hours 0 Seconds', 0);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `activity_types`
--
ALTER TABLE `activity_types`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `generalinfo`
--
ALTER TABLE `generalinfo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_type_id` (`activity_type_id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `activity_types`
--
ALTER TABLE `activity_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `generalinfo`
--
ALTER TABLE `generalinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
