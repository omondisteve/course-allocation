-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 26, 2022 at 06:46 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course_allocation_system_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `semester_id` int(10) UNSIGNED NOT NULL,
  `course_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_fee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `department_id`, `semester_id`, `course_code`, `course_name`, `credit`, `description`, `course_duration`, `course_fee`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'CN001', 'COMPUTER NETWORKS', 10, 'This is a course about computer networks', '4 years', '35000', '2022-12-18 03:39:44', '2022-12-18 03:39:44'),
(2, 4, 5, 'PH001', 'BACHELOR OF PHARMACY', 10, 'This is a course about pharmacy', '4 years', '50000', '2022-12-18 03:41:42', '2022-12-18 03:41:42'),
(3, 2, 2, 'FRE001', 'BACHELOR OF FRENCH', 3, 'This is a french course', '2 years', '20000', '2022-12-18 03:47:16', '2022-12-18 03:47:16'),
(4, 7, 6, 'AT001', 'BACHELOR OF ARCHITECTURE', 7, 'This is a course about architecture', '4 years', '45000', '2022-12-18 03:49:33', '2022-12-18 03:49:33'),
(5, 8, 4, 'NE001', 'BACHELOR OF NUTRITION', 5, 'This is a course about nutrition', '3 years', '25000', '2022-12-18 11:07:44', '2022-12-18 11:07:44'),
(6, 1, 8, 'CT001', 'BACHELOR OF COMPUTER TECHNOLOGY', 15, 'This is a course about computer hardware', '4 years', '40000', '2022-12-18 11:09:12', '2022-12-18 11:09:12'),
(7, 10, 4, 'ECOM001', 'BACHELOR OF COMMERCE', 5, 'This is a course about commerce', '3 years', '45000', '2022-12-19 06:48:11', '2022-12-19 06:48:11'),
(8, 5, 4, 'AE001', 'BACHELOR OF ENGINEERING (AERONAUTICAL ENGINEERING)', 15, 'This is a course about Aeronautical Engineering', '5 years', '23000', '2022-12-19 06:49:33', '2022-12-19 06:49:33'),
(9, 8, 3, 'ND001', 'BACHELOR OF SCIENCE (NUTRITION AND DIETETICS)', 12, 'This is a course about nutrition and dietetics', '4 years', '30000', '2022-12-19 06:50:31', '2022-12-19 06:50:31'),
(10, 4, 4, 'BIOCHEM001', 'BACHELOR OF TECHNOLOGY(BIOCHEMISTRY)', 10, 'This is a course about Biochemistry', '4 years', '50,000', '2022-12-19 18:28:38', '2022-12-19 18:28:38'),
(11, 1, 4, 'AM001', 'ARTIFICIAL INTELLIGENCE AND MACHINE LEARNING', 5, 'This is a course about artificial intelligence and machine learning', '4 years', '50,000', '2022-12-21 09:14:20', '2022-12-21 09:14:20'),
(12, 5, 4, 'EEOO1', 'BACHELOR OF ELECTRICAL AND ELECTRONICS', 5, 'This is a course about Electrical and electronics', '4 years', '10000', '2022-12-21 09:18:28', '2022-12-21 09:18:28'),
(13, 3, 3, 'BR001', 'BACHELOR OF BRIDGE AND ROAD NETWORKS', 5, 'This is a course about roads and bridges', '5 years', '90000', '2022-12-21 09:20:50', '2022-12-21 09:20:50'),
(14, 12, 3, 'ADC001', 'ART AND DESIGN CRAFTMANSHIP', 5, 'This is a course about Art and Design', '2 years', '30000', '2022-12-24 06:49:46', '2022-12-24 06:49:46'),
(15, 15, 4, 'CUO001', 'CHEMICAL UNIT OPERATIONS', 8, 'This is a course about chemical operations', '5 years', '150000', '2022-12-24 18:11:29', '2022-12-24 18:11:29'),
(16, 15, 4, 'ICP001', 'INDUSTRIAL CHEMICAL PROCESSING', 12, 'This is a course about industrial processing', '5 years', '175000', '2022-12-24 18:12:40', '2022-12-24 18:12:40'),
(17, 15, 4, 'PCE001', 'PETROLEUM CHEMICAL ENGINEERING', 8, 'This is a course about petroluem chemical engineering', '5 years', '123000', '2022-12-24 18:13:52', '2022-12-24 18:13:52');

-- --------------------------------------------------------

--
-- Table structure for table `course_assign_to_teachers`
--

CREATE TABLE `course_assign_to_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `credit_took` int(11) NOT NULL,
  `unassigned_course_id` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_assign_to_teachers`
--

INSERT INTO `course_assign_to_teachers` (`id`, `department_id`, `teacher_id`, `course_id`, `credit_took`, `unassigned_course_id`, `created_at`, `updated_at`) VALUES
(1, 2, 7, 3, 7, 0, '2022-12-19 08:09:30', '2022-12-19 08:09:30'),
(2, 1, 11, 2, 8, 0, '2022-12-23 06:07:17', '2022-12-23 06:07:17'),
(3, 1, 4, 6, 7, 0, '2022-12-23 06:09:44', '2022-12-23 06:09:44'),
(4, 2, 5, 3, 11, 0, '2022-12-23 06:10:28', '2022-12-23 06:10:28'),
(5, 12, 14, 14, 7, 0, '2022-12-24 06:50:02', '2022-12-24 06:50:02'),
(6, 5, 6, 8, 7, 0, '2022-12-24 08:18:15', '2022-12-24 08:18:15');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) NOT NULL,
  `department_code` varchar(200) NOT NULL,
  `department_name` varchar(200) NOT NULL,
  `department_head` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_code`, `department_name`, `department_head`, `created_at`, `updated_at`) VALUES
(1, 'CS001', 'Computer Science department', 'Boniface Ochieng', '2022-12-22 07:13:11', '2022-12-17 05:05:36'),
(2, 'FRE001', 'French department', 'Elizabeth Nyaboke', '2022-12-22 07:13:23', '2022-12-17 05:05:55'),
(3, 'CE001', 'Civil Engineering', 'Isaac Kibet', '2022-12-22 07:13:48', '2022-12-17 05:06:50'),
(4, 'MD001', 'Medical department', 'Ian Maina', '2022-12-22 07:14:01', '2022-12-17 05:07:07'),
(5, 'EE001', 'Electrical Engineering department', 'Faith Sumash', '2022-12-22 07:14:39', '2022-12-17 05:07:27'),
(6, 'CN001', 'Computer Network Department', 'Karen Cheptoo', '2022-12-22 07:14:50', '2022-12-17 05:09:06'),
(7, 'AT001', 'Architecture department', 'Breva Maleya', '2022-12-22 07:15:08', '2022-12-17 07:03:29'),
(8, 'NE001', 'Nutrition Education department', 'Moen Mavono', '2022-12-22 07:15:24', '2022-12-17 07:05:42'),
(9, 'E001', 'Education department', 'Joan Nekesa', '2022-12-22 07:15:31', '2022-12-18 14:28:15'),
(10, 'ECON001', 'Economics department', 'June Nyaboke', '2022-12-22 07:15:53', '2022-12-18 14:31:29'),
(11, 'L001', 'Literature', 'Imbugwa Kisame', '2022-12-22 07:17:24', '2022-12-18 14:32:32'),
(12, 'AD001', 'Art and Design', 'Elizabeth Adika', '2022-12-22 07:39:36', '2022-12-18 14:33:10'),
(13, 'ME001', 'Mechanical Engineering', 'Jamillah Sukyan', '2022-12-22 07:18:12', '2022-12-18 14:34:28'),
(14, 'CR001', 'Computer Robotics Department', 'Felix Omondi', '2022-12-22 07:12:32', '2022-12-22 07:12:32'),
(15, 'CHEM001', 'Chemistry department', 'Dan Moses Ombunda', '2022-12-24 18:07:59', '2022-12-24 18:07:59');

-- --------------------------------------------------------

--
-- Table structure for table `enroll_in_courses`
--

CREATE TABLE `enroll_in_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `unassigned_course_id` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enroll_in_courses`
--

INSERT INTO `enroll_in_courses` (`id`, `student_id`, `course_id`, `unassigned_course_id`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 0, '2022-12-24 07:20:54', '2022-12-24 07:20:54'),
(2, 2, 6, 0, '2022-12-24 08:07:13', '2022-12-24 08:07:13'),
(3, 3, 12, 0, '2022-12-24 08:07:30', '2022-12-24 08:07:30'),
(4, 4, 12, 0, '2022-12-24 08:07:45', '2022-12-24 08:07:45'),
(5, 11, 2, 0, '2022-12-24 08:08:01', '2022-12-24 08:08:01'),
(6, 15, 17, 0, '2022-12-24 18:56:53', '2022-12-24 18:56:53'),
(7, 14, 17, 0, '2022-12-24 18:57:02', '2022-12-24 18:57:02'),
(8, 13, 15, 0, '2022-12-24 18:57:11', '2022-12-24 18:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) NOT NULL,
  `lecturer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_to_be_taken` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`id`, `department_id`, `lecturer_name`, `address`, `email`, `contact_no`, `designation`, `credit_to_be_taken`, `created_at`, `updated_at`) VALUES
(1, 4, 'Benard Okoth', 'Pumwani road', 'pysyjifi@mailinator.com', '01122334455', 'assoc-professor', 10, '2022-12-18 02:29:24', '2022-12-18 02:29:24'),
(2, 3, 'Cristopher Wanjala', 'Kisangani road', 'xedygy@mailinator.com', '0132874938', 'assistant-prof', 11, '2022-12-18 02:30:03', '2022-12-18 02:30:03'),
(3, 6, 'Mary Wanjiku', 'Mombasa road', 'niwizy@mailinator.com', '0129384942', 'professor', 5, '2022-12-18 02:31:34', '2022-12-18 02:31:34'),
(4, 1, 'Elizabeth Chebet', 'langata road\r\n', 'laxepisygo@mailinator.com', '0712475598 ', 'professor', 7, '2022-12-18 02:32:05', '2022-12-18 02:32:05'),
(5, 2, 'Jastus Mwavali', 'Kiambu road', 'pufax@mailinator.com', '0728380293', 'professor', 11, '2022-12-18 02:32:57', '2022-12-18 02:32:57'),
(6, 5, 'Manuel Omondi', 'Ongata rongai', 'winuze@mailinator.com', '0718283038', 'lecturer', 7, '2022-12-18 02:33:59', '2022-12-18 02:33:59'),
(7, 7, 'Levy wesonga', 'Kipande road', 'xudanoduc@mailinator.com', '0712883943', 'professor', 20, '2022-12-18 02:35:00', '2022-12-18 02:35:00'),
(8, 8, 'Alio Adanoor', 'Utawala', 'zovuvahaw@mailinator.com', '0799848393', 'chairman', 12, '2022-12-18 02:35:47', '2022-12-18 02:35:47'),
(9, 6, 'Stephen Omondi', 'karen', 'stephen0mondi@gmail.com', '0716374484', 'assistant-prof', 5, '2022-12-19 08:07:16', '2022-12-19 08:07:16'),
(10, 2, 'Bengo Kurtis', 'Umoja', 'BengoKurtis@gmail.com', '0782884933', 'professor', 7, '2022-12-19 08:08:02', '2022-12-19 08:08:02'),
(11, 1, 'Gloria cheptoo', 'Upperhill', 'gloriacheptoo@gmail.com', '0718234994', 'professor', 8, '2022-12-22 18:49:54', '2022-12-22 18:49:54'),
(12, 1, 'Ruth Miheso', 'Kahawa wendani', 'Ruth@gmail.com', '0728394940', 'assoc-professor', 5, '2022-12-22 18:50:45', '2022-12-22 18:50:45'),
(13, 1, 'Sofia Atieno', 'Kipande road', 'sofia@gmail.com', '0782383949', 'assistant-prof', 8, '2022-12-22 18:51:45', '2022-12-22 18:51:45'),
(14, 12, 'Francis Ambuga', 'Mombasa road', 'Franco@gmail.com', '0799339332', 'professor', 7, '2022-12-24 06:47:50', '2022-12-24 06:47:50'),
(15, 10, 'Nehru Tyson', 'Kiambu road', 'jogod@mailinator.com', '0738850339', 'assoc-professor', 9, '2022-12-24 18:14:45', '2022-12-24 18:14:45'),
(16, 15, 'Allen Burnett', 'ruiru,thika road', 'qaxugopa@mailinator.com', '0738934753', 'professor', 7, '2022-12-24 18:16:01', '2022-12-24 18:16:01'),
(17, 15, 'Maria Wanjohi', 'Gil gil road', 'rejasajas@mailinator.com', '0113784723', 'assistant-prof', 8, '2022-12-24 18:16:53', '2022-12-24 18:16:53'),
(18, 15, 'Brian Lumumba', 'Kahawa wendani', 'hokamyr@mailinator.com', '0128344949', 'lecturer', 7, '2022-12-24 18:17:33', '2022-12-24 18:17:33');

-- --------------------------------------------------------

--
-- Table structure for table `login_role`
--

CREATE TABLE `login_role` (
  `username` varchar(20) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `password_set` tinyint(4) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_role`
--

INSERT INTO `login_role` (`username`, `email_id`, `password`, `password_set`, `role`) VALUES
('admin', 'admin@gmail.com', 'admin', 1, 'admin'),
('faculty', 'faculty@gmail.com', 'fac', 1, 'faculty'),
('Lecturer', 'lecturer@gmail.com', 'lec', 1, 'lecturer'),
('student', 'student@gmail.com', '123', 1, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` date NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `student_reg_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_name`, `email`, `contact_no`, `address`, `year`, `department_id`, `student_reg_no`, `created_at`, `updated_at`) VALUES
(1, 'Levy Wesonga', 'datuza@mailinator.com', '0712346783', 'Gil gil road', '2021-03-11', 5, 'TUK/723/193', '2022-12-18 14:12:26', '2022-12-18 14:12:26'),
(2, 'Adanoor Alio', 'kunuvog@mailinator.com', '56', 'Ongata rongai road', '2022-06-21', 6, 'TUK/390/666', '2022-12-18 14:13:05', '2022-12-18 14:13:05'),
(3, 'Timothy Kokwon', 'qahuwehy@mailinator.com', '0754672782', 'Makadara estate', '2022-07-05', 5, 'TUK/438/979', '2022-12-18 14:13:47', '2022-12-18 14:13:47'),
(4, 'Nicklyde Onyango', 'gebyx@mailinator.com', '0718289393', 'Githurai 45', '2021-06-05', 5, 'TUK/432/657', '2022-12-18 14:14:30', '2022-12-18 14:14:30'),
(5, 'Bengo Kurtis', 'gero@mailinator.com', '0718373828', 'Kahawa Wendani', '2022-02-04', 4, 'TUK/360/82', '2022-12-18 14:15:22', '2022-12-18 14:15:22'),
(6, 'Stephen Omondi', 'labijafyjy@mailinator.com', '0743533737', 'Juja farm', '2022-09-02', 3, 'TUK/758/954', '2022-12-18 14:16:19', '2022-12-18 14:16:19'),
(7, 'Mary Wairimu', 'xehi@mailinator.com', '0715263358', 'Mombasa road', '2022-12-02', 8, 'TUK/191/80', '2022-12-18 14:18:25', '2022-12-18 14:18:25'),
(8, 'Mercy Masika', 'Mercymas@gmail.com', '0782838494', 'All soaps road', '2021-11-30', 1, 'TUK/856/601', '2022-12-21 09:15:57', '2022-12-21 09:15:57'),
(9, 'Jamillah mohamed', 'Jamillahmoha@gmail.com', '0783884892', 'Nyayo estate', '2022-05-07', 2, 'TUK/745/813', '2022-12-21 10:00:45', '2022-12-21 10:00:45'),
(10, 'Francline Kibet', 'Francokibe@gmail.com', '0739945859', 'Malindi road', '2022-11-30', 12, 'TUK/166/769', '2022-12-24 06:52:48', '2022-12-24 06:52:48'),
(11, 'Brian Wanyonyi', 'Brianwanyo@gmail.com', '0783848949', 'Gil gil road', '2022-11-28', 4, 'TUK/309/249', '2022-12-24 06:58:33', '2022-12-24 06:58:33'),
(12, 'Edelquin Nabwile', 'burehyx@mailinator.com', '0112348593', 'kakamega road', '2022-03-22', 15, 'TUK/406/52', '2022-12-24 18:18:57', '2022-12-24 18:18:57'),
(13, 'Livingstone Simamile', 'leqicosufo@mailinator.com', '0119384254', 'Bungoma road', '2018-05-12', 15, 'TUK/923/639', '2022-12-24 18:20:31', '2022-12-24 18:20:31'),
(14, 'Xerxes Bernard', 'qepyq@mailinator.com', '0183839494', 'vihiga road', '2019-07-22', 15, 'TUK/778/836', '2022-12-24 18:21:14', '2022-12-24 18:21:14'),
(15, 'Frankline Cheryot', 'xylevycoc@mailinator.com', '0793747397', 'Bidii road', '2021-12-30', 15, 'TUK/491/796', '2022-12-24 18:26:41', '2022-12-24 18:26:41');

-- --------------------------------------------------------

--
-- Table structure for table `student_applications`
--

CREATE TABLE `student_applications` (
  `id` int(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `county` varchar(255) NOT NULL,
  `p_box` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `course_category` varchar(255) NOT NULL,
  `course_id` int(10) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_applications`
--

INSERT INTO `student_applications` (`id`, `first_name`, `last_name`, `date`, `phone_no`, `email`, `city`, `county`, `p_box`, `location`, `gender`, `course_category`, `course_id`, `status`, `created_at`) VALUES
(1, ' Lawrence', 'Munene', '1996-09-07', '073-232-2343', 'becybewoge@mailinator.com', 'Ruiru', 'Kiambu', '63272', 'Ruiru', 'male', 'medicine', 2, 'approved', '2022-12-25 23:29:49'),
(2, 'Mary', 'Wangui', '2000-09-12', '073-233-3445', 'hulifalu@mailinator.com', '	Eldoret', 'Uasin Gishu', ' 21344', '	Eldoret', 'female', 'Electrical and Electronics', 12, 'pending', '2022-12-25 23:31:59'),
(3, 'Joan ', 'Nekesa', '1998-02-19', '071-234-2344', 'waqylawasa@mailinator.com', 'Ongata Rongai', 'Kajiado', '12334', 'Ongata Rongai', 'female', 'medicine', 2, 'view', '2022-12-25 23:33:34'),
(4, 'Solomon', 'Ombeva', '1992-06-08', '073-344-3455', 'cezopizira@mailinator.com', '	Naivasha', '	Nakuru', '13445', '	Naivasha', 'male', 'chemistry', 17, 'approved', '2022-12-25 23:35:23'),
(5, 'Javan', 'Omollo', '2000-08-22', '071-231-3456', 'qase@mailinator.com', 'Kisumu', 'kisumu', '12344', 'fish point', 'male', 'Science and Technology', 1, 'cancelled', '2022-12-25 23:58:30'),
(6, 'Jamillah', 'Sukyan', '2002-11-27', '078-123-3445', 'digaquji@mailinator.com', 'wajir', 'wajir', '123444', 'wajir', 'female', 'Science and Technology', 6, 'view', '2022-12-26 05:36:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_name`, `Password`) VALUES
(2, '1234', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_department_id_foreign` (`department_id`),
  ADD KEY `courses_semester_id_foreign` (`semester_id`);

--
-- Indexes for table `course_assign_to_teachers`
--
ALTER TABLE `course_assign_to_teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_assign_to_teachers_department_id_foreign` (`department_id`),
  ADD KEY `course_assign_to_teachers_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enroll_in_courses`
--
ALTER TABLE `enroll_in_courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `enroll_in_courses_student_id_foreign` (`student_id`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `login_role`
--
ALTER TABLE `login_role`
  ADD PRIMARY KEY (`email_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_department_id_foreign` (`department_id`);

--
-- Indexes for table `student_applications`
--
ALTER TABLE `student_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `course_assign_to_teachers`
--
ALTER TABLE `course_assign_to_teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `enroll_in_courses`
--
ALTER TABLE `enroll_in_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student_applications`
--
ALTER TABLE `student_applications`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enroll_in_courses`
--
ALTER TABLE `enroll_in_courses`
  ADD CONSTRAINT `enroll_in_courses_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD CONSTRAINT `lecturers_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
