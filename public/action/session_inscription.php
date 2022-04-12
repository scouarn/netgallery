<?php 

$inputs = array();

if (isset($_POST['pseudo'])) {
	$inputs['pseudo'] = htmlspecialchars(addslashes($_POST['pseudo']));
}
else {
	echo "Le pseudo ne peut pas être vide.<br/>";
	exit;
}

if (isset($_POST['mdp'])) {
	$inputs['mdp'] = htmlspecialchars(addslashes($_POST['mdp']));
}
else {
	echo "Le mot de passe ne peut pas être vide.<br/>";
	exit;
}

if (isset($_POST['mdp_conf'])) {
	$mdp_conf = htmlspecialchars(addslashes($_POST['mdp_conf']));

	if($mdp_conf != $inputs['mdp'])	{
		echo "Les mots de passe sont différents.<br/>";
		exit;
	}

}
else {
	echo "Veuillez confirmer votre mot de passe.<br/>";
	exit;
}


if (isset($_POST['nom'])) {
	$inputs['nom'] = htmlspecialchars(addslashes($_POST['nom']));
}
else {
	echo "Le nom ne peut pas être vide.<br/>";
	exit;
}

if (isset($_POST['prenom'])) {
	$inputs['prenom'] = htmlspecialchars(addslashes($_POST['prenom']));
}
else {
	echo "Le prénom ne peut pas être vide.<br/>";
	exit;
}

if (isset($_POST['mail'])) {
	$inputs['mail'] = htmlspecialchars(addslashes($_POST['mail']));
}
else {
	echo "L'adresse email ne peut pas être vide.<br/>";
	exit;
}

if (isset($_POST['role'])) {
	$inputs['role'] = htmlspecialchars(addslashes($_POST['role']));
}
else {
	echo "Vous devez choisir un rôle.<br/>";
	exit;
}



include "../connexion_bdd.php";

// ==================
// CREATION DU COMPTE
// ==================

$query = "INSERT INTO T_COMPTE_CPT VALUES('{$inputs['pseudo']}', MD5('{$inputs['mdp']}'));";

//echo "$query<br/>";

$res = $mysqli->query($query);

if ($res == false) {
	
	echo "Impossible de créer le compte.<br/>";

	/* erreur unicité clé primaire */
	if ($mysqli->errno == 1062) {
		echo "Ce pseudo est déjà utilisé !<br/>";
	}
	else {
		echo "Erreur SQL : {$mysqli->errno} {$mysqli->error}<br/>";
	}
	exit;

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
	echo "Impossible de créer le profil.<br/>";
	echo "Erreur SQL : {$mysqli->errno} {$mysqli->error}<br/>";


	$query = "DELETE FROM T_COMPTE_CPT WHERE cpt_login = '{$inputs['pseudo']}';";
	// echo "{$query}<br/>";
	$res = $mysqli->query($query);

	if ($res == false) {
		echo "Impossible de supprimer le compte créé, veillez contacter un administrateur.<br/>";
		echo "Erreur SQL : {$mysqli->errno} {$mysqli->error}<br/>";
		exit;
	}
	else {
		echo "Compte supprimé.<br/>";	
		exit;
	}
	
}
else {
	echo "Inscription réussie. Votre compte n'est pas encore activé.<br/>";
	exit;
}

$mysqli->close();

?>
