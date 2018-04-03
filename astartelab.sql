-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `astartelab`;
CREATE DATABASE `astartelab` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `astartelab`;

DROP TABLE IF EXISTS `biopsias`;
CREATE TABLE `biopsias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  `precio_id` int(11) NOT NULL,
  `estado_pago` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `diagnostico_id` int(11) NOT NULL,
  `recibido` date DEFAULT NULL,
  `entregado` date DEFAULT NULL,
  `informe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `informe_preliminar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `biopsias_informe_unique` (`informe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `biopsias` (`id`, `doctor_id`, `paciente_id`, `grupo_id`, `precio_id`, `estado_pago`, `diagnostico_id`, `recibido`, `entregado`, `informe`, `informe_preliminar`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	1,	2,	'PP',	1,	'2018-03-01',	NULL,	'B1804-001',	NULL,	NULL,	'2018-04-03 12:57:47',	'2018-04-03 12:57:47');

DROP TABLE IF EXISTS `biopsia_inmunohistoquimica`;
CREATE TABLE `biopsia_inmunohistoquimica` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `biopsia_id` int(11) NOT NULL,
  `frase_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `biopsia_inmunohistoquimica` (`id`, `biopsia_id`, `frase_id`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	'2018-04-03 12:57:47',	'2018-04-03 12:57:47');

DROP TABLE IF EXISTS `biopsia_inmunohistoquimica_imagen`;
CREATE TABLE `biopsia_inmunohistoquimica_imagen` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `biopsia_id` int(11) NOT NULL,
  `imagen_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `biopsia_macro`;
CREATE TABLE `biopsia_macro` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `biopsia_id` int(11) NOT NULL,
  `frase_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `biopsia_macro` (`id`, `biopsia_id`, `frase_id`, `created_at`, `updated_at`) VALUES
(1,	1,	2,	'2018-04-03 12:57:47',	'2018-04-03 12:57:47');

DROP TABLE IF EXISTS `biopsia_micro`;
CREATE TABLE `biopsia_micro` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `biopsia_id` int(11) NOT NULL,
  `frase_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `biopsia_micro` (`id`, `biopsia_id`, `frase_id`, `created_at`, `updated_at`) VALUES
(1,	1,	2,	'2018-04-03 12:57:47',	'2018-04-03 12:57:47');

DROP TABLE IF EXISTS `biopsia_preliminar`;
CREATE TABLE `biopsia_preliminar` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `biopsia_id` int(11) NOT NULL,
  `diagnostico_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `biopsia_preliminar` (`id`, `biopsia_id`, `diagnostico_id`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	'2018-04-03 12:57:47',	'2018-04-03 12:57:47');

DROP TABLE IF EXISTS `citologia`;
CREATE TABLE `citologia` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `grupo_id` int(11) NOT NULL,
  `precio_id` int(11) NOT NULL,
  `estado_pago` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `diagnostico_id` int(11) NOT NULL,
  `recibido` date DEFAULT NULL,
  `entregado` date DEFAULT NULL,
  `informe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `informe_preliminar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `citologia_informe_unique` (`informe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `citologia_diagnostico`;
CREATE TABLE `citologia_diagnostico` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `citologia_id` int(11) NOT NULL,
  `diagnostico_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `citologia_imagen`;
CREATE TABLE `citologia_imagen` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `citologia_id` int(11) NOT NULL,
  `imagen_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `citologia_micro`;
CREATE TABLE `citologia_micro` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `citologia_id` int(11) NOT NULL,
  `frase_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `consultas_transacciones`;
CREATE TABLE `consultas_transacciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `consulta` int(11) NOT NULL,
  `informe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado_pago` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `facturacion` char(2) COLLATE utf8_unicode_ci NOT NULL,
  `total` double(8,2) NOT NULL,
  `monto` double(8,2) NOT NULL,
  `saldo` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `consultas_transacciones` (`id`, `tipo`, `consulta`, `informe`, `estado_pago`, `facturacion`, `total`, `monto`, `saldo`, `created_at`, `updated_at`) VALUES
(1,	'B',	1,	'B1804-001',	'PP',	'FA',	10.00,	10.00,	0.00,	'2018-04-03 12:57:47',	'2018-04-03 12:57:47');

DROP TABLE IF EXISTS `cuentas`;
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

INSERT INTO `cuentas` (`id`, `codigo`, `nombre`, `fondo`, `created_at`, `updated_at`) VALUES
(1,	'CA',	'Cuenta Bancaria A',	0.00,	'2018-03-13 10:30:22',	'2018-03-13 10:30:22');

DROP TABLE IF EXISTS `cuenta_transacciones`;
CREATE TABLE `cuenta_transacciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `diagnosticos`;
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
(1,	'Diagnostico A',	'B',	'a',	NULL,	'2018-03-27 09:21:20',	'2018-03-27 09:21:20'),
(2,	'Diagnosgtico B',	'B',	'B',	NULL,	'2018-03-27 09:21:35',	'2018-03-27 09:21:35'),
(3,	'Diagnostico C',	'C',	'C',	NULL,	'2018-03-27 09:21:48',	'2018-03-27 09:21:48'),
(4,	'Diagnostico D',	'C',	'D',	NULL,	'2018-03-27 09:22:00',	'2018-03-27 09:22:00');

DROP TABLE IF EXISTS `doctores`;
CREATE TABLE `doctores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `saldo` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `doctores` (`id`, `nombre`, `email`, `direccion`, `telefono`, `saldo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'Angel Peraza',	'a.peraza@test.com',	' Direccion.',	'(503)-7777-7777',	-10.00,	'2018-03-13 10:29:28',	'2018-04-03 12:57:47',	NULL);

DROP TABLE IF EXISTS `doctor_transacciones`;
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
(1,	1,	'E',	10.00,	0.00,	-10.00,	'2018-04-03 12:57:47',	'2018-04-03 12:57:47');

DROP TABLE IF EXISTS `frases`;
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
(1,	'Frase A',	'B',	NULL,	'2018-03-27 09:26:17',	'2018-03-27 09:26:17'),
(2,	'Frase B',	'B',	NULL,	'2018-03-27 09:26:36',	'2018-03-27 09:26:36'),
(3,	'Frase C',	'M',	NULL,	'2018-03-27 09:26:48',	'2018-03-27 09:26:48'),
(4,	'Frase D',	'M',	NULL,	'2018-03-27 09:26:58',	'2018-03-27 09:26:58'),
(5,	'Frase E',	'C',	NULL,	'2018-03-27 09:27:14',	'2018-03-27 09:27:14'),
(6,	'Frase F',	'C',	NULL,	'2018-03-27 09:27:25',	'2018-03-27 09:27:25');

DROP TABLE IF EXISTS `grupos`;
CREATE TABLE `grupos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `grupos` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1,	'Grupo X',	'2018-03-13 10:41:32',	'2018-03-13 10:41:32');

DROP TABLE IF EXISTS `imagen`;
CREATE TABLE `imagen` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
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
(95,	'2014_10_12_000000_create_users_table',	2),
(96,	'2018_01_28_030918_create_doctores_table',	2),
(97,	'2018_01_28_030945_create_pacientes_table',	2),
(98,	'2018_01_28_033139_create_biopsias_table',	2),
(99,	'2018_01_28_034131_create_diagnosticos_table',	2),
(100,	'2018_01_28_034309_create_grupos_table',	2),
(101,	'2018_01_28_040100_create_frases_table',	2),
(102,	'2018_01_28_040241_create_imagen_table',	2),
(103,	'2018_01_28_040917_create_biopsia_macro_table',	2),
(104,	'2018_01_28_041050_create_biopsia_micro_table',	2),
(105,	'2018_01_28_041344_create_biopsia_preliminar_table',	2),
(106,	'2018_01_28_041524_create_biopsia_inmunohistoquimica_table',	2),
(107,	'2018_01_28_041650_create_biopsia_inmunohistoquimica_imagen_table',	2),
(108,	'2018_01_28_041915_create_citologia_table',	2),
(109,	'2018_01_28_043358_create_citologia_micro_table',	2),
(110,	'2018_01_28_043444_create_citologia_diagnostico_table',	2),
(111,	'2018_02_03_222631_create_doctor_transacciones_table',	2),
(112,	'2018_02_03_223841_create_citologia_imagen_table',	2),
(113,	'2018_02_03_224944_create_cuenta_table',	2),
(114,	'2018_02_03_225103_create_cuenta_transacciones_table',	2),
(115,	'2018_02_04_025938_create_navigation_table',	2),
(116,	'2018_02_04_030718_create_subnavigation_table',	2),
(117,	'2018_02_04_031019_create_user_navigation_table',	2),
(118,	'2018_02_04_051710_create_precios_table',	2),
(119,	'2018_02_06_041825_create_consultas_transacciones_table',	2),
(120,	'2018_02_25_224316_create_tipo_biopsia_table',	2),
(121,	'2018_02_25_224342_create_tipo_citologia_table',	2);

DROP TABLE IF EXISTS `navigation`;
CREATE TABLE `navigation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `orden` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `navigation` (`id`, `label`, `icon`, `orden`) VALUES
(1,	'Pacientes',	'fa-user',	3),
(2,	'Doctores',	'fa-user-md',	4),
(3,	'Biopsias',	'fa-medkit',	1),
(4,	'Citologías',	'fa-heartbeat',	2),
(5,	'Usuarios',	'fa-users',	7),
(6,	'Cuentas',	'fa-credit-card',	6),
(7,	'Reportes',	'fa-file',	5),
(8,	'Configuración',	'fa-cog',	9),
(9,	'Frases y Diagnósticos',	'fa-tags',	8);

DROP TABLE IF EXISTS `pacientes`;
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
(1,	'Angel Peraza',	'a.peraza@test.com',	'(503)-2222-2222',	'1',	'1995-06-25',	'2018-03-13 10:29:04',	'2018-03-13 10:29:04',	NULL);

DROP TABLE IF EXISTS `precios`;
CREATE TABLE `precios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipo_id` int(11) NOT NULL,
  `tipo` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `monto` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `precios` (`id`, `tipo_id`, `tipo`, `nombre`, `monto`, `created_at`, `updated_at`) VALUES
(1,	1,	'C',	'Precio 1 C',	20.00,	'2018-04-03 12:28:10',	'2018-04-03 12:28:10'),
(2,	1,	'b',	'Tipo AB',	10.00,	'2018-04-03 12:43:25',	'2018-04-03 12:43:25');

DROP TABLE IF EXISTS `subnavigation`;
CREATE TABLE `subnavigation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `navigation_id` int(11) NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link_extended` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `orden` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `subnavigation` (`id`, `navigation_id`, `label`, `link`, `link_extended`, `orden`) VALUES
(1,	1,	'Ver pacientes',	'/pacientes',	'pacientes.index',	NULL),
(2,	1,	'Nuevo paciente',	'/pacientes/create',	'pacientes.create',	NULL),
(3,	2,	'Ver doctores',	'/doctores',	'doctores.index',	NULL),
(4,	2,	'Nuevo doctor',	'/doctores/create',	'doctores.create',	NULL),
(5,	3,	'Ver biopsias',	'/biopsia',	'biopsia.index',	NULL),
(6,	3,	'Nueva biopsia',	'/biopsia/create',	'biopsia.create',	NULL),
(7,	7,	'Reportes Fecha',	'/report/date',	'report.date',	NULL),
(8,	4,	'Ver citologías',	'/citologia',	'citologia.index',	NULL),
(9,	4,	'Nueva citologías',	'/citologia/create',	'citologia.create',	NULL),
(10,	7,	'Reportes Doctor',	'/citologia-report',	'citologia_report.index',	NULL),
(11,	5,	'Ver usuarios',	'/usuarios',	'usuarios.index',	NULL),
(12,	5,	'Nuevo usuario',	'/usuarios/create',	'usuarios.create',	NULL),
(13,	6,	'Ver cuentas',	'/cuentas',	'cuentas.index',	NULL),
(14,	6,	'Nueva cuenta',	'/cuentas/create',	'cuentas.create',	NULL),
(15,	7,	'Ingresos',	'/reports/ingresos',	'/reports.ingresos',	NULL),
(16,	6,	'Cuentas',	'/reports/cuentas',	'reportes.cuentas',	NULL),
(17,	8,	'Ver grupos',	'/grupos',	'grupos.index',	NULL),
(18,	8,	'Nuevo grupo',	'/grupos/create',	'grupos.create',	NULL),
(19,	8,	'Precios',	'/precios',	'precios.index',	NULL),
(20,	9,	'Ver diagnósticos',	'/diagnosticos',	'diagnosticos.index',	NULL),
(21,	9,	'Nuevo diagnóstico',	'/diagnosticos/create',	'diagnosticos.create',	NULL),
(22,	9,	'Ver frases',	'/frases',	'frases.index',	NULL),
(23,	9,	'Nueva frase',	'/frases/create',	'frases.create',	NULL),
(24,	8,	'Tipos Biopsia',	'/tipo-biopsia',	'tipo-biopsia',	NULL),
(25,	8,	'Tipo Citología',	'/tipo-citologia',	'tipo-citologia',	NULL);

DROP TABLE IF EXISTS `tipo_biopsia`;
CREATE TABLE `tipo_biopsia` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `tipo_biopsia` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1,	'Tipo AB',	'2018-04-03 02:28:34',	'2018-04-03 02:31:07');

DROP TABLE IF EXISTS `tipo_citologia`;
CREATE TABLE `tipo_citologia` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `tipo_citologia` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1,	'Citologia C',	'2018-04-03 02:36:06',	'2018-04-03 02:36:14');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rol` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_usuario_unique` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`id`, `nombre`, `apellido`, `usuario`, `password`, `rol`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1,	'Administrador',	'Maestro',	'admin',	'$2y$10$2GidQJigbkl9hl4eaZw0HuF8K9sXJ5WEg1MBwmXHb.weRh.PVxRo2',	'A',	'x61JGeDPuscLsexQev4xXtg9oHk7Rh831bKvFQMX62KwFo6RIcbM2t8wUTVw',	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `user_navigation`;
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
(24,	'A',	24),
(25,	'A',	25);

-- 2018-04-03 12:52:35
