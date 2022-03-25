<!DOCTYPE html>
<html>

<?php include 'sections/head.php'; ?>



<body>

<?php 

	include 'sections/header.php';
	include 'scripts/connexion_bdd.php';
?>

<div class="content">


	<h2 class="section-title">À propos</h2>

	<?php 
		$query = "SELECT * FROM T_PRESENTATION_PRE;";
		$res = $mysqli->query($query);
		$row = $res->fetch_assoc();

		echo("{$row['pre_titre']}<br/>");
		echo "{$row['pre_bienv']}<br/>";
	?>

	<ul class="liste"><?php 

		echo("<li>Début :      {$row['pre_debut']}</li>");
		echo("<li>Vernissage : {$row['pre_verni']}</li>");
		echo("<li>Fin :        {$row['pre_fin'  ]}</li>");
		echo("<li>Lieu :       {$row['pre_lieu' ]}</li>");

	?></ul>

	<a href="gallerie.php" class="w3-xlarge w3-padding-16">Accéder à la gallerie.</a>


	<h2 class="section-title">Actualités</h2>

	<table class='w3-table-all'>
	<tr>
		<th>Auteur</th>
		<th>Date</th>
		<th>Fichier*</th>
	</tr>

	<?php 

	$query = "SELECT * FROM T_NEWS_NEW ORDER BY new_date DESC;";
	$res = $mysqli->query($query);
	
	while ($row = $res->fetch_assoc()) {

		echo "<tr>";
		echo "<td>{$row['cpt_login']}</td>";
		echo "<td>{$row['new_date']}</td>";
		echo "<td><a href='news/{$row['new_html']}'>{$row['new_html']}</a></td>";
		echo "</tr>";

	}

	?>
	</table>
	<p>*les fichiers seront insérés sur la page</p>

</div>


<?php
	include 'sections/footer.php';
	$mysqli->close();
?>

</body>



</html>