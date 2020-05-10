<!DOCTYPE html>
<html>
<head>
	<title> Login dan Register OOP</title>
	<link rel="stylesheet" href="assets/style.css">
</head>
<body>
	<header>
		<h1>Belajar Login dan Register OOP</h1>
		<nav>
			<?php if(Session::exists('username')){ ?>
			<a href="logout.php">Logout</a>
			<?php } else{ ?>
			<a href="login.php">Login</a>
			<a href="register.php">Register</a>
			<?php } ?>
			<a href="Profile.php">Profile</a>
		</nav>
	</header>

