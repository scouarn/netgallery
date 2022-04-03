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
	include 'sections/banner.php';
	include 'scripts/connexion_bdd.php';
?>


<div class="content">


	<div class="w3-container w3-padding-32 w3-center">


	<a href="scripts/session_destroy.php">
		<button>Déconnexion</button>
	</a>

	<h2 class="section-title">Administration</h2>
	<!-- <button>Action</button> -->
	<!-- <button>Action</button> -->
	<!-- <button>Action</button> -->


	<h2 class="section-title">Mon profil</h2>

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


	<?php if ($_SESSION['role'] == 'A') {


		echo "<h2 class='section-title'>Utilisateurs</h2>
		      <table class='w3-table-all'>
		      <tr>
		      <th>Login</th>
		      <th>Nom</th>
		      <th>Prénom</th>
		      <th>Email</th>
		      <th>Rôle</th>
		      <th>Date d'inscription</th>
		      <th>Validité</th>
		      </tr>";

	

		$query = "SELECT * FROM T_PROFIL_PRO ORDER BY pro_date DESC;";

		$res = $mysqli->query($query);

		if ($res == false) {
			echo("Erreur SQL : {$mysqli->errno} : {$mysqli->error}<br/>");
		}
		else while ($row = $res->fetch_assoc()) {
			echo "<tr>";
			echo "<td>{$row['cpt_login']}</td>
			      <td>{$row['pro_nom']}</td>
			      <td>{$row['pro_prenom']}</td>
			      <td>{$row['pro_email']}</td>
			      <td>{$row['pro_role']}</td>
			      <td>{$row['pro_date']}</td>";

			echo "<td>{$row['pro_valid']} ";

			if ($row['pro_valid'] == 'D') {
				echo "<a href='scripts/admin_activation.php
				?id={$row['cpt_login']}&v=A'>
				<button>activer</button></a>";
			}
			else {
				echo "<a href='scripts/admin_activation.php
				?id={$row['cpt_login']}&v=D'>
				<button>désactiver</button></a>";
				
			}
			echo "</td>";


			echo "<tr>";
		}

		echo "</table>";

	}?>



</div>


<?php 
	include 'sections/footer.php';
	$mysqli->close();
?>

</body>



</html>