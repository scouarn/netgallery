<!DOCTYPE html>
<html>

<?php include 'sections/head.php'; ?>



<body>

<?php 

	include 'sections/banner.php';
	include 'action/connexion_bdd.php';
?>

<div class="content">


	<h2 class="section-title">Livre d'or</h2>

	<table class='w3-table-all'>
	<tr>
		<th>Visiteur</th>
		<th>Date</th>
		<th>Texte</th>
	</tr>

	<?php 

	$query = "SELECT * FROM T_COMMENTAIRE_COM
		JOIN T_VISITEUR_VIS USING(vis_id)
		WHERE com_valid = 'OK'
		ORDER BY vis_date DESC;
	";

	// echo "{$query}</br>";
	$res = $mysqli->query($query);

	if ($res == false) {
		// echo("Erreur SQL : {$mysqli->errno} : {$mysqli->error}<br/>");
		$mysqli->close();
		exit;
	}


	while ($row = $res->fetch_assoc()) {

		echo "<tr>";
		echo "<td>{$row['vis_prenom']}</td>";
		echo "<td>{$row['vis_date']}</td>";
		echo "<td>{$row['com_text']}</td>";
		echo "</tr>";

	}

	?>
	</table>



	<h2 class="section-title">Ajouter un avis</h2>

	<form class="form" id="ajout_com" action="action/visiteur_commentaire.php" method="post">
		<label for="mdp">Mot de passe ticket</label>
		<input required type="password" name="mdp" />
		
		<label for="nom">Nom</label>
		<input required type="text" name="nom" />
		
		<label for="prenom">Prénom</label>
		<input required type="text" name="prenom" />
		
		<label for="mail">Email</label>
		<input required type="email" name="mail" />
		
		<textarea required rows=5 cols=40 name="comment"></textarea>
		<input type="submit" value="Envoyer">
		

	</form>




</div>


<?php
	include 'sections/footer.php';
	$mysqli->close();
?>

</body>



</html>