-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2025 at 01:53 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jasa`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `service_id`, `created_at`, `amount`, `status`) VALUES
(30, 4, 2, '2025-05-21 09:39:50', 35000, 'completed'),
(31, 4, 5, '2025-05-21 09:44:32', 80000, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `card_name` varchar(100) NOT NULL,
  `card_number` varchar(20) NOT NULL,
  `exp_date` varchar(10) NOT NULL,
  `cvv` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `order_id`, `payment_method`, `card_name`, `card_number`, `exp_date`, `cvv`, `created_at`) VALUES
(14, 30, 'Credit/Debit Card', 'bca', '123', '123', '123', '2025-05-21 07:39:50'),
(15, 31, 'Credit/Debit Card', 'casc', 'asdas', 'asd', 'asd', '2025-05-21 07:44:32');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id_profile` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat_lengkap` text DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jmlh_pesanan_selesai` int(11) DEFAULT 0,
  `jmlh_pesanan_dibuat` int(11) DEFAULT 0,
  `profile_image` varchar(255) DEFAULT NULL,
  `kecamatan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id_profile`, `id`, `phone_number`, `email`, `alamat_lengkap`, `kota`, `kode_pos`, `tanggal_lahir`, `jmlh_pesanan_selesai`, `jmlh_pesanan_dibuat`, `profile_image`, `kecamatan`) VALUES
(1, 4, '085738979920', 'naufal71k@gmail.com', 'jln sunan giri 4 blok G 20 ', 'Kota Mataram', '83111', '2004-11-15', 0, 0, 'uploads/user_4_1747813542.png', 'Mataram'),
(2, 1, '123', 'dael1@gmail.com', 'perumnas', 'Kota Mataram', '83111', '2005-11-11', 0, 0, 'uploads/user_1_1747790659.png', 'Sekarbela');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `price`) VALUES
(1, 'Ac Service', 'Kami menyediakan layanan perbaikan, pemasangan, dan servis AC secara profesional. Tim kami akan memastikan AC Anda berfungsi dengan optimal, sehingga udara di rumah selalu sejuk dan nyaman. Layanan ini mencakup pengecekan sistem, penggantian filter, hingga perbaikan komponen AC yang rusak.', 50000),
(2, 'Cleaning Service', 'Jasa pembersihan rumah dan kantor', 35000),
(3, 'Service Mesin Cuci', 'Jasa perbaikan listrik', 75000),
(4, 'Service Tv', 'Kami menyediakan layanan perbaikan, pemasangan, dan servis AC secara profesional. Tim kami akan memastikan AC Anda berfungsi dengan optimal, sehingga udara di rumah selalu sejuk dan nyaman. Layanan ini mencakup pengecekan sistem, penggantian filter, hingga perbaikan komponen AC yang rusak.', 60000),
(5, 'Tukang cat', 'Kami menyediakan layanan perbaikan, pemasangan, dan servis AC secara profesional. Tim kami akan memastikan AC Anda berfungsi dengan optimal, sehingga udara di rumah selalu sejuk dan nyaman. Layanan ini mencakup pengecekan sistem, penggantian filter, hingga perbaikan komponen AC yang rusak.', 80000),
(6, 'Tukang Kebun', 'Jasa pembasmian hama', 45000);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `testimonial_text` text NOT NULL,
  `status` enum('pending','published','rejected') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `orders_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `user_id`, `service_id`, `testimonial_text`, `status`, `created_at`, `orders_id`) VALUES
(8, 4, 1, 'AC di rumah saya sebelumnya tidak dingin sama sekali, tapi setelah diservis oleh tim ini, langsung dingin maksimal! Pelayanannya cepat, ramah, dan sangat profesional. Recommended banget!', 'published', '2025-05-19 06:43:39', NULL),
(9, 1, 2, '“Saya sangat puas dengan hasil cleaning-nya. Rumah jadi bersih, wangi, dan rapi seperti baru! Petugasnya sopan dan teliti. Terima kasih sudah bikin rumah saya nyaman lagi!', 'pending', '2025-05-19 06:44:17', NULL),
(14, 4, 1, 'wowo disini mantap banget\r\n', 'pending', '2025-05-21 07:44:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'dael1', 'dael1@gmail.com', 'dael1'),
(2, 'erin', 'erin@gmail.com', ''),
(3, 'farid', 'farid@gmail.com', ''),
(4, 'naufal', 'naufal71k@gmail.com', 'naufal'),
(5, 'cindy', 'cindy@gmail.com', ''),
(6, 'didi', 'didi@gmail.com', ''),
(7, 'sultan', 'sultan@gmail.com', ''),
(8, 'admin', 'admin@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `fk_orders_id` (`orders_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Constraints for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD CONSTRAINT `payment_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `fk_orders_id` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `testimonials_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `testimonials_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
