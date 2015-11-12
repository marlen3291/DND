<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'Dungeons and Dragons Fan Site';
include ('includes/header.html');
include ('includes/top.html');
?>

<div id="content">

<?php


// Need the database connection:
	require (MYSQL);
	
	// Trim all the incoming data:
	$trimmed = array_map('trim', $_POST);

	
	if (isset($_SESSION['user_id'])){
		
	$spell_id = $_GET["spell_id"];
	$character_id = $_GET["character_id"];
	echo $spell_id;
	echo '<br>';
	echo $character_id;
	//Delete Item from database
	$q = "DELETE FROM spells WHERE spell_id=$spell_id";
	
	
	$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
	
	if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.
		
				// Finish the page:
				echo '<h3>It worked!</h3>';
				$url = BASE_URL . 'character_view.php?character_id='. $character_id;
	
				ob_end_clean();
				header("Location: $url");
				exit();
				
		}
		 
		else { // If it did not run OK.
				echo '<p class="error">Spell could not be deleted</p>';
			}
	
	
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



</div> <!--End of Content-->
<?php include ('includes/footer.html'); ?>
