-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2020 at 09:45 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `item_id`, `quantity`, `price`) VALUES
(20, 1, 11, 6, 90),
(21, 1, 10, 2, 220);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `img_id` int(11) NOT NULL,
  `img_name` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`img_id`, `img_name`) VALUES
(1, 'image1.jpg'),
(10, 'image10.jpg'),
(11, 'image11.jpg'),
(12, 'image12.jpg'),
(13, 'image13.jpg'),
(14, 'image14.jpg'),
(15, 'image15.jpg'),
(16, 'image16.jpg'),
(17, 'image17.jpg'),
(18, 'image18.jpg'),
(19, 'image19.jpg'),
(2, 'image2.jpg'),
(20, 'image20.jpg'),
(21, 'image21.jpg'),
(22, 'image22.jpg'),
(23, 'image23.jpg'),
(24, 'image24.jpg'),
(25, 'image25.jpg'),
(26, 'image26.jpg'),
(27, 'image27.jpg'),
(28, 'image28.jpg'),
(29, 'image29.jpg'),
(3, 'image3.jpg'),
(30, 'image30.jpg'),
(31, 'image31.jpg'),
(32, 'image32.jpg'),
(33, 'image33.jpg'),
(34, 'image34.jpg'),
(35, 'image35.jpg'),
(36, 'image36.jpg'),
(37, 'image37.jpg'),
(38, 'image38.jpg'),
(39, 'image39.jpg'),
(4, 'image4.jpg'),
(40, 'image40.jpg'),
(41, 'image41.jpg'),
(42, 'image42.jpg'),
(43, 'image43.jpg'),
(5, 'image5.jpg'),
(6, 'image6.jpg'),
(7, 'image7.jpg'),
(8, 'image8.jpg'),
(9, 'image9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `images_of_items`
--

CREATE TABLE `images_of_items` (
  `img_no` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `img_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images_of_items`
--

INSERT INTO `images_of_items` (`img_no`, `item_id`, `img_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6),
(7, 7, 7),
(8, 8, 8),
(9, 9, 9),
(10, 10, 10),
(11, 11, 11),
(12, 12, 12),
(13, 13, 13),
(14, 14, 14),
(15, 15, 15),
(16, 1, 16),
(17, 2, 17),
(18, 2, 18),
(19, 3, 19),
(20, 3, 20),
(21, 3, 21),
(22, 4, 22),
(23, 4, 23),
(24, 4, 24),
(25, 4, 25),
(26, 5, 26),
(27, 5, 27),
(28, 6, 28),
(29, 6, 29),
(30, 7, 30),
(31, 7, 31),
(32, 8, 32),
(33, 8, 33),
(34, 9, 34),
(35, 9, 35),
(36, 10, 36),
(37, 11, 37),
(38, 12, 38),
(39, 12, 39),
(40, 13, 40),
(41, 13, 41),
(42, 15, 42),
(43, 15, 43);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `img_id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `company` text DEFAULT NULL,
  `colour` text DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `tag_id`, `img_id`, `name`, `company`, `colour`, `price`) VALUES
(1, 1, 1, 'Denim Shirt Men Slim Fit Jeans Shirt Fashion Long Sleeve Cowboy Stylish Smart Shirts Wash Tops Camisa Masculina', 'Denim', 'Grey and Black', 9),
(2, 1, 2, 'Cotton Fancy Casual Shirt For Men\n', 'Roadster', 'Blue, Light Blue and White', 8),
(3, 1, 3, '100% COTTON GRADIENT BLUE JEANS SHIRT MEN FASHION UNIQUE PERSONALITY DENIM SHIRT MEN SPRING LONG SHIRTS MENS CAMISA MASCULINA', 'Denim', 'Blue', 23),
(4, 2, 4, 'Faded Casual Wear and Formal Wear Men Ankle Length Jeans', 'Stylox', 'Blue', 11),
(5, 2, 5, 'American Noti Maroon Jeans for Men - Stretchable Denims for Men - Slim fit Jeans Men - Denim Jeans for Men', 'Denim', 'Red', 13),
(6, 2, 6, 'Slim Straight Dark Wash Hyper Stretch Jeans', 'Levis', 'Black', 14),
(7, 3, 7, 'Revolution 5 Running Shoes For Men', 'Nike', 'Black', 12),
(8, 3, 8, '12CM Elevator Shoes High Heel Men Dress Shoes That Give You Height 4.72 Inches', 'Bata', 'Black', 9),
(9, 3, 9, 'Cosco Running Shoes For Men', 'Cosco', 'Blue', 10),
(10, 4, 10, 'American Tourister Luggage Travel Bag ', 'American Tourister', 'Black', 110),
(11, 4, 11, 'Textured Duffle Travel Bag', 'Puma', 'Black', 15),
(12, 4, 12, 'Adidas Medium Red Nylon Gym Bag Men', 'Adidas', 'Red', 14),
(13, 5, 13, 'MENS COTTON LIGHT BLUE TROUSER', 'Everlane', 'Blue', 8),
(14, 5, 14, 'Allen Solly Blue Trousers ', 'Allen Solly', 'Blue', 7),
(15, 5, 15, 'Mid-Rise Slim Fit Trousers', 'US Polo', 'Grey', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_name`) VALUES
(4, 'bag'),
(2, 'jeans'),
(1, 'shirt'),
(3, 'shoes'),
(5, 'trousers');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`) VALUES
(1, 'Rishav', 'rishav@gmail.com', '1a52e17fa899cf40fb04cfc42e6352f1'),
(2, 'Saurav', 'saurav@gmail.com', '1a52e17fa899cf40fb04cfc42e6352f1'),
(7, 'keshav', 'keshav@gmail.com', 'd0414c81aebf2933f0afda283a36c680'),
(8, 'vishnu', 'vs@gmail.com', '39c6bc847b8a0f5107591833e011cebf'),
(9, 'vishal', 'vishal@iitk.ac.in', 'd526f29b744df2c54e1bed48682af056');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wish_no` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wish_no`, `user_id`, `item_id`) VALUES
(10, 7, 12),
(12, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `img_name` (`img_name`);

--
-- Indexes for table `images_of_items`
--
ALTER TABLE `images_of_items`
  ADD PRIMARY KEY (`img_no`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `img_id` (`img_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `profile_ibfk_2` (`tag_id`),
  ADD KEY `img_id` (`img_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`),
  ADD KEY `tag_name` (`tag_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `email` (`email`),
  ADD KEY `password` (`password`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wish_no`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `images_of_items`
--
ALTER TABLE `images_of_items`
  MODIFY `img_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wish_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images_of_items`
--
ALTER TABLE `images_of_items`
  ADD CONSTRAINT `images_of_items_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `images_of_items_ibfk_2` FOREIGN KEY (`img_id`) REFERENCES `images` (`img_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`img_id`) REFERENCES `images` (`img_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profile_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
