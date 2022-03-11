<?php 

$mysqli = new mysqli('localhost','scouarn','admin','netgallery');

$login = htmlspecialchars($_POST['pseudo']);
$mdp   = htmlspecialchars($_POST['mdp']);


$query = "SELECT * FROM T_PROFIL_PRO JOIN T_COMPTE_CPT USING(cpt_login) WHERE cpt_login = '" . addslashes($login) . "' AND cpt_mdp = MD5('" . addslashes($mdp) . "') AND pro_valid = 'A';";


$res = $mysqli->query($query);


if ($res == false) {

	echo("Erreur SQL : ");
	echo ("Errno: " . $mysqli->errno . "<br/>");
	echo ("Error: " . $mysqli->error . "<br/>");
	exit();

}

if ($res->fetch_assoc()) {

	echo "Connexion réussie.<br/>";
	echo "Bienvenue " . $login . "<br/>";
}
else {
	echo "Login ou mdp incorrect.<br/>";
}


$mysqli->close();

?>
