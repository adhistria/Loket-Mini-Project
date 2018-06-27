
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `twitter_id` int NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp ,
  `updated_at` timestamp NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `UNIQUE_TWITTER_ID` UNIQUE (`twitter_id`)
);

CREATE TABLE `locations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191)  NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp ,
  `updated_at` timestamp NULL,
  PRIMARY KEY (`id`)
);


CREATE TABLE `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `user_id` int,
  `location_id` int,
  `created_at` timestamp ,
  `updated_at` timestamp NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FOREIGN_KEY_USER` FOREIGN KEY (`user_id`) REFERENCES users(`id`) ON DELETE CASCADE,
  CONSTRAINT `FOREIGN_KEY_LOCATION` FOREIGN KEY (`location_id`) REFERENCES locations(`id`) ON DELETE CASCADE
);


CREATE TABLE `tickets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(191) NOT NULL,
  `price` bigint NOT NULL,
  `event_id` int NOT NULL,
  `created_at` timestamp ,
  `updated_at` timestamp NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `FOREIGN_KEY_EVENT` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE
);




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
