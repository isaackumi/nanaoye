-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 15, 2020 at 03:55 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppn`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(8, 'Laptop'),
(26, 'Headphones'),
(28, 'Electronics'),
(31, 'kumi brand'),
(32, 'Phones');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(11) NOT NULL,
  `ip_add` varchar(50) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(16, 'iTel'),
(18, 'Samsung'),
(19, 'Blackberry');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_pass` varchar(150) NOT NULL,
  `customer_country` varchar(30) NOT NULL,
  `customer_city` varchar(30) NOT NULL,
  `customer_contact` varchar(15) NOT NULL,
  `customer_image` varchar(100) DEFAULT NULL,
  `user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_image`, `user_role`) VALUES
(1, 'err234', '', '$2y$10$7M2wSGaO.7KuuaOoRZfHi.MO2/RlqtzwLo3LijjxyCKT46Aw1F9zu', '', '', '', NULL, 0),
(3, 'Nana', 'nana@gmail.com', '$2y$10$gaEbIIarPVFZix8snGcsA.eE9ZSYGYmkMuRow/McRs6v0uyzmQosO', '', '', '', NULL, 0),
(6, 'Isaac Kumi', 'is@gmail.com', '$2y$10$i7YJqX97Ar7J2TA5H4ycYuGIvTPV5qNPfWPh/QwkRJni86em3KLIq', '', '', '', NULL, 0),
(7, 'a', 'iy@gmail.com', '$2y$10$eXDJg.MC7l0zAMdVyUUtbu6A48JnDTEvec6esso4bonDBxO0mRAri', 'Ghana', 'central', '0548769251', NULL, 0),
(8, 'test user', 'test@test.com', '$2y$10$moSfcTzKW6jgnub3cCVNsOcYNU7kIchnB9CYqkdrFpDMlhJWt7d7y', 'Ghana', 'central', '0548769251', NULL, 0),
(9, 'Isaac Kumi', 'tst@gmail.com', '$2y$10$pNPmBQEZ.reS8L6haK/2i.S9Bo2aLx7h2icHKPblidT/IH4XtpEIm', 'Ghana', 'central', '0548769251', NULL, 0),
(11, 'wree', 'wef@gmail.com', '$2y$10$zAWtRcyqyZnsFmT6xh547eVXKO5mvMbSVSpVTU4EGhpAX43Sy91k6', 'Ghana', 'central', '0548769251', NULL, 0),
(14, 'Isaac Kumi', 'iyzekkummy29@gmail.com', '$2y$10$WsnXikD3CokkN.XU/6OHH.g7WJM/skekb/vhtsvSdWwKHDBiwV6je', 'Ghana', 'central', '0548769251', NULL, 0),
(19, 'Isaac Kumi', 'iyzekkumy29@gmail.com', '$2y$10$sfetv663F3dOA3Zof2mX4OYKhVU2k9fD5gOM8T7t4uNqaBpKWl4uK', 'Ghana', 'central', '0548769251', NULL, 0),
(27, 'frez', 'yfrs@gmail.com', '$2y$10$j.sBkkI3diwcBqsxjm2ineS07KKztQu0N9HnxhGPmRAMx3iMof3ly', 'Ghana', 'central', '0548769251', NULL, 0),
(28, 'Isaac Kumi', 'iyzekkummy229@gmail.com', '$2y$10$1OA4ybOn4iRK0Ak2NXHLDO4wvx6mLv0CcKy9gz9s48tnbYJxWxWfq', 'Ghana', 'central', '0548769251', NULL, 0),
(30, 'Isaac Kumi', 'iyzekkummy329@gmail.com', '$2y$10$mY9//5IUY0cWvQGY2k/t9.vBTY1s49KIhxrlZE7KeDXSQfE3YJrNS', 'Ghana', 'central', '0548769251', NULL, 0),
(31, 'Isaac Kumi', 'admin@admin.com', '$2y$10$NaPi8LBdMot8wEohDMVTne78n62IcHP2iqYpki.kJ8z3y0nqceYgG', 'Ghana', 'central', '0548769251', NULL, 1),
(32, 'Admin Admin', 'me@me.com', '$2y$10$BZt.lYjXrQSTWuFqP0vzSuuAZR4pNtY51KwPLkfp588MzQ2.PHiT2', 'Ghana', 'central', '0548769251', NULL, 1),
(35, 'vent', 'vcnt@gmail.com', '$2y$10$EDCimlfvxznqA1SWYA9k8eV7GfRZXLwsyIu/xIDFA70/Y.yXXYwb6', 'Ghana', 'BR', '0548769251', NULL, 1),
(36, 'hey', 'hey@hey.com', '$2y$10$.inPa24IMq1OR5ZE6x4ST.IaeMEblr0fQ4Y/Zsb8r0.yEwa/LY0F2', 'gh', '234567uytrew', '12345678', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `invoice_no`, `order_date`, `order_status`) VALUES
(1, 14, 1956904336, '2020-11-30', 'paid'),
(2, 14, 1856006716, '2020-11-30', 'paid'),
(3, 14, 132400480, '2020-11-30', 'paid'),
(4, 14, 585914798, '2020-11-30', 'paid'),
(5, 14, 2042592145, '2020-11-30', 'paid'),
(6, 14, 1333392565, '2020-11-30', 'paid'),
(7, 14, 1982141494, '2020-12-15', 'paid'),
(8, 14, 1422823702, '2020-12-15', 'paid'),
(9, 14, 246129925, '2020-12-15', 'paid'),
(10, 14, 2103085250, '2020-12-15', 'paid'),
(11, 14, 1342326359, '2020-12-15', 'paid'),
(12, 14, 2005729903, '2020-12-15', 'paid'),
(13, 14, 210010059, '2020-12-15', 'paid'),
(14, 14, 1350527818, '2020-12-15', 'paid'),
(15, 14, 673336874, '2020-12-15', 'paid'),
(16, 14, 1832493798, '2020-12-15', 'paid'),
(17, 14, 1309909510, '2020-12-15', 'paid'),
(18, 14, 337705969, '2020-12-15', 'paid'),
(19, 14, 387807642, '2020-12-15', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `amt` double NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `currency` text NOT NULL,
  `payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_cat` int(11) NOT NULL,
  `product_brand` int(11) NOT NULL,
  `product_title` varchar(200) NOT NULL,
  `product_price` double NOT NULL,
  `product_desc` varchar(500) DEFAULT NULL,
  `product_image` varchar(100) DEFAULT NULL,
  `product_keywords` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(49, 18, 28, 'African dwarf', 380, 'Pastured grazed goat age 2 years male goat highly scented ', './images/1.jpg', NULL),
(51, 16, 28, 'Scape Goat', 490, 'Pastured grazed goat age 2 years female, rich is goat milk.', './images/2.jpg', NULL),
(52, 16, 8, 'Ramsey', 700, '    Pastured grazed goat age 3 years. Has good fat and milk can be used for ', './images/3.jpg', NULL),
(53, 16, 8, 'Mountain Goat', 800, 'Pastured grazed goat age 3 years male goat highly scented ', './images/7.jpg', NULL),
(54, 16, 8, 'Sokoto Red', 750, '              Pastured grazed goat age 1.5 years male goat highly scented ', './images/9.jpg', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `p_id` (`p_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customer_email` (`customer_email`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `product_cat` (`product_cat`),
  ADD KEY `product_brand` (`product_brand`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_cat`) REFERENCES `categories` (`cat_id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`product_brand`) REFERENCES `brands` (`brand_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
