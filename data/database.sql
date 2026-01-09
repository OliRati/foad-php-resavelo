-- 
-- resavelo database structure
--
DROP DATABASE IF EXISTS `resavelo`;

CREATE DATABASE IF NOT EXISTS `resavelo` CHARACTER
SET
    utf8mb4 COLLATE utf8mb4_general_ci;

USE `resavelo`;

DROP TABLE IF EXISTS `reservations`;
DROP TABLE IF EXISTS `velos`;
DROP TABLE IF EXISTS `users`;

CREATE TABLE
    `users` (
        `id_users` int NOT NULL AUTO_INCREMENT,
        `name` varchar(50) NOT NULL,
        `login` varchar(50) NOT NULL,
        `password` varchar(50) NOT NULL,
        `role` ENUM( 'user', 'admin', 'vendor'),
        `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
        `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id_users`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE
    `velos` (
        `id_velos` int NOT NULL AUTO_INCREMENT,
        `name` varchar(50) NOT NULL,
        `price` int (11) NOT NULL,
        `quantity` int (11) NOT NULL,
        `description` varchar(255) NOT NULL,
        `image_url` varchar(50) NOT NULL,
        `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
        `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id_velos`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE
    `reservations` (
        `id_reservations` int NOT NULL AUTO_INCREMENT,
        `id_users` int (11) NOT NULL,
        `id_velos` int (11) NOT NULL,
        `start_date` datetime NOT NULL,
        `end_date` datetime NOT NULL,
        `total_price` float NOT NULL,
        `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
        `updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (`id_reservations`),
        KEY `id_users` (`id_users`),
        KEY `id_velos` (`id_velos`),
        CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE,
        CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_velos`) REFERENCES `velos` (`id_velos`) ON DELETE CASCADE
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;