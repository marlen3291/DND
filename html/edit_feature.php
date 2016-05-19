<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'Edit Feature';
include ('includes/header.html');
include ('includes/top.html');

?>



<?php

if (isset($_SESSION['user_id'])){

if ($_SERVER['REQUEST_METHOD'] == 'GET') { // Handle the form.

// Need the database connection:
	require (MYSQL);
	
	// Trim all the incoming data:
	$trimmed = array_map('trim', $_GET);
	
	
	$feature_id = $_GET['feature_id'];
	
	
	//Select everything from characters
	$q = "SELECT * FROM features WHERE feature_id='$feature_id'";
	
	
	$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

	while($row = mysqli_fetch_array($r))
	{
		
	$feature_name = $row["feature_name"];
	$feature_description = $row["feature_description"];
	$character_id = $row["character_id"];
	
	}
	mysqli_close($dbc);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.

	// Need the database connection:
	require (MYSQL);
	
	// Trim all the incoming data:
	$trimmed = array_map('trim', $_POST);

// Assume invalid values:
	
	$feature_name = $feature_description = FALSE;
	
	$feature_name = mysqli_real_escape_string ($dbc, $trimmed['feature_name']);
	$feature_description = mysqli_real_escape_string ($dbc, $trimmed['feature_description']);
	$feature_id = $_POST['feature_id'];
	$character_id = $_POST['character_id'];
	
	$s = "UPDATE features SET feature_name='$feature_name', feature_description='$feature_description'
	WHERE feature_id = '$feature_id'";
	
	$t = mysqli_query ($dbc, $s) or trigger_error("Query: $s\n<br />MySQL Error: " . mysqli_error($dbc));

	if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

			
				
				// Finish the page:
				echo '<h3>It worked!</h3>';
				
				$url = BASE_URL . 'feature_view.php?feature_id='	. $feature_id;
	
				ob_end_clean();
				header("Location: $url");
				exit();
				
			} else { // If it did not run OK.
				echo '<p class="error">A feature could not be updated</p>';
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
<h1>Edit A Feature</h1>
<form action="edit_feature.php" id="featureform" method="post">
  
  	<p><b>Feature Name:</b> <input type="text" name="feature_name" size="20" maxlength="40" value="<?php echo $feature_name; ?>" /></p>
	<input type="hidden" name="feature_id" value="<?php echo $feature_id; ?>">
	<input type="hidden" name="character_id" value="<?php echo $character_id; ?>">
<br>

<textarea rows="30" cols="100" name="feature_description" form="featureform">
<?php echo $feature_description; ?>
</textarea>

 
  <br>
<input type="submit" name="submit" value="Edit Feature" />
</form>


<?php include ('includes/footer.html'); ?>
