<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'Chronicle View';
include ('includes/header.html');
include ('includes/top.html');
?>



<?php
// Need the database connection:
	require (MYSQL);
	
	// Trim all the incoming data:
	$trimmed = array_map('trim', $_POST);

	
	if (isset($_SESSION['user_id'])){
		
	$chronicle_id = $_GET["chronicle_id"];
	
	//Select everything from characters
	$q = "SELECT * FROM chronicles WHERE chronicle_id=$chronicle_id";
	
	
	$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
	
	
	while($row = mysqli_fetch_array($r))
	{
		
	$chronicle_id = $row["chronicle_id"];
	$chronicle_name = $row["chronicle_name"];
	$cdate = $row["cdate"];
	$newdate = date("M d, Y", strtotime($cdate));
	$description = $row["description"];
	$public = $row["public"];
	
	$character_id = $row["character_id"];
	
	}
	
	$s = "SELECT first_name, last_name FROM characters WHERE character_id=$character_id";
	
	
	$t = mysqli_query ($dbc, $s) or trigger_error("Query: $s\n<br />MySQL Error: " . mysqli_error($dbc));
	
	
	while($row = mysqli_fetch_array($t))
	{
		
	$first_name = $row["first_name"];
	$last_name = $row["last_name"];
	
	}
	
	echo '<h1>Chronicle View</h1>';
	echo '<h2>Chronicle Name: '	.	$chronicle_name	.	'</h2>';
	echo '<p>Date: '	.	$newdate	.	'</p>';
	echo '<p>Entry: '	.	nl2br($description)	.	'</p>';
	echo '<p>Public: ' . $public . '</p>';
	
	echo '<form action="edit_chronicle.php" method="get">

			<input type="hidden" name="chronicle_id" value='	.	$chronicle_id	. '>
		
			<input type="submit" name="submit" value="Edit Chronicle" />
		
			</form>'	;
			
	echo '<form action="delete_chronicle.php" method="get">

			<input type="hidden" name="chronicle_id" value='	.	$chronicle_id	. '>
			<input type="hidden" name="character_id" value='	.	$character_id	. '>
		
			<input type="submit" name="submit" value="Delete Chronicle" />
		
			</form>'	;
	echo "<a id='return' href='character_view.php?character_id=$character_id'>Return to Character Profile</a>";	
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





<?php include ('includes/footer.html'); ?>
