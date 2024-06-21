-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2023 at 03:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salonbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(21) NOT NULL,
  `fullName` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL COMMENT 'M=Male ,F=Female',
  `contact` bigint(21) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `services` varchar(500) DEFAULT NULL,
  `staffs` varchar(500) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `timet` varchar(100) DEFAULT NULL,
  `bookingDate` datetime DEFAULT current_timestamp(),
  `bookStatus` enum('0','1','2','3','4') NOT NULL DEFAULT '0' COMMENT '0=Booking Placed.\r\n1=Service Completed.\r\n2=Booking Missed.\r\n3=Booking Denied.\r\n4=Booking Cancelled.',
  `paymentMode` varchar(500) DEFAULT NULL,
  `user_id` int(100) DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `fullName`, `email`, `address`, `gender`, `contact`, `date`, `time`, `services`, `staffs`, `price`, `timet`, `bookingDate`, `bookStatus`, `paymentMode`, `user_id`, `sort_order`) VALUES
(127, 'booker', 'asd@asd', 'fasfasfasf', 'Male', 9815325525, '2023-09-01', '9:00 AM', 'Normal Makeover', 'Jane Smith', 'Rs 1500', '45 minutes', '2023-08-09 09:10:24', '0', NULL, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contactId` int(21) NOT NULL,
  `userId` int(21) NOT NULL,
  `email` varchar(35) NOT NULL,
  `phoneNo` bigint(21) NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactId`, `userId`, `email`, `phoneNo`, `message`, `time`) VALUES
(2, 5, 'baruwal20@gmail.com', 9812411241, ' yoyoyoyo', '2023-05-23 15:07:38'),
(3, 13, 'baruwal20@gmail.com', 9812411241, 'hi hello', '2023-06-07 15:15:28'),
(4, 2, 'baruwal20@gmail.com', 9812411241, 'testing', '2023-06-29 08:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `contactreply`
--

CREATE TABLE `contactreply` (
  `id` int(21) NOT NULL,
  `contactId` int(21) NOT NULL,
  `userId` int(23) NOT NULL,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactreply`
--

INSERT INTO `contactreply` (`id`, `contactId`, `userId`, `message`, `datetime`) VALUES
(2, 2, 5, 'yoyoyo\r\n', '2023-06-04 19:17:44'),
(3, 3, 13, 'yesssss', '2023-06-07 15:16:30'),
(4, 4, 2, 'test complete\r\n', '2023-06-29 08:11:01');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `serviceid` int(11) NOT NULL,
  `services` varchar(500) NOT NULL,
  `price` varchar(50) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `serviceDesc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`serviceid`, `services`, `price`, `duration`, `serviceDesc`) VALUES
(1, 'Hair colour', 'Rs 1000', '1 hours', 'Our online booking system offers a wide selection of hair colors to choose from, allowing you to find the perfect shade that matches your style and preferences. Whether you desire a natural look or want to experiment with bold and vibrant colors, our extensive color palette has something for everyone. With visual inspiration, expert recommendations, and real-time availability of appointments, our user-friendly interface makes it easy to select a hair color, customize your look, and schedule an a'),
(2, 'Beard Cutting', 'Rs 1500', '45 minutes', 'Our beard cutting services are tailored to deliver a precise and polished look for your facial hair. Our skilled barbers are equipped with the expertise and precision tools to shape and trim your beard, ensuring clean lines and a well-groomed appearance. Experience a professional beard cutting experience that will leave you with a refined and distinguished look, ready to conquer any occasion.'),
(3, 'Nail Treatment', 'Rs 1500', '45 minutes', 'Indulge in our nail treatment services for shorter, well-maintained nails that exude elegance. Our skilled nail technicians provide expert care and attention to detail, ensuring your nails are trimmed and shaped to perfection. Experience a relaxing and rejuvenating treatment that leaves your nails looking impeccably groomed and ready to make a polished impression.'),
(4, 'Hair cut', 'Rs 500', '30 minutes', 'Get a stylish and tailored hair cut that perfectly suits your preferences and enhances your natural features. Our skilled hairstylists specialize in creating shorter haircuts that are trendy, modern, and easy to maintain. Whether you\'re looking for a classic bob, a chic pixie cut, or a stylish fade, our experienced team will provide meticulous attention to detail to achieve a flawless result. Step into our salon and let us transform your look with a shorter hair cut that exudes confidence and co'),
(5, 'Hair DIY', 'Rs 1500', '1 hour', 'Take control of your style with our DIY hair solutions for shorter hair. Our comprehensive guides and tutorials provide step-by-step instructions to help you achieve salon-worthy results from the comfort of your own home. From simple trims to creative styling techniques, we empower you to experiment and express your unique personality through your shorter hair. Embrace the freedom and creativity of DIY hair care, and discover the joy of mastering your own stylish looks without the need for a pro'),
(6, 'Normal Makeover', 'Rs 1500', '45 minutes', 'Transform your look with a normal makeover designed specifically for shorter hair. Our experienced stylists are skilled in crafting stunning makeovers that accentuate your features and reflect your personal style. From trendy cuts to vibrant colors, we offer a range of options to revitalize your shorter hair and create a fresh, confident look. Step into our salon and let our team of experts work their magic, leaving you feeling rejuvenated and ready to make a bold impression.'),
(7, 'Manicure & Pedicure', 'Rs 2000', '1 hour', 'Pamper your hands and feet with our luxurious manicure and pedicure services tailored for shorter nails. Our skilled nail technicians provide meticulous care and attention to detail, ensuring your nails are expertly shaped, buffed, and polished. Relax in our comfortable spa environment as we nourish and hydrate your skin, leaving your hands and feet feeling refreshed and revitalized. Treat yourself to a manicure and pedicure experience that enhances the beauty of your shorter nails and leaves yo'),
(8, 'NailArt', 'Rs 1500', '45 minutes', 'Nail art is a creative way to paint, decorate, enhance, and embellish nails. It is a type of artwork that can be done on fingernails and toenails, usually after manicures or pedicures.');

-- --------------------------------------------------------

--
-- Table structure for table `sitedetail`
--

CREATE TABLE `sitedetail` (
  `tempId` int(11) NOT NULL,
  `systemName` varchar(21) NOT NULL,
  `email` varchar(35) NOT NULL,
  `contact1` bigint(21) NOT NULL,
  `contact2` bigint(21) DEFAULT NULL COMMENT 'Optional',
  `address` text NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sitedetail`
--

INSERT INTO `sitedetail` (`tempId`, `systemName`, `email`, `contact1`, `contact2`, `address`, `dateTime`) VALUES
(1, 'Salon Booking', 'SalonBooking@gmail.com', 9815325525, 9816545645, 'Itahari, Sunsari , Province 1', '2023-05-15 19:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `staffdetails`
--

CREATE TABLE `staffdetails` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact` int(20) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staffdetails`
--

INSERT INTO `staffdetails` (`id`, `name`, `email`, `address`, `contact`, `description`) VALUES
(1, 'Rajendra Acharya', 'Rajendra@gmail.com', 'Itahari-8', 981532155, 'very very \r\nNice'),
(2, 'Sunita Rai', 'SunitaRai@gmail.com', 'Dharan-15', 981254788, 'Good'),
(3, 'John Doe', 'johndoe@example.com', '123 Main Street', 1234567890, 'Experienced stylist specializing in haircuts.'),
(4, 'Jane Smith', 'janesmith@example.com', '456 Elm Avenue', 2147483647, 'Skilled colorist with expertise in balayage techniques.'),
(5, 'Michael Johnson', 'michaeljohnson@example.com', '789 Oak Lane', 2147483647, 'Talented makeup artist for special occasions.'),
(6, 'Emily Brown', 'emilybrown@example.com', '321 Pine Road', 2147483647, 'Experienced esthetician offering a range of skincare treatments.'),
(13, 'dummyy', 'dummy@gmail.com', 'itaharu', 2147483647, 'dummy');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(21) NOT NULL,
  `username` varchar(21) DEFAULT NULL,
  `fullName` varchar(21) DEFAULT NULL,
  `email` varchar(35) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `userType` enum('0','1') DEFAULT '0' COMMENT '0=user\r\n1=admin',
  `password` varchar(255) DEFAULT NULL,
  `joinDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullName`, `email`, `phone`, `userType`, `password`, `joinDate`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 1111111111, '1', '$2y$10$AAfxRFOYbl7FdN17rN3fgeiPu/xQrx6MnvRGzqjVHlGqHAM4d9T1i', '2021-04-11 11:40:58'),
(2, 'nnnnn', 'Aman.B', 'baruwal20@gmail.com', 9812411241, '0', '$2y$10$nJIhWFFtG3ItACR/EupXeuEMp9HHfm09O766He1gipyVyno5i/loy', '2023-06-04 19:31:01'),
(15, 'testing', 'test', 'test@gmail.com', 9812411241, '0', '$2y$10$5Qeopjn0hLnzCi1yKm5y/.lFc1t5Yka5rLljp.pc9cAqyT89Qrwpy', '2023-06-23 18:46:31'),
(16, 'donald', 'donald trump', 'sadiksha@gmail.com', 9810850614, '0', '$2y$10$tn/eBf8aaarte.DxSWGm/.ZMng1rxWw1WW36XfU/lQ4EszqCuav5a', '2023-06-30 08:20:47'),
(17, 'Sadiksha', 'sadiksha baniya', 'sadiksha@gmail.com', 9825100000, '0', '$2y$10$O7msYbc3iZaMhLMoz7I71eF9NvRXPV8aYUDSPYvLIbDHAQWti.C0C', '2023-06-30 09:22:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactId`);

--
-- Indexes for table `contactreply`
--
ALTER TABLE `contactreply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`serviceid`);

--
-- Indexes for table `sitedetail`
--
ALTER TABLE `sitedetail`
  ADD PRIMARY KEY (`tempId`);

--
-- Indexes for table `staffdetails`
--
ALTER TABLE `staffdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactId` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contactreply`
--
ALTER TABLE `contactreply`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `serviceid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sitedetail`
--
ALTER TABLE `sitedetail`
  MODIFY `tempId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staffdetails`
--
ALTER TABLE `staffdetails`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(21) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
