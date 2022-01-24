INSERT INTO T_COMPTE_CPT VALUES ('admin', MD5('admin'));

INSERT INTO T_COMPTE_CPT VALUES ('gEstionnaire', MD5('gest22!_OPXE'));
INSERT INTO T_PROFIL_PRO VALUES ('gEstionnaire', 'Estionnaire', 'Georges', 'ge@netgallery.localhast', 'A', 'A', NOW());

INSERT INTO T_NEWS_NEW VALUES (DEFAULT, NOW(), 'new0.html', 'gEstionnaire');
INSERT INTO T_NEWS_NEW VALUES (DEFAULT, NOW(), 'new1.html', 'gEstionnaire');

INSERT INTO T_EXPOSANT_EXP VALUES (DEFAULT, 'Conway', 'John', 'Mathématicien 1937-2020', NULL, NULL, NULL, 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (DEFAULT, 'Gardner', 'Martin', 'Mathématicien 1914-2010', NULL, NULL, NULL, 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (DEFAULT, 'Golomb', 'Solomon', 'Mathématicien 1932-2016', NULL, NULL, NULL, 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (DEFAULT, 'Michie', 'Donald', 'Chercheur en intélligence artificielle 1929-2007', NULL, NULL, NULL, 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (DEFAULT, 'Sparks', 'Ben', '', NULL, NULL, NULL, 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (DEFAULT, 'Sanderson', 'Grant', 'Créateur de 3Blue1Brown', NULL, NULL, NULL, 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (DEFAULT, 'Droguet', 'Emmanuel', 'Prof de maths en prépa PCSI à Kérichen', NULL, NULL, NULL, 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (DEFAULT, 'Rubik', 'Ernő', 'Architecte', NULL, NULL, NULL, 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (DEFAULT, 'Lucas', 'Édouard', 'Mathématicien 1842-1891', NULL, NULL, NULL, 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (DEFAULT, 'Zamkauskas', 'Walter', 'Argentin', NULL, NULL, NULL, 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (DEFAULT, 'Loyd', 'Sam', 'Mathématicien et joueur d\'échecs 1841-1911', NULL, NULL, NULL, 'gEstionnaire');

INSERT INTO T_OEUVRE_OVR VALUES (DEFAULT, 'Jeu de la vie', '1970', 'Célèbre automate cellulaire.', NULL);
INSERT INTO T_OEUVRE_OVR VALUES (DEFAULT, 'Jeu des pousses', '1967', 'Jeu de graphes qui se joue avec un papier et un crayon.', NULL);
INSERT INTO T_OEUVRE_OVR VALUES (DEFAULT, 'Problème de l\'ange', '1974', 'Un ange se déplace d\'un certain nombre de cases sur une grille infinie, à chaque tour le démon peut bloquer une case, arrivera-t-il à bloquer l\'ange ?', NULL);
INSERT INTO T_OEUVRE_OVR VALUES (DEFAULT, 'Pentamino', '1953', 'Jeu ayant inspiré Tetris mais avec 18 pièces de 5 carrés.', NULL);
INSERT INTO T_OEUVRE_OVR VALUES (DEFAULT, 'Menace', '1961', 'Machine Educable Noughts and Crosses Engine : Une intelligence artificielle pour le morpion faite de 304 boîtes d\'allumettes.', NULL);
INSERT INTO T_OEUVRE_OVR VALUES (DEFAULT, 'Je du chat et de la souris', '2019', 'Une souris essaye de sortir d\'une marre circulaire mais un chat essaye de l\'attrapper, ce dernier se déplace sur le périmètre du cercle.', NULL);
INSERT INTO T_OEUVRE_OVR VALUES (DEFAULT, 'Fléchettes rétrécissantes', '2019', 'Plus la fléchette atterri proche du centre, moins la cible rétrécit.', NULL);
INSERT INTO T_OEUVRE_OVR VALUES (DEFAULT, 'Tir complexe', '2010', 'Un nombre ou plusieurs sont affichés sur le plan complexe et une opération est donnée, le but est de placer la résultat sur le plan.', NULL);
INSERT INTO T_OEUVRE_OVR VALUES (DEFAULT, 'Rubik\'s Cube', '1974', 'Célèbre puzzle cubique.', NULL);
INSERT INTO T_OEUVRE_OVR VALUES (DEFAULT, 'Les tours de Hanoi', '1883', 'Jeu d\'origine indienne dont le but est de déplacer une pile de disques en étant limité à trois positions et en gardant les tailles des disques décroissantes.', NULL);
INSERT INTO T_OEUVRE_OVR VALUES (DEFAULT, '2048', '2014', '', NULL);
INSERT INTO T_OEUVRE_OVR VALUES (DEFAULT, 'Amazons', '1988', 'Jeu qui se joue sur une grille et dont les pièces se déplacent comme les dames des échecs, à chaque mouvement la pièce tir une flèche et bloque une case.', NULL);
INSERT INTO T_OEUVRE_OVR VALUES (DEFAULT, 'Taquin', '1870', 'Jeu qui se joue avec une grille de 4x4 et 15 pièces qui peuvent être glissées sur la case vacantes, le but étant de remettre les pièces dans l\'ordre mais ce n\'est pas toujours possible suivant la configuration de départ.', NULL);


INSERT INTO TJ_EXP_OVR VALUES (
	(SELECT exp_id FROM T_EXPOSANT_EXP WHERE exp_nom = 'Conway' AND exp_prenom == 'John'),
	(SELECT ovr_id FROM T_OEUVRE_OVR WHERE ovr_titre == 'Jeu des pouces')
);