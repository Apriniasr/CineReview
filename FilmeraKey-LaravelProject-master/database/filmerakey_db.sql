-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2026 at 04:46 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `filmerakey_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_keys`
--

CREATE TABLE `api_keys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `api_keys`
--

INSERT INTO `api_keys` (`id`, `user_id`, `key`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'YBt9XIgzrVgengRHmlIFJCcqeJECVO55', 'caramel', 'active', '2025-06-08 03:42:42', '2025-06-08 03:42:42'),
(2, 5, 'LKekJrxLzpWc0sf8q4cUYxPUfDz9zc6V', 'tugas 1', 'active', '2025-06-09 03:39:11', '2025-06-09 03:39:11'),
(4, 6, 'EkMD9A1ggKB4uOfx3lw3RoXlilwodv5r', 'Aprinia Salsabila', 'active', '2025-06-11 08:18:07', '2025-06-11 08:18:07'),
(5, 6, 'TTeeSOuvBJIWkOqTkjdqGC0Cp6wNDOFu', 'salsa', 'active', '2025-06-11 19:49:18', '2025-06-11 19:49:18'),
(6, 7, 'RJIVPSdScj3FkU6apbDkizbAAmyCwiEp', 'for trying purpose', 'active', '2026-06-13 20:30:40', '2026-06-13 20:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_06_08_054537_add_api_key_to_users_table', 2),
(7, '2025_06_08_062703_create_api_keys_table', 3),
(8, '2025_06_08_072639_add_name_to_api_keys_table', 4),
(9, '2025_06_08_103734_add_updated_at_to_tbl_films_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `tbl_films`
--

CREATE TABLE `tbl_films` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `director` varchar(100) DEFAULT NULL,
  `release_year` year(4) DEFAULT NULL,
  `synopsis` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `poster_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_films`
--

INSERT INTO `tbl_films` (`id`, `title`, `genre`, `director`, `release_year`, `synopsis`, `created_at`, `updated_at`, `poster_url`) VALUES
(1, 'Inception', 'Sci-Fi', 'Christopher Nolan', '2010', 'A thief who steals corporate secrets through dream-sharing technology is given a task to plant an idea into a target\'s mind.', '2025-04-20 05:29:59', '2025-06-08 03:45:53', 'https://m.media-amazon.com/images/M/MV5BMjAxMzY3NjcxNF5BMl5BanBnXkFtZTcwNTI5OTM0Mw@@._V1_.jpg'),
(3, 'The Dark Knight', 'Action', 'Christopher Nolan', '2021', 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.', '2025-04-20 05:29:59', '2025-06-18 12:36:21', 'https://m.media-amazon.com/images/M/MV5BMTMxNTMwODM0NF5BMl5BanBnXkFtZTcwODAyMTk2Mw@@._V1_.jpg'),
(4, 'Pulp Fiction', 'Crime', 'Quentin Tarantino', '1993', 'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.', '2025-04-20 05:29:59', '2025-06-16 22:16:51', 'https://m.media-amazon.com/images/M/MV5BNGNhMDIzZTUtNTBlZi00MTRlLWFjM2ItYzViMjE3YzI5MjljXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_.jpg'),
(5, 'The Godfather', 'Crime', 'Francis Ford Coppola', '1972', 'The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.', '2025-04-20 05:29:59', '2025-06-08 03:45:53', 'https://m.media-amazon.com/images/M/MV5BM2MyNjYxNmUtYTAwNi00MTYxLWJmNWYtYzZlODY3ZTk3OTFlXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_.jpg'),
(6, 'Parasite', 'Thriller', 'Bong Joon Ho', '2019', 'Greed and class discrimination threaten the newly formed symbiotic relationship between the wealthy Park family and the destitute Kim clan.', '2025-04-20 05:29:59', '2025-06-08 03:45:53', 'https://m.media-amazon.com/images/M/MV5BYWZjMjk3ZTItODQ2ZC00NTY5LWE0ZDYtZTI3MjcwN2Q5NTVkXkEyXkFqcGdeQXVyODk4OTc3MTY@._V1_.jpg'),
(7, 'Spirited Away', 'Animation', 'Hayao Miyazaki', '2001', 'During her family\'s move to the suburbs, a sullen 10-year-old girl wanders into a world ruled by gods, witches, and spirits, and where humans are changed into beasts.', '2025-04-20 05:29:59', '2025-06-08 03:45:53', 'https://m.media-amazon.com/images/M/MV5BMjlmZmI5MDctNDE2YS00YWE0LWE5ZWItZDBhYWQ0NTcxNWRhXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_.jpg'),
(8, 'Interstellar', 'Sci-Fi', 'Christopher Nolan', '2014', 'A team of explorers travel through a wormhole in space in an attempt to ensure humanity\'s survival.', '2025-04-20 05:29:59', '2025-06-08 03:45:53', 'https://m.media-amazon.com/images/M/MV5BZjdkOTU3MDktN2IxOS00OGEyLWFmMjktY2FiMmZkNWIyODZiXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_.jpg'),
(9, 'The Matrix', 'Action', 'Lana Wachowski, Lilly Wachowski', '1999', 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.', '2025-04-20 05:29:59', '2025-06-08 03:45:53', 'https://m.media-amazon.com/images/M/MV5BNzQzOTk3OTAtNDQ0Zi00ZTVkLWI0MTEtMDllZjNkYzNjNTc4L2ltYWdlXkEyXkFqcGdeQXVyNjU0OTQ0OTY@._V1_.jpg'),
(10, 'Forrest Gump', 'Drama', 'Robert Zemeckis', '1994', 'The presidencies of Kennedy and Johnson, the events of Vietnam, Watergate, and other historical events unfold through the perspective of an Alabama man with an IQ of 75.', '2025-04-20 05:29:59', '2025-06-08 03:45:53', 'https://m.media-amazon.com/images/M/MV5BNWIwODRlZTUtY2U3ZS00Yzg1LWJhNzYtMmZiYmEyNmU1NjMzXkEyXkFqcGdeQXVyMTQxNzMzNDI@._V1_.jpg'),
(13, 'Dilan 1990', 'Romantis/Drama', 'Fajar Bustomi', '2018', 'Kisah cinta masa SMA antara Dilan, anak band yang keren, dengan Milea, siswi pindahan yang cantik. Diadaptasi dari novel bestseller karya Pidi Baiq.', '2025-04-20 14:29:21', '2025-06-08 03:45:53', 'https://m.media-amazon.com/images/M/MV5BYzM0NmQ2YzgtZWZkNC00N2JhLThjYzUtMDNlZDczMzJiMGY1XkEyXkFqcGdeQXVyNzkzODk2Mzc@._V1_.jpg'),
(14, 'Final Destination', 'Laga/Thriller', 'Gareth Evans', '2011', 'Tim SWAT terjebak di gedung apartemen 30 lantai yang dikuasai gembong narkoba dan harus bertarung melawan puluhan preman bersenjata.', '2025-04-20 14:33:24', '2025-06-08 03:45:53', 'https://image.tmdb.org/t/p/w600_and_h900_bestv2/A5KIsFWQMlvUqobZb2FInzOPlIp.jpg'),
(17, 'Gundala', 'Aksi', 'Joko Anwar', '2019', 'Seorang anak yatim piatu tumbuh menjadi pahlawan super Indonesia.', '2025-05-12 15:23:27', '2025-06-08 04:11:24', 'https://image.tmdb.org/t/p/original/zvv8co5LGjQgslWFQ4n1G7s7t2o.jpg'),
(21, 'Inception (2010)', ' Sci-Fi', 'Christopher Nolan', '2010', 'A thief who steals corporate secrets through dream-sharing technology is given a task to plant an idea into a target\'s mind.', '2025-05-28 03:39:19', '2025-06-08 03:45:53', 'https://m.media-amazon.com/images/M/MV5BMjAxMzY3NjcxNF5BMl5BanBnXkFtZTcwNTI5OTM0Mw@@._V1_.jpg'),
(22, 'Laskar Pelangi', 'Drama', 'Riri Riza', '2008', 'Kisah perjuangan anak-anak di Belitung mengejar pendidikan meski keterbatasan.', '2025-06-08 03:45:53', '2025-06-08 03:45:53', 'https://m.media-amazon.com/images/M/MV5BODkxZDY2ZjMtYTVmMy00ZmZkLWIzZjEtMjk1NDU5OTQ2NDZiXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg'),
(24, 'Whispers in the Dark 2', 'Horror', 'Raka Ananda', '2022', 'After moving into an old countryside house, a family is haunted by mysterious whispers and shadows.', '2025-06-11 21:21:51', '2025-06-11 22:27:56', 'https://example.com/posters/whispers-dark.jpg'),
(27, 'legally blonde', 'romance', 'blablabal', '2001', 'about elle woods', '2026-06-13 20:56:53', '2026-06-13 20:56:53', 'private $apiUrl = \'http://127.0.0.1:8000/api/films\';     private $apiKey = \'RJIVPSdScj3FkU6apbDkizbAAmyCwiEp\';');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `api_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `api_key`) VALUES
(1, 'Prudencia Putri', 'evanara@gmail.com', NULL, '$2y$10$lnesG5mQrnJ4nQy79UmuIO1Uz4g65O03aq540s/B8iBCNM/ebaphC', NULL, '2025-06-04 23:09:37', '2025-06-04 23:09:37', NULL),
(2, 'bunga matahari', 'matahari@gmail.com', NULL, '$2y$10$E2vB1rPbvrzXmPImNv4koOxy2SgPnU2COaIrzT8owRdCzvxjzdAW.', NULL, '2025-06-07 22:09:39', '2025-06-07 22:09:39', NULL),
(3, 'nadia', 'nadia@gmail.com', NULL, '$2y$10$hTpJrEXxBo5AEXtXCImeTuk.zBinazF16/nYx3r/CU/.jdVZ6EVGS', NULL, '2025-06-07 22:27:48', '2025-06-07 23:42:20', NULL),
(4, 'caramel', 'caramel@gmail.com', NULL, '$2y$10$daiY8.IhdTQtQD3bukfkX.pw.Q3akB5JGeMmnQqeDgRTm7eFblade', NULL, '2025-06-08 01:35:22', '2025-06-08 01:35:22', NULL),
(5, 'aria', 'nadiaria@gmail.com', NULL, '$2y$10$MQDPoWNrpwFLCn2eTiXXSuWXbnsolP8InB1D6aDsbiYjWLBrey3pG', NULL, '2025-06-09 03:38:47', '2025-06-09 03:38:47', NULL),
(6, 'Aprinia Salsabila', 'aprinia@aprinia.com', NULL, '$2y$10$j6gcu3FH0QTXsS3z2oK5quzvaCcdFhYnwPSv.QNAB0U1e9GV/0XPa', NULL, '2025-06-11 08:08:02', '2025-06-11 08:08:02', NULL),
(7, 'aprinia', 'aprinia@salsabila.com', NULL, '$2y$10$Ty97QaCyJwIKwByfor6T6ecfp8LgYlenMAiWuHuDIeGF/MX2SQ9wK', NULL, '2026-06-13 20:30:11', '2026-06-13 20:30:11', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_keys`
--
ALTER TABLE `api_keys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `api_keys_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbl_films`
--
ALTER TABLE `tbl_films`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_api_key_unique` (`api_key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `api_keys`
--
ALTER TABLE `api_keys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_films`
--
ALTER TABLE `tbl_films`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `api_keys`
--
ALTER TABLE `api_keys`
  ADD CONSTRAINT `api_keys_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
