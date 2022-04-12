
<?php 

if (isset($_POST['pseudo']) && isset($_POST['mdp'])) {

	$login = htmlspecialchars(addslashes($_POST['pseudo']));
	$mdp   = htmlspecialchars(addslashes($_POST['mdp']));

}
else {
	echo "Login ou mot de passe manquant.</br>";
	exit;
}




include "../action/connexion_bdd.php";

$query = "SELECT * FROM T_PROFIL_PRO 
          JOIN T_COMPTE_CPT USING(cpt_login) 
          WHERE cpt_login = '{$login}' 
          AND cpt_mdp = MD5('{$mdp}') 
          AND pro_valid = 'A';
        ";


// echo "{$query}<br/>";
$res = $mysqli->query($query);

if ($res == false) {
	echo "Connexion échouée.<br/>";
	echo "Erreur SQL : {$mysqli->errno} {$mysqli->error}<br/>";
	exit;
}


elseif ($row = $res->fetch_assoc()) {

	session_start();
	$_SESSION['login'] = $row['cpt_login'];
	$_SESSION['role']  = $row['pro_role'];

	echo "Connexion réussie. Bienvenue {$row['cpt_login']} ({$row['pro_role']}).<br/>";
	exit;
}
else {
	echo "Login ou mot de passe incorrect : votre compte n'est peut-être pas activé.<br/>";
	exit;
}
	
	$mysqli->close();
?>