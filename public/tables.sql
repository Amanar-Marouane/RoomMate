


use roomate;



CREATE TABLE galerie (
    id INT AUTO_INCREMENT PRIMARY KEY,
    photo VARCHAR(255) NOT NULL
);
USE roomate;
ALTER TABLE announce 
MODIFY capacite_accueil INT NULL;
INSERT INTO users (full_name, email, year_of_study, origin_city, current_city, bio, preferences, photo, reference, status)  
VALUES  
('Alice Dupont', 'alice.dupont@example.com', '1ère', 'Paris', 'Lyon', 'Étudiante en informatique', '{"colocataire": "non fumeur"}', 'alice.jpg', 'REF123', 'active'),  
('Marc Leclerc', 'marc.leclerc@example.com', '2ème', 'Marseille', 'Bordeaux', 'Passionné de voyage', '{"colocataire": "calme"}', 'marc.jpg', 'REF456', 'active'),  
('Sophie Martin', 'sophie.martin@example.com', NULL, 'Toulouse', 'Montpellier', 'Fan de cinéma', '{"animaux": "ok"}', 'sophie.jpg', 'REF789', 'desactive');

INSERT INTO users (
    full_name, email, year_of_study, origin_city, current_city, bio, preferences, photo, reference, status
) VALUES (
    'John Doe', 'john.doe@example.com', '1ère', 'Casablanca', 'Rabat', 'Étudiant en informatique', '{"hobbies": ["lecture", "voyage"]}', 'john_doe.jpg', 'REF12345', 'active'
);

ALTER TABLE users
 ADD COLUMN password varchar(255);

  ALTER TABLE announce 
MODIFY capacite_accueil INT NULL;
  ALTER TABLE announce 
MODIFY criteres_colocataire varchar(500) DEFAULT NULL;
  ALTER TABLE announce 
MODIFY regles_cohabitation varchar(500) DEFAULT NULL;
  ALTER TABLE users 
MODIFY status enum("active", "desactive") DEFAULT 'desactive';

alter TABLE users MODIFY role enum("admin", "student") DEFAULT "student";

ALTER TABLE announce
 ADD COLUMN is_valide BOOLEAN DEFAULT 0;




CREATE TABLE `verifyCode` (
    `id_code` INT PRIMARY KEY AUTO_INCREMENT,
    `email` VARCHAR(255) NOT NULL,
    `code` CHAR(6) NOT NULL,
    `expires_at` DATETIME NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`email`) REFERENCES `users`(`email`) ON DELETE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
ALTER TABLE announce add COLUMN title VARCHAR(255);





