<!doctype html>
<html>
<head>
	<meta charset = "utf-8">
	<title>My Project</title>
	<style>
	</style>
</head>
<body>
	<?php

	require_once 'connection.php';	
	$link = mysqli_connect($host,$user,$password,$database)
	or die("Error" . mysqli_error($link));

	$query = "SELECT first_name,last_name,password,email,photo,role_id FROM users";

	if (isset($_POST['firstName'])) $fname = $_POST['firstName'];
	if (isset($_POST['lastName'])) $lname = $_POST['lastName'] ;
	if (isset($_POST['password'])) $password = $_POST['password'];
	if (isset($_POST['email'])) $email = $_POST['email'];
	if (isset($_POST['optionList'])) {
		if ( $_POST['optionList'] == "admin") $role_id = 1;
		if ( $_POST['optionList'] == "user") $role_id = 2;
	}
	
	if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['optionList']) && isset($_POST['password']) && isset($_POST['email'])) {
		
		mysqli_query($link, " INSERT INTO users(first_name,last_name,password,email,role_id) VALUES ('$fname','$lname','$password','$email','$role_id')");
		mysqli_close($link);
		header('Location: admin_panel.php');
	} else {
		echo "Заполните все поля";
	}
	?>
</body>
</html>