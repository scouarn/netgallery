<!DOCTYPE html>
<html>

<?php include 'sections/head.php'; ?>


<body>
<?php 
	include 'sections/banner.php';
	
	if(!isset($_SESSION['login']) || !isset($_SESSION['role'])) {
		header("Location:session.php");
	}

	include 'action/connexion_bdd.php';
?>


<div class="content">



	<h2 class="section-title">Mon profil</h2>

	<table class='info-table'>
	<?php 

		$query = "SELECT * FROM T_PROFIL_PRO
		          WHERE cpt_login = '{$_SESSION['login']}'
		";
		// echo "{$query}</br>";
		$res = $mysqli->query($query);

		if ($res == false) {
			// echo("Erreur SQL : {$mysqli->errno} : {$mysqli->error}<br/>");
			exit;
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


	<h2 class="section-title">Modification du mot de passe</h2>

	<form class="form" action="action/comptes_passwd.php" method="post">

			<label for="mdp">Mot de passe actuel</label>
			<input required type="password" name="mdp" />

			<label for="mdp_new">Nouveau mot de passe</label>
			<input required type="password" name="mdp_new" />

			<label for="mdp_conf">Confirmation</label>
			<input required type="password" name="mdp_conf" />

			<input type="submit" value="Envoyer">
	</form>



	<?php if ($_SESSION['role'] == 'A') {

		echo "<h2 class='section-title'>Utilisateurs</h2>";

		$query = "SELECT * FROM T_PROFIL_PRO ORDER BY cpt_login;";
		// echo "{$query}</br>";
		$res = $mysqli->query($query);

		if ($res == false) { 
			// echo("Erreur SQL : {$mysqli->errno} : {$mysqli->error}<br/>");
			$mysqli->close();
			exit;
		}

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


			if ($row['cpt_login'] == $_SESSION['login']) {
				echo "<td>{$row['pro_valid']}</td>";
			}
			elseif ($row['pro_valid'] == 'D') {
				echo "<td style='background-color:#ff7777;'>";
				echo "{$row['pro_valid']}";

				echo "<form class='mini-form' action='action/comptes_activation.php' method='post'>
				      <input name='login' type='hidden' value='{$row['cpt_login']}'>
				      <input name='valid' type='hidden' value='A'>
				      <input type='submit' value='Activer'>
					";

				echo "</form></td>";
			}
			else {

				echo "<td style='background-color:#77ff77;'>";
				echo "{$row['pro_valid']}";

				echo "<form class='mini-form' action='action/comptes_activation.php' method='post'>
				      <input name='login' type='hidden' value='{$row['cpt_login']}'>
				      <input name='valid' type='hidden' value='D'>
				      <input type='submit' value='Désactiver'>
					";
				echo "</form></td>";
			}

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