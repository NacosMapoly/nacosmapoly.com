-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2025 at 11:17 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mapolynacos_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `0_alert_tab`
--

CREATE TABLE `0_alert_tab` (
  `sn` int(11) NOT NULL,
  `alert_id` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  `alert_detail` text NOT NULL,
  `seen_status` int(11) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `system_name` varchar(50) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `0_alert_tab`
--

INSERT INTO `0_alert_tab` (`sn`, `alert_id`, `user_id`, `user_name`, `role_id`, `alert_detail`, `seen_status`, `ip_address`, `system_name`, `created_time`) VALUES
(1, 'ALT19920250331105451', 'STF00420241001063508', 'AFOLABI ABAYOMI', 4, 'STAFF UPDATED SUCCESSFUL: A admin whose name - AFOLABI ABAYOMI, successfully updated a staff. DETAILS: - Full Name: AFOLABI ABAYOMI, ID: STF00420241001063508, Email: afolabitaiwoabayomi112@gmail.com, POSITION: SOFTWARE DIRECTOR', 0, '127.0.0.1', 'Ttech_Global', '2025-03-31 09:54:51');

-- --------------------------------------------------------

--
-- Table structure for table `academics_session_tab`
--

CREATE TABLE `academics_session_tab` (
  `sn` int(11) NOT NULL,
  `session` varchar(100) NOT NULL,
  `session_start_date` varchar(100) NOT NULL,
  `session_end_date` varchar(100) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `executive_tab`
--

CREATE TABLE `executive_tab` (
  `sn` int(11) NOT NULL,
  `exco_id` varchar(100) NOT NULL,
  `matric_no` varchar(100) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `level_id` varchar(100) NOT NULL,
  `post_id` varchar(50) NOT NULL,
  `status_id` int(11) NOT NULL,
  `profile_pix` varchar(255) NOT NULL,
  `academics_session` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages_pictures_tab`
--

CREATE TABLE `pages_pictures_tab` (
  `sn` int(11) NOT NULL,
  `academics_session` varchar(100) NOT NULL,
  `publish_id` varchar(100) NOT NULL,
  `pictures` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages_tab`
--

CREATE TABLE `pages_tab` (
  `sn` int(11) NOT NULL,
  `academics_session` varchar(100) NOT NULL,
  `publish_id` varchar(100) NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `page_title` varchar(100) NOT NULL,
  `seo_keywords` longtext NOT NULL,
  `seo_description` varchar(255) NOT NULL,
  `seo_flyer` varchar(255) NOT NULL,
  `page_content` longtext NOT NULL,
  `modified_by` varchar(100) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page_views_tab`
--

CREATE TABLE `page_views_tab` (
  `sn` int(11) NOT NULL,
  `page_category` varchar(100) NOT NULL,
  `publish_id` varchar(100) NOT NULL,
  `page_session` varchar(255) NOT NULL,
  `system` varchar(100) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_tab`
--

CREATE TABLE `post_tab` (
  `sn` int(11) NOT NULL,
  `post_id` varchar(100) NOT NULL,
  `post_name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_tab`
--

INSERT INTO `post_tab` (`sn`, `post_id`, `post_name`, `created_at`, `updated_at`) VALUES
(1, 'P', 'PRESIDENT', '2025-03-21 16:08:16', '2025-03-21 15:24:36'),
(2, 'VP1', 'VICE PRESIDENT 1', '2025-03-21 16:08:16', '2025-03-21 15:24:36'),
(3, 'VP2', 'VICE PRESIDENT 2', '2025-03-21 16:08:16', '2025-03-21 15:24:36'),
(4, 'GS', 'GENERAL SECRETARY', '2025-03-21 16:08:16', '2025-03-21 15:24:36'),
(5, 'AGS', 'ASSISTANCE GENERAL SECRETARY', '2025-03-21 16:08:16', '2025-03-21 15:24:36'),
(6, 'FS', 'FINANCIAL SECRETARY', '2025-03-21 16:08:16', '2025-03-21 15:24:36'),
(7, 'TRS', 'TREASURER', '2025-03-21 16:08:16', '2025-03-21 15:24:36'),
(8, 'STD', 'SOFTWARE DIRECTOR', '2025-03-21 16:08:16', '2025-03-21 15:24:36'),
(9, 'PRO1', 'PUBLIC RELATION OFFICER 1', '2025-03-21 16:08:16', '2025-03-21 15:24:36'),
(10, 'PRO2', 'PUBLIC RELATION OFFICER 2', '2025-03-21 16:08:16', '2025-03-21 15:24:36'),
(11, 'SPD', 'SPORT DIRECTOR', '2025-03-21 16:08:16', '2025-03-21 15:24:36'),
(12, 'SOD', 'SOCIAL DIRECTOR', '2025-03-21 16:08:16', '2025-03-21 15:24:36'),
(13, 'ADT', 'AUDITHOR', '2025-03-21 16:08:16', '2025-03-21 15:24:36'),
(14, 'WLF', 'WELFARE', '2025-03-21 16:08:16', '2025-03-21 15:24:36');

-- --------------------------------------------------------

--
-- Table structure for table `publish_tab`
--

CREATE TABLE `publish_tab` (
  `sn` int(11) NOT NULL,
  `academics_session` varchar(100) NOT NULL,
  `page_category_id` varchar(100) NOT NULL,
  `publish_id` varchar(100) NOT NULL,
  `reg_title` varchar(255) DEFAULT NULL,
  `sermon_speaker` varchar(225) DEFAULT NULL,
  `event_cat_id` varchar(100) NOT NULL,
  `event_date` timestamp NULL DEFAULT NULL,
  `event_start_time` varchar(225) DEFAULT NULL,
  `event_start_meridian` varchar(50) NOT NULL,
  `event_end_time` varchar(225) DEFAULT NULL,
  `event_end_meridian` varchar(50) NOT NULL,
  `event_location` varchar(225) DEFAULT NULL,
  `gallery_sub_title` varchar(225) DEFAULT NULL,
  `class_gallery_sub_title` varchar(100) DEFAULT NULL,
  `reg_pix` varchar(255) DEFAULT NULL,
  `status_id` int(11) NOT NULL DEFAULT 0,
  `modified_by` varchar(100) DEFAULT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` timestamp NULL DEFAULT current_timestamp(),
  `blog_cat_id` varchar(50) DEFAULT NULL,
  `blog_view` int(11) DEFAULT 0,
  `page_view` int(11) NOT NULL DEFAULT 0,
  `faq_cat_id` varchar(50) DEFAULT NULL,
  `faq_question` varchar(225) DEFAULT NULL,
  `faq_answer` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setup_backend_settings_tab`
--

CREATE TABLE `setup_backend_settings_tab` (
  `sn` int(11) NOT NULL,
  `backend_setting_id` varchar(10) NOT NULL,
  `smtp_host` varchar(100) NOT NULL,
  `smtp_username` varchar(100) NOT NULL,
  `smtp_password` varchar(100) NOT NULL,
  `smtp_port` int(11) NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  `support_email` varchar(100) NOT NULL,
  `current_academics_session` varchar(100) NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(255) DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `setup_backend_settings_tab`
--

INSERT INTO `setup_backend_settings_tab` (`sn`, `backend_setting_id`, `smtp_host`, `smtp_username`, `smtp_password`, `smtp_port`, `sender_name`, `support_email`, `current_academics_session`, `updated_time`, `updated_by`) VALUES
(1, 'BK_ID001', 'mail.arrahmanmontessori.com', 'support@arrahmanmontessori.com', 'y2nO3Ghcra_w', 465, 'Ar-Rahman Montessori', 'afootechglobal@gmail.com', '2024 / 2025', '2025-03-27 11:53:17', 'STF0001');

-- --------------------------------------------------------

--
-- Table structure for table `setup_categories_tab`
--

CREATE TABLE `setup_categories_tab` (
  `sn` int(11) NOT NULL,
  `links` varchar(100) NOT NULL,
  `cat_id` varchar(100) NOT NULL,
  `cat_name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `setup_categories_tab`
--

INSERT INTO `setup_categories_tab` (`sn`, `links`, `cat_id`, `cat_name`) VALUES
(1, 'BLOG', '001', 'GENERAL'),
(2, 'BLOG', '002', 'ANNOUNCEMENT'),
(3, 'BLOG', '003', 'NEWS AND UPDATE'),
(4, 'FAQ', '004', 'COMPUTER SCIENCE'),
(5, 'FAQ', '005', 'EVENT'),
(6, 'EVENT', '006', 'TECH CONFERENCE & QUIZ'),
(7, 'EVENT', '007', 'HACKATHON'),
(8, 'EVENT', '008', 'GAMING & ESPORT'),
(9, 'EVENT', '009', 'WORKSHOP & SEMINAR'),
(10, 'EVENT', '010', 'NETWORKING & CAREER DEVELOPMENT');

-- --------------------------------------------------------

--
-- Table structure for table `setup_counter_tab`
--

CREATE TABLE `setup_counter_tab` (
  `sn` int(11) NOT NULL,
  `counter_id` varchar(100) NOT NULL,
  `counter_discription` varchar(225) NOT NULL,
  `counter_value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `setup_counter_tab`
--

INSERT INTO `setup_counter_tab` (`sn`, `counter_id`, `counter_discription`, `counter_value`) VALUES
(1, 'STF', 'STAFF ID COUNT', 6),
(2, 'ALT', 'ALERT ID COUNT', 199),
(3, 'EVENT', 'EVENT ID COUNT', 4),
(4, 'GALL', 'GALLERY ID COUNT', 8),
(5, 'BLOG', 'BLOG ID COUNT', 2),
(6, 'FAQ', 'FAQ ID COUNT', 5),
(7, 'TEST', 'TESTIMONY ID COUNT', 4),
(8, 'PS', 'PAGE SESSION COUNT', 346),
(9, 'EXCO', 'COUNT NUMBER OF EXECUTIVES', 12);

-- --------------------------------------------------------

--
-- Table structure for table `setup_level_tab`
--

CREATE TABLE `setup_level_tab` (
  `sn` int(11) NOT NULL,
  `level_id` varchar(100) NOT NULL,
  `level_title` varchar(100) NOT NULL,
  `level_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setup_level_tab`
--

INSERT INTO `setup_level_tab` (`sn`, `level_id`, `level_title`, `level_name`) VALUES
(1, 'ND2', 'NATIONAL DIPLOMA', 'ND 2'),
(2, 'HND2', 'HIGHER NATIONAL DIPLOMA', 'HND 2'),
(3, 'AL', 'ALUMNI', 'ALUMNIA');

-- --------------------------------------------------------

--
-- Table structure for table `setup_page_categories_tab`
--

CREATE TABLE `setup_page_categories_tab` (
  `sn` int(11) NOT NULL,
  `page_category_id` varchar(100) NOT NULL,
  `page_category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `setup_page_categories_tab`
--

INSERT INTO `setup_page_categories_tab` (`sn`, `page_category_id`, `page_category_name`) VALUES
(1, 'sermon_category', 'SERMON'),
(2, 'event_category', 'EVENT'),
(3, 'gallery_category', 'GALLERY'),
(4, 'blog_category', 'BLOG'),
(5, 'faq_category', 'FAQ');

-- --------------------------------------------------------

--
-- Table structure for table `setup_relationship_type_tab`
--

CREATE TABLE `setup_relationship_type_tab` (
  `sn` int(11) NOT NULL,
  `relationship_type_id` int(11) NOT NULL,
  `relationship_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `setup_relationship_type_tab`
--

INSERT INTO `setup_relationship_type_tab` (`sn`, `relationship_type_id`, `relationship_type_name`) VALUES
(1, 1, 'PARENT'),
(2, 2, 'GUARDIAN'),
(3, 3, 'STUDENT');

-- --------------------------------------------------------

--
-- Table structure for table `setup_role_tab`
--

CREATE TABLE `setup_role_tab` (
  `sn` int(11) NOT NULL,
  `role_id` varchar(50) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `setup_role_tab`
--

INSERT INTO `setup_role_tab` (`sn`, `role_id`, `role_name`) VALUES
(1, '1', 'LECTURER'),
(2, '2', 'HOD'),
(3, '3', 'ADMIN'),
(4, '4', 'SUPER ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `setup_semester_tab`
--

CREATE TABLE `setup_semester_tab` (
  `sn` int(11) NOT NULL,
  `semester_id` int(11) NOT NULL,
  `semester_name` varchar(100) NOT NULL,
  `tittle` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setup_semester_tab`
--

INSERT INTO `setup_semester_tab` (`sn`, `semester_id`, `semester_name`, `tittle`) VALUES
(1, 1, 'FIRST SEMESTER', 'st'),
(2, 2, 'SECOND SEMESTER', 'nd');

-- --------------------------------------------------------

--
-- Table structure for table `setup_status_tab`
--

CREATE TABLE `setup_status_tab` (
  `sn` int(10) UNSIGNED NOT NULL,
  `status_id` varchar(100) NOT NULL,
  `status_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `setup_status_tab`
--

INSERT INTO `setup_status_tab` (`sn`, `status_id`, `status_name`) VALUES
(1, '1', 'ACTIVE'),
(2, '2', 'SUSPEND'),
(3, '3', 'PENDING'),
(4, '4', 'SUCCESS'),
(5, '5', 'CANCELLED'),
(6, '6', 'FAILED');

-- --------------------------------------------------------

--
-- Table structure for table `setup_time_option_tab`
--

CREATE TABLE `setup_time_option_tab` (
  `sn` int(11) NOT NULL,
  `time_option_id` varchar(20) NOT NULL,
  `time_option_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setup_time_option_tab`
--

INSERT INTO `setup_time_option_tab` (`sn`, `time_option_id`, `time_option_name`) VALUES
(1, 'AM', 'AM'),
(2, 'PM', 'PM');

-- --------------------------------------------------------

--
-- Table structure for table `staff_tab`
--

CREATE TABLE `staff_tab` (
  `sn` int(11) NOT NULL,
  `access_key` varchar(255) DEFAULT NULL,
  `staff_id` varchar(100) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `profile_pix` varchar(100) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `status_id` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staff_tab`
--

INSERT INTO `staff_tab` (`sn`, `access_key`, `staff_id`, `fullname`, `email`, `phone`, `address`, `position`, `profile_pix`, `whatsapp`, `facebook`, `twitter`, `linkedin`, `status_id`, `role_id`, `password`, `modified_by`, `created_time`, `updated_time`, `last_login_time`) VALUES
(4, 'ff4a55dd8930ab1993ccfc3b78a23228', 'STF00420241001063508', 'AFOLABI ABAYOMI', 'afolabitaiwoabayomi112@gmail.com', '09151404598', 'ABEOKUTA', 'SOFTWARE DIRECTOR', 'avatar.jpg', NULL, NULL, NULL, NULL, '1', 4, 'f769485f2b7e303561aa44d1c0867cd7', 'STF0001', '2024-10-01 02:35:08', '2024-10-01 08:05:15', '2025-03-31 09:53:35');

-- --------------------------------------------------------

--
-- Table structure for table `testimony_tab`
--

CREATE TABLE `testimony_tab` (
  `sn` int(11) NOT NULL,
  `academics_session` varchar(100) NOT NULL,
  `testimony_id` varchar(100) NOT NULL,
  `fullname` varchar(225) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `testimony` longtext NOT NULL,
  `status_id` int(11) NOT NULL,
  `relationship_type_id` varchar(50) NOT NULL,
  `modified_by` varchar(100) DEFAULT NULL,
  `created_time` datetime NOT NULL,
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `0_alert_tab`
--
ALTER TABLE `0_alert_tab`
  ADD PRIMARY KEY (`sn`),
  ADD UNIQUE KEY `alert_id` (`alert_id`);

--
-- Indexes for table `academics_session_tab`
--
ALTER TABLE `academics_session_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `executive_tab`
--
ALTER TABLE `executive_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `pages_pictures_tab`
--
ALTER TABLE `pages_pictures_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `pages_tab`
--
ALTER TABLE `pages_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `page_views_tab`
--
ALTER TABLE `page_views_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `post_tab`
--
ALTER TABLE `post_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `publish_tab`
--
ALTER TABLE `publish_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_backend_settings_tab`
--
ALTER TABLE `setup_backend_settings_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_categories_tab`
--
ALTER TABLE `setup_categories_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_counter_tab`
--
ALTER TABLE `setup_counter_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_level_tab`
--
ALTER TABLE `setup_level_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_page_categories_tab`
--
ALTER TABLE `setup_page_categories_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_relationship_type_tab`
--
ALTER TABLE `setup_relationship_type_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_role_tab`
--
ALTER TABLE `setup_role_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_semester_tab`
--
ALTER TABLE `setup_semester_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_status_tab`
--
ALTER TABLE `setup_status_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `setup_time_option_tab`
--
ALTER TABLE `setup_time_option_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `staff_tab`
--
ALTER TABLE `staff_tab`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `testimony_tab`
--
ALTER TABLE `testimony_tab`
  ADD PRIMARY KEY (`sn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `0_alert_tab`
--
ALTER TABLE `0_alert_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `academics_session_tab`
--
ALTER TABLE `academics_session_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `executive_tab`
--
ALTER TABLE `executive_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages_pictures_tab`
--
ALTER TABLE `pages_pictures_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages_tab`
--
ALTER TABLE `pages_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page_views_tab`
--
ALTER TABLE `page_views_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_tab`
--
ALTER TABLE `post_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `publish_tab`
--
ALTER TABLE `publish_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setup_backend_settings_tab`
--
ALTER TABLE `setup_backend_settings_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setup_categories_tab`
--
ALTER TABLE `setup_categories_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `setup_counter_tab`
--
ALTER TABLE `setup_counter_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=457;

--
-- AUTO_INCREMENT for table `setup_level_tab`
--
ALTER TABLE `setup_level_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_page_categories_tab`
--
ALTER TABLE `setup_page_categories_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `setup_relationship_type_tab`
--
ALTER TABLE `setup_relationship_type_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setup_role_tab`
--
ALTER TABLE `setup_role_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `setup_semester_tab`
--
ALTER TABLE `setup_semester_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setup_status_tab`
--
ALTER TABLE `setup_status_tab`
  MODIFY `sn` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `setup_time_option_tab`
--
ALTER TABLE `setup_time_option_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff_tab`
--
ALTER TABLE `staff_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `testimony_tab`
--
ALTER TABLE `testimony_tab`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
