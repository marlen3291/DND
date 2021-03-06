<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'Edit Item';
include ('includes/header.html');
include ('includes/top.html');

?>



<?php

if (isset($_SESSION['user_id'])){

if ($_SERVER['REQUEST_METHOD'] == 'GET') { // Handle the form.

// Need the database connection:
	require (MYSQL);
	
	// Trim all the incoming data:
	$trimmed = array_map('trim', $_POST);
	
	
	$item_id = $_GET['item_id'];
	
	
	//Select everything from spells
	$q = "SELECT * FROM items WHERE item_id='$item_id'";
	
	
	$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

	while($row = mysqli_fetch_array($r))
	{
		
	$item_name = $row["item_name"];
	$item_description = $row["item_description"];
	$item_type = $row["item_type"];
	$attack_bonus = $row["attack_bonus"];
	$damage = $row["damage"];
	$armor = $row["armor"];
	$character_id = $row["character_id"];
	
	}
	mysqli_close($dbc);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.

	// Need the database connection:
	require (MYSQL);
	
	// Trim all the incoming data:
	$trimmed = array_map('trim', $_POST);

	$item_id = $_POST['item_id'];
	$character_id = $_POST['character_id'];
	
// Assume invalid values:
	
	$item_name = $item_description = $item_type = $attack_bonus = $damage = $armor = FALSE;
	
	$item_name = mysqli_real_escape_string ($dbc, $trimmed['item_name']);
	$item_type = mysqli_real_escape_string ($dbc, $trimmed['item_type']);
	$item_description = mysqli_real_escape_string ($dbc, $trimmed['item_description']);
	$attack_bonus = mysqli_real_escape_string ($dbc, $trimmed['attack_bonus']);
	$damage = mysqli_real_escape_string ($dbc, $trimmed['damage']);
	$armor = mysqli_real_escape_string ($dbc, $trimmed['armor']);
	
	
	$s = "UPDATE items SET item_name='$item_name', item_type='$item_type', item_description='$item_description',
	attack_bonus='$attack_bonus', damage='$damage', armor='$armor'
	WHERE item_id = '$item_id'";
	
	$t = mysqli_query ($dbc, $s) or trigger_error("Query: $s\n<br />MySQL Error: " . mysqli_error($dbc));

	if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

			
				
				// Finish the page:
				echo '<h3>It worked!</h3>';
				$url = BASE_URL . 'item_view.php?item_id='	. $item_id;
	
				ob_end_clean();
				header("Location: $url");
				exit();
				
			} else { // If it did not run OK.
				echo '<p class="error">The item could not be updated</p>';
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

<h1>Edit An Item</h1>
<form action="edit_item.php" id="item_edit_form" method="post">
  
  	<p><b>Item Name:</b> <input type="text" name="item_name" size="20" maxlength="40" value="<?php echo $item_name; ?>" /></p>
	<input type="hidden" name="item_id" value="<?php echo $item_id ?>">
	<input type="hidden" name="character_id" value="<?php echo $character_id ?>">
<br>

<textarea rows="30" cols="50" name="item_description" form="item_edit_form">
<?php echo $item_description ?>
</textarea>


<?php
	
	if($item_type == 'Inventory'){$inventorycheck = "checked";}
	elseif($item_type == 'Weapon') {$weaponcheck = "checked";}
	else{$armorcheck = "checked";}
	
	echo '<p><b>Type:</b>
		<input type="radio" name="item_type" value="Inventory" '	.	$inventorycheck	.	'>Inventory
		<input type="radio" name="item_type" value="Weapon" '	.	$weaponcheck	.	'>Weapon
		<input type="radio" name="item_type" value="Armor" '	.	$armorcheck	.	'>Armor
		
	</p>';
	
	?>
 
<p><b>Attack Bonus:</b> <input type="text" name="attack_bonus" value="<?php echo $attack_bonus; ?>" /></p>
<p><b>Damage:</b> <input type="text" name="damage"  value="<?php echo $damage; ?>" /></p>
<p><b>Armor:</b> <input type="text" name="armor" value="<?php echo $armor; ?>" /></p>


<input type="submit" name="submit" value="Edit Item" />
</form>



<?php include ('includes/footer.html'); ?>
