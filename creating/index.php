<?php
	if (!isset($_POST['firstname']) or !isset($_POST['lastname'])){
		include 'add.html.php';
	}
	else {
		require_once '../db_connect/db.inc.php';
		#require_once '../stuff/quotes.php';
		$pdo = db_connect();
		$name = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		#insert in db
		add_user($pdo, $name, $lastname);
		$output = "User was added to db";
		include 'output.html.php';
	}
?>