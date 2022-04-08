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
	<button disabled>Déconnexion</button>


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


</div>


<?php 
	include 'sections/footer.php';
	$mysqli->close();
?>

</body>



</html>