-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2017 at 08:43 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `netshare`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id_com` int(11) NOT NULL,
  `auteur_com` varchar(255) NOT NULL,
  `alias_auteur_com` varchar(255) NOT NULL,
  `title_com` varchar(50) NOT NULL,
  `content_com` text NOT NULL,
  `date_com` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `avatar_com` varchar(255) NOT NULL DEFAULT '\\images\\members\\avatars\\default.jpg',
  `id_album` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id_com`, `auteur_com`, `alias_auteur_com`, `title_com`, `content_com`, `date_com`, `avatar_com`, `id_album`) VALUES
(1, 'Test1', '@Test1', 'Coucou les amis', 'Ceci est le premier commentaire du site !', '2017-05-13 14:53:37', '\\images\\members\\avatars\\default.jpg', 0),
(2, 'Test2', '@Test2', 'Salut à tous', 'Ceci est le deuxième commentaire du site ! Content de faire votre connaissance les amis :D !', '2017-05-13 14:53:37', '\\images\\members\\avatars\\default.jpg', 0),
(3, 'Anonymous', '@Anonymous', 'Coucou', '<p>Salut les gars comment &ccedil;a va ?</p>', '2017-05-13 15:12:36', '\\images\\members\\avatars\\default.jpg', 0),
(4, 'Anonymous', '@Anonymous', 'Coucou', '<p>Salut les gars comment &ccedil;a va ?</p>', '2017-05-13 15:15:00', '\\images\\members\\avatars\\default.jpg', 0),
(5, 'Anonymous', '@Anonymous', 'Hola', '<p>Je suis un spammeur olol</p>', '2017-05-13 15:17:34', '\\images\\members\\avatars\\default.jpg', 0),
(6, 'Anonymous', '@Anonymous', 'Hola', '<p>Je suis un spammeur olol</p>', '2017-05-13 15:19:25', '\\images\\members\\avatars\\default.jpg', 0),
(7, 'ThéoHuchard', '@ThéoHuchard', 'Salut les gars', '<p>Bienvenue sur Netshare les bros !</p>', '2017-05-14 19:21:02', '\\images\\members\\avatars\\default.jpg', 0),
(8, 'ThéoHuchard', '@ThéoHuchard', 'Test en cours !', '<p>Afin d&#39;effectuer des test nous allons spammer un petit peu !</p>', '2017-05-14 19:22:17', '\\images\\members\\avatars\\default.jpg', 0),
(9, 'ThéoHuchard', '@ThéoHuchard', 'Absolument pas !', '<p>Tr&egrave;s bien</p>', '2017-05-14 19:22:25', '\\images\\members\\avatars\\default.jpg', 0),
(10, 'ThéoHuchard', '@ThéoHuchard', '1', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum illo enim, ullam aperiam amet necessitatibus eaque! Neque similique id quis. Voluptate sed, eius. Nesciunt aliquam, recusandae fuga cupiditate, libero iusto!<br />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente delectus, aliquam non sed consectetur dolor cupiditate doloremque sit quisquam expedita numquam repudiandae quod fugiat temporibus tenetur dignissimos ipsam ad sequi.<br />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum error amet numquam harum natus similique veritatis accusantium odio, repellat tempore praesentium nobis, obcaecati perferendis. Odit blanditiis, at sit voluptas cum.</p>', '2017-05-14 19:22:50', '\\images\\members\\avatars\\default.jpg', 0),
(11, 'ThéoHuchard', '@ThéoHuchard', '2', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum illo enim, ullam aperiam amet necessitatibus eaque! Neque similique id quis. Voluptate sed, eius. Nesciunt aliquam, recusandae fuga cupiditate, libero iusto!<br />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente delectus, aliquam non sed consectetur dolor cupiditate doloremque sit quisquam expedita numquam repudiandae quod fugiat temporibus tenetur dignissimos ipsam ad sequi.<br />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum error amet numquam harum natus similique veritatis accusantium odio, repellat tempore praesentium nobis, obcaecati perferendis. Odit blanditiis, at sit voluptas cum.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum illo enim, ullam aperiam amet necessitatibus eaque! Neque similique id quis. Voluptate sed, eius. Nesciunt aliquam, recusandae fuga cupiditate, libero iusto!<br />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente delectus, aliquam non sed consectetur dolor cupiditate doloremque sit quisquam expedita numquam repudiandae quod fugiat temporibus tenetur dignissimos ipsam ad sequi.<br />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum error amet numquam harum natus similique veritatis accusantium odio, repellat tempore praesentium nobis, obcaecati perferendis. Odit blanditiis, at sit voluptas cum.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum illo enim, ullam aperiam amet necessitatibus eaque! Neque similique id quis. Voluptate sed, eius. Nesciunt aliquam, recusandae fuga cupiditate, libero iusto!<br />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente delectus, aliquam non sed consectetur dolor cupiditate doloremque sit quisquam expedita numquam repudiandae quod fugiat temporibus tenetur dignissimos ipsam ad sequi.<br />&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum error amet numquam harum natus similique veritatis accusantium odio, repellat tempore praesentium nobis, obcaecati perferendis. Odit blanditiis, at sit voluptas cum.</p><p>&nbsp;</p>', '2017-05-14 19:23:00', '\\images\\members\\avatars\\default.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id_country` int(11) NOT NULL,
  `name_country` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id_country`, `name_country`) VALUES
(1, 'Afghanistan'),
(2, 'Afrique Centrale '),
(3, 'Afrique du Sud '),
(4, 'Albanie '),
(5, 'Algerie '),
(6, 'Allemagne '),
(7, 'Andorre '),
(8, 'Angola '),
(9, 'Anguilla '),
(10, 'Arabie Saoudite '),
(11, 'Argentine '),
(12, 'Armenie '),
(13, 'Australie '),
(14, 'Autriche '),
(15, 'Azerbaidjan '),
(16, 'Bahamas '),
(17, 'Bangladesh '),
(18, 'Barbade '),
(19, 'Bahrein '),
(20, 'Belgique '),
(21, 'Belize '),
(22, 'Benin '),
(23, 'Bermudes '),
(24, 'Bielorussie '),
(25, 'Bolivie '),
(26, 'Botswana '),
(27, 'Bhoutan '),
(28, 'Boznie-Herzegovine '),
(29, 'Bresil '),
(30, 'Brunei '),
(31, 'Bulgarie '),
(32, 'Burkina Faso '),
(33, 'Burundi '),
(34, 'Caiman '),
(35, 'Cambodge '),
(36, 'Cameroun '),
(37, 'Canada '),
(38, 'Canaries '),
(39, 'Cap-Vert '),
(40, 'Chili '),
(41, 'Chine '),
(42, 'Chypre '),
(43, 'Colombie '),
(44, 'Colombie '),
(45, 'Congo '),
(46, 'Congo democratique '),
(47, 'Cook '),
(48, 'Coree du Nord '),
(49, 'Coree du Sud '),
(50, 'Costa Rica '),
(51, 'Cote\'Ivoire '),
(52, 'Croatie '),
(53, 'Cuba '),
(54, 'Danemark '),
(55, 'Djibouti '),
(56, 'Dominique '),
(57, 'Egypte '),
(58, 'Emirats Arabes Unis '),
(59, 'Equateur '),
(60, 'Erythree '),
(61, 'Espagne '),
(62, 'Estonie '),
(63, 'États Unis '),
(64, 'Ethiopie '),
(65, 'Falkland '),
(66, 'Feroe '),
(67, 'Fidji '),
(68, 'Finlande '),
(69, 'France '),
(70, 'Gabon '),
(71, 'Gambie '),
(72, 'Georgie '),
(73, 'Ghana '),
(74, 'Gibraltar '),
(75, 'Grece '),
(76, 'Grenade '),
(77, 'Groenland '),
(78, 'Guadeloupe '),
(79, 'Guam '),
(80, 'Guatemala'),
(81, 'Guernesey '),
(82, 'Guinee '),
(83, 'Guinee Bissau '),
(84, 'Guinee Equatoriale '),
(85, 'Guyana '),
(86, 'Guyane Francaise '),
(87, 'Haiti '),
(88, 'Hawaii '),
(89, 'Honduras '),
(90, 'Hong Kong '),
(91, 'Hongrie '),
(92, 'Inde '),
(93, 'Indonesie '),
(94, 'Iran '),
(95, 'Iraq '),
(96, 'Irlande '),
(97, 'Islande '),
(98, 'Israel '),
(99, 'italie '),
(100, 'Jamaique '),
(101, 'Jan Mayen '),
(102, 'Japon '),
(103, 'Jersey '),
(104, 'Jordanie '),
(105, 'Kazakhstan '),
(106, 'Kenya '),
(107, 'Kirghizistan '),
(108, 'Kiribati '),
(109, 'Koweit '),
(110, 'Laos '),
(111, 'Lesotho '),
(112, 'Lettonie '),
(113, 'Liban '),
(114, 'Liberia '),
(115, 'Liechtenstein '),
(116, 'Lituanie '),
(117, 'Luxembourg '),
(118, 'Lybie '),
(119, 'Macao '),
(120, 'Macedoine '),
(121, 'Madagascar '),
(122, 'Madère '),
(123, 'Malaisie '),
(124, 'Malawi '),
(125, 'Maldives '),
(126, 'Mali '),
(127, 'Malte '),
(128, 'Man '),
(129, 'Mariannes du Nord '),
(130, 'Maroc '),
(131, 'Marshall '),
(132, 'Martinique '),
(133, 'Maurice '),
(134, 'Mauritanie '),
(135, 'Mayotte '),
(136, 'Mexique '),
(137, 'Micronesie '),
(138, 'Midway '),
(139, 'Moldavie '),
(140, 'Monaco '),
(141, 'Mongolie '),
(142, 'Montserrat '),
(143, 'Mozambique '),
(144, 'Namibie '),
(145, 'Nauru '),
(146, 'Nepal '),
(147, 'Nicaragua '),
(148, 'Niger '),
(149, 'Nigeria '),
(150, 'Niue '),
(151, 'Norfolk '),
(152, 'Norvege '),
(153, 'Nouvelle Caledonie '),
(154, 'Nouvelle Zelande '),
(155, 'Oman '),
(156, 'Ouganda '),
(157, 'Ouzbekistan '),
(158, 'Pakistan '),
(159, 'Palau '),
(160, 'Palestine '),
(161, 'Panama '),
(162, 'Papouasie Nouvelle Guinee '),
(163, 'Paraguay '),
(164, 'Pays-Bas '),
(165, 'Perou '),
(166, 'Philippines '),
(167, 'Pologne '),
(168, 'Polynesie '),
(169, 'Porto Rico '),
(170, 'Portugal '),
(171, 'Qatar '),
(172, 'Republique Dominicaine '),
(173, 'Republique Tcheque '),
(174, 'Reunion '),
(175, 'Roumanie '),
(176, 'Royaume_Uni '),
(177, 'Russie '),
(178, 'Rwanda '),
(179, 'Sahara Occidental '),
(180, 'Sainte Lucie '),
(181, 'Saint Marin '),
(182, 'Salomon '),
(183, 'Salvador '),
(184, 'Samoa Occidentales'),
(185, 'Samoa Americaine '),
(186, 'Sao Tome et Principe '),
(187, 'Senegal '),
(188, 'Seychelles '),
(189, 'Sierra Leone '),
(190, 'Singapour '),
(191, 'Slovaquie '),
(192, 'Slovenie'),
(193, 'Somalie '),
(194, 'Soudan '),
(195, 'Sri Lanka '),
(196, 'Suede '),
(197, 'Suisse '),
(198, 'Surinam '),
(199, 'Swaziland '),
(200, 'Syrie '),
(201, 'Tadjikistan '),
(202, 'Taiwan '),
(203, 'Tonga '),
(204, 'Tanzanie '),
(205, 'Tchad '),
(206, 'Thailande '),
(207, 'Tibet '),
(208, 'Timor Oriental '),
(209, 'Togo '),
(210, 'Trinite et Tobago '),
(211, 'Tristan de cuncha '),
(212, 'Tunisie '),
(213, 'Turmenistan '),
(214, 'Turquie '),
(215, 'Ukraine '),
(216, 'Uruguay '),
(217, 'Vanuatu '),
(218, 'Vatican '),
(219, 'Venezuela '),
(220, 'Vierges Americaines '),
(221, 'Vierges Britanniques '),
(222, 'Vietnam '),
(223, 'Wake '),
(224, 'Wallis et Futuma '),
(225, 'Yemen '),
(226, 'Yougoslavie '),
(227, 'Zambie '),
(228, 'Zimbabwe ');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `user_id1` int(11) NOT NULL,
  `user_id2` int(11) NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`user_id1`, `user_id2`, `status`, `created_at`) VALUES
(1, 1, '2', '2017-05-11 17:36:13'),
(38, 38, '2', '2017-05-13 16:21:55'),
(38, 1, '0', '2017-05-14 16:41:33'),
(1, 38, '3', '2017-05-14 20:59:28');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id_g` int(11) NOT NULL,
  `belong` tinyint(1) NOT NULL DEFAULT '0',
  `id_p` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id_n` int(11) NOT NULL,
  `num_n` int(11) DEFAULT '0',
  `id_u` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id_p` int(11) NOT NULL,
  `url_p` varchar(255) DEFAULT NULL,
  `id_com` int(11) DEFAULT NULL,
  `id_g` int(11) DEFAULT NULL,
  `id_u` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id_p`, `url_p`, `id_com`, `id_g`, `id_u`) VALUES
(1, '\\images\\albums\\pexels-photo-69731.jpeg', NULL, NULL, 1),
(2, '\\images\\albums\\pexels-photo-147485.jpeg', NULL, NULL, 1),
(3, '\\images\\albums\\pexels-photo-165818.jpeg', NULL, NULL, 1),
(4, '\\images\\albums\\pexels-photo-173383.jpeg', NULL, NULL, 1),
(5, '\\images\\albums\\pexels-photo-206529.jpeg', NULL, NULL, 1),
(6, '\\images\\albums\\pexels-photo-247462.jpeg', NULL, NULL, 1),
(7, '\\images\\albums\\pexels-photo-248797.jpeg', NULL, NULL, 1),
(8, '\\images\\albums\\pexels-photo-259707.jpeg', NULL, NULL, 1),
(9, '\\images\\albums\\pexels-photo-380769.jpeg', NULL, NULL, 1),
(12, '\\images\\albums\\pexels-photo-69731.jpeg', NULL, NULL, 38),
(11, '\\images\\albums\\dark-green-wallpaper-18.jpg', NULL, NULL, 1),
(13, '\\images\\albums\\pexels-photo-147485.jpeg', NULL, NULL, 38),
(14, '\\images\\albums\\pexels-photo-165818.jpeg', NULL, NULL, 38),
(15, '\\images\\albums\\pexels-photo-173383.jpeg', NULL, NULL, 38),
(16, '\\images\\albums\\pexels-photo-206529.jpeg', NULL, NULL, 38),
(17, '\\images\\albums\\pexels-photo-247462.jpeg', NULL, NULL, 38),
(18, '\\images\\albums\\pexels-photo-248797.jpeg', NULL, NULL, 1),
(19, '\\images\\albums\\pexels-photo-259707.jpeg', NULL, NULL, 38),
(20, '\\images\\albums\\pexels-photo-380769.jpeg', NULL, NULL, 38),
(21, '\\images\\albums\\dark-green-wallpaper-18.jpg', NULL, NULL, 38);

-- --------------------------------------------------------

--
-- Table structure for table `timezones`
--

CREATE TABLE `timezones` (
  `id_tz` int(11) NOT NULL,
  `gmt_adj_tz` varchar(11) DEFAULT NULL,
  `use_daylighttime_tz` int(11) DEFAULT NULL,
  `value` varchar(11) DEFAULT NULL,
  `name_tz` varchar(255) NOT NULL,
  `id_u` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timezones`
--

INSERT INTO `timezones` (`id_tz`, `gmt_adj_tz`, `use_daylighttime_tz`, `value`, `name_tz`, `id_u`) VALUES
(1, 'GMT-12:00', 0, '-12', 'International Date Line West', 0),
(2, 'GMT-11:00', 0, '-11', 'Midway Island, Samoa', 0),
(3, 'GMT-10:00', 0, '-10', 'Hawaii', 0),
(4, 'GMT-09:00', 1, '-9', 'Alaska', 0),
(5, 'GMT-08:00', 1, '-8', 'Pacific Time (US & Canada)', 0),
(6, 'GMT-08:00', 1, '-8', 'Tijuana, Baja California', 0),
(7, 'GMT-07:00', 0, '-7', 'Arizona', 0),
(8, 'GMT-07:00', 1, '-7', 'Chihuahua, La Paz, Mazatlan', 0),
(9, 'GMT-07:00', 1, '-7', 'Mountain Time (US & Canada)', 0),
(10, 'GMT-06:00', 0, '-6', 'Central America', 0),
(11, 'GMT-06:00', 1, '-6', 'Central Time (US & Canada)', 0),
(12, 'GMT-06:00', 1, '-6', 'Guadalajara, Mexico City, Monterrey', 0),
(13, 'GMT-06:00', 0, '-6', 'Saskatchewan', 0),
(14, 'GMT-05:00', 0, '-5', 'Bogota, Lima, Quito, Rio Branco', 0),
(15, 'GMT-05:00', 1, '-5', 'Eastern Time (US & Canada)', 0),
(16, 'GMT-05:00', 1, '-5', 'Indiana (East)', 0),
(17, 'GMT-04:00', 1, '-4', 'Atlantic Time (Canada)', 0),
(18, 'GMT-04:00', 0, '-4', 'Caracas, La Paz', 0),
(19, 'GMT-04:00', 0, '-4', 'Manaus', 0),
(20, 'GMT-04:00', 1, '-4', 'Santiago', 0),
(21, 'GMT-03:30', 1, '-3.5', 'Newfoundland', 0),
(22, 'GMT-03:00', 1, '-3', 'Brasilia', 0),
(23, 'GMT-03:00', 0, '-3', 'Buenos Aires, Georgetown', 0),
(24, 'GMT-03:00', 1, '-3', 'Greenland', 0),
(25, 'GMT-03:00', 1, '-3', 'Montevideo', 0),
(26, 'GMT-02:00', 1, '-2', 'Mid-Atlantic', 0),
(27, 'GMT-01:00', 0, '-1', 'Cape Verde Is.', 0),
(28, 'GMT-01:00', 1, '-1', 'Azores', 0),
(29, 'GMT+00:00', 0, '0', 'Casablanca, Monrovia, Reykjavik', 0),
(30, 'GMT+00:00', 1, '0', 'Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London', 0),
(31, 'GMT+01:00', 1, '1', 'Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna', 0),
(32, 'GMT+01:00', 1, '1', 'Belgrade, Bratislava, Budapest, Ljubljana, Prague', 0),
(33, 'GMT+01:00', 1, '1', 'Brussels, Copenhagen, Madrid, Paris', 0),
(34, 'GMT+01:00', 1, '1', 'Sarajevo, Skopje, Warsaw, Zagreb', 0),
(35, 'GMT+01:00', 1, '1', 'West Central Africa', 0),
(36, 'GMT+02:00', 1, '2', 'Amman', 0),
(37, 'GMT+02:00', 1, '2', 'Athens, Bucharest, Istanbul', 0),
(38, 'GMT+02:00', 1, '2', 'Beirut', 0),
(39, 'GMT+02:00', 1, '2', 'Cairo', 0),
(40, 'GMT+02:00', 0, '2', 'Harare, Pretoria', 0),
(41, 'GMT+02:00', 1, '2', 'Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius', 0),
(42, 'GMT+02:00', 1, '2', 'Jerusalem', 0),
(43, 'GMT+02:00', 1, '2', 'Minsk', 0),
(44, 'GMT+02:00', 1, '2', 'Windhoek', 0),
(45, 'GMT+03:00', 0, '3', 'Kuwait, Riyadh, Baghdad', 0),
(46, 'GMT+03:00', 1, '3', 'Moscow, St. Petersburg, Volgograd', 0),
(47, 'GMT+03:00', 0, '3', 'Nairobi', 0),
(48, 'GMT+03:00', 0, '3', 'Tbilisi', 0),
(49, 'GMT+03:30', 1, '3.5', 'Tehran', 0),
(50, 'GMT+04:00', 0, '4', 'Abu Dhabi, Muscat', 0),
(51, 'GMT+04:00', 1, '4', 'Baku', 0),
(52, 'GMT+04:00', 1, '4', 'Yerevan', 0),
(53, 'GMT+04:30', 0, '4.5', 'Kabul', 0),
(54, 'GMT+05:00', 1, '5', 'Yekaterinburg', 0),
(55, 'GMT+05:00', 0, '5', 'Islamabad, Karachi, Tashkent', 0),
(56, 'GMT+05:30', 0, '5.5', 'Sri Jayawardenapura', 0),
(57, 'GMT+05:30', 0, '5.5', 'Chennai, Kolkata, Mumbai, New Delhi', 0),
(58, 'GMT+05:45', 0, '5.75', 'Kathmandu', 0),
(59, 'GMT+06:00', 1, '6', 'Almaty, Novosibirsk', 0),
(60, 'GMT+06:00', 0, '6', 'Astana, Dhaka', 0),
(61, 'GMT+06:30', 0, '6.5', 'Yangon (Rangoon)', 0),
(62, 'GMT+07:00', 0, '7', 'Bangkok, Hanoi, Jakarta', 0),
(63, 'GMT+07:00', 1, '7', 'Krasnoyarsk', 0),
(64, 'GMT+08:00', 0, '8', 'Beijing, Chongqing, Hong Kong, Urumqi', 0),
(65, 'GMT+08:00', 0, '8', 'Kuala Lumpur, Singapore', 0),
(66, 'GMT+08:00', 0, '8', 'Irkutsk, Ulaan Bataar', 0),
(67, 'GMT+08:00', 0, '8', 'Perth', 0),
(68, 'GMT+08:00', 0, '8', 'Taipei', 0),
(69, 'GMT+09:00', 0, '9', 'Osaka, Sapporo, Tokyo', 0),
(70, 'GMT+09:00', 0, '9', 'Seoul', 0),
(71, 'GMT+09:00', 1, '9', 'Yakutsk', 0),
(72, 'GMT+09:30', 0, '9.5', 'Adelaide', 0),
(73, 'GMT+09:30', 0, '9.5', 'Darwin', 0),
(74, 'GMT+10:00', 0, '10', 'Brisbane', 0),
(75, 'GMT+10:00', 1, '10', 'Canberra, Melbourne, Sydney', 0),
(76, 'GMT+10:00', 1, '10', 'Hobart', 0),
(77, 'GMT+10:00', 0, '10', 'Guam, Port Moresby', 0),
(78, 'GMT+10:00', 1, '10', 'Vladivostok', 0),
(79, 'GMT+11:00', 1, '11', 'Magadan, Solomon Is., New Caledonia', 0),
(80, 'GMT+12:00', 1, '12', 'Auckland, Wellington', 0),
(81, 'GMT+12:00', 0, '12', 'Fiji, Kamchatka, Marshall Is.', 0),
(82, 'GMT+13:00', 0, '13', 'Nuku\'alofa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_u` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL DEFAULT 'Anonymous',
  `alias` varchar(255) NOT NULL DEFAULT '@Anonymous',
  `pwd` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `zip` int(5) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `avatar` varchar(255) DEFAULT '\\images\\members\\avatars\\default.jpg',
  `background` varchar(255) NOT NULL DEFAULT '\\images\\members\\backgrounds\\default.jpg',
  `timezone` varchar(255) NOT NULL,
  `lvl` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_u`, `email`, `username`, `alias`, `pwd`, `surname`, `name`, `phone`, `adress`, `zip`, `country`, `city`, `birthday`, `avatar`, `background`, `timezone`, `lvl`) VALUES
(1, 'admin@admin.admin', 'ThéoHuchard', '@ThéoHuchard', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Huchard', 'Théo', '0101010101', '189 Rue du Bonbon', 92800, 'France ', 'Trouville', '2018-04-19', '\\images\\members\\avatars\\pexels-photo-316680.jpeg', '\\images\\members\\backgrounds\\pexels-photo-299313.jpeg', '-12', 3),
(38, 'test@test.com', 'Le Bouffon Vert', '@lbv', '448ed7416fce2cb66c285d182b1ba3df1e90016d', 'Osborn', 'Norman', NULL, '189 Rue du test', 80000, 'Autriche ', 'Amiens', '2017-05-20', '\\images\\members\\avatars\\dark-green-wallpaper-18.jpg', '\\images\\members\\backgrounds\\dual_screen_wallpapers_47.jpg', '-12', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_com`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id_country`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`user_id1`,`user_id2`),
  ADD KEY `user_id2` (`user_id2`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_g`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id_n`,`id_u`),
  ADD KEY `id_u` (`id_u`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `id_com` (`id_com`),
  ADD KEY `id_g` (`id_g`);

--
-- Indexes for table `timezones`
--
ALTER TABLE `timezones`
  ADD PRIMARY KEY (`id_tz`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id_country` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=432;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_g` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id_n` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `timezones`
--
ALTER TABLE `timezones`
  MODIFY `id_tz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_u` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
