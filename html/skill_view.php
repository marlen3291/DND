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

	
	if (isset($_SESSION['user_id'])){
		
	$skill_id = $_GET["skill_id"];
	
	//Select everything from characters
	$q = "SELECT * FROM skills WHERE skill_id=$skill_id";
	
	
	$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
	
	
	while($row = mysqli_fetch_array($r))
	{
		
	$skill_id = $row["skill_id"];
	$skill_name = $row["skill_name"];
	$skill_description = $row["skill_description"];
	$character_id = $row["character_id"];
	
	}
	

	
	echo '<h1>Skill View</h1>';
	echo '<h2>Skill Name: '	.	$skill_name	.	'</h2>';
	echo '<p>Skill Description: '	.	nl2br($skill_description)	.	'</p>';
	
	echo '<form action="edit_skill.php" method="get">

			<input type="hidden" name="skill_id" value='	.	$skill_id	. '>
		
			<input type="submit" name="submit" value="Edit Skill" />
		
			</form>'	;
			
	echo '<form action="delete_skill.php" method="get">

			<input type="hidden" name="skill_id" value='	.	$skill_id	. '>
			<input type="hidden" name="character_id" value='	.	$character_id	. '>
		
			<input type="submit" name="submit" value="Delete Skill" />
		
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
