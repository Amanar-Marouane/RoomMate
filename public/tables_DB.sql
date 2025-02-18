-- pour supprimer database  'roomate'
-- DROP DATABASE roomate ;

-- créer database roomate : 
CREATE DATABASE IF NOT EXISTS `roomate` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;

-- utiliser database roomate : 
USE `roomate`;

-- création des tables : 

CREATE TABLE `users` (
    `user_id` int NOT NULL AUTO_INCREMENT,
    `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `year_of_study` enum('1ère', '2ème') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `origin_city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `current_city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `bio` text COLLATE utf8mb4_unicode_ci,
    `preferences` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
    `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `status` enum('active', 'desactive') COLLATE utf8mb4_unicode_ci DEFAULT 'desactive',
    `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `role` enum('admin', 'student') COLLATE utf8mb4_unicode_ci DEFAULT 'student',
    PRIMARY KEY (`user_id`),
    UNIQUE KEY `email` (`email`),
    CONSTRAINT `users_chk_1` CHECK (json_valid(`preferences`))
) ENGINE = InnoDB AUTO_INCREMENT = 7 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci




CREATE TABLE `announce` (
    `announce_id` int NOT NULL AUTO_INCREMENT,
    `user_id` int DEFAULT NULL,
    `localisation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description` text COLLATE utf8mb4_unicode_ci,
    `available_at` date NOT NULL,
    `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
    `announce_type` enum('Offre', 'Demande') COLLATE utf8mb4_unicode_ci NOT NULL,
    `budget` int NOT NULL,
    `regles_cohabitation` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `criteres_colocataire` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `capacite_accueil` int DEFAULT NULL,
    `equipements` text COLLATE utf8mb4_unicode_ci,
    `zones_souhaitees` text COLLATE utf8mb4_unicode_ci,
    `demand_type` enum('Solo', 'Together') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `move_in_date` date DEFAULT NULL,
    `is_valide` tinyint(1) DEFAULT '0',
    `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
    `is_reported` tinyint(1) DEFAULT '0',
    PRIMARY KEY (`announce_id`),
    KEY `user_id` (`user_id`),
    CONSTRAINT `announce_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
    CONSTRAINT `announce_chk_1` CHECK ((`budget` >= 0)),
    CONSTRAINT `announce_chk_2` CHECK ((`capacite_accueil` > 0))
) ENGINE = InnoDB AUTO_INCREMENT = 30 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `announce_media` (
    `media_id` int NOT NULL AUTO_INCREMENT,
    `announce_id` int DEFAULT NULL,
    `media` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    PRIMARY KEY (`media_id`),
    KEY `announce_id` (`announce_id`),
    CONSTRAINT `announce_media_ibfk_1` FOREIGN KEY (`announce_id`) REFERENCES `announce` (`announce_id`) ON DELETE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 12 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;


CREATE TABLE `messages` (
    `message_id` int NOT NULL AUTO_INCREMENT,
    `user_src_id` int NOT NULL,
    `user_dest_id` int NOT NULL,
    `type` enum('Texte', 'media') COLLATE utf8mb4_unicode_ci NOT NULL,
    `content` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
    `date_message` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`message_id`),
    KEY `user_src_id` (`user_src_id`),
    KEY `user_dest_id` (`user_dest_id`),
    CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_src_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
    CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`user_dest_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 165 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;


CREATE TABLE `resetpassword` (
    `id_reset` int NOT NULL AUTO_INCREMENT,
    `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `expires_at` datetime NOT NULL,
    `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id_reset`),
    KEY `email` (`email`),
    CONSTRAINT `resetpassword_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;


CREATE TABLE `verifycode` (
    `id_code` int NOT NULL AUTO_INCREMENT,
    `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `code` char(6) COLLATE utf8mb4_unicode_ci NOT NULL,
    `expires_at` datetime NOT NULL,
    `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id_code`),
    KEY `email` (`email`),
    CONSTRAINT `verifycode_ibfk_1` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 2 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
ALTER TABLE users 
ADD COLUMN password VARCHAR(255) NOT NULL;



