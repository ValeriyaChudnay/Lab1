<!doctype html>
<html>
<head>
	<meta charset = "utf-8">
	<title>My Project</title>
	<style>
	HTML {
		height: 100%;
	}
	body {
		background: radial-gradient(#4CCEB2, #2F8FD8);
	}
	.change-field {
		font-family: Arial;
		font-style: italic;
		font-size: 25px;
		text-align: center;
	}
	a2 {
		color:black;
	}
	
	</style>
</head>

<body>
	<center>
	
	<?php
		require_once "connection.php";
		if (isset($_GET['id'])) {
			$id = (int) $_GET['id'];
			$query = "DELETE FROM users WHERE id = $id";
			$result = mysqli_query($link, $query) 
				or die("Ошибка " . mysqli_error($link));
		}
		if ($result) echo "<p class='change-field'>Удалено</p>";
		mysqli_close($link);
		header('Location: admin_panel.php');
	?>
	<a2 href="start.php">Назад</a2>
	
	</center>
</body>
</html>