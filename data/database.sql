-- 
-- resavelo database structure
--
DROP DATABASE IF EXISTS `resavelo`;

CREATE DATABASE IF NOT EXISTS `resavelo` CHARACTER
SET
    utf8mb4 COLLATE utf8mb4_general_ci;

USE `resavelo`;

DROP TABLE IF EXISTS `users`;

DROP TABLE IF EXISTS `velos`;

CREATE TABLE
    `users` (
        `id_users` int (11) NOT NULL,
        `name` varchar(50) NOT NULL,
        `login` varchar(50) NOT NULL,
        `password` varchar(50) NOT NULL,
        `role` ENUM( 'user', 'root', 'vendor'),
        PRIMARY KEY (`id_users`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE
    `velos` (
        `id_velos` int (11) NOT NULL,
        `modele` varchar(50) NOT NULL,
        `image` varchar(50) NOT NULL,
        PRIMARY KEY (`id_velos`)
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

CREATE TABLE
    `reservations` (
        `id_reservation` int (11) NOT NULL,
        `id_users` int (11) NOT NULL,
        `id_velos` int (11) NOT NULL,
        `start_date` datetime NOT NULL,
        `end_date` datetime NOT NULL,
        PRIMARY KEY (`id_reservation`),
        KEY `id_users` (`id_users`),
        KEY `id_velos` (`id_velos`),
        CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE,
        CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_velos`) REFERENCES `velos` (`id_velos`) ON DELETE CASCADE
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;