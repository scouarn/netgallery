<!DOCTYPE html>
<html>

<?php include 'sections/head.php'; ?>



<body>

<?php 

	include 'sections/banner.php';
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

	<h2 class="section-title">Actualités</h2>

	<table class='w3-table-all'>
	<tr>
		<th>Auteur</th>
		<th>Date</th>
		<th>Titre</th>
		<th>Corps</th>
	</tr>

	<?php 

	$query = "SELECT * FROM T_NEWS_NEW ORDER BY new_date DESC;";
	$res = $mysqli->query($query);
	
	while ($row = $res->fetch_assoc()) {

		echo "<tr>";
		echo "<td>{$row['cpt_login']}</td>";
		echo "<td>{$row['new_date']} </td>";
		echo "<td>{$row['new_titre']}</td>";
		echo "<td>{$row['new_texte']}</td>";
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