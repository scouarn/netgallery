<?php 

$mysqli = new mysqli('localhost','scouarn','admin','netgallery');

$login = htmlspecialchars($_POST['pseudo']);
$mdp   = htmlspecialchars($_POST['mdp']);

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
