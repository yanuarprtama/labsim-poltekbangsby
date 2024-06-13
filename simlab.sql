-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jun 2024 pada 04.47
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simlab`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alats`
--

CREATE TABLE `alats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `lab` varchar(255) NOT NULL,
  `status` enum('TERSEDIA','TIDAK TERSEDIA') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Struktur dari tabel `kritik`
--

CREATE TABLE `kritik` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kritik` varchar(255) DEFAULT NULL,
  `saran` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuesioner`
--

CREATE TABLE `kuesioner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pertanyaan` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `labs`
--

CREATE TABLE `labs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `virtualtour_url` varchar(255) DEFAULT NULL,
  `prodi_id` varchar(255) DEFAULT NULL,
  `status_ketersediaan` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporankerusakans`
--

CREATE TABLE `laporankerusakans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_laporan` varchar(255) DEFAULT NULL,
  `kode_item` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `kategori_kerusakan` enum('RINGAN','SEDANG','BERAT') DEFAULT NULL,
  `uraian` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_14_015145_create_labs_table', 1),
(6, '2024_05_14_021659_create_alats_table', 1),
(7, '2024_05_14_025233_create_prodis_table', 1),
(8, '2024_05_14_151903_create_kuesioner_table', 1),
(9, '2024_05_14_152105_create_kritik_table', 1),
(10, '2024_05_14_152341_create_slider_table', 1),
(11, '2024_05_23_063209_create_peminjamanlabs_table', 1),
(12, '2024_05_24_092728_create_laporankerusakans_table', 1),
(13, '2024_05_24_094811_create_perawatanlabs_table', 1),
(14, '2024_05_29_081127_create_perbaikan__alats_table', 1),
(15, '2024_06_07_081203_create_peminjaman_alats_table', 1);

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
-- Struktur dari tabel `peminjamanlabs`
--

CREATE TABLE `peminjamanlabs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lab_id` int(11) DEFAULT NULL,
  `nomor_peminjaman` varchar(255) DEFAULT NULL,
  `mata_kuliah` varchar(255) DEFAULT NULL,
  `waktu_mulai` datetime NOT NULL,
  `waktu_selesai` datetime NOT NULL,
  `course` varchar(255) DEFAULT NULL,
  `praktikum` varchar(255) DEFAULT NULL,
  `dosen_pengajar` varchar(255) DEFAULT NULL,
  `jenis_peminjaman` varchar(255) DEFAULT NULL,
  `jenis_pengguna` varchar(255) DEFAULT NULL,
  `nama_pengguna` varchar(255) DEFAULT NULL,
  `nit_pengguna` varchar(255) DEFAULT NULL,
  `email_pengguna` varchar(255) DEFAULT NULL,
  `jumlah_peserta` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `status` enum('PENDING','DITERIMA','DIKEMBALIKAN','DITOLAK','KADALUWARSA') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman_alats`
--

CREATE TABLE `peminjaman_alats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_peminjaman` varchar(225) DEFAULT NULL,
  `kode_item` varchar(225) DEFAULT NULL,
  `nama_pengguna` varchar(225) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `kondisi` varchar(225) DEFAULT NULL,
  `status` enum('DITERIMA','PENDING','DITOLAK','DIKEMBALIKAN') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perawatanlabs`
--

CREATE TABLE `perawatanlabs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_lab` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `jenis_perawatan` enum('RINGAN','SEDANG','BERAT') NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status` enum('PENDING','SELESAI','BATAL') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perbaikan_alats`
--

CREATE TABLE `perbaikan_alats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_laporan` varchar(255) DEFAULT NULL,
  `kode_item` varchar(255) DEFAULT NULL,
  `tanggal_perbaikan` date DEFAULT NULL,
  `kategori` enum('RINGAN','SEDANG','BERAT') DEFAULT NULL,
  `penyebab` varchar(255) DEFAULT NULL,
  `tindakan_perbaikan` varchar(255) DEFAULT NULL,
  `kode_hambatan` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodis`
--

CREATE TABLE `prodis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status` enum('AKTIF','TIDAK AKTIF') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `prodis`
--

INSERT INTO `prodis` (`id`, `kode`, `nama`, `deskripsi`, `gambar`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ADM', 'Admin', 'Khusus Admin', NULL, 'AKTIF', '2024-06-11 22:18:35', '2024-06-11 22:18:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nomorinduk` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `jenis_pengguna` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `nomorinduk`, `password`, `role`, `prodi`, `jenis_pengguna`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Lab', '1', '$2y$12$DXlpGOuXRNLrzJU5eRh6ZOHmHBatsaVe2psSFerbXO9aCZyPE0uca', 'Super Admin', '1', 'Admin Lab', NULL, NULL, '2024-06-11 22:36:40');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alats`
--
ALTER TABLE `alats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alats_kode_unique` (`kode`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kritik`
--
ALTER TABLE `kritik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kuesioner`
--
ALTER TABLE `kuesioner`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `labs`
--
ALTER TABLE `labs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `labs_kode_unique` (`kode`);

--
-- Indeks untuk tabel `laporankerusakans`
--
ALTER TABLE `laporankerusakans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `peminjamanlabs`
--
ALTER TABLE `peminjamanlabs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `peminjaman_alats`
--
ALTER TABLE `peminjaman_alats`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perawatanlabs`
--
ALTER TABLE `perawatanlabs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perbaikan_alats`
--
ALTER TABLE `perbaikan_alats`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `prodis`
--
ALTER TABLE `prodis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prodis_kode_unique` (`kode`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nomorinduk_unique` (`nomorinduk`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alats`
--
ALTER TABLE `alats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kritik`
--
ALTER TABLE `kritik`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kuesioner`
--
ALTER TABLE `kuesioner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `labs`
--
ALTER TABLE `labs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `laporankerusakans`
--
ALTER TABLE `laporankerusakans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `peminjamanlabs`
--
ALTER TABLE `peminjamanlabs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `peminjaman_alats`
--
ALTER TABLE `peminjaman_alats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perawatanlabs`
--
ALTER TABLE `perawatanlabs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perbaikan_alats`
--
ALTER TABLE `perbaikan_alats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `prodis`
--
ALTER TABLE `prodis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

DELIMITER $$
--
-- Event
--
CREATE DEFINER=`root`@`localhost` EVENT `delete_old_records` ON SCHEDULE EVERY 1 DAY STARTS '2024-06-06 00:58:08' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM kritik
WHERE created_at < NOW() - INTERVAL 1 YEAR$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
