<!DOCTYPE html>
<html>

<?php include 'sections/head.php'; ?>



<body>
<?php 
	include 'sections/header.php';
	include 'scripts/connexion_bdd.php';
?>


<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content w3-padding w3-center" style="max-width:1200px;margin-top:100px">


<div class="w3-container w3-padding-32 w3-center">

<h2 class="section-title">Connexion</h2>

<form action="scripts/connexion-action.php" method="post">

	<div>
		<label for="pseudo">Pseudo</label>
		<input type="text" name="pseudo" />
	</div>

	<div>
		<label for="pseudo">Mot de passe</label>
		<input type="password" name="mdp" />
	</div>

	<div>
		<input type="submit" value="Envoyer">
	</div>	
</form>


<h2 class="section-title">Inscription</h2>

<form action="scripts/inscription-action.php" method="post">

	<div>
		<label for="pseudo">Pseudo</label>
		<input type="text" name="pseudo" />
	</div>

	<div>
		<label for="pseudo">Mot de passe</label>
		<input type="password" name="mdp" />
	</div>

	<div>
		<label for="mdp_conf">Confirmation du mot de passe</label>
		<input type="password" name="mdp_conf" />
	</div>

	<div>
		<label for="nom">Nom</label>
		<input type="text" name="nom" />
	</div>

	<div>
		<label for="prenom">Prénom</label>
		<input type="text" name="prenom" />
	</div>

	<div>
		<label for="mail">Email</label>
		<input type="email" name="mail" />
	</div>


	<div>
		<label for="role">Rôle</label>
		<select name="role">
			<option value="O">Organisateur</option>
			<option value="A">Administrateur</option>
		</select>
	<div>

	<div>
		<input type="submit" value="Envoyer">
	</div>

</form>

</div>


<?php 
	include 'sections/footer.php';
	//$mysqli->close();
?>
</body>



</html>