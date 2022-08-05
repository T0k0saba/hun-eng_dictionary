<?php

include('../config/constants.php');

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keresés</title>
</head>
<body>

<?php
	$query = $_GET['kereses']; 
	// gets value sent over search form
	
	$min_length = 1;
	// you can set minimum length of the query if you want
	
	if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
		
		$query = htmlspecialchars($query); 
		// changes characters used in html to their equivalents, for example: < to &gt;
		
		$query = mysql_real_escape_string($query);
		// makes sure nobody uses SQL injection
		
		$raw_results = mysql_query("SELECT * FROM szotar
			WHERE (`magyar`='$query') OR (`angol`='$query')") or die(mysql_error());
			
		
		if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
			
			while($results = mysql_fetch_array($raw_results)){
			// $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
			
				echo "<p><h3>".$results['magyar']."</h3>".$results['angol']."</p>";
				// posts results gotten from database(magyar and angol)
			}
			
		}
		else{ // if there is no matching rows do following
			echo "Nincs találat";
		}
		
	}
	else{ // if query length is less than minimum
		//create a session variable to display message
        $_SESSION['keres'] = "<div class='text-danger text-center'>Nem adtál meg semmit!</div>";
        //redirect page to home page
        header("location:" . SITEURL . 'index.php');
	}
?>

    
</body>
</html>