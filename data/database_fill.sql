-- Sample data for resavelo database (variant 2)
-- Matches schema in data/database.sql

USE `resavelo`;

-- Make import idempotent
SET FOREIGN_KEY_CHECKS=0;
TRUNCATE TABLE `reservations`;
TRUNCATE TABLE `velos`;
TRUNCATE TABLE `users`;
SET FOREIGN_KEY_CHECKS=1;

-- Users
INSERT INTO `users` (`id_users`, `name`, `login`, `password`, `role`) VALUES
  (1, 'Site Administrator', 'admin', MD5('admin123'), 'admin'),
  (2, 'Vendor - Rennes', 'vendor_rennes', MD5('vend2026'), 'vendor'),
  (3, 'Vendor - Nantes', 'vendor_nantes', MD5('vendnantes'), 'vendor'),
  (4, 'Alice Durand', 'alice', MD5('alicepwd'), 'user'),
  (5, 'Bruno Leclerc', 'bruno', MD5('brunopwd'), 'user'),
  (6, 'Celine Moreau', 'celine', MD5('celinepwd'), 'user');

-- Velos (columns: id_velos, name, price, quantity, description, image_url, created_at)
INSERT INTO `velos` (`id_velos`, `name`, `price`, `quantity`, `description`, `image_url`, `created_at`) VALUES
  (1, 'City Cruiser', 12, 5, 'Comfortable city bike with basket', 'city_cruiser.jpg', '2025-10-01 09:00:00'),
  (2, 'Mountain Bike X200', 18, 3, 'Robust MTB suitable for trails', 'mtb_x200.jpg', '2025-09-15 10:30:00'),
  (3, 'Electric E-300', 30, 4, 'Compact electric bike, range ~60km', 'e300.jpg', '2025-11-20 08:15:00'),
  (4, 'Folding Mini', 10, 6, 'Lightweight folding bike for commuters', 'folding_mini.jpg', '2025-08-05 12:00:00'),
  (5, 'Kids Fun', 6, 8, 'Small kids bike with training wheels', 'kids_fun.jpg', '2025-06-12 14:20:00');

-- Reservations (columns: id_reservations, id_users, id_velos, start_date, end_date, total_price, created_at)
INSERT INTO `reservations` (`id_reservations`, `id_users`, `id_velos`, `start_date`, `end_date`, `total_price`, `created_at`) VALUES
  (1, 4, 1, '2025-12-20 09:00:00', '2025-12-22 18:00:00', 36.00, '2025-11-01 10:00:00'),
  (2, 5, 2, '2026-01-10 10:00:00', '2026-01-12 16:00:00', 54.00, '2025-12-20 09:30:00'),
  (3, 4, 3, '2026-01-15 08:00:00', '2026-01-15 20:00:00', 30.00, '2025-12-28 11:00:00'),
  (4, 2, 4, '2025-11-05 09:30:00', '2025-11-07 17:00:00', 20.00, '2025-10-20 08:00:00'),
  (5, 5, 5, '2026-02-01 09:00:00', '2026-02-05 18:00:00', 30.00, '2025-12-01 15:00:00');

-- Set reasonable future AUTO_INCREMENT starts
ALTER TABLE `users` AUTO_INCREMENT = 100;
ALTER TABLE `velos` AUTO_INCREMENT = 100;
ALTER TABLE `reservations` AUTO_INCREMENT = 1000;

-- End of sample data
