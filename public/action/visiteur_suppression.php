

<?php 

session_start();
if(!isset($_SESSION['login']) || !isset($_SESSION['role'])) {
	header("Location:../session.php");
}

if (!isset($_POST['id'])) {
	header("Location:../admin_acceuil.php");
}


include "../action/connexion_bdd.php";


$query = "DELETE FROM T_COMMENTAIRE_COM
          WHERE vis_id = '{$_POST['id']}';
         ";

// echo "{$query}</br>";
$res = $mysqli->query($query);



$query = "DELETE FROM T_VISITEUR_VIS
          WHERE vis_id = '{$_POST['id']}';
         ";

// echo "{$query}</br>";
$res = $mysqli->query($query);


$mysqli->close();
header("Location:../admin_visiteurs.php");

?>