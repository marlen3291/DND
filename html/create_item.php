<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'Create Item';
include ('includes/header.html');
include ('includes/top.html');
?>


<div id="content">

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
	
	$item_name = $item_description = $item_type = $item_description = $attack_bonus = $damage = $armor = FALSE;
	
	$item_name = mysqli_real_escape_string ($dbc, $trimmed['item_name']);
	$item_type = mysqli_real_escape_string ($dbc, $trimmed['item_type']);
	$item_description = mysqli_real_escape_string ($dbc, $trimmed['item_description']);
	$attack_bonus = mysqli_real_escape_string ($dbc, $trimmed['attack_bonus']);
	$damage = mysqli_real_escape_string ($dbc, $trimmed['damage']);
	$armor = mysqli_real_escape_string ($dbc, $trimmed['armor']);
	
	$character_id = $_POST['character_id'];
	echo $character_id;
	
	$s = "INSERT INTO items (character_id, item_name, item_type, item_description, attack_bonus, damage, armor) 
	VALUES ('$character_id', '$item_name', '$item_type', '$item_description', '$attack_bonus', '$damage', '$armor')";
	
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
<h1>Acquire An Item</h1>
<form action="create_item.php" id="itemform" method="post">
  
  	<p><b>Item Name:</b> <input type="text" name="item_name" size="20" maxlength="40" value="<?php if (isset($trimmed['item_name'])) echo $trimmed['item_name']; ?>" /></p>
	<input type="hidden" name="character_id" value="<?php echo $character_id ?>">
<br>

<textarea rows="30" cols="50" name="item_description" form="itemform">
Enter log entry here...
</textarea>
<br>
<p><b>Type:</b>
	<input type="radio" name="item_type" value="inventory" required>Inventory
	<input type="radio" name="item_type" value="weapon">Weapon
	<input type="radio" name="item_type" value="armor">Armor
</p>

<p><b>Attack Bonus:</b> <input type="text" name="attack_bonus"  value="<?php if (isset($trimmed['attack_bonus'])) echo $trimmed['attack_bonus']; ?>" /></p>
<p><b>Damage:</b> <input type="text" name="damage" value="<?php if (isset($trimmed['damage'])) echo $trimmed['damage']; ?>" /></p>
<p><b>Armor:</b> <input type="text" name="armor" value="<?php if (isset($trimmed['armor'])) echo $trimmed['armor']; ?>" /></p>


<input type="submit" name="submit" value="Acquire Item" />
</form>


</div> <!--End of Content-->
<?php include ('includes/footer.html'); ?>
