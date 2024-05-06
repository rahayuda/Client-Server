-- Table cart
CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `status` enum('purchased','pending') NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `fk_cart_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
);

-- Trigger calculate_total
DELIMITER $$
CREATE TRIGGER `calculate_total` BEFORE INSERT ON `cart` FOR EACH ROW BEGIN
    DECLARE product_price DECIMAL(10, 2);
    SELECT price INTO product_price FROM product WHERE id = NEW.product_id;
    SET NEW.total = NEW.quantity * product_price;
END;
$$
DELIMITER ;

-- Table product
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `product` (`id`, `name`, `category`, `stock`, `price`, `image`) VALUES
(1, 'Laptop', 'Electronics', 10, 5000000.00, 'image/product.png'),
(2, 'Pencil', 'Stationery', 50, 5000.00, 'image/product.png'),
(3, 'Mouse', 'Electronics', 20, 200000.00, 'image/product.png'),
(4, 'Book', 'Stationery', 30, 25000.00, 'image/product.png'),
(5, 'Soda Drink', 'Beverage', 15, 15000.00, 'image/product.png'),
(6, 'Printer', 'Electronics', 5, 1000000.00, 'image/product.png'),
(7, 'Camera', 'Electronics', 8, 3000000.00, 'image/product.png'),
(8, 'Pen', 'Stationery', 40, 2000.00, 'image/product.png'),
(9, 'Speaker', 'Electronics', 12, 150000.00, 'image/product.png'),
(10, 'Notebook', 'Stationery', 25, 10000.00, 'image/product.png'),
(11, 'Mineral Water', 'Beverage', 20, 5000.00, 'image/product.png'),
(12, 'Smartphone', 'Electronics', 15, 2000000.00, 'image/product.png');
