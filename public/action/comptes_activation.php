

<?php 

include "redirect_note.php";

session_start();
if(!isset($_SESSION['login']) || !isset($_SESSION['role'])) {
	header("Location:../session.php");
}

if (!isset($_POST['login']) || !isset($_POST['valid'])) {
	redirect_note("../admin_acceuil.php", "Paramètres invalides.");
}


include "../action/connexion_bdd.php";


$query = "UPDATE T_PROFIL_PRO
          SET pro_valid = '{$_POST['valid']}'
          WHERE cpt_login = '{$_POST['login']}';
         ";


// echo "{$query}</br>";
$res = $mysqli->query($query);

if ($res == false) {
	
	//echo "Erreur SQL : {$mysqli->errno} {$mysqli->error}<br/>";

	redirect_note("../admin_acceuil.php", "Impossible d'activer ou de désactiver le profil.");

}
else {

	redirect_note("../admin_acceuil.php", $_POST['valid'] == "A" ? "Profil activé." : "Profil désactivé.");
}

$mysqli->close();

?>