<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'Chronicle View';
include ('includes/header.html');
include ('includes/top.html');
?>




<?php
// Need the database connection:
	require (MYSQL);
	
	// Trim all the incoming data:
	$trimmed = array_map('trim', $_POST);

	
	
		
	$chronicle_id = $_GET["chronicle_id"];
	
	//Select everything from characters
	$q = "SELECT * FROM chronicles WHERE chronicle_id=$chronicle_id";
	
	
	$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
	
	
	while($row = mysqli_fetch_array($r))
	{
		
	$chronicle_id = $row["chronicle_id"];
	$chronicle_name = $row["chronicle_name"];
	$date = $row["date"];
	$description = $row["description"];
	$public = $row["public"];
	
	$character_id = $row["character_id"];
	
	}
	
	$s = "SELECT first_name, last_name FROM characters WHERE character_id=$character_id";
	
	
	$t = mysqli_query ($dbc, $s) or trigger_error("Query: $s\n<br />MySQL Error: " . mysqli_error($dbc));
	
	
	while($row = mysqli_fetch_array($t))
	{
		
	$first_name = $row["first_name"];
	$last_name = $row["last_name"];
	
	}
	
	echo '<h1>Chronicle View</h1>';
	echo '<p>Character: '. $first_name . ' '. $last_name . '</p>';
	echo '<p>Chronicle Name: '	.	$chronicle_name	.	'</p>';
	echo '<p>Date: '	.	$date	.	'</p>';
	echo '<p>Entry: '	.	$description	.	'</p>';
	
	
	

	
mysqli_close($dbc);

 // End of the main Submit conditional.

?>





<?php include ('includes/footer.html'); ?>
