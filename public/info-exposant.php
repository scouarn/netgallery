<!DOCTYPE html>
<html>

<?php include 'sections/head.php'; ?>


<body>

<?php 
	
	if (!$id = $_GET['id']) {
		header('Location: artistes.php');
		exit;
	}


	include 'sections/header.php';
	include 'scripts/connexion_bdd.php';


	$query = "SELECT * FROM T_EXPOSANT_EXP
              WHERE exp_id = {$id};";

	$exp = $mysqli->query($query)->fetch_assoc();

	// oeuvre inconnue
	if (!$exp) {
		$mysqli->close();
		header('Location: artistes.php');
		exit;
	}

	$query = "SELECT ovr_id, ovr_titre 
	          FROM T_EXPOSANT_EXP 
	          JOIN TJ_EXP_OVR USING(exp_id)
	          JOIN T_OEUVRE_OVR USING(ovr_id)
	          WHERE exp_id = {$id};";

	$ovr = $mysqli->query($query);
?>


<div class="content description">

	<h2 class="section-title"><?php echo "{$exp['exp_prenom']} {$exp['exp_nom']}"; ?></h2>
	<img src="assets/artistes/<?php echo $exp['exp_img']; ?>">
	<p><?php echo $exp['exp_bio']; ?></p>


	<h3 class="section-title">Oeuvres(s)</h3>
	<ul class="liste">

		<?php 

		while ($row = $ovr->fetch_assoc()) {
			echo "<li><a href=\"info-oeuvre.php?id={$row['ovr_id']}\">";
			echo "{$row['ovr_titre']}";
			echo "</a></li>";
		}

		?>


	</ul>


</div>



<?php	
	include 'sections/footer.php';
	$mysqli->close();
?>

</body>



</html>


