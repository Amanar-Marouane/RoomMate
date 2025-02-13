


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





