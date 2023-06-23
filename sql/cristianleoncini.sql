/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `to_do` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `to_do`;

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `class` varchar(20) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `status` (`id`, `name`, `icon`, `class`) VALUES
	(1, 'Backlog', '<i class="bi bi-journal"></i>', 'backlog-text'),
	(2, 'To do', '<i class="bi bi-list-task"></i>', 'to-do-text'),
	(3, 'Doing', '<i class="bi bi-clock"></i>', 'doing-text'),
	(4, 'Done', '<i class="bi bi-check2-circle"></i>', 'done-text');

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` tinytext NOT NULL,
  `description` text NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `concluded` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id` (`status_id`) USING BTREE,
  CONSTRAINT `status_id` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tasks` (`id`, `title`, `description`, `status_id`, `created`, `concluded`) VALUES
	(1, 'teste', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sapien justo, placerat ut consequat id, imperdiet sit amet lorem. Duis.asdas', 4, '2023-06-22 22:04:57', '2023-06-22 22:12:11'),
	(2, 'gerar novo dump', 'gerar novo dump como dados ficticios', 1, '2023-06-22 22:05:18', '0000-00-00 00:00:00'),
	(3, 'comentar o c&oacute;digo', 'comentar o c&oacute;digo\n', 4, '2023-06-22 22:05:29', '2023-06-22 22:11:45'),
	(4, 'gravar v&iacute;deo', 'gravar v&iacute;deo', 1, '2023-06-22 22:05:37', '0000-00-00 00:00:00'),
	(6, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sapien justo, placerat ut consequat id, imperdiet sit amet lorem. Duis.', 2, '2023-06-22 22:05:58', '0000-00-00 00:00:00'),
	(7, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sapien justo, placerat ut consequat id, imperdiet sit amet lorem. Duis.', 3, '2023-06-22 22:05:58', '0000-00-00 00:00:00'),
	(8, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sapien justo, placerat ut consequat id, imperdiet sit amet lorem. Duis.', 2, '2023-06-22 22:05:58', '0000-00-00 00:00:00'),
	(9, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sapien justo, placerat ut consequat id, imperdiet sit amet lorem. Duis.', 2, '2023-06-22 22:05:58', '0000-00-00 00:00:00'),
	(10, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sapien justo, placerat ut consequat id, imperdiet sit amet lorem. Duis.', 2, '2023-06-22 22:05:58', '0000-00-00 00:00:00'),
	(11, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sapien justo, placerat ut consequat id, imperdiet sit amet lorem. Duis.', 2, '2023-06-22 22:05:58', '0000-00-00 00:00:00'),
	(12, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sapien justo, placerat ut consequat id, imperdiet sit amet lorem. Duis.', 4, '2023-06-22 22:05:58', '2023-06-22 22:07:35'),
	(13, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sapien justo, placerat ut consequat id, imperdiet sit amet lorem. Duis.', 3, '2023-06-22 22:05:58', '0000-00-00 00:00:00'),
	(14, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sapien justo, placerat ut consequat id, imperdiet sit amet lorem. Duis.', 4, '2023-06-22 22:05:58', '2023-06-22 22:11:35'),
	(15, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sapien justo, placerat ut consequat id, imperdiet sit amet lorem. Duis.', 3, '2023-06-22 22:05:58', '0000-00-00 00:00:00'),
	(16, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sapien justo, placerat ut consequat id, imperdiet sit amet lorem. Duis.', 3, '2023-06-22 22:05:58', '0000-00-00 00:00:00'),
	(17, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sapien justo, placerat ut consequat id, imperdiet sit amet lorem. Duis.', 2, '2023-06-22 22:05:58', '0000-00-00 00:00:00'),
	(18, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sapien justo, placerat ut consequat id, imperdiet sit amet lorem. Duis.', 3, '2023-06-22 22:05:58', '0000-00-00 00:00:00'),
	(19, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sapien justo, placerat ut consequat id, imperdiet sit amet lorem. Duis.', 4, '2023-06-22 22:05:58', '2023-06-22 22:10:10'),
	(20, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sapien justo, placerat ut consequat id, imperdiet sit amet lorem. Duis.', 4, '2023-06-22 22:05:58', '2023-06-22 22:10:02'),
	(21, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sapien justo, placerat ut consequat id, imperdiet sit amet lorem. Duis.', 4, '2023-06-22 22:05:58', '2023-06-22 22:10:01'),
	(22, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sapien justo, placerat ut consequat id, imperdiet sit amet lorem. Duis.', 4, '2023-06-22 22:05:58', '2023-06-22 22:10:12'),
	(24, 'teste1', 'rt', 4, '2023-06-22 22:09:21', '2023-06-22 22:09:27');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
