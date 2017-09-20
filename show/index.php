<?php
	require_once '../db_connect/db.inc.php';
	include '../stuff/stuff.php';

	$pdo = db_connect();
	$data = show_all($pdo);

	while ($row = $data->fetch()){
		$users[] = array($row['firstname'], $row['lastname']);
	}

	include 'showing.html.php';

?>