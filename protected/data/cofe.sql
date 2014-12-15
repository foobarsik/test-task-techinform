-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 24 2014 г., 12:59
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `cofe`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_bludo`
--

CREATE TABLE IF NOT EXISTS `tbl_bludo` (
  `id_bludo` int(11) NOT NULL AUTO_INCREMENT,
  `bludoname` varchar(30) NOT NULL,
  `kategoriya` varchar(20) NOT NULL,
  `bludodate` date NOT NULL,
  `info` text NOT NULL,
  PRIMARY KEY (`id_bludo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `tbl_bludo`
--

INSERT INTO `tbl_bludo` (`id_bludo`, `bludoname`, `kategoriya`, `bludodate`, `info`) VALUES
(1, 'sup', 'pervoe', '2011-11-01', 'Состав:\n    50 г сливочного масла,\n    1 ст л оливкового масла,\n    2 кг лука,\n    1 ч л чабреца (он же тимьян),\n    1 ч л сахара,\n    1.5 л говяжьего бульона,\n    1 ст л муки,\n    150 мл сухого белого вина,\n    3 ст ложки бренди.\n'),
(2, 'борщ', 'pervoe', '2011-11-01', 'Хотел как всегда, а получилось еще хуже.'),
(3, 'вермишель по флотски', 'второе', '2011-11-01', 'Вызывает желание покинуть этот мир самым болезненным способом.'),
(4, 'картофель жареный', 'второе', '2011-10-27', 'Состав: картофель, масло подсолнечное, соль'),
(5, 'чай черный', 'третье', '2011-10-11', 'Шутки про php появились в период, когда язык был пригоден лишь для генерации html-страниц. С тех пор язык вырос, а песочница шутников всё шумит.'),
(6, 'кофе нескафе', 'третье', '2011-10-18', 'Родной город: в активном поиске. '),
(8, 'шоколадное мороженое', 'десерт', '2011-11-02', 'Шоколадное мороженое "Мовенпик" - это изысканное лакомство из Швейцарии, которое отличается премиальным качеством и изумительным вкусом. Содержит только тщательно отобранные, натуральные ингредиенты. Мороженое произведет на вас незабываемое впечатление.\n\nСостав: cливки, сыворотка молочная восстновленная, молочный напиток, сахар, какао-порошок, глюкоза, какао тертое, масло подсолнчное, молочный белок, глюкозный сироп, крахмал, яичный желток, какао масло, молоко сухое обезжиренное, крахмал, пищевые волокна (из цитрусовых), соль, ароматизатор натуральный (молочный).'),
(9, 'солянка', 'pervoe', '2014-11-20', 'Состав: мясо куриное, вода, соленые огурцы, лук, томат, вареные почки, колбасы нескольких сортов, маслины, лимон, сметана'),
(10, 'плов', 'второе', '2014-11-20', ' Сильная привязанность к люстре убивает.'),
(11, 'шоколадный десерт с ликером', 'десерт', '2014-11-20', 'Вызывает желание покинуть этот мир самым болезненным способом.'),
(12, 'компот', 'третье', '2014-11-20', 'Трудолюбие - мать удачи.');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_mymenu`
--

CREATE TABLE IF NOT EXISTS `tbl_mymenu` (
  `id_mymenu` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_bludo` int(11) NOT NULL,
  PRIMARY KEY (`id_mymenu`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Дамп данных таблицы `tbl_mymenu`
--

INSERT INTO `tbl_mymenu` (`id_mymenu`, `id_user`, `id_bludo`) VALUES
(33, 27, 9),
(27, 27, 11),
(35, 27, 10),
(34, 27, 12);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) DEFAULT NULL,
  `pass` varchar(128) NOT NULL,
  `email` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `role` varchar(10) DEFAULT 'user',
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Дамп данных таблицы `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `pass`, `email`, `address`, `tel`, `role`) VALUES
(1, 'Дима', '555', '', '', '52253', 'user'),
(2, 'Леха', '111', '', '', '', 'admin'),
(18, 'Сина', '222', 'aw@ds.ru', 'sdfsddfs', '456456', 'user'),
(26, 'admin', '58199c36e37acca7b05e7178261b0110', 'jeanniegold@mail.ru''', 'qwerty', '223455', 'admin'),
(27, 'Olga', 'efbf5559a59dbb0c19387e332343f324', 'cmila@mail.ru', '45y46545y', '5456465', 'user'),
(28, 'New', 'c40e9cdcb34e03febdaac44e27606225', 'new@mail.ru', '4egtw4r5g4', '645645', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
