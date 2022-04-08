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


	<h2 class="section-title">Administration</h2>

	<a href="scripts/session_destroy.php">
		<button>Déconnexion</button>
	</a>


	<h2 class="section-title">Mon profil</h2>

	<table class='info-table'>
	<?php 

		$query = "SELECT * FROM T_PROFIL_PRO
		          WHERE cpt_login = '{$_SESSION['login']}'
		";

		$res = $mysqli->query($query);

		if ($res == false) {
			echo("Erreur SQL : {$mysqli->errno} : {$mysqli->error}<br/>");
		}
		else {
			$row = $res->fetch_assoc();

			echo "<tr><th>Login :       </th> <td>{$row['cpt_login']}  </td> </tr>
			      <tr><th>Nom :         </th> <td>{$row['pro_nom']}    </td> </tr>
			      <tr><th>Prénom :      </th> <td>{$row['pro_prenom']} </td> </tr>
			      <tr><th>Email :       </th> <td>{$row['pro_email']}  </td> </tr>
			      <tr><th>Rôle :        </th> <td>{$row['pro_role']}   </td> </tr>
			      <tr><th>Inscription : </th> <td>{$row['pro_date']}   </td> </tr>
				";
		}

	?>
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

	

		$query = "SELECT * FROM T_PROFIL_PRO ORDER BY cpt_login;";

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


			if ($row['pro_valid'] == 'D') {
				$color = "#ff7777";
				$valid = "v=A";
				$text  = "activer";
			}
			else {
				$color = "#77ff77";
				$valid = "v=D";
				$text  = "désactiver";
			}

				echo "<td style='background-color:{$color};'>{$row['pro_valid']}
				      <a href='scripts/admin_activation.php?id={$row['cpt_login']}&{$valid}'>
				      <button>{$text}</button></a>
					";

				echo "</tr>";
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