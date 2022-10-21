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
		$_SESSION['nincsTalalat'] = "<div class='text-danger text-center'>A keresett szó nincs benne a szótárban!</div>";
		$_SESSION['hozzaAdCim'] = "<div class='text-center'> 
		<h2>Új szó hozzáadása:</h2>";
	
		$_SESSION['hozzaAdForm'] = "<form class='w-100 mx-auto' method='GET'>
			<div class='mb-3'>
				<label for='angol' class='form-label'>Angol szó</label>
				<input type='text' class='form-control' id='angolSzo' name='angol' required>
			</div>
			<div class='mb-3'>
				<label for='magyar' class='form-label'>Magyar szó</label>
				<input type='text' class='form-control' id='magyarSzo' name='magyar' required>
			</div>
			<div>
				<button type='submit' class='btn btn-success' name='submit'>Hozzáad</button>
			</div>
		</form>
	</div>";
		//redirect page to home page
		header("location:" . SITEURL . 'index.php');
		exit;
	}


	if (mysqli_num_rows($raw_resultsHu) > 0) { // if one or more rows are returned do following

		
		$eredmenyekEn = "";

		while ($results = mysqli_fetch_array($raw_resultsHu)) {
			// $results = mysql_fetch_array($raw_resultsHu) puts data from database into array, while it's valid it does the loop

			$eredmenyekEn .= "<div class='w-100 my-1'>" . $results['angol'] . " </div>";
		}
		// posts results gotten from database
		$_SESSION['angolul'] = "<h2 class='py-2'>Angolul:</h2>";
		$_SESSION['keresesEn'] = $eredmenyekEn;
		$_SESSION['keresettSzo'] = "<div class='w-100 mx-auto'><p>A keresett szó: " . $query . "</p></div>";
	} else {
		//create a session variable to display message
		$_SESSION['angolul'] = "<h2 class='py-2'>Angolul:</h2>";
		$_SESSION['nincsTalalatHu'] = "<div class='text-danger text-center'>Nincs találat!</div>";
	}
	//redirect page to home page
	header("location:" . SITEURL . 'index.php');

	if (mysqli_num_rows($raw_resultsEn) > 0) { // if one or more rows are returned do following
		
		$eredmenyekHun = "";
		while ($results = mysqli_fetch_array($raw_resultsEn)) {
			// $results = mysql_fetch_array($raw_resultsEn) puts data from database into array, while it's valid it does the loop
			$eredmenyekHun .= "<div class='w-100 my-1'>" . $results['magyar'] . "</div>";
		}
		// posts results gotten from database
		$_SESSION['magyarul'] = "<h2 class='py-2'>Magyarul:</h2>";
		$_SESSION['keresesHun'] = $eredmenyekHun;
		$_SESSION['keresettSzo'] = "<div class='w-100 mx-auto'><p>A keresett szó: " . $query . "</p></div>";
	} else {
		//create a session variable to display message
		$_SESSION['magyarul'] = "<h2 class='py-2'>Magyarul:</h2>";
		$_SESSION['nincsTalalatEn'] = "<div class='text-danger text-center'>Nincs találat!</div>";
	}
	//redirect page to home page
	header("location:" . SITEURL . 'index.php');
}
?>

