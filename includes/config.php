<?php

	//Error state
	error_reporting(E_ALL);
	
	define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'entpostme');

	//Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	/*
	PDO database values for the application.
	*/
	$db_server = "localhost";
	$db_user = "root";
	$db_password = "";
	$db_name = "entpostme";

	/*
	connecting to the database using PHP PDO. all the database connectivity in the application is handled using PDO only for injection proof queries.
	*/
	try {
		$db = new PDO("mysql:host={$db_server};dbname={$db_name}", $db_user, $db_password);
	} catch(PDOException $e) {
		// error goes here
	}

?>