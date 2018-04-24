
#Création utilisateur babylog
CREATE USER 'babylog'@'%'
  IDENTIFIED BY 'abmk74aa';
GRANT USAGE ON *.* TO 'babylog'@'%';
GRANT ALL PRIVILEGES ON `babylog`.* TO 'babylog'@'%';

#Exemple de données à créer au lancement du docker

USE babylog;

CREATE TABLE bl_bebe (
    id_bebe MEDIUMINT UNSIGNED AUTO_INCREMENT NOT NULL,
    nom VARCHAR(255) NOT NULL,
    prenom VARCHAR(255) NOT NULL,
    date_naissance DATE NOT NULL,
    sexe ENUM ('M','F') NOT NULL,
    photo VARCHAR(255) NULL,
    PRIMARY KEY (id_bebe)
) ENGINE=InnoDB AUTO_INCREMENT=0000;

CREATE TABLE bl_utilisateur (
	id_utilisateur MEDIUMINT UNSIGNED AUTO_INCREMENT NOT NULL,
	nom VARCHAR(255) NOT NULL,
  prenom VARCHAR(255) NOT NULL,
  date_naissance DATE NULL,
	mail VARCHAR(255) NOT NULL,
	photo VARCHAR(255) NOT NULL,
	login VARCHAR(255) NOT NULL,
	password VARCHAR (255) NOT NULL,
	PRIMARY KEY (id_utilisateur)
) ENGINE=InnoDB AUTO_INCREMENT=0000;

CREATE TABLE bl_utilisateur_bebe (
	id_bebe MEDIUMINT UNSIGNED  NOT NULL,
	id_utilisateur MEDIUMINT UNSIGNED  NOT NULL,
	PRIMARY KEY (id_bebe,id_utilisateur),
	FOREIGN KEY (id_bebe) REFERENCES bl_bebe(id_bebe),
	FOREIGN KEY (id_utilisateur) REFERENCES bl_utilisateur(id_utilisateur)
);

CREATE TABLE bl_evenement (
	id_evenement MEDIUMINT UNSIGNED AUTO_INCREMENT NOT NULL,
	id_bebe MEDIUMINT UNSIGNED NOT NULL,
	type ENUM('biberon','repas','tetee','sommeil','couche'),
	date_debut DATE NOT NULL,
	date_fin DATE NOT NULL,
	heure_debut TIME NOT NULL,
	heure_fin TIME NOT NULL,
	commentaires VARCHAR(255) NULL,
	PRIMARY KEY (id_evenement),
	FOREIGN KEY (id_bebe) REFERENCES bl_bebe(id_bebe)
) ENGINE=InnoDB AUTO_INCREMENT=0000;

CREATE TABLE bl_biberon (
  id_biberon MEDIUMINT UNSIGNED NOT NULL,
  quantite_initiale DOUBLE NULL,
  quantite_bue DOUBLE NULL,
  cereales TINYINT(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (id_biberon),
  FOREIGN KEY (id_biberon) REFERENCES bl_evenement(id_evenement)
);

CREATE TABLE bl_tetee (
  id_tetee MEDIUMINT UNSIGNED NOT NULL,
  duree_sein_droit DOUBLE NULL,
  duree_sein_gauche DOUBLE NULL,
  PRIMARY KEY (id_tetee),
  FOREIGN KEY (id_tetee) REFERENCES bl_evenement(id_evenement)
);

CREATE TABLE bl_sommeil (
  id_sommeil MEDIUMINT UNSIGNED NOT NULL,
  nombre_reveil DOUBLE NULL,
  PRIMARY KEY (id_sommeil),
  FOREIGN KEY (id_sommeil) REFERENCES bl_evenement(id_evenement)
);

CREATE TABLE bl_couche (
  id_couche MEDIUMINT UNSIGNED NOT NULL,
  selles TINYINT(1) NOT NULL DEFAULT 0,
  urine TINYINT(1) NOT NULL DEFAULT 0,
  vide TINYINT(1) NOT NULL DEFAULT 0,
  consistance VARCHAR(255) NULL,
  couleur VARCHAR(255) NULL,
  PRIMARY KEY (id_couche),
  FOREIGN KEY (id_couche) REFERENCES bl_evenement(id_evenement)
);

