<?php
	if (!isset($_POST['firstname']) or !isset($_POST['lastname'])){
		include 'add.html.php';
	}
	else {
		require_once '../db_connect/db.inc.php';
		#require_once '../stuff/quotes.php';
		$pdo = db_connect();
		#insert in db
		add_user($pdo, $_POST['firstname'], $_POST['lastname']);
		$output = "User was added to db";
		include 'output.html.php';
	}
?>