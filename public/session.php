<!DOCTYPE html>
<html>

<?php include 'sections/head.php'; ?>



<body>
<?php 
	include 'sections/banner.php';
	include 'action/connexion_bdd.php';
?>


<div class="content">


	<h2 class="section-title">Connexion</h2>

	<form class="form" action="action/session_connexion.php" method="post">

			<label for="pseudo">Pseudo</label>
			<input required type="text" name="pseudo" />

			<label for="mdp">Mot de passe</label>
			<input required type="password" name="mdp" />

			<input type="submit" value="Envoyer">

	</form>


	<h2 class="section-title">Inscription</h2>

	<form class="form" action="action/session_inscription.php" method="post">

			<label for="pseudo">Pseudo</label>
			<input required type="text" name="pseudo" />

			<label for="mdp">Mot de passe</label>
			<input required type="password" name="mdp" />

			<label for="mdp_conf">Confirmation</label>
			<input required type="password" name="mdp_conf" />

			<label for="nom">Nom</label>
			<input required type="text" name="nom" />

			<label for="prenom">Prénom</label>
			<input required type="text" name="prenom" />


			<label for="mail">Email</label>
			<input required type="email" name="mail" />



			<label for="role">Rôle</label>
			<select name="role">
				<option value="O">Organisateur</option>
				<option value="A">Administrateur</option>
			</select>

			<input type="submit" value="Envoyer">


	</form>

</div>


<?php 
	include 'sections/footer.php';
	$mysqli->close();
?>
</body>



</html>