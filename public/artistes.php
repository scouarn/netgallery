<!DOCTYPE html>
<html>

<?php include 'sections/head.php'; ?>



<body>

<?php 

	include 'sections/header.php';
	include 'scripts/connexion_bdd.php';

	$query = "SELECT * FROM T_EXPOSANT_EXP;";
	$res = $mysqli->query($query);

?>

<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding w3-center" style="max-width:1200px;margin-top:100px">


<h2 class="section-title">Artistes</h2>


<div class="mosaic">
	
<?php 

while ($row = $res->fetch_assoc()) {

	echo "<a href=\"#\" class=\"mosaic-tile\">";
	echo "<img src=\"assets/artistes/placeholder.jpg\">"; //{$row['exp_img']}
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


