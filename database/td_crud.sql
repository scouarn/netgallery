
--1. modifiez la validité d’un profil connaissant le pseudo de l'utilisateur.
SET @pseudo = 'vmarc';
SET @valid = 'A';

UPDATE T_PROFIL_PRO 
SET pro_valid = @valid
WHERE cpt_login = @pseudo;


--2. Supprimez une ligne de la table des profils connaissant le pseudo d'un utilisateur.
SET @pseudo = 'vmarc';

-- suppr/réattribuer news et exposants liés à ce pseudo
DELETE FROM T_PROFIL_PRO WHERE cpt_login = @pseudo;
DELETE FROM T_COMPTE_CPT WHERE cpt_login = @pseudo;

--3. a) Listez tous les noms, prénoms et rôles des utilisateurs suivant l'ordre alphabétique des noms de famille.
SELECT pro_nom, pro_prenom, pro_role
FROM T_PROFIL_PRO
ORDER BY pro_nom;


--3. b) Listez tous les noms, prénoms et rôles des utilisateurs rassemblés par rôle.
SELECT pro_nom, pro_prenom, pro_role
FROM T_PROFIL_PRO
ORDER BY pro_role;



--4. Listez tous les noms, prénoms et adresses e-mail des utilisateurs de rôle 'O' (Organisateur) dans l'ordre alphabétique décroissant des prénoms.
SELECT pro_nom, pro_prenom, pro_email
FROM T_PROFIL_PRO
WHERE pro_role = 'O'
ORDER BY pro_prenom DESC;



--5. listez le nom et le prénom des profils ajoutés en 2018,
SET @annee = 2022;

SELECT pro_nom, pro_prenom, pro_date
FROM T_PROFIL_PRO
WHERE YEAR(pro_date) = @annee;


--6. insérer la date du jour lors de l'ajout d’une actualité,
SET @pseudo = 'gEstionnaire';
SET @fichier = 'new.html';
--SET @fichier = CONCAT('new_', DATE_FORMAT(NOW(), '%Y%m%d_%H%i%s'), '.html');

INSERT INTO T_NEWS_NEW VALUES (NULL, NOW(), @fichier, @pseudo);


--7. déterminez le numéro de la dernière actualité ajoutée (+ son texte ?),
SELECT new_id, new_html 
FROM T_NEWS_NEW 
WHERE new_id = (
	SELECT MAX(new_id) FROM T_NEWS_NEW
);

-- ou bien
SELECT new_id, new_html 
FROM T_NEWS_NEW
ORDER BY new_id DESC
LIMIT 1;


--8. déterminez toutes les actualités ajoutées entre 2 dates à spécifier,
SET @debut = '2022-01-01';
SET @fin = '2022-02-10';

SELECT * 
FROM T_NEWS_NEW
WHERE new_date > @debut
AND new_date < @fin;

-- ou bien
SELECT * 
FROM T_NEWS_NEW
WHERE new_date BETWEEN @debut AND @fin;


--9. dénombrez les Organisateurs puis les Administrateurs,
SELECT pro_role, COUNT(*)
FROM T_PROFIL_PRO
GROUP BY pro_role;


--10. déterminez les différents rôles d'utilisateurs qui existent (2 actuellement),
SELECT pro_role
FROM T_PROFIL_PRO
GROUP BY pro_role;


--11. donnez le pourcentage de tickets visiteurs générés par « vmarc ».
SET @pseudo = 'vmarc';

SELECT 
	(SELECT COUNT(vis_id) 
	 FROM T_VISITEUR_VIS
	 WHERE cpt_login = @pseudo)
/	(SELECT COUNT(vis_id) 
	  FROM T_VISITEUR_VIS)
* 100.0
as pourcentage;


--12. Donnez la requête permettant de vérifier qu'un pseudo et le mot de passe associé existent dans la base de données. A quoi sert cette requête ?
SET @login = 'vmarc';
SET @mdp = 'motdepasse';

SELECT COUNT(*)
FROM T_COMPTE_CPT
JOIN T_PROFIL_PRO USING(cpt_login)
WHERE cpt_login = @login
AND cpt_mdp = MD5(@mdp)
AND pro_valid = 'A';


-- 13. Supprimez toutes les données associées à l’utilisateur de pseudo « mdurand ». Que faut-il faire si cet utilisateur a ajouté des actualités / exposants ?
SET @pseudo = 'mdurand';

DELETE FROM T_NEWS_NEW     WHERE cpt_login = @pseudo;
DELETE FROM T_EXPOSANT_EXP WHERE cpt_login = @pseudo;
DELETE FROM T_VISITEUR_VIS WHERE cpt_login = @pseudo;

DELETE FROM T_PROFIL_PRO WHERE cpt_login = @pseudo;
DELETE FROM T_COMPTE_CPT WHERE cpt_login = @pseudo;


--14. Proposez une requête permettant de vérifier s’il y a bien autant de comptes que de profils dans la base de données.

-- vrai ou faux
SELECT 
	(SELECT COUNT(cpt_login) FROM T_COMPTE_CPT)
=	(SELECT COUNT(cpt_login) FROM T_PROFIL_PRO);


-- liste les comptes sans profil
-- rq : un profil a forcément un compte à cause de la contrainte de clé étrangère
SELECT * FROM T_COMPTE_CPT
LEFT JOIN T_PROFIL_PRO USING(cpt_login)
WHERE pro_valid IS NULL;


-- autre méthodes
SELECT cpt_login FROM T_COMPTE_CPT
EXCEPT
SELECT cpt_login FROM T_PROFIL_PRO;

SELECT * FROM T_COMPTE_CPT
WHERE cpt_login NOT IN (
	SELECT cpt_login FROM T_PROFIL_PRO
);



--15. Supprimez tous les comptes n’ayant pas de profil associé.
DELETE FROM T_COMPTE_CPT
WHERE cpt_login NOT IN (
	SELECT cpt_login FROM T_PROFIL_PRO
);


-- 16. Pour aller plus loin : donnez la liste de tous les pseudos qui existent dans la base de données et les exposants associés, s’il y en a, ainsi que leur(s) œuvre(s).

SELECT cpt_login, exp_nom, ovr_titre
FROM T_COMPTE_CPT
LEFT JOIN T_EXPOSANT_EXP USING(cpt_login)
LEFT JOIN TJ_EXP_OVR USING(exp_id)
LEFT JOIN T_OEUVRE_OVR USING(ovr_id);


