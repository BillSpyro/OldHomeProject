CREATE DATABASE  IF NOT EXISTS `oldHome`;
USE `oldHome`;


DROP TABLE IF EXISTS `accounts`;
DROP TABLE IF EXISTS `patients`;
DROP TABLE IF EXISTS `employees`;
DROP TABLE IF EXISTS `roles`;
DROP TABLE IF EXISTS `dailyCare`;
DROP TABLE IF EXISTS `doctorAppointment`;
DROP TABLE IF EXISTS `roster`;

CREATE TABLE `accounts` (
  `id` serial UNIQUE NOT NULL,
  `role_id` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) UNIQUE NOT NULL,
  `password` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `dateOfBirth` varchar(45) NOT NULL,
  `approved` boolean DEFAULT FALSE,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE `patients` (
  `id` serial UNIQUE NOT NULL,
  `patient_id` int(11) NOT NULL REFERENCES accounts(id),
  `family_code` varchar(45) DEFAULT NULL,
  `emergency_contact` varchar(45) DEFAULT NULL,
  `relation_emergency` varchar(45) DEFAULT NULL,
  `patient_group` int(11) DEFAULT NULL,
  `admission_date` varchar(45) DEFAULT NULL,
  `amount_due` varchar(45) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE `employees` (
  `id` serial UNIQUE NOT NULL,
  `employee_id` int(11) NOT NULL REFERENCES accounts(id),
  `salary` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE `roles` (
  `role_id` serial NOT NULL REFERENCES accounts(role_id),
  `role_name` varchar(45) NOT NULL,
  `access_level` int(11) NOT NULL,
  PRIMARY KEY (`role_id`),
  UNIQUE KEY `id_UNIQUE` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE `doctorAppointment` (
`appointment_id` serial UNIQUE NOT NULL,
`patient_id` int(11) NOT NULL REFERENCES accounts(id),
`doctor_id` int(11) NOT NULL REFERENCES accounts(id),
`appointment_date` varchar(45) NOT NULL,
`comment` varchar(45) DEFAULT NULL,
`morning_med` varchar(45) DEFAULT NULL,
`afternoon_med` varchar(45) DEFAULT NULL,
`night_med` varchar(45) DEFAULT NULL,
PRIMARY KEY (`appointment_id`),
UNIQUE KEY `id_UNIQUE` (`appointment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE `dailyCare` (
  `dailyCare_id` serial UNIQUE NOT NULL,
  `patient_id` int(11) NOT NULL REFERENCES accounts(id),
  `dailyCare_date` varchar(45) NOT NULL,
  `breakfast` boolean DEFAULT FALSE,
  `lunch` boolean DEFAULT FALSE,
  `dinner` boolean DEFAULT FALSE,
  `morning_med` boolean DEFAULT FALSE,
  `afternoon_med` boolean DEFAULT FALSE,
  `night_med` boolean DEFAULT FALSE,
  PRIMARY KEY (`dailyCare_id`),
  UNIQUE KEY `id_UNIQUE` (`dailyCare_id`)
  ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE `roster` (
`roster_id` serial UNIQUE NOT NULL,
`employee_id` int(11) NOT NULL REFERENCES accounts(id),
`patient_group` int(11) DEFAULT NULL,
`roster_date` varchar(45) NOT NULL,
PRIMARY KEY (`roster_id`),
UNIQUE KEY `id_UNIQUE` (`roster_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

INSERT INTO `roles` (role_name, access_level)
VALUES ('Admin', 5),
('Supervisor', 4),
('Doctor', 3),
('Caregiver', 2),
('Patient', 1),
('FamilyMember', 0);

INSERT INTO `accounts` (role_id, first_name, last_name, email, password, phone, dateOfBirth, approved)
VALUES (1, 'Charles', 'Crandall', 'admin@gmail.com', '12345', '717-381-1131', '1900-12-25', TRUE),
      (4, 'Albe', 'Mela', 'caregiver1@gmail.com', '67890', 'no phone', '1990-12-25', TRUE),
      (4, 'Mela', 'Albe', 'caregiver2@gmail.com', '123', '717-483-9043', '2000-12-25', TRUE),
      (4, 'Care', 'Giver', 'caregiver3@gmail.com', '123', '717-345-3451', '2002-12-25', TRUE),
      (4, 'Alex', 'Mike', 'caregiver4@gmail.com', '123', '717-752-8534', '2004-12-25', TRUE),
      (2, 'John', 'Doe', 'supervisor@gmail.com', '123', '717-385-8683', '2001-12-25', TRUE),
      (3, 'Jane', 'Doe', 'doctor@gmail.com', '123', '276-534-2345', '2010-12-25', TRUE),
      (5, 'Old', 'Man', 'patient@gmail.com', '123', '717-634-7422', '1919-05-25', TRUE);

INSERT INTO `employees` (employee_id, salary)
VALUES (1, '3,000,000'),
       (2, '1'),
       (3, '500'),
       (4, '1,000'),
       (5, '20'),
       (6, '10,000'),
       (7, '5,000');

INSERT INTO `patients` (patient_id, family_code, emergency_contact, relation_emergency, patient_group, admission_date)
VALUES (8, '21352', 'Bob', 'Pop', 1, '2020-11-5');
