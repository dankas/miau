-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.41 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para meowdb
DROP DATABASE IF EXISTS `meowdb`;
CREATE DATABASE IF NOT EXISTS `meowdb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `meowdb`;

-- Copiando estrutura para tabela meowdb.consulta
DROP TABLE IF EXISTS `consulta`;
CREATE TABLE IF NOT EXISTS `consulta` (
  `idconsulta` int NOT NULL AUTO_INCREMENT,
  `nomevet` varchar(50) DEFAULT NULL,
  `descricacao` varchar(50) DEFAULT NULL,
  `pet` int DEFAULT NULL,
  `dataconsulta` date DEFAULT NULL,
  `img` varchar(10) DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `datetimeregistro` datetime DEFAULT (now()),
  PRIMARY KEY (`idconsulta`),
  KEY `FK_petconsulta` (`pet`),
  CONSTRAINT `FK_petconsulta` FOREIGN KEY (`pet`) REFERENCES `pet` (`idpet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela meowdb.consulta: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela meowdb.imagens
DROP TABLE IF EXISTS `imagens`;
CREATE TABLE IF NOT EXISTS `imagens` (
  `idimg` int NOT NULL AUTO_INCREMENT,
  `caminho` varchar(40) NOT NULL,
  `petid` int DEFAULT NULL,
  `tutorid` int DEFAULT NULL,
  `consultaid` int DEFAULT NULL,
  PRIMARY KEY (`idimg`),
  KEY `FKtutorimg` (`tutorid`),
  KEY `FKconsultaimg` (`consultaid`),
  KEY `FKpetimg` (`petid`),
  CONSTRAINT `FKconsultaimg` FOREIGN KEY (`consultaid`) REFERENCES `consulta` (`idconsulta`),
  CONSTRAINT `FKpetimg` FOREIGN KEY (`petid`) REFERENCES `pet` (`idpet`),
  CONSTRAINT `FKtutorimg` FOREIGN KEY (`tutorid`) REFERENCES `users` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela meowdb.imagens: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela meowdb.pet
DROP TABLE IF EXISTS `pet`;
CREATE TABLE IF NOT EXISTS `pet` (
  `idpet` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(10) NOT NULL DEFAULT '0',
  `race` varchar(20) NOT NULL DEFAULT '0',
  `tipoid` int NOT NULL DEFAULT '0',
  `tutor` int NOT NULL DEFAULT (0),
  `bio` tinytext NOT NULL,
  `nascimento` date NOT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `datetimeregistro` datetime DEFAULT (now()),
  PRIMARY KEY (`idpet`),
  KEY `FKtutor` (`tutor`),
  KEY `FKtipo` (`tipoid`) USING BTREE,
  CONSTRAINT `FKtipo` FOREIGN KEY (`tipoid`) REFERENCES `tipo` (`idtipo`),
  CONSTRAINT `FKtutor` FOREIGN KEY (`tutor`) REFERENCES `users` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela meowdb.pet: ~7 rows (aproximadamente)
REPLACE INTO `pet` (`idpet`, `nome`, `race`, `tipoid`, `tutor`, `bio`, `nascimento`, `ativo`, `datetimeregistro`) VALUES
	(1, 'Frajola', 'srv', 1, 1, 'Frajola é definitivamente um gato', '2025-01-23', 1, '2025-06-28 10:13:48'),
	(2, 'salem', 'srv', 2, 1, 'Talvez não seja somente um gato e sim um brujo condenado a ser um gato por 100 anos.', '1832-06-20', 1, '2025-06-28 10:13:48'),
	(3, 'pedro', 'caramelo', 2, 1, 'Pedro rouba chips, cuidado!!!!', '2022-03-23', 1, '2025-06-28 10:13:48'),
	(4, 'cookie', 'srv', 2, 1, 'Aparentemente a falta de uma orelha não é problema.', '2016-06-23', 1, '2025-06-28 10:13:48'),
	(10, 'willow', 'Siames', 2, 1, 'Um olho no peixe e outro nele mesmo.', '2022-12-14', 1, '2025-06-28 10:13:48'),
	(11, 'farelo', 'srv', 1, 1, 'Um farelo de gato', '2025-06-03', 1, '2025-06-28 10:13:48'),
	(26, 'farelo 2', 'sr', 1, 1, 'Um farelo de gato', '2025-06-03', 0, '2025-06-29 11:31:47'),
	(35, 'pluto nash', 'guaiapeca', 2, 1, 'teste', '2019-08-25', 0, '2025-06-29 12:15:15');

-- Copiando estrutura para tabela meowdb.tipo
DROP TABLE IF EXISTS `tipo`;
CREATE TABLE IF NOT EXISTS `tipo` (
  `idtipo` int NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idtipo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela meowdb.tipo: ~2 rows (aproximadamente)
REPLACE INTO `tipo` (`idtipo`, `tipo`) VALUES
	(1, 'gato'),
	(2, 'cão');

-- Copiando estrutura para tabela meowdb.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `iduser` int NOT NULL AUTO_INCREMENT,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `telefone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `imgprofile` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela meowdb.users: ~1 rows (aproximadamente)
REPLACE INTO `users` (`iduser`, `username`, `password`, `telefone`, `imgprofile`) VALUES
	(1, 'tutor', 'tutor', '53998842323', 'users.png');

-- Copiando estrutura para tabela meowdb.vacinas
DROP TABLE IF EXISTS `vacinas`;
CREATE TABLE IF NOT EXISTS `vacinas` (
  `idvacina` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `pet` int DEFAULT NULL,
  `consulta` int DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idvacina`),
  KEY `FK_consulta` (`consulta`),
  KEY `FK_petvacina` (`pet`),
  CONSTRAINT `FK_consulta` FOREIGN KEY (`consulta`) REFERENCES `consulta` (`idconsulta`),
  CONSTRAINT `FK_petvacina` FOREIGN KEY (`pet`) REFERENCES `pet` (`idpet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Copiando dados para a tabela meowdb.vacinas: ~0 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
