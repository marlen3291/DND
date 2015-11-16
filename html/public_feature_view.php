<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'Feature View';
include ('includes/header.html');
include ('includes/top.html');
?>




<?php
// Need the database connection:
	require (MYSQL);
	
	// Trim all the incoming data:
	$trimmed = array_map('trim', $_POST);

	
	
		
	$feature_id = $_GET["feature_id"];
	
	//Select everything from characters
	$q = "SELECT * FROM features WHERE feature_id=$feature_id";
	
	
	$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
	
	
	while($row = mysqli_fetch_array($r))
	{
		
	$feature_id = $row["feature_id"];
	$feature_name = $row["feature_name"];
	$feature_description = $row["feature_description"];
	
	
	}
	
	echo '<h1>Feature View</h1>';
	echo '<h2>Feature Name: '	.	$feature_name	.	'</h2>';
	echo '<p>Feature Description: '	.	nl2br($feature_description)	.	'</p>';
	
	
	

	
mysqli_close($dbc);

 // End of the main Submit conditional.

?>





<?php include ('includes/footer.html'); ?>
