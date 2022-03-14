<!DOCTYPE html>
<html>

<?php include 'sections/head.php'; ?>



<body>

<?php 

	include 'sections/header.php';
	include 'scripts/connexion_bdd.php';
?>



<hr id="oeuvres">
<div class="w3-container w3-padding-32 w3-center">  
	<h3>Oeuvres</h3><br>
</div>


<!-- Row -->
<div class="w3-row-padding w3-padding-16 w3-center">
	<div class="w3-quarter">
		<img src="./assets/oeuvres/placeholder.jpg" style="width:100%">
		<h3>Titre</h3>
		<p>Description</p>
	</div>

	<div class="w3-quarter">
		<img src="./assets/oeuvres/placeholder.jpg" style="width:100%">
		<h3>Titre</h3>
		<p>Description</p>
	</div>

	<div class="w3-quarter">
		<img src="./assets/oeuvres/placeholder.jpg" style="width:100%">
		<h3>Titre</h3>
		<p>Description</p>
	</div>

	<div class="w3-quarter">
		<img src="./assets/oeuvres/placeholder.jpg" style="width:100%">
		<h3>Titre</h3>
		<p>Description</p>
	</div>
</div>



<!-- Row -->
<div class="w3-row-padding w3-padding-16 w3-center" id="gallery">
	<div class="w3-quarter">
		<img src="./assets/oeuvres/placeholder.jpg" style="width:100%">
		<h3>Titre</h3>
		<p>Description</p>
	</div>

	<div class="w3-quarter">
		<img src="./assets/oeuvres/placeholder.jpg" style="width:100%">
		<h3>Titre</h3>
		<p>Description</p>
	</div>

	<div class="w3-quarter">
		<img src="./assets/oeuvres/placeholder.jpg" style="width:100%">
		<h3>Titre</h3>
		<p>Description</p>
	</div>

	<div class="w3-quarter">
		<img src="./assets/oeuvres/placeholder.jpg" style="width:100%">
		<h3>Titre</h3>
		<p>Description</p>
	</div>
</div>



<hr id="artistes">
<div class="w3-container w3-padding-32 w3-center">  
	<h3>Artistes</h3><br>

</div>

<!-- Row -->
<div class="w3-row-padding w3-padding-16 w3-center">
	<div class="w3-quarter">
		<img src="./assets/artistes/placeholder.jpg" style="width:100%">
		<h3>Nom</h3>
		<p>Bio</p>
	</div>
	<div class="w3-quarter">
		<img src="./assets/artistes/placeholder.jpg" style="width:100%">
		<h3>Nom</h3>
		<p>Bio</p>
	</div>
	<div class="w3-quarter">
		<img src="./assets/artistes/placeholder.jpg" style="width:100%">
		<h3>Nom</h3>
		<p>Bio</p>
	</div>
	<div class="w3-quarter">
		<img src="./assets/artistes/placeholder.jpg" style="width:100%">
		<h3>Nom</h3>
		<p>Bio</p>
	</div>
</div>


<!-- Row -->
<div class="w3-row-padding w3-padding-16 w3-center">
	<div class="w3-quarter">
		<img src="./assets/artistes/placeholder.jpg" style="width:100%">
		<h3>Nom</h3>
		<p>Bio</p>
	</div>
	<div class="w3-quarter">
		<img src="./assets/artistes/placeholder.jpg" style="width:100%">
		<h3>Nom</h3>
		<p>Bio</p>
	</div>
	<div class="w3-quarter">
		<img src="./assets/artistes/placeholder.jpg" style="width:100%">
		<h3>Nom</h3>
		<p>Bio</p>
	</div>
	<div class="w3-quarter">
		<img src="./assets/artistes/placeholder.jpg" style="width:100%">
		<h3>Nom</h3>
		<p>Bio</p>
	</div>
</div>


<?php	
	include 'sections/footer.php';
	$mysqli->close();
?>

</body>



</html>