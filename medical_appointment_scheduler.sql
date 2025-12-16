-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2025 at 12:44 PM
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
-- Database: `medical_appointment_scheduler`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `created_by_staff_id` bigint(20) UNSIGNED NOT NULL,
  `updated_by_staff_id` bigint(20) UNSIGNED DEFAULT NULL,
  `appointment_datetime` datetime NOT NULL,
  `status` enum('scheduled','completed','cancelled','no-show') NOT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `patient_id`, `doctor_id`, `created_by_staff_id`, `updated_by_staff_id`, `appointment_datetime`, `status`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4, NULL, '2025-12-13 10:00:00', 'scheduled', 'Initial consultation for heart condition', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(2, 2, 2, 4, NULL, '2025-12-14 14:30:00', 'scheduled', 'Child checkup', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(3, 3, 3, 5, NULL, '2025-12-15 11:00:00', 'scheduled', 'Knee pain evaluation', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(4, 4, 4, 4, NULL, '2025-12-16 15:00:00', 'scheduled', 'Skin consultation', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(5, 5, 5, 5, NULL, '2025-12-17 09:30:00', 'scheduled', 'Headache assessment', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(6, 6, 1, 4, NULL, '2025-12-11 10:00:00', 'completed', 'Annual checkup completed', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(7, 7, 2, 5, NULL, '2025-12-10 14:00:00', 'completed', 'Vaccination appointment', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(8, 8, 3, 4, NULL, '2025-12-09 11:00:00', 'cancelled', 'Patient requested cancellation', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(9, 9, 4, 5, NULL, '2025-12-08 15:00:00', 'no-show', 'Patient did not show up', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(10, 10, 5, 4, NULL, '2025-12-18 10:00:00', 'scheduled', 'Follow-up consultation', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(11, 12, 8, 6, NULL, '2025-12-30 20:29:00', 'scheduled', 'Patient requested afternoon appointment, follow-up for blood pressure check', '2025-12-13 00:29:28', '2025-12-13 00:29:28'),
(12, 11, 2, 3, NULL, '2025-12-20 07:45:00', 'scheduled', 'asd', '2025-12-13 00:39:54', '2025-12-13 00:39:54');

-- --------------------------------------------------------

--
-- Table structure for table `availabilities`
--

CREATE TABLE `availabilities` (
  `availability_id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `available_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `availabilities`
--

INSERT INTO `availabilities` (`availability_id`, `doctor_id`, `available_date`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-12-13', '09:00:00', '12:00:00', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(2, 1, '2025-12-13', '14:00:00', '17:00:00', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(3, 1, '2025-12-14', '09:00:00', '12:00:00', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(4, 2, '2025-12-13', '10:00:00', '12:00:00', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(5, 2, '2025-12-13', '15:00:00', '18:00:00', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(6, 2, '2025-12-15', '09:00:00', '12:00:00', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(7, 3, '2025-12-14', '08:00:00', '11:00:00', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(8, 3, '2025-12-14', '13:00:00', '16:00:00', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(9, 3, '2025-12-16', '09:00:00', '12:00:00', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(10, 4, '2025-12-13', '11:00:00', '14:00:00', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(11, 4, '2025-12-15', '09:00:00', '12:00:00', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(12, 4, '2025-12-17', '14:00:00', '17:00:00', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(13, 5, '2025-12-14', '10:00:00', '13:00:00', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(14, 5, '2025-12-15', '09:00:00', '12:00:00', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(15, 5, '2025-12-16', '14:00:00', '17:00:00', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(19, 2, '2025-12-13', '09:00:00', '10:00:00', '2025-12-12 23:58:24', '2025-12-12 23:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `specialty` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `first_name`, `last_name`, `specialty`, `phone_number`, `email`, `created_at`, `updated_at`) VALUES
(1, 'John', 'Smith', 'Cardiology', '555-0101', 'john.smith@hospital.com', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(2, 'Sarah', 'Johnson', 'Pediatrics', '555-0102', 'sarah.johnson@hospital.com', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(3, 'Michael', 'Brown', 'Orthopedics', '555-0103', 'michael.brown@hospital.com', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(4, 'Emily', 'Davis', 'Dermatology', '555-0104', 'emily.davis@hospital.com', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(5, 'Robert', 'Wilson', 'Neurology', '555-0105', 'robert.wilson@hospital.com', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(8, 'Russel', 'Joyce', 'Pediatrics', '09876543211', 'russeljoyce@gmail.com', '2025-12-12 23:52:14', '2025-12-12 23:52:14');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_12_000001_create_staff_table', 2),
(5, '2025_12_12_000002_create_doctor_table', 2),
(6, '2025_12_12_000003_create_patient_table', 2),
(7, '2025_12_12_000004_create_appointment_table', 2),
(8, '2025_12_12_000005_create_availability_table', 2),
(9, '2025_12_12_000006_create_visit_log_table', 2),
(10, '2025_12_12_000007_create_reminder_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `date_of_birth` varchar(255) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `first_name`, `last_name`, `date_of_birth`, `gender`, `phone_number`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 'James', 'Anderson', '1980-05-15', 'male', '555-1001', 'james.anderson@email.com', '123 Main St, Anytown, USA', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(2, 'Patricia', 'Taylor', '1992-08-22', 'female', '555-1002', 'patricia.taylor@email.com', '456 Oak Ave, Somewhere, USA', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(3, 'Christopher', 'Thomas', '1988-03-10', 'male', '555-1003', 'christopher.thomas@email.com', '789 Pine Rd, Elsewhere, USA', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(4, 'Linda', 'Jackson', '1975-11-05', 'female', '555-1004', 'linda.jackson@email.com', '321 Elm St, Nowhere, USA', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(5, 'Richard', 'White', '1985-07-18', 'male', '555-1005', 'richard.white@email.com', '654 Maple Ave, Anyplace, USA', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(6, 'Mary', 'Harris', '1990-01-25', 'female', '555-1006', 'mary.harris@email.com', '987 Birch Ln, Somewhere Else, USA', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(7, 'David', 'Martin', '1978-09-12', 'male', '555-1007', 'david.martin@email.com', '159 Cedar Dr, New City, USA', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(8, 'Jennifer', 'Garcia', '1995-04-30', 'female', '555-1008', 'jennifer.garcia@email.com', '753 Spruce Ct, Old Town, USA', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(9, 'Charles', 'Rodriguez', '1982-06-08', 'male', '555-1009', 'charles.rodriguez@email.com', '852 Walnut Way, Big City, USA', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(10, 'Karen', 'Lee', '1987-12-20', 'female', '555-1010', 'karen.lee@email.com', '456 Poplar Pl, Small Town, USA', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(11, 'Russel', 'Joyce', '2025-12-19', 'female', '09876543211', 'russeljoyce@gmail.com', 'nabua camarines sur', '2025-12-12 23:53:38', '2025-12-12 23:54:01'),
(12, 'ref', 'ho', '2025-12-13', 'male', '09876543211', 'kupal@gmail.com', 'sad', '2025-12-13 00:15:01', '2025-12-13 00:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `reminder_id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` bigint(20) UNSIGNED NOT NULL,
  `reminder_datetime` datetime NOT NULL,
  `reminder_type` enum('email','sms','notification') NOT NULL,
  `status` enum('pending','sent','failed') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`reminder_id`, `appointment_id`, `reminder_datetime`, `reminder_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-12-13 09:00:00', 'email', 'pending', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(2, 1, '2025-12-13 17:00:00', 'sms', 'pending', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(3, 2, '2025-12-14 13:00:00', 'email', 'pending', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(4, 2, '2025-12-13 14:30:00', 'notification', 'pending', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(5, 3, '2025-12-15 10:00:00', 'sms', 'pending', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(6, 3, '2025-12-14 11:00:00', 'email', 'pending', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(7, 4, '2025-12-16 14:00:00', 'notification', 'pending', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(8, 4, '2025-12-15 15:00:00', 'email', 'pending', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(9, 5, '2025-12-17 08:30:00', 'sms', 'pending', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(10, 5, '2025-12-16 09:30:00', 'email', 'pending', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(11, 6, '2025-12-10 09:00:00', 'email', 'sent', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(12, 7, '2025-12-09 13:00:00', 'sms', 'sent', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(13, 10, '2025-12-18 09:00:00', 'email', 'pending', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(14, 10, '2025-12-17 10:00:00', 'notification', 'pending', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(15, 11, '2025-12-20 08:34:00', 'email', 'pending', '2025-12-13 00:33:08', '2025-12-13 00:33:08');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `role` enum('doctor','receptionist','admin') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `first_name`, `last_name`, `role`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'User', 'admin', 'admin', '$2y$12$w1OV8zTjLCqkvsSSE5P/d.mfDueel36IshWK.aw4T1gyaqpB1t2Rq', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(2, 'Dr. John', 'Smith', 'doctor', 'dr_smith', '$2y$12$5yMpCiXK4ahhjClD0nHitOOsE2iv51XCVe/sAd0YPGC1mgWi/nFlO', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(3, 'Dr. Sarah', 'Johnson', 'doctor', 'dr_johnson', '$2y$12$PGvGV6UhP31bvZJ4Yca2z.G5YvbnzZ07ue9up0ke874WTeNmEKBV2', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(4, 'Reception', 'Specialist', 'receptionist', 'receptionist1', '$2y$12$ceFhLFN.WXD/ZRqTiFUjvec8cTfJNLedLLbmCcM1Pjt6fW/AVtdRu', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(5, 'Maria', 'Garcia', 'receptionist', 'receptionist2', '$2y$12$yV1byLPJ5DdtGX6Gkr4VhuxZwFU3dZhdmhuF1iFceAVUcrNGIwqzy', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(6, 'Russel', 'Joyce', 'doctor', 'rj', '$2y$12$YmVeBp8s4Yw21AYVlc2zXOIVN7gN1Elpf1/AT1ifGGQUfi58XfmzO', '2025-12-12 23:56:32', '2025-12-12 23:56:32');

-- --------------------------------------------------------

--
-- Table structure for table `visit_logs`
--

CREATE TABLE `visit_logs` (
  `visit_id` bigint(20) UNSIGNED NOT NULL,
  `appointment_id` bigint(20) UNSIGNED NOT NULL,
  `visit_datetime` datetime NOT NULL,
  `symptoms` text DEFAULT NULL,
  `diagnosis` text DEFAULT NULL,
  `treatment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visit_logs`
--

INSERT INTO `visit_logs` (`visit_id`, `appointment_id`, `visit_datetime`, `symptoms`, `diagnosis`, `treatment`, `created_at`, `updated_at`) VALUES
(1, 6, '2025-12-11 10:00:38', 'Patient reported chest pain and shortness of breath', 'Mild hypertension, no acute cardiac issues detected', 'Prescribed antihypertensive medication, recommended lifestyle changes', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(2, 7, '2025-12-10 14:00:38', 'Routine checkup', 'Child healthy, normal growth and development', 'Administered routine vaccinations as scheduled', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(3, 9, '2025-12-08 15:00:38', 'Skin rash on arms and neck', 'Contact dermatitis', 'Prescribed topical corticosteroid cream, advised to avoid allergens', '2025-12-11 19:12:38', '2025-12-11 19:12:38'),
(4, 11, '2025-12-20 07:33:00', 'sad', 'sad', 'sad', '2025-12-13 00:30:59', '2025-12-13 00:30:59'),
(5, 12, '2025-12-20 07:45:00', 'assd', 'asd', 'asd', '2025-12-13 00:40:45', '2025-12-13 00:40:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `appointments_patient_id_foreign` (`patient_id`),
  ADD KEY `appointments_doctor_id_foreign` (`doctor_id`),
  ADD KEY `appointments_created_by_staff_id_foreign` (`created_by_staff_id`),
  ADD KEY `appointments_updated_by_staff_id_foreign` (`updated_by_staff_id`);

--
-- Indexes for table `availabilities`
--
ALTER TABLE `availabilities`
  ADD PRIMARY KEY (`availability_id`),
  ADD KEY `availabilities_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`),
  ADD UNIQUE KEY `doctors_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`),
  ADD UNIQUE KEY `patients_email_unique` (`email`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`reminder_id`),
  ADD KEY `reminders_appointment_id_foreign` (`appointment_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `staff_username_unique` (`username`);

--
-- Indexes for table `visit_logs`
--
ALTER TABLE `visit_logs`
  ADD PRIMARY KEY (`visit_id`),
  ADD KEY `visit_logs_appointment_id_foreign` (`appointment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `availabilities`
--
ALTER TABLE `availabilities`
  MODIFY `availability_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `reminder_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `visit_logs`
--
ALTER TABLE `visit_logs`
  MODIFY `visit_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_created_by_staff_id_foreign` FOREIGN KEY (`created_by_staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_updated_by_staff_id_foreign` FOREIGN KEY (`updated_by_staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE SET NULL;

--
-- Constraints for table `availabilities`
--
ALTER TABLE `availabilities`
  ADD CONSTRAINT `availabilities_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`) ON DELETE CASCADE;

--
-- Constraints for table `reminders`
--
ALTER TABLE `reminders`
  ADD CONSTRAINT `reminders_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`appointment_id`) ON DELETE CASCADE;

--
-- Constraints for table `visit_logs`
--
ALTER TABLE `visit_logs`
  ADD CONSTRAINT `visit_logs_appointment_id_foreign` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`appointment_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
