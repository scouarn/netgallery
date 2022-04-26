<?php 

function redirect_note($base, $note) {
	
	if (isset($mysqli)) $mysqli->close();

	header("Location: " . $base . "?note=" . urlencode($note));
	exit;
}

?>