

<?php 

include "debug.php";

session_start();
if(!isset($_SESSION['login']) || !isset($_SESSION['role'])) {
	header("Location:../session.php");
}

if (isset($_POST['mdp'])) {

	if (preg_match("/[a-zA-Z0-9_]{15}/", $_POST['mdp'])) {
	   $mdp = $_POST['mdp'];
	}
	else {
		echo "Format mdp incorrect<br/>";
		exit;
	}

}


include "../action/connexion_bdd.php";


$query = "INSERT INTO T_VISITEUR_VIS VALUES
		  (NULL, '{$mdp}', NOW(), NULL, NULL, NULL, '{$_SESSION['login']}');
	  ";
		  

echo "{$query}</br>";
$res = $mysqli->query($query);

if ($res == false) {

	/* erreur unicité */
	if ($mysqli->errno == 1062) {
		echo "Ce ticket existe déjà !<br/>";
		exit;
	}
	else {

		echo("Impossible de créer le ticket : Erreur {$mysqli->errno}, {$mysqli->error}<br/>");
		exit;
	}
	
}
else {
	echo "Ajout OK</br>";
	exit;
}

$mysqli->close();

?>