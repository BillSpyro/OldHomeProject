CREATE DATABASE  IF NOT EXISTS `oldHome`;
USE `oldHome`;


DROP TABLE IF EXISTS `accounts`;
DROP TABLE IF EXISTS `queue`;
DROP TABLE IF EXISTS `roles`;
DROP TABLE IF EXISTS `medication`;
DROP TABLE IF EXISTS `doctorAppointment`;
DROP TABLE IF EXISTS `food`;
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
  `family_code` varchar(45) DEFAULT NULL,
  `emergency_contact` varchar(45) DEFAULT NULL,
  `relation_emergency` varchar(45) DEFAULT NULL,
  `approved` boolean DEFAULT FALSE,
  `group` int(11) DEFAULT NULL,
  `admission_date` varchar(45) DEFAULT NULL,
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
PRIMARY KEY (`appointment_id`),
UNIQUE KEY `id_UNIQUE` (`appointment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE `medication` (
  `medication_id` serial UNIQUE NOT NULL,
  `patient_id` int(11) NOT NULL REFERENCES accounts(id),
  `doctor_id` int(11) NOT NULL REFERENCES accounts(id),
  `medication_date` varchar(45) NOT NULL,
  `comment` varchar(45) DEFAULT NULL,
  `morning_med` varchar(45) DEFAULT NULL,
  `afternoon_med` varchar(45) DEFAULT NULL,
  `night_med` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`medication_id`),
  UNIQUE KEY `id_UNIQUE` (`medication_id`)
  ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

  CREATE TABLE `food` (
    `food_id` serial UNIQUE NOT NULL,
    `patient_id` int(11) NOT NULL REFERENCES accounts(id),
    `food_date` varchar(45) NOT NULL,
    `breakfast` varchar(45) DEFAULT NULL,
    `lunch` varchar(45) DEFAULT NULL,
    `dinner` varchar(45) DEFAULT NULL,
    PRIMARY KEY (`food_id`),
    UNIQUE KEY `id_UNIQUE` (`food_id`)
    ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE `roster` (
`roster_id` serial UNIQUE NOT NULL,
`employee_id` int(11) NOT NULL REFERENCES accounts(id),
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
('Family Member', 0);

INSERT INTO `accounts` (role_id, first_name, last_name, email, password, phone, dateOfBirth, approved, admission_date, salary)
VALUES (1, 'Charles', 'Crandall', 'admin@gmail.com', '12345', '717-381-1131', '07-27-2000', TRUE, '11-3-2020', '3,000,000'),
(4, 'Albe', 'Mela', 'caregiver@gmail.com', '67890', 'no phone', '04-5-2000', TRUE, '11-5-2020', '1');
