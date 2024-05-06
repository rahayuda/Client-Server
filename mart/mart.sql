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
