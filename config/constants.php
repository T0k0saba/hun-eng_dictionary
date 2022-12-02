<?php 

//Start session
session_start();



// create constants to store non repeating values
define('SITEURL', 'http://www.enwords.hu/'); // http://localhost/szotar/
define('LOCALHOST', 'localhost:3306'); // 
define('DB_USERNAME', 'lcwlefgr_db1'); // root
define('DB_PASSWORD', 'Kiralylany1987!'); // 
define('DB_NAME', 'lcwlefgr_db1'); // szotar

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); // database connection
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //selecting database
?>
