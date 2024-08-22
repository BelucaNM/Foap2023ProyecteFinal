SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

INSERT INTO `categoriasproductos` (`cat_id`, `cat_nombre`) VALUES
(1,	'Cámaras Analógicas'),
(2,	'Cámaras Digitales'),
(3,	'Objetivos Manuales'),
(4,	'Objetivos automático'),
(5,	'Filtros'),
(6,	'Tripodes y Soportes'),
(7,	'Adaptadores'),
(8,	'Baterias'),
(9,	'Cables'),
(10,	'Bolsas y Fundas'),
(11,	'Accesorios');

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `pro_id` int(10) NOT NULL AUTO_INCREMENT,
  `pro_nombre` varchar(45) NOT NULL,
  `pro_descripcion` varchar(300) NOT NULL,
  `pro_URLFoto` varchar(300) NOT NULL,
  `pro_ALTFoto` varchar(45) NOT NULL,
  `pro_precioUnitario` decimal(7,2) NOT NULL,
  `categoriasProductos_cat_id` int(11) NOT NULL,
  `pro_fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `pro_ubicacion` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`pro_id`),
  KEY `fk_productos_categoriasProductos1_idx` (`categoriasProductos_cat_id`),
  CONSTRAINT `fk_productos_categoriasProductos1` FOREIGN KEY (`categoriasProductos_cat_id`) REFERENCES `categoriasproductos` (`cat_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

INSERT INTO `productos` (`pro_id`, `pro_nombre`, `pro_descripcion`, `pro_URLFoto`, `pro_ALTFoto`, `pro_precioUnitario`, `categoriasProductos_cat_id`, `pro_fecha`, `pro_ubicacion`) VALUES
(1,	'RMC-Tokina 25-50',	'Montura Olympus OM - Apertura 1:4 - Diamentro filtro 55mm - Num serie 8100638 - Estado operativo, sin tapas, 7/10. Alguna partícula de polvo en el interior.',	'/var/www/html/webAdmin/imagenes/tok25-50-side300.jpg',	'RMC Tokina 25-50mm',	30.00,	3,	'2024-08-11 02:09:19',	'C001'),
(2,	'Cable USB3-disco',	'Cable USB3 para disco externo',	'../imagenes/cableusb3.jpg',	'cable USB3',	10.00,	9,	'2024-08-11 02:16:03',	'C002'),
(3,	'Minolta XG9',	'Cámara analógica, montura Minolta',	'../imagenes/DSCF1924.JPG',	'Minolta XG9',	60.00,	1,	'2024-08-11 11:29:14',	'TP0001'),
(4,	'Filtro 9KR12',	'Filtro grande',	'../imagenes/DSCF1923.JPG',	'Filtro 9KR12',	5.00,	5,	'2024-08-11 11:30:45',	'TM0001'),
(5,	'DIA-Plus projektor blende',	'Accesorio objetivo proyector',	'../imagenes/DSCF1920.JPG',	'DIA-Plus projektor blende',	5.00,	11,	'2024-08-11 11:32:18',	'TM0001'),
(6,	'Kodak Disc3500',	'Cámara compacta que llevaba discos con los negativos en vez de película.',	'../imagenes/DSCF1917.JPG',	'Kodak Disc3500',	20.00,	1,	'2024-08-11 11:34:02',	'TM0001'),
(7,	'Bolsa de transporte',	'Bolsa de transporte pequeña, ideal para cámara compacta o pequeña con objetivos intercambiables.',	'../imagenes/bolsa-1_A.jpg',	'Bolsa-1',	10.00,	10,	'2024-08-12 11:17:39',	'TB0001'),
(8,	'Canon Digital IXUS 55',	'Cámara compacta digital de bolsillo de 5Mpx, incluye funda original, cargador, dos baterias y tarjeta 2Gb. Funciona correctamente, algún pequeño defecto estético.',	'../imagenes/IXUS55-A.jpg',	'Canon IXUS 55',	35.00,	2,	'2024-08-12 11:39:18',	'CA0001'),
(9,	'Pentax DA-18-55 ',	'Bbjetivo autofoco de Pentax. Buen estado, poco uso. ',	'../imagenes/Pentax-DA-18-55.jpg',	'Pentax DA 18-55',	40.00,	4,	'2024-08-12 11:51:23',	'CA0001'),
(10,	'Manfrotto mini trípode',	'Manfrotto MTPIXI-B num. serie RA041277',	'../imagenes/IMG_20240812_115302005.jpg',	'Manfrotto PIXI',	12.00,	6,	'2024-08-12 12:05:38',	'CA0001'),
(11,	'Adaptador Leica-M a Fuji FX',	'Adaptador de objetivos Leica-M a cámaras Fuji montura FX',	'../imagenes/IMG_20240812_120759624.jpg',	'Leica-M a Fuji-FX',	12.00,	7,	'2024-08-12 12:19:02',	'CA0001'),
(12,	'Cargador baterías CR-V3',	'Para baterías de litio CR-V3, salida 4.2V 600mA',	'../imagenes/IMG_20240812_122657953~2.jpg',	'Cargador CR-V3',	8.00,	8,	'2024-08-12 12:30:25',	'CA0001');
