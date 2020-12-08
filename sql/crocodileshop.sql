-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2019 at 08:35 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crocodileshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_crocodile`
--

CREATE TABLE `tb_crocodile` (
  `cro_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `cro_picture` varchar(100) NOT NULL,
  `cro_categoty` varchar(100) NOT NULL,
  `cro_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_crocodile`
--

INSERT INTO `tb_crocodile` (`cro_id`, `cro_picture`, `cro_categoty`, `cro_price`) VALUES
(00001, 'uploads/จระเข้น้ำจืด1.png', 'พ่อพันธุ์จระเข้น้ำจืด', 3000),
(00002, 'uploads/จระเข้น้ำจืด.png', 'แม่พันธุ์จระเข้น้ำจืด', 2800),
(00003, 'uploads/จระเข้น้ำเค็ม1.png', 'แม่พันธุ์จระเข้น้ำเค็ม', 3200),
(00004, 'uploads/จระเข้น้ำเค็ม2.png', 'พ่อพันธุ์จระเข้น้ำเค็ม', 3500);

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `m_id` int(5) UNSIGNED ZEROFILL NOT NULL COMMENT 'pk, รหัสสมาชิก',
  `m_username` varchar(50) NOT NULL,
  `m_password` varchar(50) NOT NULL,
  `m_name` varchar(50) NOT NULL,
  `m_email` varchar(50) NOT NULL,
  `m_address` varchar(100) NOT NULL,
  `m_phone` int(10) NOT NULL,
  `m_position` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ตารางสมาชิก';

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`m_id`, `m_username`, `m_password`, `m_name`, `m_email`, `m_address`, `m_phone`, `m_position`) VALUES
(00001, 'Shepherd1', '1234', 'Sudarat Manee', 'Sudarat@hotmail.com', '18/9 Maneeratda soi, Bangkok', 859758422, 'Shepherd'),
(00002, 'Kaew', '080778890', 'Pimolpan Bonntiea', 'kaewlyly@gmail.com', '18/9 Sutisan Road Bangkok 10400', 859445743, 'User'),
(00003, 'Farmer', '0000', 'Paree Wanu', 'Paree@hotmail.com', '14/6', 836415742, 'Farmer'),
(00004, 'Marketing', '5678', 'Suda Yawee', 'Suda@hotmail.com', '6538/78', 879856845, 'Marketing'),
(00005, 'Finance', '1234', 'Tana Waree', 'Tana@hotmail.com', '41574/96', 845746952, 'Finance'),
(00006, 'Accounting', '1234', 'Pawee Wanu', 'Pawee@hotmail.com', '45749/85', 869857485, 'Accounting'),
(00007, 'Purchasing', '1234', 'Onra Japun', 'Onra@hotmail.com', '54785/69', 854258769, 'Purchasing');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `o_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `cro_id` int(5) NOT NULL,
  `o_qty` int(11) NOT NULL,
  `o_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`o_id`, `cro_id`, `o_qty`, `o_total`) VALUES
(00001, 1, 2, 6000),
(00002, 3, 2, 6400);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ordercro`
--

CREATE TABLE `tb_ordercro` (
  `oCro_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `oCro_list` varchar(100) NOT NULL,
  `oCro_num` int(11) NOT NULL,
  `oCro_price` int(11) NOT NULL,
  `oCro_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_ordercro`
--

INSERT INTO `tb_ordercro` (`oCro_id`, `oCro_list`, `oCro_num`, `oCro_price`, `oCro_date`) VALUES
(00001, 'เนื้อไก่', 10, 300, '2019-04-14'),
(00002, 'อกไก่', 20, 600, '2019-04-19'),
(00003, 'เนื้อหมู', 10, 500, '2019-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_payment`
--

CREATE TABLE `tb_payment` (
  `p_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `p_bill` int(20) NOT NULL,
  `p_bank` varchar(50) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `p_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_payment`
--

INSERT INTO `tb_payment` (`p_id`, `p_name`, `p_bill`, `p_bank`, `p_qty`, `p_total`) VALUES
(00001, 'พิมลพรรณ บุญเตี้ย', 1245875695, 'ไทยพาณิชย์', 2, 6000),
(00002, 'สุวิมล มูลเรือน', 1425368574, 'กรุงเทพ', 2, 6400);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_crocodile`
--
ALTER TABLE `tb_crocodile`
  ADD PRIMARY KEY (`cro_id`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `tb_ordercro`
--
ALTER TABLE `tb_ordercro`
  ADD PRIMARY KEY (`oCro_id`);

--
-- Indexes for table `tb_payment`
--
ALTER TABLE `tb_payment`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_crocodile`
--
ALTER TABLE `tb_crocodile`
  MODIFY `cro_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `m_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'pk, รหัสสมาชิก', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `o_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_ordercro`
--
ALTER TABLE `tb_ordercro`
  MODIFY `oCro_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_payment`
--
ALTER TABLE `tb_payment`
  MODIFY `p_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
