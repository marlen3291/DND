<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'View List of Characters';
include ('includes/header.html');
include ('includes/top.html');

?>

<div id="content">

<?php


	
echo "<h1>View Public Characters</h1>";

//if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.

	

	// Need the database connection:
	require (MYSQL);
	
	// Trim all the incoming data:
	$trimmed = array_map('trim', $_POST);

	
	
		
	$sessionid = $_SESSION['user_id'];
	
	//Select everything from characters
	$q = "SELECT character_id,first_name, last_name, class FROM characters WHERE public_character='Yes'";
	
	
	$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
	
    echo "<table>";
	echo "<tbody>";
	echo "<tr>";
	
	
	echo "<th>First Name</th>";
	echo "<th>Last Name</th>";
	echo "<th>Class</th>";
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
		
			<button><a href='public_character_view.php?character_id=$character_id'>View Character</a> </button>
		</td>";
				
		
	echo "</tr>";
	
	
	
	}
	echo "</tbody>";
	echo "</table>";
	
	
	
	
	
	
mysqli_close($dbc);

 // End of the main Submit conditional.

?>
<br>
<button type="button"><a href="create_character.php" >Forge A Character </a></button>
</div> <!--End of Content-->
<?php include ('includes/footer.html'); ?>