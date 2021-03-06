INSERT INTO T_PRESENTATION_PRE VALUES ('2022-05-01 8:00:00', '2022-05-01 10:00:00', '2022-08-31 17:00:00', 'Les jeux mathématiques', 'Bienvenue sur l\'expo en ligne', 'Au café rue des Arpenteurs');


INSERT INTO T_COMPTE_CPT VALUES ('vmarc', MD5('motdepasse'));
INSERT INTO T_PROFIL_PRO VALUES ('vmarc', 'Marc', 'Valérie', 'vmarc@univ-brest.fr', 'A', 'A', NOW());

INSERT INTO T_COMPTE_CPT VALUES ('admin', MD5('admin'));
INSERT INTO T_PROFIL_PRO VALUES ('admin', 'Admin', 'Admin', 'admin@netgallery.localhost', 'A', 'A', NOW());

INSERT INTO T_COMPTE_CPT VALUES ('gEstionnaire', '98abb15e560057e55e4e99187702ed4e');
INSERT INTO T_PROFIL_PRO VALUES ('gEstionnaire', 'Estionnaire', 'Georges', 'ge@netgallery.localhost', 'A', 'A', NOW());

INSERT INTO T_COMPTE_CPT VALUES ('conservateur', MD5('mdp123'));
INSERT INTO T_PROFIL_PRO VALUES ('conservateur', 'Thine', 'Clément', 'clement.thine@netgallery.localhost', 'A', 'O', NOW());

INSERT INTO T_COMPTE_CPT VALUES ('terrieur', MD5('kEF4bPeG'));
INSERT INTO T_PROFIL_PRO VALUES ('terrieur', 'Terrieur', 'Alex', 'alex.terrieur@netgallery.localhost', 'A', 'O', NOW());

INSERT INTO T_COMPTE_CPT VALUES ('yann', MD5('KrEB8dWk'));
INSERT INTO T_PROFIL_PRO VALUES ('yann', 'Le Floc\'h', 'Yann', 'yann.lefloch@netgallery.localhost', 'A', 'O', NOW());

INSERT INTO T_COMPTE_CPT VALUES ('rld', MD5('rorodumusee84'));
INSERT INTO T_PROFIL_PRO VALUES ('rld', 'Le Duc', 'Robert', 'robert.leduc@netgallery.localhost', 'A', 'O', NOW());

INSERT INTO T_COMPTE_CPT VALUES ('martin', MD5('LWDCbvy3'));
INSERT INTO T_PROFIL_PRO VALUES ('martin', 'Martin', 'Martin', 'martin.martin@netgallery.localhost', 'D', 'O', NOW());

INSERT INTO T_COMPTE_CPT VALUES ('ytroloin', MD5('motdepasse'));
INSERT INTO T_PROFIL_PRO VALUES ('ytroloin', 'Troloin', 'Yvon', 'yvon.troloin@netgallery.localhost', 'A', 'O', NOW());

INSERT INTO T_COMPTE_CPT VALUES ('mel', MD5('anF_43!lem='));
INSERT INTO T_PROFIL_PRO VALUES ('mel', 'Anfaillite', 'Mélusine', 'melusine.anfaillite@netgallery.localhost', 'D', 'O', NOW());



INSERT INTO T_NEWS_NEW VALUES (NULL, "2022-01-01", 'Ouverture', 'La gallerie ouvre ses portes.', 'gEstionnaire');
INSERT INTO T_NEWS_NEW VALUES (NULL, "2022-02-01", 'Bienvenue', 'Bienvenue sur le site de la gallerie.', 'gEstionnaire');
INSERT INTO T_NEWS_NEW VALUES (NULL, "2022-03-01", 'Livre d\'or', 'Vous pouvez poster votre avis sur le livre d\'or en ligne.', 'admin');
INSERT INTO T_NEWS_NEW VALUES (NULL, "2022-03-02", 'Actualités', 'Ici sont postées les nouvelles.', 'vmarc');
INSERT INTO T_NEWS_NEW VALUES (NULL, "2022-04-01", 'Poisson d\'avril', 'Veuillez redoubler de prudence car cette année le 1er avril tombera un vendredi 13.', 'gEstionnaire');



INSERT INTO T_VISITEUR_VIS VALUES (NULL, '000000000000000', NOW(), 'Min', 'Maxime', 'minimax@localhost', 'admin');
INSERT INTO T_VISITEUR_VIS VALUES (NULL, '111111111111111', NOW(), 'Abivain', 'Goulven', 'enain@localhost', 'admin');
INSERT INTO T_VISITEUR_VIS VALUES (NULL, '656565656565656', NOW(), 'Abiven', 'Goulvain', 'ainen@localhost', 'admin');
INSERT INTO T_VISITEUR_VIS VALUES (NULL, 'AAAAAAAAAAAAAAA', NOW(), 'Dupond', 'Armel', 'momo@localhost', 'admin');
INSERT INTO T_VISITEUR_VIS VALUES (NULL, '555555555555555', NOW(), 'Dupont', 'Éric', 'momo@localhost', 'admin');
INSERT INTO T_VISITEUR_VIS VALUES (NULL, 'abcabcabcabcabc', NOW(), NULL, NULL, NULL, 'admin');
INSERT INTO T_VISITEUR_VIS VALUES (NULL, 'defdefdefdefdef', NOW(), NULL, NULL, NULL, 'admin');

INSERT INTO T_COMMENTAIRE_COM VALUES (NULL, NOW(), 'Super musée !', 'OK', 1);
INSERT INTO T_COMMENTAIRE_COM VALUES (NULL, NOW(), 'Musée pas terrible', 'OK', 2);
INSERT INTO T_COMMENTAIRE_COM VALUES (NULL, NOW(), 'J\'ai bien aimé', 'OK', 3);
INSERT INTO T_COMMENTAIRE_COM VALUES (NULL, NOW(), 'C\'était joli', 'OK', 4);
INSERT INTO T_COMMENTAIRE_COM VALUES (NULL, NOW(), 'Moche', 'KO', 5);


INSERT INTO T_EXPOSANT_EXP VALUES (NULL, 'Conway', 'John', 'Mathématicien 1937-2020', NULL, NULL, 'conway.jpg', 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (NULL, 'Gardner', 'Martin', 'Mathématicien 1914-2010', NULL, NULL, 'Martin_Gardner.jpeg', 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (NULL, 'Golomb', 'Solomon', 'Mathématicien 1932-2016', NULL, NULL, 'Solomon_Golomb_2014.jpg', 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (NULL, 'Michie', 'Donald', 'Chercheur en intélligence artificielle 1929-2007', NULL, NULL, 'donald-michie-2003.jpg', 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (NULL, 'Sparks', 'Ben', '', NULL, 'https://www.bensparks.co.uk/', 'Ben-black-shot-dark.jpg', 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (NULL, 'Sanderson', 'Grant', 'Créateur de 3Blue1Brown', NULL, NULL, '3b1b.jpg', 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (NULL, 'Droguet', 'Emmanuel', 'Prof de maths en prépa PCSI à Kérichen', NULL, NULL, NULL, 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (NULL, 'Rubik', 'Ernő', 'Architecte', NULL, NULL, 'rubik.jpg', 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (NULL, 'Lucas', 'Édouard', 'Mathématicien 1842-1891', NULL, NULL, 'Elucas.png', 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (NULL, 'Cirulli', 'Gabriele', 'Développeur web italien', NULL, 'https://github.com/gabrielecirulli', 'gabriele-cirulli.jpg', 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (NULL, 'Zamkauskas', 'Walter', 'Argentin', NULL, NULL, NULL, 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (NULL, 'Loyd', 'Sam', 'Mathématicien et joueur d\'échecs 1841-1911', NULL, NULL, 'Samuel_Loyd.jpg', 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (NULL, 'Paterson', 'Mike', 'Informaticien', NULL, NULL, 'Michael-Paterson.jpg', 'gEstionnaire');

INSERT INTO T_OEUVRE_OVR VALUES (NULL, 'Jeu de la vie', '1970', 'Célèbre automate cellulaire.', 'Gospers_glider_gun.gif');
INSERT INTO TJ_EXP_OVR VALUES (1, 1);

INSERT INTO T_OEUVRE_OVR VALUES (NULL, 'Jeu des pousses', '1967', 'Jeu de graphes qui se joue avec un papier et un crayon.', NULL);
INSERT INTO TJ_EXP_OVR VALUES (1, 2);
INSERT INTO TJ_EXP_OVR VALUES (13, 2);

INSERT INTO T_OEUVRE_OVR VALUES (NULL, 'Problème de l\'ange', '1974', 'Un ange se déplace d\'un certain nombre de cases sur une grille infinie, à chaque tour le démon peut bloquer une case, arrivera-t-il à bloquer l\'ange ?', 'ange.png');
INSERT INTO TJ_EXP_OVR VALUES (1, 3);

INSERT INTO T_OEUVRE_OVR VALUES (NULL, 'Pentamino', '1953', 'Jeu ayant inspiré Tetris mais avec 18 pièces de 5 carrés.', 'Pentominoes.JPG');
INSERT INTO TJ_EXP_OVR VALUES (2, 4);
INSERT INTO TJ_EXP_OVR VALUES (3, 4);

INSERT INTO T_OEUVRE_OVR VALUES (NULL, 'MENACE', '1961', 'Machine Educable Noughts and Crosses Engine : Une intelligence artificielle pour le morpion faite de 304 boîtes d\'allumettes.', 'menace.jpg');
INSERT INTO TJ_EXP_OVR VALUES (4, 5);

INSERT INTO T_OEUVRE_OVR VALUES (NULL, 'Problème du chat et de la souris', '2019', 'Une souris essaye de sortir d\'une marre circulaire mais un chat essaye de l\'attrapper, ce dernier se déplace sur le périmètre du cercle.', 'catmouse.png');
INSERT INTO TJ_EXP_OVR VALUES (5, 6);

INSERT INTO T_OEUVRE_OVR VALUES (NULL, 'Fléchettes rétrécissantes', '2019', 'Plus la fléchette atterri proche du centre, moins la cible rétrécit.', 'darts.png');
INSERT INTO TJ_EXP_OVR VALUES (6, 7);

INSERT INTO T_OEUVRE_OVR VALUES (NULL, 'Tir complexe', '2010', 'Un nombre ou plusieurs sont affichés sur le plan complexe et une opération est donnée, le but est de placer la résultat sur le plan.', 'tir.png');
INSERT INTO TJ_EXP_OVR VALUES (7, 8);

INSERT INTO T_OEUVRE_OVR VALUES (NULL, 'Rubik\'s Cube', '1974', 'Célèbre puzzle cubique.', 'rubiks_cube.jpg');
INSERT INTO TJ_EXP_OVR VALUES (8, 9);

INSERT INTO T_OEUVRE_OVR VALUES (NULL, 'Les tours de Hanoi', '1883', 'Jeu d\'origine indienne dont le but est de déplacer une pile de disques en étant limité à trois positions et en gardant les tailles des disques décroissantes.', 'hanoi.jpg');
INSERT INTO TJ_EXP_OVR VALUES (9, 10);

INSERT INTO T_OEUVRE_OVR VALUES (NULL, '2048', '2014', 'Jeu célèbre où l\'on fusionne des cellules sur une grille.', '2048.png');
INSERT INTO TJ_EXP_OVR VALUES (10, 11);

INSERT INTO T_OEUVRE_OVR VALUES (NULL, 'Amazons', '1988', 'Jeu qui se joue sur une grille et dont les pièces se déplacent comme les dames des échecs, à chaque mouvement la pièce tir une flèche et bloque une case.', 'amazons.png');
INSERT INTO TJ_EXP_OVR VALUES (11, 12);

INSERT INTO T_OEUVRE_OVR VALUES (NULL, 'Taquin', '1870', 'Jeu qui se joue avec une grille de 4x4 et 15 pièces qui peuvent être glissées sur la case vacantes, le but étant de remettre les pièces dans l\'ordre mais ce n\'est pas toujours possible suivant la configuration de départ.', 'taquin.png');
INSERT INTO TJ_EXP_OVR VALUES (12, 13);
