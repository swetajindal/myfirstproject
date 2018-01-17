<?php  
$host = 'localhost';  
$user = 'root';  
$pass = '';  
$db = 'searock';
$conn = mysqli_connect($host, $user, $pass, $db);  
if(!$conn)  
{  
 die('Could not connect: ' . mysqli_error());  
} 
?> 