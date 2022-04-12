

<?php 

session_start();
if(!isset($_SESSION['login']) || !isset($_SESSION['role'])) {
	header("Location:../session.php");
}

if (!isset($_POST['login']) || !isset($_POST['valid'])) {
	header("Location:../admin_acceuil.php");
}


include "../action/connexion_bdd.php";


$query = "UPDATE T_PROFIL_PRO
          SET pro_valid = '{$_POST['valid']}'
          WHERE cpt_login = '{$_POST['login']}';
         ";


// echo "{$query}</br>";
$res = $mysqli->query($query);

if ($res == false) {
	echo "Impossible d'activer le compte.<br/>";
	echo "Erreur SQL : {$mysqli->errno} {$mysqli->error}<br/>";
	exit;
}
else {
	echo "Compte activé.<br/>";
	exit;
}

$mysqli->close();

?>