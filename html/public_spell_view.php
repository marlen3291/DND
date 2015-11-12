<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'Spell View';
include ('includes/header.html');
include ('includes/top.html');
?>




<?php

// Need the database connection:
	require (MYSQL);
	
	// Trim all the incoming data:
	$trimmed = array_map('trim', $_POST);

	
		
	$spell_id = $_GET["spell_id"];
	
	//Select everything from characters
	$q = "SELECT * FROM spells WHERE spell_id=$spell_id";
	
	
	$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
	
	
	while($row = mysqli_fetch_array($r))
	{
		
	$spell_name = $row["spell_name"];
	$spell_description = $row["spell_description"];
	$spell_level = $row["spell_level"];
	$casting_time = $row["casting_time"];
	$spell_range = $row["spell_range"];
	$components = $row["components"];
	$duration = $row["duration"];
	$character_id = $row["character_id"];
	
	}
	
	echo '<h1>Spell View</h1>';
	echo '<p>Spellname: '	.	$spell_name	.	'</p>'; 
	echo '<p>Description: '	.	$spell_description	.'</p>';
	echo '<p>Spell Level: '	.	$spell_level	.	'</p>';
	echo '<p>Casting Time: '	.	$casting_time	.	'</p>';
	echo '<p>Range: '	.	$spell_range	.	'</p>';
	echo '<p>Components: '	.	$components	.	'</p>';
	echo '<p>Duration: '	.	$duration	.'</p>';
	
	echo '<br>';
	
	
	
	
	
mysqli_close($dbc);

 // End of the main Submit conditional.

?>







<?php include ('includes/footer.html'); ?>
