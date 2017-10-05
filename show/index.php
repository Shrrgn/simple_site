<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/db_connect/db.inc.php';
	include '../stuff/stuff.php';

	///$pdo = ;
	$data = show_all();

	while ($row = $data->fetch()){
		$users[] = array($row['firstname'], $row['lastname']);
	}

	include 'showing.html.php';

?>