CREATE TABLE T_PRESENTATION_PRE (
	pre_debut		DATETIME		NOT NULL,
	pre_verni		DATETIME		NOT NULL,
	pre_fin			DATETIME		NOT NULL,
	pre_titre		VARCHAR(64)		NOT NULL,
	pre_bienv		VARCHAR(64)		NOT NULL,
	pre_lieu		VARCHAR(64)		NOT NULL
) ENGINE=InnoDB;

CREATE TABLE T_COMPTE_CPT (
	cpt_login 		VARCHAR(32) 	CHARACTER SET utf8 COLLATE utf8_bin,
	cpt_mdp			CHAR(32)	 	NOT NULL,

	PRIMARY KEY(cpt_login)
) ENGINE=InnoDB;

CREATE TABLE T_PROFIL_PRO (
	cpt_login 		VARCHAR(64) 	CHARACTER SET utf8 COLLATE utf8_bin,
	pro_nom			VARCHAR(64),		
	pro_prenom 		VARCHAR(64),		
	pro_email 		VARCHAR(256)	NOT NULL,
	pro_valid 		ENUM('A','D')	NOT NULL,
	pro_role 		ENUM('A','O')	NOT NULL,
	pro_date 		DATETIME 		NOT NULL,

	PRIMARY KEY(cpt_login),
	FOREIGN KEY(cpt_login) REFERENCES T_COMPTE_CPT(cpt_login)
) ENGINE=InnoDB;


CREATE TABLE T_NEWS_NEW (
	new_id 			INT 			AUTO_INCREMENT,
	new_date		DATETIME		NOT NULL,
	new_html		VARCHAR(256)	NOT NULL, # fichier html avec le contenu de l'article
	cpt_login 		VARCHAR(64) 	CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,

	PRIMARY KEY(new_id),
	FOREIGN KEY(cpt_login) REFERENCES T_COMPTE_CPT(cpt_login)
) ENGINE=InnoDB;


CREATE TABLE T_EXPOSANT_EXP (
	exp_id 			INT 			AUTO_INCREMENT,
	exp_nom 		VARCHAR(64) 	NOT NULL,
	exp_prenom 		VARCHAR(64) 	NOT NULL,
	exp_bio			VARCHAR(512)	NOT NULL,
	exp_email		VARCHAR(256),
	exp_website		VARCHAR(512),
	exp_img			VARCHAR(256),

	cpt_login		VARCHAR(64)		CHARACTER SET utf8 COLLATE utf8_bin NOT NULL ,

	PRIMARY KEY(exp_id),
	FOREIGN KEY(cpt_login) REFERENCES T_COMPTE_CPT(cpt_login)
) ENGINE=InnoDB;

CREATE TABLE T_OEUVRE_OVR (
	ovr_id 			INT 			AUTO_INCREMENT,
	ovr_titre 		VARCHAR(64) 	NOT NULL,
	ovr_year 		CHAR(4),
	ovr_descr		VARCHAR(1024),
	ovr_img			VARCHAR(256),

	PRIMARY KEY(ovr_id)
) ENGINE=InnoDB;


CREATE TABLE TJ_EXP_OVR (
	exp_id 			INT 			NOT NULL,
	ovr_id 			INT				NOT NULL,

	PRIMARY KEY(ovr_id, exp_id),
	FOREIGN KEY(ovr_id) REFERENCES T_OEUVRE_OVR(ovr_id),
	FOREIGN KEY(exp_id) REFERENCES T_EXPOSANT_EXP(exp_id)
) ENGINE=InnoDB;



CREATE TABLE T_VISITEUR_VIS (
	vis_id 			INT 			AUTO_INCREMENT,
	vis_mdp			CHAR(15)		NOT NULL,
	vis_date 		DATETIME		NOT NULL,
	vis_nom 		VARCHAR(64),
	vis_prenom 		VARCHAR(64),
	vis_email 		VARCHAR(256),
	cpt_login 		VARCHAR(64)		CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,

	PRIMARY	KEY(vis_id),
	FOREIGN KEY(cpt_login) REFERENCES T_COMPTE_CPT(cpt_login)
) ENGINE=InnoDB;


CREATE TABLE T_COMMENTAIRE_COM (
	com_id 			INT 			PRIMARY KEY AUTO_INCREMENT,
	com_date 		DATETIME		NOT NULL,
	com_text 		VARCHAR(512)	NOT NULL,
	vis_id 			INT 			UNIQUE NOT NULL,

	FOREIGN KEY(vis_id) REFERENCES T_VISITEUR_VIS(vis_id)
) ENGINE=InnoDB;


ALTER TABLE T_COMMENTAIRE_COM ADD com_status ENUM('OK', 'KO') NOT NULL;