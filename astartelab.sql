-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2018 at 03:54 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `astartelab`
--

-- --------------------------------------------------------

--
-- Table structure for table `biopsias`
--

CREATE TABLE `biopsias` (
  `id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  `precio_id` int(11) DEFAULT NULL,
  `informe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado_pago` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'PE',
  `recibido` date DEFAULT NULL,
  `entregado` date DEFAULT NULL,
  `diagnostico` text COLLATE utf8_unicode_ci,
  `macro` text COLLATE utf8_unicode_ci,
  `micro` text COLLATE utf8_unicode_ci,
  `dxlab` longtext COLLATE utf8_unicode_ci,
  `preliminar` text COLLATE utf8_unicode_ci,
  `inmuno` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `biopsias`
--

INSERT INTO `biopsias` (`id`, `doctor_id`, `paciente_id`, `grupo_id`, `precio_id`, `informe`, `estado_pago`, `recibido`, `entregado`, `diagnostico`, `macro`, `micro`, `dxlab`, `preliminar`, `inmuno`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 35, 2, 1, 1, 'B188-001', 'AC', '2018-09-23', '2018-09-30', '       Diagnostico B1 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in faucibus mauris. Mauris tincidunt sed neque vel mollis. Cras iaculis mi nec lorem lobortis, non posuere felis iaculis.  afasfasasfasf                              ', 'Frase Macro jfjoiajfoajoasfa afasfasfafsFrase Macro BFrase Macro BFrase Macro BFrase Macro BFrase Macro B', 'Frase MacroFrase Macro BFrase Macro BFrase Macro BFrase Macro BFrase Macro B afasfasfassaFrase Micro BFrase Micro BFrase Micro BFrase Micro B', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in faucibus mauris. Mauris tincidunt sed neque vel mollis. Cras iaculis mi nec lorem lobortis, non posuere felis iaculis. faasfaDiagnostico B1Diagnostico B1Diagnostico B1Diagnostico B1Diagnostico B1Diagnostico B1Diagnostico B1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in faucibus mauris. Mauris tincidunt sed neque vel mollis. Cras iaculis mi nec lorem lobortis, non posuere felis iaculis.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in faucibus mauris. Mauris tincidunt sed neque vel mollis. Cras iaculis mi nec lorem lobortis, non posuere felis iaculis.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in faucibus mauris. Mauris tincidunt sed neque vel mollis. Cras iaculis mi nec lorem lobortis, non posuere felis iaculis.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in faucibus mauris. Mauris tincidunt sed neque vel mollis. Cras iaculis mi nec lorem lobortis, non posuere felis iaculis.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in faucibus mauris. Mauris tincidunt sed neque vel mollis. Cras iaculis mi nec lorem lobortis, non posuere felis iaculis. afafafsaassafDiagnostico B1Diagnostico B1Diagnostico B1', 'Diagnostico B1Diagnostico B1Diagnostico B1Diagnostico B1Diagnostico B1Diagnostico B1Diagnostico B1Diagnostico B1Diagnostico B1Diagnostico B1', NULL, '2018-08-29 19:10:50', '2018-10-03 12:13:49'),
(2, 5, 2, 1, NULL, 'B188-002', 'PE', '2018-08-29', '2018-08-29', '    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in faucibus mauris. Mauris tincidunt sed neque vel mollis. Cras iaculis mi nec lorem lobortis, non posuere felis iaculis.    ', 'Frase Macro2 ', 'Frase Macro1 Apendice cecal con cambios de hiperemia pasiva y marginacion leucocitaria intravascular; moderada hiperplasia del tejido linfoide, mucosa con infiltrado polimorfonuclear y hemorragias focales, lumen con fecalitos y celulas inflamatorias.', '', NULL, '', NULL, '2018-08-29 19:27:27', '2018-09-19 23:21:21'),
(3, 1, 2, 1, 1, 'B188-003', 'AC', '2018-08-29', '2018-08-29', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in faucibus mauris. Mauris tincidunt sed neque vel mollis. Cras iaculis mi nec lorem lobortis, non posuere felis iaculis.', 'Frase MacroFrase MacroFrase MacroFrase Macro', 'Frase MacroFrase MacroFrase MacroFrase MacroFrase MacroFrase MacroFrase MacroFrase MacroFrase MacroApendice cecal con cambios de hiperemia pasiva y marginacion leucocitaria intravascular; moderada hiperplasia del tejido linfoide, mucosa con infiltrado polimorfonuclear y hemorragias focales, lumen con fecalitos y celulas inflamatorias.Apendice cecal con cambios de hiperemia pasiva y marginacion leucocitaria intravascular; moderada hiperplasia del tejido linfoide, mucosa con infiltrado polimorfonuclear y hemorragias focales, lumen con fecalitos y celulas inflamatorias.Apendice cecal con cambios de hiperemia pasiva y marginacion leucocitaria intravascular; moderada hiperplasia del tejido linfoide, mucosa con infiltrado polimorfonuclear y hemorragias focales, lumen con fecalitos y celulas inflamatorias.Apendice cecal con cambios de hiperemia pasiva y marginacion leucocitaria intravascular; moderada hiperplasia del tejido linfoide, mucosa con infiltrado polimorfonuclear y hemorragias focales, lumen con fecalitos y celulas inflamatorias.Apendice cecal con cambios de hiperemia pasiva y marginacion leucocitaria intravascular; moderada hiperplasia del tejido linfoide, mucosa con infiltrado polimorfonuclear y hemorragias focales, lumen con fecalitos y celulas inflamatorias.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in faucibus mauris. Mauris tincidunt sed neque vel mollis. Cras iaculis mi nec lorem lobortis, non posuere felis iaculis.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in faucibus mauris. Mauris tincidunt sed neque vel mollis. Cras iaculis mi nec lorem lobortis, non posuere felis iaculis.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in faucibus mauris. Mauris tincidunt sed neque vel mollis. Cras iaculis mi nec lorem lobortis, non posuere felis iaculis.', 'Diagnostico B1Diagnostico B1Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in faucibus mauris. Mauris tincidunt sed neque vel mollis. Cras iaculis mi nec lorem lobortis, non posuere felis iaculis.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in faucibus mauris. Mauris tincidunt sed neque vel mollis. Cras iaculis mi nec lorem lobortis, non posuere felis iaculis.', '', NULL, '2018-08-29 19:39:03', '2018-10-03 12:14:53'),
(4, 1, 2, 1, NULL, 'B189-001', 'PE', '2018-09-20', '2018-09-20', 'Diagnostico B1', '', '', '', NULL, '', NULL, '2018-09-20 18:36:03', '2018-09-20 18:36:03');

-- --------------------------------------------------------

--
-- Table structure for table `biopsia_imagen`
--

CREATE TABLE `biopsia_imagen` (
  `id` int(10) UNSIGNED NOT NULL,
  `biopsia_id` int(11) NOT NULL,
  `imagen_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `biopsia_imagen`
--

INSERT INTO `biopsia_imagen` (`id`, `biopsia_id`, `imagen_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-10-03 12:14:29', '2018-10-03 12:14:29');

-- --------------------------------------------------------

--
-- Table structure for table `citologia`
--

CREATE TABLE `citologia` (
  `id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  `precio_id` int(11) DEFAULT NULL,
  `informe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado_pago` char(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'PE',
  `diagnostico` text COLLATE utf8_unicode_ci NOT NULL,
  `micro` text COLLATE utf8_unicode_ci,
  `dxlab` longtext COLLATE utf8_unicode_ci,
  `preliminar` text COLLATE utf8_unicode_ci,
  `entregado` date DEFAULT NULL,
  `recibido` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `citologia`
--

INSERT INTO `citologia` (`id`, `doctor_id`, `paciente_id`, `grupo_id`, `precio_id`, `informe`, `estado_pago`, `diagnostico`, `micro`, `dxlab`, `preliminar`, `entregado`, `recibido`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, 1, NULL, 'C188-001', 'PE', 'Diagnostico C1Diagnostico C1Diagnostico C1Diagnostico C1Diagnostico C1', 'Reporte Micro 1', 'Diagnostico Lab 1', 'Diagnostico Preliminar', '2018-08-29', '2018-08-29', '2018-08-29 21:11:05', '2018-09-04 21:24:16', NULL),
(2, 1, 2, 1, NULL, 'C188-002', 'PE', 'Diagnostico C1', 'Frase Micro C', 'Diagnostico C1Diagnostico C1Diagnostico C1Diagnostico C1Diagnostico C1Diagnostico C1Diagnostico C1', 'Diagnostico C1Diagnostico C1Diagnostico C1Diagnostico C1Diagnostico C1Diagnostico C1Diagnostico C1', '2018-08-29', '2018-08-29', '2018-08-29 21:24:55', '2018-08-29 21:24:55', NULL),
(3, 18, 1, 1, 2, 'C189-001', 'AC', '             Diagnostico C1           Diagnostico C1Diagnostico C1Diagnostico C1Diagnostico C1 Diagnostico C1Diagnostico C1Diagnostico C1Diagnostico C1Diagnostico C1 Diagnostico C1', 'Frase Micro CFrase Micro CFrase Micro CFrase Micro CFrase Micro CFrase Micro CFrase Micro CFrase Micro CFrase Micro C', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nulla tortor, eleifend sit amet ex non, pellentesque condimentum quam. Integer mattis blandit odio vitae cursus. Duis pretium metus risus, eu vehicula lectus mollis eget. In hac habitasse platea dictumst. Sed quis metus scelerisque, hendrerit nunc ac, dignissim purus. Vivamus pharetra purus quam, sit amet semper mauris sagittis ornare. Morbi et molestie elit. Sed id eros sed lectus convallis convallis. Donec condimentum a mauris eget semper. Phasellus eget rhoncus magna, in cursus purus.\r\n\r\nDiagnostico C1Diagnostico C1Diagnostico C1', 'Diagnostico C1Diagnostico C1Diagnostico C1Diagnostico C1Diagnostico C1Diagnostico C1Diagnostico C1Diagnostico C1Diagnostico C1', '2018-09-30', '2018-09-07', '2018-09-07 18:31:58', '2018-10-03 12:32:39', NULL),
(4, 4, 2, 1, NULL, 'C189-002', 'PE', ' Diagnostico C1Diagnostico C1Diagnostico C1 ', '', '', '', '2018-09-20', '2018-09-20', '2018-09-20 18:54:20', '2018-09-20 18:54:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `citologia_imagen`
--

CREATE TABLE `citologia_imagen` (
  `id` int(10) UNSIGNED NOT NULL,
  `citologia_id` int(11) NOT NULL,
  `imagen_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `citologia_imagen`
--

INSERT INTO `citologia_imagen` (`id`, `citologia_id`, `imagen_id`, `created_at`, `updated_at`) VALUES
(1, 3, 2, '2018-10-03 12:32:49', '2018-10-03 12:32:49');

-- --------------------------------------------------------

--
-- Table structure for table `consultas_transacciones`
--

CREATE TABLE `consultas_transacciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `consulta` int(11) NOT NULL,
  `informe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado_pago` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `facturacion` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `total` double(8,2) NOT NULL,
  `monto` double(8,2) NOT NULL,
  `saldo` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `consultas_transacciones`
--

INSERT INTO `consultas_transacciones` (`id`, `tipo`, `consulta`, `informe`, `estado_pago`, `facturacion`, `total`, `monto`, `saldo`, `created_at`, `updated_at`) VALUES
(1, 'B', 1, 'B188-001', 'AC', 'TC', 15.00, 15.00, 0.00, '2018-09-07 18:45:13', '2018-09-07 18:45:13'),
(2, 'B', 3, 'B188-003', 'AC', 'TC', 15.00, 15.00, 0.00, '2018-10-03 12:14:53', '2018-10-03 12:14:53'),
(3, 'C', 3, 'C189-001', 'AC', 'TC', 60.00, 60.00, 0.00, '2018-10-03 12:32:39', '2018-10-03 12:32:39');

-- --------------------------------------------------------

--
-- Table structure for table `cuentas`
--

CREATE TABLE `cuentas` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fondo` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cuenta_transacciones`
--

CREATE TABLE `cuenta_transacciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `cuenta_id` int(11) NOT NULL,
  `tipo` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_realizacion` date NOT NULL,
  `lugar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `concepto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paguese` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `monto` double(8,2) NOT NULL,
  `prev` double(8,2) NOT NULL,
  `actual` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diagnosticos`
--

CREATE TABLE `diagnosticos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` text COLLATE utf8_unicode_ci NOT NULL,
  `tipo` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `detalle` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `diagnosticos`
--

INSERT INTO `diagnosticos` (`id`, `nombre`, `tipo`, `detalle`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Diagnostico B1', 'B', '', NULL, '2018-07-29 20:40:44', '2018-07-29 20:40:44'),
(2, 'Diagnostico C1', 'C', '', NULL, '2018-07-29 20:41:00', '2018-07-29 20:41:00'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus in faucibus mauris. Mauris tincidunt sed neque vel mollis. Cras iaculis mi nec lorem lobortis, non posuere felis iaculis.', 'B', 'un lorem largo', NULL, '2018-08-19 22:37:01', '2018-08-19 22:37:01');

-- --------------------------------------------------------

--
-- Table structure for table `doctores`
--

CREATE TABLE `doctores` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `saldo` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctores`
--

INSERT INTO `doctores` (`id`, `nombre`, `email`, `direccion`, `telefono`, `saldo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ADA LUZ MORALES DE PANIAGUA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(2, 'ADA MARICRUZ GUEVARA DE RIVERA', '-', '-', NULL, -10.00, NULL, '2018-05-28 19:28:05', NULL),
(3, 'ADS CHALATENANGO', '-', '-', NULL, -60.00, NULL, '2018-08-27 04:30:33', NULL),
(4, 'ADS GOTERA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(5, 'ADS LA UNION', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(6, 'ADS MIRALVALLE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(7, 'ADS SAN MIGUEL', '-', '-', NULL, -15.00, NULL, '2018-07-31 13:19:56', NULL),
(8, 'ADS SAN SALVADOR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(9, 'ADS SANTA ANA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(10, 'ADS SANTA TECLA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(11, 'ADS SONSONATE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(12, 'ADS SOYAPANGO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(13, 'AGUSTIN GIL CRUZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(14, 'AIDA ABREGO DE SOLIS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(15, 'ALEX BENJAMIN AMAYA GALINDO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(16, 'ALFONSO MADRID BONILLA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(17, 'ALFREDO A. ESCAMILLA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(18, 'ALFREDO A. RASCON ROSALES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(19, 'ALFREDO ALEJANDRO OSEGUEDA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(20, 'ALFREDO DIAZ PLEITEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(21, 'ALVARO ERNESTO PLEITEZ MORAN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(22, 'ALVARO MENENDEZ LEAL', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(23, 'ANA CECILIA  REYNA DE PEREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(24, 'ANA CONCEPCION ARIAS VELASQUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(25, 'ANA CRISTINA RIVERA RODRIGUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(26, 'ANA ELDA FLORES DE REYNA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(27, 'ANA ELIZABETH RODRIGUEZ DE VIANA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(28, 'ANA ELIZABETH TRUJILLO DE BENDIX', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(29, 'ANA GLORIA SANDOVAL TORRES DE ZAVALETA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(30, 'ANA JENSE VILLATORO RUGAMAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(31, 'ANGELA CAROLINA POSADA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(32, 'ANA JULISSA CAMPOS RIVAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(33, 'ANA SILVIA FUENTES DE HERNANDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(34, 'ANA MERCEDES VILLALTA DE SANTAMARIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(35, 'ANA MIRIAN ALFARO DE LINARES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(36, 'ANA YANCI ROGEL DE CARRILLO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(37, 'ANAYANSI ALVARADO PALUCHO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(38, 'ANDREJULIO GREGORI', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(39, 'ANA YANSY DOMINGUEZ DE SERVELLON', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(40, 'ANA MYRNA ZELAYA Q.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(41, 'ANGELA MENJIVAR DE CUEVAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(42, 'ANGELICA GUTIERREZ LOPEZ DE AGUILAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(43, 'ANGELICA MARIA  AVILES S.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(44, 'ANTONIO MENJIVAR TOBAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(45, 'ANTONIO MONTALVO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(46, 'ANTONIO ZUNIGA VELIS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(47, 'ARGELIA Y. ANGEL IRAHETA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(48, 'ANA PATRICIA YANETH GOMEZ DE GONZALEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(49, 'ARGENTINA URQUILLA DE VASQUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(50, 'ARINSSON YOHANNY PINEDA CANALES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(51, 'ARISTIDES PEREZ OLIVA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(52, 'ARMANDO PERAZA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(53, 'ARMANDO HERIBERTO LUCHA CORNEJO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(54, 'ARTURO SANCHEZ MELENDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(55, 'ARTURO ARMANDO MINERO SANDOVAL', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(56, 'ASTRID CAROLINA RIVERA RIVAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(57, 'ANA CELINA BERMUDEZ DE ESTRADA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(58, 'BELKIS S. MONDRAGON DE SACA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(59, 'BERTA ALICIA CERRITOS DE BARILLAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(60, 'BETSSY ALVARENGA DE FUENTES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(61, 'BEZZIE AZMITIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(62, 'BIBIANA GARCÍA RIOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(63, 'BLANCA ESTELA VIDES  M.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(64, 'BLANCA LIDIA MORENO DE ULLOA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(65, 'ANA GLORIA MONZON', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(66, 'BREDA O. MENA DE PICHE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(67, 'ANA LIDIA FARELA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(68, 'ANGEL VILLALTA PALACIOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(69, 'ARMANDO AMAYA CAMPOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(70, 'BILLY CADER', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(71, 'BENJAMIN GONZALEZ MORAN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(72, 'ARISTIDES A. NUÑEZ CACERES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(73, 'AZCUNAGA DUKE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(74, 'CARLOS ALBERTO FIGUEROA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(75, 'CARLA SUSANA CALLEJAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(76, 'ANDRES R. HERNANDEZ MORALES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(77, 'CARLOS A. AGUILAR ESTRADA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(78, 'ASOCIACION DEMOGRAFICA SALVADOREÑA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(79, 'CARLOS ALBERTO GARAY TEJADA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(80, 'ASTRID CARINA LIZAMA DE HASBUN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(81, 'ANTONIO SORIANO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(82, 'CARLA MANZANO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(83, 'CARLA MARIA FORTIZ MOLINA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(84, 'CARLOS ALBERTO MENDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(85, 'CARLOS ALBERTO TORRUELA AVELAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(86, 'CARLOS ALBERTO ZUNIGA MEJIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(87, 'CARLOS ANGEL HERNANDEZ LINARES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(88, 'CARLOS ARTURO FIGUEROA BALTODANO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(89, 'CAROLINA CALL', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(90, 'CARLOS ENRIQUE INTERIANO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(91, 'CARLOS GILBERTO RIVAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(92, 'CARLOS GABRIEL ALVARENGA C.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(93, 'CARLOS JAVIER TORRES SOSA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(94, 'CARLOS JOSE BENEDETTO ALBERTO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(95, 'CARLOS MIGUEL ZAVALETA CONSUEGRA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(96, 'CARLOS MORAN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(97, 'CAROLINA LAZO PERLA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(98, 'CARLOS ROBERTO SALINAS ZELAYA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(99, 'CAROLINA VASQUEZ DE APARICIO.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(100, 'CATALINA GOMEZ DE MENJIVAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(101, 'MARIA DOLORES RAMOS PEREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(102, 'CELIA MARLENE OFFMAN DE RODRIGUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(103, 'CECILIA LOVO DE UMAÑA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(104, 'CELINA GUZMAN DE LOPEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(105, 'CELINA YOLANDA DIAZ GARCIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(106, 'CRISTINA SALAZAR DE AREVALO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(107, 'CESAR ARTURO LARIOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(108, 'CESAR AUGUSTO SAAVEDRA G.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(109, 'DALIA SARAVIA CONTRERAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(110, 'FLOR DE MARIA VILLEDA LAINEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(111, 'CLAUDIA MARIA PINTIN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(112, 'CLAUDIA MARIA PINTIN. MEDICOS DEL MUNDO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(113, 'CLARA LUZ RIVERA DE ZELADA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(114, 'CLINICA SANTA CATARINA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(115, 'CONNIE DORIS VELA ALVAREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(116, 'CLAUDIA CHAMORRO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(117, 'NIDIA MARLENE GONZALEZ G.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(118, 'DAVID A. HENRIQUEZ ARRAZOLA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(119, 'DAYSI MABEL PINTO LANDAVERDE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(120, 'DAYSY MARGARITA BLANCO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(121, 'DELFINA ZAPPALA DE BADIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(122, 'DELMA GUADALUPE LOPEZ L. DE SALAZAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(123, 'DILIA MARLENY ORTIZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(124, 'DIOGENES MOLINA ALFARO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(125, 'DELMY DE GONZALEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(126, 'MARIA EUGENIA CALDERON', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(127, 'CRISTINA DE AMAYA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(128, 'DOMINICA SILVANA  MOLINA T. DE RODRIGUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(129, 'DONATILA FUENTES QUEZADA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(130, 'DORIS ELENA MORALES DE MONICO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(131, 'DAVID RICARDO ZAVALETA MORAN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(132, 'DOUGLAS SALVADOR MARTI PANAMEÑO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(133, 'JORGE ENRIQUE DERAS SALAZAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(134, 'EBERT EDGARDO VASQUEZ MONTOYA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(135, 'EDDIE ANTONIO MAYORGA R.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(136, 'ALEX SANTOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(137, 'EDGAR JAVIER MAJANO BARAHONA.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(138, 'EDUARDO CASTILLO SANCHEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(139, 'EDUARDO COTO SOLER', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(140, 'EDUARDO MARTINEZ MELARA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(141, 'EDUARDO RAMOS PEREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(142, 'EDUARDO VASQUEZ BECKER', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(143, 'EDUARDO M.  RODRIGUEZ LOZA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(144, 'GERARDO ORLANDO ZELAYA TORRES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(145, 'EDY R.  M. DE MARTINEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(146, 'CLAUDIA ELIZABETH RODRIGUEZ BRITO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(147, 'EFREN ESTRADA PARADA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(148, 'ELIO AUSBERTO MARTELL H.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(149, 'ELIZABETH CAMPOS RIVAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(150, 'ELSA LIDIA CISNEROS SANCHEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(151, 'ELSY SOTO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(152, 'EMILIO SUAREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(153, 'ENRIQUE HERNANDEZ PEREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(154, 'ENRIQUE NAVARRETE AZURDIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(155, 'ENRIQUE ALBERTO VALDES SOTO.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(156, 'ENRIQUE URIEL PEREZ DELEON', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(157, 'ERNESTO BENJAMIN PLEITEZ SANDOVAL', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(158, 'ESPERANZA DEL CARMEN  GOMEZ DE GUARDADO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(159, 'JOSE RAMON ESTEBAN AGUILLON R.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(160, 'ESTHER CORNEJO BONILLA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(161, 'EUGENIA M. DE FIGUEROA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(162, 'EVA ABREGO ABREGO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(163, 'EVA CAROLINA  GARCIA M.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(164, 'EVA JEANNETTE GUIDOS MENDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(165, 'EVELYN HANNET FLORES DOMINGUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(166, 'EVELYN  MARTINEZ DE CALDERON', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(167, 'FAUSTO CEA GIL', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(168, 'FERNANDO MOREIRA MENDOZA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(169, 'FINELLA DELL\'ARCIPRESTE DE ROTTMANN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(170, 'FINLANDER ROSALES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(171, 'FLOR DE MARIA BARAHONA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(172, 'INGRID ESTRADA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(173, 'FRANCISCO JOSE AREVALO MOLINA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(174, 'FRANCISCO SALGADO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(175, 'FRANCISCO SUNCIN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(176, 'FRANCISCO ARTURO AVAREZ POLANCO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(177, 'FRANCISCO ANTONIO GONZALEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(178, 'FRANCISCO ANTONIO GUZMAN RODRIGUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(179, 'FRANCISCO ANTONIO ORANTES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(180, 'FRANCISCO LEOPOLDO GUZMAN CADER', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(181, 'FRANCISCO RENE HERNANDEZ MARTINEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(182, 'FRANCISCO ROBERTO BUSTAMANTE ELIAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(183, 'FUENTES BELTRAN.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(184, 'GABRIEL ARMANDO VILLA ACEVEDO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(185, 'SILVIA RIVERA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(186, 'ESTER MARIA GARAY MELARA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(187, 'GERMAN ERNESTO VALENCIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(188, 'GILBERTO RIVERA AGUILAR.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(189, 'GINA ELIZABETH CAÑAS SANTOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(190, 'GIOVANNA VIOLETA RECINOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(191, 'GLADYS SEGURA DE CABRERA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(192, 'GLORIA ASTRID VASQUEZ DE REYES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(193, 'GUERRERO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(194, 'GRACIELA SARA GIACHINO REGAZZONI', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(195, 'GRISELDA HERNANDEZ DE GOMEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(196, 'GUADALUPE SALAZAR.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(197, 'GUILLERMINA  ARIAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(198, 'GUILLERMO HIDALGO VEJAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(199, 'ENMA YOLANDA VELASQUEZ M.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(200, 'GUILLERMO ANTONIO RIVAS ROMERO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(201, 'GUILLERMO RENE VELASCO A.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(202, 'GUSTAVO CUELLAR FRATTI', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(203, 'GUSTAVO ALFREDO MENENDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(204, 'GUSTAVO ARNOLDO OSTORGA ALVARADO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(205, 'H.N.G.P. DR. JOSE MOLINA MARTINEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(206, 'NESTOR STANLEY HERRERA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(207, 'HAROLD TRILLOS DE LA HOZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(208, 'HAROLD IVAN CORDOVA CARBAJAL.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(209, 'HECTOR GUILLERMO LARA TORRES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(210, 'HECTOR HERNANDEZ FLORES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(211, 'HECTOR A.  BERMUDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(212, 'HECTOR ALEJANDRO BERMUDEZ CABALLERO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(213, 'HERBERTH WILFREDO BARILLAS ACOSTA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(214, 'HERRERA MAGAÑA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(215, 'HILDA MORENA VALDEZ DE CONTRERAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(216, 'HILDA LIZZETTE MOLINA DE SEQUEIRA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(217, 'HJALMAR LAGUARDIA PINEDA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(218, 'HOSPITAL SAN RAFAEL', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(219, 'HOSPITAL BENJAMIN BLOOM  ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(220, 'HOSPITAL CENTRO DE EMERGENCIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(221, 'HOSPITAL NACIONAL DE COJUTEPEQUE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(222, 'HOSPITAL NACIONAL SANTA GERTRUDIS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(223, 'HOSPITAL NACIONAL SANTA TEREZA, ZACATECOLUC', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(224, 'HOSPITAL NACIONAL ZACAMIL', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(225, 'HUGO SERRANO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(226, 'HUMBERTO ROMERO BORLASCA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(227, 'LUIS SANDOVAL MACHON', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(228, 'ILIANA VERONICA ORANTES  A.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(229, 'IRIS AREVALO DE AGUILAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(230, 'IRIS ROSIMAR FLORES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(231, 'IRMA HERNANDEZ DE MARQUINA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(232, 'ISABEL LOPEZ OSORIO DE CONTRERAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(233, 'ISABEL ZALDIVAR DE RIVAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(234, 'ISIS DAGMAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(235, 'IVAN TEOS ESCOBAR.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(236, 'JAIME LOPEZ BAYANO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(237, 'JAIME ALEXANDER BURGOS PEÑA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(238, 'CHICAS SIBRIAN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(239, 'JAIME ERNESTO MARTINEZ LOPEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(240, 'JESUS SALVADOR PEREZ PORTILLO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(241, 'JILMA ESTELA BARAHONA DE CARCAMO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(242, 'JOANA MATEU GARCIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(243, 'JOAQUIN VIVAS APARICIO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(244, 'JORGE MILLA GOMEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(245, 'JORGE MORALES MENENDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(246, 'JORGE MORAN COLATO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(247, 'JORGE SANCHEZ GUTIERREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(248, 'JORGE ZAVALETA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(249, 'JORGE ALBERTO GARCÍA GONZALEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(250, 'JORGE ANTONIO LOPEZ FLORES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(251, 'JORGE MAURICIO MINERO DOMINGUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(252, 'JORGE ROBERTO CRUZ GONZALEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(253, 'JOSE PIO SANCHEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(254, 'JOSE ALBERTO VILLEDA BEJARANO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(255, 'JOSE ALFREDO  REGALADO CUELLAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(256, 'JOSE ANTONIO BONET MIRO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(257, 'JOSE ANTONIO MELARA LAZO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(258, 'JOSE ANTONIO RAMOS MENJIVAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(259, 'JOSE ANTONIO SORIANO GALLEGOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(260, 'JOSE ANTONIO SOTO REYES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(261, 'JOSE ARMANDO ACEVEDO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(262, 'JOSE ARMANDO AMAYA CAMPOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(263, 'JOSE ARNULFO HERRERA TORRES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(264, 'JOSE DOLORES RODRIGUEZ QUINTANILLA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(265, 'JOSE DOMINGO CHAVEZ IRAHETA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(266, 'JOSE EDUARDO GUEVARA MARTINEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(267, 'JOSE EDWARD ALVARENGA FLORES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(268, 'JOSE FREDY GARCÍA BARAHONA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(269, 'JOSE GUILLERMO ZALDAÑA MELENDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(270, 'JOSE ILDEFONSO GONZALEZ ESPINOZA.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(271, 'JOSE LUIS HERNANDEZ CAMPOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(272, 'JOSE LUIS SACA MELENDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(273, 'JOSE MANUEL PACHECO P.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(274, 'JOSE MARIO AGUILAR RIVERA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(275, 'JOSE MARVIN ALEXIS  MORENO MARIONA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(276, 'JOSE MAURICIO ALFARO MONGE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(277, 'JOSE MAURICIO REYES HERNANDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(278, 'JOSE MANUEL VELADO LEON', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(279, 'JOSE MIGUEL MORENO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(280, 'JOSE PAUL MARROQUIN F.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(281, 'JOSE PIO SANCHEZ GUARDADO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(282, 'JOSE RENE SERRANO CRESPIN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(283, 'JOSE RICARDO RAMIREZ RIVAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(284, 'JOSE RICARDO ORTIZ ORELLANA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(285, 'JOSE ROBERTO JULE SEGURA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(286, 'JOSE ROBERTO LEIVA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(287, 'JOSE ROBERTO LOZANO CAMPOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(288, 'JOSE ROBERTO PINEDA GALERO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(289, 'JOSE ROBERTO ROTTMAN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(290, 'JOSE ROLANDO ALVAREZ MELENDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(291, 'JOSE SANTIAGO AQUINO BARAHONA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(292, 'JOSE SANTIAGO CERON LOPEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(293, 'JOSE VICTOR RODRIGUEZ MENDOZA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(294, 'JOSEPH BAYONA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(295, 'JOSE ROBERTO CALDERON MAGAÑA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(296, 'JUAN  ANTONIO  HASBUN HERNANDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(297, 'JUAN FARELA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(298, 'JUAN ANGEL MORALES RUIZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(299, 'JUAN B. CABALLERO SIBRIAN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(300, 'JUAN CARLOS CUELLAR ZEPEDA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(301, 'JUAN CARLOS RAMIREZ RIVERA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(302, 'JUAN CARLOS VILLEGAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(303, 'JUAN FRANCISCO FUENTES MENDOZA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(304, 'JUAN JOSE CALIX LOPEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(305, 'JUAN MANUEL RAMIREZ LAZO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(306, 'JUDITH CONTRERAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(307, 'JULIO GARAY RAMOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(308, 'JULIO CESAR CABALLERO NAJARRO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(309, 'JULIO ALEJANDRO MURRA SACA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(310, 'JULIO ALFREDO RAMOS CASTILLO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(311, 'JULIO ANTONIO POSADA JUAREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(312, 'JULIO CESAR ECHEGOYEN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(313, 'JULIO CESAR SALAVERRIA CACERES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(314, 'JULIO EDUARDO BAÑOS A.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(315, 'KAREN LINNETE BARILLAS DE CORDOVA.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(316, 'KATLIN PEÑA DUEÑAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(317, 'KENNETH SALATIEL IBARRA ESCALANTE.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(318, 'LABORATORIO DIAZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(319, 'LABORATORIO JULE GALVEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(320, 'LABORATORIO MONROY', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(321, 'LABORATORIO CLINICO DELGADO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(322, 'LABORATORIO CLINICO EMEDES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(323, 'LABORATORIO CLINICO HIDALGO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(324, 'LABORATORIO CLINICO ORELLANA PARADA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(325, 'LORENA B. DE CASTRO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(326, 'LABORATORIO ROUX', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(327, 'LAWRENCE ALBERTO BRIZUELA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(328, 'LEDA G. ORANTES  HERNANDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(329, 'LEONEL MARTINEZ VILLACORTA.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(330, 'LEONEL ANTONIO AZUCENA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(331, 'LEOPOLDO ANDRES RIVERA TICAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(332, 'LESBIA JEANNETTE MOLINA GUZMAN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(333, 'LETICIA JOVEL LOPEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(334, 'JORGE ALBERTO GOMEZ CABRERA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(335, 'LILIANA MORELY IGLESIAS DE ESCOBAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(336, 'LIGIA MARTINEZ DE MENDOZA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(337, 'LISANDRO VASQUEZ SOSA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(338, 'LISSETH GEORGINA GUZMAN MARTINEZ.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(339, 'LIZETH CALDERON DE ROSALES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(340, 'LIZETH NASSER', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(341, 'PATRICIA HERNANDEZ DE CADER', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(342, 'LORENA DE CASTILLO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(343, 'GUSTAVO ERNESTO RODRIGUEZ PORTILLO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(344, 'LUIS ADOLFO MORALES CHOTO.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(345, 'LUIS ALBERTO VALENCIA FLORES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(346, 'LUIS ALONSO AGUILUZ RAMOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(347, 'LUIS ALONSO VASQUEZ CUELLAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(348, 'LUIS EDMUNDO MENDEZ AVALOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(349, 'LUIS ENRIQUE MELENDEZ  AVALOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(350, 'LUIS ERNESTO GONZALEZ SANCHEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(351, 'LUIS FRANCISCO LOPEZ MELENDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(352, 'LUIS GUSTAVO COUSIN ROJAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(353, 'LUIS RICARDO MONTES CHAVEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(354, 'LUIS ROBERTO AGUILUZ LAZO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(355, 'DAYSI MENDOZA CHAVEZ.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(356, 'MONTOYA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(357, 'MABEL E. TOVAR DE CABRERA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(358, 'MAGDALENA DE JESUS TURCIOS CRUZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(359, 'MANUEL GUANDIQUE MEJIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(360, 'MANUEL ANTONIO  BONILLA CORNEJO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(361, 'MANUEL ULISES MEJIA PEREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(362, 'MARCO ANTONIO CASTILLO MORALES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(363, 'MARCO ANTONIO HUEZO TOLEDO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(364, 'MARGARITA AQUINO DE AVENDAÑO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(365, 'MARGARITA MARTINEZ DE FIGUEROA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(366, 'MARGARITA VASQUEZ DE ECHEGOYEN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(367, 'MARIA ANGELICA CANTARERO ZELAYA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(368, 'MARIA DE LOS A. MARTINEZ DE SANCHEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(369, 'MARIA DEL CARMEN MARROQUIN BARRIENTOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(370, 'MARIA DEL CARMEN RODRIGUEZ.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(371, 'MARIA ARGELIA DUBON', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(372, 'MARIA JULIETA RAMOS ZELADA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(373, 'MARIA ORBELINA DIAZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(374, 'MARIBEL RAUDA CUBIAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(375, 'MARICELA HERRERA DE ESTRADA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(376, 'MARINA ISABEL ALEMAN RAMIREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(377, 'MARINA  HERNANDEZ DE OSEGUEDA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(378, 'MARIA VICTORIA DURAN RAMIREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(379, 'MARINA E. HERNANDEZ E.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(380, 'MARINA GUADALUPE ARGUELLO CARCAMO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(381, 'MARCO RICARDO AFANE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(382, 'MARIO GRANADOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(383, 'MARIO ALBERTO MEJIA GRANDE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(384, 'MARIO ARNULFO MEJIA HENRIQUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(385, 'MARIO CESAR PICHE RAMIREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(386, 'MARIO ENRIQUE ORELLANA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(387, 'MARIO ERNESTO FLORES RECINOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(388, 'MARIO HERBERT SANTAMARIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(389, 'MARIO RAFAEL SOTO VILLALTA.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(390, 'MARIO ROBERTO AGUILAR CORTEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(391, 'MARIO SALVADOR LINARES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(392, 'MARISABEL VALDEZ MUÑOZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(393, 'MARITZA  SERRANO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(394, 'MARITZA C. CASTILLO DE ALVARADO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(395, 'MARITZA CAROLINA GALDAMEZ A.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(396, 'MARLENE LISVET LOPEZ DE ORANTES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(397, 'MARLIN CONSTANZA URQUILLA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(398, 'MARTA DOLORES BENNETT', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(399, 'MARTA NELLY ABARCA SANCHEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(400, 'MARTA RUTH MENA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(401, 'MARTA ANGELA TORRES QUIJANO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(402, 'MARTHA LAZO DE VASQUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(403, 'MARTHA GLORIA TOLEDO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(404, 'MARTHA M. GONZALEZ GOMEZ.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(405, 'MARIO PICHE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(406, 'MARVIN MARTINEZ ESCAMILLA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(407, 'MAURICIO CABRERA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(408, 'MAURICIO CARIAS D. SURIANO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(409, 'MAURICIO GUEVARA PACHECO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(410, 'MAURICIO E. OCHOA BONILLA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(411, 'MAURICIO A. ORANTES GUERRA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(412, 'MAURICIO RIVAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(413, 'MAURICIO VALLADARES AREVALO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(414, 'GUILLERMO POLANCO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(415, 'MAURICIO A. SACA HASBUN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(416, 'MAURICIO ALFONSO ESCOBAR ACOSTA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(417, 'MAURICIO E. CROMEYER', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(418, 'MAURICIO ERNESTO OCHOA BONILLA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(419, 'MAURICIO GUILLERMO VASQUEZ ROMERO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(420, 'MAYRA L. SOLIS GUARDADO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(421, 'CLARA LUZ MARROQUIN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(422, 'MEDINA DURAN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(423, 'MEGA LABORATORIO CLINICO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(424, 'MEJIA BONILLA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(425, 'SILVIA MELANY DE RIVERA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(426, 'MENJIVAR GARCIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(427, 'MERCEDES DE JESUS PORTILLO MELENDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(428, 'MICHELL MELARA DE PALMA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(429, 'MIGUEL A. OQUELI ESCOBAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(430, 'MIGUEL ANGEL SANJUR RUIZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(431, 'MIGUEL MARIO ZABLAH', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(432, 'MILAGRO SANCHEZ DE VIGIL', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(433, 'MILTON BRIZUELA RAMON', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(434, 'MILTON DOMINGUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(435, 'MIREYA GONZALEZ DE VALIENTE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(436, 'MIRIAN OLIVA DE NAVARRETE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(437, 'MIRNA ELIZABETH ARTIGA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(438, 'MOLINA DE RODRIGUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(439, 'MONICA  ALVARENGA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(440, 'MORENA ARMIDA RAMOS DE CAÑAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(441, 'NAPOLEON VIGIL CANALES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(442, 'NAPOLEON ALBERTO GIRON HERNANDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(443, 'MORENA G. MARTINEZ A.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(444, 'NELLY DE VALLE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(445, 'NELSON MEDINA MONROY', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(446, 'NELSON ORTIZ SANCHEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(447, 'NELSON A. ALEMAN JAIME', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(448, 'NELSON ISAIS MIRANDA MORATAYA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(449, 'NELSON RAMON SACA ABREGO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(450, 'NINFA IVETTE BRAND CERRATO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(451, 'NESTOR WILFREDO MIRANDA GAMEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(452, 'NO CONSIGNADO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(453, 'NORMA FANNY ANGULO DE PINEDA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(454, 'NORA IRIS CABRERA BENITEZ.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(455, 'NORMA HERNANDEZ DE HERNANDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(456, 'NURIA STELLA  CANIZALEZ DE HERNANDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(457, 'ORESTES TURIANO ESTRADA PARADA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(458, 'OSCAR ROBLES TICAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(459, 'OSCAR SANCHEZ MELENDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(460, 'OSCAR ALFREDO LEIVA RODAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(461, 'OSCAR ERNESTO AZCUNAGA DUKE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(462, 'OSCAR ARMANDO PEREZ CARIAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(463, 'OSCAR MARCIAL MARROQUIN FUENTES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(464, 'OSCAR WILFREDO LOPEZ BARILLAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(465, 'OVIDIO ANTONIO VASQUEZ PINEDA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(466, 'PATRICIA JUDITH HERRERA DE VILLAFRANCO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(467, 'LUIS FRANCISCO RODRIGUEZ REYES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(468, 'PATRICIA GARCIA SALAMANCA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(469, 'PATRICIA QUEZADA DE CALDERON', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(470, 'MAURICIO ERNESTO AGUILAR ESTRADA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(471, 'PATRICIA DE CASTRO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(472, 'PEDRO ALFONSO SILIEZAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(473, 'PEDRO FRANCISCO AMAYA LOVO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(474, 'PEDRO ORLANDO GUTIERREZ ALAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(475, 'PEDRO SALVADOR MONGE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(476, 'PEREZ LEON', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(477, 'PORTILLO JOVEL', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(478, 'GRACIELA BAIRES ESCOBAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(479, 'PRO-VIDA ILOBASCO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(480, 'RAFAEL HERRERA SANCHEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(481, 'RAFAEL LARIOS MANZANO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(482, 'RAFAEL MALDONADO LOPEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(483, 'RAFAEL REYES RODRIGUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(484, 'RAFAEL VASQUEZ FLORES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(485, 'RAFAEL ALBERTO PEREZ MERINO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(486, 'RAFAEL ANTONIO BALTRONS ORELLANA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(487, 'RAFAEL ANTONIO GONZALEZ PAZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(488, 'RAFAEL ARTURO PINEDA RAMIREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(489, 'RAFAEL ENRIQUE FAJARDO CEVALLOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(490, 'RAFAEL ERNESTO PORTILLO HERRERA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(491, 'CARLOS RAMOS HINDS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(492, 'RAQUEL DE GRANADOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(493, 'RAUL ENRIQUE FLORES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(494, 'RAUL FERNANDO RIVERA FORTIN-MAGAÑA.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(495, 'RENE SANABRIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(496, 'RENE AGUSTIN RODRIGUEZ ROMERO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(497, 'RENE ANTONIO RAMOS CORDERO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(498, 'RENE EDUARDO GUZMAN URRUTIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(499, 'RENE EDUARDO VARGAS MORAN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(500, 'RENE ENRIQUE OLIVO C.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(501, 'RENE V. BLANCO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(502, 'REYNA ARGENTINA AGUILA DE BARRERA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(503, 'REYNA ARGENTINA MORENO DE AGUILA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(504, 'RHINA ANGELICA ORELLANA RAMIREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(505, 'RICARDO MARTINEZ RUANO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(506, 'RICARDO OSEGUEDA ORTEGA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(507, 'RICARDO SALAZAR MONTOYA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(508, 'MAURICIO ENRIQUE FUENTES GRANILLO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(509, 'RICARDO IRAHETA MUNDO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(510, 'RICARDO ALBERTO LEAL VASQUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(511, 'RICARDO ANTONIO PINEDA ALVAREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(512, 'RICARDO HUMBERTO SORIANO JOVEL', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(513, 'RICARDO IVAN QUINTANA  PACAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(514, 'RICARDO M. SANDOVAL VASQUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(515, 'RICARDO SALVADOR MIRANDA LOPEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(516, 'RINA ARAUZ DE AMAYA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(517, 'RICARDO ERNESTO SALAZAR ESCOBAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(518, 'ROBINSON CRUZ BREUCOP', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(519, 'RIVERA RICHARDSON.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(520, 'ROBERTO CALDERON ROSA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(521, 'ROBERTO GONZALEZ RAMOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(522, 'ROBERTO GUZMAN ALBERGUE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(523, 'RODRIGO ALFREDO MELGAR PORTILLO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(524, 'ROBERTO MEJIA ASCENCIO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(525, 'ROBERTO PEÑA CHAVEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(526, 'ROBERTO SELVA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(527, 'ROBERTO ALFONSO GARAY', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(528, 'ROBERTO ANTONIO ROMUALDO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(529, 'ROBERTO ANTONIO SANTOS MENDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(530, 'ROBERTO ARMANDO TICAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(531, 'ROBERTO ARTURO ZABLAH CORDOVA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(532, 'ROBERTO EDMUNDO SANCHEZ OCHOA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(533, 'ROBERTO GERMAN TOBAR PONCE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(534, 'ROCIO DIAZ BARRIENTOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(535, 'RODOLFO ANTONIO ORTIZ NOVOA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(536, 'ROLANDO LAINEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(537, 'ROLANDO SILVA BONILLA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(538, 'ROMAN ZALDIVAR MOLINA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(539, 'RONAL STEVE APARICIO BARAHONA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(540, 'RONALD ALFONZO OSORTO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(541, 'RONALD TORRES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(542, 'ROSA ABIGAIL GUTIERREZ PADILLA.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(543, 'ROSARIO DE MARIA CALDERON HERNANDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(544, 'ROXANA LEIVA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(545, 'RUBEN ERNESTO LEMUS RODAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(546, 'RUTH LIBORIO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(547, 'SALOMON ZEPEDA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(548, 'SALVADOR LOPEZ HERNANDEZ.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(549, 'SALVADOR MORAN CALDERON', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(550, 'SALVADOR RIVAS HERNANDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(551, 'SALVADOR ROSSELL A.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(552, 'SAMUEL CASTRO GONZALEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(553, 'SAMUEL FERNANDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(554, 'SAMUEL ALFREDO HERNANDEZ MORENO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(555, 'JOSE ISAAC SOTO PINEDA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(556, 'SANDRA ORELLANA DEL CID', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(557, 'SANDRA DORIS TORRES RODRIGUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(558, 'SANDRA YANIRA AVALOS R.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(559, 'SANTIAGO TRIGUEROS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(560, 'SANTIAGO YUDICE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(561, 'SAUL R. VELASCO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(562, 'SERGIO ALEJANDRO OSEGUEDA ACUÐA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(563, 'SERGIO EUGENIO SOSA CANIZALEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(564, 'GILBERTO AREVALO RICO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(565, 'SILVIA MORAN CUBELLS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(566, 'SILVIA ALEXANDRA MONTEAGUDO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(567, 'SILVIA DINORAH TORRES DE BARAHONA.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(568, 'SILVIA ELIZABETH RIVERA CHAVEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(569, 'SILVIA NOEMI FUENTES QUINTANILLA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(570, 'SONIA DE MORALES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(571, 'SONIA LOPEZ DE AZAHAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(572, 'SONIA ELIZABETH RIVAS HERNANDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(573, 'SONIA ELIZABETH SORTO DE MORALES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(574, 'SUSY GLADIS FUENTES MENDOZA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(575, 'TATIANA DE MELARA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(576, 'TITO SALAZAR CLARA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(577, 'TITO ANTONIO HUEZO JIMENEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(578, 'TOMAS PALOMO ALCAINE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(579, 'TOMAS SORIANO GARCIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(580, 'ULISES IRAHETA ROSALES.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(581, 'SAMUEL DUEÑAS BLANCO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(582, 'VERONICA ARELY GONZALEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(583, 'VICTOR MACHUCA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(584, 'VICTOR A. GUERRA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(585, 'VICTOR MANUEL PINEDA CONTRERAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(586, 'VICTOR M. QUINTANILLA ALVAREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(587, 'VICTOR MANUEL BONILLA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(588, 'VICTOR MANUEL ESCOBAR MEJIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(589, 'VILMA ELIAS DE CHINCHILLA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(590, 'VILMA DAYSI MAGAÑA FARFAN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(591, 'VILMA E. ROMERO DE CARPIO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(592, 'VILMA GUADALUPE MARTINEZ MEDINA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(593, 'VIOLETA ACOSTA CALDERON', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(594, 'VIOLETA AMADOR DE FUENTES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(595, 'MARIA CELESTE VALIENTE DE ALVAYERO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(596, 'VIOLETA QUINTEROS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(597, 'WENDY MILLER DE CANALES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(598, 'WILFREDO ANTONIO REYES TURCIOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(599, 'WILLIAM PEREZ JEREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(600, 'WENDY M. ELENA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(601, 'GALDAMEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(602, 'JOSE VALENTIN GUZMAN ESTRADA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(603, 'YEANNETTE CECILIA SANTOS ARIAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(604, 'YOLANDA PICHE DE GONZALEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(605, 'ZAIDA FERRUFINO DE RIVERA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(606, 'ZULMA JEANETT VILLALOBOS  HERNANDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(607, 'HOSPITAL NACIONAL DE SUCHITOTO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(608, 'MAURICIO REYES HERNANDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(609, 'ROBERTO VANEGAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(610, 'ELSA VALENTINA MOREIRA GUERRA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(611, 'REYNALDO PAUL MURILLO LARA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(612, 'SAMUEL ERNESTO DUEÑAS BLANCO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(613, 'PATRICIA AGUILA DE RIVERA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(614, 'VASQUEZ LOPEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(615, 'CRISTOBAL PERLA Y PERLA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(616, 'EDUARDO VASQUEZ FERNANDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(617, 'SILVIA PLEITEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(618, 'DANIEL SEGOVIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(619, 'EVELYN IRAHETA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(620, 'HECTOR EDUARDO ANAYA HUEZO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(621, 'GUILLERMO LARA TORRES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(622, 'RICARDO ERNESTO BENDECK JIMENEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(623, 'LIGIA LOPEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(624, 'MANUEL ERNESTO AGUILAR ESTRADA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(625, 'CARLOS O. VELASCO AVENDAÑO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(626, 'LABORATORIO CLINICO PATOLOGICO LINARES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(627, 'DORIS BESSY ESTUPINIAN MERINO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(628, 'ROXANA DEL CARMEN GODOY DE NOCHEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(629, 'JOSE ZANONI YADA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(630, 'ERNESTO S. CARCAMO ALBANES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(631, 'ULISES MIRANDA RODRIGUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(632, 'JOSE FRANCISCO ROMERO HENRRIQUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(633, 'OSCAR RAMIREZ FIGUEROA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(634, 'MARIA ELENA HUEZO DE CASTELAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(635, 'MONTALVO BATRES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(636, 'LYA VERONICA SANDOVAL I. DE ALVAREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(637, 'KARLA VALLE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(638, 'HOSPITAL CADER', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(639, 'RICARDO VIDES LEMUS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(640, 'VERONICA ARRIAZA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(641, 'JORGE GALDAMEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(642, 'LABORATORIO ALVAREZ ALEMAN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(643, 'YANIRA ESTELA RODRIGUEZ DE BURGOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(644, 'SILVIA E. RODRIGUEZ VENTURA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(645, 'JOSE RICARDO REYES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(646, 'JOSE SALVADOR AFANE SAADE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(647, 'ROBERTO PINEDA GALERO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(648, 'CARLOS RODRIGUEZ JOVEL', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(649, 'FRANCISCO A. NIETO GARAY', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(650, 'ENMA HAYDEE GONZALEZ Q. DE GARCÍA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(651, 'FLOR DE MARIA ARGUETA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(652, 'PATRICIA ESCOBAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(653, 'JOSE LUIS FLORES RECINOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(654, 'ROBERTO SALINAS Z.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(655, 'RHINA ELIZABETH LOPEZ DE FUENTES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(656, 'SILVIA REINOSA D.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(657, 'CARLOS CUELLAR ORTIZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(658, 'SONIA ELIZABETH DE MEJIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(659, 'JAIME ESTEBAN SERRANO SERRANO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(660, 'HUGO ADOLFO LIMA CAZUN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(661, 'CARLOS ENRIQUE MAZA M.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(662, 'LUIS ENRIQUE CHICA CEREGHINO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(663, 'MAURICIO R. CHIQUILLO AVELAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(664, 'MARIO ENRIQUE FIGUEROA JIMENEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(665, 'ZAVALETA CONSUEGRA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(666, 'JULIO A. MENDOZA SANCHEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(667, 'CLUB DE LEONES SANTA TECLA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(668, 'SONIA MARISOL ZELAYA S.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(669, 'MEJIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(670, 'GILMA ALFARO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(671, 'LEILA MARINA ACEVEDO DE ARGUETA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(672, 'ROSA MARIA DE DUBON', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(673, 'JOSE ALFREDO OTERO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(674, 'ROBERTO CHAVEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(675, 'RENE PORTILLO SANDOVAL', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(676, 'MARTA L. ALVARADO DE GARCÍA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(677, 'NURIA BEATRIZ VASQUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(678, 'SILVIA LORENA DE SERRANO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(679, 'LABORATORIO MAX BLOCH-ALVAREZ ALEMAN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(680, 'EDGARD ALEJANDRO HERNANDEZ GUTIERREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(681, 'MAURICIO CADER h.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(682, 'FIDELIA GUADALUPE BONILLA DE FLORES', '-', '-', NULL, 0.00, NULL, NULL, NULL);
INSERT INTO `doctores` (`id`, `nombre`, `email`, `direccion`, `telefono`, `saldo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(683, 'WANDA DEL CARMEN CALDERON', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(684, 'PICHE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(685, 'HOSPITAL NACIONAL DE CHALATENANGO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(686, 'CARLOS EDGARDO ESCOBAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(687, 'IRIS LETICIA PEREZ AVENDAÑO.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(688, 'DORA ELIZABETH OSORIO AYALA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(689, 'MIGUEL HERIBERTO CAMPOS DIAZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(690, 'IRMA RAMOS DE MOLINA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(691, 'MAURICIO IRAHETA VEGA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(692, 'DE GARCÍA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(693, 'MERCEDES DE MARINERO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(694, 'FERNANDO ALFREDO QUEZADA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(695, 'PATRICIA CERNA ROSA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(696, 'SALVADOR RODRIGUEZ RODRIGUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(697, 'XIOMARA P. MARTINEZ ORTIZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(698, 'ROXANA R. DE RIVAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(699, 'MONTERROSA ALVAREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(700, 'REYNALDO VILLEDA GARCIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(701, 'PABLO GONZALEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(702, 'CARLOS DAVID SANTOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(703, 'JOSE HORACIO IGLESIAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(704, 'JOSE COMANDARI', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(705, 'VERONICA ESMERALDA MARTINEZ DE ALVARENGA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(706, 'OLGA L. GOMEZ HERRERA DE ALVAREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(707, 'ELI ROSALES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(708, 'JOSE ROBERTO AGUILAR P.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(709, 'OSCAR ARMANDO RAMIREZ FIGUEROA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(710, 'ROBERTO ALVARENGA GOMEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(711, 'MANUEL MORALES GUERRA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(712, 'MAURICIO ALFARO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(713, 'ERNESTO CACERES MOLINA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(714, 'JENNY L. CHAVEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(715, 'CARLOS EMILIO RUANO CHAVEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(716, 'TOMAS E. FIGUEROA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(717, 'JULIO EDUARDO VENTURA MINERO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(718, 'JUAN CARLOS HERRERA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(719, 'CARLOS ERNESTO ARGUETA ACEVEDO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(720, 'RAFAEL MAURICIO IRAHETA VEGA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(721, 'JOAQUIN ESCALANTE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(722, 'MARIA ESTELA RAMOS DE AMAYA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(723, 'LETICIA JOVEL LOZANO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(724, 'JOSE EDUARDO ALVARENGA FLORES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(725, 'IRAHETA VEGA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(726, 'CHAVEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(727, 'GILMAR MEJIA AVALOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(728, 'LILIAN MOLINA DE SERNA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(729, 'MIRNA ROLDAN DE RIVAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(730, 'PRO-VIDA CHALATENANGO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(731, 'ENRIQUE CABRERA AGUILUZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(732, 'OMAR ANTONIO CALLEJAS SANDOVAL', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(733, 'MERLOS MENDEZ GENOVEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(734, 'RUBEN EDGARDO ROSALES P.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(735, 'DE MOLINA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(736, 'ELSA RUBIDIA ESCOBAR RIVERA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(737, 'NOE ALFREDO SURA MORAN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(738, 'J. IVAN ANAYA DE PAZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(739, 'ROLANDO MENJIVAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(740, 'ERIKA AVILA DE GUZMAN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(741, 'CARLOS CASTANEDA CASTRO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(742, 'ROLANDO MELGAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(743, 'ROXANA AMERICA GANZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(744, 'CARLOS FREDO LOPEZ G.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(745, 'ZOILA ANGELICA GONZALEZ VILLALOBOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(746, 'JAIME EDGARDO ALVAREZ BERMUDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(747, 'WILLIAM FERNANDEZ RODRIGUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(748, 'SALVADOR WILFREDO MARTINEZ ZETINO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(749, 'JAIME ERNESTO RIERA MENENDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(750, 'HOSPITAL NACIONAL DE CHALCHUAPA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(751, 'GUSTAVO RODRIGUEZ PORTILLO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(752, 'NURIA IVETH FLORES REYES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(753, 'EVELYN G. PASPARICO MENDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(754, 'MARIO RODRIGUEZ C.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(755, 'EVELYN F. CHAVEZ DE CHACON', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(756, 'MARTA ALVARENGA DE GARCIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(757, 'RICARDO E. QUIÑONEZ C.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(758, 'HUGO NELSON LEMUS R.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(759, 'FABIO MANUEL CASTILLO CASTELLANOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(760, 'ROBERTO MAURICIO GUZMAN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(761, 'NIDIA BLANCO QUITEÑO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(762, 'GERARDO HUEZO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(763, 'DE ZELADA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(764, 'MARLENE OFFMAN DE RODRIGUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(765, 'CARLOS ENRIQUE ARAUJO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(766, 'GERALDINA BARRERA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(767, 'JAVIER E. MEJIA ORELLANA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(768, 'RODRIGUEZ C.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(769, 'CLEOTILDE DE ZUNIGA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(770, 'LUIS ANTONIO CORTEZ AREVALO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(771, 'SARA LUZ AMAYA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(772, 'CARLOS H. HERNANDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(773, 'DOUGLAS A. NOVOA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(774, 'CARLOS MAYORA ESCOBAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(775, 'SIGFREDO BESAGOITIA AVILES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(776, 'REYES BARAHONA MELENDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(777, 'JOSE MAURICIO PINTO REPREZA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(778, 'CARLOS ANTONIO CHAVEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(779, 'LAB.LANGERHANS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(780, 'HILDA GUADALUPE MORALES CHACON', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(781, 'EUGENIA M. CAMPOS ROMERO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(782, 'MIGUEL A. HERNANDEZ ZALDAÑA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(783, 'LUIS RICARDO HENRIQUEZ MOLINA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(784, 'MAURICIO CADER RAMOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(785, 'CARLOS FIGUEROA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(786, 'KENA ANNETH GIRON MARTINEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(787, 'RAFAEL A. MIRANDA P.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(788, 'SILVIA GUANDIQUE OLIVO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(789, 'DANIEL ERNESTO CABRERA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(790, 'MARTA SILVIA DE VIETEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(791, 'ISMARY DE LOPEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(792, 'LABORATORIO MENDEL', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(793, 'LUIS ENRIQUE GUERRERO AZUCENA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(794, 'CARLOS ROBERTO PORTILLO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(795, 'RICARDO MELQUICEDEC RAMIREZ B.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(796, 'MIRIAN F. ESCOLERO DE ALAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(797, 'CARLOS INFANTE MEYER', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(798, 'JAKELIN ALAS DE ALVARENGA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(799, 'CESAR LARIOS CASTILLO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(800, 'KARINA LUCIEN OLIVA AGUILAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(801, 'OSCAR ARTURO SANCHEZ MELENDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(802, 'HUEZO CACERES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(803, 'VERNON MADRIGAL CASTRO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(804, 'FRANCISCO ZELEDON', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(805, 'HENRY ALEXANDER TORRES DUKE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(806, 'OSMIN FLORES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(807, 'ROXANA B. MAGAÑA PINTO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(808, 'GLENDA GRISELDA ZELAYA TORRES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(809, 'PATRICIA YANIRA FIGUEROA GUERRERO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(810, 'WILLIAN MARTICORENA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(811, 'DOUGLAS W. ALVAREZ R.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(812, 'MARIA SILVIA DE LA CRUZ DE VIEYTEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(813, 'PORTILLO ESCALANTE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(814, 'RAFAEL BARAONA CASTANEDA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(815, 'MAURICIO E. SARAVIA.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(816, 'RICARDO JOAQUIN SALAZAR MONTOYA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(817, 'PRO-VIDA  APANECA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(818, 'DOUGLAS BERNABE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(819, 'FRANCISCO MAIDA GONZALEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(820, 'CARLOS ESTRADA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(821, 'MARCOS ANTONIO GUTIERREZ POSADA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(822, 'KARLA MARIA CONTRERAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(823, 'FELIPE MAURICIO TOBIAS R.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(824, 'WALTER SALINAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(825, 'MARIO ALBERTO PASCASIO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(826, 'CARLOS BALMORE CRUZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(827, 'EDITH E. ERAZO ERAZO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(828, 'CONSUELO DEL CARMEN COTO SAAVEDRA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(829, 'RUBEN C. FUENTES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(830, 'LEONEL RIVERA OCHOA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(831, 'JORGE LEONEL MINERO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(832, 'LAURA E. MARTINEZ RIVERA HASBUN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(833, 'CARLOS ERNESTO MENDEZ RIVERA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(834, 'OTTO B. ECHAVERRY', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(835, 'ROSA DELIA VILLALTA DE ARRIOLA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(836, 'HUGO EDUARDO IRAHETA MARTI', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(837, 'PRO-VIDA ZACATECOLUCA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(838, 'JOSE OTILIO CHAVARRIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(839, 'ARISTIDES TOVAR CASTRO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(840, 'LORENA DE RODRIGUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(841, 'RHINA ORELLANA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(842, 'RIGOBERTO DURAN CORTEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(843, 'ROSARIO ZAVALETA F.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(844, 'HECTOR CHICAS SIBRIAN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(845, 'PRO-VIDA NEJAPA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(846, 'HOSPITAL NACIONAL DE METAPAN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(847, 'SANDRA YANIRA GONZALEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(848, 'RAUL E. FUENTES BELTRAN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(849, 'JOSE ROBERTO MEJIA MARTINEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(850, 'FERNANDO GUILLEN ALFARO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(851, 'TORRES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(852, 'JACO HIDALGO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(853, 'JULIA MARTINEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(854, 'PLEITEZ MORAN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(855, 'MARCO ANTONIO LEMUS B.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(856, 'HOSPITAL NACIONAL NUEVA CONCEPCION', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(857, 'MARINA VISCARRA PACHECO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(858, 'HUMBERTO A. LARIN G.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(859, 'MABEL NAVARRO VELIS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(860, 'ELIZABETH DE HERRERA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(861, 'SALVADOR FLORES ARAGON', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(862, 'PRO-VIDA BERLIN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(863, 'JOSE BENJAMIN CAMPOS GUTIERREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(864, 'ELENA CAROLINA ORELLANA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(865, 'HOSPITAL NACIONAL SAN BARTOLO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(866, 'ELMER ANTONIO AVILA ROSALES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(867, 'DANILO A. AREVALO LEON', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(868, 'HEDHER O. RIVERA JUAREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(869, 'CARLOS MANZANO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(870, 'CLARA ELIZABETH ROGEL RODRIGUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(871, 'GARCIA OCHOA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(872, 'DR. ESTRADA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(873, 'JORGE ERNESTO MEJIA CORLETTO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(874, 'VERONICA RAQUEL LARA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(875, 'PARROQUIAL DE AYUTUXTEPEQUE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(876, 'CARLOS GARCIA ZELAYA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(877, 'ROBERTO CALDERON MAGAÑA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(878, 'NOE RAMIREZ HERNANDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(879, 'ADS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(880, 'CHRISTIAN ALEXANDER HERNANDEZ MURCIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(881, 'SONIA DE MARTINEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(882, 'POLICLINICA GUADALUPANA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(883, 'ROSARIO RODRIGUEZ DE ROMERO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(884, 'RAUL ARMANDO ROMERO MIRANDA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(885, 'SAYRA E. URRUTIA ALAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(886, 'ROXANA A. MELENDEZ ESPINOZA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(887, 'CELIA RUBIO DE MANZANO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(888, 'J. SALVADOR PEREZ PORTILLO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(889, 'JUAN JOSE MARTINEZ V.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(890, 'DRA. LUCHA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(891, 'IVAN ANAYA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(892, 'DRA. CHICAS VASQUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(893, 'TANIA AREVALO SAADE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(894, 'CLINICA COJUTEPEQUE ( LAS MELIDAS )', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(895, 'OSCAR MELARA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(896, 'QUEZADA ZELAYA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(897, 'MARIO RENE TEVEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(898, 'PRO-VIDA TECOLUCA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(899, 'MAURICIO TRABANINO PACAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(900, 'SANDRA SEGOVIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(901, 'ALCALDIA MUNICIPAL DE NEJAPA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(902, 'JORGE ALBERTO RICO GIRON', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(903, 'MARIA ELENA MOLINA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(904, 'WALTER A. MANCIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(905, 'ALDO ERICK FLORES HERNANDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(906, 'KAREN LILY GUDIEL FOLGAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(907, 'ELISA MENJIVAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(908, 'CAMILO ERNESTO COREAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(909, 'ALDO FLORES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(910, 'BERTA E. DE CORNEJO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(911, 'GERARDO LOPEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(912, 'DR. MAGAÑA ARIAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(913, 'JUAN FRESH PASOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(914, 'MARCO AURELIO ALAS MARTINEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(915, 'HUGO ERNESTO AYALA FIGUEROA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(916, 'MARTINEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(917, 'DR. MEDINA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(918, 'MARTEL', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(919, 'DR. GONZALEZ RAMOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(920, 'JOSE ANTONIO NO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(921, 'EDUARDO M. REVELO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(922, 'ELENA CAROLINA COLORADO DE LINARES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(923, 'DRA. DE GARCIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(924, 'CARLOS ISAAC ESPINOZA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(925, 'PRO-VIDA AOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(926, 'DRA. DE SEVILLANOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(927, 'ERNESTINA ROSALES DE CHICA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(928, 'GLORIA ESPERANZA TORRES ORTIZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(929, 'DR.  ARAZOLA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(930, 'GUILLERMO ENRIQUE RASCON RAMIREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(931, 'KAREN DE MEZA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(932, 'CARMEN ELENA GARCIA CASTELLON', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(933, 'RUBIDIA ESCOBAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(934, 'JOSE REYNALDO VILLEDA GARCIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(935, 'DR. GODINEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(936, 'MARLENE ORELLANA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(937, 'JUANA ESMERALDA PASTOR LAZO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(938, 'DR. ALFARO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(939, 'MARIA ISABEL VALDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(940, 'DANIEL MENDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(941, 'CARLA YALILE REYES DE ESPINO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(942, 'NELLY ABARCA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(943, 'GINO TIRABOSCHI SANTAMARIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(944, 'SARA TERESA VALDEZ RODRIGUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(945, 'KAREN LISSETH MELARA DE MEZA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(946, 'SUAREZ GUERRERO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(947, 'LUIS ERNESTO MARTINEZ PREZA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(948, 'CLARA E. ROGEL RODRIGUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(949, 'MELENDEZ DE MEJIA ( ST. GERTRUDIS )', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(950, 'DAYSI MABEL PINTO LANDAVERDE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(951, 'SANCHEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(952, 'PATRICIA MORENO DE AGUILA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(953, 'CECILIA CALDERON DE ARGUETA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(954, 'JORGE GOMEZ CABRERA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(955, 'IRIS RODRIGUEZ CHAVEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(956, 'CALLEJAS MELGAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(957, 'ULISES CASTRO GOMEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(958, 'ROXANA CRISTINA GUEVARA GARAY', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(959, 'SAMLUEL DUE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(960, 'SUSANA E. LEON GOMEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(961, 'SONIA CRISTABEL CORNEJO BURUCA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(962, 'CARLOS TORRES SOSA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(963, 'CASTRO GONZALEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(964, 'RAUL ROBERTO CASTILLO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(965, 'GONZALEZ RAMOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(966, 'RENE SANTILLANA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(967, 'JUAN MANUEL PAZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(968, 'LEONARDO E. RAMIREZ CHOTO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(969, 'SALVADOR PEREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(970, 'BESSY MOLINA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(971, 'CELINA E. MEJIA DE MELENDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(972, 'LILIAN LORENA LOPEZ LOPEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(973, 'JORGE A. LOPEZ FLORES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(974, 'LOURDES DE MIRANDA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(975, 'LUIS E. GUERRERO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(976, 'CLARA E. ROGEL RODRIGUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(977, 'MAXIMO HUMBERTO SALGADO RAUDA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(978, 'MIREYA PARADA DE OTERO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(979, 'MANUEL ALBERTO MOLINA SALAZAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(980, 'GUANDIQUE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(981, 'MARTINEZ MELARA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(982, 'MARIO CABRERA BARAHONA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(983, 'CELINDA MELENDEZ DE MEJIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(984, 'MARIBEL GUADALUPE SOLORZANO VALDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(985, 'RICARDO GIOVANNI FIGUEROA LARA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(986, 'ROLANDO FABRICIO GIRON FERNANDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(987, 'HERNANDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(988, 'CABRERA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(989, 'ALEXANDER ZAPATA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(990, 'LILIAN DEL CARMEN ORELLANA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(991, 'HUMBERO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(992, 'MENDOZA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(993, 'HOSPITAL NACIONAL DE SONSONATE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(994, 'NELSON ALEXANDER AQUINO AGUILAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(995, 'ALFREDO QUEZADA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(996, 'MARTHA PATRICIA MARTINEZ DEL OLMO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(997, 'DAVID PANAMA R.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(998, 'PABLO JOSE AQUINO OSORIO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(999, 'ANDREA NOUBLEA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1000, 'GIOVANNA LISSETTE VIDES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1001, 'OLGA L. GOMEZ HERRERA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1002, 'MARIA BENITEZ DE MORALES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1003, 'LABORATORIO MINERO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1004, 'HUGO ALEXANDER ZAMORA RECINOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1005, 'SOL HERNANDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1006, 'J.SALVADOR PEREZ PORTILLO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1007, 'JUAN FRANCISCO PERAZA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1008, 'HOSPITAL SAN JUAN DE DIOS DE SANTA ANA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1009, 'FRANCISCO JOSE ORTEZ SORTO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1010, 'HOSPITAL NACIONAL ROSALES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1011, 'LABORATORIO SONDY', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1012, 'HÇ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1013, 'CLAUDIA SUSANA GRANADOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1014, 'CLAUDIA CHAMORRO. ROXY', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1015, 'JORGE O. CONTRERAS MONCHEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1016, 'GIRON CRESPO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1017, 'ORTEZ ( Labcliza)', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1018, 'MARITZA IVETTE TEJADA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1019, 'ROSA MARIA CASTANEDA ORELLANA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1020, 'MARITZA ARMERO AYALA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1021, 'GODINEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1022, 'VICTORIA E. TERCERO DE MAJANO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1023, 'C.A. SAAVEDRA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1024, 'JUAN CARLOS IGLESIA GUZMAN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1025, 'SALOME MONTESINOS GUZMAN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1026, 'ILDEFONSO GONZALEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1027, 'DRA. BENITEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1028, 'MIGUEL ANGEL SANCHEZ RUIZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1029, 'GUANDIQUE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1030, 'CARLOS MELGAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1031, 'EDWIN MARTINEZ DOMINGUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1032, 'MARTA ELBA IRIAS LOZANO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1033, 'PATRICIA CARVALLO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1034, 'LILIAN CORTEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1035, 'FRANCISCO SALVADOR HIREZI', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1036, 'OSCAR ULISE ALVARADO ( R. DE LA PAZ )', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1037, 'RUDY EDUARDO CAJAL ARIAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1038, 'DAYSI G. RAMIREZ CHICAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1039, 'ANA DEL T. MENENDEZ RAMIREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1040, 'ANGEL EDGARDO VASQUEZ BARAHONA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1041, 'MYRIAM E. MAYEN DE SAPRISSA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1042, 'ZULMA ELIZABETH VILLALTA DE REYES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1043, 'CARLOS ANTONIO CASTANEDA CH.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1044, 'CARLOS MIGUEL ORTIZ ZEPEDA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1045, 'FRANCISCO ALVAREZ POLANCO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1046, 'PEDRO JOSE CASTILLO GARCIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1047, 'HOSPITAL DE ESPECIALIDADES LA PAZ, BRIZBAR, S.A. DE C.V.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1048, 'JUAN ERNESTO HERRERA PEREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1049, 'MARIO RIGOBERTO PORTILLO MIRANDA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1050, 'WILMAN GOMEZ GOMAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1051, 'TIRZA M. BARAHONA DE VIDAL', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1052, 'ROBERTO VALDIVIESO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1053, 'JOSE GUILLERMO LINARES M.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1054, 'CASA DE LA SALUD', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1055, 'HOSPITAL MATERNO INFANTIL SAN ANTONIO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1056, 'JOSE DOMINGO CHAVEZ IRAHETA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1057, 'BOLIVAR VOLTER  LUICENTE AGUIRRE SANDOVAL', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1058, 'CARLOS ERNESTO AREVALO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1059, 'FRANCISCA F. DE GALAN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1060, 'MIRNA ELIZABETH VELASQUEZ M.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1061, 'MARIO EDGARDO ESCOBAR VENTURA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1062, 'JOSE ROBERTO CALDERON R.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1063, 'H.N. DE COJUTEPEQUE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1064, 'EDWIN AMADO MUÑOZ DURAN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1065, 'FRANCISCO QUINTANILLA LOPEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1066, 'MARIO PORTILLO MIRANDA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1067, 'ROMERO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1068, 'PATRICIA DEL PILAR LEON ESTRELLA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1069, 'EFRAIN ELIAS RIVAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1070, 'ADELMO ERNESTO BARRERA MANCIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1071, 'ANA MERCEDES MAGAÑA DE PLATERO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1072, 'ADOLFO PLATERO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1073, 'CLINICA PARROQUIAL P. OCTAVIO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1074, 'KARINA ROSIBEL BONILLA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1075, 'CLAUDIA MORALES DE LUNA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1076, 'CANTARERO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1077, 'PRO-VIDA SAN LORENZO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1078, 'EDA GUZMAN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1079, 'RICARDO QUIJANO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1080, 'LINARES ORTIZ  ( LA RABIDA )', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1081, 'AGEPIM', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1082, 'SOLORZANO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1083, 'CORTEZ  ( zacatecoluca )', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1084, 'CLAUDIA MARISOL FIGUEROA CERNA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1085, 'RICARDO ANTONIO GARCIA LOPEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1086, 'ADRIAN RODRIGUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1087, 'BEATRIZ DE TORRES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1088, 'MARIA ANTONIA HERRERA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1089, 'NURIA GUADRON CAÑAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1090, 'ELIZABETH DE VIANA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1091, 'MIREYA GONZALEZ DE VALIENTE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1092, 'ARMANDO ANTONIO SAENZ GARAY', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1093, 'RICARDO CONTRERAS BONILLA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1094, 'MARGARITA BONILLA DE GUEVARA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1095, 'HOSPITAL LA RABIDA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1096, 'INGRID SEVILLANO DE RODRIGUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1097, 'FERNANDO JAVIER MARTINEZ IRIGOYEN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1098, 'FERNANDO JOSE RASCON RAMIREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1099, 'ROBERTO ROMERO RAMIREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1100, 'FANNY MAGALY RIVERA MENDOZA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1101, 'JORGE SEQUEIRA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1102, 'NELSON ARAGON MORAN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1103, 'DAYLA NELSON', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1104, 'JULIO CESAR BRIZUELA R.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1105, 'JULIO CESAR MONTES BRITO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1106, 'JESSICA MARLENE MARTINEZ DE TRUJILLO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1107, 'JOSE GUILLERMO RENDEROS MORALES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1108, 'CLAUDIA LISSETH MOLINA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1109, 'LEONEL SILIEZAR GARCIA ( H.San Antonio )', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1110, 'ALCALDIA MUNICIPAL DE AYUTUXTEPEQUE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1111, 'RENE IVAN QUANT', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1112, 'BORIS A. ORELLANA LOPEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1113, 'JOSE ARISTIDES TOVAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1114, 'RICARDO ANTONIO SAENZ GARAY', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1115, 'CONCEPCION HUIZA PINEDA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1116, 'EDUARDO CASTILLO SANCHEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1117, 'GUILLERMO ARTURO CANALES TABLAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1118, 'MARGARITA PORTILLO PADILLA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1119, 'LORENA J. RAMIREZ B.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1120, 'CLAUDIA CAROLINA BLANCO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1121, 'HUIZA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1122, 'CLAUDIA BLANCO DE MEJIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1123, 'CARLOS MAURICIO ARTEAGA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1124, 'CARLOS ARTURO CARRANZA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1125, 'GUILLERMO EDGARDO AVILES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1126, 'CARLOS ANIBAL MONGE LOPEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1127, 'IDANIA MORALES HENRIQUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1128, 'IDALIA VALENCIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1129, 'DOUGLAS RICO GIRON', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1130, 'HENRY ALBERTO ORELLANA M.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1131, 'ANA GUADALUPE MONGE HERRERA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1132, 'SANDRA VILLALOBOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1133, 'LILIAN JULISSA MONZON FIGUEROA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1134, 'MONICA DURAN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1135, 'CLINICA MEDICA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1136, 'RAFAEL ANTONIO OLIVARES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1137, 'HENRY STANLEY MEJIA AGUILAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1138, 'CESAR RIVAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1139, 'MIRNA GARCIA HERNANDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1140, 'GUADRON', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1141, 'CLAUDIA DE LUNA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1142, 'GOMEZ GOMAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1143, 'JULISSA MONZON FIGUEROA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1144, 'VIOLETA DELGADO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1145, 'FANNY DE PINEDA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1146, 'JOSE DANIEL RIVERA HERRERA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1147, 'JUAN FRANCISCO LINARES ORTIZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1148, 'ANA YANIRA PALACIOS LOPEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1149, 'ADA FLORES CARRANZA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1150, 'SARA SOFIA BAIRES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1151, 'JUAN ULISES IRAHETA QUEVEDO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1152, 'JAIME ALVAREZ BERMUDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1153, 'EDUARDO MONTES CASTILLO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1154, 'XENIA MOLINA AMAYA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1155, 'CENTRO MEDICO DE OLOCUILTA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1156, 'JOSE RAFAEL ALAS ARTEAGA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1157, 'HOSPITAL NACIONAL DE AHUACHAPAN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1158, 'FERNANDO GOCHEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1159, 'JORGE ORELLANA ( San Juan Nonualco)', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1160, 'JOSELYN LISBETH ORTEZ SANDOVAL', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1161, 'MARICELA COTTO DE SAENZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1162, 'RAFAEL JARQUIN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1163, 'JORGE ANTONIO ORELLANA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1164, 'JOSE RENE SANCHEZ G.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1165, 'LABORATORIO CLINICO MINERO R.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1166, 'KARLA ELIZABETH PALACIOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1167, 'CESAR EMILIO SUAREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1168, 'JAIME ARGUETA OSORIO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1169, 'CARLOS RAMOS MONTOYA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1170, 'RENDEROS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1171, 'JAIME TORRES DUKE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1172, 'RUTH ELIZABETH TORRES DIAZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1173, 'WILLIANS A. LOPEZ CHACON', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1174, 'CARLOS DE JESUS ESCALANTE SARAVIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1175, 'FLAVIO VAQUERO ANDRADE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1176, 'ETHEL G. RIVAS ZULETA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1177, 'EDITH CONCEPCION GAMERO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1178, 'MONTENEGRO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1179, 'HENRY STANLEY MEJIA AGUILAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1180, 'MARTI', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1181, 'HILDA CONTRERAS DE ZELAYANDIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1182, 'HUGO ROLANDO LAZO MELENDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1183, 'MARIA ISABEL APARICIO FLAMENCO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1184, 'VILMA PATRICIA MOLINA CASTILLO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1185, 'ALEX EDGARDO CASTILLO MEJIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1186, 'GUSTAVO ADOLFO HERNANDEZ CANIZALEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1187, 'CLAUDIA L. MOLINA CABRERA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1188, 'R. AMILCAR FUENTE GUILLEN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1189, 'ORLANDO CARPIO SANDOVAL', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1190, 'MAIRENA MENDEZ CAMPOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1191, 'RICARDO HERNANDEZ M.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1192, 'DOUGLAS MARTI PANAMEÑO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1193, 'RIVERA HANDAL', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1194, 'MIRNA YANETH BRUNO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1195, 'JOSE ABRAHAM GOMEZ HERNANDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1196, 'ADS USULUTAN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1197, 'FERNANDO ANTONIO CASTANEDA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1198, 'ESCOBAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1199, 'EDGARDO AVILES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1200, 'E. SANTAMARIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1201, 'LIZAMA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1202, 'FANNY RIVERA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1203, 'IDANIA  M.  HENRIQUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1204, 'HEIDY MARGARETH MARTINEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1205, 'MARIO OSWALDO CUADRA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1206, 'ALFREDO SOL', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1207, 'CARLA CALLEJAS DE GOMEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1208, 'BAIRES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1209, 'NONO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1210, 'DIVINO SALVADOR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1211, 'DEL OLMO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1212, 'WENDY DOMINGUEZ  ( LA FRONTERA )', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1213, 'RUBEN I. ELIAS CORTEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1214, 'MIGUEL ESCOBAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1215, 'CARLOS ARMANDO RIVAS BATRES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1216, 'AVILES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1217, 'LUISA VERONICA HERNANDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1218, 'ANTONIO J. BATARSE L.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1219, 'RIVAS ZULETA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1220, 'XIOMARA DE CASTRO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1221, 'RUDY ARMANDO BONILLA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1222, 'ERICK FABRIZZIO LIZAMA FLORES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1223, 'RODRIGUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1224, 'JUAN JOSE ALEMAN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1225, 'MIGUEL ANGEL SANCHEZ RUIZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1226, 'CLAUDIA ELENA PEÑATE SALAZAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1227, 'IRAHETA DE MIRA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1228, 'HERNANDEZ GARCIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1229, 'KARINA LISSETT PONCE BATRES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1230, 'CLINICA UNIVERSIDAD MATIAS DELGADO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1231, 'CANALES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1232, 'GAMERO MENJIVAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1233, 'JULIO HORACIO GARCIA OCAMPO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1234, 'AVILES OLIVARES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1235, 'MERCADO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1236, 'JAIME NELSON MONTERROSA ESCALANTE.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1237, 'MARITZA QUINTEROS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1238, 'CRISTIAN GONZALEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1239, 'JUAN FRANCISCO CAMPOS RODEZNO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1240, 'WENDY H. QUITEÑO QUINTANILLA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1241, 'LUDWING MENDEZ FUENTES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1242, 'ROMERO RAMIREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1243, 'MICHELLE MATASOL DE PEÑA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1244, 'GALAN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1245, 'SIRO ARGUETA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1246, 'CARLOS ANDRES GUERRA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1247, 'ANTONIO RICARDO AMAYA ESPINO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1248, 'MORENO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1249, 'MARITZA ANABEL QUINTEROS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1250, 'ANA RUTH FLORES ORTEGA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1251, 'RUDY VLADIMIR GUADRON BARAHONA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1252, 'ORLANDO FREDY CRUZ VELA LARIOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1253, 'FERNANDO ENRIQUE GOCHEZ FLORES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1254, 'MARIO E. MIRANDA GALDAMEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1255, 'ANIBAL ALBERTO CAZUN DUARTE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1256, 'CLAUDIA PATRICIA MARTINEZ CAMPOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1257, 'HECTOR HERNANDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1258, 'JUAN CARLOS MORAN H.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1259, 'YESSENIA RIVERA MERCADO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1260, 'NORMA GRACE DIAZ DE CACEROS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1261, 'HERRERA TURCIOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1262, 'RIVERA MERCADO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1263, 'MELVIN ESCOBAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1264, 'ADS SONO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1265, 'ERIKA SURA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1266, 'HOSPITAL NACIONAL DE SENSUNTEPEQUE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1267, 'HOSPITAL PARAVIDA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1268, 'ADA LUZ MORALES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1269, 'MLTON ALFREDO DOMINGUEZ PEÑA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1270, 'MAYRA PATRICIA SANCHEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1271, 'FRANCISCO JOSE RODRIGUEZ ALFARO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1272, 'MARROQUIN', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1273, 'KATIA LARISSA VILLALTA DE MEJIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1274, 'MARIO E. BONILLA CARRANZA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1275, 'SANDRA LORENA MIRA DE SERRANO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1276, 'LORENA BEATRIZ SOSA DE FUENTES ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1277, 'CORINA YESENIA CONDE DE VELASQUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1278, 'ANA MYRNA JACO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1279, 'RINA ZARCEÑO DE RAMIREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1280, 'RUTH MABEL HERNANDEZ RUBIO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1281, 'NORMA TATIANA HERNANDEZ LOPEZ ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1282, 'VALDEMAR FUENTES PALENCIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1283, 'CLAUDIA LORENA ALVARENGA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1284, 'KENIA LAINEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1285, 'FREDY MAURICIO TOLOZA VASQUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1286, 'INGRID JEANNETTE CHAVARRIA ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1287, 'HOSPITAL SAN ANTONIO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1288, 'TIRZA BARAHONA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1289, 'CARLOS RODOLFO GARCIA ZELAYA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1290, 'JORGE MELGAR', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1291, 'CASA DE MARIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1292, 'LUIS ROBERTO YANEZ VENTURA ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1293, 'RONALD  FUNES LINARES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1294, 'ELOISA AGUEDA HERNANDEZ MERLOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1295, 'JORGE ALBERTO CERON LOPEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1296, 'MARIA LUISA ALFARO DE RIVAS ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1297, 'EL BUEN SAMARITANO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1298, 'EMILIA MARGARITA S. DE PANAMEÑO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1299, 'CECILIA AIDA CALDERON ARTIGA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1300, 'CASTILLO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1301, 'DAVID FERNANDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1302, 'JAIME ERNESTO TORRES DUKE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1303, 'RAUL A HERNANDEZ NAJARRO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1304, 'XENIA PATRICIA CUBIAS MOLINA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1305, 'GUERRA ALONSO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1306, 'MARIO PORTILLO.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1307, 'FREDY VLADIMIR GUADRON ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1308, 'ALVARENGA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1309, 'FRANCISCO CASTRO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1310, 'JOSE MORENO REYES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1311, 'JOSE MIGUEL MORENO REYES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1312, 'MARIO MIRANDA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1313, 'ALVARO A. JOACHIN RIVERA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1314, 'MARIA ELENA CASTELAR DE RAMOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1315, 'RENE MAURICIO CANDRAY ZELAYA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1316, 'MAYRA JACO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1317, 'GLADYS ANTONIA VILLATORO CANALES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1318, 'ASTRID VANESSA SANCHEZ ROSAS ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1319, 'TATIANA HERNANDEZ LOPEZ ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1320, 'MARIA EVELYN QUEZADA RAMIREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1321, 'RENE ARTURO HERNANDEZ CASTILLO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1322, 'OSCAR ROBERTO COLORADO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1323, 'MORENA GUADALUPE GUARDADO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1324, 'TITO GOMEZ ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1325, 'SANDRO PINEDA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1326, 'MARINA ALABI', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1327, 'LADY ELIZABETH CAMPOS ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1328, 'DANIA PATRICIA ALFARO ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1329, 'FRANCISCO GUTIERREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1330, 'SALVADOR HUMBERTO SALINAS RUBIO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1331, 'SARAVIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1332, 'MARIO JESUS QUIJADA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1333, 'MARY ISABEL GUEVARA PERDOMO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1334, 'ROSALES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1335, 'EDWIN MONTOYA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1336, 'ANGELICA DEL CARMEN CAMPOS ZELAYA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1337, 'MAURICIO SANTAMARIA VALLE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1338, 'LINARES.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1339, 'FRANCISCO JOSE QUINTANILLA LOPEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1340, 'CRISTO VALLADARES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1341, 'HENRY GALILEO FLORES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1342, 'YANCY NOHEMY GAMEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1343, 'REBECA MAYORA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1344, 'ADAN AMERICO FUENTES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1345, 'ELIZABETH DEL CARMEN RAMOS VASQUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1346, 'TATIANA VELARDE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1347, 'GUEVARA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1348, 'LABORATORIO.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1349, 'JOSE ROBERTO GONZALEZ GARCIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1350, 'DORIS JASMIN AGUILAR PEÑA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1351, 'YESSICA IVETTE PINEDA ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1352, 'MANUEL ALEJANDRO BONILLA LOVO ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1353, 'NELSON SALOMON CAMPOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1354, 'OSCAR ARMANDO MARTINEZ MARTINEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1355, 'LILIAN NOEMY MIRA RAMIREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1356, 'KARLA MARIA SANCHEZ ORELLANA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1357, 'CARLOS F, ARAUJO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1358, 'AYALA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1359, 'KAREN JEANNETTE CAMPOS ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1360, 'ELSY ASTRID FIGUEROA SIGUENZA ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1361, 'ALBERTO IRAHETA OLANO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1362, 'PAOLA ELIZABETH ORELLANA ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1363, 'CORALIA MARIA VIGIL DE ORELLANA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1364, 'LEYDI CAMPOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1365, 'ADS SAN SAL ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1366, 'EVER SAMUEL ALVAREZ RODRIGUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1367, 'CORALIA MARIA VIGIL DE ORELLANA180816', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1368, 'ADS SAN SALVADOR ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1369, 'ALBERTO FLORES HERNANDEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1370, 'JOSE ROBERTO PEREZ MAGAÑA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1371, 'SALVADOR ENRIQUE CERON VIERA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1372, 'SANTOS MENDEZ ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1373, 'ALMA CELINA ESCAMILLA ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1374, 'LILIAN NEOMY MIRA RAMIREZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1375, 'OSCAR HUMBERTO CASTANEDA CAMPOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1376, 'HOSPITAL NACIONAL DE PSIQUIATRIA ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1377, 'ELMER RAMOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1378, 'ILEANA LORENA AYALA CANALES ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1379, 'LUIS ALBERTO IRAHETA OLANO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1380, 'MAYORA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1381, 'MARGARITA ESTHER AYALA CANALES ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1382, 'ANA CELINA ESCAMILLA DE DURAN ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1383, 'NURIA ELIZABETH GUADRON DE CRUZ ', '-', '-', NULL, 0.00, NULL, NULL, NULL);
INSERT INTO `doctores` (`id`, `nombre`, `email`, `direccion`, `telefono`, `saldo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1384, 'CLINICA SAN FRANCISCO DE ASIS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1385, 'JORGE EDWIN MONTOYA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1386, 'JUAN CARLOS HERNANDEZ GOMEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1387, 'NURIA ARDON', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1388, 'NELSON GUSTAVO MIRANDA BENITEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1389, 'DUARTE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1390, 'HUGO ERNESTO DUARTE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1391, 'GRANADOS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1392, 'SANDRA YANETH HERNANDEZ ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1393, 'JAIME RENE FUENTES', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1394, 'GOMEZ.', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1395, 'CANDRAY', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1396, 'ERLINDA CARRILLO', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1397, 'LAURA B. VARGAS RIVAS ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1398, 'JORGE LISANDRO DRIOTEZ URRUTIA ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1399, 'JORGE LISANDRO DRIOTEZ URRUTIA ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1400, 'EDWAR HERRERA RODRIGUEZ', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1401, 'ANA ESMERALDA SOLANO MURCIA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1402, 'LUIS ALBERTO GAMEZ VALLE', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1403, 'GUADALUPE PANIAGUA', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1404, 'RICARDO RIVAS', '-', '-', NULL, 0.00, NULL, NULL, NULL),
(1405, 'MORENA GUADALUPE MARTINEZ AGUILERA', '-', '-', NULL, 0.00, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_transacciones`
--

CREATE TABLE `doctor_transacciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `tipo` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `monto` double(8,2) NOT NULL,
  `prev` double(8,2) NOT NULL,
  `actual` double(8,2) NOT NULL,
  `notas` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frases`
--

CREATE TABLE `frases` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` text COLLATE utf8_unicode_ci NOT NULL,
  `tipo` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `frases`
--

INSERT INTO `frases` (`id`, `nombre`, `tipo`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, 'Frase Macro B', 'B', NULL, '2018-08-29 19:58:06', '2018-08-29 19:58:06'),
(6, 'Frase Micro B', 'M', NULL, '2018-08-29 19:58:22', '2018-08-29 19:58:22'),
(7, 'Frase Micro C', 'C', NULL, '2018-08-29 19:58:41', '2018-08-29 19:58:41');

-- --------------------------------------------------------

--
-- Table structure for table `grupos`
--

CREATE TABLE `grupos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grupos`
--

INSERT INTO `grupos` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Sin Grupo', '2018-08-29 19:09:44', '2018-08-29 19:09:44');

-- --------------------------------------------------------

--
-- Table structure for table `imagen`
--

CREATE TABLE `imagen` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `imagen`
--

INSERT INTO `imagen` (`id`, `url`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'images/biopsia/1/1img1538547269.JPG', NULL, '2018-10-03 12:14:29', '2018-10-03 12:14:29'),
(2, 'images/citologia/3/3img1538548369.JPG', NULL, '2018-10-03 12:32:49', '2018-10-03 12:32:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `navigation`
--

CREATE TABLE `navigation` (
  `id` int(10) UNSIGNED NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `orden` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `navigation`
--

INSERT INTO `navigation` (`id`, `label`, `icon`, `orden`) VALUES
(1, 'Biopsias', 'fa-folder', 1),
(2, 'Citologías', 'fa-folder', 2),
(3, 'Reportes de Lab.', 'fa-file', 4),
(4, 'Reportes financieros', 'fa-briefcase', 5),
(5, 'Panel de Control', 'fa-cog', 7),
(6, 'Pacientes', 'fa-user', 3),
(7, 'Manejo administrativo', 'fa-money-bill', 7),
(8, 'Control de precios', 'fa-money-bill-alt', 8),
(10, 'Control de precios', 'fa-money-bill-alt', 8),
(11, 'Reportes especiales', 'fa-briefcase', 11);

-- --------------------------------------------------------

--
-- Table structure for table `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexo` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `edad` int(3) DEFAULT NULL,
  `meses` int(2) NOT NULL,
  `documento` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pacientes`
--

INSERT INTO `pacientes` (`id`, `name`, `email`, `telefono`, `sexo`, `edad`, `meses`, `documento`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Jose Navas', '', '', '1', 32, 2, '', '2018-07-29 20:53:05', '2018-07-29 21:20:37', NULL),
(2, 'Denis Perez', '', '', '1', 12, 1, '', '2018-07-29 21:20:22', '2018-08-29 21:15:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `precios`
--

CREATE TABLE `precios` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo_id` int(11) NOT NULL,
  `tipo` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `monto` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `precios`
--

INSERT INTO `precios` (`id`, `tipo_id`, `tipo`, `nombre`, `monto`, `created_at`, `updated_at`) VALUES
(1, 1, 'B', 'Biopia 15', 15.00, '2018-07-30 01:49:50', '2018-07-30 01:49:50'),
(2, 1, 'C', 'Citologia 60', 60.00, '2018-07-30 07:00:18', '2018-07-30 07:00:18');

-- --------------------------------------------------------

--
-- Table structure for table `subnavigation`
--

CREATE TABLE `subnavigation` (
  `id` int(10) UNSIGNED NOT NULL,
  `navigation_id` int(11) NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link_extended` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `orden` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subnavigation`
--

INSERT INTO `subnavigation` (`id`, `navigation_id`, `label`, `link`, `link_extended`, `orden`) VALUES
(1, 1, 'Biopsias', '/biopsia', 'biopsia.index', NULL),
(2, 1, 'Nueva biopsia', '/biopsia/create', 'biopsia.create', NULL),
(3, 2, 'Citologías', '/citologia', 'citologia.index', NULL),
(4, 2, 'Nueva citología', '/citologia/create', 'citologia.create', NULL),
(5, 3, 'Biopsia', 'reportes/biopsia', 'reportes.biopsia', NULL),
(6, 3, 'Citología', 'reportes/citologia', 'reportes.citologia', NULL),
(7, 3, 'Grupos', 'reportes/grupo', 'reportes.grupo', NULL),
(8, 4, 'Ingresos', 'reportes/ingresos', 'reportes.ingresos', NULL),
(9, 4, 'Pendientes', 'reportes/pendientes', 'reportes.pendientes', NULL),
(10, 4, 'Prepagados', 'reportes/prepagados', 'reportes/prepagados', NULL),
(12, 5, 'Doctores', '/doctores', 'doctores.index', 1),
(13, 5, 'Grupos', '/grupos', 'grupos.index', 2),
(14, 5, 'Diagnósticos', '/diagnosticos', 'diagnosticos.index', 9),
(15, 5, 'Frases', '/frases', 'frases.index', 8),
(16, 8, 'Precios', '/precios', 'precios.index', 7),
(17, 7, 'Cuentas', '/cuentas', 'cuentas.index', 1),
(18, 5, 'Usuarios', '/usuarios', 'usuarios.index', 3),
(19, 6, 'Pacientes', '/pacientes', 'pacientes.index', NULL),
(20, 6, 'Nuevo Paciente', '/pacientes/create', 'pacientes.create', NULL),
(21, 8, 'Tipo de Biopsia', '/tipo-biopsia', 'tipo-biopsia.index', 7),
(22, 8, 'Tipo de Citología', '/tipo-citologia', 'tipo-citologia.index', 7),
(24, 4, 'Control Diario', 'reportes/control-diario', 'reportes.control-diario', NULL),
(26, 3, 'Informe por Biopsia', 'reportes/informe-biopsia', 'reportes.informe-biopsia', NULL),
(27, 11, 'Biopsias por Doctor', 'reportes/biopsia-doctor', 'reportes.biopsia-doctor', NULL),
(28, 3, 'Informe por Citologia', 'reportes/informe-citologia', 'reportes.informe-citologia', NULL),
(29, 11, 'Citologia por Doctor', 'reportes/citologia-doctor', 'reportes.citologia-doctor', NULL),
(30, 11, 'Biopsia por Doctor Sin Diagnostico', 'reportes/informe-biopsia-sd', 'reportes.informe-biopsia-sd', NULL),
(31, 11, 'Citologias por Doctor Sin Diagnostico', 'reportes/citologia-biopsia-sd', 'reportes.citologia-biopsia-sd', NULL),
(32, 11, 'Biopsias', 'reportes/biopsia-esp', 'reportes.biopsia-esp', NULL),
(33, 11, 'Citologias', 'reportes/citologia-esp', 'reportes.citologia-esp', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tipo_biopsia`
--

CREATE TABLE `tipo_biopsia` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tipo_biopsia`
--

INSERT INTO `tipo_biopsia` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Biopsia 1', '2018-07-30 01:49:18', '2018-07-30 01:49:18');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_citologia`
--

CREATE TABLE `tipo_citologia` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tipo_citologia`
--

INSERT INTO `tipo_citologia` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Citologia 1', '2018-07-30 06:59:03', '2018-07-30 06:59:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rol` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido`, `usuario`, `password`, `rol`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Administrador', 'Maestro', 'admin', '$2y$10$2GidQJigbkl9hl4eaZw0HuF8K9sXJ5WEg1MBwmXHb.weRh.PVxRo2', 'A', 'IHqko1hpeOL8JpZ4OSQNiqQnvgke7FmDqFeQqQhh5KMFaRK4nIVjHQW2wAe5', NULL, NULL, NULL),
(2, 'Tecnico', 'Test', 'test', '$2y$10$0wJxjcliXtZjKpRleL50V.oH7975Xa.FrnUYc1zMF2XzfxGFj.2WC', 'B', NULL, '2018-05-02 19:23:13', '2018-07-31 09:55:55', NULL),
(3, 'Elizabeth', 'Chaccon', 'echacon', '$2y$10$yEMmJX8ddhUDecw4FIwuWOsN9yxSTmWcuZTeU4ckp.w.dDW0d7uhG', 'B', 'XWi0qtaeOPSvBwFSWgUp5O1O08WdpqlwWsqPgjLE69ClNC9ZXgSExLmpEy6V', '2018-07-30 07:20:12', '2018-07-30 07:20:12', NULL),
(4, 'Guadalupe', 'Estrada', 'gestrada', '$2y$10$Sk/HvasbDbBQ2cSUXh09SuyUfrT/93V0ZoIhC350OO0wrNZLdB0FC', 'C', 'YXHPjbOiI6sCkaBrJhivVnGb5dcnaU3Ifpenzg6p3HKn6NEELHjcTWkTvjBK', '2018-07-30 07:20:46', '2018-07-30 07:20:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_navigation`
--

CREATE TABLE `user_navigation` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `navigation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_navigation`
--

INSERT INTO `user_navigation` (`id`, `tipo`, `navigation_id`) VALUES
(1, 'A', 1),
(2, 'A', 2),
(3, 'A', 3),
(4, 'A', 4),
(5, 'A', 5),
(6, 'A', 6),
(7, 'B', 1),
(8, 'B', 2),
(9, 'B', 3),
(10, 'A', 7),
(11, 'A', 8),
(13, 'B', 5),
(17, 'C', 2),
(19, 'C', 5),
(20, 'C', 6),
(23, 'B', 4),
(25, 'B', 6),
(26, 'B', 8),
(27, 'C', 1),
(29, 'C', 3),
(31, 'C', 6),
(32, 'A', 11),
(33, 'A', 9),
(36, 'C', 11),
(38, 'B', 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biopsias`
--
ALTER TABLE `biopsias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `biopsias_informe_unique` (`informe`);

--
-- Indexes for table `biopsia_imagen`
--
ALTER TABLE `biopsia_imagen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `citologia`
--
ALTER TABLE `citologia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `citologia_informe_unique` (`informe`);

--
-- Indexes for table `citologia_imagen`
--
ALTER TABLE `citologia_imagen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultas_transacciones`
--
ALTER TABLE `consultas_transacciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cuentas_codigo_unique` (`codigo`);

--
-- Indexes for table `cuenta_transacciones`
--
ALTER TABLE `cuenta_transacciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnosticos`
--
ALTER TABLE `diagnosticos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_transacciones`
--
ALTER TABLE `doctor_transacciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frases`
--
ALTER TABLE `frases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `precios`
--
ALTER TABLE `precios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subnavigation`
--
ALTER TABLE `subnavigation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_biopsia`
--
ALTER TABLE `tipo_biopsia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_citologia`
--
ALTER TABLE `tipo_citologia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_usuario_unique` (`usuario`);

--
-- Indexes for table `user_navigation`
--
ALTER TABLE `user_navigation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biopsias`
--
ALTER TABLE `biopsias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `biopsia_imagen`
--
ALTER TABLE `biopsia_imagen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `citologia`
--
ALTER TABLE `citologia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `citologia_imagen`
--
ALTER TABLE `citologia_imagen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `consultas_transacciones`
--
ALTER TABLE `consultas_transacciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cuenta_transacciones`
--
ALTER TABLE `cuenta_transacciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diagnosticos`
--
ALTER TABLE `diagnosticos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctores`
--
ALTER TABLE `doctores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1406;

--
-- AUTO_INCREMENT for table `doctor_transacciones`
--
ALTER TABLE `doctor_transacciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frases`
--
ALTER TABLE `frases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `navigation`
--
ALTER TABLE `navigation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `precios`
--
ALTER TABLE `precios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subnavigation`
--
ALTER TABLE `subnavigation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tipo_biopsia`
--
ALTER TABLE `tipo_biopsia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tipo_citologia`
--
ALTER TABLE `tipo_citologia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_navigation`
--
ALTER TABLE `user_navigation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
