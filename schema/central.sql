CREATE TABLE `users` (
  `id` varchar(36) PRIMARY KEY,
  `username` varchar(255) UNIQUE,
  `email` varchar(255) UNIQUE,
  `password` varchar(255),
  `salt` varchar(255),
  `is_active` boolean
);

CREATE TABLE `persons` (
  `id` varchar(36) PRIMARY KEY,
  `user_id` varchar(36),
  `sid` varchar(255),
  `name` varchar(255),
  `phone_number` varchar(255),
  `birthday` date,
  `religion` ENUM ('ISLAM', 'KATOLIK', 'PROTESTAN', 'HINDU', 'BUDHA'),
  `photo` varchar(255)
);

CREATE TABLE `employees` (
  `person_id` varchar(36),
  `nip` varchar(255),
  `join_date` date,
  `is_active` boolean,
  PRIMARY KEY (`person_id`, `nip`)
);

CREATE TABLE `person_address` (
  `person_id` varchar(36),
  `address_id` int,
  PRIMARY KEY (`person_id`, `address_id`)
);

CREATE TABLE `provinces` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `province` varchar(255)
);

CREATE TABLE `cities` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `city` varchar(255),
  `province_id` int
);

CREATE TABLE `districts` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `district` varchar(255),
  `city_id` int
);

CREATE TABLE `address` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `address` longtext,
  `province_id` int,
  `city_id` int,
  `district_id` int,
  `postal_code` varchar(255)
);

CREATE TABLE `user_roles` (
  `user_id` varchar(36),
  `role_id` varchar(36),
  PRIMARY KEY (`user_id`, `role_id`)
);

CREATE TABLE `roles` (
  `id` varchar(36) PRIMARY KEY,
  `role` varchar(255)
);

CREATE TABLE `employee_positions` (
  `employee_id` varchar(36),
  `position_id` varchar(36),
  `start_date` date,
  `end_date` date,
  `is_active` boolean,
  PRIMARY KEY (`employee_id`, `position_id`)
);

CREATE TABLE `organizations` (
  `org_code` varchar(255) PRIMARY KEY,
  `parent_id` varchar(36),
  `org_unit` varchar(255),
  `is_active` boolean,
  `level` integer
);

CREATE TABLE `positions` (
  `id` varchar(36) PRIMARY KEY,
  `parent_id` varchar(36),
  `org_code` varchar(36),
  `position_code` varchar(255) UNIQUE,
  `position` varchar(255),
  `is_active` boolean,
  `level` integer
);

CREATE TABLE `approvals` (
  `id` varchar(36) PRIMARY KEY,
  `code` varchar(255) UNIQUE,
  `application_id` varchar(36),
  `approval` varchar(255),
  `level` integer
);

CREATE TABLE `approval_workflows` (
  `id` varchar(36) PRIMARY KEY,
  `approval_id` varchar(255),
  `request_code` varchar(255),
  `approver_id` varchar(36),
  `status` ENUM ('APPROVED', 'DENIED', 'SUBMITTED'),
  `sequence` int
);

CREATE TABLE `approval_delegates` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `person_delegate_id` varchar(36),
  `position_delegate_id` varchar(36),
  `start_date` date,
  `end_date` date,
  `is_active` boolean
);

CREATE TABLE `user_applications` (
  `user_id` varchar(36),
  `application_id` varchar(36),
  `is_active` boolean,
  PRIMARY KEY (`user_id`, `application_id`)
);

CREATE TABLE `applications` (
  `id` varchar(36) PRIMARY KEY,
  `application` varchar(255),
  `description` varchar(255),
  `base_url` varchar(255),
  `logo` varchar(255),
  `is_active` boolean
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

ALTER TABLE `organizations` ADD FOREIGN KEY (`parent_id`) REFERENCES `organizations` (`org_code`);

ALTER TABLE `positions` ADD FOREIGN KEY (`parent_id`) REFERENCES `positions` (`id`);

ALTER TABLE `positions` ADD FOREIGN KEY (`org_code`) REFERENCES `organizations` (`org_code`);

ALTER TABLE `approvals` ADD FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`);

ALTER TABLE `approval_workflows` ADD FOREIGN KEY (`approval_id`) REFERENCES `approvals` (`id`);

ALTER TABLE `approval_workflows` ADD FOREIGN KEY (`approver_id`) REFERENCES `persons` (`id`);

ALTER TABLE `approval_delegates` ADD FOREIGN KEY (`person_delegate_id`) REFERENCES `persons` (`id`);

ALTER TABLE `approval_delegates` ADD FOREIGN KEY (`position_delegate_id`) REFERENCES `positions` (`id`);

ALTER TABLE `user_applications` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `user_applications` ADD FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`);

