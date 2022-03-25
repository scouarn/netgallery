INSERT INTO T_PRESENTATION_PRE VALUES ('2022-05-01 8:00:00', '2022-05-01 10:00:00', '2022-08-31 17:00:00', 'Les jeux mathématiques', 'Bienvenue sur l\'expo en ligne', 'Au café rue des Arpenteurs');


INSERT INTO T_COMPTE_CPT VALUES ('vmarc', MD5('motdepasse'));
INSERT INTO T_PROFIL_PRO VALUES ('vmarc', 'Marc', 'Valérie', 'vmarc@univ-brest.fr', 'A', 'A', NOW());

INSERT INTO T_COMPTE_CPT VALUES ('admin', MD5('admin'));
INSERT INTO T_PROFIL_PRO VALUES ('admin', 'Admin', 'Admin', 'admin@netgallery.localhast', 'A', 'A', NOW());

INSERT INTO T_COMPTE_CPT VALUES ('gEstionnaire', '98abb15e560057e55e4e99187702ed4e');
INSERT INTO T_PROFIL_PRO VALUES ('gEstionnaire', 'Estionnaire', 'Georges', 'ge@netgallery.localhast', 'A', 'A', NOW());

INSERT INTO T_COMPTE_CPT VALUES ('conservateur', MD5('mdp123'));
INSERT INTO T_PROFIL_PRO VALUES ('conservateur', 'Thine', 'Clément', 'clement.thine@netgallery.localhost', 'A', 'O', NOW());

INSERT INTO T_COMPTE_CPT VALUES ('terrieur', MD5('kEF4bPeG'));
INSERT INTO T_PROFIL_PRO VALUES ('terrieur', 'Terrieur', 'Alex', 'alex.terrieur@netgallery.localhost', 'A', 'O', NOW());

INSERT INTO T_COMPTE_CPT VALUES ('yann', MD5('KrEB8dWk'));
INSERT INTO T_PROFIL_PRO VALUES ('yann', 'Le Floc\'h', 'Yann', 'yann.lefloch@netgallery.localhost', 'A', 'O', NOW());

INSERT INTO T_COMPTE_CPT VALUES ('rld', MD5('rorodumusee84'));
INSERT INTO T_PROFIL_PRO VALUES ('rld', 'Le Duc', 'Robert', 'robert.leduc@netgallery.localhost', 'A', 'O', NOW());

INSERT INTO T_COMPTE_CPT VALUES ('martin', MD5('LWDCbvy3'));
INSERT INTO T_PROFIL_PRO VALUES ('martin', 'Martin', 'Martin', 'martin.martin@netgallery.localhost', 'A', 'O', NOW());

INSERT INTO T_COMPTE_CPT VALUES ('ytroloin', MD5('motdepasse'));
INSERT INTO T_PROFIL_PRO VALUES ('ytroloin', 'Troloin', 'Yvon', 'yvon.troloin@netgallery.localhost', 'A', 'O', NOW());

INSERT INTO T_COMPTE_CPT VALUES ('mel', MD5('anF_43!lem='));
INSERT INTO T_PROFIL_PRO VALUES ('mel', 'Anfaillite', 'Mélusine', 'melusine.anfaillite@netgallery.localhost', 'A', 'O', NOW());



INSERT INTO T_NEWS_NEW VALUES (NULL, NOW(), 'new0.html', 'gEstionnaire');
INSERT INTO T_NEWS_NEW VALUES (NULL, NOW(), 'new1.html', 'gEstionnaire');
INSERT INTO T_NEWS_NEW VALUES (NULL, NOW(), 'new2.html', 'admin');
INSERT INTO T_NEWS_NEW VALUES (NULL, NOW(), 'new3.html', 'vmarc');
INSERT INTO T_NEWS_NEW VALUES (NULL, NOW(), 'new4.html', 'gEstionnaire');



INSERT INTO T_VISITEUR_VIS VALUES (NULL, '000000000000000', NOW(), Maxime, Min, minimax@localhost, 'admin');
INSERT INTO T_VISITEUR_VIS VALUES (NULL, '111111111111111', NOW(), Goulven, Abivain, enain@localhost, 'admin');
INSERT INTO T_VISITEUR_VIS VALUES (NULL, '656565656565656', NOW(), Goulvain, Abiven, ainen@localhost, 'admin');
INSERT INTO T_VISITEUR_VIS VALUES (NULL, 'AAAAAAAAAAAAAAA', NOW(), Armel, Dupond, momo@localhost, 'admin');
INSERT INTO T_VISITEUR_VIS VALUES (NULL, '555555555555555', NOW(), Éric, Dupont, momo@localhost, 'admin');
INSERT INTO T_VISITEUR_VIS VALUES (NULL, 'abcabcabcabcabc', NOW(), NULL, NULL, NULL, 'admin');
INSERT INTO T_VISITEUR_VIS VALUES (NULL, 'defdefdefdefdef', NOW(), NULL, NULL, NULL, 'admin');

INSERT INTO T_COMMENTAIRE_COM VALUES (NULL, NOW(), 'Super musée !', 'OK', 1);
INSERT INTO T_COMMENTAIRE_COM VALUES (NULL, NOW(), 'Musée pas terrible', 'OK', 2);
INSERT INTO T_COMMENTAIRE_COM VALUES (NULL, NOW(), 'J\'ai bien aimé', 'OK', 3);
INSERT INTO T_COMMENTAIRE_COM VALUES (NULL, NOW(), 'C\'était joli', 'OK', 4);
INSERT INTO T_COMMENTAIRE_COM VALUES (NULL, NOW(), 'Je retournerai', 'OK', 5);


INSERT INTO T_EXPOSANT_EXP VALUES (NULL, 'Conway', 'John', 'Mathématicien 1937-2020', NULL, NULL, NULL, 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (NULL, 'Gardner', 'Martin', 'Mathématicien 1914-2010', NULL, NULL, NULL, 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (NULL, 'Golomb', 'Solomon', 'Mathématicien 1932-2016', NULL, NULL, NULL, 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (NULL, 'Michie', 'Donald', 'Chercheur en intélligence artificielle 1929-2007', NULL, NULL, NULL, 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (NULL, 'Sparks', 'Ben', '', NULL, NULL, NULL, 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (NULL, 'Sanderson', 'Grant', 'Créateur de 3Blue1Brown', NULL, NULL, NULL, 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (NULL, 'Droguet', 'Emmanuel', 'Prof de maths en prépa PCSI à Kérichen', NULL, NULL, NULL, 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (NULL, 'Rubik', 'Ernő', 'Architecte', NULL, NULL, NULL, 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (NULL, 'Lucas', 'Édouard', 'Mathématicien 1842-1891', NULL, NULL, NULL, 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (NULL, 'Cirulli', 'Gabriele', 'Développeur web italien', NULL, NULL, NULL, 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (NULL, 'Zamkauskas', 'Walter', 'Argentin', NULL, NULL, NULL, 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (NULL, 'Loyd', 'Sam', 'Mathématicien et joueur d\'échecs 1841-1911', NULL, NULL, NULL, 'gEstionnaire');
INSERT INTO T_EXPOSANT_EXP VALUES (NULL, 'Paterson', 'Mike', 'Informaticien', NULL, NULL, NULL, 'gEstionnaire');

INSERT INTO T_OEUVRE_OVR VALUES (NULL, 'Jeu de la vie', '1970', 'Célèbre automate cellulaire.', NULL);
INSERT INTO TJ_EXP_OVR VALUES (1, 1);

INSERT INTO T_OEUVRE_OVR VALUES (NULL, 'Jeu des pousses', '1967', 'Jeu de graphes qui se joue avec un papier et un crayon.', NULL);
INSERT INTO TJ_EXP_OVR VALUES (1, 2);
INSERT INTO TJ_EXP_OVR VALUES (13, 2);

INSERT INTO T_OEUVRE_OVR VALUES (NULL, 'Problème de l\'ange', '1974', 'Un ange se déplace d\'un certain nombre de cases sur une grille infinie, à chaque tour le démon peut bloquer une case, arrivera-t-il à bloquer l\'ange ?', NULL);
INSERT INTO TJ_EXP_OVR VALUES (1, 3);

INSERT INTO T_OEUVRE_OVR VALUES (NULL, 'Pentamino', '1953', 'Jeu ayant inspiré Tetris mais avec 18 pièces de 5 carrés.', NULL);
INSERT INTO TJ_EXP_OVR VALUES (2, 4);
INSERT INTO TJ_EXP_OVR VALUES (3, 4);

INSERT INTO T_OEUVRE_OVR VALUES (NULL, 'Menace', '1961', 'Machine Educable Noughts and Crosses Engine : Une intelligence artificielle pour le morpion faite de 304 boîtes d\'allumettes.', NULL);
INSERT INTO TJ_EXP_OVR VALUES (4, 5);

INSERT INTO T_OEUVRE_OVR VALUES (NULL, 'Je du chat et de la souris', '2019', 'Une souris essaye de sortir d\'une marre circulaire mais un chat essaye de l\'attrapper, ce dernier se déplace sur le périmètre du cercle.', NULL);
INSERT INTO TJ_EXP_OVR VALUES (5, 6);

INSERT INTO T_OEUVRE_OVR VALUES (NULL, 'Fléchettes rétrécissantes', '2019', 'Plus la fléchette atterri proche du centre, moins la cible rétrécit.', NULL);
INSERT INTO TJ_EXP_OVR VALUES (6, 7);

INSERT INTO T_OEUVRE_OVR VALUES (NULL, 'Tir complexe', '2010', 'Un nombre ou plusieurs sont affichés sur le plan complexe et une opération est donnée, le but est de placer la résultat sur le plan.', NULL);
INSERT INTO TJ_EXP_OVR VALUES (7, 8);

INSERT INTO T_OEUVRE_OVR VALUES (NULL, 'Rubik\'s Cube', '1974', 'Célèbre puzzle cubique.', NULL);
INSERT INTO TJ_EXP_OVR VALUES (8, 9);

INSERT INTO T_OEUVRE_OVR VALUES (NULL, 'Les tours de Hanoi', '1883', 'Jeu d\'origine indienne dont le but est de déplacer une pile de disques en étant limité à trois positions et en gardant les tailles des disques décroissantes.', NULL);
INSERT INTO TJ_EXP_OVR VALUES (9, 10);

INSERT INTO T_OEUVRE_OVR VALUES (NULL, '2048', '2014', 'Jeu célèbre où l\'on fusionne des cellules sur une grille.', NULL);
INSERT INTO TJ_EXP_OVR VALUES (10, 11);

INSERT INTO T_OEUVRE_OVR VALUES (NULL, 'Amazons', '1988', 'Jeu qui se joue sur une grille et dont les pièces se déplacent comme les dames des échecs, à chaque mouvement la pièce tir une flèche et bloque une case.', NULL);
INSERT INTO TJ_EXP_OVR VALUES (11, 12);

INSERT INTO T_OEUVRE_OVR VALUES (NULL, 'Taquin', '1870', 'Jeu qui se joue avec une grille de 4x4 et 15 pièces qui peuvent être glissées sur la case vacantes, le but étant de remettre les pièces dans l\'ordre mais ce n\'est pas toujours possible suivant la configuration de départ.', NULL);
INSERT INTO TJ_EXP_OVR VALUES (12, 13);
