

<?php 

session_start();
if(!isset($_SESSION['login']) || !isset($_SESSION['role'])) {
	header("Location:../session.php");
}

if (isset($_POST['mdp'])) {
	$mdp = substr( addcslashes($_POST['mdp']), 0, 15);
}
else {
    $mdp = "aaaaaaaaaaaaaaa";
}


if (isset($_POST['n'])) {
    $n = $_POST['n'];
}
else {
    $n = 1;
}


include "../scripts/connexion_bdd.php";



$query = "INSERT INTO T_VISITEUR_VIS VALUES
          (NULL, '{$mdp}', NOW(), NULL, NULL, NULL, '{$_SESSION['login']}');
          ";
          

// echo "{$query}</br>";
$res = $mysqli->query($query);

if ($res == false) {
    echo "Impossible de créer le ticket.</br>";
}
else {

    header("Location:../admin_visiteurs.php");
}

$mysqli->close();

?>