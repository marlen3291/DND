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
	$c = "SELECT * FROM chronicles WHERE public='Yes'";
	
	
	$d = mysqli_query ($dbc, $c) or trigger_error("Query: $c\n<br />MySQL Error: " . mysqli_error($dbc));
	
	
	echo "<table>";
	echo "<tbody>";
	echo "<tr>";
	
	
	echo "<th>Chronicle Name</th>";
	echo "<th>Date</th>";
	echo "<th>View</th>";
	
	echo "</tr>";
	
	while($row = mysqli_fetch_array($d))
	{
	$chronicle_id = $row["chronicle_id"];
	$chronicle_name = $row["chronicle_name"];
	$date = $row["date"];
	$public = $row["public"];
	
	
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
	
  
?>





</div> <!--End of Content-->
<?php include ('includes/footer.html'); ?>
