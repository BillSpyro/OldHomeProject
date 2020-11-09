CREATE DATABASE  IF NOT EXISTS `oldHome`;
USE `oldHome`;


DROP TABLE IF EXISTS `accounts`;
DROP TABLE IF EXISTS `queue`;
DROP TABLE IF EXISTS `roles`;
DROP TABLE IF EXISTS `medication`;
DROP TABLE IF EXISTS `doctorAppointment`;

CREATE TABLE `accounts` (
  `id` serial UNIQUE NOT NULL,
  `role_id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) UNIQUE NOT NULL,
  `password` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `dateOfBirth` varchar(45) NOT NULL,
  `family_code` varchar(45) DEFAULT NULL,
  `emergency_contact` varchar(45) DEFAULT NULL,
  `relation_emergency` varchar(45) DEFAULT NULL,
  `group` int(11) DEFAULT NULL,
  `admission_date` varchar(45) DEFAULT NULL,
  `salary` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

CREATE TABLE `queue` (
  `queue_id` serial UNIQUE NOT NULL,
  `role_id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) UNIQUE NOT NULL,
  `password` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `dateOfBirth` varchar(45) NOT NULL,
  `family_code` varchar(45) DEFAULT NULL,
  `emergency_contact` varchar(45) DEFAULT NULL,
  `relation_emergency` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`queue_id`),
  UNIQUE KEY `id_UNIQUE` (`queue_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

CREATE TABLE `roles` (
  `role_id` serial NOT NULL REFERENCES accounts(role_id),
  `role_name` varchar(45) NOT NULL,
  `access_level` int(11) NOT NULL,
  PRIMARY KEY (`role_id`),
  UNIQUE KEY `id_UNIQUE` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO `roles` (role_name, access_level)
VALUES ('Admin', 5),
('Supervisor', 4),
('Doctor', 3),
('Caregiver', 2),
('Patient', 1),
('Family Member', 0);

INSERT INTO `accounts` (role_id, first_name, last_name, email, password, phone, dateOfBirth, admission_date, salary)
VALUES ('10', 'Charles', 'Crandall', 'admin@gmail.com', '12345', '717-381-1131', '07-27-2000', '11-3-2020', '3,000,000'),
('13', 'Albe', 'Mela', 'caregiver@gmail.com', '67890', 'no phone', '04-5-2000', '11-5-2020', '1');
