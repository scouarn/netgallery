<?php 

include "redirect_note.php";
include "debug.php";


if (!isset($_POST['mdp'])    || !isset($_POST['mdp_conf'])
 || !isset($_POST['pseudo']) || !isset($_POST['role'])
 || !isset($_POST['nom'])    || !isset($_POST['prenom'])
 || !isset($_POST['mail']) ) {

	redirect_note("../livredor.php", "Paramètres invalides.");
}

include "connexion_bdd.php";

$mdp      = $mysqli->real_escape_string($_POST['mdp']);
$mdp_conf = $mysqli->real_escape_string($_POST['mdp_conf']);
$pseudo   = $mysqli->real_escape_string($_POST['pseudo']);
$nom      = $mysqli->real_escape_string($_POST['nom']);
$prenom   = $mysqli->real_escape_string($_POST['prenom']);
$mail     = $mysqli->real_escape_string($_POST['mail']);
$role     = $mysqli->real_escape_string($_POST['role']);

if($mdp != $mdp_conf)	{
	redirect_note("../session.php", "Les mots de passe sont différents.");
}


// ==================
// CREATION DU COMPTE
// ==================

$query = "INSERT INTO T_COMPTE_CPT VALUES('{$pseudo}', MD5('{$mdp}'));";

//echo "$query<br/>";
$res = $mysqli->query($query);

if ($res == false) {

	// erreur unicité clé primaire
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
	'{$pseudo}', '{$nom}', 
    '{$prenom}', '{$mail}', 
    'D', '{$role}', NOW());
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
		redirect_note("../session.php", "Erreur lors de la création du profil : impossible de supprimer le compte créé.");
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
