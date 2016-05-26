<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'Character View';
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
	
	
	
	
	echo '
	
<div id="tabs">
  	<ul>
    	<li><a href="#tabs-1">Character Main Stats </a></li>
    	<li><a href="#tabs-2">Inventory </a></li>
    	<li><a href="#tabs-3">Background</a></li>
    	<li><a href="#tabs-4">Spellcasting</a></li>
    	<li><a href="#tabs-5">Chronicles</a></li>
    	<li><a href="#tabs-6">Skills</a></li>
    	<li><a href="#tabs-7">Features</a></li>
  	</ul>
  	
  	';
  	
 include ('tabs/charactertab.php');
 
 include ('tabs/itemtab.php');
 

 include ('tabs/backgroundtab.php');

 include ('tabs/spelltab.php');

 include ('tabs/chronicletab.php'); 

 include ('tabs/skilltab.php');
 
 include ('tabs/featuretab.php');

  	
  	
  	
 
  	
  	
  	
  	
//Tab End  	
echo '
</div>
';

	mysqli_close($dbc);
	
	
}
}

else
	{
	
	$url = BASE_URL . 'index.php';
	
	ob_end_clean();
	header("Location: $url");
	exit();
	}

?>
<form action="edit_character.php" method="get">

			<input type="hidden" name="character_id" value="<?php echo $character_id ?>">
		
			<input type="submit" name="submit" value="Edit Character Main Stats and Background" />
		
</form>

<form action="delete_character.php" method="get">

			<input type="hidden" name="character_id" value="<?php echo $character_id ?>">
		
			<input type="submit" name="submit" value="Delete Character" />
		
</form>

<?php include ('includes/footer.html'); ?>
