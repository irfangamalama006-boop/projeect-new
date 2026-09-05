-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2026 at 05:33 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas_lowongan`
--

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE `lowongan` (
  `id` bigint(20) NOT NULL,
  `perusahaan` varchar(100) NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `kualifikasi` text NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `gaji` varchar(50) DEFAULT NULL,
  `tanggal_buka` date NOT NULL,
  `tanggal_tutup` date NOT NULL,
  `gambar_perusahaan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`id`, `perusahaan`, `posisi`, `deskripsi`, `kualifikasi`, `lokasi`, `gaji`, `tanggal_buka`, `tanggal_tutup`, `gambar_perusahaan`, `created_at`, `updated_at`) VALUES
(251011700846, 'PT Teknologi Maju', 'Programmer Web', 'Mengembangkan aplikasi web menggunakan PHP dan MySQL', 'Menguasai PHP, MySQL, HTML, CSS, JavaScript', 'Jakarta', 'Rp 5.000.000 - Rp 7.000.000', '2025-07-01', '2025-08-01', 'logo_tekno.png', '2026-07-02 14:07:06', '2026-07-02 14:07:06'),
(251011700847, 'CV Kreasi Digital', 'UI/UX Designer', 'Mendesain antarmuka pengguna yang menarik', 'Mahir Figma, Adobe XD, prototyping', 'Bandung', 'Rp 4.500.000 - Rp 6.000.000', '2025-07-05', '2025-08-15', NULL, '2026-07-02 14:07:06', '2026-07-02 14:07:06'),
(251011700848, 'Startup Edukasi', 'Data Analyst', 'Menganalisis data pembelajaran untuk pengambilan keputusan', 'Python, SQL, statistik', 'Yogyakarta', 'Rp 6.000.000 - Rp 8.000.000', '2025-07-10', '2025-08-20', NULL, '2026-07-02 14:07:06', '2026-07-02 14:07:06'),
(251011700850, 'PT Media Nusantara', 'Content Writer', 'Menulis konten digital untuk platform edukasi-tes', 'Bahasa Indonesia baik, SEO dasar', 'Jakarta', 'Rp 4.000.000 - Rp 5.500.000', '2025-07-20', '2025-08-30', '1783002326_b9f17c38.jpg', '2026-07-02 14:07:06', '2026-07-02 14:25:26'),
(251011700853, 'CV.Irfan Jaya', 'Manager', 'rapih, gigih,putih', 'Sarjana Hukum', 'Jakarta', 'Rp 5.000.000 - Rp 7.500.000', '2026-07-02', '2026-07-23', '1783004112_e76d8fd1.jpg', '2026-07-02 14:55:12', '2026-07-02 14:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'irfan', '$2y$10$/xWApSlWgT6ME.Fm5jXgF.PgGB4i3oTfioceoDpBc8WalWwgvhpjG', 'irfan maulana');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251011700854;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
