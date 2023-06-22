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
  `status_icon` varchar(50) NOT NULL,
  `status_class` varchar(20) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `status` (`id`, `name`, `status_icon`, `status_class`) VALUES
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
  `conclusion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id` (`status_id`) USING BTREE,
  CONSTRAINT `status_id` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tasks` (`id`, `title`, `description`, `status_id`, `created`, `conclusion`) VALUES
	(1, 'Testing a new task', 'se uma task esta concluida e é movida para outro status, a data de conclusao deve ser vazia', 1, '2023-06-21 20:38:40', '0000-00-00 00:00:00'),
	(2, 'to do', 'to do', 2, '2023-06-21 20:50:42', '0000-00-00 00:00:00'),
	(3, 'doing', 'doing', 3, '2023-06-21 20:50:50', '0000-00-00 00:00:00'),
	(4, 'done', 'done', 4, '2023-06-21 20:50:58', '2023-06-21 20:50:58'),
	(6, 'Gerar novo sql', 'gerar novo sql antes de enviar', 1, '2023-06-21 22:21:59', '0000-00-00 00:00:00'),
	(10, 'ao mover task concluida', 'ao mover task concluida para outro status e vice e versa, deve ser removida e adicionada a data de conclusao da mesma\n', 1, '2023-06-21 23:30:29', '0000-00-00 00:00:00'),
	(11, 'adicionar limitacao de caracteres', 'deve ser adicionado uma limitacao de caracteres para os campos do modal\n', 1, '2023-06-21 23:30:55', '0000-00-00 00:00:00'),
	(12, 'fixar o header do kanban', 'se poss&iacute;vel, deixar fixo o header do kanban', 1, '2023-06-21 23:31:28', '0000-00-00 00:00:00'),
	(14, 'criar task nova', 'ao criar uma nova task no kanban e n&atilde;o recarregar a p&aacute;gina, a fun&ccedil;&atilde;o de dele&ccedil;&atilde;o n&atilde;o funciona', 1, '2023-06-21 23:41:09', '0000-00-00 00:00:00');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
