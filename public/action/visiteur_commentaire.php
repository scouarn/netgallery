<?php 
include 'redirect_note.php';

$inputs = array();

if ($_POST['mdp']) {
	$inputs['mdp'] = htmlspecialchars(addslashes($_POST['mdp']));
}
else {
	redirect_note("../livredor.php", "Le mot de passe ne peut pas être vide.");
}


if ($_POST['nom']) {
	$inputs['nom'] = htmlspecialchars(addslashes($_POST['nom']));
}
else {
	redirect_note("../livredor.php", "Le nom ne peut pas être vide.");
}

if ($_POST['prenom']) {
	$inputs['prenom'] = htmlspecialchars(addslashes($_POST['prenom']));
}
else {
	redirect_note("../livredor.php", "Le prénom ne peut pas être vide.");
}

if ($_POST['mail']) {
	$inputs['mail'] = htmlspecialchars(addslashes($_POST['mail']));
}
else {
	redirect_note("../livredor.php", "L'adresse email ne peut pas être vide.");
}

if ($_POST['comment']) {
	$inputs['comment'] = htmlspecialchars(addslashes($_POST['comment']));
}
else {
	redirect_note("../livredor.php", "Le commentaire ne peut pas être vide.");
}





include "../action/connexion_bdd.php";

$query = "SELECT vis_id
          FROM T_VISITEUR_VIS
          WHERE vis_mdp = '{$inputs['mdp']}'
          AND TIMESTAMPADD(HOUR, 3, vis_date) > NOW()
          EXCEPT
          SELECT vis_id FROM T_COMMENTAIRE_COM;
        ";

// echo "{$query}<br/>";
$res = $mysqli->query($query);

if ($res == false) {
	// echo "Erreur SQL : {$mysqli->errno} {$mysqli->error}<br/>";
	redirect_note("../livredor.php", "Erreur lors de la validation du ticket.");
}

$row = $res->fetch_assoc();

if (empty($row)) {
	redirect_note("../livredor.php", "Ticket invalide.");
}


$id = $row['vis_id'];

$query = "UPDATE T_VISITEUR_VIS
          SET vis_nom = '{$inputs['nom']}',
          	vis_prenom = '{$inputs['prenom']}',
          	vis_email = '{$inputs['mail']}'
          WHERE vis_id = {$id};
        ";


// echo "{$query}<br/>";
$res = $mysqli->query($query);

if ($res == false) {
	// echo "Erreur SQL : {$mysqli->errno} {$mysqli->error}<br/>";
	redirect_note("../livredor.php", "Impossible de mettre à jour les informations personnelles.");
}

$query = "INSERT INTO T_COMMENTAIRE_COM 
          VALUES (NULL, NOW(), '{$inputs['comment']}', 'OK', {$id})
        ";

// echo "{$query}<br/>";
$res = $mysqli->query($query);

if ($res == false) {
	// echo "Erreur SQL : {$mysqli->errno} {$mysqli->error}<br/>";
	redirect_note("../livredor.php", "Impossible d'ajouter le commentaire.");
}
else {
	redirect_note("../livredor.php", "Commentaire ajouté.");
}

$mysqli->close();

?>