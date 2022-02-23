-- 1. Requête d'ajout d'une actualité
SET @fichier = 'new_x.html';
SET @login = 'admin';

INSERT INTO T_NEWS_NEW VALUES (NULL, NOW(), @fichier, @login);

-- 2. Requête donnant la dernière actualité ajoutée
SELECT MAX(new_id) FROM T_NEWS_NEW;

-- 3. Requête listant toutes les actualités et leur auteur
SELECT * FROM T_NEWS_NEW JOIN T_COMPTE_CPT USING(cpt_login);

-- 4. Requête listant les 5 dernières actualités ajoutées et leur auteur
SET @combien = 5;

SELECT * FROM T_NEWS_NEW
ORDER BY new_id DESC
LIMIT 5; #@combien

-- 5. Requête de modification d'une actualité
SET @id = (SELECT MAX(new_id) FROM T_NEWS_NEW);
SET @fichier = 'nouveau_fichier.html';

UPDATE T_NEWS_NEW SET new_html = @fichier WHERE new_id = @id;

-- 6. Requête de suppression d'une actualité à partir de son ID (n°)
SET @id = (SELECT MAX(new_id) FROM T_NEWS_NEW); 
DELETE FROM T_NEWS_NEW WHERE new_id = @id;

-- 7. Requête de suppression de toutes les actualités publiées avant une certaine date
-- (suppression des actualités trop anciennes)
SET @quand = '2022-01-01 00:00:00';
DELETE FROM T_NEWS_NEW WHERE new_date < @quand;


-- Profils et comptes :
-- 8. Requêtes d'ajout des données d'un profil + compte associé
SET @login = 'vmarc';
SET @mdp = 'motdepasse';
SET @nom = 'Marc';
SET @prenom = 'Valérie';
SET @email = '';
SET @role = 'A';

INSERT INTO T_COMPTE_CPT VALUES (@login, @mdp);
INSERT INTO T_PROFIL_PRO VALUES (@login, @nom, @prenom, @email, 'D', @role);

-- 9. Requête de vérification des données de connexion (pseudo et mot de passe), c’est à dire requête qui vérifie l’existence (ou non) du couple pseudo / mot de passe (profil activé)
SET @login = 'vmarc';
SET @mdp = 'motdepasse';

SELECT COUNT(*) = 1
FROM T_PROFIL_PRO JOIN T_COMPTE_CPT USING(cpt_login)
WHERE cpt_login = @login
AND cpt_mdp = MD5(@mdp)
AND pro_valid = 'A';


-- 10. Requête de récupération de toutes les données d'un profil (dont on connaît le pseudo)
SET @login = 'vmarc';

SELECT * FROM T_PROFIL_PRO WHERE cpt_login = @login;

-- 11. Requête permettant de connaître le statut d’un utilisateur dont on connaît le nom et le prénom
SET @nom = 'Marc';
SET @prenom = 'Valérie';

SELECT pro_valid FROM T_PROFIL_PRO 
WHERE pro_prenom = @prenom
AND pro_nom = @nom;

-- 12. Requête de modification de plusieurs données d'un profil (pseudo connu)
SET @login = 'vmarc';
SET @nom = 'Marc';
SET @prenom = 'Valérie';
SET @email = '';
SET @role = 'A';
SET @status = 'A';

UPDATE T_PROFIL_PRO
-- SET pro_nom = @nom
-- SET pro_prenom = @prenom
-- SET pro_email = @email
-- SET pro_role = @role
-- SET pro_status = @status
WHERE cpt_login = @login;


-- 13. Requête de mise à jour du mot de passe d'un compte (pseudo connu)
SET @mdp = 'motdepasse';
SET @login = 'vmarc';
UPDATE T_COMPTE_CPT SET cpt_mdp = MD5(@mdp) WHERE cpt_login = @login;

-- 14. Requête listant toutes les données des profils + comptes associés
SELECT * FROM T_PROFIL_PRO JOIN T_COMPTE_CPT USING(cpt_login);

-- 15. Requête de désactivation (/activation) d'un profil (pseudo connu)
SET @login = 'vmarc';
UPDATE T_PROFIL_PRO SET pro_valid = 'D' WHERE cpt_login = @login;



--21. Requête de génération d’un nouveau ticket visiteur
SET @pseudo = 'vmarc';
SET @mdp = 'xxxxxxxxxxxxxxx'; 

INSERT INTO T_VISITEUR_VIS VALUES (NULL, @mdp, NOW(), NULL, NULL, NULL, @pseudo);


--22. Requête donnant tous les visiteurs (ID + e-mail) et les commentaires associés, s’il y en a
SELECT com_text, vis_id, vis_email
FROM T_COMMENTAIRE_COM
RIGHT JOIN T_VISITEUR_VIS USING(vis_id);



--23. Requête de suppression d’un ticket visiteur (+ donnée associée) connaissant l’ID du ticket
SET @vis = 6;

DELETE FROM T_COMMENTAIRE_COM WHERE vis_id = @vis;
DELETE FROM T_VISITEUR_VIS    WHERE vis_id = @vis;


--24. Requête(s) donnant le pourcentage des visiteurs n’ayant pas laissé de commentaire

SELECT 
	(SELECT COUNT(vis_id) FROM T_VISITEUR_VIS 
	 WHERE vis_id NOT IN (SELECT vis_id FROM T_COMMENTAIRE_COM))
/	(SELECT COUNT(vis_id) 
	  FROM T_VISITEUR_VIS)
* 100.0
as pourcentage;




--25. Requête(s) d’ajout d’un commentaire et de mise à jour du ticket associé connaissant l’ID et le mot de passe du ticket visiteur
SET @vis = 6;
SET @mdp = 'xxxxxxxxxxxxxxx';
SET @txt = 'Le musée était joli';

-- test mdp/validité ???
SELECT vis_id
FROM T_VISITEUR_VIS
WHERE (vis_id, vis_mdp) = (@vis, @mdp)
AND HOUR(TIMEDIFF(NOW(), vis_date)) < 2;

-- insertion
INSERT INTO T_COMMENTAIRE_COM VALUES (NULL, NOW(), @txt, @vis, 'OK');


--26. Requête cachant un commentaire dont on connaît l’identifiant (ID)
SET @com = 6;
SET @status = 'KO';

UPDATE T_COMMENTAIRE_COM 
SET com_status = @status
WHERE com_id = @com;


--27. Requête récupérant tous les commentaires (publiés) du livre d’or
SELECT com_text
FROM T_COMMENTAIRE_COM
WHERE com_status = 'OK';

--28. Requête listant tous les commentaires (+e-mail visiteurs), y compris ceux qui sont cachés
SELECT com_text, vis_email
FROM T_COMMENTAIRE_COM
JOIN T_VISITEUR_VIS USING(vis_id);


--29. Requête de suppression / modification d’un commentaire connaissant l’ID + mot de passe du ticket
SET @com = 1;
SET @mdp = 'xxxxxxxxxxxxxxx';
SET @new_desc = 'En fait le musée était pas terrible...'

-- test mdp
SELECT vis_id 
FROM T_VISITEUR_VIS
JOIN T_COMMENTAIRE_COM USING(vis_id)
WHERE vis_mdp = @mdp;

DELETE FROM T_COMMENTAIRE_COM WHERE com_id = @com;

UPDATE T_COMMENTAIRE_COM 
SET com_desc = @new_desc
WHERE com_id = @com;


--30. Requête d’ajout d’une œuvre
SET @nom_oeuvre = 'nouvelle_oeuvre';

INSERT INTO T_OEUVRE_OVR (ovr_titre) VALUES (@nom_oeuvre);
-- INSERT INTO TJ_EXP_OVR VALUES (1, 3);


--31. Requête listant toutes les œuvres (intitulé, description et nom de l’image)
SELECT ovr_titre, ovr_desc, ovr_img
FROM T_OEUVRE_OVR;

--32. Requête donnant toutes les données d’une œuvre particulière dont on connaît l’ID
SET @oeuvre = 1;

SELECT *
FROM T_OEUVRE_OVR
WHERE ovr_id = @oeuvre;


--33. Requête listant tous les exposants (nom, biographie, URL du site Web et nom de l’image)
SELECT exp_prenom, exp_nom, exp_bio, exp_website, exp_img
FROM T_EXPOSANT_EXP;

--34. Requête donnant toutes les données d’un exposant particulier dont on connaît l’ID
SET @exposant = 1;

SELECT *
FROM T_EXPOSANT_EXP
WHERE exp_id = @exposant;


--35. Requête donnant les intitulés et images des œuvres collectives
SELECT ovr_titre, ovr_img
FROM T_OEUVRE_OVR
WHERE ovr_id IN (
	SELECT ovr_id FROM TJ_EXP_OVR
	GROUP BY ovr_id
	HAVING COUNT(exp_id) > 1
);


--36. Requêtes donnant toutes les données de toutes les œuvres de la base de données
SELECT * FROM T_OEUVRE_OVR;


--37. Requête donnant les ID des exposants ayant participé à une œuvre collective

-- t1.exp_id a travaillé avec t2.exp_id sur ovr_id
SELECT t1.exp_id
FROM TJ_EXP_OVR as t1
JOIN TJ_EXP_OVR as t2 USING(ovr_id) 
WHERE t1.exp_id <> t2.exp_id;


--38. Requête(s) supprimant les données d’un exposant s’il n’a que des œuvres individuelles (mais conservation de l’exposant et de sa participation à des œuvres collectives) + Cf 42
SET @exp = 1;

-- vérifier que l'exposant n'expose que des oeuvres individuelles
SELECT * FROM T_EXPOSANT_EXP
WHERE exp_id NOT IN (
	SELECT exp_id, ovr_id FROM TJ_EXP_OVR
	GROUP BY ovr_id
	HAVING COUNT(exp_id) > 1
);

-- suppr
DELETE FROM TJ_EXP_OVR WHERE exp_id = @exp;
DELETE FROM T_EXPOSANT_EXP WHERE exp_id = @exp;


--39. Requête(s) supprimant toutes les données d’une œuvre (NE PAS supprimer les exposants, surtout s’ils sont liés à d’autres œuvres !) (Rappel : un exposant expose au moins une œuvre minimum) + Cf 42

SET @ovr = 1;

DELETE FROM TJ_EXP_OVR WHERE ovr_id = @ovr;
DELETE FROM T_OEUVRE_OVR WHERE ovr_id = @ovr;



--40. Requête de modification des caractéristiques d’une œuvre / d’un exposant
SET @ovr = 1;
SET @new_title = 'oeuvre trop belle';

UPDATE T_OEUVRE_OVR
SET ovr_titre = @new_title
WHERE ovr_id = @ovr;


--41. Requête associant une œuvre à un exposant / dissociant une œuvre d’un exposant (ID connus)
SET @ovr = 1;
SET @exp = 1;

INSERT INTO TJ_EXP_OVR (exp_id, ovr_id) VALUES (@exp, @ovr);

-- dissoss
DELETE FROM TJ_EXP_OVR WHERE (exp_id, ovr_id) = (@exp, @ovr);


--42. Requête supprimant toutes les œuvres liées à aucun exposant (idem pour les exposants)

DELETE FROM T_OEUVRE_OVR 
WHERE ovr_id NOT IN (
	SELECT ovr_id FROM TJ_EXP_OVR
);

DELETE FROM T_EXPOSANT_EXP 
WHERE exp_id NOT IN (
	SELECT exp_id FROM TJ_EXP_OVR
);