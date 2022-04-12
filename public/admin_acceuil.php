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
	include 'action/connexion_bdd.php';
?>


<div class="content">


	<?php 
		include "sections/menu_admin.php";
	?>
	

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

		echo "<h2 class='section-title'>Utilisateurs</h2>";
		$query = "SELECT * FROM T_PROFIL_PRO ORDER BY cpt_login;";
		$res = $mysqli->query($query);

		if ($res != false) { 

			echo "<p>Il y a <b>{$res->num_rows}</b> profils.";

			echo "<table class='w3-table-all'>
			      <tr>
			      <th>Login</th>
			      <th>Nom</th>
			      <th>Prénom</th>
			      <th>Email</th>
			      <th>Rôle</th>
			      <th>Inscription</th>
			      <th>Validité</th>
			      </tr>";

		
			while ($row = $res->fetch_assoc()) {

				echo "<tr>";

				echo "<td>{$row['cpt_login']}</td>
				      <td>{$row['pro_nom']}</td>
				      <td>{$row['pro_prenom']}</td>
				      <td>{$row['pro_email']}</td>
				      <td>{$row['pro_role']}</td>
				      <td>{$row['pro_date']}</td>";


				if ($row['pro_valid'] == 'D') {
					$color = "#ff7777";
					$valid = "A";
					$text  = "activer";
				}
				else {
					$color = "#77ff77";
					$valid = "D";
					$text  = "désactiver";
				}

				echo "<td style='background-color:{$color};'>";
				echo "{$row['pro_valid']}";

				echo "<form class='mini-form' action='action/comptes_activation.php' method='post'>
				      <input name='login' type='hidden' value='{$row['cpt_login']}'>
				      <input name='valid' type='hidden' value='{$valid}'>
				      <input type='submit' value='{$text}'>
					";

				echo "</form></td>";



				echo "</tr>";
			}

			echo "</table>";
		}


	}?>



</div>


<?php 
	include 'sections/footer.php';
	$mysqli->close();
?>

</body>



</html>