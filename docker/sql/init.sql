
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
	type ENUM('biberon','repas','sommeil','sieste'),
	date_debut DATE NOT NULL,
	date_fin DATE NOT NULL,
	heure_debut TIME NOT NULL,
	heure_fin TIME NOT NULL,
	PRIMARY KEY (id_evenement),
	FOREIGN KEY (id_bebe) REFERENCES bl_bebe(id_bebe)
) ENGINE=InnoDB AUTO_INCREMENT=0000;





