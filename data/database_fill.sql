-- Sample data for resavelo database
-- Run after creating the schema in data/database.sql

USE `resavelo`;

-- ensure clean state for sample import
SET FOREIGN_KEY_CHECKS=0;
TRUNCATE TABLE `reservations`;
TRUNCATE TABLE `velos`;
TRUNCATE TABLE `users`;
SET FOREIGN_KEY_CHECKS=1;

-- Users
INSERT INTO `users` (`id_users`, `name`, `login`, `password`, `role`) VALUES
  (1, 'Admin Root', 'admin', MD5('adminpass'), 'root'),
  (2, 'Vendor One', 'vendor', 'vendorpass', 'vendor'),
  (3, 'Alice Dupont', 'alice', 'alice123', 'user'),
  (4, 'Bob Martin', 'bob', 'bob123', 'user');

-- Velos
INSERT INTO `velos` (`id_velos`, `modele`, `image`) VALUES
  (1, 'City Cruiser', 'city_cruiser.jpg'),
  (2, 'Mountain Bike X200', 'mtb_x200.jpg'),
  (3, 'Electric E-300', 'e300.jpg'),
  (4, 'Folding Mini', 'folding_mini.jpg'),
  (5, 'Kids Fun', 'kids_fun.jpg');

-- Reservations (coherent dates: start_date < end_date)
INSERT INTO `reservations` (`id_reservation`, `id_users`, `id_velos`, `start_date`, `end_date`) VALUES
  (1, 3, 1, '2025-12-20 09:00:00', '2025-12-22 18:00:00'),
  (2, 4, 2, '2026-01-10 10:00:00', '2026-01-12 16:00:00'),
  (3, 3, 3, '2026-01-15 08:00:00', '2026-01-15 20:00:00'),
  (4, 2, 4, '2025-11-05 09:30:00', '2025-11-07 17:00:00'),
  (5, 4, 5, '2026-02-01 09:00:00', '2026-02-05 18:00:00');

-- Optionally set next ids for convenience (if tables will use AUTO_INCREMENT later)
ALTER TABLE `users` AUTO_INCREMENT = 10;
ALTER TABLE `velos` AUTO_INCREMENT = 10;
ALTER TABLE `reservations` AUTO_INCREMENT = 10;

-- End of sample data
