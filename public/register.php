<?php 

$mysqli = new mysqli('localhost','scouarn','admin','netgallery');

if ($_POST['pseudo']) {
	$pseudo = htmlspecialchars(addslashes($_POST['pseudo']));
}
else {
	echo "Le pseudo ne peut pas être vide.";
}

if ($_POST['pseudo']) {
	$pseudo = htmlspecialchars(addslashes($_POST['pseudo']));
}
else {
	echo "Le pseudo ne peut pas être vide.";
	exit(-1);
}

if ($_POST['mdp']) {
	$mdp = htmlspecialchars(addslashes($_POST['mdp']));
}
else {
	echo "Le mot de passe ne peut pas être vide.";
	exit(-1);
}

if ($_POST['mdp_conf']) {
	$mdp_conf = htmlspecialchars(addslashes($_POST['mdp']));

	if ($mdp_conf != $mdp) {
		echo "Mot de passe différent.";
		exit(-1);
	}
}


if ($_POST['prenom']) {
	$prenom = htmlspecialchars(addslashes($_POST['prenom']));
}
else {
	echo "Le prénom ne peut pas être vide.";
	exit(-1);
}

if ($_POST['mail']) {
	$mail = htmlspecialchars(addslashes($_POST['mail']));
}
else {
	echo "L'adresse email ne peut pas être vide.";
	exit(-1);
}

// + profil orga désactivé



$query = "INSERT INTO T_COMPTE_CPT VALUES('" .$login . "', MD5('" . $mdp . "'));";

$res = $mysqli->query($query);


if ($res == false) {

	if ($mysqli->errno == 1062) {
		echo "Ce pseudo est déjà utilisé !<br/>";
	}
	else {
		echo("Erreur SQL : ");
		echo ("Errno: " . $mysqli->errno . "<br/>");
		echo ("Error: " . $mysqli->error . "<br/>");
		exit();
	}

}

else {

	echo "Inscription réussie.<br/>";
	echo "Bienvenue " . $login . "<br/>";
}

$mysqli->close();

?>
