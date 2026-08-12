<?php
	session_start();
	require_once __DIR__ . '/../db.inc.php';

	if (!isset($_SESSION['login_user'])) {
		header('Location: ../home.php');
		exit();
	}

	connect_db($db);

	$user_check = $_SESSION['login_user'];
	$user_check = mysqli_real_escape_string($db, $user_check);

	$ses_sql = mysqli_query($db, "SELECT username FROM users WHERE username = '$user_check' LIMIT 1");

	if (!$ses_sql || mysqli_num_rows($ses_sql) !== 1) {
		session_unset();
		session_destroy();
		header('Location: ../home.php');
		exit();
	}

	$row = mysqli_fetch_assoc($ses_sql);
	$login_session = $row['username'];
?>