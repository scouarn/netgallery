

<?php 
include 'redirect_note.php';

session_start();
if(!isset($_SESSION['login']) || !isset($_SESSION['role'])) {
	header("Location:../session.php");
}

if (isset($_POST['mdp'])) {

	if (preg_match("/[a-zA-Z0-9\/+]{15}/i", $_POST['mdp'])) {
	   $mdp = $_POST['mdp'];
	}
	else {
		redirect_note("../admin_visiteurs.php", "Format mdp incorrect.");
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
		redirect_note("../admin_visiteurs.php", "Ce ticket existe déjà !");
	}
	else {
		// echo "Erreur SQL : {$mysqli->errno} {$mysqli->error}<br/>";
		redirect_note("../admin_visiteurs.php", "Impossible de créer le ticket.");
	}
	
}
else {
	redirect_note("../admin_visiteurs.php", "Ticket visiteur créé !");
}

$mysqli->close();

?>