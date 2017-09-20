<?php
	if (!isset($_POST['lastname'])){
		include 'delete.html.php';
	}
	else {
		require_once '../db_connect/db.inc.php';
		$pdo = db_connect();
		delete_user($pdo, $_POST['lastname']);
		$output = 'User was deleted';

		include 'output.html.php';
	}

?>