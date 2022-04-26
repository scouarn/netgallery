<!DOCTYPE html>
<html>

<?php include 'sections/head.php'; ?>



<body>

<?php 

	include 'sections/banner.php';
	include 'action/connexion_bdd.php';
?>

<div class="content">


	<h2 class="section-title">À propos</h2>

	<?php 
		$query = "SELECT * FROM T_PRESENTATION_PRE;";
		// echo "{$query}</br>";
		$res = $mysqli->query($query);

		if ($res == false) {
			// echo("Erreur SQL : {$mysqli->errno} : {$mysqli->error}<br/>");
			$mysqli->close();
			exit;
		}

		$row = $res->fetch_assoc();

		echo "<p>{$row['pre_titre']}</p>";
		echo "<p>{$row['pre_bienv']}</p>";
	?>

	<table class="info-table"><?php 

		echo "<tr><th>Début :      </th> <td>{$row['pre_debut']}</td> </tr>";
		echo "<tr><th>Vernissage : </th> <td>{$row['pre_verni']}</td> </tr>";
		echo "<tr><th>Fin :        </th> <td>{$row['pre_fin'  ]}</td> </tr>";
		echo "<tr><th>Lieu :       </th> <td>{$row['pre_lieu' ]}</td> </tr>";

	?></table>

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

	// echo "{$query}</br>";
	$res = $mysqli->query($query);

	if ($res == false) {
		// echo("Erreur SQL : {$mysqli->errno} : {$mysqli->error}<br/>");
		$mysqli->close();
		exit;
	}

	
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