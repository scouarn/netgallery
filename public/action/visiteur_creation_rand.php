

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

include "../action/connexion_bdd.php";

$added = 0;

for ($i = 0; $i < $n; $i++) {

	$mdp = substr(base64_encode(hash("md5", uniqid(), true)), 0, 15);

	$query = "INSERT INTO T_VISITEUR_VIS VALUES
	         (NULL, '{$mdp}', NOW(), NULL, NULL, NULL, '{$_SESSION['login']}');
	       ";

	// echo "{$query}</br>";
	$res = $mysqli->query($query);

	if ($res == false) {
		echo "Erreur SQL : {$mysqli->errno} {$mysqli->error}<br/>";
		echo "Impossible de créer le ticket.<br/>";
	}
	else {
		echo "Ajout OK<br/>";
		$added++;
	}

}

redirect_note("../admin_visiteurs.php", "$added tickets créés.";
$mysqli->close();

?>