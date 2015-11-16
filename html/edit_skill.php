<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'Edit Skill';
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
	
	
	$skill_id = $_GET['skill_id'];
	
	
	//Select everything from characters
	$q = "SELECT * FROM skills WHERE skill_id='$skill_id'";
	
	
	$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

	while($row = mysqli_fetch_array($r))
	{
		
	$skill_name = $row["skill_name"];
	$skill_description = $row["skill_description"];
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
	
	$skill_name = $skill_description = FALSE;
	
	$skill_name = mysqli_real_escape_string ($dbc, $trimmed['skill_name']);
	$skill_description = mysqli_real_escape_string ($dbc, $trimmed['skill_description']);
	$skill_id = $_POST['skill_id'];
	$character_id = $_POST['character_id'];
	
	$s = "UPDATE skills SET skill_name='$skill_name', skill_description='$skill_description'
	WHERE skill_id = '$skill_id'";
	
	$t = mysqli_query ($dbc, $s) or trigger_error("Query: $s\n<br />MySQL Error: " . mysqli_error($dbc));

	if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

			
				
				// Finish the page:
				echo '<h3>It worked!</h3>';
				
				$url = BASE_URL . 'skill_view.php?skill_id='	. $skill_id;
	
				ob_end_clean();
				header("Location: $url");
				exit();
				
			} else { // If it did not run OK.
				echo '<p class="error">A skill could not be updated</p>';
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
<h1>Edit A Skill</h1>
<form action="edit_skill.php" id="skillform" method="post">
  
  	<p><b>Skill Name:</b> <input type="text" name="skill_name" size="20" maxlength="40" value="<?php echo $skill_name; ?>" /></p>
	<input type="hidden" name="skill_id" value="<?php echo $skill_id; ?>">
	<input type="hidden" name="character_id" value="<?php echo $character_id; ?>">
<br>

<textarea rows="30" cols="100" name="skill_description" form="skillform">
<?php echo $skill_description; ?>
</textarea>

 
  <br>
<input type="submit" name="submit" value="Edit Skill" />
</form>


<?php include ('includes/footer.html'); ?>
