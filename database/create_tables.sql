CREATE TABLE T_PRESENTATION_PRE (
	pre_debut		DATE 			NOT NULL,
	pre_verni		DATE 			NOT NULL,
	pre_fin			DATE 			NOT NULL,
	pre_titre		VARCHAR(256)	NOT NULL,
	pre_bienv		VARCHAR(256)	NOT NULL,
	pre_lieu		VARCHAR(256)	NOT NULL
);

CREATE TABLE T_EXPOSANT_EXP (
	exp_id 			INT 			PRIMARY KEY,
	exp_nom 		VARCHAR(32) 	NOT NULL,
	exp_prenom 		VARCHAR(32) 	NOT NULL,
	exp_biofile		VARCHAR(256) 	NOT NULL,
	exp_email		VARCHAR(256),
	exp_website		VARCHAR(256),
	exp_imgfile		VARCHAR(256),

	usr_login		VARCHAR(32)		NOT NULL, # vraiment utile ?
	FOREIGN KEY(usr_login) REFERENCES T_USER_USR(usr_login)
);

CREATE TABLE T_OEUVRE_OVR (
	ovr_id 			INT 			PRIMARY KEY,
	ovr_titre 		VARCHAR(256) 	NOT NULL,
	ovr_date 		DATE,
	ovr_dscfile		VARCHAR(256),
	ovr_imgfile		VARCHAR(256),
	ovr_scriptfile	VARCHAR(256), #eventuellement script pour tester le jeu

	usr_login		VARCHAR(32)		NOT NULL, # vraiment utile ?
	FOREIGN KEY(usr_login) REFERENCES T_USER_USR(usr_login)
);


CREATE TABLE TJ_EXP_OVR (
	ovr_id 			INT				NOT NULL,
	exp_id 			INT 			NOT NULL,

	PRIMARY KEY(ovr_id, exp_id),
	FOREIGN KEY(ovr_id) REFERENCES T_OEUVRE_OVR(ovr_id),
	FOREIGN KEY(exp_id) REFERENCES T_EXPOSANT_EXP(exp_id)
);


CREATE TABLE T_COMPTE_CPT (
	cpt_login 		VARCHAR(32) 	PRIMARY KEY,
	cpt_mdp			INT 			NOT NULL, #mot de passe haché
);

CREATE TABLE T_PROFIL_PRO (
	cpt_login 		VARCHAR(32) 	PRIMARY KEY,
	pro_nom			VARCHAR(32),
	pro_prenom 		VARCHAR(32),
	pro_email 		VARCHAR(256)	NOT NULL,
	pro_valid 		CHAR 			NOT NULL,
	pro_role 		CHAR    		NOT NULL,
	pro_date 		DATE 			NOT NULL,

	FOREIGN KEY(cpt_login) REFERENCES T_COMPTE_CPT(cpt_login)
);


CREATE TABLE T_NEWS_NEW (
	new_id 			INT 			PRIMARY KEY,
	new_date		DATE 			NOT NULL,
	new_file		VARCHAR(256) 	NOT NULL, # fichier xml/html avec le contenu de l'article
	usr_login 		VARCHAR(32) 	NOT NULL,

	FOREIGN KEY(usr_login) REFERENCES T_USER_USR(usr_login)
);



CREATE TABLE T_VISITEUR_VIS (
	vis_id 			INT 			PRIMARY	KEY,
	vis_mdp			INT				NOT NULL, # mot de pass haché ? code écrit sur le ticket ? 
	vis_date 		DATE 			NOT NULL,
	vis_nom 		VARCHAR(32),
	vis_prenom 		VARCHAR(32),
	vis_email 		VARCHAR(256),
	usr_login 		VARCHAR(32)		NOT NULL, # vraiment utile ?

	FOREIGN KEY(usr_login) REFERENCES T_USER_USR(usr_login)
);


CREATE TABLE T_COMMENTAIRE_COM (
	com_id 			INT 			PRIMARY	KEY,
	com_date 		DATE 			NOT NULL,
	com_file 		VARCHAR(256)	NOT NULL, # fichier avec le text
	vis_id 			INT 			NOT NULL,

	FOREIGN KEY(vis_id) REFERENCES T_VISITEUR_VIS(vis_id)
);
