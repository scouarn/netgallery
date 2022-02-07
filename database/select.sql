-- Actualités :

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
SET @role = 'A'

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
SET @role = 'A'
SET @status = 'A'

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

