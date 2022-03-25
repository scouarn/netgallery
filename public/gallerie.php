<!DOCTYPE html>
<html>

<?php include 'sections/head.php'; ?>



<body>

<?php 

	include 'sections/header.php';
	include 'scripts/connexion_bdd.php';

	$query = "SELECT * FROM T_OEUVRE_OVR;";
	$res = $mysqli->query($query);

?>


<div class="content">

	<h2 class="section-title">Oeuvres</h2>



	<div class="mosaic">
		
	<?php 


	while ($row = $res->fetch_assoc()) {

		echo "<a href=\"info-oeuvre.php?id={$row['ovr_id']}\" class=\"mosaic-tile card\">";
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