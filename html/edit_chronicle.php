<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'Edit Chronicle';
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
	
	
	$chronicle_id = $_GET['chronicle_id'];
	
	
	//Select everything from characters
	$q = "SELECT * FROM chronicles WHERE chronicle_id='$chronicle_id'";
	
	
	$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));

	while($row = mysqli_fetch_array($r))
	{
		
	$chronicle_name = $row["chronicle_name"];
	$description = $row["description"];
	$public = $row["public"];
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
	
	$chronicle_name = $description = FALSE;
	
	$chronicle_name = mysqli_real_escape_string ($dbc, $trimmed['chronicle_name']);
	$description = mysqli_real_escape_string ($dbc, $trimmed['description']);
	$public = mysqli_real_escape_string ($dbc, $trimmed['public']);
	$cdate = mysqli_real_escape_string ($dbc, $trimmed['cdate']);
	$chronicle_id = $_POST['chronicle_id'];
	$character_id = $_POST['character_id'];
	
	$s = "UPDATE chronicles SET chronicle_name='$chronicle_name', description='$description', cdate='$cdate', public='$public' 
	WHERE chronicle_id = '$chronicle_id'";
	
	$t = mysqli_query ($dbc, $s) or trigger_error("Query: $s\n<br />MySQL Error: " . mysqli_error($dbc));

	if (mysqli_affected_rows($dbc) == 1) { // If it ran OK.

			
				
				// Finish the page:
				echo '<h3>It worked!</h3>';
				
				$url = BASE_URL . 'chronicle_view.php?chronicle_id='	. $chronicle_id;
	
				ob_end_clean();
				header("Location: $url");
				exit();
				
			} else { // If it did not run OK.
				echo '<p class="error">A chronicle could not be updated</p>';
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
<h1>Edit A Chronicle</h1>
<form action="edit_chronicle.php" id="chronicleform" method="post">
  
  	<p><b>Chronicle Name:</b> <input type="text" name="chronicle_name" size="20" maxlength="40" value="<?php echo $chronicle_name; ?>" /></p>
	<input type="hidden" name="chronicle_id" value="<?php echo $chronicle_id; ?>">
	<input type="hidden" name="character_id" value="<?php echo $character_id; ?>">
<br>

  	<p><b>Date</b> <input type="date" name="cdate" value="<?php if (isset($trimmed['cdate'])) echo $trimmed['cdate']; ?>" /></p>
  	
  	<br>

<textarea rows="30" cols="100" name="description" form="chronicleform">
<?php echo $description; ?>
</textarea>


<?php
	
	if($public == 'Yes'){$yescheck = "checked";}
	else{$nocheck = "checked";}
	
	echo '<p><b>Public(Allow Chronicle To Be Public:)</b>
		<input type="radio" name="public" value="Yes" '. $yescheck	.	'>Yes
		<input type="radio" name="public" value="No" '	.	$nocheck	.  '>No
	</p>';
	
	?>
 
  <br>
<input type="submit" name="submit" value="Edit Chronicle" />
</form>


<?php include ('includes/footer.html'); ?>
