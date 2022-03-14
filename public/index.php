<!DOCTYPE html>
<html>

<?php include 'sections/head.php'; ?>



<body>

<?php 

	include 'sections/header.php';
	include 'scripts/connexion_bdd.php';
?>



<!-- About Section -->
<hr id="about">
<div class="w3-container w3-padding-32 w3-center">  
	<h3>À propos</h3><br>

	<?php 
		$query = "SELECT * FROM T_PRESENTATION_PRE;";
		$res = $mysqli->query($query);
		$row = $res->fetch_assoc();

		echo("{$row['pre_titre']}<br/>");
		echo "{$row['pre_bienv']}<br/>";
	?>

	<div id="list-dates">
	 <ul><?php 

		echo("<li>Début :      {$row['pre_debut']}</li>");
		echo("<li>Vernissage : {$row['pre_verni']}</li>");
		echo("<li>Fin :        {$row['pre_fin'  ]}</li>");
		echo("<li>Lieu :       {$row['pre_lieu' ]}</li>");

	 ?></ul>
	</div>

	<a href="gallery.php" class="w3-xlarge w3-padding-16">Accéder à la gallerie.</a>
</div>


<!-- News Section -->
<hr id="news">
<div class="w3-container w3-padding-32 w3-center">  
	<h3>Actualités</h3><br>

	<table class='w3-table-all'>
	<tr>
		<th>Auteur</th>
		<th>Date</th>
		<th>Fichier</th>
	</tr>

	<?php 

	$query = "SELECT * FROM T_NEWS_NEW ORDER BY new_date DESC;";
	$res = $mysqli->query($query);
	
	while ($row = $res->fetch_assoc()) {

		echo '<tr>';
		echo '<td>' . $row['cpt_login'] . '</td>';
		echo '<td>' . $row['new_date']  . '</td>';
		echo '<td>' . $row['new_html']  . '</td>';
		echo '</tr>';

	}

	?>
	</table>

</div>


<!-- Livre d'or -->
<hr id="livredor">
<div class="w3-container w3-padding-32 w3-center">  
	<h3>Livre d'or</h3>

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

		if ($row['vis_prenom']) {
			$nom = $row['vis_prenom'];
		}
		else {
			$nom = "anonyme";
		}

		echo "<tr>";
		echo "<td>{$nom}</td>";
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