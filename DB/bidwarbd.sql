-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2017 at 05:27 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bidwarbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'bidwarbd', 'bidwarbd@info.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `product_category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `product_category`) VALUES
(1, 'books'),
(2, 'vehicle'),
(3, 'electronic'),
(4, 'furniture'),
(5, 'property'),
(6, 'sports');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
`id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` int(15) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `company_name`, `subject`, `message`) VALUES
(1, 'Shaon', 'a@gmail.com', 1521401595, 'Janani', 'asd', 'asasd\r\nasd\r\n\r\nasd\r\nas\r\ndasd');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_description` varchar(200) NOT NULL,
  `product_launch_date` datetime DEFAULT NULL,
  `product_end_date` datetime NOT NULL,
  `product_image` varchar(500) NOT NULL,
  `product_price` int(30) NOT NULL,
  `sold_date` date NOT NULL,
  `bid_winner_user_id` int(11) NOT NULL,
  `approved` varchar(15) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `user_id`, `product_name`, `product_description`, `product_launch_date`, `product_end_date`, `product_image`, `product_price`, `sold_date`, `bid_winner_user_id`, `approved`) VALUES
(11, 3, 1, 'philips monitor', 'best 5k monitor in world', '2017-10-09 05:24:00', '2017-10-10 23:59:00', 'IMG_20160729_200819.jpg', 19000, '0000-00-00', 0, '123'),
(12, 3, 1, 'micro oven', 'warrenty available, bought 10 days ago, still new, rarely used, selling because need money.', '2017-08-18 19:00:00', '2017-08-19 22:00:00', 'IMG_20160729_201033.jpg', 8000, '0000-00-00', 0, '321'),
(14, 4, 2, 'sofa', 'one antique sofa', '2017-11-10 00:00:00', '2017-11-11 01:00:00', '1470286196IMG_20160729_194320.jpg', 12000, '0000-00-00', 0, '321'),
(15, 6, 1, 'football', '', '2016-08-16 00:00:00', '2017-07-02 00:00:00', '1470300182', 500, '0000-00-00', 0, NULL),
(16, 2, 20, 'car', 'car', '2017-10-12 17:00:00', '2017-10-12 23:00:00', '1470286294IMG_20160729_194344.jpg', 1600000, '0000-00-00', 0, '123'),
(17, 3, 1, 'headphones', 'beats', '2016-08-23 00:00:00', '2017-07-03 00:00:00', '1470291649IMG_20160729_200925.jpg', 2500, '0000-00-00', 0, NULL),
(18, 2, 17, 'Cycle', 'Bought new, totally working', '2017-07-13 22:00:00', '2017-07-14 01:00:00', '1470293030maxit_enduro_50_mx_cycle.jpg', 16000, '0000-00-00', 0, '123'),
(19, 4, 17, 'wardrobe', 'Old wardrobe, recently refreshed', '2017-07-18 00:00:00', '2017-07-18 23:00:00', '1470293215IMG_20160804_123746.jpg', 10000, '0000-00-00', 0, '123'),
(20, 4, 17, 'single Bed', 'a single bed, tall and strong. no spot or problem. real "shegun" wood', '2017-07-15 01:03:10', '2017-07-15 02:08:00', '1470293271IMG_20160804_123656.jpg', 20000, '0000-00-00', 0, '123'),
(21, 2, 17, 'CRV', 'used over 2 years, still mint condition, AC not working', '2017-10-04 00:00:00', '2017-10-28 00:00:00', '1470293314IMG_20160804_123618.jpg', 2000000, '0000-00-00', 0, NULL),
(22, 1, 17, 'Oxford Dictionary', 'Old, but does the job', '2017-07-06 00:00:00', '2017-07-04 00:00:00', '1470293366IMG_20160804_123527.jpg', 500, '0000-00-00', 20, NULL),
(23, 1, 17, 'edexcel math book', 'C3', '2017-07-15 01:00:00', '2017-07-29 21:00:00', '1470293402IMG_20160804_123509.jpg', 200, '0000-00-00', 0, '321'),
(24, 1, 17, 'edexcel math book', 'C1', '2016-08-21 00:00:00', '0000-00-00 00:00:00', '1470293419IMG_20160804_123503.jpg', 300, '0000-00-00', 0, NULL),
(25, 1, 17, 'Algorithm book', 'original Algorithm book', '2016-08-25 00:00:00', '0000-00-00 00:00:00', '1470293443IMG_20160804_123436.jpg', 500, '0000-00-00', 0, NULL),
(26, 4, 17, 'wardrobe', '3 doors', '2016-08-17 00:00:00', '2017-07-10 00:00:00', '1470293699IMG_20160729_201011.jpg', 20000, '0000-00-00', 0, NULL),
(27, 3, 1, 'portable harddisk', '160 gb', '2017-07-13 23:21:00', '2017-07-14 05:15:20', '1470293786IMG_20160729_200906.jpg', 2000, '0000-00-00', 0, '321'),
(28, 3, 2, 'amplifier', 'microlab amp', '2017-07-06 00:00:00', '2017-07-19 00:00:00', '1470293814IMG_20160729_200857.jpg', 2500, '0000-00-00', 0, '21'),
(29, 3, 2, 'samsung s2', 'used for 3 years, clean set, no problem', '2017-07-06 00:00:00', '2017-07-04 00:00:00', '1470293872Samsung-Galaxy-S-II-T-Mobile.jpg', 7000, '0000-00-00', 0, NULL),
(41, 5, 1, 'bari', 'bishal ekta bari.', '2017-07-08 00:00:00', '2017-07-10 00:00:00', '1470667105home3.jpg', 10000000, '0000-00-00', 0, NULL),
(42, 1, 17, 'book abc', ' abc detailed  description ', '2017-07-09 00:00:00', '2017-07-11 00:00:00', '1471255416', 400, '0000-00-00', 0, NULL),
(43, 1, 17, 'Samsung J2', '<p>Samsung galaxy j2</p></br> <p>Samsung galaxy j2 is stunning and marvelous. price is aroung 9000 BDT</p>', '2017-10-04 00:00:00', '2017-11-09 23:00:00', '1470293872Samsung-Galaxy-S-II-T-Mobile.jpg', 9000, '0000-00-00', 0, 'yes'),
(47, 2, 20, 'asdasdasdasd', 'adasdasd\r\nasd\r\nas\r\nd\r\nasd123', '2017-10-02 00:00:00', '2017-11-16 00:00:00', '1499514606Capture.PNG', 33333, '0000-00-00', 0, NULL),
(48, 3, 20, 'my product', 'Casing', NULL, '0000-00-00 00:00:00', '150027010420170714_205455.jpg', 250, '0000-00-00', 0, NULL),
(49, 3, 20, 'Casing', 'Casing', '2017-10-09 19:44:10', '2017-10-10 23:00:00', '150027036420170714_205455.jpg', 250, '0000-00-00', 0, 'hgh');

-- --------------------------------------------------------

--
-- Table structure for table `product_bid`
--

CREATE TABLE IF NOT EXISTS `product_bid` (
`id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bid_amount` int(11) NOT NULL,
  `bid_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `product_bid`
--

INSERT INTO `product_bid` (`id`, `product_id`, `user_id`, `bid_amount`, `bid_time`) VALUES
(5, 11, 1, 20000, '2017-07-07 05:09:13'),
(7, 18, 2, 17000, '0000-00-00 00:00:00'),
(8, 22, 1, 525, '0000-00-00 00:00:00'),
(9, 27, 10, 2003, '0000-00-00 00:00:00'),
(10, 11, 17, 20000, '2017-07-07 07:00:00'),
(11, 12, 17, 8005, '2017-07-07 07:00:00'),
(12, 15, 20, 650, '0000-00-00 00:00:00'),
(13, 17, 1, 3000, '0000-00-00 00:00:00'),
(14, 18, 20, 17001, '0000-00-00 00:00:00'),
(15, 21, 11, 2000001, '0000-00-00 00:00:00'),
(20, 41, 1, 10000001, '0000-00-00 00:00:00'),
(21, 41, 20, 10000002, '0000-00-00 00:00:00'),
(22, 22, 2, 530, '0000-00-00 00:00:00'),
(23, 22, 20, 540, '0000-00-00 00:00:00'),
(24, 11, 1, 21000, '2017-07-07 08:00:00'),
(25, 11, 20, 21001, '2017-07-07 12:00:00'),
(26, 43, 20, 9001, '0000-00-00 00:00:00'),
(27, 43, 20, 9002, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `district` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `zipcode` varchar(30) NOT NULL,
  `image` varchar(500) NOT NULL,
  `amount` int(30) NOT NULL,
  `ban` varchar(20) DEFAULT NULL,
  `approved` varchar(15) DEFAULT NULL,
  `transaction_id` varchar(500) NOT NULL,
  `user_cash` int(11) NOT NULL,
  `trans_approved` varchar(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile`, `district`, `address`, `city`, `zipcode`, `image`, `amount`, `ban`, `approved`, `transaction_id`, `user_cash`, `trans_approved`) VALUES
(1, 'ashiq', 'ashiq201@yahoo.com', '0894d601ffe99bdc1654f0f8a945941e', '01521401595', 'Chittagong', 'Station Road, Pahartali', 'Chittagong', '4202', '', 1500, NULL, NULL, 'asdasd342', 1500, NULL),
(2, 'lol', 'lol@gmail.com', '9cdfb439c7876e703e307864c9167a15', '123', '123', '123', '', '123', '', 4500, NULL, NULL, '4534sdfasdf', 4512, NULL),
(17, 'abc', 'abc@abc.abc', '900150983cd24fb0d6963f7d28e17f72', '1234567890', 'Chittagong', 'xyz xyz xyz xyz', '', '', '1471205774person4.png', 4500, '1500454644', '1496829849', 'asdasd33', 5462, NULL),
(20, 'shaon        ', 'a@gmail.com', '0cc175b9c0f1b6a831c399e269772661', '01521401595', 'Chittagong      ', 'pahartali Station Road', 'Chittagong      ', '4202      ', '1469957403IMG_20160729_200857.jpg', 4324, NULL, '1500404702', '2312323', 0, '1507556327');

-- --------------------------------------------------------

--
-- Stand-in structure for view `winners`
--
CREATE TABLE IF NOT EXISTS `winners` (
`sales_person` varchar(50)
,`mobile` varchar(20)
,`product_id` int(11)
,`product_name` varchar(30)
,`product_image` varchar(500)
,`product_price` int(30)
,`product_description` varchar(200)
,`product_launch_date` datetime
,`product_end_date` datetime
,`bid_id` int(11)
,`bidder_name` varchar(50)
,`winning_price` int(11)
,`bid_time` timestamp
);
-- --------------------------------------------------------

--
-- Structure for view `winners`
--
DROP TABLE IF EXISTS `winners`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `winners` AS select `u1`.`name` AS `sales_person`,`u1`.`mobile` AS `mobile`,`p`.`id` AS `product_id`,`p`.`product_name` AS `product_name`,`p`.`product_image` AS `product_image`,`p`.`product_price` AS `product_price`,`p`.`product_description` AS `product_description`,`p`.`product_launch_date` AS `product_launch_date`,`p`.`product_end_date` AS `product_end_date`,`pb`.`id` AS `bid_id`,`u2`.`name` AS `bidder_name`,`pb`.`bid_amount` AS `winning_price`,`pb`.`bid_time` AS `bid_time` from (((`product_bid` `pb` join `product` `p` on((`pb`.`product_id` = `p`.`id`))) join `users` `u1` on((`p`.`user_id` = `u1`.`id`))) join `users` `u2` on((`pb`.`user_id` = `u2`.`id`))) where (`pb`.`bid_amount` in (select max(`product_bid`.`bid_amount`) from `product_bid` group by `product_bid`.`product_id`) and (`p`.`product_end_date` < now()) and (`p`.`approved` is not null)) group by `pb`.`product_id`;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`id`), ADD KEY `category_id` (`category_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product_bid`
--
ALTER TABLE `product_bid`
 ADD PRIMARY KEY (`id`), ADD KEY `product_id` (`product_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `product_bid`
--
ALTER TABLE `product_bid`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
