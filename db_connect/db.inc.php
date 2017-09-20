<?php
	
	function db_connect(){
		try {
			$pdo = new PDO('mysql:host=localhost;dbname=users_db', 'artem', 'artem');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->exec('SET NAMES "utf8"') ;
		}
		catch (PDOEXxception $e) {
			$output = "Couldn't make connection to database: " . $e->getMessage();
			include 'output.html.php';
			exit();
		}

		return $pdo;
	}

	function add_user($pdo, $name, $surname){
		try {
			$sql = 'INSERT INTO users SET 
					firstname = :firstname,
					lastname = :lastname';
			$s = $pdo->prepare($sql);
			$s->bindValue(':firstname', $name);
			$s->bindValue(':lastname', $surname);
			$s->execute();
		}
		catch (PDOEXxception $e) {
			$output = 'Error of creating new user: ' . $e->getMessage();
			include 'output.html.php';
			exit();	
		}
	}


	#$output = 'Connection is available';
	#include 'output.html.php';
?>