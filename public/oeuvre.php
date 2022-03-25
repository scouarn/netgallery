<!DOCTYPE html>
<html>

<?php include 'sections/head.php'; ?>


<body>

<?php 
	
	if (!$id = $_GET['id']) {
		header('Location: gallerie.php');
		exit;
	}


	include 'sections/header.php';
	include 'scripts/connexion_bdd.php';


	$query = "SELECT * FROM T_OEUVRE_OVR 
	          WHERE ovr_id = {$id};";

	$res = $mysqli->query($query);
	$row = $res->fetch_assoc();

	if (!$row) {
		header('Location: gallerie.php');
		$mysqli->close();
		exit;
	}
?>


<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding w3-center" style="max-width:1200px;margin-top:100px">

<h2><?php echo $row['ovr_titre']; ?></h2>



</div>



<?php	
	include 'sections/footer.php';
	$mysqli->close();
?>

</body>



</html>


