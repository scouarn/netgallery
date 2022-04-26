
<?php

include "redirect_note.php";

if (!isset($_POST['pseudo']) || !isset($_POST['mdp'])) {
	redirect_note("../session.php", "Login ou mot de passe manquant.");
}

include "connexion_bdd.php";


$login = $mysqli->real_escape_string($_POST['pseudo']);
$mdp   = $mysqli->real_escape_string($_POST['mdp']);


$query = "SELECT * FROM T_PROFIL_PRO 
          JOIN T_COMPTE_CPT USING(cpt_login) 
          WHERE cpt_login = '{$login}' 
          AND cpt_mdp = MD5('{$mdp}') 
          AND pro_valid = 'A';
        ";


// echo "{$query}<br/>";
$res = $mysqli->query($query);

if ($res == false) {
	// echo "Erreur SQL : {$mysqli->errno} {$mysqli->error}<br/>";
	redirect_note("../session.php", "Connexion échouée.");
}


elseif ($row = $res->fetch_assoc()) {

	session_start();
	$_SESSION['login'] = $row['cpt_login'];
	$_SESSION['role']  = $row['pro_role'];

	redirect_note("../admin_acceuil.php", "Connexion réussie. Bienvenue {$row['cpt_login']} ({$row['pro_role']}).");
}
else {
	redirect_note("../session.php", "Login ou mot de passe incorrect : votre compte n'est peut-être pas activé.");
}



$mysqli->close();

?>