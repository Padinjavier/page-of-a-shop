-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.17 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para agencia
CREATE DATABASE IF NOT EXISTS `agencia` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `agencia`;

-- Volcando estructura para tabla agencia.administradores
CREATE TABLE IF NOT EXISTS `administradores` (
  `idAdministradores` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `testimonio_idtesti` int(10) unsigned DEFAULT NULL,
  `usuarios_id` int(10) unsigned DEFAULT NULL,
  `pagos_idpagos` int(10) unsigned DEFAULT NULL,
  `deportes_iddeportes` int(10) unsigned DEFAULT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellido` varchar(50) DEFAULT NULL,
  `Email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Numero` varchar(9) DEFAULT NULL,
  `Contraseña` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idAdministradores`),
  KEY `Administradores_FKIndex1` (`usuarios_id`),
  KEY `Administradores_FKIndex2` (`testimonio_idtesti`),
  KEY `Administradores_FKIndex3` (`deportes_iddeportes`),
  KEY `Administradores_FKIndex4` (`pagos_idpagos`),
  CONSTRAINT `administradores_ibfk_1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `administradores_ibfk_2` FOREIGN KEY (`testimonio_idtesti`) REFERENCES `testimonio` (`idtesti`),
  CONSTRAINT `administradores_ibfk_3` FOREIGN KEY (`deportes_iddeportes`) REFERENCES `deportes` (`iddeportes`),
  CONSTRAINT `administradores_ibfk_4` FOREIGN KEY (`pagos_idpagos`) REFERENCES `pagos` (`idpagos`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla agencia.administradores: ~0 rows (aproximadamente)
INSERT INTO `administradores` (`idAdministradores`, `testimonio_idtesti`, `usuarios_id`, `pagos_idpagos`, `deportes_iddeportes`, `Nombre`, `Apellido`, `Email`, `Numero`, `Contraseña`) VALUES
	(1, NULL, NULL, NULL, NULL, 'javier', 'Padin Flores', 'javier@gmail.com', '917189300', '$2y$10$THBKlWb/CWFUe4Cm06tSVu/1tO0qO2wj4coUU1pd1Q42P9XBzctoK');

-- Volcando estructura para tabla agencia.deportes
CREATE TABLE IF NOT EXISTS `deportes` (
  `iddeportes` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `deporte` varchar(20) DEFAULT NULL,
  `DatoDeporte` varchar(255) DEFAULT NULL,
  `Disponibilidad` varchar(20) DEFAULT NULL,
  `Costo` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`iddeportes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla agencia.deportes: ~0 rows (aproximadamente)

-- Volcando estructura para tabla agencia.pagos
CREATE TABLE IF NOT EXISTS `pagos` (
  `idpagos` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuarios_id` int(10) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `precioTotal` decimal(10,0) NOT NULL,
  PRIMARY KEY (`idpagos`),
  KEY `pagos_FKIndex1` (`usuarios_id`),
  CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla agencia.pagos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla agencia.testimonio
CREATE TABLE IF NOT EXISTS `testimonio` (
  `idtesti` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `testimonio` varchar(255) NOT NULL,
  `puntuacion` enum('1','2','3','4','5') DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `sexo` enum('m','f') DEFAULT NULL,
  `aprobado` enum('si','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'no',
  PRIMARY KEY (`idtesti`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla agencia.testimonio: ~3 rows (aproximadamente)
INSERT INTO `testimonio` (`idtesti`, `nombre`, `testimonio`, `puntuacion`, `fecha`, `sexo`, `aprobado`) VALUES
	(1, 'Jhon Doe', 'Excelente servicio del canotaje. Los chicos de la cultura estamos muy contentos por la experiencia. Gracias por todo, realmente fue un gran servicio, están super recomendadísimos.', '5', '2022-06-15', 'm', 'si'),
	(2, 'Diana Carbonel', 'Gracias a las agencia MJ aventura y diversión extrema por su gran servicio, sobre todo la atención que me brindaron en el canotaje y canopy. Excelente! Los recomiendo muchísimo.', '4', '2022-07-03', 'f', 'si'),
	(3, 'Fiorella Sánchez', 'Disfrutamos de nuestra estadía este fin de semana en el hermoso Lunahuaná y sobretodo nos sentimos muy contentos por el gran servicio brindado en canotaje y paseo turístico. Gracias, los recomiendo!', '4', '2022-07-12', 'f', 'si');

-- Volcando estructura para tabla agencia.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `sexo` enum('m','f') NOT NULL,
  `bloqueado` enum('si','no') DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla agencia.usuarios: ~1 rows (aproximadamente)
INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `contraseña`, `sexo`, `bloqueado`) VALUES
	(1, 'javier', 'Padin Flores', 'javier@gmail.com', '$2y$10$jVnFJwwK92.3ZUysFtASW.KnjRZzY44lPMw3iejFkgfIlDIr4oNMO', 'm', 'si');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
