<?php

include('../config/constants.php');

?>

<?php
$query = filter_input(INPUT_GET, 'kereses', FILTER_SANITIZE_SPECIAL_CHARS);
// gets value sent over search form

$min_length = 1;
// set minimum length of the query

if (strlen($query) >= $min_length) { // if query length is more or equal minimum length then

	$query = htmlspecialchars($query);
	// changes characters used in html to their equivalents

	$query = mysqli_real_escape_string($conn, $query);
	// prevent SQL injection

	$raw_resultsHu = mysqli_query($conn, "SELECT * FROM szotar
			WHERE (`magyar`='$query')") or die(mysqli_error($conn));

	$raw_resultsEn = mysqli_query($conn, "SELECT * FROM szotar
			WHERE (`angol`='$query')") or die(mysqli_error($conn));

	$raw_results = mysqli_query($conn, "SELECT * FROM szotar
			WHERE (`magyar`='$query') OR (`angol`='$query')") or die(mysqli_error($conn));


	if (mysqli_num_rows($raw_results) == 0) { // if there is no matching rows do following
		//create a session variable to display message
		$_SESSION['nincsTalalat'] = "<div class='text-danger text-center'>Nincs találat!</div>";
		//redirect page to home page
		header("location:" . SITEURL . 'index.php');
		exit;
	}


	if (mysqli_num_rows($raw_resultsHu) > 0) { // if one or more rows are returned do following

		while ($results = mysqli_fetch_array($raw_resultsHu)) {
			// $results = mysql_fetch_array($raw_resultsHu) puts data from database into array, while it's valid it does the loop


			$_SESSION['keresesEn'] = "<div class='text-center text-light bg-dark w-50 mx-auto'>" . $results['angol'] . "</div>";
			$_SESSION['keresettSzo'] = "<div class='text-center text-dark bg-light w-50 mx-auto'><p>A keresett szó: " . $query . "</p></div>";
			// posts results gotten from database(magyar)
			//redirect page to home page
			//header("location:" . SITEURL . 'index.php');
		}
	} 
	else 
	{
		//create a session variable to display message
		$_SESSION['nincsTalalatHu'] = "<div class='text-danger text-center'>Nincs angol megfelelője!</div>";
		
	} 
	//redirect page to home page
	header("location:" . SITEURL . 'index.php');

	if (mysqli_num_rows($raw_resultsEn) > 0) { // if one or more rows are returned do following

		while ($results = mysqli_fetch_array($raw_resultsEn)) {
			// $results = mysql_fetch_array($raw_resultsEn) puts data from database into array, while it's valid it does the loop

			$_SESSION['keresesHun'] = "<div class='text-center text-light bg-dark w-50 mx-auto'>" . $results['magyar'] .  "</div>";
			$_SESSION['keresettSzo'] = "<div class='text-center text-dark bg-light w-50 mx-auto'><p>A keresett szó: " . $query . "</p></div>";
			// posts results gotten from database( angol)
			//redirect page to home page
			//header("location:" . SITEURL . 'index.php');
		}
	} 
	else 
	{
		//create a session variable to display message
		$_SESSION['nincsTalalatEn'] = "<div class='text-danger text-center'>Nincs magyar megfelelője!</div>";	
	}
	//redirect page to home page
	header("location:" . SITEURL . 'index.php');
}
/* else { // if query length is less than minimum
	//create a session variable to display message
	$_SESSION['keresHiba'] = "<div class='text-danger text-center'>Nem adtál meg semmit!</div>";
	//redirect page to home page
	header("location:" . SITEURL . 'index.php');
}*/
?>

