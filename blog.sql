-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 26 2016 г., 21:32
-- Версия сервера: 5.7.16-0ubuntu0.16.04.1
-- Версия PHP: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`) VALUES
(1, 'Срочник сбежал из воинской части в Ленинградской области', 'В Ленинградской области солдат-срочник самовольно покинул воинскую часть. Об этом порталу 47news в субботу, 26 ноября, сообщил источник в правоохранительных органах.Побег 19-летний Дмитрий Черкащенко совершил в ночь на 25 ноября. По предварительным данным, при себе оружия у него не было. Первые трое суток его действия квалифицируются как самовольный уход.Молодой человек был призван в апреле этого года из поселка Варгаши в Курганской области. Как заявила порталу его мать, Черкащенко был призван с ограничениями по физическим нагрузкам, у него аритмия и тахикардия. «Вчера позвонили из части, сказали, ищут Диму», — сообщила она.Воинская часть, в которой он проходил службу, располагается в деревне Гостилицы Ломоносовского района. Здесь дислоцируется 333-й радиотехнический полк.'),
(2, 'Трамп — татарин, а Обама — еврей', 'Ежедневно в интернете публикуют сотни фейковых новостей, слухов, домыслов и гипотез! Одна из любимых тем сетевых троллей — версии происхождения известных политиков. Их национальностью в сети манипулируют в зависимости от политической конъюнктуры. Нередко теории в стиле «на самом деле Гитлер был арабом» для пущей убедительности стилизуют под научные исследования, хотя большинство из них — пустые выдумки, в которые тем не менее верят тысячи вроде бы здравомыслящих граждан. «Лента.ру» изучила эти теории и попыталась убедиться в том, что Обама — настоящий еврей, а Трамп — потомок Рюрика.');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
