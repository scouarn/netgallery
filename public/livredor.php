<!DOCTYPE html>
<html>

<?php include 'sections/head.php'; ?>



<body>

<?php 

	include 'sections/banner.php';
	include 'scripts/connexion_bdd.php';
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

	$res = $mysqli->query($query);

	if ($res == false) {
		echo("Erreur SQL : {$mysqli->errno} : {$mysqli->error}<br/>");
	}
	else
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

	<form id="ajout_com" action="scripts/visiteur_commentaire.php" method="post">
		<div>
			<label for="pseudo">Mot de passe ticket</label>
			<input type="password" name="mdp" />
		</div>

		<div>
			<label for="nom">Nom</label>
			<input type="text" name="nom" />
		</div>

		<div>
			<label for="prenom">Prénom</label>
			<input type="text" name="prenom" />
		</div>

		<div>
			<label for="mail">Email</label>
			<input type="email" name="mail" />
		</div>

		<div>
			<textarea rows=5 cols=40 name="comment"></textarea>
		</div>


		<div>
			<input type="submit" value="Envoyer">
		</div>

	</form>




</div>


<?php
	include 'sections/footer.php';
	$mysqli->close();
?>

</body>



</html>