-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 01 2023 г., 16:26
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
(1, 'Запчасти', 'parts', 'Обсуждаем различные запчасти и места, где их лучше закупать', 'cars'),
(2, 'Иномарки', 'foreign_cars', 'Иномарки обсуждаем, засираем, осуждаем.', 'cars');

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
  `thread_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `board`, `author`, `body`, `pic`, `date`, `thread_id`) VALUES
(20253, 'parts', 'lolik1', 'Ура, красивые id-шники!!!', 'uploads/posts_images/1682864675_1Ritsu.gif', '2023-04-30 17:24:35', 'self'),
(20254, 'parts', 'lolik1', 'Ура, красивые id-шники!!!', 'uploads/posts_images/1682864675_1Ritsu.gif', '2023-04-30 17:24:35', 'self'),
(20255, 'parts', 'lolik1', 'Ура, красивые id-шники!!!', 'uploads/posts_images/1682864675_1Ritsu.gif', '2023-04-30 17:24:35', 'self'),
(20256, 'parts', 'lolik1', 'Ура, красивые id-шники!!!', 'uploads/posts_images/1682864675_1Ritsu.gif', '2023-04-30 17:24:35', 'self'),
(20257, 'parts', 'lolik1', 'Ура, красивые id-шники!!!', 'uploads/posts_images/1682864675_1Ritsu.gif', '2023-04-30 17:24:35', 'self'),
(20258, 'parts', 'lolik1', 'Ура, красивые id-шники!!!', 'uploads/posts_images/1682864675_1Ritsu.gif', '2023-04-30 17:24:35', 'self'),
(20259, 'parts', 'lolik1', 'Ура, красивые id-шники!!!', 'uploads/posts_images/1682864675_1Ritsu.gif', '2023-04-30 17:24:35', 'self'),
(20260, 'parts', 'lolik1', 'Ура, красивые id-шники!!!', 'uploads/posts_images/1682864675_1Ritsu.gif', '2023-04-30 17:24:35', 'self'),
(20261, 'parts', 'lolik1', 'Ура, красивые id-шники!!!', 'uploads/posts_images/1682864675_1Ritsu.gif', '2023-04-30 17:24:35', 'self'),
(20262, 'parts', 'lolik1', 'Opa, nice dick!!!!', 'uploads/posts_images/1682865917_', '2023-04-30 17:45:17', 'self'),
(20263, 'parts', 'lolik1', 'Opa, nice dick!!!!', 'uploads/posts_images/1682866632_ARMMcRSWtCQ.jpg', '2023-04-30 17:57:12', 'self'),
(20264, 'parts', 'lolik1', 'Opa, nice dick!!!!', 'uploads/posts_images/1682866658_2гатс.jpg', '2023-04-30 17:57:38', 'self'),
(20265, 'parts', 'lolik1', 'Хуишки', '', '2023-04-30 17:58:32', '20254'),
(20266, 'parts', 'lolik1', 'Хуишники тогда уж', '', '2023-04-30 18:05:36', '20254'),
(20267, 'parts', 'supadmin', 'Спок, соевый, они пока бесполезны\r\n', '', '2023-05-01 12:02:36', '20253'),
(20268, 'parts', 'supadmin', 'дада', '', '2023-05-01 12:02:44', '20253'),
(20269, 'parts', 'supadmin', 'dfdvsdfvsdf', '', '2023-05-01 12:07:02', 'self'),
(20270, 'parts', 'supadmin', 'ядрён-батон', '', '2023-05-01 12:45:26', '20269'),
(20271, 'parts', 'supadmin', 'fvdavsdfvsdf', '', '2023-05-01 12:45:47', '20269'),
(20272, 'parts', 'supadmin', 'ffffffffffffffffff', '', '2023-05-01 12:46:27', '20269'),
(20273, 'parts', 'supadmin', 'fffffffffff', '', '2023-05-01 12:47:00', '20269'),
(20274, 'parts', 'supadmin', 'vzfdv', '', '2023-05-01 12:47:06', '20269'),
(20275, 'parts', 'supadmin', 'fvsdfvdfs', '', '2023-05-01 12:49:21', '20269'),
(20276, 'parts', 'supadmin', 'ffffffffffffffffffffff', '', '2023-05-01 12:51:37', '20269'),
(20277, 'parts', 'supadmin', 'ffffffffffffffffffffff', '', '2023-05-01 12:51:56', '20269'),
(20278, 'parts', 'supadmin', 'ffffffffffffffffffffff', '', '2023-05-01 12:52:44', '20269'),
(20279, 'parts', 'supadmin', 'ffffffffffffffffffffff', '', '2023-05-01 12:53:03', '20269'),
(20280, 'parts', 'supadmin', 'ffffffffffffffffffffff', '', '2023-05-01 12:54:35', '20269'),
(20281, 'parts', 'supadmin', 'ffffffffffffffffffffff', '', '2023-05-01 12:54:38', '20269'),
(20282, 'parts', 'supadmin', 'ffffffffffffffffffffff', '', '2023-05-01 12:55:03', '20269'),
(20283, 'parts', 'supadmin', 'ffffffffffffffffffffff', '', '2023-05-01 12:55:15', '20269'),
(20284, 'parts', 'supadmin', 'ffffffffffffffffffffff', '', '2023-05-01 12:55:18', '20269'),
(20285, 'parts', 'supadmin', 'ffffffffCCVAFD', '', '2023-05-01 12:55:26', '20269'),
(20286, 'parts', 'supadmin', 'ffffffffCCVAFD', '', '2023-05-01 12:56:30', '20269'),
(20287, 'parts', 'supadmin', 'ffffffffCCVAFD', '', '2023-05-01 12:56:44', '20269'),
(20288, 'parts', 'supadmin', 'ffffffffCCVAFD', '', '2023-05-01 12:57:01', '20269'),
(20289, 'parts', 'supadmin', 'ffffffffCCVAFD', '', '2023-05-01 12:57:12', '20269'),
(20290, 'parts', 'supadmin', 'fvfvzdfvzfvzfvzdfvzdfv', '', '2023-05-01 13:00:37', '20269'),
(20291, 'parts', 'supadmin', 'котик', 'uploads/posts_images/1682935363_02495c61b16366db3b299c787b109c5d.jpg', '2023-05-01 13:02:43', '20269'),
(20292, 'parts', 'supadmin', 'zdfvzdfvzfbadfbadfbadfb', '', '2023-05-01 13:04:47', '20269'),
(20293, 'parts', 'supadmin', 'zfdvdfvarvar', '', '2023-05-01 13:05:23', '20269'),
(20294, 'parts', 'supadmin', 'ccccccccccccccccccccc', '', '2023-05-01 13:06:00', '20269'),
(20310, 'parts', 'supadmin', '<a class=\"reply\">#20291</a>\r\n\r\nкрасивый котей', '', '2023-05-01 15:52:59', '20269'),
(20311, 'parts', 'supadmin', '<a class=\"reply\">#20294</a>\r\n\r\nну и хуета', '', '2023-05-01 16:08:28', '20269');

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
(1, 'Автомобили', 'cars');

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
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `hash` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `avatar`, `email`, `password`, `role`, `hash`) VALUES
(1, 'supadmin', 'uploads/users_images/1682669777_preview.png', 'supadmin@mail.ru', 'supadmin', 'user', ''),
(2, 'admin1', 'uploads/users_images/1682672418_1Ritsu.gif', 'admin@mail.ru', 'admin1', 'user', ''),
(3, 'admin2', 'uploads/users_images/1682672960_Anti-cringe sprey.jpg', 'admin2@mail.ru', 'admin2', 'user', ''),
(4, 'lolik1', 'uploads/users_images/1682767275_гас.png', 'lolik@mail.ru', 'lolik1', 'user', '');

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20312;

--
-- AUTO_INCREMENT для таблицы `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`author`) REFERENCES `users` (`login`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
