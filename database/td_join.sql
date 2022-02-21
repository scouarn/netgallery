
#1) Donnez les numéros des tickets et les adresses e-mail des visiteurs qui existent dans la base de données et qui ont laissé un commentaire
SELECT vis_id, vis_email, com_text
FROM T_VISITEUR_VIS
JOIN T_COMMENTAIRE_COM
USING (vis_id);

#2) Donnez l’adresse e-mail du(des) visiteur(s) auquel(s) correspond un commentaire contenant le mot « fabuleux ».
SELECT vis_id, vis_email, com_text
FROM T_VISITEUR_VIS
JOIN T_COMMENTAIRE_COM
USING (vis_id)
WHERE com_text LIKE '%fabuleux%';


#3) a) Donnez les adresses e-mail des visiteurs liés à des commentaires en ligne.
SELECT vis_email
FROM T_VISITEUR_VIS
JOIN T_COMMENTAIRE_COM USING (vis_id)
WHERE com_status = 'OK';

#3) b) En utilisant la requête donnée à la question 3a), donnez les noms des visiteurs associés à des commentaires cachés (qui ne sont pas en ligne).
SELECT vis_nom FROM T_VISITEUR_VIS
JOIN T_COMMENTAIRE_COM USING (vis_id)
EXCEPT
SELECT com_id FROM T_VISITEUR_VIS
JOIN T_COMMENTAIRE_COM USING (vis_id)
WHERE com_status = 'OK';





# 4) Donnez le nom, le prénom et le pseudo du profil associé à l'actualité d'identifiant « 2 ».
SELECT pro_nom, pro_prenom, cpt_login
FROM T_PROFIL_PRO
JOIN T_COMPTE_CPT USING(cpt_login)
JOIN T_NEWS_NEW   USING(cpt_login)
WHERE new_id = 2;


# 5) Donnez les noms des profils qui n'ont pas encore posté d'actualité.
SELECT pro_nom
FROM T_PROFIL_PRO
JOIN T_COMPTE_CPT USING(cpt_login)
WHERE cpt_login NOT IN (
	SELECT cpt_login
	FROM T_NEWS_NEW
	WHERE new_id = 2
);


# 6) Donnez le numéro et le nom de tous les exposants ajoutés par « vmarc » et les intitulés des œuvres qu’ils présentent.
SELECT ovr_titre, exp_id, exp_nom
FROM T_EXPOSANT_EXP
JOIN T_COMPTE_CPT USING(cpt_login)
JOIN TJ_EXP_OVR   USING(exp_id)
JOIN T_OEUVRE_OVR USING(ovr_id)
WHERE cpt_login = 'vmarc';



# 7) Donnez les intitulés des œuvres associées aux exposants ajoutés par « Valérie MARC ».
SELECT ovr_titre, exp_id, exp_nom
FROM T_EXPOSANT_EXP
JOIN T_COMPTE_CPT USING(cpt_login)
JOIN T_PROFIL_PRO USING(cpt_login)
JOIN TJ_EXP_OVR   USING(exp_id)
JOIN T_OEUVRE_OVR USING(ovr_id)
WHERE pro_prenom LIKE 'Valérie'
AND   pro_nom LIKE 'Marc';


# 8) a) Donnez la liste de tous les pseudos ayant ou non posté une actualité.
SELECT cpt_login, new_id
FROM T_COMPTE_CPT
LEFT OUTER JOIN T_NEWS_NEW USING(cpt_login);

# 8) b) Right outer join
SELECT cpt_login, new_id
FROM T_NEWS_NEW
RIGHT OUTER JOIN T_COMPTE_CPT USING(cpt_login);

