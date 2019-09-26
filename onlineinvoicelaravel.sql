-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2019 at 12:24 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineinvoicelaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_company`
--

CREATE TABLE `t_company` (
  `c_id` int(50) NOT NULL,
  `c_name` varchar(500) DEFAULT NULL,
  `c_address` varchar(1000) DEFAULT NULL,
  `c_phone` varchar(50) DEFAULT NULL,
  `c_email` varchar(50) DEFAULT NULL,
  `c_owner` varchar(50) NOT NULL,
  `c_logo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_company`
--

INSERT INTO `t_company` (`c_id`, `c_name`, `c_address`, `c_phone`, `c_email`, `c_owner`, `c_logo`) VALUES
(1, 'BKINGHT', 'Sector 10 Road  13 uttara ,Dhaka', '01552987430 01824318212', 'bkinght@gmail.com', 'rifat', 'BKINGHT.png');

-- --------------------------------------------------------

--
-- Table structure for table `t_invoice`
--

CREATE TABLE `t_invoice` (
  `i_id` int(200) NOT NULL,
  `invoice_from` varchar(300) NOT NULL,
  `invoice_to` varchar(300) NOT NULL,
  `mail_to` varchar(500) NOT NULL,
  `invoice_type` varchar(100) NOT NULL,
  `invoice_number` varchar(300) NOT NULL,
  `date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `item` varchar(1000) NOT NULL,
  `itemDescription` varchar(1000) DEFAULT NULL,
  `quantity` varchar(500) NOT NULL,
  `rate` varchar(600) NOT NULL,
  `amount` varchar(600) NOT NULL,
  `Sub_total` int(50) NOT NULL,
  `tax` int(50) DEFAULT NULL,
  `discount` int(50) DEFAULT NULL,
  `shipping` int(50) DEFAULT NULL,
  `total` int(50) NOT NULL,
  `amount_paid` int(50) DEFAULT NULL,
  `due_balance` int(50) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `terms` varchar(500) DEFAULT NULL,
  `payment_terms` varchar(500) DEFAULT NULL,
  `draft` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_invoice`
--

INSERT INTO `t_invoice` (`i_id`, `invoice_from`, `invoice_to`, `mail_to`, `invoice_type`, `invoice_number`, `date`, `due_date`, `item`, `itemDescription`, `quantity`, `rate`, `amount`, `Sub_total`, `tax`, `discount`, `shipping`, `total`, `amount_paid`, `due_balance`, `description`, `terms`, `payment_terms`, `draft`) VALUES
(1, 'BKINGHT', 'Grameen Phone', 'rifatron99@gmail.com', 'Invoice', '1', '2019-09-25', '2019-09-28', '[\"Graphics card\",\"DM 10 headphone\",\"Dell regular Mouse\"]', '[\"Better for vfx editing and gaming\",\"Best quality in low price\",null]', '[\"1\",\"1\",\"1\"]', '[\"2500\",\"300\",\"300\"]', '[\"2500\",\"300\",\"300\"]', 3100, 15, 10, 50, 3262, 3100, 162, 'Thanks for  your purchase . We provide best Product\r\nWe accept return within 7 days', 'Please pay before due date', NULL, 'off'),
(2, 'BKINGHT', 'Robi', 'rifatron99@gmail.com', 'Quotation', '5d8c8266a8a39', '2019-09-26', '2019-09-20', '[\"Microloab 4 X 2\",\"Graphics card\"]', '[\"better for one person\",null]', '[\"1\",\"1\"]', '[\"4500\",\"2500\"]', '[\"4500\",\"2500\"]', 7000, 15, 10, 50, 7295, 2000, 5295, 'Thanks for purchase', 'pay before due date', 'void', 'off'),
(3, 'BKINGHT', 'Zaman It', 'rifatron99@gmail.com', 'Invoice', '5d8c8e3ec0ef9', '2019-09-26', '2019-09-30', '[\"Dell regular Mouse\",\"Graphics card\",\"DM 10 headphone\",\"Microloab 4 X 2\"]', '[\"better in low price\",null,\"better quality\",\"better for one person\"]', '[\"1\",\"1\",\"1\",\"1\"]', '[\"300\",\"2500\",\"350\",\"4500\"]', '[\"300\",\"2500\",\"350\",\"4500\"]', 7650, 15, 10, 50, 7977, 977, 7000, 'Thanks for purchase', 'pay before due date', 'void', 'off');

-- --------------------------------------------------------

--
-- Table structure for table `t_product`
--

CREATE TABLE `t_product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(500) NOT NULL,
  `p_description` varchar(1000) DEFAULT NULL,
  `p_price` int(200) DEFAULT NULL,
  `p_owner` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_product`
--

INSERT INTO `t_product` (`p_id`, `p_name`, `p_description`, `p_price`, `p_owner`) VALUES
(1, 'DM 10 headphone', 'better quality', 350, 'rifat'),
(2, 'Dell regular Mouse', 'better in low price', 300, 'rifat'),
(4, 'Graphics card', 'better for vfx', 2500, 'rifat'),
(5, 'Microloab 4 X 2', 'better for one person', 4500, 'rifat');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dob` varchar(50) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(50) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `u_report` int(50) DEFAULT NULL,
  `picture` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `name`, `password`, `dob`, `gender`, `email`, `phone`, `type`, `u_report`, `picture`) VALUES
(1, 'kawsarul', '123', '24-08-1995', 'male', 'rifatron999@gmail.com', '01824318212', 'super admin', 0, NULL),
(2, 'rifat', '123', '1995-08-24', 'male', 'rifatron999@gmail.com', '01824318212', 'user', NULL, 'rifat.jpg'),
(3, 'ron', '123', '2019-08-27', 'male', 'rifatron999@gmail.com', '01824318212', 'admin', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_company`
--
ALTER TABLE `t_company`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `t_invoice`
--
ALTER TABLE `t_invoice`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `t_product`
--
ALTER TABLE `t_product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_company`
--
ALTER TABLE `t_company`
  MODIFY `c_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_invoice`
--
ALTER TABLE `t_invoice`
  MODIFY `i_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_product`
--
ALTER TABLE `t_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
