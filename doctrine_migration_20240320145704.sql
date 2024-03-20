-- Doctrine Migration File Generated on 2024-03-20 14:57:04

-- Version DoctrineMigrations\Version20240319170938
CREATE TABLE profil_recruteur (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, nom_entreprise VARCHAR(255) NOT NULL, adresse_entreprise VARCHAR(255) NOT NULL, INDEX IDX_83A851ACFB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
ALTER TABLE profil_recruteur ADD CONSTRAINT FK_83A851ACFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id);

-- Version DoctrineMigrations\Version20240320145253
CREATE TABLE candidature (id INT AUTO_INCREMENT NOT NULL, status TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB;
