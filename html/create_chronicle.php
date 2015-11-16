<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'Create Chronicle';
include ('includes/header.html');
include ('includes/top.html');

?>



<?php

if (isset($_SESSION['user_id'])){

if ($_SERVER['REQUEST_METHOD'] == 'GET') { // Handle the form.

$character_id = $_GET['character_id'];

}

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.

	// Need the database connection:
	require (MYSQL);
	
	// Trim all the incoming data:
	$trimmed = array_map('trim', $_POST);

// Assume invalid values:
	
	$chronicle_name = $description = FALSE;
	
	$chronicle_name = mysqli_real_escape_string ($dbc, $trimmed['chronicle_name']);
	$description = mysqli_real_escape_string ($dbc, $trimmed['description']);
	$public = mysqli_real_escape_string ($dbc, $trimmed['public']);
	$character_id = $_POST['character_id'];
	
	
	$s = "INSERT INTO chronicles (character_id, chronicle_name, date, description, public) 
	VALUES ('$character_id', '$chronicle_name', NOW(), '$description', '$public')";
	
	$t = mysqli_query ($dbc, $s) or trigger_error("Query: $s\n<br />MySQL Error: " . mysqli_error($dbc));

	if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

			
				
				// Finish the page:
				echo '<h3>It worked!</h3>';
			
				$url = BASE_URL . 'character_view.php?character_id='	. $character_id;
	
				ob_end_clean();
				header("Location: $url");
				exit();
				
			} else { // If it did not run OK.
				echo '<p class="error">A chronicle could not be made</p>';
			}

mysqli_close($dbc);
}

} // End of the main Submit conditional.

else
	{
	
	$url = BASE_URL . 'index.php';
	
	ob_end_clean();
	header("Location: $url");
	exit();
	}
?>
<h1>Create A Chronicle</h1>
<form action="create_chronicle.php" id="chronicleform" method="post">
  
  	<p><b>Chronicle Name:</b> <input type="text" name="chronicle_name" size="20" maxlength="40" value="<?php if (isset($trimmed['chronicle_name'])) echo $trimmed['chronicle_name']; ?>" /></p>
	<input type="hidden" name="character_id" value="<?php echo $character_id ?>">
<br>

<textarea rows="30" cols="100" name="description" form="chronicleform" placeholder="Enter log entry here..."></textarea>

<p><b>Public:</b>
	<input type="radio" name="public" value="Yes" required>Yes
	<input type="radio" name="public" value="No" checked>No
</p>

<br>

<input type="submit" name="submit" value="Create a chronicle" />
</form>


<?php include ('includes/footer.html'); ?>
