<?php 

function redirect_note($base, $note) {
	header("Location: " . $base . "?note=" . urlencode($note));
	exit;
}

?>