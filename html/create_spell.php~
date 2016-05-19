<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'Create Spell';
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
	$character_id = $_POST['character_id'];
	
	$spell_name = $spell_id = $spell_description = $casting_time = $spell_range = $components = $duration = FALSE;
	
	$spell_name = mysqli_real_escape_string ($dbc, $trimmed['spell_name']);
	$spell_description = mysqli_real_escape_string ($dbc, $trimmed['spell_description']);
	$spell_level = mysqli_real_escape_string ($dbc, $trimmed['spell_level']);
	$casting_time = mysqli_real_escape_string ($dbc, $trimmed['casting_time']);
	$spell_range = mysqli_real_escape_string ($dbc, $trimmed['spell_range']);
	$components = mysqli_real_escape_string ($dbc, $trimmed['components']);
	$duration = mysqli_real_escape_string ($dbc, $trimmed['duration']);
	
	$character_id = $_POST['character_id'];
	echo $character_id;
	
	$s = "INSERT INTO spells (character_id, spell_name, spell_description, spell_level, casting_time, spell_range, components, duration) 
	VALUES ('$character_id', '$spell_name', '$spell_description', '$spell_level', '$casting_time', '$spell_range', '$components', '$duration')";
	
	$t = mysqli_query ($dbc, $s) or trigger_error("Query: $s\n<br />MySQL Error: " . mysqli_error($dbc));

	if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

			
				
				// Finish the page:
				echo '<h3>It worked!</h3>';
				$url = BASE_URL . 'character_view.php?character_id='	. $character_id;
	
				ob_end_clean();
				header("Location: $url");
				exit();
				
			} else { // If it did not run OK.
			
				echo $s;
				echo '<p class="error">A spell could not be acquired</p>';
				
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
<h1>Acquire A Spell</h1>
<form action="create_spell.php" id="spellform" method="post">
  
  	<p><b>Spell Name:</b> <input type="text" name="spell_name" size="20" maxlength="40" value="<?php if (isset($trimmed['spell_name'])) echo $trimmed['spell_name']; ?>" /></p>
	<input type="hidden" name="character_id" value="<?php echo $character_id ?>">
<br>

<p><b>Description:</b></p>
<textarea rows="30" cols="50" name="spell_description" form="spellform">
Enter the spell's effects and what it does here.
</textarea>

<!--
<p><b>Spell Level:</b> <input type="text" name="spell_level" value="<?php if (isset($trimmed['spell_level'])) echo $trimmed['spell_level']; ?>" /></p>
-->

<p><b>Spell Level:</b>
	<input type="radio" name="spell_level" value="0" required checked>Cantrip
	<input type="radio" name="spell_level" value="1">1
	<input type="radio" name="spell_level" value="2">2
	<input type="radio" name="spell_level" value="3">3
	<input type="radio" name="spell_level" value="4">4
	<input type="radio" name="spell_level" value="5">5
	<input type="radio" name="spell_level" value="6">6
	<input type="radio" name="spell_level" value="7">7
	<input type="radio" name="spell_level" value="8">8
	<input type="radio" name="spell_level" value="9">9
</p>

<p><b>Casting Time:</b> <input type="text" name="casting_time"  value="<?php if (isset($trimmed['casting_time'])) echo $trimmed['casting_time']; ?>" /></p>
<p><b>Range:</b> <input type="text" name="spell_range" value="<?php if (isset($trimmed['spell_range'])) echo $trimmed['spell_range']; ?>" /></p>
<p><b>Components:</b> <input type="text" name="components" value="<?php if (isset($trimmed['components'])) echo $trimmed['components']; ?>" /></p>
<p><b>Duration:</b> <input type="text" name="duration" value="<?php if (isset($trimmed['duration'])) echo $trimmed['duration']; ?>" /></p>

<input type="submit" name="submit" value="Acquire Spell" />
</form>



<?php include ('includes/footer.html'); ?>
