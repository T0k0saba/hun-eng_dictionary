<?php 

//Start session
session_start();



// create constants to store non repeating values
define('SITEURL', 'http://localhost/szotar/');
define('LOCALHOST', 'localhost'); // 
define('DB_USERNAME', 'root'); // root
define('DB_PASSWORD', ''); // 
define('DB_NAME', 'szotar'); // szotar

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); // database connection
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //selecting database
?>
