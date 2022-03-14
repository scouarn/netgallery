
<?php 

include "../scripts/connexion_bdd.php";


$login = htmlspecialchars(addslashes($_POST['pseudo']));
$mdp   = htmlspecialchars(addslashes($_POST['mdp']));



$query = "SELECT * FROM T_PROFIL_PRO 
          JOIN T_COMPTE_CPT USING(cpt_login) 
          WHERE cpt_login = '$login' 
          AND cpt_mdp = MD5('$mdp') 
          AND pro_valid = 'A';
        ";


// echo "$query<br/>";
$res = $mysqli->query($query);


if ($res == false) {

	echo("Erreur SQL : ");
	echo ("Errno: " . $mysqli->errno . "<br/>");
	echo ("Error: " . $mysqli->error . "<br/>");

}
elseif ($row = $res->fetch_assoc()) {

	$login = $row['cpt_login'];

	echo "Connexion réussie.<br/>";
	echo "Bienvenue $login.<br/>";

}
else {
	echo "Login ou mdp incorrect.<br/>";
}


echo "<a href='../staff.php'>Cliquez pour être redirigé.</>";


$mysqli->close();

?>