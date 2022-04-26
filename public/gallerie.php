<!DOCTYPE html>
<html>

<?php include 'sections/head.php'; ?>



<body>

<?php 

	include 'sections/banner.php';
	include 'action/connexion_bdd.php';

	$query = "SELECT * FROM T_OEUVRE_OVR;";
	// echo "{$query}</br>";
	$res = $mysqli->query($query);

	if ($res == false) {
		// echo("Erreur SQL : {$mysqli->errno} : {$mysqli->error}<br/>");
		$mysqli->close();
		exit;
	}
?>


<div class="content">

	<h2 class="section-title">Oeuvres</h2>



	<div class="mosaic">
		
	<?php 


	while ($row = $res->fetch_assoc()) {

		echo "<a href=\"oeuvre_info.php?id={$row['ovr_id']}\" class=\"mosaic-tile card\">";
		echo "<img src=\"assets/oeuvres/{$row['ovr_img']}\">";
		echo "<h3>{$row['ovr_titre']}</h3>";
		echo "</a>";
	}

	?>

	</div>


</div>


<?php	
	include 'sections/footer.php';
	$mysqli->close();
?>

</body>



</html>