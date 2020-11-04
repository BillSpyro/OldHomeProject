CREATE DATABASE  IF NOT EXISTS `oldHome`;
USE `oldHome`;


DROP TABLE IF EXISTS `accounts`;
CREATE TABLE `accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `Phone` varchar(45) DEFAULT NULL,
  `dateOfBirth` varchar(45) DEFAULT NULL,
  `family_code` varchar(45) DEFAULT NULL,
  `emergency_contact` varchar(45) DEFAULT NULL,
  `relation_emergency` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
