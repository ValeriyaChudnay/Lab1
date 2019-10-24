<!doctype html>
<html >
<head>
	<meta charset = "utf-8">
	<title>My Project</title>

</head>

<body>
<style>
    html:{
        background-image: url("tablebg.jpg");
    }

    input{
        background-image: url("tablebg.jpg");
    }
</style>
	
	<?php
	
	require_once 'connection.php';	
	$link = mysqli_connect($host,$user,$password,$database)
		or die("Error" . mysqli_error($link));
	session_start();

	if (isset($_POST['firstName'])) $fname = $_POST['firstName'];
	if (isset($_POST['lastName'])) $lname = $_POST['lastName'] ;
	if (isset($_POST['password'])) $password = $_POST['password'];
	if (isset($_POST['email'])) $email = $_POST['email'];
	
	
	if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['password']) && isset($_POST['email'])) {
			
			$id = $_SESSION["id"];
			$_SESSION["name"] = $fname;
			$query ="UPDATE users SET first_name='$fname',last_name='$lname',email = '$email', password='$password' WHERE id='$id'";
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
		}
		if ($_SESSION["role"] == "user") $_SESSION["name"] = $fname;
		mysqli_close($link);
		if ($_SESSION["role"] == "admin") header("Location: admin_panel.php");
		else header('Location: user_panel.php');

	?>
		
</body>
</html>