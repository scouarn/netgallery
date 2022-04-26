

<?php 

include "redirect_note.php";

session_start();
if(!isset($_SESSION['login']) || !isset($_SESSION['role'])) {
	header("Location:../session.php");
}


if (!isset($_POST['mdp']) || !isset($_POST['mdp_new']) || !isset($_POST['mdp_conf'])) {
	redirect_note("../admin_acceuil.php", "Paramètres invalides.");
}


include "../action/connexion_bdd.php";

$mdp      = $mysqli->real_escape_string($_POST['mdp']);
$mdp_new  = $mysqli->real_escape_string($_POST['mdp_new']);
$mdp_conf = $mysqli->real_escape_string($_POST['mdp_conf']);

if($mdp_conf != $mdp_new)	{
	redirect_note("../admin_acceuil.php", "Les mots de passe sont différents.");
}




$query = "UPDATE T_COMPTE_CPT
          SET cpt_mdp = MD5('{$mdp_new}')
          WHERE cpt_login = '{$_SESSION['login']}'
          AND cpt_mdp = MD5('{$mdp}');
         ";


echo "{$query}</br>";
$res = $mysqli->query($query);

if ($res == false) {
	// echo "Erreur SQL : {$mysqli->errno} {$mysqli->error}<br/>";
	redirect_note("../admin_acceuil.php", "Impossible de modifier le mot de passe.");
}
elseif ($mysqli->affected_rows == 0) {
	redirect_note("../admin_acceuil.php", "Le mot de passe n'a pas été modifié.");	
}
else {
	redirect_note("../admin_acceuil.php", "Mot de passe modifié.");	
}


$mysqli->close();

?>