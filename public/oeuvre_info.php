<!DOCTYPE html>
<html>

<?php include 'sections/head.php'; ?>


<body>

<?php 
	
	if (!$id = $_GET['id']) {
		header('Location: gallerie.php');
		exit;
	}


	include 'sections/banner.php';
	include 'action/connexion_bdd.php';


	$query = "SELECT * FROM T_OEUVRE_OVR 
              WHERE ovr_id = {$id};";

	$ovr = $mysqli->query($query)->fetch_assoc();

	// oeuvre inconnue
	if (!$ovr) {
		$mysqli->close();
		header('Location: gallerie.php');
	}

	$query = "SELECT exp_id, exp_nom, exp_prenom 
	          FROM T_OEUVRE_OVR 
	          JOIN TJ_EXP_OVR USING(ovr_id)
	          JOIN T_EXPOSANT_EXP USING(exp_id)
	          WHERE ovr_id = {$id};";

	$exp = $mysqli->query($query);
?>


<div class="content description">

	<h2 class="section-title"><?php echo $ovr['ovr_titre']; ?></h2>
	<img src="assets/oeuvres/<?php echo $ovr['ovr_img']; ?>">
	<p><?php echo $ovr['ovr_desc']; ?></p>


	<h3 class="section-title">Auteur(s)</h3>
	<ul class="liste">

		<?php 

		while ($row = $exp->fetch_assoc()) {

			echo "<li><a href=\"exposant_info.php?id={$row['exp_id']}\">";
			echo "{$row['exp_nom']} {$row['exp_prenom']}";
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


