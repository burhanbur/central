CREATE TABLE `users` (
  `id` varchar(36) PRIMARY KEY,
  `username` varchar(255) UNIQUE,
  `email` varchar(255) UNIQUE,
  `password` varchar(255),
  `salt` varchar(255),
  `is_active` boolean,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP()
);

CREATE TABLE `password_resets` (
  `email` varchar(255),
  `token` varchar(255),
  `created_at` datetime
);

CREATE TABLE `failed_jobs` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `uuid` varchar(36),
  `connection` text,
  `queue` text,
  `payload` longtext,
  `exception` longtext,
  `failed_at` datetime
);

CREATE TABLE `persons` (
  `id` varchar(36) PRIMARY KEY,
  `user_id` varchar(36),
  `sid` varchar(255),
  `name` varchar(255),
  `phone_number` varchar(255),
  `birthday` date,
  `religion` ENUM ('ISLAM', 'KATOLIK', 'PROTESTAN', 'HINDU', 'BUDHA'),
  `photo` varchar(255),
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP()
);

CREATE TABLE `employees` (
  `person_id` varchar(36),
  `nip` varchar(255) UNIQUE,
  `join_date` date,
  `is_active` boolean,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`person_id`, `nip`)
);

CREATE TABLE `person_address` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `person_id` varchar(36),
  `address_id` int,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP()
);

CREATE TABLE `provinces` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `province` varchar(255),
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP()
);

CREATE TABLE `cities` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `city` varchar(255),
  `province_id` int,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP()
);

CREATE TABLE `districts` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `district` varchar(255),
  `city_id` int,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP()
);

CREATE TABLE `address` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `address` longtext,
  `province_id` int,
  `city_id` int,
  `district_id` int,
  `postal_code` varchar(255),
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP()
);

CREATE TABLE `user_roles` (
  `user_id` varchar(36),
  `role_id` varchar(36),
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`user_id`, `role_id`)
);

CREATE TABLE `roles` (
  `id` varchar(36) PRIMARY KEY,
  `role` varchar(255),
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP()
);

CREATE TABLE `employee_positions` (
  `employee_id` varchar(36),
  `position_id` varchar(36),
  `start_date` date,
  `end_date` date,
  `is_active` boolean,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`employee_id`, `position_id`)
);

CREATE TABLE `organizations` (
  `id` varchar(36) PRIMARY KEY,
  `parent_id` varchar(36),
  `org_code` varchar(255) UNIQUE,
  `org_unit` varchar(255),
  `is_active` boolean,
  `level` integer,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP()
);

CREATE TABLE `positions` (
  `id` varchar(36) PRIMARY KEY,
  `parent_id` varchar(36),
  `org_id` varchar(36),
  `position_code` varchar(255) UNIQUE,
  `position` varchar(255),
  `is_active` boolean,
  `level` integer,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP()
);

CREATE TABLE `approvals` (
  `id` varchar(36) PRIMARY KEY,
  `approval_code` varchar(255) UNIQUE,
  `application_id` varchar(36),
  `approval` varchar(255),
  `level` integer,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP()
);

CREATE TABLE `approval_workflows` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `approval_id` varchar(36),
  `request_code` varchar(255),
  `approver_id` varchar(36),
  `status` ENUM ('APPROVED', 'DENIED', 'SUBMITTED', 'WAITING'),
  `sequence` int,
  `is_delegate` boolean,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP()
);

CREATE TABLE `approval_delegates` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `employee_delegate_id` varchar(36),
  `position_delegate_id` varchar(36),
  `start_date` date,
  `end_date` date,
  `is_active` boolean,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP()
);

CREATE TABLE `user_applications` (
  `user_id` varchar(36),
  `application_id` varchar(36),
  `is_active` boolean,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`user_id`, `application_id`)
);

CREATE TABLE `applications` (
  `id` varchar(36) PRIMARY KEY,
  `application` varchar(255),
  `description` varchar(255),
  `base_url` varchar(255),
  `login_url` varchar(255),
  `logo` varchar(255),
  `is_active` boolean,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP(),
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP()
);

ALTER TABLE `persons` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `employees` ADD FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`);

ALTER TABLE `person_address` ADD FOREIGN KEY (`person_id`) REFERENCES `persons` (`id`);

ALTER TABLE `person_address` ADD FOREIGN KEY (`address_id`) REFERENCES `address` (`id`);

ALTER TABLE `cities` ADD FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);

ALTER TABLE `districts` ADD FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

ALTER TABLE `address` ADD FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);

ALTER TABLE `address` ADD FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

ALTER TABLE `address` ADD FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);

ALTER TABLE `user_roles` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `user_roles` ADD FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

ALTER TABLE `employee_positions` ADD FOREIGN KEY (`employee_id`) REFERENCES `employees` (`person_id`);

ALTER TABLE `employee_positions` ADD FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`);

ALTER TABLE `organizations` ADD FOREIGN KEY (`parent_id`) REFERENCES `organizations` (`id`);

ALTER TABLE `positions` ADD FOREIGN KEY (`parent_id`) REFERENCES `positions` (`id`);

ALTER TABLE `positions` ADD FOREIGN KEY (`org_id`) REFERENCES `organizations` (`id`);

ALTER TABLE `approvals` ADD FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`);

ALTER TABLE `approval_workflows` ADD FOREIGN KEY (`approval_id`) REFERENCES `approvals` (`id`);

ALTER TABLE `approval_workflows` ADD FOREIGN KEY (`approver_id`) REFERENCES `employees` (`person_id`);

ALTER TABLE `approval_delegates` ADD FOREIGN KEY (`employee_delegate_id`) REFERENCES `employees` (`person_id`);

ALTER TABLE `approval_delegates` ADD FOREIGN KEY (`position_delegate_id`) REFERENCES `positions` (`id`);

ALTER TABLE `user_applications` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `user_applications` ADD FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`);

