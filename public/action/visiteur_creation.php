

<?php 


session_start();
if(!isset($_SESSION['login']) || !isset($_SESSION['role'])) {
	header("Location:../session.php");
}

if (isset($_POST['mdp'])) {

	if (preg_match("/[a-zA-Z0-9/+]{15}/", $_POST['mdp'])) {
	   $mdp = $_POST['mdp'];
	}
	else {
		echo "Format mdp incorrect<br/>"; // hacked html / made up request
		exit;
	}

}


include "../action/connexion_bdd.php";


$query = "INSERT INTO T_VISITEUR_VIS VALUES
		  (NULL, '{$mdp}', NOW(), NULL, NULL, NULL, '{$_SESSION['login']}');
	  ";
		  

// echo "{$query}</br>";
$res = $mysqli->query($query);

if ($res == false) {

	/* erreur unicité */
	if ($mysqli->errno == 1062) {
		echo "Ce ticket existe déjà !<br/>";
		exit;
	}
	else {
		echo "Impossible de créer le ticket.<br/>";
		echo "Erreur SQL : {$mysqli->errno} {$mysqli->error}<br/>";
		exit;
	}
	
}
else {
	echo "Ajout OK</br>";
	exit;
}

$mysqli->close();

?>