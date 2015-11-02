<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'Public Chronicle View';
include ('includes/header.html');
include ('includes/top.html');
?>


<div id="content">
<h1>View Public Stories</h1>
<?php

// Need the database connection:
	require (MYSQL);
//Select everything from chronicles
	$a = "SELECT character_id, first_name, last_name FROM characters WHERE public_character='Yes'";
	
	
	$b = mysqli_query ($dbc, $a) or trigger_error("Query: $a\n<br />MySQL Error: " . mysqli_error($dbc));

	while($row = mysqli_fetch_array($b))
	{
		
	$character_id = $row["character_id"];
	$first_name = $row["first_name"];
	$last_name = $row["last_name"];
	
	$c = "SELECT * FROM chronicles WHERE public='Yes' AND character_id=$character_id";
	
	
	$d = mysqli_query ($dbc, $c) or trigger_error("Query: $c\n<br />MySQL Error: " . mysqli_error($dbc));
	
	
	echo "<p>Character: "	. $first_name	.	" "	. $last_name	. "</p>";
	echo "<table>";
	echo "<tbody>";
	echo "<tr>";
	
	
	echo "<th>Chronicle Name</th>";
	/*echo "<th>Character Name</th>";*/
	echo "<th>Date</th>";
	echo "<th>View</th>";
	
	echo "</tr>";
	
	while($row = mysqli_fetch_array($d))
	{
	$chronicle_id = $row["chronicle_id"];
	$chronicle_name = $row["chronicle_name"];
	$date = $row["date"];
	$public = $row["public"];
	
	/*
	$e = "SELECT first_name, last_name FROM characters WHERE character_id=$character_id";
	
	
	$f = mysqli_query ($dbc, $e) or trigger_error("Query: $e\n<br />MySQL Error: " . mysqli_error($dbc));
	
	while($row = mysqli_fetch_array($f))
	{
		$first_name=$row["first_name"];
		$last_name=$row["last_name"];
	}
	*/
	echo "<tr>";
		echo "<td>" .	$chronicle_name	.	"</td>"	;
		echo "<td>" .	$date	.	"</td>"	;
		
		echo
		"<td>
				<form action=\"chronicle_view_public.php\" method=\"get\">
					<input type=\"hidden\" name=\"chronicle_id\" value=\"$chronicle_id\">
		
					<input type=\"submit\" name=\"submit\" value=\"View Chronicle\" />
		
				</form>
		</td>";
		
	echo "</tr>";
		
	}
	
	echo "</tbody>";
	echo "</table>";
	
	echo '<br>';
	}
  
?>





</div> <!--End of Content-->
<?php include ('includes/footer.html'); ?>
