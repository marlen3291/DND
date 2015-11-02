<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'Item View';
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
		
	$item_id = $_GET["item_id"];
	
	//Select everything from characters
	$q = "SELECT * FROM items WHERE item_id=$item_id";
	
	
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
	
	echo '<h1>Item View</h1>';
	echo '<p>Item Name: '	.	$item_name	.	'</p>'; 
	echo '<p>Description: '	.	$item_description	.'</p>';
	echo '<p>Item Type: '	.	$item_type	.	'</p>';
	echo '<p>Attack Bonus: '	.	$attack_bonus	.	'</p>';
	echo '<p>Damage: '	.	$damage	.	'</p>';
	echo '<p>Armor: '	.	$armor	.	'</p>';
	
	echo '<br>';
	
	
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
