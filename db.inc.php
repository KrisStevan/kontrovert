<?php
	// Informasi Database.
	$db_host = 'localhost';
	$db_user = 'root';
	$db_pass = '';
	$db_name = 'kontrovert';

	//menghubungkan ke MySQL Server.
	function connect_db(&$db){
		global $db_host,$db_user,$db_pass,$db_name;
		$db = @mysqli_connect($db_host,$db_user,$db_pass,$db_name);
		mysqli_select_db($db, $db_name);
	}
?>