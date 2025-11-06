-- Migration SQL for AHN -> ARDHU
-- 1) Create new tables for ARDHU functionality

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `mot_de_passe` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `role` enum('admin','point_focal','membre','psychologue','visiteur') DEFAULT 'membre',
  `region` varchar(100) DEFAULT NULL,
  `domaine` varchar(150) DEFAULT NULL,
  `date_inscription` datetime DEFAULT CURRENT_TIMESTAMP,
  `statut` enum('actif','inactif') DEFAULT 'actif',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `signalements` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int DEFAULT NULL,
  `type_cas` varchar(150) DEFAULT NULL,
  `description` text,
  `lieu` varchar(150) DEFAULT NULL,
  `date_signalement` datetime DEFAULT CURRENT_TIMESTAMP,
  `statut` enum('en_attente','en_cours','résolu') DEFAULT 'en_attente',
  `id_point_focal` int DEFAULT NULL,
  `confidentialite` enum('public','privé','anonyme') DEFAULT 'privé',
  `fichier_preuve` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `soutiens_psychosociaux` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_signalement` int DEFAULT NULL,
  `id_psychologue` int DEFAULT NULL,
  `diagnostic` text,
  `suivi` text,
  `statut` enum('en_cours','terminé') DEFAULT 'en_cours',
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_destinataire` int DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `lien` varchar(255) DEFAULT NULL,
  `lu` tinyint(1) DEFAULT 0,
  `date_notification` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Note: If you have an existing 'etudiants' table you can migrate data:
-- INSERT INTO utilisateurs (nom, prenom, email, mot_de_passe, photo, telephone, date_inscription)
-- SELECT nom, prenom, email, password, photo, telephone, NOW() FROM etudiants;

