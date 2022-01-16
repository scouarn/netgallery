CREATE TABLE T_EXPO_EXP (
	debut 			DATE 			NOT NULL,
	fin 			DATE 			NOT NULL
);

CREATE TABLE T_AUTEUR_AUT (
	aut_id 			INT 			PRIMARY KEY,
	aut_nom 		VARCHAR(256) 	NOT NULL
);

CREATE TABLE T_OEUVRE_OVR (
	ovr_id 			INT 			PRIMARY KEY,
	ovr_titre 		VARCHAR(256) 	NOT NULL,
	ovr_date 		DATE,
	aut_id 			INT,

	FOREIGN KEY(aut_id) REFERENCES T_AUTEUR_AUT(aut_id)
);


CREATE TABLE T_VISITEUR_VIS (
	vis_id 			INT 			PRIMARY	KEY
);


CREATE TABLE T_USER_USR (
	usr_login 		VARCHAR(32) 	PRIMARY KEY,
	usr_hash		INT 			NOT NULL,
	usr_type 		CHAR
);


CREATE TABLE T_NEWS_NEW (
	new_id 			INT 			PRIMARY KEY,
	new_date		DATE 			NOT NULL,
	new_file		VARCHAR(256) 	NOT NULL,
	usr_login 		VARCHAR(32) 	NOT NULL,

	FOREIGN KEY(usr_login) REFERENCES T_USER_USR(usr_login)
);