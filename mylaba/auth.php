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
	
	$query = "SELECT id,password,email,first_name,role_id FROM users";
	$result = mysqli_query($link,$query) 
	or die ("Error" .mysqli_error($link));

	if (isset($_POST["email"]) && isset($_POST["password"])) {
		
		if (isset($_POST['password'])) $password = $_POST['password'];
		if (isset($_POST['email'])) $email = $_POST['email'];
		
		$sign = false;
		$rows = mysqli_num_rows($result);
		for ($i = 0; $i < $rows; $i++ ) {
			$row = mysqli_fetch_row($result);
			if ($row[1] == $password && $row[2] == $email) {
				$sign = true;
				session_start();
				$_SESSION["id"] = $row[0];
				$_SESSION["name"] = $row[3];
				$_SESSION["check"] = true;
				if ($row[4] == "1") 
					header('Location: admin_panel.php');
				else 
					header('Location: user_panel.php');
			}
		}
			
		if ($sign == false) {
			session_start();
			$_SESSION["check"] = false;
            header('Location: bad_guy.php');
			echo '<a href="login.php">Sign up</a>';
		}		
	}
			
	mysqli_close($link);
	?>
</body>
</html>