<!doctype html>
<html>
<head>
	<meta charset = "utf-8">
	<title>My Project</title>
	<link rel="stylesheet" href="css/page.css">
</head>
<body>
	<center>

		<h3 class="header">Start Page</h3>
		
		<?php
		require_once 'connection.php';
		$link = mysqli_connect($host,$user,$password,$database)
			or die("Error" . mysqli_error($link));
		
		$query = " SELECT users.id,users.first_name,users.last_name,users.email,roles.title FROM users LEFT JOIN roles ON users.role_id = roles.id";

		$result = mysqli_query($link,$query) 
			or die ("Error" .mysqli_error($link));
		
		$rows = mysqli_num_rows($result);
	    
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
?>
		<a href="sign_up.php">Sign up</a>
		<a href="login.php">Login</a>
</center>		
</body>
</html>