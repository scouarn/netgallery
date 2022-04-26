

<?php 

include 'redirect_note.php';

session_start();
if(!isset($_SESSION['login']) || !isset($_SESSION['role'])) {
	header("Location:../session.php");
}

if (isset($_POST['n'])) {
	$n = max(1, min(100, $_POST['n'])); // clamp
}
else {
	$n = 1;
}

include "connexion_bdd.php";

$i = 0;
while ($i < $n) {

	// ni sécurisé ni unique
	$mdp = substr(base64_encode(hash("md5", uniqid(), true)), 0, 15);

	$query = "INSERT INTO T_VISITEUR_VIS VALUES
	         (NULL, '{$mdp}', NOW(), NULL, NULL, NULL, '{$_SESSION['login']}');
	       ";

	// echo "{$query}</br>";
	$res = $mysqli->query($query);

	if ($res == false) {
		// echo "Erreur SQL : {$mysqli->errno} {$mysqli->error}<br/>";
		redirect_note("../admin_visiteurs.php", "$added tickets créés.", "Impossible de créer le ticket.");
	}
	else {
		// echo "Ajout OK<br/>";
		$i++;
	}

}

redirect_note("../admin_visiteurs.php", "$i tickets créés.");
$mysqli->close();

?>