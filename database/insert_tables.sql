INSERT INTO T_COMPTE_CPT VALUES ('admin', MD5('admin'));

INSERT INTO T_COMPTE_CPT VALUES ('gEstionnaire', MD5('gest22!_OPXE'));
INSERT INTO T_PROFIL_PRO VALUES ('gEstionnaire', 'Estionnaire', 'Georges', 'ge@netgallery.localhast', 'A', 'A', NOW());

INSERT INTO T_NEWS_NEW VALUES (DEFAULT, NOW(), 'new0.html', 'gEstionnaire');
INSERT INTO T_NEWS_NEW VALUES (DEFAULT, NOW(), 'new1.html', 'gEstionnaire');

INSERT INTO T_EXPOSANT_EXP VALUES (DEFAULT, 'Conway', 'John', 'Mathématicien mort en 2020', NULL, NULL, 'conway.png', 'gEstionnaire');
INSERT INTO T_OEUVRE_OVR VALUES (DEFAULT, 'Jeu des pouces', '2000-01-01', 'Jeu avec des graphes qui se joue avec un papier et un crayon', NULL);

INSERT INTO TJ_EXP_OVR VALUES (
	(SELECT exp_id FROM T_EXPOSANT_EXP WHERE exp_nom = 'Conway' AND exp_prenom == 'John'),
	(SELECT ovr_id FROM T_OEUVRE_OVR WHERE ovr_titre == 'Jeu des pouces')
);