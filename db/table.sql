CREATE DATABASE IF NOT EXISTS `Ecommerce-Website` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `Ecommerce-Website`;

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `admin` VALUES
(1, 'kiet', '52200140@student.tdtu.edu.vn', 'kietadmin', '123456');

ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

CREATE TABLE `users` (
  `user_id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `username` NVARCHAR(50) NOT NULL UNIQUE,
  `email` NVARCHAR(100) NOT NULL UNIQUE,
  `password` NVARCHAR(255) NOT NULL,
  `city` NVARCHAR(255) DEFAULT NULL,
  `province` NVARCHAR(255) DEFAULT NULL,
  `ward` NVARCHAR(255) DEFAULT NULL,
  `address` NVARCHAR(255) DEFAULT NULL,
  `phone` VARCHAR(20) DEFAULT NULL,
  `payment` NVARCHAR(255) NOT NULL,
  `shipping` INT,
  `is_active` BOOLEAN DEFAULT TRUE,
  `authority` INT DEFAULT 0,
  `code` INT DEFAULT 0,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE  `categories` (
  `category_id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `category_name` NVARCHAR(100) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE  `product_colors` (
  `color_id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `color_name` VARCHAR(50) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE  `product_sizes`(
  `size_id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `size_name` VARCHAR(20) NOT NULL,
  -- `standardized_size` VARCHAR(20),
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE  `products` (
  `product_id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `category_id` INT UNSIGNED NOT NULL,
  `price` DECIMAL(10, 2) NOT NULL,
  `quantity` INT UNSIGNED DEFAULT 0,
  `color_id` INT UNSIGNED,
  `size_id` INT UNSIGNED,
  `image` VARCHAR(255) NOT NULL,
  `coupon_id` INT UNSIGNED DEFAULT NULL, 
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`category_id`) REFERENCES categories(`category_id`),
  FOREIGN KEY (`color_id`) REFERENCES product_colors(`color_id`),
  FOREIGN KEY (`size_id`) REFERENCES product_sizes(`size_id`)
  -- FOREIGN KEY (`coupon_id`) REFERENCES coupons(`coupon_id`)
);


CREATE TABLE IF NOT EXISTS `coupouns` (
  `coupoun_id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `product_id` INT UNSIGNED,
  `coupoun_code` VARCHAR(20) NOT NULL UNIQUE,
  `discount` DECIMAL(5, 2) NOT NULL,
  `expiry` TIMESTAMP,
  `flash_sale` INT DEFAULT 0,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`product_id`) REFERENCES products(`product_id`)
);


-- Orders Table
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  -- `cart_id` INT UNSIGNED,
  `user_id` INT UNSIGNED NOT NULL,
  `product_id` INT UNSIGNED NOT NULL,
  `amount` INT UNSIGNED NOT NULL,
  `total_amount` DECIMAL(10, 2) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `status` INT DEFAULT 0,
  FOREIGN KEY (`user_id`) REFERENCES users(`user_id`),
  FOREIGN KEY (`product_id`) REFERENCES products(`product_id`)
  -- FOREIGN KEY (`cart_id`) REFERENCES cart(`cart_id`)
);

-- Order Details Table
CREATE TABLE IF NOT EXISTS `order_details`(
  `order_detail_id` INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  `product_id` INT UNSIGNED NOT NULL,
  `quantity` INT UNSIGNED NOT NULL,
  `price` DECIMAL(10, 2) NOT NULL,
  `total_amount` INT UNSIGNED NOT NULL,
  `total_price` DECIMAL (10, 2) NOT NULL, 
  `status` NVARCHAR(50) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`order_detail_id`) REFERENCES orders(`order_id`),
  FOREIGN KEY (`product_id`) REFERENCES products(`product_id`)
);

INSERT INTO `categories` (`category_name`) VALUES 
('T-Shirt'),
('Shirt'),
('Pants'),
('Shoes');


INSERT INTO `product_colors` (`color_name`) VALUES
('Red'),
('Blue'),
('Green'),
('Yellow'),
('White'),
('Black'),
('Pink');

INSERT INTO `product_sizes` (`size_name`) VALUES
('S'),
('M'),
('L'),
('XL'),
('2XL'),
('3XL');


INSERT INTO `products` (`name`, `category_id`, `price`, `quantity`, `color_id`, `size_id`, `image`)  VALUES
('T-Shirt Summer 1', '1', '40', '5', '1', '2', '../mvc/assets/img/products/f1.jpg'),
('T-Shirt Summer 2', '1', '45', '10', '1', '1', '../mvc/assets/img/products/f2.jpg'),
('T-Shirt Summer 3', '1', '50', '15', '1', '3', '../mvc/assets/img/products/f3.jpg'),
('T-Shirt Spring', '1', '55', '10', '2', '3', '../mvc/assets/img/products/f4.jpg'),
('T-Shirt Fall', '1', '40', '8', '1', '2', '../mvc/assets/img/products/f5.jpg'),
('Shirt', '2', '30', '12', '1', '1', '../mvc/assets/img/products/f6.jpg'),
('Summer Shorts', '3', '70', '20', '5', '5', '../mvc/assets/img/products/f7.jpg'),
('Skirt', '3', '60', '20', '7', '3', '../mvc/assets/img/products/f8.jpg'),
('Formal Shirt', '2', '50', '10', '2', '4', '../mvc/assets/img/products/n1.jpg'),
('Grey Shirt', '2', '45', '15', '2', '3', '../mvc/assets/img/products/n2.jpg'),
('White Shirt', '2', '120', '30', '5', '4', '../mvc/assets/img/products/n3.jpg'),
('Tank Top', '2', '25', '25', '5', '3', '../mvc/assets/img/products/n4.jpg'),
('Office Shirt', '2', '35', '30', '6', '3', '../mvc/assets/img/products/n5.jpg'),
('Short for men', '3', '40', '20', '3', '4', '../mvc/assets/img/products/n6.jpg'),
('Beige button-up shirt', '2', '20', '10', '1', '1', '../mvc/assets/img/products/n7.jpg'),
('Black Shirt', '2', '25', '15', '6', '5', '../mvc/assets/img/products/n8.jpg'),
('Hem Blouse', '3', '35', '30', '6', '3', '../mvc/assets/img/products/n9.jpg'),
('Fashion Shirt', '2', '50', '45', '5', '3', '../mvc/assets/img/products/n10.jpg'),
('Sport pants', '3', '25', '15', '6', '6', '../mvc/assets/img/products/n11.jpg'),
('White Shirt Couple', '3', '130', '30', '5', '4', '../mvc/assets/img/products/n12.jpg'),
('Maticevski', '3', '45', '65', '5', '4', '../mvc/assets/img/products/n13.jpg'),
('Maticevski-Black', '3', '50', '75', '6', '3', '../mvc/assets/img/products/n14.jpg'),
('Jean Cassual', '3', '70', '20', '2', '5', '../mvc/assets/img/products/n15.jpg'),
('Fashion Jeans', '3', '75', '25', '2', '4', '../mvc/assets/img/products/n16.jpg'),
('Maticevski Fashion for Women', '3', '80', '20', '5', '2', '../mvc/assets/img/products/n17.jpg'),
('Fashion Jean Black', '3', '90', '30', '6', '6', '../mvc/assets/img/products/n18.jpg'),
('Cargo', '3', '70', '15', '6', '5', '../mvc/assets/img/products/n19.jpg'),
('Cargo 2', '3', '70', '20', '2', '4', '../mvc/assets/img/products/n20.jpg'),
('Wide-leg Pants 1', '3', '65', '30', '2', '1', '../mvc/assets/img/products/n21.jpg'),
('Wide-leg Pants 2', '3', '65', '35', '6', '2', '../mvc/assets/img/products/n22.jpg'),
('Flare Pants', '3', '75', '30', '4', '3', '../mvc/assets/img/products/n23.jpg'),
('Fashion Flare Pants', '3', '75', '30', '4', '3', '../mvc/assets/img/products/n24.jpg'),
('Doll Shoes', '4', '95', '45', '6', '2', '../mvc/assets/img/products/n25.jpg'),
('Boot', '4', '130', '10', '5', '5', '../mvc/assets/img/products/n26.jpg'),
('Converse Shoes', '4', '100', '20', '5', '4', '../mvc/assets/img/products/n27.jpg'),
('Dolce & Dabbana', '4', '120', '45', '6', '4', '../mvc/assets/img/products/n28.jpg'),
('Dior', '4', '200', '50', '5', '5', '../mvc/assets/img/products/n29.jpg'),
('Bottega Veneta For Men', '4', '80', '10', '5', '6', '../mvc/assets/img/products/n30.jpg'),
('High Boots 1', '4', '75', '40', '6', '4', '../mvc/assets/img/products/n31.jpg'),
('High Boots 2', '4', '75', '25', '4', '4', '../mvc/assets/img/products/n32.jpg'),
('Mango Flatform Leather Sandals', '4', '40', '200', '6', '2', '../mvc/assets/img/products/n33.jpg'),
('Flip-flops', '4', '30', '60', '5', '1', '../mvc/assets/img/products/n34.jpg'),
('Nike Benassi', '4', '50', '55', '6', '3', '../mvc/assets/img/products/n35.jpg'),
('Crocs', '4', '20', '30', '5', '3', '../mvc/assets/img/products/n36.jpg'),
('Flip-flops Summer', '4', '25', '40', '7', '2', '../mvc/assets/img/products/n37.jpg'),
('Havaianas Basic', '4', '15', '100', '5', '4', '../mvc/assets/img/products/n38.jpg'), 
('Martin Boots', '4', '55', '30', '5', '4', '../mvc/assets/img/products/n39.jpg'),
('Sport Adidas', '4', '60', '120', '6', '3', '../mvc/assets/img/products/n40.jpg');


INSERT INTO `users` (`username`, `email`, `password`, `address`, `phone`, `payment`, `shipping`, `is_active`, `authority`, ) VALUES 
('kiet', '52200140@example.com', 'kiet123', 'Q7', '0953 647 385', 'The visa', 0, TRUE, 0),
('han', '52200155@example.com', 'han123', 'Q1', '0123 456 789', 'The tin dung', 0, TRUE, 0),
('huy', '52200147@example.com', 'huy321', 'Q4', '0385 430 454', 'Tien mat', 1, TRUE, 0),
('ngoc', '52200153@example.com', 'ngoc', 'Q5', '0435 756 890', 'Tien mat', 1, FALSE, 0);


INSERT INTO `orders` (`user_id`, `product_id`, `amount`, `total_amount`) VALUES
('1', '1', '1', (SELECT SUM(amount) FROM (SELECT 1 AS amount UNION ALL SELECT 2 AS amount) AS amounts)),
('1', '3', '2', (SELECT SUM(amount) FROM (SELECT 1 AS amount UNION ALL SELECT 2 AS amount) AS amounts)),
('2', '3', '2', (SELECT SUM(amount) FROM (SELECT 1 AS amount UNION ALL SELECT 2 AS amount) AS amounts)),
('2', '4', '3', (SELECT SUM(amount) FROM (SELECT 1 AS amount UNION ALL SELECT 2 AS amount) AS amounts)),
('3', '5', '1', (SELECT SUM(amount) FROM (SELECT 1 AS amount UNION ALL SELECT 2 AS amount) AS amounts)),
('3', '6', '1', (SELECT SUM(amount) FROM (SELECT 1 AS amount UNION ALL SELECT 2 AS amount) AS amounts)),
('3', '7', '2', (SELECT SUM(amount) FROM (SELECT 1 AS amount UNION ALL SELECT 2 AS amount) AS amounts));


INSERT INTO `order_details` (`product_id`, `quantity`, `price`, `total_amount`, `total_price`,  `status`) VALUES
('1', '1', '40', '3', '140', 'Da xac nhan'),
('3', '2', '50', '3', '140', 'Da xac nhan'),
('3', '2', '50', '5', '265', 'Cho xac nhan'),
('4', '3', '55', '5', '265', 'Cho xac nhan'),
('5', '1', '40', '4', '210', 'Da giao'),
('6', '1', '30', '4', '210', 'Da giao'),
('7', '2', '70', '4', '210', 'Da giao');


INSERT INTO `coupouns` (`product_id`, `coupoun_code`, `discount`, `expiry`) VALUES
('1', 'A01', '0.05', '2024-06-01'),
('2', 'A02', '0.01', '2024-05-25'),
('3', 'B01', '0.02', '2024-04-20'),
('4', 'B02', '0.35', '2024-05-15');

