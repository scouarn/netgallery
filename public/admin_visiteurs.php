<!DOCTYPE html>
<html>

<?php include 'sections/head.php'; ?>



<body>
<?php 
	include 'sections/banner.php';

	if(!isset($_SESSION['login']) || !isset($_SESSION['role'])) {
		header("Location:session.php");
	}

	include 'action/connexion_bdd.php';
?>


<div class="content">
	

	<h2 class='section-title'>Générer un ticket</h2>

	<form class="form" action="action/visiteur_creation.php" method="post">
			<label for="mdp">Mot de passe ticket</label>
			<input required  pattern="[a-zA-Z0-9/+]{15}" title="15 caractères : (a-z A-Z 0-9 + et /)" type="text" name="mdp" />

			<input type="submit" value="Créer un ticket">
	</form>


	<h2 class='section-title'>Générer plusieurs tickets</h2>

	<form class="form" action="action/visiteur_creation_rand.php" method="post">
			<label for="n">Nombre de tickets à générer</label>
			<input required type="number" value=1 min=1 max=100 name="n">

			<input type="submit" value="Créer avec MDP aléatoire">
	</form>


	<h2 class='section-title'>Visiteurs</h2>

	<?php
		$query = "SELECT * 
		          FROM T_VISITEUR_VIS
		          LEFT JOIN T_COMMENTAIRE_COM USING(vis_id)
		          ORDER BY vis_date DESC;";

		// echo "{$query}</br>";
		$res = $mysqli->query($query);

		if ($res == false) {
			// echo("Erreur SQL : {$mysqli->errno} : {$mysqli->error}<br/>");
			$mysqli->close();
			exit;
		}

		echo "<p>Il y a <b>{$res->num_rows}</b> tickets.";

		echo "<table class='w3-table-all'>
		      <tr>
		      <th>Mot de passe</th>
		      <th>Nom</th>
		      <th>Prénom</th>
		      <th>Email</th>
		      <th>Création</th>
		      <th>Créateur</th>
		      <th>Commentaire</th>
		      <th>Actions</th>
		      </tr>";

	
		while ($row = $res->fetch_assoc()) {
			echo "<tr>";

			echo "<td>{$row['vis_mdp']}   </td>
			      <td>{$row['vis_nom']}   </td>
			      <td>{$row['vis_prenom']}</td>
			      <td>{$row['vis_email']} </td>
			      <td>{$row['vis_date']}  </td>
			      <td>{$row['cpt_login']} </td>
			      <td>{$row['com_text']}  </td>
				";


			echo "<td>";

			echo "<form class='mini-form' action='action/visiteur_suppression.php' method='post'>
			     <input name='id' type='hidden' value='{$row['vis_id']}'>
			     <input type='submit' value='Supprimer'>
			     </form>
				";


			echo "</td>";

			echo "</tr>";
		}	

		echo "</table>";
	?>



</div>


<?php 
	include 'sections/footer.php';
	$mysqli->close();
?>

</body>



</html>