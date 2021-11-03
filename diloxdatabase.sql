-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.24 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for dilox
CREATE DATABASE IF NOT EXISTS `dilox` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `dilox`;

-- Dumping structure for table dilox.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(50) NOT NULL DEFAULT '',
  `verification` varchar(45) DEFAULT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table dilox.admin: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`email`, `verification`, `fname`, `lname`) VALUES
	('vinulgajaman2001@gmail.com', '618227a2360ab', 'Vinul', 'Gajaman');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table dilox.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `qty` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cart_product1_idx` (`product_id`),
  KEY `fk_cart_user1_idx` (`user_email`),
  CONSTRAINT `fk_cart_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_cart_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table dilox.cart: ~1 rows (approximately)
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;

-- Dumping structure for table dilox.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table dilox.category: ~3 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `name`) VALUES
	(1, 'Tops'),
	(2, 'Dresses'),
	(3, 'Pants');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table dilox.chat
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `from` varchar(50) NOT NULL,
  `to` varchar(50) NOT NULL,
  `content` text,
  `date` datetime DEFAULT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_chat_user1_idx` (`from`),
  KEY `fk_chat_user2_idx` (`to`),
  KEY `fk_chat_status1_idx` (`status`),
  CONSTRAINT `fk_chat_status1` FOREIGN KEY (`status`) REFERENCES `status` (`id`),
  CONSTRAINT `fk_chat_user1` FOREIGN KEY (`from`) REFERENCES `user` (`email`),
  CONSTRAINT `fk_chat_user2` FOREIGN KEY (`to`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table dilox.chat: ~0 rows (approximately)
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;

-- Dumping structure for table dilox.city
CREATE TABLE IF NOT EXISTS `city` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `district_id` int NOT NULL,
  `postal_code` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_city_district1_idx` (`district_id`),
  CONSTRAINT `fk_city_district1` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table dilox.city: ~4 rows (approximately)
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` (`id`, `name`, `district_id`, `postal_code`) VALUES
	(1, 'Mattakkuliya', 1, '01500'),
	(8, 'Kotikawatta', 1, '01500'),
	(9, 'Nugegoda', 1, '01500'),
	(10, 'Kotikawatta', 1, '13020');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;

-- Dumping structure for table dilox.district
CREATE TABLE IF NOT EXISTS `district` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `province_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_district_province1_idx` (`province_id`),
  CONSTRAINT `fk_district_province1` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table dilox.district: ~25 rows (approximately)
/*!40000 ALTER TABLE `district` DISABLE KEYS */;
INSERT INTO `district` (`id`, `name`, `province_id`) VALUES
	(1, 'Colombo', 1),
	(2, 'Ampara', 5),
	(3, 'Anuradhapura', 8),
	(4, 'Badulla', 6),
	(5, 'Batticaloa', 5),
	(6, 'Galle', 2),
	(7, 'Gampaha', 1),
	(8, 'Hambantota', 2),
	(9, 'Jaffna', 3),
	(10, 'Kalutara', 1),
	(11, 'Kandy', 4),
	(12, 'Kegalle', 7),
	(13, 'Kilinochchi', 3),
	(14, 'Kurunegala', 9),
	(15, 'Mannar', 3),
	(16, 'Matale', 4),
	(17, 'Matara', 2),
	(18, 'Monaragala', 6),
	(19, 'Mullaitivu', 3),
	(20, 'Nuwara Eliya', 4),
	(21, 'Polonnaruwa', 8),
	(22, 'Puttalam', 9),
	(23, 'Ratnapura', 7),
	(24, 'Trincomalee', 5),
	(25, 'Vavuniya', 3);
/*!40000 ALTER TABLE `district` ENABLE KEYS */;

-- Dumping structure for table dilox.feedback
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(50) NOT NULL,
  `product_id` int NOT NULL,
  `feed` text,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_feedback_user1_idx` (`user_email`),
  KEY `fk_feedback_product1_idx` (`product_id`),
  CONSTRAINT `fk_feedback_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_feedback_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table dilox.feedback: ~0 rows (approximately)
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;

-- Dumping structure for table dilox.gender
CREATE TABLE IF NOT EXISTS `gender` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table dilox.gender: ~2 rows (approximately)
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;
INSERT INTO `gender` (`id`, `name`) VALUES
	(1, 'male'),
	(2, 'female');
/*!40000 ALTER TABLE `gender` ENABLE KEYS */;

-- Dumping structure for table dilox.images
CREATE TABLE IF NOT EXISTS `images` (
  `code` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`code`),
  KEY `fk_images_product1_idx` (`product_id`),
  CONSTRAINT `fk_images_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table dilox.images: ~44 rows (approximately)
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` (`code`, `product_id`) VALUES
	('resourses//product//61817d4e42ff8.jpeg', 93),
	('resourses//product//61817d4e4596b.jpeg', 93),
	('resourses//product//61817d4e4665b.jpeg', 93),
	('resourses//product//61817de735332.jpeg', 94),
	('resourses//product//61817de7363f7.jpeg', 94),
	('resourses//product//61817de7375d9.jpeg', 94),
	('resourses//product//61817f426f758.jpeg', 95),
	('resourses//product//61817f4270d4f.jpeg', 95),
	('resourses//product//61817f4271daa.jpeg', 95),
	('resourses//product//61817fdfcd95c.jpeg', 96),
	('resourses//product//61817fdfceb1a.jpeg', 96),
	('resourses//product//61817fdfcf8c8.jpeg', 96),
	('resourses//product//618180d88a6d8.jpeg', 97),
	('resourses//product//618180d88cb93.jpeg', 97),
	('resourses//product//618180d88e286.jpeg', 97),
	('resourses//product//618183fc63486.jpeg', 98),
	('resourses//product//618183fc64ec6.jpeg', 98),
	('resourses//product//618183fc66f6f.jpeg', 98),
	('resourses//product//61818494f1224.jpeg', 99),
	('resourses//product//61818494f25ba.jpeg', 99),
	('resourses//product//6181849500244.jpeg', 99),
	('resourses//product//618184fcc8a30.jpeg', 100),
	('resourses//product//618184fccaa97.jpeg', 100),
	('resourses//product//618184fccc17a.jpeg', 100),
	('resourses//product//618186c09acb6.jpeg', 101),
	('resourses//product//618186c09d4a9.jpeg', 101),
	('resourses//product//6181876fb57b2.jpeg', 102),
	('resourses//product//6181876fb812d.jpeg', 102),
	('resourses//product//618187c8de3f1.jpeg', 103),
	('resourses//product//618187c8dff6c.jpeg', 103),
	('resourses//product//618188bb52706.jpeg', 104),
	('resourses//product//618188bb55193.jpeg', 104),
	('resourses//product//618188bb5629a.jpeg', 104),
	('resourses//product//618189aed277e.jpeg', 105),
	('resourses//product//618189aed57bb.jpeg', 105),
	('resourses//product//618189aed7ad4.jpeg', 105),
	('resourses//product//61818a234863b.jpeg', 106),
	('resourses//product//61818a234b048.jpeg', 106),
	('resourses//product//61818bec5c88e.jpeg', 107),
	('resourses//product//61818bec624b7.jpeg', 107),
	('resourses//product//61818bec632ea.jpeg', 107),
	('resourses//product//61818d2a0b710.jpeg', 108),
	('resourses//product//61818d2a0ca02.jpeg', 108),
	('resourses//product//61818d2a1036a.jpeg', 108);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;

-- Dumping structure for table dilox.invoice
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` varchar(50) DEFAULT NULL,
  `product_id` int NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `date` datetime DEFAULT NULL,
  `total` double DEFAULT NULL,
  `qty` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_invoice_product1_idx` (`product_id`),
  KEY `fk_invoice_user1_idx` (`user_email`),
  CONSTRAINT `fk_invoice_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_invoice_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table dilox.invoice: ~0 rows (approximately)
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;

-- Dumping structure for table dilox.invoice_item
CREATE TABLE IF NOT EXISTS `invoice_item` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `invoice_id` int NOT NULL,
  `qty` varchar(45) DEFAULT NULL,
  `unit_price` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_invoice_item_product1_idx` (`product_id`),
  KEY `fk_invoice_item_invoice1_idx` (`invoice_id`),
  CONSTRAINT `fk_invoice_item_invoice1` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`),
  CONSTRAINT `fk_invoice_item_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table dilox.invoice_item: ~0 rows (approximately)
/*!40000 ALTER TABLE `invoice_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `invoice_item` ENABLE KEYS */;

-- Dumping structure for table dilox.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `delivery_fee` double DEFAULT NULL,
  `description` text,
  `status_id` int NOT NULL,
  `datetime_added` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_category1_idx` (`category_id`),
  KEY `fk_product_status1_idx` (`status_id`),
  CONSTRAINT `fk_product_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `fk_product_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table dilox.product: ~16 rows (approximately)
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` (`id`, `category_id`, `title`, `price`, `delivery_fee`, `description`, `status_id`, `datetime_added`) VALUES
	(93, 1, 'LAYERED TOP WITH SLEEVE - SLIM FIT', 1880, 400, 'Material: Linen\r\n\r\nWash & Care: Machine wash, Cold water:: Wash inside out:: Dark colors separately\r\nNote: Product color may slightly vary due to photographic lighting sources or your monitor settings.', 2, '2021-11-02 23:32:54'),
	(94, 1, 'LONG SLEEVE BELTED BLOUSE - SLIM FIT', 2250, 400, 'Material: Cotton\r\n\r\n\r\nWash & Care: Machine wash, Cold water:: Wash inside out:: Dark colors separately\r\nNote: Product color may slightly vary due to photographic lighting sources or your monitor settings.', 1, '2021-11-02 23:35:27'),
	(95, 1, 'TWO TONE DETAILED TOP - SLIM FIT', 2350, 400, 'Material: Linen\r\n\r\n\r\n\r\nWash & Care: Machine wash, Cold water:: Wash inside out:: Dark colors separately\r\nNote: Product color may slightly vary due to photographic lighting sources or your monitor settings.', 1, '2021-11-02 23:41:14'),
	(96, 1, 'BELT DETAILED TOP - SLIM FIT', 2100, 400, 'Material: Linen\r\n\r\nWash & Care: Machine wash, Cold water:: Wash inside out:: Dark colors separately\r\nNote: Product color may slightly vary due to photographic lighting sources or your monitor settings.', 1, '2021-11-02 23:43:51'),
	(97, 1, 'CONTRAST DETAILED TOP - SLIM FIT', 2350, 400, 'Material: Cotton\r\n\r\nWash & Care: Machine wash, Cold water:: Wash inside out:: Dark colors separately\r\nNote: Product color may slightly vary due to photographic lighting sources or your monitor settings.', 1, '2021-11-02 23:48:00'),
	(98, 1, 'PRINTED TOP WITH TIE KNOT - SLIM FIT', 2450, 400, 'Material: Cotton\r\nFabric : Polyester \r\nType : Smart Casual \r\n\r\nWash & Care: Machine wash, Cold water:: Wash inside out:: Dark colors separately\r\nNote: Product color may slightly vary due to photographic lighting sources or your monitor settings.', 1, '2021-11-03 00:01:24'),
	(99, 1, 'SLEEVE TIE DETAIL TOP - REGULAR FIT', 2450, 400, 'Material: Linen\r\nFabric : Polyester \r\nType : Smart Casual \r\n\r\nWash & Care: Machine wash, Cold water:: Wash inside out:: Dark colors separately\r\nNote: Product color may slightly vary due to photographic lighting sources or your monitor settings.', 1, '2021-11-03 00:03:56'),
	(100, 1, 'CUT OUT SHOULDER TOP - REGULAR FIT', 2600, 400, 'Material: Linen\r\nFabric : Polyester\r\nType : Smart Casual \r\n\r\nWash & Care: Machine wash, Cold water:: Wash inside out:: Dark colors separately\r\nNote: Product color may slightly vary due to photographic lighting sources or your monitor settings.', 1, '2021-11-03 00:05:40'),
	(101, 3, 'SOLID OFFICE PANTS - SLIM FIT', 2450, 400, 'Material: Cotton\r\nFabric : Polyester\r\nType : Smart Casual \r\n\r\nWash & Care: Machine wash, Cold water:: Wash inside out:: Dark colors separately\r\nNote: Product color may slightly vary due to photographic lighting sources or your monitor settings.', 1, '2021-11-03 00:13:12'),
	(102, 3, 'SOLID LINEN PANT - SLIM FIT', 2250, 400, 'Material: Linen\r\nFabric : Linen \r\nType : Holiday\r\n\r\nWash & Care: Machine wash, Cold water:: Wash inside out:: Dark colors separately\r\nNote: Product color may slightly vary due to photographic lighting sources or your monitor settings.', 1, '2021-11-03 00:16:07'),
	(103, 3, 'O-RING DETAIL FLARE LEG PANTS - REGULAR FIT', 2350, 400, 'Material: Linen\r\nFabric : Polyester \r\nType : Holiday\r\n\r\nWash & Care: Machine wash, Cold water:: Wash inside out:: Dark colors separately\r\nNote: Product color may slightly vary due to photographic lighting sources or your monitor settings.', 1, '2021-11-03 00:17:36'),
	(104, 3, 'SOLID TAPERED LEG PANTS - SLIM FIT', 2680, 400, 'Material: Linen\r\nFabric : Polyester \r\nType : Smart Casual\r\n \r\nWash & Care: Machine wash, Cold water:: Wash inside out:: Dark colors separately\r\nNote: Product color may slightly vary due to photographic lighting sources or your monitor settings.', 1, '2021-11-03 00:21:39'),
	(105, 3, 'TIE-WAIST PANTS - REGULAR FIT', 2650, 400, 'Material: Linen\r\nFabric : Polyester \r\nType : Holiday\r\n\r\nWash & Care: Machine wash, Cold water:: Wash inside out:: Dark colors separately\r\nNote: Product color may slightly vary due to photographic lighting sources or your monitor settings.', 1, '2021-11-03 00:25:42'),
	(106, 3, 'SOLID BLACK OFFICE PANTS - SLIM FIT', 2750, 400, 'Material: Linen\r\nFabric : Polyester \r\nType : Smart Casual \r\n\r\nWash & Care: Machine wash, Cold water:: Wash inside out:: Dark colors separately\r\nNote: Product color may slightly vary due to photographic lighting sources or your monitor settings.', 1, '2021-11-03 00:27:39'),
	(107, 2, 'STRIPE DETAIL DRESS - RELAXED FIT', 2680, 400, 'Material: Linen\r\nFabric : Polyester\r\nType : Smart Casual \r\n\r\nWash & Care: Machine wash, Cold water:: Wash inside out:: Dark colors separately\r\nNote: Product color may slightly vary due to photographic lighting sources or your monitor settings.', 1, '2021-11-03 00:35:16'),
	(108, 2, 'PRINTED FLORAL DRESS - SLIM FIT', 2900, 400, 'Material: Linen\r\nFabric : Polyester \r\nType : Holiday \r\n\r\nWash & Care: Machine wash, Cold water:: Wash inside out:: Dark colors separately\r\nNote: Product color may slightly vary due to photographic lighting sources or your monitor settings.', 1, '2021-11-03 00:40:34');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;

-- Dumping structure for table dilox.profile_img
CREATE TABLE IF NOT EXISTS `profile_img` (
  `code` varchar(100) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  PRIMARY KEY (`code`),
  KEY `fk_profile_img_user1_idx` (`user_email`),
  CONSTRAINT `fk_profile_img_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table dilox.profile_img: ~1 rows (approximately)
/*!40000 ALTER TABLE `profile_img` DISABLE KEYS */;
INSERT INTO `profile_img` (`code`, `user_email`) VALUES
	('resourses//profile_img//6182249f0fd04.jpeg', 'vinulgajaman2001@gmail.com');
/*!40000 ALTER TABLE `profile_img` ENABLE KEYS */;

-- Dumping structure for table dilox.province
CREATE TABLE IF NOT EXISTS `province` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table dilox.province: ~9 rows (approximately)
/*!40000 ALTER TABLE `province` DISABLE KEYS */;
INSERT INTO `province` (`id`, `name`) VALUES
	(1, 'Western'),
	(2, 'Southern'),
	(3, 'Northern'),
	(4, 'Central'),
	(5, 'Eastern'),
	(6, 'Uva'),
	(7, 'Sabaragamuwa'),
	(8, 'North Central'),
	(9, 'North Western');
/*!40000 ALTER TABLE `province` ENABLE KEYS */;

-- Dumping structure for table dilox.recent
CREATE TABLE IF NOT EXISTS `recent` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_recent_product1_idx` (`product_id`),
  KEY `fk_recent_user1_idx` (`user_email`),
  CONSTRAINT `fk_recent_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_recent_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table dilox.recent: ~0 rows (approximately)
/*!40000 ALTER TABLE `recent` DISABLE KEYS */;
INSERT INTO `recent` (`id`, `product_id`, `user_email`) VALUES
	(16, 97, 'vinulgajaman2001@gmail.com'),
	(17, 98, 'vinulgajaman2001@gmail.com'),
	(18, 99, 'vinulgajaman2001@gmail.com'),
	(19, 93, 'vinulgajaman2001@gmail.com'),
	(20, 102, 'vinulgajaman2001@gmail.com'),
	(21, 101, 'vinulgajaman2001@gmail.com'),
	(22, 103, 'vinulgajaman2001@gmail.com'),
	(23, 105, 'vinulgajaman2001@gmail.com'),
	(24, 107, 'vinulgajaman2001@gmail.com');
/*!40000 ALTER TABLE `recent` ENABLE KEYS */;

-- Dumping structure for table dilox.status
CREATE TABLE IF NOT EXISTS `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table dilox.status: ~2 rows (approximately)
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` (`id`, `name`) VALUES
	(1, 'Active'),
	(2, 'Deactive');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;

-- Dumping structure for table dilox.types
CREATE TABLE IF NOT EXISTS `types` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `color` varchar(45) DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `size` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_color_product1_idx` (`product_id`),
  CONSTRAINT `fk_color_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table dilox.types: ~32 rows (approximately)
/*!40000 ALTER TABLE `types` DISABLE KEYS */;
INSERT INTO `types` (`id`, `product_id`, `color`, `qty`, `size`) VALUES
	(35, 93, 'Blue', 10, 'S'),
	(36, 93, 'Blue', 18, 'L'),
	(37, 94, 'Pink', 10, 'S'),
	(38, 94, 'Pink', 8, 'L'),
	(39, 95, 'Blue', 10, 'S'),
	(40, 95, 'Red', 6, 'M'),
	(41, 96, 'Brown', 12, 'S'),
	(42, 96, 'Brown', 10, 'M'),
	(43, 97, 'Red', 10, 'S'),
	(44, 97, 'Red', 12, 'L'),
	(45, 98, 'Pink', 10, 'S'),
	(46, 98, 'Cream', 8, 'M'),
	(47, 99, 'Wheat', 12, 'S'),
	(48, 99, 'Wheat', 10, 'L'),
	(49, 100, 'Blue', 10, 'S'),
	(50, 100, 'Blue', 12, 'M'),
	(51, 101, 'Brown', 10, 'S'),
	(52, 101, 'Brown', 12, 'L'),
	(53, 102, 'Cream', 12, 'S'),
	(54, 102, 'Cream', 15, 'L'),
	(55, 103, 'Blue', 10, 'S'),
	(56, 103, 'Blue', 14, 'M'),
	(57, 104, 'Purple', 10, 'M'),
	(58, 104, 'Purple', 12, 'S'),
	(59, 105, 'Green', 10, 'M'),
	(60, 105, 'Green', 12, 'L'),
	(61, 106, 'Black', 10, 'S'),
	(62, 106, 'Black', 12, 'M'),
	(63, 107, 'Pink', 8, 'S'),
	(64, 107, 'Wheat', 10, 'S'),
	(65, 108, 'Blue', 20, 'S'),
	(66, 108, 'Blue', 10, 'M');
/*!40000 ALTER TABLE `types` ENABLE KEYS */;

-- Dumping structure for table dilox.user
CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(50) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `register_date` datetime DEFAULT NULL,
  `verification_code` varchar(20) DEFAULT NULL,
  `gender_id` int NOT NULL,
  `status_id` int NOT NULL,
  PRIMARY KEY (`email`),
  KEY `fk_user_gender_idx` (`gender_id`),
  KEY `fk_user_status1_idx` (`status_id`),
  CONSTRAINT `fk_user_gender` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`),
  CONSTRAINT `fk_user_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table dilox.user: ~1 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`email`, `fname`, `lname`, `password`, `mobile`, `register_date`, `verification_code`, `gender_id`, `status_id`) VALUES
	('vinulgajaman2001@gmail.com', 'Vinul', 'Gajaman ', 'vinul2001', '0710334443', '2021-08-27 23:42:00', '61817481af25c', 1, 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table dilox.user_has_address
CREATE TABLE IF NOT EXISTS `user_has_address` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(50) NOT NULL,
  `line1` text,
  `line2` text,
  `city_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_has_address_user1_idx` (`user_email`),
  KEY `fk_user_has_address_city1_idx` (`city_id`),
  CONSTRAINT `fk_user_has_address_city1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  CONSTRAINT `fk_user_has_address_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table dilox.user_has_address: ~1 rows (approximately)
/*!40000 ALTER TABLE `user_has_address` DISABLE KEYS */;
INSERT INTO `user_has_address` (`id`, `user_email`, `line1`, `line2`, `city_id`) VALUES
	(5, 'vinulgajaman2001@gmail.com', 'No.62', 'Elie House Lane', 1);
/*!40000 ALTER TABLE `user_has_address` ENABLE KEYS */;

-- Dumping structure for table dilox.watchlist
CREATE TABLE IF NOT EXISTS `watchlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_watchlist_product1_idx` (`product_id`),
  KEY `fk_watchlist_user1_idx` (`user_email`),
  CONSTRAINT `fk_watchlist_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_watchlist_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table dilox.watchlist: ~8 rows (approximately)
/*!40000 ALTER TABLE `watchlist` DISABLE KEYS */;
INSERT INTO `watchlist` (`id`, `product_id`, `user_email`) VALUES
	(133, 106, 'vinulgajaman2001@gmail.com'),
	(135, 104, 'vinulgajaman2001@gmail.com'),
	(137, 108, 'vinulgajaman2001@gmail.com');
/*!40000 ALTER TABLE `watchlist` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
