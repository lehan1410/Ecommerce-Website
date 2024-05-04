CREATE DATABASE IF NOT EXISTS `Ecommerce-Website` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `Ecommerce-Website`;

CREATE TABLE IF NOT EXISTS users (
  'user_id' INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  'first_name' NVARCHAR(255) NOT NULL,
  'last_name' NVARCHAR(255) NOT NULL,
  'username' NVARCHAR(50) NOT NULL UNIQUE,
  'email' NVARCHAR(100) NOT NULL UNIQUE,
  'password' NVARCHAR(255) NOT NULL,
  'address' NVARCHAR(255),
  'phone' VARCHAR(20),
  'role' ENUM('user', 'admin', 'master') DEFAULT 'user',
  'is_active' BOOLEAN DEFAULT TRUE,
  'created_at' TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  'updated_at' TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS categories (
  'category_id' INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  'category_name' NVARCHAR(100) NOT NULL,
  'created_at' TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  'updated_at' TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS product_colors (
  'color_id' INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  'color_name' VARCHAR(50) NOT NULL,
  'created_at' TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  'updated_at' TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS product_sizes (
  'size_id' INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  'size_name' VARCHAR(20) NOT NULL,
  -- 'standardized_size' VARCHAR(20),
  'created_at' TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  'updated_at' TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS product_images (
  'image_id' INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  'product_id' INT UNSIGNED NOT NULL,
  'image_path' VARCHAR(255) NOT NULL,
  -- 'is_main_image' BOOLEAN DEFAULT FALSE,
  'created_at' TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  'updated_at' TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY ('product_id') REFERENCES products('product_id')
);

CREATE TABLE IF NOT EXISTS product_amount (
  'product_id' INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  'amount' INT NOT NULL,
  'created_at' TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  'updated_at' TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)

-- Products Table
CREATE TABLE IF NOT EXISTS products (
  'product_id' INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  'name' VARCHAR(100) NOT NULL,
  'category_id' INT UNSIGNED NOT NULL,
  'price' DECIMAL(10, 2) NOT NULL,
  'quantity' INT UNSIGNED DEFAULT 0,
  'color_id' INT UNSIGNED,
  'size_id' INT UNSIGNED,
  'image' VARCHAR(255) NOT NULL,
  'created_at' TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  'updated_at' TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY ('category_id') REFERENCES categories('category_id'),
  FOREIGN KEY ('color_id') REFERENCES product_colors('color_id'),
  FOREIGN KEY ('size_id') REFERENCES product_sizes('size_id');
);

CREATE TABLE IF NOT EXISTS cart (
  'cart_id' INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  'user_id' INT UNSIGNED NOT NULL,
  'product_id' INT UNSIGNED NOT NULL,
  'quantity' INT UNSIGNED NOT NULL,
  'date_added' TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  'created_at' TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  'updated_at' TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY ('user_id') REFERENCES users('user_id'),
  FOREIGN KEY ('product_id') REFERENCES products('product_id')
);

-- Orders Table
CREATE TABLE IF NOT EXISTS orders (
  'order_id' INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  'user_id' INT UNSIGNED NOT NULL,
  'product_id' INT UNSIGNED NOT NULL,
  'username' INT UNSIGNED NOT NULL,
  'order_date' TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  'total_amount' DECIMAL(10, 2) NOT NULL,
  'created_at' TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  'updated_at' TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY ('user_id') REFERENCES users('user_id'),
  FOREIGN KEY ('username') REFERENCES users('username'),
  FOREIGN KEY ('product_id') REFERENCES products('product_id')
);

-- Order Details Table
CREATE TABLE IF NOT EXISTS order_details (
  'order_detail_id' INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  'order_id' INT UNSIGNED NOT NULL,
  'product_id' INT UNSIGNED NOT NULL,
  'quantity' INT UNSIGNED NOT NULL,
  'price' DECIMAL(10, 2) NOT NULL,
  'total_amount' INT UNSIGNED NOT NULL,
  'total_price' DECIMAL (10, 2) NOT NULL, 
  'status' INT DEFAULT 0,
  'created_at' TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  'updated_at' TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY ('order_id') REFERENCES orders('order_id'),
  FOREIGN KEY ('product_id') REFERENCES products('product_id')
);

INSERT INTO categories VALUES
('1', 'T-Shirt'),
('2', 'Shirt'),
('3', 'Pants'),
('4', 'Shoes')

INSERT INTO product_colors
('1', 'Red'),
('2', 'Blue'),
('3', 'Green'),
('4', 'Yellow'),
('5', 'White'),
('6', 'Black'),
('7', 'Pink')

INSERT INTO product_sizes
('1', 'S'),
('2', 'M'),
('3', 'L'),
('4', 'XL'),
('5', '2XL'),
('6', '3XL')

INSERT INTO products VALUES
('1', 'T-Shirt Summer 1', '1', '40', '5', '1', '2', 'img/products/f1.jpg'),
('2', 'T-Shirt Summer 2', '1', '45', '10', '1', '1', 'img/products/f2.jpg'),
('3', 'T-Shirt Summer 3', '1', '50', '15', '1', '3', 'img/products/f3.jpg'),
('4', 'T-Shirt Spring', '1', '55', '10', '2', '3', 'img/products/f4.jpg'),
('5', 'T-Shirt Fall', '1', '40', '8', '1', '2', 'img/products/f5.jpg'),
('6', 'Shirt', '2', '30', '12', '1', '1', 'img/products/f6.jpg'),
('7', 'Summer Shorts', '3', '70', '20', '5', '5', 'img/products/f7.jpg'),
('8', 'Skirt', '3', '60', '20', '7', '3', 'img/products/f8.jpg'),
('9', 'Formal Shirt', '2', '50', '10', '2', '4', 'img/products/n1.jpg'),
('10', 'Grey Shirt', '2', '45', '15', '2', '3', 'img/products/n2.jpg'),
('11', 'White Shirt', '2', '120', '30', '5', '4', 'img/products/n3.jpg'),
('12', 'Tank Top', '2', '25', '25', '5', '3', 'img/products/n4.jpg'),
('13', 'Office Shirt', '2', '35', '30', '6', '3', 'img/products/n5.jpg'),
('14', 'Short for men', '3', '40', '20', '3', '4', 'img/products/n6.jpg'),
('15', 'Beige button-up shirt', '2', '20', '10', '1', '1', 'img/products/n7.jpg'),
('16', 'Black Shirt', '2', '25', '15', '6', '5', 'img/products/n8.jpg'),
('17', 'Hem Blouse', '3', '35', '30', '6', '3', 'img/products/n9.jpg'),
('18', 'Fashion Shirt', '2', '50', '45', '5', '3', 'img/products/n10.jpg'),
('19', 'Sport pants', '3', '25', '15', '6', '6', 'img/products/n11.jpg'),
('20', 'White Shirt Couple', '3', '130', '30', '5', '4', 'img/products/n12.jpg'),
('21', 'Maticevski', '3', '45', '65', '5', '4', 'img/products/n13.jpg'),
('22', 'Maticevski-Black', '3', '50', '75', '6', '3', 'img/products/n14.jpg'),
('23', 'Jean Cassual', '3', '70', '20', '2', '5', 'img/products/n15.jpg'),
('24', 'Fashion Jeans', '3', '75', '25', '2', '4', 'img/products/n16.jpg'),
('25', 'Maticevski Fashion for Women', '3', '80', '20', '5', '2', 'img/products/n17.jpg'),
('26', 'Fashion Jean Black', '3', '90', '30', '6', '6', 'img/products/n18.jpg'),
('27', 'Cargo', '3', '70', '15', '6', '5', 'img/products/n19.jpg'),
('28', 'Cargo 2', '3', '70', '20', '2', '4', 'img/products/n20.jpg'),
('29', 'Wide-leg Pants 1', '3', '65', '30', '2', '1', 'img/products/n21.jpg'),
('30', 'Wide-leg Pants 2', '3', '65', '35', '6', '2', 'img/products/n22.jpg'),
('31', 'Flare Pants', '3', '75', '30', '4', '3', 'img/products/n23.jpg'),
('32', 'Fashion Flare Pants', '3', '75', '30', '4', '3', 'img/products/n24.jpg'),
('33', 'Doll Shoes', '4', '95', '45', '6', '2', 'img/products/n25.jpg'),
('34', 'Boot', '4', '130', '10', '5', '5', 'img/products/n26.jpg'),
('35', 'Converse Shoes', '4', '100', '20', '5', '4', 'img/products/n27.jpg'),
('36', 'Dolce & Dabbana', '4', '120', '45', '6', '4', 'img/products/n28.jpg'),
('37', 'Dior', '4', '200', '50', '5', '5', 'img/products/n29.jpg'),
('38', 'Bottega Veneta For Men', '4', '80', '10', '5', '6', 'img/products/n30.jpg'),
('39', 'High Boots 1', '4', '75', '40', '6', '4', 'img/products/n31.jpg'),
('40', 'High Boots 2', '4', '75', '25', '4', '4', 'img/products/n32.jpg'),
('41', 'Mango Flatform Leather Sandals', '4', '40', '200', '6', '2', 'img/products/n33.jpg'),
('42', 'Flip-flops', '4', '30', '60', '5', '1', 'img/products/n34.jpg'),
('43', 'Nike Benassi', '4', '50', '55', '6', '3', 'img/products/n35.jpg'),
('44', 'Crocs', '4', '20', '30', '5', '3', 'img/products/n36.jpg'),
('45', 'Flip-flops Summer', '4', '25', '40', '7', '2', 'img/products/n37.jpg'),
('46', 'Havaianas Basic', '4', '15', '100', '5', '4', 'img/products/n38.jpg'),
('47', 'Martin Boots', '4', '55', '30', '5', '4', 'img/products/n39.jpg'),
('48', 'Sport Adidas', '4', '60', '120', '6', '3', 'img/products/n40.jpg')


-- Coupons Table
-- CREATE TABLE IF NOT EXISTS coupons (
--   coupon_id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
--   coupon_code VARCHAR(20) NOT NULL UNIQUE,
--   discount DECIMAL(5, 2) NOT NULL,
--   start_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
--   expiration_date TIMESTAMP,
--   'created_at' TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
--   'updated_at' TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
--   INDEX(coupon_code),
--   CHECK (
--       discount >= 0
--       AND discount <= 100
--   ),
--   CHECK (
--       start_date <= expiration_date
--       OR expiration_date IS NULL
--   )
-- );