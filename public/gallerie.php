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


<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding w3-center" style="max-width:1200px;margin-top:100px">


<h2 class="section-title">Oeuvres</h2>



<div class="mosaic">
	
<?php 


while ($row = $res->fetch_assoc()) {

	echo "<a href=\"oeuvre.php?id={$row['ovr_id']}\" class=\"mosaic-tile\">";
	echo "<img src=\"assets/oeuvres/placeholder.jpg\">"; //{$row['ovr_img']}
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