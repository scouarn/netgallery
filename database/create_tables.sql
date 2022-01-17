

CREATE TABLE T_PRESENTATION_PRE (
	pre_debut		DATE 			NOT NULL,
	pre_verni		DATE 			NOT NULL,
	pre_fin			DATE 			NOT NULL,
	pre_titre		VARCHAR(64)		NOT NULL,
	pre_bienv		VARCHAR(64)		NOT NULL,
	pre_lieu		VARCHAR(64)		NOT NULL
);

CREATE TABLE T_COMPTE_CPT (
	cpt_login 		VARCHAR(32) 	PRIMARY KEY,
	cpt_mdp			INT 			NOT NULL # mot de passe hâché ?
);

CREATE TABLE T_PROFIL_PRO (
	cpt_login 		VARCHAR(64) 	PRIMARY KEY,
	pro_nom			VARCHAR(64),		
	pro_prenom 		VARCHAR(64),		
	pro_email 		VARCHAR(256)	NOT NULL,
	pro_valid 		ENUM('A','D')	NOT NULL,
	pro_role 		ENUM('A','O')	NOT NULL,
	pro_date 		DATE 			NOT NULL,

	FOREIGN KEY(cpt_login) REFERENCES T_COMPTE_CPT(cpt_login)
);


CREATE TABLE T_NEWS_NEW (
	new_id 			INT 			PRIMARY KEY AUTO_INCREMENT,
	new_date		DATE 			NOT NULL,
	new_file		VARCHAR(512)	NOT NULL, # fichier html avec le contenu de l'article
	cpt_login 		VARCHAR(64) 	NOT NULL,

	FOREIGN KEY(cpt_login) REFERENCES T_COMPTE_CPT(cpt_login)
);


CREATE TABLE T_EXPOSANT_EXP (
	exp_id 			INT 			PRIMARY KEY AUTO_INCREMENT,
	exp_nom 		VARCHAR(64) 	NOT NULL,
	exp_prenom 		VARCHAR(64) 	NOT NULL,
	exp_biofile		VARCHAR(512)	NOT NULL,
	exp_email		VARCHAR(256),
	exp_website		VARCHAR(512),
	exp_imgfile		VARCHAR(512),

	cpt_login		VARCHAR(64)		NOT NULL,
	FOREIGN KEY(cpt_login) REFERENCES T_COMPTE_CPT(cpt_login)
);

CREATE TABLE T_OEUVRE_OVR (
	ovr_id 			INT 			PRIMARY KEY AUTO_INCREMENT,
	ovr_titre 		VARCHAR(64) 	NOT NULL,
	ovr_date 		DATE,
	ovr_dscfile		VARCHAR(512),
	ovr_imgfile		VARCHAR(512),

	cpt_login		VARCHAR(64)		NOT NULL,
	FOREIGN KEY(cpt_login) REFERENCES T_COMPTE_CPT(cpt_login)
);


CREATE TABLE TJ_EXP_OVR (
	ovr_id 			INT				NOT NULL,
	exp_id 			INT 			NOT NULL,

	PRIMARY KEY(ovr_id, exp_id),
	FOREIGN KEY(ovr_id) REFERENCES T_OEUVRE_OVR(ovr_id),
	FOREIGN KEY(exp_id) REFERENCES T_EXPOSANT_EXP(exp_id)
);



CREATE TABLE T_VISITEUR_VIS (
	vis_id 			INT 			PRIMARY	KEY AUTO_INCREMENT,
	vis_mdp			INT				NOT NULL, # mdp hâché ? numéro écrit sur le ticket ?
	vis_date 		DATE 			NOT NULL, # + heure entrée ? 
	vis_nom 		VARCHAR(64),
	vis_prenom 		VARCHAR(64),
	vis_email 		VARCHAR(256),
	cpt_login 		VARCHAR(64)		NOT NULL,

	FOREIGN KEY(cpt_login) REFERENCES T_COMPTE_CPT(cpt_login)
);


CREATE TABLE T_COMMENTAIRE_COM (
	com_id 			INT 			PRIMARY	KEY AUTO_INCREMENT,
	com_date 		DATE 			NOT NULL,
	com_file 		VARCHAR(512)	NOT NULL,
	vis_id 			INT 			NOT NULL,

	FOREIGN KEY(vis_id) REFERENCES T_VISITEUR_VIS(vis_id)
);
