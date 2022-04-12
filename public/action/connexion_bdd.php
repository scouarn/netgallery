
<?php 

// prevent error throwing
mysqli_report(MYSQLI_REPORT_OFF);

$mysqli = new mysqli('localhost','zscouarjo','i5zs2qkh','zfl2-zscouarjo');

if ($mysqli->connect_errno) {
  echo "Erreur de connexion BDD : {$mysqli->connect_error}<br/>";
  exit;
}

if (!$mysqli->set_charset("utf8")) {
	echo "Erreur chargement utf8 : {$mysqli->error}<br/>";
	$mysqli->close();
	exit;
}


// echo("Connexion BDD OK<br/>");

?>

