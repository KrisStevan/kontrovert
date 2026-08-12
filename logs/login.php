<?php
	session_start();
	require_once __DIR__ . '/../db.inc.php';

	$error = '';

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$username = trim($_POST['username'] ?? '');
		$password = trim($_POST['password'] ?? '');

		if ($username === '' || $password === '') {
			$error = 'Username or Password is invalid';
		} else {
			connect_db($db);

			$username = mysqli_real_escape_string($db, $username);
			$password = mysqli_real_escape_string($db, $password);

			$query = mysqli_query($db, "SELECT username FROM users WHERE username = '$username' AND password = '$password' LIMIT 1");
			$rows = mysqli_num_rows($query);

			if ($rows === 1) {
				$_SESSION['login_user'] = $username;
				header('Location: ../CMS/userCMS.php');
				exit();
			} else {
				$error = 'Username or Password is invalid';
			}

			mysqli_close($db);
		}
	}

	if ($error !== '') {
		$_SESSION['login_error'] = $error;
		header('Location: ../home.php');
		exit();
	}
?>