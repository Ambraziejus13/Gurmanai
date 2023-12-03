-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2023 at 05:00 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gurmanudb`
--

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
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Smaližiai', 1, '2023-12-02 14:00:03', '2023-12-02 14:00:03'),
(2, 'Le Gurmanai', 2, '2023-12-02 14:00:03', '2023-12-02 14:00:03'),
(3, 'Luko grupė', 10, '2023-12-02 14:00:03', '2023-12-02 14:00:03'),
(4, 'Kita Luko grupė', 10, '2023-12-02 14:00:03', '2023-12-02 14:00:03');

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE `group_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_members`
--

INSERT INTO `group_members` (`id`, `user_id`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-12-02 14:00:03', '2023-12-02 14:00:03'),
(2, 2, 2, '2023-12-02 14:00:03', '2023-12-02 14:00:03'),
(3, 10, 3, '2023-12-02 14:00:03', '2023-12-02 14:00:03'),
(4, 10, 4, '2023-12-02 14:00:03', '2023-12-02 14:00:03'),
(5, 1, 2, '2023-12-02 14:00:03', '2023-12-02 14:00:03'),
(6, 1, 3, '2023-12-02 14:00:03', '2023-12-02 14:00:03'),
(7, 2, 4, '2023-12-02 14:00:03', '2023-12-02 14:00:03'),
(8, 3, 1, '2023-12-02 14:00:03', '2023-12-02 14:00:03'),
(9, 3, 3, '2023-12-02 14:00:04', '2023-12-02 14:00:04'),
(10, 4, 4, '2023-12-02 14:00:04', '2023-12-02 14:00:04'),
(11, 5, 1, '2023-12-02 14:00:04', '2023-12-02 14:00:04'),
(12, 5, 2, '2023-12-02 14:00:04', '2023-12-02 14:00:04'),
(13, 5, 3, '2023-12-02 14:00:04', '2023-12-02 14:00:04'),
(14, 5, 4, '2023-12-02 14:00:04', '2023-12-02 14:00:04');

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
(66, '2019_08_19_000000_create_failed_jobs_table', 1),
(132, '2022_04_22_163902_create_listings_table', 2),
(137, '2014_10_12_000000_create_users_table', 3),
(138, '2014_10_12_100000_create_password_resets_table', 3),
(139, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(140, '2023_11_02_083440_create_groups_table', 3),
(141, '2023_11_02_110334_create_group_members_table', 3),
(142, '2023_11_02_111330_create_recipes_table', 3),
(143, '2023_11_02_113222_create_recordings_table', 3);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `number_of_servings` int(11) NOT NULL,
  `preparation_time` varchar(255) NOT NULL,
  `ingredients` longtext NOT NULL,
  `instructions` longtext NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `title`, `number_of_servings`, `preparation_time`, `ingredients`, `instructions`, `user_id`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 'Varškės tinginys su obuoliais', 10, 'Apie 30 minučių', '420 gramų sausainių, 400 gramų varškės, 210 gramų sviesto, 110 gramų cukraus, 70 gramų grietinės, \n            70 gramų džiovintų spanguolių (nebūtina), 70 gramų migdolų (arba kitokių riešutų),\n            2 vienetai obuolių (nedidelių, tvirtų), 1 šaukštelis cinamono, 1 šaukštelis vanilinio cukraus', '1. Sausainius sulaužome nedideliais gabalėliais kaip tradiciniam tinginiui.\n            2. Obuoliams išpjauname sėklalizdžius ir supjaustome vidutinio dydžio kubeliais. Nuvalytų obuolių svoris turėtų būti apie 200-220 gramų\n            3. Keptuvėje ant vidutinės kaitros ištirpiname gabalėlį sviesto (apie 20-30 g). Beriame du šaukštus cukraus ir pakaitiname iki cukrus beveik ištirpsta. Dedama obuolius, cinamoną ir maišydami pakaitiname 1-2 minutes iki obuoliai truputį suminkštės (bet jokiu būdu nesutiš). Nuimame nuo ugnies ir paliekame atvėsti.\n            4. Į dubenį dedame varškę, minkštą kambario temperatūros sviestą, cukrų bei vanilinį cukrų. Viską sutriname rankiniu elektriniu trintuvu iki vientisos masės. Dedame grietinę ir šaukštu išmaišome.\n            5. Migdolus pasmulkiname elektriniu trintuvu (arba sukapojame peiliu).\n            6. Į varškės masę beriame migdolus, džiovintas spanguoles, sausainius ir viską gerai išmaišome.\n            7. Į kepimo popieriumi išklotą formą (naudojau kekso, bet tinka ir kitokia) dedame dalį sausainių masės, tada - dalį ouolių, vėl sausainių masės, vėl obuolių ir taip kol sudėsime visus ingredientus. Šaukštu gerai viską suspaudžiame, kad neliktų tarpelių.\n            8. Dedame į šaldytuvą ben 6-8 valandoms (o dar geriau, nakčiai), kad varškės tinginys sustingtų ir sausainiai suminkštėtų.\n            9. Sutvirtėjusį varškės tinginį galima tiesiog raikyti ir skanauti, bet aš jį dar pauošiau karemelizuotais lazdyno riešutais (žr. patarimus žemiau) ir apšlaksčiau karamelės padažu. Papuošimams taip pat puikia tinka vien karamelė ar tirpintas šokoladas ar tiesiog kepinant obuolius tinginiui jų pasiruoškite daugiau ir dalį panaudokite tinginiui papuošti.', 1, 1, '2023-12-02 14:00:04', '2023-12-02 14:00:04'),
(2, 'Moliūgo želė desertas', 4, 'Apie 30 minučių', '500 gramų moliūgų, 160 gramų želės (apelsinų arba citrinų), 150 gramų vandens, 1 vienetas apelsinų (didelio arba 2 mažesnių)', '1. Moliūgus supjaustyti vidutinio dydžio kubeliais. Į puodą pilti vandenį, sudėti moliūgus ir apvirti iki kol paminkštės. Tuomet apelsinus nulupti, supjaustyti, sudėti į puodą su moliūgais. Pavirti dar kelias minutes.\n            2. Želė suberti į dubenį, užpilti vandeniu ir išmaišyti.\n            3. Moliūgus su apelsinais elektriniu trintuvu sutrinti iki vientisos masės. Į paruoštą masę supilti želė, gerai išmaišyti, supilti į norimas formeles, dėti į šaldytuvą sustingti.', 1, 1, '2023-12-02 14:00:04', '2023-12-02 14:00:04'),
(3, 'Prancūziškas obouolių pyragas', 15, 'Maždaug 1 valanda', '250 g miltų, 50 g cukraus pudros, 40 g ryžių miltų, 200 g sviesto, obuolių, vandens', 'Instrukcijas galite rasti įraše', 2, 2, '2023-12-02 14:00:04', '2023-12-02 14:00:04'),
(4, 'Laravel prototipas', 1, '3 geros darbo dienos', '1 geras tutorialas, VS Code, pora maldelių', 'Instrukcijas galite rasti įrašuose', 10, 3, '2023-12-02 14:00:04', '2023-12-02 14:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `recordings`
--

CREATE TABLE `recordings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `host_name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `recipe_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recordings`
--

INSERT INTO `recordings` (`id`, `title`, `host_name`, `link`, `recipe_id`, `created_at`, `updated_at`) VALUES
(1, 'Varškės tinginys su obuoliais (be kondensuoto pieno)', 'Dovilė', 'https://www.youtube.com/watch?v=gTzKXV0Fw-c', 1, '2023-12-02 14:00:04', '2023-12-02 14:00:04'),
(2, 'Beatos virtuvė', 'Beata Nicholson', 'https://www.lrt.lt/naujienos/gyvenimas/13/1268763/beatos-nicholson-virtuveje-tesiasi-obuoliu-fiesta-prancuziskas-pyragas-is-trapios-sluoksniuotos-teslos', 3, '2023-12-02 14:00:04', '2023-12-02 14:00:04'),
(3, 'Laravel From Scratch 2022 | 4+ Hour Course', 'Traversy Media', 'https://www.youtube.com/watch?v=MYyJ4PuL4pY', 4, '2023-12-02 14:00:04', '2023-12-02 14:00:04'),
(4, 'Wow ambience', 'Everness', 'https://www.youtube.com/watch?v=pWTSK5waNs8', 4, '2023-12-02 14:00:04', '2023-12-02 14:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_of_birth` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type` varchar(255) NOT NULL DEFAULT 'gourmet',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `date_of_birth`, `type`, `created_at`, `updated_at`) VALUES
(1, 'reta87@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Hipolito Cronin V', '1994-05-06 21:00:00', 'gourmet', '2023-12-02 14:00:03', '2023-12-02 14:00:03'),
(2, 'freddy37@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Prof. Petra Mohr V', '1970-06-09 21:00:00', 'gourmet', '2023-12-02 14:00:03', '2023-12-02 14:00:03'),
(3, 'tamia52@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Ms. Rebekah Rogahn PhD', '2007-01-01 22:00:00', 'gourmet', '2023-12-02 14:00:03', '2023-12-02 14:00:03'),
(4, 'moen.ladarius@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Miss Frida Legros', '1981-07-23 21:00:00', 'gourmet', '2023-12-02 14:00:03', '2023-12-02 14:00:03'),
(5, 'millie.wunsch@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Roslyn Price', '1998-05-28 21:00:00', 'gourmet', '2023-12-02 14:00:03', '2023-12-02 14:00:03'),
(6, 'jeff.friesen@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Dr. Jared Moen', '2005-07-17 21:00:00', 'gourmet', '2023-12-02 14:00:03', '2023-12-02 14:00:03'),
(7, 'gudrun88@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Bridget Barrows', '2013-09-24 21:00:00', 'gourmet', '2023-12-02 14:00:03', '2023-12-02 14:00:03'),
(8, 'jweber@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Serenity Hills I', '1983-07-09 21:00:00', 'gourmet', '2023-12-02 14:00:03', '2023-12-02 14:00:03'),
(9, 'tatyana64@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Flo Yundt', '1976-10-05 21:00:00', 'gourmet', '2023-12-02 14:00:03', '2023-12-02 14:00:03'),
(10, 'lukas@gurmanai.is', '$2y$10$CSg7udMur.93uMR2skL7p.QEkDJmHlFiRBEw7a81JXUoUP13/Z6Ti', 'Lukas Vasiliauskas', '2002-09-04 21:00:00', 'administrator', '2023-12-02 14:00:03', '2023-12-02 14:00:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `groups_name_unique` (`name`),
  ADD KEY `groups_user_id_foreign` (`user_id`);

--
-- Indexes for table `group_members`
--
ALTER TABLE `group_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_members_user_id_foreign` (`user_id`),
  ADD KEY `group_members_group_id_foreign` (`group_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipes_user_id_foreign` (`user_id`),
  ADD KEY `recipes_group_id_foreign` (`group_id`);

--
-- Indexes for table `recordings`
--
ALTER TABLE `recordings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recordings_recipe_id_foreign` (`recipe_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `group_members`
--
ALTER TABLE `group_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `recordings`
--
ALTER TABLE `recordings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `group_members`
--
ALTER TABLE `group_members`
  ADD CONSTRAINT `group_members_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_members_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `recipes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `recordings`
--
ALTER TABLE `recordings`
  ADD CONSTRAINT `recordings_recipe_id_foreign` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
