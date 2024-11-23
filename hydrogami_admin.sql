-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Nov 2024 pada 09.58
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
-- Database: `hydrogami_admin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `foto_profil` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'Admin HydroGami',
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `email`, `foto_profil`, `role`, `password`, `created_at`, `updated_at`) VALUES
(1, 'adminzz', 'admin@if.local', NULL, 'Admin HydroGami', '$2y$12$0HE6vD54u4QTPrs8kdp/0uMhtZEDkBIzqB57RTmATUZiOdvT6sxzK', '2024-11-20 06:47:41', '2024-11-23 01:15:57'),
(2, 'admin2', 'admin2@if.local', NULL, 'Admin HydroGami', '$2y$12$e/plNVLj5tdNKSBNWQ9hRO6EhdH24H4qEvW07WNIY5YMdBBM0D3iq', '2024-11-20 08:37:06', '2024-11-20 08:37:06'),
(3, 'Citra', 'citra@gmail.com', NULL, 'Admin HydroGami', '$2y$12$DblBryph.9Z38OJj/8y2r.HGsCDTkIenoyIs/Y3SQeDvN4Ck68E2C', '2024-11-20 11:11:25', '2024-11-20 11:11:25'),
(4, 'citra2', 'citra2@gmail.com', NULL, 'Admin HydroGami', '$2y$12$o5KVGxlodgm5x.sGLuHmquDWcFt17Eg7BzTdd0FJIsY0WizbbQgR.', '2024-11-20 11:22:15', '2024-11-20 11:22:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '0001_01_01_000000_create_users_table', 1),
(5, '0001_01_01_000001_create_cache_table', 1),
(6, '0001_01_01_000002_create_jobs_table', 1),
(7, '2024_11_10_161238_modify_misi_table', 2),
(8, '2024_11_15_034713_add_role_to_users_table', 3),
(9, '2024_11_15_040647_update_users_role', 4),
(10, '2024_11_15_053828_add_profile_image_to_users_table', 5),
(11, '2024_11_18_040641_create_panduan_table', 6),
(12, '2024_11_19_102633_update_misi_table', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `misi`
--

CREATE TABLE `misi` (
  `id_misi` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nama_misi` varchar(255) NOT NULL,
  `deskripsi_misi` text NOT NULL,
  `status_misi` varchar(50) NOT NULL,
  `poin` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `misi`
--

INSERT INTO `misi` (`id_misi`, `id_admin`, `nama_misi`, `deskripsi_misi`, `status_misi`, `poin`, `created_at`, `updated_at`) VALUES
(1, 1, 'Control Automatic', 'Kontrol tanaman hidroponik pakcoy otomatis dari aplikasi hydrogami', 'aktif', 200, '2024-11-20 17:23:20', '2024-11-20 17:23:20'),
(2, 1, 'Control AB Mix', 'Menambahkan pupuk serta nutrisi pada tanaman hiroponik pakcoy hoho', 'tidak aktif', 300, '2024-11-20 17:24:06', '2024-11-23 01:02:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `panduan`
--

CREATE TABLE `panduan` (
  `id_panduan` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `desk_panduan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `panduan`
--

INSERT INTO `panduan` (`id_panduan`, `id_admin`, `gambar`, `video`, `judul`, `desk_panduan`) VALUES
(1, 1, 'panduan_images/WyMiDTZItdGFVd45li5D1wvkboPMfHrfudAS1Sug.jpg', 'https://youtu.be/ae1LVmOpKjU?si=2JxZbTJQeOSQ4db5', 'Pemasangan pipa dan sensor hidroponikk', 'Jika masih tidak berhasil, coba buka file log lebih mendalam atau beri tahu saya pesan error yang muncul agar bisa mencari solusi lebih lanjut!'),
(3, 1, 'panduan_images/nlr2x2AQoPaEzP58JNXNIA3tDPJorEEbZMhKA62F.jpg', 'https://youtu.be/LfOe8NCCrQo?si=SAdvewn6A5fH1hTr', 'Panduan Merakit Sistem Hidroponik', 'ALTER TABLE panduan MODIFY id_panduan INT AUTO_INCREMENT;');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `poin` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `poin`
--

CREATE TABLE `poin` (
  `id_poin` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_misi` int(11) NOT NULL,
  `total_poin` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `misi`
--
ALTER TABLE `misi`
  ADD PRIMARY KEY (`id_misi`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `panduan`
--
ALTER TABLE `panduan`
  ADD PRIMARY KEY (`id_panduan`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `poin`
--
ALTER TABLE `poin`
  ADD PRIMARY KEY (`id_poin`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_misi` (`id_misi`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `misi`
--
ALTER TABLE `misi`
  MODIFY `id_misi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `panduan`
--
ALTER TABLE `panduan`
  MODIFY `id_panduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `poin`
--
ALTER TABLE `poin`
  MODIFY `id_poin` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `misi`
--
ALTER TABLE `misi`
  ADD CONSTRAINT `misi_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `panduan`
--
ALTER TABLE `panduan`
  ADD CONSTRAINT `panduan_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Ketidakleluasaan untuk tabel `poin`
--
ALTER TABLE `poin`
  ADD CONSTRAINT `poin_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE,
  ADD CONSTRAINT `poin_ibfk_2` FOREIGN KEY (`id_misi`) REFERENCES `misi` (`id_misi`) ON DELETE CASCADE,
  ADD CONSTRAINT `poin_ibfk_3` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
