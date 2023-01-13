-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour store_fj
CREATE DATABASE IF NOT EXISTS `store_fj` /*!40100 DEFAULT CHARACTER SET utf8mb3 COLLATE utf8mb3_bin */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `store_fj`;

-- Listage de la structure de table store_fj. product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT 'https://img1.freepng.fr/20180325/lyq/kisspng-stop-sign-no-symbol-warning-sign-red-clip-art-block-sign-cliparts-5ab7f5bcceb618.1264965515220054368467.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Listage des données de la table store_fj.product : ~0 rows (environ)
INSERT INTO `product` (`id`, `name`, `price`, `description`, `img`) VALUES
	(1, 'fraise', 4, 'c\'est rouge', 'https://ae01.alicdn.com/kf/H9d9ea017210e45da9da3ee62226a5f8c2/TouHou-poup-e-en-peluche-de-20cm-s-rie-Fumo-Fumo-en-Stock-jouets-cadeaux.jpg'),
	(2, 'fourchette', 125, 'oui', 'https://ih1.redbubble.net/image.3081782663.9529/flat,750x,075,f-pad,750x1000,f8f8f8.jpg'),
	(3, 'tomate', 45, 'c\'est rouge aussi', 'https://ae01.alicdn.com/kf/H9d9ea017210e45da9da3ee62226a5f8c2/TouHou-poup-e-en-peluche-de-20cm-s-rie-Fumo-Fumo-en-Stock-jouets-cadeaux.jpg');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
