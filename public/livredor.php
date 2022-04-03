<!DOCTYPE html>
<html>

<?php include 'sections/head.php'; ?>



<body>

<?php 

	include 'sections/header.php';
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

</div>


<?php
	include 'sections/footer.php';
	$mysqli->close();
?>

</body>



</html>