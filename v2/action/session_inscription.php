<?php 

include "redirect_note.php";

$inputs = array();

if (isset($_POST['pseudo'])) {
	$inputs['pseudo'] = htmlspecialchars(addslashes($_POST['pseudo']));
}
else {
	redirect_note("../session.php", "Le pseudo ne peut pas être vide.");
}

if (isset($_POST['mdp'])) {
	$inputs['mdp'] = htmlspecialchars(addslashes($_POST['mdp']));
}
else {
	redirect_note("../session.php", "Le mot de passe ne peut pas être vide.";
}

if (isset($_POST['mdp_conf'])) {
	$mdp_conf = htmlspecialchars(addslashes($_POST['mdp_conf']));

	if($mdp_conf != $inputs['mdp'])	{
		redirect_note("../session.php", "Les mots de passe sont différents.");
	}

}
else {
	redirect_note("../session.php", "Veuillez confirmer votre mot de passe.");
}


if (isset($_POST['nom'])) {
	$inputs['nom'] = htmlspecialchars(addslashes($_POST['nom']));
}
else {
	redirect_note("../session.php", "Le nom ne peut pas être vide.");
}

if (isset($_POST['prenom'])) {
	$inputs['prenom'] = htmlspecialchars(addslashes($_POST['prenom']));
}
else {
	redirect_note("../session.php", "Le prénom ne peut pas être vide.");
}

if (isset($_POST['mail'])) {
	$inputs['mail'] = htmlspecialchars(addslashes($_POST['mail']));
}
else {
	redirect_note("../session.php", "L'adresse email ne peut pas être vide.");
}

if (isset($_POST['role'])) {
	$inputs['role'] = htmlspecialchars(addslashes($_POST['role']));
}
else {
	redirect_note("../session.php", "Vous devez choisir un rôle.");
}



include "../connexion_bdd.php";

// ==================
// CREATION DU COMPTE
// ==================

$query = "INSERT INTO T_COMPTE_CPT VALUES('{$inputs['pseudo']}', MD5('{$inputs['mdp']}'));";

//echo "$query<br/>";

$res = $mysqli->query($query);

if ($res == false) {

	/* erreur unicité clé primaire */
	if ($mysqli->errno == 1062) {
		redirect_note("../session.php", "Ce pseudo est déjà utilisé !");
	}
	else {
		// echo "Erreur SQL : {$mysqli->errno} {$mysqli->error}<br/>";
		redirect_note("../session.php", "Impossible de créer le compte.");
	}

}


// ==================
// CREATION DU PROFIL
// ==================

$query = "INSERT INTO T_PROFIL_PRO VALUES(
	'{$inputs['pseudo']}', '{$inputs['nom']}', 
    '{$inputs['prenom']}', '{$inputs['mail']}', 
    'D', '{$inputs['role']}', NOW());
";

//echo "$query<br/>";

$res = $mysqli->query($query);

if ($res == false) {
	// echo "Erreur SQL : {$mysqli->errno} {$mysqli->error}<br/>";

	$query = "DELETE FROM T_COMPTE_CPT WHERE cpt_login = '{$inputs['pseudo']}';";
	// echo "{$query}<br/>";
	$res = $mysqli->query($query);

	if ($res == false) {
		// echo "Erreur SQL : {$mysqli->errno} {$mysqli->error}<br/>";
		redirect_note("../session.php", "Erreur lors de la création du profil : impossible de supprimer le compte créé, veillez contacter un administrateur.");
	}
	else {
		redirect_note("../session.php", "Impossible de créer le profil.");
	}
	
}
else {
	redirect_note("../session.php", "Inscription réussie. Votre compte n'est pas encore activé.";
}

$mysqli->close();

?>
