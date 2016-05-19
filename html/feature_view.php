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

	
	if (isset($_SESSION['user_id'])){
		
	$feature_id = $_GET["feature_id"];
	
	//Select everything from characters
	$q = "SELECT * FROM features WHERE feature_id=$feature_id";
	
	
	$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
	
	
	while($row = mysqli_fetch_array($r))
	{
		
	$feature_id = $row["feature_id"];
	$feature_name = $row["feature_name"];
	$feature_description = $row["feature_description"];
	$character_id = $row["character_id"];
	
	}
	

	
	echo '<h1>Feature View</h1>';
	echo '<h2>Feature Name: '	.	$feature_name	.	'</h2>';
	echo '<p>Feature Description: '	.	nl2br($feature_description)	.	'</p>';
	
	echo '<form action="edit_feature.php" method="get">

			<input type="hidden" name="feature_id" value='	.	$feature_id	. '>
		
			<input type="submit" name="submit" value="Edit Feature" />
		
			</form>'	;
			
	echo '<form action="delete_feature.php" method="get">

			<input type="hidden" name="feature_id" value='	.	$feature_id	. '>
			<input type="hidden" name="character_id" value='	.	$character_id	. '>
		
			<input type="submit" name="submit" value="Delete Feature" />
		
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
