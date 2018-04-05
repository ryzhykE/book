-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 05 2018 г., 21:41
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mysite`
--

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `author_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id`, `title`, `description`, `text`, `img`, `author_id`) VALUES
(1, 'Роналду поделился своей магией', 'Звезда мадридского Реала Криштиану Роналду устроил сюрприз игрокам португальского Спортинга', 'Звезда мадридского Реала Криштиану Роналду устроил сюрприз игрокам португальского Спортинга накануне игры 1/4 финала Лиги Европы против Атлетико в Мадриде. Роналду посетил отель в Мадриде, где остановились игроки Спортинга и пожелал удачи, тогда как в португальском клубе верят, что магии Криштиану хватит команде для сенсации в матче с Атлетико.', 'Screenshot_20.png', 1),
(2, 'Кайри Ирвинг пропустит оставшиеся матчи сезона', 'Разыгрывающий Бостона Кайри Ирвинг не сыграет в оставшихся матчах сезона 2017/18.', 'По информации ESPN, игрок выбыл из-за проблем с коленом. Из-за болей в суставе в конце марта баскетболист перенес инвазивную хирургическую процедуру, после которой необходимо несколько недель восстановления.', 'Screenshot_21.png', 2),
(3, 'Украинские футболистки одержали вторую победу в отборочном турнире', 'Женская сборная Украины по футболу одержала вторую победу в отборочном турнире чемпионата мира-2019.\r\n', 'В своем третьем матче квалификации подопечные Владимира Ревы на выезде нанесли поражение команде Хорватии - 3:0. Разгром балканок начался после стандарта в исполнении Ольги Басанской на 25-й минуте, который завершился автоголом хорватки Матеи Бошняк. На последних минутах первого тайма дублем отличилась Татьяна Козыренко на 41-й минуте и на третьей дополнительной.', 'Screenshot_22.png', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
