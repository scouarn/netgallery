<!DOCTYPE html>
<html>
<title>Net'Gallery</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/w3.css">
<link rel="stylesheet" href="/Karma.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Karma", sans-serif}
.w3-bar-block .w3-bar-item {padding:20px}
</style>

<body>





<!-- Sidebar (hidden by default) -->
<nav class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
	<a href="javascript:void(0)" onclick="w3_close()"
	class="w3-bar-item w3-button">Fermer</a>
	<a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">À propos</a>
	<a href="#gallery" onclick="w3_close()" class="w3-bar-item w3-button">Oeuvres</a>
</nav>

<!-- Top menu -->
<div class="w3-top">
	<div class="w3-white w3-xlarge" style="max-width:1200px;margin:auto">
		<div class="w3-center w3-padding-16">Net'Gallery</div>
	</div>
</div>
	
<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">


<div class="w3-container w3-padding-32 w3-center">
<h3>DEBUG</h3>
<?php

$mysqli = new mysqli('localhost','scouarn','admin','netgallery');


if (!$mysqli->set_charset("utf8")) {
	echo($mysqli->error . 'Erreur chargement utf8<br/>');
	exit();
}

echo("Connexion BDD OK<br/>");


$query = "SELECT * FROM T_PRESENTATION_PRE;";

echo($query . "<br/>");

$res = $mysqli->query($query);


if ($res == false) {

	echo("Erreur SQL : ");
	echo ("Errno: " . $mysqli->errno . "<br/>");
	echo ("Error: " . $mysqli->error . "<br/>");
	exit();

}

echo("Query OK : " . $res->num_rows . " rows" . "<br/>");

$pre = $res->fetch_assoc();

var_dump($pre);

$mysqli->close();


?>
</div>
	

	<hr id="connexion">
	<div class="w3-container w3-padding-32 w3-center">  
		<h3>Connexion</h3><br>

		<form action="login.php" method="post">
			<p>Pseudo <input type="text" name="pseudo" /></p>
			<p>Mot de passe <input type="text" name="mdp" /></p>
			<p><input type="submit" value="Valider"></p>
		</form>
	</div>


	<hr id="inscription">
	<div class="w3-container w3-padding-32 w3-center">  
		<h3>Inscription</h3><br>

		<form action="register.php" method="post">
			<p>Pseudo <input type="text" name="pseudo" /></p>
			<p>Mot de passe <input type="text" name="mdp" /></p>
			<p><input type="submit" value="Valider"></p>
		</form>
	</div>



	<!-- About Section -->
	<hr id="about">
	<div class="w3-container w3-padding-32 w3-center">  
		<h3>À propos</h3><br>

			<ul><?php 

				echo("<li>Début : " . $pre['pre_debut'] . "</li>");
				echo("<li>Vernissage : " . $pre['pre_verni'] . "</li>");
				echo("<li>Fin : " . $pre['pre_fin']   . "</li>");
				echo("<li>Intitulé : " . $pre['pre_titre'] . "</li>");
				echo("<li>Bienvenue : " . $pre['pre_bienv'] . "</li>");
				echo("<li>Lieu : " . $pre['pre_lieu']  . "</li>");
				
			?></ul>
	</div>
	

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


	
<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
	document.getElementById("mySidebar").style.display = "block";
}
 
function w3_close() {
	document.getElementById("mySidebar").style.display = "none";
}
</script>

</body>
</html>