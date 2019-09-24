-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2019 at 04:52 PM
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
(1, 'BKINGHT', 'Sector 10 Road  13 uttara ,Dhaka', '01552987430 01824318212', 'bkinght@gmail.com', 'rifat', 'BKINGHT.png'),
(3, 'Zaman It', 'uttra', 'zamanIt@gmail.com', '01552987430', 'Zaman Khan', 'Zaman It.png');

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
  `invoice_number` int(100) NOT NULL,
  `date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `item` varchar(1000) NOT NULL,
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

INSERT INTO `t_invoice` (`i_id`, `invoice_from`, `invoice_to`, `mail_to`, `invoice_type`, `invoice_number`, `date`, `due_date`, `item`, `quantity`, `rate`, `amount`, `Sub_total`, `tax`, `discount`, `shipping`, `total`, `amount_paid`, `due_balance`, `description`, `terms`, `payment_terms`, `draft`) VALUES
(1, 'BKINGHT', 'GP', 'rifatron99@gmail.com', 'Invoice', 56, '2019-09-15', '2019-09-23', '[null,null]', '[null,null]', '[null,null]', '[null,null]', 7000, 15, 10, NULL, 7350, 5000, 2350, 'Thanks for purchase', 'pay before due date', 'void', 'on'),
(2, 'BKINGHT', 'Robi', 'rifatron99@gmail.com', 'Quotation', 101, '2019-09-20', '2019-09-20', '[\"DM 10 headphone\",\"Graphics card\"]', '[\"1\",\"1\"]', '[\"300\",\"2500\"]', '[\"300\",\"2500\"]', 2800, 15, 15, 100, 2900, 2900, 0, 'best product', NULL, 'void', 'off'),
(3, 'BKINGHT', 'Zaman It', 'rifatron99@gmail.com', 'Invoice', 58, '2019-09-20', '2019-09-28', '[\"Graphics card\",\"Microloab 4*2\"]', '[\"1\",\"2\"]', '[\"2500\",\"4500\"]', '[\"2500\",\"9000\"]', 11500, 15, 10, 150, 12225, NULL, 12225, 'Thanks for purchase', 'pay before due date', 'void', 'off'),
(4, 'BKINGHT', 'Yeafee', 'rifatron99@gmail.com', 'Invoice', 1, '2019-09-20', '2019-09-30', '[\"Microloab 4*2\",\"DM 10 headphone\"]', '[\"3\",\"1\"]', '[\"4500\",\"300\"]', '[\"13500\",\"300\"]', 13500, 15, 10, 100, 14275, 5000, 9275, 'Thanks for purchase', 'pay before due date', 'void', 'off'),
(5, 'BKINGHT', 'GP', 'rifatron99@gmail.com', 'Invoice', 57, '2019-09-20', '2019-09-24', '[\"DM 10 headphone\",\"Graphics card\",\"Graphics card\",\"Graphics card\",\"Dell regular Mouse\",\"Microloab 4*2\",\"Graphics card\"]', '[\"5\",\"5\",\"5\",\"6\",\"45\",\"2\",\"6\"]', '[\"300\",\"2500\",\"4500\",\"4500\",\"300\",\"4500\",\"2498\"]', '[\"1500\",\"12500\",\"22500\",\"27000\",\"13500\",\"9000\",\"15000\"]', 101000, 15, 10, NULL, 106050, 40000, 66050, 'Thanks for purchase', 'pay before due date', NULL, 'off'),
(6, 'BKINGHT', 'GP', 'rifatron99@gmail.com', 'Invoice', 87, '2019-09-21', '2019-09-22', '[\"Dell regular Mouse\",\"DM 10 headphone\"]', '[\"1\",\"1\"]', '[\"300\",\"300\"]', '[\"300\",\"300\"]', 600, 15, 15, 50, 650, 650, 0, 'Thanks for purchase', 'pay before due date', 'void', 'off'),
(7, 'BKINGHT', 'GP', 'rifatron99@gmail.com', 'Invoice', 103, '2019-09-21', '2019-09-24', '[\"Dell regular Mouse\"]', '[\"1\"]', '[\"300\"]', '[\"300\"]', 300, NULL, NULL, NULL, 300, 300, 0, 'Thanks for purchase', 'pay before due date', 'void', 'off'),
(8, 'BKINGHT', 'GP', 'rifatron99@gmail.com', 'Invoice', 103, '2019-09-21', '2019-09-24', '[\"Dell regular Mouse\"]', '[\"1\"]', '[\"300\"]', '[\"300\"]', 300, NULL, NULL, NULL, 300, 300, 0, 'Thanks for purchase', 'pay before due date', 'void', 'off'),
(9, 'BKINGHT', 'GP', 'rifatron99@gmail.com', 'Invoice', 104, '2019-09-21', '2019-09-22', '[\"DM 10 headphone\"]', '[\"1\"]', '[\"300\"]', '[\"300\"]', 300, NULL, NULL, NULL, 300, 200, 100, 'Thanks for purchase', 'pay before due date', 'void', 'off'),
(11, 'BKINGHT', 'GP', 'rifatron99@gmail.com', 'Quotation', 200, '2019-09-22', '2019-09-24', '[\"Dell regular Mouse\"]', '[\"1\"]', '[\"300\"]', '[\"300\"]', 300, NULL, NULL, NULL, 300, 200, 100, 'Thanks for purchase', 'pay before due date', 'void', 'on'),
(12, 'Zaman It', 'GP', 'rifatron99@gmail.com', 'Invoice', 305, '2019-09-22', '2019-09-24', '[\"Website\"]', '[\"1\"]', '[\"500\"]', '[\"500\"]', 2000, NULL, NULL, NULL, 2500, 500, 2000, 'Thanks for purchase gyvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvsdgssdgdsgsd', 'pay before due date', 'void', 'off');

-- --------------------------------------------------------

--
-- Table structure for table `t_product`
--

CREATE TABLE `t_product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(500) NOT NULL,
  `p_price` int(200) NOT NULL,
  `p_stock` int(50) DEFAULT NULL,
  `p_owner` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_product`
--

INSERT INTO `t_product` (`p_id`, `p_name`, `p_price`, `p_stock`, `p_owner`) VALUES
(1, 'DM 10 headphone', 300, 100, 'rifat'),
(2, 'Dell regular Mouse', 300, 200, 'rifat'),
(4, 'Graphics card', 2500, 100, 'rifat'),
(5, 'Microloab 4 X 2', 4500, 100, 'rifat'),
(7, 'Website', 500, 1, 'Zaman Khan');

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
(3, 'ron', '123', '2019-08-27', 'male', 'rifatron999@gmail.com', '01824318212', 'admin', NULL, NULL),
(5, 'Zaman Khan', '123', '2019-09-26', 'male', 'zaman@gmail.com', '01552987430', 'user', NULL, 'Zaman Khan.png'),
(6, 'Zaman Khan', '12345678', '2019-09-13', 'male', 'rifatron999@gmail.com', '01777777777', 'user', NULL, NULL);

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
  MODIFY `c_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_invoice`
--
ALTER TABLE `t_invoice`
  MODIFY `i_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `t_product`
--
ALTER TABLE `t_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
