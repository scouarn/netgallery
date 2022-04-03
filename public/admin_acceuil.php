<?php

	session_start();

	if(!isset($_SESSION['login']) || !isset($_SESSION['role'])) {
		header("Location:session.php");
	}
?>


<!DOCTYPE html>
<html>

<?php include 'sections/head.php'; ?>



<body>
<?php 
	include 'sections/header.php';
	include 'scripts/connexion_bdd.php';
?>


<div class="content">


	<div class="w3-container w3-padding-32 w3-center">


	<a class="card" href="scripts/session_destroy.php" style="padding: 10px;">	
		Déconnexion
	</a>


	<h2 class="section-title">Profil</h2>

	<table class='w3-table-all'>
	<tr>
		<th>Login</th>
		<th>Nom</th>
		<th>Prénom</th>
		<th>Email</th>
		<th>Rôle</th>
		<th>Date d'inscription</th>
	</tr>

	<tr><?php 

		$query = "SELECT * FROM T_PROFIL_PRO
		          WHERE cpt_login = '{$_SESSION['login']}'
		";

		$res = $mysqli->query($query);

		if ($res == false) {
			echo("Erreur SQL : {$mysqli->errno} : {$mysqli->error}<br/>");
		}
		else {
			$row = $res->fetch_assoc();

			echo "<td>{$row['cpt_login']}</td>";
			echo "<td>{$row['pro_nom']}</td>";
			echo "<td>{$row['pro_prenom']}</td>";
			echo "<td>{$row['pro_email']}</td>";
			echo "<td>{$row['pro_role']}</td>";
			echo "<td>{$row['pro_date']}</td>";

		}

	?></tr>
	</table>


</div>


<?php 
	include 'sections/footer.php';
	$mysqli->close();
?>

</body>



</html>