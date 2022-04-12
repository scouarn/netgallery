<?php 
session_start();
session_destroy();
echo "Déconnexion réussie.<br/>";
// header("Location:../admin_acceuil.php");
?>