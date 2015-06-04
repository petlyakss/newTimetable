-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 09 2015 г., 11:17
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.4.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `timetable_znu`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cathedra`
--

CREATE TABLE IF NOT EXISTS `cathedra` (
  `cathedra_id` int(3) NOT NULL AUTO_INCREMENT,
  `cathedra_name` varchar(150) NOT NULL,
  `id_edbo` int(11) NOT NULL,
  `id_deanery` int(11) NOT NULL,
  `id_faculty` int(2) NOT NULL,
  PRIMARY KEY (`cathedra_id`),
  KEY `id_faculty` (`id_faculty`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `cathedra`
--

INSERT INTO `cathedra` (`cathedra_id`, `cathedra_name`, `id_edbo`, `id_deanery`, `id_faculty`) VALUES
(1, 'Математичного моделювання', 0, 0, 1),
(3, 'Математичного аналізу', 0, 0, 1),
(4, 'Українознавства', 0, 0, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `classrooms`
--

CREATE TABLE IF NOT EXISTS `classrooms` (
  `classrooms_id` int(4) NOT NULL AUTO_INCREMENT,
  `classrooms_number` varchar(4) NOT NULL,
  `id_housing` tinyint(1) NOT NULL,
  `seats` int(4) NOT NULL,
  `comp_number` int(3) NOT NULL,
  `options` varchar(100) NOT NULL,
  `is_public` tinyint(1) NOT NULL,
  PRIMARY KEY (`classrooms_id`),
  KEY `id_housing` (`id_housing`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=291 ;

--
-- Дамп данных таблицы `classrooms`
--

INSERT INTO `classrooms` (`classrooms_id`, `classrooms_number`, `id_housing`, `seats`, `comp_number`, `options`, `is_public`) VALUES
(50, '38', 1, 24, 12, '2', 0),
(51, '40', 1, 24, 12, '', 0),
(52, '41', 1, 22, 12, '2', 0),
(53, '305', 6, 28, 14, '2', 0),
(54, '404', 6, 13, 13, '2', 0),
(55, '213', 7, 24, 12, '', 0),
(56, '01', 1, 2, 0, '4', 0),
(57, '02', 1, 10, 0, '4', 0),
(58, '09', 1, 4, 0, '5', 0),
(59, '10', 1, 18, 0, '4', 0),
(60, '13', 1, 6, 0, '5', 0),
(61, '14', 1, 6, 0, '6', 0),
(62, '17', 1, 8, 0, '6', 0),
(63, '24', 1, 24, 0, '4', 0),
(64, '28', 1, 16, 0, '7', 0),
(65, '33', 1, 20, 0, '5', 0),
(66, '34', 1, 24, 0, '4', 0),
(67, '36', 1, 90, 0, '', 0),
(68, '37', 1, 18, 0, '2', 0),
(72, '46', 1, 14, 0, '6', 0),
(73, '47', 1, 10, 0, '6', 0),
(74, '50', 1, 150, 0, '', 0),
(75, '51', 1, 18, 0, '5', 0),
(76, '51а', 1, 6, 0, '5', 0),
(77, '52', 1, 12, 0, '5', 0),
(78, '53', 1, 36, 0, '3', 0),
(79, '54', 1, 50, 0, '', 0),
(80, '55', 1, 115, 0, '', 0),
(81, '57', 1, 30, 0, '9', 0),
(82, '61', 1, 34, 0, '10', 0),
(83, '62', 1, 90, 0, '', 0),
(84, '64', 1, 30, 0, '9', 0),
(85, '102', 2, 12, 0, '11', 0),
(86, '103', 2, 15, 15, '', 0),
(87, '104', 2, 15, 15, '', 0),
(88, '105', 2, 15, 15, '', 0),
(89, '107', 2, 12, 0, '11', 0),
(90, '121', 2, 18, 18, '', 0),
(91, '117', 2, 42, 0, '', 0),
(92, '203', 2, 30, 0, '12', 0),
(93, '206', 2, 10, 0, '13', 0),
(94, '211', 2, 15, 0, '', 0),
(95, '214', 2, 30, 0, '12', 0),
(96, '216', 2, 30, 0, '12', 0),
(97, '219', 2, 16, 0, '', 0),
(98, '224', 2, 30, 0, '14', 0),
(99, '225а', 2, 12, 0, '', 0),
(102, '214', 2, 30, 0, '', 0),
(104, '226', 2, 62, 0, '', 0),
(105, '228', 2, 16, 0, '', 0),
(106, '229', 2, 90, 0, '', 0),
(107, '230', 2, 60, 0, '', 0),
(108, '234', 2, 44, 0, '', 0),
(109, '236', 2, 14, 0, '', 0),
(110, '238', 2, 30, 0, '', 0),
(111, '240', 2, 16, 0, '', 0),
(112, '241', 2, 40, 13, '', 0),
(113, '246', 2, 36, 0, '', 0),
(114, '248', 2, 42, 0, '', 0),
(115, '249', 2, 16, 0, '15', 0),
(116, '250', 2, 86, 0, '', 0),
(117, '250а', 2, 14, 0, '', 0),
(118, '251', 2, 15, 0, '', 0),
(119, '252', 2, 48, 0, '', 0),
(120, '311', 2, 10, 0, '11', 0),
(121, '312', 2, 20, 0, '16', 0),
(122, '314', 2, 42, 0, '', 0),
(123, '316', 2, 42, 0, '', 0),
(124, '318', 2, 16, 0, '', 0),
(125, '320', 2, 20, 0, '17', 0),
(126, '321', 2, 30, 0, '', 0),
(127, '323', 2, 8, 0, '', 0),
(128, '325', 2, 14, 0, '17', 0),
(130, '323', 2, 8, 0, '', 0),
(131, '325', 2, 14, 0, '', 0),
(132, '326', 2, 18, 0, '', 0),
(133, '327а', 2, 15, 0, '', 0),
(134, '327б', 2, 15, 0, '', 0),
(135, '328', 2, 72, 0, '', 0),
(136, '330', 2, 15, 15, '', 0),
(137, '406', 2, 16, 0, '', 0),
(138, '407', 2, 78, 0, '', 0),
(139, '408', 2, 108, 0, '', 0),
(140, '409', 2, 18, 0, '', 0),
(141, '412', 2, 48, 0, '', 0),
(142, '414', 2, 36, 0, '', 0),
(143, '415', 2, 10, 0, '', 0),
(144, '416', 2, 30, 0, '', 0),
(145, '417', 2, 12, 0, '19', 0),
(146, '418', 2, 16, 0, '12', 0),
(147, '419', 2, 30, 0, '20', 0),
(148, '420', 2, 36, 0, '1', 0),
(149, '421', 2, 48, 0, '1', 0),
(150, '423', 2, 111, 0, '1', 0),
(151, '425', 2, 72, 0, '1', 0),
(152, '427', 2, 15, 0, '1', 0),
(153, '114', 6, 18, 0, '1', 0),
(154, '115', 6, 30, 0, '1', 0),
(155, '116', 6, 72, 0, '1', 0),
(156, '301', 6, 24, 0, '1', 0),
(157, '302', 6, 48, 0, '1', 0),
(158, '303', 6, 33, 0, '1', 0),
(159, '304', 6, 24, 0, '1', 0),
(160, '305', 6, 14, 14, '', 0),
(161, '306', 6, 22, 0, '1', 0),
(162, '307', 6, 16, 0, '1', 0),
(163, '308', 6, 24, 0, '1', 0),
(164, '310', 6, 16, 0, '1', 0),
(165, '311', 6, 16, 0, '1', 0),
(166, '312', 6, 51, 0, '1', 0),
(167, '313', 6, 51, 0, '1', 0),
(168, '314', 6, 27, 0, '1', 0),
(169, '401', 6, 24, 0, '1', 0),
(170, '403', 6, 42, 0, '1', 0),
(172, '405', 6, 24, 0, '1', 0),
(173, '406', 6, 24, 0, '1', 0),
(174, '410', 6, 44, 0, '1', 0),
(175, '413', 6, 44, 0, '1', 0),
(176, '414', 6, 44, 0, '1', 0),
(177, '501', 6, 16, 0, '1', 0),
(178, '503', 6, 20, 0, '1', 0),
(179, '504', 6, 46, 0, '1', 0),
(180, '505', 6, 20, 0, '1', 0),
(181, '506', 6, 22, 0, '1', 0),
(182, '507', 6, 16, 0, '1', 0),
(183, '508', 6, 16, 0, '1', 0),
(184, '509', 6, 26, 0, '1', 0),
(185, '510', 6, 40, 0, '1', 0),
(186, '511', 6, 16, 0, '1', 0),
(187, '512', 6, 16, 0, '1', 0),
(188, '513', 6, 42, 0, '1', 0),
(189, '514', 6, 40, 0, '1', 0),
(190, '515', 6, 22, 0, '1', 0),
(194, '101', 3, 75, 0, '1', 0),
(195, '102', 3, 24, 0, '21', 0),
(196, '103', 3, 30, 0, '22', 0),
(197, '104', 3, 15, 0, '23', 0),
(198, '110', 3, 3, 0, '24', 0),
(199, '113', 3, 25, 0, '25', 0),
(200, '116', 3, 12, 0, '22', 0),
(201, '201', 3, 12, 0, '26', 0),
(202, '202', 3, 14, 0, '27', 0),
(203, '206', 3, 18, 0, '25', 0),
(204, '207', 3, 12, 0, '27', 0),
(205, '208', 3, 24, 0, '22', 0),
(206, '209', 3, 14, 0, '28', 0),
(207, '210', 3, 16, 0, '27', 0),
(208, '214', 3, 180, 0, '1', 0),
(209, '219', 3, 30, 0, '22', 0),
(210, '301', 3, 12, 0, '29', 0),
(211, '302', 3, 16, 0, '29', 0),
(212, '304', 3, 20, 0, '29', 0),
(213, '305', 3, 20, 0, '29', 0),
(214, '306', 3, 76, 0, '1', 0),
(215, '307', 3, 74, 0, '1', 0),
(216, '308', 3, 20, 0, '30', 0),
(217, '309', 3, 18, 0, '30', 0),
(218, '310а', 3, 26, 0, '30', 0),
(219, '313', 3, 12, 0, '21', 0),
(220, '108', 4, 18, 0, '31', 0),
(221, '109', 4, 10, 0, '38', 0),
(222, '116', 4, 16, 0, '1', 0),
(223, '117', 4, 16, 0, '1', 0),
(224, '118', 4, 28, 0, '1', 0),
(225, '119', 4, 16, 0, '1', 0),
(226, '125', 4, 30, 0, '1', 0),
(227, '126', 4, 30, 0, '1', 0),
(228, '126', 4, 30, 0, '1', 0),
(229, '206', 4, 45, 0, '32', 0),
(230, '207', 4, 30, 0, '38', 0),
(231, '225', 4, 12, 0, '1', 0),
(232, '237', 4, 28, 0, '34', 0),
(233, '305', 4, 24, 0, '32', 0),
(234, '307', 4, 26, 0, '35', 0),
(235, '328', 4, 60, 0, '1', 0),
(236, '329', 4, 18, 0, '1', 0),
(237, '330', 4, 16, 0, '1', 0),
(238, '333', 4, 18, 0, '1', 0),
(239, '336', 4, 30, 0, '36', 0),
(240, '101', 7, 34, 0, '37', 0),
(241, '119', 7, 48, 0, '37', 0),
(242, '119а', 4, 10, 0, '38', 0),
(243, '120', 4, 34, 0, '37', 0),
(244, '202', 4, 32, 0, '39', 0),
(245, '203', 4, 58, 0, '39', 0),
(246, '213', 4, 22, 12, '2', 0),
(247, '302', 4, 20, 0, '40', 0),
(248, 'а/з', 5, 150, 0, '1', 0),
(249, '102', 5, 20, 0, '43', 0),
(250, '106', 5, 30, 0, '1', 0),
(251, '107', 5, 26, 0, '1', 0),
(252, '109', 5, 24, 0, '1', 0),
(253, '111', 5, 30, 0, '1', 0),
(254, '125', 5, 23, 13, '1', 0),
(255, '127', 5, 24, 0, '1', 0),
(256, '202', 5, 56, 0, '42', 0),
(257, '203', 5, 26, 0, '41', 0),
(258, '204', 5, 22, 12, '1', 0),
(259, '205', 5, 32, 0, '1', 0),
(260, '206', 5, 30, 0, '1', 0),
(261, '207', 5, 26, 0, '1', 0),
(262, '213', 5, 18, 0, '1', 0),
(263, '214', 5, 15, 0, '44', 0),
(264, '215', 5, 22, 0, '1', 0),
(265, '220', 5, 26, 0, '1', 0),
(266, '221', 5, 22, 0, '1', 0),
(267, '302', 5, 30, 0, '1', 0),
(268, '307', 5, 30, 0, '1', 0),
(269, '308', 5, 50, 0, '1', 0),
(270, '310', 5, 10, 0, '7', 0),
(271, '313', 5, 26, 0, '1', 0),
(272, '317', 5, 12, 0, '46', 0),
(273, '318', 5, 12, 0, '1', 0),
(274, '321', 5, 22, 0, '1', 0),
(275, '325', 5, 22, 0, '1', 0),
(276, '326', 5, 30, 0, '3', 0),
(277, '327', 5, 66, 0, '3', 0),
(278, '329', 5, 22, 0, '1', 0),
(279, '103', 8, 15, 0, '1', 0),
(280, '104', 8, 66, 0, '1', 0),
(281, '105', 8, 48, 0, '1', 0),
(282, '117', 8, 81, 0, '1', 0),
(283, '202', 8, 24, 0, '1', 0),
(284, '203', 8, 28, 0, '1', 0),
(285, '205', 8, 16, 0, '1', 0),
(286, '206', 8, 24, 0, '1', 0),
(287, '208', 8, 16, 0, '1', 0),
(288, '222', 8, 56, 0, '1', 0),
(289, '217', 8, 38, 14, '1', 0),
(290, 'а/з', 8, 390, 0, '49', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `class_type`
--

CREATE TABLE IF NOT EXISTS `class_type` (
  `classroom_id` int(4) NOT NULL,
  `spec_class_id` tinyint(2) NOT NULL,
  KEY `classroom_id` (`classroom_id`),
  KEY `spec_class_id` (`spec_class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `class_type`
--

INSERT INTO `class_type` (`classroom_id`, `spec_class_id`) VALUES
(51, 2),
(55, 2),
(67, 1),
(74, 1),
(79, 1),
(80, 1),
(83, 1),
(91, 1),
(86, 2),
(87, 2),
(88, 2),
(90, 2),
(94, 1),
(97, 1),
(99, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 2),
(113, 1),
(114, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(122, 1),
(123, 1),
(124, 1),
(126, 3),
(127, 1),
(130, 1),
(132, 3),
(133, 1),
(134, 1),
(135, 1),
(136, 2),
(137, 1),
(138, 1),
(139, 1),
(140, 1),
(141, 1),
(142, 1),
(56, 4),
(57, 4),
(58, 5),
(59, 4),
(60, 5),
(61, 6),
(62, 6),
(63, 4),
(64, 7),
(65, 5),
(66, 4),
(68, 2),
(68, 8),
(52, 2),
(72, 6),
(73, 6),
(75, 5),
(76, 5),
(77, 5),
(78, 3),
(78, 5),
(81, 9),
(82, 10),
(84, 9),
(85, 11),
(89, 11),
(92, 12),
(93, 13),
(95, 12),
(96, 12),
(98, 14),
(115, 15),
(120, 11),
(121, 16),
(125, 17),
(128, 17),
(145, 19),
(146, 12),
(147, 20),
(148, 1),
(149, 1),
(150, 1),
(151, 1),
(152, 1),
(194, 1),
(195, 21),
(196, 22),
(197, 23),
(198, 24),
(199, 25),
(200, 22),
(201, 26),
(202, 27),
(203, 25),
(204, 27),
(205, 22),
(206, 28),
(207, 27),
(208, 1),
(209, 22),
(210, 29),
(211, 29),
(212, 29),
(213, 29),
(214, 1),
(215, 1),
(216, 30),
(217, 30),
(218, 30),
(219, 21),
(220, 31),
(221, 38),
(222, 1),
(223, 1),
(224, 1),
(225, 1),
(226, 1),
(227, 1),
(228, 1),
(229, 32),
(230, 38),
(231, 1),
(231, 33),
(232, 34),
(233, 32),
(234, 35),
(235, 1),
(236, 1),
(237, 1),
(238, 1),
(239, 36),
(240, 37),
(241, 37),
(242, 38),
(243, 37),
(244, 39),
(245, 39),
(246, 2),
(247, 40),
(248, 1),
(249, 43),
(250, 1),
(251, 1),
(252, 1),
(253, 1),
(254, 1),
(254, 2),
(255, 1),
(256, 42),
(257, 41),
(259, 1),
(258, 1),
(258, 2),
(260, 1),
(261, 1),
(262, 1),
(263, 44),
(264, 1),
(265, 1),
(266, 1),
(267, 1),
(268, 1),
(269, 1),
(270, 7),
(271, 1),
(272, 46),
(273, 1),
(274, 1),
(275, 1),
(276, 3),
(277, 3),
(278, 1),
(153, 1),
(154, 1),
(155, 1),
(156, 1),
(157, 1),
(158, 1),
(159, 1),
(53, 2),
(161, 1),
(162, 1),
(163, 1),
(164, 1),
(165, 1),
(166, 1),
(167, 1),
(168, 1),
(169, 1),
(170, 1),
(54, 2),
(172, 1),
(173, 1),
(174, 1),
(175, 1),
(176, 1),
(177, 1),
(178, 1),
(179, 1),
(180, 1),
(181, 1),
(182, 1),
(183, 1),
(184, 1),
(185, 1),
(186, 1),
(187, 1),
(188, 1),
(189, 1),
(190, 1),
(279, 1),
(280, 1),
(281, 1),
(282, 1),
(283, 1),
(284, 1),
(285, 1),
(286, 1),
(287, 1),
(288, 1),
(289, 1),
(289, 2),
(290, 49),
(50, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `discipline`
--

CREATE TABLE IF NOT EXISTS `discipline` (
  `discipline_id` int(4) NOT NULL AUTO_INCREMENT,
  `discipline_name` varchar(100) NOT NULL,
  PRIMARY KEY (`discipline_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `discipline`
--

INSERT INTO `discipline` (`discipline_id`, `discipline_name`) VALUES
(1, 'Якість програмного забезпечення ');

-- --------------------------------------------------------

--
-- Структура таблицы `discipline_distribution`
--

CREATE TABLE IF NOT EXISTS `discipline_distribution` (
  `discipline_distribution_id` int(5) NOT NULL AUTO_INCREMENT,
  `id_discipline` int(4) NOT NULL,
  `id_edbo` int(11) NOT NULL,
  `id_deanery` int(11) NOT NULL,
  `id_cathedra` int(3) NOT NULL,
  `id_lessons_type` tinyint(2) NOT NULL,
  `id_group` int(4) NOT NULL,
  `course` int(1) NOT NULL,
  `hours` int(3) NOT NULL,
  `semestr_hours` int(3) NOT NULL,
  `id_classroom` int(4) NOT NULL,
  PRIMARY KEY (`discipline_distribution_id`),
  KEY `id_discipline` (`id_discipline`),
  KEY `id_cathedra` (`id_cathedra`),
  KEY `id_lessons_type` (`id_lessons_type`),
  KEY `id_group` (`id_group`),
  KEY `id_classroom` (`id_classroom`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `discipline_distribution`
--

INSERT INTO `discipline_distribution` (`discipline_distribution_id`, `id_discipline`, `id_edbo`, `id_deanery`, `id_cathedra`, `id_lessons_type`, `id_group`, `course`, `hours`, `semestr_hours`, `id_classroom`) VALUES
(1, 1, 0, 0, 1, 1, 1, 4, 10, 170, 290);

-- --------------------------------------------------------

--
-- Структура таблицы `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `faculty_id` int(10) NOT NULL AUTO_INCREMENT,
  `faculty_name` varchar(50) NOT NULL,
  `id_edbo` int(11) NOT NULL,
  `id_deanery` int(11) NOT NULL,
  PRIMARY KEY (`faculty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_name`, `id_edbo`, `id_deanery`) VALUES
(1, 'Математичний', 0, 0),
(2, 'Фізичний', 0, 0),
(3, 'Біологічний', 0, 0),
(4, 'Історичний', 0, 0),
(5, 'Факультет менеджменту', 0, 0),
(6, 'Економічний', 0, 0),
(7, 'Факультет іноземної філології', 0, 0),
(8, 'Факультет соціальної педагогіки та психології', 0, 0),
(9, 'Факультет фізичного виховання', 0, 0),
(10, 'Філологічний', 0, 0),
(11, 'Факультет журналістики', 0, 0),
(12, 'Юридичний', 0, 0),
(13, 'Факультет соціології та управління', 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `group_id` int(4) NOT NULL AUTO_INCREMENT,
  `main_group_name` varchar(50) NOT NULL,
  `is_subgroup` tinyint(1) NOT NULL,
  `id_speciality` int(4) NOT NULL,
  `inflow_year` int(4) NOT NULL,
  `parent_group` int(4) NOT NULL,
  `number_of_students` int(3) NOT NULL,
  `id_okr` tinyint(1) NOT NULL,
  `id_edebo` int(5) NOT NULL,
  PRIMARY KEY (`group_id`),
  KEY `id_speciality` (`id_speciality`),
  KEY `parent_group` (`parent_group`),
  KEY `id_okr` (`id_okr`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`group_id`, `main_group_name`, `is_subgroup`, `id_speciality`, `inflow_year`, `parent_group`, `number_of_students`, `id_okr`, `id_edebo`) VALUES
(1, '5131', 0, 1, 2011, 0, 23, 1, 0),
(2, '5131(1)', 1, 1, 2011, 1, 0, 1, 0),
(4, '4328', 0, 2, 2008, 0, 0, 1, 0),
(5, '4328(1)', 1, 2, 2008, 4, 0, 1, 0),
(6, '5131(2)', 1, 1, 2011, 1, 0, 1, 0),
(12, '5132', 0, 1, 2012, 0, 0, 1, 0),
(13, '5132(1)', 1, 1, 2012, 12, 0, 1, 0),
(14, '4328(2)', 1, 2, 2008, 4, 1, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `housing`
--

CREATE TABLE IF NOT EXISTS `housing` (
  `housing_id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`housing_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `housing`
--

INSERT INTO `housing` (`housing_id`, `name`) VALUES
(1, 'I корпус'),
(2, 'II корпус'),
(3, 'III корпус'),
(4, 'IV корпус'),
(5, 'V корпус'),
(6, 'VI корпус'),
(7, 'Спортивний комплекс'),
(8, 'VIII корпус');

-- --------------------------------------------------------

--
-- Структура таблицы `lessons`
--

CREATE TABLE IF NOT EXISTS `lessons` (
  `lesson_id` int(6) NOT NULL AUTO_INCREMENT,
  `id_group` int(5) NOT NULL,
  `id_faculty` int(10) NOT NULL,
  `id_speciality` int(4) NOT NULL,
  `course` int(1) NOT NULL,
  `semester` int(1) NOT NULL,
  `id_okr` tinyint(1) NOT NULL,
  `is_numerator` tinyint(1) NOT NULL,
  `id_discipline` int(5) NOT NULL,
  `id_teacher` int(4) NOT NULL,
  `id_classroom` int(4) NOT NULL,
  `day` int(1) NOT NULL,
  `is_holiday` tinyint(1) NOT NULL,
  `all_group` tinyint(1) NOT NULL,
  `all_speciality` tinyint(1) NOT NULL,
  `lesson_number` int(1) NOT NULL,
  PRIMARY KEY (`lesson_id`),
  KEY `id_group` (`id_group`),
  KEY `id_faculty` (`id_faculty`),
  KEY `id_speciality` (`id_speciality`),
  KEY `id_okr` (`id_okr`),
  KEY `id_discipline` (`id_discipline`),
  KEY `id_teacher` (`id_teacher`),
  KEY `id_classroom` (`id_classroom`),
  KEY `all_group` (`all_group`),
  KEY `all_speciality` (`all_speciality`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `lessons_type`
--

CREATE TABLE IF NOT EXISTS `lessons_type` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `lesson_type_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `lessons_type`
--

INSERT INTO `lessons_type` (`id`, `lesson_type_name`) VALUES
(1, 'Лекція'),
(2, 'Лабораторна робота'),
(3, 'Практичне заняття'),
(4, 'Семінарське заняття');

-- --------------------------------------------------------

--
-- Структура таблицы `okr`
--

CREATE TABLE IF NOT EXISTS `okr` (
  `okr_id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `okr_name` varchar(100) NOT NULL,
  PRIMARY KEY (`okr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `okr`
--

INSERT INTO `okr` (`okr_id`, `okr_name`) VALUES
(1, 'Бакалавр'),
(2, 'Спеціаліст'),
(3, 'Магістр\r\n');

-- --------------------------------------------------------

--
-- Структура таблицы `speciality`
--

CREATE TABLE IF NOT EXISTS `speciality` (
  `speciality_id` int(4) NOT NULL AUTO_INCREMENT,
  `speciality_name` varchar(100) NOT NULL,
  `id_edebo` int(10) NOT NULL,
  `id_cathedra` int(3) NOT NULL,
  `id_faculty` int(10) NOT NULL,
  PRIMARY KEY (`speciality_id`),
  KEY `id_cathedra` (`id_cathedra`),
  KEY `id_faculty` (`id_faculty`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `speciality`
--

INSERT INTO `speciality` (`speciality_id`, `speciality_name`, `id_edebo`, `id_cathedra`, `id_faculty`) VALUES
(1, 'Програмна інженерія', 0, 1, 1),
(2, 'Переклад', 0, 1, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `spec_classes`
--

CREATE TABLE IF NOT EXISTS `spec_classes` (
  `spec_class_id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `spec_class_name` varchar(200) NOT NULL,
  PRIMARY KEY (`spec_class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- Дамп данных таблицы `spec_classes`
--

INSERT INTO `spec_classes` (`spec_class_id`, `spec_class_name`) VALUES
(1, 'Лекційна'),
(2, 'Комп''ютерна аудиторія'),
(3, 'Мультимедійна лабораторія'),
(4, 'лабораторія кафедри фізики металів'),
(5, 'лабораторія кафедри фізики напівпровідників\r\n'),
(6, 'лабораторія кафедри прикладної фізики'),
(7, 'музей'),
(8, 'лабораторія ГІС'),
(9, 'лабораторія кафедри фізики та методики її викладання'),
(10, 'бібліотека'),
(11, 'лінгафонний клас'),
(12, 'коледж'),
(13, 'лабораторія журналістики'),
(14, 'спец клас'),
(15, 'кабінет англійської філології'),
(16, 'клас німецької філології'),
(17, 'лабораторія кафедри романської філології'),
(18, 'лабораторія кафедри зарубіжної літератури'),
(19, 'світлиця'),
(20, 'клас польської мови'),
(21, 'лабораторія кафедри імунології та біохімії'),
(22, 'лабораторія кафедри мисливствознавства та іхтіології'),
(23, 'наукова лабораторія організм енної та клітинної технології'),
(24, 'лабораторія гістохімії'),
(25, 'лабораторія кафедри загальної та прикладної екології'),
(26, 'лабораторія кафедри лікарських рослин'),
(27, 'лабораторія кафедри СПГ та генетики рослин'),
(28, 'лабораторія кафедри зоології'),
(29, 'лабораторія кафедри хімії'),
(30, 'лабораторія кафедри фізіології з курсом ЦЗ'),
(31, 'аудиторія бізнес-центру'),
(32, 'лабораторія кафедри фізичної реабілітації'),
(33, 'аудиторія охорони праці'),
(34, 'кафедра МБОФК '),
(35, 'лабораторія кафедри МБОФК'),
(36, 'аудиторія кафедри МБОФК'),
(37, 'аудиторія кафедри спортивних ігор'),
(38, 'аудиторія кафедри фізичної реабілітації'),
(39, 'аудиторія кафедри олімпійського та професійного спорту'),
(40, 'лабораторія ТМФКТ'),
(41, 'лабораторія кафедри кримінального права та правосуддя'),
(42, 'зал суд засідань кафедри кримінального права та правосуддя'),
(43, 'лабораторія кафедри кримінального права та правосуддя'),
(44, 'кабінет юридичного факультету'),
(45, 'лабораторія історичного факультету'),
(46, 'бібліотека історичного факультету'),
(47, 'спец аудиторія'),
(48, 'аудиторія акторської майстерності'),
(49, 'актовий зал'),
(50, 'танцювальний зал'),
(51, 'кабінет Петрик Т.Д.');

-- --------------------------------------------------------

--
-- Структура таблицы `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `teacher_id` int(4) NOT NULL AUTO_INCREMENT,
  `teacher_name` varchar(150) NOT NULL,
  `id_position` int(2) NOT NULL COMMENT 'Посада',
  `id_academic_status` int(2) NOT NULL COMMENT 'Вчене звання',
  `id_cathedra` int(3) NOT NULL,
  PRIMARY KEY (`teacher_id`),
  KEY `academic_status` (`id_academic_status`),
  KEY `position` (`id_position`),
  KEY `id_cathedra` (`id_cathedra`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `teacher_name`, `id_position`, `id_academic_status`, `id_cathedra`) VALUES
(1, 'Чопоров Сергій Вікторович', 3, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `teachers_academic_status`
--

CREATE TABLE IF NOT EXISTS `teachers_academic_status` (
  `academic_status_id` int(2) NOT NULL AUTO_INCREMENT,
  `academic_status_name` varchar(150) NOT NULL,
  PRIMARY KEY (`academic_status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `teachers_academic_status`
--

INSERT INTO `teachers_academic_status` (`academic_status_id`, `academic_status_name`) VALUES
(1, 'доцент'),
(2, 'старший науковий співробітник'),
(3, 'професор');

-- --------------------------------------------------------

--
-- Структура таблицы `teachers_other_cathedra`
--

CREATE TABLE IF NOT EXISTS `teachers_other_cathedra` (
  `id_teacher` int(4) NOT NULL,
  `id_cathedra` int(3) NOT NULL,
  KEY `id_teacher` (`id_teacher`),
  KEY `id_cathedra` (`id_cathedra`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `teachers_other_cathedra`
--

INSERT INTO `teachers_other_cathedra` (`id_teacher`, `id_cathedra`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `teachers_position`
--

CREATE TABLE IF NOT EXISTS `teachers_position` (
  `position_id` int(2) NOT NULL AUTO_INCREMENT,
  `position_name` varchar(150) NOT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `teachers_position`
--

INSERT INTO `teachers_position` (`position_id`, `position_name`) VALUES
(1, 'асистент'),
(2, 'викладач'),
(3, 'старший викладач'),
(4, 'директор бібліотеки'),
(5, 'науковий працівник бібліотеки'),
(6, 'доцент'),
(7, 'професор'),
(8, 'завідуючий кафедрою'),
(9, 'декан'),
(10, 'проректор'),
(11, 'ректор');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `cathedra`
--
ALTER TABLE `cathedra`
  ADD CONSTRAINT `id_faculty` FOREIGN KEY (`id_faculty`) REFERENCES `faculty` (`faculty_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `classrooms`
--
ALTER TABLE `classrooms`
  ADD CONSTRAINT `housing_id_for_classrooms` FOREIGN KEY (`id_housing`) REFERENCES `housing` (`housing_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `class_type`
--
ALTER TABLE `class_type`
  ADD CONSTRAINT `classrooms_id_for_class_type` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`classrooms_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `spec_class_id_for_class_type` FOREIGN KEY (`spec_class_id`) REFERENCES `spec_classes` (`spec_class_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `discipline_distribution`
--
ALTER TABLE `discipline_distribution`
  ADD CONSTRAINT `cathedra_id` FOREIGN KEY (`id_cathedra`) REFERENCES `cathedra` (`cathedra_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cl_id` FOREIGN KEY (`id_classroom`) REFERENCES `classrooms` (`classrooms_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `discipline_id` FOREIGN KEY (`id_discipline`) REFERENCES `discipline` (`discipline_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `group_id` FOREIGN KEY (`id_group`) REFERENCES `groups` (`group_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `lessons_type_id` FOREIGN KEY (`id_lessons_type`) REFERENCES `lessons_type` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `id_okr_for_groups` FOREIGN KEY (`id_okr`) REFERENCES `okr` (`okr_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `id_speciality_for_groups` FOREIGN KEY (`id_speciality`) REFERENCES `speciality` (`speciality_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `class_id_for_main_timetable` FOREIGN KEY (`id_classroom`) REFERENCES `classrooms` (`classrooms_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `disc_id_for_main_timetable` FOREIGN KEY (`id_discipline`) REFERENCES `discipline` (`discipline_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fac_id_for_main_timetable` FOREIGN KEY (`id_faculty`) REFERENCES `faculty` (`faculty_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `gr_id_for_main_timetable` FOREIGN KEY (`id_group`) REFERENCES `groups` (`group_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `okr_id_for_main_timetable` FOREIGN KEY (`id_okr`) REFERENCES `okr` (`okr_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `spec_id_for_main_timetable` FOREIGN KEY (`id_speciality`) REFERENCES `speciality` (`speciality_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `teach_id_for_main_timetable` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`teacher_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `speciality`
--
ALTER TABLE `speciality`
  ADD CONSTRAINT `id_faculty_speciality` FOREIGN KEY (`id_faculty`) REFERENCES `faculty` (`faculty_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `id_cathedra_speciality` FOREIGN KEY (`id_cathedra`) REFERENCES `cathedra` (`cathedra_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teacher_id_academic_status` FOREIGN KEY (`id_academic_status`) REFERENCES `teachers_academic_status` (`academic_status_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_id_cathedra` FOREIGN KEY (`id_cathedra`) REFERENCES `cathedra` (`cathedra_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_id_position` FOREIGN KEY (`id_position`) REFERENCES `teachers_position` (`position_id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `teachers_other_cathedra`
--
ALTER TABLE `teachers_other_cathedra`
  ADD CONSTRAINT `id_cathedra_for_tc` FOREIGN KEY (`id_cathedra`) REFERENCES `cathedra` (`cathedra_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `id_teacher_for_tc` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`teacher_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
