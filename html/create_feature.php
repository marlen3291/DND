<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'Create A Feature';
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
	
	$feature_name = $description = FALSE;
	
	$feature_name = mysqli_real_escape_string ($dbc, $trimmed['feature_name']);
	$feature_description = mysqli_real_escape_string ($dbc, $trimmed['feature_description']);
	$character_id = $_POST['character_id'];
	
	
	$s = "INSERT INTO features (character_id, feature_name, feature_description) 
	VALUES ('$character_id', '$feature_name', '$feature_description')";
	
	$t = mysqli_query ($dbc, $s) or trigger_error("Query: $s\n<br />MySQL Error: " . mysqli_error($dbc));

	if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

			
				
				// Finish the page:
				echo '<h3>It worked!</h3>';
			
				$url = BASE_URL . 'character_view.php?character_id='	. $character_id;
	
				ob_end_clean();
				header("Location: $url");
				exit();
				
			} else { // If it did not run OK.
				echo '<p class="error">A feature could not be made</p>';
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
<h1>Create A Feature</h1>
<form action="create_feature.php" id="featureform" method="post">
  
  	<p><b>Feature Name:</b> <input type="text" name="feature_name" size="20" maxlength="40" value="<?php if (isset($trimmed['feature_name'])) echo $trimmed['feature_name']; ?>" /></p>
	<input type="hidden" name="character_id" value="<?php echo $character_id ?>">
<br>

<textarea rows="30" cols="100" name="feature_description" form="featureform" placeholder="Enter feature description here"></textarea>

<br>

<input type="submit" name="submit" value="Acquire A Feature" />
</form>


<?php include ('includes/footer.html'); ?>
