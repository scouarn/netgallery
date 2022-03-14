<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function check_inputs() {

	$inputs = array();

	if ($_POST['pseudo']) {
		$inputs['pseudo'] = htmlspecialchars(addslashes($_POST['pseudo']));
	}
	else {
		echo "Le pseudo ne peut pas être vide.<br/>";
		return false;
	}

	if ($_POST['mdp']) {
		$inputs['mdp'] = htmlspecialchars(addslashes($_POST['mdp']));
	}
	else {
		echo "Le mot de passe ne peut pas être vide.<br/>";
		return false;
	}

	if ($_POST['mdp_conf']) {
		$mdp_conf = htmlspecialchars(addslashes($_POST['mdp_conf']));

		if($mdp_conf != $inputs['mdp'])	{
			echo "Mot de passe différent.<br/>";
			return false;
		}

	}
	else {
		echo "Veuillez confirmer votre mot de passe.<br/>";
		return false;
	}


	if ($_POST['nom']) {
		$inputs['nom'] = htmlspecialchars(addslashes($_POST['nom']));
	}
	else {
		echo "Le nom ne peut pas être vide.<br/>";
		return false;
	}

	if ($_POST['prenom']) {
		$inputs['prenom'] = htmlspecialchars(addslashes($_POST['prenom']));
	}
	else {
		echo "Le prénom ne peut pas être vide.<br/>";
		return false;
	}

	if ($_POST['mail']) {
		$inputs['mail'] = htmlspecialchars(addslashes($_POST['mail']));
	}
	else {
		echo "L'adresse email ne peut pas être vide.<br/>";
		return false;
	}

	if ($_POST['role']) {
		$inputs['role'] = htmlspecialchars(addslashes($_POST['role']));
	}
	else {
		echo "Vous devez choisir un rôle.<br/>";
		return false;
	}

	return $inputs;
}




if ($inputs = check_inputs()) {
	
	include "connexion_bdd.php";

	$query = "INSERT INTO T_COMPTE_CPT VALUES('{$inputs['pseudo']}', MD5('{$inputs['mdp']}'));";
	echo "$query<br/>";

	$res = $mysqli->query($query);
	
	if ($res == false) {
		
		echo "Impossible de créer le compte.<br/>";

		/* erreur unicité clé primaire */
		if ($mysqli->errno == 1062) {
			echo "Ce pseudo est déjà utilisé !<br/>";
		}
		else {
			echo("Erreur SQL : {$mysqli->errno} : {$mysqli->error}<br/>");
		}

	}

	else {
		
		$query = "INSERT INTO T_PROFIL_PRO VALUES(
			'{$inputs['pseudo']}', '{$inputs['nom']}', 
		    '{$inputs['prenom']}', '{$inputs['mail']}', 
		    'D', '{$inputs['role']}', NOW());
		";

		echo "$query<br/>";

		$res = $mysqli->query($query);
		
		if ($res == false) {
			echo "Impossible de créer le profil.<br/>";
			echo "Erreur SQL : " . $mysqli->errno . " : " . $mysqli->error . "<br/>";


			$query = "DELETE FROM T_COMPTE_CPT WHERE cpt_login = '{$inputs['pseudo']}';";
			echo "{$query}<br/>";
			$res = $mysqli->query($query);

			if ($res == false) {
				echo "Impossible de supprimer le compte créé.<br/>";
				echo("Erreur SQL : " . $mysqli->errno . " : " . $mysqli->error . "<br/>");
			}
			else {
				echo "Compte supprimé.<br/>";	
			}

		}
		else {
			echo "Inscription réussie. Votre compte n'est pas encore activé.<br/>";
			echo "Bienvenue {$inputs['pseudo']}.<br/>";
		}
	}


	$mysqli->close();

}

echo "<a href='../staff.php'>Cliquez pour être redirigé.<a/>";


?>
