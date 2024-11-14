-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Nov 2024 pada 05.27
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pembagian_ip`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `computers`
--

CREATE TABLE `computers` (
  `id` int(11) NOT NULL,
  `room_id` int(11) DEFAULT NULL,
  `computer_name` varchar(50) NOT NULL,
  `ip_address` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `computers`
--

INSERT INTO `computers` (`id`, `room_id`, `computer_name`, `ip_address`) VALUES
(112, 5, 'Komputer 1', '192.168.1.1'),
(113, 5, 'Komputer 2', '192.168.1.2'),
(114, 5, 'Komputer 3', '192.168.1.3'),
(115, 5, 'Komputer 4', '192.168.1.4'),
(116, 5, 'Komputer 5', '192.168.1.5'),
(117, 5, 'Komputer 6', '192.168.1.6'),
(118, 5, 'Komputer 7', '192.168.1.7'),
(119, 5, 'Komputer 8', '192.168.1.8'),
(120, 5, 'Komputer 9', '192.168.1.9'),
(121, 5, 'Komputer 10', '192.168.1.10'),
(122, 5, 'Komputer 11', '192.168.1.11'),
(123, 5, 'Komputer 12', '192.168.1.12'),
(124, 5, 'Komputer 13', '192.168.1.13'),
(125, 5, 'Komputer 14', '192.168.1.14'),
(126, 5, 'Komputer 15', '192.168.1.15'),
(127, 5, 'Komputer 16', '192.168.1.16'),
(128, 5, 'Komputer 17', '192.168.1.17'),
(129, 5, 'Komputer 18', '192.168.1.18'),
(130, 5, 'Komputer 19', '192.168.1.19'),
(131, 5, 'Komputer 20', '192.168.1.20'),
(132, 5, 'Komputer 21', '192.168.1.21'),
(133, 5, 'Komputer 22', '192.168.1.22'),
(134, 5, 'Komputer 23', '192.168.1.23'),
(135, 5, 'Komputer 24', '192.168.1.24'),
(136, 5, 'Komputer 25', '192.168.1.25'),
(137, 5, 'Komputer 26', '192.168.1.26'),
(138, 5, 'Komputer 27', '192.168.1.27'),
(139, 5, 'Komputer 28', '192.168.1.28'),
(140, 5, 'Komputer 29', '192.168.1.29'),
(141, 5, 'Komputer 30', '192.168.1.30'),
(142, 5, 'Komputer 31', '192.168.1.31'),
(143, 5, 'Komputer 32', '192.168.1.32'),
(144, 5, 'Komputer 33', '192.168.1.33'),
(145, 5, 'Komputer 34', '192.168.1.34'),
(146, 5, 'Komputer 35', '192.168.1.35'),
(147, 5, 'Komputer 36', '192.168.1.36'),
(148, 5, 'Komputer 37', '192.168.1.37'),
(149, 5, 'Komputer 38', '192.168.1.38'),
(150, 5, 'Komputer 39', '192.168.1.39'),
(151, 5, 'Komputer 40', '192.168.1.40'),
(152, 5, 'Komputer 41', '192.168.1.41'),
(153, 5, 'Komputer 42', '192.168.1.42'),
(154, 5, 'Komputer 43', '192.168.1.43'),
(155, 5, 'Komputer 44', '192.168.1.44'),
(156, 5, 'Komputer 45', '192.168.1.45'),
(157, 5, 'Komputer 46', '192.168.1.46'),
(158, 5, 'Komputer 47', '192.168.1.47'),
(159, 5, 'Komputer 48', '192.168.1.48'),
(160, 5, 'Komputer 49', '192.168.1.49'),
(161, 5, 'Komputer 50', '192.168.1.50'),
(162, 5, 'Komputer 51', '192.168.1.51'),
(163, 5, 'Komputer 52', '192.168.1.52'),
(164, 5, 'Komputer 53', '192.168.1.53'),
(165, 5, 'Komputer 54', '192.168.1.54'),
(166, 5, 'Komputer 55', '192.168.1.55'),
(167, 5, 'Komputer 56', '192.168.1.56'),
(168, 5, 'Komputer 57', '192.168.1.57'),
(169, 5, 'Komputer 58', '192.168.1.58'),
(170, 5, 'Komputer 59', '192.168.1.59'),
(171, 5, 'Komputer 60', '192.168.1.60'),
(172, 5, 'Komputer 61', '192.168.1.61'),
(173, 5, 'Komputer 62', '192.168.1.62'),
(174, 5, 'Komputer 63', '192.168.1.63'),
(175, 5, 'Komputer 64', '192.168.1.64'),
(176, 5, 'Komputer 65', '192.168.1.65'),
(177, 5, 'Komputer 66', '192.168.1.66'),
(178, 5, 'Komputer 67', '192.168.1.67'),
(179, 5, 'Komputer 68', '192.168.1.68'),
(180, 5, 'Komputer 69', '192.168.1.69'),
(181, 5, 'Komputer 70', '192.168.1.70'),
(182, 5, 'Komputer 71', '192.168.1.71'),
(183, 5, 'Komputer 72', '192.168.1.72'),
(184, 5, 'Komputer 73', '192.168.1.73'),
(185, 5, 'Komputer 74', '192.168.1.74'),
(186, 5, 'Komputer 75', '192.168.1.75'),
(187, 5, 'Komputer 76', '192.168.1.76'),
(188, 5, 'Komputer 77', '192.168.1.77'),
(189, 5, 'Komputer 78', '192.168.1.78'),
(190, 5, 'Komputer 79', '192.168.1.79'),
(191, 5, 'Komputer 80', '192.168.1.80'),
(192, 5, 'Komputer 81', '192.168.1.81'),
(193, 5, 'Komputer 82', '192.168.1.82'),
(194, 5, 'Komputer 83', '192.168.1.83'),
(195, 5, 'Komputer 84', '192.168.1.84'),
(196, 5, 'Komputer 85', '192.168.1.85'),
(197, 5, 'Komputer 86', '192.168.1.86'),
(198, 5, 'Komputer 87', '192.168.1.87'),
(199, 5, 'Komputer 88', '192.168.1.88'),
(200, 5, 'Komputer 89', '192.168.1.89'),
(201, 5, 'Komputer 90', '192.168.1.90'),
(202, 5, 'Komputer 91', '192.168.1.91'),
(203, 5, 'Komputer 92', '192.168.1.92'),
(204, 5, 'Komputer 93', '192.168.1.93'),
(205, 5, 'Komputer 94', '192.168.1.94'),
(206, 5, 'Komputer 95', '192.168.1.95'),
(207, 5, 'Komputer 96', '192.168.1.96'),
(208, 5, 'Komputer 97', '192.168.1.97'),
(209, 5, 'Komputer 98', '192.168.1.98'),
(210, 5, 'Komputer 99', '192.168.1.99'),
(211, 5, 'Komputer 100', '192.168.1.100'),
(212, 6, '123', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `created_at`) VALUES
(5, 'POLI GIGI', '2024-11-14 03:58:57'),
(6, 'LOBI', '2024-11-14 04:00:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'dsasfdsbvzdsfvasdv', '$2y$10$T7JZJzTVPl2/vQtVr2E08O7GDJM2MJVft/BwKTiwzcY/KB1gVyCGm'),
(2, '123', '$2y$10$IhFX2I9ZuAYmff9AIH5ZuOveEqRPCXgUqcu1iAb7O8m4aPDgjUywG'),
(3, '1234', '$2y$10$RT7jNh7.eJpVcLaT5ONaZehRRs0RC0Mw45cfWDZlYF.g40sJr76x6'),
(4, 'h123', '$2y$10$9yCxLot/hv4n9Sjignju.uk8cOScuDdWtTGbhnaJ0nRe/TBqE0b9a');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `computers`
--
ALTER TABLE `computers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indeks untuk tabel `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `computers`
--
ALTER TABLE `computers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT untuk tabel `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `computers`
--
ALTER TABLE `computers`
  ADD CONSTRAINT `computers_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
s