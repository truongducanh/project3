-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2021 at 06:00 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlsv`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `qty_received` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `name`, `qty`, `category_id`, `created_at`, `updated_at`, `qty_received`) VALUES
(1, 'Sách HTML, CSS cơ bản', 100, 1, '2021-07-17 23:40:41', '2021-07-18 08:27:35', 1),
(2, 'Sách toán kinh tế', 200, 2, '2021-07-18 00:06:56', '2021-07-18 00:06:56', 0),
(3, 'Sách toán cao cấp', 500, 2, '2021-07-18 00:07:30', '2021-07-18 00:07:30', 0),
(4, 'Bài tập 101 câu trắc nghiệm HTML,CSS', 200, 1, '2021-07-18 04:02:53', '2021-07-18 08:27:37', 1),
(5, 'Lý thuyết HTML,CSS 100 câu', 200, 1, '2021-07-18 04:06:08', '2021-07-18 04:06:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Lập trình', '2021-07-17 22:34:55', '2021-07-17 22:34:55'),
(2, 'Toán học', '2021-07-17 22:35:18', '2021-07-17 22:35:18');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `code`, `course_id`, `created_at`, `updated_at`) VALUES
(2, 'LTW01', 3, '2021-07-18 03:59:41', '2021-07-18 03:59:41'),
(3, 'LTW02', 3, '2021-07-18 04:00:57', '2021-07-18 04:01:23'),
(4, 'TDC01', 4, '2021-07-18 04:01:47', '2021-07-18 04:01:47');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `name`, `content`, `created_at`, `updated_at`) VALUES
(3, 'Khóa học lập trình web', '<p><span style=\"color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:14px\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span></p>', '2021-07-17 21:59:18', '2021-07-17 21:59:18'),
(4, 'Khóa học toán đại cương', '<p><span style=\"color:rgb(0, 0, 0); font-family:open sans,arial,sans-serif; font-size:14px\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span></p>', '2021-07-17 21:59:55', '2021-07-17 21:59:55');

-- --------------------------------------------------------

--
-- Table structure for table `course_subject`
--

CREATE TABLE `course_subject` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_subject`
--

INSERT INTO `course_subject` (`id`, `subject_id`, `course_id`, `created_at`, `updated_at`) VALUES
(3, 3, 4, '2021-07-17 21:59:55', '2021-07-17 21:59:55'),
(4, 4, 4, '2021-07-17 21:59:55', '2021-07-17 21:59:55'),
(7, 1, 3, '2021-07-18 00:59:22', '2021-07-18 00:59:22'),
(8, 2, 3, '2021-07-18 00:59:22', '2021-07-18 00:59:22');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2021-07-18 07:32:04', '2021-07-18 08:25:54'),
(2, 3, 0, '2021-07-18 07:53:00', '2021-07-18 07:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `form_detail`
--

CREATE TABLE `form_detail` (
  `form_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_detail`
--

INSERT INTO `form_detail` (`form_id`, `book_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-07-18 07:32:04', '2021-07-18 07:32:04'),
(1, 4, '2021-07-18 07:32:04', '2021-07-18 07:32:04'),
(2, 5, '2021-07-18 07:53:00', '2021-07-18 07:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `major_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`major_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Công nghệ thông tin', '2021-07-17 19:43:02', '2021-07-17 19:43:02'),
(2, 'An toàn thông tin', '2021-07-17 19:43:43', '2021-07-17 19:43:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_07_14_130252_create_course_table', 1),
(2, '2021_07_14_130630_create_class_table', 2),
(3, '2021_07_14_130947_create_subject_table', 3),
(4, '2021_07_14_131245_create_category_table', 4),
(5, '2021_07_14_131212_create_book_table', 5),
(6, '2021_07_14_170202_create_subject_book_table', 6),
(7, '2021_07_14_171026_create_course_subject_table', 7),
(8, '2021_07_14_171944_create_major_table', 8),
(9, '2014_10_12_000000_create_users_table', 9),
(10, '2021_07_14_171224_create_user_book_table', 10),
(11, '2021_07_18_054306_add_qty_received_to_book_table', 10),
(13, '2021_07_18_142259_create_form_table', 11),
(14, '2021_07_18_125701_create_form_detail_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'HTML, CSS cơ bản', '2021-07-17 20:38:31', '2021-07-17 20:38:31'),
(2, 'Lập trình PHP cơ bản', '2021-07-17 20:38:56', '2021-07-17 20:38:56'),
(3, 'Toán cao cấp', '2021-07-17 20:39:27', '2021-07-17 20:41:03'),
(4, 'Xác suất thống kê', '2021-07-17 20:41:22', '2021-07-17 20:41:22');

-- --------------------------------------------------------

--
-- Table structure for table `subject_book`
--

CREATE TABLE `subject_book` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject_book`
--

INSERT INTO `subject_book` (`id`, `subject_id`, `book_id`, `created_at`, `updated_at`) VALUES
(4, 1, 1, '2021-07-18 05:08:26', '2021-07-18 05:08:26'),
(5, 1, 4, '2021-07-18 05:08:26', '2021-07-18 05:08:26'),
(6, 1, 5, '2021-07-18 05:08:26', '2021-07-18 05:08:26'),
(8, 3, 2, '2021-07-18 05:09:24', '2021-07-18 05:09:24'),
(9, 3, 3, '2021-07-18 05:09:25', '2021-07-18 05:09:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `class_id` int(10) UNSIGNED DEFAULT NULL,
  `major_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `class_id`, `major_id`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$rdOAmTs/g4AxoLoNbuGRzu0wrajiXTrtUTYWDuGLTsJRDpEhQiFda', 0, NULL, NULL, '2021-07-14 11:01:52', '2021-07-14 11:01:52'),
(2, 'Giáo vụ', 'gv@gmail.com', '$2y$10$f63qguJS4r6pf3bsO./0OOuThcwHOFEqVSNhLEQGLVXz39XiWBbAG', 1, NULL, NULL, '2021-07-18 03:25:50', '2021-07-18 05:20:12'),
(3, 'Sinh viên A', 'sva@gmail.com', '$2y$10$nRXHyYxDdB.DWNoJqqggKOaal2YXnOyam0aisCOal3d7iNIrw9u5u', 2, 3, 2, '2021-07-18 04:30:23', '2021-07-18 05:02:21'),
(4, 'Sinh viên B', 'svb@gmail.com', '$2y$10$Qv6rPFHSHmX4pk3MFeLCbeU5l4qpbtHoMtNvJoZ9ei5VCdmAtGxPm', 2, 4, 1, '2021-07-18 08:49:48', '2021-07-18 08:49:48');

-- --------------------------------------------------------

--
-- Table structure for table `user_book`
--

CREATE TABLE `user_book` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `book_category_id_index` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `class_course_id_index` (`course_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_subject`
--
ALTER TABLE `course_subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_subject_subject_id_index` (`subject_id`),
  ADD KEY `course_subject_course_id_index` (`course_id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `form_user_id_index` (`user_id`);

--
-- Indexes for table `form_detail`
--
ALTER TABLE `form_detail`
  ADD KEY `form_detail_form_id_index` (`form_id`),
  ADD KEY `form_detail_book_id_index` (`book_id`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`major_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `subject_book`
--
ALTER TABLE `subject_book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_book_subject_id_index` (`subject_id`),
  ADD KEY `subject_book_book_id_index` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_class_id_index` (`class_id`),
  ADD KEY `users_major_id_index` (`major_id`);

--
-- Indexes for table `user_book`
--
ALTER TABLE `user_book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_book_user_id_index` (`user_id`),
  ADD KEY `user_book_book_id_index` (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course_subject`
--
ALTER TABLE `course_subject`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `major_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subject_book`
--
ALTER TABLE `subject_book`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_book`
--
ALTER TABLE `user_book`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE;

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `class_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE;

--
-- Constraints for table `course_subject`
--
ALTER TABLE `course_subject`
  ADD CONSTRAINT `course_subject_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_subject_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE;

--
-- Constraints for table `form`
--
ALTER TABLE `form`
  ADD CONSTRAINT `form_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `form_detail`
--
ALTER TABLE `form_detail`
  ADD CONSTRAINT `form_detail_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `form_detail_form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `form` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subject_book`
--
ALTER TABLE `subject_book`
  ADD CONSTRAINT `subject_book_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subject_book_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_major_id_foreign` FOREIGN KEY (`major_id`) REFERENCES `major` (`major_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_book`
--
ALTER TABLE `user_book`
  ADD CONSTRAINT `user_book_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_book_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
