<?php

require("../assets/dbconn.php");
/**
 * Created by PhpStorm.
 * User: aaronhebert
 * Date: 5/26/18
 * Time: 2:43 PM
 */

//This is just for initially creating the table

$db = dbConn();

$query = "--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
`email` VARCHAR(150) NOT NULL UNIQUE KEY, 
`password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
`created` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`category_id` INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
`category` VARCHAR(150) NOT NULL UNIQUE KEY
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`product_id` INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
category_id INT UNSIGNED NOT NULL,
FOREIGN KEY (category_id) REFERENCES categories(category_id),
product VARCHAR(150) NOT NULL,
price FLOAT(10,2) NOT NULL,
image VARCHAR(100) DEFAULT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `address` varchar(535) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `order_total` float(10,2) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `shipping_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `price_paid` float(10,2) NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- END
--";

try{

$sql = $db->prepare($query);

$sql->execute();

return "Successfully created table";
} catch (PDOException $e) {
    print_r($sql->errorInfo());
    die("There was a problem creating table");

}