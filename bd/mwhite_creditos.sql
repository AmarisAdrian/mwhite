-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-08-2020 a las 07:16:43
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mwhite_creditos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `nombre` char(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `activity`
--

INSERT INTO `activity` (`id`, `nombre`) VALUES
(1, 'Estudiante'),
(2, 'Empleado'),
(3, 'Independiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `idProvince` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `city`
--

INSERT INTO `city` (`id`, `nombre`, `idProvince`) VALUES
(1, 'Leticia', 1),
(2, 'Puerto Nariño', 1),
(3, 'Abejorral', 2),
(4, 'Abriaquí', 2),
(5, 'Alejandria', 2),
(6, 'Amagá', 2),
(7, 'Amalfi', 2),
(8, 'Andes', 2),
(9, 'Angelópolis', 2),
(10, 'Angostura', 2),
(11, 'Anorí', 2),
(12, 'Anzá', 2),
(13, 'Apartadó', 2),
(14, 'Arboletes', 2),
(15, 'Argelia', 2),
(16, 'Armenia', 2),
(17, 'Barbosa', 2),
(18, 'Bello', 2),
(19, 'Belmira', 2),
(20, 'Betania', 2),
(21, 'Betulia', 2),
(22, 'Bolívar', 2),
(23, 'Briceño', 2),
(24, 'Burítica', 2),
(25, 'Caicedo', 2),
(26, 'Caldas', 2),
(27, 'Campamento', 2),
(28, 'Caracolí', 2),
(29, 'Caramanta', 2),
(30, 'Carepa', 2),
(31, 'Carmen de Viboral', 2),
(32, 'Carolina', 2),
(33, 'Caucasia', 2),
(34, 'Cañasgordas', 2),
(35, 'Chigorodó', 2),
(36, 'Cisneros', 2),
(37, 'Cocorná', 2),
(38, 'Concepción', 2),
(39, 'Concordia', 2),
(40, 'Copacabana', 2),
(41, 'Cáceres', 2),
(42, 'Dabeiba', 2),
(43, 'Don Matías', 2),
(44, 'Ebéjico', 2),
(45, 'El Bagre', 2),
(46, 'Entrerríos', 2),
(47, 'Envigado', 2),
(48, 'Fredonia', 2),
(49, 'Frontino', 2),
(50, 'Giraldo', 2),
(51, 'Girardota', 2),
(52, 'Granada', 2),
(53, 'Guadalupe', 2),
(54, 'Guarne', 2),
(55, 'Guatapé', 2),
(56, 'Gómez Plata', 2),
(57, 'Heliconia', 2),
(58, 'Hispania', 2),
(59, 'Itagüí', 2),
(60, 'Ituango', 2),
(61, 'Jardín', 2),
(62, 'Jericó', 2),
(63, 'La Ceja', 2),
(64, 'La Estrella', 2),
(65, 'La Pintada', 2),
(66, 'La Unión', 2),
(67, 'Liborina', 2),
(68, 'Maceo', 2),
(69, 'Marinilla', 2),
(70, 'Medellín', 2),
(71, 'Montebello', 2),
(72, 'Murindó', 2),
(73, 'Mutatá', 2),
(74, 'Nariño', 2),
(75, 'Nechí', 2),
(76, 'Necoclí', 2),
(77, 'Olaya', 2),
(78, 'Peque', 2),
(79, 'Peñol', 2),
(80, 'Pueblorrico', 2),
(81, 'Puerto Berrío', 2),
(82, 'Puerto Nare', 2),
(83, 'Puerto Triunfo', 2),
(84, 'Remedios', 2),
(85, 'Retiro', 2),
(86, 'Ríonegro', 2),
(87, 'Sabanalarga', 2),
(88, 'Sabaneta', 2),
(89, 'Salgar', 2),
(90, 'San Andrés de Cuerquía', 2),
(91, 'San Carlos', 2),
(92, 'San Francisco', 2),
(93, 'San Jerónimo', 2),
(94, 'San José de Montaña', 2),
(95, 'San Juan de Urabá', 2),
(96, 'San Luís', 2),
(97, 'San Pedro', 2),
(98, 'San Pedro de Urabá', 2),
(99, 'San Rafael', 2),
(100, 'San Roque', 2),
(101, 'San Vicente', 2),
(102, 'Santa Bárbara', 2),
(103, 'Santa Fé de Antioquia', 2),
(104, 'Santa Rosa de Osos', 2),
(105, 'Santo Domingo', 2),
(106, 'Santuario', 2),
(107, 'Segovia', 2),
(108, 'Sonsón', 2),
(109, 'Sopetrán', 2),
(110, 'Tarazá', 2),
(111, 'Tarso', 2),
(112, 'Titiribí', 2),
(113, 'Toledo', 2),
(114, 'Turbo', 2),
(115, 'Támesis', 2),
(116, 'Uramita', 2),
(117, 'Urrao', 2),
(118, 'Valdivia', 2),
(119, 'Valparaiso', 2),
(120, 'Vegachí', 2),
(121, 'Venecia', 2),
(122, 'Vigía del Fuerte', 2),
(123, 'Yalí', 2),
(124, 'Yarumal', 2),
(125, 'Yolombó', 2),
(126, 'Yondó (Casabe)', 2),
(127, 'Zaragoza', 2),
(128, 'Arauca', 3),
(129, 'Arauquita', 3),
(130, 'Cravo Norte', 3),
(131, 'Fortúl', 3),
(132, 'Puerto Rondón', 3),
(133, 'Saravena', 3),
(134, 'Tame', 3),
(135, 'Baranoa', 4),
(136, 'Barranquilla', 4),
(137, 'Campo de la Cruz', 4),
(138, 'Candelaria', 4),
(139, 'Galapa', 4),
(140, 'Juan de Acosta', 4),
(141, 'Luruaco', 4),
(142, 'Malambo', 4),
(143, 'Manatí', 4),
(144, 'Palmar de Varela', 4),
(145, 'Piojo', 4),
(146, 'Polonuevo', 4),
(147, 'Ponedera', 4),
(148, 'Puerto Colombia', 4),
(149, 'Repelón', 4),
(150, 'Sabanagrande', 4),
(151, 'Sabanalarga', 4),
(152, 'Santa Lucía', 4),
(153, 'Santo Tomás', 4),
(154, 'Soledad', 4),
(155, 'Suan', 4),
(156, 'Tubará', 4),
(157, 'Usiacuri', 4),
(158, 'Achí', 5),
(159, 'Altos del Rosario', 5),
(160, 'Arenal', 5),
(161, 'Arjona', 5),
(162, 'Arroyohondo', 5),
(163, 'Barranco de Loba', 5),
(164, 'Calamar', 5),
(165, 'Cantagallo', 5),
(166, 'Cartagena', 5),
(167, 'Cicuco', 5),
(168, 'Clemencia', 5),
(169, 'Córdoba', 5),
(170, 'El Carmen de Bolívar', 5),
(171, 'El Guamo', 5),
(172, 'El Peñon', 5),
(173, 'Hatillo de Loba', 5),
(174, 'Magangué', 5),
(175, 'Mahates', 5),
(176, 'Margarita', 5),
(177, 'María la Baja', 5),
(178, 'Mompós', 5),
(179, 'Montecristo', 5),
(180, 'Morales', 5),
(181, 'Norosí', 5),
(182, 'Pinillos', 5),
(183, 'Regidor', 5),
(184, 'Río Viejo', 5),
(185, 'San Cristobal', 5),
(186, 'San Estanislao', 5),
(187, 'San Fernando', 5),
(188, 'San Jacinto', 5),
(189, 'San Jacinto del Cauca', 5),
(190, 'San Juan de Nepomuceno', 5),
(191, 'San Martín de Loba', 5),
(192, 'San Pablo', 5),
(193, 'Santa Catalina', 5),
(194, 'Santa Rosa ', 5),
(195, 'Santa Rosa del Sur', 5),
(196, 'Simití', 5),
(197, 'Soplaviento', 5),
(198, 'Talaigua Nuevo', 5),
(199, 'Tiquisio (Puerto Rico)', 5),
(200, 'Turbaco', 5),
(201, 'Turbaná', 5),
(202, 'Villanueva', 5),
(203, 'Zambrano', 5),
(204, 'Almeida', 6),
(205, 'Aquitania', 6),
(206, 'Arcabuco', 6),
(207, 'Belén', 6),
(208, 'Berbeo', 6),
(209, 'Beteitiva', 6),
(210, 'Boavita', 6),
(211, 'Boyacá', 6),
(212, 'Briceño', 6),
(213, 'Buenavista', 6),
(214, 'Busbanza', 6),
(215, 'Caldas', 6),
(216, 'Campohermoso', 6),
(217, 'Cerinza', 6),
(218, 'Chinavita', 6),
(219, 'Chiquinquirá', 6),
(220, 'Chiscas', 6),
(221, 'Chita', 6),
(222, 'Chitaraque', 6),
(223, 'Chivatá', 6),
(224, 'Chíquiza', 6),
(225, 'Chívor', 6),
(226, 'Ciénaga', 6),
(227, 'Coper', 6),
(228, 'Corrales', 6),
(229, 'Covarachía', 6),
(230, 'Cubará', 6),
(231, 'Cucaita', 6),
(232, 'Cuitiva', 6),
(233, 'Cómbita', 6),
(234, 'Duitama', 6),
(235, 'El Cocuy', 6),
(236, 'El Espino', 6),
(237, 'Firavitoba', 6),
(238, 'Floresta', 6),
(239, 'Gachantivá', 6),
(240, 'Garagoa', 6),
(241, 'Guacamayas', 6),
(242, 'Guateque', 6),
(243, 'Guayatá', 6),
(244, 'Guicán', 6),
(245, 'Gámeza', 6),
(246, 'Izá', 6),
(247, 'Jenesano', 6),
(248, 'Jericó', 6),
(249, 'La Capilla', 6),
(250, 'La Uvita', 6),
(251, 'La Victoria', 6),
(252, 'Labranzagrande', 6),
(253, 'Macanal', 6),
(254, 'Maripí', 6),
(255, 'Miraflores', 6),
(256, 'Mongua', 6),
(257, 'Monguí', 6),
(258, 'Moniquirá', 6),
(259, 'Motavita', 6),
(260, 'Muzo', 6),
(261, 'Nobsa', 6),
(262, 'Nuevo Colón', 6),
(263, 'Oicatá', 6),
(264, 'Otanche', 6),
(265, 'Pachavita', 6),
(266, 'Paipa', 6),
(267, 'Pajarito', 6),
(268, 'Panqueba', 6),
(269, 'Pauna', 6),
(270, 'Paya', 6),
(271, 'Paz de Río', 6),
(272, 'Pesca', 6),
(273, 'Pisva', 6),
(274, 'Puerto Boyacá', 6),
(275, 'Páez', 6),
(276, 'Quipama', 6),
(277, 'Ramiriquí', 6),
(278, 'Rondón', 6),
(279, 'Ráquira', 6),
(280, 'Saboyá', 6),
(281, 'Samacá', 6),
(282, 'San Eduardo', 6),
(283, 'San José de Pare', 6),
(284, 'San Luís de Gaceno', 6),
(285, 'San Mateo', 6),
(286, 'San Miguel de Sema', 6),
(287, 'San Pablo de Borbur', 6),
(288, 'Santa María', 6),
(289, 'Santa Rosa de Viterbo', 6),
(290, 'Santa Sofía', 6),
(291, 'Santana', 6),
(292, 'Sativanorte', 6),
(293, 'Sativasur', 6),
(294, 'Siachoque', 6),
(295, 'Soatá', 6),
(296, 'Socha', 6),
(297, 'Socotá', 6),
(298, 'Sogamoso', 6),
(299, 'Somondoco', 6),
(300, 'Sora', 6),
(301, 'Soracá', 6),
(302, 'Sotaquirá', 6),
(303, 'Susacón', 6),
(304, 'Sutamarchán', 6),
(305, 'Sutatenza', 6),
(306, 'Sáchica', 6),
(307, 'Tasco', 6),
(308, 'Tenza', 6),
(309, 'Tibaná', 6),
(310, 'Tibasosa', 6),
(311, 'Tinjacá', 6),
(312, 'Tipacoque', 6),
(313, 'Toca', 6),
(314, 'Toguí', 6),
(315, 'Topagá', 6),
(316, 'Tota', 6),
(317, 'Tunja', 6),
(318, 'Tunungua', 6),
(319, 'Turmequé', 6),
(320, 'Tuta', 6),
(321, 'Tutasá', 6),
(322, 'Ventaquemada', 6),
(323, 'Villa de Leiva', 6),
(324, 'Viracachá', 6),
(325, 'Zetaquirá', 6),
(326, 'Úmbita', 6),
(327, 'Aguadas', 7),
(328, 'Anserma', 7),
(329, 'Aranzazu', 7),
(330, 'Belalcázar', 7),
(331, 'Chinchiná', 7),
(332, 'Filadelfia', 7),
(333, 'La Dorada', 7),
(334, 'La Merced', 7),
(335, 'La Victoria', 7),
(336, 'Manizales', 7),
(337, 'Manzanares', 7),
(338, 'Marmato', 7),
(339, 'Marquetalia', 7),
(340, 'Marulanda', 7),
(341, 'Neira', 7),
(342, 'Norcasia', 7),
(343, 'Palestina', 7),
(344, 'Pensilvania', 7),
(345, 'Pácora', 7),
(346, 'Risaralda', 7),
(347, 'Río Sucio', 7),
(348, 'Salamina', 7),
(349, 'Samaná', 7),
(350, 'San José', 7),
(351, 'Supía', 7),
(352, 'Villamaría', 7),
(353, 'Viterbo', 7),
(354, 'Albania', 8),
(355, 'Belén de los Andaquíes', 8),
(356, 'Cartagena del Chairá', 8),
(357, 'Curillo', 8),
(358, 'El Doncello', 8),
(359, 'El Paujil', 8),
(360, 'Florencia', 8),
(361, 'La Montañita', 8),
(362, 'Milán', 8),
(363, 'Morelia', 8),
(364, 'Puerto Rico', 8),
(365, 'San José del Fragua', 8),
(366, 'San Vicente del Caguán', 8),
(367, 'Solano', 8),
(368, 'Solita', 8),
(369, 'Valparaiso', 8),
(370, 'Aguazul', 9),
(371, 'Chámeza', 9),
(372, 'Hato Corozal', 9),
(373, 'La Salina', 9),
(374, 'Maní', 9),
(375, 'Monterrey', 9),
(376, 'Nunchía', 9),
(377, 'Orocué', 9),
(378, 'Paz de Ariporo', 9),
(379, 'Pore', 9),
(380, 'Recetor', 9),
(381, 'Sabanalarga', 9),
(382, 'San Luís de Palenque', 9),
(383, 'Sácama', 9),
(384, 'Tauramena', 9),
(385, 'Trinidad', 9),
(386, 'Támara', 9),
(387, 'Villanueva', 9),
(388, 'Yopal', 9),
(389, 'Almaguer', 10),
(390, 'Argelia', 10),
(391, 'Balboa', 10),
(392, 'Bolívar', 10),
(393, 'Buenos Aires', 10),
(394, 'Cajibío', 10),
(395, 'Caldono', 10),
(396, 'Caloto', 10),
(397, 'Corinto', 10),
(398, 'El Tambo', 10),
(399, 'Florencia', 10),
(400, 'Guachené', 10),
(401, 'Guapí', 10),
(402, 'Inzá', 10),
(403, 'Jambaló', 10),
(404, 'La Sierra', 10),
(405, 'La Vega', 10),
(406, 'López (Micay)', 10),
(407, 'Mercaderes', 10),
(408, 'Miranda', 10),
(409, 'Morales', 10),
(410, 'Padilla', 10),
(411, 'Patía (El Bordo)', 10),
(412, 'Piamonte', 10),
(413, 'Piendamó', 10),
(414, 'Popayán', 10),
(415, 'Puerto Tejada', 10),
(416, 'Puracé (Coconuco)', 10),
(417, 'Páez (Belalcazar)', 10),
(418, 'Rosas', 10),
(419, 'San Sebastián', 10),
(420, 'Santa Rosa', 10),
(421, 'Santander de Quilichao', 10),
(422, 'Silvia', 10),
(423, 'Sotara (Paispamba)', 10),
(424, 'Sucre', 10),
(425, 'Suárez', 10),
(426, 'Timbiquí', 10),
(427, 'Timbío', 10),
(428, 'Toribío', 10),
(429, 'Totoró', 10),
(430, 'Villa Rica', 10),
(431, 'Aguachica', 11),
(432, 'Agustín Codazzi', 11),
(433, 'Astrea', 11),
(434, 'Becerríl', 11),
(435, 'Bosconia', 11),
(436, 'Chimichagua', 11),
(437, 'Chiriguaná', 11),
(438, 'Curumaní', 11),
(439, 'El Copey', 11),
(440, 'El Paso', 11),
(441, 'Gamarra', 11),
(442, 'Gonzalez', 11),
(443, 'La Gloria', 11),
(444, 'La Jagua de Ibirico', 11),
(445, 'La Paz (Robles)', 11),
(446, 'Manaure Balcón del Cesar', 11),
(447, 'Pailitas', 11),
(448, 'Pelaya', 11),
(449, 'Pueblo Bello', 11),
(450, 'Río de oro', 11),
(451, 'San Alberto', 11),
(452, 'San Diego', 11),
(453, 'San Martín', 11),
(454, 'Tamalameque', 11),
(455, 'Valledupar', 11),
(456, 'Acandí', 12),
(457, 'Alto Baudó (Pie de Pato)', 12),
(458, 'Atrato (Yuto)', 12),
(459, 'Bagadó', 12),
(460, 'Bahía Solano (Mútis)', 12),
(461, 'Bajo Baudó (Pizarro)', 12),
(462, 'Belén de Bajirá', 12),
(463, 'Bojayá (Bellavista)', 12),
(464, 'Cantón de San Pablo', 12),
(465, 'Carmen del Darién (CURBARADÓ)', 12),
(466, 'Condoto', 12),
(467, 'Cértegui', 12),
(468, 'El Carmen de Atrato', 12),
(469, 'Istmina', 12),
(470, 'Juradó', 12),
(471, 'Lloró', 12),
(472, 'Medio Atrato', 12),
(473, 'Medio Baudó', 12),
(474, 'Medio San Juan (ANDAGOYA)', 12),
(475, 'Novita', 12),
(476, 'Nuquí', 12),
(477, 'Quibdó', 12),
(478, 'Río Iró', 12),
(479, 'Río Quito', 12),
(480, 'Ríosucio', 12),
(481, 'San José del Palmar', 12),
(482, 'Santa Genoveva de Docorodó', 12),
(483, 'Sipí', 12),
(484, 'Tadó', 12),
(485, 'Unguía', 12),
(486, 'Unión Panamericana (ÁNIMAS)', 12),
(487, 'Ayapel', 13),
(488, 'Buenavista', 13),
(489, 'Canalete', 13),
(490, 'Cereté', 13),
(491, 'Chimá', 13),
(492, 'Chinú', 13),
(493, 'Ciénaga de Oro', 13),
(494, 'Cotorra', 13),
(495, 'La Apartada y La Frontera', 13),
(496, 'Lorica', 13),
(497, 'Los Córdobas', 13),
(498, 'Momil', 13),
(499, 'Montelíbano', 13),
(500, 'Monteria', 13),
(501, 'Moñitos', 13),
(502, 'Planeta Rica', 13),
(503, 'Pueblo Nuevo', 13),
(504, 'Puerto Escondido', 13),
(505, 'Puerto Libertador', 13),
(506, 'Purísima', 13),
(507, 'Sahagún', 13),
(508, 'San Andrés Sotavento', 13),
(509, 'San Antero', 13),
(510, 'San Bernardo del Viento', 13),
(511, 'San Carlos', 13),
(512, 'San José de Uré', 13),
(513, 'San Pelayo', 13),
(514, 'Tierralta', 13),
(515, 'Tuchín', 13),
(516, 'Valencia', 13),
(517, 'Agua de Dios', 14),
(518, 'Albán', 14),
(519, 'Anapoima', 14),
(520, 'Anolaima', 14),
(521, 'Apulo', 14),
(522, 'Arbeláez', 14),
(523, 'Beltrán', 14),
(524, 'Bituima', 14),
(525, 'Bogotá D.C.', 14),
(526, 'Bojacá', 14),
(527, 'Cabrera', 14),
(528, 'Cachipay', 14),
(529, 'Cajicá', 14),
(530, 'Caparrapí', 14),
(531, 'Carmen de Carupa', 14),
(532, 'Chaguaní', 14),
(533, 'Chipaque', 14),
(534, 'Choachí', 14),
(535, 'Chocontá', 14),
(536, 'Chía', 14),
(537, 'Cogua', 14),
(538, 'Cota', 14),
(539, 'Cucunubá', 14),
(540, 'Cáqueza', 14),
(541, 'El Colegio', 14),
(542, 'El Peñón', 14),
(543, 'El Rosal', 14),
(544, 'Facatativá', 14),
(545, 'Fosca', 14),
(546, 'Funza', 14),
(547, 'Fusagasugá', 14),
(548, 'Fómeque', 14),
(549, 'Fúquene', 14),
(550, 'Gachalá', 14),
(551, 'Gachancipá', 14),
(552, 'Gachetá', 14),
(553, 'Gama', 14),
(554, 'Girardot', 14),
(555, 'Granada', 14),
(556, 'Guachetá', 14),
(557, 'Guaduas', 14),
(558, 'Guasca', 14),
(559, 'Guataquí', 14),
(560, 'Guatavita', 14),
(561, 'Guayabal de Siquima', 14),
(562, 'Guayabetal', 14),
(563, 'Gutiérrez', 14),
(564, 'Jerusalén', 14),
(565, 'Junín', 14),
(566, 'La Calera', 14),
(567, 'La Mesa', 14),
(568, 'La Palma', 14),
(569, 'La Peña', 14),
(570, 'La Vega', 14),
(571, 'Lenguazaque', 14),
(572, 'Machetá', 14),
(573, 'Madrid', 14),
(574, 'Manta', 14),
(575, 'Medina', 14),
(576, 'Mosquera', 14),
(577, 'Nariño', 14),
(578, 'Nemocón', 14),
(579, 'Nilo', 14),
(580, 'Nimaima', 14),
(581, 'Nocaima', 14),
(582, 'Pacho', 14),
(583, 'Paime', 14),
(584, 'Pandi', 14),
(585, 'Paratebueno', 14),
(586, 'Pasca', 14),
(587, 'Puerto Salgar', 14),
(588, 'Pulí', 14),
(589, 'Quebradanegra', 14),
(590, 'Quetame', 14),
(591, 'Quipile', 14),
(592, 'Ricaurte', 14),
(593, 'San Antonio de Tequendama', 14),
(594, 'San Bernardo', 14),
(595, 'San Cayetano', 14),
(596, 'San Francisco', 14),
(597, 'San Juan de Río Seco', 14),
(598, 'Sasaima', 14),
(599, 'Sesquilé', 14),
(600, 'Sibaté', 14),
(601, 'Silvania', 14),
(602, 'Simijaca', 14),
(603, 'Soacha', 14),
(604, 'Sopó', 14),
(605, 'Subachoque', 14),
(606, 'Suesca', 14),
(607, 'Supatá', 14),
(608, 'Susa', 14),
(609, 'Sutatausa', 14),
(610, 'Tabio', 14),
(611, 'Tausa', 14),
(612, 'Tena', 14),
(613, 'Tenjo', 14),
(614, 'Tibacuy', 14),
(615, 'Tibirita', 14),
(616, 'Tocaima', 14),
(617, 'Tocancipá', 14),
(618, 'Topaipí', 14),
(619, 'Ubalá', 14),
(620, 'Ubaque', 14),
(621, 'Ubaté', 14),
(622, 'Une', 14),
(623, 'Venecia (Ospina Pérez)', 14),
(624, 'Vergara', 14),
(625, 'Viani', 14),
(626, 'Villagómez', 14),
(627, 'Villapinzón', 14),
(628, 'Villeta', 14),
(629, 'Viotá', 14),
(630, 'Yacopí', 14),
(631, 'Zipacón', 14),
(632, 'Zipaquirá', 14),
(633, 'Útica', 14),
(634, 'Inírida', 15),
(635, 'Calamar', 16),
(636, 'El Retorno', 16),
(637, 'Miraflores', 16),
(638, 'San José del Guaviare', 16),
(639, 'Acevedo', 17),
(640, 'Agrado', 17),
(641, 'Aipe', 17),
(642, 'Algeciras', 17),
(643, 'Altamira', 17),
(644, 'Baraya', 17),
(645, 'Campoalegre', 17),
(646, 'Colombia', 17),
(647, 'Elías', 17),
(648, 'Garzón', 17),
(649, 'Gigante', 17),
(650, 'Guadalupe', 17),
(651, 'Hobo', 17),
(652, 'Isnos', 17),
(653, 'La Argentina', 17),
(654, 'La Plata', 17),
(655, 'Neiva', 17),
(656, 'Nátaga', 17),
(657, 'Oporapa', 17),
(658, 'Paicol', 17),
(659, 'Palermo', 17),
(660, 'Palestina', 17),
(661, 'Pital', 17),
(662, 'Pitalito', 17),
(663, 'Rivera', 17),
(664, 'Saladoblanco', 17),
(665, 'San Agustín', 17),
(666, 'Santa María', 17),
(667, 'Suaza', 17),
(668, 'Tarqui', 17),
(669, 'Tello', 17),
(670, 'Teruel', 17),
(671, 'Tesalia', 17),
(672, 'Timaná', 17),
(673, 'Villavieja', 17),
(674, 'Yaguará', 17),
(675, 'Íquira', 17),
(676, 'Albania', 18),
(677, 'Barrancas', 18),
(678, 'Dibulla', 18),
(679, 'Distracción', 18),
(680, 'El Molino', 18),
(681, 'Fonseca', 18),
(682, 'Hatonuevo', 18),
(683, 'La Jagua del Pilar', 18),
(684, 'Maicao', 18),
(685, 'Manaure', 18),
(686, 'Riohacha', 18),
(687, 'San Juan del Cesar', 18),
(688, 'Uribia', 18),
(689, 'Urumita', 18),
(690, 'Villanueva', 18),
(691, 'Algarrobo', 19),
(692, 'Aracataca', 19),
(693, 'Ariguaní (El Difícil)', 19),
(694, 'Cerro San Antonio', 19),
(695, 'Chivolo', 19),
(696, 'Ciénaga', 19),
(697, 'Concordia', 19),
(698, 'El Banco', 19),
(699, 'El Piñon', 19),
(700, 'El Retén', 19),
(701, 'Fundación', 19),
(702, 'Guamal', 19),
(703, 'Nueva Granada', 19),
(704, 'Pedraza', 19),
(705, 'Pijiño', 19),
(706, 'Pivijay', 19),
(707, 'Plato', 19),
(708, 'Puebloviejo', 19),
(709, 'Remolino', 19),
(710, 'Sabanas de San Angel (SAN ANGEL)', 19),
(711, 'Salamina', 19),
(712, 'San Sebastián de Buenavista', 19),
(713, 'San Zenón', 19),
(714, 'Santa Ana', 19),
(715, 'Santa Bárbara de Pinto', 19),
(716, 'Santa Marta', 19),
(717, 'Sitionuevo', 19),
(718, 'Tenerife', 19),
(719, 'Zapayán (PUNTA DE PIEDRAS)', 19),
(720, 'Zona Bananera (PRADO - SEVILLA)', 19),
(721, 'Acacías', 20),
(722, 'Barranca de Upía', 20),
(723, 'Cabuyaro', 20),
(724, 'Castilla la Nueva', 20),
(725, 'Cubarral', 20),
(726, 'Cumaral', 20),
(727, 'El Calvario', 20),
(728, 'El Castillo', 20),
(729, 'El Dorado', 20),
(730, 'Fuente de Oro', 20),
(731, 'Granada', 20),
(732, 'Guamal', 20),
(733, 'La Macarena', 20),
(734, 'Lejanías', 20),
(735, 'Mapiripan', 20),
(736, 'Mesetas', 20),
(737, 'Puerto Concordia', 20),
(738, 'Puerto Gaitán', 20),
(739, 'Puerto Lleras', 20),
(740, 'Puerto López', 20),
(741, 'Puerto Rico', 20),
(742, 'Restrepo', 20),
(743, 'San Carlos de Guaroa', 20),
(744, 'San Juan de Arama', 20),
(745, 'San Juanito', 20),
(746, 'San Martín', 20),
(747, 'Uribe', 20),
(748, 'Villavicencio', 20),
(749, 'Vista Hermosa', 20),
(750, 'Albán (San José)', 21),
(751, 'Aldana', 21),
(752, 'Ancuya', 21),
(753, 'Arboleda (Berruecos)', 21),
(754, 'Barbacoas', 21),
(755, 'Belén', 21),
(756, 'Buesaco', 21),
(757, 'Chachaguí', 21),
(758, 'Colón (Génova)', 21),
(759, 'Consaca', 21),
(760, 'Contadero', 21),
(761, 'Cuaspud (Carlosama)', 21),
(762, 'Cumbal', 21),
(763, 'Cumbitara', 21),
(764, 'Córdoba', 21),
(765, 'El Charco', 21),
(766, 'El Peñol', 21),
(767, 'El Rosario', 21),
(768, 'El Tablón de Gómez', 21),
(769, 'El Tambo', 21),
(770, 'Francisco Pizarro', 21),
(771, 'Funes', 21),
(772, 'Guachavés', 21),
(773, 'Guachucal', 21),
(774, 'Guaitarilla', 21),
(775, 'Gualmatán', 21),
(776, 'Iles', 21),
(777, 'Imúes', 21),
(778, 'Ipiales', 21),
(779, 'La Cruz', 21),
(780, 'La Florida', 21),
(781, 'La Llanada', 21),
(782, 'La Tola', 21),
(783, 'La Unión', 21),
(784, 'Leiva', 21),
(785, 'Linares', 21),
(786, 'Magüi (Payán)', 21),
(787, 'Mallama (Piedrancha)', 21),
(788, 'Mosquera', 21),
(789, 'Nariño', 21),
(790, 'Olaya Herrera', 21),
(791, 'Ospina', 21),
(792, 'Policarpa', 21),
(793, 'Potosí', 21),
(794, 'Providencia', 21),
(795, 'Puerres', 21),
(796, 'Pupiales', 21),
(797, 'Ricaurte', 21),
(798, 'Roberto Payán (San José)', 21),
(799, 'Samaniego', 21),
(800, 'San Bernardo', 21),
(801, 'San Juan de Pasto', 21),
(802, 'San Lorenzo', 21),
(803, 'San Pablo', 21),
(804, 'San Pedro de Cartago', 21),
(805, 'Sandoná', 21),
(806, 'Santa Bárbara (Iscuandé)', 21),
(807, 'Sapuyes', 21),
(808, 'Sotomayor (Los Andes)', 21),
(809, 'Taminango', 21),
(810, 'Tangua', 21),
(811, 'Tumaco', 21),
(812, 'Túquerres', 21),
(813, 'Yacuanquer', 21),
(814, 'Arboledas', 22),
(815, 'Bochalema', 22),
(816, 'Bucarasica', 22),
(817, 'Chinácota', 22),
(818, 'Chitagá', 22),
(819, 'Convención', 22),
(820, 'Cucutilla', 22),
(821, 'Cáchira', 22),
(822, 'Cácota', 22),
(823, 'Cúcuta', 22),
(824, 'Durania', 22),
(825, 'El Carmen', 22),
(826, 'El Tarra', 22),
(827, 'El Zulia', 22),
(828, 'Gramalote', 22),
(829, 'Hacarí', 22),
(830, 'Herrán', 22),
(831, 'La Esperanza', 22),
(832, 'La Playa', 22),
(833, 'Labateca', 22),
(834, 'Los Patios', 22),
(835, 'Lourdes', 22),
(836, 'Mutiscua', 22),
(837, 'Ocaña', 22),
(838, 'Pamplona', 22),
(839, 'Pamplonita', 22),
(840, 'Puerto Santander', 22),
(841, 'Ragonvalia', 22),
(842, 'Salazar', 22),
(843, 'San Calixto', 22),
(844, 'San Cayetano', 22),
(845, 'Santiago', 22),
(846, 'Sardinata', 22),
(847, 'Silos', 22),
(848, 'Teorama', 22),
(849, 'Tibú', 22),
(850, 'Toledo', 22),
(851, 'Villa Caro', 22),
(852, 'Villa del Rosario', 22),
(853, 'Ábrego', 22),
(854, 'Colón', 23),
(855, 'Mocoa', 23),
(856, 'Orito', 23),
(857, 'Puerto Asís', 23),
(858, 'Puerto Caicedo', 23),
(859, 'Puerto Guzmán', 23),
(860, 'Puerto Leguízamo', 23),
(861, 'San Francisco', 23),
(862, 'San Miguel', 23),
(863, 'Santiago', 23),
(864, 'Sibundoy', 23),
(865, 'Valle del Guamuez', 23),
(866, 'Villagarzón', 23),
(867, 'Armenia', 24),
(868, 'Buenavista', 24),
(869, 'Calarcá', 24),
(870, 'Circasia', 24),
(871, 'Cordobá', 24),
(872, 'Filandia', 24),
(873, 'Génova', 24),
(874, 'La Tebaida', 24),
(875, 'Montenegro', 24),
(876, 'Pijao', 24),
(877, 'Quimbaya', 24),
(878, 'Salento', 24),
(879, 'Apía', 25),
(880, 'Balboa', 25),
(881, 'Belén de Umbría', 25),
(882, 'Dos Quebradas', 25),
(883, 'Guática', 25),
(884, 'La Celia', 25),
(885, 'La Virginia', 25),
(886, 'Marsella', 25),
(887, 'Mistrató', 25),
(888, 'Pereira', 25),
(889, 'Pueblo Rico', 25),
(890, 'Quinchía', 25),
(891, 'Santa Rosa de Cabal', 25),
(892, 'Santuario', 25),
(893, 'Providencia', 26),
(894, 'Aguada', 27),
(895, 'Albania', 27),
(896, 'Aratoca', 27),
(897, 'Barbosa', 27),
(898, 'Barichara', 27),
(899, 'Barrancabermeja', 27),
(900, 'Betulia', 27),
(901, 'Bolívar', 27),
(902, 'Bucaramanga', 27),
(903, 'Cabrera', 27),
(904, 'California', 27),
(905, 'Capitanejo', 27),
(906, 'Carcasí', 27),
(907, 'Cepita', 27),
(908, 'Cerrito', 27),
(909, 'Charalá', 27),
(910, 'Charta', 27),
(911, 'Chima', 27),
(912, 'Chipatá', 27),
(913, 'Cimitarra', 27),
(914, 'Concepción', 27),
(915, 'Confines', 27),
(916, 'Contratación', 27),
(917, 'Coromoro', 27),
(918, 'Curití', 27),
(919, 'El Carmen', 27),
(920, 'El Guacamayo', 27),
(921, 'El Peñon', 27),
(922, 'El Playón', 27),
(923, 'Encino', 27),
(924, 'Enciso', 27),
(925, 'Floridablanca', 27),
(926, 'Florián', 27),
(927, 'Galán', 27),
(928, 'Girón', 27),
(929, 'Guaca', 27),
(930, 'Guadalupe', 27),
(931, 'Guapota', 27),
(932, 'Guavatá', 27),
(933, 'Guepsa', 27),
(934, 'Gámbita', 27),
(935, 'Hato', 27),
(936, 'Jesús María', 27),
(937, 'Jordán', 27),
(938, 'La Belleza', 27),
(939, 'La Paz', 27),
(940, 'Landázuri', 27),
(941, 'Lebrija', 27),
(942, 'Los Santos', 27),
(943, 'Macaravita', 27),
(944, 'Matanza', 27),
(945, 'Mogotes', 27),
(946, 'Molagavita', 27),
(947, 'Málaga', 27),
(948, 'Ocamonte', 27),
(949, 'Oiba', 27),
(950, 'Onzaga', 27),
(951, 'Palmar', 27),
(952, 'Palmas del Socorro', 27),
(953, 'Pie de Cuesta', 27),
(954, 'Pinchote', 27),
(955, 'Puente Nacional', 27),
(956, 'Puerto Parra', 27),
(957, 'Puerto Wilches', 27),
(958, 'Páramo', 27),
(959, 'Rio Negro', 27),
(960, 'Sabana de Torres', 27),
(961, 'San Andrés', 27),
(962, 'San Benito', 27),
(963, 'San Gíl', 27),
(964, 'San Joaquín', 27),
(965, 'San José de Miranda', 27),
(966, 'San Miguel', 27),
(967, 'San Vicente del Chucurí', 27),
(968, 'Santa Bárbara', 27),
(969, 'Santa Helena del Opón', 27),
(970, 'Simacota', 27),
(971, 'Socorro', 27),
(972, 'Suaita', 27),
(973, 'Sucre', 27),
(974, 'Suratá', 27),
(975, 'Tona', 27),
(976, 'Valle de San José', 27),
(977, 'Vetas', 27),
(978, 'Villanueva', 27),
(979, 'Vélez', 27),
(980, 'Zapatoca', 27),
(981, 'Buenavista', 28),
(982, 'Caimito', 28),
(983, 'Chalán', 28),
(984, 'Colosó (Ricaurte)', 28),
(985, 'Corozal', 28),
(986, 'Coveñas', 28),
(987, 'El Roble', 28),
(988, 'Galeras (Nueva Granada)', 28),
(989, 'Guaranda', 28),
(990, 'La Unión', 28),
(991, 'Los Palmitos', 28),
(992, 'Majagual', 28),
(993, 'Morroa', 28),
(994, 'Ovejas', 28),
(995, 'Palmito', 28),
(996, 'Sampués', 28),
(997, 'San Benito Abad', 28),
(998, 'San Juan de Betulia', 28),
(999, 'San Marcos', 28),
(1000, 'San Onofre', 28),
(1001, 'San Pedro', 28),
(1002, 'Sincelejo', 28),
(1003, 'Sincé', 28),
(1004, 'Sucre', 28),
(1005, 'Tolú', 28),
(1006, 'Tolú Viejo', 28),
(1007, 'Alpujarra', 29),
(1008, 'Alvarado', 29),
(1009, 'Ambalema', 29),
(1010, 'Anzoátegui', 29),
(1011, 'Armero (Guayabal)', 29),
(1012, 'Ataco', 29),
(1013, 'Cajamarca', 29),
(1014, 'Carmen de Apicalá', 29),
(1015, 'Casabianca', 29),
(1016, 'Chaparral', 29),
(1017, 'Coello', 29),
(1018, 'Coyaima', 29),
(1019, 'Cunday', 29),
(1020, 'Dolores', 29),
(1021, 'Espinal', 29),
(1022, 'Falan', 29),
(1023, 'Flandes', 29),
(1024, 'Fresno', 29),
(1025, 'Guamo', 29),
(1026, 'Herveo', 29),
(1027, 'Honda', 29),
(1028, 'Ibagué', 29),
(1029, 'Icononzo', 29),
(1030, 'Lérida', 29),
(1031, 'Líbano', 29),
(1032, 'Mariquita', 29),
(1033, 'Melgar', 29),
(1034, 'Murillo', 29),
(1035, 'Natagaima', 29),
(1036, 'Ortega', 29),
(1037, 'Palocabildo', 29),
(1038, 'Piedras', 29),
(1039, 'Planadas', 29),
(1040, 'Prado', 29),
(1041, 'Purificación', 29),
(1042, 'Rioblanco', 29),
(1043, 'Roncesvalles', 29),
(1044, 'Rovira', 29),
(1045, 'Saldaña', 29),
(1046, 'San Antonio', 29),
(1047, 'San Luis', 29),
(1048, 'Santa Isabel', 29),
(1049, 'Suárez', 29),
(1050, 'Valle de San Juan', 29),
(1051, 'Venadillo', 29),
(1052, 'Villahermosa', 29),
(1053, 'Villarrica', 29),
(1054, 'Alcalá', 30),
(1055, 'Andalucía', 30),
(1056, 'Ansermanuevo', 30),
(1057, 'Argelia', 30),
(1058, 'Bolívar', 30),
(1059, 'Buenaventura', 30),
(1060, 'Buga', 30),
(1061, 'Bugalagrande', 30),
(1062, 'Caicedonia', 30),
(1063, 'Calima (Darién)', 30),
(1064, 'Calí', 30),
(1065, 'Candelaria', 30),
(1066, 'Cartago', 30),
(1067, 'Dagua', 30),
(1068, 'El Cairo', 30),
(1069, 'El Cerrito', 30),
(1070, 'El Dovio', 30),
(1071, 'El Águila', 30),
(1072, 'Florida', 30),
(1073, 'Ginebra', 30),
(1074, 'Guacarí', 30),
(1075, 'Jamundí', 30),
(1076, 'La Cumbre', 30),
(1077, 'La Unión', 30),
(1078, 'La Victoria', 30),
(1079, 'Obando', 30),
(1080, 'Palmira', 30),
(1081, 'Pradera', 30),
(1082, 'Restrepo', 30),
(1083, 'Riofrío', 30),
(1084, 'Roldanillo', 30),
(1085, 'San Pedro', 30),
(1086, 'Sevilla', 30),
(1087, 'Toro', 30),
(1088, 'Trujillo', 30),
(1089, 'Tulúa', 30),
(1090, 'Ulloa', 30),
(1091, 'Versalles', 30),
(1092, 'Vijes', 30),
(1093, 'Yotoco', 30),
(1094, 'Yumbo', 30),
(1095, 'Zarzal', 30),
(1096, 'Carurú', 31),
(1097, 'Mitú', 31),
(1098, 'Taraira', 31),
(1099, 'Cumaribo', 32),
(1100, 'La Primavera', 32),
(1101, 'Puerto Carreño', 32),
(1102, 'Santa Rosalía', 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `education_level`
--

CREATE TABLE `education_level` (
  `id` int(11) NOT NULL,
  `nombre` char(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `education_level`
--

INSERT INTO `education_level` (`id`, `nombre`) VALUES
(1, 'Bachiller'),
(2, 'Tecnico'),
(3, 'Tecnico Profesional'),
(4, 'Tecnologo'),
(5, 'Profesional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `friends`
--

CREATE TABLE `friends` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `friend` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marital_state`
--

CREATE TABLE `marital_state` (
  `id` int(11) NOT NULL,
  `nombre` char(50) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marital_state`
--

INSERT INTO `marital_state` (`id`, `nombre`) VALUES
(1, 'Soltero(a)'),
(2, 'Casado(a)'),
(3, 'Viudo(a)'),
(4, 'union libre'),
(5, 'En compromiso'),
(6, 'En relacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mwhite_credit_credit`
--

CREATE TABLE `mwhite_credit_credit` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL DEFAULT 0,
  `type_credit` int(11) DEFAULT NULL,
  `amount_requested` float DEFAULT NULL,
  `amount_approved` float DEFAULT NULL,
  `number_quotas` int(11) DEFAULT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp(),
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mwhite_credit_credit`
--

INSERT INTO `mwhite_credit_credit` (`id`, `id_user`, `type_credit`, `amount_requested`, `amount_approved`, `number_quotas`, `date_creation`, `last_activity`) VALUES
(2, 3, 1, NULL, NULL, NULL, '2020-07-28 18:08:01', '2020-08-01 04:37:30'),
(3, 3, 1, 111, NULL, NULL, '2020-07-28 18:13:29', '2020-08-01 04:37:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mwhite_credit_settings`
--

CREATE TABLE `mwhite_credit_settings` (
  `id` int(10) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `syatem_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `login_page_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `copy_rights` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `system_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `time_zone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `favicon_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `login_page_logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_sk` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_pk` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `paypal_email` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `checkout_id` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `checkout_pk` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `system_email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `forget_email` text COLLATE utf8_unicode_ci NOT NULL,
  `create_account_email` text COLLATE utf8_unicode_ci NOT NULL,
  `project_assign_email` text COLLATE utf8_unicode_ci NOT NULL,
  `assign_staff_email` text COLLATE utf8_unicode_ci NOT NULL,
  `project_update_email` text COLLATE utf8_unicode_ci NOT NULL,
  `system_language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `purchase_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mwhite_credit_settings`
--

INSERT INTO `mwhite_credit_settings` (`id`, `url`, `company_name`, `syatem_title`, `login_page_title`, `copy_rights`, `system_currency`, `time_zone`, `favicon_image`, `login_page_logo`, `logo`, `mobile_logo`, `stripe_sk`, `stripe_pk`, `paypal_email`, `checkout_id`, `checkout_pk`, `system_email`, `forget_email`, `create_account_email`, `project_assign_email`, `assign_staff_email`, `project_update_email`, `system_language`, `version`, `purchase_code`) VALUES
(1, 'http://localhost/mwhite_creditos/', 'Creditos MWhite', 'Creditos MWhite', 'Accede  a tu cuenta:', '©2020 Créditos MWhite. Todos los derechos reservados.', 'COP,$', 'America/Lima', '1592718769_login_logo-mwhite.png', '1592718769_login_logo-mwhite.png', '1592718769_logo_logo-mwhite.png', '1592718769_logo_logo-mwhite.png', '0', '0', '0', '0', '0', 'no-reply@teameyo.com', '<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#f3f2f0\" align=\"center\">\r\n<tbody><tr><td height=\"40\"> </td></tr>\r\n<tr><td height=\"20\"> </td></tr>\r\n  <tr>\r\n    <td>\r\n  <table style=\"margin:0 auto\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n  <tbody><tr>\r\n    <td>\r\n    <table style=\"margin:0 auto\" width=\"400\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n   <tbody><tr>\r\n    <td height=\"60\"></td>\r\n  </tr>\r\n  <tr>\r\n    <td><font size=\"3\" face=\"Arial, Helvetica, sans-serif\" color=\"#000000\">Hi, {USER_NAME} </font></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=\"30\"></td>\r\n  </tr>\r\n  <tr>\r\n    <td><font size=\"6\" face=\"Arial, Helvetica, sans-serif\" color=\"#5fbaff\"><b>You requested your Teameyo password be reset.</b></font></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=\"40\"></td>\r\n  </tr>\r\n  <tr>\r\n    <td> <table width=\"450\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n  <tbody><tr>\r\n<td width=\"200\" height=\"40\" bgcolor=\"#5fbaff\" align=\"center\">\r\n    <a href=\"{RESET_URL}\"><font size=\"3\" face=\"Arial, Helvetica, sans-serif\" color=\"#FFFFFF\" style=\"text-decoration:none;\"><b>Reset your password</b></font></a> \r\n    </td><td width=\"200\">&nbsp;</td>  </tr>\r\n</tbody></table>\r\n</td>\r\n  </tr>\r\n  <tr>\r\n    <td height=\"30\"></td>\r\n  </tr>\r\n    <tr>\r\n    <td><font size=\"3\" face=\"Arial, Helvetica, sans-serif\" color=\"#000000\">You will then be able to log into your account and change your password.</font></td>\r\n  </tr>\r\n    <tr>\r\n  <td height=\"30\"></td>\r\n  </tr>\r\n      <tr>\r\n    <td><font size=\"3\" face=\"Arial, Helvetica, sans-serif\" color=\"#000000\">If you <b> did not request your password be reset</b> then ignore this email.</font></td>\r\n  </tr>\r\n    <tr>\r\n  <td height=\"30\"></td>\r\n  </tr>\r\n  <tr>\r\n    <td><font size=\"3\" face=\"Arial, Helvetica, sans-serif\" color=\"#000000\">Kind Regards,<br>{SIGNATURE}</font></td>\r\n  </tr>\r\n  <tr>\r\n  <td height=\"60\"></td>\r\n  </tr>\r\n</tbody></table>\r\n    </td>\r\n  </tr>\r\n</tbody></table>\r\n    </td></tr><tr><td height=\"50\"> </td></tr>\r\n</tbody></table>', '<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#f3f2f0\" align=\"center\">\r\n<tbody><tr><td height=\"40\"> </td></tr>\r\n<tr><td height=\"20\"> </td></tr>\r\n  <tr>\r\n    <td>\r\n  <table style=\"margin:0 auto\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n  <tbody><tr>\r\n    <td>\r\n    <table style=\"margin:0 auto\" width=\"400\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n   <tbody><tr>\r\n    <td height=\"60\"></td>\r\n  </tr>\r\n  <tr>\r\n    <td><font size=\"6\" face=\"Arial, Helvetica, sans-serif\" color=\"#5fbaff\"><b>Welcome to the Teameyo community!</b></font></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=\"40\"></td>\r\n  </tr>\r\n  <tr>\r\n    <td><font size=\"3\" face=\"Arial, Helvetica, sans-serif\" color=\"#000000\">Hi {USER_NAME},</font></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=\"20\"></td>\r\n  </tr>\r\n  <tr>\r\n    <td><font size=\"3\" face=\"Arial, Helvetica, sans-serif\" color=\"#000000\">You are free to login with followed details</font></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=\"30\"></td>\r\n  </tr>\r\n   <tr>\r\n    <td><table width=\"400\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n  <tbody><tr>\r\n<td width=\"100\" height=\"40\" bgcolor=\"#5fbaff\" align=\"center\">\r\n    <a href=\"{DASHBOARD_URL}\"><font size=\"3\" face=\"Arial, Helvetica, sans-serif\" color=\"#FFFFFF\" style=\"text-decoration:none;\"><b>Login</b></font></a> \r\n    </td><td width=\"300\">&nbsp;</td>  </tr>\r\n</tbody></table></td>\r\n  </tr>\r\n   <tr>\r\n    <td height=\"30\"></td>\r\n  </tr>\r\n  <tr>\r\n      <td><font size=\"3\" face=\"Arial, Helvetica, sans-serif\" color=\"#000000\">\r\nEmail : {USER_LOGIN_EMAIL}<br>\r\n Password: {USER_LOGIN_PASSWORD}</font></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=\"30\"></td>\r\n  </tr>\r\n  <tr>\r\n    <td><font size=\"3\" face=\"Arial, Helvetica, sans-serif\" color=\"#000000\">Kind Regards,<br>\r\n{SIGNATURE}</font></td>\r\n  </tr>\r\n  <tr>\r\n  <td height=\"60\"></td>\r\n  </tr>\r\n</tbody></table>\r\n    </td>\r\n  </tr>\r\n</tbody></table>\r\n    </td></tr><tr><td height=\"60\"> </td></tr>\r\n</tbody></table>', '<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#f3f2f0\" align=\"center\">\r\n<tbody><tr><td height=\"40\"> </td></tr>\r\n<tr><td height=\"20\"> </td></tr>\r\n  <tr>\r\n    <td>\r\n  <table style=\"margin:0 auto\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n  <tbody><tr>\r\n    <td>\r\n    <table style=\"margin:0 auto\" width=\"400\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n   <tbody><tr>\r\n    <td height=\"60\"></td>\r\n  </tr>\r\n  <tr>\r\n    <td><font size=\"6\" face=\"Arial, Helvetica, sans-serif\" color=\"#5fbaff\"><b>A new project has been created in the Teameyo community!</b></font></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=\"40\"></td>\r\n  </tr>\r\n    <tr>\r\n    <td><font size=\"3\" face=\"Arial, Helvetica, sans-serif\" color=\"#000000\">Hi, {USER_NAME}</font></td>\r\n  </tr>\r\n    <tr>\r\n  <td height=\"30\"></td>\r\n  </tr>\r\n      <tr>\r\n    <td><font size=\"3\" face=\"Arial, Helvetica, sans-serif\" color=\"#000000\">Project name: {PROJECT_NAME}</font></td>\r\n  </tr>\r\n   <tr>\r\n  <td height=\"20\"></td>\r\n  </tr>\r\n      <tr>\r\n    <td><font size=\"3\" face=\"Arial, Helvetica, sans-serif\" color=\"#000000\">Please login your account to view status and updates of the project.</font></td>\r\n  </tr>\r\n  <tr>\r\n  <td height=\"20\"></td>\r\n  </tr>\r\n    <tr>\r\n  <td><table width=\"400\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n  <tbody><tr>\r\n<td width=\"100\" height=\"40\" bgcolor=\"#5fbaff\" align=\"center\">\r\n    <a href=\"{DASHBOARD_URL}\"><font size=\"3\" face=\"Arial, Helvetica, sans-serif\" color=\"#FFFFFF\" style=\"text-decoration:none;\"><b>Login</b></font></a> \r\n    </td><td width=\"300\">&nbsp;</td>  </tr>\r\n</tbody></table></td>\r\n  </tr>\r\n    <tr>\r\n  <td height=\"30\"></td>\r\n  </tr>\r\n  <tr>\r\n    <td><font size=\"3\" face=\"Arial, Helvetica, sans-serif\" color=\"#000000\">Kind Regards,<br>{SIGNATURE}</font></td>\r\n  </tr>\r\n  <tr>\r\n  <td height=\"60\"></td>\r\n  </tr>\r\n</tbody></table>\r\n    </td>\r\n  </tr>\r\n</tbody></table>\r\n    </td></tr><tr><td height=\"50\"> </td></tr>\r\n</tbody></table>', '<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#f3f2f0\" align=\"center\">\r\n<tbody><tr><td height=\"40\"> </td></tr>\r\n<tr><td height=\"20\"> </td></tr>\r\n  <tr>\r\n    <td>\r\n  <table style=\"margin:0 auto\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n  <tbody><tr>\r\n    <td>\r\n    <table style=\"margin:0 auto\" width=\"400\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n   <tbody><tr>\r\n    <td height=\"60\"></td>\r\n  </tr>\r\n  <tr>\r\n    <td><font size=\"6\" face=\"Arial, Helvetica, sans-serif\" color=\"#5fbaff\"><b>Admin assigned you in a project</b></font></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=\"40\"></td>\r\n  </tr>\r\n    <tr>\r\n    <td><font size=\"3\" face=\"Arial, Helvetica, sans-serif\" color=\"#000000\">Hi, {USER_NAME}</font></td>\r\n  </tr>\r\n    <tr>\r\n  <td height=\"30\"></td>\r\n  </tr>\r\n      <tr>\r\n    <td><font size=\"3\" face=\"Arial, Helvetica, sans-serif\" color=\"#000000\">Project name: {PROJECT_NAME}</font></td>\r\n  </tr>\r\n   <tr>\r\n  <td height=\"20\"></td>\r\n  </tr>\r\n      <tr>\r\n    <td><font size=\"3\" face=\"Arial, Helvetica, sans-serif\" color=\"#000000\">Please login your account to view status and updates of the project.</font></td>\r\n  </tr>\r\n  <tr>\r\n  <td height=\"20\"></td>\r\n  </tr>\r\n    <tr>\r\n  <td><table width=\"400\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n  <tbody><tr>\r\n<td width=\"100\" height=\"40\" bgcolor=\"#5fbaff\" align=\"center\">\r\n    <a href=\"{DASHBOARD_URL}\"><font style=\"text-decoration:none;\" size=\"3\" face=\"Arial, Helvetica, sans-serif\" color=\"#FFFFFF\"><b>Login</b></font></a> \r\n    </td><td width=\"300\">Ã‚Â </td>  </tr>\r\n</tbody></table></td>\r\n  </tr>\r\n    <tr>\r\n  <td height=\"30\"></td>\r\n  </tr>\r\n  <tr>\r\n    <td><font size=\"3\" face=\"Arial, Helvetica, sans-serif\" color=\"#000000\">Kind Regards,<br>{SIGNATURE}</font></td>\r\n  </tr>\r\n  <tr>\r\n  <td height=\"60\"></td>\r\n  </tr>\r\n</tbody></table>\r\n    </td>\r\n  </tr>\r\n</tbody></table>\r\n    </td></tr><tr><td height=\"50\"> </td></tr>\r\n</tbody></table>', '<table width=\"100%\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#f3f2f0\" align=\"center\">\r\n<tbody><tr><td height=\"40\"> </td></tr>\r\n<tr><td height=\"20\"> </td></tr>\r\n  <tr>\r\n    <td>\r\n  <table style=\"margin:0 auto\" width=\"600\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" bgcolor=\"#FFFFFF\" align=\"center\">\r\n  <tbody><tr>\r\n    <td>\r\n    <table style=\"margin:0 auto\" width=\"400\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" align=\"center\">\r\n   <tbody><tr>\r\n    <td height=\"60\"></td>\r\n  </tr>\r\n  <tr>\r\n    <td><font size=\"6\" face=\"Arial, Helvetica, sans-serif\" color=\"#5fbaff\"><b>Admin update the project information <br></b></font></td>\r\n  </tr>\r\n  <tr>\r\n    <td height=\"40\"></td>\r\n  </tr>\r\n    <tr>\r\n    <td><font size=\"3\" face=\"Arial, Helvetica, sans-serif\" color=\"#000000\">Hi, {USER_NAME}</font></td>\r\n  </tr>\r\n    <tr>\r\n  <td height=\"30\"></td>\r\n  </tr>\r\n      <tr>\r\n    <td><font size=\"3\" face=\"Arial, Helvetica, sans-serif\" color=\"#000000\">Project name: {PROJECT_NAME}</font></td>\r\n  </tr>\r\n   <tr>\r\n  <td height=\"20\"></td>\r\n  </tr>\r\n      <tr>\r\n    <td><font size=\"3\" face=\"Arial, Helvetica, sans-serif\" color=\"#000000\">Please login your account to view status and updates of the project.</font></td>\r\n  </tr>\r\n  <tr>\r\n  <td height=\"20\"></td>\r\n  </tr>\r\n    <tr>\r\n  <td><table width=\"400\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\">\r\n  <tbody><tr>\r\n<td width=\"100\" height=\"40\" bgcolor=\"#5fbaff\" align=\"center\">\r\n    <a href=\"{DASHBOARD_URL}\"><font style=\"text-decoration:none;\" size=\"3\" face=\"Arial, Helvetica, sans-serif\" color=\"#FFFFFF\"><b>Login</b></font></a> \r\n    </td><td width=\"300\">&nbsp;</td>  </tr>\r\n</tbody></table></td>\r\n  </tr>\r\n    <tr>\r\n  <td height=\"30\"></td>\r\n  </tr>\r\n  <tr>\r\n    <td><font size=\"3\" face=\"Arial, Helvetica, sans-serif\" color=\"#000000\">Kind Regards,<br>{SIGNATURE}</font></td>\r\n  </tr>\r\n  <tr>\r\n  <td height=\"60\"></td>\r\n  </tr>\r\n</tbody></table>\r\n    </td>\r\n  </tr>\r\n</tbody></table>\r\n    </td></tr><tr><td height=\"50\"> </td></tr>\r\n</tbody></table>', 'sp', '1', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mwhite_credit_study`
--

CREATE TABLE `mwhite_credit_study` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `status_study` int(11) NOT NULL,
  `comentary` char(200) DEFAULT NULL,
  `date_creation` datetime NOT NULL DEFAULT current_timestamp(),
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mwhite_credit_user`
--

CREATE TABLE `mwhite_credit_user` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `dni_type` int(11) NOT NULL,
  `dni_date` date DEFAULT NULL,
  `dni` varchar(50) CHARACTER SET latin1 NOT NULL,
  `firstname` varchar(100) CHARACTER SET latin1 NOT NULL,
  `lastname` varchar(100) CHARACTER SET latin1 NOT NULL,
  `cellphone` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(100) CHARACTER SET latin1 NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT current_timestamp(),
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `info` text CHARACTER SET latin1 NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT current_timestamp(),
  `state_auth` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mwhite_credit_user`
--

INSERT INTO `mwhite_credit_user` (`id`, `role`, `dni_type`, `dni_date`, `dni`, `firstname`, `lastname`, `cellphone`, `email`, `last_activity`, `password`, `info`, `date_creation`, `state_auth`) VALUES
(1, 1, 1, '2020-07-24', '123456789', 'Admin', 'Admin', '3001234567', 'admin@mwhite.com', '0000-00-00 00:00:00', '$2y$10$1Qw78eD/P6w5wjRYzPwrK.akXiM4hDB173FJnUR1foRqwnbPFUL42', '', '2020-06-22 19:53:48', 0),
(2, 2, 1, '2020-07-24', '123457890', 'Customer', 'Customer', '3011234567', 'customer@mwhite.com', '0000-00-00 00:00:00', '$2y$10$yI5.iBRoRctjLkW2Hu8Sa.rPvsVCMI5im8fBb5sRnK1efP70ciAri', '', '2020-06-25 02:42:20', 0),
(3, 2, 2, '2020-07-09', '34569878', 'test', 'test', '300', 'adrian@mutoestudio.com', '2020-07-28 07:15:36', '$2y$10$EXL46IqVlQoI2gTxIgy/uuV5UaMsVPv9GYaiV0xsRoL5zss2vHRdm', '', '2020-07-28 07:15:36', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mwhite_credit_user_profile`
--

CREATE TABLE `mwhite_credit_user_profile` (
  `id_user` int(11) NOT NULL,
  `date_birth` date DEFAULT NULL,
  `adress` varchar(225) CHARACTER SET latin1 DEFAULT NULL,
  `stratum` int(11) DEFAULT NULL,
  `neighborhood` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `city` int(11) DEFAULT NULL,
  `province` int(11) DEFAULT NULL,
  `recidence` int(11) DEFAULT NULL,
  `marital_status` int(11) DEFAULT NULL,
  `dependants` int(11) DEFAULT NULL,
  `activity` int(11) DEFAULT NULL,
  `sons` int(11) DEFAULT NULL,
  `type_housing` int(11) DEFAULT NULL,
  `phone` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `education_level` int(11) DEFAULT NULL,
  `profession` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `company` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `company_tax_number` int(11) NOT NULL,
  `company_adress` varchar(225) CHARACTER SET latin1 DEFAULT NULL,
  `company_economic_activity` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `monthly_earnings` float DEFAULT NULL,
  `monthly_profit` float DEFAULT NULL,
  `company_date` date DEFAULT NULL,
  `company_phone` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `supplier_name` varchar(225) CHARACTER SET latin1 DEFAULT NULL,
  `supplier_phone` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `supplier_adress` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `supplier_company` varchar(225) CHARACTER SET latin1 DEFAULT NULL,
  `supplier_tax_number` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `supplier_tax_document` varchar(225) CHARACTER SET latin1 DEFAULT NULL,
  `p_reference_name` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `p_reference_lastname` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `p_reference_time` int(11) DEFAULT NULL,
  `p_reference_phone` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `p_reference_email` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `f_reference_name` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `f_reference_lastname` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `f_reference_phone` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `f_reference_email` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `dni_front_view` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `dni_rear_view` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mwhite_credit_user_profile`
--

INSERT INTO `mwhite_credit_user_profile` (`id_user`, `date_birth`, `adress`, `stratum`, `neighborhood`, `city`, `province`, `recidence`, `marital_status`, `dependants`, `activity`, `sons`, `type_housing`, `phone`, `education_level`, `profession`, `company`, `company_tax_number`, `company_adress`, `company_economic_activity`, `monthly_earnings`, `monthly_profit`, `company_date`, `company_phone`, `supplier_name`, `supplier_phone`, `supplier_adress`, `supplier_company`, `supplier_tax_number`, `supplier_tax_document`, `p_reference_name`, `p_reference_lastname`, `p_reference_time`, `p_reference_phone`, `p_reference_email`, `f_reference_name`, `f_reference_lastname`, `f_reference_phone`, `f_reference_email`, `dni_front_view`, `dni_rear_view`) VALUES
(1, '2020-07-11', 'Cra 22 22 22 ', 1, 'Villa test', 1, 1, 54, 2, 2, 1, 2, 1, '3001234567', 1, 'ing de sistemas', 'relax test', 1212, 'via juan test', 'manufactura', 100000, 100000, '2020-07-22', '300', 'testpro', '356', 'via juan test', '11000', '2000', '2332.', 'referencia test', 'apellido test', 12, '3421397', 'referencia@test.com', 'Test famili', 'apellido test', '3565253', 'referencia@test.com', '../uploads/dni/123456789', '../uploads/dni/123456789'),
(2, '2020-07-11', 'Cra 22 22 22 ', 1, 'Villa test', 1, 1, 54, 2, 2, 1, 2, 1, '3011234567', 1, 'ing de sistemas', 'relax test', 1212, 'via juan test', 'manufactura', 100000, 100000, '2020-07-22', '300', 'testpro', '356', 'via juan test', '11000', '2000', '2332.', 'referencia test', 'apellido test', 2, '30562', 'referencia@test.com', 'Test famili', 'apellido test', '32323', 'referencia@test.com', '../uploads/dni/123456789', '../uploads/dni/123456789'),
(3, '2020-07-11', 'Cra 22 22 23', 1, 'Villa test', 1, 1, 54, 1, 2, 1, 2, 1, '300', 4, 'ing de sistemas', 'relax test', 1212121212, 'via juan testmail', 'manufactura', 100000, 100000, '2020-07-27', '32323', 'testpro', '232323', 'via juan test', '11000', '2000', '2332', 'referencia test', 'apellido test', 2, '30562', 'referencia@test.com', 'Test familia', 'apellido test', '35689', 'referencia@test.com', '../uploads/dni/123456789224605.jpg', '../uploads/dni/123456789fotos-perfil-whatsapp_16.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `province`
--

CREATE TABLE `province` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `province`
--

INSERT INTO `province` (`id`, `nombre`) VALUES
(1, 'Amazonas'),
(2, 'Antioquia'),
(3, 'Arauca'),
(4, 'Atlántico'),
(5, 'Bolívar'),
(6, 'Boyacá'),
(7, 'Caldas'),
(8, 'Caquetá'),
(9, 'Casanare'),
(10, 'Cauca'),
(11, 'Cesar'),
(12, 'Chocó'),
(13, 'Córdoba'),
(14, 'Cundinamarca'),
(15, 'Güainia'),
(16, 'Guaviare'),
(17, 'Huila'),
(18, 'La Guajira'),
(19, 'Magdalena'),
(20, 'Meta'),
(21, 'Nariño'),
(22, 'Norte de Santander'),
(23, 'Putumayo'),
(24, 'Quindio'),
(25, 'Risaralda'),
(26, 'San Andrés y Providencia'),
(27, 'Santander'),
(28, 'Sucre'),
(29, 'Tolima'),
(30, 'Valle del Cauca'),
(31, 'Vaupés'),
(32, 'Vichada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status_study`
--

CREATE TABLE `status_study` (
  `id` int(11) NOT NULL,
  `nombre` char(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `status_study`
--

INSERT INTO `status_study` (`id`, `nombre`) VALUES
(1, 'Aprobado'),
(2, 'Rechazado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_credit`
--

CREATE TABLE `type_credit` (
  `id` int(11) NOT NULL,
  `nombre` char(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `type_credit`
--

INSERT INTO `type_credit` (`id`, `nombre`) VALUES
(1, 'Espera'),
(2, 'Fijo'),
(3, 'Rotativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type_housing`
--

CREATE TABLE `type_housing` (
  `id` int(11) NOT NULL,
  `nombre` char(50) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `type_housing`
--

INSERT INTO `type_housing` (`id`, `nombre`) VALUES
(1, 'Propia'),
(2, 'Arriendo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_city_idProvince` (`idProvince`);

--
-- Indices de la tabla `education_level`
--
ALTER TABLE `education_level`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marital_state`
--
ALTER TABLE `marital_state`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mwhite_credit_credit`
--
ALTER TABLE `mwhite_credit_credit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mwhite_credit_credit_id_user` (`id_user`),
  ADD KEY `fk_mwhite_credit_credit_type_credit` (`type_credit`);

--
-- Indices de la tabla `mwhite_credit_settings`
--
ALTER TABLE `mwhite_credit_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mwhite_credit_study`
--
ALTER TABLE `mwhite_credit_study`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mwhite_credit_study_id_user` (`id_user`),
  ADD KEY `fk_mwhite_credit_study_status_study` (`status_study`);

--
-- Indices de la tabla `mwhite_credit_user`
--
ALTER TABLE `mwhite_credit_user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mwhite_credit_user_profile`
--
ALTER TABLE `mwhite_credit_user_profile`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `fk_mwhite_credit_user_profile_province` (`province`),
  ADD KEY `fk_mwhite_credit_user_profile_city` (`city`),
  ADD KEY `fk_type_housing` (`type_housing`),
  ADD KEY `fk_education_level` (`education_level`),
  ADD KEY `fk_marital_state` (`marital_status`),
  ADD KEY `mwhite_credit_user_profile_activity` (`activity`);

--
-- Indices de la tabla `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `status_study`
--
ALTER TABLE `status_study`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `type_credit`
--
ALTER TABLE `type_credit`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `type_housing`
--
ALTER TABLE `type_housing`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mwhite_credit_credit`
--
ALTER TABLE `mwhite_credit_credit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `mwhite_credit_settings`
--
ALTER TABLE `mwhite_credit_settings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mwhite_credit_study`
--
ALTER TABLE `mwhite_credit_study`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mwhite_credit_user`
--
ALTER TABLE `mwhite_credit_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `fk_city_idProvince` FOREIGN KEY (`idProvince`) REFERENCES `province` (`id`);

--
-- Filtros para la tabla `mwhite_credit_credit`
--
ALTER TABLE `mwhite_credit_credit`
  ADD CONSTRAINT `fk_mwhite_credit_credit_id_user` FOREIGN KEY (`id_user`) REFERENCES `mwhite_credit_user` (`id`),
  ADD CONSTRAINT `fk_mwhite_credit_credit_type_credit` FOREIGN KEY (`type_credit`) REFERENCES `type_credit` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `mwhite_credit_study`
--
ALTER TABLE `mwhite_credit_study`
  ADD CONSTRAINT `fk_mwhite_credit_study_id_user` FOREIGN KEY (`id_user`) REFERENCES `mwhite_credit_user` (`id`),
  ADD CONSTRAINT `fk_mwhite_credit_study_status_study` FOREIGN KEY (`status_study`) REFERENCES `status_study` (`id`);

--
-- Filtros para la tabla `mwhite_credit_user_profile`
--
ALTER TABLE `mwhite_credit_user_profile`
  ADD CONSTRAINT `fk_education_level` FOREIGN KEY (`education_level`) REFERENCES `education_level` (`id`),
  ADD CONSTRAINT `fk_marital_state` FOREIGN KEY (`marital_status`) REFERENCES `marital_state` (`id`),
  ADD CONSTRAINT `fk_mwhite_credit_user_profile_city` FOREIGN KEY (`city`) REFERENCES `city` (`id`),
  ADD CONSTRAINT `fk_mwhite_credit_user_profile_province` FOREIGN KEY (`province`) REFERENCES `province` (`id`),
  ADD CONSTRAINT `fk_type_housing` FOREIGN KEY (`type_housing`) REFERENCES `type_housing` (`id`),
  ADD CONSTRAINT `mwhite_credit_user_profile_activity` FOREIGN KEY (`activity`) REFERENCES `activity` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
