<?php 
include 'redirect_note.php';


if (!isset($_POST['mdp'])    || !isset($_POST['nom']) 
 || !isset($_POST['prenom']) || !isset($_POST['mail'])
 || !isset($_POST['comment'])) {

	redirect_note("../livredor.php", "Paramètres invalides.");
}


include "../action/connexion_bdd.php";

$mdp     = $mysqli->real_escape_string($_POST['mdp']);
$nom     = $mysqli->real_escape_string($_POST['nom']);
$prenom  = $mysqli->real_escape_string($_POST['prenom']);
$mail    = $mysqli->real_escape_string($_POST['mail']);
$comment = $mysqli->real_escape_string($_POST['comment']);


$query = "SELECT vis_id
          FROM T_VISITEUR_VIS
          WHERE vis_mdp = '{$mdp}'
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
          SET vis_nom = '{$nom}',
          	vis_prenom = '{$prenom}',
          	vis_email = '{$mail}'
          WHERE vis_id = {$id};
        ";


// echo "{$query}<br/>";
$res = $mysqli->query($query);

if ($res == false) {
	// echo "Erreur SQL : {$mysqli->errno} {$mysqli->error}<br/>";
	redirect_note("../livredor.php", "Impossible de mettre à jour les informations personnelles.");
}

$query = "INSERT INTO T_COMMENTAIRE_COM 
          VALUES (NULL, NOW(), '{$comment}', 'OK', {$id})
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