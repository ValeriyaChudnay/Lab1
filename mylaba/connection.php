<?php 
 $host = 'localhost';
 $database = 'laba';
 $user = 'root';
 $password = '';
$link = mysqli_connect($host,$user,$password,$database)
or die("Error" . mysqli_error($link));
?>
 