-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 03 2021 г., 14:32
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `avtobezugona`
--

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `parent_id` int(2) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(32) NOT NULL,
  `description` varchar(256) NOT NULL,
  `contentblock` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `name`, `parent_id`, `title`, `url`, `description`, `contentblock`) VALUES
(1, 'Главная', 0, 'Что такое противоугонная маркировка стекол и как она работает', '', 'Здесь Вы можете узнать о том, почему противоугонная маркировка автомобилей является надежной защитой автомобиля от угона и как ее можно сделать', 'glavnaya'),
(2, 'Статистика угонов', 0, 'Статистика угонов', 'statistika-ugonov', 'Для того, чтобы оценить степень риска для своего автомобиля, здесь можно ознакомиться с обзорным анализом угона автомобилей за разные периоды времени', 'stati'),
(3, 'Способы маркировки', 0, 'Способы противоугонной маркировки стекол автомобиля и стоимость ее выполнения', 'sposobi-markirovki', 'Здесь вы узнаете каким способом можно сделать противоугонную маркировку своего автомобиля и какой будет стоимость такого средства защиты от угона', 'righting'),
(4, 'Получить скидку', 0, 'Оnline-заявка на получение скидки при установке противоугонных систем автомобиля', 'poluchity-skidku', 'Здесь можно оформить онлайн заказ и получить скидку на установку противоугонной маркировки стекол автомобиля', 'action'),
(5, 'Контакты', 0, 'Контакты', 'kontakti', 'Здесь можно найти контактную информацию, а также в форме обратной связи передать информацию по вопросам, обращениям и деловым предложениям', 'contacts'),
(6, 'Угоны за 2017 год', 2, 'Угоны автомобилей за 2017 год', 'ugon-avtomobilej-2017', 'Статистика угонов за 2017 год', 'stati/2017'),
(7, 'Угоны за 2018 год', 2, 'Угоны автомобилей за 2018 год', 'ugon-avtomobilej-2018', 'Статистика угонов за 2018 год', 'stati/2018'),
(8, 'Угоны за 2019 год', 2, 'Угоны автомобилей за 2019 год', 'ugon-avtomobilej-2019', 'Статистика угонов за 2019 год', 'stati/2019'),
(9, 'Угоны за 2020 год', 2, 'Угоны автомобилей за 2020 год', 'ugon-avtomobilej-2020', 'Статистика угонов за 2020 год', 'stati/2020');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
