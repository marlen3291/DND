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


	
echo "<h1>View Characters</h1>";

//if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.

	

	// Need the database connection:
	require (MYSQL);
	
	// Trim all the incoming data:
	$trimmed = array_map('trim', $_POST);

	
	if (isset($_SESSION['user_id'])){
		
	$sessionid = $_SESSION['user_id'];
	
	//Select everything from characters
	$q = "SELECT character_id,first_name, last_name, class, level, background FROM characters WHERE user_id=$sessionid";
	
	
	$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
	
    echo "<table>";
	echo "<tbody>";
	echo "<tr>";
	
	
	echo "<th>First Name</th>";
	echo "<th>Last Name</th>";
	echo "<th>Class</th>";
	echo "<th></th>";
	echo "<th></th>";
	
	echo "</tr>";
	
	while($row = mysqli_fetch_array($r))
	{
		
	$character_id = $row["character_id"];
	$first_name = $row["first_name"];
	$last_name = $row["last_name"];
	$class = $row["class"];

	
		
	echo "<tr>";

		echo "<td>" .	$first_name	.	"</td>"	;
		echo "<td>" .	$last_name	.	"</td>"	;
		echo "<td>" .	$class.	"</td>"	;
		
		echo 
		
		"<td>
		
			<form action=\"character_view.php\" method=\"post\">
			<input type=\"hidden\" name=\"character_id\" value=\"$character_id\">
		
			<input type=\"submit\" name=\"submit\" value=\"View Character\" />
		
			</form>
		</td>";
		
		echo 
		
		"<td>
				<form action=\"chronicle_view.php\" method=\"post\">
					<input type=\"hidden\" name=\"character_id\" value=\"$character_id\">
		
					<input type=\"submit\" name=\"submit\" value=\"View Chronicles\" />
		
				</form>
		</td>";
		
			
		
	echo "</tr>";
	
	
	
	}
	echo "</tbody>";
	echo "</table>";
	
	
	
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
<button type="button"><a href="create_character.php" >Forge A Character </a></button>
</div> <!--End of Content-->
<?php include ('includes/footer.html'); ?>
