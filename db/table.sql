CREATE DATABASE IF NOT EXISTS `Ecommerce-Website` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `Ecommerce-Website`;

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user` VALUES
(1, 'Lê Hân', '52200155@student.tdtu.edu.vn', 'lehan', '123456', 0);

ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);