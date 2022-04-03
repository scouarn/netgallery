

<?php 
ini_set('display_errors', '1');
	ini_set('display_startup_errors', '1');
	error_reporting(E_ALL);

session_start();
if(!isset($_SESSION['login']) || !isset($_SESSION['role'])) {
	header("Location:../session.php");
}

if (!isset($_GET['id']) || !isset($_GET['v'])) {
	header("Location:../admin_acceuil.php");
}


include "../scripts/connexion_bdd.php";


$query = "UPDATE T_PROFIL_PRO
          SET pro_valid = '{$_GET['v']}'
          WHERE cpt_login = '{$_GET['id']}';
         ";

echo "{$query}</br>";

$res = $mysqli->query($query);

if ($res == false) {

	echo("Erreur SQL : ");
	echo ("Errno: " . $mysqli->errno . "<br/>");
	echo ("Error: " . $mysqli->error . "<br/>");

}
else {
	header("Location:../admin_acceuil.php");
	
}

$mysqli->close();

?>