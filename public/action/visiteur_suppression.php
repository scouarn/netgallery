

<?php 

include 'redirect_note.php';

session_start();
if(!isset($_SESSION['login']) || !isset($_SESSION['role'])) {
	header("Location:../session.php");
}

if (!isset($_POST['id'])) {
    redirect_note("../admin_visiteurs.php", "Visiteur incorrect.");
}


include "connexion_bdd.php";

$id = $mysqli->real_escape_string($_POST['id']);


$query = "DELETE FROM T_COMMENTAIRE_COM
          WHERE vis_id = '{$id}';
         ";

// echo "{$query}</br>";
$res = $mysqli->query($query);

if ($res == false) {
    // echo "Erreur SQL : {$mysqli->errno} {$mysqli->error}<br/>";
    redirect_note("../admin_visiteurs.php", "Impossible de supprimer le commentaire du visiteur.");
}



$query = "DELETE FROM T_VISITEUR_VIS
          WHERE vis_id = '{$id}';
         ";


// echo "{$query}</br>";
$res = $mysqli->query($query);

if ($res == false) {
    // echo "Erreur SQL : {$mysqli->errno} {$mysqli->error}<br/>";
    redirect_note("../admin_visiteurs.php", "Impossible de supprimer le visiteur.");
}
else {
    redirect_note("../admin_visiteurs.php", "Visiteur supprimé.");
}


$mysqli->close();


?>