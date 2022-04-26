<!DOCTYPE html>
<html>

<?php include 'sections/head.php'; ?>



<body>

<?php 

	include 'sections/banner.php';
	include 'action/connexion_bdd.php';

	$query = "SELECT * FROM T_EXPOSANT_EXP;";
	// echo "{$query}</br>";
	$res = $mysqli->query($query);

	if ($res == false) {
		// echo("Erreur SQL : {$mysqli->errno} : {$mysqli->error}<br/>");
		$mysqli->close();
		exit;
	}
?>

<div class="content">


	<h2 class="section-title">Exposants</h2>


	<div class="mosaic">
		
	<?php 

	while ($row = $res->fetch_assoc()) {

		echo "<a href=\"exposant_info.php?id={$row['exp_id']}\" class=\"mosaic-tile card\">";
		echo "<img src=\"assets/artistes/{$row['exp_img']}\">";
		echo "<h3>{$row['exp_prenom']} {$row['exp_nom']}</h3>";
		echo "</a>";
	}

	?>


</div>


<?php	
	include 'sections/footer.php';
	$mysqli->close();
?>

</body>



</html>


