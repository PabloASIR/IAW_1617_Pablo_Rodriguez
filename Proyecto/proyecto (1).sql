-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-02-2017 a las 09:57:22
-- Versión del servidor: 5.5.53-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chapters`
--

CREATE TABLE IF NOT EXISTS `chapters` (
  `chapter_id` int(5) NOT NULL AUTO_INCREMENT,
  `chapter_season` int(2) NOT NULL,
  `chapter_name` varchar(24) NOT NULL,
  `chapter_date_release` date NOT NULL,
  `serie_id` int(5) NOT NULL,
  `chapter_number` int(11) NOT NULL,
  PRIMARY KEY (`chapter_id`),
  KEY `serie_id` (`serie_id`),
  KEY `serie_id_2` (`serie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `chapters`
--

INSERT INTO `chapters` (`chapter_id`, `chapter_season`, `chapter_name`, `chapter_date_release`, `serie_id`, `chapter_number`) VALUES
(4, 1, 'Mad Max', '2016-02-09', 2, 1),
(5, 1, 'El niÃ±o resucitado', '2016-10-13', 2, 2),
(6, 1, 'El huerto de calabazas', '2016-03-22', 2, 3),
(7, 1, 'El palacio', '2016-10-13', 2, 4),
(9, 1, 'el primero', '2017-02-02', 7, 1),
(10, 1, 'el segundo', '2017-02-24', 7, 2),
(11, 1, 'el tercero a', '2017-02-22', 7, 4),
(13, 1, 'piloto', '2017-02-09', 8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `films`
--

CREATE TABLE IF NOT EXISTS `films` (
  `film_id` int(5) NOT NULL AUTO_INCREMENT,
  `film_gender` varchar(25) NOT NULL,
  `film_name` varchar(50) NOT NULL,
  `film_sinopsis` varchar(800) NOT NULL,
  `film_duration` int(3) NOT NULL,
  `film_trailer` varchar(150) NOT NULL,
  `film_date_release` date NOT NULL,
  `film_image` varchar(80) NOT NULL,
  PRIMARY KEY (`film_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `films`
--

INSERT INTO `films` (`film_id`, `film_gender`, `film_name`, `film_sinopsis`, `film_duration`, `film_trailer`, `film_date_release`, `film_image`) VALUES
(1, 'animation', 'Brave (Indomable)', 'Determined to make her own path in life, Princess Merida defies a custom that brings chaos to her kingdom. Granted one wish, Merida must rely on her bravery and her archery skills to undo a beastly curse. ', 93, 'https://www.youtube.com/watch?v=TEHWDA_6e3M', '2012-10-12', 'img/brave.jpg'),
(2, 'aventure', 'avatar', 'A paraplegic marine dispatched to the moon Pandora on a unique mission becomes torn between following his orders and protecting the world he feels is his home. ', 148, 'https://www.youtube.com/watch?v=kbA9TfGphOI', '2009-10-10', 'img/avatar.jpg'),
(3, 'musical', 'La La Land', ' A jazz pianist falls for an aspiring actress in Los Angeles. ', 133, 'https://www.youtube.com/watch?v=0pdqf4P9MB8', '2000-01-01', 'img/lalaland.jpg'),
(5, 'science fiction', 'Rogue One', 'The Rebel Alliance makes a risky move to steal the plans for the Death Star, setting up the epic saga to follow. ', 133, 'https://www.youtube.com/watch?v=0pdqf4P9MB8', '2017-02-03', 'img/rougeone.jpg'),
(8, 'Unintentional comedy', 'Batman v Superman', 'Fearing that the actions of Superman are left unchecked, Batman takes on the Man of Steel, while the world wrestles with what kind of a hero it really needs. ', 120, 'https://www.youtube.com/watch?v=Vzi5Q5aIGJU', '2016-03-25', 'img/batmanvssuperman.jpg'),
(9, 'adventure', 'Harry Potter 1', 'Rescued from the outrageous neglect of his aunt and uncle, a young boy with a great destiny proves his worth while attending Hogwarts School of Witchcraft and Wizardry. ', 74, 'https://www.youtube.com/watch?v=UVMibecR6cY', '2001-07-16', 'img/harrypotter1.jpg'),
(10, 'Action', 'Inception', ' A thief, who steals corporate secrets through use of dream-sharing technology, is given the inverse task of planting an idea into the mind of a CEO. ', 148, 'https://www.youtube.com/watch?v=66TuSJo4dZM', '2010-07-16', 'img/inception.jpg'),
(11, 'Unintentional comedy', 'Daredevil', 'A man blinded by toxic waste which also enhanced his remaining senses fights crime as an acrobatic martial arts superhero. ', 103, 'https://www.youtube.com/watch?v=LmP3YFk_YHA', '2003-02-14', 'img/daredevil.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `link_id` int(5) NOT NULL AUTO_INCREMENT,
  `link_url` varchar(150) NOT NULL,
  `link_server` varchar(12) NOT NULL,
  `film_id` int(5) DEFAULT NULL,
  `chapter_id` int(5) DEFAULT NULL,
  PRIMARY KEY (`link_id`),
  KEY `film_id` (`film_id`),
  KEY `chapter_id` (`chapter_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news_films`
--

CREATE TABLE IF NOT EXISTS `news_films` (
  `news_film_id` int(5) NOT NULL AUTO_INCREMENT,
  `news_film_info` varchar(650) NOT NULL,
  `news_film_image` varchar(80) NOT NULL,
  `news_film_title` varchar(24) NOT NULL,
  `news_film_date` date NOT NULL,
  `news_film_url` varchar(150) NOT NULL,
  `film_id` int(5) NOT NULL,
  PRIMARY KEY (`news_film_id`),
  KEY `film_id` (`film_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news_series`
--

CREATE TABLE IF NOT EXISTS `news_series` (
  `news_serie_id` int(5) NOT NULL AUTO_INCREMENT,
  `news_serie_info` varchar(650) NOT NULL,
  `news_serie_image` varchar(80) NOT NULL,
  `news_serie_title` varchar(24) NOT NULL,
  `news_serie_date` date NOT NULL,
  `news_serie_url` varchar(150) NOT NULL,
  `serie_id` int(5) NOT NULL,
  PRIMARY KEY (`news_serie_id`),
  KEY `serie_id` (`serie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rate_films`
--

CREATE TABLE IF NOT EXISTS `rate_films` (
  `user_id` int(5) NOT NULL,
  `film_id` int(5) NOT NULL,
  `comments` varchar(650) NOT NULL,
  `grade` int(2) NOT NULL,
  PRIMARY KEY (`user_id`,`film_id`),
  KEY `user_id` (`user_id`),
  KEY `film_id` (`film_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rate_series`
--

CREATE TABLE IF NOT EXISTS `rate_series` (
  `user_id` int(5) NOT NULL,
  `serie_id` int(5) NOT NULL,
  `comments` varchar(650) NOT NULL,
  `grade` int(2) NOT NULL,
  PRIMARY KEY (`user_id`,`serie_id`),
  KEY `user_id` (`user_id`),
  KEY `serie_id` (`serie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rate_series`
--

INSERT INTO `rate_series` (`user_id`, `serie_id`, `comments`, `grade`) VALUES
(8, 2, 'asdasdasdasdas', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `see_chapters`
--

CREATE TABLE IF NOT EXISTS `see_chapters` (
  `chapter_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `saw` tinyint(1) NOT NULL,
  PRIMARY KEY (`chapter_id`,`user_id`),
  KEY `chapter_id` (`chapter_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `see_films`
--

CREATE TABLE IF NOT EXISTS `see_films` (
  `user_id` int(5) NOT NULL,
  `film_id` int(5) NOT NULL,
  `saw` tinyint(4) NOT NULL,
  PRIMARY KEY (`user_id`,`film_id`),
  KEY `user_id` (`user_id`),
  KEY `film_id` (`film_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series`
--

CREATE TABLE IF NOT EXISTS `series` (
  `serie_id` int(5) NOT NULL AUTO_INCREMENT,
  `serie_name` varchar(18) NOT NULL,
  `serie_gender` varchar(25) NOT NULL,
  `serie_sinopsis` varchar(650) NOT NULL,
  `serie_trailer` varchar(150) NOT NULL,
  `serie_date_release` date NOT NULL,
  `serie_image` varchar(80) NOT NULL,
  PRIMARY KEY (`serie_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `series`
--

INSERT INTO `series` (`serie_id`, `serie_name`, `serie_gender`, `serie_sinopsis`, `serie_trailer`, `serie_date_release`, `serie_image`) VALUES
(2, 'Stranger Things', 'terror', 'When a young boy disappears, his mother, a police chief, and his friends must confront terrifying forces in order to get him back. ', 'https://www.youtube.com/watch?v=udmlXQj4new', '2016-01-01', './img/strangerthings.jpg'),
(7, 'Black Mirror', 'science fict', 'A television anthology series that shows the dark side of life and technology.', 'https://www.youtube.com/watch?v=jROLrhQkK78', '2010-01-01', 'img/blackmirror.jpg'),
(8, 'Arrow ', 'action ', 'Spoiled billionaire playboy Oliver Queen is missing and presumed dead when his yacht is lost at sea. He returns five years later a changed man, determined to clean up the city as a hooded vigilante armed with a bow.', 'https://www.youtube.com/watch?v=0pdqf4P9MB8', '2012-01-01', 'img/arrow.jpg'),
(9, 'Game of Thrones ', 'fantasy', 'Nine noble families fight for control over the mythical lands of Westeros. Meanwhile, a forgotten race hell-bent on destruction returns after being dormant for thousands of years.', 'https://www.youtube.com/watch?v=iGp_N3Ir7Do', '2011-01-01', 'img/gameofthrones.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(5) NOT NULL AUTO_INCREMENT,
  `user_pass` varchar(64) NOT NULL,
  `user_login` varchar(12) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_nicename` varchar(12) NOT NULL DEFAULT 'user',
  `user_language` varchar(12) NOT NULL,
  `user_image` varchar(80) NOT NULL DEFAULT './img/default.png',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email` (`user_email`),
  UNIQUE KEY `user_login` (`user_login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `user_pass`, `user_login`, `user_email`, `user_nicename`, `user_language`, `user_image`) VALUES
(1, 'f8032d5cae3de20fcec887f395ec9a6a', 'root', 'root@sefilms.es', 'admin', 'Spanish', 'img/root.jpg'),
(2, 'f8032d5cae3de20fcec887f395ec9a6a', 'pablo', 'pablosasser@gmail.com', 'user', 'English', 'img/wallpaper.png'),
(8, 'f8032d5cae3de20fcec887f395ec9a6a', 'pekechis', 'pekechis@gmail.com', 'banned', 'English', './img/default.png');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `chapters_ibfk_1` FOREIGN KEY (`serie_id`) REFERENCES `series` (`serie_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `links`
--
ALTER TABLE `links`
  ADD CONSTRAINT `links_ibfk_1` FOREIGN KEY (`film_id`) REFERENCES `films` (`film_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `links_ibfk_2` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`chapter_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `news_films`
--
ALTER TABLE `news_films`
  ADD CONSTRAINT `news_films_ibfk_1` FOREIGN KEY (`film_id`) REFERENCES `films` (`film_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `news_series`
--
ALTER TABLE `news_series`
  ADD CONSTRAINT `news_series_ibfk_1` FOREIGN KEY (`serie_id`) REFERENCES `series` (`serie_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rate_films`
--
ALTER TABLE `rate_films`
  ADD CONSTRAINT `rate_films_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rate_films_ibfk_2` FOREIGN KEY (`film_id`) REFERENCES `films` (`film_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rate_series`
--
ALTER TABLE `rate_series`
  ADD CONSTRAINT `rate_series_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rate_series_ibfk_2` FOREIGN KEY (`serie_id`) REFERENCES `series` (`serie_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `see_chapters`
--
ALTER TABLE `see_chapters`
  ADD CONSTRAINT `see_chapters_ibfk_1` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`chapter_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `see_chapters_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `see_films`
--
ALTER TABLE `see_films`
  ADD CONSTRAINT `see_films_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `see_films_ibfk_2` FOREIGN KEY (`film_id`) REFERENCES `films` (`film_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
