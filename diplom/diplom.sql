-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 08 2023 г., 21:53
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `diplom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `boards`
--

CREATE TABLE `boards` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `theme` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `boards`
--

INSERT INTO `boards` (`id`, `name`, `value`, `description`, `theme`) VALUES
(1, 'Картины🎨', 'paintings', 'Обсуждаем классических и современных художников и их произведения', 'visual_art'),
(2, 'Фотография📷', 'photo', 'Обсуждаем фотографов  и их фотокарточки  ', 'visual_art'),
(3, 'Скульптура🗽', 'sculpture', 'Обсуждаем скульптуры, барельефы и прочее', 'visual_art'),
(4, 'Классика🎻', 'classic', 'Классическая музыка, её авторы и исполнители. ', 'music'),
(5, 'Джаз🎷', 'jazz', 'Обсуждаем джаз и его ответвления', 'music');

-- --------------------------------------------------------

--
-- Структура таблицы `offers`
--

CREATE TABLE `offers` (
  `id` int NOT NULL,
  `theme` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `board` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pic` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `thread_id` varchar(255) NOT NULL,
  `ban` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `board`, `author`, `body`, `pic`, `date`, `thread_id`, `ban`) VALUES
(2246, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2247, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2248, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2249, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2250, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2251, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2252, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2253, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2254, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2255, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2256, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2257, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2258, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2259, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2260, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2261, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2262, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2263, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2264, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2265, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2266, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2267, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2268, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2269, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2270, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2271, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2272, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2273, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2274, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2275, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2276, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2277, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2278, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2279, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2280, 'paintings', 'masteradmin', 'fhdhxfgjxfgj', '', '2023-06-08 14:05:05', 'self', '0'),
(2281, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2282, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2283, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2284, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2285, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2286, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2287, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2288, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2289, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2290, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2291, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2292, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2293, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2294, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2295, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2296, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2297, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2298, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2299, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2300, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2301, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2302, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2303, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2304, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2305, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2306, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2307, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2308, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2309, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2310, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2311, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2312, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2313, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2314, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0'),
(2315, 'paintings', 'masteradmin', '<span class=\"reply\">#2280</span>\r\n\r\ngmfhxfghxmf', '', '2023-06-08 14:05:09', '2280', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `themes`
--

CREATE TABLE `themes` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `themes`
--

INSERT INTO `themes` (`id`, `name`, `value`) VALUES
(1, 'Изобразительное искусство', 'visual_art'),
(2, 'Музыка', 'music');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `login` varchar(250) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `reg` date NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `hash` varchar(250) NOT NULL,
  `ban` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `avatar`, `email`, `password`, `reg`, `role`, `hash`, `ban`) VALUES
(1, 'masteradmin', 'uploads/users_images/1685288538__tPWx6ejhXU.jpg', 'maxloh2007@gmail.com', 'c0a9dff168485ea56640b36eb19077d7b8f87f4f', '2023-03-21', 'mastadmin', 'a60393892b6ddb717cfbda3a99263b1ff8c8d5c6832af0ed827c17ad9a0d5c28', '0'),
(2, 'basedChad2007', 'assets/images/user_icon.png', 'based@chad.com', 'f7c7415a3009d95a60fa2a9dd1b5e671a45432be', '2023-05-28', 'user', '', '0'),
(3, 'user02', 'uploads/users_images/1686139593_Anti-cringe_sprey.jpg', 'user02@mail.ru', 'a7659675668c2b34f0a456dbaa508200340dc36c', '2023-06-07', 'user', '', '1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `value` (`value`),
  ADD KEY `theme` (`theme`);

--
-- Индексы таблицы `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `board` (`board`),
  ADD KEY `author` (`author`);

--
-- Индексы таблицы `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `value` (`value`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `boards`
--
ALTER TABLE `boards`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2316;

--
-- AUTO_INCREMENT для таблицы `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `boards`
--
ALTER TABLE `boards`
  ADD CONSTRAINT `boards_ibfk_1` FOREIGN KEY (`theme`) REFERENCES `themes` (`value`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`board`) REFERENCES `boards` (`value`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`author`) REFERENCES `users` (`login`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
