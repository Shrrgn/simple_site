<?php
	if (!isset($_POST['lastname'])){
		include 'delete.html.php';
	}
	else {
		require_once '../db_connect/db.inc.php';
		delete_user($_POST['lastname']);
		$output = 'User was deleted';
		$title = 'Deleting';
		include 'output.html.php';
	}

?>