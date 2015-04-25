<?php
	require_once(__DIR__ . "/Database.php");
	session_start();
	session_regenerate_id(true);
	/*keeps the id constant throughtout the entire session everytime the file is called upon*/

	$path = "/todo2/";
	/*Requires the path an its location*/

	$host = "localhost";
	$username = "root";
	$password = "root";
	$database = "todo2";

	if(!isset($_SESSION["connection"])) {
		$connection = new Database($host, $username, $password, $database);
		$_SESSION["connection"] = $connection;
		/*try to access session variable, called connection, in the brackets*/
	}
?>	