-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.40 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table gov_connect.appointment
CREATE TABLE IF NOT EXISTS `appointment` (
  `reference_number` varchar(10) NOT NULL,
  `added_user_nic` varchar(12) NOT NULL,
  `service_id` varchar(10) NOT NULL,
  `appointment_status_id` int NOT NULL,
  `added_datetime` datetime NOT NULL,
  `appointment_date` date NOT NULL,
  `time_slot_id` int NOT NULL,
  `accepted_user_nic` varchar(12) DEFAULT NULL,
  `completed_user_nic` varchar(12) DEFAULT NULL,
  `accepted_datetime` datetime DEFAULT NULL,
  `completed_datetime` datetime DEFAULT NULL,
  `feedback` text,
  `rating` int DEFAULT NULL,
  `rejected_message` text,
  PRIMARY KEY (`reference_number`),
  KEY `fk_appointment_user1_idx` (`added_user_nic`),
  KEY `fk_appointment_service1_idx` (`service_id`),
  KEY `fk_appointment_appointment_status1_idx` (`appointment_status_id`),
  KEY `fk_appointment_time_slot1_idx` (`time_slot_id`),
  KEY `fk_appointment_user2_idx` (`accepted_user_nic`),
  KEY `fk_appointment_user3_idx` (`completed_user_nic`),
  CONSTRAINT `fk_appointment_appointment_status1` FOREIGN KEY (`appointment_status_id`) REFERENCES `appointment_status` (`id`),
  CONSTRAINT `fk_appointment_service1` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`),
  CONSTRAINT `fk_appointment_time_slot1` FOREIGN KEY (`time_slot_id`) REFERENCES `time_slot` (`id`),
  CONSTRAINT `fk_appointment_user1` FOREIGN KEY (`added_user_nic`) REFERENCES `user` (`nic`),
  CONSTRAINT `fk_appointment_user2` FOREIGN KEY (`accepted_user_nic`) REFERENCES `user` (`nic`),
  CONSTRAINT `fk_appointment_user3` FOREIGN KEY (`completed_user_nic`) REFERENCES `user` (`nic`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table gov_connect.appointment: ~2 rows (approximately)
INSERT INTO `appointment` (`reference_number`, `added_user_nic`, `service_id`, `appointment_status_id`, `added_datetime`, `appointment_date`, `time_slot_id`, `accepted_user_nic`, `completed_user_nic`, `accepted_datetime`, `completed_datetime`, `feedback`, `rating`, `rejected_message`) VALUES
	('APP0000001', '200127804509', 'SER0000010', 2, '2025-08-16 11:00:00', '2025-08-15', 2, '200487562145', '200487562145', '2025-08-13 01:31:55', '2025-08-15 01:31:56', 'Good service!', 5, ''),
	('APP0000002', '200126761234', 'SER0000010', 3, '2025-08-16 14:37:37', '2025-08-16', 3, '200487562145', '200487562145', '2025-08-16 14:37:54', '2025-08-16 14:37:54', '', 1, '');

-- Dumping structure for table gov_connect.appointment_status
CREATE TABLE IF NOT EXISTS `appointment_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table gov_connect.appointment_status: ~4 rows (approximately)
INSERT INTO `appointment_status` (`id`, `status`) VALUES
	(1, 'Pending'),
	(2, 'Accepted'),
	(3, 'Rejected'),
	(4, 'Completed');

-- Dumping structure for table gov_connect.branch
CREATE TABLE IF NOT EXISTS `branch` (
  `id` varchar(10) NOT NULL,
  `branch` varchar(45) NOT NULL,
  `department_id` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_branch_department1_idx` (`department_id`),
  CONSTRAINT `fk_branch_department1` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table gov_connect.branch: ~25 rows (approximately)
INSERT INTO `branch` (`id`, `branch`, `department_id`) VALUES
	('BRN0000001', 'Recruitment Unit', 'DEP0000001'),
	('BRN0000002', 'Training Center', 'DEP0000001'),
	('BRN0000003', 'Payroll Office', 'DEP0000001'),
	('BRN0000004', 'Employee Relations', 'DEP0000001'),
	('BRN0000005', 'HR Compliance', 'DEP0000001'),
	('BRN0000006', 'Accounts Payable', 'DEP0000002'),
	('BRN0000007', 'Accounts Receivable', 'DEP0000002'),
	('BRN0000008', 'Budgeting Office', 'DEP0000002'),
	('BRN0000009', 'Treasury Division', 'DEP0000002'),
	('BRN0000010', 'Audit Section', 'DEP0000002'),
	('BRN0000011', 'Software Development', 'DEP0000003'),
	('BRN0000012', 'Network Operations', 'DEP0000003'),
	('BRN0000013', 'Cybersecurity Unit', 'DEP0000003'),
	('BRN0000014', 'Database Management', 'DEP0000003'),
	('BRN0000015', 'Help Desk Support', 'DEP0000003'),
	('BRN0000016', 'Advertising Division', 'DEP0000004'),
	('BRN0000017', 'Market Research', 'DEP0000004'),
	('BRN0000018', 'Digital Campaigns', 'DEP0000004'),
	('BRN0000019', 'Brand Management', 'DEP0000004'),
	('BRN0000020', 'Events & Promotions', 'DEP0000004'),
	('BRN0000021', 'Logistics', 'DEP0000005'),
	('BRN0000022', 'Supply Chain', 'DEP0000005'),
	('BRN0000023', 'Quality Control', 'DEP0000005'),
	('BRN0000024', 'Production Unit', 'DEP0000005'),
	('BRN0000025', 'Maintenance', 'DEP0000005');

-- Dumping structure for table gov_connect.department
CREATE TABLE IF NOT EXISTS `department` (
  `id` varchar(10) NOT NULL,
  `department` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table gov_connect.department: ~5 rows (approximately)
INSERT INTO `department` (`id`, `department`) VALUES
	('DEP0000001', 'Human Resources'),
	('DEP0000002', 'Finance'),
	('DEP0000003', 'IT'),
	('DEP0000004', 'Marketing'),
	('DEP0000005', 'Operations');

-- Dumping structure for table gov_connect.document_type
CREATE TABLE IF NOT EXISTS `document_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table gov_connect.document_type: ~2 rows (approximately)
INSERT INTO `document_type` (`id`, `type`) VALUES
	(1, 'pdf'),
	(2, 'image');

-- Dumping structure for table gov_connect.notification
CREATE TABLE IF NOT EXISTS `notification` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_nic` varchar(12) NOT NULL,
  `title` varchar(45) NOT NULL,
  `message` text NOT NULL,
  `notification_status_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_notification_user1_idx` (`user_nic`),
  KEY `fk_notification_notification_status1_idx` (`notification_status_id`),
  CONSTRAINT `fk_notification_notification_status1` FOREIGN KEY (`notification_status_id`) REFERENCES `notification_status` (`id`),
  CONSTRAINT `fk_notification_user1` FOREIGN KEY (`user_nic`) REFERENCES `user` (`nic`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table gov_connect.notification: ~0 rows (approximately)

-- Dumping structure for table gov_connect.notification_status
CREATE TABLE IF NOT EXISTS `notification_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table gov_connect.notification_status: ~0 rows (approximately)

-- Dumping structure for table gov_connect.service
CREATE TABLE IF NOT EXISTS `service` (
  `id` varchar(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `branch_id` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_service_branch1_idx` (`branch_id`),
  CONSTRAINT `fk_service_branch1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table gov_connect.service: ~25 rows (approximately)
INSERT INTO `service` (`id`, `title`, `description`, `branch_id`) VALUES
	('SER0000001', 'Employee Registration', 'Register new government employees into the HR system.', 'BRN0000001'),
	('SER0000002', 'Training Program Enrollment', 'Enroll employees into government training programs.', 'BRN0000002'),
	('SER0000003', 'Salary Processing', 'Manage and process government employee salaries.', 'BRN0000003'),
	('SER0000004', 'Disciplinary Hearings', 'Handle employee disciplinary cases and hearings.', 'BRN0000004'),
	('SER0000005', 'Policy Compliance Checks', 'Ensure employees follow workplace rules and policies.', 'BRN0000005'),
	('SER0000006', 'Tax Payment Service', 'Facilitate online and in-person tax payments.', 'BRN0000006'),
	('SER0000007', 'Government Fund Allocation', 'Allocate funds to government departments and projects.', 'BRN0000007'),
	('SER0000008', 'Budget Planning Assistance', 'Assist with creating annual budget reports.', 'BRN0000008'),
	('SER0000009', 'Treasury Management', 'Oversee state treasury and cash flow.', 'BRN0000009'),
	('SER0000010', 'Financial Auditing', 'Audit government institutions and agencies.', 'BRN0000010'),
	('SER0000011', 'E-Government Portal Support', 'Provide technical support for online government services.', 'BRN0000011'),
	('SER0000012', 'Network Security Monitoring', 'Monitor and secure government IT infrastructure.', 'BRN0000012'),
	('SER0000013', 'Data Backup & Recovery', 'Manage backup and recovery of government data.', 'BRN0000013'),
	('SER0000014', 'Database Maintenance', 'Maintain and optimize government databases.', 'BRN0000014'),
	('SER0000015', 'Help Desk Assistance', 'Assist government employees with IT-related issues.', 'BRN0000015'),
	('SER0000016', 'Public Awareness Campaigns', 'Plan and run campaigns to inform the public about government services.', 'BRN0000016'),
	('SER0000017', 'Survey & Research', 'Conduct public opinion surveys for policy decisions.', 'BRN0000017'),
	('SER0000018', 'Social Media Management', 'Manage government social media platforms.', 'BRN0000018'),
	('SER0000019', 'Event Organization', 'Organize government-related public events.', 'BRN0000019'),
	('SER0000020', 'Brand Promotion', 'Promote national branding initiatives.', 'BRN0000020'),
	('SER0000021', 'Logistics Coordination', 'Coordinate transportation and deliveries for government projects.', 'BRN0000021'),
	('SER0000022', 'Supply Chain Management', 'Manage supply chains for public sector resources.', 'BRN0000022'),
	('SER0000023', 'Quality Inspection', 'Inspect and verify quality of public sector projects.', 'BRN0000023'),
	('SER0000024', 'Production Planning', 'Plan and oversee production of government goods.', 'BRN0000024'),
	('SER0000025', 'Equipment Maintenance', 'Maintain and repair government machinery and equipment.', 'BRN0000025');

-- Dumping structure for table gov_connect.service_document
CREATE TABLE IF NOT EXISTS `service_document` (
  `id` int NOT NULL AUTO_INCREMENT,
  `service_id` varchar(10) NOT NULL,
  `document_name` varchar(45) NOT NULL,
  `document_type_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_service_document_service1_idx` (`service_id`),
  KEY `fk_service_document_document_type1_idx` (`document_type_id`),
  CONSTRAINT `fk_service_document_document_type1` FOREIGN KEY (`document_type_id`) REFERENCES `document_type` (`id`),
  CONSTRAINT `fk_service_document_service1` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table gov_connect.service_document: ~0 rows (approximately)

-- Dumping structure for table gov_connect.time_slot
CREATE TABLE IF NOT EXISTS `time_slot` (
  `id` int NOT NULL AUTO_INCREMENT,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table gov_connect.time_slot: ~18 rows (approximately)
INSERT INTO `time_slot` (`id`, `start_time`, `end_time`) VALUES
	(1, '09:00:00', '09:20:00'),
	(2, '09:20:00', '09:40:00'),
	(3, '09:40:00', '10:00:00'),
	(4, '10:00:00', '10:20:00'),
	(5, '10:20:00', '10:40:00'),
	(6, '10:40:00', '11:00:00'),
	(7, '11:00:00', '11:20:00'),
	(8, '11:20:00', '11:40:00'),
	(9, '11:40:00', '12:00:00'),
	(10, '13:00:00', '13:20:00'),
	(11, '13:20:00', '13:40:00'),
	(12, '13:40:00', '14:00:00'),
	(13, '14:00:00', '14:20:00'),
	(14, '14:20:00', '14:40:00'),
	(15, '14:40:00', '15:00:00'),
	(16, '15:00:00', '15:20:00'),
	(17, '15:20:00', '15:40:00'),
	(18, '15:40:00', '16:00:00');

-- Dumping structure for table gov_connect.user
CREATE TABLE IF NOT EXISTS `user` (
  `nic` varchar(12) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `verification_code` varchar(6) DEFAULT NULL,
  `user_status_id` int NOT NULL,
  `user_role_id` int NOT NULL,
  `registered_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`nic`),
  KEY `fk_user_user_status_idx` (`user_status_id`),
  KEY `fk_user_user_role1_idx` (`user_role_id`),
  CONSTRAINT `fk_user_user_role1` FOREIGN KEY (`user_role_id`) REFERENCES `user_role` (`id`),
  CONSTRAINT `fk_user_user_status` FOREIGN KEY (`user_status_id`) REFERENCES `user_status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table gov_connect.user: ~2 rows (approximately)
INSERT INTO `user` (`nic`, `first_name`, `last_name`, `email`, `mobile`, `password`, `verification_code`, `user_status_id`, `user_role_id`, `registered_datetime`) VALUES
	('200126761234', 'Sandeep', 'Kavinda', 'dahamn07@gmail.com', '0712345678', '$2y$10$6BOFOS2Ul2bf6I9RHSjZo.7q1suVUhw9SmCkOjg8xly09pKmGBrWW', '894252', 1, 2, '2025-08-15 01:27:26'),
	('200127804509', 'Daham', 'Bandara', 'dahamn09@gmail.com', '0702352220', '$2y$10$I7pmwQQdh59RrgYlfnUHfuwourLsX0QeOM/tAddDco8uf6sLvc6Mi', '12345', 1, 2, '2025-08-15 00:54:57'),
	('200487562145', 'Kumara', 'Silva', 'kumara@gmail.com', '0717851190', '$2y$10$I7pmwQQdh59RrgYlfnUHfuwourLsX0QeOM/tAddDco8uf6sLvc6Mi', '', 1, 1, '2025-08-15 01:27:26');

-- Dumping structure for table gov_connect.user_has_branch
CREATE TABLE IF NOT EXISTS `user_has_branch` (
  `id` int NOT NULL AUTO_INCREMENT,
  `branch_id` varchar(10) NOT NULL,
  `user_nic` varchar(12) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_has_branch_branch1_idx` (`branch_id`),
  KEY `fk_user_has_branch_user1_idx` (`user_nic`),
  CONSTRAINT `fk_user_has_branch_branch1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`id`),
  CONSTRAINT `fk_user_has_branch_user1` FOREIGN KEY (`user_nic`) REFERENCES `user` (`nic`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table gov_connect.user_has_branch: ~0 rows (approximately)
INSERT INTO `user_has_branch` (`id`, `branch_id`, `user_nic`) VALUES
	(1, 'BRN0000010', '200487562145');

-- Dumping structure for table gov_connect.user_role
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table gov_connect.user_role: ~2 rows (approximately)
INSERT INTO `user_role` (`id`, `role`) VALUES
	(1, 'Government Officer'),
	(2, 'Citizen');

-- Dumping structure for table gov_connect.user_status
CREATE TABLE IF NOT EXISTS `user_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table gov_connect.user_status: ~2 rows (approximately)
INSERT INTO `user_status` (`id`, `status`) VALUES
	(1, 'Active'),
	(2, 'Deactive');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
