<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'Skill View';
include ('includes/header.html');
include ('includes/top.html');
?>




<?php
// Need the database connection:
	require (MYSQL);
	
	// Trim all the incoming data:
	$trimmed = array_map('trim', $_POST);

	
	
		
	$skill_id = $_GET["skill_id"];
	
	//Select everything from characters
	$q = "SELECT * FROM skills WHERE skill_id=$skill_id";
	
	
	$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
	
	
	while($row = mysqli_fetch_array($r))
	{
		
	$skill_id = $row["skill_id"];
	$skill_name = $row["skill_name"];
	$skill_description = $row["skill_description"];
	
	
	}
	
	echo '<h1>Skill View</h1>';
	echo '<h2>Skill Name: '	.	$skill_name	.	'</h2>';
	echo '<p>Skill Description: '	.	nl2br($skill_description)	.	'</p>';
	
	
	

	
mysqli_close($dbc);

 // End of the main Submit conditional.

?>





<?php include ('includes/footer.html'); ?>
