-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2017 at 10:28 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `team_board`
--

-- --------------------------------------------------------

--
-- Table structure for table `actividad`
--

CREATE TABLE `actividad` (
  `idactividad` int(11) NOT NULL,
  `idtarea` int(11) NOT NULL,
  `descripcion` varchar(140) NOT NULL,
  `hora_ini` datetime NOT NULL,
  `hora_fin` datetime NOT NULL,
  `tiempo` time NOT NULL,
  `idtipoactividad` int(11) NOT NULL,
  `idestatus` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `hinicio` time NOT NULL,
  `hfin` int(11) NOT NULL,
  `idodt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `actividad`
--

INSERT INTO `actividad` (`idactividad`, `idtarea`, `descripcion`, `hora_ini`, `hora_fin`, `tiempo`, `idtipoactividad`, `idestatus`, `idusuario`, `hinicio`, `hfin`, `idodt`) VALUES
(219, 15, 'esta actividad se reallizo de manera correcta ', '2017-12-11 12:27:35', '2017-12-11 12:27:56', '00:00:21', 1, 3, 3, '00:00:00', 0, 26),
(220, 2, 'comentario', '2017-12-11 12:05:50', '2017-12-11 12:06:05', '00:00:15', 1, 3, 3, '00:00:00', 0, 12),
(221, 8, '55', '2017-12-14 08:10:59', '2017-12-14 08:11:11', '00:00:12', 1, 3, 6, '00:00:00', 0, 29),
(222, 1, 'lala', '2017-12-14 08:12:10', '2017-12-14 08:12:20', '00:00:10', 1, 3, 6, '00:00:00', 0, 29),
(223, 2, '80', '2017-12-14 10:41:12', '2017-12-14 10:41:22', '00:00:10', 1, 3, 3, '05:00:00', 8, 30),
(224, 9, '22', '2017-12-18 12:11:29', '2017-12-18 12:11:34', '00:00:05', 1, 3, 3, '17:00:00', 8, 28),
(225, 2, 'll', '2017-12-14 10:45:22', '2017-12-14 10:45:28', '00:00:06', 1, 3, 3, '00:00:00', 0, 12),
(226, 1, ';)', '2017-12-14 11:25:13', '2017-12-14 11:25:23', '00:00:10', 1, 3, 3, '00:00:00', 0, 31),
(227, 2, '', '2017-12-14 12:48:19', '0000-00-00 00:00:00', '00:00:00', 1, 2, 3, '18:00:00', 2, 28),
(228, 8, 'cce', '2017-12-14 13:00:30', '2017-12-14 13:00:53', '00:00:23', 1, 3, 3, '01:00:00', 2, 28),
(229, 9, '', '2017-12-18 12:11:56', '0000-00-00 00:00:00', '00:00:00', 1, 2, 3, '00:00:00', 0, 30),
(230, 2, '99', '2017-12-18 12:11:59', '2017-12-18 12:12:19', '00:00:17', 1, 3, 3, '00:00:00', 0, 31),
(231, 8, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '00:00:00', 1, 4, 3, '05:25:00', 3, 28);

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `idarea` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`idarea`, `nombre`) VALUES
(1, 'TEF7');

-- --------------------------------------------------------

--
-- Table structure for table `centro_costos`
--

CREATE TABLE `centro_costos` (
  `idcostos` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `productos` varchar(30) NOT NULL,
  `idmse` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `centro_costos`
--

INSERT INTO `centro_costos` (`idcostos`, `nombre`, `productos`, `idmse`) VALUES
(0, 'ninguno', 'ninguno', 0),
(1, 'TEF', 'TEF', 1),
(2, '466', 'Motor FED/ECM L-1', 1),
(3, '439', 'Motor FED L-2', 1),
(4, '38', 'Motor FED L-3', 1),
(5, '83', 'Motor FED L4', 1),
(6, '956', 'Motor FED 20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `idestado` int(11) NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`idestado`, `estado`) VALUES
(1, 'Available '),
(2, 'Out TlP        '),
(3, 'Lunch');

-- --------------------------------------------------------

--
-- Table structure for table `estatus`
--

CREATE TABLE `estatus` (
  `idestatus` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estatus`
--

INSERT INTO `estatus` (`idestatus`, `nombre`) VALUES
(1, 'En curso'),
(2, 'Pausada'),
(3, 'Terminada'),
(4, 'No iniciada');

-- --------------------------------------------------------

--
-- Table structure for table `interrupcion`
--

CREATE TABLE `interrupcion` (
  `idinterrup` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `tiempo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `interrupcion`
--

INSERT INTO `interrupcion` (`idinterrup`, `nombre`, `tiempo`) VALUES
(1, 'Llamada telefonica', 10),
(2, 'Asesoria ', 10),
(3, 'Personal', 10),
(4, 'Tarea interna   ', 10);

-- --------------------------------------------------------

--
-- Table structure for table `interrupciones`
--

CREATE TABLE `interrupciones` (
  `idinterrupcion` int(11) NOT NULL,
  `idactividad` int(11) NOT NULL,
  `idinterrup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ma`
--

CREATE TABLE `ma` (
  `idma` int(11) NOT NULL,
  `ma` varchar(8) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `idcostos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ma`
--

INSERT INTO `ma` (`idma`, `ma`, `descripcion`, `idcostos`) VALUES
(0, '-', 'ninguno', 0),
(4, '1130939', 'Ensamble de membrana DAE', 2),
(5, '1130940', 'Ensamble de Pelicula TO y veri', 2),
(6, '1130942', 'Dispensador de gapfiller', 2),
(7, '1130943', 'Ensamble de Electronica', 2),
(8, '1130944', 'Ensamble de resortes planos', 2),
(9, '1130945', 'Atornillado de la electronica ', 2),
(10, '1130946', 'Ensamble del sello y tapa de a', 2),
(11, '1130947', 'Ensamble de conector', 2),
(12, '1130948', 'Carga de tapa de aluminio y so', 2),
(13, '1130938', 'Ensamble de arnes', 2),
(14, '1130937', 'Verificacion de resorte plano ', 2),
(15, '1130949', 'Soldado de conector y arnes', 2),
(16, '1130950', 'Limpieza por plasma', 2),
(17, '1130951', 'Limpieza por plasma', 2),
(18, '1130967', 'Aplicacion de del sellador liq', 2),
(19, '1130966', 'Inspeccion del sellador liquid', 2),
(20, '1130965', 'Colocacion de tapa de aluminio', 2),
(21, '1130964', 'Atornillado de tapa de alumini', 2),
(22, '1130963', 'Ensamble de sellos de pines en', 2),
(23, '1130962', 'Ensamble de estator', 2),
(24, '1130961', 'Atornillado de Estator', 2),
(25, '1130960', 'Soldado de pines de la electro', 2),
(26, '1130959', 'Magnetizadora FED', 2),
(27, '1130958', 'Magnetizadora ECM', 2),
(28, '1130957', 'Ensamble de rotor y resorte de', 2),
(29, '1130956', 'Ensamble de clip C', 2),
(30, '1130955', 'carga de software y prueba ele', 2),
(31, '1130954', 'Banco de prueba electrica', 2),
(32, '1130953', 'Grabado por laser', 2),
(33, '1130986', 'Ensamble de soporte de devanad', 2),
(34, '1130985', 'Devanadora de agujas 1', 2),
(35, '1130984', 'Devanadora de agujas 2', 2),
(36, '1130983', 'doblado de ganchos y formado', 2),
(37, '1130982', 'Posicion final de de soporte d', 2),
(38, '1130981', 'Conprension de balines para mo', 2),
(39, '1130980', 'Soldado de ganchos del estator', 2),
(40, '1130979', 'Preuba electrica del estator', 2),
(41, '1130977', 'Aplicacion de Adhesivo', 2),
(42, '1130976', 'Colocacion de Imanes Clamping', 2),
(43, '1130975', 'Ensamble de Imanes', 2),
(44, '1130974', 'Estacion de Curado', 2),
(45, '1130973', 'Estacion de Enfriamiento de Ro', 2),
(46, '1130972', 'Ensamble de rodamientos B', 2),
(47, '1130971', 'Ensamble de rodamintos A', 2),
(48, '1130970', 'Ensamble de Reten', 2),
(49, '1130969', 'Vrificacion de Diametro Intern', 2),
(50, '1134382', 'Ensamble de membrena DAE', 3),
(51, '1134383', 'Dispensador de Gapfiller', 3),
(52, '1134384', 'Ensamble de Electronica', 3),
(53, '1134385', 'Atornillado de Electronica', 3),
(54, '1134386', 'Ensamble de sello y tapa de ar', 3),
(55, '1134387', 'Ensamble de Conector (FED)', 3),
(56, '1134398', 'Atornillado de Tapa de Alumini', 3),
(57, '1134397', 'Ensamble Tapa de Aluminio', 3),
(58, '1134395', 'Aplicacion del sellador liquid', 3),
(59, '1134392', 'Dispensador de Gapfiller', 3),
(60, '1134394', 'Limpieza por Plasma', 3),
(61, '1134399', 'Ensamble de sellos de pines', 3),
(62, '1134400', 'Ensamble Estator', 3),
(63, '1134401', 'Atornillado Estator', 3),
(64, '1134402', 'Soldadora de Pines', 3),
(65, '1134403', 'Magnetizadora FED', 3),
(66, '1134404', 'Ensamble de Rotor y Resorte', 3),
(67, '1134405', 'Ensamble de clip \"C\"', 3),
(68, '1134406', 'Carga de Software y Prueba Ele', 3),
(69, '1134407', 'Banco de Prueba Electrica', 3),
(70, '1134408', 'Grabado Laser', 3),
(71, '1134376', 'Devanadoras de Agujas 1', 3),
(72, '1134377', 'Doblado de Ganchos', 3),
(73, '1134378', 'Poscicion final de Soporte de ', 3),
(74, '1134379', 'Soldado de Ganchos', 3),
(75, '1134380', 'Prueba Electrica del Estator', 3),
(76, '1134358', 'Aplicacion de Adhesivo', 3),
(77, '1134359', 'Colocacion de Imanes Clamping', 3),
(78, '1134360', 'Ensamble de Imanes', 3),
(79, '1134365', 'Ensamble de rodamientos B', 3),
(80, '1134366', 'Ensamble de rodamintos A', 3),
(81, '1134367', 'Ensamble de Reten', 3),
(82, '1134368', 'Vrificacion de Diametro Intern', 3),
(83, '1134363', 'Estacion de Curado', 3),
(84, '1134364', 'Estacion de Enfriamiento de Ro', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mse`
--

CREATE TABLE `mse` (
  `idmse` int(11) NOT NULL,
  `mse` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mse`
--

INSERT INTO `mse` (`idmse`, `mse`) VALUES
(0, 'ninguno'),
(1, 'TS');

-- --------------------------------------------------------

--
-- Table structure for table `odt`
--

CREATE TABLE `odt` (
  `idodt` int(11) NOT NULL,
  `tiempo` int(11) NOT NULL,
  `idma` int(11) DEFAULT NULL,
  `idcostos` int(11) DEFAULT NULL,
  `idusuario` int(11) NOT NULL,
  `tiempo_excedido` time DEFAULT NULL,
  `odtreal` varchar(30) DEFAULT NULL,
  `cerrada` tinyint(1) NOT NULL,
  `tiempoa` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `odt`
--

INSERT INTO `odt` (`idodt`, `tiempo`, `idma`, `idcostos`, `idusuario`, `tiempo_excedido`, `odtreal`, `cerrada`, `tiempoa`, `fecha`) VALUES
(12, 45, 0, 3, 3, NULL, '000061C006.720086152355', 1, 0, '2017-11-24'),
(26, 316779, 4, 2, 4, NULL, '000061C011.72008276', 0, 88, '2017-11-28'),
(28, 197972, 8, 2, 3, NULL, '000061C006.7200861523577', 0, 55, '2016-12-11'),
(29, 21578, 5, 2, 6, NULL, NULL, 1, 6, '2017-12-14'),
(30, 287990, 0, 3, 3, NULL, NULL, 0, 80, '2017-12-14'),
(31, 79173, 0, 2, 3, NULL, NULL, 0, 22, '2017-12-14');

-- --------------------------------------------------------

--
-- Table structure for table `pausa`
--

CREATE TABLE `pausa` (
  `idpausa` int(11) NOT NULL,
  `hora_pausa` datetime NOT NULL,
  `idactividad` int(11) NOT NULL,
  `hora_reinicio` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pausa`
--

INSERT INTO `pausa` (`idpausa`, `hora_pausa`, `idactividad`, `hora_reinicio`) VALUES
(18, '2017-12-14 12:59:52', 227, '0000-00-00 00:00:00'),
(19, '2017-12-18 12:11:59', 229, '2017-12-18 12:12:09'),
(20, '2017-12-18 12:12:09', 230, '2017-12-18 12:12:12'),
(21, '2017-12-18 12:12:12', 229, '2017-12-18 15:47:46'),
(22, '2017-12-18 15:47:50', 229, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `proceso`
--

CREATE TABLE `proceso` (
  `idproceso` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tarea`
--

CREATE TABLE `tarea` (
  `idtarea` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `valueadd` float NOT NULL,
  `waste` float NOT NULL,
  `support` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarea`
--

INSERT INTO `tarea` (`idtarea`, `nombre`, `valueadd`, `waste`, `support`) VALUES
(1, 'Analisis de falla', 20, 60, 20),
(2, 'Ajustes', 80, 10, 10),
(8, 'Investigaciones, correlaciones y reporte', 0, 0, 0),
(9, 'Pre-liberacion / liberacion', 0, 0, 0),
(10, 'Planes de ajuste', 0, 0, 0),
(11, 'Mantenimiento Correctivo / Preventivo', 0, 0, 0),
(12, 'Capacitacion', 0, 0, 0),
(13, 'Mejora de proceso, maquinaria', 0, 0, 0),
(14, 'Pruebas, series cero, run & rate, muestras', 0, 0, 0),
(15, 'Nuevos proyectos', 13, 7, 80),
(16, 'Asesoria', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tipoactividad`
--

CREATE TABLE `tipoactividad` (
  `idtipoactividad` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `color` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipoactividad`
--

INSERT INTO `tipoactividad` (`idtipoactividad`, `nombre`, `color`) VALUES
(1, 'planeada', 'verde'),
(2, 'emergente', 'rojo');

-- --------------------------------------------------------

--
-- Table structure for table `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idtipousuario` int(11) NOT NULL,
  `tipo` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tipousuario`
--

INSERT INTO `tipousuario` (`idtipousuario`, `tipo`) VALUES
(1, 'Empleado'),
(2, 'Administrador');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `idtipousuario` int(11) NOT NULL,
  `idarea` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombre`, `apellido`, `usuario`, `password`, `idtipousuario`, `idarea`, `fecha`, `idestado`) VALUES
(3, 'Jose Carlos', 'Garcia Sanchez', '2', '2', 1, 1, '2017-10-01', 1),
(4, 'Jose Carlos', 'Garcia Sanchez', '1', '1', 2, 1, '2017-10-01', 1),
(6, 'Pepe', 'Garcia', '3', '3', 1, 1, '0000-00-00', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`idactividad`),
  ADD KEY `idtipoactividad` (`idtipoactividad`),
  ADD KEY `idestatus` (`idestatus`),
  ADD KEY `idusuario` (`idusuario`),
  ADD KEY `actividad_ibfk_6` (`idtarea`),
  ADD KEY `idodt` (`idodt`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`idarea`);

--
-- Indexes for table `centro_costos`
--
ALTER TABLE `centro_costos`
  ADD PRIMARY KEY (`idcostos`),
  ADD KEY `idmse` (`idmse`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idestado`);

--
-- Indexes for table `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`idestatus`);

--
-- Indexes for table `interrupcion`
--
ALTER TABLE `interrupcion`
  ADD PRIMARY KEY (`idinterrup`);

--
-- Indexes for table `interrupciones`
--
ALTER TABLE `interrupciones`
  ADD PRIMARY KEY (`idinterrupcion`),
  ADD KEY `idactividad` (`idactividad`),
  ADD KEY `idinterrup` (`idinterrup`);

--
-- Indexes for table `ma`
--
ALTER TABLE `ma`
  ADD PRIMARY KEY (`idma`),
  ADD KEY `idcostos` (`idcostos`);

--
-- Indexes for table `mse`
--
ALTER TABLE `mse`
  ADD PRIMARY KEY (`idmse`);

--
-- Indexes for table `odt`
--
ALTER TABLE `odt`
  ADD PRIMARY KEY (`idodt`),
  ADD KEY `idma` (`idma`),
  ADD KEY `idcostos` (`idcostos`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indexes for table `pausa`
--
ALTER TABLE `pausa`
  ADD PRIMARY KEY (`idpausa`),
  ADD KEY `idactividad` (`idactividad`);

--
-- Indexes for table `proceso`
--
ALTER TABLE `proceso`
  ADD PRIMARY KEY (`idproceso`);

--
-- Indexes for table `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`idtarea`);

--
-- Indexes for table `tipoactividad`
--
ALTER TABLE `tipoactividad`
  ADD PRIMARY KEY (`idtipoactividad`);

--
-- Indexes for table `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idtipousuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `idtipousuario` (`idtipousuario`),
  ADD KEY `idarea` (`idarea`),
  ADD KEY `idestado` (`idestado`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actividad`
--
ALTER TABLE `actividad`
  MODIFY `idactividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;
--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `idarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `centro_costos`
--
ALTER TABLE `centro_costos`
  MODIFY `idcostos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `idestado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `estatus`
--
ALTER TABLE `estatus`
  MODIFY `idestatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `interrupcion`
--
ALTER TABLE `interrupcion`
  MODIFY `idinterrup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `interrupciones`
--
ALTER TABLE `interrupciones`
  MODIFY `idinterrupcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ma`
--
ALTER TABLE `ma`
  MODIFY `idma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `mse`
--
ALTER TABLE `mse`
  MODIFY `idmse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `odt`
--
ALTER TABLE `odt`
  MODIFY `idodt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `pausa`
--
ALTER TABLE `pausa`
  MODIFY `idpausa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `proceso`
--
ALTER TABLE `proceso`
  MODIFY `idproceso` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tarea`
--
ALTER TABLE `tarea`
  MODIFY `idtarea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tipoactividad`
--
ALTER TABLE `tipoactividad`
  MODIFY `idtipoactividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idtipousuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `actividad_ibfk_1` FOREIGN KEY (`idtipoactividad`) REFERENCES `tipoactividad` (`idtipoactividad`),
  ADD CONSTRAINT `actividad_ibfk_4` FOREIGN KEY (`idestatus`) REFERENCES `estatus` (`idestatus`),
  ADD CONSTRAINT `actividad_ibfk_5` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`),
  ADD CONSTRAINT `actividad_ibfk_6` FOREIGN KEY (`idtarea`) REFERENCES `tarea` (`idtarea`),
  ADD CONSTRAINT `actividad_ibfk_7` FOREIGN KEY (`idodt`) REFERENCES `odt` (`idodt`);

--
-- Constraints for table `centro_costos`
--
ALTER TABLE `centro_costos`
  ADD CONSTRAINT `centro_costos_ibfk_1` FOREIGN KEY (`idmse`) REFERENCES `mse` (`idmse`);

--
-- Constraints for table `interrupciones`
--
ALTER TABLE `interrupciones`
  ADD CONSTRAINT `interrupciones_ibfk_1` FOREIGN KEY (`idactividad`) REFERENCES `actividad` (`idactividad`),
  ADD CONSTRAINT `interrupciones_ibfk_2` FOREIGN KEY (`idinterrup`) REFERENCES `interrupcion` (`idinterrup`);

--
-- Constraints for table `ma`
--
ALTER TABLE `ma`
  ADD CONSTRAINT `ma_ibfk_1` FOREIGN KEY (`idcostos`) REFERENCES `centro_costos` (`idcostos`);

--
-- Constraints for table `odt`
--
ALTER TABLE `odt`
  ADD CONSTRAINT `odt_ibfk_2` FOREIGN KEY (`idma`) REFERENCES `ma` (`idma`),
  ADD CONSTRAINT `odt_ibfk_3` FOREIGN KEY (`idcostos`) REFERENCES `centro_costos` (`idcostos`),
  ADD CONSTRAINT `odt_ibfk_4` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`);

--
-- Constraints for table `pausa`
--
ALTER TABLE `pausa`
  ADD CONSTRAINT `pausa_ibfk_1` FOREIGN KEY (`idactividad`) REFERENCES `actividad` (`idactividad`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idtipousuario`) REFERENCES `tipousuario` (`idtipousuario`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`idarea`) REFERENCES `area` (`idarea`),
  ADD CONSTRAINT `usuarios_ibfk_3` FOREIGN KEY (`idestado`) REFERENCES `estado` (`idestado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
