<?php
	
	function db_connect(){
		try {
			$pdo = new PDO('mysql:host=localhost;dbname=users_db', 'artem', 'artem');
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->exec('SET NAMES "utf8"') ;
		}
		catch (PDOException $e) {
			$output = "Couldn't make connection to database: " . $e->getMessage();
			include 'output.html.php';
			exit();
		}
		return $pdo;
	}

	function add_user($name, $surname){
		try {
			$sql = 'INSERT INTO users SET 
					firstname = :firstname,
					lastname = :lastname';
			$s = db_connect()->prepare($sql);
			$s->bindValue(':firstname', $name);
			$s->bindValue(':lastname', $surname);
			$s->execute();
		}
		catch (PDOException $e) {
			$output = 'Error of creating new user: ' . $e->getMessage();
			include 'output.html.php';
			exit();	
		}
	}

	function show_all(){
		try {
			$sql = 'SELECT firstname,lastname FROM users';
			$result = db_connect()->query($sql);
		}
		catch (PDOException $e) {
			$output = 'Error of showing users: ' . $e->getMessage();
			include 'output.html.php';
			exit();	
		}
		return $result;
	}

	function delete_user($surname){
		try {
			$sql = 'DELETE FROM users WHERE lastname = :lastname';
			$s = db_connect()->prepare($sql);
			$s->bindValue(':lastname', $surname);
			$s->execute();
		}
		catch (PDOException $e) {
			$output = 'Error of deleting user: ' . $e->getMessage();
			include 'output.html.php';
			exit();
		}
	}


	#$output = 'Connection is available';
	#include 'output.html.php';

class Model {
	function __constructor(){
		try {
				$pdo = new PDO('mysql:host=localhost;dbname=users_db', 'artem', 'artem');
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo->exec('SET NAMES "utf8"') ;
		}
		catch (PDOException $e) {
				$output = "Couldn't make connection to database: " . $e->getMessage();
				include 'output.html.php';
				exit();
				self::db_error("Couldn't make connection to database: ", $e, 'output.html.php');
			}
		$this->pdo = $pdo;	
	}

	function add_user($name, $surname){
		try {
			$sql = 'INSERT INTO users SET 
					firstname = :firstname,
					lastname = :lastname';
			$s = $this->pdo->prepare($sql);
			$s->bindValue(':firstname', $name);
			$s->bindValue(':lastname', $surname);
			$s->execute();
		}
		catch (PDOException $e) {
			self::db_error('Error of creating new user: ', $e, 'output.html.php');	
		}
	}

	function show_all(){
		try {
			$sql = 'SELECT firstname,lastname FROM users';
			$result = $this->pdo->query($sql);
		}
		catch (PDOException $e) {
			self::db_error('Error of showing users: ', $e, 'output.html.php');	
		}
		return $result;
	}

	function delete_user($surname){
		try {
			$sql = 'DELETE FROM users WHERE lastname = :lastname';
			$s = $this->pdo->prepare($sql);
			$s->bindValue(':lastname', $surname);
			$s->execute();
		}
		catch (PDOException $e) {
			self::db_error('Error of deleting user: ', $e, 'output.html.php');
		}
	}

	static function db_error($string, $exception, $output_file){
		$output = $string . $exception->getMessage();
		include $output_file;
		exit();
	}
}



?>