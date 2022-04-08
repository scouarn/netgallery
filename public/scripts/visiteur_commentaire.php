<?php 

function done() {
	echo "<a href='../livredor.php'>Cliquez pour être redirigé.<a/>";

	if (isset($mysqli)) {
		$mysqli->close();
	}
	exit;
}



$inputs = array();

if ($_POST['mdp']) {
	$inputs['mdp'] = htmlspecialchars(addslashes($_POST['mdp']));
}
else {
	echo "Le mot de passe ne peut pas être vide.<br/>";
	done();
}


if ($_POST['nom']) {
	$inputs['nom'] = htmlspecialchars(addslashes($_POST['nom']));
}
else {
	echo "Le nom ne peut pas être vide.<br/>";
	done();
}

if ($_POST['prenom']) {
	$inputs['prenom'] = htmlspecialchars(addslashes($_POST['prenom']));
}
else {
	echo "Le prénom ne peut pas être vide.<br/>";
	done();
}

if ($_POST['mail']) {
	$inputs['mail'] = htmlspecialchars(addslashes($_POST['mail']));
}
else {
	echo "L'adresse email ne peut pas être vide.<br/>";
	done();
}

if ($_POST['comment']) {
	$inputs['comment'] = htmlspecialchars(addslashes($_POST['comment']));
}
else {
	echo "Le commentaire ne peut pas être vide.<br/>";
	done();
}





include "../scripts/connexion_bdd.php";

$query = "SELECT vis_id
          FROM T_VISITEUR_VIS
          WHERE vis_mdp = '{$inputs['mdp']}'
          AND TIMESTAMPADD(HOUR, 2, vis_date) > NOW()
          EXCEPT
          SELECT vis_id FROM T_COMMENTAIRE_COM;
        ";

$res = $mysqli->query($query);

if ($res == false) {
	echo "Erreur validation du ticket.</br>";
	done();
}

$row = $res->fetch_assoc();

if (empty($row)) {
	echo "Ticket invalide.</br>";
	done();
}


$id = $row['vis_id'];

$query = "UPDATE T_VISITEUR_VIS
          SET vis_nom = '{$inputs['nom']}',
          	vis_prenom = '{$inputs['prenom']}',
          	vis_email = '{$inputs['mail']}'
          WHERE vis_id = {$id};
        ";


$res = $mysqli->query($query);

if ($res == false) {
	echo "Erreur de mise à jour des informations personnelles.</br>";
	done();
}

$query = "INSERT INTO T_COMMENTAIRE_COM 
          VALUES (NULL, NOW(), '{$inputs['comment']}', 'OK', {$id})
        ";

// echo "{$query}<br/>";
$res = $mysqli->query($query);

if ($res == false) {
	echo "Erreur ajout commentaire.<br/>";
	done();
}

echo "Commentaire ajouté.<br/>";
done();

?>