# ************************************************************
# Sequel Ace SQL dump
# Version 20062
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 11.1.2-MariaDB-1:11.1.2+maria~ubu2204)
# Database: plants
# Generation Time: 2023-11-20 12:07:03 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table plant
# ------------------------------------------------------------

DROP TABLE IF EXISTS `plant`;

CREATE TABLE `plant` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `light_direct` varchar(30) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `scientific_name` varchar(40) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `watering_frequency` tinyint(4) DEFAULT NULL,
  `care_difficulty` tinyint(10) DEFAULT NULL,
  `family_id` int(11) DEFAULT NULL,
  `soil_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `plant` WRITE;
/*!40000 ALTER TABLE `plant` DISABLE KEYS */;

INSERT INTO `plant` (`id`, `light_direct`, `name`, `description`, `scientific_name`, `image`, `watering_frequency`, `care_difficulty`, `family_id`, `soil_type`)
VALUES
	(1,'Bright, Indirect','Chinese Money Plant','Pilea peperomioides is a unique and popular houseplant known for its round, coin-shaped leaves that grow on upright stems. It has a distinctive appearance and is often referred to as the \"Chinese Money Plant.','Pilea Peperomioides','https://images.immediate.co.uk/production/volatile/sites/10/2021/03/2048x1365-Pilea-Peperomioides-SEO-GettyImages-1225860485-79b134d.jpg?resize=768,574',1,3,4,'Well-draining'),
	(2,'Bright, Indirect','String of Pearls','String of Pearls is a unique and fascinating succulent with trailing stems adorned by small, bead-like leaves that resemble pearls. The cascading growth habit makes it an attractive choice for hanging baskets or as a trailing accent in container gardens.','Senecio rowleyanus','https://meadowview.com/wp-content/uploads/2022/05/string_of_pearls_plant_1352_detail.jpg',2,4,2,'Cactus mix'),
	(3,'Indirect','Snake Plant','The Snake Plant, also known as Mother-in-Law\'s Tongue, is a hardy and versatile indoor plant known for its upright, sword-shaped leaves. It comes in various varieties, with different leaf patterns and colors, making it a popular choice for both beginners and experienced plant enthusiasts.','Sansevieria','https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjAMABJ7oQtvZWf7ZLgrWlfwKy5oKHuLMjn0wuwR64Eyvy5tg291bm-VdqY_-MTVYiDqY&usqp=CAU',1,2,4,'Cactus mix'),
	(4,'Bright, Indirect','Peace Lily','The Peace Lily is a popular houseplant known for its elegant, dark green leaves and distinctive white blooms. Its graceful appearance makes it a common choice for both homes and offices. The flowers consist of a white spathe surrounding a central spike.','Spathiphyllum','https://cdn.shopify.com/s/files/1/0035/0332/5297/products/Peace-Lily-main-1_1000x1000_crop_center.jpg?v=1653568933',2,5,3,'Potting Mix'),
	(5,'Direct or indirect','Aloe Vera','Aloe Vera is a succulent plant known for its thick, fleshy green leaves that contain a gel with various medicinal properties. It\'s commonly cultivated for its soothing gel, used for treating skin conditions, burns, and minor wounds. Aloe Vera plants often have rosette-shaped clusters of leaves.','Aloe barbadensis miller ','https://img.crocdn.co.uk/images/products2/pl/20/00/02/77/pl2000027723.jpg?width=940&height=940',1,3,1,NULL),
	(6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `plant` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table plant_family
# ------------------------------------------------------------

DROP TABLE IF EXISTS `plant_family`;

CREATE TABLE `plant_family` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `plant_family` WRITE;
/*!40000 ALTER TABLE `plant_family` DISABLE KEYS */;

INSERT INTO `plant_family` (`id`, `name`)
VALUES
	(1,'Succulents and Cacti'),
	(2,'Trailing or Hanging Plants'),
	(3,'Flowering Plants'),
	(4,'Foliage Plants');

/*!40000 ALTER TABLE `plant_family` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_plant
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_plant`;

CREATE TABLE `user_plant` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `plant_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `user_plant` WRITE;
/*!40000 ALTER TABLE `user_plant` DISABLE KEYS */;

INSERT INTO `user_plant` (`id`, `user_id`, `plant_id`)
VALUES
	(1,1,1),
	(2,1,2),
	(3,1,3),
	(4,1,4),
	(5,1,5),
	(6,2,2),
	(7,2,4),
	(8,2,1),
	(9,3,3),
	(10,3,4);

/*!40000 ALTER TABLE `user_plant` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `location`)
VALUES
	(1,'Leeloo Dallas','New York '),
	(2,'Mortisha Addams','New Jersey'),
	(3,'Rick Blane','Casablanca');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
