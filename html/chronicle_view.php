<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'Welcome to this Site!';
include ('includes/header.html');
include ('includes/top.html');

?>

<div id="content">

<?php

if (isset($_SESSION['user_id'])){
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.

	// Need the database connection:
	require (MYSQL);
	
	// Trim all the incoming data:
	$trimmed = array_map('trim', $_POST);
	
	
	$character_id = $_POST['character_id'];
	echo $character_id;
	
	//Select everything from characters
	$q = "SELECT * FROM chronicles WHERE character_id=$character_id";
	
	
	$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
	
	echo "<table>";
	echo "<tbody>";
	echo "<tr>";
	
	
	echo "<th>Chronicle Name</th>";
	echo "<th>Date</th>";
	echo "<th>Description</th>";
	echo "<th></th>";
	
	echo "</tr>";
	
	while($row = mysqli_fetch_array($r))
	{
	$chronicle_id = $row["chronicle_id"];
	$chronicle_name = $row["chronicle_name"];
	$date = $row["date"];
	$description = $row["description"];
	
		
	echo "<tr>";

		echo "<td>" .	$chronicle_name	.	"</td>"	;
		echo "<td>" .	$date	.	"</td>"	;
		echo "<td>" .	$description.	"</td>"	;
		
		echo
		"<td>
				<form action=\"edit_chronicle.php\" method=\"get\">
					<input type=\"hidden\" name=\"chronicle_id\" value=\"$chronicle_id\">
		
					<input type=\"submit\" name=\"submit\" value=\"Edit Chronicle\" />
		
				</form>
		</td>";
		
	}
	echo "</tbody>";
	echo "</table>";
	
	}
	
	
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

<br>

<form action="create_chronicle.php" method="get">

			<input type="hidden" name="character_id" value="<?php echo $character_id ?>">
		
			<input type="submit" name="submit" value="Create A Chronicle" />
		
</form>
</div> <!--End of Content-->
<?php include ('includes/footer.html'); ?>
