	<!doctype html>
<html>
<head>
	<meta charset = "utf-8">
	<title>My Project</title>
	<link rel="stylesheet" href="css/page.css">
</head>
<body>
	<center>
		
	<?php
 	
 	session_start();
 	if ($_SESSION["check"] == true) {

		require_once 'connection.php';	
		$link = mysqli_connect($host,$user,$password,$database)
			or die("Error" . mysqli_error($link));
		
		$query = " SELECT users.id,users.first_name,users.last_name,users.email,roles.title FROM users LEFT JOIN roles ON users.role_id = roles.id";
		
		$result = mysqli_query($link,$query) 
			or die ("Error" .mysqli_error($link));
		$rows = mysqli_num_rows($result);
    
    
    
	    echo "<h3 class='header'>Приветствую, ".$_SESSION["name"]."!</h3>";
	   	echo "<table border = 8>
		<tr>
			<th>ID</th>
			<th>First name</th>
			<th>Last name</th>
			<th>Email</th>
			<th>Role</th>
		</tr>"; 

		for ($i = 0 ; $i < $rows ; ++$i)
	    {
	        $row = mysqli_fetch_row($result);
	        echo "<tr>";
	        	for ($j = 0 ; $j < 5 ; ++$j) {
					echo "<td>$row[$j]</td>";
				}
			echo "</tr>";
		}
	    echo "</table>";
	    mysqli_free_result($result);
		mysqli_close($link);
	} else {
		header('Location: login.php');
	}
 	$_SESSION["id"]=$row[0];
 	echo "<a href='start.php'>Sign out</a>
	<a href='user_page.php'>User page</a>";
?>

</center>		
</body>
</html>