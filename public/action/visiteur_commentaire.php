<?php 


$inputs = array();

if ($_POST['mdp']) {
	$inputs['mdp'] = htmlspecialchars(addslashes($_POST['mdp']));
}
else {
	echo "Le mot de passe ne peut pas être vide.<br/>";
	exit;
}


if ($_POST['nom']) {
	$inputs['nom'] = htmlspecialchars(addslashes($_POST['nom']));
}
else {
	echo "Le nom ne peut pas être vide.<br/>";
	exit;
}

if ($_POST['prenom']) {
	$inputs['prenom'] = htmlspecialchars(addslashes($_POST['prenom']));
}
else {
	echo "Le prénom ne peut pas être vide.<br/>";
	exit;
}

if ($_POST['mail']) {
	$inputs['mail'] = htmlspecialchars(addslashes($_POST['mail']));
}
else {
	echo "L'adresse email ne peut pas être vide.<br/>";
	exit;
}

if ($_POST['comment']) {
	$inputs['comment'] = htmlspecialchars(addslashes($_POST['comment']));
}
else {
	echo "Le commentaire ne peut pas être vide.<br/>";
	exit;
}





include "../action/connexion_bdd.php";

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
	exit;
}

$row = $res->fetch_assoc();

if (empty($row)) {
	echo "Ticket invalide.</br>";
	exit;
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
	echo "Impossible de mettre à jour les informations personnelles.</br>";
	echo "Erreur SQL : {$mysqli->errno} {$mysqli->error}<br/>";
	exit;
}

$query = "INSERT INTO T_COMMENTAIRE_COM 
          VALUES (NULL, NOW(), '{$inputs['comment']}', 'OK', {$id})
        ";

// echo "{$query}<br/>";
$res = $mysqli->query($query);

if ($res == false) {
	echo "Impossible d'ajouter le commentaire.<br/>";
	echo "Erreur SQL : {$mysqli->errno} {$mysqli->error}<br/>";
	exit;
}
else {

	echo "Commentaire ajouté.<br/>";
	exit;
}

$mysqli->close();

?>