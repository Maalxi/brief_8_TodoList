START TRANSACTION;

DROP DATABASE IF EXISTS todo_list;

CREATE DATABASE IF NOT EXISTS todo_list;

USE todo_list;

CREATE TABLE IF NOT EXISTS todo_list (
    id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    description VARCHAR(300) NOT NULL,
    important BOOLEAN NOT NULL DEFAULT false
);

INSERT INTO todo_list (title, description, important) VALUES
("Acheter du lait", "Acheter du lait écrémé au supermarché", true),
("Faire du sport", "Faire de la course à pied pendant 30 minutes", false),
("Apprendre une nouvelle compétence", "Suivre un cours en ligne sur l'apprentissage automatique", true),
("Préparer le dîner", "Préparer une salade de poulet grillé pour le dîner", false),
("Nettoyer la maison", "Passer l'aspirateur et laver les fenêtres", false);

COMMIT;