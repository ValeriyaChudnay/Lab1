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

	$query = "SELECT image_name,photos FROM users";

	$imagename = $_FILES["image"]["name"];
	
	$imagetmp = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	
	session_start();
	$tmp = $_SESSION["id"];
	
	mysqli_query($link, "UPDATE users SET image_name='$imagename',photos='$imagetmp' WHERE id ='$tmp' ");
	
	header("Location: user_panel.php");

	require_once 'connection.php';	
	
	$link = mysqli_connect($host,$user,$password,$database) 
	or die("Error" . mysqli_error($link));

	$query = "SELECT image_name,photos FROM users";

	$imagename = $_FILES["image"]["name"];

	$folder = "img/";

	session_start();
	$tmp = $_SESSION["id"];
	
	mysqli_query($link, "UPDATE users SET image_path='$folder',image_name='$imagename' WHERE id ='$tmp' ");
    if ($_SESSION["role"] == "admin") header('Location:change_by_admin.php?id='.$tmp);
    if ($_SESSION["role"] == "user") header('Location: user_page.php?id='.$tmp);

	?>
</body>
</html>