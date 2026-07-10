<?php
	// Informasi Database.
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = '';
	$db_name = 'kontrovert';
	$db_port = 3307; //for certain device, because i use 3307 in some devices

	//menghubungkan ke MySQL Server.
	function connect_db(&$db){
		global $db_host, $db_user, $db_pass, $db_name, $db_port;

		$db = @mysqli_connect($db_host, 
			$db_user, 
			$db_pass, 
			$db_name, 
			$db_port
		);

		if (!$db) {
			die("Database connection failed: " . mysqli_connect_error());
		}
		else
			mysqli_select_db($db, $db_name);
	}
?>