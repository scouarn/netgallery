
<!-- About Section -->
<hr id="about">
<div class="w3-container w3-padding-32 w3-center">  
	<h3>À propos</h3><br>

	<ul><?php 

	$query = "SELECT * FROM T_PRESENTATION_PRE;";
	$res = $mysqli->query($query);
	$row = $res->fetch_assoc();

	echo("<li>Début : " .      $row['pre_debut'] . "</li>");
	echo("<li>Vernissage : " . $row['pre_verni'] . "</li>");
	echo("<li>Fin : " .        $row['pre_fin']   . "</li>");
	echo("<li>Intitulé : " .   $row['pre_titre'] . "</li>");
	echo("<li>Bienvenue : " .  $row['pre_bienv'] . "</li>");
	echo("<li>Lieu : " .       $row['pre_lieu']  . "</li>");
			
	?></ul>
</div>

