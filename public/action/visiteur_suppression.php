

<?php 

session_start();
if(!isset($_SESSION['login']) || !isset($_SESSION['role'])) {
	header("Location:../session.php");
}

if (!isset($_POST['id'])) {
    echo "ID visiteur incorrect<br/>";
    exit;
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

if ($res == false) {
    echo "Impossible de supprimer le visiteur.<br/>";
    echo "Erreur SQL : {$mysqli->errno} {$mysqli->error}<br/>";
    exit;
}
else {
    echo "Visiteur supprimé.<br/>";
    exit;
}


$mysqli->close();


?>