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

	
	if (isset($_SESSION['user_id'])){
		
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
		echo '<h2>Spellname: '	.	$spell_name	.	'</h2>';
		echo '<p>Spell Level: '	.	$spell_level	.	'</p>';
		echo '<p>Casting Time: '	.	$casting_time	.	'</p>';
		echo '<p>Range: '	.	$spell_range	.	'</p>'; 
		echo '<p>Components: '	.	$components	.	'</p>';
		echo '<p>Duration: '	.	$duration	.'</p>';
		echo '<p class="spelldescription">Description: '	.	nl2br($spell_description)	.'</p>';
	
	
	echo '<br>';
	
	echo '<form action="edit_spell.php" method="get">

			<input type="hidden" name="spell_id" value='	.	$spell_id	. '>
		
			<input type="submit" name="submit" value="Edit Spell" />
		
			</form>'	;
			
	echo '<form action="delete_spell.php" method="get">

			<input type="hidden" name="spell_id" value='	.	$spell_id	. '>
			<input type="hidden" name="character_id" value='	.	$character_id	. '>
		
			<input type="submit" name="submit" value="Delete Spell" />
		
			</form>'	;
	
	echo "<a id='return' href='character_view.php?character_id=$character_id'>Return to Character Profile</a>";
	
	}
	
	else
	{
	
	$url = BASE_URL . 'index.php';
	
	ob_end_clean();
	header("Location: $url");
	exit();
	}
	
mysqli_close($dbc);

 // End of the main Submit conditional.

?>







<?php include ('includes/footer.html'); ?>
