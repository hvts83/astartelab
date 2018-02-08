-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE TABLE `biopsias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  `diagnostico_id` int(11) NOT NULL,
  `precio_id` int(11) NOT NULL,
  `estado_pago` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `recibido` date DEFAULT NULL,
  `entregado` date DEFAULT NULL,
  `informe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `biopsias_informe_unique` (`informe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `biopsias` (`id`, `doctor_id`, `paciente_id`, `grupo_id`, `diagnostico_id`, `precio_id`, `estado_pago`, `recibido`, `entregado`, `informe`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	1,	1,	1,	'',	'2018-02-03',	'2018-02-07',	'B021',	NULL,	'2018-02-06 12:02:36',	'2018-02-07 12:15:38'),
(2,	1,	1,	1,	1,	1,	'',	'2018-02-06',	NULL,	'B022',	NULL,	'2018-02-06 12:02:58',	'2018-02-06 12:02:58'),
(5,	1,	1,	1,	1,	1,	'PE',	'2018-02-08',	NULL,	'B023',	NULL,	'2018-02-08 17:18:01',	'2018-02-08 17:18:01');

CREATE TABLE `biopsia_inmunohistoquimica` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `biopsia_id` int(11) NOT NULL,
  `resultado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detalle` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `biopsia_inmunohistoquimica` (`id`, `biopsia_id`, `resultado`, `detalle`, `created_at`, `updated_at`) VALUES
(1,	1,	'asdas',	'sadsad',	'2018-02-08 10:57:00',	'2018-02-08 10:57:00');

CREATE TABLE `biopsia_inmunohistoquimica_imagen` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `biopsia_id` int(10) unsigned NOT NULL,
  `imagen_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `biopsia_id` (`biopsia_id`),
  CONSTRAINT `biopsia_inmunohistoquimica_imagen_ibfk_1` FOREIGN KEY (`biopsia_id`) REFERENCES `biopsias` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `biopsia_inmunohistoquimica_imagen` (`id`, `biopsia_id`, `imagen_id`, `created_at`, `updated_at`) VALUES
(1,	1,	4,	'2018-02-08 11:34:47',	'2018-02-08 11:34:47'),
(2,	1,	5,	'2018-02-08 11:59:59',	'2018-02-08 11:59:59');

CREATE TABLE `biopsia_macro` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `biopsia_id` int(11) NOT NULL,
  `frase_id` int(11) NOT NULL,
  `detalle` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `biopsia_macro` (`id`, `biopsia_id`, `frase_id`, `detalle`, `created_at`, `updated_at`) VALUES
(1,	1,	3,	'Detalle frase C editado',	'2018-02-08 10:00:02',	'2018-02-08 10:00:11');

CREATE TABLE `biopsia_micro` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `biopsia_id` int(11) NOT NULL,
  `frase_id` int(11) NOT NULL,
  `detalle` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `biopsia_micro` (`id`, `biopsia_id`, `frase_id`, `detalle`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	'Frase a',	'2018-02-08 10:02:00',	'2018-02-08 10:02:00');

CREATE TABLE `biopsia_preliminar` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `biopsia_id` int(11) NOT NULL,
  `diagnostico_id` int(11) NOT NULL,
  `detalle` text COLLATE utf8_unicode_ci,
  `informe_preliminar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `biopsia_preliminar` (`id`, `biopsia_id`, `diagnostico_id`, `detalle`, `informe_preliminar`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	'Diagnostico a',	NULL,	'2018-02-08 10:34:52',	'2018-02-08 10:34:52');

CREATE TABLE `cheques` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numero` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `monto` double(8,2) NOT NULL,
  `fecha_realizacion` date NOT NULL,
  `lugar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `concepto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `paguese` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `citologia` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  `diagnostico_id` int(11) NOT NULL,
  `precio_id` int(10) NOT NULL,
  `estado_pago` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `recibido` date DEFAULT NULL,
  `entregado` date DEFAULT NULL,
  `informe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `citologia_informe_unique` (`informe`),
  KEY `precio_id` (`precio_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `citologia` (`id`, `doctor_id`, `paciente_id`, `grupo_id`, `diagnostico_id`, `precio_id`, `estado_pago`, `recibido`, `entregado`, `informe`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	1,	3,	3,	'',	'2018-02-07',	NULL,	'C021',	NULL,	'2018-02-08 12:24:33',	'2018-02-08 12:24:33'),
(3,	1,	1,	1,	3,	2,	'',	'2018-02-07',	'2018-02-07',	'C022',	NULL,	'2018-02-08 12:30:55',	'2018-02-08 12:39:23'),
(6,	1,	1,	1,	3,	3,	'PP',	'2018-02-02',	NULL,	'C023',	NULL,	'2018-02-08 15:26:21',	'2018-02-08 15:26:21');

CREATE TABLE `citologia_diagnostico` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `citologia_id` int(11) NOT NULL,
  `diagnostico_id` int(11) NOT NULL,
  `detalle` text COLLATE utf8_unicode_ci,
  `informe_preliminar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `citologia_diagnostico` (`id`, `citologia_id`, `diagnostico_id`, `detalle`, `informe_preliminar`, `created_at`, `updated_at`) VALUES
(1,	1,	2,	'h',	NULL,	'2018-02-08 15:40:27',	'2018-02-08 15:40:27');

CREATE TABLE `citologia_imagen` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `citologia_id` int(11) NOT NULL,
  `imagen_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `citologia_imagen` (`id`, `citologia_id`, `imagen_id`, `created_at`, `updated_at`) VALUES
(1,	3,	6,	'2018-02-08 12:43:01',	'2018-02-08 12:43:01');

CREATE TABLE `citologia_micro` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `citologia_id` int(11) NOT NULL,
  `frase_id` int(11) NOT NULL,
  `detalle` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `citologia_micro` (`id`, `citologia_id`, `frase_id`, `detalle`, `created_at`, `updated_at`) VALUES
(1,	3,	4,	'x',	'2018-02-08 12:42:14',	'2018-02-08 12:42:14'),
(2,	1,	4,	'a',	'2018-02-08 15:40:21',	'2018-02-08 15:40:21');

CREATE TABLE `consultas_transacciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `consulta` int(11) NOT NULL,
  `estado_pago` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `facturacion` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `informe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `monto` double(8,2) NOT NULL,
  `saldo` double(8,2) NOT NULL,
  `total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `consultas_transacciones` (`id`, `tipo`, `consulta`, `estado_pago`, `facturacion`, `informe`, `monto`, `saldo`, `total`, `created_at`, `updated_at`) VALUES
(1,	'B',	1,	'',	'',	'B021',	10.00,	0.00,	0.00,	'2018-02-06 12:02:36',	'2018-02-06 12:02:36'),
(2,	'B',	2,	'',	'',	'B022',	10.00,	0.00,	0.00,	'2018-02-06 12:02:58',	'2018-02-06 12:02:58'),
(3,	'C',	1,	'',	'',	'C021',	25.00,	0.00,	0.00,	'2018-02-08 12:24:33',	'2018-02-08 12:24:33'),
(4,	'C',	3,	'',	'',	'C022',	15.00,	0.00,	0.00,	'2018-02-08 12:30:55',	'2018-02-08 12:30:55'),
(5,	'C',	6,	'PP',	'TC',	'C023',	25.00,	0.00,	25.00,	'2018-02-08 15:26:21',	'2018-02-08 15:26:21'),
(6,	'B',	5,	'PE',	'TC',	'B023',	0.00,	10.00,	10.00,	'2018-02-08 17:18:01',	'2018-02-08 17:18:01');

CREATE TABLE `cuentas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fondo` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cuentas_codigo_unique` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `cuenta_transacciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cuenta_id` int(11) NOT NULL,
  `cheque_id` int(11) NOT NULL,
  `tipo` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `concepto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `monto` double(8,2) NOT NULL,
  `prev` double(8,2) NOT NULL,
  `actual` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `diagnosticos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `detalle` text COLLATE utf8_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `diagnosticos` (`id`, `nombre`, `tipo`, `detalle`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1,	'Diagnostico A',	'B',	'Es un diagnostico que detalla A',	NULL,	'2018-02-06 11:29:53',	'2018-02-06 11:29:53'),
(2,	'Diagnostico H',	'C',	'h',	NULL,	'2018-02-08 12:22:25',	'2018-02-08 12:22:25'),
(3,	'Diagnostico G',	'C',	'g',	NULL,	'2018-02-08 12:22:34',	'2018-02-08 12:22:34'),
(4,	'Diagnostico J',	'C',	'j',	NULL,	'2018-02-08 12:22:48',	'2018-02-08 12:22:48');

CREATE TABLE `doctores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `saldo` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `doctores` (`id`, `nombre`, `email`, `telefono`, `saldo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'Dr. Marcoh',	'test@mail.com',	'(503)-2222-2111',	75.00,	'2018-02-05 04:36:56',	'2018-02-08 15:26:21',	NULL);

CREATE TABLE `doctor_transacciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `tipo` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `monto` double(8,2) NOT NULL,
  `prev` double(8,2) NOT NULL,
  `actual` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `doctor_transacciones` (`id`, `doctor_id`, `tipo`, `monto`, `prev`, `actual`, `created_at`, `updated_at`) VALUES
(1,	1,	'I',	100.00,	0.00,	100.00,	'2018-02-05 06:58:27',	'2018-02-05 06:58:27'),
(2,	1,	'E',	25.00,	100.00,	75.00,	'2018-02-08 15:26:21',	'2018-02-08 15:26:21');

CREATE TABLE `frases` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `frases` (`id`, `nombre`, `tipo`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1,	'Frase A',	'B',	NULL,	'2018-02-06 11:30:07',	'2018-02-06 11:30:07'),
(2,	'Frase B',	'M',	NULL,	'2018-02-06 11:30:16',	'2018-02-06 11:30:16'),
(3,	'Frase C',	'B',	NULL,	'2018-02-06 11:30:25',	'2018-02-06 11:30:25'),
(4,	'Frase x',	'C',	NULL,	'2018-02-08 12:23:04',	'2018-02-08 12:23:04'),
(5,	'Frase Y',	'C',	NULL,	'2018-02-08 12:23:15',	'2018-02-08 12:23:15');

CREATE TABLE `grupos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `grupos` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1,	'Grupo A',	'2018-02-06 11:27:58',	'2018-02-06 11:27:58');

CREATE TABLE `imagen` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `imagen` (`id`, `url`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4,	'images/biopsia/1/1img1518068086.PNG',	NULL,	'2018-02-08 11:34:46',	'2018-02-08 11:34:46'),
(5,	'images/biopsia/1/1img1518069599.PNG',	NULL,	'2018-02-08 11:59:59',	'2018-02-08 11:59:59'),
(6,	'images/citologia/3/3img1518072181.PNG',	NULL,	'2018-02-08 12:43:01',	'2018-02-08 12:43:01');

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(49,	'2018_01_28_041915_create_patologia_table',	1),
(50,	'2018_01_28_043358_create_patologia_micro_table',	1),
(51,	'2018_01_28_043444_create_patologia_diagnostico_table',	1),
(69,	'2014_10_12_000000_create_users_table',	2),
(70,	'2018_01_28_030918_create_doctores_table',	2),
(71,	'2018_01_28_030945_create_pacientes_table',	2),
(72,	'2018_01_28_033139_create_biopsias_table',	2),
(73,	'2018_01_28_034131_create_diagnosticos_table',	2),
(74,	'2018_01_28_034309_create_grupos_table',	2),
(75,	'2018_01_28_040100_create_frases_table',	2),
(76,	'2018_01_28_040241_create_imagen_table',	2),
(77,	'2018_01_28_040917_create_biopsia_macro_table',	2),
(78,	'2018_01_28_041050_create_biopsia_micro_table',	2),
(79,	'2018_01_28_041344_create_biopsia_preliminar_table',	2),
(80,	'2018_01_28_041524_create_biopsia_inmunohistoquimica_table',	2),
(81,	'2018_01_28_041650_create_biopsia_inmunohistoquimica_imagen_table',	2),
(82,	'2018_01_28_041915_create_citologia_table',	2),
(83,	'2018_01_28_043358_create_citologia_micro_table',	2),
(84,	'2018_01_28_043444_create_citologia_diagnostico_table',	2),
(85,	'2018_02_03_222631_create_doctor_transacciones_table',	2),
(86,	'2018_02_03_223841_create_citologia_imagen_table',	2),
(87,	'2018_02_03_224944_create_cuenta_table',	2),
(88,	'2018_02_03_225103_create_cuenta_transacciones_table',	2),
(89,	'2018_02_03_230823_create_cheque_table',	2),
(90,	'2018_02_04_025938_create_navigation_table',	3),
(91,	'2018_02_04_030718_create_subnavigation_table',	3),
(92,	'2018_02_04_031019_create_user_navigation_table',	3),
(93,	'2018_02_04_051710_create_precios_table',	4),
(94,	'2018_02_06_041825_create_consultas_transacciones_table',	5);

CREATE TABLE `navigation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `navigation` (`id`, `label`, `icon`) VALUES
(1,	'Pacientes',	'fa-user'),
(2,	'Doctores',	'fa-user-md'),
(3,	'Biopsias',	'fa-medkit'),
(4,	'Citologias',	'fa-heartbeat'),
(5,	'Usuarios',	'fa-users'),
(6,	'Cuentas',	'fa-credit-card'),
(7,	'Reportes',	'fa-file-alt'),
(8,	'Configuración',	'fa-cog');

CREATE TABLE `pacientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexo` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `pacientes` (`id`, `name`, `email`, `telefono`, `sexo`, `fecha_nacimiento`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'John doe',	'john@rocketmail.com',	'(503)-2221-1111',	'1',	'2000-06-13',	'2018-02-06 11:23:37',	'2018-02-06 11:23:37',	NULL);

CREATE TABLE `precios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `monto` double(8,2) NOT NULL,
  `tipo` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `precios` (`id`, `nombre`, `monto`, `tipo`, `created_at`, `updated_at`) VALUES
(1,	'Precio normal',	10.00,	'B',	'2018-02-05 09:53:47',	'2018-02-05 09:53:54'),
(2,	'Normal',	15.00,	'C',	'2018-02-08 12:14:12',	'2018-02-08 12:14:12'),
(3,	'Especial',	25.00,	'C',	'2018-02-08 12:14:23',	'2018-02-08 12:14:23');

CREATE TABLE `subnavigation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `navigation_id` int(11) NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link_extended` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `subnavigation` (`id`, `navigation_id`, `label`, `link`, `link_extended`) VALUES
(1,	1,	'Ver pacientes',	'/pacientes',	'pacientes.index'),
(2,	1,	'Nuevo paciente',	'/pacientes/create',	'pacientes.create'),
(3,	2,	'Ver doctores',	'/doctores',	'doctores.index'),
(4,	2,	'Nuevo doctor',	'/doctores/create',	'doctores.create'),
(5,	3,	'Ver biopsias',	'/biopsia',	'biopsia.index'),
(6,	3,	'Nueva biopsia',	'/biopsia/create',	'biopsia.create'),
(7,	3,	'Reportes biopsia',	'/biopsia-report',	'biopsia_report.index'),
(8,	4,	'Ver citologías',	'/citologia',	'citologia.index'),
(9,	4,	'Nueva citologías',	'/citologia/create',	'citologia.create'),
(10,	4,	'Reportes citologías',	'/citologia-report',	'citologia_report.index'),
(11,	5,	'Ver usuarios',	'/usuarios',	'usuarios.index'),
(12,	5,	'Nuevo usuario',	'/usuarios/create',	'usuarios.create'),
(13,	6,	'Ver cuentas',	'/cuentas',	'cuentas.index'),
(14,	6,	'Nueva cuenta',	'/cuenta/create',	'cuenta.create'),
(15,	6,	'Cheques',	'/cheques',	'/cheques.index'),
(16,	6,	'Nuevo cheque',	'/cheques/create',	'cheques.create'),
(17,	8,	'Ver grupos',	'/grupos',	'grupos.index'),
(18,	8,	'Nuevo grupo',	'/grupos/create',	'grupos.create'),
(19,	8,	'Precios',	'/precios',	'precios.index'),
(20,	8,	'ver diagnósticos',	'/diagnosticos',	'diagnosticos.index'),
(21,	8,	'Nuevo diagnóstico',	'/diagnosticos/create',	'diagnosticos.create'),
(22,	8,	'Ver frases',	'/frases',	'frases.index'),
(23,	8,	'Nueva frase',	'/frases/create',	'frases.create');

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rol` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `rol`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'Admin',	'admin@adminmail.com',	'$2y$10$Z38RYlmqtLAYdv80.RmcaOb33fwfkB/lwGw6aA2Gn4KS96HVuyvL2',	'A',	NULL,	NULL,	NULL,	NULL),
(2,	'Empleado 1',	'empleado1@rocketmail.com',	'$2y$10$3DON1RJo1z7cKHDWtPueLew6N2U3rmdIIxdTnNQljR7QU2E.IG.Cu',	'B',	NULL,	'2018-02-08 13:22:17',	'2018-02-08 13:33:26',	NULL),
(4,	'empleado 1',	'empleado1x@rocktmail.com',	'$2y$10$SYcNST22CY2CJJTLRk/Yb.st1v9o7CdL7CRNUuwWU0Q4oKanagfTq',	'B',	NULL,	'2018-02-08 13:34:28',	'2018-02-08 13:34:28',	NULL);

CREATE TABLE `user_navigation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subnavigation_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user_navigation` (`id`, `tipo`, `subnavigation_id`) VALUES
(1,	'A',	1),
(2,	'A',	2),
(3,	'A',	3),
(4,	'A',	4),
(5,	'A',	5),
(6,	'A',	6),
(7,	'A',	7),
(8,	'A',	8),
(9,	'A',	9),
(10,	'A',	10),
(11,	'A',	11),
(12,	'A',	12),
(13,	'A',	13),
(14,	'A',	14),
(15,	'A',	15),
(16,	'A',	16),
(17,	'A',	17),
(18,	'A',	18),
(19,	'A',	19),
(20,	'A',	20),
(21,	'A',	21),
(22,	'A',	22),
(23,	'A',	23),
(24,	'A',	24);

-- 2018-02-08 11:23:24
