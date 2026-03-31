-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2023 at 06:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodable`
--

-- --------------------------------------------------------

--
-- Table structure for table `charity_like`
--

CREATE TABLE `charity_like` (
  `charity_id` int(11) NOT NULL,
  `contributor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `charity_master`
--

CREATE TABLE `charity_master` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `photo_name` varchar(255) NOT NULL DEFAULT 'user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `charity_master`
--

INSERT INTO `charity_master` (`id`, `name`, `email`, `password`, `address`, `city`, `state`, `photo_name`) VALUES
(14, 'icharity', 'info@icharity.in', '123', 'Commercial Block-1, Zone 6, Golf Course Road, DLF City Phase-V, Gurugram – 122009 Haryana, India', 'Gurugram', 'Haryana', 'user.png'),
(15, ' AKSHAYA PATRA', 'donorcare@akshayapatra.org', '123', '3rd Floor, 3rd Main Road, 1st & 2nd Stage Yeshwantpur Industrial Suburb, Rajajinagar Ward No. 10 Bengaluru – 560022  India ', 'Bengaluru', 'Karnataka', 'user.png'),
(16, 'Feeding India', 'contact@feedingindia.org', '123', '2nd Floor, Plot No. 13, Local Shopping Center, Pocket 1, Sector B, Vasant Kunj, New Delhi, Delhi 110070', 'Delhi', 'New Delhi,', 'user.png'),
(17, 'Robin Hood Army', 'info@smilefoundationindia.org', '123', '161 B/4, 3rd Floor, Gulmohar House, Yusuf Sarai Community Centre, New Delhi', ' Delhi', 'New Delhi', 'user.png'),
(18, 'SERUDS', 'info@serudsindia.org', '123', '46-740, Budhavarapeta, Beside Canara Bank, Kurnool - 518 002, Andhra Pradesh, India.', 'Kurnool', 'Andhra Pradesh', 'user.png'),
(19, 'Goonj', 'mail@goonj.org', '123', 'J 24, Pocket J, Sarita Vihar, New Delhi, Delhi 110076', 'New Delhi', 'Delhi', 'user.png'),
(20, 'Pratham', 'info@pratham.org', '123', 'B- 4/58, Safdarjung Enclave 2nd Floor, New Delhi - 110 029', 'New Delhi', 'Delhi', 'user.png'),
(21, ' Give India Foundation', 'Give@IndiaFoundation', '123', '2nd floor, Rigel, No. 15-19 Doddanekkundi, Marathahalli Outer Ring Road, Bengaluru, Karnataka-560037', 'Bengaluru', 'Karnataka', 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `charity_request_contributor`
--

CREATE TABLE `charity_request_contributor` (
  `charity_id` int(11) NOT NULL,
  `contributor_id` int(11) NOT NULL,
  `request_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `charity_request_contributor`
--

INSERT INTO `charity_request_contributor` (`charity_id`, `contributor_id`, `request_status`) VALUES
(14, 9, 0),
(14, 10, 0),
(14, 11, 0),
(14, 12, 0),
(14, 13, 0),
(14, 14, 0),
(14, 15, 0),
(14, 16, 0),
(14, 17, 0),
(15, 9, 0),
(15, 10, 0),
(15, 11, 0),
(15, 12, 0),
(15, 14, 0),
(15, 15, 0),
(15, 16, 0),
(15, 17, 0),
(16, 9, 0),
(16, 10, 0),
(16, 11, 0),
(16, 12, 0),
(16, 13, 0),
(16, 14, 0),
(16, 15, 0),
(16, 16, 0),
(16, 17, 0),
(17, 9, 0),
(17, 10, 0),
(17, 11, 0),
(17, 12, 0),
(17, 13, 0),
(17, 14, 0),
(17, 15, 0),
(17, 16, 0),
(17, 17, 0),
(18, 9, 0),
(18, 10, 0),
(18, 11, 0),
(18, 12, 0),
(18, 13, 0),
(18, 14, 0),
(18, 15, 0),
(18, 16, 0),
(18, 17, 0),
(19, 9, 0),
(19, 10, 0),
(19, 11, 0),
(19, 12, 0),
(19, 13, 0),
(19, 14, 0),
(19, 15, 0),
(19, 16, 0),
(19, 17, 0),
(20, 9, 0),
(20, 10, 0),
(20, 11, 0),
(20, 12, 0),
(20, 13, 0),
(20, 14, 0),
(20, 15, 0),
(20, 16, 0),
(20, 17, 0),
(21, 9, 0),
(21, 10, 0),
(21, 11, 0),
(21, 12, 0),
(21, 14, 0),
(21, 15, 0),
(21, 16, 0),
(21, 17, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contributor_master`
--

CREATE TABLE `contributor_master` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `photo_name` varchar(255) NOT NULL DEFAULT 'user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contributor_master`
--

INSERT INTO `contributor_master` (`id`, `name`, `email`, `password`, `address`, `city`, `state`, `photo_name`) VALUES
(9, 'Mad Over Grills', 'mog@123', '234', '110, SAFAL ARISE , NR, Kubereshwar Mahadev Marg, ShreePalli society, Manjalpur, Vadodara, Gujarat 390011', 'Vadodara', 'Gujarat', 'user.png'),
(10, 'Mosaic', 'Mosaic@palace', '234', 'Crowne Plaza 2, Swarn Jayanti Park, Sector 10, Rohini, Delhi, 110085', 'New Delhi', 'Delhi', 'user.png'),
(11, 'Kiyan, The Roseate', 'Kiyan23Roseate@gmail.com', '234', 'near IGI Airport, NH-8, D Block, Samalka, New Delhi, Delhi 110037', 'New Delhi', 'Delhi', 'user.png'),
(12, 'MKT', '23rdMKT@gmail.com', '234', 'Lower Ground Floor, The Chanakya Mall Yashwant Place Community Centre ,Opposite Chanakyapuri Post Office, New Delhi 110021 India', 'New Delhi', 'Delhi', 'user.png'),
(13, 'Cafe G', 'CafeGlocal@gmail.com', '234', 'Crowne Plaza Gurgaon Site No 2 Sector 29, Opposite Signature Tower, Gurugram (Gurgaon) 122001 India', 'Gurugram', 'Gurgaon', 'user.png'),
(14, 'Steam', 'steamEnjin12@gmail.com', '234', 'Ground Floor Bhawani Singh Road, Jaipur 302005 India', 'jaipur', 'Rajasthan', 'user.png'),
(15, 'Spice Kitchen', 'spicekitchen23@gmail.com', '234', 'Lobby Level Senapati Bapat Road SB Road, Pune 411038 India', 'pune', ' Maharashtra', 'user.png'),
(16, 'The Druid Garden', 'DruidGarden23@gmail.com', '234', 'Sahakaranagar Main Road 40/1, Century Corbel Commercial, 3rd Floor, Bengaluru 560092 India', 'Bengaluru', 'Karnataka', 'user.png'),
(17, 'Lotus Pavilion', 'PavilionLotus@gmail.com', '234', 'Residency Road ITC Gardenia, Bengaluru 560025 India', 'Bengaluru', 'Karnataka', 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(11) NOT NULL,
  `outgoing_msg_id` int(11) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `public_master`
--

CREATE TABLE `public_master` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `photo_name` varchar(255) NOT NULL DEFAULT 'user.png',
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `public_master`
--

INSERT INTO `public_master` (`id`, `name`, `email`, `Address`, `city`, `state`, `photo_name`, `password`) VALUES
(2, 'mayank', 'mayank@123', 'reedzfcsdxccxsz', 'Vadodara', ' Gujarat ', 'user.png', '456');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `usertype` varchar(100) NOT NULL,
  `user_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `unique_id`, `name`, `email`, `status`, `usertype`, `user_type_id`) VALUES
(5, 628448861, 'icharity', 'info@icharity.in', 'Active now', 'charity', 14),
(6, 256533406, ' AKSHAYA PATRA', 'donorcare@akshayapatra.org', 'Active now', 'charity', 15),
(7, 960196639, 'Feeding India', 'contact@feedingindia.org', 'Active now', 'charity', 16),
(8, 687858158, 'Robin Hood Army', 'info@smilefoundationindia.org', 'Active now', 'charity', 17),
(9, 1044071742, 'SERUDS', 'info@serudsindia.org', 'Active now', 'charity', 18),
(10, 1004480982, 'Goonj', 'mail@goonj.org', 'Active now', 'charity', 19),
(11, 811592829, 'Pratham', 'info@pratham.org', 'Active now', 'charity', 20),
(12, 697573798, ' Give India Foundation', 'Give@IndiaFoundation', 'Active now', 'charity', 21),
(13, 1267675354, 'Mad Over Grills', 'mog@123', 'Active now', 'contributor', 9),
(14, 748831609, 'Mosaic', 'Mosaic@palace', 'Active now', 'contributor', 10),
(15, 777162532, 'Kiyan, The Roseate', 'Kiyan23Roseate@gmail.com', 'Active now', 'contributor', 11),
(16, 814569208, 'MKT', '23rdMKT@gmail.com', 'Active now', 'contributor', 12),
(17, 331550224, 'Cafe G', 'CafeGlocal@gmail.com', 'Active now', 'contributor', 13),
(18, 1533712745, 'Steam', 'steamEnjin12@gmail.com', 'Active now', 'contributor', 14),
(19, 413051412, 'Spice Kitchen', 'spicekitchen23@gmail.com', 'Active now', 'contributor', 15),
(20, 1200892321, 'The Druid Garden', 'DruidGarden23@gmail.com', 'Active now', 'contributor', 16),
(21, 646193005, 'Lotus Pavilion', 'PavilionLotus@gmail.com', 'Active now', 'contributor', 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `charity_like`
--
ALTER TABLE `charity_like`
  ADD PRIMARY KEY (`charity_id`,`contributor_id`),
  ADD KEY `contibutor_id` (`contributor_id`);

--
-- Indexes for table `charity_master`
--
ALTER TABLE `charity_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `charity_email` (`email`);

--
-- Indexes for table `charity_request_contributor`
--
ALTER TABLE `charity_request_contributor`
  ADD PRIMARY KEY (`charity_id`,`contributor_id`),
  ADD KEY `contibutorRequest_id` (`contributor_id`);

--
-- Indexes for table `contributor_master`
--
ALTER TABLE `contributor_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique_contributor` (`email`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `public_master`
--
ALTER TABLE `public_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `charity_master`
--
ALTER TABLE `charity_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `contributor_master`
--
ALTER TABLE `contributor_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `public_master`
--
ALTER TABLE `public_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `charity_like`
--
ALTER TABLE `charity_like`
  ADD CONSTRAINT `charity_like_ibfk_1` FOREIGN KEY (`charity_id`) REFERENCES `charity_master` (`id`),
  ADD CONSTRAINT `charity_like_ibfk_2` FOREIGN KEY (`contributor_id`) REFERENCES `contributor_master` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
