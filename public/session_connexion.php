
<?php 

include "scripts/debug.php";


function done() {
	if (isset($mysqli)) $mysqli->close();
	echo "<a href='admin_acceuil.php'>Cliquez pour être redirigé.<a/>";
	// header("Location:admin_acceuil.php");
	exit;
}


if ($_POST['pseudo'] && $_POST['mdp']) {

	$login = htmlspecialchars(addslashes($_POST['pseudo']));
	$mdp   = htmlspecialchars(addslashes($_POST['mdp']));

}
else {
	echo "Login ou mot de passe manquant.</br>";
	done();
}




include "scripts/connexion_bdd.php";

$query = "SELECT * FROM T_PROFIL_PRO 
          JOIN T_COMPTE_CPT USING(cpt_login) 
          WHERE cpt_login = '{$login}' 
          AND cpt_mdp = MD5('{$mdp}') 
          AND pro_valid = 'A';
        ";


// echo "{$query}<br/>";
$res = $mysqli->query($query);

if ($res == false) {

	echo("Erreur SQL : ");
	echo ("Errno: " . $mysqli->errno . "<br/>");
	echo ("Error: " . $mysqli->error . "<br/>");
	done();
}


elseif ($row = $res->fetch_assoc()) {

	session_start();
	$_SESSION['login'] = $row['cpt_login'];
	$_SESSION['role']  = $row['pro_role'];

	echo "Connexion réussie.<br/>";
	echo "Bienvenue {$row['cpt_login']} ({$row['pro_role']}).<br/>";
	done();

}
else {
	echo "Login ou mot de passe incorrect.<br/>";
	done();
}

?>