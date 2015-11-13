<?php # Script 18.5 - index.php
// This is the main page for the site.

// Include the configuration file:
require ('includes/config.inc.php'); 

// Set the page title and include the HTML header:
$page_title = 'View Users';
include ('includes/header.html');
include ('includes/top.html');
?>




<?php

echo "<h1>Login Logs</h1>";


// Need the database connection:
	require (MYSQL);
	
	// Trim all the incoming data:
	$trimmed = array_map('trim', $_POST);

	
	if ($_SESSION['user_level'] == 1 && isset($_SESSION['user_id'])){
	
	//Select everything from users
	$q = "SELECT * FROM users";
	
	
	$r = mysqli_query ($dbc, $q) or trigger_error("Query: $q\n<br />MySQL Error: " . mysqli_error($dbc));
	
   echo '<table id="myTable" class="tablesorter">';
	echo "<thead>";
		echo "<tr>";
	
			echo "<th>User ID</th>";
			echo "<th>First Name</th>";
			echo "<th>Last Name</th>";
			echo "<th>Email</th>";
			echo "<th>User Level</th>";
			echo "<th>Registration Date</th>";
			echo "<th>Last Login Date</th>";
	
		echo "</tr>";
	echo "</head>";
	echo "<tbody>";
	while($row = mysqli_fetch_array($r))
	{
		
	$user_id = $row["user_id"];
	$first_name = $row["first_name"];
	$last_name = $row["last_name"];
	$email = $row["email"];
	$user_level = $row["user_level"];
	$registration_date = $row["registration_date"];
	$last_logged_in = $row["last_logged_in"];
	
	
	
	echo "<tr>";

		echo "<td>" .	$user_id	.	"</td>"	;
		echo "<td>" .	$first_name	.	"</td>"	;
		echo "<td>" .	$last_name	.	"</td>"	;
		echo "<td>" .	$email.	"</td>"	;
		echo "<td>" .	$user_level	.	"</td>"	;
		echo "<td>" .	$registration_date	.	"</td>"	;
		echo "<td>" .	$last_logged_in	.	"</td>"	;
		
		
		echo "</tr>";
	
	
	
	}
	echo "</tbody>";
	echo "</table>";
	echo "<br>";
	mysqli_close($dbc);
	}
	
else
	{
	
	$url = BASE_URL . 'index.php';
	
	ob_end_clean();
	header("Location: $url");
	exit();
	}
?>



<?php include ('includes/footer.html'); ?>
