-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2024 at 07:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `products`
--

-- --------------------------------------------------------

--
-- Table structure for table `daily_stock`
--

CREATE TABLE `daily_stock` (
  `S.No` int(11) NOT NULL,
  `pid` varchar(10) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `pkg` varchar(10) NOT NULL,
  `2024-06-18` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daily_stock`
--

INSERT INTO `daily_stock` (`S.No`, `pid`, `pname`, `pkg`, `2024-06-18`) VALUES
(1, 'p001', 'குண்டு உளுந்து', 'kg', NULL),
(2, 'p002', 'பச்சரிசி', 'kg', NULL),
(3, 'p003', 'அவல்', 'kg', NULL),
(4, 'p004', 'பொட்டு கடலை', 'kg', NULL),
(5, 'p005', 'அஸ்கா', 'kg', NULL),
(6, 'p006', 'துவரம் பருப்பு', 'kg', NULL),
(7, 'p007', 'பாசி பருப்பு', 'kg', NULL),
(8, 'p008', 'பச்சைப் பயறு', 'kg', NULL),
(9, 'p009', 'தட்டைப்பயறு', 'kg', NULL),
(10, 'p010', 'கொள்ளு பருப்பு', 'kg', NULL),
(11, 'p011', 'கருப்பு சுண்டல்', 'kg', NULL),
(12, 'p012', 'வெள்ளை சுண்டல்', 'kg', NULL),
(13, 'p013', 'பச்சை பட்டாணி', 'kg', NULL),
(14, 'p014', 'சி.மீல்மேக்கர்', 'kg', NULL),
(15, 'p015', 'கல் உப்பு', 'pkt', NULL),
(16, 'p016', 'பொடி உப்பு', 'pkt', NULL),
(17, 'p017', 'Oil (Gold Winner)', 'lit', NULL),
(18, 'p018', 'கிழங்கு மாவு', 'kg', NULL),
(19, 'p019', 'பூண்டு (Seedu)', 'kg', NULL),
(20, 'p020', 'புளி (தோசை)', 'kg', NULL),
(21, 'p021', 'கடலைப் பருப்பு', 'kg', NULL),
(22, 'p022', 'சீரகம்', 'kg', NULL),
(23, 'p023', 'கடுகு', 'kg', NULL),
(24, 'p024', 'வெந்தயம்', 'kg', NULL),
(25, 'p025', 'மிளகு', 'kg', NULL),
(26, 'p026', 'சோம்பு', 'kg', NULL),
(27, 'p027', 'கசகசா', 'kg', NULL),
(28, 'p028', 'அண்ணாச்சி பூ', 'kg', NULL),
(29, 'p029', 'பிரியாணி இலை', 'kg', NULL),
(30, 'p030', 'பெருங்காயம் தூள் (TT', 'box', NULL),
(31, 'p031', 'டி தூள்', 'kg', NULL),
(32, 'p032', 'காபித் தூள்', 'kg', NULL),
(33, 'p033', 'தீப்பெட்டி', 'box', NULL),
(34, 'p034', 'கோதுமை மாவு', 'kg', NULL),
(35, 'p035', 'மிளகாய் தூள்', 'kg', NULL),
(36, 'p036', 'மல்லி தூள்', 'kg', NULL),
(37, 'p037', 'மஞ்சள் தூள்', 'kg', NULL),
(38, 'p038', 'வர மிளகாய்', 'kg', NULL),
(39, 'p039', 'பிரியாணி மசாலா', 'g', NULL),
(40, 'p040', 'சிக்கன் மசாலா', 'g', NULL),
(41, 'p041', 'கோ.ரவை', 'kg', NULL),
(42, 'p042', 'அப்பளம் popular DSPL', 'pkt', NULL),
(43, 'p043', 'டால்டா ', 'pkt', NULL),
(44, 'p044', 'மேரி கோல்ட் Biscuit', 'pcs', NULL),
(45, 'p045', 'ராகி சேமியா', 'kg', NULL),
(46, 'p046', 'Sabena', 'pkt', NULL),
(47, 'p047', 'Vim Soap', 'pcs', NULL),
(48, 'p048', 'Scrapper Steel', 'pcs', NULL),
(49, 'p049', 'Scrup Pad', 'pcs', NULL),
(50, 'p050', 'வாஷிங் பவுடர்', 'kg', NULL),
(51, 'p051', 'Hamam', 'pcs', NULL),
(52, 'p052', 'சிந்தால்', 'pcs', NULL),
(53, 'p053', 'Life Bouy', 'pcs', NULL),
(54, 'p054', 'Detol', 'pcs', NULL),
(55, 'p055', 'ரின் பவுடர்', 'kg', NULL),
(56, 'p056', 'ரின் சோப்பு', 'pcs', NULL),
(57, 'p057', 'VVD தேங்காய் எண்ணெய்', 'pkt', NULL),
(58, 'p058', 'கொ.மல்லி', 'kg', NULL),
(59, 'p059', 'பட்டை', 'kg', NULL),
(60, 'p060', 'சேமியா', 'pkt', NULL),
(61, 'p061', 'நிலக்கடலை', 'kg', NULL),
(62, 'p062', 'வெ.ரவை', 'kg', NULL),
(63, 'p063', 'கலர் பொடி', 'kg', NULL),
(64, 'p064', 'முந்திரி ', 'kg', NULL),
(65, 'p065', 'திராட்சை', 'kg', NULL),
(66, 'p066', 'ஏலக்காய்', 'kg', NULL),
(67, 'p067', 'ஜவ்வரிசி', 'kg', NULL),
(68, 'p068', 'வெல்லம்', 'kg', NULL),
(69, 'p069', 'அரிசி', 'kg', NULL),
(70, 'p070', 'இட்லி அரிசி', 'kg', NULL),
(71, 'p071', 'முட்டை', 'pcs', NULL),
(72, 'p072', 'Gas', 'cyl', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hostel_2024`
--

CREATE TABLE `hostel_2024` (
  `S.No` int(11) NOT NULL,
  `pid` varchar(10) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `pkg` varchar(10) NOT NULL,
  `2024-06-18` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hostel_2024`
--

INSERT INTO `hostel_2024` (`S.No`, `pid`, `pname`, `pkg`, `2024-06-18`) VALUES
(1, 'p001', 'குண்டு உளுந்து', 'kg', 0),
(2, 'p002', 'பச்சரிசி', 'kg', 0),
(3, 'p003', 'அவல்', 'kg', 0),
(4, 'p004', 'பொட்டு கடலை', 'kg', 0),
(5, 'p005', 'அஸ்கா', 'kg', 0),
(6, 'p006', 'துவரம் பருப்பு', 'kg', 0),
(7, 'p007', 'பாசி பருப்பு', 'kg', 0),
(8, 'p008', 'பச்சைப் பயறு', 'kg', 0),
(9, 'p009', 'தட்டைப்பயறு', 'kg', 0),
(10, 'p010', 'கொள்ளு பருப்பு', 'kg', 0),
(11, 'p011', 'கருப்பு சுண்டல்', 'kg', 0),
(12, 'p012', 'வெள்ளை சுண்டல்', 'kg', 0),
(13, 'p013', 'பச்சை பட்டாணி', 'kg', 0),
(14, 'p014', 'சி.மீல்மேக்கர்', 'kg', 0),
(15, 'p015', 'கல் உப்பு', 'pkt', 0),
(16, 'p016', 'பொடி உப்பு', 'pkt', 0),
(17, 'p017', 'Oil (Gold Winner)', 'lit', 0),
(18, 'p018', 'கிழங்கு மாவு', 'kg', 0),
(19, 'p019', 'பூண்டு (Seedu)', 'kg', 0),
(20, 'p020', 'புளி (தோசை)', 'kg', 0),
(21, 'p021', 'கடலைப் பருப்பு', 'kg', 0),
(22, 'p022', 'சீரகம்', 'kg', 0),
(23, 'p023', 'கடுகு', 'kg', 0),
(24, 'p024', 'வெந்தயம்', 'kg', 0),
(25, 'p025', 'மிளகு', 'kg', 0),
(26, 'p026', 'சோம்பு', 'kg', 0),
(27, 'p027', 'கசகசா', 'kg', 0),
(28, 'p028', 'அண்ணாச்சி பூ', 'kg', 0),
(29, 'p029', 'பிரியாணி இலை', 'kg', 0),
(30, 'p030', 'பெருங்காயம் தூள் (TT', 'box', 0),
(31, 'p031', 'டி தூள்', 'kg', 0),
(32, 'p032', 'காபித் தூள் (Sunrise', 'kg', 0),
(33, 'p033', 'தீப்பெட்டி', 'box', 0),
(34, 'p034', 'கோதுமை மாவு', 'kg', 0),
(35, 'p035', 'மிளகாய் தூள்', 'kg', 0),
(36, 'p036', 'மல்லி தூள்', 'kg', 0),
(37, 'p037', 'மஞ்சள் தூள்', 'kg', 0),
(38, 'p038', 'வர மிளகாய்', 'kg', 0),
(39, 'p039', 'பிரியாணி மசாலா', 'g', 0),
(40, 'p040', 'சிக்கன் மசாலா', 'g', 0),
(41, 'p041', 'கோ.ரவை', 'kg', 0),
(42, 'p042', 'அப்பளம் popular DSPL', 'pkt', 0),
(43, 'p043', 'டால்டா ', 'pkt', 0),
(44, 'p044', 'மேரி கோல்ட் Biscuit', 'pcs', 0),
(45, 'p045', 'ராகி சேமியா', 'kg', 0),
(46, 'p046', 'Sabena', 'pkt', 0),
(47, 'p047', 'Vim Soap', 'pcs', 0),
(48, 'p048', 'Scrapper Steel', 'pcs', 0),
(49, 'p049', 'Scrup Pad', 'pcs', 0),
(50, 'p050', 'வாஷிங் பவுடர்', 'kg', 0),
(51, 'p051', 'Hamam', 'pcs', 0),
(52, 'p052', 'சிந்தால்', 'pcs', 0),
(53, 'p053', 'Life Bouy', 'pcs', 0),
(54, 'p054', 'Detol', 'pcs', 0),
(55, 'p055', 'ரின் பவுடர்', 'kg', 0),
(56, 'p056', 'ரின் சோப்பு', 'pcs', 0),
(57, 'p057', 'VVD தேங்காய் எண்ணெய்', 'pkt', 0),
(58, 'p058', 'கொ.மல்லி', 'kg', 0),
(59, 'p059', 'பட்டை', 'kg', 0),
(60, 'p060', 'சேமியா', 'pkt', 0),
(61, 'p061', 'நிலக்கடலை', 'kg', 0),
(62, 'p062', 'வெ.ரவை', 'kg', 0),
(63, 'p063', 'கலர் பொடி', 'kg', 0),
(64, 'p064', 'முந்திரி', 'kg', 0),
(65, 'p065', 'திராட்சை', 'kg', 0),
(66, 'p066', 'ஏலக்காய்', 'kg', 0),
(67, 'p067', 'ஜவ்வரிசி', 'kg', 0),
(68, 'p068', 'வெல்லம்', 'kg', 0),
(69, 'p069', 'அரிசி', 'kg', 0),
(70, 'p070', 'இட்லி அரிசி', 'kg', 0),
(71, 'p071', 'முட்டை', 'pcs', 0),
(72, 'p072', 'Gas', 'cyl', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_stock`
--

CREATE TABLE `purchase_stock` (
  `S.No` int(11) NOT NULL,
  `pid` varchar(10) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `pkg` varchar(10) NOT NULL,
  `2024-06-18` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_stock`
--

INSERT INTO `purchase_stock` (`S.No`, `pid`, `pname`, `pkg`, `2024-06-18`) VALUES
(1, 'p001', 'குண்டு உளுந்து', 'kg', NULL),
(2, 'p002', 'பச்சரிசி', 'kg', NULL),
(3, 'p003', 'அவலஂ', 'kg', NULL),
(4, 'p004', 'பொட்டு கடலை', 'kg', NULL),
(5, 'p005', 'அஸ்கா', 'kg', NULL),
(6, 'p006', 'துவரம் பருப்பு', 'kg', NULL),
(7, 'p007', 'பாசி பருப்பு', 'kg', NULL),
(8, 'p008', 'பச்சைப் பயறு', 'kg', NULL),
(9, 'p009', 'தட்டைப்பயறு', 'kg', NULL),
(10, 'p010', 'கொள்ளு பருப்பு', 'kg', NULL),
(11, 'p011', 'கருப்பு சுண்டல்', 'kg', NULL),
(12, 'p012', 'வெள்ளை சுண்டல்', 'kg', NULL),
(13, 'p013', 'பச்சை பட்டாணி', 'kg', NULL),
(14, 'p014', 'சி.மீல்மேக்கர்', 'kg', NULL),
(15, 'p015', 'கல் உப்பு', 'pkt', NULL),
(16, 'p016', 'பொடி உப்பு', 'pkt', NULL),
(17, 'p017', 'Oil (Gold Winner)', 'lit', NULL),
(18, 'p018', 'கிழங்கு மாவு', 'kg', NULL),
(19, 'p019', 'பூண்டு (Seedu)', 'kg', NULL),
(20, 'p020', 'புளி (தோசை)', 'kg', NULL),
(21, 'p021', 'கடலைப் பருப்பு', 'kg', NULL),
(22, 'p022', 'சீரகம்', 'kg', NULL),
(23, 'p023', 'கடுகு', 'kg', NULL),
(24, 'p024', 'வெந்தயம்', 'kg', NULL),
(25, 'p025', 'மிளகு', 'kg', NULL),
(26, 'p026', 'சோம்பு', 'kg', NULL),
(27, 'p027', 'கசகசா', 'kg', NULL),
(28, 'p028', 'அண்ணாச்சி பூ', 'kg', NULL),
(29, 'p029', 'பிரியாணி இலை', 'kg', NULL),
(30, 'p030', 'பெருங்காயம் தூள் (TT', 'box', NULL),
(31, 'p031', 'டி தூள்', 'kg', NULL),
(32, 'p032', 'காபித் தூள்', 'kg', NULL),
(33, 'p033', 'தீப்பெட்டி', 'box', NULL),
(34, 'p034', 'கோதுமை மாவு', 'kg', NULL),
(35, 'p035', 'மிளகாய் தூள்', 'kg', NULL),
(36, 'p036', 'மல்லி தூள்', 'kg', NULL),
(37, 'p037', 'மஞ்சள் தூள்', 'kg', NULL),
(38, 'p038', 'வர மிளகாய்', 'kg', NULL),
(39, 'p039', 'பிரியாணி மசாலா', 'g', NULL),
(40, 'p040', 'சிக்கன் மசாலா', 'g', NULL),
(41, 'p041', 'கோ.ரவை', 'kg', NULL),
(42, 'p042', 'அப்பளம் popular DSPL', 'pkt', NULL),
(43, 'p043', 'டால்டா ', 'pkt', NULL),
(44, 'p044', 'மேரி கோல்ட் Biscuit', 'pcs', NULL),
(45, 'p045', 'ராகி சேமியா', 'kg', NULL),
(46, 'p046', 'Sabena', 'pkt', NULL),
(47, 'p047', 'Vim Soap', 'pcs', NULL),
(48, 'p048', 'Scrapper Steel', 'pcs', NULL),
(49, 'p049', 'Scrup Pad', 'pcs', NULL),
(50, 'p050', 'வாஷிங் பவுடர்', 'kg', NULL),
(51, 'p051', 'Hamam', 'pcs', NULL),
(52, 'p052', 'சிந்தால்', 'pcs', NULL),
(53, 'p053', 'Life Bouy', 'pcs', NULL),
(54, 'p054', 'Detol', 'pcs', NULL),
(55, 'p055', 'ரின் பவுடர்', 'kg', NULL),
(56, 'p056', 'ரின் சோப்பு', 'pcs', NULL),
(57, 'p057', 'VVD தேங்காய் எண்ணெய்', 'pkt', NULL),
(58, 'p058', 'கொ.மல்லி', 'kg', NULL),
(59, 'p059', 'பட்டை', 'kg', NULL),
(60, 'p060', 'சேமியா', 'pkt', NULL),
(61, 'p061', 'நிலக்கடலை', 'kg', NULL),
(62, 'p062', 'வெ.ரவை', 'kg', NULL),
(63, 'p063', 'கலர் பொடி', 'kg', NULL),
(64, 'p064', 'முந்திரி', 'kg', NULL),
(65, 'p065', 'திராட்சை', 'kg', NULL),
(66, 'p066', 'ஏலக்காய்', 'kg', NULL),
(67, 'p067', 'ஜவ்வரிசி', 'kg', NULL),
(68, 'p068', 'வெல்லம்', 'kg', NULL),
(69, 'p069', 'அரிசி', 'kg', NULL),
(70, 'p070', 'இட்லி அரிசி', 'kg', NULL),
(71, 'p071', 'முட்டை', 'pcs', NULL),
(72, 'p072', 'Gas', 'cyl', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daily_stock`
--
ALTER TABLE `daily_stock`
  ADD PRIMARY KEY (`S.No`);

--
-- Indexes for table `hostel_2024`
--
ALTER TABLE `hostel_2024`
  ADD PRIMARY KEY (`S.No`);

--
-- Indexes for table `purchase_stock`
--
ALTER TABLE `purchase_stock`
  ADD PRIMARY KEY (`S.No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daily_stock`
--
ALTER TABLE `daily_stock`
  MODIFY `S.No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `hostel_2024`
--
ALTER TABLE `hostel_2024`
  MODIFY `S.No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `purchase_stock`
--
ALTER TABLE `purchase_stock`
  MODIFY `S.No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
