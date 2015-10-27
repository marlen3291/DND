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

if (isset($_SESSION['user_id'])){

if ($_SERVER['REQUEST_METHOD'] == 'GET') { // Handle the form.

// Need the database connection:
	require (MYSQL);
	
	// Trim all the incoming data:
	$trimmed = array_map('trim', $_POST);
	
	
	$spell_id = $_GET['spell_id'];
	echo $spell_id;
	
	//Select everything from spells
	$q = "SELECT * FROM spells WHERE spell_id='$spell_id'";
	
	
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
	mysqli_close($dbc);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.

	// Need the database connection:
	require (MYSQL);
	
	// Trim all the incoming data:
	$trimmed = array_map('trim', $_POST);

	$spell_id = $_POST['spell_id'];
	$character_id = $_POST['character_id'];
	echo $spell_id;
// Assume invalid values:
	
	$spell_name = $spell_description = $spell_level = $casting_time = $spell_range = $components = $duration = FALSE;
	
	$spell_name = mysqli_real_escape_string ($dbc, $trimmed['spell_name']);
	$spell_description = mysqli_real_escape_string ($dbc, $trimmed['spell_description']);
	$spell_level = mysqli_real_escape_string ($dbc, $trimmed['spell_level']);
	$casting_time = mysqli_real_escape_string ($dbc, $trimmed['casting_time']);
	$spell_range = mysqli_real_escape_string ($dbc, $trimmed['spell_range']);
	$components = mysqli_real_escape_string ($dbc, $trimmed['components']);
	$duration = mysqli_real_escape_string ($dbc, $trimmed['duration']);
	
	
	$s = "UPDATE spells SET spell_name='$spell_name', spell_description='$spell_description',
	spell_level='$spell_level', casting_time='$casting_time', spell_range='$spell_range',
	components='$components', duration='$duration'  
	WHERE spell_id = '$spell_id'";
	
	$t = mysqli_query ($dbc, $s) or trigger_error("Query: $s\n<br />MySQL Error: " . mysqli_error($dbc));

	if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

			
				
				// Finish the page:
				echo '<h3>It worked!</h3>';
				$url = BASE_URL . 'spell_view.php?spell_id='	. $spell_id;
	
				ob_end_clean();
				header("Location: $url");
				exit();
				
			} else { // If it did not run OK.
				echo '<p class="error">The spell could not be updated</p>';
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

<form action="edit_spell.php" id="spell_edit_form" method="post">
  
  	<p><b>Spell Name:</b> <input type="text" name="spell_name" size="20" maxlength="40" value="<?php echo $spell_name; ?>" /></p>
	<input type="hidden" name="spell_id" value="<?php echo $spell_id ?>">
	<input type="hidden" name="character_id" value="<?php echo $character_id ?>">
<br>

<textarea rows="30" cols="50" name="spell_description" form="spell_edit_form">
<?php echo $spell_description ?>
</textarea>

<p><b>Spell Level:</b> <input type="text" name="spell_level" value="<?php echo $spell_level; ?>" /></p>
<p><b>Casting Time:</b> <input type="text" name="casting_time"  value="<?php echo $casting_time; ?>" /></p>
<p><b>Range:</b> <input type="text" name="spell_range" value="<?php echo $spell_range; ?>" /></p>
<p><b>Components:</b> <input type="text" name="components" value="<?php echo $components; ?>" /></p>
<p><b>Duration:</b> <input type="text" name="duration" value="<?php echo $duration; ?>" /></p>

<input type="submit" name="submit" value="Edit Spell" />
</form>


</div> <!--End of Content-->
<?php include ('includes/footer.html'); ?>
