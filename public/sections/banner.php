<script type="text/javascript">
hide_elem = e => {e.style.display = "None";};
</script>


<div class="banner">
	


	<div class="banner-buttons">
		<a class="banner-item card" href="index.php"><h1>Net'Gallery</h1></a>

		<a class="banner-item card" href="gallerie.php">Gallerie</a>
		<a class="banner-item card" href="exposants.php">Exposants</a>
		<a class="banner-item card" href="livredor.php">Livre d'or</a>
		

		<?php 
		session_start();
		
		if(isset($_SESSION['login']) && isset($_SESSION['role'])) {
			
			echo "<a class='banner-item card' href='admin_acceuil.php'>Profils</a>";
			echo "<a class='banner-item card' href='admin_visiteurs.php'>Visiteurs</a>";

			echo "<a class='banner-item card' href='action/session_destroy.php' style='color:red;'>Déconnexion</a>";
		}
		else {
			echo "<a class='banner-item card' href='session.php'>Accès personnel</a>";
		}

		?>
	</div>


	<?php 

	if (isset($_GET['note'])) {
		echo "<div onclick='hide_elem(this);' class='note'>{$_GET['note']}</div>";
	}

	?>

</div>


